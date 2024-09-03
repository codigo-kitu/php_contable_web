<?php
	
   
	//PHP5.3-medical
    include_once('com/bydan/framework/contabilidad/util/Constantes.php');
	
    use com\bydan\framework\contabilidad\util\Constantes;    
    use com\bydan\framework\contabilidad\util\Funciones;
    use com\bydan\framework\contabilidad\presentation\web\dhtmlgoodies_tree;
    
	//BYDAN-PHP5.3 medical
	include_once('com/bydan/framework/contabilidad/util/Funciones.php');
	//PHP5.3-use com\bydan\framework\medical\util\Funciones;	
	
	include_once('com/bydan/framework/contabilidad/business/entity/GeneralEntity.php');
	
	//BYDAN-PHP5.3 medical
	include_once('com/bydan/framework/contabilidad/presentation/web/dhtmlgoodies_tree.php');
	//PHP5.3-use com\bydan\framework\medical\presentation\web\dhtmlgoodies_tree;		
		
	
	if(Constantes::$CON_SEGURIDAD) {
	    
    	//include_once('com/bydan/contabilidad/seguridad/usuario/business/entity/usuario_add.php');
    	include_once('com/bydan/contabilidad/seguridad/usuario/business/entity/usuario.php');
    	
    	//include_once('com/bydan/contabilidad/seguridad/opcion/business/entity/opcion_add.php');
    	include_once('com/bydan/contabilidad/seguridad/opcion/business/entity/opcion.php');
    	
    	//include_once('com/bydan/contabilidad/seguridad/grupo_opcion/business/entity/grupo_opcion_add.php');
    	include_once('com/bydan/contabilidad/seguridad/grupo_opcion/business/entity/grupo_opcion.php');
	}
	
	
	//$blnstart=session_start();
	
	if(Constantes::$BIT_ES_PRODUCCION) {
		//$this->Session->activate();	
	}		
	
	$opcionesUsuario=unserialize($_SESSION['opcionesUsuario']);
		
	$usuarioActual=unserialize($_SESSION['usuarioActual']);
	
	if($usuarioActual!=null) {
		echo('<b>USUARIO:'.$usuarioActual->getuser_name().'</b>');
	}
	//TEST SESSION
	/*
	echo count($opcionesUsuario);
	
	if($usuarioActual!=null) {	
		echo 'ID ACTUAL'.$usuarioActual->getId();
	} else {
		echo 'USUARIO ACTUAL NULO';
	}
	*/
	
	//VERSION 1
	//Funciones::getMenuUsuario($opcionesUsuario,$menu);
	
	//VERSION 2
	//Funciones::getMenuUsuario($opcionesUsuario,$cssMenu);
	
	//VERSION 3
	if(Constantes::$BIT_CON_ARBOL_MENU) {	
		$tree = new dhtmlgoodies_tree('webroot');			
			
		Funciones::getMenuUsuarioJQuery($opcionesUsuario,$tree,'webroot');
		
		$tree->writeCSS();
		//NO VALIDA JAVASCRIPT EN DIV->SE ESCRIBE EN CADA PAGINA AL FINAL
		//$tree->writeJavascript();		
		$tree->drawTree();
		
	} else {	
		//VERSION 4
		//MENU_JQUERY_2
		$tree=null;
		$menu_jquery=Funciones::getMenuUsuarioJQuery2($opcionesUsuario,$tree,'webroot');	
		echo(utf8_encode($menu_jquery));
		//MENU_JQUERY_2_FIN
	}
	
	/*
	 $menu=array('o1'=>'u1','o2'=>'u2','o3'=>array('p1'=>'http://www.google.com'));
	 echo $cssMenu->menu($menu,'left');
	*/
	
	//echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
	/*
	foreach ($data as $article) {
        $menu->add('articles', array($article['Article']['title'],array('action'=>'view', $article['Article']['id'])));
        
        foreach ($article['Page'] as $page) {
        $menu->add(array('articles', $article['Article']['id']), array( $page['Page']['title'], array('controller'=> 'pages','action' => 'view', $page['Page']['id'])));
        }
	} 
	*/
?>