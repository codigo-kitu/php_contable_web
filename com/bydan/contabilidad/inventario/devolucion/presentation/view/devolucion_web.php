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

namespace com\bydan\contabilidad\inventario\devolucion\presentation\view;

include_once('com/bydan/framework/contabilidad/util/Constantes.php');
use com\bydan\framework\contabilidad\util\Constantes;
	
include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/Funciones.php');
use com\bydan\framework\contabilidad\util\Funciones;

use com\bydan\framework\contabilidad\presentation\web\SessionBase;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
class devolucion_web {
	
	public static $GET_POST = null;
	public static string $VIEW = '';
	public static string $STR_NOMBRE_PAGINA = 'devolucion_view.php';
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
			devolucion_web::$STR_DESCRIPCION_USUARIO_SISTEMA=$this->sessionBase->read('usuarioActualDescripcion');
		}
		
		if($this->sessionBase->read('periodoActualDescripcion')!=null) {
			devolucion_web::$STR_DESCRIPCION_PERIODO_SISTEMA=$this->sessionBase->read('periodoActualDescripcion');
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
		
		devolucion_web::$STR_SUFIJO_ESTILO_USUARIO=Funciones::getSufijoEstiloUsuario($this->parametroGeneralUsuarioActual);	
	}
	
	public static function InicializarParametrosPagina() {
					
			if (isset(devolucion_web::$GET_POST['STR_TYPE_ONLOAD'])){
				devolucion_web::$STR_TYPE_ONLOAD=devolucion_web::$GET_POST['STR_TYPE_ONLOAD'];
				
				/*Donce onload_aux=onload, clave 'onload' que dio problema en hosting(mod_security)*/
				if(devolucion_web::$STR_TYPE_ONLOAD=='onload_aux') {
					devolucion_web::$STR_TYPE_ONLOAD='onload';
				}
			}
			
			if (isset(devolucion_web::$GET_POST['STR_TIPO_PAGINA_AUXILIAR'])){
				devolucion_web::$STR_TIPO_PAGINA_AUXILIAR=devolucion_web::$GET_POST['STR_TIPO_PAGINA_AUXILIAR'];				
			}
			
			if (isset(devolucion_web::$GET_POST['STR_TIPO_USUARIO_AUXILIAR'])){
				devolucion_web::$STR_TIPO_USUARIO_AUXILIAR=devolucion_web::$GET_POST['STR_TIPO_USUARIO_AUXILIAR'];			
			}
			
			if (isset(devolucion_web::$GET_POST['action'])){
				devolucion_web::$STR_ACTION=devolucion_web::$GET_POST['action'];				
			}
			
			if (isset(devolucion_web::$GET_POST['ES_POPUP'])){
				devolucion_web::$STR_ES_POPUP=devolucion_web::$GET_POST['ES_POPUP'];				
			}
			
			if (isset(devolucion_web::$GET_POST['ES_BUSQUEDA'])){
				devolucion_web::$STR_ES_BUSQUEDA=devolucion_web::$GET_POST['ES_BUSQUEDA'];				
			}
			
			if (isset(devolucion_web::$GET_POST['FUNCION_JS'])){
				devolucion_web::$STR_FUNCION_JS=devolucion_web::$GET_POST['FUNCION_JS'];				
			}
			
			if (isset(devolucion_web::$GET_POST['id'])){
				devolucion_web::$BIG_ID_ACTUAL=devolucion_web::$GET_POST['id'];				
			}
			
			if (isset(devolucion_web::$GET_POST['id_opcion'])){
				devolucion_web::$BIG_ID_OPCION=devolucion_web::$GET_POST['id_opcion'];				
			}
						
			if (isset(devolucion_web::$GET_POST['OBJETO_JS'])){
				devolucion_web::$STR_OBJETO_JS=devolucion_web::$GET_POST['OBJETO_JS'];				
			}
			
			if (isset(devolucion_web::$GET_POST['view'])){
				devolucion_web::$VIEW=devolucion_web::$GET_POST['view'];				
			}
			
			if (isset(devolucion_web::$GET_POST['ES_RELACIONES'])){
				if(devolucion_web::$VIEW=="devolucion" || devolucion_web::$VIEW=="devolucion_form") {
					devolucion_web::$STR_ES_RELACIONES=devolucion_web::$GET_POST['ES_RELACIONES'];
					
					//devolucion_web::$STR_ES_RELACIONES=devolucion_web::$STR_ES_RELACIONES;
				} else {
					devolucion_web::$STR_ES_RELACIONES='false';
				}
			}
			
			if (isset(devolucion_web::$GET_POST['ES_RELACIONADO'])){
				if(devolucion_web::$VIEW=="devolucion" || devolucion_web::$VIEW=="devolucion_form") {
					devolucion_web::$STR_ES_RELACIONADO=devolucion_web::$GET_POST['ES_RELACIONADO'];
				} else {
					//SE DETERMINA QUE ES HIJO RELACIONADO
					devolucion_web::$STR_ES_RELACIONADO='true';
					devolucion_web::$STR_ES_RELACIONES='false';
				}
			}
			
			if(devolucion_web::$VIEW!="devolucion" && devolucion_web::$VIEW!="devolucion_form") {
				devolucion_web::$STR_SUF='_devolucion';
				//$STR_SUFdevolucion=$STR_SUF;
			}
			
			/*
			if($STR_ES_RELACIONES=='true') {
				if($VIEW!='devolucion') {
					$STR_ES_RELACIONES='false';
					$STR_ES_RELACIONES=$STR_ES_RELACIONES;
					
				} else {				
					if($STR_ES_RELACIONADO=='true') {
						$STR_ES_RELACIONADO='false';
					}
				}
			}
			
			if($STR_ES_RELACIONADO=='true') {
				if($VIEW!='devolucion') {
					$STR_ES_RELACIONES='false';
					$STR_ES_RELACIONES=$STR_ES_RELACIONES;
				}
				
				$STR_SUF='_devolucion';
				$STR_SUFdevolucion=$STR_SUF;
			}					
			*/
			
			/*CUANDO SE ABRE DE UNA PAGINA PRINCIPAL(CON MENU)*/
			if (isset(devolucion_web::$GET_POST['ES_SUB_PAGINA'])){
				devolucion_web::$STR_ES_SUB_PAGINA=devolucion_web::$GET_POST['ES_SUB_PAGINA'];				
			}

			/*CAMPOS OCULTOS STYLE*/
			devolucion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='none';//display:
			
			if(Constantes::$IS_DEVELOPING) {
				devolucion_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS='table-row';//display:
			}
			
			
			/*BUSQUEDAS STYLE*/
			/*En Controller existe strPermisoBusqueda*/
			//devolucion_web::$STR_STYLE_BUSQUEDA='display:table-row';
			
			if(devolucion_web::$STR_ES_RELACIONADO=='true') {
				//devolucion_web::$STR_STYLE_BUSQUEDA='display:none';
				devolucion_web::$STR_ES_RELACIONADO_sufijo='_relacionado';
			}
	}
	
	/*
	interface devolucion_webI {
		public function cargarDatosGenerales();
		public static function InicializarParametrosPagina();
	}
	*/
}
?>
