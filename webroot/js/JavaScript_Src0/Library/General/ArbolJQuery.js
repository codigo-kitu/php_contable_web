//<script type="text/javascript" language="javascript">

class Main {
	mapaCargado=false;	
}

var main=new Main();


jQuery.noConflict();

jQuery(document).ready(function() {
	
	jQuery("#btnCargarMapa").click(function(){
		var strFormQueryString=jQuery("#frmMain").serialize();
			strFormQueryString="controller="+clase+"&action="+action+"&modulo="+modulo+"&"+strFormQueryString;//"&view="+view+
			
			//login.validarLogginOnClick();
		funcionGeneral.mostrarOcultarProcesando(true,"outerBorder");
		
		//alert('http://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+'GlobalController.php'+strFormQueryString);
		//alert(strFormQueryString);
		
		//alert(modulo);
		//alert(view);
		//alert(strFormQueryString);
		
		jQuery.post('http://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+'GlobalController.php', strFormQueryString ,
			function(jsonresult){/*alert(jsonresult);*/})
			
			/*.beforeSend(function(){
				alumnoPaginaWebInteraccion.nuevoAlumnoOnClick();
			})*/
			
			.success(function(jsonresult) {
				var objetoController=jQuery.parseJSON(jsonresult.trim());
				
				//alert(objetoController.htmlAuxiliar);
				
				jQuery("#divArbolAjaxWebPart").html(objetoController.htmlAuxiliar);
				//jQuery("#divArbolAjaxWebPart").html("123456");
				
				//jQuery("#divMapaAjaxWebPart").html(mainController.htmlListaMapaSitio);						
								
				//alumnoJQueryPaginaWebInteraccion.actualizarVariablesPaginaAlumno(alumnoController);
			})
			
			.error(function(){
				alert("OCURRIO ALGUN ERROR, VUELVA A INTERNARLO Y CONSULTE CON EL ADMINISTRADOR");
			})
			
			.complete(function(jsonresult) {
				//login.validarLogginOnComplete();
				funcionGeneral.mostrarOcultarProcesando(false,"outerBorder");
				
				
				
				if(constantes.CON_MENU_JQUERY==true) {
					
				} else if(constantes.CON_ARBOL_MENU==true) {
					
				} else if(constantes.CON_ARBOL_MENU_JQUERY==true) {
					
					if(main.mapaCargado==false) {																							
						main.mapaCargado=true;
				
					} else {						
						jQuery('#divArbolAjaxWebPart').jstree("destroy");
					}
																	
					if(jQuery('#con_expandir').prop('checked')==true) {
						jQuery('#divArbolAjaxWebPart').bind("loaded.jstree", function(event, data) { 
						    data.instance.open_all();
						 });
					}
					
					jQuery('#divArbolAjaxWebPart').jstree();
					
					if(jQuery("#solo_menu").prop('checked')==true) {
						jQuery('#divArbolAjaxWebPart').bind('select_node.jstree', function(e,data) {
							var href = data.node.a_attr.href
							var id = data.node.a_attr.id_actual
							var objeto = data.node.a_attr.objeto
							
							if(href!="#") {
								//funcionGeneral.mostrarOcultarProcesando(true,"outerBorder");				
							}							
														
							//alert(id);
							//alert(objeto);
							
							//alert(window.opener.opcionJQueryPaginaWebInteraccion);
							
							var strFuncionPadreParametros="window.opener."+objeto + "JQueryPaginaWebInteraccion.buscarPorIdGeneral("+id+");";
							
							//alert(strFuncionPadreParametros);
							
							eval(strFuncionPadreParametros);
							
							//window.close();
							
							//window.opener.opcionJQueryPaginaWebInteraccion.buscarPorIdGeneral(id);
														
						    //window.location.href = href; 
						});
					} else {
						//alert("No genera funcionalidad menu");
					}
					
					
					//jQuery('#divArbolAjaxWebPart').bind('select_node.jstree', function(e,data) {
						//MUESTRA TODO, SOLO ES PARA VISUALIZAR
						
						//var href = data.node.a_attr.href
									
					    //window.location.href = href;
					     
					//});					
				}								
			});									
	});		 	
	
	jQuery('#btnCargarMapa').button();	
	
	jQuery("#btnCargarMapa").trigger("click");
	
	/*
	jQuery("#imgCerrarSesion").click(function(){
		var strFormQueryString="controller=Login&action=cerrarSesionGeneral";
			
		jQuery.post('http://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+'GlobalController.php', strFormQueryString ,
			function(jsonresult){
				//alert(jsonresult);
			})
			
			//.beforeSend(function(){
			//	alumnoPaginaWebInteraccion.nuevoAlumnoOnClick();
			//})
			
			.success(function(jsonresult) {						
				var loginController=jQuery.parseJSON(jsonresult.trim());
				
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
	*/
	
	//CARGAR MENU DE ARBOL				
	if(constantes.CON_MENU_JQUERY==true) {
		//jQuery("#menu_principal").menu();
		//jQuery("#menu_principal").menu( "option", "position", { my: "left top", at: "right-130 top+20" } );
	
	} else if(constantes.CON_ARBOL_MENU==true) {
		//if(constantes.STRJQUERYVERSION=='1.8.16') {
		//	initTree();
		//}
		
	} else if(constantes.CON_ARBOL_MENU_JQUERY==true) {
		//alert("here");
		
		/*
		jQuery('#leftSidebar').jstree();
		
		jQuery('#leftSidebar').bind('select_node.jstree', function(e,data) {
			var href = data.node.a_attr.href
			
			if(href!="#") {
				funcionGeneral.mostrarOcultarProcesando(true,"outerBorder");				
			}
			
			//alert(href);
			
			window.location.href = href; 
		});	
		*/	
	}
	
	
	/*
	jQuery("#divLeftSideSlider").slider({
	    animate: true,
	    change: handleLeftSideSliderChange,
	    slide: handleLeftSideSliderSlide
	});
	
	jQuery("#divContentSlider").slider({
	    animate: true,
	    change: handleContentSliderChange,
	    slide: handleContentSliderSlide
	});
	*/
});

//OJO AL FINAL VIENE window.onload = onLoad; 

/*
function handleLeftSideSliderChange(e, ui) {
  var maxScroll = jQuery("#leftSidebar")[0].scrollWidth -  jQuery("#leftSidebar").width();
  //alert(maxScroll);
  jQuery("#leftSidebar").animate({scrollLeft: ui.value * (maxScroll / 100) }, 1000);
}

function handleLeftSideSliderSlide(e, ui) {
  var maxScroll = jQuery("#leftSidebar")[0].scrollWidth - jQuery("#leftSidebar").width();
  
  jQuery("#leftSidebar").attr({scrollLeft: ui.value * (maxScroll / 100) });
}

function handleContentSliderChange(e, ui) {
	  var maxScroll = jQuery("#content")[0].scrollWidth -  jQuery("#content").width();
	  //alert(maxScroll);
	  jQuery("#content").animate({scrollLeft: ui.value * (maxScroll / 100) }, 1000);
}

function handleContentSliderSlide(e, ui) {
	  var maxScroll = jQuery("#content")[0].scrollWidth - jQuery("#content").width();
	  
	  jQuery("#content").attr({scrollLeft: ui.value * (maxScroll / 100) });
}
*/

//</script>