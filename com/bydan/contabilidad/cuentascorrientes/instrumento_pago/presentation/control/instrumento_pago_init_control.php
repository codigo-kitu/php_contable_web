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

namespace com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\entity\instrumento_pago;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/instrumento_pago/util/instrumento_pago_carga.php');
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_carga;

use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_util;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_param_return;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\business\logic\instrumento_pago_logic;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\session\instrumento_pago_session;


//FK


use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
instrumento_pago_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
instrumento_pago_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
instrumento_pago_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
instrumento_pago_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*instrumento_pago_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class instrumento_pago_init_control extends ControllerBase {	
	
	public $instrumento_pagoClase=null;	
	public $instrumento_pagosModel=null;	
	public $instrumento_pagosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idinstrumento_pago=0;	
	public ?int $idinstrumento_pagoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $instrumento_pagoLogic=null;
	
	public $instrumento_pagoActual=null;	
	
	public $instrumento_pago=null;
	public $instrumento_pagos=null;
	public $instrumento_pagosEliminados=array();
	public $instrumento_pagosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $instrumento_pagosLocal=array();
	public ?array $instrumento_pagosReporte=null;
	public ?array $instrumento_pagosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadinstrumento_pago='onload';
	public string $strTipoPaginaAuxiliarinstrumento_pago='none';
	public string $strTipoUsuarioAuxiliarinstrumento_pago='none';
		
	public $instrumento_pagoReturnGeneral=null;
	public $instrumento_pagoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $instrumento_pagoModel=null;
	public $instrumento_pagoControllerAdditional=null;
	
	
	 	
	
	public string $strMensajecodigo='';
	public string $strMensajedescripcion='';
	public string $strMensajepredeterminado='';
	public string $strMensajeid_cuenta_compras='';
	public string $strMensajeid_cuenta_ventas='';
	public string $strMensajecuenta_contable_compra='';
	public string $strMensajecuenta_contable_ventas='';
	public string $strMensajeid_cuenta_corriente='';
	
	
	public string $strVisibleFK_Idcuenta_compras='display:table-row';
	public string $strVisibleFK_Idcuenta_corriente='display:table-row';
	public string $strVisibleFK_Idcuenta_ventas='display:table-row';

	
	public array $cuenta_comprassFK=array();

	public function getcuenta_comprassFK():array {
		return $this->cuenta_comprassFK;
	}

	public function setcuenta_comprassFK(array $cuenta_comprassFK) {
		$this->cuenta_comprassFK = $cuenta_comprassFK;
	}

	public int $idcuenta_comprasDefaultFK=-1;

	public function getIdcuenta_comprasDefaultFK():int {
		return $this->idcuenta_comprasDefaultFK;
	}

	public function setIdcuenta_comprasDefaultFK(int $idcuenta_comprasDefaultFK) {
		$this->idcuenta_comprasDefaultFK = $idcuenta_comprasDefaultFK;
	}

	public array $cuenta_ventassFK=array();

	public function getcuenta_ventassFK():array {
		return $this->cuenta_ventassFK;
	}

	public function setcuenta_ventassFK(array $cuenta_ventassFK) {
		$this->cuenta_ventassFK = $cuenta_ventassFK;
	}

	public int $idcuenta_ventasDefaultFK=-1;

	public function getIdcuenta_ventasDefaultFK():int {
		return $this->idcuenta_ventasDefaultFK;
	}

	public function setIdcuenta_ventasDefaultFK(int $idcuenta_ventasDefaultFK) {
		$this->idcuenta_ventasDefaultFK = $idcuenta_ventasDefaultFK;
	}

	public array $cuenta_corrientesFK=array();

	public function getcuenta_corrientesFK():array {
		return $this->cuenta_corrientesFK;
	}

	public function setcuenta_corrientesFK(array $cuenta_corrientesFK) {
		$this->cuenta_corrientesFK = $cuenta_corrientesFK;
	}

	public int $idcuenta_corrienteDefaultFK=-1;

	public function getIdcuenta_corrienteDefaultFK():int {
		return $this->idcuenta_corrienteDefaultFK;
	}

	public function setIdcuenta_corrienteDefaultFK(int $idcuenta_corrienteDefaultFK) {
		$this->idcuenta_corrienteDefaultFK = $idcuenta_corrienteDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_cuenta_comprasFK_Idcuenta_compras=null;

	public  $id_cuenta_corrienteFK_Idcuenta_corriente=null;

	public  $id_cuenta_ventasFK_Idcuenta_ventas=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->instrumento_pagoLogic==null) {
				$this->instrumento_pagoLogic=new instrumento_pago_logic();
			}
			
		} else {
			if($this->instrumento_pagoLogic==null) {
				$this->instrumento_pagoLogic=new instrumento_pago_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->instrumento_pagoClase==null) {
				$this->instrumento_pagoClase=new instrumento_pago();
			}
			
			$this->instrumento_pagoClase->setId(0);	
				
				
			$this->instrumento_pagoClase->setcodigo('');	
			$this->instrumento_pagoClase->setdescripcion('');	
			$this->instrumento_pagoClase->setpredeterminado(0);	
			$this->instrumento_pagoClase->setid_cuenta_compras(-1);	
			$this->instrumento_pagoClase->setid_cuenta_ventas(-1);	
			$this->instrumento_pagoClase->setcuenta_contable_compra('');	
			$this->instrumento_pagoClase->setcuenta_contable_ventas('');	
			$this->instrumento_pagoClase->setid_cuenta_corriente(-1);	
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function actualizarEstadoCeldasBotones(string $strAccion,bool $bitGuardarCambiosEnLote=false,bool $bitEsMantenimientoRelacionado=false){
		$this->actualizarEstadoCeldasBotonesBase($strAccion,$bitGuardarCambiosEnLote,$bitEsMantenimientoRelacionado);
	}
	
	public function manejarRetornarExcepcion(Exception $e) {
		$this->manejarRetornarExcepcionBase($e);
	}
	
	public function cancelarControles() {			
		$this->cancelarControlesBase();
	}
	
	public function inicializarAuxiliares() {
		$this->inicializarAuxiliaresBase();				
	}
	
	public function inicializarMensajesTipo(string $tipo,$e=null) {
		$this->inicializarMensajesTipoBase($tipo,$e);
	}			
	
	public function prepararEjecutarMantenimiento() {
		$this->prepararEjecutarMantenimientoBase('instrumento_pago');
	}
	
	public function setTipoAction(string $action='INDEX') {		
		$this->setTipoActionBase($action);
	}
	
	public function cargarDatosCliente() {
		$this->cargarDatosClienteBase();
	}
	
	public function cargarParametrosPagina() {		
		$this->cargarParametrosPaginaBase();
	}
	
	public function cargarParametrosEventosTabla() {
		$this->cargarParametrosEventosTablaBase();
	}
	
	public function cargarParametrosReporte() {
		$this->cargarParametrosReporteBase('instrumento_pago');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('instrumento_pago');
	}
	
	public function actualizarControllerConReturnGeneral(instrumento_pago_param_return $instrumento_pagoReturnGeneral) {
		if($instrumento_pagoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesinstrumento_pagosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$instrumento_pagoReturnGeneral->getsMensajeProceso();
		}
		
		if($instrumento_pagoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$instrumento_pagoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($instrumento_pagoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$instrumento_pagoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$instrumento_pagoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($instrumento_pagoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($instrumento_pagoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$instrumento_pagoReturnGeneral->getsFuncionJs();
		}
		
		if($instrumento_pagoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(instrumento_pago_session $instrumento_pago_session){
		$this->strStyleDivArbol=$instrumento_pago_session->strStyleDivArbol;	
		$this->strStyleDivContent=$instrumento_pago_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$instrumento_pago_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$instrumento_pago_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$instrumento_pago_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$instrumento_pago_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$instrumento_pago_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(instrumento_pago_session $instrumento_pago_session){
		$instrumento_pago_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$instrumento_pago_session->strStyleDivHeader='display:none';			
		$instrumento_pago_session->strStyleDivContent='width:93%;height:100%';	
		$instrumento_pago_session->strStyleDivOpcionesBanner='display:none';	
		$instrumento_pago_session->strStyleDivExpandirColapsar='display:none';	
		$instrumento_pago_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(instrumento_pago_control $instrumento_pago_control_session){
		$this->idNuevo=$instrumento_pago_control_session->idNuevo;
		$this->instrumento_pagoActual=$instrumento_pago_control_session->instrumento_pagoActual;
		$this->instrumento_pago=$instrumento_pago_control_session->instrumento_pago;
		$this->instrumento_pagoClase=$instrumento_pago_control_session->instrumento_pagoClase;
		$this->instrumento_pagos=$instrumento_pago_control_session->instrumento_pagos;
		$this->instrumento_pagosEliminados=$instrumento_pago_control_session->instrumento_pagosEliminados;
		$this->instrumento_pago=$instrumento_pago_control_session->instrumento_pago;
		$this->instrumento_pagosReporte=$instrumento_pago_control_session->instrumento_pagosReporte;
		$this->instrumento_pagosSeleccionados=$instrumento_pago_control_session->instrumento_pagosSeleccionados;
		$this->arrOrderBy=$instrumento_pago_control_session->arrOrderBy;
		$this->arrOrderByRel=$instrumento_pago_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$instrumento_pago_control_session->arrHistoryWebs;
		$this->arrSessionBases=$instrumento_pago_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadinstrumento_pago=$instrumento_pago_control_session->strTypeOnLoadinstrumento_pago;
		$this->strTipoPaginaAuxiliarinstrumento_pago=$instrumento_pago_control_session->strTipoPaginaAuxiliarinstrumento_pago;
		$this->strTipoUsuarioAuxiliarinstrumento_pago=$instrumento_pago_control_session->strTipoUsuarioAuxiliarinstrumento_pago;	
		
		$this->bitEsPopup=$instrumento_pago_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$instrumento_pago_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$instrumento_pago_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$instrumento_pago_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$instrumento_pago_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$instrumento_pago_control_session->strSufijo;
		$this->bitEsRelaciones=$instrumento_pago_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$instrumento_pago_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$instrumento_pago_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$instrumento_pago_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$instrumento_pago_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$instrumento_pago_control_session->strTituloTabla;
		$this->strTituloPathPagina=$instrumento_pago_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$instrumento_pago_control_session->strTituloPathElementoActual;
		
		if($this->instrumento_pagoLogic==null) {			
			$this->instrumento_pagoLogic=new instrumento_pago_logic();
		}
		
		
		if($this->instrumento_pagoClase==null) {
			$this->instrumento_pagoClase=new instrumento_pago();	
		}
		
		$this->instrumento_pagoLogic->setinstrumento_pago($this->instrumento_pagoClase);
		
		
		if($this->instrumento_pagos==null) {
			$this->instrumento_pagos=array();	
		}
		
		$this->instrumento_pagoLogic->setinstrumento_pagos($this->instrumento_pagos);
		
		
		$this->strTipoView=$instrumento_pago_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$instrumento_pago_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$instrumento_pago_control_session->datosCliente;
		$this->strAccionBusqueda=$instrumento_pago_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$instrumento_pago_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$instrumento_pago_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$instrumento_pago_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$instrumento_pago_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$instrumento_pago_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$instrumento_pago_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$instrumento_pago_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$instrumento_pago_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$instrumento_pago_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$instrumento_pago_control_session->strTipoPaginacion;
		$this->strTipoAccion=$instrumento_pago_control_session->strTipoAccion;
		$this->tiposReportes=$instrumento_pago_control_session->tiposReportes;
		$this->tiposReporte=$instrumento_pago_control_session->tiposReporte;
		$this->tiposAcciones=$instrumento_pago_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$instrumento_pago_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$instrumento_pago_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$instrumento_pago_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$instrumento_pago_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$instrumento_pago_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$instrumento_pago_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$instrumento_pago_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$instrumento_pago_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$instrumento_pago_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$instrumento_pago_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$instrumento_pago_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$instrumento_pago_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$instrumento_pago_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$instrumento_pago_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$instrumento_pago_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$instrumento_pago_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$instrumento_pago_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$instrumento_pago_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$instrumento_pago_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$instrumento_pago_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$instrumento_pago_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$instrumento_pago_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$instrumento_pago_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$instrumento_pago_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$instrumento_pago_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$instrumento_pago_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$instrumento_pago_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$instrumento_pago_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$instrumento_pago_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$instrumento_pago_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$instrumento_pago_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$instrumento_pago_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$instrumento_pago_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$instrumento_pago_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$instrumento_pago_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$instrumento_pago_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$instrumento_pago_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$instrumento_pago_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$instrumento_pago_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$instrumento_pago_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$instrumento_pago_control_session->resumenUsuarioActual;	
		$this->moduloActual=$instrumento_pago_control_session->moduloActual;	
		$this->opcionActual=$instrumento_pago_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$instrumento_pago_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$instrumento_pago_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));
				
		if($instrumento_pago_session==null) {
			$instrumento_pago_session=new instrumento_pago_session();
		}
		
		$this->strStyleDivArbol=$instrumento_pago_session->strStyleDivArbol;	
		$this->strStyleDivContent=$instrumento_pago_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$instrumento_pago_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$instrumento_pago_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$instrumento_pago_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$instrumento_pago_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$instrumento_pago_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$instrumento_pago_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$instrumento_pago_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$instrumento_pago_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$instrumento_pago_session->strRecargarFkQuery;
		*/
		
		$this->strMensajecodigo=$instrumento_pago_control_session->strMensajecodigo;
		$this->strMensajedescripcion=$instrumento_pago_control_session->strMensajedescripcion;
		$this->strMensajepredeterminado=$instrumento_pago_control_session->strMensajepredeterminado;
		$this->strMensajeid_cuenta_compras=$instrumento_pago_control_session->strMensajeid_cuenta_compras;
		$this->strMensajeid_cuenta_ventas=$instrumento_pago_control_session->strMensajeid_cuenta_ventas;
		$this->strMensajecuenta_contable_compra=$instrumento_pago_control_session->strMensajecuenta_contable_compra;
		$this->strMensajecuenta_contable_ventas=$instrumento_pago_control_session->strMensajecuenta_contable_ventas;
		$this->strMensajeid_cuenta_corriente=$instrumento_pago_control_session->strMensajeid_cuenta_corriente;
			
		
		$this->cuenta_comprassFK=$instrumento_pago_control_session->cuenta_comprassFK;
		$this->idcuenta_comprasDefaultFK=$instrumento_pago_control_session->idcuenta_comprasDefaultFK;
		$this->cuenta_ventassFK=$instrumento_pago_control_session->cuenta_ventassFK;
		$this->idcuenta_ventasDefaultFK=$instrumento_pago_control_session->idcuenta_ventasDefaultFK;
		$this->cuenta_corrientesFK=$instrumento_pago_control_session->cuenta_corrientesFK;
		$this->idcuenta_corrienteDefaultFK=$instrumento_pago_control_session->idcuenta_corrienteDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta_compras=$instrumento_pago_control_session->strVisibleFK_Idcuenta_compras;
		$this->strVisibleFK_Idcuenta_corriente=$instrumento_pago_control_session->strVisibleFK_Idcuenta_corriente;
		$this->strVisibleFK_Idcuenta_ventas=$instrumento_pago_control_session->strVisibleFK_Idcuenta_ventas;
		
		
		
		
		$this->id_cuenta_comprasFK_Idcuenta_compras=$instrumento_pago_control_session->id_cuenta_comprasFK_Idcuenta_compras;
		$this->id_cuenta_corrienteFK_Idcuenta_corriente=$instrumento_pago_control_session->id_cuenta_corrienteFK_Idcuenta_corriente;
		$this->id_cuenta_ventasFK_Idcuenta_ventas=$instrumento_pago_control_session->id_cuenta_ventasFK_Idcuenta_ventas;

		
		
		
		/*ACTUALIZA CON PARAMETROS ACTUALES*/
		$this->cargarParamsPostAccion();
		
		$this->cargarParametrosReporte();
		/*ACTUALIZA CON PARAMETROS ACTUALES*/
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function getidNuevo() : int {
		return $this->idNuevo;
	}

	public function setidNuevo(int $idNuevo) {
		$this->idNuevo = $idNuevo;
	}
	
	public function getinstrumento_pagoControllerAdditional() {
		return $this->instrumento_pagoControllerAdditional;
	}

	public function setinstrumento_pagoControllerAdditional($instrumento_pagoControllerAdditional) {
		$this->instrumento_pagoControllerAdditional = $instrumento_pagoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getinstrumento_pagoActual() : instrumento_pago {
		return $this->instrumento_pagoActual;
	}

	public function setinstrumento_pagoActual(instrumento_pago $instrumento_pagoActual) {
		$this->instrumento_pagoActual = $instrumento_pagoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidinstrumento_pago() : int {
		return $this->idinstrumento_pago;
	}

	public function setidinstrumento_pago(int $idinstrumento_pago) {
		$this->idinstrumento_pago = $idinstrumento_pago;
	}
	
	public function getinstrumento_pago() : instrumento_pago {
		return $this->instrumento_pago;
	}

	public function setinstrumento_pago(instrumento_pago $instrumento_pago) {
		$this->instrumento_pago = $instrumento_pago;
	}
		
	public function getinstrumento_pagoLogic() : instrumento_pago_logic {		
		return $this->instrumento_pagoLogic;
	}

	public function setinstrumento_pagoLogic(instrumento_pago_logic $instrumento_pagoLogic) {
		$this->instrumento_pagoLogic = $instrumento_pagoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getinstrumento_pagosModel() {		
		try {						
			/*instrumento_pagosModel.setWrappedData(instrumento_pagoLogic->getinstrumento_pagos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->instrumento_pagosModel;
	}
	
	public function setinstrumento_pagosModel($instrumento_pagosModel) {
		$this->instrumento_pagosModel = $instrumento_pagosModel;
	}
	
	public function getinstrumento_pagos() : array {		
		return $this->instrumento_pagos;
	}
	
	public function setinstrumento_pagos(array $instrumento_pagos) {
		$this->instrumento_pagos= $instrumento_pagos;
	}
	
	public function getinstrumento_pagosEliminados() : array {		
		return $this->instrumento_pagosEliminados;
	}
	
	public function setinstrumento_pagosEliminados(array $instrumento_pagosEliminados) {
		$this->instrumento_pagosEliminados= $instrumento_pagosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getinstrumento_pagoActualFromListDataModel() {
		try {
			/*$instrumento_pagoClase= $this->instrumento_pagosModel->getRowData();*/
			
			/*return $instrumento_pago;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
