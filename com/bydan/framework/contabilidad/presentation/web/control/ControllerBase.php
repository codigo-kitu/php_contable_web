<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\web\control;

//include_once('com/bydan/framework/contabilidad/presentation/web/SessionBase.php');

use Exception;

use com\bydan\framework\contabilidad\presentation\web\SessionBase;
use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\business\logic\DatosCliente;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\business\entity\ParameterDivSecciones;
use com\bydan\framework\contabilidad\presentation\web\PaginationLink;

use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\entity\resumen_usuario;
use com\bydan\contabilidad\seguridad\parametro_general_sg\business\entity\parametro_general_sg;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;

class ControllerBase {

	public mixed $params=null; /*?array*/
	public mixed $data=null;  /*?array*/
	public ?SessionBase $Session=null;
	public ?string $layout=null;
	public ?string $action=null;
	
	public ?resumen_usuario $resumenUsuarioActual=null;
	public ?parametro_general_sg $parametroGeneralSgActual=null;
	public ?parametro_general_usuario $parametroGeneralUsuarioActual=null;
	public ?modulo $moduloActual=null;
	public ?opcion $opcionActual=null;
	public ?string $sDescripcionPeriodoSistema=null;
	
	public string $PATH_IMAGEN='';
	
	//TEMPLATING REPORTE
	public bool $paraReporte=true;
	public string $proceso_print='';
	public string $strAuxStyleBackgroundTablaPrincipal='';
	public int $borderValue=1;
	public string $strTamanioTablaPrincipal='100%';
	public string $strAuxStyleBackgroundTitulo='';
	
	public string $strAuxStyleBackgroundContenido='';
	public string $strAuxStyleBackgroundContenidoCabecera='';
	public bool $bitParaReporteOrderBy=true;
	//TEMPLATING REPORTE
	
	
	//TEMPLATING TABLA DATOS
	public string $CSS_CLASS_TABLE='';
	public bool $IS_DEVELOPING=true;
	public string $STR_TIPO_TABLA='';
	public string $STR_PREFIJO_TABLE='';
	public string $STR_TABLE_NAME='';
	public array $classes=array();
	public string $style_tabla='';
	
	public string $style_div='';
	public string $class_cabecera='';
	public string $class_table='';
	//TEMPLATING TABLA DATOS
	
	public string $REQUEST_URL='';
	public string $JSON_PRETTY='';

	function __construct() {

		$this->params=array();
		$this->data=array();
		$this->Session=	new SessionBase();
		$this->layout=	'';
		$this->action=	'';
		
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
						
		/*INICIALIZAR OBJETOS DE CONTROLLERBASE*/
		$this->params=array();
		$this->data=array();
		$this->layout=	'';
		$this->tiposReporte=array();
		/*INICIALIZAR OBJETOS DE CONTROLLERBASE_FIN*/
		
		/*INICIALIZAR SESSION*/
		$this->Session=	new SessionBase();
		$this->activarSession();
		/*INICIALIZAR SESSION*/
		
		
		$this->strFuncionJs='';
		$this->strFuncionJsPadre='';
		$this->strSufijo='';
		$this->strProceso='';
		
		
		$this->intNumeroPaginacionPagina=0;
		$this->paginationLinks=array();
		$this->arrHistoryWebs=array();
		$this->arrSessionBases=array();
		
		$this->arrDatoGeneral=array();
		$this->arrDatoGeneralNo=array();
		$this->arrDatoGeneralMinimos=array();
		
		
		$this->arrNombresClasesRelacionadas=array();
		
		/*RECARGAR_FK*/
		$this->strRecargarFkTipos='TODOS';
		$this->strRecargarFkTiposNinguno='NINGUNO';
		$this->intRecargarFkIdPadre=0;
		$this->strRecargarFkColumna='';
		$this->strRecargarFkQuery='';
		
		$this->bitParaReporteOrderBy=false;
		$this->bitParaReporteOrderByRel=false;
		
		
		$this->strVisibleTablaElementos='none';
		$this->strVisibleTablaAcciones='none';
	}
	
	public function indexBase(bool $bitEsPopup,bool $bitConBusquedaRapida) {

		$this->bitEsPopup=$bitEsPopup;

		if($this->bitEsPopup===false || $this->bitEsPopup==='false' || $this->bitEsPopup===0 || $this->bitEsPopup==null) { 
			$this->bitEsPopup=false;
			
		} else if($this->bitEsPopup===true || $this->bitEsPopup==='true' || $this->bitEsPopup===1) { 
			$this->bitEsPopup=true;	
		}

		/*ACTUALIZAR VALOR ES_BUSQUEDA*/
		if($this->bitEsBusqueda===false || $this->bitEsBusqueda==='false' || $this->bitEsBusqueda==null) {
			$this->bitEsBusqueda=false;
			
		} else if($this->bitEsBusqueda===true || $this->bitEsBusqueda==='true') { 
			$this->bitEsBusqueda=true;	
		}

		/*ACTUALIZAR VALOR ES_RELACIONES*/
		if($this->bitEsRelaciones===false || $this->bitEsRelaciones==='false' || $this->bitEsRelaciones==null) { 
			$this->bitEsRelaciones=false;
			
		} else if($this->bitEsRelaciones===true || $this->bitEsRelaciones==='true') { 
			$this->bitEsRelaciones=true;	
		}
		
		
		/*ACTUALIZAR VALOR ES_RELACIONADO*/
		if($this->bitEsRelacionado===false || $this->bitEsRelacionado==='false' || $this->bitEsRelacionado==null) { 
			$this->bitEsRelacionado=false;
			
		} else if($this->bitEsRelacionado===true || $this->bitEsRelacionado==='true') { 
			$this->bitEsRelacionado=true;	
		}

		/*ACTUALIZAR VALOR BUSQUEDA RAPIDA*/
		$this->bitConBusquedaRapida=$bitConBusquedaRapida;

		if($this->bitConBusquedaRapida===false || $this->bitConBusquedaRapida==='false' || $this->bitConBusquedaRapida==null) { 
			$this->bitConBusquedaRapida=false;
			
		} else if($this->bitConBusquedaRapida===true || $this->bitConBusquedaRapida==='true') { 
			$this->bitConBusquedaRapida=true;	
		}


		$this->arrHistoryWebs=array();			
		$this->arrHistoryWebs=$this->Session->unserialize(Constantes::$SESSION_HISTORY_WEB); //$this->arrHistoryWebs=unserialize($this->Session->read(Constantes::$SESSION_HISTORY_WEB));
		
		if($this->arrHistoryWebs==null) {
			$this->arrHistoryWebs=array();
		}
			
		
		$this->htmlTabla='';
		$this->htmlTablaOrderBy='';
		$this->htmlTablaOrderByRel='';
		$this->htmlTablaReporteAuxiliars='';
		$this->htmlTablaAccionesRelaciones='';


		$this->strAccionBusqueda='Todos';
		$this->pagination=new Pagination();
		$this->bigIdUsuarioSesion=0;	
		$this->strGenerarReporte='';
		/*DEFECTO TRUE, SINO SE DA?A SCROLL INFERIOR*/
		$this->bitConAltoMaximoTabla=true;
		$this->strDetalleReporte='';
		$this->bitEsReporteRelaciones=false;
		
		$this->bitGenerarReporte=false;
		$this->bitGenerarTodos=false;
		$this->strTipoReporte='';
		$this->strTipoAccion='';
		$this->strTipoPaginacion='';

		$this->bitPostAccionNuevo=false;
		$this->bitPostAccionSinCerrar=false;
		$this->bitPostAccionSinMensaje=false;
		
		
		$this->tiposReportes=Funciones::getTiposReportes();
		$this->tiposReporte=Funciones::getListTiposReportes(false,true);
		$this->tiposAcciones=Funciones::getTiposAcciones('NORMAL');
		$this->tiposAccionesFormulario=Funciones::getTiposAcciones('NORMAL');			
		$this->tiposPaginacion=Funciones::getTiposPaginacion('NORMAL');
		
		$this->arrDatoGeneral=array();
		$this->arrDatoGeneralNo=array();
		$this->arrDatoGeneralMinimos=array();
	
		$this->strTipoReporteDefault='PDF';			
		$this->bitGuardarCambiosEnLote=false;		
		
		
		$this->bitEsnuevo=false;
		$this->bitEsMantenimientoRelacionesRelacionadoUnico=false;
		$this->bitEsMantenimientoRelaciones=false;
		$this->bitEsMantenimientoRelacionado=false;
		$this->bitEsBusquedasFK=false;
		$this->bitContieneImagenes=false;
		
		$this->strVisibleTablaElementos='none';
		$this->strVisibleTablaAcciones='none';
		$this->strVisibleTablaAccionesRelaciones='none';
		
		$this->strVisibleCeldaNuevo='hidden';
		$this->strVisibleCeldaActualizar='hidden';
		$this->strVisibleCeldaEliminar='hidden';
		$this->strVisibleCeldaCancelar='hidden';
		$this->strVisibleCeldaGuardar='hidden';


		/*PARAMETROS GENERALES USUARIO*/
		if($this->Session->read('resumenUsuarioActual')!=null) {
			$this->resumenUsuarioActual=unserialize($this->Session->read('resumenUsuarioActual'));
		}
		
		if($this->Session->read('parametroGeneralSgActual')!=null) {
			$this->parametroGeneralSgActual=unserialize($this->Session->read('parametroGeneralSgActual'));
		}
		
		if($this->Session->read('parametroGeneralUsuarioActual')!=null) {
			$this->parametroGeneralUsuarioActual=unserialize($this->Session->read('parametroGeneralUsuarioActual'));
		}
		
		if($this->Session->read('moduloActual')!=null) {
			$this->moduloActual=unserialize($this->Session->read('moduloActual'));
		}
		
		if($this->Session->read('opcionActual')!=null) {
			$this->opcionActual=unserialize($this->Session->read('opcionActual'));
		}
		/*PARAMETROS GENERALES USUARIO*/
			
		if($this->Session->read('periodoActualDescripcion')!=null) {
			$this->sDescripcionPeriodoSistema=' ('.$this->Session->read('periodoActualDescripcion').')';
		}
	}

	public function getCargarOrderByQuery() : string {
		$orderByQuery='';
		
		$orderByQuery=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'ORDEN');
		
		return $orderByQuery;
	}

	public function cargarLinksPaginationBase(int $int_numero_paginacion) {
		$numero_paginas=$this->pagination->getIntNumeroMaximo() / $int_numero_paginacion;
		$numero_pagina=0;
		
		$this->paginationLinks=array();
		$paginationLink=new PaginationLink();
		
		for($i=0,$j=1;$i<$numero_paginas;$i++,$j++) {			
			$paginationLink=new PaginationLink();
			$numero_pagina=$j * $int_numero_paginacion;
			
			$paginationLink->setStrLabel(strval($j));
			$paginationLink->setIntPage($numero_pagina);
			
			$this->paginationLinks[]=$paginationLink;
		}
	}

	public function setstrRecargarFk(string $strRecargarFkTipos='TODOS',string $strRecargarFkTiposNinguno='NINGUNO',int $intRecargarFkIdPadre=0,string $strRecargarFkColumna='') {
		$this->strRecargarFkTipos = $strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno = $strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre = $intRecargarFkIdPadre;
		$this->strRecargarFkColumna = $strRecargarFkColumna;
		$this->strRecargarFkQuery='';
	}

	public function cerrarPagina() {
		try {
			$this->returnHtml(true);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcionBase($e);
		}
	}

	public function returnHtml(bool $tipo) {
	
	}

	public function eliminarVariablesDeSesionBase(string $str_session_name,string $str_session_controller_name) {
		$this->Session->remove($str_session_name);
		$this->Session->remove($str_session_name.'Lista');
		$this->Session->remove($str_session_name.'ListaEliminados');	
		$this->Session->remove($str_session_controller_name);		
	}

	//NO SE APLICA PARA JQUERY, ESTE ASIGNA CON JSON Y JAVASCRIPT
	protected function set(string $name='',object $objectValue=null) {	
	}
	
	//NO SE APLICA PARA JQUERY, SE REDIRECCIONA CON JAVASCRIPT LUEGO DE HACER ALGUN PROCESO,MOSTRAR MENSAJE,ETC
	protected function redirect(array $arrayOptions=array()) {	
	}

	//NO SE APLICA PARA JQUERY, ESTE ES UNA CARACTERISTICA DE CAKEPHP
	protected function render(string $value='') {	
	}
	
	public function getparams() : array {
		return $this->params;
	}

	public function setparams(array $params) {
		$this->params= $params;
	}
	
	public function getdata() : string {
		return $this->data;
	}

	public function setdata(array $data) {
		$this->data= $data;
	}
	
	public function getSession() : SessionBase {
		return $this->Session;
	}

	public function setSession(SessionBase $Session) {
		$this->Session= $Session;
	}
	
	public function getlayout() : string {
		return $this->layout;
	}

	public function setlayout(string $layout) {
		$this->layout= $layout;
	}
	
	public function procesarAccion(object $controller,string $action,bool $return_json) : bool {
		$return_json=true;		
		return $return_json;
	}

	public $request=null;
	public $response=null;
	public $stression=null;
	public $context =null;
	
	public string $strTipoView='';
	public int $intNumeroRegistros=0;
	public int $intNumeroNuevoTabla=0;
	public bool $bitGuardarCambiosEnLote=false;
	/*public bool $bitGenerarReporte;*/
	public bool $bitGenerarTodos=false;
	public bool $bitPostAccionNuevo=false;
	public bool $bitPostAccionSinCerrar=false;
	public bool $bitPostAccionSinMensaje=false;
	
	public bool $bitConBusquedaRapida=false;
	public string $strValorBusquedaRapida='';
	public string $strFuncionBusquedaRapida='';
	
	public bool $bitGenerarReporte=false;		
	
	public string $strPermisoTodo='none';
	public string $strPermisoNuevo='none';
	public string $strPermisoActualizar='none';
	public string $strPermisoActualizarOriginal='none';
	public string $strPermisoEliminar='none';
	public string $strPermisoGuardar='none';
	public string $strPermisoConsulta='none';
	public string $strPermisoBusqueda='none';
	public string $strPermisoReporte='none';
	public string $strPermisoMostrarTodos='none';
	public string $strPermisoPopup='none';
	public string $strPermisoRelaciones='none';
	
	public array $arrDatoGeneral=array();
	public array $arrDatoGeneralNo=array();
	public array $arrDatoGeneralMinimos=array();
	
	public ?array $tiposReportes=null;
	public ?array $tiposReporte=null;
	public ?array $tiposAcciones=null;
	public ?array $tiposAccionesFormulario=null;
	public ?array $tiposPaginacion=null;
	public ?array $tiposColumnasSelect=null;
	public ?array $tiposRelaciones=null;
	public ?array $tiposRelacionesFormulario=null;
	
	public ?string $strTipoReporteDefault=null;
	public ?string $strTipoReporte=null;
	public ?string $strTipoPaginacion=null;
	public ?string $strTipoAccion=null;
	
	public ?Pagination $pagination=null;
	public ?DatosCliente $datosCliente=null;
	public int $intNumeroPaginacion=0;
	public int $intNumeroPaginacionPagina=0;
	public string $strGenerarReporte='';
	public string $strFinalQuerySeleccionarLote='';
	/*DEFECTO TRUE, SINO SE DA?A SCROLL INFERIOR*/
	public bool $bitConAltoMaximoTabla=true;
	public bool $bitConEditar=false;
	public bool $bitConReportico=false;
	public bool $bitEsEventoTabla=false;
	public int $idFilaTablaActual=0;//false;
	public string $strNombreCampoBusqueda='';
	public bool $bitConUiMinimo=false;
	public string $strDetalleReporte='';
	public bool $bitEsReporteRelaciones=false;

	public $jasperPrint = null;
	
	public int $bigIdUsuarioSesion=0;	
	public ?usuario $usuarioActual=null;	
	
	public bool $bitEsnuevo=false;
	public bool $bitEsnuevoGuardarCambios=false;
	public bool $bitEsMantenimientoRelacionesRelacionadoUnico=false;
	public bool $bitEsMantenimientoRelaciones=false;
	public bool $bitEsMantenimientoRelacionado=false;
	public bool $bitEsBusquedasFK=false;
	public bool $bitContieneImagenes=false;

	
	public ?array $arrOrderBy=null;
	public ?array $arrOrderByRel=null;
	public string $orderByQuery='';
	
	public string $strAccionMantenimiento='';
	public string $strAccionBusqueda='';
	public string $strNombreOpcionRetorno='';
	public string $strAccionAdicional='';
	public string $strUltimaBusqueda='';
	
	public $mensaje=null; //?Mensaje
	
	public $facesMessage=null;
					
	public string $strVisibleTablaBusquedas='';					
	public string $strVisibleTablaElementos='none';	
	public string $strVisibleTablaAcciones='';
	public string $strVisibleTablaAccionesRelaciones='';
	
	public string $strVisibleCeldaNuevo='';
	public string $strVisibleCeldaActualizar='';
	public string $strVisibleCeldaEliminar='';
	public string $strVisibleCeldaCancelar='';
	public string $strVisibleCeldaGuardar='';	
			
	public string $strAuxiliarUrlPagina='';		
	public string $strAuxiliarTipo='';	
	public string $strAuxiliarMensaje='';	
	public string $strAuxiliarMensajeJs='';
	public string $strAuxiliarMensajeAlert='';	
	public string $strAuxiliarCssMensaje='';	
	public string $strAuxiliarHtmlReturn1='';
	public string $strAuxiliarHtmlReturn2='';
	public string $strAuxiliarHtmlReturn3='';
	

	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public bool $bitEsPopup=false;
	public bool $bitEsSubPagina=false;
	public bool $bitEsBusqueda=false;
	public string $strFuncionJs='';
	public string $strFuncionJsPadre='';
	public string $strSufijo='';
	public string $strProceso='';
	public bool $bitEsRelaciones=false;
	public bool $bitEsRelacionado=false;	
	public bool $bitParaReporteOrderByRel=false;
	public bool $bitReporteRelacionesGenerado=false;
	public int $bigIdOpcion=0;
	public bool $bitEsAndroid=false;	
	
	public string $strTipoAction='INDEX';
	
	/*RECARGAR_FK*/
	public string $strRecargarFkTipos='';
	public string $strRecargarFkTiposNinguno='';
	public int $intRecargarFkIdPadre=0;
	public string $strRecargarFkColumna='';
	public string $strRecargarFkQuery='';
	
	public string $strTituloTabla='';
	public string $strTituloPathPagina='';
	public string $strTituloPathElementoActual='';
	
	public ?string $strHistoryWebAuxiliar='';
	public ?string $strHistoryWebElementoAuxiliar='';
	
	public string $strStyleDivArbol='';	
	public string $strStyleDivContent='';
	public string $strStyleDivOpcionesBanner='';
	public string $strStyleDivExpandirColapsar='';	
	public string $strStyleDivHeader='';	
	public string $strPermiteRecargarInformacion='';
	
	public ?array $paginationLinks=null;
	
	public ?array $arrHistoryWebs=null;
	public ?array $arrSessionBases=null;
	public ?array $classesActual=array();


	public $paramDivSeccion=null;
	public ?array $arrNombresClasesRelacionadas=null;
	
	public string $htmlTabla='';	
	public string $htmlTablaOrderBy='';
	public string $htmlTablaOrderByRel='';
	public string $htmlTablaReporteAuxiliars='';
	public string $htmlTablaAccionesRelaciones='';
	public string $htmlAuxiliar='';	
	
	
	public bool $bitEsAbrirVentanaAuxiliarUrl=false;//RETORNA JSON PERO REDIRIJE A URL
	public bool $bitEsEjecutarFuncionJavaScript=false;//RETORNA JSON PERO REDIRIJE A URL
	public bool $bitEsGuardarReturnSessionJavaScript=false;//RETORNA JSON PERO REDIRIJE A URL
	
	public function setCargarParameterDivSecciones(
		bool $bitDivsEsCargarGeneralAjaxWebPart=false,
		bool $bitDivEsCargarAjaxWebPart=true,
		bool $bitDivsEsCargarMostrarAjaxWebPart=true,
		bool $bitDivEsCargarMantenimientosAjaxWebPart=true,
		bool $bitDivEsCargarMensajesAjaxWebPart=true,
		bool $bitDivsEsCargarMostrarBusquedasAjaxWebPart=true,
		bool $bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart=true,
		bool $bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart=true,
		bool $bitDivsEsCargarReporteAuxiliarAjaxWebPart=false,
		bool $bitDivsEsCargarResumenAjaxWebPart=false,
		bool $bitDivsEsCargarAccionesRelacionesAjaxWebPart=false,
		bool $bitDivsEsCargarFKsAjaxWebPart=false
	) {
		
		$this->paramDivSeccion=new ParameterDivSecciones();
		
		$this->paramDivSeccion->bitDivsEsCargarGeneralAjaxWebPart=$bitDivsEsCargarGeneralAjaxWebPart;
		$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=$bitDivEsCargarAjaxWebPart;
		$this->paramDivSeccion->bitDivsEsCargarMostrarAjaxWebPart=$bitDivsEsCargarMostrarAjaxWebPart;
		$this->paramDivSeccion->bitDivEsCargarMantenimientosAjaxWebPart=$bitDivEsCargarMantenimientosAjaxWebPart;
		$this->paramDivSeccion->bitDivEsCargarMensajesAjaxWebPart=$bitDivEsCargarMensajesAjaxWebPart;
		$this->paramDivSeccion->bitDivsEsCargarMostrarBusquedasAjaxWebPart=$bitDivsEsCargarMostrarBusquedasAjaxWebPart;
		$this->paramDivSeccion->bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart=$bitDivsEsCargarMostrarSoloBusquedasAjaxWebPart;
		$this->paramDivSeccion->bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart=$bitDivsEsCargarMostrarSoloMantenimientosAjaxWebPart;
		$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=$bitDivsEsCargarReporteAuxiliarAjaxWebPart;
		$this->paramDivSeccion->bitDivsEsCargarResumenAjaxWebPart=$bitDivsEsCargarResumenAjaxWebPart;
		$this->paramDivSeccion->bitDivsEsCargarAccionesRelacionesAjaxWebPart=$bitDivsEsCargarAccionesRelacionesAjaxWebPart;
		$this->paramDivSeccion->bitDivsEsCargarFKsAjaxWebPart=$bitDivsEsCargarFKsAjaxWebPart;
	}


	public function activarSession() {
		/*PARA JQUERY*/
		$this->Session->start();
			
		if(Constantes::$BIT_ES_PRODUCCION) {
			$this->Session->activate();
		}
	}
	
	public function cancelarControlesBase() {			
		$this->strVisibleTablaElementos='none';
		$this->strVisibleTablaAcciones='none';			
		$this->actualizarEstadoCeldasBotonesBase('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);		
	}

	public function actualizarEstadoCeldasBotonesBase(string $strAccion,bool $bitGuardarCambiosEnLote=false,bool $bitEsMantenimientoRelacionado=false){
		if($strAccion=='n') {
			$this->strVisibleCeldaNuevo='visible';
			$this->strVisibleCeldaActualizar='hidden';
			$this->strVisibleCeldaEliminar='hidden';
			$this->strVisibleCeldaCancelar='hidden';
			
			if($bitEsMantenimientoRelacionado==false){ 
				if($bitGuardarCambiosEnLote==true) {
					$this->strVisibleCeldaGuardar='visible';
				} else {
					$this->strVisibleCeldaGuardar='hidden';
				}
			}
		} else if($strAccion=='a') {
			$this->strVisibleCeldaNuevo='hidden';
			$this->strVisibleCeldaActualizar='visible';
			$this->strVisibleCeldaEliminar='hidden';
			$this->strVisibleCeldaCancelar='visible';
			
			if($bitEsMantenimientoRelacionado==false){ 
				if($bitGuardarCambiosEnLote==true) {
					$this->strVisibleCeldaGuardar='visible';
				} else {
					$this->strVisibleCeldaGuardar='hidden';
				}
			}
		} else if($strAccion=='ae') {
			$this->strVisibleCeldaNuevo='hidden';
			$this->strVisibleCeldaActualizar='visible';
			$this->strVisibleCeldaEliminar='visible';
			$this->strVisibleCeldaCancelar='visible';
			
			if($bitEsMantenimientoRelacionado==false){ 
				if($bitGuardarCambiosEnLote==true) {
					$this->strVisibleCeldaGuardar='visible';
				} else {
					$this->strVisibleCeldaGuardar='hidden';
				}
			}
		} else if($strAccion=='ae2') {
			/*Para Mantenimientos de tablas relacionados con mas de columnas minimas*/
			$this->strVisibleCeldaNuevo='hidden';
			$this->strVisibleCeldaActualizar='visible';
			$this->strVisibleCeldaEliminar='hidden';
			$this->strVisibleCeldaCancelar='visible';
			
			if($bitEsMantenimientoRelacionado==false){ 
				if($bitGuardarCambiosEnLote==true) {
					$this->strVisibleCeldaGuardar='hidden';
				} else {
					$this->strVisibleCeldaGuardar='hidden';
				}
			}
		} else if($strAccion=='c') {
			$this->strVisibleCeldaNuevo='visible';
			$this->strVisibleCeldaActualizar='hidden';
			$this->strVisibleCeldaEliminar='hidden';
			$this->strVisibleCeldaCancelar='hidden';
			
			if($bitEsMantenimientoRelacionado==false){ 
				if($bitGuardarCambiosEnLote==true) {
					$this->strVisibleCeldaGuardar='visible';
				} else {
					$this->strVisibleCeldaGuardar='hidden';
				}
			}
		} else if($strAccion=='t') {
			$this->strVisibleCeldaNuevo='hidden';
			$this->strVisibleCeldaActualizar='hidden';
			$this->strVisibleCeldaEliminar='hidden';
			$this->strVisibleCeldaCancelar='hidden';
			
			if($bitEsMantenimientoRelacionado==false){ 
				if($bitGuardarCambiosEnLote==true) {
					$this->strVisibleCeldaGuardar='hidden';
				} else {
					$this->strVisibleCeldaGuardar='hidden';
				}
			}
		}
	}
	
	public function inicializarAuxiliaresBase() {
		$this->strAuxiliarHtmlReturn1='';
		$this->strAuxiliarHtmlReturn2='';
		$this->strAuxiliarHtmlReturn3='';
		
		$this->inicializarMensajesTipoBase('INICIALIZAR',null);				
	}

	public function inicializarMensajesTipoBase(string $tipo,$e=null) {
		if($tipo=='ACTUALIZAR') {
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_DATOS_ACTUALIZADOS;
			$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_DATOS_ACTUALIZADOS;
			
		} else if($tipo=='NUEVO_TABLA') {
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_DATOS_ACTUALIZADOS;
			
		} else if($tipo=='ELIMINAR' || $tipo=='ELIMINAR_CASCADA') {
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_DATOS_ACTUALIZADOS;
			$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_DATOS_ACTUALIZADOS;
			
		} else if($tipo=='GUARDAR_CAMBIOS') {
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_DATOS_ACTUALIZADOS;
			$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_DATOS_ACTUALIZADOS;
			
		} else if($tipo=='DUPLICAR') {
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_DATOS_ACTUALIZADOS;
			$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_DATOS_ACTUALIZADOS;
			
		} else if($tipo=='COPIAR') {
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_DATOS_ACTUALIZADOS;
			$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_DATOS_ACTUALIZADOS;
			
		} else if($tipo=='INDEX') {
			$this->strAuxiliarCssMensaje=Constantes::$STR_MENSAJE_INFO;
			$this->strAuxiliarMensaje='';
			$this->strAuxiliarMensajeAlert='';
			
		} else if($tipo=='INICIALIZAR') {
			$this->strAuxiliarCssMensaje ='';
			$this->strAuxiliarMensaje ='';
			$this->strAuxiliarMensajeJs ='';
			$this->strAuxiliarMensajeAlert ='';
			
		} else if($tipo=='EXCEPTION') {
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
			$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.':'.$e->getMessage();
			$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.':'.$e->getMessage();
			
		} else if($tipo=='PROCESAR') {
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_PROCESO_CORRECTO;
			$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_PROCESO_CORRECTO;
		}
	}

	public function cargarDatosClienteBase() {
		$this->datosCliente=new DatosCliente();
		if($this->bigIdUsuarioSesion!=null){$this->datosCliente->setIdUsuario($this->bigIdUsuarioSesion);}
			
		/*if(httpServletRequest.getRemoteUser()!=null){*/
		$this->datosCliente->setstrUsuarioPC('');
		$this->datosCliente->setstrNamePC(array_key_exists('REMOTE_HOST',$_SERVER)? $_SERVER['REMOTE_HOST']:'');
		$this->datosCliente->setstrIPPC(array_key_exists('REMOTE_ADDR',$_SERVER)? $_SERVER['REMOTE_ADDR']:'');		
	}

	public function setPermisosUsuarioConPermisoBase(string $strPermiso) {
		$this->strPermisoTodo=$strPermiso;
		$this->strPermisoNuevo=$strPermiso;
		$this->strPermisoActualizar=$strPermiso;
		$this->strPermisoActualizarOriginal=$strPermiso;
		$this->strPermisoEliminar=$strPermiso;
		$this->strPermisoGuardar=$strPermiso;
		$this->strPermisoConsulta=$strPermiso;
		$this->strPermisoBusqueda=$strPermiso;
		$this->strPermisoReporte=$strPermiso;
		$this->strPermisoMostrarTodos=$strPermiso;
	}

	public function setPermisosMantenimientoUsuarioConPermisoBase(string $strPermiso) {
		/*$this->strPermisoTodo=$strPermiso;*/
		$this->strPermisoNuevo=$strPermiso;
		$this->strPermisoActualizar=$strPermiso;
		$this->strPermisoActualizarOriginal=$strPermiso;
		$this->strPermisoEliminar=$strPermiso;
		$this->strPermisoGuardar=$strPermiso;
		/*$this->strPermisoConsulta=$strPermiso;
		$this->strPermisoBusqueda=$strPermiso;
		$this->strPermisoReporte=$strPermiso;*/
	}

	public function inicializarPermisosBase() {
		$this->strPermisoTodo='none';
		$this->strPermisoNuevo='none';
		$this->strPermisoActualizar='none';
		$this->strPermisoActualizarOriginal='none';
		$this->strPermisoEliminar='none';
		$this->strPermisoGuardar='none';
		$this->strPermisoConsulta='table-row';
		$this->strPermisoBusqueda='table-row';
		$this->strPermisoReporte='table-row';
		$this->strPermisoMostrarTodos='table-row';
		$this->strPermisoPopup='none';
		$this->strPermisoRelaciones='table-cell';
	}

	public function manejarRetornarExcepcionBase(Exception $e) {
		$this->setCargarParameterDivSecciones(false,false,false,false,true,false,false,false,false,false,false,false);				
		
		$this->inicializarMensajesTipoBase('EXCEPTION',$e);
		
		/*SOLO SI ES NECESARIO*/
		/*$this->saveGetSessionControllerAndPageAuxiliarTipoUrl(true);*/	
			
		Funciones::logShowExceptionMessages($e);
			
		//$this->returnAjax();
	}

	public function setTipoActionBase(string $action='INDEX') {
		
		if($action=='load' || $action=='index' 
			|| $action=='indexRecargarRelacionado') {

			$this->strTipoAction='INDEX';
			
		} else if($action=='unload') {
			$this->strTipoAction='UNLOAD';
		
		} else if($action=='recargarInformacion' || $action=='buscarPorIdGeneral' 
					|| $action=='anteriores' || $action=='siguientes' 
					|| $action=='recargarUltimaInformacion'
				 ) {
					
			$this->strTipoAction='BUSQUEDA';
		
		} else if($action=='seleccionarLoteFk' || $action=='seleccionarActual' 
					|| $action=='seleccionarMostrarDivResumen') {

			$this->strTipoAction='SELECCIONAR';
			
		} else if($action=='nuevo' || $action=='actualizar' || $action=='eliminar' 
					|| $action=='guardarCambios') {

			$this->strTipoAction='MANTENIMIENTO';
		
		} else if($action=='recargarReferencias') {
			$this->strTipoAction='RECARGAR';
		
		} else if($action=='cargarArbol') {
			$this->strTipoAction='CARGAR';
			
		} else if($action=='generarFpdf' || $action=='generarHtmlReporte' 
					|| $action=='generarHtmlFormReporte' 
					|| $action=='generarReporteConPhpExcel' 
					|| $action=='generarReporteConPhpExcelVertical' 
					|| $action=='generarReporteConPhpExcelRelaciones') {

			$this->strTipoAction='REPORTE';
		}
	}

	public function inicializarParametrosQueryStringBase(mixed $post) {
		$this->data=array();
		$nombrecompuesto=array();
		
		foreach($post as $postx  => $value) {
			$nombrecompuesto=preg_split("/-/",$postx);
			/*split(*/
			
			if(count($nombrecompuesto)==1){
				$this->data[$postx]=$value;
			} else {
				$this->data[$nombrecompuesto[0]][$nombrecompuesto[1]]=$value;
			}
		}
	}

	public function getDataCampoFormTabla(string $form,string $campo) {
		$campo_form=null;

		if($this->esDataArray()) {
			$campo_form = $this->data[$form][$campo];
		} else {
			$campo_form = $this->data->{$form}->{$campo};
		}

		return $campo_form;
	}

	public function setDataCampoForm(string $form,string $campo,mixed $value) {
		if($this->esDataArray()) {
			$this->data[$form][$campo] = $value;		
		} else {
			$this->data->{$form}->{$campo} = $value;
		}
	}

	public function existDataCampoFormTabla(string $campo,string $form) : bool {
		$exist=true;

		if($this->esDataArray()) {
			$exist = array_key_exists($campo,$this->data[$form]);
		} else {
			$exist = property_exists($this->data->{$form},$campo);
		}

		return $exist;
	}

	public function setExistDataCampoForm(string $form,string $campo,mixed $value) {
		if($this->esDataArray()) {
			$this->setDataCampoForm($form,$campo,$value);

		} else {
			if(!property_exists($this->data,$form)) {
				$form1 = (object) [];
				$form1->{$campo} = $value;

				$this->data->{$form} = $form1;
				
			} else {
				$this->setDataCampoForm($form,$campo,$value);
			}
		}
	}

	public function existDataTabla(string $tabla) : bool {
		$exist=false;
		
		if($this->esDataArray()) {
			$exist = array_key_exists($tabla,$this->data);			
		} else {
			$exist = property_exists($this->data,$tabla);
		}

		return $exist;
	}

	public function getDataGeneralString(string $clave) : string {	   
		$data_general= '';

		if($this->esDataArray()) { 
	    	$data_general = array_key_exists($clave,$this->data) ? $this->data[$clave] : '';
		} else {
			$data_general = property_exists($this->data,$clave) ? $this->data->{$clave} : '';
		}

	    return $data_general;
	}
	
	public function esDataArray() : bool {			
		return is_array($this->data);
	}

	public function esParamsArray() : bool {	
		return is_array($this->params);
	}

	public function tieneParametrosMantenimientoDatos() { 
		$tiene=false;

		if($this->esDataArray()) {
			if((array_key_exists('id',$this->data) && $this->data['id']!=null) 
				&& (array_key_exists('versionrow',$this->data) && $this->data['versionrow']!=null)) {

					$tiene=true;
			}
		
		} else {
			if((property_exists($this->data,'id') && $this->data->{'id'}!=null) 
				&& (property_exists($this->data,'versionrow') && $this->data->{'versionrow'}!=null)) {

					$tiene=true;
			}
		}

		return $tiene;
	}

	public function cargarParametrosReporteBase(string $sufijo) {

		if($this->esDataArray()) {

			if(array_key_exists('ParamsBuscar',$this->data) && isset($this->data['ParamsBuscar'])) {
				/*//GENERAR REPORTE AHORA ES POR COMBO
				$this->strGenerarReporte=Funciones::getBooleanFromDataValue($this->data['ParamsBuscar']['chbGenerarReporte']);*/
				$this->bitGenerarReporte=Funciones::getBooleanFromDataValue($this->strGenerarReporte);
				
				if(array_key_exists('cmbGenerarReporte',$this->data['ParamsBuscar'])) {
					$this->strTipoReporte=$this->data['ParamsBuscar']['cmbGenerarReporte'];
				}
				
				if(array_key_exists('cmbPaginacion',$this->data['ParamsBuscar'])) {
					$this->strTipoPaginacion=$this->data['ParamsBuscar']['cmbPaginacion'];
				}
				
				if(array_key_exists('cmbAcciones',$this->data['ParamsBuscar'])) {
					$this->strTipoAccion=$this->data['ParamsBuscar']['cmbAcciones'];
				}
				
				if(array_key_exists('chbConAltoMaximoTabla',$this->data['ParamsBuscar'])) {			
					$this->bitConAltoMaximoTabla=Funciones::getBooleanFromDataValue($this->data['ParamsBuscar']['chbConAltoMaximoTabla']);	
				}
				
				/*CON EDITAR*/
				$this->bitConEditar=array_key_exists('chbConEditar',$this->data['ParamsBuscar']) ? Funciones::getBooleanFromDataValue($this->data['ParamsBuscar']['chbConEditar']):false;
				
				if($this->bitEsRelacionado) {
					//ESTE CONTROL SE UBICA EN FORM PAGINACION, ES AUXILIAR PARA PERMITIR EDITAR RELACIONADOS
					$this->bitConEditar=array_key_exists('chbConEditar'.$sufijo,$this->data['ParamsBuscar']) ? Funciones::getBooleanFromDataValue($this->data['ParamsBuscar']['chbConEditar'.$sufijo]):false;
				}
				/*CON EDITAR FIN*/
				
				$this->bitConUiMinimo=array_key_exists('chbConUiMinimo',$this->data['ParamsBuscar']) ? Funciones::getBooleanFromDataValue($this->data['ParamsBuscar']['chbConUiMinimo']):false;
				
				$this->bitConReportico=array_key_exists('chbConReportico',$this->data['ParamsBuscar']) ? Funciones::getBooleanFromDataValue($this->data['ParamsBuscar']['chbConReportico']):false;
				
				/*$this->bitGenerarTodos=$this->bitConAltoMaximoTabla;
				$this->intNumeroRegistros=$this->data['ParamsBuscar']['txtNumeroRegistros'.$sufijo];*/
			}
		
		} else { 
			if($this->data!=null) {
				if(property_exists($this->data,'ParamsBuscar') && isset($this->data->{'ParamsBuscar'})) {
					/*//GENERAR REPORTE AHORA ES POR COMBO
					$this->strGenerarReporte=Funciones::getBooleanFromDataValue($this->data['ParamsBuscar']['chbGenerarReporte']);*/
					$this->bitGenerarReporte=Funciones::getBooleanFromDataValue($this->strGenerarReporte);
					
					if(property_exists($this->data->{'ParamsBuscar'},'cmbGenerarReporte')) {
						$this->strTipoReporte=$this->data->{'ParamsBuscar'}->{'cmbGenerarReporte'};
					}
					
					if(property_exists($this->data->{'ParamsBuscar'},'cmbPaginacion')) {
						$this->strTipoPaginacion=$this->data->{'ParamsBuscar'}->{'cmbPaginacion'};
					}
					
					if(property_exists($this->data->{'ParamsBuscar'},'cmbAcciones')) {
						$this->strTipoAccion=$this->data->{'ParamsBuscar'}->{'cmbAcciones'};
					}
					
					if(property_exists($this->data->{'ParamsBuscar'},'chbConAltoMaximoTabla')) {			
						$this->bitConAltoMaximoTabla=Funciones::getBooleanFromDataValue($this->data->{'ParamsBuscar'}->{'chbConAltoMaximoTabla'});	
					}
					
					/*CON EDITAR*/
					$this->bitConEditar=property_exists($this->data->{'ParamsBuscar'},'chbConEditar') ? Funciones::getBooleanFromDataValue($this->data->{'ParamsBuscar'}->{'chbConEditar'}):false;
					
					if($this->bitEsRelacionado) {
						//ESTE CONTROL SE UBICA EN FORM PAGINACION, ES AUXILIAR PARA PERMITIR EDITAR RELACIONADOS
						$this->bitConEditar=property_exists($this->data->{'ParamsBuscar'},'chbConEditar'.$sufijo) ? Funciones::getBooleanFromDataValue($this->data->{'ParamsBuscar'}->{'chbConEditar'.$sufijo}):false;
					}
					/*CON EDITAR FIN*/
					
					$this->bitConUiMinimo=property_exists($this->data->{'ParamsBuscar'},'chbConUiMinimo') ? Funciones::getBooleanFromDataValue($this->data->{'ParamsBuscar'}->{'chbConUiMinimo'}):false;
					
					$this->bitConReportico=property_exists($this->data->{'ParamsBuscar'},'chbConReportico') ? Funciones::getBooleanFromDataValue($this->data->{'ParamsBuscar'}->{'chbConReportico'}):false;
					
					/*$this->bitGenerarTodos=$this->bitConAltoMaximoTabla;
					$this->intNumeroRegistros=$this->data['ParamsBuscar']['txtNumeroRegistros'.$sufijo];*/
				}
			}
		}

		/*
			$this->strTipoReporte=$this->data['ParamsBuscar']['cmbGenerarReporte'];
			$this->strTipoPaginacion=$this->data['ParamsBuscar']['cmbPaginacion'];
			$this->strTipoAccion=$this->data['ParamsBuscar']['cmbAcciones'];
			$this->bitConAltoMaximoTabla=$this->data['ParamsBuscar']['chbConAltoMaximoTabla'];
			$this->bitConEditar=$this->data['ParamsBuscar']['chbConEditar']
			$this->bitConUiMinimo=$this->data['ParamsBuscar']['chbConUiMinimo']
			$this->bitConReportico=$this->data['ParamsBuscar']['chbConReportico']
		*/
	}

	public function cargarParamsPostAccionBase() {
		
		if($this->esDataArray()) {
			if(array_key_exists('ParamsPostAccion',$this->data) && isset($this->data['ParamsPostAccion'])) {		
				
				$this->bitPostAccionNuevo=array_key_exists('chbPostAccionNuevo',$this->data['ParamsPostAccion'])? Funciones::getBooleanFromDataValue($this->data['ParamsPostAccion']['chbPostAccionNuevo']):false;			
				$this->bitPostAccionSinMensaje=array_key_exists('chbPostAccionSinMensaje',$this->data['ParamsPostAccion'])? Funciones::getBooleanFromDataValue($this->data['ParamsPostAccion']['chbPostAccionSinMensaje']):false;
				$this->bitPostAccionSinCerrar=array_key_exists('chbPostAccionSinCerrar',$this->data['ParamsPostAccion'])? Funciones::getBooleanFromDataValue($this->data['ParamsPostAccion']['chbPostAccionSinCerrar']):false;			
			}		
		} else {
			if($this->data!=null) {
				if(property_exists($this->data,'ParamsPostAccion') && isset($this->data->{'ParamsPostAccion'})) {		
					
					$this->bitPostAccionNuevo=property_exists($this->data->{'ParamsPostAccion'},'chbPostAccionNuevo')? Funciones::getBooleanFromDataValue($this->data->{'ParamsPostAccion'}->{'chbPostAccionNuevo'}):false;			
					$this->bitPostAccionSinMensaje=property_exists($this->data->{'ParamsPostAccion'},'chbPostAccionSinMensaje')? Funciones::getBooleanFromDataValue($this->data->{'ParamsPostAccion'}->{'chbPostAccionSinMensaje'}):false;
					$this->bitPostAccionSinCerrar=property_exists($this->data->{'ParamsPostAccion'},'chbPostAccionSinCerrar')? Funciones::getBooleanFromDataValue($this->data->{'ParamsPostAccion'}->{'chbPostAccionSinCerrar'}):false;			
				}
			}	
		}

		/* 
			$this->bitPostAccionNuevo=$this->data['ParamsPostAccion']['chbPostAccionNuevo']
			$this->bitPostAccionSinMensaje=$this->data['ParamsPostAccion']['chbPostAccionSinMensaje']
			$this->bitPostAccionSinMensaje=$this->data['ParamsPostAccion']['chbPostAccionSinCerrar']
		*/
	}

	public function cargarParamsPaginarBase(string $sufijo) {
		if($this->esDataArray()) {
			if(isset($this->data['ParamsPaginar'])) {
				if(array_key_exists('txtNumeroNuevoTabla'.$sufijo,$this->data['ParamsPaginar'])) {
					$this->intNumeroNuevoTabla=(int)$this->data['ParamsPaginar']['txtNumeroNuevoTabla'.$sufijo];			
				}
			}
		} else {
			if(isset($this->data->{'ParamsPaginar'})) {
				if(property_exists($this->data->{'ParamsPaginar'},'txtNumeroNuevoTabla'.$sufijo)) {
					$this->intNumeroNuevoTabla=(int)$this->data->{'ParamsPaginar'}->{'txtNumeroNuevoTabla'.$sufijo};			
				}
			}
		}

		/*
			$this->intNumeroNuevoTabla=$this->data['ParamsPaginar']['txtNumeroNuevoTabla']
		*/
	}

	public function cargarParametrosEventosTablaBase() {
		if($this->esDataArray()) {
			$this->bitEsEventoTabla=array_key_exists('es_evento_tabla',$this->data) ? Funciones::getBooleanFromDataValue($this->data['es_evento_tabla']):false;
			
			$this->idFilaTablaActual=array_key_exists('id_fila_tabla',$this->data) ? (int)$this->data['id_fila_tabla']:0;
			
			if($this->bitEsEventoTabla) {
				$this->paramDivSeccion->bitDivEsCargarMantenimientoFilaTablaAjaxWebPart=true;
			}
			
			$this->strNombreCampoBusqueda=array_key_exists('campo_busqueda',$this->data) ? $this->data['campo_busqueda']:'';				
		
		} else {

			if($this->data!=null) {
				$this->bitEsEventoTabla=property_exists($this->data,'es_evento_tabla') ? Funciones::getBooleanFromDataValue($this->data->{'es_evento_tabla'}):false;
				
				$this->idFilaTablaActual=property_exists($this->data,'id_fila_tabla') ? (int)$this->data->{'id_fila_tabla'}:0;
				
				if($this->bitEsEventoTabla) {
					$this->paramDivSeccion->bitDivEsCargarMantenimientoFilaTablaAjaxWebPart=true;
				}
				
				$this->strNombreCampoBusqueda=property_exists($this->data,'campo_busqueda') ? $this->data->{'campo_busqueda'}:'';				
			}
		}

		/*
			$this->bitEsEventoTabla=$this->data['es_evento_tabla'];
			$this->idFilaTablaActual=$this->data['id_fila_tabla'];
			$this->strNombreCampoBusqueda=$this->data['campo_busqueda'];
		*/
	}

	public function cargarParametrosPaginaBase() {
		
		if($this->esDataArray()) {
			if(array_key_exists(Constantes::$ES_POPUP,$this->data)) {
				$this->bitEsPopup=($this->data[Constantes::$ES_POPUP]=='true')? true : false;
			}
					
			if(array_key_exists(Constantes::$ES_SUB_PAGINA,$this->data)) {
				$this->bitEsSubPagina=($this->data[Constantes::$ES_SUB_PAGINA]=='true')? true : false;
			}
					
			if(array_key_exists(Constantes::$ES_BUSQUEDA,$this->data)) {
				$this->bitEsBusqueda=($this->data[Constantes::$ES_BUSQUEDA]=='true')? true : false;
			}
					
			if(array_key_exists(Constantes::$FUNCION_JS,$this->data)) {
				$this->strFuncionJs=$this->data[Constantes::$FUNCION_JS];
			}
					
			if(array_key_exists(Constantes::$SUFIJO,$this->data)) {
				$this->strSufijo=$this->data[Constantes::$SUFIJO];
			}
					
			if(array_key_exists(Constantes::$ES_RELACIONES,$this->data)) {
				$this->bitEsRelaciones=($this->data[Constantes::$ES_RELACIONES]=='true')? true : false;
			}
					
			if(array_key_exists(Constantes::$ES_RELACIONADO,$this->data)) {
				$this->bitEsRelacionado=($this->data[Constantes::$ES_RELACIONADO]=='true')? true : false;
			}
					
			if(array_key_exists('id_opcion',$this->data)) {
				$this->bigIdOpcion=(int)$this->data['id_opcion'];
			}

		} else {

			if(property_exists($this->data,Constantes::$ES_POPUP)) {
				$this->bitEsPopup=($this->data->{Constantes::$ES_POPUP}=='true')? true : false;
			}
					
			if(property_exists($this->data,Constantes::$ES_SUB_PAGINA)) {
				$this->bitEsSubPagina=($this->data->{Constantes::$ES_SUB_PAGINA}=='true')? true : false;
			}
					
			if(property_exists($this->data,Constantes::$ES_BUSQUEDA)) {
				$this->bitEsBusqueda=($this->data->{Constantes::$ES_BUSQUEDA}=='true')? true : false;
			}
					
			if(property_exists($this->data,Constantes::$FUNCION_JS)) {
				$this->strFuncionJs=$this->data->{Constantes::$FUNCION_JS};
			}
					
			if(property_exists($this->data,Constantes::$SUFIJO)) {
				$this->strSufijo=$this->data->{Constantes::$SUFIJO};
			}
					
			if(property_exists($this->data,Constantes::$ES_RELACIONES)) {
				$this->bitEsRelaciones=($this->data->{Constantes::$ES_RELACIONES}=='true')? true : false;
			}
					
			if(property_exists($this->data,Constantes::$ES_RELACIONADO)) {
				$this->bitEsRelacionado=($this->data->{Constantes::$ES_RELACIONADO}=='true')? true : false;
			}
					
			if(property_exists($this->data,'id_opcion')) {
				$this->bigIdOpcion=(int)$this->data->{'id_opcion'};
			}
		}
	}

	public function getDataAction() {
		$action = '';

		if($this->esDataArray()) {		
			$action = $this->data['action'];
		} else {
			if($this->data!=null) {
				$action = $this->data->{'action'};
			}
		}

		return $action;

		/*
			$action = $this->data['action'];
		*/
	}

	public function getDataEsAndroid() {
		$bitEsAndroid = false;

		if($this->esDataArray()) {
			if(array_key_exists('ES_ANDROID',$this->data)) {
				$bitEsAndroid=($this->data['ES_ANDROID']=="true")? true : false;
			}
		} else {
			if(property_exists($this->data,'ES_ANDROID')) {
				$bitEsAndroid=($this->data->{'ES_ANDROID'}=="true")? true : false;
			}
		}

		return $bitEsAndroid;
	}

	public function getDataId() : int {
		$id = -999;

		if($this->esDataArray()) {
			if(array_key_exists('id',$this->data)) {
				$id = (int)$this->data['id'];
			}
		} else {
			if(property_exists($this->data,'id')) {
				$id = (int)$this->data->{'id'};
			}
		}

		return $id;
	}

	public function getDataFormId() : int {
		if($this->esDataArray()) {
			$id = (int)$this->data['form']['id'];
		} else {
			$id = (int)$this->data->{'form'}->{'id'};
		}

		return $id;
	}

	public function getDataRecargarPartes() {

		if($this->esDataArray()) {
			if(array_key_exists('strRecargarFkTipos',$this->data) 
				&& $this->data['strRecargarFkTipos']!=null 
				&& $this->data['strRecargarFkTipos']!='') {

				$this->strRecargarFkTipos=$this->data['strRecargarFkTipos'];
			}
			
			if(array_key_exists('strRecargarFkTiposNinguno',$this->data) 
				&& $this->data['strRecargarFkTiposNinguno']!=null 
				&& $this->data['strRecargarFkTiposNinguno']!='') {

				$this->strRecargarFkTiposNinguno=$this->data['strRecargarFkTiposNinguno'];
			}
			
			if(array_key_exists('intRecargarFkIdPadre',$this->data) 
				&& $this->data['intRecargarFkIdPadre']!=null 
				&& $this->data['intRecargarFkIdPadre']!='') {

				$this->intRecargarFkIdPadre=(int)$this->data['intRecargarFkIdPadre'];
			}
			
			if(array_key_exists('strRecargarFkColumna',$this->data) 
				&& $this->data['strRecargarFkColumna']!=null 
				&& $this->data['strRecargarFkColumna']!='') {

				$this->strRecargarFkColumna=$this->data['strRecargarFkColumna'];
			}

		} else {
			if(property_exists($this->data,'strRecargarFkTipos') 
				&& $this->data->{'strRecargarFkTipos'}!=null 
				&& $this->data->{'strRecargarFkTipos'}!='') {

				$this->strRecargarFkTipos=$this->data->{'strRecargarFkTipos'};
			}
			
			if(property_exists($this->data,'strRecargarFkTiposNinguno') 
				&& $this->data->{'strRecargarFkTiposNinguno'}!=null 
				&& $this->data->{'strRecargarFkTiposNinguno'}!='') {

				$this->strRecargarFkTiposNinguno=$this->data->{'strRecargarFkTiposNinguno'};
			}
			
			if(property_exists($this->data,'intRecargarFkIdPadre') 
				&& $this->data->{'intRecargarFkIdPadre'}!=null 
				&& $this->data->{'intRecargarFkIdPadre'}!='') {

				$this->intRecargarFkIdPadre=(int)$this->data->{'intRecargarFkIdPadre'};
			}
			
			if(property_exists($this->data,'strRecargarFkColumna') 
				&& $this->data->{'strRecargarFkColumna'}!=null 
				&& $this->data->{'strRecargarFkColumna'}!='') {

				$this->strRecargarFkColumna=$this->data->{'strRecargarFkColumna'};
			}
		}
	}

	public function getDataEventoControl() {
		$sTipoControl = '';

		if($this->esDataArray()) {
			if(array_key_exists('evento_control',$this->data)) {
				$sTipoControl=$this->data['evento_control'];
			}
		} else {
			if(property_exists($this->data,'evento_control')) {
				$sTipoControl=$this->data->{'evento_control'};
			}
		}

		return $sTipoControl;
	}

	public function getDataEventoTipo() {
		$sTipoEvento = '';

		if($this->esDataArray()) {
			if(array_key_exists('evento_tipo',$this->data)) {
				$sTipoEvento=$this->data['evento_tipo'];
			}
		} else {
			if(property_exists($this->data,'evento_tipo')) {
				$sTipoEvento=$this->data->{'evento_tipo'};
			}
		}

		return $sTipoEvento;
	}

	public function getDataTipoReporte() {
		$tipo_reporte='';

		if($this->esDataArray()) {
			$tipo_reporte=$this->data['tipo_reporte'];
		} else {
			$tipo_reporte=$this->data->{'tipo_reporte'};
		}

		return $tipo_reporte;
	}
	
	public function getDataCheckBoxId(int $i) {
		$checkbox_id=null;

		if($this->esDataArray()) {
			if(array_key_exists('t'.$this->strSufijo,$this->data) && array_key_exists('id_'.$i,$this->data['t'.$this->strSufijo])) {				
				$checkbox_id=(int)$this->data['t'.$this->strSufijo]['id_'.$i];			
			}
		} else {
			if(property_exists($this->data,'t'.$this->strSufijo) && property_exists($this->data->{'t'.$this->strSufijo},'id_'.$i)) {				
				$checkbox_id=(int)$this->data->{'t'.$this->strSufijo}->{'id_'.$i};			
			}
		}

		return $checkbox_id;
	}

	public function getDataMaximaFila() : int {
		$maxima_fila = -999;

		if($this->esDataArray()) {
			$maxima_fila = (int)$this->data['t'.$this->strSufijo]['maxima_fila'];	
		} else {
			$maxima_fila = (int)$this->data->{'t'.$this->strSufijo}->{'maxima_fila'};
		}

		return $maxima_fila;
	}

	public function getDataParaReporteOrderBy() {
		$checkbox_parareporte=null;
		
		if($this->esDataArray()) {

			if(array_key_exists('to',$this->data) && array_key_exists('parareporte_orderby',$this->data['to'])) {		
				if($this->data['to']['parareporte_orderby']!=null) {		
					$checkbox_parareporte=$this->data['to']['parareporte_orderby'];					
					
					if($checkbox_parareporte!=null && ($checkbox_parareporte=='on' || $checkbox_parareporte==true || $checkbox_parareporte==1)) {										
						$this->bitParaReporteOrderBy=true;					
					}
				}
			}	
		} else {
			if(property_exists($this->data,'to') && property_exists($this->data->{'to'},'parareporte_orderby')) {		
				if($this->data->{'to'}->{'parareporte_orderby'}!=null) {		
					$checkbox_parareporte=$this->data->{'to'}->{'parareporte_orderby'};					
					
					if($checkbox_parareporte!=null && ($checkbox_parareporte=='on' || $checkbox_parareporte==true || $checkbox_parareporte==1)) {										
						$this->bitParaReporteOrderBy=true;					
					}
				}
			}
		}			
	}

	public function getDataParaReporteOrderByFromData() {

		if($this->esDataArray()) {
			if($this->data['to']['parareporte_orderby']!=null) {
				$checkbox_parareporte=$this->data['to']['parareporte_orderby'];					
				
				if($checkbox_parareporte!=null && ($checkbox_parareporte=='on' || $checkbox_parareporte==true || $checkbox_parareporte==1)) {
					$this->bitParaReporteOrderBy=true;
				}
			}
		} else {
			if($this->data->{'to'}->{'parareporte_orderby'}!=null) {
				$checkbox_parareporte=$this->data->{'to'}->{'parareporte_orderby'};					
				
				if($checkbox_parareporte!=null && ($checkbox_parareporte=='on' || $checkbox_parareporte==true || $checkbox_parareporte==1)) {
					$this->bitParaReporteOrderBy=true;
				}
			}
		}		
	}

	public function getDataParaReporteOrderByRelFromData() {

		if($this->esDataArray()) {
			if($this->data['tor']['parareporte_orderbyrel']!=null) {
				$checkbox_parareporte_rel=$this->data['tor']['parareporte_orderbyrel'];					
				if($checkbox_parareporte_rel!=null && ($checkbox_parareporte_rel=='on' || $checkbox_parareporte_rel==true || $checkbox_parareporte_rel==1)) {
					$this->bitParaReporteOrderByRel=true;
				}
			}
		} else {
			if($this->data->{'tor'}->{'parareporte_orderbyrel'}!=null) {
				$checkbox_parareporte_rel=$this->data->{'tor'}->{'parareporte_orderbyrel'};					
				if($checkbox_parareporte_rel!=null && ($checkbox_parareporte_rel=='on' || $checkbox_parareporte_rel==true || $checkbox_parareporte_rel==1)) {
					$this->bitParaReporteOrderByRel=true;
				}
			}
		}
	}

	public function prepararEjecutarMantenimientoBase(string $sufijo) {
		try {		
			if($this->esParamsArray()) {	

				if ($this->params!=null && $this->params['form']!=null) {

					if (isset($this->params['form']['btnNuevo'.$sufijo])) {
						$this->nuevo();
					} 			
					else if (isset($this->params['form']['btnActualizar'.$sufijo])) {
						$this->actualizar();
					}
					else if (isset($this->params['form']['btnEliminar'.$sufijo])) {
						$this->eliminar();
					}
					else if (isset($this->params['form']['btnCancelar'.$sufijo])) {
						$this->cancelar();
					}
					else if (isset($this->params['form']['btnGuardarCambios'.$sufijo])) {
						$this->guardarCambios();
					}
					
					//$this->returnAjax();
				}

			} else {
				if ($this->params!=null && $this->params->{'form'}!=null) {

					if (isset($this->params->{'form'}->{'btnNuevo'.$sufijo})) {
						$this->nuevo();
					} 			
					else if (isset($this->params->{'form'}->{'btnActualizar'.$sufijo})) {
						$this->actualizar();
					}
					else if (isset($this->params->{'form'}->{'btnEliminar'.$sufijo})) {
						$this->eliminar();
					}
					else if (isset($this->params->{'form'}->{'btnCancelar'.$sufijo})) {
						$this->cancelar();
					}
					else if (isset($this->params->{'form'}->{'btnGuardarCambios'.$sufijo})) {
						$this->guardarCambios();
					}
					
					//$this->returnAjax();
				}
			}				
		}
	 	catch(Exception $e) {
			throw $e;
	  	}
	}

	public function nuevo() {
	}

	public function actualizar() {
	}

	public function eliminar(?int $idActual=0) {
	}

	public function cancelar() {
	}

	public function guardarCambios() {
	}

	public function returnAjaxBase() { 
		//PENDIENTE QUITAR
		
		/*
		$strNombreOpcionRetorno='';
		$strRenderPage='';
		
		//CUANDO LAS BUSQUEDAS SE HACE DESDE OTRA PAGINA
		if($this->strNombreOpcionRetorno!=null && $this->strNombreOpcionRetorno!='') {
			$strNombreOpcionRetorno=$this->strNombreOpcionRetorno;
		} else {
			$strNombreOpcionRetorno=tipo_precio_util::$STR_NOMBRE_OPCION;
			
			if(tipo_precio_util::$STR_MODULO_OPCION!='') {
				$strNombreOpcionRetorno=tipo_precio_util::$STR_MODULO_OPCION.tipo_precio_util::$STR_NOMBRE_OPCION;
			}
		}
		
		$this->set(tipo_precio_util::$STR_CONTROLLER_NAME, $this);					
		
		$strRenderPage='/'.Constantes::$STR_CARPETA_VIEWS.'/'.$strNombreOpcionRetorno.'/'.$this->strTipoView;
		
		$this->render($strRenderPage, 'ajax');
		*/
	}

	public function writeFileRequestUrlJsonDebug() {

		$this->writeFileDataDebug('data_temp.txt',"\n\n".$this->REQUEST_URL,$this->JSON_PRETTY);		
	}

	public function writeFileResponseUrlJsonDebug($json_data) {

		$this->writeFileDataDebug('data_temp.txt',$json_data,'');
	}

	public function writeFileDataDebug($file_name,$data1,$data2) {

		$file = fopen($file_name, "a+") or die("Unable to open file!");

		fwrite($file, $data1);

		if($data2!='') {
			fwrite($file, $data2);
		}

		fclose($file);
	}
}

?>