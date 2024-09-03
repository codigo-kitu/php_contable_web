//<script type="text/javascript" language="javascript">



//var lote_productoJQueryPaginaWebInteraccion= function (lote_producto_control) {
//this.,this.,this.

import {lote_producto_constante,lote_producto_constante1} from '../util/lote_producto_constante.js';

import {lote_producto_funcion,lote_producto_funcion1} from '../util/lote_producto_form_funcion.js';


class lote_producto_webcontrol extends GeneralEntityWebControl {
	
	lote_producto_control=null;
	lote_producto_controlInicial=null;
	lote_producto_controlAuxiliar=null;
		
	//if(lote_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(lote_producto_control) {
		super();
		
		this.lote_producto_control=lote_producto_control;
	}
		
	actualizarVariablesPagina(lote_producto_control) {
		
		if(lote_producto_control.action=="index" || lote_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(lote_producto_control);
			
		} 
		
		
		
	
		else if(lote_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(lote_producto_control);	
		
		} else if(lote_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(lote_producto_control);		
		}
	
		else if(lote_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(lote_producto_control);		
		}
	
		else if(lote_producto_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(lote_producto_control);
		}
		
		
		else if(lote_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(lote_producto_control);
		
		} else if(lote_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(lote_producto_control);
		
		} else if(lote_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(lote_producto_control);
		
		} else if(lote_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(lote_producto_control);
		
		} else if(lote_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(lote_producto_control);
		
		} else if(lote_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(lote_producto_control);		
		
		} else if(lote_producto_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(lote_producto_control);		
		
		} 
		//else if(lote_producto_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(lote_producto_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + lote_producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(lote_producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(lote_producto_control) {
		this.actualizarPaginaAccionesGenerales(lote_producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(lote_producto_control) {
		
		this.actualizarPaginaCargaGeneral(lote_producto_control);
		this.actualizarPaginaOrderBy(lote_producto_control);
		this.actualizarPaginaTablaDatos(lote_producto_control);
		this.actualizarPaginaCargaGeneralControles(lote_producto_control);
		//this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(lote_producto_control);
		this.actualizarPaginaAreaBusquedas(lote_producto_control);
		this.actualizarPaginaCargaCombosFK(lote_producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(lote_producto_control) {
		//this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(lote_producto_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(lote_producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(lote_producto_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(lote_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lote_producto_control);		
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(lote_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lote_producto_control);		
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(lote_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(lote_producto_control);		
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(lote_producto_control) {
		this.actualizarPaginaCargaGeneralControles(lote_producto_control);
		this.actualizarPaginaCargaCombosFK(lote_producto_control);
		this.actualizarPaginaFormulario(lote_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(lote_producto_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(lote_producto_control) {
		this.actualizarPaginaCargaGeneralControles(lote_producto_control);
		this.actualizarPaginaCargaCombosFK(lote_producto_control);
		this.actualizarPaginaFormulario(lote_producto_control);
		this.onLoadCombosDefectoFK(lote_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		this.actualizarPaginaAreaMantenimiento(lote_producto_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(lote_producto_control) {
		//FORMULARIO
		if(lote_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lote_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(lote_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);		
		
		//COMBOS FK
		if(lote_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lote_producto_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(lote_producto_control) {
		//FORMULARIO
		if(lote_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lote_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(lote_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);	
		
		//COMBOS FK
		if(lote_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lote_producto_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(lote_producto_control) {
		//FORMULARIO
		if(lote_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(lote_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(lote_producto_control);	
		//COMBOS FK
		if(lote_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(lote_producto_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(lote_producto_control) {
		
		if(lote_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(lote_producto_control);
		}
		
		if(lote_producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(lote_producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(lote_producto_control) {
		if(lote_producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("lote_productoReturnGeneral",JSON.stringify(lote_producto_control.lote_productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(lote_producto_control) {
		if(lote_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && lote_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(lote_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(lote_producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(lote_producto_control, mostrar) {
		
		if(mostrar==true) {
			lote_producto_funcion1.resaltarRestaurarDivsPagina(false,"lote_producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				lote_producto_funcion1.resaltarRestaurarDivMantenimiento(false,"lote_producto");
			}			
			
			lote_producto_funcion1.mostrarDivMensaje(true,lote_producto_control.strAuxiliarMensaje,lote_producto_control.strAuxiliarCssMensaje);
		
		} else {
			lote_producto_funcion1.mostrarDivMensaje(false,lote_producto_control.strAuxiliarMensaje,lote_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(lote_producto_control) {
		if(lote_producto_funcion1.esPaginaForm(lote_producto_constante1)==true) {
			window.opener.lote_producto_webcontrol1.actualizarPaginaTablaDatos(lote_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(lote_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(lote_producto_control) {
		lote_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(lote_producto_control.strAuxiliarUrlPagina);
				
		lote_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(lote_producto_control.strAuxiliarTipo,lote_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(lote_producto_control) {
		lote_producto_funcion1.resaltarRestaurarDivMensaje(true,lote_producto_control.strAuxiliarMensajeAlert,lote_producto_control.strAuxiliarCssMensaje);
			
		if(lote_producto_funcion1.esPaginaForm(lote_producto_constante1)==true) {
			window.opener.lote_producto_funcion1.resaltarRestaurarDivMensaje(true,lote_producto_control.strAuxiliarMensajeAlert,lote_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(lote_producto_control) {
		this.lote_producto_controlInicial=lote_producto_control;
			
		if(lote_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(lote_producto_control.strStyleDivArbol,lote_producto_control.strStyleDivContent
																,lote_producto_control.strStyleDivOpcionesBanner,lote_producto_control.strStyleDivExpandirColapsar
																,lote_producto_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(lote_producto_control) {
		this.actualizarCssBotonesPagina(lote_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(lote_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(lote_producto_control.tiposReportes,lote_producto_control.tiposReporte
															 	,lote_producto_control.tiposPaginacion,lote_producto_control.tiposAcciones
																,lote_producto_control.tiposColumnasSelect,lote_producto_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(lote_producto_control.tiposRelaciones,lote_producto_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(lote_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(lote_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(lote_producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(lote_producto_control) {
	
		var indexPosition=lote_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=lote_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(lote_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lote_producto_control.strRecargarFkTipos,",")) { 
				lote_producto_webcontrol1.cargarCombosproductosFK(lote_producto_control);
			}

			if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lote_producto_control.strRecargarFkTipos,",")) { 
				lote_producto_webcontrol1.cargarCombosbodegasFK(lote_producto_control);
			}

			if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",lote_producto_control.strRecargarFkTipos,",")) { 
				lote_producto_webcontrol1.cargarCombosproveedorsFK(lote_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(lote_producto_control.strRecargarFkTiposNinguno!=null && lote_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && lote_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(lote_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",lote_producto_control.strRecargarFkTiposNinguno,",")) { 
					lote_producto_webcontrol1.cargarCombosproductosFK(lote_producto_control);
				}

				if(lote_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",lote_producto_control.strRecargarFkTiposNinguno,",")) { 
					lote_producto_webcontrol1.cargarCombosbodegasFK(lote_producto_control);
				}

				if(lote_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",lote_producto_control.strRecargarFkTiposNinguno,",")) { 
					lote_producto_webcontrol1.cargarCombosproveedorsFK(lote_producto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproductoFK(lote_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lote_producto_funcion1,lote_producto_control.productosFK);
	}

	cargarComboEditarTablabodegaFK(lote_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lote_producto_funcion1,lote_producto_control.bodegasFK);
	}

	cargarComboEditarTablaproveedorFK(lote_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,lote_producto_funcion1,lote_producto_control.proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(lote_producto_control) {
		jQuery("#tdlote_productoNuevo").css("display",lote_producto_control.strPermisoNuevo);
		jQuery("#trlote_productoElementos").css("display",lote_producto_control.strVisibleTablaElementos);
		jQuery("#trlote_productoAcciones").css("display",lote_producto_control.strVisibleTablaAcciones);
		jQuery("#trlote_productoParametrosAcciones").css("display",lote_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(lote_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(lote_producto_control);
				
		if(lote_producto_control.lote_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(lote_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(lote_producto_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(lote_producto_control) {
	
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id").val(lote_producto_control.lote_productoActual.id);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-version_row").val(lote_producto_control.lote_productoActual.versionRow);
		
		if(lote_producto_control.lote_productoActual.id_producto!=null && lote_producto_control.lote_productoActual.id_producto>-1){
			if(jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto").val() != lote_producto_control.lote_productoActual.id_producto) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto").val(lote_producto_control.lote_productoActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-nro_lote").val(lote_producto_control.lote_productoActual.nro_lote);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-descripcion").val(lote_producto_control.lote_productoActual.descripcion);
		
		if(lote_producto_control.lote_productoActual.id_bodega!=null && lote_producto_control.lote_productoActual.id_bodega>-1){
			if(jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega").val() != lote_producto_control.lote_productoActual.id_bodega) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega").val(lote_producto_control.lote_productoActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-fecha_ingreso").val(lote_producto_control.lote_productoActual.fecha_ingreso);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-fecha_expiracion").val(lote_producto_control.lote_productoActual.fecha_expiracion);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-ubicacion").val(lote_producto_control.lote_productoActual.ubicacion);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-cantidad").val(lote_producto_control.lote_productoActual.cantidad);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-comentario").val(lote_producto_control.lote_productoActual.comentario);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-nro_documento").val(lote_producto_control.lote_productoActual.nro_documento);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-disponible").val(lote_producto_control.lote_productoActual.disponible);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-agotado_en").val(lote_producto_control.lote_productoActual.agotado_en);
		jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-nro_item").val(lote_producto_control.lote_productoActual.nro_item);
		
		if(lote_producto_control.lote_productoActual.id_proveedor!=null && lote_producto_control.lote_productoActual.id_proveedor>-1){
			if(jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor").val() != lote_producto_control.lote_productoActual.id_proveedor) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor").val(lote_producto_control.lote_productoActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+lote_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("lote_producto","inventario","","form_lote_producto",formulario,"","",paraEventoTabla,idFilaTabla,lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
	}
	
	actualizarSpanMensajesCampos(lote_producto_control) {
		jQuery("#spanstrMensajeid").text(lote_producto_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(lote_producto_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_producto").text(lote_producto_control.strMensajeid_producto);		
		jQuery("#spanstrMensajenro_lote").text(lote_producto_control.strMensajenro_lote);		
		jQuery("#spanstrMensajedescripcion").text(lote_producto_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_bodega").text(lote_producto_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajefecha_ingreso").text(lote_producto_control.strMensajefecha_ingreso);		
		jQuery("#spanstrMensajefecha_expiracion").text(lote_producto_control.strMensajefecha_expiracion);		
		jQuery("#spanstrMensajeubicacion").text(lote_producto_control.strMensajeubicacion);		
		jQuery("#spanstrMensajecantidad").text(lote_producto_control.strMensajecantidad);		
		jQuery("#spanstrMensajecomentario").text(lote_producto_control.strMensajecomentario);		
		jQuery("#spanstrMensajenro_documento").text(lote_producto_control.strMensajenro_documento);		
		jQuery("#spanstrMensajedisponible").text(lote_producto_control.strMensajedisponible);		
		jQuery("#spanstrMensajeagotado_en").text(lote_producto_control.strMensajeagotado_en);		
		jQuery("#spanstrMensajenro_item").text(lote_producto_control.strMensajenro_item);		
		jQuery("#spanstrMensajeid_proveedor").text(lote_producto_control.strMensajeid_proveedor);		
	}
	
	actualizarCssBotonesMantenimiento(lote_producto_control) {
		jQuery("#tdbtnNuevolote_producto").css("visibility",lote_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevolote_producto").css("display",lote_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarlote_producto").css("visibility",lote_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarlote_producto").css("display",lote_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarlote_producto").css("visibility",lote_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarlote_producto").css("display",lote_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarlote_producto").css("visibility",lote_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioslote_producto").css("visibility",lote_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioslote_producto").css("display",lote_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarlote_producto").css("visibility",lote_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarlote_producto").css("visibility",lote_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarlote_producto").css("visibility",lote_producto_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosproductosFK(lote_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto",lote_producto_control.productosFK);

		if(lote_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lote_producto_control.idFilaTablaActual+"_2",lote_producto_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",lote_producto_control.productosFK);

	};

	cargarCombosbodegasFK(lote_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega",lote_producto_control.bodegasFK);

		if(lote_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lote_producto_control.idFilaTablaActual+"_5",lote_producto_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",lote_producto_control.bodegasFK);

	};

	cargarCombosproveedorsFK(lote_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor",lote_producto_control.proveedorsFK);

		if(lote_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+lote_producto_control.idFilaTablaActual+"_15",lote_producto_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",lote_producto_control.proveedorsFK);

	};

	
	
	registrarComboActionChangeCombosproductosFK(lote_producto_control) {

	};

	registrarComboActionChangeCombosbodegasFK(lote_producto_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(lote_producto_control) {

	};

	
	
	setDefectoValorCombosproductosFK(lote_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lote_producto_control.idproductoDefaultFK>-1 && jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto").val() != lote_producto_control.idproductoDefaultFK) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto").val(lote_producto_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(lote_producto_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(lote_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lote_producto_control.idbodegaDefaultFK>-1 && jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega").val() != lote_producto_control.idbodegaDefaultFK) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega").val(lote_producto_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(lote_producto_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(lote_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(lote_producto_control.idproveedorDefaultFK>-1 && jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor").val() != lote_producto_control.idproveedorDefaultFK) {
				jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor").val(lote_producto_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(lote_producto_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+lote_producto_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	



	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//lote_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(lote_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lote_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lote_producto_control.strRecargarFkTipos,",")) { 
				lote_producto_webcontrol1.setDefectoValorCombosproductosFK(lote_producto_control);
			}

			if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lote_producto_control.strRecargarFkTipos,",")) { 
				lote_producto_webcontrol1.setDefectoValorCombosbodegasFK(lote_producto_control);
			}

			if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",lote_producto_control.strRecargarFkTipos,",")) { 
				lote_producto_webcontrol1.setDefectoValorCombosproveedorsFK(lote_producto_control);
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
	onLoadCombosEventosFK(lote_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lote_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",lote_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lote_producto_webcontrol1.registrarComboActionChangeCombosproductosFK(lote_producto_control);
			//}

			//if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",lote_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lote_producto_webcontrol1.registrarComboActionChangeCombosbodegasFK(lote_producto_control);
			//}

			//if(lote_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",lote_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				lote_producto_webcontrol1.registrarComboActionChangeCombosproveedorsFK(lote_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(lote_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(lote_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(lote_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(lote_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				lote_producto_funcion1.validarFormularioJQuery(lote_producto_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("lote_producto");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("lote_producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(lote_producto_funcion1,lote_producto_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(lote_producto_funcion1,lote_producto_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(lote_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,"lote_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				lote_producto_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				lote_producto_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+lote_producto_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				lote_producto_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("lote_producto");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(lote_producto_control) {
		
		
		
		if(lote_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdlote_productoActualizarToolBar").css("display",lote_producto_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdlote_productoEliminarToolBar").css("display",lote_producto_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trlote_productoElementos").css("display",lote_producto_control.strVisibleTablaElementos);
		
		jQuery("#trlote_productoAcciones").css("display",lote_producto_control.strVisibleTablaAcciones);
		jQuery("#trlote_productoParametrosAcciones").css("display",lote_producto_control.strVisibleTablaAcciones);
		
		jQuery("#tdlote_productoCerrarPagina").css("display",lote_producto_control.strPermisoPopup);		
		jQuery("#tdlote_productoCerrarPaginaToolBar").css("display",lote_producto_control.strPermisoPopup);
		//jQuery("#trlote_productoAccionesRelaciones").css("display",lote_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=lote_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + lote_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + lote_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Lotes Productoes";
		sTituloBanner+=" - " + lote_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + lote_producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdlote_productoRelacionesToolBar").css("display",lote_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoslote_producto").css("display",lote_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		lote_producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		lote_producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		lote_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		lote_producto_webcontrol1.registrarEventosControles();
		
		if(lote_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(lote_producto_constante1.STR_ES_RELACIONADO=="false") {
			lote_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(lote_producto_constante1.STR_ES_RELACIONES=="true") {
			if(lote_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				lote_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(lote_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(lote_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(lote_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(lote_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
						//lote_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(lote_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(lote_producto_constante1.BIG_ID_ACTUAL,"lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);
						//lote_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			lote_producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("lote_producto","inventario","",lote_producto_funcion1,lote_producto_webcontrol1,lote_producto_constante1);	
	}
}

var lote_producto_webcontrol1 = new lote_producto_webcontrol();

export {lote_producto_webcontrol,lote_producto_webcontrol1};

//Para ser llamado desde window.opener
window.lote_producto_webcontrol1 = lote_producto_webcontrol1;


if(lote_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = lote_producto_webcontrol1.onLoadWindow; 
}

//</script>