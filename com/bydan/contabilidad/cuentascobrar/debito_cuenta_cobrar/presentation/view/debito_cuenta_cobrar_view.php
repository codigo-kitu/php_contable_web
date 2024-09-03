<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Debito Cuenta Cobrar Mantenimiento" markupType="html"> -->
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

	
<?php

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

	include_once('com/bydan/framework/contabilidad/util/Constantes.php');
	use com\bydan\framework\contabilidad\util\Constantes;
	
	//include_once('com/bydan/framework/contabilidad/util/Funciones.php');
	//use com\bydan\framework\contabilidad\util\Funciones;
	
	include_once('com/bydan/framework/contabilidad/util/PaqueteTipo.php');
	use com\bydan\framework\contabilidad\util\PaqueteTipo;
	
	include_once('com/bydan/contabilidad/cuentascobrar/debito_cuenta_cobrar/util/debito_cuenta_cobrar_carga.php');
	use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_carga;
	
	//include_once('com/bydan/contabilidad/cuentascobrar/debito_cuenta_cobrar/presentation/view/debito_cuenta_cobrar_web.php');
	//use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\presentation\view\debito_cuenta_cobrar_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	debito_cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	debito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$debito_cuenta_cobrar_web1= new debito_cuenta_cobrar_web();	
	$debito_cuenta_cobrar_web1->cargarDatosGenerales();
	
	//$moduloActual=$debito_cuenta_cobrar_web1->moduloActual;
	//$usuarioActual=$debito_cuenta_cobrar_web1->usuarioActual;
	//$sessionBase=$debito_cuenta_cobrar_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$debito_cuenta_cobrar_web1->parametroGeneralUsuarioActual;
	
	
		
	//$STR_SUFIJO_ESTILO_LETRA_USUARIO=Funciones::getParametroEstiloTipoLetraUsuario($parametroGeneralUsuarioActual);
?>
		
		
	
		
		<script type="module" src="webroot/js/JavaScript/Library/General/Constantes.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Entity/GeneralEntityConstante.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Entity/GeneralEntityFuncion.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Entity/GeneralEntityWebControl.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneral.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralEventoJQuery.js"></script>		
		
		<!-- El Templating SOLO funciona con include desde Php -->
		<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/Library/Presentation/Templating/OrderByTemplate.js' ); ?>				
		<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/Library/Presentation/Templating/OrderByRelTemplate.js' ); ?>
		
		<script type="text/javascript" src="webroot/js/JavaScript/Library/Ajax/waiter.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Validacion/Validacion.js"></script>
		
		
			
			<!-- El Templating SOLO funciona con include desde Php -->
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/debito_cuenta_cobrar/js/templating/debito_cuenta_cobrar_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/debito_cuenta_cobrar/js/templating/debito_cuenta_cobrar_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/debito_cuenta_cobrar/js/templating/debito_cuenta_cobrar_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascobrar/debito_cuenta_cobrar/js/templating/debito_cuenta_cobrar_datos_reporte_template.js'); ?>
		
			
						
		
		
		<?php 
			
		
			debito_cuenta_cobrar_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					debito_cuenta_cobrar_web::$GET_POST=$_GET;
				} else {
					debito_cuenta_cobrar_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			debito_cuenta_cobrar_web::$STR_NOMBRE_PAGINA = 'debito_cuenta_cobrar_view.php';
			debito_cuenta_cobrar_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			debito_cuenta_cobrar_web::$BIT_ES_PAGINA_FORM = 'false';
				
			debito_cuenta_cobrar_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {debito_cuenta_cobrar_constante,debito_cuenta_cobrar_constante1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/debito_cuenta_cobrar/js/util/debito_cuenta_cobrar_constante.js?random=1';
			import {debito_cuenta_cobrar_funcion,debito_cuenta_cobrar_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/debito_cuenta_cobrar/js/util/debito_cuenta_cobrar_funcion.js?random=1';
			
			let debito_cuenta_cobrar_constante2 = new debito_cuenta_cobrar_constante();
			
			debito_cuenta_cobrar_constante2.STR_NOMBRE_PAGINA="<?php echo(debito_cuenta_cobrar_web::$STR_NOMBRE_PAGINA); ?>";
			debito_cuenta_cobrar_constante2.STR_TYPE_ON_LOADdebito_cuenta_cobrar="<?php echo(debito_cuenta_cobrar_web::$STR_TYPE_ONLOAD); ?>";
			debito_cuenta_cobrar_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(debito_cuenta_cobrar_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			debito_cuenta_cobrar_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(debito_cuenta_cobrar_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			debito_cuenta_cobrar_constante2.STR_ACTION="<?php echo(debito_cuenta_cobrar_web::$STR_ACTION); ?>";
			debito_cuenta_cobrar_constante2.STR_ES_POPUP="<?php echo(debito_cuenta_cobrar_web::$STR_ES_POPUP); ?>";
			debito_cuenta_cobrar_constante2.STR_ES_BUSQUEDA="<?php echo(debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA); ?>";
			debito_cuenta_cobrar_constante2.STR_FUNCION_JS="<?php echo(debito_cuenta_cobrar_web::$STR_FUNCION_JS); ?>";
			debito_cuenta_cobrar_constante2.BIG_ID_ACTUAL="<?php echo(debito_cuenta_cobrar_web::$BIG_ID_ACTUAL); ?>";
			debito_cuenta_cobrar_constante2.BIG_ID_OPCION="<?php echo(debito_cuenta_cobrar_web::$BIG_ID_OPCION); ?>";
			debito_cuenta_cobrar_constante2.STR_OBJETO_JS="<?php echo(debito_cuenta_cobrar_web::$STR_OBJETO_JS); ?>";
			debito_cuenta_cobrar_constante2.STR_ES_RELACIONES="<?php echo(debito_cuenta_cobrar_web::$STR_ES_RELACIONES); ?>";
			debito_cuenta_cobrar_constante2.STR_ES_RELACIONADO="<?php echo(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO); ?>";
			debito_cuenta_cobrar_constante2.STR_ES_SUB_PAGINA="<?php echo(debito_cuenta_cobrar_web::$STR_ES_SUB_PAGINA); ?>";
			debito_cuenta_cobrar_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(debito_cuenta_cobrar_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			debito_cuenta_cobrar_constante2.BIT_ES_PAGINA_FORM=<?php echo(debito_cuenta_cobrar_web::$BIT_ES_PAGINA_FORM); ?>;
			debito_cuenta_cobrar_constante2.STR_SUFIJO="<?php echo(debito_cuenta_cobrar_web::$STR_SUF); ?>";//debito_cuenta_cobrar
			debito_cuenta_cobrar_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(debito_cuenta_cobrar_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//debito_cuenta_cobrar
			
			debito_cuenta_cobrar_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(debito_cuenta_cobrar_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			debito_cuenta_cobrar_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($debito_cuenta_cobrar_web1->moduloActual->getnombre()); ?>";
			debito_cuenta_cobrar_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(debito_cuenta_cobrar_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			debito_cuenta_cobrar_constante2.BIT_ES_LOAD_NORMAL=true;
			/*debito_cuenta_cobrar_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			debito_cuenta_cobrar_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.debito_cuenta_cobrar_constante2 = debito_cuenta_cobrar_constante2;
			
		</script>
		
		<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
		<script type="text/javascript" src="webroot/js/handlebars-4.7.6/handlebars.min.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/jquery-1.10.2.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.form.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.popupWindow.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.validate.js"></script>		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.datetimepicker.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jquery.uploadfile.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/select2.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/pluggin/jstree3_0/jstree.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.datepicker.js"></script>
		
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.effect.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.tabs.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.mouse.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.draggable.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.position.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.slider.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.menu.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.autocomplete.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.resizable.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.dialog.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.effect-blind.js"></script>
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.effect-explode.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.button.js"></script>
		
		<script type="text/javascript" src="webroot/js/jquery-ui-1.10.4/ui/jquery.ui.tooltip.js"></script>
		
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/themes/<?php echo(Constantes::$STR_THEME);?>/jquery-ui.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/themes/<?php echo(Constantes::$STR_THEME);?>/jquery.ui.theme.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/jquery.datetimepicker.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/uploadfile.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/select2.css" type="text/css"/>		
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/css/jquery.dataTables.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/DataTables-1.10.0/media/css/dataTables.jqueryui.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="webroot/js/jquery-ui-1.10.4/pluggin/jstree3_0/themes/default/style.css" type="text/css"/>
		
		<script type="text/javascript">
		</script>
		
		
		
		
		<?php if(!Constantes::$BIT_CON_CSS_PHP) {?>
		
		<link rel="stylesheet" type="text/css" href="webroot/scss/pagina.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="webroot/scss/general.css" media="screen" />		
		
		
		<link rel="stylesheet" href="webroot/css/bootstrap5/bootstrap.min.css" type="text/css"/>
		<script type="text/javascript" src="webroot/js/bootstrap5/bootstrap.bundle.min.js"></script>

		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script> -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->	
		
		<?php } else { /*NO ES USADO, TALVEZ SE DEJA*/ ?>
		
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_layout.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_shared.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.debito_cuenta_cobrar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.debito_cuenta_cobrar_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="debito_cuenta_cobrarActual" ></a>
	
	<div id="divResumendebito_cuenta_cobrarActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
		
		<div id="header" >
		
			<div id="banner">
				<span id="spanTituloBanner" class="titulobanner"></span>
			</div> <!-- banner -->
					
			<div id="subheader" class="links">  
			
						<div id="divOpcionesBanner" >
								<!-- <jsp:include page="/Component/header.jsp" /> -->
						</div>						
						
			</div> <!-- sub-header -->
			
			
		</div> <!-- header -->
		
		<?php } ?>
		
		<div id="main">
		

			<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' && debito_cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && debito_cuenta_cobrar_web::$STR_ES_POPUP=='false' && debito_cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='false') {?>
						<td align="left" style="width: 3%">
							<img id="imgIrMain" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/ir_main.gif" title="IR A ARBOL DE OPCIONES PRINCIPAL" width="25" height="25"  onclick="funcionGeneral.irWindowAuxiliar('MENU PRINCIPAL','view=Main&action=index&typeonload=onloadhijos')"/>
						</td>
						<td align="left" style="width: 3%">
							<img id="imgCerrarSesion" style="visibility:visible;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar_sesion.gif" title="CERRAR SESION" width="25" height="25"/>
						</td>
						<?php }?>
						<td id="tdToolBar" align="left" style="width: 70%">
							<!-- SECCION/TOOLBAR -->
							<table id="tblToolBar">
								<tr>
									<td id="tddebito_cuenta_cobrarNuevoToolBar">
										<img id="imgNuevoToolBardebito_cuenta_cobrar" name="imgNuevoToolBardebito_cuenta_cobrar" title="Nuevo Debito Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' && debito_cuenta_cobrar_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tddebito_cuenta_cobrarNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBardebito_cuenta_cobrar" name="imgNuevoGuardarCambiosToolBardebito_cuenta_cobrar" title="Nuevo TABLA Debito Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddebito_cuenta_cobrarGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBardebito_cuenta_cobrar" name="imgGuardarCambiosToolBardebito_cuenta_cobrar" title="Guardar Debito Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && debito_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' && debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tddebito_cuenta_cobrarCopiarToolBar">
										<img id="imgCopiarToolBardebito_cuenta_cobrar" name="imgCopiarToolBardebito_cuenta_cobrar" title="Copiar Debito Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tddebito_cuenta_cobrarDuplicarToolBar">
										<img id="imgDuplicarToolBardebito_cuenta_cobrar" name="imgDuplicarToolBardebito_cuenta_cobrar" title="Duplicar Debito Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tddebito_cuenta_cobrarRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBardebito_cuenta_cobrar" name="imgRecargarInformacionToolBardebito_cuenta_cobrar" title="Recargar Debito Cuenta Cobrar" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tddebito_cuenta_cobrarAnterioresToolBar">
										<img id="imgAnterioresToolBardebito_cuenta_cobrar" name="imgAnterioresToolBardebito_cuenta_cobrar" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tddebito_cuenta_cobrarSiguientesToolBar">
										<img id="imgSiguientesToolBardebito_cuenta_cobrar" name="imgSiguientesToolBardebito_cuenta_cobrar" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tddebito_cuenta_cobrarAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBardebito_cuenta_cobrar" name="imgAbrirOrderByToolBardebito_cuenta_cobrar" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && debito_cuenta_cobrar_web::$STR_ES_RELACIONES=='false') || debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='true'  || debito_cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tddebito_cuenta_cobrarCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBardebito_cuenta_cobrar" name="imgCerrarPaginaToolBardebito_cuenta_cobrar" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
									</td>
									<?php } ?>
								</tr>
							</table> <!-- tblToolBar -->
						</td> <!-- tdToolBar -->
						<td id="tdControlesSecciones" align="center" style="width: 20%">
							<a id="ControlesSecciones" ></a>

							<img id="imgAreaBusquedas" align="right" style="visibility:hidden" src="/contabilidad0/webroot/img/Imagenes/busqueda.gif" width="20" height="20"  onclick="funcionGeneral.irAreaDePagina('Busquedas')"/>
							<img id="imgAreaControles" align="right" style="visibility:hidden" src="/contabilidad0/webroot/img/Imagenes/controles.gif" width="20" height="20"  onclick="funcionGeneral.irAreaDePagina('Campos')"/>
							<img id="imgAreaAcciones" align="right" style="visibility:hidden" src="/contabilidad0/webroot/img/Imagenes/acciones.gif" width="20" height="20"  onclick="funcionGeneral.irAreaDePagina('Acciones')"/>
							<img id="imgAtras" align="right" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/atras.gif" width="20" height="20"  onclick="history.back()"/>
						</td> <!-- tdControlesSecciones -->
					</tr> <!-- trExpandirColapsar -->
				</table> <!-- tblExpandirColapsar -->
			</form> <!-- frmExpandirColapsar -->
		</td>
	</tr> <!-- trNavegacion/super -->
	<?php } ?> 
	
		
		<tr id="trdebito_cuenta_cobrarCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedadebito_cuenta_cobrar" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedadebito_cuenta_cobrar',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trdebito_cuenta_cobrarCabeceraBusquedas/super -->

		<tr id="trBusquedadebito_cuenta_cobrar" class="busqueda" style="display:table-row">
			<td id="tdBusquedadebito_cuenta_cobrar" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedadebito_cuenta_cobrar" name="frmBusquedadebito_cuenta_cobrar">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedadebito_cuenta_cobrar" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trdebito_cuenta_cobrarBusquedas" class="busqueda" style="display:table-row"><td>
				<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
					<ul>
						<li id="listrVisibleFK_Idcuenta_cobrar" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idcuenta_cobrar"> Por  Cuenta Cobrar</a></li>
						<li id="listrVisibleFK_Idestado" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idestado"> Por  Estado</a></li>
						<li id="listrVisibleFK_Idtermino_pago_cliente" class="titulotab" style="display:table-row"><a href="#divstrVisibleFK_Idtermino_pago_cliente"> Por  Termino Pago Cliente</a></li>
					</ul>
				
					<div id="divstrVisibleFK_Idcuenta_cobrar">
					<table id="tblstrVisibleFK_Idcuenta_cobrar" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Cuenta Cobrar</span>
						</td>
						<td align="center">
							<select id="FK_Idcuenta_cobrar-cmbid_cuenta_cobrar" name="FK_Idcuenta_cobrar-cmbid_cuenta_cobrar" title=" Cuenta Cobrar" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardebito_cuenta_cobrarFK_Idcuenta_cobrar" name="btnBuscardebito_cuenta_cobrarFK_Idcuenta_cobrar" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idestado">
					<table id="tblstrVisibleFK_Idestado" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Estado</span>
						</td>
						<td align="center">
							<select id="FK_Idestado-cmbid_estado" name="FK_Idestado-cmbid_estado" title=" Estado" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardebito_cuenta_cobrarFK_Idestado" name="btnBuscardebito_cuenta_cobrarFK_Idestado" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
					<div id="divstrVisibleFK_Idtermino_pago_cliente">
					<table id="tblstrVisibleFK_Idtermino_pago_cliente" class="busqueda">
					
						<tr>
						<td><span  class="busquedatitulocampo"> Termino Pago Cliente</span>
						</td>
						<td align="center">
							<select id="FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente" name="FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente" title=" Termino Pago Cliente" ></select>
						</td>
						
						</tr>
						<tr>
						<td></td>
						<td align="center" >
							<input type="button" id="btnBuscardebito_cuenta_cobrarFK_Idtermino_pago_cliente" name="btnBuscardebito_cuenta_cobrarFK_Idtermino_pago_cliente" title="BUSCAR" value="Buscar" class="btn btn-primary"/>
						</td>
						</tr>
					

					</table>
					</div>
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscardebito_cuenta_cobrar" style="display:table-row">
					<td id="tdParamsBuscardebito_cuenta_cobrar">
		<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscardebito_cuenta_cobrar">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosdebito_cuenta_cobrar" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosdebito_cuenta_cobrar"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosdebito_cuenta_cobrar" name="ParamsBuscar-txtNumeroRegistrosdebito_cuenta_cobrar" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformaciondebito_cuenta_cobrar">
							<td id="tdGenerarReportedebito_cuenta_cobrar" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosdebito_cuenta_cobrar" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosdebito_cuenta_cobrar" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformaciondebito_cuenta_cobrar" name="btnRecargarInformaciondebito_cuenta_cobrar" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
										</td>
										<td>
											<select id="ParamsBuscar-cmbPaginacion" name="ParamsBuscar-cmbPaginacion" title="TIPOS DE PAGINACION" style="width:100px"></select>
											<input id="ParamsBuscar-chbConPaginacionInterna" name="ParamsBuscar-chbConPaginacionInterna" title="CON PAGINACION INTERNA" type="checkbox"></input>
										</td>
										<td>
											<label>
												<input id="ParamsBuscar-chbConAltoMaximoTabla" name="ParamsBuscar-chbConAltoMaximoTabla" title="CON ALTO MAXIMO DE TABLA" type="checkbox" checked></input>Alt Max.
											</label>
										</td>							
										<td>							
											<select id="ParamsBuscar-cmbGenerarReporte" name="ParamsBuscar-cmbGenerarReporte" title="TIPOS IMPRESION DE REPORTES" style="width:100px"></select>							
											<input id="ParamsBuscar-chbConReportico" name="ParamsBuscar-chbConReportico" title="CON REPORTICO" type="checkbox">							
										</td>							
										<td>							
											<select id="ParamsBuscar-cmbTiposReporte" name="ParamsBuscar-cmbTiposReporte" title="TIPOS DE REPORTES" style="width:100px"></select>							
										</td>							
										<td>							
											<input type="button" id="btnImprimirPaginadebito_cuenta_cobrar" name="btnImprimirPaginadebito_cuenta_cobrar" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false'  &&*/ debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBydebito_cuenta_cobrar">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBydebito_cuenta_cobrar" name="btnOrderBydebito_cuenta_cobrar" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
												</tr>
											</table>
										</td>
										<td>
											<select id="ParamsBuscar-cmbTiposColumnasSelect" name="ParamsBuscar-cmbTiposColumnasSelect" title="TIPOS DE COLUMNAS DE TABLA" style="width:125px"></select>
											<label>
												<input id="ParamsBuscar-chbParaActualizarFk" name="ParamsBuscar-chbParaActualizarFk" title="ABRIR VENTANA ACTUALIZAR DATOS RELACIONADOS" type="checkbox">
											</label>
										</td>
										<td>
											<label>
												<input id="ParamsBuscar-chbSelTodos" name="ParamsBuscar-chbSelTodos" title="SELECCIONAR TODOS LOS REGISTROS" type="checkbox">Sel.Todos
											</label>
										</td>

										<?php if(debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tddebito_cuenta_cobrarConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosdebito_cuenta_cobrar -->

							</td><!-- tdGenerarReportedebito_cuenta_cobrar -->
						</tr><!-- trRecargarInformaciondebito_cuenta_cobrar -->
					</table><!-- tblParamsBuscarNumeroRegistrosdebito_cuenta_cobrar -->
				</div> <!-- divParamsBuscardebito_cuenta_cobrar -->
		<?php } ?>
				</td> <!-- tdParamsBuscardebito_cuenta_cobrar -->
				</tr><!-- trParamsBuscardebito_cuenta_cobrar -->
				</table> <!-- tblBusquedadebito_cuenta_cobrar -->
				</form> <!-- frmBusquedadebito_cuenta_cobrar -->
				

			</td> <!-- tdBusquedadebito_cuenta_cobrar -->
		</tr> <!-- trBusquedadebito_cuenta_cobrar/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>

		<!-- SECCION/MENSAJE -->
		<div id="divMensajePage" class="ui-state-highlight ui-corner-all" style="display:none;margin-top: 20px; padding: 0 .7em;">
			<p id="parrMensajePage">
				<span id="spanIcoMensajePage" class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<span id="spanMensajePage"></span>
			</p>
		</div> <!-- divMensajePage -->

		<div id="divMensajePageDialog" title="Mensaje" class="ui-state-highlight ui-corner-all">
			<p id="parrMensajePageDialog">
				<span id="spanIcoMensajePageDialog" class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
				<span id="spanMensajePageDialog"></span>
			</p>
		</div> <!-- divMensajePageDialog -->
<?php }?>

		<div id="divdebito_cuenta_cobrarPopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tbldebito_cuenta_cobrarPopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmdebito_cuenta_cobrarAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btndebito_cuenta_cobrarAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="debito_cuenta_cobrar_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btndebito_cuenta_cobrarAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmdebito_cuenta_cobrarAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tbldebito_cuenta_cobrarPopupAjaxWebPart -->
		</div> <!-- divdebito_cuenta_cobrarPopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trdebito_cuenta_cobrarTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdadebito_cuenta_cobrar"></a>
		<img id="imgTablaParaDerechadebito_cuenta_cobrar" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechadebito_cuenta_cobrar'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdadebito_cuenta_cobrar" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdadebito_cuenta_cobrar'"/>
		<a id="TablaDerechadebito_cuenta_cobrar"></a>
	</td>
</tr> <!-- trdebito_cuenta_cobrarTablaNavegacion/super -->
<?php } ?>

<tr id="trdebito_cuenta_cobrarTablaDatos">
	<td colspan="3" id="htmlTableCelldebito_cuenta_cobrar">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosdebito_cuenta_cobrarsAjaxWebPart">
		</div>
	</td>
</tr> <!-- trdebito_cuenta_cobrarTablaDatos/super -->
		
		
		<tr id="trdebito_cuenta_cobrarPaginacion" style="display:table-row">
			<td id="tddebito_cuenta_cobrarPaginacion" align="left">
				<div id="divdebito_cuenta_cobrarPaginacionAjaxWebPart">
				<form id="frmPaginaciondebito_cuenta_cobrar" name="frmPaginaciondebito_cuenta_cobrar">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginaciondebito_cuenta_cobrar" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkdebito_cuenta_cobrar" name="btnSeleccionarLoteFkdebito_cuenta_cobrar" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' /*&& debito_cuenta_cobrar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresdebito_cuenta_cobrar" name="btnAnterioresdebito_cuenta_cobrar" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' && debito_cuenta_cobrar_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tddebito_cuenta_cobrarNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparardebito_cuenta_cobrar" name="btnNuevoTablaPreparardebito_cuenta_cobrar" title="NUEVO Debito Cuenta Cobrar" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTabladebito_cuenta_cobrar" name="ParamsPaginar-txtNumeroNuevoTabladebito_cuenta_cobrar" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tddebito_cuenta_cobrarConEditardebito_cuenta_cobrar">
							<label>
								<input id="ParamsBuscar-chbConEditardebito_cuenta_cobrar" name="ParamsBuscar-chbConEditardebito_cuenta_cobrar" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false'/* && debito_cuenta_cobrar_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesdebito_cuenta_cobrar" name="btnSiguientesdebito_cuenta_cobrar" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginaciondebito_cuenta_cobrar -->
				</form> <!-- frmPaginaciondebito_cuenta_cobrar -->
				<form id="frmNuevoPreparardebito_cuenta_cobrar" name="frmNuevoPreparardebito_cuenta_cobrar">
				<table id="tblNuevoPreparardebito_cuenta_cobrar" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trdebito_cuenta_cobrarNuevo" height="10">
						<?php if(debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tddebito_cuenta_cobrarNuevo" align="center">
							<input type="button" id="btnNuevoPreparardebito_cuenta_cobrar" name="btnNuevoPreparardebito_cuenta_cobrar" title="NUEVO Debito Cuenta Cobrar" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tddebito_cuenta_cobrarGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosdebito_cuenta_cobrar" name="btnGuardarCambiosdebito_cuenta_cobrar" title="GUARDAR Debito Cuenta Cobrar" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && debito_cuenta_cobrar_web::$STR_ES_RELACIONES=='false' && debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tddebito_cuenta_cobrarDuplicar" align="center">
							<input type="button" id="btnDuplicardebito_cuenta_cobrar" name="btnDuplicardebito_cuenta_cobrar" title="DUPLICAR Debito Cuenta Cobrar" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tddebito_cuenta_cobrarCopiar" align="center">
							<input type="button" id="btnCopiardebito_cuenta_cobrar" name="btnCopiardebito_cuenta_cobrar" title="COPIAR Debito Cuenta Cobrar" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && ((debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' && debito_cuenta_cobrar_web::$STR_ES_RELACIONES=='false') || debito_cuenta_cobrar_web::$STR_ES_BUSQUEDA=='true'  || debito_cuenta_cobrar_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tddebito_cuenta_cobrarCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginadebito_cuenta_cobrar" name="btnCerrarPaginadebito_cuenta_cobrar" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparardebito_cuenta_cobrar -->
				</form> <!-- frmNuevoPreparardebito_cuenta_cobrar -->
				</div> <!-- divdebito_cuenta_cobrarPaginacionAjaxWebPart -->
			</td> <!-- tddebito_cuenta_cobrarPaginacion -->
		</tr> <!-- trdebito_cuenta_cobrarPaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesdebito_cuenta_cobrarAjaxWebPart">
			<td id="tdAccionesRelacionesdebito_cuenta_cobrarAjaxWebPart">
				<div id="divAccionesRelacionesdebito_cuenta_cobrarAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesdebito_cuenta_cobrarAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesdebito_cuenta_cobrarAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBydebito_cuenta_cobrar">
			<td id="tdOrderBydebito_cuenta_cobrar">
				<form id="frmOrderBydebito_cuenta_cobrar" name="frmOrderBydebito_cuenta_cobrar">
					<div id="divOrderBydebito_cuenta_cobrarAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBydebito_cuenta_cobrar -->
		</tr> <!-- trOrderBydebito_cuenta_cobrar/super -->
			
		
		
		
		
		
	</table> <!-- super -->
	
		
	
			</div> <!-- content -->    

			


    	</div> <!-- main -->
	
 	</div> <!-- outerborder -->	
	
	
		<?php 
			if(array_key_exists('typeonload',$_REQUEST) && $_REQUEST['typeonload']!=null && $_REQUEST['typeonload']=='onloadhijos') {
		?>
		
		<?php 
			}
		?>	
		
		
		
		
				
				<script type="module">
			
				import {debito_cuenta_cobrar_webcontrol,debito_cuenta_cobrar_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascobrar/debito_cuenta_cobrar/js/webcontrol/debito_cuenta_cobrar_webcontrol.js?random=1';
				
				debito_cuenta_cobrar_webcontrol1.setdebito_cuenta_cobrar_constante(window.debito_cuenta_cobrar_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(debito_cuenta_cobrar_web::$STR_ES_RELACIONADO=='false') {?>
	
	
	<?php 
		if(Constantes::$BIT_CON_ARBOL_MENU) { 
			 /*$tree->writeJavascript();*/ 		
		}	
	?>
	

	
	<?php }?>



	<!-- <div name="footer"> -->    
	<!-- </div> -->
</body>

</html>

