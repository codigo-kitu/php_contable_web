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

namespace com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\presentation\view;

include_once('com/bydan/framework/contabilidad/util/Constantes.php');
use com\bydan\framework\contabilidad\util\Constantes;
	
include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/Funciones.php');
use com\bydan\framework\contabilidad\util\Funciones;

use com\bydan\framework\contabilidad\presentation\web\SessionBase;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
class tipo_cuenta_predefinida_web {
	
	public static $GET_POST = null;
	public static string $VIEW = '';
	public static string $STR_NOMBRE_PAGINA = 'tipo_cuenta_predefinida_view.php';
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
			tipo_cuenta_predefinida_web::$STR_DESCRIPCION_USUARIO_SISTEMA=$this->sessionBase->read('usuarioActualDescripcion');
		}
		
		if($this->sessionBase->read('periodoActualDescripcion')!=null) {
			tipo_cuenta_predefinida_web::$STR_DESCRIPCION_PERIODO_SISTEMA=$this->sessionBase->read('periodoActualDescripcion');
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
		
		tipo_cuenta_predefinida_web::$STR_SUFIJO_ESTILO_USUARIO=Funciones::getSufijoEstiloUsuario($this->parametroGeneralUsuarioActual);	
	}
	
	public static function InicializarParametrosPagina() {
					
			if (isset(tipo_cuenta_predefinida_web::$GET_POST['STR_TYPE_ONLOAD'])){
				tipo_cuenta_predefinida_web::$STR_TYPE_ONLOAD=tipo_cuenta_predefinida_web::$GET_POST['STR_TYPE_ONLOAD'];
				
				/*Donce onload_aux=onload, clave 'onload' que dio problema en hosting(mod_security)*/
				if(tipo_cuenta_predefinida_web::$STR_TYPE_ONLOAD=='onload_aux') {
					tipo_cuenta_predefinida_web::$STR_TYPE_ONLOAD='onload';
				}
			}
			
			if (isset(tipo_cuenta_predefinida_web::$GET_POST['STR_TIPO_PAGINA_AUXILIAR'])){
				tipo_cuenta_predefinida_web::$STR_TIPO_PAGINA_AUXILIAR=tipo_cuenta_predefinida_web::$GET_POST['STR_TIPO_PAGINA_AUXILIAR'];				
			}
			
			if (isset(tipo_cuenta_predefinida_web::$GET_POST['STR_TIPO_USUARIO_AUXILIAR'])){
				tipo_cuenta_predefinida_web::$STR_TIPO_USUARIO_AUXILIAR=tipo_cuenta_predefinida_web::$GET_POST['STR_TIPO_USUARIO_AUXILIAR'];			
			}
			
			if (isset(tipo_cuenta_predefinida_web::$GET_POST['action'])){
				tipo_cuenta_predefinida_web::$STR_ACTION=tipo_cuenta_predefinida_web::$GET_POST['action'];				
			}
			
			if (isset(tipo_cuenta_predefinida_web::$GET_POST['ES_POPUP'])){
				tipo_cuenta_predefinida_web::$STR_ES_POPUP=tipo_cuenta_predefinida_web::$GET_POST['ES_POPUP'];				
			}
			
			if (isset(tipo_cuenta_predefinida_web::$GET_POST['ES_BUSQUEDA'])){
				tipo_cuenta_predefinida_web::$STR_ES_BUSQUEDA=tipo_cuenta_predefinida_web::$GET_POST['ES_BUSQUEDA'];				
			}
			
			if (isset(tipo_cuenta_predefinida_web::$GET_POST['FUNCION_JS'])){
				tipo_cuenta_predefinida_web::$STR_FUNCION_JS=tipo_cuenta_predefinida_web::$GET_POST['FUNCION_JS'];				
			}
			
			if (isset(tipo_cuenta_predefinida_web::$GET_POST['id'])){
				tipo_cuenta_predefinida_web::$BIG_ID_ACTUAL=tipo_cuenta_predefinida_web::$GET_POST['id'];				
			}
			
			if (isset(tipo_cuenta_predefinida_web::$GET_POST['id_opcion'])){
				tipo_cuenta_predefinida_web::$BIG_ID_OPCION=tipo_cuenta_predefinida_web::$GET_POST['id_opcion'];				
			}
						
			if (isset(tipo_cuenta_predefinida_web::$GET_POST['OBJETO_JS'])){
				tipo_cuenta_predefinida_web::$STR_OBJETO_JS=tipo_cuenta_predefinida_web::$GET_POST['OBJETO_JS'];				
			}
			
			if (isset(tipo_cuenta_predefinida_web::$GET_POST['view'])){
				tipo_cuenta_predefinida_web::$VIEW=tipo_cuenta_predefinida_web::$GET_POST['view'];				
			}
			
			if (isset(tipo_cuenta_predefinida_web::$GET_POST['ES_RELACIONES'])){
				if(tipo_cuenta_predefinida_web::$VIEW=="tipo_cuenta_predefinida" || tipo_cuenta_predefinida_web::$VIEW=="tipo_cuenta_predefinida_form") {
					tipo_cuenta_predefinida_web::$STR_ES_RELACIONES=tipo_cuenta_predefinida_web::$GET_POST['ES_RELACIONES'];
					
					//tipo_cuenta_predefinida_web::$STR_ES_RELACIONES=tipo_cuenta_predefinida_web::$STR_ES_RELACIONES;
				} else {
					tipo_cuenta_predefinida_web::$STR_ES_RELACIONES='false';
				}
			}
			
			if (isset(tipo_cuenta_predefinida_web::$GET_POST['ES_RELACIONADO'])){
				if(tipo_cuenta_predefinida_web::$VIEW=="tipo_cuenta_predefinida" || tipo_cuenta_predefinida_web::$VIEW=="tipo_cuenta_predefinida_form") {
					tipo_cuenta_predefinida_web::$STR_ES_RELACIONADO=tipo_cuenta_predefinida_web::$GET_POST['ES_RELACIONADO'];
				} else {
					//SE DETERMINA QUE ES HIJO RELACIONADO
					tipo_cuenta_predefinida_web::$STR_ES_RELACIONADO='true';
					tipo_cuenta_predefinida_web::$STR_ES_RELACIONES='false';
				}
			}
			
			if(tipo_cuenta_predefinida_web::$VIEW!="tipo_cuenta_predefinida" && tipo_cuenta_predefinida_web::$VIEW!="tipo_cuenta_predefinida_form") {
				tipo_cuenta_predefinida_web::$STR_SUF='_tipo_cuenta_predefinida';
				//$STR_SUFtipo_cuenta_predefinida=$STR_SUF;
			}
			
			/*
			if($STR_ES_RELACIONES=='true') {
				if($VIEW!='tipo_cuenta_predefinida') {
					$STR_ES_RELACIONES='false';
					$STR_ES_RELACIONES=$STR_ES_RELACIONES;
					
				} else {				
					if($STR_ES_RELACIONADO=='true') {
						$STR_ES_RELACIONADO='false';
					}
				}
			}
			
			if($STR_ES_RELACIONADO=='true') {
				if($VIEW!='tipo_cuenta_predefinida') {
					$STR_ES_RELACIONES='false';
					$STR_ES_RELACIONES=$STR_ES_RELACIONES;
				}
				
				$STR_SUF='_tipo_cuenta_predefinida';
				$STR_SUFtipo_cuenta_predefinida=$STR_SUF;
			}					
			*/
			
			/*CUANDO SE ABRE DE UNA PAGINA PRINCIPAL(CON MENU)*/
			if (isset(tipo_cuenta_predefinida_web::$GET_POST['ES_SUB_PAGINA'])){
				tipo_cuenta_predefinida_web::$STR_ES_SUB_PAGINA=tipo_cuenta_predefinida_web::$GET_POST['ES_SUB_PAGINA'];				
			}

			/*CAMPOS OCULTOS STYLE*/
			tipo_cuenta_predefinida_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='none';//display:
			
			if(Constantes::$IS_DEVELOPING) {
				tipo_cuenta_predefinida_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='table-row';//display:
			}
			
			/*NO TIENE CAMPOS OCULTOS*/
			tipo_cuenta_predefinida_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='none';//display:
			
			/*BUSQUEDAS STYLE*/
			/*En Controller existe strPermisoBusqueda*/
			//tipo_cuenta_predefinida_web::$STR_STYLE_BUSQUEDA='display:table-row';
			
			if(tipo_cuenta_predefinida_web::$STR_ES_RELACIONADO=='true') {
				//tipo_cuenta_predefinida_web::$STR_STYLE_BUSQUEDA='display:none';
				tipo_cuenta_predefinida_web::$STR_ES_RELACIONADO_sufijo='_relacionado';
			}
	}
	
	/*
	interface tipo_cuenta_predefinida_webI {
		public function cargarDatosGenerales();
		public static function InicializarParametrosPagina();
	}
	*/
}
?>
