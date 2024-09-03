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

namespace com\bydan\contabilidad\contabilidad\cambio_dolar\presentation\view;

include_once('com/bydan/framework/contabilidad/util/Constantes.php');
use com\bydan\framework\contabilidad\util\Constantes;
	
include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/Funciones.php');
use com\bydan\framework\contabilidad\util\Funciones;

use com\bydan\framework\contabilidad\presentation\web\SessionBase;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
class cambio_dolar_web {
	
	public static $GET_POST = null;
	public static string $VIEW = '';
	public static string $STR_NOMBRE_PAGINA = 'cambio_dolar_view.php';
	public static string $STR_TYPE_ONLOAD = 'onload';
	public static string $STR_TIPO_PAGINA_AUXILIAR = 'none';
	public static string $STR_TIPO_USUARIO_AUXILIAR = 'none';
	public static string $STR_ACTION = '';
	public static string $STR_ES_POPUP = 'false';
	public static string $STR_ES_BUSQUEDA = 'false';
	public static string $STR_ES_RELACIONES = 'false';
	public static string $STR_ES_RELACIONADO = 'false';
	public static string $STR_ES_RELACIONADO_sufijo = '';
	public static string $STR_ES_SUB_PAGINA = 'false';
	public static string $BIT_ES_PAGINA_PRINCIPAL = 'true';
	public static string $BIT_ES_PAGINA_FORM = 'false';
	public static string $STR_FUNCION_JS = '';
	public static string $BIG_ID_ACTUAL = "0";
	public static string $BIG_ID_OPCION = "0";
	public static string $STR_OBJETO_JS = '';
	public static string $STR_SUF = '';
	//public static string $STR_STYLE_BUSQUEDA = 'display:table-row';
	public static string $STR_STYLE_DISPLAY_CAMPOS_OCULTOS = '';	
	
	public static string $STR_DESCRIPCION_USUARIO_SISTEMA='';
	public static string $STR_DESCRIPCION_PERIODO_SISTEMA='';
	public static string $STR_SUFIJO_ESTILO_USUARIO='';
	
	public ?SessionBase $sessionBase = null;	
	public ?parametro_general_usuario $parametroGeneralUsuarioActual = null;
	public ?modulo $moduloActual = null;
	public ?usuario $usuarioActual = null;
	
	function __construct () {
		//parent::__construct();
		
		$this->sessionBase=new SessionBase();	
		$this->parametroGeneralUsuarioActual=new parametro_general_usuario();
		$this->moduloActual=new modulo();
		$this->usuarioActual=new usuario();
	}
	
	public function cargarDatosGenerales() {
		if($this->sessionBase->read('usuarioActualDescripcion')!=null) {
			cambio_dolar_web::$STR_DESCRIPCION_USUARIO_SISTEMA=$this->sessionBase->read('usuarioActualDescripcion');
		}
		
		if($this->sessionBase->read('periodoActualDescripcion')!=null) {
			cambio_dolar_web::$STR_DESCRIPCION_PERIODO_SISTEMA=$this->sessionBase->read('periodoActualDescripcion');
		}		
	
		if($this->sessionBase->read('parametroGeneralUsuarioActual')!=null) {
			$this->parametroGeneralUsuarioActual=$this->sessionBase->unserialize('parametroGeneralUsuarioActual');
		}
		
		if($this->sessionBase->read('moduloActual')!=null) {
			$this->moduloActual=$this->sessionBase->unserialize('moduloActual');
		}
		
		if($this->sessionBase->read('usuarioActual')!=null) {
			$this->usuarioActual=$this->sessionBase->unserialize('usuarioActual');
		}
		
		cambio_dolar_web::$STR_SUFIJO_ESTILO_USUARIO=Funciones::getSufijoEstiloUsuario($this->parametroGeneralUsuarioActual);	
	}
	
	public static function InicializarParametrosPagina() {
					
			if (isset(cambio_dolar_web::$GET_POST['STR_TYPE_ONLOAD'])){
				cambio_dolar_web::$STR_TYPE_ONLOAD=cambio_dolar_web::$GET_POST['STR_TYPE_ONLOAD'];
				
				/*Donce onload_aux=onload, clave 'onload' que dio problema en hosting(mod_security)*/
				if(cambio_dolar_web::$STR_TYPE_ONLOAD=='onload_aux') {
					cambio_dolar_web::$STR_TYPE_ONLOAD='onload';
				}
			}
			
			if (isset(cambio_dolar_web::$GET_POST['STR_TIPO_PAGINA_AUXILIAR'])){
				cambio_dolar_web::$STR_TIPO_PAGINA_AUXILIAR=cambio_dolar_web::$GET_POST['STR_TIPO_PAGINA_AUXILIAR'];				
			}
			
			if (isset(cambio_dolar_web::$GET_POST['STR_TIPO_USUARIO_AUXILIAR'])){
				cambio_dolar_web::$STR_TIPO_USUARIO_AUXILIAR=cambio_dolar_web::$GET_POST['STR_TIPO_USUARIO_AUXILIAR'];			
			}
			
			if (isset(cambio_dolar_web::$GET_POST['action'])){
				cambio_dolar_web::$STR_ACTION=cambio_dolar_web::$GET_POST['action'];				
			}
			
			if (isset(cambio_dolar_web::$GET_POST['ES_POPUP'])){
				cambio_dolar_web::$STR_ES_POPUP=cambio_dolar_web::$GET_POST['ES_POPUP'];				
			}
			
			if (isset(cambio_dolar_web::$GET_POST['ES_BUSQUEDA'])){
				cambio_dolar_web::$STR_ES_BUSQUEDA=cambio_dolar_web::$GET_POST['ES_BUSQUEDA'];				
			}
			
			if (isset(cambio_dolar_web::$GET_POST['FUNCION_JS'])){
				cambio_dolar_web::$STR_FUNCION_JS=cambio_dolar_web::$GET_POST['FUNCION_JS'];				
			}
			
			if (isset(cambio_dolar_web::$GET_POST['id'])){
				cambio_dolar_web::$BIG_ID_ACTUAL=cambio_dolar_web::$GET_POST['id'];				
			}
			
			if (isset(cambio_dolar_web::$GET_POST['id_opcion'])){
				cambio_dolar_web::$BIG_ID_OPCION=cambio_dolar_web::$GET_POST['id_opcion'];				
			}
						
			if (isset(cambio_dolar_web::$GET_POST['OBJETO_JS'])){
				cambio_dolar_web::$STR_OBJETO_JS=cambio_dolar_web::$GET_POST['OBJETO_JS'];				
			}
			
			if (isset(cambio_dolar_web::$GET_POST['view'])){
				cambio_dolar_web::$VIEW=cambio_dolar_web::$GET_POST['view'];				
			}
			
			if (isset(cambio_dolar_web::$GET_POST['ES_RELACIONES'])){
				if(cambio_dolar_web::$VIEW=="cambio_dolar" || cambio_dolar_web::$VIEW=="cambio_dolar_form") {
					cambio_dolar_web::$STR_ES_RELACIONES=cambio_dolar_web::$GET_POST['ES_RELACIONES'];
					
					//cambio_dolar_web::$STR_ES_RELACIONES=cambio_dolar_web::$STR_ES_RELACIONES;
				} else {
					cambio_dolar_web::$STR_ES_RELACIONES='false';
				}
			}
			
			if (isset(cambio_dolar_web::$GET_POST['ES_RELACIONADO'])){
				if(cambio_dolar_web::$VIEW=="cambio_dolar" || cambio_dolar_web::$VIEW=="cambio_dolar_form") {
					cambio_dolar_web::$STR_ES_RELACIONADO=cambio_dolar_web::$GET_POST['ES_RELACIONADO'];
				} else {
					//SE DETERMINA QUE ES HIJO RELACIONADO
					cambio_dolar_web::$STR_ES_RELACIONADO='true';
					cambio_dolar_web::$STR_ES_RELACIONES='false';
				}
			}
			
			if(cambio_dolar_web::$VIEW!="cambio_dolar" && cambio_dolar_web::$VIEW!="cambio_dolar_form") {
				cambio_dolar_web::$STR_SUF='_cambio_dolar';
				//$STR_SUFcambio_dolar=$STR_SUF;
			}
			
			/*
			if($STR_ES_RELACIONES=='true') {
				if($VIEW!='cambio_dolar') {
					$STR_ES_RELACIONES='false';
					$STR_ES_RELACIONES=$STR_ES_RELACIONES;
					
				} else {				
					if($STR_ES_RELACIONADO=='true') {
						$STR_ES_RELACIONADO='false';
					}
				}
			}
			
			if($STR_ES_RELACIONADO=='true') {
				if($VIEW!='cambio_dolar') {
					$STR_ES_RELACIONES='false';
					$STR_ES_RELACIONES=$STR_ES_RELACIONES;
				}
				
				$STR_SUF='_cambio_dolar';
				$STR_SUFcambio_dolar=$STR_SUF;
			}					
			*/
			
			/*CUANDO SE ABRE DE UNA PAGINA PRINCIPAL(CON MENU)*/
			if (isset(cambio_dolar_web::$GET_POST['ES_SUB_PAGINA'])){
				cambio_dolar_web::$STR_ES_SUB_PAGINA=cambio_dolar_web::$GET_POST['ES_SUB_PAGINA'];				
			}

			/*CAMPOS OCULTOS STYLE*/
			cambio_dolar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='none';//display:
			
			if(Constantes::$IS_DEVELOPING) {
				cambio_dolar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='table-row';//display:
			}
			
			/*NO TIENE CAMPOS OCULTOS*/
			cambio_dolar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='none';//display:
			
			/*BUSQUEDAS STYLE*/
			/*En Controller existe strPermisoBusqueda*/
			//cambio_dolar_web::$STR_STYLE_BUSQUEDA='display:table-row';
			
			if(cambio_dolar_web::$STR_ES_RELACIONADO=='true') {
				//cambio_dolar_web::$STR_STYLE_BUSQUEDA='display:none';
				cambio_dolar_web::$STR_ES_RELACIONADO_sufijo='_relacionado';
			}
	}
	
	/*
	interface cambio_dolar_webI {
		public function cargarDatosGenerales();
		public static function InicializarParametrosPagina();
	}
	*/
}
?>
