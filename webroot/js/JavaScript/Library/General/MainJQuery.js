//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../General/Constantes.js';
import {FuncionGeneral,funcionGeneral} from '../General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../General/FuncionGeneralEventoJQuery.js';

//import {Login,login} from '../Login/Login.js';

class Main {
	mapaCargado=false;
	
	//OJO AL FINAL VIENE window.onload = onLoad; 

	handleLeftSideSliderChange(e, ui) {
	  var maxScroll = jQuery("#leftSidebar")[0].scrollWidth -  jQuery("#leftSidebar").width();
	  //alert(maxScroll);
	  jQuery("#leftSidebar").animate({scrollLeft: ui.value * (maxScroll / 100) }, 1000);
	}

	handleLeftSideSliderSlide(e, ui) {
	  var maxScroll = jQuery("#leftSidebar")[0].scrollWidth - jQuery("#leftSidebar").width();
	  
	  jQuery("#leftSidebar").attr({scrollLeft: ui.value * (maxScroll / 100) });
	}

	handleContentSliderChange(e, ui) {
		  var maxScroll = jQuery("#content")[0].scrollWidth -  jQuery("#content").width();
		  //alert(maxScroll);
		  jQuery("#content").animate({scrollLeft: ui.value * (maxScroll / 100) }, 1000);
	}

	handleContentSliderSlide(e, ui) {
		  var maxScroll = jQuery("#content")[0].scrollWidth - jQuery("#content").width();
		  
		  jQuery("#content").attr({scrollLeft: ui.value * (maxScroll / 100) });
	}
}

var main=new Main();

export {Main,main};


jQuery.noConflict();


jQuery(document).ready(function() {
	//alert("here");
	
	document.querySelector("#btnCargarMapa").addEventListener('click',async () => {
		
		//var strFormQueryString=jQuery("#frmMain").serialize();
		//	strFormQueryString="controller=Login&action=cargarMapaSitio&"+strFormQueryString;
							
		funcionGeneral.mostrarOcultarProcesando(true,"outerBorder");
		
		//alert(strFormQueryString);		
		//alert(document.getElementById("solo_menu").value);
		
		const data_req = {
			controller: 'Login',
			action: 'cargarMapaSitio',
			solo_menu: document.getElementById("solo_menu").value,
			con_expandir: document.getElementById("con_expandir").value,
			con_pagina_nueva: document.getElementById("con_pagina_nueva").value,
		};
		
		let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
	
		
		try {
			const response = await fetch(funcionGeneralEventoJQuery.getUrlGlobalController(), params_req);
               
            const mainController = await response.json();

			document.querySelector("#divMapaAjaxWebPart").innerHTML=mainController.htmlListaMapaSitio;		
			
			//login.validarLogginOnComplete();
			funcionGeneral.mostrarOcultarProcesando(false,"outerBorder");
			
			
			if(constantes.CON_MENU_JQUERY==true) {
				
			} else if(constantes.CON_ARBOL_MENU==true) {
				
			} else if(constantes.CON_ARBOL_MENU_JQUERY==true) {
				if(main.mapaCargado==false) {																							
					main.mapaCargado=true;
			
				} else {						
					jQuery('#divMapaAjaxWebPart').jstree("destroy");
				}
																
				if(jQuery('#con_expandir').prop('checked')==true) {
					
					jQuery('#divMapaAjaxWebPart').bind("loaded.jstree", function(event, data) { 
					    data.instance.open_all();
					 });
				}
				
				jQuery('#divMapaAjaxWebPart').jstree();
				
				if(jQuery("#solo_menu").prop('checked')==true) {
					
					jQuery('#divMapaAjaxWebPart').bind('select_node.jstree', function(e,data) {
						
						var href = data.node.a_attr.href
						
						if(href!="#") {
							funcionGeneral.mostrarOcultarProcesando(true,"outerBorder");				
						}	
						
						if(jQuery("#con_pagina_nueva").prop("checked")==false) {
							window.location.href = href;
							
						} else {
							var strTipo="POPUP";
							var strLink=href;																
							
							//alert(strLink);
							
							strLink=strLink+"&ES_SUB_PAGINA=true&ES_POPUP=true"
							
							funcionGeneralJQuery.procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"Main");
							
							funcionGeneral.mostrarOcultarProcesando(false,"outerBorder");
															
						}
					});
				} else {
					//alert("No genera funcionalidad menu");
				}
				
				
				//jQuery('#divMapaAjaxWebPart').bind('select_node.jstree', function(e,data) {
					//MUESTRA TODO, SOLO ES PARA VISUALIZAR
					
					//var href = data.node.a_attr.href
								
				    //window.location.href = href;
				     
				//});
					
			}	
				
		} catch(error) {
			console.error('Error:', error);
			
			alert("OCURRIO ALGUN ERROR, VUELVA A INTERNARLO Y CONSULTE CON EL ADMINISTRADOR");
		}
										
	});		 	
	
	//jQuery('#btnCargarMapa').button();	
	
	
	document.querySelector("#imgCerrarSesion").addEventListener('click',async () => {
		
		//var strFormQueryString="controller=Login&action=cerrarSesionGeneral";
		
		const data_req = {
			controller: 'Login',
			action: 'cerrarSesionGeneral'
		};
		
		let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
	
		try {
			
			const response = await fetch(funcionGeneralEventoJQuery.getUrlGlobalController(), params_req);
               
            const loginController = await response.json();

			funcionGeneral.mostrarOcultarProcesando(true,"outerBorder");				
								
			window.close();
				
			//login.validarCerrarSesionOnComplete(loginController);	

		} catch(error){
			console.error('Error:', error);
			
			alert("OCURRIO ALGUN ERROR, VUELVA A INTERNARLO Y CONSULTE CON EL ADMINISTRADOR");
		}
						
	});
	
	
	//CARGAR MENU DE ARBOL				
	if(constantes.CON_MENU_JQUERY==true) {
		jQuery("#menu_principal").menu();
		jQuery("#menu_principal").menu( "option", "position", { my: "left top", at: "right-130 top+20" } );
	
	} else if(constantes.CON_ARBOL_MENU==true) {
		if(constantes.STR_JQUERY_VERSION=='1.8.16') {
			initTree();
		}
		
	} else if(constantes.CON_ARBOL_MENU_JQUERY==true) {		
		jQuery('#leftSidebar').jstree();
		
		jQuery('#leftSidebar').bind('select_node.jstree', function(e,data) {
			var href = data.node.a_attr.href
				
			if(href!="#") {
				funcionGeneral.mostrarOcultarProcesando(true,"outerBorder");				
			}	
							
		    window.location.href = href; 
		});		
	}
	
	jQuery("#divLeftSideSlider").slider({
	    animate: true,
	    change: main.handleLeftSideSliderChange,
	    slide: main.handleLeftSideSliderSlide
	});
	
	jQuery("#divContentSlider").slider({
	    animate: true,
	    change: main.handleContentSliderChange,
	    slide: main.handleContentSliderSlide
	});
	
	jQuery("#btnCargarMapa").trigger("click");
	
});

//</script>