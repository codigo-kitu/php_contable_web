//<script type="text/javascript" language="javascript">



//var estimado_detalleJQueryPaginaWebInteraccion= function (estimado_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {estimado_detalle_constante,estimado_detalle_constante1} from '../util/estimado_detalle_constante.js';

import {estimado_detalle_funcion,estimado_detalle_funcion1} from '../util/estimado_detalle_form_funcion.js';


class estimado_detalle_webcontrol extends GeneralEntityWebControl {
	
	estimado_detalle_control=null;
	estimado_detalle_controlInicial=null;
	estimado_detalle_controlAuxiliar=null;
		
	//if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(estimado_detalle_control) {
		super();
		
		this.estimado_detalle_control=estimado_detalle_control;
	}
		
	actualizarVariablesPagina(estimado_detalle_control) {
		
		if(estimado_detalle_control.action=="index" || estimado_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(estimado_detalle_control);
			
		} 
		
		
		
	
		else if(estimado_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(estimado_detalle_control);	
		
		} else if(estimado_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(estimado_detalle_control);		
		}
	
	
		
		
		else if(estimado_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(estimado_detalle_control);		
		
		} else if(estimado_detalle_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(estimado_detalle_control);		
		
		} 
		//else if(estimado_detalle_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(estimado_detalle_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + estimado_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(estimado_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(estimado_detalle_control) {
		this.actualizarPaginaAccionesGenerales(estimado_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(estimado_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(estimado_detalle_control);
		this.actualizarPaginaOrderBy(estimado_detalle_control);
		this.actualizarPaginaTablaDatos(estimado_detalle_control);
		this.actualizarPaginaCargaGeneralControles(estimado_detalle_control);
		//this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estimado_detalle_control);
		this.actualizarPaginaAreaBusquedas(estimado_detalle_control);
		this.actualizarPaginaCargaCombosFK(estimado_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(estimado_detalle_control) {
		//this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(estimado_detalle_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(estimado_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(estimado_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(estimado_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(estimado_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(estimado_detalle_control);
		this.actualizarPaginaCargaCombosFK(estimado_detalle_control);
		this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(estimado_detalle_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(estimado_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(estimado_detalle_control);
		this.actualizarPaginaCargaCombosFK(estimado_detalle_control);
		this.actualizarPaginaFormulario(estimado_detalle_control);
		this.onLoadCombosDefectoFK(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(estimado_detalle_control) {
		//FORMULARIO
		if(estimado_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(estimado_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(estimado_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		
		//COMBOS FK
		if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(estimado_detalle_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(estimado_detalle_control) {
		//FORMULARIO
		if(estimado_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(estimado_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(estimado_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);	
		
		//COMBOS FK
		if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(estimado_detalle_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(estimado_detalle_control) {
		//FORMULARIO
		if(estimado_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(estimado_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);	
		//COMBOS FK
		if(estimado_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(estimado_detalle_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(estimado_detalle_control) {
		
		if(estimado_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(estimado_detalle_control);
		}
		
		if(estimado_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(estimado_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(estimado_detalle_control) {
		if(estimado_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("estimado_detalleReturnGeneral",JSON.stringify(estimado_detalle_control.estimado_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control) {
		if(estimado_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && estimado_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(estimado_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(estimado_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(estimado_detalle_control, mostrar) {
		
		if(mostrar==true) {
			estimado_detalle_funcion1.resaltarRestaurarDivsPagina(false,"estimado_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				estimado_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"estimado_detalle");
			}			
			
			estimado_detalle_funcion1.mostrarDivMensaje(true,estimado_detalle_control.strAuxiliarMensaje,estimado_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			estimado_detalle_funcion1.mostrarDivMensaje(false,estimado_detalle_control.strAuxiliarMensaje,estimado_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(estimado_detalle_control) {
		if(estimado_detalle_funcion1.esPaginaForm(estimado_detalle_constante1)==true) {
			window.opener.estimado_detalle_webcontrol1.actualizarPaginaTablaDatos(estimado_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(estimado_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(estimado_detalle_control) {
		estimado_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(estimado_detalle_control.strAuxiliarUrlPagina);
				
		estimado_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(estimado_detalle_control.strAuxiliarTipo,estimado_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(estimado_detalle_control) {
		estimado_detalle_funcion1.resaltarRestaurarDivMensaje(true,estimado_detalle_control.strAuxiliarMensajeAlert,estimado_detalle_control.strAuxiliarCssMensaje);
			
		if(estimado_detalle_funcion1.esPaginaForm(estimado_detalle_constante1)==true) {
			window.opener.estimado_detalle_funcion1.resaltarRestaurarDivMensaje(true,estimado_detalle_control.strAuxiliarMensajeAlert,estimado_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(estimado_detalle_control) {
		this.estimado_detalle_controlInicial=estimado_detalle_control;
			
		if(estimado_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(estimado_detalle_control.strStyleDivArbol,estimado_detalle_control.strStyleDivContent
																,estimado_detalle_control.strStyleDivOpcionesBanner,estimado_detalle_control.strStyleDivExpandirColapsar
																,estimado_detalle_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(estimado_detalle_control) {
		this.actualizarCssBotonesPagina(estimado_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(estimado_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(estimado_detalle_control.tiposReportes,estimado_detalle_control.tiposReporte
															 	,estimado_detalle_control.tiposPaginacion,estimado_detalle_control.tiposAcciones
																,estimado_detalle_control.tiposColumnasSelect,estimado_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(estimado_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(estimado_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(estimado_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(estimado_detalle_control) {
	
		var indexPosition=estimado_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=estimado_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(estimado_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.cargarCombosestimadosFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.cargarCombosbodegasFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.cargarCombosproductosFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.cargarCombosunidadsFK(estimado_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(estimado_detalle_control.strRecargarFkTiposNinguno!=null && estimado_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && estimado_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(estimado_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estimado",estimado_detalle_control.strRecargarFkTiposNinguno,",")) { 
					estimado_detalle_webcontrol1.cargarCombosestimadosFK(estimado_detalle_control);
				}

				if(estimado_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",estimado_detalle_control.strRecargarFkTiposNinguno,",")) { 
					estimado_detalle_webcontrol1.cargarCombosbodegasFK(estimado_detalle_control);
				}

				if(estimado_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",estimado_detalle_control.strRecargarFkTiposNinguno,",")) { 
					estimado_detalle_webcontrol1.cargarCombosproductosFK(estimado_detalle_control);
				}

				if(estimado_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",estimado_detalle_control.strRecargarFkTiposNinguno,",")) { 
					estimado_detalle_webcontrol1.cargarCombosunidadsFK(estimado_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.estimado_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.estimado_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.estimado_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.estimado_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.estimado_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.estimado_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaestimadoFK(estimado_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_detalle_funcion1,estimado_detalle_control.estimadosFK);
	}

	cargarComboEditarTablabodegaFK(estimado_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_detalle_funcion1,estimado_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(estimado_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_detalle_funcion1,estimado_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(estimado_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_detalle_funcion1,estimado_detalle_control.unidadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(estimado_detalle_control) {
		jQuery("#tdestimado_detalleNuevo").css("display",estimado_detalle_control.strPermisoNuevo);
		jQuery("#trestimado_detalleElementos").css("display",estimado_detalle_control.strVisibleTablaElementos);
		jQuery("#trestimado_detalleAcciones").css("display",estimado_detalle_control.strVisibleTablaAcciones);
		jQuery("#trestimado_detalleParametrosAcciones").css("display",estimado_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(estimado_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(estimado_detalle_control);
				
		if(estimado_detalle_control.estimado_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(estimado_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(estimado_detalle_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(estimado_detalle_control) {
	
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id").val(estimado_detalle_control.estimado_detalleActual.id);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-created_at").val(estimado_detalle_control.estimado_detalleActual.versionRow);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-updated_at").val(estimado_detalle_control.estimado_detalleActual.versionRow);
		
		if(estimado_detalle_control.estimado_detalleActual.id_estimado!=null && estimado_detalle_control.estimado_detalleActual.id_estimado>-1){
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").val() != estimado_detalle_control.estimado_detalleActual.id_estimado) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").val(estimado_detalle_control.estimado_detalleActual.id_estimado).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").select2("val", null);
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_detalle_control.estimado_detalleActual.id_bodega!=null && estimado_detalle_control.estimado_detalleActual.id_bodega>-1){
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != estimado_detalle_control.estimado_detalleActual.id_bodega) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").val(estimado_detalle_control.estimado_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_detalle_control.estimado_detalleActual.id_producto!=null && estimado_detalle_control.estimado_detalleActual.id_producto>-1){
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").val() != estimado_detalle_control.estimado_detalleActual.id_producto) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").val(estimado_detalle_control.estimado_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_detalle_control.estimado_detalleActual.id_unidad!=null && estimado_detalle_control.estimado_detalleActual.id_unidad>-1){
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != estimado_detalle_control.estimado_detalleActual.id_unidad) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").val(estimado_detalle_control.estimado_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").select2("val", null);
			if(jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-cantidad").val(estimado_detalle_control.estimado_detalleActual.cantidad);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-precio").val(estimado_detalle_control.estimado_detalleActual.precio);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-descuento_porciento").val(estimado_detalle_control.estimado_detalleActual.descuento_porciento);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-descuento_monto").val(estimado_detalle_control.estimado_detalleActual.descuento_monto);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-sub_total").val(estimado_detalle_control.estimado_detalleActual.sub_total);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-iva_porciento").val(estimado_detalle_control.estimado_detalleActual.iva_porciento);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-iva_monto").val(estimado_detalle_control.estimado_detalleActual.iva_monto);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-total").val(estimado_detalle_control.estimado_detalleActual.total);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-recibido").val(estimado_detalle_control.estimado_detalleActual.recibido);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-observacion").val(estimado_detalle_control.estimado_detalleActual.observacion);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-impuesto2_porciento").val(estimado_detalle_control.estimado_detalleActual.impuesto2_porciento);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-impuesto2_monto").val(estimado_detalle_control.estimado_detalleActual.impuesto2_monto);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-cotizacion").val(estimado_detalle_control.estimado_detalleActual.cotizacion);
		jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-moneda").val(estimado_detalle_control.estimado_detalleActual.moneda);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+estimado_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("estimado_detalle","estimados","","form_estimado_detalle",formulario,"","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}
	
	actualizarSpanMensajesCampos(estimado_detalle_control) {
		jQuery("#spanstrMensajeid").text(estimado_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(estimado_detalle_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(estimado_detalle_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_estimado").text(estimado_detalle_control.strMensajeid_estimado);		
		jQuery("#spanstrMensajeid_bodega").text(estimado_detalle_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(estimado_detalle_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_unidad").text(estimado_detalle_control.strMensajeid_unidad);		
		jQuery("#spanstrMensajecantidad").text(estimado_detalle_control.strMensajecantidad);		
		jQuery("#spanstrMensajeprecio").text(estimado_detalle_control.strMensajeprecio);		
		jQuery("#spanstrMensajedescuento_porciento").text(estimado_detalle_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajedescuento_monto").text(estimado_detalle_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajesub_total").text(estimado_detalle_control.strMensajesub_total);		
		jQuery("#spanstrMensajeiva_porciento").text(estimado_detalle_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(estimado_detalle_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajetotal").text(estimado_detalle_control.strMensajetotal);		
		jQuery("#spanstrMensajerecibido").text(estimado_detalle_control.strMensajerecibido);		
		jQuery("#spanstrMensajeobservacion").text(estimado_detalle_control.strMensajeobservacion);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(estimado_detalle_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(estimado_detalle_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajecotizacion").text(estimado_detalle_control.strMensajecotizacion);		
		jQuery("#spanstrMensajemoneda").text(estimado_detalle_control.strMensajemoneda);		
	}
	
	actualizarCssBotonesMantenimiento(estimado_detalle_control) {
		jQuery("#tdbtnNuevoestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoestimado_detalle").css("display",estimado_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarestimado_detalle").css("display",estimado_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarestimado_detalle").css("display",estimado_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosestimado_detalle").css("display",estimado_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarestimado_detalle").css("visibility",estimado_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosestimadosFK(estimado_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado",estimado_detalle_control.estimadosFK);

		if(estimado_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_detalle_control.idFilaTablaActual+"_3",estimado_detalle_control.estimadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado",estimado_detalle_control.estimadosFK);

	};

	cargarCombosbodegasFK(estimado_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega",estimado_detalle_control.bodegasFK);

		if(estimado_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_detalle_control.idFilaTablaActual+"_4",estimado_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",estimado_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(estimado_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto",estimado_detalle_control.productosFK);

		if(estimado_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_detalle_control.idFilaTablaActual+"_5",estimado_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",estimado_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(estimado_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad",estimado_detalle_control.unidadsFK);

		if(estimado_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_detalle_control.idFilaTablaActual+"_6",estimado_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",estimado_detalle_control.unidadsFK);

	};

	
	
	registrarComboActionChangeCombosestimadosFK(estimado_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(estimado_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(estimado_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(estimado_detalle_control) {

	};

	
	
	setDefectoValorCombosestimadosFK(estimado_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_detalle_control.idestimadoDefaultFK>-1 && jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").val() != estimado_detalle_control.idestimadoDefaultFK) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").val(estimado_detalle_control.idestimadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val(estimado_detalle_control.idestimadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(estimado_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != estimado_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").val(estimado_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(estimado_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(estimado_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").val() != estimado_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").val(estimado_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(estimado_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(estimado_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != estimado_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").val(estimado_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(estimado_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("estimado_detalle","estimados","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("estimado_detalle","estimados","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//estimado_detalle_control
		
	

		var cantidad="form"+estimado_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("estimado_detalle","estimados","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

		var precio="form"+estimado_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("estimado_detalle","estimados","","precio",precio,"","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

		var descuento_porciento="form"+estimado_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("estimado_detalle","estimados","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

		var iva_porciento="form"+estimado_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("estimado_detalle","estimados","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(estimado_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.setDefectoValorCombosestimadosFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.setDefectoValorCombosbodegasFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.setDefectoValorCombosproductosFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.setDefectoValorCombosunidadsFK(estimado_detalle_control);
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
	onLoadCombosEventosFK(estimado_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",estimado_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_detalle_webcontrol1.registrarComboActionChangeCombosestimadosFK(estimado_detalle_control);
			//}

			//if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",estimado_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(estimado_detalle_control);
			//}

			//if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",estimado_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(estimado_detalle_control);
			//}

			//if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",estimado_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(estimado_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(estimado_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(estimado_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				estimado_detalle_funcion1.validarFormularioJQuery(estimado_detalle_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("estimado_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("estimado_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(estimado_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,"estimado_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estimado","id_estimado","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado_img_busqueda").click(function(){
				estimado_detalle_webcontrol1.abrirBusquedaParaestimado("id_estimado");
				//alert(jQuery('#form-id_estimado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				estimado_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				estimado_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				estimado_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(estimado_detalle_control) {
		
		
		
		if(estimado_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdestimado_detalleActualizarToolBar").css("display",estimado_detalle_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdestimado_detalleEliminarToolBar").css("display",estimado_detalle_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trestimado_detalleElementos").css("display",estimado_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trestimado_detalleAcciones").css("display",estimado_detalle_control.strVisibleTablaAcciones);
		jQuery("#trestimado_detalleParametrosAcciones").css("display",estimado_detalle_control.strVisibleTablaAcciones);
		
		jQuery("#tdestimado_detalleCerrarPagina").css("display",estimado_detalle_control.strPermisoPopup);		
		jQuery("#tdestimado_detalleCerrarPaginaToolBar").css("display",estimado_detalle_control.strPermisoPopup);
		//jQuery("#trestimado_detalleAccionesRelaciones").css("display",estimado_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=estimado_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + estimado_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + estimado_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Estimado Detalles";
		sTituloBanner+=" - " + estimado_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + estimado_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdestimado_detalleRelacionesToolBar").css("display",estimado_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosestimado_detalle").css("display",estimado_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		estimado_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		estimado_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		estimado_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		estimado_detalle_webcontrol1.registrarEventosControles();
		
		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(estimado_detalle_constante1.STR_ES_RELACIONADO=="false") {
			estimado_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(estimado_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(estimado_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				estimado_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(estimado_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(estimado_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(estimado_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(estimado_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
						//estimado_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(estimado_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(estimado_detalle_constante1.BIG_ID_ACTUAL,"estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
						//estimado_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			estimado_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);	
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

var estimado_detalle_webcontrol1 = new estimado_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {estimado_detalle_webcontrol,estimado_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.estimado_detalle_webcontrol1 = estimado_detalle_webcontrol1;


if(estimado_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = estimado_detalle_webcontrol1.onLoadWindow; 
}

//</script>