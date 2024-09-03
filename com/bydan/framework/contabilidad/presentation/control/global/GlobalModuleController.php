<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\control\global;

use com\bydan\framework\contabilidad\presentation\control\ContabilidadGlobalController;
use com\bydan\framework\contabilidad\presentation\control\CuentasCobrarGlobalController;
use com\bydan\framework\contabilidad\presentation\control\CuentasPagarGlobalController;
use com\bydan\framework\contabilidad\presentation\control\CuentasCorrientesGlobalController;
use com\bydan\framework\contabilidad\presentation\control\EstimadosGlobalController;
use com\bydan\framework\contabilidad\presentation\control\FacturacionGlobalController;
use com\bydan\framework\contabilidad\presentation\control\GeneralGlobalController;
use com\bydan\framework\contabilidad\presentation\control\LoginController;
use com\bydan\framework\contabilidad\presentation\control\InventarioGlobalController;
use com\bydan\framework\contabilidad\presentation\control\SeguridadGlobalController;

class GlobalModuleController {

    public static function EjecutarModuleController($post) {

        $controller='';
        $modulo='';
        $sub_modulo='';
        $modulo_general='general';
                
        if(isset($_GET['controller'])) {
            $controller = $_GET['controller'];
            
        } else if(isset($_POST['controller'])) {
            $controller = $_POST['controller'];
        
        } else if(isset($post->{'controller'})) {
            $controller = $post->{'controller'};
        }
        
            
        if(array_key_exists('modulo',$_GET)  && 
            isset($_GET['modulo'])) {

            $modulo = $_GET['modulo'];
            
        } else if(array_key_exists('modulo',$_POST)  && 
                    isset($_POST['modulo'])) {
            
            $modulo=$_POST['modulo'];            
            
        } else  if(property_exists($post,'modulo')  && 
                    isset($post->{'modulo'})) {
            
            $modulo=$post->{'modulo'};            
        }
        

        if($modulo==null || $modulo=='') {
            $modulo = $modulo_general;
        }
            
            
        if(array_key_exists('sub_modulo',$_GET) && 
            isset($_GET['sub_modulo'])) {

            $sub_modulo=$_GET['sub_modulo'];
            
        } else if(array_key_exists('sub_modulo',$_POST) && 
                    isset($_POST['sub_modulo'])) {
            
            $sub_modulo = $_POST['sub_modulo'];                		
        
        } else  if(property_exists($post,'sub_modulo') && 
                    isset($post->{'sub_modulo'})) {

            $sub_modulo=$post->{'sub_modulo'};            
        }
            
        //xdebug_break();
        
        if($modulo=='contabilidad') {		
            //include_once('com/bydan/framework/contabilidad/presentation/control/ContabilidadGlobalController.php');		
            ContabilidadGlobalController::CargarEjecutarController($controller,$sub_modulo,$post);		
            
        } else if($modulo=='cuentascobrar') {
            CuentasCobrarGlobalController::CargarEjecutarController($controller,$sub_modulo,$post);
        
        } else if($modulo=='cuentaspagar') {		
            CuentasPagarGlobalController::CargarEjecutarController($controller,$sub_modulo,$post);
            
        } else if($modulo=='cuentascorrientes') {		
            CuentasCorrientesGlobalController::CargarEjecutarController($controller,$sub_modulo,$post);
            
        } else if($modulo=='estimados') {			
            EstimadosGlobalController::CargarEjecutarController($controller,$sub_modulo,$post);
            
        } else if($modulo=='facturacion') {
            FacturacionGlobalController::CargarEjecutarController($controller,$sub_modulo,$post);
            
        } else if($modulo=='general') {		
            
            if($controller=='Login') {
                //include_once('com/bydan/framework/contabilidad/presentation/control/LoginController.php');
                      
                $loginController=new LoginController();

                $loginController->inicializarParametrosQueryString($post);
                $loginController->ejecutarParametrosQueryString($post);
                
            } else {			
                GeneralGlobalController::CargarEjecutarController($controller,$sub_modulo,$post);
            }		

        } else if($modulo=='inventario') {		
            InventarioGlobalController::CargarEjecutarController($controller,$sub_modulo,$post);				
            
        } else if($modulo=='seguridad') {		
            SeguridadGlobalController::CargarEjecutarController($controller,$sub_modulo,$post);
        }
    }

    public static function ShowComments() {
        /*
            controller=X&
            modulo=X&
            sub_modulo=X&
            $post
        */

        //echo('CONTROLLER='.$controller);
        //require_once('com/bydan/general/presentation/controller/'.$controllerParaVisualizar.'Controller.php');      
    }
}

?>