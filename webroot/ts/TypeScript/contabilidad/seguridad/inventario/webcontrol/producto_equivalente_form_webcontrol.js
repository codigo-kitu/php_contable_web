//<script type="text/javascript" language="javascript">



//var producto_equivalenteJQueryPaginaWebInteraccion= function (producto_equivalente_control) {
//this.,this.,this.

import {producto_equivalente_constante,producto_equivalente_constante1} from '../util/producto_equivalente_constante.js';

import {producto_equivalente_funcion,producto_equivalente_funcion1} from '../util/producto_equivalente_form_funcion.js';


class producto_equivalente_webcontrol extends GeneralEntityWebControl {
	
	producto_equivalente_control=null;
	producto_equivalente_controlInicial=null;
	producto_equivalente_controlAuxiliar=null;
		
	//if(producto_equivalente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(producto_equivalente_control) {
		super();
		
		this.producto_equivalente_control=producto_equivalente_control;
	}
		
	actualizarVariablesPagina(producto_equivalente_control) {
		
		if(producto_equivalente_control.action=="index" || producto_equivalente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(producto_equivalente_control);
			
		} 
		
		
		
	
		else if(producto_equivalente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(producto_equivalente_control);	
		
		} else if(producto_equivalente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(producto_equivalente_control);		
		}
	
		else if(producto_equivalente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(producto_equivalente_control);		
		}
	
		else if(producto_equivalente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(producto_equivalente_control);
		}
		
		
		else if(producto_equivalente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(producto_equivalente_control);		
		
		} else if(producto_equivalente_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(producto_equivalente_control);		
		
		} 
		//else if(producto_equivalente_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(producto_equivalente_control);		
		//}

		else if(producto_equivalente_control.action=="abrirArbol") {
			this.actualizarVariablesPaginaAccionAbrirArbol(producto_equivalente_control);
		}
		else if(producto_equivalente_control.action=="cargarArbol") {
			this.actualizarVariablesPaginaAccionCargarArbol(producto_equivalente_control);
		}
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + producto_equivalente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(producto_equivalente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(producto_equivalente_control) {
		this.actualizarPaginaAccionesGenerales(producto_equivalente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(producto_equivalente_control) {
		
		this.actualizarPaginaCargaGeneral(producto_equivalente_control);
		this.actualizarPaginaOrderBy(producto_equivalente_control);
		this.actualizarPaginaTablaDatos(producto_equivalente_control);
		this.actualizarPaginaCargaGeneralControles(producto_equivalente_control);
		//this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(producto_equivalente_control);
		this.actualizarPaginaAreaBusquedas(producto_equivalente_control);
		this.actualizarPaginaCargaCombosFK(producto_equivalente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(producto_equivalente_control) {
		//this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(producto_equivalente_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(producto_equivalente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(producto_equivalente_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(producto_equivalente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(producto_equivalente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(producto_equivalente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(producto_equivalente_control) {
		this.actualizarPaginaCargaGeneralControles(producto_equivalente_control);
		this.actualizarPaginaCargaCombosFK(producto_equivalente_control);
		this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(producto_equivalente_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(producto_equivalente_control) {
		this.actualizarPaginaCargaGeneralControles(producto_equivalente_control);
		this.actualizarPaginaCargaCombosFK(producto_equivalente_control);
		this.actualizarPaginaFormulario(producto_equivalente_control);
		this.onLoadCombosDefectoFK(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(producto_equivalente_control) {
		//FORMULARIO
		if(producto_equivalente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_equivalente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(producto_equivalente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		
		//COMBOS FK
		if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_equivalente_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(producto_equivalente_control) {
		//FORMULARIO
		if(producto_equivalente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_equivalente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(producto_equivalente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);	
		
		//COMBOS FK
		if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_equivalente_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(producto_equivalente_control) {
		//FORMULARIO
		if(producto_equivalente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(producto_equivalente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);	
		//COMBOS FK
		if(producto_equivalente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(producto_equivalente_control);
		}
	}
	
	actualizarVariablesPaginaAccionAbrirArbol(producto_equivalente_control) {
		
	}
	
	actualizarVariablesPaginaAccionCargarArbol(producto_equivalente_control) {
		
	}
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(producto_equivalente_control) {
		
		if(producto_equivalente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(producto_equivalente_control);
		}
		
		if(producto_equivalente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(producto_equivalente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(producto_equivalente_control) {
		if(producto_equivalente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("producto_equivalenteReturnGeneral",JSON.stringify(producto_equivalente_control.producto_equivalenteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control) {
		if(producto_equivalente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && producto_equivalente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(producto_equivalente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(producto_equivalente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(producto_equivalente_control, mostrar) {
		
		if(mostrar==true) {
			producto_equivalente_funcion1.resaltarRestaurarDivsPagina(false,"producto_equivalente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				producto_equivalente_funcion1.resaltarRestaurarDivMantenimiento(false,"producto_equivalente");
			}			
			
			producto_equivalente_funcion1.mostrarDivMensaje(true,producto_equivalente_control.strAuxiliarMensaje,producto_equivalente_control.strAuxiliarCssMensaje);
		
		} else {
			producto_equivalente_funcion1.mostrarDivMensaje(false,producto_equivalente_control.strAuxiliarMensaje,producto_equivalente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(producto_equivalente_control) {
		if(producto_equivalente_funcion1.esPaginaForm(producto_equivalente_constante1)==true) {
			window.opener.producto_equivalente_webcontrol1.actualizarPaginaTablaDatos(producto_equivalente_control);
		} else {
			this.actualizarPaginaTablaDatos(producto_equivalente_control);
		}
	}
	
	actualizarPaginaAbrirLink(producto_equivalente_control) {
		producto_equivalente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(producto_equivalente_control.strAuxiliarUrlPagina);
				
		producto_equivalente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(producto_equivalente_control.strAuxiliarTipo,producto_equivalente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(producto_equivalente_control) {
		producto_equivalente_funcion1.resaltarRestaurarDivMensaje(true,producto_equivalente_control.strAuxiliarMensajeAlert,producto_equivalente_control.strAuxiliarCssMensaje);
			
		if(producto_equivalente_funcion1.esPaginaForm(producto_equivalente_constante1)==true) {
			window.opener.producto_equivalente_funcion1.resaltarRestaurarDivMensaje(true,producto_equivalente_control.strAuxiliarMensajeAlert,producto_equivalente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(producto_equivalente_control) {
		this.producto_equivalente_controlInicial=producto_equivalente_control;
			
		if(producto_equivalente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(producto_equivalente_control.strStyleDivArbol,producto_equivalente_control.strStyleDivContent
																,producto_equivalente_control.strStyleDivOpcionesBanner,producto_equivalente_control.strStyleDivExpandirColapsar
																,producto_equivalente_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(producto_equivalente_control) {
		this.actualizarCssBotonesPagina(producto_equivalente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(producto_equivalente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(producto_equivalente_control.tiposReportes,producto_equivalente_control.tiposReporte
															 	,producto_equivalente_control.tiposPaginacion,producto_equivalente_control.tiposAcciones
																,producto_equivalente_control.tiposColumnasSelect,producto_equivalente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(producto_equivalente_control.tiposRelaciones,producto_equivalente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(producto_equivalente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(producto_equivalente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(producto_equivalente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(producto_equivalente_control) {
	
		var indexPosition=producto_equivalente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=producto_equivalente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(producto_equivalente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_principal",producto_equivalente_control.strRecargarFkTipos,",")) { 
				producto_equivalente_webcontrol1.cargarCombosproducto_principalsFK(producto_equivalente_control);
			}

			if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_equivalente",producto_equivalente_control.strRecargarFkTipos,",")) { 
				producto_equivalente_webcontrol1.cargarCombosproducto_equivalentesFK(producto_equivalente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(producto_equivalente_control.strRecargarFkTiposNinguno!=null && producto_equivalente_control.strRecargarFkTiposNinguno!='NINGUNO' && producto_equivalente_control.strRecargarFkTiposNinguno!='') {
			
				if(producto_equivalente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto_principal",producto_equivalente_control.strRecargarFkTiposNinguno,",")) { 
					producto_equivalente_webcontrol1.cargarCombosproducto_principalsFK(producto_equivalente_control);
				}

				if(producto_equivalente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto_equivalente",producto_equivalente_control.strRecargarFkTiposNinguno,",")) { 
					producto_equivalente_webcontrol1.cargarCombosproducto_equivalentesFK(producto_equivalente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproducto_principalFK(producto_equivalente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_equivalente_funcion1,producto_equivalente_control.producto_principalsFK);
	}

	cargarComboEditarTablaproducto_equivalenteFK(producto_equivalente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_equivalente_funcion1,producto_equivalente_control.producto_equivalentesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(producto_equivalente_control) {
		jQuery("#tdproducto_equivalenteNuevo").css("display",producto_equivalente_control.strPermisoNuevo);
		jQuery("#trproducto_equivalenteElementos").css("display",producto_equivalente_control.strVisibleTablaElementos);
		jQuery("#trproducto_equivalenteAcciones").css("display",producto_equivalente_control.strVisibleTablaAcciones);
		jQuery("#trproducto_equivalenteParametrosAcciones").css("display",producto_equivalente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(producto_equivalente_control) {
	
		this.actualizarCssBotonesMantenimiento(producto_equivalente_control);
				
		if(producto_equivalente_control.producto_equivalenteActual!=null) {//form
			
			this.actualizarCamposFormulario(producto_equivalente_control);			
		}
						
		this.actualizarSpanMensajesCampos(producto_equivalente_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(producto_equivalente_control) {
	
		jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id").val(producto_equivalente_control.producto_equivalenteActual.id);
		jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-version_row").val(producto_equivalente_control.producto_equivalenteActual.versionRow);
		
		if(producto_equivalente_control.producto_equivalenteActual.id_producto_principal!=null && producto_equivalente_control.producto_equivalenteActual.id_producto_principal>-1){
			if(jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").val() != producto_equivalente_control.producto_equivalenteActual.id_producto_principal) {
				jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").val(producto_equivalente_control.producto_equivalenteActual.id_producto_principal).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").select2("val", null);
			if(jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente!=null && producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente>-1){
			if(jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").val() != producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente) {
				jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").val(producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente).trigger("change");
			}
		} else { 
			//jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").select2("val", null);
			if(jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-producto_id_principal").val(producto_equivalente_control.producto_equivalenteActual.producto_id_principal);
		jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-producto_id_equivalente").val(producto_equivalente_control.producto_equivalenteActual.producto_id_equivalente);
		jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-comentario").val(producto_equivalente_control.producto_equivalenteActual.comentario);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+producto_equivalente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("producto_equivalente","inventario","","form_producto_equivalente",formulario,"","",paraEventoTabla,idFilaTabla,producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
	}
	
	actualizarSpanMensajesCampos(producto_equivalente_control) {
		jQuery("#spanstrMensajeid").text(producto_equivalente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(producto_equivalente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_producto_principal").text(producto_equivalente_control.strMensajeid_producto_principal);		
		jQuery("#spanstrMensajeid_producto_equivalente").text(producto_equivalente_control.strMensajeid_producto_equivalente);		
		jQuery("#spanstrMensajeproducto_id_principal").text(producto_equivalente_control.strMensajeproducto_id_principal);		
		jQuery("#spanstrMensajeproducto_id_equivalente").text(producto_equivalente_control.strMensajeproducto_id_equivalente);		
		jQuery("#spanstrMensajecomentario").text(producto_equivalente_control.strMensajecomentario);		
	}
	
	actualizarCssBotonesMantenimiento(producto_equivalente_control) {
		jQuery("#tdbtnNuevoproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoproducto_equivalente").css("display",producto_equivalente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarproducto_equivalente").css("display",producto_equivalente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarproducto_equivalente").css("display",producto_equivalente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosproducto_equivalente").css("display",producto_equivalente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarproducto_equivalente").css("visibility",producto_equivalente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosproducto_principalsFK(producto_equivalente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal",producto_equivalente_control.producto_principalsFK);

		if(producto_equivalente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_equivalente_control.idFilaTablaActual+"_2",producto_equivalente_control.producto_principalsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal-cmbid_producto_principal",producto_equivalente_control.producto_principalsFK);

	};

	cargarCombosproducto_equivalentesFK(producto_equivalente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente",producto_equivalente_control.producto_equivalentesFK);

		if(producto_equivalente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_equivalente_control.idFilaTablaActual+"_3",producto_equivalente_control.producto_equivalentesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente-cmbid_producto_equivalente",producto_equivalente_control.producto_equivalentesFK);

	};

	
	
	registrarComboActionChangeCombosproducto_principalsFK(producto_equivalente_control) {

	};

	registrarComboActionChangeCombosproducto_equivalentesFK(producto_equivalente_control) {

	};

	
	
	setDefectoValorCombosproducto_principalsFK(producto_equivalente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_equivalente_control.idproducto_principalDefaultFK>-1 && jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").val() != producto_equivalente_control.idproducto_principalDefaultFK) {
				jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").val(producto_equivalente_control.idproducto_principalDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal-cmbid_producto_principal").val(producto_equivalente_control.idproducto_principalDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal-cmbid_producto_principal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal-cmbid_producto_principal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproducto_equivalentesFK(producto_equivalente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_equivalente_control.idproducto_equivalenteDefaultFK>-1 && jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").val() != producto_equivalente_control.idproducto_equivalenteDefaultFK) {
				jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").val(producto_equivalente_control.idproducto_equivalenteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente-cmbid_producto_equivalente").val(producto_equivalente_control.idproducto_equivalenteDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente-cmbid_producto_equivalente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente-cmbid_producto_equivalente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//producto_equivalente_control
		
	
	}
	
	onLoadCombosDefectoFK(producto_equivalente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_equivalente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_principal",producto_equivalente_control.strRecargarFkTipos,",")) { 
				producto_equivalente_webcontrol1.setDefectoValorCombosproducto_principalsFK(producto_equivalente_control);
			}

			if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_equivalente",producto_equivalente_control.strRecargarFkTipos,",")) { 
				producto_equivalente_webcontrol1.setDefectoValorCombosproducto_equivalentesFK(producto_equivalente_control);
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
	onLoadCombosEventosFK(producto_equivalente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_equivalente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_principal",producto_equivalente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_equivalente_webcontrol1.registrarComboActionChangeCombosproducto_principalsFK(producto_equivalente_control);
			//}

			//if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_equivalente",producto_equivalente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_equivalente_webcontrol1.registrarComboActionChangeCombosproducto_equivalentesFK(producto_equivalente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(producto_equivalente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_equivalente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(producto_equivalente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(producto_equivalente_constante1.BIT_ES_PAGINA_FORM==true) {
				producto_equivalente_funcion1.validarFormularioJQuery(producto_equivalente_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("producto_equivalente");		
			
			funcionGeneralEventoJQuery.setBotonArbolAbrirClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("producto_equivalente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(producto_equivalente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,"producto_equivalente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto_principal","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal_img_busqueda").click(function(){
				producto_equivalente_webcontrol1.abrirBusquedaParaproducto("id_producto_principal");
				//alert(jQuery('#form-id_producto_principal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto_equivalente","id_producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente_img_busqueda").click(function(){
				producto_equivalente_webcontrol1.abrirBusquedaParaproducto_equivalente("id_producto_equivalente");
				//alert(jQuery('#form-id_producto_equivalente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("producto_equivalente");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(producto_equivalente_control) {
		
		
		
		if(producto_equivalente_control.strPermisoActualizar!=null) {
			jQuery("#tdproducto_equivalenteActualizarToolBar").css("display",producto_equivalente_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdproducto_equivalenteEliminarToolBar").css("display",producto_equivalente_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trproducto_equivalenteElementos").css("display",producto_equivalente_control.strVisibleTablaElementos);
		
		jQuery("#trproducto_equivalenteAcciones").css("display",producto_equivalente_control.strVisibleTablaAcciones);
		jQuery("#trproducto_equivalenteParametrosAcciones").css("display",producto_equivalente_control.strVisibleTablaAcciones);
		
		jQuery("#tdproducto_equivalenteCerrarPagina").css("display",producto_equivalente_control.strPermisoPopup);		
		jQuery("#tdproducto_equivalenteCerrarPaginaToolBar").css("display",producto_equivalente_control.strPermisoPopup);
		//jQuery("#trproducto_equivalenteAccionesRelaciones").css("display",producto_equivalente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=producto_equivalente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + producto_equivalente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + producto_equivalente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Producto Equivalentess";
		sTituloBanner+=" - " + producto_equivalente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + producto_equivalente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdproducto_equivalenteRelacionesToolBar").css("display",producto_equivalente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosproducto_equivalente").css("display",producto_equivalente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		producto_equivalente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		producto_equivalente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		producto_equivalente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		producto_equivalente_webcontrol1.registrarEventosControles();
		
		if(producto_equivalente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(producto_equivalente_constante1.STR_ES_RELACIONADO=="false") {
			producto_equivalente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(producto_equivalente_constante1.STR_ES_RELACIONES=="true") {
			if(producto_equivalente_constante1.BIT_ES_PAGINA_FORM==true) {
				producto_equivalente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(producto_equivalente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(producto_equivalente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(producto_equivalente_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(producto_equivalente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
						//producto_equivalente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(producto_equivalente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(producto_equivalente_constante1.BIG_ID_ACTUAL,"producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
						//producto_equivalente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			producto_equivalente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);	
	}
}

var producto_equivalente_webcontrol1 = new producto_equivalente_webcontrol();

export {producto_equivalente_webcontrol,producto_equivalente_webcontrol1};

//Para ser llamado desde window.opener
window.producto_equivalente_webcontrol1 = producto_equivalente_webcontrol1;


if(producto_equivalente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = producto_equivalente_webcontrol1.onLoadWindow; 
}

//</script>