//<script type="text/javascript" language="javascript">



//var forma_pago_proveedorJQueryPaginaWebInteraccion= function (forma_pago_proveedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {forma_pago_proveedor_constante,forma_pago_proveedor_constante1} from '../util/forma_pago_proveedor_constante.js';

import {forma_pago_proveedor_funcion,forma_pago_proveedor_funcion1} from '../util/forma_pago_proveedor_form_funcion.js';


class forma_pago_proveedor_webcontrol extends GeneralEntityWebControl {
	
	forma_pago_proveedor_control=null;
	forma_pago_proveedor_controlInicial=null;
	forma_pago_proveedor_controlAuxiliar=null;
		
	//if(forma_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(forma_pago_proveedor_control) {
		super();
		
		this.forma_pago_proveedor_control=forma_pago_proveedor_control;
	}
		
	actualizarVariablesPagina(forma_pago_proveedor_control) {
		
		if(forma_pago_proveedor_control.action=="index" || forma_pago_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(forma_pago_proveedor_control);
			
		} 
		
		
		
	
		else if(forma_pago_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(forma_pago_proveedor_control);	
		
		} else if(forma_pago_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(forma_pago_proveedor_control);		
		}
	
		else if(forma_pago_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(forma_pago_proveedor_control);		
		}
	
		else if(forma_pago_proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(forma_pago_proveedor_control);
		}
		
		
		else if(forma_pago_proveedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(forma_pago_proveedor_control);		
		
		} else if(forma_pago_proveedor_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(forma_pago_proveedor_control);		
		
		} 
		//else if(forma_pago_proveedor_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(forma_pago_proveedor_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + forma_pago_proveedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(forma_pago_proveedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(forma_pago_proveedor_control) {
		this.actualizarPaginaAccionesGenerales(forma_pago_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(forma_pago_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(forma_pago_proveedor_control);
		this.actualizarPaginaOrderBy(forma_pago_proveedor_control);
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(forma_pago_proveedor_control);
		//this.actualizarPaginaFormulario(forma_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(forma_pago_proveedor_control);
		this.actualizarPaginaAreaBusquedas(forma_pago_proveedor_control);
		this.actualizarPaginaCargaCombosFK(forma_pago_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(forma_pago_proveedor_control) {
		//this.actualizarPaginaFormulario(forma_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(forma_pago_proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(forma_pago_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(forma_pago_proveedor_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(forma_pago_proveedor_control);		
		this.actualizarPaginaFormulario(forma_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(forma_pago_proveedor_control);		
		this.actualizarPaginaFormulario(forma_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(forma_pago_proveedor_control);		
		this.actualizarPaginaFormulario(forma_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(forma_pago_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(forma_pago_proveedor_control);
		this.actualizarPaginaCargaCombosFK(forma_pago_proveedor_control);
		this.actualizarPaginaFormulario(forma_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(forma_pago_proveedor_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(forma_pago_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(forma_pago_proveedor_control);
		this.actualizarPaginaCargaCombosFK(forma_pago_proveedor_control);
		this.actualizarPaginaFormulario(forma_pago_proveedor_control);
		this.onLoadCombosDefectoFK(forma_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(forma_pago_proveedor_control) {
		//FORMULARIO
		if(forma_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(forma_pago_proveedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(forma_pago_proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		
		//COMBOS FK
		if(forma_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(forma_pago_proveedor_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(forma_pago_proveedor_control) {
		//FORMULARIO
		if(forma_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(forma_pago_proveedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(forma_pago_proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);	
		
		//COMBOS FK
		if(forma_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(forma_pago_proveedor_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(forma_pago_proveedor_control) {
		//FORMULARIO
		if(forma_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(forma_pago_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);	
		//COMBOS FK
		if(forma_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(forma_pago_proveedor_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(forma_pago_proveedor_control) {
		
		if(forma_pago_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(forma_pago_proveedor_control);
		}
		
		if(forma_pago_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(forma_pago_proveedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(forma_pago_proveedor_control) {
		if(forma_pago_proveedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("forma_pago_proveedorReturnGeneral",JSON.stringify(forma_pago_proveedor_control.forma_pago_proveedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control) {
		if(forma_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && forma_pago_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(forma_pago_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(forma_pago_proveedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(forma_pago_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			forma_pago_proveedor_funcion1.resaltarRestaurarDivsPagina(false,"forma_pago_proveedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				forma_pago_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false,"forma_pago_proveedor");
			}			
			
			forma_pago_proveedor_funcion1.mostrarDivMensaje(true,forma_pago_proveedor_control.strAuxiliarMensaje,forma_pago_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			forma_pago_proveedor_funcion1.mostrarDivMensaje(false,forma_pago_proveedor_control.strAuxiliarMensaje,forma_pago_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(forma_pago_proveedor_control) {
		if(forma_pago_proveedor_funcion1.esPaginaForm(forma_pago_proveedor_constante1)==true) {
			window.opener.forma_pago_proveedor_webcontrol1.actualizarPaginaTablaDatos(forma_pago_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(forma_pago_proveedor_control) {
		forma_pago_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(forma_pago_proveedor_control.strAuxiliarUrlPagina);
				
		forma_pago_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(forma_pago_proveedor_control.strAuxiliarTipo,forma_pago_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(forma_pago_proveedor_control) {
		forma_pago_proveedor_funcion1.resaltarRestaurarDivMensaje(true,forma_pago_proveedor_control.strAuxiliarMensajeAlert,forma_pago_proveedor_control.strAuxiliarCssMensaje);
			
		if(forma_pago_proveedor_funcion1.esPaginaForm(forma_pago_proveedor_constante1)==true) {
			window.opener.forma_pago_proveedor_funcion1.resaltarRestaurarDivMensaje(true,forma_pago_proveedor_control.strAuxiliarMensajeAlert,forma_pago_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(forma_pago_proveedor_control) {
		this.forma_pago_proveedor_controlInicial=forma_pago_proveedor_control;
			
		if(forma_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(forma_pago_proveedor_control.strStyleDivArbol,forma_pago_proveedor_control.strStyleDivContent
																,forma_pago_proveedor_control.strStyleDivOpcionesBanner,forma_pago_proveedor_control.strStyleDivExpandirColapsar
																,forma_pago_proveedor_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(forma_pago_proveedor_control) {
		this.actualizarCssBotonesPagina(forma_pago_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(forma_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(forma_pago_proveedor_control.tiposReportes,forma_pago_proveedor_control.tiposReporte
															 	,forma_pago_proveedor_control.tiposPaginacion,forma_pago_proveedor_control.tiposAcciones
																,forma_pago_proveedor_control.tiposColumnasSelect,forma_pago_proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(forma_pago_proveedor_control.tiposRelaciones,forma_pago_proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(forma_pago_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(forma_pago_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(forma_pago_proveedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(forma_pago_proveedor_control) {
	
		var indexPosition=forma_pago_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=forma_pago_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(forma_pago_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 
				forma_pago_proveedor_webcontrol1.cargarCombosempresasFK(forma_pago_proveedor_control);
			}

			if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 
				forma_pago_proveedor_webcontrol1.cargarCombostipo_forma_pagosFK(forma_pago_proveedor_control);
			}

			if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 
				forma_pago_proveedor_webcontrol1.cargarComboscuentasFK(forma_pago_proveedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(forma_pago_proveedor_control.strRecargarFkTiposNinguno!=null && forma_pago_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && forma_pago_proveedor_control.strRecargarFkTiposNinguno!='') {
			
				if(forma_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					forma_pago_proveedor_webcontrol1.cargarCombosempresasFK(forma_pago_proveedor_control);
				}

				if(forma_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					forma_pago_proveedor_webcontrol1.cargarCombostipo_forma_pagosFK(forma_pago_proveedor_control);
				}

				if(forma_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					forma_pago_proveedor_webcontrol1.cargarComboscuentasFK(forma_pago_proveedor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(forma_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,forma_pago_proveedor_funcion1,forma_pago_proveedor_control.empresasFK);
	}

	cargarComboEditarTablatipo_forma_pagoFK(forma_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,forma_pago_proveedor_funcion1,forma_pago_proveedor_control.tipo_forma_pagosFK);
	}

	cargarComboEditarTablacuentaFK(forma_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,forma_pago_proveedor_funcion1,forma_pago_proveedor_control.cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control) {
		jQuery("#tdforma_pago_proveedorNuevo").css("display",forma_pago_proveedor_control.strPermisoNuevo);
		jQuery("#trforma_pago_proveedorElementos").css("display",forma_pago_proveedor_control.strVisibleTablaElementos);
		jQuery("#trforma_pago_proveedorAcciones").css("display",forma_pago_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trforma_pago_proveedorParametrosAcciones").css("display",forma_pago_proveedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(forma_pago_proveedor_control) {
	
		this.actualizarCssBotonesMantenimiento(forma_pago_proveedor_control);
				
		if(forma_pago_proveedor_control.forma_pago_proveedorActual!=null) {//form
			
			this.actualizarCamposFormulario(forma_pago_proveedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(forma_pago_proveedor_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(forma_pago_proveedor_control) {
	
		jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id").val(forma_pago_proveedor_control.forma_pago_proveedorActual.id);
		jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-created_at").val(forma_pago_proveedor_control.forma_pago_proveedorActual.versionRow);
		jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-updated_at").val(forma_pago_proveedor_control.forma_pago_proveedorActual.versionRow);
		
		if(forma_pago_proveedor_control.forma_pago_proveedorActual.id_empresa!=null && forma_pago_proveedor_control.forma_pago_proveedorActual.id_empresa>-1){
			if(jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != forma_pago_proveedor_control.forma_pago_proveedorActual.id_empresa) {
				jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val(forma_pago_proveedor_control.forma_pago_proveedorActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(forma_pago_proveedor_control.forma_pago_proveedorActual.id_tipo_forma_pago!=null && forma_pago_proveedor_control.forma_pago_proveedorActual.id_tipo_forma_pago>-1){
			if(jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val() != forma_pago_proveedor_control.forma_pago_proveedorActual.id_tipo_forma_pago) {
				jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val(forma_pago_proveedor_control.forma_pago_proveedorActual.id_tipo_forma_pago).trigger("change");
			}
		} else { 
			//jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_forma_pago").select2("val", null);
			if(jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-codigo").val(forma_pago_proveedor_control.forma_pago_proveedorActual.codigo);
		jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-nombre").val(forma_pago_proveedor_control.forma_pago_proveedorActual.nombre);
		jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-predeterminado").prop('checked',forma_pago_proveedor_control.forma_pago_proveedorActual.predeterminado);
		
		if(forma_pago_proveedor_control.forma_pago_proveedorActual.id_cuenta!=null && forma_pago_proveedor_control.forma_pago_proveedorActual.id_cuenta>-1){
			if(jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != forma_pago_proveedor_control.forma_pago_proveedorActual.id_cuenta) {
				jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(forma_pago_proveedor_control.forma_pago_proveedorActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-cuenta_contable").val(forma_pago_proveedor_control.forma_pago_proveedorActual.cuenta_contable);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+forma_pago_proveedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("forma_pago_proveedor","cuentaspagar","","form_forma_pago_proveedor",formulario,"","",paraEventoTabla,idFilaTabla,forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
	}
	
	actualizarSpanMensajesCampos(forma_pago_proveedor_control) {
		jQuery("#spanstrMensajeid").text(forma_pago_proveedor_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(forma_pago_proveedor_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(forma_pago_proveedor_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(forma_pago_proveedor_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_tipo_forma_pago").text(forma_pago_proveedor_control.strMensajeid_tipo_forma_pago);		
		jQuery("#spanstrMensajecodigo").text(forma_pago_proveedor_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(forma_pago_proveedor_control.strMensajenombre);		
		jQuery("#spanstrMensajepredeterminado").text(forma_pago_proveedor_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta").text(forma_pago_proveedor_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajecuenta_contable").text(forma_pago_proveedor_control.strMensajecuenta_contable);		
	}
	
	actualizarCssBotonesMantenimiento(forma_pago_proveedor_control) {
		jQuery("#tdbtnNuevoforma_pago_proveedor").css("visibility",forma_pago_proveedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoforma_pago_proveedor").css("display",forma_pago_proveedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarforma_pago_proveedor").css("visibility",forma_pago_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarforma_pago_proveedor").css("display",forma_pago_proveedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarforma_pago_proveedor").css("visibility",forma_pago_proveedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarforma_pago_proveedor").css("display",forma_pago_proveedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarforma_pago_proveedor").css("visibility",forma_pago_proveedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosforma_pago_proveedor").css("visibility",forma_pago_proveedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosforma_pago_proveedor").css("display",forma_pago_proveedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarforma_pago_proveedor").css("visibility",forma_pago_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarforma_pago_proveedor").css("visibility",forma_pago_proveedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarforma_pago_proveedor").css("visibility",forma_pago_proveedor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(forma_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa",forma_pago_proveedor_control.empresasFK);

		if(forma_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+forma_pago_proveedor_control.idFilaTablaActual+"_3",forma_pago_proveedor_control.empresasFK);
		}
	};

	cargarCombostipo_forma_pagosFK(forma_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_forma_pago",forma_pago_proveedor_control.tipo_forma_pagosFK);

		if(forma_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+forma_pago_proveedor_control.idFilaTablaActual+"_4",forma_pago_proveedor_control.tipo_forma_pagosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago",forma_pago_proveedor_control.tipo_forma_pagosFK);

	};

	cargarComboscuentasFK(forma_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta",forma_pago_proveedor_control.cuentasFK);

		if(forma_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+forma_pago_proveedor_control.idFilaTablaActual+"_8",forma_pago_proveedor_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",forma_pago_proveedor_control.cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(forma_pago_proveedor_control) {

	};

	registrarComboActionChangeCombostipo_forma_pagosFK(forma_pago_proveedor_control) {

	};

	registrarComboActionChangeComboscuentasFK(forma_pago_proveedor_control) {

	};

	
	
	setDefectoValorCombosempresasFK(forma_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(forma_pago_proveedor_control.idempresaDefaultFK>-1 && jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != forma_pago_proveedor_control.idempresaDefaultFK) {
				jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val(forma_pago_proveedor_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_forma_pagosFK(forma_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(forma_pago_proveedor_control.idtipo_forma_pagoDefaultFK>-1 && jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val() != forma_pago_proveedor_control.idtipo_forma_pagoDefaultFK) {
				jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val(forma_pago_proveedor_control.idtipo_forma_pagoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago").val(forma_pago_proveedor_control.idtipo_forma_pagoDefaultForeignKey).trigger("change");
			if(jQuery("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(forma_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(forma_pago_proveedor_control.idcuentaDefaultFK>-1 && jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != forma_pago_proveedor_control.idcuentaDefaultFK) {
				jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(forma_pago_proveedor_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(forma_pago_proveedor_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//forma_pago_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(forma_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(forma_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 
				forma_pago_proveedor_webcontrol1.setDefectoValorCombosempresasFK(forma_pago_proveedor_control);
			}

			if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 
				forma_pago_proveedor_webcontrol1.setDefectoValorCombostipo_forma_pagosFK(forma_pago_proveedor_control);
			}

			if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 
				forma_pago_proveedor_webcontrol1.setDefectoValorComboscuentasFK(forma_pago_proveedor_control);
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
	onLoadCombosEventosFK(forma_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(forma_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				forma_pago_proveedor_webcontrol1.registrarComboActionChangeCombosempresasFK(forma_pago_proveedor_control);
			//}

			//if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				forma_pago_proveedor_webcontrol1.registrarComboActionChangeCombostipo_forma_pagosFK(forma_pago_proveedor_control);
			//}

			//if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				forma_pago_proveedor_webcontrol1.registrarComboActionChangeComboscuentasFK(forma_pago_proveedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(forma_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(forma_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(forma_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(forma_pago_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				forma_pago_proveedor_funcion1.validarFormularioJQuery(forma_pago_proveedor_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("forma_pago_proveedor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("forma_pago_proveedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(forma_pago_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,"forma_pago_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				forma_pago_proveedor_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_forma_pago","id_tipo_forma_pago","general","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_forma_pago_img_busqueda").click(function(){
				forma_pago_proveedor_webcontrol1.abrirBusquedaParatipo_forma_pago("id_tipo_forma_pago");
				//alert(jQuery('#form-id_tipo_forma_pago_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				forma_pago_proveedor_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("forma_pago_proveedor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(forma_pago_proveedor_control) {
		
		
		
		if(forma_pago_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdforma_pago_proveedorActualizarToolBar").css("display",forma_pago_proveedor_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdforma_pago_proveedorEliminarToolBar").css("display",forma_pago_proveedor_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trforma_pago_proveedorElementos").css("display",forma_pago_proveedor_control.strVisibleTablaElementos);
		
		jQuery("#trforma_pago_proveedorAcciones").css("display",forma_pago_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trforma_pago_proveedorParametrosAcciones").css("display",forma_pago_proveedor_control.strVisibleTablaAcciones);
		
		jQuery("#tdforma_pago_proveedorCerrarPagina").css("display",forma_pago_proveedor_control.strPermisoPopup);		
		jQuery("#tdforma_pago_proveedorCerrarPaginaToolBar").css("display",forma_pago_proveedor_control.strPermisoPopup);
		//jQuery("#trforma_pago_proveedorAccionesRelaciones").css("display",forma_pago_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=forma_pago_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + forma_pago_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + forma_pago_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Forma Pago Proveedores";
		sTituloBanner+=" - " + forma_pago_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + forma_pago_proveedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdforma_pago_proveedorRelacionesToolBar").css("display",forma_pago_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosforma_pago_proveedor").css("display",forma_pago_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		forma_pago_proveedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		forma_pago_proveedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		forma_pago_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		forma_pago_proveedor_webcontrol1.registrarEventosControles();
		
		if(forma_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(forma_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			forma_pago_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(forma_pago_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(forma_pago_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				forma_pago_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(forma_pago_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(forma_pago_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(forma_pago_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(forma_pago_proveedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
						//forma_pago_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(forma_pago_proveedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(forma_pago_proveedor_constante1.BIG_ID_ACTUAL,"forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
						//forma_pago_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			forma_pago_proveedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);	
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

var forma_pago_proveedor_webcontrol1 = new forma_pago_proveedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {forma_pago_proveedor_webcontrol,forma_pago_proveedor_webcontrol1};

//Para ser llamado desde window.opener
window.forma_pago_proveedor_webcontrol1 = forma_pago_proveedor_webcontrol1;


if(forma_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = forma_pago_proveedor_webcontrol1.onLoadWindow; 
}

//</script>