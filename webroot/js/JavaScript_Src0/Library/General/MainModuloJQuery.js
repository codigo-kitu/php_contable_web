//<script type="text/javascript" language="javascript">

class MainMenu {
	
	actualizarVariablesPagina(mainMenuController) {
		//alert("Here");
		jQuery("#divMainModuloAjaxWebPart").html(mainMenuController.htmlListaMapaSitio);
		
		this.registerTableActionsMainModulo();
		
	}
	
	registerTableActionsMainModulo() {
		
		var maxima_fila = jQuery('#t-maxima_fila').val();
		var control_name="";
		
		if(maxima_fila!=null && maxima_fila > 0) {
			for (var i = 1; i <= maxima_fila; i++) { 
				
				control_name="btnModulo"+i;
				
				//jQuery("#"+control_name).button();				
			}
		}
		
		jQuery(".imgseleccionarmodulo").click(function(){
			var strFormQueryString="controller=Login&action=cargarOpcionesModulo&";
			
			var idActual=jQuery(this).attr("idactualmodulo");
			
			strFormQueryString=strFormQueryString+"id="+idActual;
			
			funcionGeneral.mostrarOcultarProcesando(true,"outerBorder");
			
			jQuery.post('http://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+'GlobalController.php', strFormQueryString ,
				function(jsonresult){})
				
				/*.beforeSend(function(){
					accionFuncionGeneral.nuevoPrepararAccionOnClick();
				})*/
				
				.success(function(jsonresult) {
					var accionController=jQuery.parseJSON(jsonresult);
					
					//SOLO SON AUXILIARES USADOS PARA ABRIR VENTANA EN FUNCION(.complete) login.validarLogginOnComplete();
					
					jQuery("#Mensaje-hdnAuxiliarUrlPagina").val(accionController.strAuxiliarUrlPagina);
					jQuery("#MensajeHdnAuxiliarUrlPagina").val(accionController.strAuxiliarUrlPagina);
					
					//login.validarLogginOnComplete();
					
					//alert(accionController.strAuxiliarUrlPagina);
					//accionJQueryPaginaWebInteraccion.actualizarVariablesPaginaAccion(accionController);	
				})
				
				.error(function(){accionFuncionGeneral.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"E");})
				
				.complete(function(jsonresult) {
					//var accionController=jQuery.parseJSON(jsonresult);															
					funcionGeneral.mostrarOcultarProcesando(false,"outerBorder");	
					
					login.validarLogginOnComplete();
					
				});									
		});
	}
	
	onLoadMainModulo() {
		/*
		var strTypeOnLoadAccion=accionConstante.strTypeOnLoadAccion;
		var strTipoPaginaAuxiliarAccion=accionConstante.strTipoPaginaAuxiliarAccion;
		var strTipoUsuarioAuxiliarAccion=accionConstante.strTipoUsuarioAuxiliarAccion;
		var strES_POPUP=accionConstante.strES_POPUP;
		var strESBUSQUEDA=accionConstante.strESBUSQUEDA;
		var strFUNCIONJS=accionConstante.strFUNCIONJS;
		*/
			
		//var strFormQueryString="strTypeOnLoadAccion="+strTypeOnLoadAccion+"&strTipoPaginaAuxiliarAccion="+strTipoPaginaAuxiliarAccion+"&strTipoUsuarioAuxiliarAccion="+strTipoUsuarioAuxiliarAccion+"&ES_POPUP="+strES_POPUP+"&ESBUSQUEDA="+strESBUSQUEDA+"&FUNCIONJS="+strFUNCIONJS;//constantes.STRUSUARIODEFAULTINVITADO;
		
		var strFormQueryString="controller=Login&action=cargarMenuModulos";
				
		funcionGeneral.mostrarOcultarProcesando(true,"outerBorder");			
			
		jQuery.post('http://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+'GlobalController.php',strFormQueryString ,
			function(jsonresult){})

			.success(function(jsonresult) {
				var mainMenuController=jQuery.parseJSON(jsonresult);
				
				mainMenu.actualizarVariablesPagina(mainMenuController);
							
			})

			.error(function(){funcionGeneral.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"E");})

			.complete(function(jsonresult) {
				funcionGeneral.mostrarOcultarProcesando(false,"outerBorder");			
		});
	}
}

var mainMenu=new MainMenu();


jQuery.noConflict();

jQuery(document).ready(function() {
		
	//CARGAR MENU DE ARBOL				
	if(constantes.CON_MENU_JQUERY==true) {
		
	} else if(constantes.CON_ARBOL_MENU==true) {
				
	} else if(constantes.CON_ARBOL_MENU_JQUERY==true) {		
			
	}
	
	
	jQuery("#imgCerrarSesion").click(function(){
		var strFormQueryString="controller=Login&action=cerrarSesionGeneral";
			
		jQuery.post('http://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+'GlobalController.php', strFormQueryString ,
			function(jsonresult){/*alert(jsonresult);*/})
			
			/*.beforeSend(function(){
				alumnoPaginaWebInteraccion.nuevoAlumnoOnClick();
			})*/
			
			.success(function(jsonresult) {						
				var loginController=jQuery.parseJSON(jsonresult);
				
				funcionGeneral.mostrarOcultarProcesando(true,"outerBorder");				
								
				window.close();
				
				//login.validarCerrarSesionOnComplete(loginController);												
			})
			
			.error(function(){
				alert("OCURRIO ALGUN ERROR, VUELVA A INTERNARLO Y CONSULTE CON EL ADMINISTRADOR");
			})
			
			.complete(function(jsonresult) {
				
			});			
	});
});


//OJO AL FINAL VIENE window.onload = onLoad; 

window.onload = mainMenu.onLoadMainModulo; 

//</script>