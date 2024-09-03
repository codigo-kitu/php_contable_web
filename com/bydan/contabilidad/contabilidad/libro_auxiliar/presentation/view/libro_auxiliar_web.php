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

namespace com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\view;

include_once('com/bydan/framework/contabilidad/util/Constantes.php');
use com\bydan\framework\contabilidad\util\Constantes;
	
include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/Funciones.php');
use com\bydan\framework\contabilidad\util\Funciones;

use com\bydan\framework\contabilidad\presentation\web\SessionBase;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
class libro_auxiliar_web {
	
	public static $GET_POST = null;
	public static string $VIEW = '';
	public static string $STR_NOMBRE_PAGINA = 'libro_auxiliar_view.php';
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
			libro_auxiliar_web::$STR_DESCRIPCION_USUARIO_SISTEMA=$this->sessionBase->read('usuarioActualDescripcion');
		}
		
		if($this->sessionBase->read('periodoActualDescripcion')!=null) {
			libro_auxiliar_web::$STR_DESCRIPCION_PERIODO_SISTEMA=$this->sessionBase->read('periodoActualDescripcion');
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
		
		libro_auxiliar_web::$STR_SUFIJO_ESTILO_USUARIO=Funciones::getSufijoEstiloUsuario($this->parametroGeneralUsuarioActual);	
	}
	
	public static function InicializarParametrosPagina() {
					
			if (isset(libro_auxiliar_web::$GET_POST['STR_TYPE_ONLOAD'])){
				libro_auxiliar_web::$STR_TYPE_ONLOAD=libro_auxiliar_web::$GET_POST['STR_TYPE_ONLOAD'];
				
				/*Donce onload_aux=onload, clave 'onload' que dio problema en hosting(mod_security)*/
				if(libro_auxiliar_web::$STR_TYPE_ONLOAD=='onload_aux') {
					libro_auxiliar_web::$STR_TYPE_ONLOAD='onload';
				}
			}
			
			if (isset(libro_auxiliar_web::$GET_POST['STR_TIPO_PAGINA_AUXILIAR'])){
				libro_auxiliar_web::$STR_TIPO_PAGINA_AUXILIAR=libro_auxiliar_web::$GET_POST['STR_TIPO_PAGINA_AUXILIAR'];				
			}
			
			if (isset(libro_auxiliar_web::$GET_POST['STR_TIPO_USUARIO_AUXILIAR'])){
				libro_auxiliar_web::$STR_TIPO_USUARIO_AUXILIAR=libro_auxiliar_web::$GET_POST['STR_TIPO_USUARIO_AUXILIAR'];			
			}
			
			if (isset(libro_auxiliar_web::$GET_POST['action'])){
				libro_auxiliar_web::$STR_ACTION=libro_auxiliar_web::$GET_POST['action'];				
			}
			
			if (isset(libro_auxiliar_web::$GET_POST['ES_POPUP'])){
				libro_auxiliar_web::$STR_ES_POPUP=libro_auxiliar_web::$GET_POST['ES_POPUP'];				
			}
			
			if (isset(libro_auxiliar_web::$GET_POST['ES_BUSQUEDA'])){
				libro_auxiliar_web::$STR_ES_BUSQUEDA=libro_auxiliar_web::$GET_POST['ES_BUSQUEDA'];				
			}
			
			if (isset(libro_auxiliar_web::$GET_POST['FUNCION_JS'])){
				libro_auxiliar_web::$STR_FUNCION_JS=libro_auxiliar_web::$GET_POST['FUNCION_JS'];				
			}
			
			if (isset(libro_auxiliar_web::$GET_POST['id'])){
				libro_auxiliar_web::$BIG_ID_ACTUAL=libro_auxiliar_web::$GET_POST['id'];				
			}
			
			if (isset(libro_auxiliar_web::$GET_POST['id_opcion'])){
				libro_auxiliar_web::$BIG_ID_OPCION=libro_auxiliar_web::$GET_POST['id_opcion'];				
			}
						
			if (isset(libro_auxiliar_web::$GET_POST['OBJETO_JS'])){
				libro_auxiliar_web::$STR_OBJETO_JS=libro_auxiliar_web::$GET_POST['OBJETO_JS'];				
			}
			
			if (isset(libro_auxiliar_web::$GET_POST['view'])){
				libro_auxiliar_web::$VIEW=libro_auxiliar_web::$GET_POST['view'];				
			}
			
			if (isset(libro_auxiliar_web::$GET_POST['ES_RELACIONES'])){
				if(libro_auxiliar_web::$VIEW=="libro_auxiliar" || libro_auxiliar_web::$VIEW=="libro_auxiliar_form") {
					libro_auxiliar_web::$STR_ES_RELACIONES=libro_auxiliar_web::$GET_POST['ES_RELACIONES'];
					
					//libro_auxiliar_web::$STR_ES_RELACIONES=libro_auxiliar_web::$STR_ES_RELACIONES;
				} else {
					libro_auxiliar_web::$STR_ES_RELACIONES='false';
				}
			}
			
			if (isset(libro_auxiliar_web::$GET_POST['ES_RELACIONADO'])){
				if(libro_auxiliar_web::$VIEW=="libro_auxiliar" || libro_auxiliar_web::$VIEW=="libro_auxiliar_form") {
					libro_auxiliar_web::$STR_ES_RELACIONADO=libro_auxiliar_web::$GET_POST['ES_RELACIONADO'];
				} else {
					//SE DETERMINA QUE ES HIJO RELACIONADO
					libro_auxiliar_web::$STR_ES_RELACIONADO='true';
					libro_auxiliar_web::$STR_ES_RELACIONES='false';
				}
			}
			
			if(libro_auxiliar_web::$VIEW!="libro_auxiliar" && libro_auxiliar_web::$VIEW!="libro_auxiliar_form") {
				libro_auxiliar_web::$STR_SUF='_libro_auxiliar';
				//$STR_SUFlibro_auxiliar=$STR_SUF;
			}
			
			/*
			if($STR_ES_RELACIONES=='true') {
				if($VIEW!='libro_auxiliar') {
					$STR_ES_RELACIONES='false';
					$STR_ES_RELACIONES=$STR_ES_RELACIONES;
					
				} else {				
					if($STR_ES_RELACIONADO=='true') {
						$STR_ES_RELACIONADO='false';
					}
				}
			}
			
			if($STR_ES_RELACIONADO=='true') {
				if($VIEW!='libro_auxiliar') {
					$STR_ES_RELACIONES='false';
					$STR_ES_RELACIONES=$STR_ES_RELACIONES;
				}
				
				$STR_SUF='_libro_auxiliar';
				$STR_SUFlibro_auxiliar=$STR_SUF;
			}					
			*/
			
			/*CUANDO SE ABRE DE UNA PAGINA PRINCIPAL(CON MENU)*/
			if (isset(libro_auxiliar_web::$GET_POST['ES_SUB_PAGINA'])){
				libro_auxiliar_web::$STR_ES_SUB_PAGINA=libro_auxiliar_web::$GET_POST['ES_SUB_PAGINA'];				
			}

			/*CAMPOS OCULTOS STYLE*/
			libro_auxiliar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='none';//display:
			
			if(Constantes::$IS_DEVELOPING) {
				libro_auxiliar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='table-row';//display:
			}
			
			
			/*BUSQUEDAS STYLE*/
			/*En Controller existe strPermisoBusqueda*/
			//libro_auxiliar_web::$STR_STYLE_BUSQUEDA='display:table-row';
			
			if(libro_auxiliar_web::$STR_ES_RELACIONADO=='true') {
				//libro_auxiliar_web::$STR_STYLE_BUSQUEDA='display:none';
				libro_auxiliar_web::$STR_ES_RELACIONADO_sufijo='_relacionado';
			}
	}
	
	/*
	interface libro_auxiliar_webI {
		public function cargarDatosGenerales();
		public static function InicializarParametrosPagina();
	}
	*/
}
?>
