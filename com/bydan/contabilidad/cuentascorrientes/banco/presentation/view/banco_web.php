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

namespace com\bydan\contabilidad\cuentascorrientes\banco\presentation\view;

include_once('com/bydan/framework/contabilidad/util/Constantes.php');
use com\bydan\framework\contabilidad\util\Constantes;
	
include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/Funciones.php');
use com\bydan\framework\contabilidad\util\Funciones;

use com\bydan\framework\contabilidad\presentation\web\SessionBase;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
class banco_web {
	
	public static $GET_POST = null;
	public static string $VIEW = '';
	public static string $STR_NOMBRE_PAGINA = 'banco_view.php';
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
			banco_web::$STR_DESCRIPCION_USUARIO_SISTEMA=$this->sessionBase->read('usuarioActualDescripcion');
		}
		
		if($this->sessionBase->read('periodoActualDescripcion')!=null) {
			banco_web::$STR_DESCRIPCION_PERIODO_SISTEMA=$this->sessionBase->read('periodoActualDescripcion');
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
		
		banco_web::$STR_SUFIJO_ESTILO_USUARIO=Funciones::getSufijoEstiloUsuario($this->parametroGeneralUsuarioActual);	
	}
	
	public static function InicializarParametrosPagina() {
					
			if (isset(banco_web::$GET_POST['STR_TYPE_ONLOAD'])){
				banco_web::$STR_TYPE_ONLOAD=banco_web::$GET_POST['STR_TYPE_ONLOAD'];
				
				/*Donce onload_aux=onload, clave 'onload' que dio problema en hosting(mod_security)*/
				if(banco_web::$STR_TYPE_ONLOAD=='onload_aux') {
					banco_web::$STR_TYPE_ONLOAD='onload';
				}
			}
			
			if (isset(banco_web::$GET_POST['STR_TIPO_PAGINA_AUXILIAR'])){
				banco_web::$STR_TIPO_PAGINA_AUXILIAR=banco_web::$GET_POST['STR_TIPO_PAGINA_AUXILIAR'];				
			}
			
			if (isset(banco_web::$GET_POST['STR_TIPO_USUARIO_AUXILIAR'])){
				banco_web::$STR_TIPO_USUARIO_AUXILIAR=banco_web::$GET_POST['STR_TIPO_USUARIO_AUXILIAR'];			
			}
			
			if (isset(banco_web::$GET_POST['action'])){
				banco_web::$STR_ACTION=banco_web::$GET_POST['action'];				
			}
			
			if (isset(banco_web::$GET_POST['ES_POPUP'])){
				banco_web::$STR_ES_POPUP=banco_web::$GET_POST['ES_POPUP'];				
			}
			
			if (isset(banco_web::$GET_POST['ES_BUSQUEDA'])){
				banco_web::$STR_ES_BUSQUEDA=banco_web::$GET_POST['ES_BUSQUEDA'];				
			}
			
			if (isset(banco_web::$GET_POST['FUNCION_JS'])){
				banco_web::$STR_FUNCION_JS=banco_web::$GET_POST['FUNCION_JS'];				
			}
			
			if (isset(banco_web::$GET_POST['id'])){
				banco_web::$BIG_ID_ACTUAL=banco_web::$GET_POST['id'];				
			}
			
			if (isset(banco_web::$GET_POST['id_opcion'])){
				banco_web::$BIG_ID_OPCION=banco_web::$GET_POST['id_opcion'];				
			}
						
			if (isset(banco_web::$GET_POST['OBJETO_JS'])){
				banco_web::$STR_OBJETO_JS=banco_web::$GET_POST['OBJETO_JS'];				
			}
			
			if (isset(banco_web::$GET_POST['view'])){
				banco_web::$VIEW=banco_web::$GET_POST['view'];				
			}
			
			if (isset(banco_web::$GET_POST['ES_RELACIONES'])){
				if(banco_web::$VIEW=="banco" || banco_web::$VIEW=="banco_form") {
					banco_web::$STR_ES_RELACIONES=banco_web::$GET_POST['ES_RELACIONES'];
					
					//banco_web::$STR_ES_RELACIONES=banco_web::$STR_ES_RELACIONES;
				} else {
					banco_web::$STR_ES_RELACIONES='false';
				}
			}
			
			if (isset(banco_web::$GET_POST['ES_RELACIONADO'])){
				if(banco_web::$VIEW=="banco" || banco_web::$VIEW=="banco_form") {
					banco_web::$STR_ES_RELACIONADO=banco_web::$GET_POST['ES_RELACIONADO'];
				} else {
					//SE DETERMINA QUE ES HIJO RELACIONADO
					banco_web::$STR_ES_RELACIONADO='true';
					banco_web::$STR_ES_RELACIONES='false';
				}
			}
			
			if(banco_web::$VIEW!="banco" && banco_web::$VIEW!="banco_form") {
				banco_web::$STR_SUF='_banco';
				//$STR_SUFbanco=$STR_SUF;
			}
			
			/*
			if($STR_ES_RELACIONES=='true') {
				if($VIEW!='banco') {
					$STR_ES_RELACIONES='false';
					$STR_ES_RELACIONES=$STR_ES_RELACIONES;
					
				} else {				
					if($STR_ES_RELACIONADO=='true') {
						$STR_ES_RELACIONADO='false';
					}
				}
			}
			
			if($STR_ES_RELACIONADO=='true') {
				if($VIEW!='banco') {
					$STR_ES_RELACIONES='false';
					$STR_ES_RELACIONES=$STR_ES_RELACIONES;
				}
				
				$STR_SUF='_banco';
				$STR_SUFbanco=$STR_SUF;
			}					
			*/
			
			/*CUANDO SE ABRE DE UNA PAGINA PRINCIPAL(CON MENU)*/
			if (isset(banco_web::$GET_POST['ES_SUB_PAGINA'])){
				banco_web::$STR_ES_SUB_PAGINA=banco_web::$GET_POST['ES_SUB_PAGINA'];				
			}

			/*CAMPOS OCULTOS STYLE*/
			banco_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='none';//display:
			
			if(Constantes::$IS_DEVELOPING) {
				banco_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='table-row';//display:
			}
			
			
			/*BUSQUEDAS STYLE*/
			/*En Controller existe strPermisoBusqueda*/
			//banco_web::$STR_STYLE_BUSQUEDA='display:table-row';
			
			if(banco_web::$STR_ES_RELACIONADO=='true') {
				//banco_web::$STR_STYLE_BUSQUEDA='display:none';
				banco_web::$STR_ES_RELACIONADO_sufijo='_relacionado';
			}
	}
	
	/*
	interface banco_webI {
		public function cargarDatosGenerales();
		public static function InicializarParametrosPagina();
	}
	*/
}
?>
