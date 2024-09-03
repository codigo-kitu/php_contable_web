//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../General/Constantes.js';
import {FuncionGeneral,funcionGeneral} from '../General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../General/FuncionGeneralJQuery.js';

class FuncionGeneralEventoJQuery {
	
	getUrlGlobalController() {
		var sUrlGlobalController=constantes.STR_PROTOCOL+'://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+constantes.STR_GLOBAL_CONTROLLER;
		
		if(constantes.CON_DEBUG==true) {
			console.log(sUrlGlobalController);
		}
		
		return sUrlGlobalController;
	}
	
	getQueryStringGeneral(sFormQueryString) {
		
		var sFormQueryStringLocal = sFormQueryString;						
		
		// var sUrlQueryString=this.getUrlGlobalController();				
		// alert(sUrlQueryString + "?" + sFormQueryStringLocal);
				
		if(constantes.CON_DEBUG==true) {
			console.log(sFormQueryStringLocal); // sUrlQueryString + "?"
		}
				
		return sFormQueryStringLocal;
	}
	
	getJsonParamsRequest(method1,data_req) {	
		
		let params_req = {
			method: method1, 
			headers: {
			   'Content-Type': 'application/json',
			},
			body: JSON.stringify(data_req),
		};
		
		return params_req;	
	}
	
	getJsObjectFormBusqueda(sNombreClase) {
		const formBusqueda = document.getElementById("frmBusqueda"+sNombreClase);
		const formDataBusqueda = new FormData(formBusqueda);
		const formObjectBusqueda = {};

		for (const [key, value] of formDataBusqueda) {
			let key_final = key.replace('ParamsBuscar-','');
			formObjectBusqueda[key_final] = value
		}

		return formObjectBusqueda;
	}

	getJsObjectFormPaginacion(sNombreClase) {
		const formPaginacion = document.getElementById("frmPaginacion"+sNombreClase);
		const formDataPaginacion = new FormData(formPaginacion);
		const formObjectPaginacion = {};

		for (const [key, value] of formDataPaginacion) {
			let key_final = key.replace('ParamsPaginar-','');
			formObjectPaginacion[key_final] = value
		}

		return formObjectPaginacion;
	}

	getJsObjectFormOrderBy() {		
		const formOrderBy = document.getElementById('frmOrderBy');
		const formDataOrderBy = new FormData(formOrderBy);			
		const formObjectOrderBy = {};

		for (const [key, value] of formDataOrderBy) {
			let key_final = key.replace('to-','');
			formObjectOrderBy[key_final] = value
		}

		return formObjectOrderBy;
	}

	getJsObjectFormMantenimiento(sNombreClase) {
		const formMantenimiento = document.getElementById("frmMantenimiento" + sNombreClase);
		const formDataMantenimiento = new FormData(formMantenimiento);
		const formObjectMantenimiento = {};

		for (const [key, value] of formDataMantenimiento) {
			let key_final = key.replace('form-','');
			formObjectMantenimiento[key_final] = value
		}

		return formObjectMantenimiento;
	}
	
	getJsObjectFormAccionesMantenimiento(sNombreClase) {
		const formAccionesMantenimiento = document.getElementById("frmAccionesMantenimiento" + sNombreClase);
		const formDataAccionesMantenimiento = new FormData(formAccionesMantenimiento);
		const formObjectAccionesMantenimiento = {};

		for (const [key, value] of formDataAccionesMantenimiento) {
			let key_final = key.replace('ParamsPostAccion-','');
			formObjectAccionesMantenimiento[key_final] = value
		}

		return formObjectAccionesMantenimiento;
	}

	getJsObjectFormMantenimientoTotales(sNombreClase) {
		const formMantenimientoTotales = document.getElementById("frmMantenimientoTotales" + sNombreClase);
		const formDataMantenimientoTotales = new FormData(formMantenimientoTotales);
		const formObjectMantenimientoTotales = {};

		for (const [key, value] of formDataMantenimientoTotales) {
			let key_final = key.replace('totales-','');
			formObjectMantenimientoTotales[key_final] = value
		}

		return formObjectMantenimientoTotales;
	}

	getJsObjectFormTablaDatos(sNombreClase) {
		const formTablaDatos = document.getElementById("frmTablaDatos" + sNombreClase);
		const formDataTablaDatos = new FormData(formTablaDatos);
		const formObjectTablaDatos = {};

		for (const [key, value] of formDataTablaDatos) {
			let key_final = key.replace('t-','');
			formObjectTablaDatos[key_final] = value
		}

		return formObjectTablaDatos;
	}

	setBotonNuevoPrepararClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
			
		document.querySelector("#btnNuevoPreparar"+sNombreClase)?.addEventListener('click',async () => {
			
			objetoWebControl.deshabilitarCombosDisabledFK(false);
			
			var sFormQueryString="";			
			let data_req = {};

			if(objetoConstante.BIT_CON_PAGINA_FORM==true) {				
				
				data_req = {
					controller: sNombreClase,
					modulo: sModulo,
					sub_modulo: sSubModulo,
					action: 'nuevoPrepararAbrirPaginaForm',
					ES_RELACIONES: objetoConstante.STR_ES_RELACIONES,
					ES_RELACIONADO: objetoConstante.STR_ES_RELACIONADO			
				};

			} else {
				
				data_req = {
					controller: sNombreClase,
					modulo: sModulo,
					sub_modulo: sSubModulo,
					action: 'nuevoPreparar'			
				};
			}
			
			let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
			
			objetoFuncion.nuevoPrepararOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
					
			try {
				const response = await fetch(sUrlGlobalController,params_req);
				   
				const objetoController = await response.json();
	
				objetoWebControl.actualizarVariablesPagina(objetoController);	
					
				// Este evento esta en el Load Window
				if(objetoConstante.STR_ES_RELACIONES=="true") {
					objetoWebControl.onLoadRecargarRelacionesRelacionados();
				}

				objetoFuncion.nuevoPrepararOnComplete();	
					
				objetoWebControl.deshabilitarCombosDisabledFK(true);

			} catch(error){
				console.error('Error:', error);
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			}
											
		});
						
		var btnNuevoPreparar = document.getElementById("btnNuevoPreparar"+sNombreClase);
		btnNuevoPreparar?.classList.add("ButtonImagenNuevoPreparar");
	}
		
	setBotonNuevoTablaPrepararClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#btnNuevoTablaPreparar"+sNombreClase)?.addEventListener('click',async () => {
			
			if(document.querySelector("#ParamsBuscar-chbConEditar")?.checked==false) {				
				document.querySelector("#ParamsBuscar-chbConEditar").checked=true;				
			}
			
			//var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=nuevoTablaPreparar";
			
			let formObjectPaginacion = {};
			formObjectPaginacion = this.getJsObjectFormPaginacion(sNombreClase);

			const data_req = {
				controller: sNombreClase,
				modulo: sModulo,
				sub_modulo: sSubModulo,
				action: 'nuevoTablaPreparar',
				ParamsPaginar: formObjectPaginacion	
			};
			
			let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 

			//var sFormPaginacionQueryString=jQuery("#frmPaginacion"+sNombreClase).serialize();			
			//sFormQueryString=sFormQueryString+"&"+sFormPaginacionQueryString;												

			objetoFuncion.nuevoTablaPrepararOnClick();				
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			//sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			try {
				const response = await fetch(sUrlGlobalController,params_req);
				   
				const objetoController = await response.json();
	
				objetoWebControl.actualizarVariablesPagina(objetoController);
				
				jQuery("#ParamsPaginar-txtNumeroNuevoTabla"+sNombreClase).val(1);

				objetoFuncion.nuevoTablaPrepararOnComplete();

			} catch(error){
				console.error('Error:', error);
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			} 											
		});
		
		
		var btnNuevoTablaPreparar = document.getElementById("btnNuevoTablaPreparar"+sNombreClase);
		
		btnNuevoTablaPreparar?.classList.add("ButtonImagenNuevoTablaPreparar");		
	}
	
	async ejecutarFuncionNuevoPrepararPaginaFormClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
							
		objetoWebControl.deshabilitarCombosDisabledFK(false);
				
		var sFormQueryString="";
		var sSUFIJO=objetoConstante.STR_SUFIJO;
		
		const data_req = {
			controller: sNombreClase,
			modulo: sModulo,
			sub_modulo: sSubModulo,
			action: 'nuevoPrepararPaginaForm',
			SUFIJO: sSUFIJO
		};

		let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 

		objetoFuncion.nuevoPrepararPaginaFormOnClick();
		
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		//sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		
		try {
			const response = await fetch(sUrlGlobalController,params_req);
				
			const objetoController = await response.json();

			objetoWebControl.actualizarVariablesPagina(objetoController);
			
			if(objetoConstante.STR_ES_RELACIONES=="true") {
				if(objetoConstante.BIT_ES_PAGINA_FORM==true) {
					objetoWebControl.onLoadRecargarRelacionesRelacionados();
				}
			}

			objetoFuncion.nuevoPrepararPaginaFormOnComplete();	
				
			objetoWebControl.deshabilitarCombosDisabledFK(true);

		} catch(error){
			console.error('Error:', error);
			objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
		}														
	}
	
	setBotonGuardarCambiosClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#btnGuardarCambios"+sNombreClase)?.addEventListener('click',async () => {								
			// alert("frmTablaDatos"+sNombreClase);
					
			if(jQuery("#frmTablaDatos"+sNombreClase).valid()==true) {
				
				const formObjectTablaDatos = this.getJsObjectFormTablaDatos(sNombreClase);
				
				const data_req = {
					controller: sNombreClase,
					modulo: sModulo,
					sub_modulo: sSubModulo,
					action: 'guardarCambios',
					t: formObjectTablaDatos			
				};
				
				let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
				
				console.log(data_req);				

				objetoFuncion.guardarCambiosOnClick();
				
				var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
				
				try {
					const response = await fetch(sUrlGlobalController,params_req);
					   
					const objetoController = await response.json();
		
					if(document.querySelector("#ParamsBuscar-chbConEditar")) {
						document.querySelector("#ParamsBuscar-chbConEditar").checked=false;
					}

					objetoWebControl.actualizarVariablesPagina(objetoController);	
					
					// SI SE NECESITA EJECUTAR FUNCION JS PADRE
					if(objetoController.sFuncionJsPadre!=null && objetoController.sFuncionJsPadre!='') {
						eval(objetoController.sFuncionJsPadre);
					}
					
					objetoFuncion.guardarCambiosOnComplete();

				} catch(error){
					console.error('Error:', error);
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				}
						
			} else {
				
				objetoFuncion.mostrarMensaje(true,"TIENE ERRORES EN LOS DATOS, CORRIGALOS ANTES DE GUARDAR","ERROR");												
			}			
		});
		
		var btnGuardarCambios = document.getElementById("btnGuardarCambios"+sNombreClase);
		btnGuardarCambios?.classList.add("ButtonImagenGuardarCambios");		
	}
	
	setBotonDuplicarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#btnDuplicar"+sNombreClase)?.addEventListener('click',async () => {
			
			const formObjectTablaDatos = this.getJsObjectFormTablaDatos(sNombreClase);
			
			//var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=duplicar";
			
			const data_req = {
				controller: sNombreClase,
				modulo: sModulo,
				sub_modulo: sSubModulo,
				action: 'duplicar',
				t: formObjectTablaDatos			
			};

			let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
				
			//var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();				
			//sFormQueryString=sFormQueryString+"&"+sFormTablaQueryString;
			
			if(document.querySelector("#ParamsBuscar-chbConEditar")) {
				document.querySelector("#ParamsBuscar-chbConEditar").checked=true;
			}

			objetoFuncion.duplicarOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			//sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			try {
				const response = await fetch(sUrlGlobalController,params_req);
				   
				const objetoController = await response.json();
	
				objetoWebControl.actualizarVariablesPagina(objetoController);
				
				objetoFuncion.duplicarOnComplete();	

			} catch(error){
				console.error('Error:', error);
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			} 

		});
		
		var btnDuplicar = document.getElementById("btnDuplicar"+sNombreClase);
		
		btnDuplicar?.classList.add("ButtonImagenDuplicar");		
	}
	
	setBotonCopiarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#btnCopiar"+sNombreClase)?.addEventListener('click',async () => {
			
			const formObjectTablaDatos = this.getJsObjectFormTablaDatos(sNombreClase);			
			//var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=copiar";
			
			const data_req = {
				controller: sNombreClase,
				modulo: sModulo,
				sub_modulo: sSubModulo,
				action: 'copiar',
				t: formObjectTablaDatos			
			};

			let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
						
			//var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();				
			//sFormQueryString=sFormQueryString+"&"+sFormTablaQueryString;
			
			if(document.querySelector("#ParamsBuscar-chbConEditar")) {
				document.querySelector("#ParamsBuscar-chbConEditar").checked=true;
			}

			objetoFuncion.copiarOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			//sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			try {
				const response = await fetch(sUrlGlobalController,params_req);
				   
				const objetoController = await response.json();
	
				objetoWebControl.actualizarVariablesPagina(objetoController);
				
				objetoFuncion.copiarOnComplete();

			} catch(error){
				console.error('Error:', error);
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			} 											
		});
		
		var btnCopiar = document.getElementById("btnCopiar"+sNombreClase);
		btnCopiar?.classList.add("ButtonImagenCopiar");		
	}
	
	setBotonRecargarInformacionClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#btnRecargarInformacion"+sNombreClase)?.addEventListener('click',async () => {			

			/*---------------- BUSQUEDA -----------------------*/
			const formObjectBusqueda = this.getJsObjectFormBusqueda(sNombreClase)
						
			/*---------------- ORDER BY -----------------------*/
			const formObjectOrderBy = this.getJsObjectFormOrderBy();
						
			const data_req = {
				controller: sNombreClase,
				modulo: sModulo,
				sub_modulo: sSubModulo,
				action: 'recargarInformacion',
				ParamsBuscar: formObjectBusqueda,
				to: formObjectOrderBy				
			};

			let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
		
			objetoFuncion.buscarOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			try {
				const response = await fetch(sUrlGlobalController,params_req);
				   
				const objetoController = await response.json();
	
				objetoWebControl.actualizarVariablesPagina(objetoController);
				
				objetoFuncion.buscarOnComplete();

			} catch(error){
				console.error('Error:', error);
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			} 										
		});		
				
		var btnRecargarInformacion = document.getElementById("btnRecargarInformacion"+sNombreClase);
		
		btnRecargarInformacion?.classList.add("ButtonImagenRecargarInformacion");
	}
	
	setBotonArbolAbrirClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#btnArbol"+sNombreClase)?.addEventListener('click',async () => {
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=abrirArbol";
			
			var sFormBusquedaQueryString=jQuery("#frmBusqueda"+sNombreClase).serialize();
			
			var sFormOrderByQueryString=jQuery("#frmOrderBy").serialize();
				
			sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString+"&"+sFormOrderByQueryString;
			
			objetoFuncion.buscarOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString,
				function(jsonresult){})
				
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);
					
					objetoController.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(objetoController.strAuxiliarUrlPagina);
					
					objetoFuncion.procesarFinalizacionProcesoAbrirLinkParametros(objetoController.strAuxiliarTipo,objetoController.strAuxiliarUrlPagina);
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					objetoFuncion.buscarOnComplete();	
				});									
		});		
		
		var btnArbol = document.getElementById("btnArbol"+sNombreClase);
		btnArbol?.classList.add("ButtonImagenRecargarInformacion");		
	}
	
	setBotonNuevoClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		document.querySelector("#btnNuevo"+sNombreClase)?.addEventListener('click',async () => {			
			
			var validarMantenimiento=jQuery("#frmMantenimiento"+sNombreClase).valid();
			var validarMantenimientoTotales=true;
			
			if(objetoConstante.BIT_TIENE_CAMPOS_TOTALES==true) {
				validarMantenimientoTotales=jQuery("#frmMantenimientoTotales"+sNombreClase).valid();
			}
			
			if((validarMantenimiento && validarMantenimientoTotales)==true) {
				
				var sFormQueryString=jQuery("#frmMantenimiento"+sNombreClase).serialize();
				
				var sFormQueryStringCamposTotales="";
				
				if(objetoConstante.BIT_TIENE_CAMPOS_TOTALES==true) {
					sFormQueryStringCamposTotales=jQuery("#frmMantenimientoTotales"+sNombreClase).serialize();
					
					sFormQueryString=sFormQueryString + "&" + sFormQueryStringCamposTotales;
				}
				
				
				sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=nuevo&"+sFormQueryString;
				
				objetoFuncion.nuevoOnClick();
				
				var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
					
				sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
				
				jQuery.post(sUrlGlobalController, sFormQueryString ,
					function(jsonresult){})
					
					.success(function(jsonresult) {
						var objetoController=jQuery.parseJSON(jsonresult);
						
						objetoWebControl.actualizarVariablesPagina(objetoController);
					})
					
					.error(function(){
						objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
					})
					
					.complete(function(jsonresult) {
						objetoFuncion.nuevoOnComplete();	
					});

			} else {
				objetoFuncion.mostrarMensaje(true,"TIENE ERRORES EN LOS DATOS, CORRIGALOS ANTES DE GUARDAR","ERROR");				
			}
		});
		
		jQuery("#btnNuevo"+sNombreClase).button();		
	}
	
	setBotonActualizarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		document.querySelector("#btnActualizar"+sNombreClase)?.addEventListener('click',async () => {
			
			var validarMantenimiento = jQuery("#frmMantenimiento"+sNombreClase).valid();
			var validarMantenimientoTotales = true;
			var sSUFIJO = objetoConstante.STR_SUFIJO;
			
			if(objetoConstante.BIT_TIENE_CAMPOS_TOTALES==true) {				
				validarMantenimientoTotales = jQuery("#frmMantenimientoTotales"+sNombreClase).valid();				
			}			
			
			if((validarMantenimiento && validarMantenimientoTotales) == true) {
				
				objetoWebControl.deshabilitarCombosDisabledFK(false);
				
				const formObjectMantenimiento = this.getJsObjectFormMantenimiento(sNombreClase)				
			
				const formObjectMantenimientoTotales = {};

				if(objetoConstante.BIT_TIENE_CAMPOS_TOTALES==true) {// alert("here");
					formObjectMantenimientoTotales = this.getJsObjectFormMantenimientoTotales(sNombreClase);
				}
												
				const formObjectAccionesMantenimiento = this.getJsObjectFormAccionesMantenimiento(sNombreClase);				

				const data_req = {
					controller: sNombreClase,
					modulo: sModulo,
					sub_modulo: sSubModulo,
					action: 'actualizar',
					SUFIJO: sSUFIJO,
					form: formObjectMantenimiento,
					form_acciones: formObjectAccionesMantenimiento,
					form_totales: formObjectMantenimientoTotales				
				};

				let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 				

				objetoFuncion.actualizarOnClick();
								
				var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
									
				try {
					const response = await fetch(sUrlGlobalController,params_req);
					   
					const objetoController = await response.json();
		
					objetoWebControl.actualizarVariablesPagina(objetoController);	
					
					// SI SE NECESITA EJECUTAR FUNCION JS PADRE
					if(objetoController.sFuncionJsPadre!=null && objetoController.sFuncionJsPadre!='') {							
						eval(objetoController.sFuncionJsPadre);
					}
					
					if(document.querySelector("#ParametrosAcciones-chbPostAccionNuevo")?.checked==true) {
						document.querySelector("#btnNuevoPreparar"+sNombreClase).click();
					}

					objetoFuncion.actualizarOnComplete();
						
					objetoWebControl.deshabilitarCombosDisabledFK(true);
	
				} catch(error){
					console.error('Error:', error);
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				} 
				
			} else {
				objetoFuncion.mostrarMensaje(true,"TIENE ERRORES EN LOS DATOS, CORRIGALOS ANTES DE GUARDAR","ERROR");				
			}		
		});
		
		// NO FUNCIONA, NOSE, EN PANTALLA PRINCIPAL SI		
		var btnActualizar = document.getElementById("btnActualizar"+sNombreClase);
		btnActualizar?.classList.add("ButtonImagenActualizar");
	}
	
	setBotonEliminarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		document.querySelector("#btnEliminar"+sNombreClase)?.addEventListener('click',async () => {
			
			objetoWebControl.deshabilitarCombosDisabledFK(false);
			
			const formObjectMantenimiento = this.getJsObjectFormMantenimiento(sNombreClase)
			const formObjectMantenimientoTotales = {};

			if(objetoConstante.BIT_TIENE_CAMPOS_TOTALES==true) {
				formObjectMantenimientoTotales = this.getJsObjectFormMantenimientoTotales(sNombreClase);

				//sFormQueryStringCamposTotales=jQuery("#frmMantenimientoTotales"+sNombreClase).serialize();				
			}

			const data_req = {
				controller: sNombreClase,
				modulo: sModulo,
				sub_modulo: sSubModulo,
				action: 'eliminar',
				form: formObjectMantenimiento,
				form_totales: formObjectMantenimientoTotales				
			};

			let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
		
			console.log(data_req);

			objetoFuncion.eliminarOnClick();
							
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
										
			try {
				const response = await fetch(sUrlGlobalController,params_req);
				   
				const objetoController = await response.json();
	
				objetoWebControl.actualizarVariablesPagina(objetoController);	
					
				// SI SE NECESITA EJECUTAR FUNCION JS PADRE
				if(objetoController.sFuncionJsPadre!=null && objetoController.sFuncionJsPadre!='') {
					eval(objetoController.sFuncionJsPadre);
				}

				objetoFuncion.eliminarOnComplete();	
					
				objetoWebControl.deshabilitarCombosDisabledFK(true);

			} catch(error){
				console.error('Error:', error);
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			}																		
		});
		
		// NO FUNCIONA, NOSE, EN PANTALLA PRINCIPAL SI		
		var btnEliminar = document.getElementById("btnEliminar"+sNombreClase);
		btnEliminar?.classList.add("ButtonImagenEliminar");
	}
	
	setBotonCancelarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		document.querySelector("#btnCancelar"+sNombreClase)?.addEventListener('click',async () => {
			
			const formObjectMantenimiento = this.getJsObjectFormMantenimiento(sNombreClase);
			
			let formObjectMantenimientoTotales = {
				aux: 'aux'
			};
			
			if(objetoConstante.BIT_TIENE_CAMPOS_TOTALES==true) {
				formObjectMantenimientoTotales = this.getJsObjectFormMantenimientoTotales(sNombreClase);
			}
			
			const data_req = {
				controller: sNombreClase,
				modulo: sModulo,
				sub_modulo: sSubModulo,
				action: 'cancelar',
				form: formObjectMantenimiento,
				totales: formObjectMantenimientoTotales				
			};

			let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
		
			//console.log(data_req);

			if(document.querySelector("#ParamsPostAccion-chbPostAccionSinCerrar")) {
				document.querySelector("#ParamsPostAccion-chbPostAccionSinCerrar").checked = false;
			}

			if(document.querySelector("#ParamsPostAccion-chbPostAccionNuevo")) {
				document.querySelector("#ParamsPostAccion-chbPostAccionNuevo").checked = false;
			}

			objetoFuncion.cancelarOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			try {
				const response = await fetch(sUrlGlobalController,params_req);
				   
				const objetoController = await response.json();
	
				objetoWebControl.actualizarVariablesPagina(objetoController);
				
				objetoFuncion.cancelarOnComplete();

			} catch(error){
				console.error('Error:', error);
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			}
									
		});
		
		var btnCancelar = document.getElementById("btnCancelar"+sNombreClase);
		btnCancelar?.classList.add("ButtonImagenCancelar");
	}
	
	setBotonGuardarCambiosFormularioClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		document.querySelector("#btnGuardarCambiosFormulario"+sNombreClase)?.addEventListener('click',async () => {
			
			var validarMantenimiento=jQuery("#frmMantenimiento"+sNombreClase).valid();
			var validarMantenimientoTotales=true;
			
			if(objetoConstante.BIT_TIENE_CAMPOS_TOTALES==true) {
				validarMantenimientoTotales=jQuery("#frmMantenimientoTotales"+sNombreClase).valid();
			}
						
			if((validarMantenimiento && validarMantenimientoTotales)==true) {
				
				var sFormQueryString=jQuery("#frmMantenimiento"+sNombreClase).serialize();
				
				var sFormQueryStringCamposTotales="";
				
				if(objetoConstante.BIT_TIENE_CAMPOS_TOTALES==true) {
					sFormQueryStringCamposTotales=jQuery("#frmMantenimientoTotales"+sNombreClase).serialize();
					
					sFormQueryString=sFormQueryString + "&" + sFormQueryStringCamposTotales;
				}
				
				
				sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=guardarCambios&"+sFormQueryString;
				
				objetoFuncion.guardarCambiosOnClick();
				
				var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
					
				sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
				
				jQuery.post(sUrlGlobalController, sFormQueryString ,
					function(jsonresult){})
					
					.success(function(jsonresult) {
						var objetoController=jQuery.parseJSON(jsonresult);
						
						objetoWebControl.actualizarVariablesPagina(objetoController);															
					})
					
					.error(function(){
						objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
					})
					
					.complete(function(jsonresult) {
						objetoFuncion.guardarCambiosOnComplete();	
					});			
			} else {
				objetoFuncion.mostrarMensaje(true,"TIENE ERRORES EN LOS DATOS, CORRIGALOS ANTES DE GUARDAR","ERROR");				
			}
		});
		
		jQuery("#btnGuardarCambiosFormulario"+sNombreClase).button();		
	}
	
	setBotonAnterioresClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#btnAnteriores"+sNombreClase)?.addEventListener('click',async () => {
								
			const data_req = {
				controller: sNombreClase,
				modulo: sModulo,
				sub_modulo: sSubModulo,
				action: 'anteriores'			
			};

			let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
		
			objetoFuncion.anterioresOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
						
			try {
				const response = await fetch(sUrlGlobalController,params_req);
				   
				const objetoController = await response.json();
	
				objetoWebControl.actualizarVariablesPagina(objetoController);
				
				objetoFuncion.anterioresOnComplete();	

			} catch(error){
				console.error('Error:', error);
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			} 								
		});				
	}
	
	setBotonSiguientesClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#btnSiguientes"+sNombreClase)?.addEventListener('click',async () => {
			
			const data_req = {
				controller: sNombreClase,
				modulo: sModulo,
				sub_modulo: sSubModulo,
				action: 'siguientes'				
			};

			let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
					
			objetoFuncion.siguientesOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			try {
				const response = await fetch(sUrlGlobalController,params_req);
				   
				const objetoController = await response.json();
	
				objetoWebControl.actualizarVariablesPagina(objetoController);
				
				objetoFuncion.siguientesOnComplete();

			} catch(error){
				console.error('Error:', error);
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			} 													
		});				
	}

	setBotonSeleccionarLoteFkClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		document.querySelector("#btnSeleccionarLoteFk"+sNombreClase)?.addEventListener('click',async () => {
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=seleccionarLoteFk";
			var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();
			
			sFormQueryString=sFormQueryString + "&" + sFormTablaQueryString;			
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
						
			var sFuncionPadreParametros=objetoConstante.STR_OBJETO_JS + ".manejarSeleccionarLoteFk(\""+sFormTablaQueryString+"\");";
			
			eval(sFuncionPadreParametros);
			
			window.close();						
		});				
	}
	
	setFuncionPadreDesdeBotonSeleccionarLoteFkClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante,strParametros) {
		
		var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=seleccionarLoteFk";
		
		sFormQueryString=sFormQueryString + "&campo_busqueda=" + objetoConstante.STR_NOMBRE_CAMPO_BUSQUEDA;
		
		sFormQueryString=sFormQueryString+"&"+strParametros;
		
		objetoFuncion.buscarOnClick();
		
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		
		jQuery.post(sUrlGlobalController, sFormQueryString,
			function(jsonresult){})
			
			.success(function(jsonresult) {
				var objetoController=jQuery.parseJSON(jsonresult);
				
				objetoWebControl.actualizarVariablesPagina(objetoController);
				
				objetoFuncion.cancelarOnComplete();
			})
			
			.error(function(){
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			})
			
			.complete(function(jsonresult) {
				objetoFuncion.buscarOnComplete();	
		});	
	}
	
	setImagenNuevoPrepararRegistreseClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#imgNuevoPrepararRegistrese"+sNombreClase)?.addEventListener('click',async () => {
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=nuevoPreparar";
			
			objetoFuncion.nuevoPrepararOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString ,
				function(jsonresult){})
								
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					objetoFuncion.nuevoPrepararOnComplete();	
				});									
		});
		
		jQuery("#imgNuevoPrepararRegistrese"+sNombreClase).button();		
	}
	
	setImagenCerrarSesionClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		document.querySelector("#imgCerrarSesion")?.addEventListener('click',async () => {
			var sFormQueryString="controller=Login&action=cerrarSesionGeneral";
				
			objetoFuncion.procesarInicioProceso(objetoConstante);
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString ,
				function(jsonresult){/* alert(jsonresult); */})			
				
				.success(function(jsonresult) {						
					var loginController=jQuery.parseJSON(jsonresult);
					
					objetoFuncion.procesarFinalizacionProceso(objetoConstante,sNombreClase);
									
					window.close();
				})
				
				.error(function(){
					alert("OCURRIO ALGUN ERROR, VUELVA A INTERNARLO Y CONSULTE CON EL ADMINISTRADOR");
				})
				
				.complete(function(jsonresult) {
					
				});			
		});
	}
	
	setImagenForeingKeyAbrirClic(sNombreClaseFk,sNombreColumnaFk,sModuloFk,sSubModuloFk,objetoFuncion,objetoWebControl,objetoConstante) {
		
		document.querySelector("#form"+objetoConstante.STR_SUFIJO+"-"+sNombreColumnaFk+"_img")?.addEventListener('click',async () => {
			
			var sFormQueryStringForeignKeyColumna=funcionGeneral.getUrlStringPartAuxiliar(sNombreClaseFk);
			var sUrlQueryStringForeignKeyColumna="view="+sNombreClaseFk+"&modulo="+sModuloFk+"&sub_modulo="+ sSubModuloFk + sFormQueryStringForeignKeyColumna;
	
			sUrlQueryStringForeignKeyColumna=funcionGeneralEventoJQuery.getQueryStringGeneral(sUrlQueryStringForeignKeyColumna);
			
			funcionGeneral.openWindowAuxiliar("",sUrlQueryStringForeignKeyColumna);
		});				
	}
		
	setImagenForeingKeyAbrirBusquedaClic(sNombreClase,sNombreClaseFk,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=abrirBusqueda"+/* sNombreClase+ */"Para"+sNombreClaseFk+"&";
		
		sFormQueryString=sFormQueryString;// +"id="+idActual;
		
		objetoFuncion.procesarInicioProceso(objetoConstante);

		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		
		jQuery.post(sUrlGlobalController, sFormQueryString ,			
			function(jsonresult){/* alert("A"); */})
			
			.success(function(jsonresult) {
				var objetoController=jQuery.parseJSON(jsonresult);

				objetoWebControl.actualizarVariablesPagina(objetoController);

				objetoController.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(objetoController.strAuxiliarUrlPagina);

				objetoFuncion.procesarFinalizacionProcesoAbrirLinkParametros(objetoController.strAuxiliarTipo,objetoController.strAuxiliarUrlPagina);
			})

			.error(function(){
				alert("OCURRIO ALGUN ERROR, VUELVA A INTERNARLO Y CONSULTE CON EL ADMINISTRADOR");
			})

			.complete(function(jsonresult) {
				objetoFuncion.procesarFinalizacionProceso(objetoConstante,sNombreClase);
			});
	}
	
	setBotonCancelarArchivoActualClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#btnCancelarArchivoActual"+sNombreClase)?.addEventListener('click',async () => {
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=NONE";
			
			objetoFuncion.cancelarActualArchivoOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString,
				function(jsonresult){})
				
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					objetoFuncion.cancelarActualArchivoOnComplete();	
					objetoFuncion.seleccionarOnComplete();	
				});									
		});
	}
	
	setBotonImprimirClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		// IMPRIMIR SOLO FORMULARIO DATOS
		document.querySelector("#btnImprimir"+sNombreClase)?.addEventListener('click',async () => {
			
			// SE ACTUALIZA VALORES DE FORMULARIO(HTML), PARA QUE SE PUEDAN
			// COPIAR
			jQuery("#frmMantenimiento"+sNombreClase+" input, #frmMantenimiento"+sNombreClase+" select, #frmMantenimiento"+sNombreClase+" textarea").each(function () {
			    if (jQuery(this).is("[type='radio']") || jQuery(this).is("[type='checkbox']")) {
			        if (jQuery(this).prop("checked")) {
			            jQuery(this).attr("checked", "checked");
			        } else {
			            jQuery(this).removeAttr("checked");
			        }
			    } else {
			        if (jQuery(this).is("select")) {
			            jQuery(this).find(":selected").attr("selected", "selected");
			        } else {
			            jQuery(this).attr("value", jQuery(this).val());
			            
			            if (jQuery(this).is("textarea")) {
			            	jQuery(this).text(jQuery(this).val());
			            }
			        }
			    }
			});
						
			objetoWebControl.imprimirPaginaFormImprimirWithStyles(sNombreClase);
		});		
	}
	
	setImagenSeleccionarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {		
		
		jQuery("#tblTablaDatos"+sNombreClase+"s").on("click",".imgseleccionar"+sNombreClase.toLowerCase(), function () {
			var idActual=this.getAttribute("idactual"+sNombreClase.toLowerCase());
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClicBase(idActual,sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante);
		});
	}
	
	async setImagenSeleccionarClicBase(idActual,sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {		
		
		objetoConstante.ESTA_MODO_SELECCIONAR=true;						
		
		let data_req = {};
		
		if(objetoConstante.BIT_CON_PAGINA_FORM==true) {
			
			data_req = {
				controller: sNombreClase,
				modulo: sModulo,
				sub_modulo: sSubModulo,
				action: 'seleccionarActualAbrirPaginaForm',
				id: idActual
			};

		} else {
			
			data_req = {
				controller: sNombreClase,
				modulo: sModulo,
				sub_modulo: sSubModulo,
				action: 'seleccionarActual',
				id: idActual
			};
		}
		
		let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
		
		objetoFuncion.seleccionarOnClick();
				
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		try {
			const response = await fetch(sUrlGlobalController,params_req);
				
			const objetoController = await response.json();

			objetoWebControl.actualizarVariablesPagina(objetoController);	
			
			if(objetoConstante.STR_ES_RELACIONES=="true") {
				objetoWebControl.onLoadRecargarRelacionesRelacionados();
			}

			objetoFuncion.seleccionarOnComplete();
				
			objetoConstante.ESTA_MODO_SELECCIONAR=false;
			
			// SE DESHABILITA OBLIGADO
			objetoWebControl.deshabilitarCombosDisabledFK(true);

		} catch(error){
			console.error('Error:', error);
			objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
		} 		
	}
	
	async ejecutarImagenSeleccionarClicBase(idActual,sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {		
		
		objetoConstante.ESTA_MODO_SELECCIONAR=true;						
				
		const data_req = {
			controller: sNombreClase,
			modulo: sModulo,
			sub_modulo: sSubModulo,
			action: 'seleccionarActualPaginaForm',
			id: idActual
		};

		let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 

		objetoFuncion.seleccionarPaginaFormOnClick();
				
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
				
		try {
			const response = await fetch(sUrlGlobalController,params_req);
			   
			const objetoController = await response.json();

			objetoWebControl.actualizarVariablesPagina(objetoController);
			
			if(objetoConstante.STR_ES_RELACIONES=="true") {
				if(objetoConstante.BIT_ES_PAGINA_FORM==true) {
					objetoWebControl.onLoadRecargarRelacionesRelacionados();
				}
			}

			objetoFuncion.seleccionarPaginaFormOnComplete();
				
			objetoConstante.ESTA_MODO_SELECCIONAR=false;
			
			// SE DESHABILITA OBLIGADO
			objetoWebControl.deshabilitarCombosDisabledFK(true);

		} catch(error){
			console.error('Error:', error);
			objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
		}									
	}
	
	setImagenEliminarTablaClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		// ELIMINAR TABLA
		jQuery("#tblTablaDatos"+sNombreClase+"s").on("click",".imgeliminartabla"+sNombreClase.toLowerCase(), async function () {
			
			//var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=eliminarTabla&";
			//var idActual=jQuery(this).attr("idactual"+sNombreClase.toLowerCase());
			
			var idActual=this.getAttribute("idactual"+sNombreClase.toLowerCase());			

			const data_req = {
				controller: sNombreClase,
				modulo: sModulo,
				sub_modulo: sSubModulo,
				action: 'eliminarTabla',
				id: idActual		
			};
			
			let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
			
			//sFormQueryString=sFormQueryString+"id="+idActual;
			
			objetoFuncion.eliminarTablaOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			//sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			try {
				const response = await fetch(sUrlGlobalController,params_req);
				   
				const objetoController = await response.json();
	
				objetoWebControl.actualizarVariablesPagina(objetoController);
				
				objetoFuncion.eliminarTablaOnComplete();

			} catch(error){
				console.error('Error:', error);
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			}										
		});			
	}
	
	setImagenSeleccionarMostrarAccionesRelacionesClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		// MOSTRAR ACCIONES RELACIONES
		
		jQuery("#tblTablaDatos"+sNombreClase+"s").on("click",".imgseleccionarmostraraccionesrelaciones"+sNombreClase.toLowerCase(), async function () {
			
			//var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=mostrarEjecutarAccionesRelaciones&";
			
			var idActual=this.getAttribute("idactual"+sNombreClase.toLowerCase());
			
			const data_req = {
				controller: sNombreClase,
				modulo: sModulo,
				sub_modulo: sSubModulo,
				action: 'mostrarEjecutarAccionesRelaciones',
				id: idActual
			};
			
			let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req);
			
			//sFormQueryString=sFormQueryString+"id="+idActual;
			
			objetoFuncion.seleccionarMostrarDivAccionesRelacionesActualOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			//sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			try {
				const response = await fetch(sUrlGlobalController,params_req);
				   
				const objetoController = await response.json();
	
				objetoWebControl.actualizarVariablesPagina(objetoController);
				
				objetoFuncion.seleccionarMostrarDivAccionesRelacionesActualOnComplete();	

			} catch(error){
				console.error('Error:', error);
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			} 											
		});
	}
	
	setImagenSeleccionarBusquedaClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		// SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		
		jQuery("#tblTablaDatos"+sNombreClase+"s").on("click",".imgseleccionar"+sNombreClase.toLowerCase(), function () {
				
			var sFuncionJsActual=jQuery(this).attr("funcionjsactual"+sNombreClase.toLowerCase());				
			
			eval(sFuncionJsActual);
			
			window.close();						
		});		
	}
	
	async registrarSesionMaestroParaDetalle(idActual,sNombreClase,sNombreClaseRelacionado,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante,sPlural,sNombreAdicional) {
		
		//var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=registrarSesion"+/* sNombreClase+sNombreAdicional+ */"Para"+sNombreClaseRelacionado+sPlural+"&";
		//sFormQueryString=sFormQueryString+"id="+idActual;
		
		const data_req = {
			controller: sNombreClase,
			modulo: sModulo,
			sub_modulo: sSubModulo,
			action: 'registrarSesionPara' + sNombreClaseRelacionado + sPlural,
			id: idActual			
		};

		//console.log(data_req)

		let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 

		objetoFuncion.procesarInicioProceso(objetoConstante);
				
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		//sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		
		try {
			const response = await fetch(sUrlGlobalController,params_req);
			   
			const objetoController = await response.json();

			objetoWebControl.actualizarVariablesPagina(objetoController);
				
			objetoController.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(objetoController.strAuxiliarUrlPagina);
				
			objetoFuncion.procesarFinalizacionProcesoAbrirLinkParametros(objetoController.strAuxiliarTipo,objetoController.strAuxiliarUrlPagina);

			objetoFuncion.procesarFinalizacionProceso(objetoConstante,sNombreClase);

		} catch(error){
			console.error('Error:', error);
			alert("OCURRIO ALGUN ERROR, VUELVA A INTERNARLO Y CONSULTE CON EL ADMINISTRADOR");
			//objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
		} 
	}
	
	setQuitarRelacionesReporte(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=quitarRelacionesReporte&";

		objetoFuncion.procesarInicioProceso(objetoConstante);
		
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		
		jQuery.post(sUrlGlobalController, sFormQueryString ,
			function(jsonresult){/* alert("A"); */})

			.success(function(jsonresult) {
				var objetoController=jQuery.parseJSON(jsonresult);

				objetoWebControl.actualizarVariablesPagina(objetoController);
								
			})

			.error(function(){
				alert("OCURRIO ALGUN ERROR, VUELVA A INTERNARLO Y CONSULTE CON EL ADMINISTRADOR");
			})

			.complete(function(jsonresult) {
				
				objetoFuncion.procesarFinalizacionProceso(objetoConstante,sNombreClase);
			});
	}

	setCheckSeleccionarTodosChange(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#ParamsBuscar-chbSelTodos")?.addEventListener('change',() => {						
			funcionGeneralJQuery.seleccionarTodos();			
		});		
	}
	
	setCheckConAltoMaximoTablaChange(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#ParamsBuscar-chbConAltoMaximoTabla")?.addEventListener('change',() => {
			funcionGeneralJQuery.cambiarAltoMaximoTabla(sNombreClase,"300px");									
		});		
	}
	
	setCheckPostAccionNuevoChange(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#ParamsPostAccion-chbPostAccionNuevo")?.addEventListener('change',() => {
			if(document.querySelector("#ParamsPostAccion-chbPostAccionNuevo")?.checked==true) {
				document.querySelector("#ParamsPostAccion-chbPostAccionSinCerrar").checked=false;
			}
		});		
	}
	
	setCheckPostAccionSinCerrarChange(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#ParamsPostAccion-chbPostAccionSinCerrar")?.addEventListener('change',() => {
			if(document.querySelector("#ParamsPostAccion-chbPostAccionSinCerrar")?.checked==true) {
				document.querySelector("#ParamsPostAccion-chbPostAccionNuevo").checked=false;			
			}
		});	
	}
	
	setCheckConEditarRelacionadoChange(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,sSufijoControl) {
		this.setCheckConEditarChangeInterno(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,sSufijoControl);
	}
	
	setCheckConEditarChange(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		this.setCheckConEditarChangeInterno(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,"");
	}
	
	setCheckConEditarChangeInterno(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,sSufijoControl) {
		
		document.querySelector("#ParamsBuscar-chbConEditar"+sSufijoControl)?.addEventListener('change',async () => {
			
					
			const formObjectBusqueda = this.getJsObjectFormBusqueda(sNombreClase)

			let formObjectPaginacion = {};

			if(sSufijoControl!="") {
				formObjectPaginacion = this.getJsObjectFormPaginacion(sNombreClase);			
			}
			
			const data_req = {
				controller: sNombreClase,
				modulo: sModulo,
				sub_modulo: sSubModulo,
				action: 'editarTablaDatos',
				ParamsBuscar: formObjectBusqueda,
				ParamsPaginar: formObjectPaginacion				
			};
							
			let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 
		
			objetoFuncion.editarTablaDatosOnClick();
				
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
							
			try {
				const response = await fetch(sUrlGlobalController,params_req);
					
				const objetoController = await response.json();
	
				objetoWebControl.actualizarVariablesPagina(objetoController);
				
				objetoFuncion.editarTablaDatosOnComplete();	

			} catch(error){
				console.error('Error:', error);
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			}
		});
	}
	
	setCombosRelacionesSelect2() {
		jQuery("#ParamsBuscar-cmbTiposRelaciones").select2();
		
		jQuery("#ParamsPostAccion-cmbTiposRelacionesFormulario").select2();
	}
	
	setDefectoCombosRelaciones() {
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
		
		if(jQuery("#ParamsPostAccion-cmbTiposRelacionesFormulario").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsPostAccion-cmbTiposRelacionesFormulario").val(constantes.STR_RELACIONES).trigger("change");
		}
	}
	
	setComboTiposColumnas(objetoFuncion) {
		
		document.querySelector("#ParamsBuscar-cmbTiposColumnasSelect")?.addEventListener('change', () => {
			var sValueTipoColumna=jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val();
			
			var idActual=0;
			
			objetoFuncion.setTipoColumnaAccion(sValueTipoColumna,idActual);			
		});
	}
	
	setComboTiposRelaciones(objetoFuncion,objetoWebControl) {
		
		document.querySelector("#ParamsBuscar-cmbTiposRelaciones")?.addEventListener('change',() => {
			
			var sValueTipoRelacion=jQuery("#ParamsBuscar-cmbTiposRelaciones").val();
			
			var iNumSeleccionados=0;
			var idActual=0;
			
			if(sValueTipoRelacion!=constantes.STR_RELACIONES && sValueTipoRelacion!=null) {
				// DEBE SELECCIONAR SOLAMENTE 1
				jQuery(".chkb_id").each(function() {
					if(jQuery(this).prop('checked')==true) {
						iNumSeleccionados=iNumSeleccionados + 1;
						
						// idActual=jQuery(this).prop('idactualguiaremision');
						idActual=jQuery(this).val();
						
						if(iNumSeleccionados>1) {
							return false;
						}
					}
				});
				
				if(idActual==null) {
					idActual=0;	
				}
				
				if(iNumSeleccionados==1) {
					objetoFuncion.setTipoRelacionAccion(sValueTipoRelacion,idActual,objetoWebControl);
					
				} else {
					if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
						jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
					}
							
					objetoFuncion.resaltarRestaurarDivMensaje(true,"ERROR:DEBE SELECCIONAR 1 REGISTRO","ERROR");				
				}
			}
		});	
	}
	
	setComboTiposRelacionesFormulario(objetoFuncion,objetoWebControl) {
		
		document.querySelector("#ParamsPostAccion-cmbTiposRelacionesFormulario")?.addEventListener('change', () => {
			
			var sValueTipoRelacion=jQuery("#ParamsPostAccion-cmbTiposRelacionesFormulario").val();
			
			var iNumSeleccionados=0;
			var idActual=0;
			
			if(sValueTipoRelacion!=constantes.STR_RELACIONES && sValueTipoRelacion!=null) {
				
				idActual=jQuery("#form-id").val();
				
				if(idActual!=null && idActual>-1) {
					if(jQuery("#ParamsPostAccion-cmbTiposRelacionesFormulario").val() != constantes.STR_RELACIONES) {
						jQuery("#ParamsPostAccion-cmbTiposRelacionesFormulario").val(constantes.STR_RELACIONES).trigger("change");
					}
					
					if(sValueTipoRelacion=="NONE") {
							
					} else {
						objetoFuncion.setTipoRelacionAccion(sValueTipoRelacion,idActual,objetoWebControl);						
					}	
					
				} else {
					if(jQuery("#ParamsBuscar-cmbTiposRelacionesFormulario").val() != constantes.STR_RELACIONES) {
						jQuery("#ParamsBuscar-cmbTiposRelacionesFormulario").val(constantes.STR_RELACIONES).trigger("change");
					}
							
					objetoFuncion.resaltarRestaurarDivMensaje(true,"ERROR:CODIGO DEL REGISTRO INCORRECTO","ERROR");
				}
			}
		});	
	}
	
	setComboAccionChange(sNombreClase,sModulo,sSubModulo,sNombreColumna,nombreCombo,strConEventUpdates,strConEventUpdatesNinguno,paraEventoTabla,idFilaTabla,objetoFuncion,objetoWebControl,objetoConstante) {
		
		document.querySelector("#"+nombreCombo+"")?.addEventListener('change',() => {

			objetoWebControl.deshabilitarCombosDisabledFK(false);
			
			var sRecargarFkTipos=strConEventUpdates;
			var sRecargarFkTiposNinguno=strConEventUpdatesNinguno;
			var sRecargarFkColumna=sNombreColumna;
			var iRecargarFkIdPadre=jQuery("#"+nombreCombo+"").val();
			var sQueryString="";
			var sFormQueryString="";
			var sFormTotalesQueryString="";
			
			if(!paraEventoTabla) {
				sFormQueryString=jQuery("#frmMantenimiento"+sNombreClase).serialize();
				sFormTotalesQueryString=jQuery("#frmMantenimientoTotales"+sNombreClase).serialize();
				
				sFormQueryString+= ("&" + sFormTotalesQueryString);
				
			} else {
				sFormQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();
			}
			
			sQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=recargarFormularioGeneral";
			sQueryString+="&sRecargarFkTipos="+sRecargarFkTipos+"&sRecargarFkTiposNinguno="+sRecargarFkTiposNinguno+"&sRecargarFkColumna="+sRecargarFkColumna+"&iRecargarFkIdPadre="+iRecargarFkIdPadre;
			sQueryString+="&evento_control="+nombreCombo+"&evento_tipo=change&es_evento_tabla="+paraEventoTabla+"&id_fila_tabla="+idFilaTabla+"&";			
			sQueryString+=sFormQueryString;
			
			if(iRecargarFkIdPadre==null || iRecargarFkIdPadre==-999) {
				// CASO CONTRARIO LLAMA MUCHO A RECARGAR(NUEVO,CANCELAR,ETC)
				return;
			}

			if(objetoConstante.ESTA_MODO_SELECCIONAR==true) {
				// PARA QUE NO SE EJECUTE SOLO AL SELECCIONAR
				return;
			}
			
			objetoFuncion.procesarOnClick();

			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sQueryString);
			
			jQuery.post(sUrlGlobalController, sQueryString ,
				function(jsonresult){})				

				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);

					objetoWebControl.manejarComboActionChange(sNombreColumna,nombreCombo,sRecargarFkTipos,objetoController);										
				})

				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"E");
				})

				.complete(function(jsonresult) {
					objetoFuncion.procesarOnComplete();

					objetoWebControl.deshabilitarCombosDisabledFK(true);
				});
		});
	}
	
	setTextoAccionChange(sNombreClase,sModulo,sSubModulo,sNombreColumna,nombreTexto,strConEventUpdates,strConEventUpdatesNinguno,paraEventoTabla,idFilaTabla,objetoFuncion,objetoWebControl,objetoConstante) {
		
		jQuery("#"+nombreTexto+"").change(function(){

			objetoWebControl.deshabilitarCombosDisabledFK(false);
			
			var sQueryString="";
			var sFormQueryString="";
			var sFormTotalesQueryString="";
			
			sFormQueryString=jQuery("#frmMantenimiento"+sNombreClase).serialize();
			sFormTotalesQueryString=jQuery("#frmMantenimientoTotales"+sNombreClase).serialize();
			
			sFormQueryString+=("&" + sFormTotalesQueryString);
			
			sQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=manejarEventos";
			sQueryString+="&evento_control="+nombreTexto+"&evento_tipo=change&";
			sQueryString+=sFormQueryString;

			if(objetoConstante.ESTA_MODO_SELECCIONAR==true) {
				// PARA QUE NO SE EJECUTE SOLO AL SELECCIONAR
				return;
			}

			objetoFuncion.procesarOnClick();

			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			jQuery.post(sUrlGlobalController, sQueryString ,
				function(jsonresult){})			

				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);

					objetoWebControl.actualizarVariablesPagina(objetoController);
				})

			.error(function(){
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"E");
			})

			.complete(function(jsonresult) {
				objetoFuncion.procesarOnComplete();

				objetoWebControl.deshabilitarCombosDisabledFK(true);
			});
		});
	}
	
	recargarFormularioGeneral(sNombreClase,sModulo,sSubModulo,sNombreColumna,nombreTexto,strConEventUpdates,strConEventUpdatesNinguno,paraEventoTabla,idFilaTabla,objetoFuncion,objetoWebControl,objetoConstante) {
		
		objetoWebControl.deshabilitarCombosDisabledFK(false);
		
		var sQueryString="";
		var sFormQueryString="";
		var sFormTotalesQueryString="";
		
		sFormQueryString=jQuery("#frmMantenimiento"+sNombreClase).serialize();
		sFormTotalesQueryString=jQuery("#frmMantenimientoTotales"+sNombreClase).serialize();
		
		sFormQueryString+=("&" + sFormTotalesQueryString);
		
		sQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=recargarFormularioGeneral";
		sQueryString+="&evento_control="+nombreTexto+"&evento_tipo=change&";
		sQueryString+=sFormQueryString;
		
		if(objetoConstante.ESTA_MODO_SELECCIONAR==true) {
			// PARA QUE NO SE EJECUTE SOLO AL SELECCIONAR
			return;
		}

		objetoFuncion.procesarOnClick();
		// alert(sFormQueryString);
		
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		jQuery.post(sUrlGlobalController, sQueryString ,
			function(jsonresult){})
			
			.success(function(jsonresult) {
				var objetoController=jQuery.parseJSON(jsonresult);
				// alert("JSON OK");
				objetoWebControl.actualizarVariablesPagina(objetoController);
			})

		.error(function(){
			objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"E");
		})

		.complete(function(jsonresult) {
			objetoFuncion.procesarOnComplete();

			objetoWebControl.deshabilitarCombosDisabledFK(true);
		});		
	}
	
	setDivAccionesRelacionesConfig(sNombreClase) {
		jQuery.fx.speeds._default = 1000;
		
		var selectedEffect = "explode";// "explode";
		var selectedEffectHide = "fold";// "explode";
	
		var dayToday=null;
				
		var dayToday=Math.floor(Math.random()*13)+1
			
		if(dayToday==1) {selectedEffect = "blind";selectedEffectHide="explode";}
		else if(dayToday==2){selectedEffect = "explode";selectedEffectHide="clip";}
		else if(dayToday==3){selectedEffect = "clip";selectedEffectHide="fold";}
		else if(dayToday==4){selectedEffect = "fold";selectedEffectHide="highlight";}
		else if(dayToday==5){selectedEffect = "highlight";selectedEffectHide="scale";}
		else if(dayToday==6){selectedEffect = "slide";selectedEffectHide="size";}
		else if(dayToday==7){selectedEffect = "scale";selectedEffectHide="fold";}
		else if(dayToday==8){selectedEffect = "clip";selectedEffectHide="drop";}
		else if(dayToday==9){selectedEffect = "drop";selectedEffectHide="puff";}
		else if(dayToday==10){selectedEffect = "puff";selectedEffectHide="clip";}
		else if(dayToday==11){selectedEffect = "fold";selectedEffectHide="slide";}
		else if(dayToday==12){selectedEffect = "slide";selectedEffectHide="highlight";}
		else if(dayToday==13){selectedEffect = "puff";selectedEffectHide="fold";}		
		
		jQuery("#divAccionesRelaciones"+sNombreClase+"AjaxWebPart").dialog({
				autoOpen: false,
				width: 750,
				modal: true,
				draggable: true,
				resizable: true,
				show: selectedEffect,					
				hide: selectedEffectHide,
				title: '',
				position: 'top,left',
				buttons: [
						{
							text: "Cerrar",
							click: function() { jQuery("#divAccionesRelaciones"+sNombreClase+"AjaxWebPart").dialog("close"); }
						}
					]
			});		
	
		jQuery("#divAccionesRelaciones"+sNombreClase+"AjaxWebPart").bind("dialogclose", function(event, ui) {
			document.getElementById("outerBorder").style.filter='alpha(opacity=100)';
			document.getElementById("outerBorder").style.opacity='1';
		});
	}
	
	setDivResumenActualConfig(sNombreClase) {
		jQuery.fx.speeds._default = 1000;
		
		var selectedEffect = "explode";// "explode";
		var selectedEffectHide = "fold";// "explode";
	
		var dayToday=null;
				
		var dayToday=Math.floor(Math.random()*13)+1
			
		if(dayToday==1) {selectedEffect = "blind";selectedEffectHide="explode";}
		else if(dayToday==2){selectedEffect = "explode";selectedEffectHide="clip";}
		else if(dayToday==3){selectedEffect = "clip";selectedEffectHide="fold";}
		else if(dayToday==4){selectedEffect = "fold";selectedEffectHide="highlight";}
		else if(dayToday==5){selectedEffect = "highlight";selectedEffectHide="scale";}
		else if(dayToday==6){selectedEffect = "slide";selectedEffectHide="size";}
		else if(dayToday==7){selectedEffect = "scale";selectedEffectHide="fold";}
		else if(dayToday==8){selectedEffect = "clip";selectedEffectHide="drop";}
		else if(dayToday==9){selectedEffect = "drop";selectedEffectHide="puff";}
		else if(dayToday==10){selectedEffect = "puff";selectedEffectHide="clip";}
		else if(dayToday==11){selectedEffect = "fold";selectedEffectHide="slide";}
		else if(dayToday==12){selectedEffect = "slide";selectedEffectHide="highlight";}
		else if(dayToday==13){selectedEffect = "puff";selectedEffectHide="fold";}
								
		jQuery("#divResumen"+sNombreClase+"ActualAjaxWebPart").dialog({
				autoOpen: false,
				width: 750,
				modal: true,
				draggable: true,
				resizable: true,
				show: selectedEffect,					
				hide: selectedEffectHide,
				title: '',
				position: 'top,left',
				buttons: [
						{
							text: "Cerrar",
							click: function() { jQuery("#divResumen"+sNombreClase+"ActualAjaxWebPart").dialog("close"); }
						}
					]
			});		
	
		jQuery("#divResumen"+sNombreClase+"ActualAjaxWebPart").bind("dialogclose", function(event, ui) {
			document.getElementById("outerBorder").style.filter='alpha(opacity=100)';
			document.getElementById("outerBorder").style.opacity='1';
		});
	}
	
	setComboAccionesChange(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		// COPIADO DE BOTON GENERAR REPORTE
		document.querySelector("#ParamsBuscar-cmbAcciones")?.addEventListener('change',() => {
			var sTypeOnLoadTipoUrl="onload";
			var sFormQueryString="";// "sTypeOnLoadTipoUrl="+sTypeOnLoadTipoUrl+"&sTipoPaginaAuxiliarTipoUrl=none&sTipoUsuarioAuxiliarTipoUrl="+constantes.STRUSUARIODEFAULTINVITADO;
			
			var sFormOrderByQueryString=jQuery("#frmOrderBy").serialize();
			var sFormOrderByQueryStringRel=jQuery("#frmOrderByRel").serialize();
			
				// sFormQueryString=sFormQueryString+"&"+sFormOrderByQueryString;
			
			var sAction="generarFpdf";
			var sActionTipo="";
			var sTipoReporte="";
			var sParametrosReporte="pdf";
			
			var sValueGenerarReporte=jQuery("#ParamsBuscar-cmbGenerarReporte").val();
			var strValueTipoReporte=jQuery("#ParamsBuscar-cmbTiposReporte").val();
			var sValueAccion=jQuery("#ParamsBuscar-cmbAcciones").val();
						
			if(sValueAccion=="GENERAR_REPORTE") { // "GENERAR_REPORTE_FORM"
			
				if(sValueGenerarReporte!="HTML2") {
					var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();
								
					if(strValueTipoReporte=="FORMULARIO") {// "GENERAR_REPORTE_FORM"
						sActionTipo="Vertical";
						
					} else if(strValueTipoReporte=="RELACIONES") {// "GENERAR_REPORTE_FORM"
						sActionTipo="Relaciones";
					}
					//alert(sActionTipo);
					if(sValueGenerarReporte!="PDF") {
						sAction="generarReporteConPhpExcel"+sActionTipo;
						sValueGenerarReporte=sValueGenerarReporte.toLowerCase();			
					}
					
					sParametrosReporte="&action="+sAction+"&tipo_reporte="+sValueGenerarReporte;
					
					sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+""+sParametrosReporte+"&"+sFormOrderByQueryString+"&"+sFormTablaQueryString;
										
					if(strValueTipoReporte=="RELACIONES") {
						sFormQueryString=sFormQueryString+"&"+sFormOrderByQueryStringRel;
					}
										
					// OJO ES RECURSIVO 1 VEZ
					if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
						jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
					}
					
					var existe=true;
					//alert(strValueTipoReporte);	
					if(strValueTipoReporte=="RELACIONES" || strValueTipoReporte=="FORMULARIO") {
						existe=false;
						
						// REPORTE PUEDE SER MUY EXTENSO, ES OBLIGATORIO
						// SELECCIONAR
						jQuery(".chkb_id").each(function() {
							if(jQuery(this).prop('checked')==true) {
								existe=true;
									
								return false;
							}
						});
					}
										
					if(existe==true) {
						
						var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
						
						sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
						
						window.open(sUrlGlobalController + '?'+sFormQueryString);																
					
					} else {
						if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
							jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
						}
							
						objetoFuncion.resaltarRestaurarDivMensaje(true,"ERROR:DEBE SELECCIONAR AL MENOS 1 REGISTRO","ERROR");						
					}
					
				} else if(sValueGenerarReporte=="HTML2"){
					
					if(strValueTipoReporte=="NORMAL") {
						
						var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=generarHtmlReporte";
						var sFormBusquedaQueryString=jQuery("#frmBusqueda"+sNombreClase).serialize();
						var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();
						
						sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString;
						sFormQueryString=sFormQueryString+"&"+sFormTablaQueryString;
						sFormQueryString=sFormQueryString+"&"+sFormOrderByQueryString;
						
						// OJO ES RECURSIVO 1 VEZ
						if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
							jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
						}
												
						var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
						
						sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
						
						// SE USABA PARA RETORNAR HTML EN JAVASCRIPT Y DE AHI						
						jQuery.post(sUrlGlobalController, sFormQueryString ,
							function(jsonresult){})
																
							.success(function(jsonresult) {
								var objetoController=jQuery.parseJSON(jsonresult);
									
								objetoWebControl.actualizarVariablesPagina(objetoController);	
							})
								
							.error(function(){
								objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
							})
								
							.complete(function(jsonresult) {						
								objetoFuncion.procesarOnComplete();	
							});
					
					} else if(strValueTipoReporte=="FORMULARIO") { // "GENERAR_REPORTE_FORM"
							 					
						var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=generarHtmlFormReporte";
						var sFormBusquedaQueryString=jQuery("#frmBusqueda"+sNombreClase).serialize();
						var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();
						
						sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString;
						sFormQueryString=sFormQueryString+"&"+sFormTablaQueryString;
						sFormQueryString=sFormQueryString+"&"+sFormOrderByQueryString;
						
						var existe=false;
						
						// REPORTE PUEDE SER MUY EXTENSO, ES OBLIGATORIO
						// SELECCIONAR
						jQuery(".chkb_id").each(function() {
							if(jQuery(this).prop('checked')==true) {
								existe=true;
								
								return false;
							}
						});
						
						
						if(existe==true) {
							
							// tipoguiaremisionFuncionGeneral.generarHtmlReporteTipoGuiaRemisionOnClick();
							
							// OJO ES RECURSIVO 1 VEZ
							if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
								jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
							}
														
							var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
							
							sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
							
							// SE USABA PARA RETORNAR HTML EN JAVASCRIPT Y DE
							jQuery.post(sUrlGlobalController, sFormQueryString ,
								function(jsonresult){})
									
								.success(function(jsonresult) {
									var objetoController=jQuery.parseJSON(jsonresult);
										
									objetoWebControl.actualizarVariablesPagina(objetoController);	
								})
									
								.error(function(){
									objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
								})
									
								.complete(function(jsonresult) {						
									objetoFuncion.procesarOnComplete();	
								});							 
							
						} else {
							if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
								jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
							}
							
							objetoFuncion.resaltarRestaurarDivMensaje(true,"ERROR:DEBE SELECCIONAR AL MENOS 1 REGISTRO","ERROR");
						}
						
					} else if(strValueTipoReporte=="RELACIONES") { // "GENERAR_RELACIONES"
					
						var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=generarHtmlRelacionesReporte";
						var sFormBusquedaQueryString=jQuery("#frmBusqueda"+sNombreClase).serialize();
						var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();
						
						sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString;
						sFormQueryString=sFormQueryString+"&"+sFormTablaQueryString;
						sFormQueryString=sFormQueryString+"&"+sFormOrderByQueryString;
						
						var existe=false;
						
						// REPORTE PUEDE SER MUY EXTENSO, ES OBLIGATORIO
						// SELECCIONAR
						jQuery(".chkb_id").each(function() {
							if(jQuery(this).prop('checked')==true) {
								existe=true;
								
								return false;
							}
						});
						
						
						if(existe==true) {
							// OJO ES RECURSIVO 1 VEZ
							if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
								jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
							}
							
							
							var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
							
							sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
							
							// SE USABA PARA RETORNAR HTML EN JAVASCRIPT Y DE
							jQuery.post(sUrlGlobalController, sFormQueryString ,
								function(jsonresult){})
									
								.success(function(jsonresult) {
									var objetoController=jQuery.parseJSON(jsonresult);
										
									objetoWebControl.actualizarVariablesPagina(objetoController);	
								})
									
								.error(function(){
									objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
								})
									
								.complete(function(jsonresult) {						
									objetoFuncion.procesarOnComplete();	
								});							 
							
						} else {
							if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
								jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
							}
							
							objetoFuncion.resaltarRestaurarDivMensaje(true,"ERROR:DEBE SELECCIONAR AL MENOS 1 REGISTRO","ERROR");							
						}
					}					
				} 
				
			} else if(sValueAccion=="RECARGAR_REFERENCIAS"){
				var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=recargarFormularioGeneralFk";
				
				objetoFuncion.procesarOnClick();
				
				if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
					jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
				}
					
				var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
				
				sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
				
				jQuery.post(sUrlGlobalController, sFormQueryString ,
					function(jsonresult){})
												
					.success(function(jsonresult) {
						var objetoController=jQuery.parseJSON(jsonresult);
							
						objetoWebControl.actualizarVariablesPagina(objetoController);	
					})
						
					.error(function(){
						objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
					})
						
					.complete(function(jsonresult) {						
						objetoFuncion.procesarOnComplete();	
					});	
			
			}  else if(sValueAccion=="ELIMINAR_CASCADA"){
				
				if(confirm(" Esta seguro de eliminar "+sNombreClase+"s seleccionados?  ")){
					
					var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=eliminarCascada";
					
					var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();						
					sFormQueryString=sFormQueryString + "&" + sFormTablaQueryString;
				
					var sFormBusquedaQueryString=jQuery("#frmBusqueda"+sNombreClase).serialize();
					sFormQueryString=sFormQueryString + "&" + sFormBusquedaQueryString;
					
					
					objetoFuncion.procesarOnClick();
					
					if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
						jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
					}
						
					var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
					
					sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
					
					jQuery.post(sUrlGlobalController, sFormQueryString ,
						function(jsonresult){})
														
						.success(function(jsonresult) {
							var objetoController=jQuery.parseJSON(jsonresult);
								
							objetoWebControl.actualizarVariablesPagina(objetoController);	
						})
							
						.error(function(){
							objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
						})
							
						.complete(function(jsonresult) {						
							objetoFuncion.procesarOnComplete();	
						});	
				}
				
			} else if(sValueAccion=="SELECCIONAR") {
				var idActual=0;
				var iNumSeleccionados=0;
				
				jQuery(".chkb_id").each(function(index, element) {
					if(jQuery(this).is(":checked")) {
						iNumSeleccionados=iNumSeleccionados + 1;
						
						idActual=jQuery(this).val();				    	   				    	   
					}				    
				});
				
				if(iNumSeleccionados==1) {
					funcionGeneralEventoJQuery.setImagenSeleccionarClicBase(idActual,sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante);
															
				} else {
					objetoFuncion.resaltarRestaurarDivMensaje(true,"ERROR:DEBE SELECCIONAR 1 REGISTRO","ERROR");
					
					return false;
				}												
				
				if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
					jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
				}
				
			} else if(sValueAccion=="QUITAR") {
				
				var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=quitarElementosTabla";
				
				var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();
					
				sFormQueryString=sFormQueryString+"&"+sFormTablaQueryString;
				
				objetoFuncion.eliminarOnClick();
				
				var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
				
				sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
				
				jQuery.post(sUrlGlobalController, sFormQueryString ,
					function(jsonresult){})
										
					.success(function(jsonresult) {
						var objetoController=jQuery.parseJSON(jsonresult);
						
						objetoWebControl.actualizarVariablesPagina(objetoController);	
					})
					
					.error(function(){
						objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
					})
					
					.complete(function(jsonresult) {
						objetoFuncion.eliminarOnComplete();	
					});	
				
				if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
					jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
				}
				
			} else if(sValueAccion!="ACCIONES") {
				
				var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=";
				
				var sValueAccion=jQuery("#ParamsBuscar-cmbAcciones").find('option:selected').text();
				
				if(confirm(" Esta seguro de procesar "+sValueAccion+" en "+sNombreClase+"s seleccionados?  ")){
					
					sFormQueryString=sFormQueryString+sValueAccion;
					
					var sValueGenerarReporte=jQuery("#ParamsBuscar-cmbGenerarReporte").val();
			
					var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();						
					sFormQueryString=sFormQueryString + "&" + sFormTablaQueryString;
				
					var sFormBusquedaQueryString=jQuery("#frmBusqueda"+sNombreClase).serialize();
					sFormQueryString=sFormQueryString + "&" + sFormBusquedaQueryString;
					
					
					if(sValueGenerarReporte!="PDF") {
						sValueGenerarReporte=sValueGenerarReporte.toLowerCase();			
					}
					
					sFormQueryString=sFormQueryString+"&tipo_reporte="+sValueGenerarReporte;
					
					//REPORTE 1
					//if(sValueAccion.indexOf(constantes.STR_REPORTE) <= -1) {
						objetoFuncion.procesarOnClick();
					//}
					
					if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
						jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
					}
					
					//REPORTE 1	
					//if(sValueAccion.indexOf(constantes.STR_REPORTE) <= -1) {
						
					var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
					
					sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
					
					jQuery.post(sUrlGlobalController, sFormQueryString ,
						
						function(jsonresult){})
							
						.success(function(jsonresult) {
							var objetoController=jQuery.parseJSON(jsonresult);
								
							objetoWebControl.actualizarVariablesPagina(objetoController);	
						})
							
						.error(function(){
							objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
						})
							
						.complete(function(jsonresult) {						
							objetoFuncion.procesarOnComplete();	
						});			                           
				}
			}			
		});
	}
	
	setDivsDialogBindClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").dialog(funcionGeneralJQuery.getConfigDivMantenimientoAjaxWebPartJQuery());						
		
		jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").bind( "dialogclose", function(event, ui) {
			objetoFuncion.resaltarRestaurarDivMantenimiento(false);
		});
		
		jQuery("#div"+sNombreClase+"PopupAjaxWebPart").dialog(funcionGeneralJQuery.getConfigDivPopupAjaxWebPartJQuery());
		
		jQuery("#div"+sNombreClase+"PopupAjaxWebPart").bind("dialogclose", function(event, ui) {
			objetoFuncion.resaltarRestaurarDivMensajePopup(false);
		});
		
		jQuery("#divMensajePageDialog").dialog(funcionGeneralJQuery.getConfigDivMensajePageDialogJQuery());
		
		jQuery("#divOrderBy"+sNombreClase+"AjaxWebPart").dialog(funcionGeneralJQuery.getConfigDivOrdenJQuery());
		
		jQuery("#divOrderByRel"+sNombreClase+"AjaxWebPart").dialog(funcionGeneralJQuery.getConfigDivOrdenJQuery());	
	}
	
	setDivsRelacionesDialogBindClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		jQuery("#divOrderByRel"+sNombreClase+"AjaxWebPart").dialog(funcionGeneralJQuery.getConfigDivOrdenJQuery());		
	}
	
	setWindowUnload(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,window) {
		
		jQuery(window).on("beforeunload", function () {
			objetoWebControl.onUnLoadWindow();						
		});			
	}
	
	setPageRecargarUltimaInformacionPost(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=recargarUltimaInformacion";
		
		var sFormBusquedaQueryString=jQuery("#frmBusqueda"+sNombreClase).serialize();
		
		var sFormOrderByQueryString=jQuery("#frmOrderBy").serialize();
					
		sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString+"&"+sFormOrderByQueryString;
				
		objetoFuncion.buscarOnClick();
				
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		
		jQuery.post(sUrlGlobalController, sFormQueryString,
			function(jsonresult){})
										
			.success(function(jsonresult) {
				var objectController=jQuery.parseJSON(jsonresult);
						
				objetoWebControl.actualizarVariablesPagina(objectController);	
			})
					
			.error(function(){
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			})
					
			.complete(function(jsonresult) {
				objetoFuncion.buscarOnComplete();	
			});			
	}
	
	async setPageUnLoadWindowPost(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		//var sFormQueryString="";;		
		//sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=unload&"+sFormQueryString;
		
		const data_req = {
			controller: sNombreClase,
			modulo: sModulo,
			sub_modulo: sSubModulo,
			action: 'unload'			
		};

		let params_req = funcionGeneralEventoJQuery.getJsonParamsRequest('POST',data_req); 

		objetoFuncion.buscarOnClick();
			
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		//sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		
		try {
			const response = await fetch(sUrlGlobalController,params_req);
			   
			const objetoController = await response.json();

			//objetoWebControl.actualizarVariablesPagina(objetoController);
			
			objetoFuncion.buscarOnComplete();	

		} catch(error){
			console.error('Error:', error);
			objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
		}		
	}
	
	async setPageOnLoadPost(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		var sTypeOnLoad=objetoConstante.STR_TYPE_ON_LOAD;
		var sTipoPaginaAuxiliar=objetoConstante.STR_TIPO_PAGINA_AUXILIAR;
		var sTipoUsuarioAuxiliar=objetoConstante.STR_TIPO_USUARIO_AUXILIAR;
		
		var sES_POPUP=objetoConstante.STR_ES_POPUP;
		var sES_BUSQUEDA=objetoConstante.STR_ES_BUSQUEDA;
		var sFUNCION_JS=objetoConstante.STR_FUNCION_JS;
		var bigID_OPCION=objetoConstante.BIG_ID_OPCION;
		var sES_RELACIONES=objetoConstante.STR_ES_RELACIONES;
		var sES_RELACIONADO=objetoConstante.STR_ES_RELACIONADO;
		var sES_SUB_PAGINA=objetoConstante.STR_ES_SUB_PAGINA;
		var sSUFIJO=objetoConstante.STR_SUFIJO;				
						
		const data_req = {
			
			["sTypeOnLoad"+sNombreClase]: sTypeOnLoad,
			["sTipoPaginaAuxiliar"+sNombreClase]: sTipoPaginaAuxiliar,
			["sTipoUsuarioAuxiliar"+sNombreClase]: sTipoUsuarioAuxiliar,
			'ES_POPUP': sES_POPUP,
			'ES_BUSQUEDA': sES_BUSQUEDA,
			'FUNCION_JS': sFUNCION_JS,
			'ES_RELACIONES': sES_RELACIONES,
			'ES_RELACIONADO': sES_RELACIONADO,
			'ES_SUB_PAGINA': sES_SUB_PAGINA,
			'SUFIJO': sSUFIJO,
			'id_opcion': bigID_OPCION,
			'controller': sNombreClase,
			'modulo': sModulo,
			'sub_modulo': sSubModulo,
			'action': 'index'
		};

		let params_req = this.getJsonParamsRequest('POST',data_req); 
				
		objetoConstante.BIT_ES_PARA_JQUERY=true;
			
		objetoFuncion.buscarOnClick();				
			
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
				
		try {
			const response = await fetch(sUrlGlobalController,params_req);
               
            const objetoController = await response.json();

			objetoWebControl.actualizarVariablesPagina(objetoController);

			if(objetoConstante.STR_ES_POPUP=="true") {
				var imgExpandirContraerRowBusqueda=document.getElementById("imgExpandirContraerRowBusqueda"+sNombreClase);
				
				// SI ES RELACIONADO SE OCULTA, SI ES SUBPAGINA DE ARBOL
				// PRINCIPAL SE MUESTRA OPCIONES BUSQUEDAS
				if(objetoConstante.STR_ES_SUB_PAGINA=="false") {
					var row=document.getElementById("trBusqueda"+sNombreClase);
					
					if(row!=null) {
						funcionGeneral.mostrarOcultarFilaCambiarImagenRelative("trBusqueda"+sNombreClase,imgExpandirContraerRowBusqueda,"../");
					}
				}
			}

			objetoFuncion.buscarOnComplete();
				
			objetoConstante.BIT_ES_PARA_JQUERY=true;

		} catch(error){
			console.error('Error:', error);
			objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
		} 
	}
	
	setPageOnLoadRecargarRelacionadoPost(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		var sTypeOnLoad=objetoConstante.STR_TYPE_ON_LOAD;
		var sTipoPaginaAuxiliar=objetoConstante.STR_TIPO_PAGINA_AUXILIAR;
		var sTipoUsuarioAuxiliar=objetoConstante.STR_TIPO_USUARIO_AUXILIAR;
		var sES_POPUP=objetoConstante.STR_ES_POPUP;
		var sES_BUSQUEDA=objetoConstante.STR_ES_BUSQUEDA;
		var sFUNCION_JS=objetoConstante.STR_FUNCION_JS;
		var sES_RELACIONES=objetoConstante.STR_ES_RELACIONES;
		var sES_RELACIONADO=objetoConstante.STR_ES_RELACIONADO;
		var sSUFIJO=objetoConstante.STR_SUFIJO;				
		
		var sFormQueryString="sTypeOnLoad"+sNombreClase+"="+sTypeOnLoad+"&sTipoPaginaAuxiliar"+sNombreClase+"="+sTipoPaginaAuxiliar+"&sTipoUsuarioAuxiliar"+sNombreClase+"="+sTipoUsuarioAuxiliar+"&ES_POPUP="+sES_POPUP+"&ES_BUSQUEDA="+sES_BUSQUEDA+"&FUNCION_JS="+sFUNCION_JS;// constantes.STRUSUARIODEFAULTINVITADO;
		sFormQueryString=sFormQueryString + "&ES_RELACIONES="+sES_RELACIONES + "&ES_RELACIONADO="+sES_RELACIONADO + "&SUFIJO="+sSUFIJO;
		
		sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=indexRecargarRelacionado&"+sFormQueryString;
		
		objetoConstante.BIT_ES_PARA_JQUERY=true;
			
		objetoFuncion.buscarOnClick();				
			
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		
		jQuery.post(sUrlGlobalController,sFormQueryString ,
			function(jsonresult){})
	
			.success(function(jsonresult) {
				var objetoController=jQuery.parseJSON(jsonresult);
				
				objetoWebControl.actualizarVariablesPagina(objetoController);
				
				// objetoWebControl.onLoadCombosDefectoFK(objetoController);				
				// OCULTA INICIALMENTE LAS BUSQUEDAS CUANDO SEA UNA PAGINA AUXILIAR/HIJA/RELACIONADO
				
				if(objetoConstante.STR_ES_POPUP=="true" || objetoConstante.STR_ES_RELACIONADO=="true") {
					var imgExpandirContraerRowBusqueda=document.getElementById("imgExpandirContraerRowBusqueda"+sNombreClase);
					
					// SI ES RELACIONADO SE OCULTA O, SI ES SUBPAGINA DE ARBOL
					// PRINCIPAL SI MUESTRA OPCIONES BUSQUEDAS
					if(objetoConstante.STR_ES_SUB_PAGINA=="false" || objetoConstante.STR_ES_RELACIONADO=="true") {
												
						if(objetoConstante.STR_ES_RELACIONADO=="true") {
																					
						} else {							
							if(objetoConstante.STR_ES_SUB_PAGINA=="false") {
								funcionGeneral.mostrarOcultarFilaCambiarImagenRelative("trBusqueda"+sNombreClase,imgExpandirContraerRowBusqueda,"../");						
							}
						}																														
					}
				}
			})
	
			.error(function(){
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			})
	
			.complete(function(jsonresult) {
				objetoFuncion.buscarOnComplete();
				
				objetoConstante.BIT_ES_PARA_JQUERY=true;
			});		
	}
		
	setBotonImprimirPaginaClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {		
		// IMPRIMIR SOLO TABLA DATOS
		document.querySelector("#btnImprimirPagina"+sNombreClase)?.addEventListener('click',async () => {			
			objetoWebControl.imprimirPaginaImprimirWithStyles(sNombreClase);
		});		
	}
	
	setBotonCerrarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#btnCerrarPagina"+sNombreClase)?.addEventListener('click',async () => {			
			window.close();								
		});
		
		var btnCerrarPagina = document.getElementById("btnCerrarPagina"+sNombreClase);
		btnCerrarPagina?.classList.add("ButtonImagenCerrarPagina");		
	}
	
	setBotonOrderByClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#btnOrderBy"+sNombreClase)?.addEventListener('click',async () => {
			jQuery("#divOrderBy"+sNombreClase+"AjaxWebPart").dialog("open");			
		});
				
		var btnOrderBy = document.getElementById("btnOrderBy"+sNombreClase);
		btnOrderBy?.classList.add("ButtonImagenOrderBy");		
	}
	
	setBotonOrderByRelClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		document.querySelector("#btnOrderByRel"+sNombreClase)?.addEventListener('click',async () => {			
			jQuery("#divOrderByRel"+sNombreClase+"AjaxWebPart").dialog("open");			
		});
		
		var btnOrderByRel = document.getElementById("btnOrderByRel"+sNombreClase);
		btnOrderByRel?.classList.add("ButtonImagenOrderBy");			
	}
	
	setBotonBuscarClic(sNombreClase,sNombreIndice,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		document.querySelector("#btnBuscar"+sNombreClase + objetoConstante.STR_SUFIJO+sNombreIndice)?.addEventListener('click',async () => {

			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action="+sNombreIndice+"&"+sFormBusquedaQueryString;

			var sFormBusquedaQueryString=jQuery("#frmBusqueda"+sNombreClase).serialize();
			
			var sFormOrderByQueryString=jQuery("#frmOrderBy").serialize();

			sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString+"&"+sFormOrderByQueryString;

			objetoFuncion.buscarOnClick();

			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController,sFormQueryString ,
				function(jsonresult){})

				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);
				})

				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,"OCURRIO ALGUN ERROR, VUELVA A INTERNARLO Y CONSULTE CON EL ADMINISTRADOR","E");
				})

				.complete(function(jsonresult) {
					objetoFuncion.buscarOnComplete();
				});
		});
				
		var btnBuscar = document.getElementById("btnBuscar"+sNombreClase+objetoConstante.STR_SUFIJO+""+sNombreIndice);
		btnBuscar?.classList.add("ButtonImagenBuscar");
	}
	
	setFuncionBuscarPorId(sNombreClase,id,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=buscarPorIdGeneral&"+"&id="+id+"&"+sFormBusquedaQueryString;

		var sFormBusquedaQueryString=jQuery("#frmBusqueda"+sNombreClase).serialize();
			
		var sFormOrderByQueryString=jQuery("#frmOrderBy").serialize();

		sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString+"&"+sFormOrderByQueryString;

		objetoFuncion.buscarOnClick();

		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
		sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
		jQuery.post(sUrlGlobalController,sFormQueryString ,
			function(jsonresult){})

			.success(function(jsonresult) {
				var objetoController=jQuery.parseJSON(jsonresult);
					
				objetoWebControl.actualizarVariablesPagina(objetoController);
			})

			.error(function(){
				objetoFuncion.resaltarRestaurarDivMensaje(true,"OCURRIO ALGUN ERROR, VUELVA A INTERNARLO Y CONSULTE CON EL ADMINISTRADOR","E");
			})

			.complete(function(jsonresult) {
				objetoFuncion.buscarOnComplete();
			});				
	}
	
	setToolBarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		// TOOLBAR
		document.querySelector("#imgNuevoToolBar"+sNombreClase)?.addEventListener('click',() => {
			document.querySelector("#btnNuevoPreparar"+sNombreClase).click();
		});
		
		document.querySelector("#imgNuevoGuardarCambiosToolBar"+sNombreClase)?.addEventListener('click',() => {
			document.querySelector("#btnNuevoTablaPreparar"+sNombreClase).click();
		});
		
		document.querySelector("#imgGuardarCambiosToolBar"+sNombreClase)?.addEventListener('click',() => {			
			document.querySelector("#btnGuardarCambios"+sNombreClase).click();
		});
		
		document.querySelector("#imgCopiarToolBar"+sNombreClase)?.addEventListener('click',() => {
			document.querySelector("#btnCopiar"+sNombreClase).click();
		});
		
		document.querySelector("#imgDuplicarToolBar"+sNombreClase)?.addEventListener('click',() => {
			document.querySelector("#btnDuplicar"+sNombreClase).click();
		});
		
		document.querySelector("#imgRecargarInformacionToolBar"+sNombreClase)?.addEventListener('click',() => {
			document.querySelector("#btnRecargarInformacion"+sNombreClase).click();
		});
		
		document.querySelector("#imgAnterioresToolBar"+sNombreClase)?.addEventListener('click',() => {
			document.querySelector("#btnAnteriores"+sNombreClase).click();
		});
		
		document.querySelector("#imgSiguientesToolBar"+sNombreClase)?.addEventListener('click',() => {
			document.querySelector("#btnSiguientes"+sNombreClase).click();
		});
		
		document.querySelector("#imgAbrirOrderByToolBar"+sNombreClase)?.addEventListener('click',() => {
			document.querySelector("#btnOrderBy"+sNombreClase).click();
		});
		
		document.querySelector("#imgCerrarPaginaToolBar"+sNombreClase)?.addEventListener('click',() => {
			document.querySelector("#btnCerrarPagina"+sNombreClase).click();
		});
		
		// FORMULARIO
		document.querySelector("#imgActualizarToolBar"+sNombreClase)?.addEventListener('click',() => {
			document.querySelector("#btnActualizar"+sNombreClase).click();
		});
		
		document.querySelector("#imgEliminarToolBar"+sNombreClase)?.addEventListener('click',() => {
			document.querySelector("#btnEliminar"+sNombreClase).click();
		});
		
		document.querySelector("#imgCancelarToolBar"+sNombreClase)?.addEventListener('click',() => {
			document.querySelector("#btnCancelar"+sNombreClase).click();
		});
		// TOOLBAR		
	}
	
	setHotKeyClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {				
		if(constantes.CON_HOTKEYS==true) {
			var strTipoHotKey="";						
		}		
	}
		
	setWindowOnLoadGlobalConfig(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		// DESHABILITAR-COMO IFRAME CAUSA PROBLEMAS CON SCROLL
		
		if(document.getElementById("leftSidebar")!=null){
			jQuery("#leftSidebar").draggable();
		}
		
		if(document.getElementById("tabs")!=null){
			jQuery("#tabs").tabs();
		}// por clase .tabs pero no vale
		
		if(document.getElementById("tabs_elementos")!=null){
			// alert("Here");
			jQuery("#tabs_elementos").tabs();
		}
		
		if(objetoConstante.STR_ES_RELACIONES=="true") {	
			// if(document.getElementById("tabs2")!=null){
			// jQuery("#tabs2").tabs();
			// }
				if(document.getElementById("tabs_general")!=null){
					jQuery("#tabs_general").tabs();
				}	
		}
		
		// if(document.getElementById("divTipoGuiaRemisionsAjaxWebPart")!=null){jQuery("#divTipoGuiaRemisionsAjaxWebPart").draggable();}
		if(document.getElementById("divMantenimiento"+sNombreClase+"AjaxWebPart")!=null){
			jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").draggable();
		}
		
		
		jQuery("#divLeftSideSlider").slider({
			animate: true,
			change: funcionGeneralEventoJQuery.handleLeftSideSliderChange,
			slide: funcionGeneralEventoJQuery.handleLeftSideSliderSlide
		});
		
		jQuery("#divContentSlider").slider({
			animate: true,
			change: funcionGeneralEventoJQuery.handleContentSliderChange,
			slide: funcionGeneralEventoJQuery.handleContentSliderSlide
		});
		
		
		if(objetoConstante.BIT_ES_PARA_JQUERY==false) {
		
		}
		
		// CARGAR MENU DE ARBOL
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
					objetoFuncion.procesarInicioProceso(objetoConstante);
				}
				
				window.location.href = href; 
			});
		}
	}
	
	// OJO AL FINAL VIENE window.onload = onLoad;
	handleLeftSideSliderChange(e, ui) {
		
		var maxScroll = jQuery("#leftSidebar")[0].scrollWidth -  jQuery("#leftSidebar").width();
		// alert(maxScroll);
		jQuery("#leftSidebar").animate({scrollLeft: ui.value * (maxScroll / 100) }, 1000);
	}
	
	// handleLeftSideSliderSlide(e, ui) {
	
	handleLeftSideSliderSlide(e, ui) {
		
		var maxScroll = jQuery("#leftSidebar")[0].scrollWidth - jQuery("#leftSidebar").width();
		
		jQuery("#leftSidebar").attr({scrollLeft: ui.value * (maxScroll / 100) });
	}
	
	// this.handleContentSliderChangeTipoGuiaRemision(e, ui); }	
	handleContentSliderChange(e, ui) {
		
		var maxScroll = jQuery("#content")[0].scrollWidth -  jQuery("#content").width();
		// alert(maxScroll);
		jQuery("#content").animate({scrollLeft: ui.value * (maxScroll / 100) }, 1000);
	}
	
	// this.handleContentSliderSlideTipoGuiaRemision(e, ui); }	
	handleContentSliderSlide(e, ui) {
		
		var maxScroll = jQuery("#content")[0].scrollWidth - jQuery("#content").width();
		
		jQuery("#content").attr({scrollLeft: ui.value * (maxScroll / 100) });
	}
}

var funcionGeneralEventoJQuery=new FuncionGeneralEventoJQuery();

export {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery};

//</script>