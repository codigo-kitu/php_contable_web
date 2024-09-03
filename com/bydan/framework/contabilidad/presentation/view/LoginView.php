<?php declare(strict_types = 1);
namespace com\bydan\framework\contabilidad\presentation\view;
?>

<!DOCTYPE html>
 	<html>	
	<!-- <body id="outerBorder" pageTitle="Tipo Guia Remision Mantenimiento" markupType="html"> -->
		<head>
			<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	
<?php
	//PHP5.3-medical
	include_once('com/bydan/framework/contabilidad/util/Constantes.php');
	use com\bydan\framework\contabilidad\util\Constantes;
	
	//PHP5.3-medical
	include_once('com/bydan/framework/contabilidad/util/Funciones.php');
	
	//PHP5.3--use com/bydan/framework/medical/util/Funciones;	
?>
		<?php //JAVA-SCRIPT CON echo DESDE PHP?>
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
		
		
		<script type="text/javascript" src="webroot/js/JavaScript/Library/Ajax/waiter.js"></script>
		<script type="module" src="webroot/js/JavaScript/Library/Validacion/Validacion.js"></script>
			
		<!-- 			
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>scriptaculous/prototype.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>scriptaculous/scriptaculous.js"></script>
		 -->
		
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/jquery-1.10.2.js"></script>

		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/pluggin/jquery.popupWindow.js"></script>				
				
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/pluggin/jquery.validate.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.tooltip.js"></script>
		
			
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.core.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.effect.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.tabs.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.mouse.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.draggable.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.position.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.resizable.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.dialog.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.effect-blind.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.effect-explode.js"></script>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/ui/jquery.ui.button.js"></script>
				
		<link rel="stylesheet" type="text/css" href="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>jquery-ui-1.10.4/themes/<?php echo(Constantes::$STR_THEME)?>/jquery.ui.theme.css" type="text/css"/>  
				
			
		<link rel="stylesheet" href="<?php echo(Constantes::$strPathBaseSassCssToComplete) ?>pagina.css" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo(Constantes::$strPathBaseSassCssToComplete) ?>general.css" media="screen" />
	
				
		<!-- <link rel="stylesheet" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/jmaki-standard.css" type="text/css"/> -->
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/style.css" media="screen" /> -->
		<!-- <link rel="stylesheet" media="screen,projection" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/Background/main.css" type="text/css"/> -->	
			
		
        		<!-- <link rel="stylesheet" media="print" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/Background/print.css" type="text/css"/> -->
        		<!-- <link rel="stylesheet" media="aural" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/Background/aural.css" type="text/css"/> -->
        		
        		<!-- <link rel="stylesheet" media="aural" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>Css/login.css" type="text/css"/> -->
        		
        		<!-- <link rel="stylesheet" media="aural" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>pure_css/pure-min.css" type="text/css"/> -->
		
		          <!-- <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css" integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous"> -->
		
		<link rel="stylesheet" href="<?php echo(Constantes::$strPathBaseCssToComplete) ?>bootstrap5/bootstrap.min.css" type="text/css"/>
		<script type="text/javascript" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>bootstrap5/bootstrap.bundle.min.js"></script>
		
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script> -->
		<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->
		<!-- </head> -->
		
	</head>
		<body>
		
		<div id="outerBorder">
		
		<div id="header">
		
			<div id="banner"><?php echo(Constantes::$STR_NOMBRE_SISTEMA);?> <font class="titulobanner"></font></div>
					
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
	
			<div id="content_login" style="width: 100%;height: 100%">
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

<form id="frmUsuarioLogin" class="">
	<div id="divUsuarioFormAjaxWebPart" style="height:450px;border-style: outset;">			
		<table border="0" align="center" class="border border-primary shadow-lg p-3 mb-5 bg-white rounded" style="position: relative;left: 50%; top: 35%; margin-left: -50px; margin-top: -50px;">	
			<tr>
				<td class="titulocampo">
					<label for="Sistema-Usuario" class="form-label">USUARIO</label>
				</td>
				<td>
					<input title="Usuario" id="Sistema-Usuario" name="Sistema-Usuario" type="text" class="form-control" placeholder="Usuario" value="CNTADMINISTRADOR1">
				</td>
			</tr>
			<tr>
				<td class="titulocampo">
					<label for="Sistema-Password" class="form-label">PASSWORD</label>
				</td>
				<td>
					<input title="Password" id="Sistema-Password" name="Sistema-Password" type="password" class="form-control" placeholder="Password" value="123456">
				</td>
			</tr>	
			<tr> 
				<td></td>
				<td style="text-align: center;">
					<input type="button" id="btnAceptar" name="btnAceptar" class="btn btn-primary" value="ACEPTAR" title="Haga Click Aqui"/>
					<input type="button" id="btnCerrarSesion" name="btnCerrarSesion" class="btn btn-primary" value="CERRAR SESION" title="Haga Click Aqui"/>
				</td>					
			</tr>
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
<div id="divMensajePageDialog" title="Mensaje" class="ui-state-highlight ui-corner-all">
		<p id="parrMensajePageDialog">
			<span id="spanIcoMensajePageDialog" class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
			<span id="spanMensajePageDialog"></span>
		</p>
</div>

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

<?php //include_once(Constantes::$strPathBaseJavaScriptToComplete.'JavaScript/Library/Login/LoginJQuery.js'); ?>

<script type="module" src="<?php echo(Constantes::$strPathBaseJavaScriptToComplete) ?>JavaScript/Library/Login/LoginJQuery.js"></script>
		
<!-- <div name="footer"> -->
    <!-- <jsp:include page="/Component/footer.jsp" /> -->
<!-- </div> -->
</body>
</html>