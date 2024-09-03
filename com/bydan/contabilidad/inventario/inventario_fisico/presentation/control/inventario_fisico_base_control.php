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

namespace com\bydan\contabilidad\inventario\inventario_fisico\presentation\control;

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

use com\bydan\contabilidad\inventario\inventario_fisico\business\entity\inventario_fisico;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/inventario_fisico/util/inventario_fisico_carga.php');
use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_carga;

use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_util;
use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_param_return;
use com\bydan\contabilidad\inventario\inventario_fisico\business\logic\inventario_fisico_logic;
use com\bydan\contabilidad\inventario\inventario_fisico\presentation\session\inventario_fisico_session;


//FK


use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

//REL


use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_carga;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_util;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\session\inventario_fisico_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
inventario_fisico_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
inventario_fisico_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
inventario_fisico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class inventario_fisico_base_control extends inventario_fisico_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->inventario_fisicoClase==null) {		
				$this->inventario_fisicoClase=new inventario_fisico();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_inventario_fisico')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_inventario_fisico',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_bodega')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_bodega',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->inventario_fisicoClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->inventario_fisicoClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->inventario_fisicoClase->setid_inventario_fisico((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_inventario_fisico'));
				
				$this->inventario_fisicoClase->setid_bodega((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_bodega'));
				
				$this->inventario_fisicoClase->setfecha(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha')));
				
				$this->inventario_fisicoClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->inventario_fisicoClase->setid_almacen((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_almacen'));
				
				$this->inventario_fisicoClase->setprod_cont_almacen((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'prod_cont_almacen'));
				
				$this->inventario_fisicoClase->settotal_productos_almacen((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'total_productos_almacen'));
				
				$this->inventario_fisicoClase->setcampo1($this->getDataCampoFormTabla('form'.$this->strSufijo,'campo1'));
				
				$this->inventario_fisicoClase->setcampo2((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'campo2'));
				
				$this->inventario_fisicoClase->setcampo3($this->getDataCampoFormTabla('form'.$this->strSufijo,'campo3'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->inventario_fisicoModel->set($this->inventario_fisicoClase);
				
				/*$this->inventario_fisicoModel->set($this->migrarModelinventario_fisico($this->inventario_fisicoClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->inventario_fisicoLogic->getinventario_fisico()->setId($this->inventario_fisicoClase->getId());	
			$this->inventario_fisicoLogic->getinventario_fisico()->setVersionRow($this->inventario_fisicoClase->getVersionRow());	
			$this->inventario_fisicoLogic->getinventario_fisico()->setVersionRow($this->inventario_fisicoClase->getVersionRow());	
			$this->inventario_fisicoLogic->getinventario_fisico()->setid_inventario_fisico($this->inventario_fisicoClase->getid_inventario_fisico());	
			$this->inventario_fisicoLogic->getinventario_fisico()->setid_bodega($this->inventario_fisicoClase->getid_bodega());	
			$this->inventario_fisicoLogic->getinventario_fisico()->setfecha($this->inventario_fisicoClase->getfecha());	
			$this->inventario_fisicoLogic->getinventario_fisico()->setdescripcion($this->inventario_fisicoClase->getdescripcion());	
			$this->inventario_fisicoLogic->getinventario_fisico()->setid_almacen($this->inventario_fisicoClase->getid_almacen());	
			$this->inventario_fisicoLogic->getinventario_fisico()->setprod_cont_almacen($this->inventario_fisicoClase->getprod_cont_almacen());	
			$this->inventario_fisicoLogic->getinventario_fisico()->settotal_productos_almacen($this->inventario_fisicoClase->gettotal_productos_almacen());	
			$this->inventario_fisicoLogic->getinventario_fisico()->setcampo1($this->inventario_fisicoClase->getcampo1());	
			$this->inventario_fisicoLogic->getinventario_fisico()->setcampo2($this->inventario_fisicoClase->getcampo2());	
			$this->inventario_fisicoLogic->getinventario_fisico()->setcampo3($this->inventario_fisicoClase->getcampo3());	
		} else {
			$this->inventario_fisicoClase->setId($this->inventario_fisicoLogic->getinventario_fisico()->getId());	
			$this->inventario_fisicoClase->setVersionRow($this->inventario_fisicoLogic->getinventario_fisico()->getVersionRow());	
			$this->inventario_fisicoClase->setVersionRow($this->inventario_fisicoLogic->getinventario_fisico()->getVersionRow());	
			$this->inventario_fisicoClase->setid_inventario_fisico($this->inventario_fisicoLogic->getinventario_fisico()->getid_inventario_fisico());	
			$this->inventario_fisicoClase->setid_bodega($this->inventario_fisicoLogic->getinventario_fisico()->getid_bodega());	
			$this->inventario_fisicoClase->setfecha($this->inventario_fisicoLogic->getinventario_fisico()->getfecha());	
			$this->inventario_fisicoClase->setdescripcion($this->inventario_fisicoLogic->getinventario_fisico()->getdescripcion());	
			$this->inventario_fisicoClase->setid_almacen($this->inventario_fisicoLogic->getinventario_fisico()->getid_almacen());	
			$this->inventario_fisicoClase->setprod_cont_almacen($this->inventario_fisicoLogic->getinventario_fisico()->getprod_cont_almacen());	
			$this->inventario_fisicoClase->settotal_productos_almacen($this->inventario_fisicoLogic->getinventario_fisico()->gettotal_productos_almacen());	
			$this->inventario_fisicoClase->setcampo1($this->inventario_fisicoLogic->getinventario_fisico()->getcampo1());	
			$this->inventario_fisicoClase->setcampo2($this->inventario_fisicoLogic->getinventario_fisico()->getcampo2());	
			$this->inventario_fisicoClase->setcampo3($this->inventario_fisicoLogic->getinventario_fisico()->getcampo3());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->inventario_fisicoModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_inventario_fisico') {$this->strMensajeid_inventario_fisico=$strMensajeCampo;}
		if($strNombreCampo=='id_bodega') {$this->strMensajeid_bodega=$strMensajeCampo;}
		if($strNombreCampo=='fecha') {$this->strMensajefecha=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='id_almacen') {$this->strMensajeid_almacen=$strMensajeCampo;}
		if($strNombreCampo=='prod_cont_almacen') {$this->strMensajeprod_cont_almacen=$strMensajeCampo;}
		if($strNombreCampo=='total_productos_almacen') {$this->strMensajetotal_productos_almacen=$strMensajeCampo;}
		if($strNombreCampo=='campo1') {$this->strMensajecampo1=$strMensajeCampo;}
		if($strNombreCampo=='campo2') {$this->strMensajecampo2=$strMensajeCampo;}
		if($strNombreCampo=='campo3') {$this->strMensajecampo3=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_inventario_fisico='';
		$this->strMensajeid_bodega='';
		$this->strMensajefecha='';
		$this->strMensajedescripcion='';
		$this->strMensajeid_almacen='';
		$this->strMensajeprod_cont_almacen='';
		$this->strMensajetotal_productos_almacen='';
		$this->strMensajecampo1='';
		$this->strMensajecampo2='';
		$this->strMensajecampo3='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
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
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}

			$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));
						
			if($inventario_fisico_session==null) {
				$inventario_fisico_session=new inventario_fisico_session();
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
						$this->inventario_fisicoLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->inventario_fisicoActual =$this->inventario_fisicoClase;
			
			/*$this->inventario_fisicoActual =$this->migrarModelinventario_fisico($this->inventario_fisicoClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->inventario_fisicoLogic->getinventario_fisicos(),$this->inventario_fisicoActual);
			
			$this->actualizarControllerConReturnGeneral($this->inventario_fisicoReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
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
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$inventario_fisicosLocal=$this->getListaActual();
		
		$iIndice=inventario_fisico_util::getIndiceNuevo($inventario_fisicosLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(inventario_fisico $inventario_fisico,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$inventario_fisicosLocal=$this->getListaActual();
		
		$iIndice=inventario_fisico_util::getIndiceActual($inventario_fisicosLocal,$inventario_fisico,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoinventario_fisico')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->inventario_fisicoActual =$this->inventario_fisicoClase;
			
			/*$this->inventario_fisicoActual =$this->migrarModelinventario_fisico($this->inventario_fisicoClase);*/
			
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
			
			$this->inventario_fisicoLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('inventario_fisico');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
			
			$this->inventario_fisicoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->inventario_fisicoLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->inventario_fisicoLogic->setinventario_fisico(new inventario_fisico());
				
				$this->inventario_fisicoLogic->getinventario_fisico()->setIsNew(true);
				$this->inventario_fisicoLogic->getinventario_fisico()->setIsChanged(true);
				$this->inventario_fisicoLogic->getinventario_fisico()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->inventario_fisicoModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->inventario_fisicoLogic->inventario_fisicos[]=$this->inventario_fisicoLogic->getinventario_fisico();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->inventario_fisicoLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							inventario_fisico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$inventariofisicodetalles=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME.'Lista'));
							$inventariofisicodetallesEliminados=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$inventariofisicodetalles=array_merge($inventariofisicodetalles,$inventariofisicodetallesEliminados);
							inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							inventario_fisico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$inventariofisicos=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME.'Lista'));
							$inventariofisicosEliminados=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME.'ListaEliminados'));
							$inventariofisicos=array_merge($inventariofisicos,$inventariofisicosEliminados);
							
							$this->inventario_fisicoLogic->saveRelaciones($this->inventario_fisicoLogic->getinventario_fisico(),$inventariofisicodetalles,$inventariofisicos);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->inventario_fisicoLogic->getinventario_fisico()->setIsChanged(true);
				$this->inventario_fisicoLogic->getinventario_fisico()->setIsNew(false);
				$this->inventario_fisicoLogic->getinventario_fisico()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->inventario_fisicoModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->inventario_fisicoLogic->getinventario_fisico(),$this->inventario_fisicoLogic->getinventario_fisicos());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->inventario_fisicoLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							inventario_fisico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$inventariofisicodetalles=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME.'Lista'));
							$inventariofisicodetallesEliminados=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$inventariofisicodetalles=array_merge($inventariofisicodetalles,$inventariofisicodetallesEliminados);
							inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							inventario_fisico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$inventariofisicos=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME.'Lista'));
							$inventariofisicosEliminados=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME.'ListaEliminados'));
							$inventariofisicos=array_merge($inventariofisicos,$inventariofisicosEliminados);
							
							$this->inventario_fisicoLogic->saveRelaciones($this->inventario_fisicoLogic->getinventario_fisico(),$inventariofisicodetalles,$inventariofisicos);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->inventario_fisicoLogic->getinventario_fisico()->setIsDeleted(true);
				$this->inventario_fisicoLogic->getinventario_fisico()->setIsNew(false);
				$this->inventario_fisicoLogic->getinventario_fisico()->setIsChanged(false);				
				
				$this->actualizarLista($this->inventario_fisicoLogic->getinventario_fisico(),$this->inventario_fisicoLogic->getinventario_fisicos());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->inventario_fisicoLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							inventario_fisico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$inventariofisicodetalles=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME.'Lista'));
							$inventariofisicodetallesEliminados=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$inventariofisicodetalles=array_merge($inventariofisicodetalles,$inventariofisicodetallesEliminados);

							foreach($inventariofisicodetalles as $inventariofisicodetalle1) {
								$inventariofisicodetalle1->setIsDeleted(true);
							}
							inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							inventario_fisico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$inventariofisicos=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME.'Lista'));
							$inventariofisicosEliminados=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME.'ListaEliminados'));
							$inventariofisicos=array_merge($inventariofisicos,$inventariofisicosEliminados);

							foreach($inventariofisicos as $inventariofisico1) {
								$inventariofisico1->setIsDeleted(true);
							}
							
						$this->inventario_fisicoLogic->saveRelaciones($this->inventario_fisicoLogic->getinventario_fisico(),$inventariofisicodetalles,$inventariofisicos);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->inventario_fisicosEliminados[]=$this->inventario_fisicoLogic->getinventario_fisico();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->inventario_fisicoLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							inventario_fisico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$inventariofisicodetalles=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME.'Lista'));
							$inventariofisicodetallesEliminados=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$inventariofisicodetalles=array_merge($inventariofisicodetalles,$inventariofisicodetallesEliminados);
							inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							inventario_fisico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$inventariofisicos=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME.'Lista'));
							$inventariofisicosEliminados=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME.'ListaEliminados'));
							$inventariofisicos=array_merge($inventariofisicos,$inventariofisicosEliminados);
							
						$this->inventario_fisicoLogic->saveRelaciones($this->inventario_fisicoLogic->getinventario_fisico(),$inventariofisicodetalles,$inventariofisicos);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->inventario_fisicosEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->inventario_fisicoLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->inventario_fisicoLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->inventario_fisicosEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('inventario_fisico');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->inventario_fisicoLogic->setinventario_fisicos();*/
					
					$this->inventario_fisicoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->inventario_fisicoLogic->setIsConDeepLoad(false);
			
			$this->inventario_fisicos=$this->inventario_fisicoLogic->getinventario_fisicos();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(inventario_fisico_util::$STR_SESSION_NAME.'Lista',serialize($this->inventario_fisicos));
				$this->Session->write(inventario_fisico_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->inventario_fisicosEliminados));
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
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
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
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalinventario_fisico;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->inventario_fisicoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->inventario_fisicos as $inventario_fisicoLocal) {
				if($this->inventario_fisicoLogic->getinventario_fisico()->getId()==$inventario_fisicoLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->inventario_fisicoLogic->getinventario_fisico()->setIsDeleted(true);
			$this->inventario_fisicosEliminados[]=$this->inventario_fisicoLogic->getinventario_fisico();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->inventario_fisicos[$indice]);
				
				$this->inventario_fisicos = array_values($this->inventario_fisicos);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelinventario_fisico($this->inventario_fisicoClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(inventario_fisico $inventario_fisico,array $inventario_fisicos) {
		try {
			foreach($inventario_fisicos as $inventario_fisicoLocal){ 
				if($inventario_fisicoLocal->getId()==$inventario_fisico->getId()) {
					$inventario_fisicoLocal->setIsChanged($inventario_fisico->getIsChanged());
					$inventario_fisicoLocal->setIsNew($inventario_fisico->getIsNew());
					$inventario_fisicoLocal->setIsDeleted($inventario_fisico->getIsDeleted());
					//$inventario_fisicoLocal->setbitExpired($inventario_fisico->getbitExpired());
					
					$inventario_fisicoLocal->setId($inventario_fisico->getId());	
					$inventario_fisicoLocal->setVersionRow($inventario_fisico->getVersionRow());	
					$inventario_fisicoLocal->setVersionRow($inventario_fisico->getVersionRow());	
					$inventario_fisicoLocal->setid_inventario_fisico($inventario_fisico->getid_inventario_fisico());	
					$inventario_fisicoLocal->setid_bodega($inventario_fisico->getid_bodega());	
					$inventario_fisicoLocal->setfecha($inventario_fisico->getfecha());	
					$inventario_fisicoLocal->setdescripcion($inventario_fisico->getdescripcion());	
					$inventario_fisicoLocal->setid_almacen($inventario_fisico->getid_almacen());	
					$inventario_fisicoLocal->setprod_cont_almacen($inventario_fisico->getprod_cont_almacen());	
					$inventario_fisicoLocal->settotal_productos_almacen($inventario_fisico->gettotal_productos_almacen());	
					$inventario_fisicoLocal->setcampo1($inventario_fisico->getcampo1());	
					$inventario_fisicoLocal->setcampo2($inventario_fisico->getcampo2());	
					$inventario_fisicoLocal->setcampo3($inventario_fisico->getcampo3());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$inventario_fisicosLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$inventario_fisicosLocal=$this->inventario_fisicoLogic->getinventario_fisicos();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$inventario_fisicosLocal=$this->inventario_fisicos;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $inventario_fisicosLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->inventario_fisicoLogic->getinventario_fisicos() as $inventario_fisico) {
				if($inventario_fisico->getId()==$id) {
					$this->inventario_fisicoLogic->setinventario_fisico($inventario_fisico);
					
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
		/*$inventario_fisicosSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->inventario_fisicos as $inventario_fisico) {
			$inventario_fisico->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->inventario_fisicos[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : inventario_fisico_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));
						
		if($inventario_fisico_session==null) {
			$inventario_fisico_session=new inventario_fisico_session();
		}
		
		
		$this->inventario_fisicoReturnGeneral=new inventario_fisico_param_return();
		$this->inventario_fisicoParameterGeneral=new inventario_fisico_param_return();
			
		$this->inventario_fisicoParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualinventario_fisico(this.inventario_fisico,true);
			this.setVariablesFormularioToObjetoActualForeignKeysinventario_fisico(this.inventario_fisico);*/
			
			if($inventario_fisico_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualinventario_fisico(this.inventario_fisico,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->inventario_fisicoActual=$this->inventario_fisicoClase;
				
				$this->setCopiarVariablesObjetos($this->inventario_fisicoActual,$this->inventario_fisico,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->inventario_fisicoReturnGeneral=$this->inventario_fisicoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->inventario_fisicoLogic->getinventario_fisicos(),$this->inventario_fisico,$this->inventario_fisicoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($inventario_fisico_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeaninventario_fisico($classes,$this->inventario_fisicoReturnGeneral,$this->inventario_fisicoBean,false);*/
				}
					
				if($this->inventario_fisicoReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->inventario_fisicoReturnGeneral->getinventario_fisico(),$this->inventario_fisicoActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyinventario_fisico($this->inventario_fisicoReturnGeneral->getinventario_fisico());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioinventario_fisico($this->inventario_fisicoReturnGeneral->getinventario_fisico());*/
				}
					
				if($this->inventario_fisicoReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->inventario_fisicoReturnGeneral->getinventario_fisico(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->inventario_fisico,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(inventario_fisicoJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualinventario_fisico(this.inventario_fisico,true);
				this.setVariablesFormularioToObjetoActualForeignKeysinventario_fisico(this.inventario_fisico);				
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
				
				if($this->inventario_fisicoAnterior!=null) {
					$this->inventario_fisico=$this->inventario_fisicoAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->inventario_fisicoReturnGeneral=$this->inventario_fisicoLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->inventario_fisicoLogic->getinventario_fisicos(),$this->inventario_fisico,$this->inventario_fisicoParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->inventario_fisicoReturnGeneral->getinventario_fisico(),$this->inventario_fisicoLogic->getinventario_fisicos());
			*/
		}
		
		return $this->inventario_fisicoReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}

			$this->inventario_fisicoReturnGeneral=new inventario_fisico_param_return();			
			$this->inventario_fisicoParameterGeneral=new inventario_fisico_param_return();
			
			$this->inventario_fisicoParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->inventario_fisicoReturnGeneral=$this->inventario_fisicoLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->inventario_fisicos,$this->inventario_fisicoParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->inventario_fisicoReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->inventario_fisicoReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->inventario_fisicoReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
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
		
		$this->inventario_fisicoReturnGeneral=new inventario_fisico_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_inventario_fisico') {
		    $sDominio='inventario_fisico';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->inventario_fisicoReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->inventario_fisicoReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='inventario_fisico';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='inventario_fisico';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='inventario_fisico';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->inventario_fisicoReturnGeneral=new inventario_fisico_param_return();
		$this->inventario_fisicoParameterGeneral=new inventario_fisico_param_return();
			
		$this->inventario_fisicoParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->inventario_fisicoReturnGeneral=$this->inventario_fisicoLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->inventario_fisicoLogic->getinventario_fisicos(),$this->inventario_fisico,$this->inventario_fisicoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->inventario_fisicoReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->inventario_fisicoReturnGeneral->getinventario_fisico(),$classes);*/
		}									
	
		if($this->inventario_fisicoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->inventario_fisicoReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->inventario_fisicoReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $inventario_fisicos,inventario_fisico $inventario_fisico) {
		
		$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));
						
		if($inventario_fisico_session==null) {
			$inventario_fisico_session=new inventario_fisico_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(inventario_fisico_util::$CLASSNAME);
			}	
			*/
			
			$this->inventario_fisicoReturnGeneral=new inventario_fisico_param_return();
			$this->inventario_fisicoParameterGeneral=new inventario_fisico_param_return();
			
			$this->inventario_fisicoParameterGeneral->setdata($this->data);
		
		
			
		if($inventario_fisico_session->conGuardarRelaciones) {
			$classes=inventario_fisico_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->inventario_fisicoActual,$this->inventario_fisico,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->inventario_fisicoReturnGeneral=$this->inventario_fisicoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->inventario_fisicoLogic->getinventario_fisicos(),$this->inventario_fisicoActual,$this->inventario_fisicoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->inventario_fisicoReturnGeneral=$this->inventario_fisicoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$inventario_fisicos,$inventario_fisico,$this->inventario_fisicoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelinventario_fisico($this->inventario_fisicoLogic->getinventario_fisico());*/
			
			$this->inventario_fisico=$this->inventario_fisicoLogic->getinventario_fisico();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->inventario_fisico);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$inventario_fisicoActual=new inventario_fisico();
			
			if($this->inventario_fisicoClase==null) {		
				$this->inventario_fisicoClase=new inventario_fisico();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$inventario_fisicoActual=$this->inventario_fisicos[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $inventario_fisicoActual->setid_inventario_fisico((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $inventario_fisicoActual->setid_bodega((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $inventario_fisicoActual->setfecha(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $inventario_fisicoActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $inventario_fisicoActual->setid_almacen((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $inventario_fisicoActual->setprod_cont_almacen((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $inventario_fisicoActual->settotal_productos_almacen((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $inventario_fisicoActual->setcampo1($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $inventario_fisicoActual->setcampo2((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $inventario_fisicoActual->setcampo3($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }

				$this->inventario_fisicoClase=$inventario_fisicoActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->inventario_fisicoModel->set($this->inventario_fisicoClase);
				
				/*$this->inventario_fisicoModel->set($this->migrarModelinventario_fisico($this->inventario_fisicoClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->inventario_fisicos=$this->migrarModelinventario_fisico($this->inventario_fisicoLogic->getinventario_fisicos());							
		$this->inventario_fisicos=$this->inventario_fisicoLogic->getinventario_fisicos();*/
		
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
			$this->Session->write(inventario_fisico_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$inventario_fisico_control_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($inventario_fisico_control_session==null) {
				$inventario_fisico_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($inventario_fisico_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(inventario_fisico_util::$STR_SESSION_NAME,$this);*/
		} else {
			$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));
			
			if($inventario_fisico_session==null) {
				$inventario_fisico_session=new inventario_fisico_session();
			}
			
			$this->set(inventario_fisico_util::$STR_SESSION_NAME, $inventario_fisico_session);
		}
	}
	
	public function setCopiarVariablesObjetos(inventario_fisico $inventario_fisicoOrigen,inventario_fisico $inventario_fisico,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($inventario_fisico==null) {
				$inventario_fisico=new inventario_fisico();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $inventario_fisicoOrigen->getId()!=null && $inventario_fisicoOrigen->getId()!=0)) {$inventario_fisico->setId($inventario_fisicoOrigen->getId());}}
			if($conDefault || ($conDefault==false && $inventario_fisicoOrigen->getid_inventario_fisico()!=null && $inventario_fisicoOrigen->getid_inventario_fisico()!=-1)) {$inventario_fisico->setid_inventario_fisico($inventario_fisicoOrigen->getid_inventario_fisico());}
			if($conDefault || ($conDefault==false && $inventario_fisicoOrigen->getid_bodega()!=null && $inventario_fisicoOrigen->getid_bodega()!=-1)) {$inventario_fisico->setid_bodega($inventario_fisicoOrigen->getid_bodega());}
			if($conDefault || ($conDefault==false && $inventario_fisicoOrigen->getfecha()!=null && $inventario_fisicoOrigen->getfecha()!=date('Y-m-d'))) {$inventario_fisico->setfecha($inventario_fisicoOrigen->getfecha());}
			if($conDefault || ($conDefault==false && $inventario_fisicoOrigen->getdescripcion()!=null && $inventario_fisicoOrigen->getdescripcion()!='')) {$inventario_fisico->setdescripcion($inventario_fisicoOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $inventario_fisicoOrigen->getid_almacen()!=null && $inventario_fisicoOrigen->getid_almacen()!=0)) {$inventario_fisico->setid_almacen($inventario_fisicoOrigen->getid_almacen());}
			if($conDefault || ($conDefault==false && $inventario_fisicoOrigen->getprod_cont_almacen()!=null && $inventario_fisicoOrigen->getprod_cont_almacen()!=0.0)) {$inventario_fisico->setprod_cont_almacen($inventario_fisicoOrigen->getprod_cont_almacen());}
			if($conDefault || ($conDefault==false && $inventario_fisicoOrigen->gettotal_productos_almacen()!=null && $inventario_fisicoOrigen->gettotal_productos_almacen()!=0.0)) {$inventario_fisico->settotal_productos_almacen($inventario_fisicoOrigen->gettotal_productos_almacen());}
			if($conDefault || ($conDefault==false && $inventario_fisicoOrigen->getcampo1()!=null && $inventario_fisicoOrigen->getcampo1()!='')) {$inventario_fisico->setcampo1($inventario_fisicoOrigen->getcampo1());}
			if($conDefault || ($conDefault==false && $inventario_fisicoOrigen->getcampo2()!=null && $inventario_fisicoOrigen->getcampo2()!=0.0)) {$inventario_fisico->setcampo2($inventario_fisicoOrigen->getcampo2());}
			if($conDefault || ($conDefault==false && $inventario_fisicoOrigen->getcampo3()!=null && $inventario_fisicoOrigen->getcampo3()!='')) {$inventario_fisico->setcampo3($inventario_fisicoOrigen->getcampo3());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$inventario_fisicosSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$inventario_fisicosSeleccionados[]=$this->inventario_fisicos[$indice];
			}
		}
		
		return $inventario_fisicosSeleccionados;
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
		$inventario_fisico= new inventario_fisico();
		
		foreach($this->inventario_fisicoLogic->getinventario_fisicos() as $inventario_fisico) {
			
		$inventario_fisico->inventariofisicodetalles=array();
		$inventario_fisico->inventariofisicos=array();
		}		
		
		if($inventario_fisico!=null);
	}
	
	public function cargarRelaciones(array $inventario_fisicos=array()) : array {	
		
		$inventario_fisicosRespaldo = array();
		$inventario_fisicosLocal = array();
		
		inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			inventario_fisico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			inventario_fisico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$inventario_fisicosResp=array();
		$classes=array();
			
		
				$class=new Classe('inventario_fisico_detalle'); 	$classes[]=$class;
				$class=new Classe('inventario_fisico'); 	$classes[]=$class;
			
			
		$inventario_fisicosRespaldo=$this->inventario_fisicoLogic->getinventario_fisicos();
			
		$this->inventario_fisicoLogic->setIsConDeep(true);
		
		$this->inventario_fisicoLogic->setinventario_fisicos($inventario_fisicos);
			
		$this->inventario_fisicoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$inventario_fisicosLocal=$this->inventario_fisicoLogic->getinventario_fisicos();
			
		/*RESPALDO*/
		$this->inventario_fisicoLogic->setinventario_fisicos($inventario_fisicosRespaldo);
			
		$this->inventario_fisicoLogic->setIsConDeep(false);
		
		if($inventario_fisicosResp!=null);
		
		return $inventario_fisicosLocal;
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
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(inventario_fisico_session $inventario_fisico_session) {
		$inventario_fisico_session->strTypeOnLoad=$this->strTypeOnLoadinventario_fisico;
		$inventario_fisico_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarinventario_fisico;
		$inventario_fisico_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarinventario_fisico;
		$inventario_fisico_session->bitEsPopup=$this->bitEsPopup;
		$inventario_fisico_session->bitEsBusqueda=$this->bitEsBusqueda;
		$inventario_fisico_session->strFuncionJs=$this->strFuncionJs;
		/*$inventario_fisico_session->strSufijo=$this->strSufijo;*/
		$inventario_fisico_session->bitEsRelaciones=$this->bitEsRelaciones;
		$inventario_fisico_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, inventario_fisico_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosinventario_fisico_detalle='none';
			$this->strTienePermisosinventario_fisico_detalle=((Funciones::existeCadenaArray(inventario_fisico_detalle_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosinventario_fisico_detalle='table-cell';

			$this->strTienePermisosinventario_fisico='none';
			$this->strTienePermisosinventario_fisico=((Funciones::existeCadenaArray(inventario_fisico_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosinventario_fisico='table-cell';
		} else {
			

			$this->strTienePermisosinventario_fisico_detalle='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosinventario_fisico_detalle=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, inventario_fisico_detalle_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosinventario_fisico_detalle='table-cell';

			$this->strTienePermisosinventario_fisico='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosinventario_fisico=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, inventario_fisico_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosinventario_fisico='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$inventario_fisicoViewAdditional=new inventario_fisicoView_add();
		$inventario_fisicoViewAdditional->inventario_fisicos=$this->inventario_fisicos;
		$inventario_fisicoViewAdditional->Session=$this->Session;
		
		return $inventario_fisicoViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$inventario_fisicosLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$inventario_fisicosLocal=$this->inventario_fisicos;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$inventario_fisicosLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($inventario_fisicosLocal)<=0) {
					$inventario_fisicosLocal=$this->inventario_fisicos;
				}
			} else {
				$inventario_fisicosLocal=$this->inventario_fisicos;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarinventario_fisicosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarinventario_fisicosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$inventario_fisicoLogic=new inventario_fisico_logic();
		$inventario_fisicoLogic->setinventario_fisicos($this->inventario_fisicos);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));

		if($inventario_fisico_detalle_session==null) {
			$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
		}

		$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));

		if($inventario_fisico_session==null) {
			$inventario_fisico_session=new inventario_fisico_session();
		} 
			
		
			$class=new Classe('inventario_fisico');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$inventario_fisicoLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->inventario_fisicos=$inventario_fisicoLogic->getinventario_fisicos();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->inventario_fisicosLocal=$this->inventario_fisicos;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=inventario_fisico_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=inventario_fisico_util::$STR_TABLE_NAME;		
			
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
			
			$inventario_fisicos = $this->inventario_fisicos;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = inventario_fisico_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = inventario_fisico_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/inventario/presentation/templating/inventario_fisico_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->inventario_fisicos=$inventario_fisicos;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->inventario_fisicosLocal=$inventario_fisicosLocal;
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
		
		$inventario_fisicosLocal=array();
		
		$inventario_fisicosLocal=$this->inventario_fisicos;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarinventario_fisicosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarinventario_fisicosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$inventario_fisicoLogic=new inventario_fisico_logic();
		$inventario_fisicoLogic->setinventario_fisicos($this->inventario_fisicos);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));

		if($inventario_fisico_detalle_session==null) {
			$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
		}

		$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));

		if($inventario_fisico_session==null) {
			$inventario_fisico_session=new inventario_fisico_session();
		} 
			
		
			$class=new Classe('inventario_fisico');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$inventario_fisicoLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->inventario_fisicos=$inventario_fisicoLogic->getinventario_fisicos();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$inventario_fisicos = $this->inventario_fisicos;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = inventario_fisico_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = inventario_fisico_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/inventario/presentation/templating/inventario_fisico_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->inventario_fisicos=$inventario_fisicos;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->inventario_fisicosLocal=$inventario_fisicosLocal;
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
	
	public function getHtmlTablaDatosResumen(array $inventario_fisicos=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->inventario_fisicosReporte = $inventario_fisicos;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarinventario_fisicosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarinventario_fisicosAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $inventario_fisicos=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->inventario_fisicosReporte = $inventario_fisicos;		
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
		
		
		$this->inventario_fisicosReporte=$this->cargarRelaciones($inventario_fisicos);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarinventario_fisicosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarinventario_fisicosAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(inventario_fisico $inventario_fisico=null) : string {	
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
			
			
			$inventario_fisicosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$inventario_fisicosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($inventario_fisicosLocal)<=0) {
					/*//DEBE ESCOGER
					$inventario_fisicosLocal=$this->inventario_fisicos;*/
				}
			} else {
				/*//DEBE ESCOGER
				$inventario_fisicosLocal=$this->inventario_fisicos;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($inventario_fisicosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($inventario_fisicosLocal,true);
			
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
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}
					
			$inventario_fisicosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$inventario_fisicosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($inventario_fisicosLocal)<=0) {
					/*//DEBE ESCOGER
					$inventario_fisicosLocal=$this->inventario_fisicos;*/
				}
			} else {
				/*//DEBE ESCOGER
				$inventario_fisicosLocal=$this->inventario_fisicos;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($inventario_fisicosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($inventario_fisicosLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Inventario Fisicos';
			
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
			$fileName='inventario_fisico';
			
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
			
			$title='Reporte de  Inventario Fisicos';
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
			
			$title='Reporte de  Inventario Fisicos';
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
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Inventario Fisicos';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=inventario_fisico_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->inventario_fisicosAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->inventario_fisicosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->inventario_fisicosAuxiliar)<=0) {
					$this->inventario_fisicosAuxiliar=$this->inventario_fisicos;
				}
			} else {
				$this->inventario_fisicosAuxiliar=$this->inventario_fisicos;
			}
		/*} else {
			$this->inventario_fisicosAuxiliar=$this->inventario_fisicosReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->inventario_fisicosAuxiliar as $inventario_fisico) {
				$row=array();
				
				$row=inventario_fisico_util::getDataReportRow($tipo,$inventario_fisico,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			inventario_fisico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			inventario_fisico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$inventario_fisicosResp=array();
			$classes=array();
			
			
				$class=new Classe('inventario_fisico_detalle'); 	$classes[]=$class;
				$class=new Classe('inventario_fisico'); 	$classes[]=$class;
			
			
			$inventario_fisicosResp=$this->inventario_fisicoLogic->getinventario_fisicos();
			
			$this->inventario_fisicoLogic->setIsConDeep(true);
			
			$this->inventario_fisicoLogic->setinventario_fisicos($this->inventario_fisicosAuxiliar);
			
			$this->inventario_fisicoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->inventario_fisicosAuxiliar=$this->inventario_fisicoLogic->getinventario_fisicos();
			
			//RESPALDO
			$this->inventario_fisicoLogic->setinventario_fisicos($inventario_fisicosResp);
			
			$this->inventario_fisicoLogic->setIsConDeep(false);
			*/
			
			$this->inventario_fisicosAuxiliar=$this->cargarRelaciones($this->inventario_fisicosAuxiliar);
			
			$i=0;
			
			foreach ($this->inventario_fisicosAuxiliar as $inventario_fisico) {
				$row=array();
				
				if($i!=0) {
					$row=inventario_fisico_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=inventario_fisico_util::getDataReportRow($tipo,$inventario_fisico,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//inventario_fisico_detalle
				if(Funciones::existeCadenaArrayOrderBy(inventario_fisico_detalle_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($inventario_fisico->getinventario_fisico_detalles())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(inventario_fisico_detalle_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=inventario_fisico_detalle_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($inventario_fisico->getinventario_fisico_detalles() as $inventario_fisico_detalle) {
						$row=inventario_fisico_detalle_util::getDataReportRow('RELACIONADO',$inventario_fisico_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//inventario_fisico
				if(Funciones::existeCadenaArrayOrderBy(inventario_fisico_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($inventario_fisico->getinventario_fisicos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(inventario_fisico_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=inventario_fisico_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($inventario_fisico->getinventario_fisicos() as $inventario_fisico) {
						$row=inventario_fisico_util::getDataReportRow('RELACIONADO',$inventario_fisico,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->inventario_fisicosAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->inventario_fisicosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->inventario_fisicosAuxiliar)<=0) {
					$this->inventario_fisicosAuxiliar=$this->inventario_fisicos;
				}
			} else {
				$this->inventario_fisicosAuxiliar=$this->inventario_fisicos;
			}
		/*} else {
			$this->inventario_fisicosAuxiliar=$this->inventario_fisicosReporte;	
		}*/
		
		foreach ($this->inventario_fisicosAuxiliar as $inventario_fisico) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(inventario_fisico_util::getinventario_fisicoDescripcion($inventario_fisico),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Inventario Fisico',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Inventario Fisico',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($inventario_fisico->getid_inventario_fisicoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Bodega',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Bodega',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($inventario_fisico->getid_bodegaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($inventario_fisico->getfecha(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($inventario_fisico->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Id Almacen',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Id Almacen',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($inventario_fisico->getid_almacen(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Prod Cont Almacen',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Prod Cont Almacen',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($inventario_fisico->getprod_cont_almacen(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Total Productos Almacen',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Total Productos Almacen',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($inventario_fisico->gettotal_productos_almacen(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Campo1',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Campo1',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($inventario_fisico->getcampo1(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Campo2',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Campo2',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($inventario_fisico->getcampo2(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Campo3',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Campo3',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($inventario_fisico->getcampo3(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface inventario_fisico_base_controlI {			
		
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
		public function getIndiceActual(inventario_fisico $inventario_fisico,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(inventario_fisico $inventario_fisico,array $inventario_fisicos);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : inventario_fisico_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $inventario_fisicos,inventario_fisico $inventario_fisico);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(inventario_fisico_param_return $inventario_fisicoReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(inventario_fisico_session $inventario_fisico_session);		
		public function actualizarInvitadoSessionDivStyleVariables(inventario_fisico_session $inventario_fisico_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(inventario_fisico $inventario_fisicoOrigen,inventario_fisico $inventario_fisico,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(inventario_fisico_control $inventario_fisico_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $inventario_fisicos=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(inventario_fisico_session $inventario_fisico_session);		
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
		public function getHtmlTablaDatosResumen(array $inventario_fisicos=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $inventario_fisicos=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(inventario_fisico $inventario_fisico=null) : string;
		
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
