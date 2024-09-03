//<script type="text/javascript" language="javascript">



//var orden_compra_detalleJQueryPaginaWebInteraccion= function (orden_compra_detalle_control) {
//this.,this.,this.

import {orden_compra_detalle_constante,orden_compra_detalle_constante1} from '../util/orden_compra_detalle_constante.js';

import {orden_compra_detalle_funcion,orden_compra_detalle_funcion1} from '../util/orden_compra_detalle_form_funcion.js';


class orden_compra_detalle_webcontrol extends GeneralEntityWebControl {
	
	orden_compra_detalle_control=null;
	orden_compra_detalle_controlInicial=null;
	orden_compra_detalle_controlAuxiliar=null;
		
	//if(orden_compra_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(orden_compra_detalle_control) {
		super();
		
		this.orden_compra_detalle_control=orden_compra_detalle_control;
	}
		
	actualizarVariablesPagina(orden_compra_detalle_control) {
		
		if(orden_compra_detalle_control.action=="index" || orden_compra_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(orden_compra_detalle_control);
			
		} 
		
		
		
	
		else if(orden_compra_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(orden_compra_detalle_control);	
		
		} else if(orden_compra_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(orden_compra_detalle_control);		
		}
	
	
		
		
		else if(orden_compra_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(orden_compra_detalle_control);		
		
		} else if(orden_compra_detalle_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(orden_compra_detalle_control);		
		
		} 
		//else if(orden_compra_detalle_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(orden_compra_detalle_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + orden_compra_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(orden_compra_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(orden_compra_detalle_control) {
		this.actualizarPaginaAccionesGenerales(orden_compra_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(orden_compra_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(orden_compra_detalle_control);
		this.actualizarPaginaOrderBy(orden_compra_detalle_control);
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);
		this.actualizarPaginaCargaGeneralControles(orden_compra_detalle_control);
		//this.actualizarPaginaFormulario(orden_compra_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(orden_compra_detalle_control);
		this.actualizarPaginaAreaBusquedas(orden_compra_detalle_control);
		this.actualizarPaginaCargaCombosFK(orden_compra_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(orden_compra_detalle_control) {
		//this.actualizarPaginaFormulario(orden_compra_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(orden_compra_detalle_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(orden_compra_detalle_control);		
		this.actualizarPaginaFormulario(orden_compra_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(orden_compra_detalle_control);		
		this.actualizarPaginaFormulario(orden_compra_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(orden_compra_detalle_control);		
		this.actualizarPaginaFormulario(orden_compra_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(orden_compra_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(orden_compra_detalle_control);
		this.actualizarPaginaCargaCombosFK(orden_compra_detalle_control);
		this.actualizarPaginaFormulario(orden_compra_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(orden_compra_detalle_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(orden_compra_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(orden_compra_detalle_control);
		this.actualizarPaginaCargaCombosFK(orden_compra_detalle_control);
		this.actualizarPaginaFormulario(orden_compra_detalle_control);
		this.onLoadCombosDefectoFK(orden_compra_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(orden_compra_detalle_control) {
		//FORMULARIO
		if(orden_compra_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(orden_compra_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(orden_compra_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		
		//COMBOS FK
		if(orden_compra_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(orden_compra_detalle_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(orden_compra_detalle_control) {
		//FORMULARIO
		if(orden_compra_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(orden_compra_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(orden_compra_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);	
		
		//COMBOS FK
		if(orden_compra_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(orden_compra_detalle_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(orden_compra_detalle_control) {
		//FORMULARIO
		if(orden_compra_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(orden_compra_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);	
		//COMBOS FK
		if(orden_compra_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(orden_compra_detalle_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(orden_compra_detalle_control) {
		
		if(orden_compra_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(orden_compra_detalle_control);
		}
		
		if(orden_compra_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(orden_compra_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(orden_compra_detalle_control) {
		if(orden_compra_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("orden_compra_detalleReturnGeneral",JSON.stringify(orden_compra_detalle_control.orden_compra_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control) {
		if(orden_compra_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && orden_compra_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(orden_compra_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(orden_compra_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(orden_compra_detalle_control, mostrar) {
		
		if(mostrar==true) {
			orden_compra_detalle_funcion1.resaltarRestaurarDivsPagina(false,"orden_compra_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				orden_compra_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"orden_compra_detalle");
			}			
			
			orden_compra_detalle_funcion1.mostrarDivMensaje(true,orden_compra_detalle_control.strAuxiliarMensaje,orden_compra_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			orden_compra_detalle_funcion1.mostrarDivMensaje(false,orden_compra_detalle_control.strAuxiliarMensaje,orden_compra_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(orden_compra_detalle_control) {
		if(orden_compra_detalle_funcion1.esPaginaForm(orden_compra_detalle_constante1)==true) {
			window.opener.orden_compra_detalle_webcontrol1.actualizarPaginaTablaDatos(orden_compra_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(orden_compra_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(orden_compra_detalle_control) {
		orden_compra_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(orden_compra_detalle_control.strAuxiliarUrlPagina);
				
		orden_compra_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(orden_compra_detalle_control.strAuxiliarTipo,orden_compra_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(orden_compra_detalle_control) {
		orden_compra_detalle_funcion1.resaltarRestaurarDivMensaje(true,orden_compra_detalle_control.strAuxiliarMensajeAlert,orden_compra_detalle_control.strAuxiliarCssMensaje);
			
		if(orden_compra_detalle_funcion1.esPaginaForm(orden_compra_detalle_constante1)==true) {
			window.opener.orden_compra_detalle_funcion1.resaltarRestaurarDivMensaje(true,orden_compra_detalle_control.strAuxiliarMensajeAlert,orden_compra_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(orden_compra_detalle_control) {
		this.orden_compra_detalle_controlInicial=orden_compra_detalle_control;
			
		if(orden_compra_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(orden_compra_detalle_control.strStyleDivArbol,orden_compra_detalle_control.strStyleDivContent
																,orden_compra_detalle_control.strStyleDivOpcionesBanner,orden_compra_detalle_control.strStyleDivExpandirColapsar
																,orden_compra_detalle_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(orden_compra_detalle_control) {
		this.actualizarCssBotonesPagina(orden_compra_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(orden_compra_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(orden_compra_detalle_control.tiposReportes,orden_compra_detalle_control.tiposReporte
															 	,orden_compra_detalle_control.tiposPaginacion,orden_compra_detalle_control.tiposAcciones
																,orden_compra_detalle_control.tiposColumnasSelect,orden_compra_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(orden_compra_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(orden_compra_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(orden_compra_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(orden_compra_detalle_control) {
	
		var indexPosition=orden_compra_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=orden_compra_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(orden_compra_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_orden_compra",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.cargarCombosorden_comprasFK(orden_compra_detalle_control);
			}

			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.cargarCombosbodegasFK(orden_compra_detalle_control);
			}

			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.cargarCombosproductosFK(orden_compra_detalle_control);
			}

			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.cargarCombosunidadsFK(orden_compra_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(orden_compra_detalle_control.strRecargarFkTiposNinguno!=null && orden_compra_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && orden_compra_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(orden_compra_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_orden_compra",orden_compra_detalle_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_detalle_webcontrol1.cargarCombosorden_comprasFK(orden_compra_detalle_control);
				}

				if(orden_compra_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",orden_compra_detalle_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_detalle_webcontrol1.cargarCombosbodegasFK(orden_compra_detalle_control);
				}

				if(orden_compra_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",orden_compra_detalle_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_detalle_webcontrol1.cargarCombosproductosFK(orden_compra_detalle_control);
				}

				if(orden_compra_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",orden_compra_detalle_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_detalle_webcontrol1.cargarCombosunidadsFK(orden_compra_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.orden_compra_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.orden_compra_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.orden_compra_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.orden_compra_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.orden_compra_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.orden_compra_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaorden_compraFK(orden_compra_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_detalle_funcion1,orden_compra_detalle_control.orden_comprasFK);
	}

	cargarComboEditarTablabodegaFK(orden_compra_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_detalle_funcion1,orden_compra_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(orden_compra_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_detalle_funcion1,orden_compra_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(orden_compra_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_detalle_funcion1,orden_compra_detalle_control.unidadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(orden_compra_detalle_control) {
		jQuery("#tdorden_compra_detalleNuevo").css("display",orden_compra_detalle_control.strPermisoNuevo);
		jQuery("#trorden_compra_detalleElementos").css("display",orden_compra_detalle_control.strVisibleTablaElementos);
		jQuery("#trorden_compra_detalleAcciones").css("display",orden_compra_detalle_control.strVisibleTablaAcciones);
		jQuery("#trorden_compra_detalleParametrosAcciones").css("display",orden_compra_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(orden_compra_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(orden_compra_detalle_control);
				
		if(orden_compra_detalle_control.orden_compra_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(orden_compra_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(orden_compra_detalle_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(orden_compra_detalle_control) {
	
		jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id").val(orden_compra_detalle_control.orden_compra_detalleActual.id);
		jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-version_row").val(orden_compra_detalle_control.orden_compra_detalleActual.versionRow);
		
		if(orden_compra_detalle_control.orden_compra_detalleActual.id_orden_compra!=null && orden_compra_detalle_control.orden_compra_detalleActual.id_orden_compra>-1){
			if(jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_orden_compra").val() != orden_compra_detalle_control.orden_compra_detalleActual.id_orden_compra) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_orden_compra").val(orden_compra_detalle_control.orden_compra_detalleActual.id_orden_compra).trigger("change");
			}
		} else { 
			//jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_orden_compra").select2("val", null);
			if(jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_orden_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_orden_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_detalle_control.orden_compra_detalleActual.id_bodega!=null && orden_compra_detalle_control.orden_compra_detalleActual.id_bodega>-1){
			if(jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != orden_compra_detalle_control.orden_compra_detalleActual.id_bodega) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega").val(orden_compra_detalle_control.orden_compra_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_detalle_control.orden_compra_detalleActual.id_producto!=null && orden_compra_detalle_control.orden_compra_detalleActual.id_producto>-1){
			if(jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto").val() != orden_compra_detalle_control.orden_compra_detalleActual.id_producto) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto").val(orden_compra_detalle_control.orden_compra_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_detalle_control.orden_compra_detalleActual.id_unidad!=null && orden_compra_detalle_control.orden_compra_detalleActual.id_unidad>-1){
			if(jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != orden_compra_detalle_control.orden_compra_detalleActual.id_unidad) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_unidad").val(orden_compra_detalle_control.orden_compra_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_unidad").select2("val", null);
			if(jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-cantidad").val(orden_compra_detalle_control.orden_compra_detalleActual.cantidad);
		jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-precio").val(orden_compra_detalle_control.orden_compra_detalleActual.precio);
		jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-sub_total").val(orden_compra_detalle_control.orden_compra_detalleActual.sub_total);
		jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-descuento_porciento").val(orden_compra_detalle_control.orden_compra_detalleActual.descuento_porciento);
		jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-descuento_monto").val(orden_compra_detalle_control.orden_compra_detalleActual.descuento_monto);
		jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-iva_porciento").val(orden_compra_detalle_control.orden_compra_detalleActual.iva_porciento);
		jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-iva_monto").val(orden_compra_detalle_control.orden_compra_detalleActual.iva_monto);
		jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-total").val(orden_compra_detalle_control.orden_compra_detalleActual.total);
		jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-observacion").val(orden_compra_detalle_control.orden_compra_detalleActual.observacion);
		jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-recibido").val(orden_compra_detalle_control.orden_compra_detalleActual.recibido);
		jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-impuesto2_porciento").val(orden_compra_detalle_control.orden_compra_detalleActual.impuesto2_porciento);
		jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-impuesto2_monto").val(orden_compra_detalle_control.orden_compra_detalleActual.impuesto2_monto);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+orden_compra_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("orden_compra_detalle","inventario","","form_orden_compra_detalle",formulario,"","",paraEventoTabla,idFilaTabla,orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
	}
	
	actualizarSpanMensajesCampos(orden_compra_detalle_control) {
		jQuery("#spanstrMensajeid").text(orden_compra_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(orden_compra_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_orden_compra").text(orden_compra_detalle_control.strMensajeid_orden_compra);		
		jQuery("#spanstrMensajeid_bodega").text(orden_compra_detalle_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(orden_compra_detalle_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_unidad").text(orden_compra_detalle_control.strMensajeid_unidad);		
		jQuery("#spanstrMensajecantidad").text(orden_compra_detalle_control.strMensajecantidad);		
		jQuery("#spanstrMensajeprecio").text(orden_compra_detalle_control.strMensajeprecio);		
		jQuery("#spanstrMensajesub_total").text(orden_compra_detalle_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_porciento").text(orden_compra_detalle_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajedescuento_monto").text(orden_compra_detalle_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(orden_compra_detalle_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(orden_compra_detalle_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajetotal").text(orden_compra_detalle_control.strMensajetotal);		
		jQuery("#spanstrMensajeobservacion").text(orden_compra_detalle_control.strMensajeobservacion);		
		jQuery("#spanstrMensajerecibido").text(orden_compra_detalle_control.strMensajerecibido);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(orden_compra_detalle_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(orden_compra_detalle_control.strMensajeimpuesto2_monto);		
	}
	
	actualizarCssBotonesMantenimiento(orden_compra_detalle_control) {
		jQuery("#tdbtnNuevoorden_compra_detalle").css("visibility",orden_compra_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoorden_compra_detalle").css("display",orden_compra_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarorden_compra_detalle").css("visibility",orden_compra_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarorden_compra_detalle").css("display",orden_compra_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarorden_compra_detalle").css("visibility",orden_compra_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarorden_compra_detalle").css("display",orden_compra_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarorden_compra_detalle").css("visibility",orden_compra_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosorden_compra_detalle").css("visibility",orden_compra_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosorden_compra_detalle").css("display",orden_compra_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarorden_compra_detalle").css("visibility",orden_compra_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarorden_compra_detalle").css("visibility",orden_compra_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarorden_compra_detalle").css("visibility",orden_compra_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosorden_comprasFK(orden_compra_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_orden_compra",orden_compra_detalle_control.orden_comprasFK);

		if(orden_compra_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_detalle_control.idFilaTablaActual+"_2",orden_compra_detalle_control.orden_comprasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra",orden_compra_detalle_control.orden_comprasFK);

	};

	cargarCombosbodegasFK(orden_compra_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega",orden_compra_detalle_control.bodegasFK);

		if(orden_compra_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_detalle_control.idFilaTablaActual+"_3",orden_compra_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",orden_compra_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(orden_compra_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto",orden_compra_detalle_control.productosFK);

		if(orden_compra_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_detalle_control.idFilaTablaActual+"_4",orden_compra_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",orden_compra_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(orden_compra_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_unidad",orden_compra_detalle_control.unidadsFK);

		if(orden_compra_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_detalle_control.idFilaTablaActual+"_5",orden_compra_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",orden_compra_detalle_control.unidadsFK);

	};

	
	
	registrarComboActionChangeCombosorden_comprasFK(orden_compra_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(orden_compra_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(orden_compra_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(orden_compra_detalle_control) {

	};

	
	
	setDefectoValorCombosorden_comprasFK(orden_compra_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_detalle_control.idorden_compraDefaultFK>-1 && jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_orden_compra").val() != orden_compra_detalle_control.idorden_compraDefaultFK) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_orden_compra").val(orden_compra_detalle_control.idorden_compraDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra").val(orden_compra_detalle_control.idorden_compraDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(orden_compra_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != orden_compra_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega").val(orden_compra_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(orden_compra_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(orden_compra_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto").val() != orden_compra_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto").val(orden_compra_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(orden_compra_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(orden_compra_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != orden_compra_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_unidad").val(orden_compra_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(orden_compra_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("orden_compra_detalle","inventario","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("orden_compra_detalle","inventario","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//orden_compra_detalle_control
		
	

		var cantidad="form"+orden_compra_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("orden_compra_detalle","inventario","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

		var precio="form"+orden_compra_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("orden_compra_detalle","inventario","","precio",precio,"","",paraEventoTabla,idFilaTabla,orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

		var descuento_porciento="form"+orden_compra_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("orden_compra_detalle","inventario","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

		var iva_porciento="form"+orden_compra_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("orden_compra_detalle","inventario","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(orden_compra_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(orden_compra_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_orden_compra",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.setDefectoValorCombosorden_comprasFK(orden_compra_detalle_control);
			}

			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.setDefectoValorCombosbodegasFK(orden_compra_detalle_control);
			}

			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.setDefectoValorCombosproductosFK(orden_compra_detalle_control);
			}

			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.setDefectoValorCombosunidadsFK(orden_compra_detalle_control);
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
	onLoadCombosEventosFK(orden_compra_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(orden_compra_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_orden_compra",orden_compra_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_detalle_webcontrol1.registrarComboActionChangeCombosorden_comprasFK(orden_compra_detalle_control);
			//}

			//if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",orden_compra_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(orden_compra_detalle_control);
			//}

			//if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",orden_compra_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(orden_compra_detalle_control);
			//}

			//if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",orden_compra_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(orden_compra_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(orden_compra_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(orden_compra_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(orden_compra_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(orden_compra_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				orden_compra_detalle_funcion1.validarFormularioJQuery(orden_compra_detalle_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("orden_compra_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("orden_compra_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(orden_compra_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,"orden_compra_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("orden_compra","id_orden_compra","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_orden_compra_img_busqueda").click(function(){
				orden_compra_detalle_webcontrol1.abrirBusquedaParaorden_compra("id_orden_compra");
				//alert(jQuery('#form-id_orden_compra_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				orden_compra_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				orden_compra_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				orden_compra_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(orden_compra_detalle_control) {
		
		
		
		if(orden_compra_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdorden_compra_detalleActualizarToolBar").css("display",orden_compra_detalle_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdorden_compra_detalleEliminarToolBar").css("display",orden_compra_detalle_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trorden_compra_detalleElementos").css("display",orden_compra_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trorden_compra_detalleAcciones").css("display",orden_compra_detalle_control.strVisibleTablaAcciones);
		jQuery("#trorden_compra_detalleParametrosAcciones").css("display",orden_compra_detalle_control.strVisibleTablaAcciones);
		
		jQuery("#tdorden_compra_detalleCerrarPagina").css("display",orden_compra_detalle_control.strPermisoPopup);		
		jQuery("#tdorden_compra_detalleCerrarPaginaToolBar").css("display",orden_compra_detalle_control.strPermisoPopup);
		//jQuery("#trorden_compra_detalleAccionesRelaciones").css("display",orden_compra_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=orden_compra_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + orden_compra_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + orden_compra_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Compras Detalles";
		sTituloBanner+=" - " + orden_compra_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + orden_compra_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdorden_compra_detalleRelacionesToolBar").css("display",orden_compra_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosorden_compra_detalle").css("display",orden_compra_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		orden_compra_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		orden_compra_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		orden_compra_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		orden_compra_detalle_webcontrol1.registrarEventosControles();
		
		if(orden_compra_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(orden_compra_detalle_constante1.STR_ES_RELACIONADO=="false") {
			orden_compra_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(orden_compra_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(orden_compra_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				orden_compra_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(orden_compra_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(orden_compra_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(orden_compra_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(orden_compra_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
						//orden_compra_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(orden_compra_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(orden_compra_detalle_constante1.BIG_ID_ACTUAL,"orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
						//orden_compra_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			orden_compra_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);	
	}
}

var orden_compra_detalle_webcontrol1 = new orden_compra_detalle_webcontrol();

export {orden_compra_detalle_webcontrol,orden_compra_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.orden_compra_detalle_webcontrol1 = orden_compra_detalle_webcontrol1;


if(orden_compra_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = orden_compra_detalle_webcontrol1.onLoadWindow; 
}

//</script>