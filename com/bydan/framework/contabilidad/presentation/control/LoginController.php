<?php declare(strict_types = 1);
/*
* ============================================================================
* GNU Lesser General Public License
* ============================================================================
*
* BYDAN - Free Java BYDAN library.
* Copyright (C) 2008 
* 
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU Lesser General Public
* License as published by the Free Software Foundation; either
* version 2.1 of the License, or (at your option) any later version.
* 
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
* Lesser General Public License for more details.
* 
* You should have received a copy of the GNU Lesser General Public
* License along with this library; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307, USA.
* 
* BYDAN Corporation
*/
namespace com\bydan\framework\contabilidad\presentation\control;



use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\DeepLoadType;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\PaqueteTipo;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\presentation\web\SessionBase;
use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\presentation\web\control\ControllerBase;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\entity\resumen_usuario;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\parametro_general_sg\util\parametro_general_sg_carga;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_carga;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_carga;
use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_carga;
use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_carga;
//use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;

use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic_add;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic_add;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\grupo_opcion\business\logic\grupo_opcion_logic;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic_add;
use com\bydan\contabilidad\seguridad\parametro_general_sg\business\logic\parametro_general_sg_logic;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\logic\parametro_general_usuario_logic;


//include_once('com/bydan/framework/contabilidad/util/Constantes.php');
//include_once('com/bydan/framework/contabilidad/util/Funciones.php');
//include_once('com/bydan/framework/contabilidad/util/PaqueteTipo.php');

//USUARIO
	
//CARGA ARCHIVOS FRAMEWORK
//include_once('com/bydan/contabilidad/seguridad/usuario/util/usuario_carga.php');
usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
//CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL 
usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*PEFIL_USUARIO*/
//include_once('com/bydan/contabilidad/seguridad/perfil_usuario/util/perfil_usuario_carga.php');
perfil_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
/*PEFIL_USUARIO_FIN*/
	
/*OPCION*/
//include_once('com/bydan/contabilidad/seguridad/opcion/util/opcion_carga.php');
opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
/*OPCION_FIN*/
	
/*PERFIL_OPCION*/
//include_once('com/bydan/contabilidad/seguridad/perfil_opcion/util/perfil_opcion_carga.php');
perfil_opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
/*PERFIL_OPCION_FIN*/
	
/*RESUMEN_USUARIO*/
//include_once('com/bydan/contabilidad/seguridad/resumen_usuario/util/resumen_usuario_carga.php');
resumen_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
/*RESUMEN_USUARIO*/
	
/*MODULO*/
//include_once('com/bydan/contabilidad/seguridad/modulo/util/modulo_carga.php');
modulo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
/*MODULO*/
	
/*PARAMETRO GENERAL USUARIO*/
//include_once('com/bydan/contabilidad/seguridad/parametro_general_usuario/util/parametro_general_usuario_carga.php');
parametro_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
/*PARAMETRO GENERAL USUARIO*/
	
/*RESUMEN_USUARIO*/
//include_once('com/bydan/contabilidad/seguridad/grupo_opcion/util/grupo_opcion_carga.php');
grupo_opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
/*RESUMEN_USUARIO*/
		
/*PARAMETRO GENERAL SG*/
//include_once('com/bydan/contabilidad/seguridad/parametro_general_sg/util/parametro_general_sg_carga.php');
parametro_general_sg_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
/*PARAMETRO GENERAL SG*/
	
/*EMPRESA*/
//include_once('com/bydan/contabilidad/general/empresa/util/empresa_carga.php');
empresa_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
/*EMPRESA*/
	
/*EMPRESA*/
//include_once('com/bydan/contabilidad/general/sucursal/util/sucursal_carga.php');
sucursal_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
/*EMPRESA*/
	
/*EJERCICIO*/
//include_once('com/bydan/contabilidad/contabilidad/ejercicio/util/ejercicio_carga.php');
ejercicio_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
/*EJERCICIO*/
	
/*PERIODO*/
//include_once('com/bydan/contabilidad/contabilidad/periodo/util/periodo_carga.php');
periodo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
/*PERIODO*/
	
/*TIPO FONDO*/
//include_once('com/bydan/contabilidad/seguridad/tipo_fondo/util/tipo_fondo_carga.php');
tipo_fondo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
/*TIPO FONDO*/


class LoginController extends ControllerBase {	
	
	public string $htmlTablaLogins='';
	public string $htmlListaMapaSitio='';
	
	public string $strAuxiliarUrlPagina='';		
	public string $strAuxiliarMensaje='';		
	public string $strAuxiliarCssMensaje='';	
	public array $opciones=array();
	
	public string $strUsuario='';
	public string $strPassword='';

	//public $LoginModel=null;
	
	function __construct () {
		parent::__construct();	

		$this->Session=	new SessionBase();
		//$this->Session->start();
		
	}
	
	public function inicializarParametrosQueryString(mixed $post1=null) {
		
	    $post= null;
	    
	    if($_POST) {
	        $post=$_POST;
	        
	    } else if($_GET) {
	        $post=$_GET;
	        
	    } else if($post1) {
	        $post = $post1;
	    }	    	   
		
	    
	    if($_POST || $_GET) {	       	    	    
	        	    
	       if($post!=null && count($post)) {
    			$this->data=array();
    			$nombrecompuesto=array();
    			 
    			foreach($post as $postx  => $value) {
    				$nombrecompuesto=preg_split("/-/", $postx);//preg_split('-',$postx);//split('-',$postx);
    				
    				if(count($nombrecompuesto)==1){
    					$this->data[$postx]=$value;
    				} else {
    					$this->data[$nombrecompuesto[0]][$nombrecompuesto[1]]=$value;
    				}
    			}
    		}
	    
	    } else {
	        $this->data = $post;
	    }
	}
	
	public function ejecutarParametrosQueryString($post1=null) {
	    $action='';
	    $post=null;
	    
	   
        if($_POST) {
            $post=$_POST;
            $action=$post['action'];
            
        } else  if($_GET) {
            $post=$_GET;
            $action=$post['action'];
            
        } else  if($post1) {
            $post=$post1;
            $action=$post->{'action'};
        }
	   
	    
		if($action=='validarUsuario') {
			//$this->setCargarDivSeccionesActualizarLogin(true,false,false,true,false,false,false);				
			$this->validarUsuario(false);												
		
		} else if($action=='cargarMapaSitio') {								
			$this->cargarMapaSitio($post);												
		
		}  else if($action=='cargarMenuModulos') {								
			$this->cargarMenuModulos($post);	
														
		} else if($action=='cargarOpcionesModulo') {								
			$this->cargarOpcionesModulo($post);	
														
		} else if($action=='cerrarSesion') {								
			$this->validarUsuario(true);
														
		}  else if($action=='cerrarSesionGeneral') {								
			$this->cerrarSesionGeneral();		
			
		}  else if($action=='cambiarClaveUsuario') {
			$this->cambiarClaveUsuario();
		}
		
		$jsonResponseLogin=json_encode($this);
	
		echo($jsonResponseLogin);
		
	}
			
	public function cargarOpcionesModulo(mixed $post) {
		$sistemaLogicAdditional=new sistema_logic_add();
		$moduloLogic=new modulo_logic();
		$grupoOpcionLogic=new grupo_opcion_logic();
		$strFinalQuery='';
		$opcionesUsuario=array();
		$grupoOpcionesUsuario=array();
		
		//$blnstart=session_start();
        
		if(is_array($this->data)) {
		    $idModuloActual=(int)$post['id'];
		    
		} else {
		    $idModuloActual=(int)$post->{'id'};
		}
		
		
		//$opcionesUsuario=unserialize($_SESSION['opcionesUsuario']);
		$usuarioActual=new usuario();			
		$usuarioActual=unserialize($this->Session->read('usuarioActual'));
			
		$lIdSistema=Constantes::$BIG_ID_SISTEMA_ACTUAL;
		
		$this->htmlListaMapaSitio='';
		
		try {
			
			$sistemaLogicAdditional->getNewConnexionToDeep();

			$grupoOpcionLogic->setConnexion($sistemaLogicAdditional->getConnexion());
			$moduloLogic->setConnexion($sistemaLogicAdditional->getConnexion());
			
			$this->strAuxiliarCssMensaje=Constantes::$STR_MENSAJE_INFO;	
							
			$opcionesUsuario = $sistemaLogicAdditional->getOpcionesUsuarioInterno($usuarioActual,$lIdSistema,false,$idModuloActual,false);
			
			$strFinalQuery=' where id_modulo='.$idModuloActual.' order by orden asc';
			$grupoOpcionLogic->getTodos($strFinalQuery,new Pagination());
			$grupoOpcionesUsuario = $grupoOpcionLogic->getgrupo_opcions();
				
			$moduloLogic->getEntity($idModuloActual);
			
			$this->strAuxiliarUrlPagina=Constantes::$STR_HTTP_INIT.Constantes::$STR_DNS_NAME_SERVER.':'.Constantes::$STR_PORT_SERVER.'/'.Constantes::$STR_CONTEXT_SERVER.'/'.str_replace('TOREPLACE','Main',Constantes::$STR_CARPETA_PAGINAS_JQUERY_TOREPLACE);
				
			$strNombrePaginaMenu='';
				
			foreach ($opcionesUsuario as $opcionLocal) {
				$strNombrePaginaMenu=$opcionLocal->getnombre_clase();
					
				$strNombrePaginaMenu=str_replace('Mantenimiento','',$strNombrePaginaMenu);
				$strNombrePaginaMenu=str_replace('.jsf','',$strNombrePaginaMenu);
				$strNombrePaginaMenu=str_replace('Final','',$strNombrePaginaMenu);
			
				//$opcionLocal->setField_strNombreClase(Funciones::getStrMenuController($opcionLocal->getField_strNombreClase()));
					
				$opcionLocal->setnombre_clase($strNombrePaginaMenu);
			}							
			
			$sistemaLogicAdditional->commitNewConnexionToDeep();
			//$sistemaLogicAdditional->closeNewConnexionToDeep();
		
			$this->Session->write('moduloActual',serialize($moduloLogic->getModulo()));
			$this->Session->write('idModuloActual',$idModuloActual);
			$this->Session->write('opcionesUsuario',serialize($opcionesUsuario));
			$this->Session->write('grupoOpcionesUsuario',serialize($grupoOpcionesUsuario));
			
		}  catch(Exception $e) {
			
			$sistemaLogicAdditional->rollbackNewConnexionToDeep();
			//$sistemaLogicAdditional->closeNewConnexionToDeep();
			
			throw $e;
		
		} finally {
			$sistemaLogicAdditional->closeNewConnexionToDeep();
		}	
	}
	
	public function cargarMenuModulos(mixed $post) {
		$moduloLogic=new modulo_logic();
		
		        //$blnstart=session_start();
			
        		//$opcionesUsuario=unserialize($_SESSION['opcionesUsuario']);
		//$usuarioActual=new usuario();			
		//$usuarioActual=unserialize($this->Session->read('usuarioActual'));
			
		$lIdSistema=Constantes::$BIG_ID_SISTEMA_ACTUAL;
		
		$this->htmlListaMapaSitio='';
		
		try {
			$moduloLogic->getNewConnexionToDeep();
			
			$strFinalQuery=' where id_sistema='.$lIdSistema.' order by orden asc';
			
			$moduloLogic->getEntitiesWithFinalQuery($strFinalQuery);//getTodosModulos($strFinalQuery,new Pagination());
			
			$this->htmlListaMapaSitio.='<h2>MÓDULOS</h2><h6><hr/>';//.$usuarioActual->user_name.'</h6><hr/>';
			$this->htmlListaMapaSitio.='<form id="frmTablaDatosModulo" name="frmTablaDatosModulo">';
			$this->htmlListaMapaSitio.='<input type="hidden" id="t-maxima_fila" name="t-maxima_fila" value="'.count($moduloLogic->getModulos()).'">';
			$i=0;
			$id_modulo='';
			//$this->htmlListaMapaSitio.='<table border="0" cellpadding="12" cellspacing="0">';
			
			$this->htmlListaMapaSitio.='<nav class="navbar navbar-dark bg-light justify-content-center">';
			$this->htmlListaMapaSitio.='<ul class="navbar-nav">';
			
			foreach($moduloLogic->getModulos() as $moduloLocal) {				
				//$this->htmlListaMapaSitio.='<tr><td align="center">';
				
				$i++;
				
				if(Constantes::$IS_DEVELOPING) {
					$id_modulo='-'.$moduloLocal->getId();
				}
				
				//$this->htmlListaMapaSitio.='<input type="button" id="btnModulo'.$i.'" name="btnModulo'.$i.'" class="imgseleccionarmodulo btn btn-success" idactualmodulo="'.$moduloLocal->getId().'" title="'.$moduloLocal->getnombre().'" value="'.$moduloLocal->getnombre().$id_modulo.'"/>';
				
				$this->htmlListaMapaSitio.='<li class="nav-item p-2">';
				$this->htmlListaMapaSitio.='<input type="button" id="btnModulo'.$i.'" name="btnModulo'.$i.'" class="imgseleccionarmodulo btn btn-outline-success my-2 my-sm-0" idactualmodulo="'.$moduloLocal->getId().'" title="'.$moduloLocal->getnombre().'" value="'.$moduloLocal->getnombre().$id_modulo.'"/>';
				//$this->htmlListaMapaSitio.='    <button id="btnModulo'.$i.' name="btnModulo'.$i.' class="btn btn-outline-success my-2 my-sm-0" type="submit" idactualmodulo="'.$moduloLocal->getId().'" title="'.$moduloLocal->getnombre().'>'.$moduloLocal->getnombre().$id_modulo.'</button>';
				$this->htmlListaMapaSitio.='</li>';
				
				        //$moduloLocal->getId()				
				        //$this->htmlListaMapaSitio.='</td></tr>';
			}
			
			$this->htmlListaMapaSitio.='</ul>';
			$this->htmlListaMapaSitio.='</nav>';
			//$this->htmlListaMapaSitio.='</table>';
			$this->htmlListaMapaSitio.='</form>';
			
			//$opcionesUsuario=$sistemaLogicAdditional->getOpcionesUsuarioMapaSitio($usuarioActual,$lIdSistema,$es_solomenu);
			
			$moduloLogic->commitNewConnexionToDeep();
			$moduloLogic->closeNewConnexionToDeep();
		
		}  catch(Exception $e) {
			$moduloLogic->rollbackNewConnexionToDeep();
			$moduloLogic->closeNewConnexionToDeep();
			throw $e;
		}	
	}
	
	public function cargarMapaSitio(mixed $post) {
		$usuarioLogicAdditional=new usuario_logic_add();
		$sistemaLogicAdditional=new sistema_logic_add();
		
		$this->htmlListaMapaSitio='';
		
		$es_solomenu=false;
		
		if(is_array($this->data)) {
			
    		if(array_key_exists('solo_menu', $post)) {
    			if($post['solo_menu']!=null && ($post['solo_menu']=='on' || $post['solo_menu']==true)) {
    				$es_solomenu=true;
    			}
    		}
    		
		} else {
			if(property_exists($post,'solo_menu')) {
				if($post->{'solo_menu'}!=null && ($post->{'solo_menu'}=='on' || $post->{'solo_menu'}==true)) {
					$es_solomenu=true;
				}
			}
		}
		
		try {
			$usuarioLogicAdditional->getNewConnexionToDeep();
			$sistemaLogicAdditional->setConnexion($usuarioLogicAdditional->getConnexion());
			//$blnstart=session_start();
			
			//$opcionesUsuario=unserialize($_SESSION['opcionesUsuario']);
			$usuarioActual=new usuario();			
			$usuarioActual=unserialize($this->Session->read('usuarioActual'));
			
			$lIdSistema=Constantes::$BIG_ID_SISTEMA_ACTUAL;;
			
			$idModuloActual=$this->Session->read('idModuloActual');
			
			$opcionesUsuario=$sistemaLogicAdditional->getOpcionesUsuarioMapaSitio($usuarioActual,$lIdSistema,$es_solomenu,$idModuloActual);
						
			
			foreach ($opcionesUsuario as $opcionLocal) {
				$strNombrePaginaMenu=$opcionLocal->getnombre_clase();
				
				$strNombrePaginaMenu=str_replace('Mantenimiento','',$strNombrePaginaMenu);
				$strNombrePaginaMenu=str_replace('.jsf','',$strNombrePaginaMenu);
				$strNombrePaginaMenu=str_replace('Final','',$strNombrePaginaMenu);
		
				//$opcionLocal->setField_strNombreClase(Funciones::getStrMenuController($opcionLocal->getField_strNombreClase()));
				
				$opcionLocal->setnombre_clase($strNombrePaginaMenu);
			}
			
			
			if(Constantes::$BIT_CON_ARBOL_MENU_JQUERY) {	
				$this->htmlListaMapaSitio=Funciones::getMenuUsuarioJQuery2($opcionesUsuario,null,'webroot');//utf8_encode(								
			}
			
			$usuarioLogicAdditional->commitNewConnexionToDeep();
			$usuarioLogicAdditional->closeNewConnexionToDeep();
		
		}  catch(Exception $e) {
			$usuarioLogicAdditional->rollbackNewConnexionToDeep();
			$usuarioLogicAdditional->closeNewConnexionToDeep();
			throw $e;
		}
	}
	
	public function validarUsuario(bool $esCerrarSesion) {
	    
	    if(is_array($this->data)) {
	        $this->strUsuario=$this->data['Sistema']['Usuario'];
	        $this->strPassword=$this->data['Sistema']['Password'];
	    } else {
	        $this->strUsuario=$this->data->{'Sistema'}->{'Usuario'};
	        $this->strPassword=$this->data->{'Sistema'}->{'Password'};
	    }
	    
		

		//$this->strAuxiliarMensaje='ok='.$this->strUsuario;	
		$usuarioLogicAdditional=new usuario_logic_add();
		$resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		$sistemaLogicAdditional=new sistema_logic_add();
		$parametro_general_usuarioLogic=new parametro_general_usuario_logic();
		
		$resumen_usuario=new resumen_usuario();
		$opcionesUsuario=array();
			
		$id_parametro_general_sg=1;
		$parametro_general_sgLogic=new parametro_general_sg_logic();
		
		$parametro_general_usuario=new parametro_general_usuario();
		$sDescripcionUsuarioSistema='';
		$sDescripcionPeriodoSistema='';
		$classes=array();
		$class=new Classe('');
		
		try {
			
			$usuarioLogicAdditional->getNewConnexionToDeep();
			
			$resumenUsuarioLogicAdditional->setConnexion($usuarioLogicAdditional->getConnexion());
			$parametro_general_sgLogic->setConnexion($usuarioLogicAdditional->getConnexion());
			$parametro_general_usuarioLogic->setConnexion($usuarioLogicAdditional->getConnexion());
			
			$usuario=$usuarioLogicAdditional->validarUsuario($this->strUsuario,$this->strPassword,false);			
			
			$parametro_general_sgLogic->getEntity($id_parametro_general_sg);
			
			if($usuario!=null && $usuario->getId()>0) {	
				//$blnstart=session_start();
									
				$parametro_general_usuarioLogic->setIsConDeep(true);					
				$parametro_general_usuarioLogic->getparametro_general_usuarioDataAccess()->isForFKDataRels=true;
					
				//$parametro_general_usuarioLogic->setDatosCliente($this->datosCliente);
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				
				$parametro_general_usuarioLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
				
				$parametro_general_usuarioLogic->getEntity($usuario->getId());
							
				$parametro_general_usuario=$parametro_general_usuarioLogic->getparametro_general_usuario();
				
				$sDescripcionUsuarioSistema.=''.$parametro_general_usuario->id_empresa_Descripcion;
				$sDescripcionUsuarioSistema.=' : '.$parametro_general_usuario->id_sucursal_Descripcion;
				$sDescripcionUsuarioSistema.=' --> '.$usuario->user_name;				
				$sDescripcionUsuarioSistema.=' --> '.$parametro_general_usuario->id_ejercicio_Descripcion;
				$sDescripcionUsuarioSistema.=' : '.$parametro_general_usuario->id_periodo_Descripcion;
				
				$sDescripcionPeriodoSistema.=''.$parametro_general_usuario->id_ejercicio_Descripcion;
				$sDescripcionPeriodoSistema.='-'.$parametro_general_usuario->id_periodo_Descripcion.'';
				
				$this->Session->write('usuarioActualDescripcion',$sDescripcionUsuarioSistema);
				$this->Session->write('periodoActualDescripcion',$sDescripcionPeriodoSistema);
				
				$resumen_usuario=$resumenUsuarioLogicAdditional->validarResumenUsuario($usuario,true,$esCerrarSesion);
			
				if($resumen_usuario->getnumero_ingreso_actual()<1) {
					
					if($esCerrarSesion) {
						$this->strAuxiliarCssMensaje=Constantes::$STR_MENSAJE_INFO;
						$this->strAuxiliarMensaje='CIERRE SESION CORRECTO';
					}
					
					if(Constantes::$BIT_ES_PRODUCCION) {
						$this->Session->activate();
					}
						
					//$this->Session->write('usuarioActual',serialize($usuario));
					//$this->Session->write('resumenUsuarioActual',serialize($resumen_usuario));
					
					//Tiene permiso el usuario para cierta pagina
					//$return=$sistemaLogicAdditional->tienePermisosEnPaginaWeb($usuario,Constantes::$BIG_ID_SISTEMA_ACTUAL,"MantenimientoPerfil.jsf");
					//echo('<script>alert("'.$return.'")</script>');
					
					//Permisos de un usuario para cierta pagina
					//$perfilOpcionUsuario=$sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($usuario,Constantes::$BIG_ID_SISTEMA_ACTUAL,"MantenimientoSistema.jsf");
					//echo('<script>alert("'.$perfilOpcionUsuario->getId().'")</script>');
					
					$lIdSistema=Constantes::$BIG_ID_SISTEMA_ACTUAL;;
					$opcionesUsuario=array();
					
					
					$this->strAuxiliarCssMensaje=Constantes::$STR_MENSAJE_INFO;				
					//$this->strAuxiliarMensaje='Usuario Valido-> Id='.$usuario->getId().', UserName='.$usuario->getField_strUserName().', No Opciones='.count($opcionesUsuario);
					//$this->strAuxiliarUrlPagina=Constantes::$STR_HTTP_INIT.Constantes::$STR_DNS_NAME_SERVER.':'.Constantes::$STR_PORT_SERVER.'/'.Constantes::$STR_CONTEXT_SERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/mains';
					
						
						
					if(!Constantes::$BIT_USA_MENU_MODULOS && !$esCerrarSesion) {
						$sistemaLogicAdditional->setConnexion($usuarioLogicAdditional->getConnexion());
						
						$opcionesUsuario=$sistemaLogicAdditional->getOpcionesUsuario($usuario,$lIdSistema,false);
		
						$this->strAuxiliarUrlPagina=Constantes::$STR_HTTP_INIT.Constantes::$STR_DNS_NAME_SERVER.':'.Constantes::$STR_PORT_SERVER.'/'.Constantes::$STR_CONTEXT_SERVER.'/'.str_replace('TOREPLACE','Main',Constantes::$STR_CARPETA_PAGINAS_JQUERY_TOREPLACE);
						
						$strNombrePaginaMenu='';
						
						foreach ($opcionesUsuario as $opcionLocal) {
							$strNombrePaginaMenu=$opcionLocal->getnombre_clase();
							
							$strNombrePaginaMenu=str_replace('Mantenimiento','',$strNombrePaginaMenu);
							$strNombrePaginaMenu=str_replace('.jsf','',$strNombrePaginaMenu);
							$strNombrePaginaMenu=str_replace('Final','',$strNombrePaginaMenu);
					
							//$opcionLocal->setField_strNombreClase(Funciones::getStrMenuController($opcionLocal->getField_strNombreClase()));
							
							$opcionLocal->setnombre_clase($strNombrePaginaMenu);
						}
						
						//echo count($opcionesUsuario);
						
					} else {
						//$temp=Constantes::$STR_CONTEXT_SERVER;
						$this->strAuxiliarUrlPagina=Constantes::$STR_HTTP_INIT.Constantes::$STR_DNS_NAME_SERVER.':'.Constantes::$STR_PORT_SERVER.'/'.Constantes::$STR_CONTEXT_SERVER.'/'.str_replace('TOREPLACE','MainModulo',Constantes::$STR_CARPETA_PAGINAS_JQUERY_TOREPLACE);
					}
					
					//$this->Session->write('opcionesUsuario',serialize($opcionesUsuario));
				
					//TEST SESSION
					//TEMPORAL-BLUEHOST
					/*
					echo 'SESSIONID:'.$this->Session->id().'<-->';
					pr($this->Session);
					
					$opcionesUsuario1=$this->Session->read('opcionesUsuario');
		
					$usuarioActual1=$this->Session->read('usuarioActual');
					
					echo count($opcionesUsuario1);
					
					if($usuarioActual1!=null) {	
						echo 'ID ACTUAL'.$usuarioActual1->getId();
					} else {
						echo 'USUARIO ACTUAL NULO';
					}
					*/
					//TEMPORAL-BLUEHOST
				} else {
					$usuario=new usuario();
					$usuario->setuser_name("ERROR, USUARIO YA EN SISTEMA, CIERRE SESION");
					
					//$this->Session->write('usuarioActual',serialize($usuario));
					
					//$opcionesUsuario=array();			
					//$this->Session->write('opcionesUsuario',serialize($opcionesUsuario));
				
					$this->strAuxiliarUrlPagina='';
					$this->strAuxiliarCssMensaje=Constantes::$STR_MENSAJE_ERROR;
					$this->strAuxiliarMensaje='Usuario YA INGRESADO, CIERRE SESION';	
				}
			} else {
				//$blnstart=session_start();
				
				$usuario=new usuario();
				$usuario->setuser_name("ERROR, USUARIO O CLAVE INCORRECTO");
				
				//$this->Session->write('usuarioActual',serialize($usuario));
				
				//$opcionesUsuario=array();			
				//$this->Session->write('opcionesUsuario',serialize($opcionesUsuario));
			
				$this->strAuxiliarUrlPagina='';
				$this->strAuxiliarCssMensaje=Constantes::$STR_MENSAJE_ERROR;
				$this->strAuxiliarMensaje='Usuario NO Valido';	
			}		
			
			$usuarioLogicAdditional->commitNewConnexionToDeep();
			$usuarioLogicAdditional->closeNewConnexionToDeep();
		
			$this->Session->write('usuarioActual',serialize($usuario));
			$this->Session->write('resumenUsuarioActual',serialize($resumen_usuario));
			$this->Session->write('opcionesUsuario',serialize($opcionesUsuario));
			
			
			if($parametro_general_sgLogic->getparametro_general_sg()!=null) {
				$this->Session->write('parametroGeneralSgActual',serialize($parametro_general_sgLogic->getparametro_general_sg()));
			}
			
			if($parametro_general_usuarioLogic->getparametro_general_usuario()!=null) {
				$this->Session->write('parametroGeneralUsuarioActual',serialize($parametro_general_usuarioLogic->getparametro_general_usuario()));
			}
			
			if($esCerrarSesion) {
				session_unset();				
				session_destroy();
			}

		}  catch(Exception $e) {
			$usuarioLogicAdditional->rollbackNewConnexionToDeep();
			$usuarioLogicAdditional->closeNewConnexionToDeep();
			throw $e;
		}
	}
	
	public function cerrarSesionGeneral() {
		
		//$this->strAuxiliarMensaje='ok='.$this->strUsuario;	
		$usuarioLogicAdditional=new usuario_logic_add();
		$resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		//$sistemaLogicAdditional=new sistema_logic_add();
		$opcionesUsuario=array();
		$usuario=new usuario();
		
		try {
			
			$usuarioLogicAdditional->getNewConnexionToDeep();
			
			$resumenUsuarioLogicAdditional->setConnexion($usuarioLogicAdditional->getConnexion());
							
			//$blnstart=session_start();
			
			if(Constantes::$BIT_ES_PRODUCCION) {
				$this->Session->activate();
			}
					
			$usuario=unserialize($this->Session->read('usuarioActual'));
			
			if($usuario!=null && $usuario->getId()>0) {				
				//$resumen_usuario=$resumenUsuarioLogicAdditional->validarResumenUsuario($usuario,true,true);
			
			} else {
				//$blnstart=session_start();
							
				$usuario->setuser_name("ERROR, SESION NO EXISTE");
							
			
				$this->strAuxiliarUrlPagina='';
				$this->strAuxiliarCssMensaje=Constantes::$STR_MENSAJE_ERROR;
				$this->strAuxiliarMensaje='Usuario No Valido';	
			}		
			
			$usuarioLogicAdditional->commitNewConnexionToDeep();
			$usuarioLogicAdditional->closeNewConnexionToDeep();
		
			$this->Session->write('usuarioActual',serialize($usuario));									
			$this->Session->write('opcionesUsuario',serialize($opcionesUsuario));
			
			session_unset();
			session_destroy();
			
		}  catch(Exception $e) {
			
			$usuarioLogicAdditional->rollbackNewConnexionToDeep();
			$usuarioLogicAdditional->closeNewConnexionToDeep();
			throw $e;
		}
	}
	
	public function cambiarClaveUsuario() {
	
		//$this->strAuxiliarMensaje='ok='.$this->strUsuario;
		$usuarioLogic=new usuario_logic();
		$usuarioActual=new usuario();
		//$usuario=new usuario();
		
		$clave='';
		$confirmar_clave='';
		
		$clave_final='';
		$confirmar_clave_final='';
		
		try {
				
			$usuarioLogic->getNewConnexionToDeep();
				
			//$blnstart=session_start();
				
			if(Constantes::$BIT_ES_PRODUCCION) {
				$this->Session->activate();
			}
				
			$usuarioActual=unserialize($this->Session->read('usuarioActual'));

			$usuarioLogic->getEntity($usuarioActual->getId());
			
			
			$clave=$this->data['form']['clave'];
			$confirmar_clave=$this->data['form']['confirmar_clave'];
			
			
			if($clave==$confirmar_clave && $clave!='') {
				
				$clave_final=Funciones::getSha1Encryption($clave);
				$confirmar_clave_final=Funciones::getSha1Encryption($confirmar_clave);
				
				$usuarioLogic->getUsuario()->setclave($clave_final);
				$usuarioLogic->getUsuario()->setconfirmar_clave($confirmar_clave_final);
				
				$usuarioLogic->save();
				
				$this->strAuxiliarMensaje='La Clave ha sido actualizada correctamente';
				
			} else {
				$this->strAuxiliarMensaje='ERROR:La Clave y la Confirmacion deben ser iguales';
			}
			
			/*
			if($usuario!=null && $usuario->getId()>0) {
				$resumen_usuario=$resumenUsuarioLogicAdditional->validarResumenUsuario($usuario,true,true);
					
			} else {
				//$blnstart=session_start();
					
				$usuarioActual->setuser_name("ERROR, SESION NO EXISTE");
					
					
				$this->strAuxiliarUrlPagina='';
				$this->strAuxiliarCssMensaje=Constantes::$STR_MENSAJE_ERROR;
				$this->strAuxiliarMensaje='Usuario No Valido';
			}
			*/	
			
			$usuarioLogic->commitNewConnexionToDeep();
			$usuarioLogic->closeNewConnexionToDeep();
	
			$this->Session->write('usuarioActual',serialize($usuarioActual));							
				
		}  catch(Exception $e) {
				
			$usuarioLogic->rollbackNewConnexionToDeep();
			$usuarioLogic->closeNewConnexionToDeep();
			throw $e;
		}
	}
	
	public function setstrUsuario(string $strUsuario) {
		$this->strUsuario = $strUsuario;
	}
	
	public function getstrUsuario():string {	
		return $this->strUsuario;
	}
	
	public function setstrPassword(string $strPassword) {
		$this->strPassword = $strPassword;
	}
	
	public function getstrPassword() :string{	
		return $this->strPassword;
	}
	
	public function setstrAuxiliarUrlPagina(string $strAuxiliarUrlPagina) {
		$this->strAuxiliarUrlPagina = $strAuxiliarUrlPagina;
	}
	
	public function getstrAuxiliarUrlPagina():string {	
		return $this->strAuxiliarUrlPagina;
	}		
	
	public function setstrAuxiliarMensaje(string $strAuxiliarMensaje) {
		$this->strAuxiliarMensaje = $strAuxiliarMensaje;
	}
	
	public function getstrAuxiliarMensaje():string {	
		return $this->strAuxiliarMensaje;
	}	
	
	public function setstrAuxiliarCssMensaje(string $strAuxiliarCssMensaje) {
		$this->strAuxiliarCssMensaje = $strAuxiliarCssMensaje;
	}
	
	public function getstrAuxiliarCssMensaje():string {	
		return $this->strAuxiliarCssMensaje;
	}
}
?>