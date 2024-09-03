<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\util;

//PHP5.3-use com\bydan\framework\medical\business\entity\Classe;
//PHP5.3-use com\bydan\framework\medical\business\entity\LogHtmlFormatter;

//use com\bydan\framework\contabilidad\business\entity\OrderBy;
//use reportico;

class FuncionesModulo {
    
    public static string $NAMESPACE_TEMPLATE_CUENTAS_COBRAR='com/bydan/contabilidad/cuentascorrientes/resources/templating/_html_template_.php';
    
    public static function CargarArchivosPaquetesModulo(string $paqueteTipo) {
        
        if($paqueteTipo==Modulo::$CUENTAS_CORRIENTES) {
            include_once('com/bydan/framework/contabilidad/business/entity/DatoGeneralCuentaCorriente.php');

        } else  if($paqueteTipo==Modulo::$CUENTAS_COBRAR) {
            include_once('com/bydan/framework/contabilidad/business/entity/DatoGeneralCuentaCobrar.php');
            
        } else  if($paqueteTipo==Modulo::$CUENTAS_PAGAR) {
            include_once('com/bydan/framework/contabilidad/business/entity/DatoGeneralCuentaPagar.php');
        
        } else  if($paqueteTipo==Modulo::$INVENTARIO) {
            include_once('com/bydan/framework/contabilidad/business/entity/DatoGeneralDetalleCompra.php');

            $estado_carga=Funciones::GetNamespaceLogic(Clase::$ESTADO, Modulo::$GENERAL,false);
            include_once($estado_carga);
            
            $estado_carga=Funciones::GetNamespaceLogic(Clase::$ESTADO, Modulo::$GENERAL,true);
		    include_once($estado_carga);
            
        } else  if($paqueteTipo==Modulo::$FACTURACION) {
            include_once('com/bydan/framework/contabilidad/business/entity/DatoGeneralDetalleFactura.php');
        
        } else  if($paqueteTipo==Modulo::$CONTABILIDAD) {
            include_once('com/bydan/framework/contabilidad/business/entity/DatoGeneralAsientoContable.php');
        }
    }
    
    public static function GetNamespaceTemplate(string $html_template,string $modulo):string {
        $namespace_html_template_table='';
        $text_replace='';
        
        switch ($modulo) {
            
            case 'contabilidad':
                $text_replace = FuncionesModulo::$NAMESPACE_TEMPLATE_CUENTAS_COBRAR;
                break;
                
            case 'cuentascobrar':
                $text_replace = FuncionesModulo::$NAMESPACE_TEMPLATE_CUENTAS_COBRAR;
                break;
                
            case 'cuentascorrientes':
                $text_replace = FuncionesModulo::$NAMESPACE_TEMPLATE_CUENTAS_COBRAR;
                break;
                
            case 'cuentaspagar':
                $text_replace = FuncionesModulo::$NAMESPACE_TEMPLATE_CUENTAS_COBRAR;
                break;
                
            case 'estimados':
                $text_replace = FuncionesModulo::$NAMESPACE_TEMPLATE_CUENTAS_COBRAR;
                break;
                
            case 'facturacion':
                $text_replace = FuncionesModulo::$NAMESPACE_TEMPLATE_CUENTAS_COBRAR;
                break;
                
            case 'general':
                $text_replace = FuncionesModulo::$NAMESPACE_TEMPLATE_CUENTAS_COBRAR;
                break;
                
            case 'inventario':
                $text_replace = FuncionesModulo::$NAMESPACE_TEMPLATE_CUENTAS_COBRAR;
                break;
                
            case 'seguridad':
                $text_replace = FuncionesModulo::$NAMESPACE_TEMPLATE_CUENTAS_COBRAR;
                break;
                
            default:
                $text_replace = 'ninguno';
        }
        
        $namespace_html_template_table=str_replace('_html_template_', $html_template, $text_replace);
        
        return $namespace_html_template_table;
    }	
}
?>