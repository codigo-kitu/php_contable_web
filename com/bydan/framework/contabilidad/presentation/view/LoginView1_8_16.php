<?php declare(strict_types = 1);
namespace com\bydan\framework\contabilidad\presentation\view;
?>
 	<!-- <html> -->
	<!-- <body id="outerBorder" pageTitle="SISTEMA Mantenimiento" markupType="html"> -->
		<!-- <head> -->
			<!-- <meta http-equiv="Content-Type" content="text/html;charset=utf-8"> -->
	
<?php

    use com\bydan\framework\contabilidad\util\Constantes;
   

	//PHP5.3-medical
	include_once('com/bydan/framework/contabilidad/util/Constantes.php');
	//PHP5.3--use com/bydan/framework/medical/util/Constantes;
	
	//PHP5.3-medical
	include_once('com/bydan/framework/contabilidad/util/Funciones.php');
	//PHP5.3--use com/bydan/framework/medical/util/Funciones;	
?>
				
		<?php include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/General/Constantes.js' ); ?>			
		<?php include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/General/FuncionGeneral.js' ); ?>			
		<?php include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/Ajax/AjaxBasic.js'); ?>
		<?php include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/Ajax/AjaxFuncionGeneral.js'); ?>
		<?php include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/Ajax/waiter.js'); ?>
		<?php include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/Validacion/Validacion.js'); ?>
		
		<!-- 			
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>scriptaculous/prototype.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>scriptaculous/scriptaculous.js"></script>
		 -->
		 
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/jquery-1.6.2.js"></script>

		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/pluggin/jquery.popupWindow.js"></script>				
				
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/pluggin/jquery.validate.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/pluggin/jquery.tooltip.js"></script>
		
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/external/jquery.bgiframe-2.1.2.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/ui/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/ui/jquery.ui.mouse.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/ui/jquery.ui.draggable.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/ui/jquery.ui.position.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/ui/jquery.ui.resizable.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/ui/jquery.ui.dialog.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/ui/jquery.effects.core.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/ui/jquery.effects.blind.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/ui/jquery.effects.explode.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/ui/jquery.ui.button.js"></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/demos.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/themes/cupertino/jquery.ui.all.css" type="text/css"/>
				
		<link rel="stylesheet" type="text/css" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/style.css" media="screen" />
		<link rel="stylesheet" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/jmaki-standard.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.8.16/pluggin/jquery.tooltip.css" type="text/css"/>
		
		<link rel="stylesheet" media="screen,projection" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/Background/main.css" type="text/css"/>		
		<link rel="stylesheet" media="print" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/Background/print.css" type="text/css"/>
		<link rel="stylesheet" media="aural" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/Background/aural.css" type="text/css"/>
		
		<link rel="stylesheet" media="aural" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/login.css" type="text/css"/>
				
		<!-- <link rel="stylesheet" type="text/css" href="Css/style.css" media="screen" /> -->
		<!-- <link rel="stylesheet" href="Css/jmaki-standard.css" type="text/css"/> -->
		
		<!-- <link rel="stylesheet" media="screen,projection" href="Css/Background/main.css" type="text/css"/> -->		
		<!-- <link rel="stylesheet" media="print" href="Css/Background/print.css" type="text/css"/>	-->	
		<!-- <link rel="stylesheet" media="aural" href="Css/Background/aural.css" type="text/css"/> -->
		
		<!-- </head> -->
		
	<div id="outerBorder">
		
		<div id="header">
		
			<div id="banner">BYDANS - SISTEMA MEDICO - <font class="titulobanner">MEDICAL WEB</font></div>
					
			<div id="subheader" class="links">    
			
						<div style="">
								<!-- <jsp:include page="/Component/header.jsp" /> -->
						</div>     
						
			</div> <!-- sub-header -->
			
			<div id="subheaderImagesLinks"> 
				<div id="subheaderImageTree" style="">    
					<!-- <img id="imgExpandirColapsar" align="left" style="visibility:hidden" src="<?php echo Constantes::$strPathBaseImagenToComplete ?>Imagenes/collapse.gif" width="20" height="20"  onclick="funcionGeneral.colapsar('../')"/> -->
				</div>	
				
			</div> 
					
		</div> <!-- header -->
		
		<div id="main">
		
			<div id="leftSidebar" class="left" style="display:none;width: 0%;height: 0%;">
					<!-- <jsp:include page="/Component/tree.jsp" /> -->
					<?php // include 'webroot\Component\tree.php' ; ?>
			</div> <!-- leftSidebar -->
	
			<div id="content" style="width: 100%;height: 100%">			
				<div id="divMensaje"></div>
				<div id="divUsuarioPopupAjaxWebPart" style="display:none;" class="divmensajegeneral">
				
					<table cellpadding="0" cellspacing="0">						
						<tr><td>
							<form>
								<table cellpadding="0" cellspacing="0">
									<tr>
										<td colspan="2"><?php echo Constantes::$STR_MENSAJE_POPUP_BLOQUEADOR; ?></td>
										
									</tr>
									<tr>							
										<td><input type="button" id="btnAuxiliarPopupCerrar" name="btnAuxiliarPopupCerrar" value="CERRAR MENSAJE" onclick="login.resaltarRestaurarDivPopup(false);" title="Haga Click aqui para cerrar"/></td>
										<td><input type="button" id="btnAuxiliarPopup" name="btnAuxiliarPopup" value="CONTINUAR" title="Haga Click aqui para continuar"/></td>												
									</tr>	
								</table>					
							</form>	
						</td></tr>												
					</table>				
				</div>
 	<!-- </head> -->
	
	<A name="ControlesSecciones"></A>
	<table width="100%" height="100%" align="center" class="super" border="0">
		
	<tr class="navegacion" style="display:none">
		<td>
			<form name="frmExpandirColapsar">

				<table width="100%" border="0">
				<tr align="left" style="width: 505px">
				<td align="left">
				<!-- <img id="imgExpandirColapsar" align="left" style="visibility:visible" src="<?php echo Constantes::$strPathBaseImagenToComplete ?>Imagenes/collapse.gif" width="20" height="20"  onclick="funcionGeneral.colapsar('../')"/> -->

				</td>

				<td align="left" style="width: 258px">
				<img align="left" id="imgEstadoProceso" style="visibility:hidden; width: 16px; height: 16px" src="<?php echo Constantes::$strPathBaseImagenToComplete ?>Imagenes/wait2.gif" width="32" height="32" />
				</td>

					<td align="center" style="width: 98px">
					<A name="ControlesSecciones" ></A>
					</td>

				</tr>

				</table>
			</form>
			</td>
		</tr> 
		
<tr><td colspan="3">

<form id="frmUsuarioLogin">
<div id="divUsuarioFormAjaxWebPart">	
	<table align="center">	
	<tr><td class="titulocampo"><span style="font-size:14px;font-weight:bold;">USUARIO</span></td><td><input title="Usuario" id="Sistema-Usuario" name="Sistema-Usuario" type="text" class="inputnormal"></td></tr>
	<tr><td class="titulocampo"><span style="font-size:14px;font-weight:bold;">PASSWORD</span></td><td><input title="Password" id="Sistema-Password" name="Sistema-Password" type="password" class="inputnormal"></td></tr>	
	<tr>
	<td></td>
	<td><input type="button" id="btnAceptar" name="btnAceptar" value="ACEPTAR" title="Haga Click Aqui"/></td></tr>
	</table>
	<!--
	<?php
		//echo $this->Form->input('Sistema.Usuario');
		//echo $this->Form->input('Sistema.Password',array('type'=>'password'));
	?>	
	<?php //echo $ajax->submit('Aceptar', array('url'=> array('controller'=>'logins', 'action'=>'validarUsuario'), 'update' => 'divUsuarioAuxiliarAjaxWebPart', 'before' => 'login.validarLogginOnClick()', 'complete' => 'login.validarLogginOnComplete()')); ?>
	-->
</div>
</form>


<form>
<div id="divUsuarioAuxiliarAjaxWebPart">
	<span class=""></span>
	<!-- 'value' => $loginController->strAuxiliarUrlPagina -->
	<input id="Mensaje-hdnAuxiliarUrlPagina" name="Mensaje-hdnAuxiliarUrlPagina" type="hidden">
	<input id="Mensaje-hdnAuxiliarTipo" name="Mensaje-hdnAuxiliarTipo" type="hidden">	
	<span id="spanMensaje" class="mensajeinfo"></span>	
	
	<!--
	<?php //echo $loginController->strAuxiliarCssMensaje ?>
	<?php //echo $loginController->strAuxiliarMensaje ?>
	-->
</div>
</form>
<h2 class="demoHeaders">Highlight / Error</h2>

			<div class="ui-widget">

				<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;"> 

					<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>

					<strong>Hey!</strong> Sample ui-state-highlight style.</p>

				</div>

			</div>

			<br/>

			<div class="ui-widget">

				<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 

					<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 

					<strong>Alert:</strong> Sample ui-state-error style.</p>

				</div>

			</div>


</td></tr>
<tr><td>
		

<?php 
/*
$opcionesUsuario=$this->Session->read('opcionesUsuario');

if($opcionesUsuario!=null && count($opcionesUsuario)>0) {
	foreach ($opcionesUsuario as $opcionLocal) {
		$menu->add('Opciones_Usuario',array($opcionLocal->getField_strNombre(),$opcionLocal->getId()));		
	}
}
echo $menu->generate('Opciones_Usuario'); 
*/
?>
	

		
</td></tr>		
	</table>
	
	</div> <!-- content -->    
		
    	</div> <!-- main -->
	
 	</div> <!-- outerborder -->		
<?php include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/Login/LoginJQuery.js'); ?>
		
<!-- <div name="footer"> -->
    <!-- <jsp:include page="/Component/footer.jsp" /> -->
<!-- </div> -->
<!-- </body> -->

<!-- </html> -->