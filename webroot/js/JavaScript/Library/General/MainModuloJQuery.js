//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../General/Constantes.js';
import {FuncionGeneral,funcionGeneral} from '../General/FuncionGeneral.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../General/FuncionGeneralEventoJQuery.js';
import {Login,login} from '../Login/Login.js';

class MainMenu {
	
	actualizarVariablesPagina(mainMenuController) {
		//alert("Here");
		document.querySelector("#divMainModuloAjaxWebPart").innerHTML=mainMenuController.htmlListaMapaSitio;
		
		this.registerTableActionsMainModulo();
		
	}
	
	registerTableActionsMainModulo() {
		
		/*
		var maxima_fila = jQuery('#t-maxima_fila').val();
		var control_name="";
		
		if(maxima_fila!=null && maxima_fila > 0) {
			for (var i = 1; i <= maxima_fila; i++) { 
				
				control_name="btnModulo"+i;
				
				//jQuery("#"+control_name).button();				
			}
		}
		*/				
		
		const buttons = document.querySelectorAll('.imgseleccionarmodulo');
		
		for (const button of buttons) {
			
			button.addEventListener('click', async function () {
				
				//var strFormQueryString="controller=Login&action=cargarOpcionesModulo&";
				
				var idActual=this.getAttribute("idactualmodulo");				
				//var idActual=jQuery(this).attr("idactualmodulo");
				
				//alert("Here=" + idActual);							
				//strFormQueryString=strFormQueryString+"id="+idActual;
				
				const data_req = {
					controller: 'Login',
					action: 'cargarOpcionesModulo',
					id: idActual
				};
				
				//console.log(data_req);
				
				let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req);
		
				
				funcionGeneral.mostrarOcultarProcesando(true,"outerBorder");
				
				try {
					const response = await fetch(funcionGeneralEventoJQuery.getUrlGlobalController(), params_req);
		               
		            const accionController = await response.json();
		
					//SOLO SON AUXILIARES USADOS PARA ABRIR VENTANA EN FUNCION(.complete) login.validarLogginOnComplete();
						
					document.querySelector("#Mensaje-hdnAuxiliarUrlPagina").value=accionController.strAuxiliarUrlPagina;
					document.querySelector("#MensajeHdnAuxiliarUrlPagina").value=accionController.strAuxiliarUrlPagina;
											
					funcionGeneral.mostrarOcultarProcesando(false,"outerBorder");	
						
					login.validarLogginOnComplete();
						
				} catch(error){
					console.error('Error:', error);
					
					alert(constantes.STR_MENSAJE_ERROR_GENERAL);
					
					funcionGeneral.mostrarOcultarProcesando(false,"outerBorder");
				}				
													
			});
		}
	}
	
	async onLoadMainModulo() {
		/*
		var strTypeOnLoadAccion=accionConstante.strTypeOnLoadAccion;
		var strTipoPaginaAuxiliarAccion=accionConstante.strTipoPaginaAuxiliarAccion;
		var strTipoUsuarioAuxiliarAccion=accionConstante.strTipoUsuarioAuxiliarAccion;
		var strES_POPUP=accionConstante.strES_POPUP;
		var strESBUSQUEDA=accionConstante.strESBUSQUEDA;
		var strFUNCIONJS=accionConstante.strFUNCIONJS;
		*/
			
		//var strFormQueryString="strTypeOnLoadAccion="+strTypeOnLoadAccion+"&strTipoPaginaAuxiliarAccion="+strTipoPaginaAuxiliarAccion+"&strTipoUsuarioAuxiliarAccion="+strTipoUsuarioAuxiliarAccion+"&ES_POPUP="+strES_POPUP+"&ESBUSQUEDA="+strESBUSQUEDA+"&FUNCIONJS="+strFUNCIONJS;//constantes.STRUSUARIODEFAULTINVITADO;
		
		//var strFormQueryString="controller=Login&action=cargarMenuModulos";
				
		funcionGeneral.mostrarOcultarProcesando(true,"outerBorder");			
			
		const data_req = {
			controller: 'Login',
			action: 'cargarMenuModulos'
		};
		
		let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
		
		
		try {
			const response = await fetch(funcionGeneralEventoJQuery.getUrlGlobalController(), params_req);
               
            const mainMenuController = await response.json();

			mainMenu.actualizarVariablesPagina(mainMenuController);
							
			funcionGeneral.mostrarOcultarProcesando(false,"outerBorder");	

		} catch(error){
			console.error('Error:', error);
			
			funcionGeneral.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"E");
		}
	}
}

var mainMenu=new MainMenu();

export {MainMenu,mainMenu};

jQuery.noConflict();

jQuery(document).ready(function() {
		
	//CARGAR MENU DE ARBOL				
	if(constantes.CON_MENU_JQUERY==true) {
		
	} else if(constantes.CON_ARBOL_MENU==true) {
				
	} else if(constantes.CON_ARBOL_MENU_JQUERY==true) {		
			
	}
	
	
	document.querySelector("#imgCerrarSesion").addEventListener('click', async () => {
		
		//var strFormQueryString="controller=Login&action=cerrarSesionGeneral";
			
		const data_req = {
			controller: 'Login',
			action: 'cerrarSesionGeneral'
		};
				
		let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req);
		
		try {
			
			const response = await fetch(funcionGeneralEventoJQuery.getUrlGlobalController(), params_req);
	           
	        const mainMenuController = await response.json();
	
			funcionGeneral.mostrarOcultarProcesando(true,"outerBorder");				
								
			window.close();
	
		} catch(error){
			console.error('Error:', error);
			
			alert("OCURRIO ALGUN ERROR, VUELVA A INTERNARLO Y CONSULTE CON EL ADMINISTRADOR");
		}
		
	});
});


//OJO AL FINAL VIENE window.onload = onLoad; 

window.onload = mainMenu.onLoadMainModulo; 

//</script>