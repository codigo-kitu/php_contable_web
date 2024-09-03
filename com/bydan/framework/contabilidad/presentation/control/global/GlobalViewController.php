<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\control\global;

use com\bydan\framework\contabilidad\util\Constantes;

class GlobalViewController {

	public static function EjecutarViewController($post) {
		
		/*
		$myfile = fopen("data_temp.txt", "a+") or die("Unable to open file!");
		fwrite($myfile, "\nhttp://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		fclose($myfile);
		*/

		$view = '';
		$modulo = '';
		$tabla = '';
		$sub_modulo = '';
		$modulo_general = 'general';
		
		if(isset($_GET['view'])) {
			$view = $_GET['view'];
		} else {
			$view = $_POST['view'];
		}
		
		if(array_key_exists('modulo',$_GET) && 
			isset($_GET['modulo'])) {

			$modulo = $_GET['modulo'];

		} else {
			if(array_key_exists('modulo',$_POST) && 
				isset($_POST['modulo'])) {

				$modulo = $_POST['modulo'];
			}
		}
		
		if($modulo==null || 
			$modulo=='') {

			$modulo = $modulo_general;
		}
		
			
		if(array_key_exists('sub_modulo',$_GET) && 
			isset($_GET['sub_modulo'])) {

			$sub_modulo = $_GET['sub_modulo'];

		} else {
			if(array_key_exists('sub_modulo',$_POST) && 
				isset($_POST['sub_modulo'])) {

				$sub_modulo = $_POST['sub_modulo'];
			}
		}
		
		if($sub_modulo!=null && 
			trim($sub_modulo)!='') {
			$sub_modulo = $sub_modulo.'/';
		}
		
		
		if($view=='Login' || 
			$view=='Main' || $view=='MainModulo' || 
			$view=='Report' || $view=='CargaLote' || 
			$view=='ArbolGeneral') {
			//require_once('com/bydan/contabilidad/general/presentation/view/'.$view.'View.php');

			include_once('com/bydan/framework/contabilidad/presentation/view/'.$view.'View.php');

		} else {

			$view_page='';
			
			if (strpos($view, '_add') !== false) {
				$view_page = str_replace("_add", Constantes::$STR_PREFIJO_VIEW."_add", $view);		
			} else {
				$view_page = $view.Constantes::$STR_PREFIJO_VIEW;
			}			

			$tabla = $view;
			$tabla = str_replace('_add','',$tabla);
			$tabla = str_replace('_form','',$view);

			if(strpos($_SERVER['REQUEST_URI'],'action=indexNuevoPrepararPaginaForm')!==false) {
				require_once('com/bydan/contabilidad/'.$modulo.'/'.$tabla.'/presentation/view/form/'.trim($sub_modulo).$view_page.'.php');		

			} else if(strpos($_SERVER['REQUEST_URI'],'action=indexSeleccionarActualPaginaForm')!==false) {
				require_once('com/bydan/contabilidad/'.$modulo.'/'.$tabla.'/presentation/view/form/'.trim($sub_modulo).$view_page.'.php');		
			
			} else {
				require_once('com/bydan/contabilidad/'.$modulo.'/'.$tabla.'/presentation/view/principal/'.trim($sub_modulo).$view_page.'.php');		
			}
		}
	}

	public static function ShowComments() {

		/*
			view=X&
			modulo=X&
			sub_modulo=X&
			action=X
		*/
		
		//view = Login,Main,MainModulo,Report,CargaLote,ArbolGeneral,_add,_form

		//action = *indexNuevoPrepararPaginaForm,*indexSeleccionarActualPaginaForm

		//========================== URLs Paginas Framework (Login / Menu) ================================		
		/*
		1) Login = http://localhost/contabilidad0/GlobalController.php?view=Login
		2) Main Modulo = http://localhost/contabilidad0/GlobalController.php?view=MainModulo&action=index&typeonload=onloadhijos
		3) Main = http://localhost/contabilidad0/GlobalController.php?view=Main&action=index&typeonload=onloadhijos
		*/

		//========================== URLs Paginas Aplicacion ================================		
		/*
		- Tipo Precio = http://localhost/contabilidad0/GlobalController.php?view=tipo_precio&id_opcion=310&modulo=inventario&sub_modulo=&strTypeOnLoadtipo_precio=onload&strTipoPaginaAuxiliartipo_precio=none&strTipoUsuarioAuxiliartipo_precio=none&ES_SUB_PAGINA=true&ES_POPUP=true
				Form  = http://localhost/contabilidad0/GlobalController.php?view=tipo_precio_form&modulo=inventario&sub_modulo=&action=indexNuevoPrepararPaginaForm&strTypeOnLoadtipo_precio_form=onloadhijos&strTipoPaginaAuxiliartipo_precio_form=none&strTipoUsuarioAuxiliartipo_precio_form=none&ES_POPUP=true&id_opcion=310

		- Tipo_Kardex = http://localhost/contabilidad0/GlobalController.php?view=tipo_kardex&id_opcion=242&modulo=inventario&sub_modulo=%20&strTypeOnLoadtipo_kardex=onload&strTipoPaginaAuxiliartipo_kardex=none&strTipoUsuarioAuxiliartipo_kardex=none&ES_SUB_PAGINA=true&ES_POPUP=true
		- Bodega = http://localhost/contabilidad0/GlobalController.php?view=bodega&id_opcion=243&modulo=inventario&sub_modulo=%20&strTypeOnLoadbodega=onload&strTipoPaginaAuxiliarbodega=none&strTipoUsuarioAuxiliarbodega=none&ES_SUB_PAGINA=true&ES_POPUP=true
		- Producto = http://localhost/contabilidad0/GlobalController.php?view=producto&id_opcion=248&modulo=inventario&sub_modulo=%20&strTypeOnLoadproducto=onload&strTipoPaginaAuxiliarproducto=none&strTipoUsuarioAuxiliarproducto=none&ES_SUB_PAGINA=true&ES_POPUP=true
		*/

		/*echo($_SERVER['REQUEST_URI']);*/
	}
}

?>