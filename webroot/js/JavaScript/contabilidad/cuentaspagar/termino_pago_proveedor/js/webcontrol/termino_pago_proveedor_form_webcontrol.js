//<script type="text/javascript" language="javascript">



//var termino_pago_proveedorJQueryPaginaWebInteraccion= function (termino_pago_proveedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {termino_pago_proveedor_constante,termino_pago_proveedor_constante1} from '../util/termino_pago_proveedor_constante.js';

import {termino_pago_proveedor_funcion,termino_pago_proveedor_funcion1} from '../util/termino_pago_proveedor_form_funcion.js';


class termino_pago_proveedor_webcontrol extends GeneralEntityWebControl {
	
	termino_pago_proveedor_control=null;
	termino_pago_proveedor_controlInicial=null;
	termino_pago_proveedor_controlAuxiliar=null;
		
	//if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(termino_pago_proveedor_control) {
		super();
		
		this.termino_pago_proveedor_control=termino_pago_proveedor_control;
	}
		
	actualizarVariablesPagina(termino_pago_proveedor_control) {
		
		if(termino_pago_proveedor_control.action=="index" || termino_pago_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(termino_pago_proveedor_control);
			
		} 
		
		
		
	
		else if(termino_pago_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(termino_pago_proveedor_control);	
		
		} else if(termino_pago_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(termino_pago_proveedor_control);		
		}
	
		else if(termino_pago_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(termino_pago_proveedor_control);		
		}
	
		else if(termino_pago_proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(termino_pago_proveedor_control);
		}
		
		
		else if(termino_pago_proveedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(termino_pago_proveedor_control);		
		
		} else if(termino_pago_proveedor_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(termino_pago_proveedor_control);		
		
		} 
		//else if(termino_pago_proveedor_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(termino_pago_proveedor_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + termino_pago_proveedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(termino_pago_proveedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(termino_pago_proveedor_control) {
		this.actualizarPaginaAccionesGenerales(termino_pago_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(termino_pago_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(termino_pago_proveedor_control);
		this.actualizarPaginaOrderBy(termino_pago_proveedor_control);
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(termino_pago_proveedor_control);
		//this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(termino_pago_proveedor_control);
		this.actualizarPaginaAreaBusquedas(termino_pago_proveedor_control);
		this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(termino_pago_proveedor_control) {
		//this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(termino_pago_proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(termino_pago_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(termino_pago_proveedor_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(termino_pago_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(termino_pago_proveedor_control);
		this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(termino_pago_proveedor_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(termino_pago_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(termino_pago_proveedor_control);
		this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);
		this.onLoadCombosDefectoFK(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(termino_pago_proveedor_control) {
		//FORMULARIO
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(termino_pago_proveedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(termino_pago_proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		
		//COMBOS FK
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(termino_pago_proveedor_control) {
		//FORMULARIO
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(termino_pago_proveedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(termino_pago_proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);	
		
		//COMBOS FK
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(termino_pago_proveedor_control) {
		//FORMULARIO
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(termino_pago_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);	
		//COMBOS FK
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(termino_pago_proveedor_control) {
		
		if(termino_pago_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(termino_pago_proveedor_control);
		}
		
		if(termino_pago_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(termino_pago_proveedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(termino_pago_proveedor_control) {
		if(termino_pago_proveedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("termino_pago_proveedorReturnGeneral",JSON.stringify(termino_pago_proveedor_control.termino_pago_proveedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control) {
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && termino_pago_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(termino_pago_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(termino_pago_proveedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(termino_pago_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			termino_pago_proveedor_funcion1.resaltarRestaurarDivsPagina(false,"termino_pago_proveedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				termino_pago_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false,"termino_pago_proveedor");
			}			
			
			termino_pago_proveedor_funcion1.mostrarDivMensaje(true,termino_pago_proveedor_control.strAuxiliarMensaje,termino_pago_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			termino_pago_proveedor_funcion1.mostrarDivMensaje(false,termino_pago_proveedor_control.strAuxiliarMensaje,termino_pago_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(termino_pago_proveedor_control) {
		if(termino_pago_proveedor_funcion1.esPaginaForm(termino_pago_proveedor_constante1)==true) {
			window.opener.termino_pago_proveedor_webcontrol1.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(termino_pago_proveedor_control) {
		termino_pago_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(termino_pago_proveedor_control.strAuxiliarUrlPagina);
				
		termino_pago_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(termino_pago_proveedor_control.strAuxiliarTipo,termino_pago_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(termino_pago_proveedor_control) {
		termino_pago_proveedor_funcion1.resaltarRestaurarDivMensaje(true,termino_pago_proveedor_control.strAuxiliarMensajeAlert,termino_pago_proveedor_control.strAuxiliarCssMensaje);
			
		if(termino_pago_proveedor_funcion1.esPaginaForm(termino_pago_proveedor_constante1)==true) {
			window.opener.termino_pago_proveedor_funcion1.resaltarRestaurarDivMensaje(true,termino_pago_proveedor_control.strAuxiliarMensajeAlert,termino_pago_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(termino_pago_proveedor_control) {
		this.termino_pago_proveedor_controlInicial=termino_pago_proveedor_control;
			
		if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(termino_pago_proveedor_control.strStyleDivArbol,termino_pago_proveedor_control.strStyleDivContent
																,termino_pago_proveedor_control.strStyleDivOpcionesBanner,termino_pago_proveedor_control.strStyleDivExpandirColapsar
																,termino_pago_proveedor_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(termino_pago_proveedor_control) {
		this.actualizarCssBotonesPagina(termino_pago_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(termino_pago_proveedor_control.tiposReportes,termino_pago_proveedor_control.tiposReporte
															 	,termino_pago_proveedor_control.tiposPaginacion,termino_pago_proveedor_control.tiposAcciones
																,termino_pago_proveedor_control.tiposColumnasSelect,termino_pago_proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(termino_pago_proveedor_control.tiposRelaciones,termino_pago_proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(termino_pago_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(termino_pago_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(termino_pago_proveedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(termino_pago_proveedor_control) {
	
		var indexPosition=termino_pago_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=termino_pago_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(termino_pago_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.cargarCombosempresasFK(termino_pago_proveedor_control);
			}

			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.cargarCombostipo_termino_pagosFK(termino_pago_proveedor_control);
			}

			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.cargarComboscuentasFK(termino_pago_proveedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(termino_pago_proveedor_control.strRecargarFkTiposNinguno!=null && termino_pago_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && termino_pago_proveedor_control.strRecargarFkTiposNinguno!='') {
			
				if(termino_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					termino_pago_proveedor_webcontrol1.cargarCombosempresasFK(termino_pago_proveedor_control);
				}

				if(termino_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					termino_pago_proveedor_webcontrol1.cargarCombostipo_termino_pagosFK(termino_pago_proveedor_control);
				}

				if(termino_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					termino_pago_proveedor_webcontrol1.cargarComboscuentasFK(termino_pago_proveedor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_tipo_termino_pago") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.termino_pago_proveedorActual.NONE!=null){
					if(jQuery("#form-NONE").val() != objetoController.termino_pago_proveedorActual.NONE) {
						jQuery("#form-NONE").val(objetoController.termino_pago_proveedorActual.NONE).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(termino_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,termino_pago_proveedor_funcion1,termino_pago_proveedor_control.empresasFK);
	}

	cargarComboEditarTablatipo_termino_pagoFK(termino_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,termino_pago_proveedor_funcion1,termino_pago_proveedor_control.tipo_termino_pagosFK);
	}

	cargarComboEditarTablacuentaFK(termino_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,termino_pago_proveedor_funcion1,termino_pago_proveedor_control.cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control) {
		jQuery("#tdtermino_pago_proveedorNuevo").css("display",termino_pago_proveedor_control.strPermisoNuevo);
		jQuery("#trtermino_pago_proveedorElementos").css("display",termino_pago_proveedor_control.strVisibleTablaElementos);
		jQuery("#trtermino_pago_proveedorAcciones").css("display",termino_pago_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trtermino_pago_proveedorParametrosAcciones").css("display",termino_pago_proveedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(termino_pago_proveedor_control) {
	
		this.actualizarCssBotonesMantenimiento(termino_pago_proveedor_control);
				
		if(termino_pago_proveedor_control.termino_pago_proveedorActual!=null) {//form
			
			this.actualizarCamposFormulario(termino_pago_proveedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(termino_pago_proveedor_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(termino_pago_proveedor_control) {
	
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-created_at").val(termino_pago_proveedor_control.termino_pago_proveedorActual.versionRow);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-updated_at").val(termino_pago_proveedor_control.termino_pago_proveedorActual.versionRow);
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa!=null && termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa>-1){
			if(jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago!=null && termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago>-1){
			if(jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val() != termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago).trigger("change");
			}
		} else { 
			//jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").select2("val", null);
			if(jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-codigo").val(termino_pago_proveedor_control.termino_pago_proveedorActual.codigo);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-descripcion").val(termino_pago_proveedor_control.termino_pago_proveedorActual.descripcion);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-monto").val(termino_pago_proveedor_control.termino_pago_proveedorActual.monto);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-dias").val(termino_pago_proveedor_control.termino_pago_proveedorActual.dias);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-inicial").val(termino_pago_proveedor_control.termino_pago_proveedorActual.inicial);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-cuotas").val(termino_pago_proveedor_control.termino_pago_proveedorActual.cuotas);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-descuento_pronto_pago").val(termino_pago_proveedor_control.termino_pago_proveedorActual.descuento_pronto_pago);
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-predeterminado").prop('checked',termino_pago_proveedor_control.termino_pago_proveedorActual.predeterminado);
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta!=null && termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta>-1){
			if(jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").select2("val", null);
			if(jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-cuenta_contable").val(termino_pago_proveedor_control.termino_pago_proveedorActual.cuenta_contable);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+termino_pago_proveedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("termino_pago_proveedor","cuentaspagar","","form_termino_pago_proveedor",formulario,"","",paraEventoTabla,idFilaTabla,termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}
	
	actualizarSpanMensajesCampos(termino_pago_proveedor_control) {
		jQuery("#spanstrMensajeid").text(termino_pago_proveedor_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(termino_pago_proveedor_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(termino_pago_proveedor_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(termino_pago_proveedor_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_tipo_termino_pago").text(termino_pago_proveedor_control.strMensajeid_tipo_termino_pago);		
		jQuery("#spanstrMensajecodigo").text(termino_pago_proveedor_control.strMensajecodigo);		
		jQuery("#spanstrMensajedescripcion").text(termino_pago_proveedor_control.strMensajedescripcion);		
		jQuery("#spanstrMensajemonto").text(termino_pago_proveedor_control.strMensajemonto);		
		jQuery("#spanstrMensajedias").text(termino_pago_proveedor_control.strMensajedias);		
		jQuery("#spanstrMensajeinicial").text(termino_pago_proveedor_control.strMensajeinicial);		
		jQuery("#spanstrMensajecuotas").text(termino_pago_proveedor_control.strMensajecuotas);		
		jQuery("#spanstrMensajedescuento_pronto_pago").text(termino_pago_proveedor_control.strMensajedescuento_pronto_pago);		
		jQuery("#spanstrMensajepredeterminado").text(termino_pago_proveedor_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta").text(termino_pago_proveedor_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajecuenta_contable").text(termino_pago_proveedor_control.strMensajecuenta_contable);		
	}
	
	actualizarCssBotonesMantenimiento(termino_pago_proveedor_control) {
		jQuery("#tdbtnNuevotermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotermino_pago_proveedor").css("display",termino_pago_proveedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartermino_pago_proveedor").css("display",termino_pago_proveedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartermino_pago_proveedor").css("display",termino_pago_proveedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostermino_pago_proveedor").css("display",termino_pago_proveedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartermino_pago_proveedor").css("visibility",termino_pago_proveedor_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(termino_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa",termino_pago_proveedor_control.empresasFK);

		if(termino_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+termino_pago_proveedor_control.idFilaTablaActual+"_3",termino_pago_proveedor_control.empresasFK);
		}
	};

	cargarCombostipo_termino_pagosFK(termino_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago",termino_pago_proveedor_control.tipo_termino_pagosFK);

		if(termino_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+termino_pago_proveedor_control.idFilaTablaActual+"_4",termino_pago_proveedor_control.tipo_termino_pagosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago",termino_pago_proveedor_control.tipo_termino_pagosFK);

	};

	cargarComboscuentasFK(termino_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta",termino_pago_proveedor_control.cuentasFK);

		if(termino_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+termino_pago_proveedor_control.idFilaTablaActual+"_13",termino_pago_proveedor_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",termino_pago_proveedor_control.cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(termino_pago_proveedor_control) {

	};

	registrarComboActionChangeCombostipo_termino_pagosFK(termino_pago_proveedor_control) {
		this.registrarComboActionChangeid_tipo_termino_pago("form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago",false,0);


		this.registrarComboActionChangeid_tipo_termino_pago(""+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago",false,0);


	};

	registrarComboActionChangeComboscuentasFK(termino_pago_proveedor_control) {

	};

	
	
	setDefectoValorCombosempresasFK(termino_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(termino_pago_proveedor_control.idempresaDefaultFK>-1 && jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != termino_pago_proveedor_control.idempresaDefaultFK) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val(termino_pago_proveedor_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_termino_pagosFK(termino_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(termino_pago_proveedor_control.idtipo_termino_pagoDefaultFK>-1 && jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val() != termino_pago_proveedor_control.idtipo_termino_pagoDefaultFK) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val(termino_pago_proveedor_control.idtipo_termino_pagoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago").val(termino_pago_proveedor_control.idtipo_termino_pagoDefaultForeignKey).trigger("change");
			if(jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(termino_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(termino_pago_proveedor_control.idcuentaDefaultFK>-1 && jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != termino_pago_proveedor_control.idcuentaDefaultFK) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(termino_pago_proveedor_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(termino_pago_proveedor_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_tipo_termino_pago(id_tipo_termino_pago,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("termino_pago_proveedor","cuentaspagar","","id_tipo_termino_pago",id_tipo_termino_pago,"","",paraEventoTabla,idFilaTabla,termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	



	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//termino_pago_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(termino_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(termino_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.setDefectoValorCombosempresasFK(termino_pago_proveedor_control);
			}

			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.setDefectoValorCombostipo_termino_pagosFK(termino_pago_proveedor_control);
			}

			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.setDefectoValorComboscuentasFK(termino_pago_proveedor_control);
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
	onLoadCombosEventosFK(termino_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(termino_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				termino_pago_proveedor_webcontrol1.registrarComboActionChangeCombosempresasFK(termino_pago_proveedor_control);
			//}

			//if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				termino_pago_proveedor_webcontrol1.registrarComboActionChangeCombostipo_termino_pagosFK(termino_pago_proveedor_control);
			//}

			//if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				termino_pago_proveedor_webcontrol1.registrarComboActionChangeComboscuentasFK(termino_pago_proveedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(termino_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(termino_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(termino_pago_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				termino_pago_proveedor_funcion1.validarFormularioJQuery(termino_pago_proveedor_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("termino_pago_proveedor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("termino_pago_proveedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,"termino_pago_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				termino_pago_proveedor_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_termino_pago","id_tipo_termino_pago","general","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago_img_busqueda").click(function(){
				termino_pago_proveedor_webcontrol1.abrirBusquedaParatipo_termino_pago("id_tipo_termino_pago");
				//alert(jQuery('#form-id_tipo_termino_pago_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				termino_pago_proveedor_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("termino_pago_proveedor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(termino_pago_proveedor_control) {
		
		
		
		if(termino_pago_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdtermino_pago_proveedorActualizarToolBar").css("display",termino_pago_proveedor_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdtermino_pago_proveedorEliminarToolBar").css("display",termino_pago_proveedor_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trtermino_pago_proveedorElementos").css("display",termino_pago_proveedor_control.strVisibleTablaElementos);
		
		jQuery("#trtermino_pago_proveedorAcciones").css("display",termino_pago_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trtermino_pago_proveedorParametrosAcciones").css("display",termino_pago_proveedor_control.strVisibleTablaAcciones);
		
		jQuery("#tdtermino_pago_proveedorCerrarPagina").css("display",termino_pago_proveedor_control.strPermisoPopup);		
		jQuery("#tdtermino_pago_proveedorCerrarPaginaToolBar").css("display",termino_pago_proveedor_control.strPermisoPopup);
		//jQuery("#trtermino_pago_proveedorAccionesRelaciones").css("display",termino_pago_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=termino_pago_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + termino_pago_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + termino_pago_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Terminos Pago Proveedoreses";
		sTituloBanner+=" - " + termino_pago_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + termino_pago_proveedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtermino_pago_proveedorRelacionesToolBar").css("display",termino_pago_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostermino_pago_proveedor").css("display",termino_pago_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		termino_pago_proveedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		termino_pago_proveedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		termino_pago_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		termino_pago_proveedor_webcontrol1.registrarEventosControles();
		
		if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			termino_pago_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(termino_pago_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(termino_pago_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				termino_pago_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(termino_pago_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(termino_pago_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(termino_pago_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(termino_pago_proveedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
						//termino_pago_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(termino_pago_proveedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(termino_pago_proveedor_constante1.BIG_ID_ACTUAL,"termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
						//termino_pago_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			termino_pago_proveedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);	
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

var termino_pago_proveedor_webcontrol1 = new termino_pago_proveedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {termino_pago_proveedor_webcontrol,termino_pago_proveedor_webcontrol1};

//Para ser llamado desde window.opener
window.termino_pago_proveedor_webcontrol1 = termino_pago_proveedor_webcontrol1;


if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = termino_pago_proveedor_webcontrol1.onLoadWindow; 
}

//</script>