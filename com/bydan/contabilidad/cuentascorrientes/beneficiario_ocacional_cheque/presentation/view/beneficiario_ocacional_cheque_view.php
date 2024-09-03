<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\presentation\view;
?>
	<!DOCTYPE html>
 	<html>	
	
	<!-- <body id="outerBorder" pageTitle="Beneficiario Ocacional Mantenimiento" markupType="html"> -->
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
	
	include_once('com/bydan/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/util/beneficiario_ocacional_cheque_carga.php');
	use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_carga;
	
	//include_once('com/bydan/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/presentation/view/beneficiario_ocacional_cheque_web.php');
	//use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\presentation\view\beneficiario_ocacional_cheque_web;
	
	//use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
	//use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
	//use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
	
	/*CARGA ARCHIVOS FRAMEWORK*/
	beneficiario_ocacional_cheque_carga::cargarArchivosFrameworkBase(PaqueteTipo::$WEB);
		
	beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$WEB);
	
	
	/*ESTO SE LLAMA EN LA PRIMERA LINEA (GlobalController.php)
	$blnstart=session_start();*/
	
	
	
	
		
	//$sessionBase=new SessionBase();	
	//$parametroGeneralUsuarioActual=new parametro_general_usuario();
	//$moduloActual=new modulo();
	//$usuarioActual=new usuario();
	
	$beneficiario_ocacional_cheque_web1= new beneficiario_ocacional_cheque_web();	
	$beneficiario_ocacional_cheque_web1->cargarDatosGenerales();
	
	//$moduloActual=$beneficiario_ocacional_cheque_web1->moduloActual;
	//$usuarioActual=$beneficiario_ocacional_cheque_web1->usuarioActual;
	//$sessionBase=$beneficiario_ocacional_cheque_web1->sessionBase;	
	//$parametroGeneralUsuarioActual=$beneficiario_ocacional_cheque_web1->parametroGeneralUsuarioActual;
	
	
		
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
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/js/templating/beneficiario_ocacional_cheque_relaciones_template.js'); ?>
			
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/js/templating/beneficiario_ocacional_cheque_resumen_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/js/templating/beneficiario_ocacional_cheque_datos_general_template.js'); ?>
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/js/templating/beneficiario_ocacional_cheque_datos_reporte_template.js'); ?>
		
			<?php include_once(Constantes::$PATH_JAVASCRIPT.'JavaScript/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/js/templating/beneficiario_ocacional_cheque_datos_relaciones_template.js'); ?>
			
						
		
		
		<?php 
			
		
			beneficiario_ocacional_cheque_web::$GET_POST = $_GET;
					
			//OBTAIN GET/POST GENERAL
			if (isset($_GET['view']) || isset($_POST['view'])){
				if(isset($_GET['view'])) {
					beneficiario_ocacional_cheque_web::$GET_POST=$_GET;
				} else {
					beneficiario_ocacional_cheque_web::$GET_POST=$_POST;
				}
			}
			
			//SE DEFINE SI ES PAGINA PRINCIPAL O FORM EN WEB.php
			beneficiario_ocacional_cheque_web::$STR_NOMBRE_PAGINA = 'beneficiario_ocacional_cheque_view.php';
			beneficiario_ocacional_cheque_web::$BIT_ES_PAGINA_PRINCIPAL = 'true';
			beneficiario_ocacional_cheque_web::$BIT_ES_PAGINA_FORM = 'false';
				
			beneficiario_ocacional_cheque_web::InicializarParametrosPagina();
		
		?>
			
		
		
		
		<script type="module">
			
			import {beneficiario_ocacional_cheque_constante,beneficiario_ocacional_cheque_constante1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/js/util/beneficiario_ocacional_cheque_constante.js?random=1';
			import {beneficiario_ocacional_cheque_funcion,beneficiario_ocacional_cheque_funcion1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/js/util/beneficiario_ocacional_cheque_funcion.js?random=1';
			
			let beneficiario_ocacional_cheque_constante2 = new beneficiario_ocacional_cheque_constante();
			
			beneficiario_ocacional_cheque_constante2.STR_NOMBRE_PAGINA="<?php echo(beneficiario_ocacional_cheque_web::$STR_NOMBRE_PAGINA); ?>";
			beneficiario_ocacional_cheque_constante2.STR_TYPE_ON_LOADbeneficiario_ocacional_cheque="<?php echo(beneficiario_ocacional_cheque_web::$STR_TYPE_ONLOAD); ?>";
			beneficiario_ocacional_cheque_constante2.STR_TIPO_PAGINA_AUXILIAR="<?php echo(beneficiario_ocacional_cheque_web::$STR_TIPO_PAGINA_AUXILIAR); ?>";			
			beneficiario_ocacional_cheque_constante2.STR_TIPO_USUARIO_AUXILIAR="<?php echo(beneficiario_ocacional_cheque_web::$STR_TIPO_USUARIO_AUXILIAR); ?>";			
			beneficiario_ocacional_cheque_constante2.STR_ACTION="<?php echo(beneficiario_ocacional_cheque_web::$STR_ACTION); ?>";
			beneficiario_ocacional_cheque_constante2.STR_ES_POPUP="<?php echo(beneficiario_ocacional_cheque_web::$STR_ES_POPUP); ?>";
			beneficiario_ocacional_cheque_constante2.STR_ES_BUSQUEDA="<?php echo(beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA); ?>";
			beneficiario_ocacional_cheque_constante2.STR_FUNCION_JS="<?php echo(beneficiario_ocacional_cheque_web::$STR_FUNCION_JS); ?>";
			beneficiario_ocacional_cheque_constante2.BIG_ID_ACTUAL="<?php echo(beneficiario_ocacional_cheque_web::$BIG_ID_ACTUAL); ?>";
			beneficiario_ocacional_cheque_constante2.BIG_ID_OPCION="<?php echo(beneficiario_ocacional_cheque_web::$BIG_ID_OPCION); ?>";
			beneficiario_ocacional_cheque_constante2.STR_OBJETO_JS="<?php echo(beneficiario_ocacional_cheque_web::$STR_OBJETO_JS); ?>";
			beneficiario_ocacional_cheque_constante2.STR_ES_RELACIONES="<?php echo(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES); ?>";
			beneficiario_ocacional_cheque_constante2.STR_ES_RELACIONADO="<?php echo(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO); ?>";
			beneficiario_ocacional_cheque_constante2.STR_ES_SUB_PAGINA="<?php echo(beneficiario_ocacional_cheque_web::$STR_ES_SUB_PAGINA); ?>";
			beneficiario_ocacional_cheque_constante2.BIT_ES_PAGINA_PRINCIPAL=<?php echo(beneficiario_ocacional_cheque_web::$BIT_ES_PAGINA_PRINCIPAL); ?>;
			beneficiario_ocacional_cheque_constante2.BIT_ES_PAGINA_FORM=<?php echo(beneficiario_ocacional_cheque_web::$BIT_ES_PAGINA_FORM); ?>;
			beneficiario_ocacional_cheque_constante2.STR_SUFIJO="<?php echo(beneficiario_ocacional_cheque_web::$STR_SUF); ?>";//beneficiario_ocacional_cheque
			beneficiario_ocacional_cheque_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS="<?php echo(beneficiario_ocacional_cheque_web::$STR_STYLE_DISPLAY_CAMPOS_OCULTOS); ?>";//beneficiario_ocacional_cheque
			
			beneficiario_ocacional_cheque_constante2.STR_DESCRIPCION_USUARIO_SISTEMA="<?php echo(beneficiario_ocacional_cheque_web::$STR_DESCRIPCION_USUARIO_SISTEMA); ?>";
			beneficiario_ocacional_cheque_constante2.STR_NOMBRE_MODULO_ACTUAL="<?php  echo($beneficiario_ocacional_cheque_web1->moduloActual->getnombre()); ?>";
			beneficiario_ocacional_cheque_constante2.STR_DESCRIPCION_PERIODO_SISTEMA="<?php echo(beneficiario_ocacional_cheque_web::$STR_DESCRIPCION_PERIODO_SISTEMA); ?>";
			
			/*DEPENDE DE POST PARA DAR VALOR*/
			beneficiario_ocacional_cheque_constante2.BIT_ES_LOAD_NORMAL=true;
			/*beneficiario_ocacional_cheque_constante2.BIT_ES_LOAD_NORMAL=false;*/
			
			beneficiario_ocacional_cheque_constante2.BIT_ES_PARA_JQUERY=true;
			
			
			window.beneficiario_ocacional_cheque_constante2 = beneficiario_ocacional_cheque_constante2;
			
		</script>
		
		<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false') {?>
		
		
		
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
		<?php //include_once(Constantes::$PATH_CSS.'Css/style'.beneficiario_ocacional_cheque_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		<?php //include_once(Constantes::$PATH_CSS.'Css/style_font'.beneficiario_ocacional_cheque_web::$STR_SUFIJO_ESTILO_USUARIO.'.php'); ?>
		
		<?php }?>
	
		
		
		
		
		<?php } ?>
		
			<title> </title>
			
		</head>
		<body>
		

	<a id="beneficiario_ocacional_chequeActual" ></a>
	
	<div id="divResumenbeneficiario_ocacional_chequeActualAjaxWebPart">
	</div>
	
	<div id="outerBorder">
		<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false') {?>
		
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
		

			<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false') {?>
			
			<div id="divLeftSideSliderAux" class="leftauxleftsideslider">
				<div id="divLeftSideSlider"></div>
			</div> <!-- divLeftSideSliderAux -->
			
			<div id="leftSidebar" class="left" >
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php if(beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA=='false' && beneficiario_ocacional_cheque_web::$STR_ES_SUB_PAGINA=='false') {?>
					<?php include 'webroot/Component/treeforjquery.php' ; ?>
					<?php } ?>
			</div> <!-- leftSidebar -->
			
			<div id="divContentSliderAux" style="width:85%;height: 15px;margin-top: -15px;float: right;">
				<div id="divContentSlider"></div>
			</div> <!-- divContentSliderAux -->
				
			<?php } ?>
			
			<div id="content<?php echo(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO_sufijo); ?>"  style="width:93%;height:100%">							
				<!-- <div id="divMensaje" style="display:none" class="divmensajegeneral"></div> -->								
 	<!-- </head> -->

	
	

	
	<a id="ControlesSecciones"></a>
	
	<!-- SECCION/SUPER -->
	<table class="super" style="width: 100%;text-align: center">
		
		
		
	<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>
	<tr id="trNavegacion" class="navegacion">
		<td>
			<form name="frmExpandirColapsar">
				<table id="tblExpandirColapsar" style="width: 100%; border: 0px solid black;padding: 0px; border-spacing: 0px">
					<tr id="trExpandirColapsar" align="left" style="width: 505px">
						<td align="left" style="width: 4%">
							<img id="imgExpandirColapsar" align="left" style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" title="MOSTRAR U OCULTAR ARBOL DE OPCIONES" width="25" height="25"  onclick="funcionGeneral.colapsar('/contabilidad0/webroot/img/Imagenes/')"/>
							<a href="#"></a>
						</td>
						<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' && beneficiario_ocacional_cheque_web::$STR_ES_POPUP=='false' && beneficiario_ocacional_cheque_web::$STR_ES_SUB_PAGINA=='false') {?>
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
									<td id="tdbeneficiario_ocacional_chequeNuevoToolBar">
										<img id="imgNuevoToolBarbeneficiario_ocacional_cheque" name="imgNuevoToolBarbeneficiario_ocacional_cheque" title="Nuevo Beneficiario Ocacional" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA=='false' && beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdbeneficiario_ocacional_chequeNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBarbeneficiario_ocacional_cheque" name="imgNuevoGuardarCambiosToolBarbeneficiario_ocacional_cheque" title="Nuevo TABLA Beneficiario Ocacional" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdbeneficiario_ocacional_chequeGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBarbeneficiario_ocacional_cheque" name="imgGuardarCambiosToolBarbeneficiario_ocacional_cheque" title="Guardar Beneficiario Ocacional" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' && beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES=='false' && beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdbeneficiario_ocacional_chequeCopiarToolBar">
										<img id="imgCopiarToolBarbeneficiario_ocacional_cheque" name="imgCopiarToolBarbeneficiario_ocacional_cheque" title="Copiar Beneficiario Ocacional" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdbeneficiario_ocacional_chequeDuplicarToolBar">
										<img id="imgDuplicarToolBarbeneficiario_ocacional_cheque" name="imgDuplicarToolBarbeneficiario_ocacional_cheque" title="Duplicar Beneficiario Ocacional" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdbeneficiario_ocacional_chequeRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBarbeneficiario_ocacional_cheque" name="imgRecargarInformacionToolBarbeneficiario_ocacional_cheque" title="Recargar Beneficiario Ocacional" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdbeneficiario_ocacional_chequeAnterioresToolBar">
										<img id="imgAnterioresToolBarbeneficiario_ocacional_cheque" name="imgAnterioresToolBarbeneficiario_ocacional_cheque" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdbeneficiario_ocacional_chequeSiguientesToolBar">
										<img id="imgSiguientesToolBarbeneficiario_ocacional_cheque" name="imgSiguientesToolBarbeneficiario_ocacional_cheque" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdbeneficiario_ocacional_chequeAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBarbeneficiario_ocacional_cheque" name="imgAbrirOrderByToolBarbeneficiario_ocacional_cheque" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' && beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES=='false') || beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA=='true'  || beneficiario_ocacional_cheque_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdbeneficiario_ocacional_chequeCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBarbeneficiario_ocacional_cheque" name="imgCerrarPaginaToolBarbeneficiario_ocacional_cheque" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
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
	
		
		<tr id="trbeneficiario_ocacional_chequeCabeceraBusquedas" class="busquedacabecera" style="display:table-row" >
			<td>
				<img id="imgExpandirContraerRowBusquedabeneficiario_ocacional_cheque" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedabeneficiario_ocacional_cheque',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trbeneficiario_ocacional_chequeCabeceraBusquedas/super -->

		<tr id="trBusquedabeneficiario_ocacional_cheque" class="busqueda" style="display:table-row">
			<td id="tdBusquedabeneficiario_ocacional_cheque" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedabeneficiario_ocacional_cheque" name="frmBusquedabeneficiario_ocacional_cheque">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedabeneficiario_ocacional_cheque" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trbeneficiario_ocacional_chequeBusquedas" class="busqueda" style="display:none"><td>
				<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscarbeneficiario_ocacional_cheque" style="display:table-row">
					<td id="tdParamsBuscarbeneficiario_ocacional_cheque">
		<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscarbeneficiario_ocacional_cheque">
					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrosbeneficiario_ocacional_cheque" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrosbeneficiario_ocacional_cheque"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrosbeneficiario_ocacional_cheque" name="ParamsBuscar-txtNumeroRegistrosbeneficiario_ocacional_cheque" type="text" class="form-control">
							</td>
						</tr>
						<tr id="trRecargarInformacionbeneficiario_ocacional_cheque">
							<td id="tdGenerarReportebeneficiario_ocacional_cheque" class="elementos" style="display:table-row">
						
								<table id="tblMostrarTodosbeneficiario_ocacional_cheque" style="padding: 0px; border-spacing: 0px;">
						
									<tr id="tdMostrarTodosbeneficiario_ocacional_cheque" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformacionbeneficiario_ocacional_cheque" name="btnRecargarInformacionbeneficiario_ocacional_cheque" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
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
											<input type="button" id="btnImprimirPaginabeneficiario_ocacional_cheque" name="btnImprimirPaginabeneficiario_ocacional_cheque" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>							
										</td>
									</tr>
									<?php if(/*beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA=='false'  &&*/ beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBybeneficiario_ocacional_cheque">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBybeneficiario_ocacional_cheque" name="btnOrderBybeneficiario_ocacional_cheque" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByRelbeneficiario_ocacional_cheque" name="btnOrderByRelbeneficiario_ocacional_cheque" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
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

										<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES=='false' && beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdbeneficiario_ocacional_chequeConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodosbeneficiario_ocacional_cheque -->

							</td><!-- tdGenerarReportebeneficiario_ocacional_cheque -->
						</tr><!-- trRecargarInformacionbeneficiario_ocacional_cheque -->
					</table><!-- tblParamsBuscarNumeroRegistrosbeneficiario_ocacional_cheque -->
				</div> <!-- divParamsBuscarbeneficiario_ocacional_cheque -->
		<?php } ?>
				</td> <!-- tdParamsBuscarbeneficiario_ocacional_cheque -->
				</tr><!-- trParamsBuscarbeneficiario_ocacional_cheque -->
				</table> <!-- tblBusquedabeneficiario_ocacional_cheque -->
				</form> <!-- frmBusquedabeneficiario_ocacional_cheque -->
				

			</td> <!-- tdBusquedabeneficiario_ocacional_cheque -->
		</tr> <!-- trBusquedabeneficiario_ocacional_cheque/super -->

 

		<tr id="trFlechaArribaBusqueda" class="busqueda" style="display:none">
			<td>
				<div align="left">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
			</td>
		</tr> <!-- trFlechaArribaBusqueda/super -->
		
		
<tr id="trMensajePage">
	<td id="tdMensajePage" colspan="3">

<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>

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

		<div id="divbeneficiario_ocacional_chequePopupAjaxWebPart" style="display:none" class="divmensajegeneral">
			<table id="tblbeneficiario_ocacional_chequePopupAjaxWebPart" style="padding: 0px; border-spacing: 0px;">
				<tr>
					<td colspan="2">
						<span id="spanMensajePopupBloqueador"></span>
					</td>
				</tr>
				<tr>
					<td>
						<form id="frmbeneficiario_ocacional_chequeAuxiliarPopup">
							<table style="padding: 0px; border-spacing: 0px;">
								<tr>
									<td>
										<input type="button" id="btnbeneficiario_ocacional_chequeAuxiliarPopupCerrar" value="Cerrar Mensaje"  class="btn btn-primary" onclick="beneficiario_ocacional_cheque_funcion1.resaltarRestaurarDivMensajePopup(false);">
									</td>
									<td>
										<input type="button" id="btnbeneficiario_ocacional_chequeAuxiliarPopup" value="Continuar" class="btn btn-primary">
									</td>
								</tr>
							</table>
						</form> <!-- frmbeneficiario_ocacional_chequeAuxiliarPopup -->
					</td>
				</tr>
			</table> <!-- tblbeneficiario_ocacional_chequePopupAjaxWebPart -->
		</div> <!-- divbeneficiario_ocacional_chequePopupAjaxWebPart -->

	</td>
</tr> <!-- trMensajePage/super -->

<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>
<tr id="trbeneficiario_ocacional_chequeTablaNavegacion">
	<td align="left">
		<a id="TablaIzquierdabeneficiario_ocacional_cheque"></a>
		<img id="imgTablaParaDerechabeneficiario_ocacional_cheque" src="/contabilidad0/webroot/img/Imagenes/expand.gif" width="15" height="15" onclick="document.location.href='#TablaDerechabeneficiario_ocacional_cheque'"/>
	</td>
	<td colspan="2" align="right">
		<img id="imgTablaParaIzquierdabeneficiario_ocacional_cheque" src="/contabilidad0/webroot/img/Imagenes/collapse.gif" width="15" height="15"  onclick="document.location.href='#TablaIzquierdabeneficiario_ocacional_cheque'"/>
		<a id="TablaDerechabeneficiario_ocacional_cheque"></a>
	</td>
</tr> <!-- trbeneficiario_ocacional_chequeTablaNavegacion/super -->
<?php } ?>

<tr id="trbeneficiario_ocacional_chequeTablaDatos">
	<td colspan="3" id="htmlTableCellbeneficiario_ocacional_cheque">
		<!-- SECCION/TABLA -->
		<div id="divTablaDatosbeneficiario_ocacional_chequesAjaxWebPart">
		</div>
	</td>
</tr> <!-- trbeneficiario_ocacional_chequeTablaDatos/super -->
		
		
		<tr id="trbeneficiario_ocacional_chequePaginacion" style="display:table-row">
			<td id="tdbeneficiario_ocacional_chequePaginacion" align="left">
				<div id="divbeneficiario_ocacional_chequePaginacionAjaxWebPart">
				<form id="frmPaginacionbeneficiario_ocacional_cheque" name="frmPaginacionbeneficiario_ocacional_cheque">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginacionbeneficiario_ocacional_cheque" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:left">
					<tr>
						<?php if(beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFkbeneficiario_ocacional_cheque" name="btnSeleccionarLoteFkbeneficiario_ocacional_cheque" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' /*&& beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnterioresbeneficiario_ocacional_cheque" name="btnAnterioresbeneficiario_ocacional_cheque" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA=='false' && beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdbeneficiario_ocacional_chequeNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPrepararbeneficiario_ocacional_cheque" name="btnNuevoTablaPrepararbeneficiario_ocacional_cheque" title="NUEVO Beneficiario Ocacional" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablabeneficiario_ocacional_cheque" name="ParamsPaginar-txtNumeroNuevoTablabeneficiario_ocacional_cheque" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdbeneficiario_ocacional_chequeConEditarbeneficiario_ocacional_cheque">
							<label>
								<input id="ParamsBuscar-chbConEditarbeneficiario_ocacional_cheque" name="ParamsBuscar-chbConEditarbeneficiario_ocacional_cheque" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false'/* && beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientesbeneficiario_ocacional_cheque" name="btnSiguientesbeneficiario_ocacional_cheque" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginacionbeneficiario_ocacional_cheque -->
				</form> <!-- frmPaginacionbeneficiario_ocacional_cheque -->
				<form id="frmNuevoPrepararbeneficiario_ocacional_cheque" name="frmNuevoPrepararbeneficiario_ocacional_cheque">
				<table id="tblNuevoPrepararbeneficiario_ocacional_cheque" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:left">
					<tr id="trbeneficiario_ocacional_chequeNuevo" height="10">
						<?php if(beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdbeneficiario_ocacional_chequeNuevo" align="center">
							<input type="button" id="btnNuevoPrepararbeneficiario_ocacional_cheque" name="btnNuevoPrepararbeneficiario_ocacional_cheque" title="NUEVO Beneficiario Ocacional" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdbeneficiario_ocacional_chequeGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiosbeneficiario_ocacional_cheque" name="btnGuardarCambiosbeneficiario_ocacional_cheque" title="GUARDAR Beneficiario Ocacional" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' && beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES=='false' && beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdbeneficiario_ocacional_chequeDuplicar" align="center">
							<input type="button" id="btnDuplicarbeneficiario_ocacional_cheque" name="btnDuplicarbeneficiario_ocacional_cheque" title="DUPLICAR Beneficiario Ocacional" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdbeneficiario_ocacional_chequeCopiar" align="center">
							<input type="button" id="btnCopiarbeneficiario_ocacional_cheque" name="btnCopiarbeneficiario_ocacional_cheque" title="COPIAR Beneficiario Ocacional" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' && ((beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' && beneficiario_ocacional_cheque_web::$STR_ES_RELACIONES=='false') || beneficiario_ocacional_cheque_web::$STR_ES_BUSQUEDA=='true'  || beneficiario_ocacional_cheque_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdbeneficiario_ocacional_chequeCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginabeneficiario_ocacional_cheque" name="btnCerrarPaginabeneficiario_ocacional_cheque" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPrepararbeneficiario_ocacional_cheque -->
				</form> <!-- frmNuevoPrepararbeneficiario_ocacional_cheque -->
				</div> <!-- divbeneficiario_ocacional_chequePaginacionAjaxWebPart -->
			</td> <!-- tdbeneficiario_ocacional_chequePaginacion -->
		</tr> <!-- trbeneficiario_ocacional_chequePaginacion/super -->
		
		
		
		
		
		
			
			
		<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false' ) {?>
		<!-- SECCION/AUXILIAR -->
		<tr id="trAccionesRelacionesbeneficiario_ocacional_chequeAjaxWebPart">
			<td id="tdAccionesRelacionesbeneficiario_ocacional_chequeAjaxWebPart">
				<div id="divAccionesRelacionesbeneficiario_ocacional_chequeAjaxWebPart" style="height:250px;overflow:auto;">
				</div>
			</td> <!-- tdAccionesRelacionesbeneficiario_ocacional_chequeAjaxWebPart -->
		</tr> <!-- trAccionesRelacionesbeneficiario_ocacional_chequeAjaxWebPart/super -->
		<?php }?>

		<tr id="trOrderBybeneficiario_ocacional_cheque">
			<td id="tdOrderBybeneficiario_ocacional_cheque">
				<form id="frmOrderBybeneficiario_ocacional_cheque" name="frmOrderBybeneficiario_ocacional_cheque">
					<div id="divOrderBybeneficiario_ocacional_chequeAjaxWebPart" title="COLUMNAS" style="height:200px;overflow:auto;">
					</div>
				</form>
				<form id="frmOrderByRelbeneficiario_ocacional_cheque" name="frmOrderByRelbeneficiario_ocacional_cheque">
					<div id="divOrderByRelbeneficiario_ocacional_chequeAjaxWebPart" title="RELACIONES" style="height:200px;overflow:auto;">
					</div>
				</form>
			</td> <!-- tdOrderBybeneficiario_ocacional_cheque -->
		</tr> <!-- trOrderBybeneficiario_ocacional_cheque/super -->
			
		
		
		
		
		
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
			
				import {beneficiario_ocacional_cheque_webcontrol,beneficiario_ocacional_cheque_webcontrol1} from './webroot/js/JavaScript/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/js/webcontrol/beneficiario_ocacional_cheque_webcontrol.js?random=1';
				
				beneficiario_ocacional_cheque_webcontrol1.setbeneficiario_ocacional_cheque_constante(window.beneficiario_ocacional_cheque_constante2);
				
				</script>
				
	
				<script type="module" src="webroot/js/JavaScript/Library/General/FuncionGeneralJQuery.js"></script>
		
	
	
	
	<?php if(beneficiario_ocacional_cheque_web::$STR_ES_RELACIONADO=='false') {?>
	
	
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

