//<script type="text/javascript" language="javascript">



//var cotizacion_detalleJQueryPaginaWebInteraccion= function (cotizacion_detalle_control) {
//this.,this.,this.

import {cotizacion_detalle_constante,cotizacion_detalle_constante1} from '../util/cotizacion_detalle_constante.js';

import {cotizacion_detalle_funcion,cotizacion_detalle_funcion1} from '../util/cotizacion_detalle_form_funcion.js';


class cotizacion_detalle_webcontrol extends GeneralEntityWebControl {
	
	cotizacion_detalle_control=null;
	cotizacion_detalle_controlInicial=null;
	cotizacion_detalle_controlAuxiliar=null;
		
	//if(cotizacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cotizacion_detalle_control) {
		super();
		
		this.cotizacion_detalle_control=cotizacion_detalle_control;
	}
		
	actualizarVariablesPagina(cotizacion_detalle_control) {
		
		if(cotizacion_detalle_control.action=="index" || cotizacion_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cotizacion_detalle_control);
			
		} 
		
		
		
	
		else if(cotizacion_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cotizacion_detalle_control);	
		
		} else if(cotizacion_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cotizacion_detalle_control);		
		}
	
	
		
		
		else if(cotizacion_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cotizacion_detalle_control);		
		
		} else if(cotizacion_detalle_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cotizacion_detalle_control);		
		
		} 
		//else if(cotizacion_detalle_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cotizacion_detalle_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cotizacion_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cotizacion_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cotizacion_detalle_control) {
		this.actualizarPaginaAccionesGenerales(cotizacion_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cotizacion_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cotizacion_detalle_control);
		this.actualizarPaginaOrderBy(cotizacion_detalle_control);
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cotizacion_detalle_control);
		//this.actualizarPaginaFormulario(cotizacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cotizacion_detalle_control);
		this.actualizarPaginaAreaBusquedas(cotizacion_detalle_control);
		this.actualizarPaginaCargaCombosFK(cotizacion_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cotizacion_detalle_control) {
		//this.actualizarPaginaFormulario(cotizacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cotizacion_detalle_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cotizacion_detalle_control);		
		this.actualizarPaginaFormulario(cotizacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cotizacion_detalle_control);		
		this.actualizarPaginaFormulario(cotizacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cotizacion_detalle_control);		
		this.actualizarPaginaFormulario(cotizacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cotizacion_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(cotizacion_detalle_control);
		this.actualizarPaginaCargaCombosFK(cotizacion_detalle_control);
		this.actualizarPaginaFormulario(cotizacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(cotizacion_detalle_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cotizacion_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(cotizacion_detalle_control);
		this.actualizarPaginaCargaCombosFK(cotizacion_detalle_control);
		this.actualizarPaginaFormulario(cotizacion_detalle_control);
		this.onLoadCombosDefectoFK(cotizacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cotizacion_detalle_control) {
		//FORMULARIO
		if(cotizacion_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cotizacion_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cotizacion_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		
		//COMBOS FK
		if(cotizacion_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cotizacion_detalle_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cotizacion_detalle_control) {
		//FORMULARIO
		if(cotizacion_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cotizacion_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cotizacion_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);	
		
		//COMBOS FK
		if(cotizacion_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cotizacion_detalle_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(cotizacion_detalle_control) {
		//FORMULARIO
		if(cotizacion_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cotizacion_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);	
		//COMBOS FK
		if(cotizacion_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cotizacion_detalle_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cotizacion_detalle_control) {
		
		if(cotizacion_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cotizacion_detalle_control);
		}
		
		if(cotizacion_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cotizacion_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cotizacion_detalle_control) {
		if(cotizacion_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cotizacion_detalleReturnGeneral",JSON.stringify(cotizacion_detalle_control.cotizacion_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control) {
		if(cotizacion_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cotizacion_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cotizacion_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cotizacion_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cotizacion_detalle_control, mostrar) {
		
		if(mostrar==true) {
			cotizacion_detalle_funcion1.resaltarRestaurarDivsPagina(false,"cotizacion_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cotizacion_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"cotizacion_detalle");
			}			
			
			cotizacion_detalle_funcion1.mostrarDivMensaje(true,cotizacion_detalle_control.strAuxiliarMensaje,cotizacion_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			cotizacion_detalle_funcion1.mostrarDivMensaje(false,cotizacion_detalle_control.strAuxiliarMensaje,cotizacion_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cotizacion_detalle_control) {
		if(cotizacion_detalle_funcion1.esPaginaForm(cotizacion_detalle_constante1)==true) {
			window.opener.cotizacion_detalle_webcontrol1.actualizarPaginaTablaDatos(cotizacion_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(cotizacion_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(cotizacion_detalle_control) {
		cotizacion_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cotizacion_detalle_control.strAuxiliarUrlPagina);
				
		cotizacion_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cotizacion_detalle_control.strAuxiliarTipo,cotizacion_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cotizacion_detalle_control) {
		cotizacion_detalle_funcion1.resaltarRestaurarDivMensaje(true,cotizacion_detalle_control.strAuxiliarMensajeAlert,cotizacion_detalle_control.strAuxiliarCssMensaje);
			
		if(cotizacion_detalle_funcion1.esPaginaForm(cotizacion_detalle_constante1)==true) {
			window.opener.cotizacion_detalle_funcion1.resaltarRestaurarDivMensaje(true,cotizacion_detalle_control.strAuxiliarMensajeAlert,cotizacion_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cotizacion_detalle_control) {
		this.cotizacion_detalle_controlInicial=cotizacion_detalle_control;
			
		if(cotizacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cotizacion_detalle_control.strStyleDivArbol,cotizacion_detalle_control.strStyleDivContent
																,cotizacion_detalle_control.strStyleDivOpcionesBanner,cotizacion_detalle_control.strStyleDivExpandirColapsar
																,cotizacion_detalle_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cotizacion_detalle_control) {
		this.actualizarCssBotonesPagina(cotizacion_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cotizacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cotizacion_detalle_control.tiposReportes,cotizacion_detalle_control.tiposReporte
															 	,cotizacion_detalle_control.tiposPaginacion,cotizacion_detalle_control.tiposAcciones
																,cotizacion_detalle_control.tiposColumnasSelect,cotizacion_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cotizacion_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cotizacion_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cotizacion_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cotizacion_detalle_control) {
	
		var indexPosition=cotizacion_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cotizacion_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cotizacion_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cotizacion",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.cargarComboscotizacionsFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.cargarCombosbodegasFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.cargarCombosproductosFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.cargarCombosunidadsFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_suplidor",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.cargarCombosotro_suplidorsFK(cotizacion_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cotizacion_detalle_control.strRecargarFkTiposNinguno!=null && cotizacion_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && cotizacion_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(cotizacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cotizacion",cotizacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_detalle_webcontrol1.cargarComboscotizacionsFK(cotizacion_detalle_control);
				}

				if(cotizacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",cotizacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_detalle_webcontrol1.cargarCombosbodegasFK(cotizacion_detalle_control);
				}

				if(cotizacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",cotizacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_detalle_webcontrol1.cargarCombosproductosFK(cotizacion_detalle_control);
				}

				if(cotizacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",cotizacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_detalle_webcontrol1.cargarCombosunidadsFK(cotizacion_detalle_control);
				}

				if(cotizacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_suplidor",cotizacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_detalle_webcontrol1.cargarCombosotro_suplidorsFK(cotizacion_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.cotizacion_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.cotizacion_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.cotizacion_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.cotizacion_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.cotizacion_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.cotizacion_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablacotizacionFK(cotizacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_detalle_funcion1,cotizacion_detalle_control.cotizacionsFK);
	}

	cargarComboEditarTablabodegaFK(cotizacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_detalle_funcion1,cotizacion_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(cotizacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_detalle_funcion1,cotizacion_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(cotizacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_detalle_funcion1,cotizacion_detalle_control.unidadsFK);
	}

	cargarComboEditarTablaotro_suplidorFK(cotizacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_detalle_funcion1,cotizacion_detalle_control.otro_suplidorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(cotizacion_detalle_control) {
		jQuery("#tdcotizacion_detalleNuevo").css("display",cotizacion_detalle_control.strPermisoNuevo);
		jQuery("#trcotizacion_detalleElementos").css("display",cotizacion_detalle_control.strVisibleTablaElementos);
		jQuery("#trcotizacion_detalleAcciones").css("display",cotizacion_detalle_control.strVisibleTablaAcciones);
		jQuery("#trcotizacion_detalleParametrosAcciones").css("display",cotizacion_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cotizacion_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(cotizacion_detalle_control);
				
		if(cotizacion_detalle_control.cotizacion_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(cotizacion_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(cotizacion_detalle_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cotizacion_detalle_control) {
	
		jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id").val(cotizacion_detalle_control.cotizacion_detalleActual.id);
		jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-version_row").val(cotizacion_detalle_control.cotizacion_detalleActual.versionRow);
		
		if(cotizacion_detalle_control.cotizacion_detalleActual.id_cotizacion!=null && cotizacion_detalle_control.cotizacion_detalleActual.id_cotizacion>-1){
			if(jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_cotizacion").val() != cotizacion_detalle_control.cotizacion_detalleActual.id_cotizacion) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_cotizacion").val(cotizacion_detalle_control.cotizacion_detalleActual.id_cotizacion).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_cotizacion").select2("val", null);
			if(jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_cotizacion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_cotizacion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_detalle_control.cotizacion_detalleActual.id_bodega!=null && cotizacion_detalle_control.cotizacion_detalleActual.id_bodega>-1){
			if(jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != cotizacion_detalle_control.cotizacion_detalleActual.id_bodega) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(cotizacion_detalle_control.cotizacion_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_detalle_control.cotizacion_detalleActual.id_producto!=null && cotizacion_detalle_control.cotizacion_detalleActual.id_producto>-1){
			if(jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != cotizacion_detalle_control.cotizacion_detalleActual.id_producto) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto").val(cotizacion_detalle_control.cotizacion_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_detalle_control.cotizacion_detalleActual.id_unidad!=null && cotizacion_detalle_control.cotizacion_detalleActual.id_unidad>-1){
			if(jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != cotizacion_detalle_control.cotizacion_detalleActual.id_unidad) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(cotizacion_detalle_control.cotizacion_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_unidad").select2("val", null);
			if(jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-cantidad").val(cotizacion_detalle_control.cotizacion_detalleActual.cantidad);
		jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-precio").val(cotizacion_detalle_control.cotizacion_detalleActual.precio);
		jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-descuento_porciento").val(cotizacion_detalle_control.cotizacion_detalleActual.descuento_porciento);
		jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-descuento_monto").val(cotizacion_detalle_control.cotizacion_detalleActual.descuento_monto);
		jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-sub_total").val(cotizacion_detalle_control.cotizacion_detalleActual.sub_total);
		jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-iva_porciento").val(cotizacion_detalle_control.cotizacion_detalleActual.iva_porciento);
		jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-iva_monto").val(cotizacion_detalle_control.cotizacion_detalleActual.iva_monto);
		jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-total").val(cotizacion_detalle_control.cotizacion_detalleActual.total);
		jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-observacion").val(cotizacion_detalle_control.cotizacion_detalleActual.observacion);
		jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-impuesto2_porciento").val(cotizacion_detalle_control.cotizacion_detalleActual.impuesto2_porciento);
		jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-impuesto2_monto").val(cotizacion_detalle_control.cotizacion_detalleActual.impuesto2_monto);
		
		if(cotizacion_detalle_control.cotizacion_detalleActual.id_otro_suplidor!=null && cotizacion_detalle_control.cotizacion_detalleActual.id_otro_suplidor>-1){
			if(jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_otro_suplidor").val() != cotizacion_detalle_control.cotizacion_detalleActual.id_otro_suplidor) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_otro_suplidor").val(cotizacion_detalle_control.cotizacion_detalleActual.id_otro_suplidor).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_otro_suplidor").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_otro_suplidor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cotizacion_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cotizacion_detalle","inventario","","form_cotizacion_detalle",formulario,"","",paraEventoTabla,idFilaTabla,cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}
	
	actualizarSpanMensajesCampos(cotizacion_detalle_control) {
		jQuery("#spanstrMensajeid").text(cotizacion_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cotizacion_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_cotizacion").text(cotizacion_detalle_control.strMensajeid_cotizacion);		
		jQuery("#spanstrMensajeid_bodega").text(cotizacion_detalle_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(cotizacion_detalle_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_unidad").text(cotizacion_detalle_control.strMensajeid_unidad);		
		jQuery("#spanstrMensajecantidad").text(cotizacion_detalle_control.strMensajecantidad);		
		jQuery("#spanstrMensajeprecio").text(cotizacion_detalle_control.strMensajeprecio);		
		jQuery("#spanstrMensajedescuento_porciento").text(cotizacion_detalle_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajedescuento_monto").text(cotizacion_detalle_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajesub_total").text(cotizacion_detalle_control.strMensajesub_total);		
		jQuery("#spanstrMensajeiva_porciento").text(cotizacion_detalle_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(cotizacion_detalle_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajetotal").text(cotizacion_detalle_control.strMensajetotal);		
		jQuery("#spanstrMensajeobservacion").text(cotizacion_detalle_control.strMensajeobservacion);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(cotizacion_detalle_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(cotizacion_detalle_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajeid_otro_suplidor").text(cotizacion_detalle_control.strMensajeid_otro_suplidor);		
	}
	
	actualizarCssBotonesMantenimiento(cotizacion_detalle_control) {
		jQuery("#tdbtnNuevocotizacion_detalle").css("visibility",cotizacion_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocotizacion_detalle").css("display",cotizacion_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcotizacion_detalle").css("visibility",cotizacion_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcotizacion_detalle").css("display",cotizacion_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcotizacion_detalle").css("visibility",cotizacion_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcotizacion_detalle").css("display",cotizacion_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcotizacion_detalle").css("visibility",cotizacion_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscotizacion_detalle").css("visibility",cotizacion_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscotizacion_detalle").css("display",cotizacion_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcotizacion_detalle").css("visibility",cotizacion_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcotizacion_detalle").css("visibility",cotizacion_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcotizacion_detalle").css("visibility",cotizacion_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarComboscotizacionsFK(cotizacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_cotizacion",cotizacion_detalle_control.cotizacionsFK);

		if(cotizacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_detalle_control.idFilaTablaActual+"_2",cotizacion_detalle_control.cotizacionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idcotizacion-cmbid_cotizacion",cotizacion_detalle_control.cotizacionsFK);

	};

	cargarCombosbodegasFK(cotizacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega",cotizacion_detalle_control.bodegasFK);

		if(cotizacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_detalle_control.idFilaTablaActual+"_3",cotizacion_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",cotizacion_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(cotizacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto",cotizacion_detalle_control.productosFK);

		if(cotizacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_detalle_control.idFilaTablaActual+"_4",cotizacion_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",cotizacion_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(cotizacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_unidad",cotizacion_detalle_control.unidadsFK);

		if(cotizacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_detalle_control.idFilaTablaActual+"_5",cotizacion_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",cotizacion_detalle_control.unidadsFK);

	};

	cargarCombosotro_suplidorsFK(cotizacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_otro_suplidor",cotizacion_detalle_control.otro_suplidorsFK);

		if(cotizacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_detalle_control.idFilaTablaActual+"_17",cotizacion_detalle_control.otro_suplidorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor",cotizacion_detalle_control.otro_suplidorsFK);

	};

	
	
	registrarComboActionChangeComboscotizacionsFK(cotizacion_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(cotizacion_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(cotizacion_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(cotizacion_detalle_control) {

	};

	registrarComboActionChangeCombosotro_suplidorsFK(cotizacion_detalle_control) {

	};

	
	
	setDefectoValorComboscotizacionsFK(cotizacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_detalle_control.idcotizacionDefaultFK>-1 && jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_cotizacion").val() != cotizacion_detalle_control.idcotizacionDefaultFK) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_cotizacion").val(cotizacion_detalle_control.idcotizacionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idcotizacion-cmbid_cotizacion").val(cotizacion_detalle_control.idcotizacionDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idcotizacion-cmbid_cotizacion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idcotizacion-cmbid_cotizacion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(cotizacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != cotizacion_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(cotizacion_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(cotizacion_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(cotizacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != cotizacion_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto").val(cotizacion_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(cotizacion_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(cotizacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != cotizacion_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(cotizacion_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(cotizacion_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_suplidorsFK(cotizacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_detalle_control.idotro_suplidorDefaultFK>-1 && jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_otro_suplidor").val() != cotizacion_detalle_control.idotro_suplidorDefaultFK) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_otro_suplidor").val(cotizacion_detalle_control.idotro_suplidorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor").val(cotizacion_detalle_control.idotro_suplidorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("cotizacion_detalle","inventario","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("cotizacion_detalle","inventario","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	





	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cotizacion_detalle_control
		
	

		var cantidad="form"+cotizacion_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("cotizacion_detalle","inventario","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

		var precio="form"+cotizacion_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("cotizacion_detalle","inventario","","precio",precio,"","",paraEventoTabla,idFilaTabla,cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

		var descuento_porciento="form"+cotizacion_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("cotizacion_detalle","inventario","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

		var iva_porciento="form"+cotizacion_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("cotizacion_detalle","inventario","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(cotizacion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cotizacion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cotizacion",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.setDefectoValorComboscotizacionsFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.setDefectoValorCombosbodegasFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.setDefectoValorCombosproductosFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.setDefectoValorCombosunidadsFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_suplidor",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.setDefectoValorCombosotro_suplidorsFK(cotizacion_detalle_control);
			}

			
			//CODIGO PARA TOMAR PRIMER VALOR
			/*
			var strPrimerValor='0';
			jQuery("#ParamsBuscar-cmbPaginacion").each(function() {
				//console.log(jQuery(this).val());
				//console.log(jQuery(this).text());
				strPrimerValor=jQuery(this).val();
				return false;
			});
			
			alert(strPrimerValor);
			*/
		}
	}
	
	//VERIFICAR: Creo no se necesita Controller
	onLoadCombosEventosFK(cotizacion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cotizacion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cotizacion",cotizacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_detalle_webcontrol1.registrarComboActionChangeComboscotizacionsFK(cotizacion_detalle_control);
			//}

			//if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",cotizacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(cotizacion_detalle_control);
			//}

			//if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",cotizacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(cotizacion_detalle_control);
			//}

			//if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",cotizacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(cotizacion_detalle_control);
			//}

			//if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_suplidor",cotizacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_detalle_webcontrol1.registrarComboActionChangeCombosotro_suplidorsFK(cotizacion_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cotizacion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cotizacion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cotizacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(cotizacion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				cotizacion_detalle_funcion1.validarFormularioJQuery(cotizacion_detalle_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cotizacion_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cotizacion_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(cotizacion_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,"cotizacion_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cotizacion","id_cotizacion","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_cotizacion_img_busqueda").click(function(){
				cotizacion_detalle_webcontrol1.abrirBusquedaParacotizacion("id_cotizacion");
				//alert(jQuery('#form-id_cotizacion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				cotizacion_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				cotizacion_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				cotizacion_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_suplidor","id_otro_suplidor","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_otro_suplidor_img_busqueda").click(function(){
				cotizacion_detalle_webcontrol1.abrirBusquedaParaotro_suplidor("id_otro_suplidor");
				//alert(jQuery('#form-id_otro_suplidor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cotizacion_detalle_control) {
		
		
		
		if(cotizacion_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdcotizacion_detalleActualizarToolBar").css("display",cotizacion_detalle_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcotizacion_detalleEliminarToolBar").css("display",cotizacion_detalle_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcotizacion_detalleElementos").css("display",cotizacion_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trcotizacion_detalleAcciones").css("display",cotizacion_detalle_control.strVisibleTablaAcciones);
		jQuery("#trcotizacion_detalleParametrosAcciones").css("display",cotizacion_detalle_control.strVisibleTablaAcciones);
		
		jQuery("#tdcotizacion_detalleCerrarPagina").css("display",cotizacion_detalle_control.strPermisoPopup);		
		jQuery("#tdcotizacion_detalleCerrarPaginaToolBar").css("display",cotizacion_detalle_control.strPermisoPopup);
		//jQuery("#trcotizacion_detalleAccionesRelaciones").css("display",cotizacion_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cotizacion_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cotizacion_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cotizacion_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cotizacion Detalles";
		sTituloBanner+=" - " + cotizacion_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cotizacion_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcotizacion_detalleRelacionesToolBar").css("display",cotizacion_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscotizacion_detalle").css("display",cotizacion_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cotizacion_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cotizacion_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cotizacion_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cotizacion_detalle_webcontrol1.registrarEventosControles();
		
		if(cotizacion_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cotizacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			cotizacion_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cotizacion_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(cotizacion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				cotizacion_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cotizacion_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cotizacion_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(cotizacion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(cotizacion_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
						//cotizacion_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(cotizacion_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cotizacion_detalle_constante1.BIG_ID_ACTUAL,"cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
						//cotizacion_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			cotizacion_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);	
	}
}

var cotizacion_detalle_webcontrol1 = new cotizacion_detalle_webcontrol();

export {cotizacion_detalle_webcontrol,cotizacion_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.cotizacion_detalle_webcontrol1 = cotizacion_detalle_webcontrol1;


if(cotizacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cotizacion_detalle_webcontrol1.onLoadWindow; 
}

//</script>