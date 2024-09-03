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
		
		var sFormQueryStringLocal=sFormQueryString;						
		
		// var sUrlQueryString=this.getUrlGlobalController();
				
		// alert(sUrlQueryString);
		// alert(sFormQueryStringLocal);
		
		// alert(sUrlQueryString + "?" + sFormQueryStringLocal);
		
		
		if(constantes.CON_DEBUG==true) {
			console.log(sFormQueryStringLocal); // sUrlQueryString + "?"
		}
		
		
		return sFormQueryStringLocal;
	}
	
	setBotonNuevoPrepararClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		
		jQuery("#btnNuevoPreparar"+sNombreClase).click(function(){
			
			objetoWebControl.deshabilitarCombosDisabledFK(false);
			
			// var
			// sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=nuevoPreparar";
			
			var sFormQueryString="";
			
			
			if(objetoConstante.BIT_CON_PAGINA_FORM==true) {				
				sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=nuevoPrepararAbrirPaginaForm";
				sFormQueryString+="&ES_RELACIONES="+objetoConstante.STR_ES_RELACIONES+"&ES_RELACIONADO="+objetoConstante.STR_ES_RELACIONADO;
				//alert(sFormQueryString);
			} else {
				sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=nuevoPreparar";
			}
			
			
			objetoFuncion.nuevoPrepararOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString ,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// tipoguiaremisionFuncionGeneral.nuevoPrepararTipoGuiaRemisionOnClick();
				// })
				
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
					
					// Este evento esta en el Load Window
					if(objetoConstante.STR_ES_RELACIONES=="true") {
						objetoWebControl.onLoadRecargarRelacionesRelacionados();
					}
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					
					objetoFuncion.nuevoPrepararOnComplete();	
					
					objetoWebControl.deshabilitarCombosDisabledFK(true);
				});									
		});
		
		jQuery("#btnNuevoPreparar"+sNombreClase).button().addClass("ButtonImagenNuevoPreparar");
				
	}
	
	
	setBotonNuevoTablaPrepararClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#btnNuevoTablaPreparar"+sNombreClase).click(function(){
			
			if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==false) {
				jQuery("#ParamsBuscar-chbConEditar").prop('checked',true);
			}
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=nuevoTablaPreparar";
			
			var sFormPaginacionQueryString=jQuery("#frmPaginacion"+sNombreClase).serialize();
			
			sFormQueryString=sFormQueryString+"&"+sFormPaginacionQueryString;
			
			objetoFuncion.nuevoTablaPrepararOnClick();				
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString ,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// objetoFuncion.nuevoPrepararOnClick();
				// })
				
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
					
					jQuery("#ParamsPaginar-txtNumeroNuevoTabla"+sNombreClase).val(1);
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					objetoFuncion.nuevoTablaPrepararOnComplete();	
				});									
		});
		
		jQuery("#btnNuevoTablaPreparar"+sNombreClase).button().addClass("ButtonImagenNuevoTablaPreparar");
		
	}
	
	ejecutarFuncionNuevoPrepararPaginaFormClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
							
			objetoWebControl.deshabilitarCombosDisabledFK(false);
			
			// var
			// sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=nuevoPreparar";
			
			var sFormQueryString="";
			var sSUFIJO=objetoConstante.STR_SUFIJO;
			
			sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=nuevoPrepararPaginaForm";
			sFormQueryString+="&SUFIJO="+sSUFIJO;
			
			//sFormQueryString+="&ES_RELACIONES="+objetoConstante.STR_ES_RELACIONES+"&ES_RELACIONADO="+objetoConstante.STR_ES_RELACIONADO;
			objetoFuncion.nuevoPrepararPaginaFormOnClick();
			//alert(sFormQueryString);
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString ,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// tipoguiaremisionFuncionGeneral.nuevoPrepararTipoGuiaRemisionOnClick();
				// })
				
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
					
					// objetoWebControl.onLoadCombosDefectoFK(objetoController);
					
					// Este evento esta en el Load Window
					if(objetoConstante.STR_ES_RELACIONES=="true") {
						if(objetoConstante.BIT_ES_PAGINA_FORM==true) {
							objetoWebControl.onLoadRecargarRelacionesRelacionados();
						}
					}
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					
					objetoFuncion.nuevoPrepararPaginaFormOnComplete();	
					
					objetoWebControl.deshabilitarCombosDisabledFK(true);
				});																	
	}
	
	setBotonGuardarCambiosClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#btnGuardarCambios"+sNombreClase).click(function(){								
			// alert("clic 0");
			// alert(document.getElementById("frmTablaDatos"+sNombreClase));
			// alert("frmTablaDatos"+sNombreClase);
			// alert(document.getElementById("frmTablaDatos"+sNombreClase));
			
			if(jQuery("#frmTablaDatos"+sNombreClase).valid()==true) {
				// PUEDE SER QUE HAYA ELIMINADO Y ASI GUARDAR
				// && jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true
				// alert("clic");
				var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=guardarCambios";
				
				var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();
					
				sFormQueryString=sFormQueryString + "&" + sFormTablaQueryString;
				
				objetoFuncion.guardarCambiosOnClick();
				
				var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
				
				sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
				
				jQuery.post(sUrlGlobalController, sFormQueryString ,
					function(jsonresult){})
					
					// .beforeSend(function(){
					// tipoguiaremisionFuncionGeneral.nuevoPrepararTipoGuiaRemisionOnClick();
					// })
					
					.success(function(jsonresult) {
						var objetoController=jQuery.parseJSON(jsonresult);
						
						jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
						
						objetoWebControl.actualizarVariablesPagina(objetoController);	
						
						// SI SE NECESITA EJECUTAR FUNCION JS PADRE
						if(objetoController.sFuncionJsPadre!=null && objetoController.sFuncionJsPadre!='') {
							eval(objetoController.sFuncionJsPadre);
						}
					})
					
					.error(function(){
						objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
					})
					
					.complete(function(jsonresult) {
						objetoFuncion.guardarCambiosOnComplete();	
					});	
			} else {
				
				objetoFuncion.mostrarMensaje(true,"TIENE ERRORES EN LOS DATOS, CORRIGALOS ANTES DE GUARDAR","ERROR");
				
				// if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true)
				// {
					// tipoguiaremisionFuncionGeneral.mostrarMensaje(true,"TIENE
					// ERRORES EN LOS DATOS, CORRIGALOS ANTES DE
					// GUARDAR","ERROR");
					
					// tipoguiaremisionFuncionGeneral.resaltarRestaurarDivMensaje(true,"TIENE
					// ERRORES EN LOS DATOS, CORRIGALOS ANTES DE
					// GUARDAR","ERROR");
					// tipoguiaremisionFuncionGeneral.mostrarDivMensaje(true,"TIENE
					// ERRORES EN LOS DATOS, CORRIGALOS ANTES DE
					// GUARDAR","ERROR");
					// alert("TIENE ERRORES EN LOS DATOS, CORRIGALOS ANTES DE
					// GUARDAR");
				// }
				// else {
					objetoFuncion.mostrarMensaje(true,"LA TABLA NO ESTA EN MODO EDICION, HAGA CLICK EN EDICION","ERROR");
											
					// tipoguiaremisionFuncionGeneral.resaltarRestaurarDivMensaje(true,"LA
					// TABLA NO ESTA EN MODO EDICION, HAGA CLICK EN
					// EDICION","ERROR");
					// tipoguiaremisionFuncionGeneral.mostrarDivMensaje(true,"LA
					// TABLA NO ESTA EN MODO EDICION, HAGA CLICK EN
					// EDICION","ERROR");
					// alert("LA TABLA NO ESTA EN MODO EDICION, HAGA CLICK EN
					// EDICION");
				// }
			}
		});
		
		jQuery("#btnGuardarCambios"+sNombreClase).button().addClass("ButtonImagenGuardarCambios");
		
	}
	
	setBotonDuplicarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#btnDuplicar"+sNombreClase).click(function(){
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=duplicar";
			
			var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();
				
			sFormQueryString=sFormQueryString+"&"+sFormTablaQueryString;
			
			jQuery("#ParamsBuscar-chbConEditar").prop('checked',true);
			
			objetoFuncion.duplicarOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString ,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// objetoFuncion.nuevoPrepararOnClick();
				// })
				
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					objetoFuncion.duplicarOnComplete();	
				});									
		});
		
		jQuery("#btnDuplicar"+sNombreClase).button().addClass("ButtonImagenDuplicar");
		
	}
	
	setBotonCopiarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#btnCopiar"+sNombreClase).click(function(){
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=copiar";
			
			var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();
				
			sFormQueryString=sFormQueryString+"&"+sFormTablaQueryString;
			
			jQuery("#ParamsBuscar-chbConEditar").prop('checked',true);
			
			objetoFuncion.copiarOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString ,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// objetoFuncion.nuevoPrepararOnClick();
				// })
				
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					objetoFuncion.copiarOnComplete();	
				});									
		});
		
		jQuery("#btnCopiar"+sNombreClase).button().addClass("ButtonImagenCopiar");
		
	}
	
	setBotonRecargarInformacionClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#btnRecargarInformacion"+sNombreClase).click(function(){
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=recargarInformacion";
			
			var sFormBusquedaQueryString=jQuery("#frmBusqueda"+sNombreClase).serialize();
			
			var sFormOrderByQueryString=jQuery("#frmOrderBy").serialize();
				
			sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString+"&"+sFormOrderByQueryString;
			
			objetoFuncion.buscarOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// objetoFuncion.buscarTipoGuiaRemisionOnClick();
				// })
				
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					objetoFuncion.buscarOnComplete();	
				});									
		});		
		
		jQuery("#btnRecargarInformacion"+sNombreClase).button().addClass("ButtonImagenRecargarInformacion");
		
	}
	
	setBotonArbolAbrirClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#btnArbol"+sNombreClase).click(function(){
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=abrirArbol";
			
			var sFormBusquedaQueryString=jQuery("#frmBusqueda"+sNombreClase).serialize();
			
			var sFormOrderByQueryString=jQuery("#frmOrderBy").serialize();
				
			sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString+"&"+sFormOrderByQueryString;
			
			objetoFuncion.buscarOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// objetoFuncion.buscarTipoGuiaRemisionOnClick();
				// })
				
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
		
		jQuery("#btnArbol"+sNombreClase).button().addClass("ButtonImagenRecargarInformacion");
		
	}
	
	setBotonNuevoClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		jQuery("#btnNuevo"+sNombreClase).click(function(){			
			
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
					
					// .beforeSend(function(){
					// objetoFuncion.nuevoOnClick();
					// })
					
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
				
				// alert("TIENE ERRORES EN LOS DATOS, CORRIGALOS ANTES DE
				// GUARDAR");
			}
		});
		
		jQuery("#btnNuevo"+sNombreClase).button();
		
	}
	
	setBotonActualizarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		jQuery("#btnActualizar"+sNombreClase).click(function(){
			
			var validarMantenimiento=jQuery("#frmMantenimiento"+sNombreClase).valid();
			var validarMantenimientoTotales=true;
			var sSUFIJO=objetoConstante.STR_SUFIJO;
			
			if(objetoConstante.BIT_TIENE_CAMPOS_TOTALES==true) {				
				//alert(jQuery("#frmMantenimientoTotales"+sNombreClase));
				validarMantenimientoTotales=jQuery("#frmMantenimientoTotales"+sNombreClase).valid();				
			}			
			
			if((validarMantenimiento && validarMantenimientoTotales)==true) {
				
				objetoWebControl.deshabilitarCombosDisabledFK(false);
				
				var sQueryString="";
				
				var sFormQueryString=jQuery("#frmMantenimiento"+sNombreClase).serialize();
				
				var sFormQueryStringCamposTotales="";
				
				if(objetoConstante.BIT_TIENE_CAMPOS_TOTALES==true) {// alert("here");
					sFormQueryStringCamposTotales=jQuery("#frmMantenimientoTotales"+sNombreClase).serialize();
					
					sFormQueryString=sFormQueryString + "&" + sFormQueryStringCamposTotales;
				}
				
				// alert(sFormQueryString);
				var sFormQueryStringAcciones=jQuery("#frmAccionesMantenimiento"+sNombreClase).serialize();;
				
				sFormQueryString=sFormQueryString + "&" + sFormQueryStringAcciones;
				
				sQueryString+="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=actualizar";
				sQueryString+="&SUFIJO=" + sSUFIJO;
				sQueryString+=("&" + sFormQueryString);					
				
				
				objetoFuncion.actualizarOnClick();
								
				var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
					
				sQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sQueryString);
				
				//alert(sQueryString);
				
				jQuery.post(sUrlGlobalController, sQueryString ,
					function(jsonresult){})
						
					// .beforeSend(function(){
					// objetoFuncion.actualizarOnClick();
					// })
						
					.success(function(jsonresult) {
						var objetoController=jQuery.parseJSON(jsonresult);
						// alert(objetoWebControl);
						objetoWebControl.actualizarVariablesPagina(objetoController);	
						// alert("Here");
						// SI SE NECESITA EJECUTAR FUNCION JS PADRE
						if(objetoController.sFuncionJsPadre!=null && objetoController.sFuncionJsPadre!='') {							
							eval(objetoController.sFuncionJsPadre);
						}
						
						if(jQuery("#ParametrosAcciones-chbPostAccionNuevo").prop('checked')==true) {
							// alert("trigger");
							jQuery("#btnNuevoPreparar"+sNombreClase).trigger("click");
						}
					})
						
					.error(function(){
						objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
					})
						
					.complete(function(jsonresult) {
						objetoFuncion.actualizarOnComplete();
						
						objetoWebControl.deshabilitarCombosDisabledFK(true);
					});		
			} else {
				objetoFuncion.mostrarMensaje(true,"TIENE ERRORES EN LOS DATOS, CORRIGALOS ANTES DE GUARDAR","ERROR");
				
				// alert("TIENE ERRORES EN LOS DATOS, CORRIGALOS ANTES DE
				// GUARDAR");
			}		
		});
		
		// NO FUNCIONA, NOSE, EN PANTALLA PRINCIPAL SI
		jQuery("#btnActualizar"+sNombreClase).button().addClass("ButtonImagenActualizar");				
	}
	
	setBotonEliminarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		jQuery("#btnEliminar"+sNombreClase).click(function(){
			objetoWebControl.deshabilitarCombosDisabledFK(false);
			
			var sFormQueryString=jQuery("#frmMantenimiento"+sNombreClase).serialize();
			
			var sFormQueryStringCamposTotales="";
			
			if(objetoConstante.BIT_TIENE_CAMPOS_TOTALES==true) {
				sFormQueryStringCamposTotales=jQuery("#frmMantenimientoTotales"+sNombreClase).serialize();
				
				sFormQueryString=sFormQueryString + "&" + sFormQueryStringCamposTotales;
			}
			
			
			sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=eliminar&"+sFormQueryString;
			
			objetoFuncion.eliminarOnClick();
							
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
				
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// objetoFuncion.eliminarOnClick();
				// })
				
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
					
					// SI SE NECESITA EJECUTAR FUNCION JS PADRE
					if(objetoController.sFuncionJsPadre!=null && objetoController.sFuncionJsPadre!='') {
						eval(objetoController.sFuncionJsPadre);
					}
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					objetoFuncion.eliminarOnComplete();	
					
					objetoWebControl.deshabilitarCombosDisabledFK(true);
				});									
		});
		
		// NO FUNCIONA, NOSE, EN PANTALLA PRINCIPAL SI
		jQuery("#btnEliminar"+sNombreClase).button().addClass("ButtonImagenEliminar");				
	}
	
	setBotonCancelarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		jQuery("#btnCancelar"+sNombreClase).click(function(){
			var sFormQueryString=jQuery("#frmMantenimiento"+sNombreClase).serialize();
			
			var sFormQueryStringCamposTotales="";
			
			if(objetoConstante.BIT_TIENE_CAMPOS_TOTALES==true) {
				sFormQueryStringCamposTotales=jQuery("#frmMantenimientoTotales"+sNombreClase).serialize();
				
				sFormQueryString=sFormQueryString + "&" + sFormQueryStringCamposTotales;
			}
			
			
			sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=cancelar&"+sFormQueryString;
			
			jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked',false);
			jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked',false);
			
			objetoFuncion.cancelarOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// objetoFuncion.cancelarOnClick();
				// })
				
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					objetoFuncion.cancelarOnComplete();	
				});									
		});
		
		jQuery("#btnCancelar"+sNombreClase).button().addClass("ButtonImagenCancelar");					
	}
	
	setBotonGuardarCambiosFormularioClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		jQuery("#btnGuardarCambiosFormulario"+sNombreClase).click(function(){
			
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
					
					// .beforeSend(function(){
					// objetoFuncion.guardarCambiosOnClick();
					// })
					
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
				// alert("TIENE ERRORES EN LOS DATOS, CORRIGALOS ANTES DE
				// GUARDAR");
			}
		});
		
		jQuery("#btnGuardarCambiosFormulario"+sNombreClase).button();		
	}
	
	setBotonAnterioresClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#btnAnteriores"+sNombreClase).click(function(){
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=anteriores";
			// var
			// sFormBusquedaQueryString=jQuery("#frmBusquedaTipoGuiaRemision").serialize();
			// var sFormOrderByQueryString=jQuery("#frmOrderBy").serialize();
				
			// sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString+"&"+sFormOrderByQueryString;
					
			objetoFuncion.anterioresOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// objetoFuncion.anterioresOnClick();
				// })
				
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					objetoFuncion.anterioresOnComplete();	
				});									
		});
		
		jQuery("#btnAnteriores"+sNombreClase).button();// .addClass("ButtonImagenAnteriores");
	}
	
	setBotonSeleccionarLoteFkClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		jQuery("#btnSeleccionarLoteFk"+sNombreClase).click(function(){
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=seleccionarLoteFk";
			var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();
			
			sFormQueryString=sFormQueryString + "&" + sFormTablaQueryString;
												
			
					// var
					// sFormBusquedaQueryString=jQuery("#frmBusquedaTipoGuiaRemision").serialize();
					// var
					// sFormOrderByQueryString=jQuery("#frmOrderBy").serialize();
						
					// sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString+"&"+sFormOrderByQueryString;
					
			// objetoFuncion.anterioresOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
						
			// alert(sFormQueryString);
			
			var sFuncionPadreParametros=objetoConstante.STR_OBJETO_JS + ".manejarSeleccionarLoteFk(\""+sFormTablaQueryString+"\");";
			
			
			// alert(sFormTablaQueryString);
			// alert(sFuncionPadreParametros);
			
			eval(sFuncionPadreParametros);
			
			window.close();
			
			// alert(sFormTablaQueryString);
			// opener.manejarSeleccionarLoteFk(sFormQueryString);
			
			// alert(opener.detalleguiaremisionJQueryPaginaWebInteraccion);
			
			// opener.detalleguiaremisionJQueryPaginaWebInteraccion.manejarSeleccionarLoteFk(sFormQueryString);
			
			// parent.detalleguiaremisionJQueryPaginaWebInteraccion.manejarSeleccionarLoteFk(sFormQueryString);
			
			// window.close();
			
					/*
					 * jQuery.post(sUrlGlobalController, sFormQueryString,
					 * function(jsonresult){})
					 * 
					 * //.beforeSend(function(){ //
					 * objetoFuncion.anterioresOnClick(); //})
					 * 
					 * .success(function(jsonresult) { var
					 * objetoController=jQuery.parseJSON(jsonresult);
					 * 
					 * objetoWebControl.actualizarVariablesPagina(objetoController); })
					 * 
					 * .error(function(){
					 * objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR"); })
					 * 
					 * .complete(function(jsonresult) {
					 * objetoFuncion.anterioresOnComplete(); });
					 */
			
		});
		
		jQuery("#btnSeleccionarLoteFk"+sNombreClase).button();// .addClass("ButtonImagenAnteriores");
	}
	
	setFuncionPadreDesdeBotonSeleccionarLoteFkClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante,strParametros) {
		
		var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=seleccionarLoteFk";
		
		sFormQueryString=sFormQueryString + "&campo_busqueda=" + objetoConstante.STR_NOMBRE_CAMPO_BUSQUEDA;
		
		sFormQueryString=sFormQueryString+"&"+strParametros;
		
		// var
		// sFormBusquedaQueryString=jQuery("#frmBusquedaTipoGuiaRemision").serialize();
		// var sFormOrderByQueryString=jQuery("#frmOrderBy").serialize();
			
		// sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString+"&"+sFormOrderByQueryString;
	
		objetoFuncion.buscarOnClick();
		
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		
		jQuery.post(sUrlGlobalController, sFormQueryString,
			function(jsonresult){})
			
			// .beforeSend(function(){
			// objetoFuncion.anterioresOnClick();
			// })
			
			.success(function(jsonresult) {
				var objetoController=jQuery.parseJSON(jsonresult);
				
				// PARA QUE SE REGISTRE EVENTOS DE TABLA EDITAR
				// jQuery("#ParamsBuscar-chbConEditar").prop('checked',true);
				
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
	
	setBotonSiguientesClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#btnSiguientes"+sNombreClase).click(function(){
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=siguientes";
			// var
			// sFormBusquedaQueryString=jQuery("#frmBusquedaTipoGuiaRemision").serialize();
			// var sFormOrderByQueryString=jQuery("#frmOrderBy").serialize();
				
			// sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString+"&"+sFormOrderByQueryString;
		
			objetoFuncion.siguientesOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// objetoFuncion.anterioresOnClick();
				// })
				
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					objetoFuncion.siguientesOnComplete();	
				});									
		});
		
		jQuery("#btnSiguientes"+sNombreClase).button();// .addClass("ButtonImagenSiguientes");
	}
	
	setImagenNuevoPrepararRegistreseClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#imgNuevoPrepararRegistrese"+sNombreClase).click(function(){
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=nuevoPreparar";
			
			objetoFuncion.nuevoPrepararOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString ,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// objetoFuncion.nuevoPrepararOnClick();
				// })
				
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
		
		// RELACIONES_NAVEGACION
		
		jQuery("#imgCerrarSesion").click(function(){
			var sFormQueryString="controller=Login&action=cerrarSesionGeneral";
				
			objetoFuncion.procesarInicioProceso(objetoConstante);
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString ,
				function(jsonresult){/* alert(jsonresult); */})
				
				// .beforeSend(function(){
				// objetoWebControl.nuevoOnClick();
				// })
				
				.success(function(jsonresult) {						
					var loginController=jQuery.parseJSON(jsonresult);
					
					objetoFuncion.procesarFinalizacionProceso(objetoConstante,sNombreClase);
									
					window.close();
					
					// login.validarCerrarSesionOnComplete(loginController);
				})
				
				.error(function(){
					alert("OCURRIO ALGUN ERROR, VUELVA A INTERNARLO Y CONSULTE CON EL ADMINISTRADOR");
				})
				
				.complete(function(jsonresult) {
					
				});			
		});
	}
	
	setImagenForeingKeyAbrirClic(sNombreClaseFk,sNombreColumnaFk,sModuloFk,sSubModuloFk,objetoFuncion,objetoWebControl,objetoConstante) {
		// alert(objetoConstante.STR_SUFIJO);
		// alert(jQuery("#form"+objetoConstante.STR_SUFIJO+"-"+sNombreColumnaFk+"_img"));
		
		jQuery("#form"+objetoConstante.STR_SUFIJO+"-"+sNombreColumnaFk+"_img").click(function(){
			// alert("#form"+objetoConstante.STR_SUFIJO+"-"+sNombreColumnaFk+"_img");
	
			var sFormQueryStringForeignKeyColumna=funcionGeneral.getUrlStringPartAuxiliar(sNombreClaseFk);
			var sUrlQueryStringForeignKeyColumna="view="+sNombreClaseFk+"&modulo="+sModuloFk+"&sub_modulo="+ sSubModuloFk + sFormQueryStringForeignKeyColumna;
	
			sUrlQueryStringForeignKeyColumna=funcionGeneralEventoJQuery.getQueryStringGeneral(sUrlQueryStringForeignKeyColumna);
			
			funcionGeneral.openWindowAuxiliar("",sUrlQueryStringForeignKeyColumna);
		});
		
		
		// PARA CABECERA TABLA
		// NO FUNCIONO
		// SE USA onclick DE LINK <a>
		// alert(jQuery("#form"+objetoConstante.STR_SUFIJO+"-"+sNombreColumnaFk+"_img2"));
		
		
		/*
		 * alert(sNombreClaseFk);
		 * alert(jQuery("#tblTablaDatos"+sNombreClaseFk+"s"));
		 * alert(jQuery("#form"+objetoConstante.STR_SUFIJO+"-"+sNombreColumnaFk+"_img2"));
		 * 
		 * //jQuery("#form"+objetoConstante.STR_SUFIJO+"-"+sNombreColumnaFk+"_img2").click(function(){
		 * jQuery("#tblTablaDatos"+sNombreClaseFk+"s").on("click","#form"+objetoConstante.STR_SUFIJO+"-"+sNombreColumnaFk+"_img2",
		 * function () {
		 * 
		 * //alert("#form"+objetoConstante.STR_SUFIJO+"-"+sNombreColumnaFk+"_img");
		 * 
		 * var
		 * sFormQueryStringForeignKeyColumna=funcionGeneral.getUrlStringPartAuxiliar(sNombreClaseFk);
		 * var
		 * sUrlQueryStringForeignKeyColumna="view="+sNombreClaseFk+"&modulo="+sModuloFk+"&sub_modulo="+
		 * sSubModuloFk + sFormQueryStringForeignKeyColumna;
		 * 
		 * sUrlQueryStringForeignKeyColumna=funcionGeneralEventoJQuery.getQueryStringGeneral(sUrlQueryStringForeignKeyColumna);
		 * 
		 * funcionGeneral.openWindowAuxiliar("",sUrlQueryStringForeignKeyColumna);
		 * });
		 */	
	}
		
	setImagenForeingKeyAbrirBusquedaClic(sNombreClase,sNombreClaseFk,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=abrirBusqueda"+/* sNombreClase+ */"Para"+sNombreClaseFk+"&";
		// alert(sFormQueryString);
		sFormQueryString=sFormQueryString;// +"id="+idActual;
		
		objetoFuncion.procesarInicioProceso(objetoConstante);

		// alert(sFormQueryString);
		
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		
		jQuery.post(sUrlGlobalController, sFormQueryString ,			
			function(jsonresult){/* alert("A"); */})

			// .beforeSend(function(){
			// guiaremisionFuncionGeneral.nuevoPrepararGuiaRemisionOnClick();
			// })

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
				/* alert("D"); */
				objetoFuncion.procesarFinalizacionProceso(objetoConstante,sNombreClase);
			});
	}
	
	setBotonCancelarArchivoActualClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		/* FALTA COMPLETAR PERO CON COLUMNAS DE ARCHIOS */
		jQuery("#btnCancelarArchivoActual"+sNombreClase).click(function(){
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=NONE";
			
			objetoFuncion.cancelarActualArchivoOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// tipoguiaremisionFuncionGeneral.seleccionarTipoGuiaRemisionOnClick();
				// })
				
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
		jQuery("#btnImprimir"+sNombreClase).click(function(){
			
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
			
			//var htmlReport="";
			
			//htmlReport=jQuery("#tr"+sNombreClase+"Elementos").html();	
			
						// funcionGeneral.printWebPartPageWithStyles("Datos
						// Formulario",jQuery("#divMantenimientoTipoGuiaRemisionAjaxWebPart").html(),"FORMULARIO","tipoguiaremision","TipoGuiaRemision");
			//funcionGeneral.printWebPartPageWithStyles("Datos Formulario",htmlReport,"center","FORMULARIO",sNombreClase.toLowerCase(),sNombreClase);
			
			objetoWebControl.imprimirPaginaFormImprimirWithStyles(sNombreClase);
		});		
	}
	
	setImagenSeleccionarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {		
		
		jQuery("#tblTablaDatos"+sNombreClase+"s").on("click",".imgseleccionar"+sNombreClase.toLowerCase(), function () {
			var idActual=jQuery(this).attr("idactual"+sNombreClase.toLowerCase());
			// alert(idActual);
			funcionGeneralEventoJQuery.setImagenSeleccionarClicBase(idActual,sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante);
		});
	}
	
	setImagenSeleccionarClicBase(idActual,sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {		
		// SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		// jQuery(".imgseleccionar"+sNombreClase.toLowerCase()).click(function(){
		
		// jQuery("#tblTablaDatos"+sNombreClase+"s").on("click",".imgseleccionar"+sNombreClase.toLowerCase(),
		// function () {
			// ESTA EN SUCESS (SE HABILITA SIN RAZON)
			// tipoguiaremisionJQueryPaginaWebInteraccion.deshabilitarCombosDisabledForeignKeyTipoGuiaRemision(true);
			// jQuery('imgseleccionarproducto').trigger('click')
			
			objetoConstante.ESTA_MODO_SELECCIONAR=true;						
			
			// var
			// sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=seleccionarActual&";
			var sFormQueryString="";
			
			if(objetoConstante.BIT_CON_PAGINA_FORM==true) {
				sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=seleccionarActualAbrirPaginaForm&";
				
			} else {
				sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=seleccionarActual&";
			}
			
			
			// var
			// idActual=jQuery(this).attr("idactual"+sNombreClase.toLowerCase());
			
			sFormQueryString=sFormQueryString+"id="+idActual;
			
			objetoFuncion.seleccionarOnClick();
					
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			//alert(sFormQueryString);
			jQuery.post(sUrlGlobalController, sFormQueryString ,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// objetoFuncion.nuevoPrepararOnClick();
				// })
				
				.success(function(jsonresult) {
					
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
					// alert(objetoConstante.STR_ES_RELACIONES);
					// Este evento esta en el Load Window
					if(objetoConstante.STR_ES_RELACIONES=="true") {
						objetoWebControl.onLoadRecargarRelacionesRelacionados();
					}												
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					objetoFuncion.seleccionarOnComplete();
					
					objetoConstante.ESTA_MODO_SELECCIONAR=false;
					
					// SE DESHABILITA OBLIGADO
					objetoWebControl.deshabilitarCombosDisabledFK(true);
				});									
		// });
		
	}
	
	ejecutarImagenSeleccionarClicBase(idActual,sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {		
		// SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		// jQuery(".imgseleccionar"+sNombreClase.toLowerCase()).click(function(){
		
		// jQuery("#tblTablaDatos"+sNombreClase+"s").on("click",".imgseleccionar"+sNombreClase.toLowerCase(),
		// function () {
			// ESTA EN SUCESS (SE HABILITA SIN RAZON)
			// tipoguiaremisionJQueryPaginaWebInteraccion.deshabilitarCombosDisabledForeignKeyTipoGuiaRemision(true);
			// jQuery('imgseleccionarproducto').trigger('click')
			
			objetoConstante.ESTA_MODO_SELECCIONAR=true;						
			
			// var
			// sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=seleccionarActual&";
			var sFormQueryString="";
			
			sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=seleccionarActualPaginaForm&";
									
			// var
			// idActual=jQuery(this).attr("idactual"+sNombreClase.toLowerCase());
			
			sFormQueryString=sFormQueryString+"id="+idActual;
			
			objetoFuncion.seleccionarPaginaFormOnClick();
					
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString ,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// objetoFuncion.nuevoPrepararOnClick();
				// })
				
				.success(function(jsonresult) {
					
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
					
					// objetoWebControl.onLoadCombosDefectoFK(objetoController);
										
					
					// alert("here");
					// Este evento esta en el Load Window
					if(objetoConstante.STR_ES_RELACIONES=="true") {
						if(objetoConstante.BIT_ES_PAGINA_FORM==true) {
							objetoWebControl.onLoadRecargarRelacionesRelacionados();
						}
					}												
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					objetoFuncion.seleccionarPaginaFormOnComplete();
					
					objetoConstante.ESTA_MODO_SELECCIONAR=false;
					
					// SE DESHABILITA OBLIGADO
					objetoWebControl.deshabilitarCombosDisabledFK(true);
				});									
		// });
		
	}
	
	setImagenEliminarTablaClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		// ELIMINAR TABLA
		// SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		// jQuery(".imgeliminartabla"+sNombreClase.toLowerCase()).click(function(){
		
		jQuery("#tblTablaDatos"+sNombreClase+"s").on("click",".imgeliminartabla"+sNombreClase.toLowerCase(), function () {
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=eliminarTabla&";
			
			var idActual=jQuery(this).attr("idactual"+sNombreClase.toLowerCase());
			
			sFormQueryString=sFormQueryString+"id="+idActual;
			
			objetoFuncion.eliminarTablaOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString ,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// objetoFuncion.nuevoPrepararOnClick();
				// })
				
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					objetoFuncion.eliminarTablaOnComplete();	
				});									
		});			
	}
	
	setImagenSeleccionarMostrarAccionesRelacionesClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		// MOSTRAR ACCIONES RELACIONES
		// SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		// jQuery(".imgseleccionarmostraraccionesrelaciones"+sNombreClase.toLowerCase()).click(function(){
		
		jQuery("#tblTablaDatos"+sNombreClase+"s").on("click",".imgseleccionarmostraraccionesrelaciones"+sNombreClase.toLowerCase(), function () {
			
			var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=mostrarEjecutarAccionesRelaciones&";
			
			var idActual=jQuery(this).attr("idactual"+sNombreClase.toLowerCase());
			
			sFormQueryString=sFormQueryString+"id="+idActual;
			
			// perfilFuncionGeneral.seleccionarMostrarDivResumenPerfilActualOnClick();
			
			objetoFuncion.seleccionarMostrarDivAccionesRelacionesActualOnClick();
			
			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
			
			jQuery.post(sUrlGlobalController, sFormQueryString ,
				function(jsonresult){})
				
				// .beforeSend(function(){
				// objetoFuncion.nuevoPrepararOnClick();
				// })
				
				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					
					objetoWebControl.actualizarVariablesPagina(objetoController);	
				})
				
				.error(function(){
					objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				})
				
				.complete(function(jsonresult) {
					// perfilFuncionGeneral.seleccionarMostrarDivResumenPerfilActualOnComplete();
					objetoFuncion.seleccionarMostrarDivAccionesRelacionesActualOnComplete();	
				});									
		});
	}
	
	setImagenSeleccionarBusquedaClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		// SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		// jQuery(".imgseleccionar"+sNombreClase.toLowerCase()).click(function(){
		
		jQuery("#tblTablaDatos"+sNombreClase+"s").on("click",".imgseleccionar"+sNombreClase.toLowerCase(), function () {
				
			var sFuncionJsActual=jQuery(this).attr("funcionjsactual"+sNombreClase.toLowerCase());				
			
			// alert(funcionjsActual);
			
			eval(sFuncionJsActual);
			
			window.close();
			
			// alert(funcionjsActual);
			
			// var
			// sFormQueryString="controller=TipoGuiaRemision&modulo=inventario&sub_modulo=&action=seleccionarActual&";
			
			// var idActual=jQuery(this).attr("idactualtipoguiaremision");
			
			// sFormQueryString=sFormQueryString+"id="+idActual;
			
			/*
			 * tipoguiaremisionFuncionGeneral.seleccionarTipoGuiaRemisionOnClick();
			 * 
			 * jQuery.post(constantes.STR_PROTOCOL+'://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+constantes.STR_GLOBAL_CONTROLLER,
			 * sFormQueryString , function(jsonresult){})
			 * 
			 * //.beforeSend(function(){ //
			 * tipoguiaremisionFuncionGeneral.nuevoPrepararTipoGuiaRemisionOnClick();
			 * //})
			 * 
			 * .success(function(jsonresult) { var
			 * tipoguiaremisionController=jQuery.parseJSON(jsonresult);
			 * 
			 * tipoguiaremisionJQueryPaginaWebInteraccion.actualizarVariablesPaginaTipoGuiaRemision(tipoguiaremisionController); })
			 * 
			 * .error(function(){tipoguiaremisionFuncionGeneral.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");})
			 * 
			 * .complete(function(jsonresult) {
			 * tipoguiaremisionFuncionGeneral.seleccionarTipoGuiaRemisionOnComplete();
			 * });
			 */
		});		
	}
	
	registrarSesionMaestroParaDetalle(idActual,sNombreClase,sNombreClaseRelacionado,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante,sPlural,sNombreAdicional) {
		
		var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=registrarSesion"+/* sNombreClase+sNombreAdicional+ */"Para"+sNombreClaseRelacionado+sPlural+"&";

		sFormQueryString=sFormQueryString+"id="+idActual;
		//alert(sNombreClase);
		objetoFuncion.procesarInicioProceso(objetoConstante);
		
		// alert(sNombreClase+"->"+sNombreClaseRelacionado+"="+idActual);
		// alert('http://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+constantes.STR_GLOBAL_CONTROLLER);
		// alert(sFormQueryString);
		
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		
		jQuery.post(sUrlGlobalController, sFormQueryString ,
			function(jsonresult){/* alert("A"); */})

			// .beforeSend(function(){
			// objetoFuncion.nuevoPrepararOnClick();
			// })

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
				/* alert("D"); */
				objetoFuncion.procesarFinalizacionProceso(objetoConstante,sNombreClase);
			});
	}
	
	setQuitarRelacionesReporte(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=quitarRelacionesReporte&";

		//</a>sFormQueryString=sFormQueryString+"id="+idActual;
		//alert(sNombreClase);
		objetoFuncion.procesarInicioProceso(objetoConstante);
		
		// alert(sNombreClase+"->"+sNombreClaseRelacionado+"="+idActual);
		// alert('http://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+constantes.STR_GLOBAL_CONTROLLER);
		// alert(sFormQueryString);
		
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		
		jQuery.post(sUrlGlobalController, sFormQueryString ,
			function(jsonresult){/* alert("A"); */})

			// .beforeSend(function(){
			// objetoFuncion.nuevoPrepararOnClick();
			// })

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
		
		jQuery("#ParamsBuscar-chbSelTodos").change(function(){						
			funcionGeneralJQuery.seleccionarTodos();			
		});		
	}
	
	setCheckConAltoMaximoTablaChange(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#ParamsBuscar-chbConAltoMaximoTabla").change(function(){
			funcionGeneralJQuery.cambiarAltoMaximoTabla(sNombreClase,"300px");									
		});		
	}
	
	setCheckPostAccionNuevoChange(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#ParamsPostAccion-chbPostAccionNuevo").change(function(){
			if(jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==true) {
				jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked',false);			
			}
		});		
	}
	
	setCheckPostAccionSinCerrarChange(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").change(function(){
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==true) {
				jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked',false);			
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
		// alert(sNombreClase);
		
		jQuery("#ParamsBuscar-chbConEditar"+sSufijoControl).change(function(){
			
			// if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
				
				var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=editarTablaDatos";
				
				var sFormBusquedaQueryString=jQuery("#frmBusqueda"+sNombreClase).serialize();
					
				var sFormPaginacionQueryString="";
				
				if(sSufijoControl!="") {
					sFormPaginacionQueryString=jQuery("#frmPaginacion"+sNombreClase).serialize();					
				}
				
				sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString+"&"+ sFormPaginacionQueryString;
				
				objetoFuncion.editarTablaDatosOnClick();
					
				var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
				
				sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
				// alert(sFormQueryString);
				jQuery.post(sUrlGlobalController, sFormQueryString ,
					function(jsonresult){})
						
					// .beforeSend(function(){
					// tipoguiaremisionFuncionGeneral.editarTablaDatosTipoGuiaRemisionOnClick();
					// })
						
					.success(function(jsonresult) {
						var objetoController=jQuery.parseJSON(jsonresult);
							
						objetoWebControl.actualizarVariablesPagina(objetoController);	
					})
						
					.error(function(){
						objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
					})
						
					.complete(function(jsonresult) {
						objetoFuncion.editarTablaDatosOnComplete();	
					});		
			// }
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
		
		jQuery("#ParamsBuscar-cmbTiposColumnasSelect").change(function(){
			var sValueTipoColumna=jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val();
			// alert("h");
			var idActual=0;
			
			objetoFuncion.setTipoColumnaAccion(sValueTipoColumna,idActual);
			
		});
	}
	
	setComboTiposRelaciones(objetoFuncion,objetoWebControl) {
		
		// TIPOS RELACIONES
		jQuery("#ParamsBuscar-cmbTiposRelaciones").change(function(){
			
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
					
					// alert("DEBE SELECCIONAR 1 REGISTRO");
				}
			}
		});	
	}
	
	setComboTiposRelacionesFormulario(objetoFuncion,objetoWebControl) {
		
		jQuery("#ParamsPostAccion-cmbTiposRelacionesFormulario").change(function(){
			
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
		
		jQuery("#"+nombreCombo+"").change(function(){

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
			//alert(objetoFuncion);
			objetoFuncion.procesarOnClick();

			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			sQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sQueryString);
			
			//alert(sQueryString);
			
			jQuery.post(sUrlGlobalController, sQueryString ,
				function(jsonresult){})

				// .beforeSend(function(){
					// objetoFuncion.editarTablaDatosOnClick();
				// })

				.success(function(jsonresult) {
					var objetoController=jQuery.parseJSON(jsonresult);
					//alert("changed");
					objetoWebControl.actualizarVariablesPagina(objetoController);

					objetoWebControl.manejarComboActionChange(sNombreColumna,nombreCombo,sRecargarFkTipos,objetoController);
					
					// SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
					/*
					 * if(id_pais=="form"+ciudadConstante.sSUFIJO+"-id_pais" &&
					 * sRecargarFkTipos!="NINGUNO") {
					 * if(ciudadController.ciudadActual.id_provincia!=null){
					 * if(jQuery("#form-id_provincia").val() !=
					 * ciudadController.ciudadActual.id_provincia) {
					 * jQuery("#form-id_provincia").val(ciudadController.ciudadActual.id_provincia).trigger("change"); } } }
					 */
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
		// alert(jQuery("#"+nombreTexto+""));
		// focusout
		jQuery("#"+nombreTexto+"").change(function(){

			objetoWebControl.deshabilitarCombosDisabledFK(false);
			
			var sQueryString="";
			var sFormQueryString="";
			var sFormTotalesQueryString="";
			
			sFormQueryString=jQuery("#frmMantenimiento"+sNombreClase).serialize();
			sFormTotalesQueryString=jQuery("#frmMantenimientoTotales"+sNombreClase).serialize();
			
			sFormQueryString+=("&" + sFormTotalesQueryString);
			
			// alert(sFormQueryString);
			sQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=manejarEventos";
			sQueryString+="&evento_control="+nombreTexto+"&evento_tipo=change&";
			sQueryString+=sFormQueryString;

			if(objetoConstante.ESTA_MODO_SELECCIONAR==true) {
				// PARA QUE NO SE EJECUTE SOLO AL SELECCIONAR
				return;
			}

			objetoFuncion.procesarOnClick();

			var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
			
			//alert(sQueryString);
			
			jQuery.post(sUrlGlobalController, sQueryString ,
				function(jsonresult){})

				/*
				 * .beforeSend(function(){
				 * cotizacion_detalleFuncionGeneral.editarTablaDatoscotizacion_detalleOnClick(); })
				 */

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
		// alert(jQuery("#"+nombreTexto+""));
		// jQuery("#"+nombreTexto+"").focusout(function(){

			objetoWebControl.deshabilitarCombosDisabledFK(false);
			
			var sQueryString="";
			var sFormQueryString="";
			var sFormTotalesQueryString="";
			
			sFormQueryString=jQuery("#frmMantenimiento"+sNombreClase).serialize();
			sFormTotalesQueryString=jQuery("#frmMantenimientoTotales"+sNombreClase).serialize();
			
			sFormQueryString+=("&" + sFormTotalesQueryString);
			
			// alert(sFormQueryString);
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

				/*
				 * .beforeSend(function(){
				 * cotizacion_detalleFuncionGeneral.editarTablaDatoscotizacion_detalleOnClick(); })
				 */

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

		// });
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
		jQuery("#ParamsBuscar-cmbAcciones").change(function(){
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
						// alert(constantes.STR_PROTOCOL+'://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+constantes.STR_GLOBAL_CONTROLLER
						// + '?'+sFormQueryString);
						// REPORTES CON LIBRERIA PHP (PDF,EXCEL,HTML,ETC)
						// alert(constantes.STR_PROTOCOL+'://'+constantes.STR_IP_SERVIDOR+':'+constantes.STR_PUERTO_SERVIDOR+'/'+constantes.STR_CONTEXTO_APLICACION_SERVICIO+'/'+constantes.STR_CONTEXTO_APLICACION_TOCOMPLETE_SERVICIO+'/'+constantes.STR_GLOBAL_CONTROLLER
						// + '?'+sFormQueryString);
						
						var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
						
						sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
						
						window.open(sUrlGlobalController + '?'+sFormQueryString);																
					
					} else {
						if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
							jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
						}
							
						objetoFuncion.resaltarRestaurarDivMensaje(true,"ERROR:DEBE SELECCIONAR AL MENOS 1 REGISTRO","ERROR");
							
						// alert("DEBE SELECCIONAR AL MENOS 1 REGISTRO");
					}
					
				} else if(sValueGenerarReporte=="HTML2"){
					
					if(strValueTipoReporte=="NORMAL") {
						
						var sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=generarHtmlReporte";
						var sFormBusquedaQueryString=jQuery("#frmBusqueda"+sNombreClase).serialize();
						var sFormTablaQueryString=jQuery("#frmTablaDatos"+sNombreClase).serialize();
						
						sFormQueryString=sFormQueryString+"&"+sFormBusquedaQueryString;
						sFormQueryString=sFormQueryString+"&"+sFormTablaQueryString;
						sFormQueryString=sFormQueryString+"&"+sFormOrderByQueryString;
						
						// tipoguiaremisionFuncionGeneral.generarHtmlReporteTipoGuiaRemisionOnClick();
						
						// OJO ES RECURSIVO 1 VEZ
						if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
							jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
						}
						
						
						var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
						
						sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
						
						//window.open(sUrlGlobalController + '?'+sFormQueryString);
						
						// SE USABA PARA RETORNAR HTML EN JAVASCRIPT Y DE AHI
						
						jQuery.post(sUrlGlobalController, sFormQueryString ,
							function(jsonresult){})
								
							// .beforeSend(function(){
							// tipoguiaremisionFuncionGeneral.editarTablaDatosTipoGuiaRemisionOnClick();
							// })
								
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
							
							//window.open(sUrlGlobalController + '?'+sFormQueryString);
						
						
							// SE USABA PARA RETORNAR HTML EN JAVASCRIPT Y DE
							jQuery.post(sUrlGlobalController, sFormQueryString ,
								function(jsonresult){})
									
								// .beforeSend(function(){
								// tipoguiaremisionFuncionGeneral.editarTablaDatosTipoGuiaRemisionOnClick();
								// })
									
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
							
							// alert("DEBE SELECCIONAR AL MENOS 1 REGISTRO");
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
							
							// tipoguiaremisionFuncionGeneral.generarHtmlReporteTipoGuiaRemisionOnClick();
							
							// OJO ES RECURSIVO 1 VEZ
							if(jQuery("#ParamsBuscar-cmbAcciones").val() != constantes.STR_ACCIONES) {
								jQuery("#ParamsBuscar-cmbAcciones").val(constantes.STR_ACCIONES).trigger("change");
							}
							
							
							var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
							
							sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
							
							//window.open(sUrlGlobalController + '?'+sFormQueryString);
						
						
							// SE USABA PARA RETORNAR HTML EN JAVASCRIPT Y DE
							jQuery.post(sUrlGlobalController, sFormQueryString ,
								function(jsonresult){})
									
								// .beforeSend(function(){
								// tipoguiaremisionFuncionGeneral.editarTablaDatosTipoGuiaRemisionOnClick();
								// })
									
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
							
							// alert("DEBE SELECCIONAR AL MENOS 1 REGISTRO");
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
						
					// .beforeSend(function(){
					// tipoguiaremisionFuncionGeneral.editarTablaDatosTipoGuiaRemisionOnClick();
					// })
						
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
							
						// .beforeSend(function(){
						// tipoguiaremisionFuncionGeneral.editarTablaDatosTipoGuiaRemisionOnClick();
						// })
							
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
				    // if (index !== 0) {
				       if(jQuery(this).is(":checked")) {
				    	   iNumSeleccionados=iNumSeleccionados + 1;
							
				    	   idActual=jQuery(this).val();
				    	   
				    	   // idActual=index;
				    	   
				    	   // alert(index+"");
				        // type_filter.push($(this).val());
				       }
				    // }
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
					
					// .beforeSend(function(){
					// objetoFuncion.nuevoPrepararOnClick();
					// })
					
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
								
							// .beforeSend(function(){
							// tipoguiaremisionFuncionGeneral.editarTablaDatosTipoGuiaRemisionOnClick();
							// })
								
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
			        
                    /*
					} else {
						
						//REPORTES (Abre el Controller)
						
						var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
						
						sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
						
						//alert(sUrlGlobalController);
						//alert(sFormQueryString);
						
						window.open(sUrlGlobalController + '?'+sFormQueryString);
					}
					*/
				}
			}			
		});
	}
	
	setDivsDialogBindClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#divMantenimiento"+sNombreClase+"AjaxWebPart").dialog(funcionGeneralJQuery.getConfigDivMantenimientoAjaxWebPartJQuery());		
		
		/*
		 * , buttons: [ { text: "CERRAR", click: function() {
		 * jQuery(this).dialog("close"); } } ]
		 */
		
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
			// alert("Bye");
			objetoWebControl.onUnLoadWindow();			
			// return false;
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
		//alert(sFormQueryString);
		jQuery.post(sUrlGlobalController, sFormQueryString,
			function(jsonresult){})
					
			// .beforeSend(function(){
			// tipoguiaremisionFuncionGeneral.buscarTipoGuiaRemisionOnClick();
			// })
					
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
	
	setPageUnLoadWindowPost(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		var sFormQueryString="";;
		
		sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=unload&"+sFormQueryString;
		
		// tipoguiaremisionConstante.BIT_ES_PARA_JQUERY=true;
			
		objetoFuncion.buscarOnClick();				
			
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		
		jQuery.post(sUrlGlobalController,sFormQueryString ,
			function(jsonresult){})
	
			.success(function(jsonresult) {
				var objetoController=jQuery.parseJSON(jsonresult);
				// tipoguiaremisionJQueryPaginaWebInteraccion.actualizarVariablesPaginaTipoGuiaRemision(objetoController);
				
				// window.close();
			})
	
			.error(function(){
				// tipoguiaremisionFuncionGeneral.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
				
				// window.close();
			})
	
			.complete(function(jsonresult) {
				objetoFuncion.buscarOnComplete();
				// tipoguiaremisionConstante.BIT_ES_PARA_JQUERY=true;
			});
	}
	
	setPageOnLoadPost(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
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
		
		//alert(sNombreClase+":"+sSUFIJO);
		/*
		 * if(objetoConstante.BIT_ES_LOAD_NORMAL==false) {
		 * //sTypeOnLoad="onloadhijos"; objetoConstante.BIT_ES_LOAD_NORMAL=true; }
		 */
		
		var sFormQueryString="sTypeOnLoad"+sNombreClase+"="+sTypeOnLoad+"&sTipoPaginaAuxiliar"+sNombreClase+"="+sTipoPaginaAuxiliar+"&sTipoUsuarioAuxiliar"+sNombreClase+"="+sTipoUsuarioAuxiliar+"&ES_POPUP="+sES_POPUP+"&ES_BUSQUEDA="+sES_BUSQUEDA+"&FUNCION_JS="+sFUNCION_JS;// constantes.STRUSUARIODEFAULTINVITADO;
		sFormQueryString=sFormQueryString + "&ES_RELACIONES="+sES_RELACIONES + "&ES_RELACIONADO="+sES_RELACIONADO + "&ES_SUB_PAGINA="+sES_SUB_PAGINA + "&SUFIJO="+sSUFIJO;
		sFormQueryString=sFormQueryString + "&id_opcion="+bigID_OPCION;
		
		sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=index&"+sFormQueryString;
		/*
		 * alert(strMODULO); alert(bigIDMODULO); alert(bigIDGRUPO_OPCION);
		 */
		
		objetoConstante.BIT_ES_PARA_JQUERY=true;
			
		objetoFuncion.buscarOnClick();				
			
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		// alert("here olLoad Window");
		//alert(sFormQueryString);
		jQuery.post(sUrlGlobalController,sFormQueryString ,
			function(jsonresult){})
	
			.success(function(jsonresult) {
				var objetoController=jQuery.parseJSON(jsonresult);
				// alert(jsonresult);
				objetoWebControl.actualizarVariablesPagina(objetoController);
				
				// objetoWebControl.onLoadCombosDefectoFK(objetoController);
				
				// OCULTA INICIALMENTE LAS BUSQUEDAS CUANDO SEA UNA PAGINA
				// AUXILIAR O HIJA
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
				
				/*
				if(objetoConstante.STR_ES_RELACIONES=="true") {
					if(objetoConstante.BIT_ES_PAGINA_FORM==true) {
						objetoWebControl.onLoadWindowRelacionesRelacionados();
						objetoWebControl.onLoadRecargarRelacionesRelacionados();						
					}
				}
				*/
			})
	
			.error(function(){
				objetoFuncion.resaltarRestaurarDivMensaje(true,constantes.STR_MENSAJE_ERROR_GENERAL,"ERROR");
			})
	
			.complete(function(jsonresult) {
				objetoFuncion.buscarOnComplete();
				
				objetoConstante.BIT_ES_PARA_JQUERY=true;
			});
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
		
		/*
		 * if(objetoConstante.BIT_ES_LOAD_NORMAL==false) {
		 * //sTypeOnLoadTipoGuiaRemision="onloadhijos";
		 * objetoConstante.BIT_ES_LOAD_NORMAL=true; }
		 */
		
		var sFormQueryString="sTypeOnLoad"+sNombreClase+"="+sTypeOnLoad+"&sTipoPaginaAuxiliar"+sNombreClase+"="+sTipoPaginaAuxiliar+"&sTipoUsuarioAuxiliar"+sNombreClase+"="+sTipoUsuarioAuxiliar+"&ES_POPUP="+sES_POPUP+"&ES_BUSQUEDA="+sES_BUSQUEDA+"&FUNCION_JS="+sFUNCION_JS;// constantes.STRUSUARIODEFAULTINVITADO;
		sFormQueryString=sFormQueryString + "&ES_RELACIONES="+sES_RELACIONES + "&ES_RELACIONADO="+sES_RELACIONADO + "&SUFIJO="+sSUFIJO;
		
		sFormQueryString="controller="+sNombreClase+"&modulo="+sModulo+"&sub_modulo="+sSubModulo+"&action=indexRecargarRelacionado&"+sFormQueryString;
		
		objetoConstante.BIT_ES_PARA_JQUERY=true;
			
		objetoFuncion.buscarOnClick();				
			
		var sUrlGlobalController=funcionGeneralEventoJQuery.getUrlGlobalController();
		
		sFormQueryString=funcionGeneralEventoJQuery.getQueryStringGeneral(sFormQueryString);
		// alert(sFormQueryString);
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
							
							/*
							if(strFila!=null) {
								var row=document.getElementById(strFila);
					    
								this.mostrarOcultarFilaInterno(row,false);
							}
							*/
							
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
		jQuery("#btnImprimirPagina"+sNombreClase).click(function(){
			//alert(jQuery("#divTablaDatos"+sNombreClase+"sAjaxWebPart").html());
			//funcionGeneral.printWebPartPageWithStyles("Datos Tabla",jQuery("#divTablaDatos"+sNombreClase+"sAjaxWebPart").html(),"center","TABLA",sNombreClase.toLowerCase(),sNombreClase);
			
			objetoWebControl.imprimirPaginaImprimirWithStyles(sNombreClase);
		});
		
	}
	
	setBotonCerrarClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#btnCerrarPagina"+sNombreClase).click(function(){
			window.close();								
		});
		
		jQuery("#btnCerrarPagina"+sNombreClase).button().addClass("ButtonImagenCerrarPagina");
		
	}
	
	setBotonOrderByClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#btnOrderBy"+sNombreClase).click(function(){
			// ERROR
			// jQuery(this).dialog("open");
			
			jQuery("#divOrderBy"+sNombreClase+"AjaxWebPart").dialog("open");
			
			/*
			 * jQuery("#divOrderBy"+sNombreClase+"AjaxWebPart").position({ my:
			 * "center top", at: "center top", of: window, within: window });
			 */
		});
		
		jQuery("#btnOrderBy"+sNombreClase).button().addClass("ButtonImagenOrderBy");		
	}
	
	setBotonOrderByRelClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		jQuery("#btnOrderByRel"+sNombreClase).click(function(){
			// ERROR
			// jQuery(this).dialog("open");
			
			jQuery("#divOrderByRel"+sNombreClase+"AjaxWebPart").dialog("open");
			
			/*
			 * jQuery("#divOrderByRel"+sNombreClase+"AjaxWebPart").position({
			 * my: "center top", at: "center top", of: window, within: window
			 * });
			 */
		});
		
		jQuery("#btnOrderByRel"+sNombreClase).button().addClass("ButtonImagenOrderBy");				
	}
	
	setBotonBuscarClic(sNombreClase,sNombreIndice,sModulo,sSubModulo,objetoFuncion,objetoWebControl,objetoConstante) {
		
		jQuery("#btnBuscar"+sNombreClase + objetoConstante.STR_SUFIJO+sNombreIndice).click(function(){

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
		
		jQuery("#btnBuscar"+sNombreClase+objetoConstante.STR_SUFIJO+""+sNombreIndice).button().addClass("ButtonImagenBuscar");
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
		jQuery("#imgNuevoToolBar"+sNombreClase).click(function(){
			jQuery("#btnNuevoPreparar"+sNombreClase).trigger("click");
		});
		
		jQuery("#imgNuevoGuardarCambiosToolBar"+sNombreClase).click(function(){
			jQuery("#btnNuevoTablaPreparar"+sNombreClase).trigger("click");
		});
		
		jQuery("#imgGuardarCambiosToolBar"+sNombreClase).click(function(){
			jQuery("#btnGuardarCambios"+sNombreClase).trigger("click");
		});
		
		jQuery("#imgCopiarToolBar"+sNombreClase).click(function(){
			jQuery("#btnCopiar"+sNombreClase).trigger("click");
		});
		
		jQuery("#imgDuplicarToolBar"+sNombreClase).click(function(){
			jQuery("#btnDuplicar"+sNombreClase).trigger("click");
		});
		
		jQuery("#imgRecargarInformacionToolBar"+sNombreClase).click(function(){
			jQuery("#btnRecargarInformacion"+sNombreClase).trigger("click");
		});
		
		jQuery("#imgAnterioresToolBar"+sNombreClase).click(function(){
			jQuery("#btnAnteriores"+sNombreClase).trigger("click");
		});
		
		jQuery("#imgSiguientesToolBar"+sNombreClase).click(function(){
			jQuery("#btnSiguientes"+sNombreClase).trigger("click");
		});
		
		jQuery("#imgAbrirOrderByToolBar"+sNombreClase).click(function(){
			jQuery("#btnOrderBy"+sNombreClase).trigger("click");
		});
		
		jQuery("#imgCerrarPaginaToolBar"+sNombreClase).click(function(){
			jQuery("#btnCerrarPagina"+sNombreClase).trigger("click");
		});
		
		// FORMULARIO
		jQuery("#imgActualizarToolBar"+sNombreClase).click(function(){
			jQuery("#btnActualizar"+sNombreClase).trigger("click");
		});
		
		jQuery("#imgEliminarToolBar"+sNombreClase).click(function(){
			jQuery("#btnEliminar"+sNombreClase).trigger("click");
		});
		
		jQuery("#imgCancelarToolBar"+sNombreClase).click(function(){
			jQuery("#btnCancelar"+sNombreClase).trigger("click");
		});
		// TOOLBAR
		
	}
	
	setHotKeyClic(sNombreClase,sModulo,sSubModulo,objetoFuncion,objetoWebControl) {
		
		// HOTKEYS
		if(constantes.CON_HOTKEYS==true) {
			var strTipoHotKey="";
			
			// NO FUNCIONA, SE CIERRA AUTOMATICAMENTE
			/*
			 * jQuery(document).bind(constantes.STR_HOTKEY_NUEVO, function(){
			 * jQuery("#btnNuevoPreparar"+sNombreClase).trigger("click"); });
			 * 
			 * jQuery(document).bind(constantes.STR_HOTKEY_NUEVO_TABLA,
			 * function(){
			 * jQuery("#btnNuevoTablaPreparar"+sNombreClase).trigger("click");
			 * });
			 * 
			 * jQuery(document).bind(constantes.STR_HOTKEY_GUARDAR, function(){
			 * jQuery("#btnGuardarCambios"+sNombreClase).trigger("click"); });
			 * 
			 * jQuery(document).bind(constantes.STR_HOTKEY_COPIAR, function(){
			 * jQuery("#btnCopiar"+sNombreClase).trigger("click"); });
			 * 
			 * jQuery(document).bind(constantes.STR_HOTKEY_DUPLICAR, function(){
			 * jQuery("#btnDuplicar"+sNombreClase).trigger("click"); });
			 * 
			 * jQuery(document).bind(constantes.STR_HOTKEY_RECARGAR, function(){
			 * jQuery("#btnRecargarInformacion"+sNombreClase).trigger("click");
			 * });
			 * 
			 * jQuery(document).bind(constantes.STR_HOTKEY_ANTERIORES,
			 * function(){
			 * jQuery("#btnAnteriores"+sNombreClase).trigger("click"); });
			 * 
			 * jQuery(document).bind(constantes.STR_HOTKEY_SIGUIENTES,
			 * function(){
			 * jQuery("#btnSiguientes"+sNombreClase).trigger("click"); });
			 * 
			 * jQuery(document).bind(constantes.STR_HOTKEY_ORDEN, function(){
			 * jQuery("#btnOrderBy"+sNombreClase).trigger("click"); });
			 * 
			 * jQuery(document).bind(constantes.STR_HOTKEY_CERRAR, function(){
			 * jQuery("#btnCerrarPagina"+sNombreClase).trigger("click"); });
			 * 
			 * jQuery(document).bind(constantes.STR_HOTKEY_ACTUALIZAR,
			 * function(){
			 * jQuery("#btnActualizar"+sNombreClase).trigger("click"); });
			 * 
			 * jQuery(document).bind(constantes.STR_HOTKEY_ELIMINAR, function(){
			 * jQuery("#btnEliminar"+sNombreClase).trigger("click"); });
			 * 
			 * jQuery(document).bind(constantes.STR_HOTKEY_CANCELAR, function(){
			 * jQuery("#btnCancelar"+sNombreClase).trigger("click"); });
			 */
		}
		// HOTKEYS
		
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
	// handleLeftSideSliderChange(e, ui) {
	// this.handleLeftSideSliderChangeTipoGuiaRemision(e, ui); }
	
	handleLeftSideSliderChange(e, ui) {
		
		var maxScroll = jQuery("#leftSidebar")[0].scrollWidth -  jQuery("#leftSidebar").width();
		// alert(maxScroll);
		jQuery("#leftSidebar").animate({scrollLeft: ui.value * (maxScroll / 100) }, 1000);
	}
	
	// handleLeftSideSliderSlide(e, ui) {
	// this.handleLeftSideSliderSlideTipoGuiaRemision(e, ui); }
	
	handleLeftSideSliderSlide(e, ui) {
		
		var maxScroll = jQuery("#leftSidebar")[0].scrollWidth - jQuery("#leftSidebar").width();
		
		jQuery("#leftSidebar").attr({scrollLeft: ui.value * (maxScroll / 100) });
	}
	
	// handleContentSliderChange(e, ui) {
	// this.handleContentSliderChangeTipoGuiaRemision(e, ui); }
	
	handleContentSliderChange(e, ui) {
		
		var maxScroll = jQuery("#content")[0].scrollWidth -  jQuery("#content").width();
		// alert(maxScroll);
		jQuery("#content").animate({scrollLeft: ui.value * (maxScroll / 100) }, 1000);
	}
	
	// handleContentSliderSlide(e, ui) {
	// this.handleContentSliderSlideTipoGuiaRemision(e, ui); }
	
	handleContentSliderSlide(e, ui) {
		
		var maxScroll = jQuery("#content")[0].scrollWidth - jQuery("#content").width();
		
		jQuery("#content").attr({scrollLeft: ui.value * (maxScroll / 100) });
	}
}

var funcionGeneralEventoJQuery=new FuncionGeneralEventoJQuery();

export {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery};

//</script>