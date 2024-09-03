//<script type="text/javascript" language="javascript">



//var otro_suplidorJQueryPaginaWebInteraccion= function (otro_suplidor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {otro_suplidor_constante,otro_suplidor_constante1} from '../util/otro_suplidor_constante.js';

import {otro_suplidor_funcion,otro_suplidor_funcion1} from '../util/otro_suplidor_form_funcion.js';


class otro_suplidor_webcontrol extends GeneralEntityWebControl {
	
	otro_suplidor_control=null;
	otro_suplidor_controlInicial=null;
	otro_suplidor_controlAuxiliar=null;
		
	//if(otro_suplidor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(otro_suplidor_control) {
		super();
		
		this.otro_suplidor_control=otro_suplidor_control;
	}
		
	actualizarVariablesPagina(otro_suplidor_control) {
		
		if(otro_suplidor_control.action=="index" || otro_suplidor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(otro_suplidor_control);
			
		} 
		
		
		
	
		else if(otro_suplidor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(otro_suplidor_control);	
		
		} else if(otro_suplidor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(otro_suplidor_control);		
		}
	
		else if(otro_suplidor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(otro_suplidor_control);		
		}
	
		else if(otro_suplidor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(otro_suplidor_control);
		}
		
		
		else if(otro_suplidor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(otro_suplidor_control);		
		
		} else if(otro_suplidor_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(otro_suplidor_control);		
		
		} 
		//else if(otro_suplidor_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(otro_suplidor_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + otro_suplidor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(otro_suplidor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(otro_suplidor_control) {
		this.actualizarPaginaAccionesGenerales(otro_suplidor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(otro_suplidor_control) {
		
		this.actualizarPaginaCargaGeneral(otro_suplidor_control);
		this.actualizarPaginaOrderBy(otro_suplidor_control);
		this.actualizarPaginaTablaDatos(otro_suplidor_control);
		this.actualizarPaginaCargaGeneralControles(otro_suplidor_control);
		//this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_suplidor_control);
		this.actualizarPaginaAreaBusquedas(otro_suplidor_control);
		this.actualizarPaginaCargaCombosFK(otro_suplidor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(otro_suplidor_control) {
		//this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(otro_suplidor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(otro_suplidor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_suplidor_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(otro_suplidor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(otro_suplidor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(otro_suplidor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(otro_suplidor_control) {
		this.actualizarPaginaCargaGeneralControles(otro_suplidor_control);
		this.actualizarPaginaCargaCombosFK(otro_suplidor_control);
		this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(otro_suplidor_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(otro_suplidor_control) {
		this.actualizarPaginaCargaGeneralControles(otro_suplidor_control);
		this.actualizarPaginaCargaCombosFK(otro_suplidor_control);
		this.actualizarPaginaFormulario(otro_suplidor_control);
		this.onLoadCombosDefectoFK(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(otro_suplidor_control) {
		//FORMULARIO
		if(otro_suplidor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_suplidor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(otro_suplidor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		
		//COMBOS FK
		if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_suplidor_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(otro_suplidor_control) {
		//FORMULARIO
		if(otro_suplidor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_suplidor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(otro_suplidor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);	
		
		//COMBOS FK
		if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_suplidor_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(otro_suplidor_control) {
		//FORMULARIO
		if(otro_suplidor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_suplidor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);	
		//COMBOS FK
		if(otro_suplidor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_suplidor_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(otro_suplidor_control) {
		
		if(otro_suplidor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(otro_suplidor_control);
		}
		
		if(otro_suplidor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(otro_suplidor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(otro_suplidor_control) {
		if(otro_suplidor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("otro_suplidorReturnGeneral",JSON.stringify(otro_suplidor_control.otro_suplidorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control) {
		if(otro_suplidor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && otro_suplidor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(otro_suplidor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(otro_suplidor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(otro_suplidor_control, mostrar) {
		
		if(mostrar==true) {
			otro_suplidor_funcion1.resaltarRestaurarDivsPagina(false,"otro_suplidor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				otro_suplidor_funcion1.resaltarRestaurarDivMantenimiento(false,"otro_suplidor");
			}			
			
			otro_suplidor_funcion1.mostrarDivMensaje(true,otro_suplidor_control.strAuxiliarMensaje,otro_suplidor_control.strAuxiliarCssMensaje);
		
		} else {
			otro_suplidor_funcion1.mostrarDivMensaje(false,otro_suplidor_control.strAuxiliarMensaje,otro_suplidor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(otro_suplidor_control) {
		if(otro_suplidor_funcion1.esPaginaForm(otro_suplidor_constante1)==true) {
			window.opener.otro_suplidor_webcontrol1.actualizarPaginaTablaDatos(otro_suplidor_control);
		} else {
			this.actualizarPaginaTablaDatos(otro_suplidor_control);
		}
	}
	
	actualizarPaginaAbrirLink(otro_suplidor_control) {
		otro_suplidor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(otro_suplidor_control.strAuxiliarUrlPagina);
				
		otro_suplidor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(otro_suplidor_control.strAuxiliarTipo,otro_suplidor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(otro_suplidor_control) {
		otro_suplidor_funcion1.resaltarRestaurarDivMensaje(true,otro_suplidor_control.strAuxiliarMensajeAlert,otro_suplidor_control.strAuxiliarCssMensaje);
			
		if(otro_suplidor_funcion1.esPaginaForm(otro_suplidor_constante1)==true) {
			window.opener.otro_suplidor_funcion1.resaltarRestaurarDivMensaje(true,otro_suplidor_control.strAuxiliarMensajeAlert,otro_suplidor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(otro_suplidor_control) {
		this.otro_suplidor_controlInicial=otro_suplidor_control;
			
		if(otro_suplidor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(otro_suplidor_control.strStyleDivArbol,otro_suplidor_control.strStyleDivContent
																,otro_suplidor_control.strStyleDivOpcionesBanner,otro_suplidor_control.strStyleDivExpandirColapsar
																,otro_suplidor_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(otro_suplidor_control) {
		this.actualizarCssBotonesPagina(otro_suplidor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(otro_suplidor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(otro_suplidor_control.tiposReportes,otro_suplidor_control.tiposReporte
															 	,otro_suplidor_control.tiposPaginacion,otro_suplidor_control.tiposAcciones
																,otro_suplidor_control.tiposColumnasSelect,otro_suplidor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(otro_suplidor_control.tiposRelaciones,otro_suplidor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(otro_suplidor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(otro_suplidor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(otro_suplidor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(otro_suplidor_control) {
	
		var indexPosition=otro_suplidor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=otro_suplidor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(otro_suplidor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",otro_suplidor_control.strRecargarFkTipos,",")) { 
				otro_suplidor_webcontrol1.cargarCombosproductosFK(otro_suplidor_control);
			}

			if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",otro_suplidor_control.strRecargarFkTipos,",")) { 
				otro_suplidor_webcontrol1.cargarCombosproveedorsFK(otro_suplidor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(otro_suplidor_control.strRecargarFkTiposNinguno!=null && otro_suplidor_control.strRecargarFkTiposNinguno!='NINGUNO' && otro_suplidor_control.strRecargarFkTiposNinguno!='') {
			
				if(otro_suplidor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",otro_suplidor_control.strRecargarFkTiposNinguno,",")) { 
					otro_suplidor_webcontrol1.cargarCombosproductosFK(otro_suplidor_control);
				}

				if(otro_suplidor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",otro_suplidor_control.strRecargarFkTiposNinguno,",")) { 
					otro_suplidor_webcontrol1.cargarCombosproveedorsFK(otro_suplidor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproductoFK(otro_suplidor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_suplidor_funcion1,otro_suplidor_control.productosFK);
	}

	cargarComboEditarTablaproveedorFK(otro_suplidor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_suplidor_funcion1,otro_suplidor_control.proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(otro_suplidor_control) {
		jQuery("#tdotro_suplidorNuevo").css("display",otro_suplidor_control.strPermisoNuevo);
		jQuery("#trotro_suplidorElementos").css("display",otro_suplidor_control.strVisibleTablaElementos);
		jQuery("#trotro_suplidorAcciones").css("display",otro_suplidor_control.strVisibleTablaAcciones);
		jQuery("#trotro_suplidorParametrosAcciones").css("display",otro_suplidor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(otro_suplidor_control) {
	
		this.actualizarCssBotonesMantenimiento(otro_suplidor_control);
				
		if(otro_suplidor_control.otro_suplidorActual!=null) {//form
			
			this.actualizarCamposFormulario(otro_suplidor_control);			
		}
						
		this.actualizarSpanMensajesCampos(otro_suplidor_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(otro_suplidor_control) {
	
		jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id").val(otro_suplidor_control.otro_suplidorActual.id);
		jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-created_at").val(otro_suplidor_control.otro_suplidorActual.versionRow);
		jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-updated_at").val(otro_suplidor_control.otro_suplidorActual.versionRow);
		
		if(otro_suplidor_control.otro_suplidorActual.id_producto!=null && otro_suplidor_control.otro_suplidorActual.id_producto>-1){
			if(jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").val() != otro_suplidor_control.otro_suplidorActual.id_producto) {
				jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").val(otro_suplidor_control.otro_suplidorActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(otro_suplidor_control.otro_suplidorActual.id_proveedor!=null && otro_suplidor_control.otro_suplidorActual.id_proveedor>-1){
			if(jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").val() != otro_suplidor_control.otro_suplidorActual.id_proveedor) {
				jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").val(otro_suplidor_control.otro_suplidorActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").select2("val", null);
			if(jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+otro_suplidor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("otro_suplidor","inventario","","form_otro_suplidor",formulario,"","",paraEventoTabla,idFilaTabla,otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
	}
	
	actualizarSpanMensajesCampos(otro_suplidor_control) {
		jQuery("#spanstrMensajeid").text(otro_suplidor_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(otro_suplidor_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(otro_suplidor_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_producto").text(otro_suplidor_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_proveedor").text(otro_suplidor_control.strMensajeid_proveedor);		
	}
	
	actualizarCssBotonesMantenimiento(otro_suplidor_control) {
		jQuery("#tdbtnNuevootro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevootro_suplidor").css("display",otro_suplidor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarotro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarotro_suplidor").css("display",otro_suplidor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarotro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarotro_suplidor").css("display",otro_suplidor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarotro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosotro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosotro_suplidor").css("display",otro_suplidor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarotro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarotro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarotro_suplidor").css("visibility",otro_suplidor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosproductosFK(otro_suplidor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto",otro_suplidor_control.productosFK);

		if(otro_suplidor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_suplidor_control.idFilaTablaActual+"_3",otro_suplidor_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",otro_suplidor_control.productosFK);

	};

	cargarCombosproveedorsFK(otro_suplidor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor",otro_suplidor_control.proveedorsFK);

		if(otro_suplidor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_suplidor_control.idFilaTablaActual+"_4",otro_suplidor_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",otro_suplidor_control.proveedorsFK);

	};

	
	
	registrarComboActionChangeCombosproductosFK(otro_suplidor_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(otro_suplidor_control) {

	};

	
	
	setDefectoValorCombosproductosFK(otro_suplidor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_suplidor_control.idproductoDefaultFK>-1 && jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").val() != otro_suplidor_control.idproductoDefaultFK) {
				jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").val(otro_suplidor_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(otro_suplidor_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(otro_suplidor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_suplidor_control.idproveedorDefaultFK>-1 && jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").val() != otro_suplidor_control.idproveedorDefaultFK) {
				jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").val(otro_suplidor_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(otro_suplidor_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//otro_suplidor_control
		
	
	}
	
	onLoadCombosDefectoFK(otro_suplidor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_suplidor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",otro_suplidor_control.strRecargarFkTipos,",")) { 
				otro_suplidor_webcontrol1.setDefectoValorCombosproductosFK(otro_suplidor_control);
			}

			if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",otro_suplidor_control.strRecargarFkTipos,",")) { 
				otro_suplidor_webcontrol1.setDefectoValorCombosproveedorsFK(otro_suplidor_control);
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
	onLoadCombosEventosFK(otro_suplidor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_suplidor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",otro_suplidor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_suplidor_webcontrol1.registrarComboActionChangeCombosproductosFK(otro_suplidor_control);
			//}

			//if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",otro_suplidor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_suplidor_webcontrol1.registrarComboActionChangeCombosproveedorsFK(otro_suplidor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(otro_suplidor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_suplidor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(otro_suplidor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(otro_suplidor_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_suplidor_funcion1.validarFormularioJQuery(otro_suplidor_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("otro_suplidor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("otro_suplidor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(otro_suplidor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,"otro_suplidor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				otro_suplidor_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				otro_suplidor_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("otro_suplidor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(otro_suplidor_control) {
		
		
		
		if(otro_suplidor_control.strPermisoActualizar!=null) {
			jQuery("#tdotro_suplidorActualizarToolBar").css("display",otro_suplidor_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdotro_suplidorEliminarToolBar").css("display",otro_suplidor_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trotro_suplidorElementos").css("display",otro_suplidor_control.strVisibleTablaElementos);
		
		jQuery("#trotro_suplidorAcciones").css("display",otro_suplidor_control.strVisibleTablaAcciones);
		jQuery("#trotro_suplidorParametrosAcciones").css("display",otro_suplidor_control.strVisibleTablaAcciones);
		
		jQuery("#tdotro_suplidorCerrarPagina").css("display",otro_suplidor_control.strPermisoPopup);		
		jQuery("#tdotro_suplidorCerrarPaginaToolBar").css("display",otro_suplidor_control.strPermisoPopup);
		//jQuery("#trotro_suplidorAccionesRelaciones").css("display",otro_suplidor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=otro_suplidor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_suplidor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + otro_suplidor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Otro Suplidores";
		sTituloBanner+=" - " + otro_suplidor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_suplidor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdotro_suplidorRelacionesToolBar").css("display",otro_suplidor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosotro_suplidor").css("display",otro_suplidor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		otro_suplidor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		otro_suplidor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		otro_suplidor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		otro_suplidor_webcontrol1.registrarEventosControles();
		
		if(otro_suplidor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(otro_suplidor_constante1.STR_ES_RELACIONADO=="false") {
			otro_suplidor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(otro_suplidor_constante1.STR_ES_RELACIONES=="true") {
			if(otro_suplidor_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_suplidor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(otro_suplidor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(otro_suplidor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(otro_suplidor_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(otro_suplidor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
						//otro_suplidor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(otro_suplidor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(otro_suplidor_constante1.BIG_ID_ACTUAL,"otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
						//otro_suplidor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			otro_suplidor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);	
	}
	
	/*
		Variables-Pagina: actualizarVariablesPagina
		Variables-Pagina:actualizarVariablesPagina(AccionIndex,AccionCancelar,AccionMostrarEjecutar,AccionesGenerales)
		Variables-Pagina:actualizarVariablesPagina(AccionNuevo,AccionActualizar,AccionEliminar,AccionSeleccionar)
		Variables-Pagina:actualizarVariablesPagina(AccionNuevoPreparar,AccionRecargarFomulario,AccionManejarEventos)
		Pagina: actualizarPagina(AccionesGenerales,GuardarReturnSession,MensajePantallaAuxiliar,MensajePantalla)
		Pagina: actualizarPagina(TablaDatos,AbrirLink,MensajeAlert,CargaGeneral,CargaGeneralControles)
		Pagina: actualizarPagina(CargaCombosFK,UsuarioInvitado)
		Pagina: actualizarPagina(AreaMantenimiento,Formulario)
		Combos-Fk: cargarCombosFK,cargarComboEditarTablaempresaFK,cargarComboEditarTablasucursalFK
		Combos-Fk: cargarCombosempresasFK,cargarCombossucursalsFK
		Combos-Fk: setDefectoValorCombosempresasFK,setDefectoValorCombossucursalsFK
		Combos-Fk: onLoadCombosEventosFK,onLoadCombosDefectoPaginaGeneralControles
		Campos-Recargar: actualizarCamposFormulario,recargarFormularioGeneral
		SpanMensajes-CssBotones: actualizarSpanMensajesCampos,actualizarCssBotonesMantenimiento
		Eventos-CombosFk: onLoadRecargarRelacionado,registrarEventosControles,onLoadCombosDefectoFK
		AccioesEventos-CssBotones: registrarAccionesEventos,actualizarCssBotonesPagina
		PropiedadesPagina-FuncionesPagina: registrarPropiedadesPagina, registrarFuncionesPagina
		Load-Unload-Pagina: onLoad, onUnLoadWindow, onLoadWindow
		Eventos-OnLoad: registrarEventosOnLoadGlobal
	*/
}

var otro_suplidor_webcontrol1 = new otro_suplidor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {otro_suplidor_webcontrol,otro_suplidor_webcontrol1};

//Para ser llamado desde window.opener
window.otro_suplidor_webcontrol1 = otro_suplidor_webcontrol1;


if(otro_suplidor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = otro_suplidor_webcontrol1.onLoadWindow; 
}

//</script>