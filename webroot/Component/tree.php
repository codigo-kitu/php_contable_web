<?php 
	
	//PHP5.3-medical
    include_once('com/bydan/framework/contabilidad/util/Constantes.php');
	
    use com\bydan\framework\contabilidad\util\Constantes;
    use com\bydan\framework\contabilidad\util\Funciones;
    use com\bydan\framework\contabilidad\presentation\web\dhtmlgoodies_tree;
    
	//BYDAN-PHP5.3 medical
	include_once('com/bydan/framework/contabilidad/util/Funciones.php');
	//PHP5.3-use com\bydan\framework\medical\util\Funciones;	
	
	//BYDAN-PHP5.3 medical
	include_once('com/bydan/framework/contabilidad/presentation/web/dhtmlgoodies_tree.class.php');
	//PHP5.3-use com\bydan\framework\medical\presentation\web\dhtmlgoodies_tree;
	
	if(Constantes::$BITESPRODUCCION) {
		$this->Session->activate();	
	}
	
	
	$opcionesUsuario=unserialize($this->Session->read('opcionesUsuario'));
		
	$usuarioActual=unserialize($this->Session->read('usuarioActual'));
	
	echo('<b>USUARIO:'.$usuarioActual->getuser_name().'</b>');
	
	//TEST SESSION
	
	//echo '<br>OPCIONES:'.count($opcionesUsuario);
	/*
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
	$tree = new dhtmlgoodies_tree($this->webroot);
	
	Funciones::getMenuUsuario($opcionesUsuario,$tree,$this->webroot);
	
	$tree->writeCSS();
	//NO VALIDA JAVASCRIPT EN DIV->SE ESCRIBE EN CADA PAGINA AL FINAL
	//$tree->writeJavascript();		
	$tree->drawTree();
		
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
