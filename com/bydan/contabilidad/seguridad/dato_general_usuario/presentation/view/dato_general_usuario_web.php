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

namespace com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\view;

include_once('com/bydan/framework/contabilidad/util/Constantes.php');
use com\bydan\framework\contabilidad\util\Constantes;
	
include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/Funciones.php');
use com\bydan\framework\contabilidad\util\Funciones;

use com\bydan\framework\contabilidad\presentation\web\SessionBase;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
class dato_general_usuario_web {
	
	public static $GET_POST = null;
	public static string $VIEW = '';
	public static string $STR_NOMBRE_PAGINA = 'dato_general_usuario_view.php';
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
			dato_general_usuario_web::$STR_DESCRIPCION_USUARIO_SISTEMA=$this->sessionBase->read('usuarioActualDescripcion');
		}
		
		if($this->sessionBase->read('periodoActualDescripcion')!=null) {
			dato_general_usuario_web::$STR_DESCRIPCION_PERIODO_SISTEMA=$this->sessionBase->read('periodoActualDescripcion');
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
		
		dato_general_usuario_web::$STR_SUFIJO_ESTILO_USUARIO=Funciones::getSufijoEstiloUsuario($this->parametroGeneralUsuarioActual);	
	}
	
	public static function InicializarParametrosPagina() {
					
			if (isset(dato_general_usuario_web::$GET_POST['STR_TYPE_ONLOAD'])){
				dato_general_usuario_web::$STR_TYPE_ONLOAD=dato_general_usuario_web::$GET_POST['STR_TYPE_ONLOAD'];
				
				/*Donce onload_aux=onload, clave 'onload' que dio problema en hosting(mod_security)*/
				if(dato_general_usuario_web::$STR_TYPE_ONLOAD=='onload_aux') {
					dato_general_usuario_web::$STR_TYPE_ONLOAD='onload';
				}
			}
			
			if (isset(dato_general_usuario_web::$GET_POST['STR_TIPO_PAGINA_AUXILIAR'])){
				dato_general_usuario_web::$STR_TIPO_PAGINA_AUXILIAR=dato_general_usuario_web::$GET_POST['STR_TIPO_PAGINA_AUXILIAR'];				
			}
			
			if (isset(dato_general_usuario_web::$GET_POST['STR_TIPO_USUARIO_AUXILIAR'])){
				dato_general_usuario_web::$STR_TIPO_USUARIO_AUXILIAR=dato_general_usuario_web::$GET_POST['STR_TIPO_USUARIO_AUXILIAR'];			
			}
			
			if (isset(dato_general_usuario_web::$GET_POST['action'])){
				dato_general_usuario_web::$STR_ACTION=dato_general_usuario_web::$GET_POST['action'];				
			}
			
			if (isset(dato_general_usuario_web::$GET_POST['ES_POPUP'])){
				dato_general_usuario_web::$STR_ES_POPUP=dato_general_usuario_web::$GET_POST['ES_POPUP'];				
			}
			
			if (isset(dato_general_usuario_web::$GET_POST['ES_BUSQUEDA'])){
				dato_general_usuario_web::$STR_ES_BUSQUEDA=dato_general_usuario_web::$GET_POST['ES_BUSQUEDA'];				
			}
			
			if (isset(dato_general_usuario_web::$GET_POST['FUNCION_JS'])){
				dato_general_usuario_web::$STR_FUNCION_JS=dato_general_usuario_web::$GET_POST['FUNCION_JS'];				
			}
			
			if (isset(dato_general_usuario_web::$GET_POST['id'])){
				dato_general_usuario_web::$BIG_ID_ACTUAL=dato_general_usuario_web::$GET_POST['id'];				
			}
			
			if (isset(dato_general_usuario_web::$GET_POST['id_opcion'])){
				dato_general_usuario_web::$BIG_ID_OPCION=dato_general_usuario_web::$GET_POST['id_opcion'];				
			}
						
			if (isset(dato_general_usuario_web::$GET_POST['OBJETO_JS'])){
				dato_general_usuario_web::$STR_OBJETO_JS=dato_general_usuario_web::$GET_POST['OBJETO_JS'];				
			}
			
			if (isset(dato_general_usuario_web::$GET_POST['view'])){
				dato_general_usuario_web::$VIEW=dato_general_usuario_web::$GET_POST['view'];				
			}
			
			if (isset(dato_general_usuario_web::$GET_POST['ES_RELACIONES'])){
				if(dato_general_usuario_web::$VIEW=="dato_general_usuario" || dato_general_usuario_web::$VIEW=="dato_general_usuario_form") {
					dato_general_usuario_web::$STR_ES_RELACIONES=dato_general_usuario_web::$GET_POST['ES_RELACIONES'];
					
					//dato_general_usuario_web::$STR_ES_RELACIONES=dato_general_usuario_web::$STR_ES_RELACIONES;
				} else {
					dato_general_usuario_web::$STR_ES_RELACIONES='false';
				}
			}
			
			if (isset(dato_general_usuario_web::$GET_POST['ES_RELACIONADO'])){
				if(dato_general_usuario_web::$VIEW=="dato_general_usuario" || dato_general_usuario_web::$VIEW=="dato_general_usuario_form") {
					dato_general_usuario_web::$STR_ES_RELACIONADO=dato_general_usuario_web::$GET_POST['ES_RELACIONADO'];
				} else {
					//SE DETERMINA QUE ES HIJO RELACIONADO
					dato_general_usuario_web::$STR_ES_RELACIONADO='true';
					dato_general_usuario_web::$STR_ES_RELACIONES='false';
				}
			}
			
			if(dato_general_usuario_web::$VIEW!="dato_general_usuario" && dato_general_usuario_web::$VIEW!="dato_general_usuario_form") {
				dato_general_usuario_web::$STR_SUF='_dato_general_usuario';
				//$STR_SUFdato_general_usuario=$STR_SUF;
			}
			
			/*
			if($STR_ES_RELACIONES=='true') {
				if($VIEW!='dato_general_usuario') {
					$STR_ES_RELACIONES='false';
					$STR_ES_RELACIONES=$STR_ES_RELACIONES;
					
				} else {				
					if($STR_ES_RELACIONADO=='true') {
						$STR_ES_RELACIONADO='false';
					}
				}
			}
			
			if($STR_ES_RELACIONADO=='true') {
				if($VIEW!='dato_general_usuario') {
					$STR_ES_RELACIONES='false';
					$STR_ES_RELACIONES=$STR_ES_RELACIONES;
				}
				
				$STR_SUF='_dato_general_usuario';
				$STR_SUFdato_general_usuario=$STR_SUF;
			}					
			*/
			
			/*CUANDO SE ABRE DE UNA PAGINA PRINCIPAL(CON MENU)*/
			if (isset(dato_general_usuario_web::$GET_POST['ES_SUB_PAGINA'])){
				dato_general_usuario_web::$STR_ES_SUB_PAGINA=dato_general_usuario_web::$GET_POST['ES_SUB_PAGINA'];				
			}

			/*CAMPOS OCULTOS STYLE*/
			dato_general_usuario_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='none';//display:
			
			if(Constantes::$IS_DEVELOPING) {
				dato_general_usuario_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='table-row';//display:
			}
			
			/*NO TIENE CAMPOS OCULTOS*/
			dato_general_usuario_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='none';//display:
			
			/*BUSQUEDAS STYLE*/
			/*En Controller existe strPermisoBusqueda*/
			//dato_general_usuario_web::$STR_STYLE_BUSQUEDA='display:table-row';
			
			if(dato_general_usuario_web::$STR_ES_RELACIONADO=='true') {
				//dato_general_usuario_web::$STR_STYLE_BUSQUEDA='display:none';
				dato_general_usuario_web::$STR_ES_RELACIONADO_sufijo='_relacionado';
			}
	}
	
	/*
	interface dato_general_usuario_webI {
		public function cargarDatosGenerales();
		public static function InicializarParametrosPagina();
	}
	*/
}
?>
