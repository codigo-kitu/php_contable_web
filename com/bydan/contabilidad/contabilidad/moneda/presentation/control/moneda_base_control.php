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

namespace com\bydan\contabilidad\contabilidad\moneda\presentation\control;

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

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/moneda/util/moneda_carga.php');
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_carga;

use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_param_return;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\presentation\session\moneda_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\session\devolucion_factura_session;

use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;
use com\bydan\contabilidad\facturacion\factura_lote\presentation\session\factura_lote_session;

use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;
use com\bydan\contabilidad\estimados\estimado\presentation\session\estimado_session;

use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;
use com\bydan\contabilidad\inventario\devolucion\presentation\session\devolucion_session;

use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\inventario\orden_compra\presentation\session\orden_compra_session;

use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\facturacion\factura\presentation\session\factura_session;

use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;
use com\bydan\contabilidad\inventario\cotizacion\presentation\session\cotizacion_session;

use com\bydan\contabilidad\general\parametro_general\util\parametro_general_carga;
use com\bydan\contabilidad\general\parametro_general\util\parametro_general_util;
use com\bydan\contabilidad\general\parametro_general\presentation\session\parametro_general_session;

use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;
use com\bydan\contabilidad\estimados\consignacion\presentation\session\consignacion_session;


/*CARGA ARCHIVOS FRAMEWORK*/
moneda_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
moneda_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
moneda_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class moneda_base_control extends moneda_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->monedaClase==null) {		
				$this->monedaClase=new moneda();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->monedaClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->monedaClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->monedaClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->monedaClase->setcodigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo'));
				
				$this->monedaClase->setnombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre'));
				
				$this->monedaClase->setsimbolo($this->getDataCampoFormTabla('form'.$this->strSufijo,'simbolo'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->monedaModel->set($this->monedaClase);
				
				/*$this->monedaModel->set($this->migrarModelmoneda($this->monedaClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->monedaLogic->getmoneda()->setId($this->monedaClase->getId());	
			$this->monedaLogic->getmoneda()->setVersionRow($this->monedaClase->getVersionRow());	
			$this->monedaLogic->getmoneda()->setVersionRow($this->monedaClase->getVersionRow());	
			$this->monedaLogic->getmoneda()->setid_empresa($this->monedaClase->getid_empresa());	
			$this->monedaLogic->getmoneda()->setcodigo($this->monedaClase->getcodigo());	
			$this->monedaLogic->getmoneda()->setnombre($this->monedaClase->getnombre());	
			$this->monedaLogic->getmoneda()->setsimbolo($this->monedaClase->getsimbolo());	
		} else {
			$this->monedaClase->setId($this->monedaLogic->getmoneda()->getId());	
			$this->monedaClase->setVersionRow($this->monedaLogic->getmoneda()->getVersionRow());	
			$this->monedaClase->setVersionRow($this->monedaLogic->getmoneda()->getVersionRow());	
			$this->monedaClase->setid_empresa($this->monedaLogic->getmoneda()->getid_empresa());	
			$this->monedaClase->setcodigo($this->monedaLogic->getmoneda()->getcodigo());	
			$this->monedaClase->setnombre($this->monedaLogic->getmoneda()->getnombre());	
			$this->monedaClase->setsimbolo($this->monedaLogic->getmoneda()->getsimbolo());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->monedaModel->invalidFieldsMe();
		
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
		if($strNombreCampo=='nombre') {$this->strMensajenombre=$strMensajeCampo;}
		if($strNombreCampo=='simbolo') {$this->strMensajesimbolo=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajecodigo='';
		$this->strMensajenombre='';
		$this->strMensajesimbolo='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->commitNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->rollbackNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
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
				$this->monedaLogic->getNewConnexionToDeep();
			}

			$moneda_session=unserialize($this->Session->read(moneda_util::$STR_SESSION_NAME));
						
			if($moneda_session==null) {
				$moneda_session=new moneda_session();
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
						$this->monedaLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->monedaActual =$this->monedaClase;
			
			/*$this->monedaActual =$this->migrarModelmoneda($this->monedaClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->commitNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->monedaLogic->getmonedas(),$this->monedaActual);
			
			$this->actualizarControllerConReturnGeneral($this->monedaReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->rollbackNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->getNewConnexionToDeep();
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
				$this->monedaLogic->commitNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->rollbackNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$monedasLocal=$this->getListaActual();
		
		$iIndice=moneda_util::getIndiceNuevo($monedasLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(moneda $moneda,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$monedasLocal=$this->getListaActual();
		
		$iIndice=moneda_util::getIndiceActual($monedasLocal,$moneda,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevomoneda')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->monedaActual =$this->monedaClase;
			
			/*$this->monedaActual =$this->migrarModelmoneda($this->monedaClase);*/
			
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
			
			$this->monedaLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
			
			$this->monedaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->monedaLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->monedaLogic->setmoneda(new moneda());
				
				$this->monedaLogic->getmoneda()->setIsNew(true);
				$this->monedaLogic->getmoneda()->setIsChanged(true);
				$this->monedaLogic->getmoneda()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->monedaModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->monedaLogic->monedas[]=$this->monedaLogic->getmoneda();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->monedaLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotes=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'Lista'));
							$facturalotesEliminados=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotes=array_merge($facturalotes,$facturalotesEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$estimados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'Lista'));
							$estimadosEliminados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'ListaEliminados'));
							$estimados=array_merge($estimados,$estimadosEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucions=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'Lista'));
							$devolucionsEliminados=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucions=array_merge($devolucions,$devolucionsEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cotizacions=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'Lista'));
							$cotizacionsEliminados=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cotizacions=array_merge($cotizacions,$cotizacionsEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_general_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametrogenerals=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME.'Lista'));
							$parametrogeneralsEliminados=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametrogenerals=array_merge($parametrogenerals,$parametrogeneralsEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$consignacions=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'Lista'));
							$consignacionsEliminados=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$consignacions=array_merge($consignacions,$consignacionsEliminados);
							
							$this->monedaLogic->saveRelaciones($this->monedaLogic->getmoneda(),$devolucionfacturas,$facturalotes,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$parametrogenerals,$consignacions);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->monedaLogic->getmoneda()->setIsChanged(true);
				$this->monedaLogic->getmoneda()->setIsNew(false);
				$this->monedaLogic->getmoneda()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->monedaModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->monedaLogic->getmoneda(),$this->monedaLogic->getmonedas());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->monedaLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotes=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'Lista'));
							$facturalotesEliminados=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotes=array_merge($facturalotes,$facturalotesEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$estimados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'Lista'));
							$estimadosEliminados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'ListaEliminados'));
							$estimados=array_merge($estimados,$estimadosEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucions=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'Lista'));
							$devolucionsEliminados=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucions=array_merge($devolucions,$devolucionsEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cotizacions=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'Lista'));
							$cotizacionsEliminados=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cotizacions=array_merge($cotizacions,$cotizacionsEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_general_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametrogenerals=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME.'Lista'));
							$parametrogeneralsEliminados=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametrogenerals=array_merge($parametrogenerals,$parametrogeneralsEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$consignacions=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'Lista'));
							$consignacionsEliminados=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$consignacions=array_merge($consignacions,$consignacionsEliminados);
							
							$this->monedaLogic->saveRelaciones($this->monedaLogic->getmoneda(),$devolucionfacturas,$facturalotes,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$parametrogenerals,$consignacions);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->monedaLogic->getmoneda()->setIsDeleted(true);
				$this->monedaLogic->getmoneda()->setIsNew(false);
				$this->monedaLogic->getmoneda()->setIsChanged(false);				
				
				$this->actualizarLista($this->monedaLogic->getmoneda(),$this->monedaLogic->getmonedas());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->monedaLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);

							foreach($devolucionfacturas as $devolucionfactura1) {
								$devolucionfactura1->setIsDeleted(true);
							}
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotes=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'Lista'));
							$facturalotesEliminados=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotes=array_merge($facturalotes,$facturalotesEliminados);

							foreach($facturalotes as $facturalote1) {
								$facturalote1->setIsDeleted(true);
							}
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$estimados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'Lista'));
							$estimadosEliminados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'ListaEliminados'));
							$estimados=array_merge($estimados,$estimadosEliminados);

							foreach($estimados as $estimado1) {
								$estimado1->setIsDeleted(true);
							}
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucions=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'Lista'));
							$devolucionsEliminados=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucions=array_merge($devolucions,$devolucionsEliminados);

							foreach($devolucions as $devolucion1) {
								$devolucion1->setIsDeleted(true);
							}
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);

							foreach($ordencompras as $ordencompra1) {
								$ordencompra1->setIsDeleted(true);
							}
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);

							foreach($facturas as $factura1) {
								$factura1->setIsDeleted(true);
							}
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cotizacions=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'Lista'));
							$cotizacionsEliminados=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cotizacions=array_merge($cotizacions,$cotizacionsEliminados);

							foreach($cotizacions as $cotizacion1) {
								$cotizacion1->setIsDeleted(true);
							}
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_general_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametrogenerals=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME.'Lista'));
							$parametrogeneralsEliminados=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametrogenerals=array_merge($parametrogenerals,$parametrogeneralsEliminados);

							foreach($parametrogenerals as $parametrogeneral1) {
								$parametrogeneral1->setIsDeleted(true);
							}
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$consignacions=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'Lista'));
							$consignacionsEliminados=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$consignacions=array_merge($consignacions,$consignacionsEliminados);

							foreach($consignacions as $consignacion1) {
								$consignacion1->setIsDeleted(true);
							}
							
						$this->monedaLogic->saveRelaciones($this->monedaLogic->getmoneda(),$devolucionfacturas,$facturalotes,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$parametrogenerals,$consignacions);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->monedasEliminados[]=$this->monedaLogic->getmoneda();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->monedaLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotes=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'Lista'));
							$facturalotesEliminados=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotes=array_merge($facturalotes,$facturalotesEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$estimados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'Lista'));
							$estimadosEliminados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'ListaEliminados'));
							$estimados=array_merge($estimados,$estimadosEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucions=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'Lista'));
							$devolucionsEliminados=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucions=array_merge($devolucions,$devolucionsEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cotizacions=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'Lista'));
							$cotizacionsEliminados=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cotizacions=array_merge($cotizacions,$cotizacionsEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							parametro_general_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$parametrogenerals=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME.'Lista'));
							$parametrogeneralsEliminados=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME.'ListaEliminados'));
							$parametrogenerals=array_merge($parametrogenerals,$parametrogeneralsEliminados);
							moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$consignacions=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'Lista'));
							$consignacionsEliminados=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$consignacions=array_merge($consignacions,$consignacionsEliminados);
							
						$this->monedaLogic->saveRelaciones($this->monedaLogic->getmoneda(),$devolucionfacturas,$facturalotes,$estimados,$devolucions,$ordencompras,$facturas,$cotizacions,$parametrogenerals,$consignacions);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->monedasEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->monedaLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->monedaLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->monedasEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->monedaLogic->setmonedas();*/
					
					$this->monedaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->monedaLogic->setIsConDeepLoad(false);
			
			$this->monedas=$this->monedaLogic->getmonedas();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(moneda_util::$STR_SESSION_NAME.'Lista',serialize($this->monedas));
				$this->Session->write(moneda_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->monedasEliminados));
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
				$this->monedaLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->commitNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->rollbackNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
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
				$this->monedaLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalmoneda;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->monedaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->monedas as $monedaLocal) {
				if($this->monedaLogic->getmoneda()->getId()==$monedaLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->monedaLogic->getmoneda()->setIsDeleted(true);
			$this->monedasEliminados[]=$this->monedaLogic->getmoneda();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->monedas[$indice]);
				
				$this->monedas = array_values($this->monedas);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelmoneda($this->monedaClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->commitNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->rollbackNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(moneda $moneda,array $monedas) {
		try {
			foreach($monedas as $monedaLocal){ 
				if($monedaLocal->getId()==$moneda->getId()) {
					$monedaLocal->setIsChanged($moneda->getIsChanged());
					$monedaLocal->setIsNew($moneda->getIsNew());
					$monedaLocal->setIsDeleted($moneda->getIsDeleted());
					//$monedaLocal->setbitExpired($moneda->getbitExpired());
					
					$monedaLocal->setId($moneda->getId());	
					$monedaLocal->setVersionRow($moneda->getVersionRow());	
					$monedaLocal->setVersionRow($moneda->getVersionRow());	
					$monedaLocal->setid_empresa($moneda->getid_empresa());	
					$monedaLocal->setcodigo($moneda->getcodigo());	
					$monedaLocal->setnombre($moneda->getnombre());	
					$monedaLocal->setsimbolo($moneda->getsimbolo());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$monedasLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$monedasLocal=$this->monedaLogic->getmonedas();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$monedasLocal=$this->monedas;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $monedasLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->monedaLogic->getmonedas() as $moneda) {
				if($moneda->getId()==$id) {
					$this->monedaLogic->setmoneda($moneda);
					
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
		/*$monedasSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->monedas as $moneda) {
			$moneda->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->monedas[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : moneda_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$moneda_session=unserialize($this->Session->read(moneda_util::$STR_SESSION_NAME));
						
		if($moneda_session==null) {
			$moneda_session=new moneda_session();
		}
		
		
		$this->monedaReturnGeneral=new moneda_param_return();
		$this->monedaParameterGeneral=new moneda_param_return();
			
		$this->monedaParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualmoneda(this.moneda,true);
			this.setVariablesFormularioToObjetoActualForeignKeysmoneda(this.moneda);*/
			
			if($moneda_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualmoneda(this.moneda,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->monedaActual=$this->monedaClase;
				
				$this->setCopiarVariablesObjetos($this->monedaActual,$this->moneda,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->monedaReturnGeneral=$this->monedaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->monedaLogic->getmonedas(),$this->moneda,$this->monedaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($moneda_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanmoneda($classes,$this->monedaReturnGeneral,$this->monedaBean,false);*/
				}
					
				if($this->monedaReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->monedaReturnGeneral->getmoneda(),$this->monedaActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeymoneda($this->monedaReturnGeneral->getmoneda());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariomoneda($this->monedaReturnGeneral->getmoneda());*/
				}
					
				if($this->monedaReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->monedaReturnGeneral->getmoneda(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->moneda,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(monedaJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualmoneda(this.moneda,true);
				this.setVariablesFormularioToObjetoActualForeignKeysmoneda(this.moneda);				
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
				
				if($this->monedaAnterior!=null) {
					$this->moneda=$this->monedaAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->monedaReturnGeneral=$this->monedaLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->monedaLogic->getmonedas(),$this->moneda,$this->monedaParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->monedaReturnGeneral->getmoneda(),$this->monedaLogic->getmonedas());
			*/
		}
		
		return $this->monedaReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->getNewConnexionToDeep();
			}

			$this->monedaReturnGeneral=new moneda_param_return();			
			$this->monedaParameterGeneral=new moneda_param_return();
			
			$this->monedaParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->monedaReturnGeneral=$this->monedaLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->monedas,$this->monedaParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->monedaReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->monedaReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->commitNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->monedaReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->rollbackNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
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
		
		$this->monedaReturnGeneral=new moneda_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_moneda') {
		    $sDominio='moneda';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->monedaReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->monedaReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='moneda';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='moneda';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='moneda';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->monedaReturnGeneral=new moneda_param_return();
		$this->monedaParameterGeneral=new moneda_param_return();
			
		$this->monedaParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->monedaReturnGeneral=$this->monedaLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->monedaLogic->getmonedas(),$this->moneda,$this->monedaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->monedaReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->monedaReturnGeneral->getmoneda(),$classes);*/
		}									
	
		if($this->monedaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->monedaReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->monedaReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $monedas,moneda $moneda) {
		
		$moneda_session=unserialize($this->Session->read(moneda_util::$STR_SESSION_NAME));
						
		if($moneda_session==null) {
			$moneda_session=new moneda_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(moneda_util::$CLASSNAME);
			}	
			*/
			
			$this->monedaReturnGeneral=new moneda_param_return();
			$this->monedaParameterGeneral=new moneda_param_return();
			
			$this->monedaParameterGeneral->setdata($this->data);
		
		
			
		if($moneda_session->conGuardarRelaciones) {
			$classes=moneda_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->monedaActual,$this->moneda,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->monedaReturnGeneral=$this->monedaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->monedaLogic->getmonedas(),$this->monedaActual,$this->monedaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->monedaReturnGeneral=$this->monedaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$monedas,$moneda,$this->monedaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelmoneda($this->monedaLogic->getmoneda());*/
			
			$this->moneda=$this->monedaLogic->getmoneda();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->moneda);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->commitNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->rollbackNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$monedaActual=new moneda();
			
			if($this->monedaClase==null) {		
				$this->monedaClase=new moneda();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$monedaActual=$this->monedas[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $monedaActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $monedaActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $monedaActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $monedaActual->setsimbolo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }

				$this->monedaClase=$monedaActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->monedaModel->set($this->monedaClase);
				
				/*$this->monedaModel->set($this->migrarModelmoneda($this->monedaClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->monedas=$this->migrarModelmoneda($this->monedaLogic->getmonedas());							
		$this->monedas=$this->monedaLogic->getmonedas();*/
		
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
			$this->Session->write(moneda_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$moneda_control_session=unserialize($this->Session->read(moneda_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($moneda_control_session==null) {
				$moneda_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($moneda_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(moneda_util::$STR_SESSION_NAME,$this);*/
		} else {
			$moneda_session=unserialize($this->Session->read(moneda_util::$STR_SESSION_NAME));
			
			if($moneda_session==null) {
				$moneda_session=new moneda_session();
			}
			
			$this->set(moneda_util::$STR_SESSION_NAME, $moneda_session);
		}
	}
	
	public function setCopiarVariablesObjetos(moneda $monedaOrigen,moneda $moneda,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($moneda==null) {
				$moneda=new moneda();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $monedaOrigen->getId()!=null && $monedaOrigen->getId()!=0)) {$moneda->setId($monedaOrigen->getId());}}
			if($conDefault || ($conDefault==false && $monedaOrigen->getcodigo()!=null && $monedaOrigen->getcodigo()!='')) {$moneda->setcodigo($monedaOrigen->getcodigo());}
			if($conDefault || ($conDefault==false && $monedaOrigen->getnombre()!=null && $monedaOrigen->getnombre()!='')) {$moneda->setnombre($monedaOrigen->getnombre());}
			if($conDefault || ($conDefault==false && $monedaOrigen->getsimbolo()!=null && $monedaOrigen->getsimbolo()!='')) {$moneda->setsimbolo($monedaOrigen->getsimbolo());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$monedasSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$monedasSeleccionados[]=$this->monedas[$indice];
			}
		}
		
		return $monedasSeleccionados;
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
		$moneda= new moneda();
		
		foreach($this->monedaLogic->getmonedas() as $moneda) {
			
		$moneda->devolucionfacturas=array();
		$moneda->facturalotes=array();
		$moneda->estimados=array();
		$moneda->devolucions=array();
		$moneda->ordencompras=array();
		$moneda->facturas=array();
		$moneda->cotizacions=array();
		$moneda->parametrogenerals=array();
		$moneda->consignacions=array();
		}		
		
		if($moneda!=null);
	}
	
	public function cargarRelaciones(array $monedas=array()) : array {	
		
		$monedasRespaldo = array();
		$monedasLocal = array();
		
		moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			parametro_general_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$monedasResp=array();
		$classes=array();
			
		
				$class=new Classe('devolucion_factura'); 	$classes[]=$class;
				$class=new Classe('factura_lote'); 	$classes[]=$class;
				$class=new Classe('estimado'); 	$classes[]=$class;
				$class=new Classe('devolucion'); 	$classes[]=$class;
				$class=new Classe('orden_compra'); 	$classes[]=$class;
				$class=new Classe('factura'); 	$classes[]=$class;
				$class=new Classe('cotizacion'); 	$classes[]=$class;
				$class=new Classe('parametro_general'); 	$classes[]=$class;
				$class=new Classe('consignacion'); 	$classes[]=$class;
			
			
		$monedasRespaldo=$this->monedaLogic->getmonedas();
			
		$this->monedaLogic->setIsConDeep(true);
		
		$this->monedaLogic->setmonedas($monedas);
			
		$this->monedaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$monedasLocal=$this->monedaLogic->getmonedas();
			
		/*RESPALDO*/
		$this->monedaLogic->setmonedas($monedasRespaldo);
			
		$this->monedaLogic->setIsConDeep(false);
		
		if($monedasResp!=null);
		
		return $monedasLocal;
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
				$this->monedaLogic->rollbackNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(moneda_session $moneda_session) {
		$moneda_session->strTypeOnLoad=$this->strTypeOnLoadmoneda;
		$moneda_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarmoneda;
		$moneda_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarmoneda;
		$moneda_session->bitEsPopup=$this->bitEsPopup;
		$moneda_session->bitEsBusqueda=$this->bitEsBusqueda;
		$moneda_session->strFuncionJs=$this->strFuncionJs;
		/*$moneda_session->strSufijo=$this->strSufijo;*/
		$moneda_session->bitEsRelaciones=$this->bitEsRelaciones;
		$moneda_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, moneda_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosdevolucion_factura='none';
			$this->strTienePermisosdevolucion_factura=((Funciones::existeCadenaArray(devolucion_factura_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdevolucion_factura='table-cell';

			$this->strTienePermisosfactura_lote='none';
			$this->strTienePermisosfactura_lote=((Funciones::existeCadenaArray(factura_lote_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosfactura_lote='table-cell';

			$this->strTienePermisosestimado='none';
			$this->strTienePermisosestimado=((Funciones::existeCadenaArray(estimado_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosestimado='table-cell';

			$this->strTienePermisosdevolucion='none';
			$this->strTienePermisosdevolucion=((Funciones::existeCadenaArray(devolucion_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdevolucion='table-cell';

			$this->strTienePermisosorden_compra='none';
			$this->strTienePermisosorden_compra=((Funciones::existeCadenaArray(orden_compra_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosorden_compra='table-cell';

			$this->strTienePermisosfactura='none';
			$this->strTienePermisosfactura=((Funciones::existeCadenaArray(factura_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosfactura='table-cell';

			$this->strTienePermisoscotizacion='none';
			$this->strTienePermisoscotizacion=((Funciones::existeCadenaArray(cotizacion_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscotizacion='table-cell';

			$this->strTienePermisosparametro_general='none';
			$this->strTienePermisosparametro_general=((Funciones::existeCadenaArray(parametro_general_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosparametro_general='table-cell';

			$this->strTienePermisosconsignacion='none';
			$this->strTienePermisosconsignacion=((Funciones::existeCadenaArray(consignacion_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosconsignacion='table-cell';
		} else {
			

			$this->strTienePermisosdevolucion_factura='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdevolucion_factura=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, devolucion_factura_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdevolucion_factura='table-cell';

			$this->strTienePermisosfactura_lote='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosfactura_lote=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_lote_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosfactura_lote='table-cell';

			$this->strTienePermisosestimado='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosestimado=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, estimado_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosestimado='table-cell';

			$this->strTienePermisosdevolucion='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdevolucion=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, devolucion_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdevolucion='table-cell';

			$this->strTienePermisosorden_compra='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosorden_compra=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, orden_compra_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosorden_compra='table-cell';

			$this->strTienePermisosfactura='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosfactura=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosfactura='table-cell';

			$this->strTienePermisoscotizacion='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscotizacion=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cotizacion_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscotizacion='table-cell';

			$this->strTienePermisosparametro_general='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosparametro_general=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_general_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosparametro_general='table-cell';

			$this->strTienePermisosconsignacion='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosconsignacion=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, consignacion_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosconsignacion='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$monedaViewAdditional=new monedaView_add();
		$monedaViewAdditional->monedas=$this->monedas;
		$monedaViewAdditional->Session=$this->Session;
		
		return $monedaViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$monedasLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$monedasLocal=$this->monedas;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$monedasLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($monedasLocal)<=0) {
					$monedasLocal=$this->monedas;
				}
			} else {
				$monedasLocal=$this->monedas;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarmonedasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarmonedasAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$monedaLogic=new moneda_logic();
		$monedaLogic->setmonedas($this->monedas);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$devolucion_factura_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME));

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}

		$estimado_session=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME));

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}

		$devolucion_session=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME));

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}

		$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}

		$factura_session=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME));

		if($factura_session==null) {
			$factura_session=new factura_session();
		}

		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}

		$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));

		if($parametro_general_session==null) {
			$parametro_general_session=new parametro_general_session();
		}

		$consignacion_session=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME));

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$monedaLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->monedas=$monedaLogic->getmonedas();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->monedasLocal=$this->monedas;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=moneda_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=moneda_util::$STR_TABLE_NAME;		
			
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
			
			$monedas = $this->monedas;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = moneda_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = moneda_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/moneda_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->monedas=$monedas;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->monedasLocal=$monedasLocal;
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
		
		$monedasLocal=array();
		
		$monedasLocal=$this->monedas;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarmonedasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarmonedasAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$monedaLogic=new moneda_logic();
		$monedaLogic->setmonedas($this->monedas);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$devolucion_factura_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME));

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}

		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}

		$estimado_session=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME));

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}

		$devolucion_session=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME));

		if($devolucion_session==null) {
			$devolucion_session=new devolucion_session();
		}

		$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}

		$factura_session=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME));

		if($factura_session==null) {
			$factura_session=new factura_session();
		}

		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}

		$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));

		if($parametro_general_session==null) {
			$parametro_general_session=new parametro_general_session();
		}

		$consignacion_session=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME));

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$monedaLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->monedas=$monedaLogic->getmonedas();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$monedas = $this->monedas;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = moneda_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = moneda_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/moneda_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->monedas=$monedas;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->monedasLocal=$monedasLocal;
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
	
	public function getHtmlTablaDatosResumen(array $monedas=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->monedasReporte = $monedas;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarmonedasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarmonedasAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $monedas=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->monedasReporte = $monedas;		
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
		
		
		$this->monedasReporte=$this->cargarRelaciones($monedas);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarmonedasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarmonedasAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(moneda $moneda=null) : string {	
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
			
			
			$monedasLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$monedasLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($monedasLocal)<=0) {
					/*//DEBE ESCOGER
					$monedasLocal=$this->monedas;*/
				}
			} else {
				/*//DEBE ESCOGER
				$monedasLocal=$this->monedas;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($monedasLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($monedasLocal,true);
			
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
				$this->monedaLogic->getNewConnexionToDeep();
			}
					
			$monedasLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$monedasLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($monedasLocal)<=0) {
					/*//DEBE ESCOGER
					$monedasLocal=$this->monedas;*/
				}
			} else {
				/*//DEBE ESCOGER
				$monedasLocal=$this->monedas;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($monedasLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($monedasLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->commitNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->rollbackNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Monedas';
			
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
			$fileName='moneda';
			
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
			
			$title='Reporte de  Monedas';
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
			
			$title='Reporte de  Monedas';
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
				$this->monedaLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Monedas';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->commitNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->monedaLogic->rollbackNewConnexionToDeep();
				$this->monedaLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=moneda_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->monedasAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->monedasAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->monedasAuxiliar)<=0) {
					$this->monedasAuxiliar=$this->monedas;
				}
			} else {
				$this->monedasAuxiliar=$this->monedas;
			}
		/*} else {
			$this->monedasAuxiliar=$this->monedasReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->monedasAuxiliar as $moneda) {
				$row=array();
				
				$row=moneda_util::getDataReportRow($tipo,$moneda,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			devolucion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			parametro_general_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$monedasResp=array();
			$classes=array();
			
			
				$class=new Classe('devolucion_factura'); 	$classes[]=$class;
				$class=new Classe('factura_lote'); 	$classes[]=$class;
				$class=new Classe('estimado'); 	$classes[]=$class;
				$class=new Classe('devolucion'); 	$classes[]=$class;
				$class=new Classe('orden_compra'); 	$classes[]=$class;
				$class=new Classe('factura'); 	$classes[]=$class;
				$class=new Classe('cotizacion'); 	$classes[]=$class;
				$class=new Classe('parametro_general'); 	$classes[]=$class;
				$class=new Classe('consignacion'); 	$classes[]=$class;
			
			
			$monedasResp=$this->monedaLogic->getmonedas();
			
			$this->monedaLogic->setIsConDeep(true);
			
			$this->monedaLogic->setmonedas($this->monedasAuxiliar);
			
			$this->monedaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->monedasAuxiliar=$this->monedaLogic->getmonedas();
			
			//RESPALDO
			$this->monedaLogic->setmonedas($monedasResp);
			
			$this->monedaLogic->setIsConDeep(false);
			*/
			
			$this->monedasAuxiliar=$this->cargarRelaciones($this->monedasAuxiliar);
			
			$i=0;
			
			foreach ($this->monedasAuxiliar as $moneda) {
				$row=array();
				
				if($i!=0) {
					$row=moneda_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=moneda_util::getDataReportRow($tipo,$moneda,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//devolucion_factura
				if(Funciones::existeCadenaArrayOrderBy(devolucion_factura_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($moneda->getdevolucion_facturas())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(devolucion_factura_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=devolucion_factura_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($moneda->getdevolucion_facturas() as $devolucion_factura) {
						$row=devolucion_factura_util::getDataReportRow('RELACIONADO',$devolucion_factura,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//factura_lote
				if(Funciones::existeCadenaArrayOrderBy(factura_lote_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($moneda->getfactura_lotes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(factura_lote_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=factura_lote_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($moneda->getfactura_lotes() as $factura_lote) {
						$row=factura_lote_util::getDataReportRow('RELACIONADO',$factura_lote,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//estimado
				if(Funciones::existeCadenaArrayOrderBy(estimado_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($moneda->getestimados())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(estimado_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=estimado_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($moneda->getestimados() as $estimado) {
						$row=estimado_util::getDataReportRow('RELACIONADO',$estimado,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//devolucion
				if(Funciones::existeCadenaArrayOrderBy(devolucion_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($moneda->getdevolucions())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(devolucion_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=devolucion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($moneda->getdevolucions() as $devolucion) {
						$row=devolucion_util::getDataReportRow('RELACIONADO',$devolucion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//orden_compra
				if(Funciones::existeCadenaArrayOrderBy(orden_compra_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($moneda->getorden_compras())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(orden_compra_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=orden_compra_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($moneda->getorden_compras() as $orden_compra) {
						$row=orden_compra_util::getDataReportRow('RELACIONADO',$orden_compra,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//factura
				if(Funciones::existeCadenaArrayOrderBy(factura_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($moneda->getfacturas())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(factura_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=factura_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($moneda->getfacturas() as $factura) {
						$row=factura_util::getDataReportRow('RELACIONADO',$factura,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//cotizacion
				if(Funciones::existeCadenaArrayOrderBy(cotizacion_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($moneda->getcotizacions())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cotizacion_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=cotizacion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($moneda->getcotizacions() as $cotizacion) {
						$row=cotizacion_util::getDataReportRow('RELACIONADO',$cotizacion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//parametro_general
				if(Funciones::existeCadenaArrayOrderBy(parametro_general_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($moneda->getparametro_generals())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(parametro_general_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=parametro_general_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($moneda->getparametro_generals() as $parametro_general) {
						$row=parametro_general_util::getDataReportRow('RELACIONADO',$parametro_general,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//consignacion
				if(Funciones::existeCadenaArrayOrderBy(consignacion_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($moneda->getconsignacions())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(consignacion_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=consignacion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($moneda->getconsignacions() as $consignacion) {
						$row=consignacion_util::getDataReportRow('RELACIONADO',$consignacion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->monedasAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->monedasAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->monedasAuxiliar)<=0) {
					$this->monedasAuxiliar=$this->monedas;
				}
			} else {
				$this->monedasAuxiliar=$this->monedas;
			}
		/*} else {
			$this->monedasAuxiliar=$this->monedasReporte;	
		}*/
		
		foreach ($this->monedasAuxiliar as $moneda) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(moneda_util::getmonedaDescripcion($moneda),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($moneda->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($moneda->getcodigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($moneda->getnombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Simbolo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Simbolo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($moneda->getsimbolo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface moneda_base_controlI {			
		
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
		public function getIndiceActual(moneda $moneda,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(moneda $moneda,array $monedas);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : moneda_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $monedas,moneda $moneda);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(moneda_param_return $monedaReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(moneda_session $moneda_session);		
		public function actualizarInvitadoSessionDivStyleVariables(moneda_session $moneda_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(moneda $monedaOrigen,moneda $moneda,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(moneda_control $moneda_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $monedas=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(moneda_session $moneda_session);		
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
		public function getHtmlTablaDatosResumen(array $monedas=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $monedas=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(moneda $moneda=null) : string;
		
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
