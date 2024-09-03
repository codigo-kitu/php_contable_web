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

namespace com\bydan\contabilidad\facturacion\otro_impuesto\presentation\control;

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

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/otro_impuesto/util/otro_impuesto_carga.php');
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;

use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_param_return;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\presentation\session\otro_impuesto_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;

use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\producto\presentation\session\producto_session;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;


/*CARGA ARCHIVOS FRAMEWORK*/
otro_impuesto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
otro_impuesto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
otro_impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class otro_impuesto_base_control extends otro_impuesto_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->otro_impuestoClase==null) {		
				$this->otro_impuestoClase=new otro_impuesto();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_ventas')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_ventas',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_compras')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_compras',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->otro_impuestoClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->otro_impuestoClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->otro_impuestoClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->otro_impuestoClase->setcodigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo'));
				
				$this->otro_impuestoClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->otro_impuestoClase->setvalor((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'valor'));
				
				$this->otro_impuestoClase->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'predeterminado')));
				
				$this->otro_impuestoClase->setid_cuenta_ventas((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_ventas'));
				
				$this->otro_impuestoClase->setid_cuenta_compras((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_compras'));
				
				$this->otro_impuestoClase->setcuenta_contable_ventas($this->getDataCampoFormTabla('form'.$this->strSufijo,'cuenta_contable_ventas'));
				
				$this->otro_impuestoClase->setcuenta_contable_compras($this->getDataCampoFormTabla('form'.$this->strSufijo,'cuenta_contable_compras'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->otro_impuestoModel->set($this->otro_impuestoClase);
				
				/*$this->otro_impuestoModel->set($this->migrarModelotro_impuesto($this->otro_impuestoClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->otro_impuestoLogic->getotro_impuesto()->setId($this->otro_impuestoClase->getId());	
			$this->otro_impuestoLogic->getotro_impuesto()->setVersionRow($this->otro_impuestoClase->getVersionRow());	
			$this->otro_impuestoLogic->getotro_impuesto()->setVersionRow($this->otro_impuestoClase->getVersionRow());	
			$this->otro_impuestoLogic->getotro_impuesto()->setid_empresa($this->otro_impuestoClase->getid_empresa());	
			$this->otro_impuestoLogic->getotro_impuesto()->setcodigo($this->otro_impuestoClase->getcodigo());	
			$this->otro_impuestoLogic->getotro_impuesto()->setdescripcion($this->otro_impuestoClase->getdescripcion());	
			$this->otro_impuestoLogic->getotro_impuesto()->setvalor($this->otro_impuestoClase->getvalor());	
			$this->otro_impuestoLogic->getotro_impuesto()->setpredeterminado($this->otro_impuestoClase->getpredeterminado());	
			$this->otro_impuestoLogic->getotro_impuesto()->setid_cuenta_ventas($this->otro_impuestoClase->getid_cuenta_ventas());	
			$this->otro_impuestoLogic->getotro_impuesto()->setid_cuenta_compras($this->otro_impuestoClase->getid_cuenta_compras());	
			$this->otro_impuestoLogic->getotro_impuesto()->setcuenta_contable_ventas($this->otro_impuestoClase->getcuenta_contable_ventas());	
			$this->otro_impuestoLogic->getotro_impuesto()->setcuenta_contable_compras($this->otro_impuestoClase->getcuenta_contable_compras());	
		} else {
			$this->otro_impuestoClase->setId($this->otro_impuestoLogic->getotro_impuesto()->getId());	
			$this->otro_impuestoClase->setVersionRow($this->otro_impuestoLogic->getotro_impuesto()->getVersionRow());	
			$this->otro_impuestoClase->setVersionRow($this->otro_impuestoLogic->getotro_impuesto()->getVersionRow());	
			$this->otro_impuestoClase->setid_empresa($this->otro_impuestoLogic->getotro_impuesto()->getid_empresa());	
			$this->otro_impuestoClase->setcodigo($this->otro_impuestoLogic->getotro_impuesto()->getcodigo());	
			$this->otro_impuestoClase->setdescripcion($this->otro_impuestoLogic->getotro_impuesto()->getdescripcion());	
			$this->otro_impuestoClase->setvalor($this->otro_impuestoLogic->getotro_impuesto()->getvalor());	
			$this->otro_impuestoClase->setpredeterminado($this->otro_impuestoLogic->getotro_impuesto()->getpredeterminado());	
			$this->otro_impuestoClase->setid_cuenta_ventas($this->otro_impuestoLogic->getotro_impuesto()->getid_cuenta_ventas());	
			$this->otro_impuestoClase->setid_cuenta_compras($this->otro_impuestoLogic->getotro_impuesto()->getid_cuenta_compras());	
			$this->otro_impuestoClase->setcuenta_contable_ventas($this->otro_impuestoLogic->getotro_impuesto()->getcuenta_contable_ventas());	
			$this->otro_impuestoClase->setcuenta_contable_compras($this->otro_impuestoLogic->getotro_impuesto()->getcuenta_contable_compras());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->otro_impuestoModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='codigo') {$this->strMensajecodigo=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='valor') {$this->strMensajevalor=$strMensajeCampo;}
		if($strNombreCampo=='predeterminado') {$this->strMensajepredeterminado=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_ventas') {$this->strMensajeid_cuenta_ventas=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_compras') {$this->strMensajeid_cuenta_compras=$strMensajeCampo;}
		if($strNombreCampo=='cuenta_contable_ventas') {$this->strMensajecuenta_contable_ventas=$strMensajeCampo;}
		if($strNombreCampo=='cuenta_contable_compras') {$this->strMensajecuenta_contable_compras=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajecodigo='';
		$this->strMensajedescripcion='';
		$this->strMensajevalor='';
		$this->strMensajepredeterminado='';
		$this->strMensajeid_cuenta_ventas='';
		$this->strMensajeid_cuenta_compras='';
		$this->strMensajecuenta_contable_ventas='';
		$this->strMensajecuenta_contable_compras='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->commitNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->rollbackNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
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
				$this->otro_impuestoLogic->getNewConnexionToDeep();
			}

			$otro_impuesto_session=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME));
						
			if($otro_impuesto_session==null) {
				$otro_impuesto_session=new otro_impuesto_session();
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
						$this->otro_impuestoLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->otro_impuestoActual =$this->otro_impuestoClase;
			
			/*$this->otro_impuestoActual =$this->migrarModelotro_impuesto($this->otro_impuestoClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->commitNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->otro_impuestoLogic->getotro_impuestos(),$this->otro_impuestoActual);
			
			$this->actualizarControllerConReturnGeneral($this->otro_impuestoReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->rollbackNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->getNewConnexionToDeep();
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
				$this->otro_impuestoLogic->commitNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->rollbackNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$otro_impuestosLocal=$this->getListaActual();
		
		$iIndice=otro_impuesto_util::getIndiceNuevo($otro_impuestosLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(otro_impuesto $otro_impuesto,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$otro_impuestosLocal=$this->getListaActual();
		
		$iIndice=otro_impuesto_util::getIndiceActual($otro_impuestosLocal,$otro_impuesto,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevootro_impuesto')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->otro_impuestoActual =$this->otro_impuestoClase;
			
			/*$this->otro_impuestoActual =$this->migrarModelotro_impuesto($this->otro_impuestoClase);*/
			
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
			
			$this->otro_impuestoLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('cuenta_ventas');$classes[]=$class;
				$class=new Classe('cuenta_compras');$classes[]=$class;
			
			$this->otro_impuestoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->otro_impuestoLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->otro_impuestoLogic->setotro_impuesto(new otro_impuesto());
				
				$this->otro_impuestoLogic->getotro_impuesto()->setIsNew(true);
				$this->otro_impuestoLogic->getotro_impuesto()->setIsChanged(true);
				$this->otro_impuestoLogic->getotro_impuesto()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->otro_impuestoModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->otro_impuestoLogic->otro_impuestos[]=$this->otro_impuestoLogic->getotro_impuesto();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->otro_impuestoLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaproductos=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'Lista'));
							$listaproductosEliminados=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaproductos=array_merge($listaproductos,$listaproductosEliminados);
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$productos=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'Lista'));
							$productosEliminados=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$productos=array_merge($productos,$productosEliminados);
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clientes=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'Lista'));
							$clientesEliminados=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clientes=array_merge($clientes,$clientesEliminados);
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);
							
							$this->otro_impuestoLogic->saveRelaciones($this->otro_impuestoLogic->getotro_impuesto(),$listaproductos,$productos,$clientes,$proveedors);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->otro_impuestoLogic->getotro_impuesto()->setIsChanged(true);
				$this->otro_impuestoLogic->getotro_impuesto()->setIsNew(false);
				$this->otro_impuestoLogic->getotro_impuesto()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->otro_impuestoModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->otro_impuestoLogic->getotro_impuesto(),$this->otro_impuestoLogic->getotro_impuestos());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->otro_impuestoLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaproductos=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'Lista'));
							$listaproductosEliminados=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaproductos=array_merge($listaproductos,$listaproductosEliminados);
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$productos=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'Lista'));
							$productosEliminados=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$productos=array_merge($productos,$productosEliminados);
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clientes=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'Lista'));
							$clientesEliminados=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clientes=array_merge($clientes,$clientesEliminados);
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);
							
							$this->otro_impuestoLogic->saveRelaciones($this->otro_impuestoLogic->getotro_impuesto(),$listaproductos,$productos,$clientes,$proveedors);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->otro_impuestoLogic->getotro_impuesto()->setIsDeleted(true);
				$this->otro_impuestoLogic->getotro_impuesto()->setIsNew(false);
				$this->otro_impuestoLogic->getotro_impuesto()->setIsChanged(false);				
				
				$this->actualizarLista($this->otro_impuestoLogic->getotro_impuesto(),$this->otro_impuestoLogic->getotro_impuestos());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->otro_impuestoLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaproductos=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'Lista'));
							$listaproductosEliminados=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaproductos=array_merge($listaproductos,$listaproductosEliminados);

							foreach($listaproductos as $listaproducto1) {
								$listaproducto1->setIsDeleted(true);
							}
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$productos=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'Lista'));
							$productosEliminados=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$productos=array_merge($productos,$productosEliminados);

							foreach($productos as $producto1) {
								$producto1->setIsDeleted(true);
							}
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clientes=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'Lista'));
							$clientesEliminados=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clientes=array_merge($clientes,$clientesEliminados);

							foreach($clientes as $cliente1) {
								$cliente1->setIsDeleted(true);
							}
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);

							foreach($proveedors as $proveedor1) {
								$proveedor1->setIsDeleted(true);
							}
							
						$this->otro_impuestoLogic->saveRelaciones($this->otro_impuestoLogic->getotro_impuesto(),$listaproductos,$productos,$clientes,$proveedors);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->otro_impuestosEliminados[]=$this->otro_impuestoLogic->getotro_impuesto();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->otro_impuestoLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaproductos=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'Lista'));
							$listaproductosEliminados=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaproductos=array_merge($listaproductos,$listaproductosEliminados);
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$productos=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'Lista'));
							$productosEliminados=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$productos=array_merge($productos,$productosEliminados);
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clientes=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'Lista'));
							$clientesEliminados=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clientes=array_merge($clientes,$clientesEliminados);
							otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);
							
						$this->otro_impuestoLogic->saveRelaciones($this->otro_impuestoLogic->getotro_impuesto(),$listaproductos,$productos,$clientes,$proveedors);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->otro_impuestosEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->otro_impuestoLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->otro_impuestoLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->otro_impuestosEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('cuenta_ventas');$classes[]=$class;
				$class=new Classe('cuenta_compras');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->otro_impuestoLogic->setotro_impuestos();*/
					
					$this->otro_impuestoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->otro_impuestoLogic->setIsConDeepLoad(false);
			
			$this->otro_impuestos=$this->otro_impuestoLogic->getotro_impuestos();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(otro_impuesto_util::$STR_SESSION_NAME.'Lista',serialize($this->otro_impuestos));
				$this->Session->write(otro_impuesto_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->otro_impuestosEliminados));
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
				$this->otro_impuestoLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->commitNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->rollbackNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
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
				$this->otro_impuestoLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalotro_impuesto;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->otro_impuestoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->otro_impuestos as $otro_impuestoLocal) {
				if($this->otro_impuestoLogic->getotro_impuesto()->getId()==$otro_impuestoLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->otro_impuestoLogic->getotro_impuesto()->setIsDeleted(true);
			$this->otro_impuestosEliminados[]=$this->otro_impuestoLogic->getotro_impuesto();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->otro_impuestos[$indice]);
				
				$this->otro_impuestos = array_values($this->otro_impuestos);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelotro_impuesto($this->otro_impuestoClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->commitNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->rollbackNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(otro_impuesto $otro_impuesto,array $otro_impuestos) {
		try {
			foreach($otro_impuestos as $otro_impuestoLocal){ 
				if($otro_impuestoLocal->getId()==$otro_impuesto->getId()) {
					$otro_impuestoLocal->setIsChanged($otro_impuesto->getIsChanged());
					$otro_impuestoLocal->setIsNew($otro_impuesto->getIsNew());
					$otro_impuestoLocal->setIsDeleted($otro_impuesto->getIsDeleted());
					//$otro_impuestoLocal->setbitExpired($otro_impuesto->getbitExpired());
					
					$otro_impuestoLocal->setId($otro_impuesto->getId());	
					$otro_impuestoLocal->setVersionRow($otro_impuesto->getVersionRow());	
					$otro_impuestoLocal->setVersionRow($otro_impuesto->getVersionRow());	
					$otro_impuestoLocal->setid_empresa($otro_impuesto->getid_empresa());	
					$otro_impuestoLocal->setcodigo($otro_impuesto->getcodigo());	
					$otro_impuestoLocal->setdescripcion($otro_impuesto->getdescripcion());	
					$otro_impuestoLocal->setvalor($otro_impuesto->getvalor());	
					$otro_impuestoLocal->setpredeterminado($otro_impuesto->getpredeterminado());	
					$otro_impuestoLocal->setid_cuenta_ventas($otro_impuesto->getid_cuenta_ventas());	
					$otro_impuestoLocal->setid_cuenta_compras($otro_impuesto->getid_cuenta_compras());	
					$otro_impuestoLocal->setcuenta_contable_ventas($otro_impuesto->getcuenta_contable_ventas());	
					$otro_impuestoLocal->setcuenta_contable_compras($otro_impuesto->getcuenta_contable_compras());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$otro_impuestosLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$otro_impuestosLocal=$this->otro_impuestoLogic->getotro_impuestos();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$otro_impuestosLocal=$this->otro_impuestos;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $otro_impuestosLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->otro_impuestoLogic->getotro_impuestos() as $otro_impuesto) {
				if($otro_impuesto->getId()==$id) {
					$this->otro_impuestoLogic->setotro_impuesto($otro_impuesto);
					
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
		/*$otro_impuestosSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->otro_impuestos as $otro_impuesto) {
			$otro_impuesto->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->otro_impuestos[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : otro_impuesto_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$otro_impuesto_session=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME));
						
		if($otro_impuesto_session==null) {
			$otro_impuesto_session=new otro_impuesto_session();
		}
		
		
		$this->otro_impuestoReturnGeneral=new otro_impuesto_param_return();
		$this->otro_impuestoParameterGeneral=new otro_impuesto_param_return();
			
		$this->otro_impuestoParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualotro_impuesto(this.otro_impuesto,true);
			this.setVariablesFormularioToObjetoActualForeignKeysotro_impuesto(this.otro_impuesto);*/
			
			if($otro_impuesto_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualotro_impuesto(this.otro_impuesto,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->otro_impuestoActual=$this->otro_impuestoClase;
				
				$this->setCopiarVariablesObjetos($this->otro_impuestoActual,$this->otro_impuesto,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->otro_impuestoReturnGeneral=$this->otro_impuestoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->otro_impuestoLogic->getotro_impuestos(),$this->otro_impuesto,$this->otro_impuestoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($otro_impuesto_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanotro_impuesto($classes,$this->otro_impuestoReturnGeneral,$this->otro_impuestoBean,false);*/
				}
					
				if($this->otro_impuestoReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->otro_impuestoReturnGeneral->getotro_impuesto(),$this->otro_impuestoActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyotro_impuesto($this->otro_impuestoReturnGeneral->getotro_impuesto());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariootro_impuesto($this->otro_impuestoReturnGeneral->getotro_impuesto());*/
				}
					
				if($this->otro_impuestoReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->otro_impuestoReturnGeneral->getotro_impuesto(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->otro_impuesto,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(otro_impuestoJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualotro_impuesto(this.otro_impuesto,true);
				this.setVariablesFormularioToObjetoActualForeignKeysotro_impuesto(this.otro_impuesto);				
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
				
				if($this->otro_impuestoAnterior!=null) {
					$this->otro_impuesto=$this->otro_impuestoAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->otro_impuestoReturnGeneral=$this->otro_impuestoLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->otro_impuestoLogic->getotro_impuestos(),$this->otro_impuesto,$this->otro_impuestoParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->otro_impuestoReturnGeneral->getotro_impuesto(),$this->otro_impuestoLogic->getotro_impuestos());
			*/
		}
		
		return $this->otro_impuestoReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->getNewConnexionToDeep();
			}

			$this->otro_impuestoReturnGeneral=new otro_impuesto_param_return();			
			$this->otro_impuestoParameterGeneral=new otro_impuesto_param_return();
			
			$this->otro_impuestoParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->otro_impuestoReturnGeneral=$this->otro_impuestoLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->otro_impuestos,$this->otro_impuestoParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->otro_impuestoReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->otro_impuestoReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->commitNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->otro_impuestoReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->rollbackNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
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
		
		$this->otro_impuestoReturnGeneral=new otro_impuesto_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_otro_impuesto') {
		    $sDominio='otro_impuesto';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->otro_impuestoReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->otro_impuestoReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='otro_impuesto';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='otro_impuesto';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='otro_impuesto';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->otro_impuestoReturnGeneral=new otro_impuesto_param_return();
		$this->otro_impuestoParameterGeneral=new otro_impuesto_param_return();
			
		$this->otro_impuestoParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->otro_impuestoReturnGeneral=$this->otro_impuestoLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->otro_impuestoLogic->getotro_impuestos(),$this->otro_impuesto,$this->otro_impuestoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->otro_impuestoReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->otro_impuestoReturnGeneral->getotro_impuesto(),$classes);*/
		}									
	
		if($this->otro_impuestoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->otro_impuestoReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->otro_impuestoReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $otro_impuestos,otro_impuesto $otro_impuesto) {
		
		$otro_impuesto_session=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME));
						
		if($otro_impuesto_session==null) {
			$otro_impuesto_session=new otro_impuesto_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(otro_impuesto_util::$CLASSNAME);
			}	
			*/
			
			$this->otro_impuestoReturnGeneral=new otro_impuesto_param_return();
			$this->otro_impuestoParameterGeneral=new otro_impuesto_param_return();
			
			$this->otro_impuestoParameterGeneral->setdata($this->data);
		
		
			
		if($otro_impuesto_session->conGuardarRelaciones) {
			$classes=otro_impuesto_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->otro_impuestoActual,$this->otro_impuesto,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->otro_impuestoReturnGeneral=$this->otro_impuestoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->otro_impuestoLogic->getotro_impuestos(),$this->otro_impuestoActual,$this->otro_impuestoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->otro_impuestoReturnGeneral=$this->otro_impuestoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$otro_impuestos,$otro_impuesto,$this->otro_impuestoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelotro_impuesto($this->otro_impuestoLogic->getotro_impuesto());*/
			
			$this->otro_impuesto=$this->otro_impuestoLogic->getotro_impuesto();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->otro_impuesto);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->commitNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->rollbackNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$otro_impuestoActual=new otro_impuesto();
			
			if($this->otro_impuestoClase==null) {		
				$this->otro_impuestoClase=new otro_impuesto();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$otro_impuestoActual=$this->otro_impuestos[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $otro_impuestoActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $otro_impuestoActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $otro_impuestoActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $otro_impuestoActual->setvalor((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $otro_impuestoActual->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_7')));  } else { $otro_impuestoActual->setpredeterminado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $otro_impuestoActual->setid_cuenta_ventas((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $otro_impuestoActual->setid_cuenta_compras((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $otro_impuestoActual->setcuenta_contable_ventas($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $otro_impuestoActual->setcuenta_contable_compras($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }

				$this->otro_impuestoClase=$otro_impuestoActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->otro_impuestoModel->set($this->otro_impuestoClase);
				
				/*$this->otro_impuestoModel->set($this->migrarModelotro_impuesto($this->otro_impuestoClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->otro_impuestos=$this->migrarModelotro_impuesto($this->otro_impuestoLogic->getotro_impuestos());							
		$this->otro_impuestos=$this->otro_impuestoLogic->getotro_impuestos();*/
		
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
			$this->Session->write(otro_impuesto_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$otro_impuesto_control_session=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($otro_impuesto_control_session==null) {
				$otro_impuesto_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($otro_impuesto_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(otro_impuesto_util::$STR_SESSION_NAME,$this);*/
		} else {
			$otro_impuesto_session=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME));
			
			if($otro_impuesto_session==null) {
				$otro_impuesto_session=new otro_impuesto_session();
			}
			
			$this->set(otro_impuesto_util::$STR_SESSION_NAME, $otro_impuesto_session);
		}
	}
	
	public function setCopiarVariablesObjetos(otro_impuesto $otro_impuestoOrigen,otro_impuesto $otro_impuesto,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($otro_impuesto==null) {
				$otro_impuesto=new otro_impuesto();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $otro_impuestoOrigen->getId()!=null && $otro_impuestoOrigen->getId()!=0)) {$otro_impuesto->setId($otro_impuestoOrigen->getId());}}
			if($conDefault || ($conDefault==false && $otro_impuestoOrigen->getcodigo()!=null && $otro_impuestoOrigen->getcodigo()!='')) {$otro_impuesto->setcodigo($otro_impuestoOrigen->getcodigo());}
			if($conDefault || ($conDefault==false && $otro_impuestoOrigen->getdescripcion()!=null && $otro_impuestoOrigen->getdescripcion()!='')) {$otro_impuesto->setdescripcion($otro_impuestoOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $otro_impuestoOrigen->getvalor()!=null && $otro_impuestoOrigen->getvalor()!=0.0)) {$otro_impuesto->setvalor($otro_impuestoOrigen->getvalor());}
			if($conDefault || ($conDefault==false && $otro_impuestoOrigen->getpredeterminado()!=null && $otro_impuestoOrigen->getpredeterminado()!=false)) {$otro_impuesto->setpredeterminado($otro_impuestoOrigen->getpredeterminado());}
			if($conDefault || ($conDefault==false && $otro_impuestoOrigen->getid_cuenta_ventas()!=null && $otro_impuestoOrigen->getid_cuenta_ventas()!=null)) {$otro_impuesto->setid_cuenta_ventas($otro_impuestoOrigen->getid_cuenta_ventas());}
			if($conDefault || ($conDefault==false && $otro_impuestoOrigen->getid_cuenta_compras()!=null && $otro_impuestoOrigen->getid_cuenta_compras()!=null)) {$otro_impuesto->setid_cuenta_compras($otro_impuestoOrigen->getid_cuenta_compras());}
			if($conDefault || ($conDefault==false && $otro_impuestoOrigen->getcuenta_contable_ventas()!=null && $otro_impuestoOrigen->getcuenta_contable_ventas()!='')) {$otro_impuesto->setcuenta_contable_ventas($otro_impuestoOrigen->getcuenta_contable_ventas());}
			if($conDefault || ($conDefault==false && $otro_impuestoOrigen->getcuenta_contable_compras()!=null && $otro_impuestoOrigen->getcuenta_contable_compras()!='')) {$otro_impuesto->setcuenta_contable_compras($otro_impuestoOrigen->getcuenta_contable_compras());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$otro_impuestosSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$otro_impuestosSeleccionados[]=$this->otro_impuestos[$indice];
			}
		}
		
		return $otro_impuestosSeleccionados;
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
		$otro_impuesto= new otro_impuesto();
		
		foreach($this->otro_impuestoLogic->getotro_impuestos() as $otro_impuesto) {
			
		$otro_impuesto->listaproducto_comprass=array();
		$otro_impuesto->productos=array();
		$otro_impuesto->clientes=array();
		$otro_impuesto->proveedors=array();
		}		
		
		if($otro_impuesto!=null);
	}
	
	public function cargarRelaciones(array $otro_impuestos=array()) : array {	
		
		$otro_impuestosRespaldo = array();
		$otro_impuestosLocal = array();
		
		otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$otro_impuestosResp=array();
		$classes=array();
			
		
				$class=new Classe('lista_producto'); 	$classes[]=$class;
				$class=new Classe('producto'); 	$classes[]=$class;
				$class=new Classe('cliente'); 	$classes[]=$class;
				$class=new Classe('proveedor'); 	$classes[]=$class;
			
			
		$otro_impuestosRespaldo=$this->otro_impuestoLogic->getotro_impuestos();
			
		$this->otro_impuestoLogic->setIsConDeep(true);
		
		$this->otro_impuestoLogic->setotro_impuestos($otro_impuestos);
			
		$this->otro_impuestoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$otro_impuestosLocal=$this->otro_impuestoLogic->getotro_impuestos();
			
		/*RESPALDO*/
		$this->otro_impuestoLogic->setotro_impuestos($otro_impuestosRespaldo);
			
		$this->otro_impuestoLogic->setIsConDeep(false);
		
		if($otro_impuestosResp!=null);
		
		return $otro_impuestosLocal;
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
				$this->otro_impuestoLogic->rollbackNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(otro_impuesto_session $otro_impuesto_session) {
		$otro_impuesto_session->strTypeOnLoad=$this->strTypeOnLoadotro_impuesto;
		$otro_impuesto_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarotro_impuesto;
		$otro_impuesto_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarotro_impuesto;
		$otro_impuesto_session->bitEsPopup=$this->bitEsPopup;
		$otro_impuesto_session->bitEsBusqueda=$this->bitEsBusqueda;
		$otro_impuesto_session->strFuncionJs=$this->strFuncionJs;
		/*$otro_impuesto_session->strSufijo=$this->strSufijo;*/
		$otro_impuesto_session->bitEsRelaciones=$this->bitEsRelaciones;
		$otro_impuesto_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, otro_impuesto_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisoslista_producto='none';
			$this->strTienePermisoslista_producto=((Funciones::existeCadenaArray(lista_producto_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoslista_producto='table-cell';

			$this->strTienePermisosproducto='none';
			$this->strTienePermisosproducto=((Funciones::existeCadenaArray(producto_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosproducto='table-cell';

			$this->strTienePermisoscliente='none';
			$this->strTienePermisoscliente=((Funciones::existeCadenaArray(cliente_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscliente='table-cell';

			$this->strTienePermisosproveedor='none';
			$this->strTienePermisosproveedor=((Funciones::existeCadenaArray(proveedor_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosproveedor='table-cell';
		} else {
			

			$this->strTienePermisoslista_producto='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoslista_producto=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, lista_producto_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoslista_producto='table-cell';

			$this->strTienePermisosproducto='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosproducto=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, producto_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosproducto='table-cell';

			$this->strTienePermisoscliente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscliente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cliente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscliente='table-cell';

			$this->strTienePermisosproveedor='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosproveedor=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, proveedor_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosproveedor='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$otro_impuestoViewAdditional=new otro_impuestoView_add();
		$otro_impuestoViewAdditional->otro_impuestos=$this->otro_impuestos;
		$otro_impuestoViewAdditional->Session=$this->Session;
		
		return $otro_impuestoViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$otro_impuestosLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$otro_impuestosLocal=$this->otro_impuestos;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$otro_impuestosLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($otro_impuestosLocal)<=0) {
					$otro_impuestosLocal=$this->otro_impuestos;
				}
			} else {
				$otro_impuestosLocal=$this->otro_impuestos;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarotro_impuestosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarotro_impuestosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$otro_impuestoLogic=new otro_impuesto_logic();
		$otro_impuestoLogic->setotro_impuestos($this->otro_impuestos);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('cuenta_ventas');$classes[]=$class;
			$class=new Classe('cuenta_compras');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$otro_impuestoLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->otro_impuestos=$otro_impuestoLogic->getotro_impuestos();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->otro_impuestosLocal=$this->otro_impuestos;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=otro_impuesto_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=otro_impuesto_util::$STR_TABLE_NAME;		
			
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
			
			$otro_impuestos = $this->otro_impuestos;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = otro_impuesto_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = otro_impuesto_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/facturacion/presentation/templating/otro_impuesto_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->otro_impuestos=$otro_impuestos;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->otro_impuestosLocal=$otro_impuestosLocal;
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
		
		$otro_impuestosLocal=array();
		
		$otro_impuestosLocal=$this->otro_impuestos;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarotro_impuestosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarotro_impuestosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$otro_impuestoLogic=new otro_impuesto_logic();
		$otro_impuestoLogic->setotro_impuestos($this->otro_impuestos);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('cuenta_ventas');$classes[]=$class;
			$class=new Classe('cuenta_compras');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$otro_impuestoLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->otro_impuestos=$otro_impuestoLogic->getotro_impuestos();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$otro_impuestos = $this->otro_impuestos;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = otro_impuesto_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = otro_impuesto_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/facturacion/presentation/templating/otro_impuesto_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->otro_impuestos=$otro_impuestos;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->otro_impuestosLocal=$otro_impuestosLocal;
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
	
	public function getHtmlTablaDatosResumen(array $otro_impuestos=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->otro_impuestosReporte = $otro_impuestos;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarotro_impuestosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarotro_impuestosAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $otro_impuestos=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->otro_impuestosReporte = $otro_impuestos;		
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
		
		
		$this->otro_impuestosReporte=$this->cargarRelaciones($otro_impuestos);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarotro_impuestosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarotro_impuestosAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(otro_impuesto $otro_impuesto=null) : string {	
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
			
			
			$otro_impuestosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$otro_impuestosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($otro_impuestosLocal)<=0) {
					/*//DEBE ESCOGER
					$otro_impuestosLocal=$this->otro_impuestos;*/
				}
			} else {
				/*//DEBE ESCOGER
				$otro_impuestosLocal=$this->otro_impuestos;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($otro_impuestosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($otro_impuestosLocal,true);
			
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
				$this->otro_impuestoLogic->getNewConnexionToDeep();
			}
					
			$otro_impuestosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$otro_impuestosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($otro_impuestosLocal)<=0) {
					/*//DEBE ESCOGER
					$otro_impuestosLocal=$this->otro_impuestos;*/
				}
			} else {
				/*//DEBE ESCOGER
				$otro_impuestosLocal=$this->otro_impuestos;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($otro_impuestosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($otro_impuestosLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->commitNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->rollbackNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Otro Impuestos';
			
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
			$fileName='otro_impuesto';
			
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
			
			$title='Reporte de  Otro Impuestos';
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
			
			$title='Reporte de  Otro Impuestos';
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
				$this->otro_impuestoLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Otro Impuestos';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->commitNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->otro_impuestoLogic->rollbackNewConnexionToDeep();
				$this->otro_impuestoLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=otro_impuesto_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->otro_impuestosAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->otro_impuestosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->otro_impuestosAuxiliar)<=0) {
					$this->otro_impuestosAuxiliar=$this->otro_impuestos;
				}
			} else {
				$this->otro_impuestosAuxiliar=$this->otro_impuestos;
			}
		/*} else {
			$this->otro_impuestosAuxiliar=$this->otro_impuestosReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->otro_impuestosAuxiliar as $otro_impuesto) {
				$row=array();
				
				$row=otro_impuesto_util::getDataReportRow($tipo,$otro_impuesto,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$otro_impuestosResp=array();
			$classes=array();
			
			
				$class=new Classe('lista_producto'); 	$classes[]=$class;
				$class=new Classe('producto'); 	$classes[]=$class;
				$class=new Classe('cliente'); 	$classes[]=$class;
				$class=new Classe('proveedor'); 	$classes[]=$class;
			
			
			$otro_impuestosResp=$this->otro_impuestoLogic->getotro_impuestos();
			
			$this->otro_impuestoLogic->setIsConDeep(true);
			
			$this->otro_impuestoLogic->setotro_impuestos($this->otro_impuestosAuxiliar);
			
			$this->otro_impuestoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->otro_impuestosAuxiliar=$this->otro_impuestoLogic->getotro_impuestos();
			
			//RESPALDO
			$this->otro_impuestoLogic->setotro_impuestos($otro_impuestosResp);
			
			$this->otro_impuestoLogic->setIsConDeep(false);
			*/
			
			$this->otro_impuestosAuxiliar=$this->cargarRelaciones($this->otro_impuestosAuxiliar);
			
			$i=0;
			
			foreach ($this->otro_impuestosAuxiliar as $otro_impuesto) {
				$row=array();
				
				if($i!=0) {
					$row=otro_impuesto_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=otro_impuesto_util::getDataReportRow($tipo,$otro_impuesto,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//lista_producto
				if(Funciones::existeCadenaArrayOrderBy(lista_producto_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($otro_impuesto->getlista_productos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(lista_producto_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=lista_producto_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($otro_impuesto->getlista_productos() as $lista_producto) {
						$row=lista_producto_util::getDataReportRow('RELACIONADO',$lista_producto,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//producto
				if(Funciones::existeCadenaArrayOrderBy(producto_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($otro_impuesto->getproductos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(producto_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=producto_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($otro_impuesto->getproductos() as $producto) {
						$row=producto_util::getDataReportRow('RELACIONADO',$producto,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//cliente
				if(Funciones::existeCadenaArrayOrderBy(cliente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($otro_impuesto->getclientes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cliente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=cliente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($otro_impuesto->getclientes() as $cliente) {
						$row=cliente_util::getDataReportRow('RELACIONADO',$cliente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//proveedor
				if(Funciones::existeCadenaArrayOrderBy(proveedor_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($otro_impuesto->getproveedors())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(proveedor_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=proveedor_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($otro_impuesto->getproveedors() as $proveedor) {
						$row=proveedor_util::getDataReportRow('RELACIONADO',$proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->otro_impuestosAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->otro_impuestosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->otro_impuestosAuxiliar)<=0) {
					$this->otro_impuestosAuxiliar=$this->otro_impuestos;
				}
			} else {
				$this->otro_impuestosAuxiliar=$this->otro_impuestos;
			}
		/*} else {
			$this->otro_impuestosAuxiliar=$this->otro_impuestosReporte;	
		}*/
		
		foreach ($this->otro_impuestosAuxiliar as $otro_impuesto) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(otro_impuesto_util::getotro_impuestoDescripcion($otro_impuesto),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($otro_impuesto->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($otro_impuesto->getcodigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($otro_impuesto->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Valor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Valor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($otro_impuesto->getvalor(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Predeterminado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Predeterminado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($otro_impuesto->getpredeterminado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuentas Ventas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuentas Ventas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($otro_impuesto->getid_cuenta_ventasDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuentas Compras',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuentas Compras',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($otro_impuesto->getid_cuenta_comprasDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Contable Ventas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Contable Ventas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($otro_impuesto->getcuenta_contable_ventas(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Contable Compras',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Contable Compras',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($otro_impuesto->getcuenta_contable_compras(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface otro_impuesto_base_controlI {			
		
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
		public function getIndiceActual(otro_impuesto $otro_impuesto,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(otro_impuesto $otro_impuesto,array $otro_impuestos);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : otro_impuesto_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $otro_impuestos,otro_impuesto $otro_impuesto);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(otro_impuesto_param_return $otro_impuestoReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(otro_impuesto_session $otro_impuesto_session);		
		public function actualizarInvitadoSessionDivStyleVariables(otro_impuesto_session $otro_impuesto_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(otro_impuesto $otro_impuestoOrigen,otro_impuesto $otro_impuesto,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(otro_impuesto_control $otro_impuesto_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $otro_impuestos=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(otro_impuesto_session $otro_impuesto_session);		
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
		public function getHtmlTablaDatosResumen(array $otro_impuestos=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $otro_impuestos=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(otro_impuesto $otro_impuesto=null) : string;
		
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
