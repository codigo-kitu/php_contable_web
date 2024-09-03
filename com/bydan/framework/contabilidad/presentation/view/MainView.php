<?php declare(strict_types = 1);
namespace com\bydan\framework\contabilidad\presentation\view;
?>

<!DOCTYPE html>
 	<html>	
	<!-- <body id="outerBorder" pageTitle="Tipo Guia Remision Mantenimiento" markupType="html"> -->
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<?php
	/*
	 	<!-- <html> -->
	<!-- <body id="outerBorder" pageTitle="SISTEMA Mantenimiento" markupType="html"> -->
		<!-- <head> -->
			<!-- <meta http-equiv="Content-Type" content="text/html;charset=utf-8"> -->
	*/		
	use com\bydan\framework\contabilidad\util\Constantes;
	use com\bydan\framework\contabilidad\util\Funciones;
	use com\bydan\framework\contabilidad\util\PaqueteTipo;
	use com\bydan\framework\contabilidad\presentation\web\SessionBase;

	use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;

	use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
	use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
	
    include_once('com/bydan/framework/contabilidad/util/Constantes.php');
	//PHP5.3-use com/bydan/framework/contabilidad/util/Constantes;
		
	//PHP5.3-medical
	include_once('com/bydan/framework/contabilidad/util/Funciones.php');
	//PHP5.3-use com/bydan/framework/medical/util/Funciones;	

	include_once('com/bydan/framework/contabilidad/util/PaqueteTipo.php');
	//PHP5.3-use com/bydan/framework/contabilidad/util/PaqueteTipo;
	
	include_once('com/bydan/contabilidad/seguridad/usuario/util/usuario_carga.php');	
	include_once('com/bydan/contabilidad/seguridad/modulo/util/modulo_carga.php');
	
	//PHP5.3-use com/bydan/contabilidad/inventario/util/kardexConstantesCarga;
	
	usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
	
	usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
	
	modulo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
	
	//$blnstart=session_start();
	
	//$blnstart=session_start();
	
	
	Funciones::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
	
	$sessionBase=new SessionBase();
	$usuario=new usuario();
	$moduloActual=new modulo();
	
	if($sessionBase->read('usuarioActual')!=null) {
		$usuario=unserialize($sessionBase->read('usuarioActual'));
	}
	
	if($sessionBase->read('moduloActual')!=null) {
		$moduloActual=unserialize($sessionBase->read('moduloActual'));
	}
	
	$sDescripcionUsuarioSistema=$sessionBase->read('usuarioActualDescripcion');
	
?>

		<?php //include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/General/Constantes.js' ); ?>			
		<?php //include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/General/FuncionGeneral.js' ); ?>
		<?php //include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/General/FuncionGeneralJQuery.js' ); ?>			
		<?php //include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/Ajax/AjaxBasic.js'); ?>
		<?php //include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/Ajax/AjaxFuncionGeneral.js'); ?>

		<script type="module" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>JavaScript/Library/General/Constantes.js"></script>
		<script type="module" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>JavaScript/Library/General/FuncionGeneral.js"></script>
		<script type="module" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		<script type="module" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>JavaScript/Library/General/FuncionGeneralEventoJQuery.js"></script>
		<script type="module" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>JavaScript/Library/Ajax/AjaxBasic.js"></script>
		<script type="module" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>JavaScript/Library/Ajax/AjaxFuncionGeneral.js"></script>
				
		<?php //include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/Ajax/waiter.js'); ?>
		<?php //include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/Validacion/Validacion.js'); ?>
		
		<script type="text/javascript" src="webroot/js/JavaScript/Library/Ajax/waiter.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Validacion/Validacion.js"></script>
			
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/jquery-1.10.2.js"></script>

		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/pluggin/jquery.popupWindow.js"></script>								
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/pluggin/jquery.validate.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/pluggin/jstree3_0/jstree.js"></script>
		
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.tooltip.js"></script>
		
		
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.effect.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.mouse.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.draggable.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.position.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.menu.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.resizable.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.dialog.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.effect-blind.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.effect-explode.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.button.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.slider.js"></script>
				
		<link rel="stylesheet" type="text/css" href="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/themes/<?php echo(Constantes::$STR_THEME)?>/jquery.ui.theme.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/pluggin/jstree3_0/themes/default/style.css" type="text/css"/>
		
		<link rel="stylesheet" type="text/css" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/style.css" media="screen" />
		<link rel="stylesheet" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/jmaki-standard.css" type="text/css"/>
		
		<link rel="stylesheet" media="screen,projection" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/Background/main.css" type="text/css"/>		
		<link rel="stylesheet" media="print" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/Background/print.css" type="text/css"/>
		<link rel="stylesheet" media="aural" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/Background/aural.css" type="text/css"/>
		
		<!-- <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous"> -->
		
		<link rel="stylesheet" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>bootstrap5/bootstrap.min.css" type="text/css"/>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>bootstrap5/bootstrap.bundle.min.js"></script>
		
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script> -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->				
		
		<!-- <link rel="stylesheet" type="text/css" href="Css/style.css" media="screen" /> -->
		<!-- <link rel="stylesheet" href="Css/jmaki-standard.css" type="text/css"/> -->
		
		<!-- <link rel="stylesheet" media="screen,projection" href="Css/Background/main.css" type="text/css"/> -->		
		<!-- <link rel="stylesheet" media="print" href="Css/Background/print.css" type="text/css"/>	-->	
		<!-- <link rel="stylesheet" media="aural" href="Css/Background/aural.css" type="text/css"/> -->
		
		<!-- </head> -->
		
		<title>
			<?php echo($sDescripcionUsuarioSistema);?>
		</title>
	</head>
	<body>

	<div id="outerBorder">
		
		<div id="header">
		
			<div id="banner">
				<?php echo(Constantes::$STR_NOMBRE_SISTEMA.'-'.$moduloActual->nombre);?>
				</br>  
				<font style="font-size: 20px;">
					<b><?php echo($sDescripcionUsuarioSistema);?></b>
				</font>
			</div>
					
			<div id="subheader" class="links">    
			
						<div style="">
								<!-- <jsp:include page="/Component/header.jsp" /> -->
						</div>     
						
			</div> <!-- sub-header -->
			
			<div id="subheaderImagesLinks"> 
				<div id="subheaderImageTree" style="">    
					<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="<?php echo Constantes::$strPathBaseImagenToComplete ?>Imagenes/collapse.gif" width="20" height="20"  onclick="funcionGeneral.colapsar('../')"/>
				</div>	
				
			</div> 
					
		</div> <!-- header -->
				
		<div id="main">

			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider">
					</br><b><font style="font-size: 9px;"><?php echo($usuario->user_name) ; ?></font></b></br></br>
				</div>
			</div>	
			
			<div id="leftSidebar" class="left" style="">						
				<?php include 'webroot/Component/treeforjquery.php' ; ?>
			</div> <!-- leftSidebar -->
	
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div>
			
			<div id="content" style="">
				<div id="divMensaje"></div>

 	<!-- </head> -->
	
	<A name="ControlesSecciones"></A>
	<table width="100%"  align="center" class="super">
		
	<tr class="navegacion">
		<td>
			<form name="frmExpandirColapsar">

				<table width="100%"  border="0">
					<tr align="left" style="width: 505px">
						<td align="left">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="<?php echo Constantes::$strPathBaseImagenToComplete ?>Imagenes/collapse.gif" width="20" height="20"  onclick="funcionGeneral.colapsar('../')"/>
							<img id="imgCerrarSesion" align="left" style="visibility:visible" src="<?php echo Constantes::$strPathBaseImagenToComplete ?>Imagenes/cerrar_sesion.gif" title="CERRAR SESION" width="25" height="25"/>
						</td>
		
						<td align="left" style="width: 258px">
							<img align="left" id="imgEstadoProceso" style="visibility:hidden; width: 16px; height: 16px" src="<?php echo Constantes::$strPathBaseImagenToComplete ?>Imagenes/wait2.gif" width="32" height="32" />
						</td>
	
						<td align="center" style="width: 98px">
							<a name="ControlesSecciones" ></a>
						</td>
					</tr>

				</table>
			</form>
		</td>
	</tr> 
		
<tr><td colspan="3">

<form id="frmMain">
<div id="divMainAjaxWebPart">	
	<table align="center" border="0">	
		<tr>
			<td align="center" colspan="4">	
				<b><?php echo($sDescripcionUsuarioSistema);?></b>			
			</td>
		</tr>
		<tr>		
			<td align="center">
				<font style="font-size: 13px;">
						<b><?php echo($usuario->user_name.':');?></b>
				</font>
			</td>		
			<td align="center">
				<input id="solo_menu" name="solo_menu" type="checkbox" class="form-check-input" checked>SOLO MENU</input>
			</td>
			<td align="center">
				<input id="con_expandir" name="con_expandir" type="checkbox" class="form-check-input">CON EXPANDIR</input>
			</td>
			<td align="center">
				<input id="con_pagina_nueva" name="con_pagina_nueva" type="checkbox" class="form-check-input" checked>CON NUEVA PAGINA</input>
			</td>
		</tr>
		<tr>
			<td align="center"colspan="4">
				<input type="button" id="btnCargarMapa" name="btnCargarMapa" class="btn btn-success" value="CARGAR MAPA SITIO" title="Haga Click Aqui"/>				
			</td>
		</tr>
	</table>
</div>
</form>
<span><b><?php echo($moduloActual->nombre.':');?></b></span>
<div id="divMapaAjaxWebPart">
</div>

<?php
//TEST SESSION
/*
if(Constantes::$BITESPRODUCCION) {
	$this->Session->activate();	
}

$opcionesUsuario1=$this->Session->read('opcionesUsuario');

	$usuarioActual1=$this->Session->read('usuarioActual');
	
	echo count($opcionesUsuario1);
	
	if($usuarioActual1!=null) {	
		echo 'ID ACTUAL'.$usuarioActual1->getId();
	} else {
		echo 'USUARIO ACTUAL NULO';
	}
*/
?>
<form>
<div id="divMensajes">
	<span class=""></span>
	<input id="Mensaje-hdnAuxiliarUrlPagina" name="Mensaje-hdnAuxiliarUrlPagina" type="hidden">
	<input id="Mensaje-hdnAuxiliarTipo" name="Mensaje-hdnAuxiliarTipo" type="hidden">	
</div>
</form>

</td></tr>

<tr><td colspan="3">		

<script type="text/javascript">
/*
 <a href="#" onclick="efectuar();">SlideDown Now!</a>
<div id="div1">
  
  Click here if you want this to go slooooow.
</div>
 */
//onclick="efectuar()"
/*
new Draggable("div1");
function efectuar() {
	//Effect.Puff("div1");
	//$('div1').appear();
	//$('div1).fade();
	Dialog.alert("Close the window 'Test' before opening it again!",{width:200, height:130}); 
	var win = new Window({className: "dialog", width:350, height:400, zIndex: 100, resizable: true, title: "Sample window", showEffect:Effect.BlindDown, hideEffect: Effect.SwitchOff, draggable:true, wiredDrag: true}); 
	win.getContent().innerHTML= "<div style='padding:10px'> Lorem ipsum dolor sit amet, consectetur adipiscing elit, set eiusmod tempor incidunt et labore et dolore magna aliquam. Ut enim ad minim veniam, quis nostrud exerc. Irure dolor in reprehend incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse molestaie cillum. Tia non ob ea soluad incom dereud facilis est er expedit distinct. Nam liber te conscient to factor tum poen legum odioque civiuda et tam. \ At vver eos et accusam dignissum qui blandit est praesent. Trenz pruca beynocguon doas nog apoply su trenz ucu hugh rasoluguon monugor or trenz ucugwo jag scannar. Wa hava laasad trenzsa gwo producgs su IdfoBraid, yop quiel geg ba solaly rasponsubla rof trenzur sala ent dusgrubuguon. Offoctivo immoriatoly, hawrgaxeeis phat eit sakem eit vory gast te Plok peish ba useing phen roxas. Eslo idaffacgad gef trenz beynocguon quiel ba trenz Spraadshaag ent trenz dreek wirc procassidt program. Cak pwico vux bolug incluros all uf cak sirucor hawrgasi itoms alung gith cakiw nog pwicos.\ Lor sum amet, commy nulputat. Duipit lum ipisl eros dolortionsed tin hent aliquis illam volor in ea feum in ut adipsustrud elent ulluptat. Duisl ullan ex et am vulputem augiam doloreet amet enibh eui te dipit acillutat acilis amet, suscil er iuscilla con utat, quisis eu feugait ad dolore commy nullam iuscilisl iureril ilisl del ut pratuer iliquis acipissit accum quis nulluptat. Dui bla faccumsan velis auguero con henis duismolor sumsandrem quat vulluptat alit er iniamcore exeriure vero core te dit ut nulla feummolore commod dipis augiamcommod tem ese dolestrud do odo odiamco eetummy nis aliquamcommy nonse eu feugue del eugiamconsed ming estrud magnis exero eumsandio enisim del dio od tat.sumsan et pratum velit ing etue te consequis alis nullan et, quis am iusci bla feummy.</div>";
	win.setStatusBar("Status bar info"); 
	win.showCenter(); 
}
*/

function onLoad() {
	//new Draggable("leftSidebar");

	//CARGAR MENU DE ARBOL
	/*		
	if(constantes.CON_ARBOL_MENU==false) {
		jQuery("#menu_principal").menu();
		jQuery("#menu_principal").menu( "option", "position", { my: "left top", at: "right-130 top+20" } );
	
	} else if(constantes.STR_JQUERY_VERSION=='1.8.16') {
		initTree();
	}
	*/
}

window.onload = onLoad; 
</script>


</td></tr>		
	</table>

	</div> <!-- content -->    
		
    	</div> <!-- main -->
	
 	</div> <!-- outerborder -->		
	
<!-- <div name="footer"> -->
    <!-- <jsp:include page="/Component/footer.jsp" /> -->
<!-- </div> -->
<!-- </body> -->

<!-- </html> -->

<?php
	//include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/General/MainJQuery.js');
	
 	/* 	 
	if(Constantes::$BIT_CON_ARBOL_MENU) { 
		$tree->writeJavascript(); 
	}
	*/
?>

<script type="module" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>JavaScript/Library/General/MainJQuery.js"></script>

</body>
</html>