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

namespace com\bydan\contabilidad\cuentaspagar\proveedor\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/proveedor/util/proveedor_carga.php');
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_param_return;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;
use com\bydan\contabilidad\general\tipo_persona\business\logic\tipo_persona_logic;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_carga;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_util;

use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\entity\categoria_proveedor;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\logic\categoria_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_util;

use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\entity\giro_negocio_proveedor;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\logic\giro_negocio_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util\giro_negocio_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util\giro_negocio_proveedor_util;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\business\logic\impuesto_logic;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\business\logic\retencion_logic;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

use com\bydan\contabilidad\facturacion\retencion_fuente\business\entity\retencion_fuente;
use com\bydan\contabilidad\facturacion\retencion_fuente\business\logic\retencion_fuente_logic;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_carga;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_util;

use com\bydan\contabilidad\facturacion\retencion_ica\business\entity\retencion_ica;
use com\bydan\contabilidad\facturacion\retencion_ica\business\logic\retencion_ica_logic;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_carga;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_util;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;

//REL


use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_carga;
use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_util;
use com\bydan\contabilidad\inventario\lista_precio\presentation\session\lista_precio_session;

use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\inventario\orden_compra\presentation\session\orden_compra_session;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\session\cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\presentation\session\imagen_proveedor_session;

use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\session\documento_proveedor_session;

use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;
use com\bydan\contabilidad\inventario\otro_suplidor\presentation\session\otro_suplidor_session;


/*CARGA ARCHIVOS FRAMEWORK*/
proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentaspagar/proveedor/presentation/control/proveedor_init_control.php');
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\control\proveedor_init_control;

include_once('com/bydan/contabilidad/cuentaspagar/proveedor/presentation/control/proveedor_base_control.php');
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\control\proveedor_base_control;

class proveedor_control extends proveedor_base_control {	
	
	public function inicializarParametrosQueryString(mixed $post1=null) {
		$post=null;			
		
		if($_POST) {
			$post=$_POST;	
			
		} else if($_GET) {
			$post=$_GET;
		
		} else if($post1) {
			$post=$post1;
		}
		
		if($_POST || $_GET) {
			
			if($post!=null && count($post)>0) {
				
				$this->inicializarParametrosQueryStringBase($post);
				
				/*TIENE PARAMETROS DE MANTENIMIENTO DE DATOS*/			
				if($this->tieneParametrosMantenimientoDatos()) {
					
					
				if($this->data['activo']==null) {$this->data['activo']=false;} else {if($this->data['activo']=='on') {$this->data['activo']=true;}}
					
				if($this->data['aplica_impuesto_compras']==null) {$this->data['aplica_impuesto_compras']=false;} else {if($this->data['aplica_impuesto_compras']=='on') {$this->data['aplica_impuesto_compras']=true;}}
					
				if($this->data['aplica_retencion_impuesto']==null) {$this->data['aplica_retencion_impuesto']=false;} else {if($this->data['aplica_retencion_impuesto']=='on') {$this->data['aplica_retencion_impuesto']=true;}}
					
				if($this->data['aplica_retencion_fuente']==null) {$this->data['aplica_retencion_fuente']=false;} else {if($this->data['aplica_retencion_fuente']=='on') {$this->data['aplica_retencion_fuente']=true;}}
					
				if($this->data['aplica_retencion_ica']==null) {$this->data['aplica_retencion_ica']=false;} else {if($this->data['aplica_retencion_ica']=='on') {$this->data['aplica_retencion_ica']=true;}}
					
				if($this->data['aplica_2do_impuesto']==null) {$this->data['aplica_2do_impuesto']=false;} else {if($this->data['aplica_2do_impuesto']=='on') {$this->data['aplica_2do_impuesto']=true;}}
				}
			}
		
		} else {
			$this->data = $post;
		}
		
		$this->cargarParametrosReporte();
		
		$this->cargarParamsPostAccion();
		
		$this->cargarParamsPaginar();
		
		$this->cargarParametrosEventosTabla();
	}

	public function ejecutarParametrosQueryString() {
		/*$post=$_POST;*/	
		$action='';
		$return_json=true;
		
		$bitEsPopup=false;
		
		/*
		if(count($_GET) > 1) {
			$post=$_GET;
		}
		*/
		
		
		$action = $this->getDataAction();
			
		if($action!=null) {
			
			$this->action=$action;
			
			$this->bitEsAndroid=false;
				
			$this->bitEsAndroid = $this->getDataEsAndroid();

			/*NO SE GUARDA EN SESSION PERO SIEMPRE SE INICIALIZA DEFECTO
			INICIALIZA VARIABLES PARA QUE RECARGE TODOS COMBOS*/
			$this->setstrRecargarFkInicializar();
				
			if($action=='load' || $action=='index') {
				$this->loadIndex();				
				
			} else if($action=='indexRecargarRelacionado') {
				$this->indexRecargarRelacionado();								
				
			} else if($action=='unload') {
				$this->eliminarVariablesDeSesion();
				
			} else if($action=='recargarInformacion') {
				$this->recargarInformacionAction();								
				
			} else if($action=='buscarPorIdGeneral') {
				$this->buscarPorIdGeneralAction();	
				
			} else if($action=='anteriores') {
				$this->anterioresAction();				
				
			} else if($action=='siguientes') {
				$this->siguientesAction();	
				
			} else if($action=='recargarUltimaInformacion') {
				$this->recargarUltimaInformacionAction();								
				
			} else if($action=='seleccionarLoteFk') {
				$this->seleccionarLoteFkAction();								
				
			} else if($action=='nuevo') {
				$this->nuevoAction();				
				
			} else if($action=='actualizar') {
				$this->actualizarAction();				
				
			} else if($action=='eliminar') {
				$this->eliminarAction();			
				
			} else if($action=='cancelar') {
				$this->cancelarAction();				
				
			} else if($action=='guardarCambios') {
				$this->guardarCambiosAction();				
				
			} else if($action=='duplicar') {
				$this->duplicarAction();				
				
			}  else if($action=='copiar') {
				$this->copiarAction();				
				
			} else if($action=='nuevoPreparar') {//Para Pagina con Formulario											
				$this->nuevoPrepararAction();
				
			} else if($action=='nuevoPrepararPaginaForm') {
				$this->nuevoPrepararPaginaFormAction();							
				
			} else if($action=='nuevoPrepararAbrirPaginaForm') {//Para Pagina Formulario
				$this->nuevoPrepararAbrirPaginaFormAction();														
				
			} else if($action=='nuevoTablaPreparar') {
				$this->nuevoTablaPrepararAction();				
				
			} else if($action=='seleccionarActual') {
				$this->seleccionarActualAction();	
				
			} else if($action=='seleccionarActualPaginaForm') {
				$this->seleccionarActualPaginaFormAction();
									
			} else if($action=='seleccionarActualAbrirPaginaForm') {
				$this->seleccionarActualAbrirPaginaFormAction();
				
			} else if($action=='editarTablaDatos') {
				$this->editarTablaDatosAction();				
				
			}
			else if($action=='eliminarCascada' ) {
				$this->eliminarCascadaAction();
				
			} 
			else if($action=='eliminarTabla' ) {
				$this->eliminarTablaAction();	
				
			} else if($action=='quitarElementosTabla' ) {
				$this->quitarElementosTablaAction();
				
			} 
			else if($action=='recargarReferencias' ) {
				$this->recargarReferenciasAction();
				
			}
			else if($action=='manejarEventos' ) {
				$this->manejarEventosAction();
			}
			else if($action=='recargarFormularioGeneral' ) {
				$this->recargarFormularioGeneralAction();
			} 
			
			else if($action=='mostrarEjecutarAccionesRelaciones' ) {
				$this->mostrarEjecutarAccionesRelacionesAction();
			}
			
			else if($action=='generarFpdf') {		
				$this->generarFpdfAction();
				
			} else if($action=='generarHtmlReporte') {
				$this->generarHtmlReporteAction();
				
			} else if($action=='generarHtmlFormReporte') {
				$this->generarHtmlFormReporteAction();
				
			} else if($action=='generarHtmlRelacionesReporte') {
				$this->generarHtmlRelacionesReporteAction();
				
			} else if($action=='quitarRelacionesReporte') {
				$this->quitarRelacionesReporte();
				
			} else if($action=='generarReporteConPhpExcel') {
				$return_json=$this->generarReporteConPhpExcelAction();
				
			} else if($action=='generarReporteConPhpExcelVertical') {
				$return_json=$this->generarReporteConPhpExcelVerticalAction();
				
			} else if($action=='generarReporteConPhpExcelRelaciones') {
				$return_json=$this->generarReporteConPhpExcelRelacionesAction();
				
			} 
			else if($action=='registrarSesionParalista_precioes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idproveedorActual=$this->getDataId();
				$this->registrarSesionParalista_precioes($idproveedorActual);
			}
			else if($action=='registrarSesionParaorden_compras' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idproveedorActual=$this->getDataId();
				$this->registrarSesionParaorden_compras($idproveedorActual);
			}
			else if($action=='registrarSesionParacuenta_pagars' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idproveedorActual=$this->getDataId();
				$this->registrarSesionParacuenta_pagars($idproveedorActual);
			}
			else if($action=='registrarSesionParaimagen_proveedores' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idproveedorActual=$this->getDataId();
				$this->registrarSesionParaimagen_proveedores($idproveedorActual);
			}
			else if($action=='registrarSesionParadocumento_proveedores' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idproveedorActual=$this->getDataId();
				$this->registrarSesionParadocumento_proveedores($idproveedorActual);
			}
			else if($action=='registrarSesionParaotro_suplidores' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idproveedorActual=$this->getDataId();
				$this->registrarSesionParaotro_suplidores($idproveedorActual);
			} 
			
			
			else if($action=="FK_Idcategoria_proveedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcategoria_proveedorParaProcesar();
			}
			else if($action=="FK_Idciudad"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdciudadParaProcesar();
			}
			else if($action=="FK_Idcuenta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdcuentaParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idgiro_negocio_proveedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idgiro_negocio_proveedorParaProcesar();
			}
			else if($action=="FK_Idimpuesto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdimpuestoParaProcesar();
			}
			else if($action=="FK_Idotro_impuesto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idotro_impuestoParaProcesar();
			}
			else if($action=="FK_Idpais"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdpaisParaProcesar();
			}
			else if($action=="FK_Idprovincia"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdprovinciaParaProcesar();
			}
			else if($action=="FK_Idretencion"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdretencionParaProcesar();
			}
			else if($action=="FK_Idretencion_fuente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idretencion_fuenteParaProcesar();
			}
			else if($action=="FK_Idretencion_ica"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idretencion_icaParaProcesar();
			}
			else if($action=="FK_Idtermino_pago_proveedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtermino_pago_proveedorParaProcesar();
			}
			else if($action=="FK_Idtipo_persona"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_personaParaProcesar();
			}
			else if($action=="FK_Idvendedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdvendedorParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idproveedorActual
			}
			else if($action=='abrirBusquedaParatipo_persona') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaParatipo_persona();//$idproveedorActual
			}
			else if($action=='abrirBusquedaParacategoria_proveedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaParacategoria_proveedor();//$idproveedorActual
			}
			else if($action=='abrirBusquedaParagiro_negocio_proveedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaParagiro_negocio_proveedor();//$idproveedorActual
			}
			else if($action=='abrirBusquedaParapais') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaParapais();//$idproveedorActual
			}
			else if($action=='abrirBusquedaParaprovincia') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaParaprovincia();//$idproveedorActual
			}
			else if($action=='abrirBusquedaParaciudad') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaParaciudad();//$idproveedorActual
			}
			else if($action=='abrirBusquedaParavendedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaParavendedor();//$idproveedorActual
			}
			else if($action=='abrirBusquedaParatermino_pago_proveedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaParatermino_pago_proveedor();//$idproveedorActual
			}
			else if($action=='abrirBusquedaParacuenta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaParacuenta();//$idproveedorActual
			}
			else if($action=='abrirBusquedaParaimpuesto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaParaimpuesto();//$idproveedorActual
			}
			else if($action=='abrirBusquedaPararetencion') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaPararetencion();//$idproveedorActual
			}
			else if($action=='abrirBusquedaPararetencion_fuente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaPararetencion_fuente();//$idproveedorActual
			}
			else if($action=='abrirBusquedaPararetencion_ica') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaPararetencion_ica();//$idproveedorActual
			}
			else if($action=='abrirBusquedaParaotro_impuesto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproveedorActual=$this->getDataId();
				$this->abrirBusquedaParaotro_impuesto();//$idproveedorActual
			}
			
			else {
				/*ACCIONES ADDITIONAL*/
				
				$this->strProceso=$action;
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				
				$return_json=$this->procesarAccionJson($return_json,$action);				
			}
			
			
			$this->setTipoAction($action);
			
			//$this->setActualizarParameterDivSecciones();
			
			
			if($return_json==true) {
				
				if(!$this->bitEsAndroid) {
					
					$proveedorController = new proveedor_control();
					
					$proveedorController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($proveedorController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$proveedorController = new proveedor_control();
						$proveedorController = $this;
						
						$jsonResponse = json_encode($proveedorController->proveedors);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->proveedorReturnGeneral==null) {
					$this->proveedorReturnGeneral=new proveedor_param_return();
				}
				
				echo($this->proveedorReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$proveedorController=new proveedor_control();
		
		$proveedorController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$proveedorController->usuarioActual=new usuario();
		
		$proveedorController->usuarioActual->setId($this->usuarioActual->getId());
		$proveedorController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$proveedorController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$proveedorController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$proveedorController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$proveedorController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$proveedorController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$proveedorController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $proveedorController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadproveedor= $this->getDataGeneralString('strTypeOnLoadproveedor');
		$strTipoPaginaAuxiliarproveedor= $this->getDataGeneralString('strTipoPaginaAuxiliarproveedor');
		$strTipoUsuarioAuxiliarproveedor= $this->getDataGeneralString('strTipoUsuarioAuxiliarproveedor');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadproveedor,$strTipoPaginaAuxiliarproveedor,$strTipoUsuarioAuxiliarproveedor,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadproveedor!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('proveedor','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	public function indexRecargarRelacionado() {
		$this->cargarParametrosPagina();
									
		$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);
		
		$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		//SE DUPLICA
		//$this->getHtmlTablaDatos(false);
		
		$this->returnHtml(true);
	}
	
	public function recargarInformacionAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->recargarInformacion();
	}
	
	public function buscarPorIdGeneralAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
				
		$idActual=$this->getDataId();
		
		$this->buscarPorIdGeneral($idActual);
	}
	
	public function anterioresAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->anteriores();
	}
		
	public function siguientesAction() {	
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);			
		$this->siguientes();
	}
	
	public function recargarUltimaInformacionAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->recargarUltimaInformacion();
	}
	
	public function seleccionarLoteFkAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->seleccionarLoteFk();
	}
	
	public function nuevoAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->nuevo();
	}
	
	public function actualizarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->actualizar();
	}
	
	public function eliminarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
					
		$idActual=$this->getDataId();
					
		$this->eliminar($idActual);	
	}
	
	public function cancelarAction() {
		$this->setCargarParameterDivSecciones(false,false,false,true,true,false,false,true,false,false,false,false);
		$this->cancelar();
	}
	
	public function guardarCambiosAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->guardarCambios();
	}
	
	public function duplicarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->duplicar();
	}
	
	public function copiarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->copiar();
	}
	
	public function nuevoPrepararAction() {
		$this->setCargarParameterDivSecciones(false,false,false,true,true,false,false,true,false,false,false,false);
				
		$this->nuevoPreparar();
	}
	
	public function nuevoPrepararPaginaFormAction() {
		$this->cargarParametrosPagina();
									
		//TALVEZ ELIMINAR, TALVEZ MISMA PAGINA FORM
		$this->setCargarParameterDivSecciones(false,false,true,true,true,false,false,true,false,false,false,true);
				
		$this->nuevoPreparar();
	}
	
	public function nuevoPrepararAbrirPaginaFormAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);										
					
		//Se llama desde Load de Javascript a nuevoPrepararPaginaForm
		//$this->nuevoPreparar();
					
		if($this->Session->read('opcionActual')!=null) {
			$this->opcionActual=unserialize($this->Session->read('opcionActual'));
		}
					
		$this->bitEsAbrirVentanaAuxiliarUrl=true;
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarproveedor,$this->strTipoUsuarioAuxiliarproveedor,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
		$this->strAuxiliarTipo='POPUP';
	}
	
	public function nuevoTablaPrepararAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
				
		$this->nuevoTablaPreparar();
	}
	
	public function seleccionarActualAction() {
		$this->setCargarParameterDivSecciones(false,false,false,true,true,false,false,true,false,false,false,false);
		$idActual=$this->getDataId();
					
		$this->seleccionarActual($idActual);
	}
	
	public function seleccionarActualPaginaFormAction() {
		$this->cargarParametrosPagina();
									
		$this->setCargarParameterDivSecciones(false,false,true,true,true,false,false,true,false,false,false,true);
					
		$idActual=$this->getDataId();
					
		$this->seleccionarActual($idActual);
	}
	
	public function seleccionarActualAbrirPaginaFormAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);										
					
		$idActual=$this->getDataId();
					
		//Se llama desde Load de Javascript a seleccionarActualPaginaForm
		//$this->seleccionarActual($idActual);
					
		if($this->Session->read('opcionActual')!=null) {
			$this->opcionActual=$this->Session->unserialize('opcionActual');
		}
		
		$this->bitEsAbrirVentanaAuxiliarUrl=true;
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarproveedor,$this->strTipoUsuarioAuxiliarproveedor,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
		$this->strAuxiliarUrlPagina=$this->strAuxiliarUrlPagina.'&id='.$idActual;
		$this->strAuxiliarTipo='POPUP';
	}
	
	public function editarTablaDatosAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);
		$this->editarTablaDatos();
	}
	
	public function eliminarTablaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);			
					
		$idActual=$this->getDataId();
		
		$this->eliminarTabla($idActual);
	}
	
	public function quitarElementosTablaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);								
					
		$this->quitarElementosTabla();
	}
	
	public function generarFpdfAction() {
		$return_json=false;
		$this->generarFpdf();
	}
	
	public function generarHtmlReporteAction() {
		//$return_json=false;
					
		$htmlReporteAuxiliar='';
		
		//$htmlReporteIniAuxiliar='';
		//$htmlReporteFinAuxiliar='';				
		
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,true,false,false,false);
		
		$this->htmlTablaReporteAuxiliars='';
		
		$this->generarHtmlReporte();
		
		$htmlReporteAuxiliar=$this->htmlTablaReporteAuxiliars;
		
		//$htmlReporteIniAuxiliar=$this->getHtmlReporteIniAuxiliar();
		
		//$htmlReporteFinAuxiliar=$this->getHtmlReporteFinAuxiliar();								
		
		/*HTML FINAL*/
		//$this->htmlTablaReporteAuxiliars=$htmlReporteIniAuxiliar;
		$this->htmlTablaReporteAuxiliars=$htmlReporteAuxiliar;
		//$this->htmlTablaReporteAuxiliars.=$htmlReporteFinAuxiliar;				
		
		//echo($this->htmlTablaReporteAuxiliars);
		
		//ABRIR PAGINA Report con SessionStorage
		$this->proveedorReturnGeneral=new proveedor_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->proveedorReturnGeneral->conGuardarReturnSessionJs=true;
		$this->proveedorReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->proveedorReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->proveedorReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->proveedorReturnGeneral);
	}
	
	public function generarHtmlFormReporteAction() {
		//$return_json=false;
					
		$htmlReporteAuxiliar='';
		//$htmlReporteIniAuxiliar='';
		//$htmlReporteFinAuxiliar='';								
		
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,true,false,false,false);
		
		$this->htmlTablaReporteAuxiliars='';
		
		$this->generarHtmlFormReporte();
				
		$htmlReporteAuxiliar=$this->htmlTablaReporteAuxiliars;
		
		//$htmlReporteIniAuxiliar=$this->getHtmlReporteIniAuxiliar();
		
		//$htmlReporteFinAuxiliar=$this->getHtmlReporteFinAuxiliar();
		
		/*HTML FINAL*/
			//$this->htmlTablaReporteAuxiliars=$htmlReporteIniAuxiliar;
		//$this->htmlTablaReporteAuxiliars=$htmlReporteAuxiliar;
			//$this->htmlTablaReporteAuxiliars.=$htmlReporteFinAuxiliar;
		
		//echo($this->htmlTablaReporteAuxiliars);
		
		//ABRIR PAGINA Report con SessionStorage
		$this->proveedorReturnGeneral=new proveedor_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->proveedorReturnGeneral->conGuardarReturnSessionJs=true;
		$this->proveedorReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->proveedorReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->proveedorReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->proveedorReturnGeneral);
	}
	
	public function generarHtmlRelacionesReporteAction() {
		//$return_json=false;
					
		$htmlReporteAuxiliar='';
		//$htmlReporteIniAuxiliar='';
		//$htmlReporteFinAuxiliar='';								
		
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,true,false,false,false);
		
		$this->htmlTablaReporteAuxiliars='';
		
		$this->generarHtmlRelacionesReporte();
				
		$htmlReporteAuxiliar=$this->htmlTablaReporteAuxiliars;
		
		//$htmlReporteIniAuxiliar=$this->getHtmlReporteIniAuxiliar();
		
		//$htmlReporteFinAuxiliar=$this->getHtmlReporteFinAuxiliar();
		
		/*HTML FINAL*/
			//$this->htmlTablaReporteAuxiliars=$htmlReporteIniAuxiliar;
		//$this->htmlTablaReporteAuxiliars=$htmlReporteAuxiliar;
			//$this->htmlTablaReporteAuxiliars.=$htmlReporteFinAuxiliar;
		
		//echo($this->htmlTablaReporteAuxiliars);
		
		//ABRIR PAGINA Report con SessionStorage
		$this->proveedorReturnGeneral=new proveedor_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->proveedorReturnGeneral->conGuardarReturnSessionJs=true;
		$this->proveedorReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->proveedorReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->proveedorReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->proveedorReturnGeneral);
	}
	
	public function eliminarCascadaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
					
		$this->eliminarCascada();
	}
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			/*CARGA VARIABLES PARA TALVEZ RECARGAR POR PARTES*/
			$this->getDataRecargarPartes();
			/*CARGA VARIABLES PARA TALVEZ RECARGAR POR PARTES_FIN*/
			
			$bitDivsEsCargarFKsAjaxWebPart=false;
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			
			if($this->strRecargarFkTipos!='NINGUNO') {
				$bitDivsEsCargarFKsAjaxWebPart=true;
				
				/*$this->setCargarParameterDivSecciones(false,false,false,false,true,false,false,false,false,false,false,true);*/
				
				$this->cargarCombosFK(false);					
			} else {
				/*$bitDivEsCargarMantenimientosAjaxWebPart=true;				
				$this->setCargarParameterDivSecciones(false,false,false,false,true,false,false,false,false,false,false,false);*/
			}
											
			$sTipoControl='';
			$sTipoEvento='';
			
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
			
			
			$this->proveedorReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->proveedorReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->proveedorReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->proveedorReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->proveedorReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->proveedorReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->proveedorReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->proveedorReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->proveedorReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->proveedorReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->proveedorReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->proveedorReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->proveedorReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->proveedorReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->proveedorReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->proveedorReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->proveedorReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->proveedorReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
	
			$this->manejarRetornarExcepcion($e);
		}	
	}
	
	
	
	public function mostrarEjecutarAccionesRelacionesAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,true,false,false,false,false,false,true,false);			
		$idActual=$this->getDataId();
					
		$this->mostrarEjecutarAccionesRelaciones($idActual);						
	}	
	
	public function generarReporteConPhpExcelAction() {
		$tipo_reporte=$this->getDataTipoReporte();				
		$this->generarReporteConPhpExcel($tipo_reporte);				
		return false;			
	}
	
	public function generarReporteConPhpExcelVerticalAction() {
		$tipo_reporte=$this->getDataTipoReporte();				
		$this->generarReporteConPhpExcelVertical($tipo_reporte);				
		return false;						
	}
	
	public function generarReporteConPhpExcelRelacionesAction() {
		$tipo_reporte=$this->getDataTipoReporte();				
		$this->generarReporteConPhpExcelRelaciones($tipo_reporte);				
		return false;
	}

	function __construct () {
		
		parent::__construct();
		
		$this->proveedorLogic=new proveedor_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->proveedor=new proveedor();
		
		$this->strTypeOnLoadproveedor='onload';
		$this->strTipoPaginaAuxiliarproveedor='none';
		$this->strTipoUsuarioAuxiliarproveedor='none';	

		$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
		
		$this->proveedorModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->proveedorControllerAdditional=new proveedor_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(proveedor_session $proveedor_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($proveedor_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadproveedor='',?string $strTipoPaginaAuxiliarproveedor='',?string $strTipoUsuarioAuxiliarproveedor='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadproveedor=$strTypeOnLoadproveedor;
			$this->strTipoPaginaAuxiliarproveedor=$strTipoPaginaAuxiliarproveedor;
			$this->strTipoUsuarioAuxiliarproveedor=$strTipoUsuarioAuxiliarproveedor;
	
			if($strTipoUsuarioAuxiliarproveedor=='webroot' || $strFuncionBusquedaRapida=='webroot') {
				return ;
			}
			
			/*$this->activarSession();*/
									
	
	
			/*ACTUALIZAR VALORES*/
			$this->bitEsPopup=$bitEsPopup;
			$this->bitConBusquedaRapida=$bitConBusquedaRapida;
			
			$this->indexBase($bitEsPopup,$bitConBusquedaRapida);			
			
			
			$this->strTipoView=$strTipoView;			
			$this->strValorBusquedaRapida=$strValorBusquedaRapida;
			$this->strFuncionBusquedaRapida=$strFuncionBusquedaRapida;
			
			$this->proveedor=new proveedor();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Proveedores';
			
			
			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));
							
			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
				
				/*$this->Session->write('proveedor_session',$proveedor_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($proveedor_session->strFuncionJsPadre!=null && $proveedor_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$proveedor_session->strFuncionJsPadre;
				
				$proveedor_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($proveedor_session);
			
			if($strTypeOnLoadproveedor!=null && $strTypeOnLoadproveedor=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$proveedor_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$proveedor_session->setPaginaPopupVariables(true);
				}
				
				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,proveedor_util::$STR_SESSION_NAME,'cuentaspagar');																
			
			} else if($strTypeOnLoadproveedor!=null && $strTypeOnLoadproveedor=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$proveedor_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;*/
				
				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarproveedor!=null && $strTipoPaginaAuxiliarproveedor=='none') {
				/*$proveedor_session->strStyleDivHeader='display:table-row';*/
				
				/*$proveedor_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarproveedor!=null && $strTipoPaginaAuxiliarproveedor=='iframe') {
					/*
					$proveedor_session->strStyleDivArbol='display:none';
					$proveedor_session->strStyleDivHeader='display:none';
					$proveedor_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$proveedor_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->proveedorClase=new proveedor();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=proveedor_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(proveedor_util::getTiposSeleccionar(true) as $reporte) {
				$this->tiposColumnasSelect[]=$reporte;
			}			
			
			/*RELACIONES*/
			$this->tiposRelaciones[]=Reporte::NewReporte(Constantes::$STR_RELACIONES,Constantes::$STR_RELACIONES);
			
			foreach($this->getTiposRelacionesReporte() as $reporte) {
				$this->tiposRelaciones[]=$reporte;
			}
			
			/*FORMULARIO*/
			$this->tiposRelacionesFormulario[]=Reporte::NewReporte(Constantes::$STR_RELACIONES,Constantes::$STR_RELACIONES);
			
			foreach($this->getTiposRelacionesReporte() as $reporte) {
				$this->tiposRelacionesFormulario[]=$reporte;
			}
			/*RELACIONES*/
						
			$this->sistemaLogicAdditional=new sistema_logic_add();
			$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
			
			$this->sistemaLogicAdditional->setConnexion($this->proveedorLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->proveedorLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$documentocuentapagarLogic=new documento_cuenta_pagar_logic();
			//$loteproductoLogic=new lote_producto_logic();
			//$listaprecioLogic=new lista_precio_logic();
			//$documentoproveedorLogic=new documento_proveedor_logic();
			//$kardexLogic=new kardex_logic();
			//$cuentacorrientedetalleLogic=new cuenta_corriente_detalle_logic();
			//$estimadoLogic=new estimado_logic();
			//$devolucionLogic=new devolucion_logic();
			//$ordencompraLogic=new orden_compra_logic();
			//$imagenproveedorLogic=new imagen_proveedor_logic();
			//$chequecuentacorrienteLogic=new cheque_cuenta_corriente_logic();
			//$otrosuplidorLogic=new otro_suplidor_logic();
			//$cotizacionLogic=new cotizacion_logic();
			//$cuentapagarLogic=new cuenta_pagar_logic();
			//$productoLogic=new producto_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->proveedorLogic=new proveedor_logic();*/
			
			
			$this->proveedorsModel=null;
			/*new ListDataModel();*/
			
			/*$this->proveedorsModel.setWrappedData(proveedorLogic->getproveedors());*/
						
			$this->proveedors= array();
			$this->proveedorsEliminados=array();
			$this->proveedorsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= proveedor_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= proveedor_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->proveedor= new proveedor();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcategoria_proveedor='display:table-row';
			$this->strVisibleFK_Idciudad='display:table-row';
			$this->strVisibleFK_Idcuenta='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idgiro_negocio_proveedor='display:table-row';
			$this->strVisibleFK_Idimpuesto='display:table-row';
			$this->strVisibleFK_Idotro_impuesto='display:table-row';
			$this->strVisibleFK_Idpais='display:table-row';
			$this->strVisibleFK_Idprovincia='display:table-row';
			$this->strVisibleFK_Idretencion='display:table-row';
			$this->strVisibleFK_Idretencion_fuente='display:table-row';
			$this->strVisibleFK_Idretencion_ica='display:table-row';
			$this->strVisibleFK_Idtermino_pago_proveedor='display:table-row';
			$this->strVisibleFK_Idtipo_persona='display:table-row';
			$this->strVisibleFK_Idvendedor='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarproveedor!=null && $strTipoUsuarioAuxiliarproveedor!='none' && $strTipoUsuarioAuxiliarproveedor!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarproveedor);
																
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$usuarioLogic->getEntity($idUsuarioAutomatico);/*WithConnection*/
						
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
											
					}					
												
					$this->usuarioActual=$usuarioLogic->getUsuario();								
														
					if($this->usuarioActual!=null && $this->usuarioActual->getId()>0) {
						$this->Session->write('usuarioActual',serialize($this->usuarioActual));
					}
				}
			} else {
				if($strTipoUsuarioAuxiliarproveedor!=null && $strTipoUsuarioAuxiliarproveedor!='none' && $strTipoUsuarioAuxiliarproveedor!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarproveedor);
																
					if($idUsuarioAutomatico>0) {
						$this->usuarioActual=new usuario();
						
						$this->usuarioActual->setId($idUsuarioAutomatico);
						
						$this->Session->write('usuarioActual',serialize($this->usuarioActual));
					}																	
				}
			}
			
			/*SI NO EXISTE SEGURIDAD*/
			//if($this->Session->read('usuarioActual')==null) {
			//	$this->usuarioActual=new usuario();
			//	$this->Session->write('usuarioActual',serialize($this->usuarioActual));
			//}
			
			if($this->Session->read('usuarioActual')!=null) {
				$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));
				
				if($this->usuarioActual!=null) {
					$this->bigIdUsuarioSesion=$this->usuarioActual->getId();	
				}
			
			} else {	
				if($strTipoUsuarioAuxiliarproveedor==null || $strTipoUsuarioAuxiliarproveedor=='none' || $strTipoUsuarioAuxiliarproveedor=='undefined') {
					throw new Exception("Reinicie la sesion");
				}				
			}
			
			/*VALIDAR CARGAR SESION USUARIO*/			
			$this->sistemaReturnGeneral=new sistema_param_return();
			$this->arrNombresClasesRelacionadas=array();
			$bigIdOpcion=$this->bigIdOpcion;
			
			$this->arrNombresClasesRelacionadas=$this->getClasesRelacionadas();
			
			if(!Constantes::$CON_LLAMADA_SIMPLE) {
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					
					/*SI ES RELACIONADO, FORZAR PERMISOS*/
					if($this->bitEsRelacionado) {
						$bigIdOpcion=0;
					}
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarproveedor,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, proveedor_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
					$this->opcionActual=$this->sistemaReturnGeneral->getOpcionActual();
					
					//SI ES RELACIONADO, SE MANTENGA PANTALLA PRINCIPAL RELACIONES COMO opcionActual
					if(!$this->bitEsRelacionado) {						
						$this->Session->write('opcionActual',serialize($this->opcionActual));
					}
					/*$this->sistemaReturnGeneral->settiene_permisos_paginaweb(true);*/
					
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
			}
			/*VALIDAR CARGAR SESION USUARIO*/
			
			
			/*ACTUALIZAR SESION USUARIO*/
			if($this->sistemaReturnGeneral->getUsuarioActual()->getId()!=$this->usuarioActual->getId()) {
				$this->Session->write('usuarioActual',serialize($this->sistemaReturnGeneral->getUsuarioActual()));
			}
			/*ACTUALIZAR SESION USUARIO*/
			
			
			
			/*VALIDACION_LICENCIA*/		
			$sUsuarioPCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_USER]:''; 
			$sNamePCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_HOST]:''; 
			$sIPPCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_ADDR]:'';
			$sMacAddressPCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_ADDR]:''; 
			$dFechaServer=date('Y-m-d');
			$idUsuario=$this->usuarioActual->getId();
			$sNombreModuloActual='';
			
			if($this->moduloActual!=null) {
				$sNombreModuloActual=$this->moduloActual->getnombre();
				/*'INVENTARIO';*/
			}
						
			$sNombreUsuarioActual=$this->usuarioActual->getuser_name();
			/*'ADMIN';*/
			
			/*if($sUsuarioPCCliente=='') {
				$sUsuarioPCCliente=$sNombreUsuarioActual;
			}*/
			
			if(!GlobalSeguridad::validarLicenciaCliente($sUsuarioPCCliente, $sNamePCCliente, $sIPPCCliente, $sMacAddressPCCliente, $dFechaServer, $idUsuario, $sNombreModuloActual, $sNombreUsuarioActual)) {
				throw new Exception(Mensajes::$SERROR_LICENCIA);
			}
			/*VALIDACION_LICENCIA_FIN*/
			
			
			/*VALIDACION_RESUMEN_USUARIO*/
			$validar_resumen_usuario=true;
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$validar_resumen_usuario=$this->resumenUsuarioLogicAdditional->validarResumenUsuarioController($this->usuarioActual,$this->resumenUsuarioActual);	/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
			} else {
				$validar_resumen_usuario=$this->sistemaReturnGeneral->getvalidar_resumen_usuario();
			}
			
			if($validar_resumen_usuario==false) {
				throw new Exception('Usuario ingresado mas de una vez, debe reingresar al sistema');
			}
			/*VALIDACION_RESUMEN_USUARIO_FIN*/
			
						
			
			/*VALIDACION_PAGINA*/
			$tiene_permisos_paginaweb=true;
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, proveedor_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina proveedor');
			}
			/*VALIDACION_PAGINA_FIN*/
									
			
			
			$this->inicializarPermisos();
						
			$this->setPermisosUsuario();
			
			$this->inicializarSetPermisosUsuarioClasesRelacionadas();
			
			/*ACCIONES*/
			$this->setAccionesUsuario();
			
			if($this->bitEsPopup || $this->bitEsSubPagina) {
				$this->strPermisoPopup='table-row';
			}
			
			
			$this->inicializarFKsDefault();
			
			
			
			$this->cargarCombosFK(false);
			
			
			//$existe_history=false;
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($proveedor_session);
			
			$this->getSetBusquedasSesionConfig($proveedor_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteproveedors($this->strAccionBusqueda,$this->proveedorLogic->getproveedors());*/
				} else if($this->strGenerarReporte=='Html')	{
					$proveedor_session->strServletGenerarHtmlReporte='proveedorServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($proveedor_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarproveedor!=null && $strTipoUsuarioAuxiliarproveedor=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($proveedor_session);
			}
								
			$this->set(proveedor_util::$STR_SESSION_NAME, $proveedor_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($proveedor_session);
			
			/*
			$this->proveedor->recursive = 0;
			
			$this->proveedors=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('proveedors', $this->proveedors);
			
			$this->set(proveedor_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->proveedorActual =$this->proveedorClase;
			
			/*$this->proveedorActual =$this->migrarModelproveedor($this->proveedorClase);*/
			
			$this->returnHtml(false);
			
			$this->set(proveedor_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=proveedor_util::$STR_NOMBRE_OPCION;
				
			if(proveedor_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=proveedor_util::$STR_MODULO_OPCION.proveedor_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));
			/*GUARDAR SESSION*/
			
			/*$this->strAuxiliarMensajeAlert=Funciones::mostrarMemoriaActual();*/
			
			$this->render('/'.Constantes::$STR_CARPETA_VIEWS.'/'.$strNombreViewIndex.'/'.$this->strTipoView);
		}
		catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function seleccionar() {
		try {
			/*$proveedorClase= (proveedor) proveedorsModel.getRowData();*/
			
			$this->proveedorClase->setId($this->proveedor->getId());	
			$this->proveedorClase->setVersionRow($this->proveedor->getVersionRow());	
			$this->proveedorClase->setVersionRow($this->proveedor->getVersionRow());	
			$this->proveedorClase->setid_empresa($this->proveedor->getid_empresa());	
			$this->proveedorClase->setid_tipo_persona($this->proveedor->getid_tipo_persona());	
			$this->proveedorClase->setid_categoria_proveedor($this->proveedor->getid_categoria_proveedor());	
			$this->proveedorClase->setid_giro_negocio_proveedor($this->proveedor->getid_giro_negocio_proveedor());	
			$this->proveedorClase->setcodigo($this->proveedor->getcodigo());	
			$this->proveedorClase->setruc($this->proveedor->getruc());	
			$this->proveedorClase->setprimer_apellido($this->proveedor->getprimer_apellido());	
			$this->proveedorClase->setsegundo_apellido($this->proveedor->getsegundo_apellido());	
			$this->proveedorClase->setprimer_nombre($this->proveedor->getprimer_nombre());	
			$this->proveedorClase->setsegundo_nombre($this->proveedor->getsegundo_nombre());	
			$this->proveedorClase->setnombre_completo($this->proveedor->getnombre_completo());	
			$this->proveedorClase->setdireccion($this->proveedor->getdireccion());	
			$this->proveedorClase->settelefono($this->proveedor->gettelefono());	
			$this->proveedorClase->settelefono_movil($this->proveedor->gettelefono_movil());	
			$this->proveedorClase->sete_mail($this->proveedor->gete_mail());	
			$this->proveedorClase->sete_mail2($this->proveedor->gete_mail2());	
			$this->proveedorClase->setcomentario($this->proveedor->getcomentario());	
			$this->proveedorClase->setimagen($this->proveedor->getimagen());	
			$this->proveedorClase->setactivo($this->proveedor->getactivo());	
			$this->proveedorClase->setid_pais($this->proveedor->getid_pais());	
			$this->proveedorClase->setid_provincia($this->proveedor->getid_provincia());	
			$this->proveedorClase->setid_ciudad($this->proveedor->getid_ciudad());	
			$this->proveedorClase->setcodigo_postal($this->proveedor->getcodigo_postal());	
			$this->proveedorClase->setfax($this->proveedor->getfax());	
			$this->proveedorClase->setcontacto($this->proveedor->getcontacto());	
			$this->proveedorClase->setid_vendedor($this->proveedor->getid_vendedor());	
			$this->proveedorClase->setmaximo_credito($this->proveedor->getmaximo_credito());	
			$this->proveedorClase->setmaximo_descuento($this->proveedor->getmaximo_descuento());	
			$this->proveedorClase->setinteres_anual($this->proveedor->getinteres_anual());	
			$this->proveedorClase->setbalance($this->proveedor->getbalance());	
			$this->proveedorClase->setid_termino_pago_proveedor($this->proveedor->getid_termino_pago_proveedor());	
			$this->proveedorClase->setid_cuenta($this->proveedor->getid_cuenta());	
			$this->proveedorClase->setaplica_impuesto_compras($this->proveedor->getaplica_impuesto_compras());	
			$this->proveedorClase->setid_impuesto($this->proveedor->getid_impuesto());	
			$this->proveedorClase->setaplica_retencion_impuesto($this->proveedor->getaplica_retencion_impuesto());	
			$this->proveedorClase->setid_retencion($this->proveedor->getid_retencion());	
			$this->proveedorClase->setaplica_retencion_fuente($this->proveedor->getaplica_retencion_fuente());	
			$this->proveedorClase->setid_retencion_fuente($this->proveedor->getid_retencion_fuente());	
			$this->proveedorClase->setaplica_retencion_ica($this->proveedor->getaplica_retencion_ica());	
			$this->proveedorClase->setid_retencion_ica($this->proveedor->getid_retencion_ica());	
			$this->proveedorClase->setaplica_2do_impuesto($this->proveedor->getaplica_2do_impuesto());	
			$this->proveedorClase->setid_otro_impuesto($this->proveedor->getid_otro_impuesto());	
			$this->proveedorClase->setcreado($this->proveedor->getcreado());	
			$this->proveedorClase->setmonto_ultima_transaccion($this->proveedor->getmonto_ultima_transaccion());	
			$this->proveedorClase->setfecha_ultima_transaccion($this->proveedor->getfecha_ultima_transaccion());	
			$this->proveedorClase->setdescripcion_ultima_transaccion($this->proveedor->getdescripcion_ultima_transaccion());	
		
			/*$this->Session->write('proveedorVersionRowActual', proveedor.getVersionRow());*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function seleccionarActual(int $id = null) {
		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->idActual=$id;
			
			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));
						
			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('proveedor', $this->proveedor->read(null, $id));
	
			
			$this->proveedor->recursive = 0;
			
			$this->proveedors=$this->paginate();
			
			$this->set('proveedors', $this->proveedors);
	
			if (empty($this->data)) {
				$this->data = $this->proveedor->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->proveedorLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->proveedorClase);
			
			$this->proveedorActual=$this->proveedorClase;
			
			/*$this->proveedorActual =$this->migrarModelproveedor($this->proveedorClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->proveedorLogic->getproveedors(),$this->proveedorActual);
			
			$this->actualizarControllerConReturnGeneral($this->proveedorReturnGeneral);
			
			//$this->proveedorReturnGeneral=$this->proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->proveedorLogic->getproveedors(),$this->proveedorActual,$this->proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));
						
			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoproveedor', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->proveedorClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->proveedorClase);
			
			$this->proveedorActual =$this->proveedorClase;
			
			/*$this->proveedorActual =$this->migrarModelproveedor($this->proveedorClase);*/
			
			$this->setproveedorFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->proveedorLogic->getproveedors(),$this->proveedor);
			
			$this->actualizarControllerConReturnGeneral($this->proveedorReturnGeneral);
			
			//this->proveedorReturnGeneral=$this->proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->proveedorLogic->getproveedors(),$this->proveedor,$this->proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idtipo_personaDefaultFK!=null && $this->idtipo_personaDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_tipo_persona($this->idtipo_personaDefaultFK);
			}

			if($this->idcategoria_proveedorDefaultFK!=null && $this->idcategoria_proveedorDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_categoria_proveedor($this->idcategoria_proveedorDefaultFK);
			}

			if($this->idgiro_negocio_proveedorDefaultFK!=null && $this->idgiro_negocio_proveedorDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_giro_negocio_proveedor($this->idgiro_negocio_proveedorDefaultFK);
			}

			if($this->idpaisDefaultFK!=null && $this->idpaisDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_pais($this->idpaisDefaultFK);
			}

			if($this->idprovinciaDefaultFK!=null && $this->idprovinciaDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_provincia($this->idprovinciaDefaultFK);
			}

			if($this->idciudadDefaultFK!=null && $this->idciudadDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_ciudad($this->idciudadDefaultFK);
			}

			if($this->idvendedorDefaultFK!=null && $this->idvendedorDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_vendedor($this->idvendedorDefaultFK);
			}

			if($this->idtermino_pago_proveedorDefaultFK!=null && $this->idtermino_pago_proveedorDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_termino_pago_proveedor($this->idtermino_pago_proveedorDefaultFK);
			}

			if($this->idcuentaDefaultFK!=null && $this->idcuentaDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_cuenta($this->idcuentaDefaultFK);
			}

			if($this->idimpuestoDefaultFK!=null && $this->idimpuestoDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_impuesto($this->idimpuestoDefaultFK);
			}

			if($this->idretencionDefaultFK!=null && $this->idretencionDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_retencion($this->idretencionDefaultFK);
			}

			if($this->idretencion_fuenteDefaultFK!=null && $this->idretencion_fuenteDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_retencion_fuente($this->idretencion_fuenteDefaultFK);
			}

			if($this->idretencion_icaDefaultFK!=null && $this->idretencion_icaDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_retencion_ica($this->idretencion_icaDefaultFK);
			}

			if($this->idotro_impuestoDefaultFK!=null && $this->idotro_impuestoDefaultFK > -1) {
				$this->proveedorReturnGeneral->getproveedor()->setid_otro_impuesto($this->idotro_impuestoDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->proveedorReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->proveedorReturnGeneral->getproveedor(),$this->proveedorActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyproveedor($this->proveedorReturnGeneral->getproveedor());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioproveedor($this->proveedorReturnGeneral->getproveedor());*/
			}
			
			if($this->proveedorReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->proveedorReturnGeneral->getproveedor(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualproveedor($this->proveedor,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->proveedorsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->proveedorsAuxiliar=array();
			}
			
			if(count($this->proveedorsAuxiliar)==2) {
				$proveedorOrigen=$this->proveedorsAuxiliar[0];
				$proveedorDestino=$this->proveedorsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($proveedorOrigen,$proveedorDestino,true,false,false);
				
				$this->actualizarLista($proveedorDestino,$this->proveedors);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->proveedorsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->proveedorsAuxiliar=array();
			}
			
			if(count($this->proveedorsAuxiliar) > 0) {
				foreach ($this->proveedorsAuxiliar as $proveedorSeleccionado) {
					$this->proveedor=new proveedor();
					
					$this->setCopiarVariablesObjetos($proveedorSeleccionado,$this->proveedor,true,true,false);
						
					$this->proveedors[]=$this->proveedor;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->proveedorsEliminados as $proveedorEliminado) {
				$this->proveedorLogic->proveedors[]=$proveedorEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->proveedor=new proveedor();
							
				$this->proveedors[]=$this->proveedor;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function editarTablaDatos() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);						
			
			if($this->bitConEditar) {
				$this->bitConAltoMaximoTabla=true;
			}
			
			$this->getHtmlTablaDatos(false);
															
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	function guardarCambiosTablas() {
		$indice=0;
		$maxima_fila=0;
		
		if($this->existDataTabla('t'.$this->strSufijo)) {
			$maxima_fila=$this->getDataMaximaFila();
		}
		
		$proveedorActual=new proveedor();
		
		if($maxima_fila!=null && $maxima_fila>0) {
			for($i=1;$i<=$maxima_fila;$i++) {
				/*CUANDO NO EXISTE DATOS TABLA*/
				if($this->existDataCampoFormTabla('cel_'.$i.'_0','t'.$this->strSufijo)) {
					if($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_0')==null) {
						break;	
					}
				} else {
					break;
				}
				
				$indice=$i-1;								
				
				$proveedorActual=$this->proveedors[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $proveedorActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $proveedorActual->setid_tipo_persona((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $proveedorActual->setid_categoria_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $proveedorActual->setid_giro_negocio_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $proveedorActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $proveedorActual->setruc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $proveedorActual->setprimer_apellido($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $proveedorActual->setsegundo_apellido($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $proveedorActual->setprimer_nombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $proveedorActual->setsegundo_nombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $proveedorActual->setnombre_completo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $proveedorActual->setdireccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $proveedorActual->settelefono($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $proveedorActual->settelefono_movil($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $proveedorActual->sete_mail($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $proveedorActual->sete_mail2($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $proveedorActual->setcomentario($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $proveedorActual->setimagen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $proveedorActual->setactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_21')));  } else { $proveedorActual->setactivo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $proveedorActual->setid_pais((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $proveedorActual->setid_provincia((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $proveedorActual->setid_ciudad((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $proveedorActual->setcodigo_postal($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $proveedorActual->setfax($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $proveedorActual->setcontacto($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $proveedorActual->setid_vendedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $proveedorActual->setmaximo_credito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $proveedorActual->setmaximo_descuento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $proveedorActual->setinteres_anual((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $proveedorActual->setbalance((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $proveedorActual->setid_termino_pago_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_33'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $proveedorActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_34'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $proveedorActual->setaplica_impuesto_compras(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_35')));  } else { $proveedorActual->setaplica_impuesto_compras(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $proveedorActual->setid_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_36'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $proveedorActual->setaplica_retencion_impuesto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_37')));  } else { $proveedorActual->setaplica_retencion_impuesto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $proveedorActual->setid_retencion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $proveedorActual->setaplica_retencion_fuente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_39')));  } else { $proveedorActual->setaplica_retencion_fuente(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $proveedorActual->setid_retencion_fuente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_41','t'.$this->strSufijo)) {  $proveedorActual->setaplica_retencion_ica(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_41')));  } else { $proveedorActual->setaplica_retencion_ica(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_42','t'.$this->strSufijo)) {  $proveedorActual->setid_retencion_ica((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_42'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_43','t'.$this->strSufijo)) {  $proveedorActual->setaplica_2do_impuesto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_43')));  } else { $proveedorActual->setaplica_2do_impuesto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_44','t'.$this->strSufijo)) {  $proveedorActual->setid_otro_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_44'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_45','t'.$this->strSufijo)) {  $proveedorActual->setcreado(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_45')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_46','t'.$this->strSufijo)) {  $proveedorActual->setmonto_ultima_transaccion((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_46'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_47','t'.$this->strSufijo)) {  $proveedorActual->setfecha_ultima_transaccion(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_47')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_48','t'.$this->strSufijo)) {  $proveedorActual->setdescripcion_ultima_transaccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_48'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->proveedorsAuxiliar=array();		 
		/*$this->proveedorsEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->proveedorsAuxiliar=array();
		}
			
		if(count($this->proveedorsAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->proveedorsAuxiliar as $proveedorAuxLocal) {				
				
				foreach($this->proveedors as $proveedorLocal) {
					if($proveedorLocal->getId()==$proveedorAuxLocal->getId()) {
						$proveedorLocal->setIsDeleted(true);
						
						/*$this->proveedorsEliminados[]=$proveedorLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->proveedorLogic->setproveedors($this->proveedors);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}	
	
	
	
	
	public function cancelarAccionesRelaciones() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->strVisibleTablaAccionesRelaciones='none';	
			
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function recargarInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadproveedor='',string $strTipoPaginaAuxiliarproveedor='',string $strTipoUsuarioAuxiliarproveedor='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadproveedor,$strTipoPaginaAuxiliarproveedor,$strTipoUsuarioAuxiliarproveedor,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->proveedors) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=proveedor_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=proveedor_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=proveedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
		$finalQueryGlobal=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,!$esBusqueda,$esBusqueda,$arrColumnasGlobales);
		
		
		/*QUERY GLOBAL GLOBAL + SELECCIONAR_LOTE + ORDER_QUERY
		SELECCIONAR_LOTE*/
		if($this->strFinalQuerySeleccionarLote!='') {			
			$finalQueryPaginacion=$finalQueryPaginacion.$this->strFinalQuerySeleccionarLote;
		}
		
		/*GLOBAL*/
		if($finalQueryGlobal!='') {
			$finalQueryPaginacion=$finalQueryGlobal.$finalQueryPaginacion;
		}
				
		/*ORDER_QUERY*/
		if($this->orderByQuery!='') {
			$finalQueryPaginacion=$finalQueryPaginacion.$this->orderByQuery;
		}	
		
		/*QUERY GLOBAL GLOBAL + SELECCIONAR_LOTE + ORDER_QUERY*/
		
		try {				
			
			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));
						
			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}
			
			/*$this->cargarParametrosReporte();
			
			$this->cargarParamsPostAccion();*/
			
			$this->inicializarVariables('NORMAL');
			
			if($this->strTipoPaginacion!='TODOS' && $this->strTipoPaginacion!='') { //Combo Paginacion 5-10-15
				$this->intNumeroPaginacion=(int)$this->strTipoPaginacion;				
			} else {
				if($this->strTipoPaginacion=='TODOS') {
					$this->pagination->setBlnConNumeroMaximo(true);
				} else {
					/*$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;*/
					
					if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
					}
				}
			}
			
			$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
			$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
			/*$this->pagination->setBlnConNumeroMaximo(true);*/
						
			/*
			//DESHABILITADO AQUI, LA PAGINACION EN DATAACCESS
			if($this->intNumeroPaginacion!=null && $this->intNumeroPaginacionPagina!=null){ 						
				$finalQueryPaginacion=' LIMIT '.$this->intNumeroPaginacion.','.$this->intNumeroPaginacionPagina;
			}
			*/
			
			$this->proveedorsEliminados=array();
			
			/*$this->proveedorLogic->setConnexion($connexion);*/
			
			$this->proveedorLogic->setIsConDeep(true);
			
			$this->proveedorLogic->getproveedorDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_persona');$classes[]=$class;
			$class=new Classe('categoria_proveedor');$classes[]=$class;
			$class=new Classe('giro_negocio_proveedor');$classes[]=$class;
			$class=new Classe('pais');$classes[]=$class;
			$class=new Classe('provincia');$classes[]=$class;
			$class=new Classe('ciudad');$classes[]=$class;
			$class=new Classe('vendedor');$classes[]=$class;
			$class=new Classe('termino_pago_proveedor');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			$class=new Classe('impuesto');$classes[]=$class;
			$class=new Classe('retencion');$classes[]=$class;
			$class=new Classe('retencion_fuente');$classes[]=$class;
			$class=new Classe('retencion_ica');$classes[]=$class;
			$class=new Classe('otro_impuesto');$classes[]=$class;
			
			$this->proveedorLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->proveedorLogic->getproveedors()==null|| count($this->proveedorLogic->getproveedors())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->proveedors=$this->proveedorLogic->getproveedors();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();
									
						/*$this->generarReportes('Todos',$this->proveedorLogic->getproveedors());*/
					
						$this->proveedorLogic->setproveedors($this->proveedors);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->proveedorLogic->getproveedors()==null|| count($this->proveedorLogic->getproveedors())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->proveedors=$this->proveedorLogic->getproveedors();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();
									
						/*$this->generarReportes('Todos',$this->proveedorLogic->getproveedors());*/
					
						$this->proveedorLogic->setproveedors($this->proveedors);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idproveedor=0;*/
				
				if($proveedor_session->bitBusquedaDesdeFKSesionFK!=null && $proveedor_session->bitBusquedaDesdeFKSesionFK==true) {
					if($proveedor_session->bigIdActualFK!=null && $proveedor_session->bigIdActualFK!=0)	{
						$this->idproveedor=$proveedor_session->bigIdActualFK;	
					}
					
					$proveedor_session->bitBusquedaDesdeFKSesionFK=false;
					
					$proveedor_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idproveedor=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idproveedor=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->proveedorLogic->getEntity($this->idproveedor);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*proveedorLogicAdditional::getDetalleIndicePorId($idproveedor);*/

				
				if($this->proveedorLogic->getproveedor()!=null) {
					$this->proveedorLogic->setproveedors(array());
					$this->proveedorLogic->proveedors[]=$this->proveedorLogic->getproveedor();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcategoria_proveedor')
			{

				if($proveedor_session->bigidcategoria_proveedorActual!=null && $proveedor_session->bigidcategoria_proveedorActual!=0)
				{
					$this->id_categoria_proveedorFK_Idcategoria_proveedor=$proveedor_session->bigidcategoria_proveedorActual;
					$proveedor_session->bigidcategoria_proveedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idcategoria_proveedor($finalQueryPaginacion,$this->pagination,$this->id_categoria_proveedorFK_Idcategoria_proveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idcategoria_proveedor($this->id_categoria_proveedorFK_Idcategoria_proveedor);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idcategoria_proveedor('',$this->pagination,$this->id_categoria_proveedorFK_Idcategoria_proveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idcategoria_proveedor",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idciudad')
			{

				if($proveedor_session->bigidciudadActual!=null && $proveedor_session->bigidciudadActual!=0)
				{
					$this->id_ciudadFK_Idciudad=$proveedor_session->bigidciudadActual;
					$proveedor_session->bigidciudadActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idciudad($finalQueryPaginacion,$this->pagination,$this->id_ciudadFK_Idciudad);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idciudad($this->id_ciudadFK_Idciudad);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idciudad('',$this->pagination,$this->id_ciudadFK_Idciudad);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idciudad",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta')
			{

				if($proveedor_session->bigidcuentaActual!=null && $proveedor_session->bigidcuentaActual!=0)
				{
					$this->id_cuentaFK_Idcuenta=$proveedor_session->bigidcuentaActual;
					$proveedor_session->bigidcuentaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idcuenta($finalQueryPaginacion,$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idcuenta($this->id_cuentaFK_Idcuenta);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idcuenta('',$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idcuenta",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($proveedor_session->bigidempresaActual!=null && $proveedor_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$proveedor_session->bigidempresaActual;
					$proveedor_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idempresa",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idgiro_negocio_proveedor')
			{

				if($proveedor_session->bigidgiro_negocio_proveedorActual!=null && $proveedor_session->bigidgiro_negocio_proveedorActual!=0)
				{
					$this->id_giro_negocio_proveedorFK_Idgiro_negocio_proveedor=$proveedor_session->bigidgiro_negocio_proveedorActual;
					$proveedor_session->bigidgiro_negocio_proveedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idgiro_negocio_proveedor($finalQueryPaginacion,$this->pagination,$this->id_giro_negocio_proveedorFK_Idgiro_negocio_proveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idgiro_negocio_proveedor($this->id_giro_negocio_proveedorFK_Idgiro_negocio_proveedor);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idgiro_negocio_proveedor('',$this->pagination,$this->id_giro_negocio_proveedorFK_Idgiro_negocio_proveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idgiro_negocio_proveedor",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idimpuesto')
			{

				if($proveedor_session->bigidimpuestoActual!=null && $proveedor_session->bigidimpuestoActual!=0)
				{
					$this->id_impuestoFK_Idimpuesto=$proveedor_session->bigidimpuestoActual;
					$proveedor_session->bigidimpuestoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idimpuesto($finalQueryPaginacion,$this->pagination,$this->id_impuestoFK_Idimpuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idimpuesto($this->id_impuestoFK_Idimpuesto);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idimpuesto('',$this->pagination,$this->id_impuestoFK_Idimpuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idimpuesto",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idotro_impuesto')
			{

				if($proveedor_session->bigidotro_impuestoActual!=null && $proveedor_session->bigidotro_impuestoActual!=0)
				{
					$this->id_otro_impuestoFK_Idotro_impuesto=$proveedor_session->bigidotro_impuestoActual;
					$proveedor_session->bigidotro_impuestoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idotro_impuesto($finalQueryPaginacion,$this->pagination,$this->id_otro_impuestoFK_Idotro_impuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idotro_impuesto($this->id_otro_impuestoFK_Idotro_impuesto);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idotro_impuesto('',$this->pagination,$this->id_otro_impuestoFK_Idotro_impuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idotro_impuesto",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idpais')
			{

				if($proveedor_session->bigidpaisActual!=null && $proveedor_session->bigidpaisActual!=0)
				{
					$this->id_paisFK_Idpais=$proveedor_session->bigidpaisActual;
					$proveedor_session->bigidpaisActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idpais($finalQueryPaginacion,$this->pagination,$this->id_paisFK_Idpais);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idpais($this->id_paisFK_Idpais);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idpais('',$this->pagination,$this->id_paisFK_Idpais);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idpais",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idprovincia')
			{

				if($proveedor_session->bigidprovinciaActual!=null && $proveedor_session->bigidprovinciaActual!=0)
				{
					$this->id_provinciaFK_Idprovincia=$proveedor_session->bigidprovinciaActual;
					$proveedor_session->bigidprovinciaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idprovincia($finalQueryPaginacion,$this->pagination,$this->id_provinciaFK_Idprovincia);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idprovincia($this->id_provinciaFK_Idprovincia);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idprovincia('',$this->pagination,$this->id_provinciaFK_Idprovincia);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idprovincia",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idretencion')
			{

				if($proveedor_session->bigidretencionActual!=null && $proveedor_session->bigidretencionActual!=0)
				{
					$this->id_retencionFK_Idretencion=$proveedor_session->bigidretencionActual;
					$proveedor_session->bigidretencionActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idretencion($finalQueryPaginacion,$this->pagination,$this->id_retencionFK_Idretencion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idretencion($this->id_retencionFK_Idretencion);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idretencion('',$this->pagination,$this->id_retencionFK_Idretencion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idretencion",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idretencion_fuente')
			{

				if($proveedor_session->bigidretencion_fuenteActual!=null && $proveedor_session->bigidretencion_fuenteActual!=0)
				{
					$this->id_retencion_fuenteFK_Idretencion_fuente=$proveedor_session->bigidretencion_fuenteActual;
					$proveedor_session->bigidretencion_fuenteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idretencion_fuente($finalQueryPaginacion,$this->pagination,$this->id_retencion_fuenteFK_Idretencion_fuente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idretencion_fuente($this->id_retencion_fuenteFK_Idretencion_fuente);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idretencion_fuente('',$this->pagination,$this->id_retencion_fuenteFK_Idretencion_fuente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idretencion_fuente",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idretencion_ica')
			{

				if($proveedor_session->bigidretencion_icaActual!=null && $proveedor_session->bigidretencion_icaActual!=0)
				{
					$this->id_retencion_icaFK_Idretencion_ica=$proveedor_session->bigidretencion_icaActual;
					$proveedor_session->bigidretencion_icaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idretencion_ica($finalQueryPaginacion,$this->pagination,$this->id_retencion_icaFK_Idretencion_ica);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idretencion_ica($this->id_retencion_icaFK_Idretencion_ica);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idretencion_ica('',$this->pagination,$this->id_retencion_icaFK_Idretencion_ica);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idretencion_ica",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtermino_pago_proveedor')
			{

				if($proveedor_session->bigidtermino_pago_proveedorActual!=null && $proveedor_session->bigidtermino_pago_proveedorActual!=0)
				{
					$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=$proveedor_session->bigidtermino_pago_proveedorActual;
					$proveedor_session->bigidtermino_pago_proveedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idtermino_pago_proveedor($finalQueryPaginacion,$this->pagination,$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idtermino_pago_proveedor($this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idtermino_pago_proveedor('',$this->pagination,$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idtermino_pago_proveedor",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_persona')
			{

				if($proveedor_session->bigidtipo_personaActual!=null && $proveedor_session->bigidtipo_personaActual!=0)
				{
					$this->id_tipo_personaFK_Idtipo_persona=$proveedor_session->bigidtipo_personaActual;
					$proveedor_session->bigidtipo_personaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idtipo_persona($finalQueryPaginacion,$this->pagination,$this->id_tipo_personaFK_Idtipo_persona);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idtipo_persona($this->id_tipo_personaFK_Idtipo_persona);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idtipo_persona('',$this->pagination,$this->id_tipo_personaFK_Idtipo_persona);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idtipo_persona",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idvendedor')
			{

				if($proveedor_session->bigidvendedorActual!=null && $proveedor_session->bigidvendedorActual!=0)
				{
					$this->id_vendedorFK_Idvendedor=$proveedor_session->bigidvendedorActual;
					$proveedor_session->bigidvendedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idvendedor($finalQueryPaginacion,$this->pagination,$this->id_vendedorFK_Idvendedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//proveedorLogicAdditional::getDetalleIndiceFK_Idvendedor($this->id_vendedorFK_Idvendedor);


					if($this->proveedorLogic->getproveedors()==null || count($this->proveedorLogic->getproveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$proveedors=$this->proveedorLogic->getproveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->proveedorLogic->getsFK_Idvendedor('',$this->pagination,$this->id_vendedorFK_Idvendedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->proveedorsReporte=$this->proveedorLogic->getproveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproveedors("FK_Idvendedor",$this->proveedorLogic->getproveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->proveedorLogic->setproveedors($proveedors);
					}
				//}

			} 
		
		$proveedor_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$proveedor_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->proveedorLogic->loadForeignsKeysDescription();*/
		
		$this->proveedors=$this->proveedorLogic->getproveedors();
		
		if($this->proveedorsEliminados==null) {
			$this->proveedorsEliminados=array();
		}
		
		$this->Session->write(proveedor_util::$STR_SESSION_NAME.'Lista',serialize($this->proveedors));
		$this->Session->write(proveedor_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->proveedorsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idproveedor=$idGeneral;
			
			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}
			
			
			if($this->intNumeroPaginacionPagina - $this->intNumeroPaginacion < $this->intNumeroPaginacion) {
				$this->intNumeroPaginacionPagina=0;		
			} else {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina - $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if(count($this->proveedors) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idcategoria_proveedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_categoria_proveedorFK_Idcategoria_proveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcategoria_proveedor','cmbid_categoria_proveedor');

			$this->strAccionBusqueda='FK_Idcategoria_proveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdciudadParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ciudadFK_Idciudad=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idciudad','cmbid_ciudad');

			$this->strAccionBusqueda='FK_Idciudad';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdcuentaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuentaFK_Idcuenta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta','cmbid_cuenta');

			$this->strAccionBusqueda='FK_Idcuenta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdempresaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idgiro_negocio_proveedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_giro_negocio_proveedorFK_Idgiro_negocio_proveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idgiro_negocio_proveedor','cmbid_giro_negocio_proveedor');

			$this->strAccionBusqueda='FK_Idgiro_negocio_proveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdimpuestoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_impuestoFK_Idimpuesto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idimpuesto','cmbid_impuesto');

			$this->strAccionBusqueda='FK_Idimpuesto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idotro_impuestoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_otro_impuestoFK_Idotro_impuesto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idotro_impuesto','cmbid_otro_impuesto');

			$this->strAccionBusqueda='FK_Idotro_impuesto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdpaisParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_paisFK_Idpais=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idpais','cmbid_pais');

			$this->strAccionBusqueda='FK_Idpais';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdprovinciaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_provinciaFK_Idprovincia=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idprovincia','cmbid_provincia');

			$this->strAccionBusqueda='FK_Idprovincia';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdretencionParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_retencionFK_Idretencion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idretencion','cmbid_retencion');

			$this->strAccionBusqueda='FK_Idretencion';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idretencion_fuenteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_retencion_fuenteFK_Idretencion_fuente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idretencion_fuente','cmbid_retencion_fuente');

			$this->strAccionBusqueda='FK_Idretencion_fuente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idretencion_icaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_retencion_icaFK_Idretencion_ica=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idretencion_ica','cmbid_retencion_ica');

			$this->strAccionBusqueda='FK_Idretencion_ica';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtermino_pago_proveedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtermino_pago_proveedor','cmbid_termino_pago_proveedor');

			$this->strAccionBusqueda='FK_Idtermino_pago_proveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_personaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_personaFK_Idtipo_persona=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_persona','cmbid_tipo_persona');

			$this->strAccionBusqueda='FK_Idtipo_persona';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdvendedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_vendedorFK_Idvendedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idvendedor','cmbid_vendedor');

			$this->strAccionBusqueda='FK_Idvendedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcategoria_proveedor($strFinalQuery,$id_categoria_proveedor)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idcategoria_proveedor($strFinalQuery,new Pagination(),$id_categoria_proveedor);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idciudad($strFinalQuery,$id_ciudad)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idciudad($strFinalQuery,new Pagination(),$id_ciudad);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcuenta($strFinalQuery,$id_cuenta)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idcuenta($strFinalQuery,new Pagination(),$id_cuenta);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idempresa($strFinalQuery,$id_empresa)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idgiro_negocio_proveedor($strFinalQuery,$id_giro_negocio_proveedor)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idgiro_negocio_proveedor($strFinalQuery,new Pagination(),$id_giro_negocio_proveedor);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idimpuesto($strFinalQuery,$id_impuesto)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idimpuesto($strFinalQuery,new Pagination(),$id_impuesto);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idotro_impuesto($strFinalQuery,$id_otro_impuesto)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idotro_impuesto($strFinalQuery,new Pagination(),$id_otro_impuesto);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idpais($strFinalQuery,$id_pais)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idpais($strFinalQuery,new Pagination(),$id_pais);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idprovincia($strFinalQuery,$id_provincia)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idprovincia($strFinalQuery,new Pagination(),$id_provincia);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idretencion($strFinalQuery,$id_retencion)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idretencion($strFinalQuery,new Pagination(),$id_retencion);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idretencion_fuente($strFinalQuery,$id_retencion_fuente)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idretencion_fuente($strFinalQuery,new Pagination(),$id_retencion_fuente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idretencion_ica($strFinalQuery,$id_retencion_ica)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idretencion_ica($strFinalQuery,new Pagination(),$id_retencion_ica);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtermino_pago_proveedor($strFinalQuery,$id_termino_pago_proveedor)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idtermino_pago_proveedor($strFinalQuery,new Pagination(),$id_termino_pago_proveedor);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_persona($strFinalQuery,$id_tipo_persona)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idtipo_persona($strFinalQuery,new Pagination(),$id_tipo_persona);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idvendedor($strFinalQuery,$id_vendedor)
	{
		try
		{

			$this->proveedorLogic->getsFK_Idvendedor($strFinalQuery,new Pagination(),$id_vendedor);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	
		
	
	function cargarCombosFK(bool $cargarControllerDesdeSession=true) {		
		
		try {
			
			if($cargarControllerDesdeSession) {
				/*SOLO SI ES NECESARIO*/
				$this->saveGetSessionControllerAndPageAuxiliar(false);
			}
			
			
			$proveedorForeignKey=new proveedor_param_return(); //proveedorForeignKey();
			
			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));
						
			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$proveedorForeignKey=$this->proveedorLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$proveedor_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$proveedorForeignKey->empresasFK;
				$this->idempresaDefaultFK=$proveedorForeignKey->idempresaDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_persona',$this->strRecargarFkTipos,',')) {
				$this->tipo_personasFK=$proveedorForeignKey->tipo_personasFK;
				$this->idtipo_personaDefaultFK=$proveedorForeignKey->idtipo_personaDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesiontipo_persona) {
				$this->setVisibleBusquedasParatipo_persona(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_categoria_proveedor',$this->strRecargarFkTipos,',')) {
				$this->categoria_proveedorsFK=$proveedorForeignKey->categoria_proveedorsFK;
				$this->idcategoria_proveedorDefaultFK=$proveedorForeignKey->idcategoria_proveedorDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesioncategoria_proveedor) {
				$this->setVisibleBusquedasParacategoria_proveedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_giro_negocio_proveedor',$this->strRecargarFkTipos,',')) {
				$this->giro_negocio_proveedorsFK=$proveedorForeignKey->giro_negocio_proveedorsFK;
				$this->idgiro_negocio_proveedorDefaultFK=$proveedorForeignKey->idgiro_negocio_proveedorDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesiongiro_negocio_proveedor) {
				$this->setVisibleBusquedasParagiro_negocio_proveedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_pais',$this->strRecargarFkTipos,',')) {
				$this->paissFK=$proveedorForeignKey->paissFK;
				$this->idpaisDefaultFK=$proveedorForeignKey->idpaisDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesionpais) {
				$this->setVisibleBusquedasParapais(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_provincia',$this->strRecargarFkTipos,',')) {
				$this->provinciasFK=$proveedorForeignKey->provinciasFK;
				$this->idprovinciaDefaultFK=$proveedorForeignKey->idprovinciaDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesionprovincia) {
				$this->setVisibleBusquedasParaprovincia(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ciudad',$this->strRecargarFkTipos,',')) {
				$this->ciudadsFK=$proveedorForeignKey->ciudadsFK;
				$this->idciudadDefaultFK=$proveedorForeignKey->idciudadDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesionciudad) {
				$this->setVisibleBusquedasParaciudad(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_vendedor',$this->strRecargarFkTipos,',')) {
				$this->vendedorsFK=$proveedorForeignKey->vendedorsFK;
				$this->idvendedorDefaultFK=$proveedorForeignKey->idvendedorDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesionvendedor) {
				$this->setVisibleBusquedasParavendedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_proveedor',$this->strRecargarFkTipos,',')) {
				$this->termino_pago_proveedorsFK=$proveedorForeignKey->termino_pago_proveedorsFK;
				$this->idtermino_pago_proveedorDefaultFK=$proveedorForeignKey->idtermino_pago_proveedorDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor) {
				$this->setVisibleBusquedasParatermino_pago_proveedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$this->strRecargarFkTipos,',')) {
				$this->cuentasFK=$proveedorForeignKey->cuentasFK;
				$this->idcuentaDefaultFK=$proveedorForeignKey->idcuentaDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesioncuenta) {
				$this->setVisibleBusquedasParacuenta(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_impuesto',$this->strRecargarFkTipos,',')) {
				$this->impuestosFK=$proveedorForeignKey->impuestosFK;
				$this->idimpuestoDefaultFK=$proveedorForeignKey->idimpuestoDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesionimpuesto) {
				$this->setVisibleBusquedasParaimpuesto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion',$this->strRecargarFkTipos,',')) {
				$this->retencionsFK=$proveedorForeignKey->retencionsFK;
				$this->idretencionDefaultFK=$proveedorForeignKey->idretencionDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesionretencion) {
				$this->setVisibleBusquedasPararetencion(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion_fuente',$this->strRecargarFkTipos,',')) {
				$this->retencion_fuentesFK=$proveedorForeignKey->retencion_fuentesFK;
				$this->idretencion_fuenteDefaultFK=$proveedorForeignKey->idretencion_fuenteDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesionretencion_fuente) {
				$this->setVisibleBusquedasPararetencion_fuente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion_ica',$this->strRecargarFkTipos,',')) {
				$this->retencion_icasFK=$proveedorForeignKey->retencion_icasFK;
				$this->idretencion_icaDefaultFK=$proveedorForeignKey->idretencion_icaDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesionretencion_ica) {
				$this->setVisibleBusquedasPararetencion_ica(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_impuesto',$this->strRecargarFkTipos,',')) {
				$this->otro_impuestosFK=$proveedorForeignKey->otro_impuestosFK;
				$this->idotro_impuestoDefaultFK=$proveedorForeignKey->idotro_impuestoDefaultFK;
			}

			if($proveedor_session->bitBusquedaDesdeFKSesionotro_impuesto) {
				$this->setVisibleBusquedasParaotro_impuesto(true);
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			
			
			/*//RECARGAR COMBOS SIN ELEMENTOS
			if($this->strRecargarFkTiposNinguno!=null && $this->strRecargarFkTiposNinguno!='NINGUNO' && $this->strRecargarFkTiposNinguno!='') {*/
			/*}*/
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	function cargarCombosFKFromReturnGeneral($proveedorReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$proveedorReturnGeneral->strRecargarFkTipos;
			
			


			if($proveedorReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$proveedorReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$proveedorReturnGeneral->idempresaDefaultFK;
			}


			if($proveedorReturnGeneral->con_tipo_personasFK==true) {
				$this->tipo_personasFK=$proveedorReturnGeneral->tipo_personasFK;
				$this->idtipo_personaDefaultFK=$proveedorReturnGeneral->idtipo_personaDefaultFK;
			}


			if($proveedorReturnGeneral->con_categoria_proveedorsFK==true) {
				$this->categoria_proveedorsFK=$proveedorReturnGeneral->categoria_proveedorsFK;
				$this->idcategoria_proveedorDefaultFK=$proveedorReturnGeneral->idcategoria_proveedorDefaultFK;
			}


			if($proveedorReturnGeneral->con_giro_negocio_proveedorsFK==true) {
				$this->giro_negocio_proveedorsFK=$proveedorReturnGeneral->giro_negocio_proveedorsFK;
				$this->idgiro_negocio_proveedorDefaultFK=$proveedorReturnGeneral->idgiro_negocio_proveedorDefaultFK;
			}


			if($proveedorReturnGeneral->con_paissFK==true) {
				$this->paissFK=$proveedorReturnGeneral->paissFK;
				$this->idpaisDefaultFK=$proveedorReturnGeneral->idpaisDefaultFK;
			}


			if($proveedorReturnGeneral->con_provinciasFK==true) {
				$this->provinciasFK=$proveedorReturnGeneral->provinciasFK;
				$this->idprovinciaDefaultFK=$proveedorReturnGeneral->idprovinciaDefaultFK;
			}


			if($proveedorReturnGeneral->con_ciudadsFK==true) {
				$this->ciudadsFK=$proveedorReturnGeneral->ciudadsFK;
				$this->idciudadDefaultFK=$proveedorReturnGeneral->idciudadDefaultFK;
			}


			if($proveedorReturnGeneral->con_vendedorsFK==true) {
				$this->vendedorsFK=$proveedorReturnGeneral->vendedorsFK;
				$this->idvendedorDefaultFK=$proveedorReturnGeneral->idvendedorDefaultFK;
			}


			if($proveedorReturnGeneral->con_termino_pago_proveedorsFK==true) {
				$this->termino_pago_proveedorsFK=$proveedorReturnGeneral->termino_pago_proveedorsFK;
				$this->idtermino_pago_proveedorDefaultFK=$proveedorReturnGeneral->idtermino_pago_proveedorDefaultFK;
			}


			if($proveedorReturnGeneral->con_cuentasFK==true) {
				$this->cuentasFK=$proveedorReturnGeneral->cuentasFK;
				$this->idcuentaDefaultFK=$proveedorReturnGeneral->idcuentaDefaultFK;
			}


			if($proveedorReturnGeneral->con_impuestosFK==true) {
				$this->impuestosFK=$proveedorReturnGeneral->impuestosFK;
				$this->idimpuestoDefaultFK=$proveedorReturnGeneral->idimpuestoDefaultFK;
			}


			if($proveedorReturnGeneral->con_retencionsFK==true) {
				$this->retencionsFK=$proveedorReturnGeneral->retencionsFK;
				$this->idretencionDefaultFK=$proveedorReturnGeneral->idretencionDefaultFK;
			}


			if($proveedorReturnGeneral->con_retencion_fuentesFK==true) {
				$this->retencion_fuentesFK=$proveedorReturnGeneral->retencion_fuentesFK;
				$this->idretencion_fuenteDefaultFK=$proveedorReturnGeneral->idretencion_fuenteDefaultFK;
			}


			if($proveedorReturnGeneral->con_retencion_icasFK==true) {
				$this->retencion_icasFK=$proveedorReturnGeneral->retencion_icasFK;
				$this->idretencion_icaDefaultFK=$proveedorReturnGeneral->idretencion_icaDefaultFK;
			}


			if($proveedorReturnGeneral->con_otro_impuestosFK==true) {
				$this->otro_impuestosFK=$proveedorReturnGeneral->otro_impuestosFK;
				$this->idotro_impuestoDefaultFK=$proveedorReturnGeneral->idotro_impuestoDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(proveedor_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));
		
		if($proveedor_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_persona_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_persona';
			}
			else if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==categoria_proveedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='categoria_proveedor';
			}
			else if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==giro_negocio_proveedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='giro_negocio_proveedor';
			}
			else if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==pais_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='pais';
			}
			else if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==provincia_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='provincia';
			}
			else if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ciudad_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ciudad';
			}
			else if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==vendedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='vendedor';
			}
			else if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==termino_pago_proveedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='termino_pago_proveedor';
			}
			else if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			else if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==impuesto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='impuesto';
			}
			else if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==retencion_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='retencion';
			}
			else if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==retencion_fuente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='retencion_fuente';
			}
			else if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==retencion_ica_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='retencion_ica';
			}
			else if($proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==otro_impuesto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='otro_impuesto';
			}
			
			$proveedor_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}						
			
			$this->proveedorsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->proveedorsAuxiliar=array();
			}
			
			if(count($this->proveedorsAuxiliar) > 0) {
				
				foreach ($this->proveedorsAuxiliar as $proveedorSeleccionado) {
					$this->eliminarTablaBase($proveedorSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getTiposRelacionesReporte() : array {
		$arrTiposRelacionesReportes=array();
				
		$tipoRelacionReporte=new Reporte();
		
		/*$tipoRelacionReporte->setsCodigo(PerfilConstantesFunciones::$LABEL_IDSISTEMA);
		$tipoRelacionReporte->setsDescripcion(PerfilConstantesFunciones::$LABEL_IDSISTEMA);

		$arrTiposRelacionesReportes[]=$tipoRelacionReporte;*/
		
		if(!$this->bitEsRelaciones) {
			


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('cuenta_pagar');
			$tipoRelacionReporte->setsDescripcion('Cuenta Pagars');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('documento_proveedor');
			$tipoRelacionReporte->setsDescripcion('Documentos eses');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('imagen_proveedor');
			$tipoRelacionReporte->setsDescripcion('Imagenes eses');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('lista_precio');
			$tipoRelacionReporte->setsDescripcion('Lista Precioses');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('orden_compra');
			$tipoRelacionReporte->setsDescripcion('Orden Compras');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('otro_suplidor');
			$tipoRelacionReporte->setsDescripcion('Otro Suplidores');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=lista_precio_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=orden_compra_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=cuenta_pagar_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=imagen_proveedor_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=documento_proveedor_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=otro_suplidor_util::$STR_NOMBRE_CLASE;
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
	}
	
	
	
	public function getempresasFKListSelectItem() 
	{
		$empresasList=array();

		$item=null;

		foreach($this->empresasFK as $empresa)
		{
			$item=new SelectItem();
			$item->setLabel($empresa->getnombre());
			$item->setValue($empresa->getId());
			$empresasList[]=$item;
		}

		return $empresasList;
	}


	public function gettipo_personasFKListSelectItem() 
	{
		$tipo_personasList=array();

		$item=null;

		foreach($this->tipo_personasFK as $tipo_persona)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_persona->getnombre());
			$item->setValue($tipo_persona->getId());
			$tipo_personasList[]=$item;
		}

		return $tipo_personasList;
	}


	public function getcategoria_proveedorsFKListSelectItem() 
	{
		$categoria_proveedorsList=array();

		$item=null;

		foreach($this->categoria_proveedorsFK as $categoria_proveedor)
		{
			$item=new SelectItem();
			$item->setLabel($categoria_proveedor->getnombre());
			$item->setValue($categoria_proveedor->getId());
			$categoria_proveedorsList[]=$item;
		}

		return $categoria_proveedorsList;
	}


	public function getgiro_negocio_proveedorsFKListSelectItem() 
	{
		$giro_negocio_proveedorsList=array();

		$item=null;

		foreach($this->giro_negocio_proveedorsFK as $giro_negocio_proveedor)
		{
			$item=new SelectItem();
			$item->setLabel($giro_negocio_proveedor->getnombre());
			$item->setValue($giro_negocio_proveedor->getId());
			$giro_negocio_proveedorsList[]=$item;
		}

		return $giro_negocio_proveedorsList;
	}


	public function getpaissFKListSelectItem() 
	{
		$paissList=array();

		$item=null;

		foreach($this->paissFK as $pais)
		{
			$item=new SelectItem();
			$item->setLabel($pais->getcodigo());
			$item->setValue($pais->getId());
			$paissList[]=$item;
		}

		return $paissList;
	}


	public function getprovinciasFKListSelectItem() 
	{
		$provinciasList=array();

		$item=null;

		foreach($this->provinciasFK as $provincia)
		{
			$item=new SelectItem();
			$item->setLabel($provincia->getcodigo());
			$item->setValue($provincia->getId());
			$provinciasList[]=$item;
		}

		return $provinciasList;
	}


	public function getciudadsFKListSelectItem() 
	{
		$ciudadsList=array();

		$item=null;

		foreach($this->ciudadsFK as $ciudad)
		{
			$item=new SelectItem();
			$item->setLabel($ciudad->getcodigo());
			$item->setValue($ciudad->getId());
			$ciudadsList[]=$item;
		}

		return $ciudadsList;
	}


	public function getvendedorsFKListSelectItem() 
	{
		$vendedorsList=array();

		$item=null;

		foreach($this->vendedorsFK as $vendedor)
		{
			$item=new SelectItem();
			$item->setLabel($vendedor->getnombre());
			$item->setValue($vendedor->getId());
			$vendedorsList[]=$item;
		}

		return $vendedorsList;
	}


	public function gettermino_pago_proveedorsFKListSelectItem() 
	{
		$termino_pago_proveedorsList=array();

		$item=null;

		foreach($this->termino_pago_proveedorsFK as $termino_pago_proveedor)
		{
			$item=new SelectItem();
			$item->setLabel($termino_pago_proveedor->getdescripcion());
			$item->setValue($termino_pago_proveedor->getId());
			$termino_pago_proveedorsList[]=$item;
		}

		return $termino_pago_proveedorsList;
	}


	public function getcuentasFKListSelectItem() 
	{
		$cuentasList=array();

		$item=null;

		foreach($this->cuentasFK as $cuenta)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta->getcodigo());
			$item->setValue($cuenta->getId());
			$cuentasList[]=$item;
		}

		return $cuentasList;
	}


	public function getimpuestosFKListSelectItem() 
	{
		$impuestosList=array();

		$item=null;

		foreach($this->impuestosFK as $impuesto)
		{
			$item=new SelectItem();
			$item->setLabel($impuesto->getdescripcion());
			$item->setValue($impuesto->getId());
			$impuestosList[]=$item;
		}

		return $impuestosList;
	}


	public function getretencionsFKListSelectItem() 
	{
		$retencionsList=array();

		$item=null;

		foreach($this->retencionsFK as $retencion)
		{
			$item=new SelectItem();
			$item->setLabel($retencion->getcodigo());
			$item->setValue($retencion->getId());
			$retencionsList[]=$item;
		}

		return $retencionsList;
	}


	public function getretencion_fuentesFKListSelectItem() 
	{
		$retencion_fuentesList=array();

		$item=null;

		foreach($this->retencion_fuentesFK as $retencion_fuente)
		{
			$item=new SelectItem();
			$item->setLabel($retencion_fuente->getcodigo());
			$item->setValue($retencion_fuente->getId());
			$retencion_fuentesList[]=$item;
		}

		return $retencion_fuentesList;
	}


	public function getretencion_icasFKListSelectItem() 
	{
		$retencion_icasList=array();

		$item=null;

		foreach($this->retencion_icasFK as $retencion_ica)
		{
			$item=new SelectItem();
			$item->setLabel($retencion_ica->getcodigo());
			$item->setValue($retencion_ica->getId());
			$retencion_icasList[]=$item;
		}

		return $retencion_icasList;
	}


	public function getotro_impuestosFKListSelectItem() 
	{
		$otro_impuestosList=array();

		$item=null;

		foreach($this->otro_impuestosFK as $otro_impuesto)
		{
			$item=new SelectItem();
			$item->setLabel($otro_impuesto->getcodigo());
			$item->setValue($otro_impuesto->getId());
			$otro_impuestosList[]=$item;
		}

		return $otro_impuestosList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			*/
			
			/*$this->strNombreCampoBusqueda*/
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				
			} else {
				
			}
			
			$IdsFksSeleccionados=$this->getIdsFksSeleccionados($maxima_fila);
			$strQueryIn='';
			$esPrimero=true;
			
			foreach($IdsFksSeleccionados as $idFkSeleccionado) {
				
				if(!$esPrimero) {
					$strQueryIn.=',';
				} else {
					$esPrimero=false;	
				}
				
				$strQueryIn.=$idFkSeleccionado;
			}
			
			$this->strFinalQuerySeleccionarLote=' and '.$this->strNombreCampoBusqueda.' in('.$strQueryIn.')';
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			$this->validarCargarSeleccionarLoteFk($IdsFksSeleccionados);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$proveedorsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->proveedors as $proveedorLocal) {
				if($proveedorLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->proveedor=new proveedor();
				
				$this->proveedor->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->proveedors[]=$this->proveedor;*/
				
				$proveedorsNuevos[]=$this->proveedor;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_persona');$classes[]=$class;
				$class=new Classe('categoria_proveedor');$classes[]=$class;
				$class=new Classe('giro_negocio_proveedor');$classes[]=$class;
				$class=new Classe('pais');$classes[]=$class;
				$class=new Classe('provincia');$classes[]=$class;
				$class=new Classe('ciudad');$classes[]=$class;
				$class=new Classe('vendedor');$classes[]=$class;
				$class=new Classe('termino_pago_proveedor');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				$class=new Classe('impuesto');$classes[]=$class;
				$class=new Classe('retencion');$classes[]=$class;
				$class=new Classe('retencion_fuente');$classes[]=$class;
				$class=new Classe('retencion_ica');$classes[]=$class;
				$class=new Classe('otro_impuesto');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->setproveedors($proveedorsNuevos);
					
				$this->proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($proveedorsNuevos as $proveedorNuevo) {
					$this->proveedors[]=$proveedorNuevo;
				}
				
				/*$this->proveedors[]=$proveedorsNuevos;*/
				
				$this->proveedorLogic->setproveedors($this->proveedors);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($proveedorsNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionempresa!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=empresa_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalempresa=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalempresa=Funciones::GetFinalQueryAppend($finalQueryGlobalempresa, '');
				$finalQueryGlobalempresa.=empresa_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalempresa.$strRecargarFkQuery;		

				$empresaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosempresasFK($empresaLogic->getempresas());

		} else {
			$this->setVisibleBusquedasParaempresa(true);


			if($proveedor_session->bigidempresaActual!=null && $proveedor_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($proveedor_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=proveedor_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_personasFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_personaLogic= new tipo_persona_logic();
		$pagination= new Pagination();
		$this->tipo_personasFK=array();

		$tipo_personaLogic->setConnexion($connexion);
		$tipo_personaLogic->gettipo_personaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesiontipo_persona!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_persona_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_persona=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_persona=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_persona, '');
				$finalQueryGlobaltipo_persona.=tipo_persona_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_persona.$strRecargarFkQuery;		

				$tipo_personaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_personasFK($tipo_personaLogic->gettipo_personas());

		} else {
			$this->setVisibleBusquedasParatipo_persona(true);


			if($proveedor_session->bigidtipo_personaActual!=null && $proveedor_session->bigidtipo_personaActual > 0) {
				$tipo_personaLogic->getEntity($proveedor_session->bigidtipo_personaActual);//WithConnection

				$this->tipo_personasFK[$tipo_personaLogic->gettipo_persona()->getId()]=proveedor_util::gettipo_personaDescripcion($tipo_personaLogic->gettipo_persona());
				$this->idtipo_personaDefaultFK=$tipo_personaLogic->gettipo_persona()->getId();
			}
		}
	}

	public function cargarComboscategoria_proveedorsFK($connexion=null,$strRecargarFkQuery=''){
		$categoria_proveedorLogic= new categoria_proveedor_logic();
		$pagination= new Pagination();
		$this->categoria_proveedorsFK=array();

		$categoria_proveedorLogic->setConnexion($connexion);
		$categoria_proveedorLogic->getcategoria_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesioncategoria_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=categoria_proveedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcategoria_proveedor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcategoria_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobalcategoria_proveedor, '');
				$finalQueryGlobalcategoria_proveedor.=categoria_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcategoria_proveedor.$strRecargarFkQuery;		

				$categoria_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscategoria_proveedorsFK($categoria_proveedorLogic->getcategoria_proveedors());

		} else {
			$this->setVisibleBusquedasParacategoria_proveedor(true);


			if($proveedor_session->bigidcategoria_proveedorActual!=null && $proveedor_session->bigidcategoria_proveedorActual > 0) {
				$categoria_proveedorLogic->getEntity($proveedor_session->bigidcategoria_proveedorActual);//WithConnection

				$this->categoria_proveedorsFK[$categoria_proveedorLogic->getcategoria_proveedor()->getId()]=proveedor_util::getcategoria_proveedorDescripcion($categoria_proveedorLogic->getcategoria_proveedor());
				$this->idcategoria_proveedorDefaultFK=$categoria_proveedorLogic->getcategoria_proveedor()->getId();
			}
		}
	}

	public function cargarCombosgiro_negocio_proveedorsFK($connexion=null,$strRecargarFkQuery=''){
		$giro_negocio_proveedorLogic= new giro_negocio_proveedor_logic();
		$pagination= new Pagination();
		$this->giro_negocio_proveedorsFK=array();

		$giro_negocio_proveedorLogic->setConnexion($connexion);
		$giro_negocio_proveedorLogic->getgiro_negocio_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesiongiro_negocio_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=giro_negocio_proveedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalgiro_negocio_proveedor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalgiro_negocio_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobalgiro_negocio_proveedor, '');
				$finalQueryGlobalgiro_negocio_proveedor.=giro_negocio_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalgiro_negocio_proveedor.$strRecargarFkQuery;		

				$giro_negocio_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosgiro_negocio_proveedorsFK($giro_negocio_proveedorLogic->getgiro_negocio_proveedors());

		} else {
			$this->setVisibleBusquedasParagiro_negocio_proveedor(true);


			if($proveedor_session->bigidgiro_negocio_proveedorActual!=null && $proveedor_session->bigidgiro_negocio_proveedorActual > 0) {
				$giro_negocio_proveedorLogic->getEntity($proveedor_session->bigidgiro_negocio_proveedorActual);//WithConnection

				$this->giro_negocio_proveedorsFK[$giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->getId()]=proveedor_util::getgiro_negocio_proveedorDescripcion($giro_negocio_proveedorLogic->getgiro_negocio_proveedor());
				$this->idgiro_negocio_proveedorDefaultFK=$giro_negocio_proveedorLogic->getgiro_negocio_proveedor()->getId();
			}
		}
	}

	public function cargarCombospaissFK($connexion=null,$strRecargarFkQuery=''){
		$paisLogic= new pais_logic();
		$pagination= new Pagination();
		$this->paissFK=array();

		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionpais!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=pais_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalpais=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalpais=Funciones::GetFinalQueryAppend($finalQueryGlobalpais, '');
				$finalQueryGlobalpais.=pais_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalpais.$strRecargarFkQuery;		

				$paisLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombospaissFK($paisLogic->getpaiss());

		} else {
			$this->setVisibleBusquedasParapais(true);


			if($proveedor_session->bigidpaisActual!=null && $proveedor_session->bigidpaisActual > 0) {
				$paisLogic->getEntity($proveedor_session->bigidpaisActual);//WithConnection

				$this->paissFK[$paisLogic->getpais()->getId()]=proveedor_util::getpaisDescripcion($paisLogic->getpais());
				$this->idpaisDefaultFK=$paisLogic->getpais()->getId();
			}
		}
	}

	public function cargarCombosprovinciasFK($connexion=null,$strRecargarFkQuery=''){
		$provinciaLogic= new provincia_logic();
		$pagination= new Pagination();
		$this->provinciasFK=array();

		$provinciaLogic->setConnexion($connexion);
		$provinciaLogic->getprovinciaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionprovincia!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=provincia_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalprovincia=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalprovincia=Funciones::GetFinalQueryAppend($finalQueryGlobalprovincia, '');
				$finalQueryGlobalprovincia.=provincia_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalprovincia.$strRecargarFkQuery;		

				$provinciaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosprovinciasFK($provinciaLogic->getprovincias());

		} else {
			$this->setVisibleBusquedasParaprovincia(true);


			if($proveedor_session->bigidprovinciaActual!=null && $proveedor_session->bigidprovinciaActual > 0) {
				$provinciaLogic->getEntity($proveedor_session->bigidprovinciaActual);//WithConnection

				$this->provinciasFK[$provinciaLogic->getprovincia()->getId()]=proveedor_util::getprovinciaDescripcion($provinciaLogic->getprovincia());
				$this->idprovinciaDefaultFK=$provinciaLogic->getprovincia()->getId();
			}
		}
	}

	public function cargarCombosciudadsFK($connexion=null,$strRecargarFkQuery=''){
		$ciudadLogic= new ciudad_logic();
		$pagination= new Pagination();
		$this->ciudadsFK=array();

		$ciudadLogic->setConnexion($connexion);
		$ciudadLogic->getciudadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionciudad!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=ciudad_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalciudad=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalciudad=Funciones::GetFinalQueryAppend($finalQueryGlobalciudad, '');
				$finalQueryGlobalciudad.=ciudad_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalciudad.$strRecargarFkQuery;		

				$ciudadLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosciudadsFK($ciudadLogic->getciudads());

		} else {
			$this->setVisibleBusquedasParaciudad(true);


			if($proveedor_session->bigidciudadActual!=null && $proveedor_session->bigidciudadActual > 0) {
				$ciudadLogic->getEntity($proveedor_session->bigidciudadActual);//WithConnection

				$this->ciudadsFK[$ciudadLogic->getciudad()->getId()]=proveedor_util::getciudadDescripcion($ciudadLogic->getciudad());
				$this->idciudadDefaultFK=$ciudadLogic->getciudad()->getId();
			}
		}
	}

	public function cargarCombosvendedorsFK($connexion=null,$strRecargarFkQuery=''){
		$vendedorLogic= new vendedor_logic();
		$pagination= new Pagination();
		$this->vendedorsFK=array();

		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionvendedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=vendedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalvendedor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalvendedor=Funciones::GetFinalQueryAppend($finalQueryGlobalvendedor, '');
				$finalQueryGlobalvendedor.=vendedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalvendedor.$strRecargarFkQuery;		

				$vendedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosvendedorsFK($vendedorLogic->getvendedors());

		} else {
			$this->setVisibleBusquedasParavendedor(true);


			if($proveedor_session->bigidvendedorActual!=null && $proveedor_session->bigidvendedorActual > 0) {
				$vendedorLogic->getEntity($proveedor_session->bigidvendedorActual);//WithConnection

				$this->vendedorsFK[$vendedorLogic->getvendedor()->getId()]=proveedor_util::getvendedorDescripcion($vendedorLogic->getvendedor());
				$this->idvendedorDefaultFK=$vendedorLogic->getvendedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_proveedorsFK($connexion=null,$strRecargarFkQuery=''){
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic();
		$pagination= new Pagination();
		$this->termino_pago_proveedorsFK=array();

		$termino_pago_proveedorLogic->setConnexion($connexion);
		$termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=termino_pago_proveedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltermino_pago_proveedor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltermino_pago_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobaltermino_pago_proveedor, '');
				$finalQueryGlobaltermino_pago_proveedor.=termino_pago_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltermino_pago_proveedor.$strRecargarFkQuery;		

				$termino_pago_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostermino_pago_proveedorsFK($termino_pago_proveedorLogic->gettermino_pago_proveedors());

		} else {
			$this->setVisibleBusquedasParatermino_pago_proveedor(true);


			if($proveedor_session->bigidtermino_pago_proveedorActual!=null && $proveedor_session->bigidtermino_pago_proveedorActual > 0) {
				$termino_pago_proveedorLogic->getEntity($proveedor_session->bigidtermino_pago_proveedorActual);//WithConnection

				$this->termino_pago_proveedorsFK[$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId()]=proveedor_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLogic->gettermino_pago_proveedor());
				$this->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery=''){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$this->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesioncuenta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuentasFK($cuentaLogic->getcuentas());

		} else {
			$this->setVisibleBusquedasParacuenta(true);


			if($proveedor_session->bigidcuentaActual!=null && $proveedor_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($proveedor_session->bigidcuentaActual);//WithConnection

				$this->cuentasFK[$cuentaLogic->getcuenta()->getId()]=proveedor_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$this->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarCombosimpuestosFK($connexion=null,$strRecargarFkQuery=''){
		$impuestoLogic= new impuesto_logic();
		$pagination= new Pagination();
		$this->impuestosFK=array();

		$impuestoLogic->setConnexion($connexion);
		$impuestoLogic->getimpuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionimpuesto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=impuesto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalimpuesto=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalimpuesto=Funciones::GetFinalQueryAppend($finalQueryGlobalimpuesto, '');
				$finalQueryGlobalimpuesto.=impuesto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalimpuesto.$strRecargarFkQuery;		

				$impuestoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosimpuestosFK($impuestoLogic->getimpuestos());

		} else {
			$this->setVisibleBusquedasParaimpuesto(true);


			if($proveedor_session->bigidimpuestoActual!=null && $proveedor_session->bigidimpuestoActual > 0) {
				$impuestoLogic->getEntity($proveedor_session->bigidimpuestoActual);//WithConnection

				$this->impuestosFK[$impuestoLogic->getimpuesto()->getId()]=proveedor_util::getimpuestoDescripcion($impuestoLogic->getimpuesto());
				$this->idimpuestoDefaultFK=$impuestoLogic->getimpuesto()->getId();
			}
		}
	}

	public function cargarCombosretencionsFK($connexion=null,$strRecargarFkQuery=''){
		$retencionLogic= new retencion_logic();
		$pagination= new Pagination();
		$this->retencionsFK=array();

		$retencionLogic->setConnexion($connexion);
		$retencionLogic->getretencionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionretencion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=retencion_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalretencion=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalretencion=Funciones::GetFinalQueryAppend($finalQueryGlobalretencion, '');
				$finalQueryGlobalretencion.=retencion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalretencion.$strRecargarFkQuery;		

				$retencionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosretencionsFK($retencionLogic->getretencions());

		} else {
			$this->setVisibleBusquedasPararetencion(true);


			if($proveedor_session->bigidretencionActual!=null && $proveedor_session->bigidretencionActual > 0) {
				$retencionLogic->getEntity($proveedor_session->bigidretencionActual);//WithConnection

				$this->retencionsFK[$retencionLogic->getretencion()->getId()]=proveedor_util::getretencionDescripcion($retencionLogic->getretencion());
				$this->idretencionDefaultFK=$retencionLogic->getretencion()->getId();
			}
		}
	}

	public function cargarCombosretencion_fuentesFK($connexion=null,$strRecargarFkQuery=''){
		$retencion_fuenteLogic= new retencion_fuente_logic();
		$pagination= new Pagination();
		$this->retencion_fuentesFK=array();

		$retencion_fuenteLogic->setConnexion($connexion);
		$retencion_fuenteLogic->getretencion_fuenteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionretencion_fuente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=retencion_fuente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalretencion_fuente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalretencion_fuente=Funciones::GetFinalQueryAppend($finalQueryGlobalretencion_fuente, '');
				$finalQueryGlobalretencion_fuente.=retencion_fuente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalretencion_fuente.$strRecargarFkQuery;		

				$retencion_fuenteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosretencion_fuentesFK($retencion_fuenteLogic->getretencion_fuentes());

		} else {
			$this->setVisibleBusquedasPararetencion_fuente(true);


			if($proveedor_session->bigidretencion_fuenteActual!=null && $proveedor_session->bigidretencion_fuenteActual > 0) {
				$retencion_fuenteLogic->getEntity($proveedor_session->bigidretencion_fuenteActual);//WithConnection

				$this->retencion_fuentesFK[$retencion_fuenteLogic->getretencion_fuente()->getId()]=proveedor_util::getretencion_fuenteDescripcion($retencion_fuenteLogic->getretencion_fuente());
				$this->idretencion_fuenteDefaultFK=$retencion_fuenteLogic->getretencion_fuente()->getId();
			}
		}
	}

	public function cargarCombosretencion_icasFK($connexion=null,$strRecargarFkQuery=''){
		$retencion_icaLogic= new retencion_ica_logic();
		$pagination= new Pagination();
		$this->retencion_icasFK=array();

		$retencion_icaLogic->setConnexion($connexion);
		$retencion_icaLogic->getretencion_icaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionretencion_ica!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=retencion_ica_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalretencion_ica=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalretencion_ica=Funciones::GetFinalQueryAppend($finalQueryGlobalretencion_ica, '');
				$finalQueryGlobalretencion_ica.=retencion_ica_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalretencion_ica.$strRecargarFkQuery;		

				$retencion_icaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosretencion_icasFK($retencion_icaLogic->getretencion_icas());

		} else {
			$this->setVisibleBusquedasPararetencion_ica(true);


			if($proveedor_session->bigidretencion_icaActual!=null && $proveedor_session->bigidretencion_icaActual > 0) {
				$retencion_icaLogic->getEntity($proveedor_session->bigidretencion_icaActual);//WithConnection

				$this->retencion_icasFK[$retencion_icaLogic->getretencion_ica()->getId()]=proveedor_util::getretencion_icaDescripcion($retencion_icaLogic->getretencion_ica());
				$this->idretencion_icaDefaultFK=$retencion_icaLogic->getretencion_ica()->getId();
			}
		}
	}

	public function cargarCombosotro_impuestosFK($connexion=null,$strRecargarFkQuery=''){
		$otro_impuestoLogic= new otro_impuesto_logic();
		$pagination= new Pagination();
		$this->otro_impuestosFK=array();

		$otro_impuestoLogic->setConnexion($connexion);
		$otro_impuestoLogic->getotro_impuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->bitBusquedaDesdeFKSesionotro_impuesto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=otro_impuesto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalotro_impuesto=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalotro_impuesto=Funciones::GetFinalQueryAppend($finalQueryGlobalotro_impuesto, '');
				$finalQueryGlobalotro_impuesto.=otro_impuesto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalotro_impuesto.$strRecargarFkQuery;		

				$otro_impuestoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosotro_impuestosFK($otro_impuestoLogic->getotro_impuestos());

		} else {
			$this->setVisibleBusquedasParaotro_impuesto(true);


			if($proveedor_session->bigidotro_impuestoActual!=null && $proveedor_session->bigidotro_impuestoActual > 0) {
				$otro_impuestoLogic->getEntity($proveedor_session->bigidotro_impuestoActual);//WithConnection

				$this->otro_impuestosFK[$otro_impuestoLogic->getotro_impuesto()->getId()]=proveedor_util::getotro_impuestoDescripcion($otro_impuestoLogic->getotro_impuesto());
				$this->idotro_impuestoDefaultFK=$otro_impuestoLogic->getotro_impuesto()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=proveedor_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombostipo_personasFK($tipo_personas){

		foreach ($tipo_personas as $tipo_personaLocal ) {
			if($this->idtipo_personaDefaultFK==0) {
				$this->idtipo_personaDefaultFK=$tipo_personaLocal->getId();
			}

			$this->tipo_personasFK[$tipo_personaLocal->getId()]=proveedor_util::gettipo_personaDescripcion($tipo_personaLocal);
		}
	}

	public function prepararComboscategoria_proveedorsFK($categoria_proveedors){

		foreach ($categoria_proveedors as $categoria_proveedorLocal ) {
			if($this->idcategoria_proveedorDefaultFK==0) {
				$this->idcategoria_proveedorDefaultFK=$categoria_proveedorLocal->getId();
			}

			$this->categoria_proveedorsFK[$categoria_proveedorLocal->getId()]=proveedor_util::getcategoria_proveedorDescripcion($categoria_proveedorLocal);
		}
	}

	public function prepararCombosgiro_negocio_proveedorsFK($giro_negocio_proveedors){

		foreach ($giro_negocio_proveedors as $giro_negocio_proveedorLocal ) {
			if($this->idgiro_negocio_proveedorDefaultFK==0) {
				$this->idgiro_negocio_proveedorDefaultFK=$giro_negocio_proveedorLocal->getId();
			}

			$this->giro_negocio_proveedorsFK[$giro_negocio_proveedorLocal->getId()]=proveedor_util::getgiro_negocio_proveedorDescripcion($giro_negocio_proveedorLocal);
		}
	}

	public function prepararCombospaissFK($paiss){

		foreach ($paiss as $paisLocal ) {
			if($this->idpaisDefaultFK==0) {
				$this->idpaisDefaultFK=$paisLocal->getId();
			}

			$this->paissFK[$paisLocal->getId()]=proveedor_util::getpaisDescripcion($paisLocal);
		}
	}

	public function prepararCombosprovinciasFK($provincias){

		foreach ($provincias as $provinciaLocal ) {
			if($this->idprovinciaDefaultFK==0) {
				$this->idprovinciaDefaultFK=$provinciaLocal->getId();
			}

			$this->provinciasFK[$provinciaLocal->getId()]=proveedor_util::getprovinciaDescripcion($provinciaLocal);
		}
	}

	public function prepararCombosciudadsFK($ciudads){

		foreach ($ciudads as $ciudadLocal ) {
			if($this->idciudadDefaultFK==0) {
				$this->idciudadDefaultFK=$ciudadLocal->getId();
			}

			$this->ciudadsFK[$ciudadLocal->getId()]=proveedor_util::getciudadDescripcion($ciudadLocal);
		}
	}

	public function prepararCombosvendedorsFK($vendedors){

		foreach ($vendedors as $vendedorLocal ) {
			if($this->idvendedorDefaultFK==0) {
				$this->idvendedorDefaultFK=$vendedorLocal->getId();
			}

			$this->vendedorsFK[$vendedorLocal->getId()]=proveedor_util::getvendedorDescripcion($vendedorLocal);
		}
	}

	public function prepararCombostermino_pago_proveedorsFK($termino_pago_proveedors){

		foreach ($termino_pago_proveedors as $termino_pago_proveedorLocal ) {
			if($this->idtermino_pago_proveedorDefaultFK==0) {
				$this->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLocal->getId();
			}

			$this->termino_pago_proveedorsFK[$termino_pago_proveedorLocal->getId()]=proveedor_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLocal);
		}
	}

	public function prepararComboscuentasFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuentaDefaultFK==0) {
				$this->idcuentaDefaultFK=$cuentaLocal->getId();
			}

			$this->cuentasFK[$cuentaLocal->getId()]=proveedor_util::getcuentaDescripcion($cuentaLocal);
		}
	}

	public function prepararCombosimpuestosFK($impuestos){

		foreach ($impuestos as $impuestoLocal ) {
			if($this->idimpuestoDefaultFK==0) {
				$this->idimpuestoDefaultFK=$impuestoLocal->getId();
			}

			$this->impuestosFK[$impuestoLocal->getId()]=proveedor_util::getimpuestoDescripcion($impuestoLocal);
		}
	}

	public function prepararCombosretencionsFK($retencions){

		foreach ($retencions as $retencionLocal ) {
			if($this->idretencionDefaultFK==0) {
				$this->idretencionDefaultFK=$retencionLocal->getId();
			}

			$this->retencionsFK[$retencionLocal->getId()]=proveedor_util::getretencionDescripcion($retencionLocal);
		}
	}

	public function prepararCombosretencion_fuentesFK($retencion_fuentes){

		foreach ($retencion_fuentes as $retencion_fuenteLocal ) {
			if($this->idretencion_fuenteDefaultFK==0) {
				$this->idretencion_fuenteDefaultFK=$retencion_fuenteLocal->getId();
			}

			$this->retencion_fuentesFK[$retencion_fuenteLocal->getId()]=proveedor_util::getretencion_fuenteDescripcion($retencion_fuenteLocal);
		}
	}

	public function prepararCombosretencion_icasFK($retencion_icas){

		foreach ($retencion_icas as $retencion_icaLocal ) {
			if($this->idretencion_icaDefaultFK==0) {
				$this->idretencion_icaDefaultFK=$retencion_icaLocal->getId();
			}

			$this->retencion_icasFK[$retencion_icaLocal->getId()]=proveedor_util::getretencion_icaDescripcion($retencion_icaLocal);
		}
	}

	public function prepararCombosotro_impuestosFK($otro_impuestos){

		foreach ($otro_impuestos as $otro_impuestoLocal ) {
			if($this->idotro_impuestoDefaultFK==0) {
				$this->idotro_impuestoDefaultFK=$otro_impuestoLocal->getId();
			}

			$this->otro_impuestosFK[$otro_impuestoLocal->getId()]=proveedor_util::getotro_impuestoDescripcion($otro_impuestoLocal);
		}
	}

	
	
	public function cargarDescripcionempresaFK($idempresa,$connexion=null){
		$empresaLogic= new empresa_logic();
		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$strDescripcionempresa='';

		if($idempresa!=null && $idempresa!='' && $idempresa!='null') {
			if($connexion!=null) {
				$empresaLogic->getEntity($idempresa);//WithConnection
			} else {
				$empresaLogic->getEntityWithConnection($idempresa);//
			}

			$strDescripcionempresa=proveedor_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripciontipo_personaFK($idtipo_persona,$connexion=null){
		$tipo_personaLogic= new tipo_persona_logic();
		$tipo_personaLogic->setConnexion($connexion);
		$tipo_personaLogic->gettipo_personaDataAccess()->isForFKData=true;
		$strDescripciontipo_persona='';

		if($idtipo_persona!=null && $idtipo_persona!='' && $idtipo_persona!='null') {
			if($connexion!=null) {
				$tipo_personaLogic->getEntity($idtipo_persona);//WithConnection
			} else {
				$tipo_personaLogic->getEntityWithConnection($idtipo_persona);//
			}

			$strDescripciontipo_persona=proveedor_util::gettipo_personaDescripcion($tipo_personaLogic->gettipo_persona());

		} else {
			$strDescripciontipo_persona='null';
		}

		return $strDescripciontipo_persona;
	}

	public function cargarDescripcioncategoria_proveedorFK($idcategoria_proveedor,$connexion=null){
		$categoria_proveedorLogic= new categoria_proveedor_logic();
		$categoria_proveedorLogic->setConnexion($connexion);
		$categoria_proveedorLogic->getcategoria_proveedorDataAccess()->isForFKData=true;
		$strDescripcioncategoria_proveedor='';

		if($idcategoria_proveedor!=null && $idcategoria_proveedor!='' && $idcategoria_proveedor!='null') {
			if($connexion!=null) {
				$categoria_proveedorLogic->getEntity($idcategoria_proveedor);//WithConnection
			} else {
				$categoria_proveedorLogic->getEntityWithConnection($idcategoria_proveedor);//
			}

			$strDescripcioncategoria_proveedor=proveedor_util::getcategoria_proveedorDescripcion($categoria_proveedorLogic->getcategoria_proveedor());

		} else {
			$strDescripcioncategoria_proveedor='null';
		}

		return $strDescripcioncategoria_proveedor;
	}

	public function cargarDescripciongiro_negocio_proveedorFK($idgiro_negocio_proveedor,$connexion=null){
		$giro_negocio_proveedorLogic= new giro_negocio_proveedor_logic();
		$giro_negocio_proveedorLogic->setConnexion($connexion);
		$giro_negocio_proveedorLogic->getgiro_negocio_proveedorDataAccess()->isForFKData=true;
		$strDescripciongiro_negocio_proveedor='';

		if($idgiro_negocio_proveedor!=null && $idgiro_negocio_proveedor!='' && $idgiro_negocio_proveedor!='null') {
			if($connexion!=null) {
				$giro_negocio_proveedorLogic->getEntity($idgiro_negocio_proveedor);//WithConnection
			} else {
				$giro_negocio_proveedorLogic->getEntityWithConnection($idgiro_negocio_proveedor);//
			}

			$strDescripciongiro_negocio_proveedor=proveedor_util::getgiro_negocio_proveedorDescripcion($giro_negocio_proveedorLogic->getgiro_negocio_proveedor());

		} else {
			$strDescripciongiro_negocio_proveedor='null';
		}

		return $strDescripciongiro_negocio_proveedor;
	}

	public function cargarDescripcionpaisFK($idpais,$connexion=null){
		$paisLogic= new pais_logic();
		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$strDescripcionpais='';

		if($idpais!=null && $idpais!='' && $idpais!='null') {
			if($connexion!=null) {
				$paisLogic->getEntity($idpais);//WithConnection
			} else {
				$paisLogic->getEntityWithConnection($idpais);//
			}

			$strDescripcionpais=proveedor_util::getpaisDescripcion($paisLogic->getpais());

		} else {
			$strDescripcionpais='null';
		}

		return $strDescripcionpais;
	}

	public function cargarDescripcionprovinciaFK($idprovincia,$connexion=null){
		$provinciaLogic= new provincia_logic();
		$provinciaLogic->setConnexion($connexion);
		$provinciaLogic->getprovinciaDataAccess()->isForFKData=true;
		$strDescripcionprovincia='';

		if($idprovincia!=null && $idprovincia!='' && $idprovincia!='null') {
			if($connexion!=null) {
				$provinciaLogic->getEntity($idprovincia);//WithConnection
			} else {
				$provinciaLogic->getEntityWithConnection($idprovincia);//
			}

			$strDescripcionprovincia=proveedor_util::getprovinciaDescripcion($provinciaLogic->getprovincia());

		} else {
			$strDescripcionprovincia='null';
		}

		return $strDescripcionprovincia;
	}

	public function cargarDescripcionciudadFK($idciudad,$connexion=null){
		$ciudadLogic= new ciudad_logic();
		$ciudadLogic->setConnexion($connexion);
		$ciudadLogic->getciudadDataAccess()->isForFKData=true;
		$strDescripcionciudad='';

		if($idciudad!=null && $idciudad!='' && $idciudad!='null') {
			if($connexion!=null) {
				$ciudadLogic->getEntity($idciudad);//WithConnection
			} else {
				$ciudadLogic->getEntityWithConnection($idciudad);//
			}

			$strDescripcionciudad=proveedor_util::getciudadDescripcion($ciudadLogic->getciudad());

		} else {
			$strDescripcionciudad='null';
		}

		return $strDescripcionciudad;
	}

	public function cargarDescripcionvendedorFK($idvendedor,$connexion=null){
		$vendedorLogic= new vendedor_logic();
		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$strDescripcionvendedor='';

		if($idvendedor!=null && $idvendedor!='' && $idvendedor!='null') {
			if($connexion!=null) {
				$vendedorLogic->getEntity($idvendedor);//WithConnection
			} else {
				$vendedorLogic->getEntityWithConnection($idvendedor);//
			}

			$strDescripcionvendedor=proveedor_util::getvendedorDescripcion($vendedorLogic->getvendedor());

		} else {
			$strDescripcionvendedor='null';
		}

		return $strDescripcionvendedor;
	}

	public function cargarDescripciontermino_pago_proveedorFK($idtermino_pago_proveedor,$connexion=null){
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic();
		$termino_pago_proveedorLogic->setConnexion($connexion);
		$termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKData=true;
		$strDescripciontermino_pago_proveedor='';

		if($idtermino_pago_proveedor!=null && $idtermino_pago_proveedor!='' && $idtermino_pago_proveedor!='null') {
			if($connexion!=null) {
				$termino_pago_proveedorLogic->getEntity($idtermino_pago_proveedor);//WithConnection
			} else {
				$termino_pago_proveedorLogic->getEntityWithConnection($idtermino_pago_proveedor);//
			}

			$strDescripciontermino_pago_proveedor=proveedor_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLogic->gettermino_pago_proveedor());

		} else {
			$strDescripciontermino_pago_proveedor='null';
		}

		return $strDescripciontermino_pago_proveedor;
	}

	public function cargarDescripcioncuentaFK($idcuenta,$connexion=null){
		$cuentaLogic= new cuenta_logic();
		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$strDescripcioncuenta='';

		if($idcuenta!=null && $idcuenta!='' && $idcuenta!='null') {
			if($connexion!=null) {
				$cuentaLogic->getEntity($idcuenta);//WithConnection
			} else {
				$cuentaLogic->getEntityWithConnection($idcuenta);//
			}

			$strDescripcioncuenta=proveedor_util::getcuentaDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	public function cargarDescripcionimpuestoFK($idimpuesto,$connexion=null){
		$impuestoLogic= new impuesto_logic();
		$impuestoLogic->setConnexion($connexion);
		$impuestoLogic->getimpuestoDataAccess()->isForFKData=true;
		$strDescripcionimpuesto='';

		if($idimpuesto!=null && $idimpuesto!='' && $idimpuesto!='null') {
			if($connexion!=null) {
				$impuestoLogic->getEntity($idimpuesto);//WithConnection
			} else {
				$impuestoLogic->getEntityWithConnection($idimpuesto);//
			}

			$strDescripcionimpuesto=proveedor_util::getimpuestoDescripcion($impuestoLogic->getimpuesto());

		} else {
			$strDescripcionimpuesto='null';
		}

		return $strDescripcionimpuesto;
	}

	public function cargarDescripcionretencionFK($idretencion,$connexion=null){
		$retencionLogic= new retencion_logic();
		$retencionLogic->setConnexion($connexion);
		$retencionLogic->getretencionDataAccess()->isForFKData=true;
		$strDescripcionretencion='';

		if($idretencion!=null && $idretencion!='' && $idretencion!='null') {
			if($connexion!=null) {
				$retencionLogic->getEntity($idretencion);//WithConnection
			} else {
				$retencionLogic->getEntityWithConnection($idretencion);//
			}

			$strDescripcionretencion=proveedor_util::getretencionDescripcion($retencionLogic->getretencion());

		} else {
			$strDescripcionretencion='null';
		}

		return $strDescripcionretencion;
	}

	public function cargarDescripcionretencion_fuenteFK($idretencion_fuente,$connexion=null){
		$retencion_fuenteLogic= new retencion_fuente_logic();
		$retencion_fuenteLogic->setConnexion($connexion);
		$retencion_fuenteLogic->getretencion_fuenteDataAccess()->isForFKData=true;
		$strDescripcionretencion_fuente='';

		if($idretencion_fuente!=null && $idretencion_fuente!='' && $idretencion_fuente!='null') {
			if($connexion!=null) {
				$retencion_fuenteLogic->getEntity($idretencion_fuente);//WithConnection
			} else {
				$retencion_fuenteLogic->getEntityWithConnection($idretencion_fuente);//
			}

			$strDescripcionretencion_fuente=proveedor_util::getretencion_fuenteDescripcion($retencion_fuenteLogic->getretencion_fuente());

		} else {
			$strDescripcionretencion_fuente='null';
		}

		return $strDescripcionretencion_fuente;
	}

	public function cargarDescripcionretencion_icaFK($idretencion_ica,$connexion=null){
		$retencion_icaLogic= new retencion_ica_logic();
		$retencion_icaLogic->setConnexion($connexion);
		$retencion_icaLogic->getretencion_icaDataAccess()->isForFKData=true;
		$strDescripcionretencion_ica='';

		if($idretencion_ica!=null && $idretencion_ica!='' && $idretencion_ica!='null') {
			if($connexion!=null) {
				$retencion_icaLogic->getEntity($idretencion_ica);//WithConnection
			} else {
				$retencion_icaLogic->getEntityWithConnection($idretencion_ica);//
			}

			$strDescripcionretencion_ica=proveedor_util::getretencion_icaDescripcion($retencion_icaLogic->getretencion_ica());

		} else {
			$strDescripcionretencion_ica='null';
		}

		return $strDescripcionretencion_ica;
	}

	public function cargarDescripcionotro_impuestoFK($idotro_impuesto,$connexion=null){
		$otro_impuestoLogic= new otro_impuesto_logic();
		$otro_impuestoLogic->setConnexion($connexion);
		$otro_impuestoLogic->getotro_impuestoDataAccess()->isForFKData=true;
		$strDescripcionotro_impuesto='';

		if($idotro_impuesto!=null && $idotro_impuesto!='' && $idotro_impuesto!='null') {
			if($connexion!=null) {
				$otro_impuestoLogic->getEntity($idotro_impuesto);//WithConnection
			} else {
				$otro_impuestoLogic->getEntityWithConnection($idotro_impuesto);//
			}

			$strDescripcionotro_impuesto=proveedor_util::getotro_impuestoDescripcion($otro_impuestoLogic->getotro_impuesto());

		} else {
			$strDescripcionotro_impuesto='null';
		}

		return $strDescripcionotro_impuesto;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(proveedor $proveedorClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$proveedorClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParaempresa($isParaempresa){
		$strParaVisibleempresa='display:table-row';
		$strParaVisibleNegacionempresa='display:none';

		if($isParaempresa) {
			$strParaVisibleempresa='display:table-row';
			$strParaVisibleNegacionempresa='display:none';
		} else {
			$strParaVisibleempresa='display:none';
			$strParaVisibleNegacionempresa='display:table-row';
		}


		$strParaVisibleNegacionempresa=trim($strParaVisibleNegacionempresa);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionempresa;
	}

	public function setVisibleBusquedasParatipo_persona($isParatipo_persona){
		$strParaVisibletipo_persona='display:table-row';
		$strParaVisibleNegaciontipo_persona='display:none';

		if($isParatipo_persona) {
			$strParaVisibletipo_persona='display:table-row';
			$strParaVisibleNegaciontipo_persona='display:none';
		} else {
			$strParaVisibletipo_persona='display:none';
			$strParaVisibleNegaciontipo_persona='display:table-row';
		}


		$strParaVisibleNegaciontipo_persona=trim($strParaVisibleNegaciontipo_persona);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idpais=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibletipo_persona;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegaciontipo_persona;
	}

	public function setVisibleBusquedasParacategoria_proveedor($isParacategoria_proveedor){
		$strParaVisiblecategoria_proveedor='display:table-row';
		$strParaVisibleNegacioncategoria_proveedor='display:none';

		if($isParacategoria_proveedor) {
			$strParaVisiblecategoria_proveedor='display:table-row';
			$strParaVisibleNegacioncategoria_proveedor='display:none';
		} else {
			$strParaVisiblecategoria_proveedor='display:none';
			$strParaVisibleNegacioncategoria_proveedor='display:table-row';
		}


		$strParaVisibleNegacioncategoria_proveedor=trim($strParaVisibleNegacioncategoria_proveedor);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisiblecategoria_proveedor;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacioncategoria_proveedor;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacioncategoria_proveedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncategoria_proveedor;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisibleNegacioncategoria_proveedor;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacioncategoria_proveedor;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacioncategoria_proveedor;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacioncategoria_proveedor;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacioncategoria_proveedor;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacioncategoria_proveedor;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacioncategoria_proveedor;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacioncategoria_proveedor;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacioncategoria_proveedor;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacioncategoria_proveedor;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacioncategoria_proveedor;
	}

	public function setVisibleBusquedasParagiro_negocio_proveedor($isParagiro_negocio_proveedor){
		$strParaVisiblegiro_negocio_proveedor='display:table-row';
		$strParaVisibleNegaciongiro_negocio_proveedor='display:none';

		if($isParagiro_negocio_proveedor) {
			$strParaVisiblegiro_negocio_proveedor='display:table-row';
			$strParaVisibleNegaciongiro_negocio_proveedor='display:none';
		} else {
			$strParaVisiblegiro_negocio_proveedor='display:none';
			$strParaVisibleNegaciongiro_negocio_proveedor='display:table-row';
		}


		$strParaVisibleNegaciongiro_negocio_proveedor=trim($strParaVisibleNegaciongiro_negocio_proveedor);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisibleNegaciongiro_negocio_proveedor;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegaciongiro_negocio_proveedor;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegaciongiro_negocio_proveedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciongiro_negocio_proveedor;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisiblegiro_negocio_proveedor;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegaciongiro_negocio_proveedor;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegaciongiro_negocio_proveedor;
		$this->strVisibleFK_Idpais=$strParaVisibleNegaciongiro_negocio_proveedor;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegaciongiro_negocio_proveedor;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegaciongiro_negocio_proveedor;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegaciongiro_negocio_proveedor;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegaciongiro_negocio_proveedor;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegaciongiro_negocio_proveedor;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegaciongiro_negocio_proveedor;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegaciongiro_negocio_proveedor;
	}

	public function setVisibleBusquedasParapais($isParapais){
		$strParaVisiblepais='display:table-row';
		$strParaVisibleNegacionpais='display:none';

		if($isParapais) {
			$strParaVisiblepais='display:table-row';
			$strParaVisibleNegacionpais='display:none';
		} else {
			$strParaVisiblepais='display:none';
			$strParaVisibleNegacionpais='display:table-row';
		}


		$strParaVisibleNegacionpais=trim($strParaVisibleNegacionpais);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idpais=$strParaVisiblepais;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionpais;
	}

	public function setVisibleBusquedasParaprovincia($isParaprovincia){
		$strParaVisibleprovincia='display:table-row';
		$strParaVisibleNegacionprovincia='display:none';

		if($isParaprovincia) {
			$strParaVisibleprovincia='display:table-row';
			$strParaVisibleNegacionprovincia='display:none';
		} else {
			$strParaVisibleprovincia='display:none';
			$strParaVisibleNegacionprovincia='display:table-row';
		}


		$strParaVisibleNegacionprovincia=trim($strParaVisibleNegacionprovincia);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idprovincia=$strParaVisibleprovincia;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionprovincia;
	}

	public function setVisibleBusquedasParaciudad($isParaciudad){
		$strParaVisibleciudad='display:table-row';
		$strParaVisibleNegacionciudad='display:none';

		if($isParaciudad) {
			$strParaVisibleciudad='display:table-row';
			$strParaVisibleNegacionciudad='display:none';
		} else {
			$strParaVisibleciudad='display:none';
			$strParaVisibleNegacionciudad='display:table-row';
		}


		$strParaVisibleNegacionciudad=trim($strParaVisibleNegacionciudad);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idciudad=$strParaVisibleciudad;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionciudad;
	}

	public function setVisibleBusquedasParavendedor($isParavendedor){
		$strParaVisiblevendedor='display:table-row';
		$strParaVisibleNegacionvendedor='display:none';

		if($isParavendedor) {
			$strParaVisiblevendedor='display:table-row';
			$strParaVisibleNegacionvendedor='display:none';
		} else {
			$strParaVisiblevendedor='display:none';
			$strParaVisibleNegacionvendedor='display:table-row';
		}


		$strParaVisibleNegacionvendedor=trim($strParaVisibleNegacionvendedor);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idvendedor=$strParaVisiblevendedor;
	}

	public function setVisibleBusquedasParatermino_pago_proveedor($isParatermino_pago_proveedor){
		$strParaVisibletermino_pago_proveedor='display:table-row';
		$strParaVisibleNegaciontermino_pago_proveedor='display:none';

		if($isParatermino_pago_proveedor) {
			$strParaVisibletermino_pago_proveedor='display:table-row';
			$strParaVisibleNegaciontermino_pago_proveedor='display:none';
		} else {
			$strParaVisibletermino_pago_proveedor='display:none';
			$strParaVisibleNegaciontermino_pago_proveedor='display:table-row';
		}


		$strParaVisibleNegaciontermino_pago_proveedor=trim($strParaVisibleNegaciontermino_pago_proveedor);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idpais=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibletermino_pago_proveedor;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegaciontermino_pago_proveedor;
	}

	public function setVisibleBusquedasParacuenta($isParacuenta){
		$strParaVisiblecuenta='display:table-row';
		$strParaVisibleNegacioncuenta='display:none';

		if($isParacuenta) {
			$strParaVisiblecuenta='display:table-row';
			$strParaVisibleNegacioncuenta='display:none';
		} else {
			$strParaVisiblecuenta='display:none';
			$strParaVisibleNegacioncuenta='display:table-row';
		}


		$strParaVisibleNegacioncuenta=trim($strParaVisibleNegacioncuenta);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idcuenta=$strParaVisiblecuenta;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacioncuenta;
	}

	public function setVisibleBusquedasParaimpuesto($isParaimpuesto){
		$strParaVisibleimpuesto='display:table-row';
		$strParaVisibleNegacionimpuesto='display:none';

		if($isParaimpuesto) {
			$strParaVisibleimpuesto='display:table-row';
			$strParaVisibleNegacionimpuesto='display:none';
		} else {
			$strParaVisibleimpuesto='display:none';
			$strParaVisibleNegacionimpuesto='display:table-row';
		}


		$strParaVisibleNegacionimpuesto=trim($strParaVisibleNegacionimpuesto);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleimpuesto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionimpuesto;
	}

	public function setVisibleBusquedasPararetencion($isPararetencion){
		$strParaVisibleretencion='display:table-row';
		$strParaVisibleNegacionretencion='display:none';

		if($isPararetencion) {
			$strParaVisibleretencion='display:table-row';
			$strParaVisibleNegacionretencion='display:none';
		} else {
			$strParaVisibleretencion='display:none';
			$strParaVisibleNegacionretencion='display:table-row';
		}


		$strParaVisibleNegacionretencion=trim($strParaVisibleNegacionretencion);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idretencion=$strParaVisibleretencion;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionretencion;
	}

	public function setVisibleBusquedasPararetencion_fuente($isPararetencion_fuente){
		$strParaVisibleretencion_fuente='display:table-row';
		$strParaVisibleNegacionretencion_fuente='display:none';

		if($isPararetencion_fuente) {
			$strParaVisibleretencion_fuente='display:table-row';
			$strParaVisibleNegacionretencion_fuente='display:none';
		} else {
			$strParaVisibleretencion_fuente='display:none';
			$strParaVisibleNegacionretencion_fuente='display:table-row';
		}


		$strParaVisibleNegacionretencion_fuente=trim($strParaVisibleNegacionretencion_fuente);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleretencion_fuente;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionretencion_fuente;
	}

	public function setVisibleBusquedasPararetencion_ica($isPararetencion_ica){
		$strParaVisibleretencion_ica='display:table-row';
		$strParaVisibleNegacionretencion_ica='display:none';

		if($isPararetencion_ica) {
			$strParaVisibleretencion_ica='display:table-row';
			$strParaVisibleNegacionretencion_ica='display:none';
		} else {
			$strParaVisibleretencion_ica='display:none';
			$strParaVisibleNegacionretencion_ica='display:table-row';
		}


		$strParaVisibleNegacionretencion_ica=trim($strParaVisibleNegacionretencion_ica);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleretencion_ica;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionretencion_ica;
	}

	public function setVisibleBusquedasParaotro_impuesto($isParaotro_impuesto){
		$strParaVisibleotro_impuesto='display:table-row';
		$strParaVisibleNegacionotro_impuesto='display:none';

		if($isParaotro_impuesto) {
			$strParaVisibleotro_impuesto='display:table-row';
			$strParaVisibleNegacionotro_impuesto='display:none';
		} else {
			$strParaVisibleotro_impuesto='display:none';
			$strParaVisibleNegacionotro_impuesto='display:table-row';
		}


		$strParaVisibleNegacionotro_impuesto=trim($strParaVisibleNegacionotro_impuesto);

		$this->strVisibleFK_Idcategoria_proveedor=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idgiro_negocio_proveedor=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleotro_impuesto;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionotro_impuesto;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_persona() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_persona_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_persona(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_persona_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_persona(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_persona_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacategoria_proveedor() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.categoria_proveedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_categoria_proveedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',categoria_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_categoria_proveedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(categoria_proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParagiro_negocio_proveedor() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.giro_negocio_proveedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_giro_negocio_proveedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',giro_negocio_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_giro_negocio_proveedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(giro_negocio_proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParapais() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.pais_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_pais(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',pais_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_pais(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(pais_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaprovincia() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.provincia_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_provincia(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',provincia_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_provincia(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(provincia_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaciudad() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ciudad_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ciudad(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ciudad_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ciudad(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ciudad_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParavendedor() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.vendedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_vendedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',vendedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_vendedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(vendedor_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatermino_pago_proveedor() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.termino_pago_proveedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_termino_pago_proveedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_termino_pago_proveedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaimpuesto() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.impuesto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_impuesto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_impuesto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(impuesto_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaPararetencion() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.retencion_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaPararetencion_fuente() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.retencion_fuente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion_fuente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_fuente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion_fuente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_fuente_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaPararetencion_ica() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.retencion_ica_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion_ica(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_ica_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion_ica(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_ica_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaotro_impuesto() {//$idproveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproveedorActual=$idproveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.otro_impuesto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_impuesto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',otro_impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_impuesto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(otro_impuesto_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParalista_precioes(int $idproveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idproveedorActual=$idproveedorActual;

		$bitPaginaPopuplista_precio=false;

		try {

			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}

			$lista_precio_session=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME));

			if($lista_precio_session==null) {
				$lista_precio_session=new lista_precio_session();
			}

			$lista_precio_session->strUltimaBusqueda='FK_Idproveedor';
			$lista_precio_session->strPathNavegacionActual=$proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.lista_precio_util::$STR_CLASS_WEB_TITULO;
			$lista_precio_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuplista_precio=$lista_precio_session->bitPaginaPopup;
			$lista_precio_session->setPaginaPopupVariables(true);
			$bitPaginaPopuplista_precio=$lista_precio_session->bitPaginaPopup;
			$lista_precio_session->bitPermiteNavegacionHaciaFKDesde=false;
			$lista_precio_session->strNombrePaginaNavegacionHaciaFKDesde=proveedor_util::$STR_NOMBRE_OPCION;
			$lista_precio_session->bitBusquedaDesdeFKSesionproveedor=true;
			$lista_precio_session->bigidproveedorActual=$this->idproveedorActual;

			$proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$proveedor_session->bigIdActualFK=$this->idproveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"lista_precio"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"lista_precio"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));
			$this->Session->write(lista_precio_util::$STR_SESSION_NAME,serialize($lista_precio_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuplista_precio!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',lista_precio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_precio_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarproveedor,$this->strTipoUsuarioAuxiliarproveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',lista_precio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_precio_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliarproveedor,$this->strTipoUsuarioAuxiliarproveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaorden_compras(int $idproveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idproveedorActual=$idproveedorActual;

		$bitPaginaPopuporden_compra=false;

		try {

			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}

			$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));

			if($orden_compra_session==null) {
				$orden_compra_session=new orden_compra_session();
			}

			$orden_compra_session->strUltimaBusqueda='FK_Idproveedor';
			$orden_compra_session->strPathNavegacionActual=$proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.orden_compra_util::$STR_CLASS_WEB_TITULO;
			$orden_compra_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuporden_compra=$orden_compra_session->bitPaginaPopup;
			$orden_compra_session->setPaginaPopupVariables(true);
			$bitPaginaPopuporden_compra=$orden_compra_session->bitPaginaPopup;
			$orden_compra_session->bitPermiteNavegacionHaciaFKDesde=false;
			$orden_compra_session->strNombrePaginaNavegacionHaciaFKDesde=proveedor_util::$STR_NOMBRE_OPCION;
			$orden_compra_session->bitBusquedaDesdeFKSesionproveedor=true;
			$orden_compra_session->bigidproveedorActual=$this->idproveedorActual;

			$proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$proveedor_session->bigIdActualFK=$this->idproveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"orden_compra"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"orden_compra"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));
			$this->Session->write(orden_compra_util::$STR_SESSION_NAME,serialize($orden_compra_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuporden_compra!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',orden_compra_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(orden_compra_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarproveedor,$this->strTipoUsuarioAuxiliarproveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',orden_compra_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(orden_compra_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliarproveedor,$this->strTipoUsuarioAuxiliarproveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParacuenta_pagars(int $idproveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idproveedorActual=$idproveedorActual;

		$bitPaginaPopupcuenta_pagar=false;

		try {

			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}

			$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

			if($cuenta_pagar_session==null) {
				$cuenta_pagar_session=new cuenta_pagar_session();
			}

			$cuenta_pagar_session->strUltimaBusqueda='FK_Idproveedor';
			$cuenta_pagar_session->strPathNavegacionActual=$proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
			$cuenta_pagar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcuenta_pagar=$cuenta_pagar_session->bitPaginaPopup;
			$cuenta_pagar_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcuenta_pagar=$cuenta_pagar_session->bitPaginaPopup;
			$cuenta_pagar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cuenta_pagar_session->strNombrePaginaNavegacionHaciaFKDesde=proveedor_util::$STR_NOMBRE_OPCION;
			$cuenta_pagar_session->bitBusquedaDesdeFKSesionproveedor=true;
			$cuenta_pagar_session->bigidproveedorActual=$this->idproveedorActual;

			$proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$proveedor_session->bigIdActualFK=$this->idproveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));
			$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME,serialize($cuenta_pagar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcuenta_pagar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarproveedor,$this->strTipoUsuarioAuxiliarproveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliarproveedor,$this->strTipoUsuarioAuxiliarproveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaimagen_proveedores(int $idproveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idproveedorActual=$idproveedorActual;

		$bitPaginaPopupimagen_proveedor=false;

		try {

			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}

			$imagen_proveedor_session=unserialize($this->Session->read(imagen_proveedor_util::$STR_SESSION_NAME));

			if($imagen_proveedor_session==null) {
				$imagen_proveedor_session=new imagen_proveedor_session();
			}

			$imagen_proveedor_session->strUltimaBusqueda='FK_Idproveedor';
			$imagen_proveedor_session->strPathNavegacionActual=$proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.imagen_proveedor_util::$STR_CLASS_WEB_TITULO;
			$imagen_proveedor_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupimagen_proveedor=$imagen_proveedor_session->bitPaginaPopup;
			$imagen_proveedor_session->setPaginaPopupVariables(true);
			$bitPaginaPopupimagen_proveedor=$imagen_proveedor_session->bitPaginaPopup;
			$imagen_proveedor_session->bitPermiteNavegacionHaciaFKDesde=false;
			$imagen_proveedor_session->strNombrePaginaNavegacionHaciaFKDesde=proveedor_util::$STR_NOMBRE_OPCION;
			$imagen_proveedor_session->bitBusquedaDesdeFKSesionproveedor=true;
			$imagen_proveedor_session->bigidproveedorActual=$this->idproveedorActual;

			$proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$proveedor_session->bigIdActualFK=$this->idproveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"imagen_proveedor"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"imagen_proveedor"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));
			$this->Session->write(imagen_proveedor_util::$STR_SESSION_NAME,serialize($imagen_proveedor_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupimagen_proveedor!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',imagen_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(imagen_proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarproveedor,$this->strTipoUsuarioAuxiliarproveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',imagen_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(imagen_proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliarproveedor,$this->strTipoUsuarioAuxiliarproveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParadocumento_proveedores(int $idproveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idproveedorActual=$idproveedorActual;

		$bitPaginaPopupdocumento_proveedor=false;

		try {

			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}

			$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));

			if($documento_proveedor_session==null) {
				$documento_proveedor_session=new documento_proveedor_session();
			}

			$documento_proveedor_session->strUltimaBusqueda='FK_Idproveedor';
			$documento_proveedor_session->strPathNavegacionActual=$proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.documento_proveedor_util::$STR_CLASS_WEB_TITULO;
			$documento_proveedor_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupdocumento_proveedor=$documento_proveedor_session->bitPaginaPopup;
			$documento_proveedor_session->setPaginaPopupVariables(true);
			$bitPaginaPopupdocumento_proveedor=$documento_proveedor_session->bitPaginaPopup;
			$documento_proveedor_session->bitPermiteNavegacionHaciaFKDesde=false;
			$documento_proveedor_session->strNombrePaginaNavegacionHaciaFKDesde=proveedor_util::$STR_NOMBRE_OPCION;
			$documento_proveedor_session->bitBusquedaDesdeFKSesionproveedor=true;
			$documento_proveedor_session->bigidproveedorActual=$this->idproveedorActual;

			$proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$proveedor_session->bigIdActualFK=$this->idproveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"documento_proveedor"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"documento_proveedor"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));
			$this->Session->write(documento_proveedor_util::$STR_SESSION_NAME,serialize($documento_proveedor_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupdocumento_proveedor!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',documento_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarproveedor,$this->strTipoUsuarioAuxiliarproveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',documento_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliarproveedor,$this->strTipoUsuarioAuxiliarproveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaotro_suplidores(int $idproveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idproveedorActual=$idproveedorActual;

		$bitPaginaPopupotro_suplidor=false;

		try {

			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}

			$otro_suplidor_session=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME));

			if($otro_suplidor_session==null) {
				$otro_suplidor_session=new otro_suplidor_session();
			}

			$otro_suplidor_session->strUltimaBusqueda='FK_Idproveedor';
			$otro_suplidor_session->strPathNavegacionActual=$proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.otro_suplidor_util::$STR_CLASS_WEB_TITULO;
			$otro_suplidor_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupotro_suplidor=$otro_suplidor_session->bitPaginaPopup;
			$otro_suplidor_session->setPaginaPopupVariables(true);
			$bitPaginaPopupotro_suplidor=$otro_suplidor_session->bitPaginaPopup;
			$otro_suplidor_session->bitPermiteNavegacionHaciaFKDesde=false;
			$otro_suplidor_session->strNombrePaginaNavegacionHaciaFKDesde=proveedor_util::$STR_NOMBRE_OPCION;
			$otro_suplidor_session->bitBusquedaDesdeFKSesionproveedor=true;
			$otro_suplidor_session->bigidproveedorActual=$this->idproveedorActual;

			$proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$proveedor_session->bigIdActualFK=$this->idproveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"otro_suplidor"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"otro_suplidor"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));
			$this->Session->write(otro_suplidor_util::$STR_SESSION_NAME,serialize($otro_suplidor_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupotro_suplidor!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',otro_suplidor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(otro_suplidor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarproveedor,$this->strTipoUsuarioAuxiliarproveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',otro_suplidor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(otro_suplidor_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliarproveedor,$this->strTipoUsuarioAuxiliarproveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(proveedor_util::$STR_SESSION_NAME,proveedor_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$proveedor_session=$this->Session->read(proveedor_util::$STR_SESSION_NAME);
				
		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();		
			//$this->Session->write('proveedor_session',$proveedor_session);							
		}
		*/
		
		$proveedor_session=new proveedor_session();
    	$proveedor_session->strPathNavegacionActual=proveedor_util::$STR_CLASS_WEB_TITULO;
    	$proveedor_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));		
	}	
	
	public function getSetBusquedasSesionConfig(proveedor_session $proveedor_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($proveedor_session->bitBusquedaDesdeFKSesionFK!=null && $proveedor_session->bitBusquedaDesdeFKSesionFK==true) {
			if($proveedor_session->bigIdActualFK!=null && $proveedor_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$proveedor_session->bigIdActualFKParaPosibleAtras=$proveedor_session->bigIdActualFK;*/
			}
				
			$proveedor_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$proveedor_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(proveedor_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($proveedor_session->bitBusquedaDesdeFKSesionempresa!=null && $proveedor_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($proveedor_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			else if($proveedor_session->bitBusquedaDesdeFKSesiontipo_persona!=null && $proveedor_session->bitBusquedaDesdeFKSesiontipo_persona==true)
			{
				if($proveedor_session->bigidtipo_personaActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_persona';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidtipo_personaActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidtipo_personaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidtipo_personaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesiontipo_persona=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			else if($proveedor_session->bitBusquedaDesdeFKSesioncategoria_proveedor!=null && $proveedor_session->bitBusquedaDesdeFKSesioncategoria_proveedor==true)
			{
				if($proveedor_session->bigidcategoria_proveedorActual!=0) {
					$this->strAccionBusqueda='FK_Idcategoria_proveedor';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidcategoria_proveedorActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidcategoria_proveedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidcategoria_proveedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesioncategoria_proveedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			else if($proveedor_session->bitBusquedaDesdeFKSesiongiro_negocio_proveedor!=null && $proveedor_session->bitBusquedaDesdeFKSesiongiro_negocio_proveedor==true)
			{
				if($proveedor_session->bigidgiro_negocio_proveedorActual!=0) {
					$this->strAccionBusqueda='FK_Idgiro_negocio_proveedor';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidgiro_negocio_proveedorActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidgiro_negocio_proveedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidgiro_negocio_proveedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesiongiro_negocio_proveedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			else if($proveedor_session->bitBusquedaDesdeFKSesionpais!=null && $proveedor_session->bitBusquedaDesdeFKSesionpais==true)
			{
				if($proveedor_session->bigidpaisActual!=0) {
					$this->strAccionBusqueda='FK_Idpais';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidpaisActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidpaisActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidpaisActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesionpais=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			else if($proveedor_session->bitBusquedaDesdeFKSesionprovincia!=null && $proveedor_session->bitBusquedaDesdeFKSesionprovincia==true)
			{
				if($proveedor_session->bigidprovinciaActual!=0) {
					$this->strAccionBusqueda='FK_Idprovincia';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidprovinciaActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidprovinciaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidprovinciaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesionprovincia=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			else if($proveedor_session->bitBusquedaDesdeFKSesionciudad!=null && $proveedor_session->bitBusquedaDesdeFKSesionciudad==true)
			{
				if($proveedor_session->bigidciudadActual!=0) {
					$this->strAccionBusqueda='FK_Idciudad';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidciudadActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidciudadActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidciudadActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesionciudad=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			else if($proveedor_session->bitBusquedaDesdeFKSesionvendedor!=null && $proveedor_session->bitBusquedaDesdeFKSesionvendedor==true)
			{
				if($proveedor_session->bigidvendedorActual!=0) {
					$this->strAccionBusqueda='FK_Idvendedor';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidvendedorActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidvendedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidvendedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesionvendedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			else if($proveedor_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor!=null && $proveedor_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor==true)
			{
				if($proveedor_session->bigidtermino_pago_proveedorActual!=0) {
					$this->strAccionBusqueda='FK_Idtermino_pago_proveedor';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidtermino_pago_proveedorActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidtermino_pago_proveedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidtermino_pago_proveedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			else if($proveedor_session->bitBusquedaDesdeFKSesioncuenta!=null && $proveedor_session->bitBusquedaDesdeFKSesioncuenta==true)
			{
				if($proveedor_session->bigidcuentaActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidcuentaActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidcuentaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidcuentaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesioncuenta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			else if($proveedor_session->bitBusquedaDesdeFKSesionimpuesto!=null && $proveedor_session->bitBusquedaDesdeFKSesionimpuesto==true)
			{
				if($proveedor_session->bigidimpuestoActual!=0) {
					$this->strAccionBusqueda='FK_Idimpuesto';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidimpuestoActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidimpuestoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidimpuestoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesionimpuesto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			else if($proveedor_session->bitBusquedaDesdeFKSesionretencion!=null && $proveedor_session->bitBusquedaDesdeFKSesionretencion==true)
			{
				if($proveedor_session->bigidretencionActual!=0) {
					$this->strAccionBusqueda='FK_Idretencion';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidretencionActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidretencionActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidretencionActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesionretencion=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			else if($proveedor_session->bitBusquedaDesdeFKSesionretencion_fuente!=null && $proveedor_session->bitBusquedaDesdeFKSesionretencion_fuente==true)
			{
				if($proveedor_session->bigidretencion_fuenteActual!=0) {
					$this->strAccionBusqueda='FK_Idretencion_fuente';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidretencion_fuenteActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidretencion_fuenteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidretencion_fuenteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesionretencion_fuente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			else if($proveedor_session->bitBusquedaDesdeFKSesionretencion_ica!=null && $proveedor_session->bitBusquedaDesdeFKSesionretencion_ica==true)
			{
				if($proveedor_session->bigidretencion_icaActual!=0) {
					$this->strAccionBusqueda='FK_Idretencion_ica';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidretencion_icaActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidretencion_icaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidretencion_icaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesionretencion_ica=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			else if($proveedor_session->bitBusquedaDesdeFKSesionotro_impuesto!=null && $proveedor_session->bitBusquedaDesdeFKSesionotro_impuesto==true)
			{
				if($proveedor_session->bigidotro_impuestoActual!=0) {
					$this->strAccionBusqueda='FK_Idotro_impuesto';

					$existe_history=HistoryWeb::ExisteElemento(proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($proveedor_session->bigidotro_impuestoActualDescripcion);
						$historyWeb->setIdActual($proveedor_session->bigidotro_impuestoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$proveedor_session->bigidotro_impuestoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$proveedor_session->bitBusquedaDesdeFKSesionotro_impuesto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;

				if($proveedor_session->intNumeroPaginacion==proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$proveedor_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));
		
		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		$proveedor_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$proveedor_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$proveedor_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcategoria_proveedor') {
			$proveedor_session->id_categoria_proveedor=$this->id_categoria_proveedorFK_Idcategoria_proveedor;	

		}
		else if($this->strAccionBusqueda=='FK_Idciudad') {
			$proveedor_session->id_ciudad=$this->id_ciudadFK_Idciudad;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta') {
			$proveedor_session->id_cuenta=$this->id_cuentaFK_Idcuenta;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$proveedor_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idgiro_negocio_proveedor') {
			$proveedor_session->id_giro_negocio_proveedor=$this->id_giro_negocio_proveedorFK_Idgiro_negocio_proveedor;	

		}
		else if($this->strAccionBusqueda=='FK_Idimpuesto') {
			$proveedor_session->id_impuesto=$this->id_impuestoFK_Idimpuesto;	

		}
		else if($this->strAccionBusqueda=='FK_Idotro_impuesto') {
			$proveedor_session->id_otro_impuesto=$this->id_otro_impuestoFK_Idotro_impuesto;	

		}
		else if($this->strAccionBusqueda=='FK_Idpais') {
			$proveedor_session->id_pais=$this->id_paisFK_Idpais;	

		}
		else if($this->strAccionBusqueda=='FK_Idprovincia') {
			$proveedor_session->id_provincia=$this->id_provinciaFK_Idprovincia;	

		}
		else if($this->strAccionBusqueda=='FK_Idretencion') {
			$proveedor_session->id_retencion=$this->id_retencionFK_Idretencion;	

		}
		else if($this->strAccionBusqueda=='FK_Idretencion_fuente') {
			$proveedor_session->id_retencion_fuente=$this->id_retencion_fuenteFK_Idretencion_fuente;	

		}
		else if($this->strAccionBusqueda=='FK_Idretencion_ica') {
			$proveedor_session->id_retencion_ica=$this->id_retencion_icaFK_Idretencion_ica;	

		}
		else if($this->strAccionBusqueda=='FK_Idtermino_pago_proveedor') {
			$proveedor_session->id_termino_pago_proveedor=$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_persona') {
			$proveedor_session->id_tipo_persona=$this->id_tipo_personaFK_Idtipo_persona;	

		}
		else if($this->strAccionBusqueda=='FK_Idvendedor') {
			$proveedor_session->id_vendedor=$this->id_vendedorFK_Idvendedor;	

		}
		
		$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(proveedor_session $proveedor_session) {
		
		if($proveedor_session==null) {
			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));
		}
		
		if($proveedor_session==null) {
		   $proveedor_session=new proveedor_session();
		}
		
		if($proveedor_session->strUltimaBusqueda!=null && $proveedor_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$proveedor_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$proveedor_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$proveedor_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcategoria_proveedor') {
				$this->id_categoria_proveedorFK_Idcategoria_proveedor=$proveedor_session->id_categoria_proveedor;
				$proveedor_session->id_categoria_proveedor=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idciudad') {
				$this->id_ciudadFK_Idciudad=$proveedor_session->id_ciudad;
				$proveedor_session->id_ciudad=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta') {
				$this->id_cuentaFK_Idcuenta=$proveedor_session->id_cuenta;
				$proveedor_session->id_cuenta=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$proveedor_session->id_empresa;
				$proveedor_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idgiro_negocio_proveedor') {
				$this->id_giro_negocio_proveedorFK_Idgiro_negocio_proveedor=$proveedor_session->id_giro_negocio_proveedor;
				$proveedor_session->id_giro_negocio_proveedor=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idimpuesto') {
				$this->id_impuestoFK_Idimpuesto=$proveedor_session->id_impuesto;
				$proveedor_session->id_impuesto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idotro_impuesto') {
				$this->id_otro_impuestoFK_Idotro_impuesto=$proveedor_session->id_otro_impuesto;
				$proveedor_session->id_otro_impuesto=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idpais') {
				$this->id_paisFK_Idpais=$proveedor_session->id_pais;
				$proveedor_session->id_pais=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idprovincia') {
				$this->id_provinciaFK_Idprovincia=$proveedor_session->id_provincia;
				$proveedor_session->id_provincia=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idretencion') {
				$this->id_retencionFK_Idretencion=$proveedor_session->id_retencion;
				$proveedor_session->id_retencion=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idretencion_fuente') {
				$this->id_retencion_fuenteFK_Idretencion_fuente=$proveedor_session->id_retencion_fuente;
				$proveedor_session->id_retencion_fuente=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idretencion_ica') {
				$this->id_retencion_icaFK_Idretencion_ica=$proveedor_session->id_retencion_ica;
				$proveedor_session->id_retencion_ica=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idtermino_pago_proveedor') {
				$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=$proveedor_session->id_termino_pago_proveedor;
				$proveedor_session->id_termino_pago_proveedor=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_persona') {
				$this->id_tipo_personaFK_Idtipo_persona=$proveedor_session->id_tipo_persona;
				$proveedor_session->id_tipo_persona=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idvendedor') {
				$this->id_vendedorFK_Idvendedor=$proveedor_session->id_vendedor;
				$proveedor_session->id_vendedor=-1;

			}
		}
		
		$proveedor_session->strUltimaBusqueda='';
		//$proveedor_session->intNumeroPaginacion=10;
		$proveedor_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));		
	}
	
	public function proveedorsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idtipo_personaDefaultFK = 0;
		$this->idcategoria_proveedorDefaultFK = 0;
		$this->idgiro_negocio_proveedorDefaultFK = 0;
		$this->idpaisDefaultFK = 0;
		$this->idprovinciaDefaultFK = 0;
		$this->idciudadDefaultFK = 0;
		$this->idvendedorDefaultFK = 0;
		$this->idtermino_pago_proveedorDefaultFK = 0;
		$this->idcuentaDefaultFK = 0;
		$this->idimpuestoDefaultFK = 0;
		$this->idretencionDefaultFK = 0;
		$this->idretencion_fuenteDefaultFK = 0;
		$this->idretencion_icaDefaultFK = 0;
		$this->idotro_impuestoDefaultFK = 0;
	}
	
	public function setproveedorFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_persona',$this->idtipo_personaDefaultFK);
		$this->setExistDataCampoForm('form','id_categoria_proveedor',$this->idcategoria_proveedorDefaultFK);
		$this->setExistDataCampoForm('form','id_giro_negocio_proveedor',$this->idgiro_negocio_proveedorDefaultFK);
		$this->setExistDataCampoForm('form','id_pais',$this->idpaisDefaultFK);
		$this->setExistDataCampoForm('form','id_provincia',$this->idprovinciaDefaultFK);
		$this->setExistDataCampoForm('form','id_ciudad',$this->idciudadDefaultFK);
		$this->setExistDataCampoForm('form','id_vendedor',$this->idvendedorDefaultFK);
		$this->setExistDataCampoForm('form','id_termino_pago_proveedor',$this->idtermino_pago_proveedorDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta',$this->idcuentaDefaultFK);
		$this->setExistDataCampoForm('form','id_impuesto',$this->idimpuestoDefaultFK);
		$this->setExistDataCampoForm('form','id_retencion',$this->idretencionDefaultFK);
		$this->setExistDataCampoForm('form','id_retencion_fuente',$this->idretencion_fuenteDefaultFK);
		$this->setExistDataCampoForm('form','id_retencion_ica',$this->idretencion_icaDefaultFK);
		$this->setExistDataCampoForm('form','id_otro_impuesto',$this->idotro_impuestoDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		empresa::$class;
		empresa_carga::$CONTROLLER;

		tipo_persona::$class;
		tipo_persona_carga::$CONTROLLER;

		categoria_proveedor::$class;
		categoria_proveedor_carga::$CONTROLLER;

		giro_negocio_proveedor::$class;
		giro_negocio_proveedor_carga::$CONTROLLER;

		pais::$class;
		pais_carga::$CONTROLLER;

		provincia::$class;
		provincia_carga::$CONTROLLER;

		ciudad::$class;
		ciudad_carga::$CONTROLLER;

		vendedor::$class;
		vendedor_carga::$CONTROLLER;

		termino_pago_proveedor::$class;
		termino_pago_proveedor_carga::$CONTROLLER;

		cuenta::$class;
		cuenta_carga::$CONTROLLER;

		impuesto::$class;
		impuesto_carga::$CONTROLLER;

		retencion::$class;
		retencion_carga::$CONTROLLER;

		retencion_fuente::$class;
		retencion_fuente_carga::$CONTROLLER;

		retencion_ica::$class;
		retencion_ica_carga::$CONTROLLER;

		otro_impuesto::$class;
		otro_impuesto_carga::$CONTROLLER;
		
		//REL
		

		lista_precio_carga::$CONTROLLER;
		lista_precio_util::$STR_SCHEMA;
		lista_precio_session::class;

		orden_compra_carga::$CONTROLLER;
		orden_compra_util::$STR_SCHEMA;
		orden_compra_session::class;

		cuenta_pagar_carga::$CONTROLLER;
		cuenta_pagar_util::$STR_SCHEMA;
		cuenta_pagar_session::class;

		imagen_proveedor_carga::$CONTROLLER;
		imagen_proveedor_util::$STR_SCHEMA;
		imagen_proveedor_session::class;

		documento_proveedor_carga::$CONTROLLER;
		documento_proveedor_util::$STR_SCHEMA;
		documento_proveedor_session::class;

		otro_suplidor_carga::$CONTROLLER;
		otro_suplidor_util::$STR_SCHEMA;
		otro_suplidor_session::class;
    }
		
	public function irPagina(int $paginacion_pagina=0){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			$this->intNumeroPaginacionPagina=$paginacion_pagina;
						
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	/*
		interface proveedor_controlI {	
		
		public function inicializarParametrosQueryString(mixed $post1=null);
		public function ejecutarParametrosQueryString();	
		public function getBuildControllerResponse();
		
		public function loadIndex();	
		public function indexRecargarRelacionado();	
		public function recargarInformacionAction();
		
		public function buscarPorIdGeneralAction();	
		public function anterioresAction();		
		public function siguientesAction();	
		public function recargarUltimaInformacionAction();	
		public function seleccionarLoteFkAction();
		
		public function nuevoAction();	
		public function actualizarAction();	
		public function eliminarAction();	
		public function cancelarAction();	
		public function guardarCambiosAction();
		
		public function duplicarAction();	
		public function copiarAction();	
		public function nuevoPrepararAction();	
		public function nuevoPrepararPaginaFormAction();	
		public function nuevoPrepararAbrirPaginaFormAction();	
		public function nuevoTablaPrepararAction();
		
		public function seleccionarActualAction();	
		public function seleccionarActualPaginaFormAction();	
		public function seleccionarActualAbrirPaginaFormAction();
		
		public function editarTablaDatosAction();	
		public function eliminarTablaAction();	
		public function quitarElementosTablaAction();
		
		public function generarFpdfAction();	
		public function generarHtmlReporteAction();	
		public function generarHtmlFormReporteAction();	
		public function generarHtmlRelacionesReporteAction();
		
		public function eliminarCascadaAction();
		
		public function recargarReferenciasAction();
		
		
		public function manejarEventosAction();
		public function recargarFormularioGeneralAction();
		
		
		public function mostrarEjecutarAccionesRelacionesAction();
		
		public function generarReporteConPhpExcelAction();	
		public function generarReporteConPhpExcelVerticalAction();	
		public function generarReporteConPhpExcelRelacionesAction();
		
		public function onLoad(proveedor_session $proveedor_session=null);	
		function index(?string $strTypeOnLoadproveedor='',?string $strTipoPaginaAuxiliarproveedor='',?string $strTipoUsuarioAuxiliarproveedor='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
		public function seleccionar();	
		public function seleccionarActual(int $id = null);
		
		
		public function nuevoPreparar();	
		public function copiar();	
		public function duplicar();	
		public function guardarCambios();	
		public function nuevoTablaPreparar();	
		public function editarTablaDatos();	
		function guardarCambiosTablas();
		
		function eliminarCascadas();
			
		public function eliminarCascada();
		
		public function cancelarAccionesRelaciones();	
		public function recargarInformacion();	
		public function search(string $strTypeOnLoadproveedor='',string $strTipoPaginaAuxiliarproveedor='',string $strTipoUsuarioAuxiliarproveedor='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($proveedorReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(proveedor $proveedorClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(proveedor_session $proveedor_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(proveedor_session $proveedor_session);	
		public function proveedorsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setproveedorFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
