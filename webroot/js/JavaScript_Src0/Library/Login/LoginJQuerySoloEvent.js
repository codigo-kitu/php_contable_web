//<script type="text/javascript" language="javascript">

/*alert("ok");*/

jQuery.noConflict();

jQuery(document).ready(function() {
	
	jQuery("#divUsuarioPopupAjaxWebPart").dialog({
		autoOpen: false,
		width: constantes.INT_POPUP_WIDTH,
		height: constantes.INT_POPUP_HEIGHT,
		modal: true,
		draggable: true,
		resizable: true,
		show: constantes.STR_POPUP_EFFECT,					
		hide: constantes.STR_POPUP_EFFECT_HIDE,
		title: '',
		position: 'top,left'/*,
		buttons: [
				{
					text: "Cerrar",
					click: function() { login.resaltarRestaurarDivPopup(false);}//jQuery(this).dialog("close");
				}
			]*/
	});	
});

//</script>