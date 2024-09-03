//<script type="text/javascript" language="javascript">



//var asiento_automatico_detalleJQueryPaginaWebInteraccion= function (asiento_automatico_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {asiento_automatico_detalle_constante,asiento_automatico_detalle_constante1} from '../util/asiento_automatico_detalle_constante.js';

import {asiento_automatico_detalle_funcion,asiento_automatico_detalle_funcion1} from '../util/asiento_automatico_detalle_form_funcion.js';


class asiento_automatico_detalle_webcontrol extends GeneralEntityWebControl {
	
	asiento_automatico_detalle_control=null;
	asiento_automatico_detalle_controlInicial=null;
	asiento_automatico_detalle_controlAuxiliar=null;
		
	//if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(asiento_automatico_detalle_control) {
		super();
		
		this.asiento_automatico_detalle_control=asiento_automatico_detalle_control;
	}
		
	actualizarVariablesPagina(asiento_automatico_detalle_control) {
		
		if(asiento_automatico_detalle_control.action=="index" || asiento_automatico_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(asiento_automatico_detalle_control);
			
		} 
		
		
		
	
		else if(asiento_automatico_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(asiento_automatico_detalle_control);	
		
		} else if(asiento_automatico_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_automatico_detalle_control);		
		}
	
	
		
		
		else if(asiento_automatico_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(asiento_automatico_detalle_control);		
		
		} else if(asiento_automatico_detalle_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_automatico_detalle_control);		
		
		} 
		//else if(asiento_automatico_detalle_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_automatico_detalle_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + asiento_automatico_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(asiento_automatico_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(asiento_automatico_detalle_control) {
		this.actualizarPaginaAccionesGenerales(asiento_automatico_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(asiento_automatico_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_automatico_detalle_control);
		this.actualizarPaginaOrderBy(asiento_automatico_detalle_control);
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_detalle_control);
		//this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_detalle_control);
		this.actualizarPaginaAreaBusquedas(asiento_automatico_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(asiento_automatico_detalle_control) {
		//this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_automatico_detalle_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_automatico_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(asiento_automatico_detalle_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_automatico_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);
		this.actualizarPaginaFormulario(asiento_automatico_detalle_control);
		this.onLoadCombosDefectoFK(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_automatico_detalle_control) {
		//FORMULARIO
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_automatico_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(asiento_automatico_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		
		//COMBOS FK
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_automatico_detalle_control) {
		//FORMULARIO
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_automatico_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(asiento_automatico_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);	
		
		//COMBOS FK
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(asiento_automatico_detalle_control) {
		//FORMULARIO
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_automatico_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);	
		//COMBOS FK
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(asiento_automatico_detalle_control) {
		
		if(asiento_automatico_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(asiento_automatico_detalle_control);
		}
		
		if(asiento_automatico_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(asiento_automatico_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(asiento_automatico_detalle_control) {
		if(asiento_automatico_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("asiento_automatico_detalleReturnGeneral",JSON.stringify(asiento_automatico_detalle_control.asiento_automatico_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control) {
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_automatico_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(asiento_automatico_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(asiento_automatico_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(asiento_automatico_detalle_control, mostrar) {
		
		if(mostrar==true) {
			asiento_automatico_detalle_funcion1.resaltarRestaurarDivsPagina(false,"asiento_automatico_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				asiento_automatico_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"asiento_automatico_detalle");
			}			
			
			asiento_automatico_detalle_funcion1.mostrarDivMensaje(true,asiento_automatico_detalle_control.strAuxiliarMensaje,asiento_automatico_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			asiento_automatico_detalle_funcion1.mostrarDivMensaje(false,asiento_automatico_detalle_control.strAuxiliarMensaje,asiento_automatico_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(asiento_automatico_detalle_control) {
		if(asiento_automatico_detalle_funcion1.esPaginaForm(asiento_automatico_detalle_constante1)==true) {
			window.opener.asiento_automatico_detalle_webcontrol1.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(asiento_automatico_detalle_control) {
		asiento_automatico_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(asiento_automatico_detalle_control.strAuxiliarUrlPagina);
				
		asiento_automatico_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(asiento_automatico_detalle_control.strAuxiliarTipo,asiento_automatico_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(asiento_automatico_detalle_control) {
		asiento_automatico_detalle_funcion1.resaltarRestaurarDivMensaje(true,asiento_automatico_detalle_control.strAuxiliarMensajeAlert,asiento_automatico_detalle_control.strAuxiliarCssMensaje);
			
		if(asiento_automatico_detalle_funcion1.esPaginaForm(asiento_automatico_detalle_constante1)==true) {
			window.opener.asiento_automatico_detalle_funcion1.resaltarRestaurarDivMensaje(true,asiento_automatico_detalle_control.strAuxiliarMensajeAlert,asiento_automatico_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(asiento_automatico_detalle_control) {
		this.asiento_automatico_detalle_controlInicial=asiento_automatico_detalle_control;
			
		if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(asiento_automatico_detalle_control.strStyleDivArbol,asiento_automatico_detalle_control.strStyleDivContent
																,asiento_automatico_detalle_control.strStyleDivOpcionesBanner,asiento_automatico_detalle_control.strStyleDivExpandirColapsar
																,asiento_automatico_detalle_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(asiento_automatico_detalle_control) {
		this.actualizarCssBotonesPagina(asiento_automatico_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(asiento_automatico_detalle_control.tiposReportes,asiento_automatico_detalle_control.tiposReporte
															 	,asiento_automatico_detalle_control.tiposPaginacion,asiento_automatico_detalle_control.tiposAcciones
																,asiento_automatico_detalle_control.tiposColumnasSelect,asiento_automatico_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(asiento_automatico_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(asiento_automatico_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(asiento_automatico_detalle_control) {
	
		var indexPosition=asiento_automatico_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=asiento_automatico_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(asiento_automatico_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.cargarCombosempresasFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_automatico",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.cargarCombosasiento_automaticosFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.cargarComboscuentasFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.cargarComboscentro_costosFK(asiento_automatico_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!=null && asiento_automatico_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && asiento_automatico_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_detalle_webcontrol1.cargarCombosempresasFK(asiento_automatico_detalle_control);
				}

				if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento_automatico",asiento_automatico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_detalle_webcontrol1.cargarCombosasiento_automaticosFK(asiento_automatico_detalle_control);
				}

				if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",asiento_automatico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_detalle_webcontrol1.cargarComboscuentasFK(asiento_automatico_detalle_control);
				}

				if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_detalle_webcontrol1.cargarComboscentro_costosFK(asiento_automatico_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(asiento_automatico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_detalle_funcion1,asiento_automatico_detalle_control.empresasFK);
	}

	cargarComboEditarTablaasiento_automaticoFK(asiento_automatico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_detalle_funcion1,asiento_automatico_detalle_control.asiento_automaticosFK);
	}

	cargarComboEditarTablacuentaFK(asiento_automatico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_detalle_funcion1,asiento_automatico_detalle_control.cuentasFK);
	}

	cargarComboEditarTablacentro_costoFK(asiento_automatico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_detalle_funcion1,asiento_automatico_detalle_control.centro_costosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control) {
		jQuery("#tdasiento_automatico_detalleNuevo").css("display",asiento_automatico_detalle_control.strPermisoNuevo);
		jQuery("#trasiento_automatico_detalleElementos").css("display",asiento_automatico_detalle_control.strVisibleTablaElementos);
		jQuery("#trasiento_automatico_detalleAcciones").css("display",asiento_automatico_detalle_control.strVisibleTablaAcciones);
		jQuery("#trasiento_automatico_detalleParametrosAcciones").css("display",asiento_automatico_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(asiento_automatico_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(asiento_automatico_detalle_control);
				
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(asiento_automatico_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(asiento_automatico_detalle_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(asiento_automatico_detalle_control) {
	
		jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id);
		jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-created_at").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.versionRow);
		jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-updated_at").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.versionRow);
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa>-1){
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico>-1){
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").select2("val", null);
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta>-1){
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").select2("val", null);
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo>-1){
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").select2("val", null);
			if(jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-es_credito").prop('checked',asiento_automatico_detalle_control.asiento_automatico_detalleActual.es_credito);
		jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-cuenta_contable").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.cuenta_contable);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+asiento_automatico_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("asiento_automatico_detalle","contabilidad","","form_asiento_automatico_detalle",formulario,"","",paraEventoTabla,idFilaTabla,asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
	}
	
	actualizarSpanMensajesCampos(asiento_automatico_detalle_control) {
		jQuery("#spanstrMensajeid").text(asiento_automatico_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(asiento_automatico_detalle_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(asiento_automatico_detalle_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(asiento_automatico_detalle_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_asiento_automatico").text(asiento_automatico_detalle_control.strMensajeid_asiento_automatico);		
		jQuery("#spanstrMensajeid_cuenta").text(asiento_automatico_detalle_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajeid_centro_costo").text(asiento_automatico_detalle_control.strMensajeid_centro_costo);		
		jQuery("#spanstrMensajees_credito").text(asiento_automatico_detalle_control.strMensajees_credito);		
		jQuery("#spanstrMensajecuenta_contable").text(asiento_automatico_detalle_control.strMensajecuenta_contable);		
	}
	
	actualizarCssBotonesMantenimiento(asiento_automatico_detalle_control) {
		jQuery("#tdbtnNuevoasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoasiento_automatico_detalle").css("display",asiento_automatico_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarasiento_automatico_detalle").css("display",asiento_automatico_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarasiento_automatico_detalle").css("display",asiento_automatico_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosasiento_automatico_detalle").css("display",asiento_automatico_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarasiento_automatico_detalle").css("visibility",asiento_automatico_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(asiento_automatico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa",asiento_automatico_detalle_control.empresasFK);

		if(asiento_automatico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_detalle_control.idFilaTablaActual+"_3",asiento_automatico_detalle_control.empresasFK);
		}
	};

	cargarCombosasiento_automaticosFK(asiento_automatico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico",asiento_automatico_detalle_control.asiento_automaticosFK);

		if(asiento_automatico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_detalle_control.idFilaTablaActual+"_4",asiento_automatico_detalle_control.asiento_automaticosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico-cmbid_asiento_automatico",asiento_automatico_detalle_control.asiento_automaticosFK);

	};

	cargarComboscuentasFK(asiento_automatico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta",asiento_automatico_detalle_control.cuentasFK);

		if(asiento_automatico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_detalle_control.idFilaTablaActual+"_5",asiento_automatico_detalle_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",asiento_automatico_detalle_control.cuentasFK);

	};

	cargarComboscentro_costosFK(asiento_automatico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo",asiento_automatico_detalle_control.centro_costosFK);

		if(asiento_automatico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_detalle_control.idFilaTablaActual+"_6",asiento_automatico_detalle_control.centro_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo",asiento_automatico_detalle_control.centro_costosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(asiento_automatico_detalle_control) {

	};

	registrarComboActionChangeCombosasiento_automaticosFK(asiento_automatico_detalle_control) {

	};

	registrarComboActionChangeComboscuentasFK(asiento_automatico_detalle_control) {

	};

	registrarComboActionChangeComboscentro_costosFK(asiento_automatico_detalle_control) {

	};

	
	
	setDefectoValorCombosempresasFK(asiento_automatico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_detalle_control.idempresaDefaultFK>-1 && jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_automatico_detalle_control.idempresaDefaultFK) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").val(asiento_automatico_detalle_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosasiento_automaticosFK(asiento_automatico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_detalle_control.idasiento_automaticoDefaultFK>-1 && jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").val() != asiento_automatico_detalle_control.idasiento_automaticoDefaultFK) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").val(asiento_automatico_detalle_control.idasiento_automaticoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico-cmbid_asiento_automatico").val(asiento_automatico_detalle_control.idasiento_automaticoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico-cmbid_asiento_automatico").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico-cmbid_asiento_automatico").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(asiento_automatico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_detalle_control.idcuentaDefaultFK>-1 && jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != asiento_automatico_detalle_control.idcuentaDefaultFK) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(asiento_automatico_detalle_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(asiento_automatico_detalle_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscentro_costosFK(asiento_automatico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_detalle_control.idcentro_costoDefaultFK>-1 && jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_automatico_detalle_control.idcentro_costoDefaultFK) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_automatico_detalle_control.idcentro_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(asiento_automatico_detalle_control.idcentro_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//asiento_automatico_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(asiento_automatico_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.setDefectoValorCombosempresasFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_automatico",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.setDefectoValorCombosasiento_automaticosFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.setDefectoValorComboscuentasFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.setDefectoValorComboscentro_costosFK(asiento_automatico_detalle_control);
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
	onLoadCombosEventosFK(asiento_automatico_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_detalle_webcontrol1.registrarComboActionChangeCombosempresasFK(asiento_automatico_detalle_control);
			//}

			//if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_automatico",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_detalle_webcontrol1.registrarComboActionChangeCombosasiento_automaticosFK(asiento_automatico_detalle_control);
			//}

			//if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_detalle_webcontrol1.registrarComboActionChangeComboscuentasFK(asiento_automatico_detalle_control);
			//}

			//if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_detalle_webcontrol1.registrarComboActionChangeComboscentro_costosFK(asiento_automatico_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(asiento_automatico_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(asiento_automatico_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_automatico_detalle_funcion1.validarFormularioJQuery(asiento_automatico_detalle_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("asiento_automatico_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("asiento_automatico_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,"asiento_automatico_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				asiento_automatico_detalle_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento_automatico","id_asiento_automatico","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico_img_busqueda").click(function(){
				asiento_automatico_detalle_webcontrol1.abrirBusquedaParaasiento_automatico("id_asiento_automatico");
				//alert(jQuery('#form-id_asiento_automatico_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				asiento_automatico_detalle_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("centro_costo","id_centro_costo","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo_img_busqueda").click(function(){
				asiento_automatico_detalle_webcontrol1.abrirBusquedaParacentro_costo("id_centro_costo");
				//alert(jQuery('#form-id_centro_costo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(asiento_automatico_detalle_control) {
		
		
		
		if(asiento_automatico_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdasiento_automatico_detalleActualizarToolBar").css("display",asiento_automatico_detalle_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdasiento_automatico_detalleEliminarToolBar").css("display",asiento_automatico_detalle_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trasiento_automatico_detalleElementos").css("display",asiento_automatico_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trasiento_automatico_detalleAcciones").css("display",asiento_automatico_detalle_control.strVisibleTablaAcciones);
		jQuery("#trasiento_automatico_detalleParametrosAcciones").css("display",asiento_automatico_detalle_control.strVisibleTablaAcciones);
		
		jQuery("#tdasiento_automatico_detalleCerrarPagina").css("display",asiento_automatico_detalle_control.strPermisoPopup);		
		jQuery("#tdasiento_automatico_detalleCerrarPaginaToolBar").css("display",asiento_automatico_detalle_control.strPermisoPopup);
		//jQuery("#trasiento_automatico_detalleAccionesRelaciones").css("display",asiento_automatico_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=asiento_automatico_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_automatico_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + asiento_automatico_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Detalle Asiento Automaticos";
		sTituloBanner+=" - " + asiento_automatico_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_automatico_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdasiento_automatico_detalleRelacionesToolBar").css("display",asiento_automatico_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosasiento_automatico_detalle").css("display",asiento_automatico_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		asiento_automatico_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		asiento_automatico_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		asiento_automatico_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		asiento_automatico_detalle_webcontrol1.registrarEventosControles();
		
		if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="false") {
			asiento_automatico_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(asiento_automatico_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(asiento_automatico_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_automatico_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(asiento_automatico_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(asiento_automatico_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(asiento_automatico_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(asiento_automatico_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
						//asiento_automatico_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(asiento_automatico_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(asiento_automatico_detalle_constante1.BIG_ID_ACTUAL,"asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
						//asiento_automatico_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			asiento_automatico_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);	
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

var asiento_automatico_detalle_webcontrol1 = new asiento_automatico_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {asiento_automatico_detalle_webcontrol,asiento_automatico_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.asiento_automatico_detalle_webcontrol1 = asiento_automatico_detalle_webcontrol1;


if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = asiento_automatico_detalle_webcontrol1.onLoadWindow; 
}

//</script>