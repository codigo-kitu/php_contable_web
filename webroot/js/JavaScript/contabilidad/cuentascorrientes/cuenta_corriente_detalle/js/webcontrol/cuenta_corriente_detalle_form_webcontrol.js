//<script type="text/javascript" language="javascript">



//var cuenta_corriente_detalleJQueryPaginaWebInteraccion= function (cuenta_corriente_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cuenta_corriente_detalle_constante,cuenta_corriente_detalle_constante1} from '../util/cuenta_corriente_detalle_constante.js';

import {cuenta_corriente_detalle_funcion,cuenta_corriente_detalle_funcion1} from '../util/cuenta_corriente_detalle_form_funcion.js';


class cuenta_corriente_detalle_webcontrol extends GeneralEntityWebControl {
	
	cuenta_corriente_detalle_control=null;
	cuenta_corriente_detalle_controlInicial=null;
	cuenta_corriente_detalle_controlAuxiliar=null;
		
	//if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_corriente_detalle_control) {
		super();
		
		this.cuenta_corriente_detalle_control=cuenta_corriente_detalle_control;
	}
		
	actualizarVariablesPagina(cuenta_corriente_detalle_control) {
		
		if(cuenta_corriente_detalle_control.action=="index" || cuenta_corriente_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_corriente_detalle_control);
			
		} 
		
		
		
	
		else if(cuenta_corriente_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_corriente_detalle_control);	
		
		} else if(cuenta_corriente_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_corriente_detalle_control);		
		}
	
		else if(cuenta_corriente_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_corriente_detalle_control);		
		}
	
		else if(cuenta_corriente_detalle_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_corriente_detalle_control);
		}
		
		
		else if(cuenta_corriente_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cuenta_corriente_detalle_control);		
		
		} else if(cuenta_corriente_detalle_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_corriente_detalle_control);		
		
		} 
		//else if(cuenta_corriente_detalle_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_corriente_detalle_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cuenta_corriente_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cuenta_corriente_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cuenta_corriente_detalle_control) {
		this.actualizarPaginaAccionesGenerales(cuenta_corriente_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cuenta_corriente_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_corriente_detalle_control);
		this.actualizarPaginaOrderBy(cuenta_corriente_detalle_control);
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_corriente_detalle_control);
		//this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_corriente_detalle_control);
		this.actualizarPaginaAreaBusquedas(cuenta_corriente_detalle_control);
		this.actualizarPaginaCargaCombosFK(cuenta_corriente_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_corriente_detalle_control) {
		//this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_corriente_detalle_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_corriente_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_corriente_detalle_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_corriente_detalle_control);		
		this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_corriente_detalle_control);		
		this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_corriente_detalle_control);		
		this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_corriente_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_corriente_detalle_control);
		this.actualizarPaginaCargaCombosFK(cuenta_corriente_detalle_control);
		this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(cuenta_corriente_detalle_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_corriente_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_corriente_detalle_control);
		this.actualizarPaginaCargaCombosFK(cuenta_corriente_detalle_control);
		this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);
		this.onLoadCombosDefectoFK(cuenta_corriente_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_corriente_detalle_control) {
		//FORMULARIO
		if(cuenta_corriente_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_corriente_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		
		//COMBOS FK
		if(cuenta_corriente_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_corriente_detalle_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_corriente_detalle_control) {
		//FORMULARIO
		if(cuenta_corriente_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_corriente_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);	
		
		//COMBOS FK
		if(cuenta_corriente_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_corriente_detalle_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(cuenta_corriente_detalle_control) {
		//FORMULARIO
		if(cuenta_corriente_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);	
		//COMBOS FK
		if(cuenta_corriente_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_corriente_detalle_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cuenta_corriente_detalle_control) {
		
		if(cuenta_corriente_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_corriente_detalle_control);
		}
		
		if(cuenta_corriente_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cuenta_corriente_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cuenta_corriente_detalle_control) {
		if(cuenta_corriente_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cuenta_corriente_detalleReturnGeneral",JSON.stringify(cuenta_corriente_detalle_control.cuenta_corriente_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control) {
		if(cuenta_corriente_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_corriente_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_corriente_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_corriente_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cuenta_corriente_detalle_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_corriente_detalle_funcion1.resaltarRestaurarDivsPagina(false,"cuenta_corriente_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_corriente_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"cuenta_corriente_detalle");
			}			
			
			cuenta_corriente_detalle_funcion1.mostrarDivMensaje(true,cuenta_corriente_detalle_control.strAuxiliarMensaje,cuenta_corriente_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_corriente_detalle_funcion1.mostrarDivMensaje(false,cuenta_corriente_detalle_control.strAuxiliarMensaje,cuenta_corriente_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_corriente_detalle_control) {
		if(cuenta_corriente_detalle_funcion1.esPaginaForm(cuenta_corriente_detalle_constante1)==true) {
			window.opener.cuenta_corriente_detalle_webcontrol1.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_corriente_detalle_control) {
		cuenta_corriente_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_corriente_detalle_control.strAuxiliarUrlPagina);
				
		cuenta_corriente_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_corriente_detalle_control.strAuxiliarTipo,cuenta_corriente_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_corriente_detalle_control) {
		cuenta_corriente_detalle_funcion1.resaltarRestaurarDivMensaje(true,cuenta_corriente_detalle_control.strAuxiliarMensajeAlert,cuenta_corriente_detalle_control.strAuxiliarCssMensaje);
			
		if(cuenta_corriente_detalle_funcion1.esPaginaForm(cuenta_corriente_detalle_constante1)==true) {
			window.opener.cuenta_corriente_detalle_funcion1.resaltarRestaurarDivMensaje(true,cuenta_corriente_detalle_control.strAuxiliarMensajeAlert,cuenta_corriente_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cuenta_corriente_detalle_control) {
		this.cuenta_corriente_detalle_controlInicial=cuenta_corriente_detalle_control;
			
		if(cuenta_corriente_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_corriente_detalle_control.strStyleDivArbol,cuenta_corriente_detalle_control.strStyleDivContent
																,cuenta_corriente_detalle_control.strStyleDivOpcionesBanner,cuenta_corriente_detalle_control.strStyleDivExpandirColapsar
																,cuenta_corriente_detalle_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cuenta_corriente_detalle_control) {
		this.actualizarCssBotonesPagina(cuenta_corriente_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_corriente_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_corriente_detalle_control.tiposReportes,cuenta_corriente_detalle_control.tiposReporte
															 	,cuenta_corriente_detalle_control.tiposPaginacion,cuenta_corriente_detalle_control.tiposAcciones
																,cuenta_corriente_detalle_control.tiposColumnasSelect,cuenta_corriente_detalle_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cuenta_corriente_detalle_control.tiposRelaciones,cuenta_corriente_detalle_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_corriente_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_corriente_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_corriente_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_corriente_detalle_control) {
	
		var indexPosition=cuenta_corriente_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_corriente_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cuenta_corriente_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosempresasFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosejerciciosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosperiodosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosusuariosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarComboscuenta_corrientesFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosclientesFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosproveedorsFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tabla",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombostablasFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosestadosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosasientosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarComboscuenta_pagarsFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarComboscuenta_cobrarsFK(cuenta_corriente_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!=null && cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosempresasFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosejerciciosFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosperiodosFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosusuariosFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarComboscuenta_corrientesFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosclientesFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosproveedorsFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tabla",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombostablasFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosestadosFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosasientosFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarComboscuenta_pagarsFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarComboscuenta_cobrarsFK(cuenta_corriente_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.empresasFK);
	}

	cargarComboEditarTablaejercicioFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.cuenta_corrientesFK);
	}

	cargarComboEditarTablaclienteFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.clientesFK);
	}

	cargarComboEditarTablaproveedorFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.proveedorsFK);
	}

	cargarComboEditarTablatablaFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.tablasFK);
	}

	cargarComboEditarTablaestadoFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.estadosFK);
	}

	cargarComboEditarTablaasientoFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.asientosFK);
	}

	cargarComboEditarTablacuenta_pagarFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.cuenta_pagarsFK);
	}

	cargarComboEditarTablacuenta_cobrarFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.cuenta_cobrarsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control) {
		jQuery("#tdcuenta_corriente_detalleNuevo").css("display",cuenta_corriente_detalle_control.strPermisoNuevo);
		jQuery("#trcuenta_corriente_detalleElementos").css("display",cuenta_corriente_detalle_control.strVisibleTablaElementos);
		jQuery("#trcuenta_corriente_detalleAcciones").css("display",cuenta_corriente_detalle_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_corriente_detalleParametrosAcciones").css("display",cuenta_corriente_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cuenta_corriente_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(cuenta_corriente_detalle_control);
				
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(cuenta_corriente_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(cuenta_corriente_detalle_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cuenta_corriente_detalle_control) {
	
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-created_at").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.versionRow);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-updated_at").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.versionRow);
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_empresa!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_empresa>-1){
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_empresa) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_ejercicio!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_ejercicio>-1){
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_ejercicio) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_ejercicio").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_periodo!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_periodo>-1){
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_periodo) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_periodo").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_usuario!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_usuario>-1){
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_usuario) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_usuario").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_usuario").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_corriente!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_corriente>-1){
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_corriente) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_corriente").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-es_balance_inicial").prop('checked',cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.es_balance_inicial);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-es_cheque").prop('checked',cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.es_cheque);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-es_deposito").prop('checked',cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.es_deposito);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-es_retiro").prop('checked',cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.es_retiro);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-numero_cheque").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.numero_cheque);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-fecha_emision").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.fecha_emision);
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cliente!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cliente>-1){
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cliente").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cliente) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cliente").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cliente").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_proveedor!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_proveedor>-1){
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_proveedor").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_proveedor) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_proveedor").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_proveedor).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_proveedor").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-monto").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.monto);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-debito").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.debito);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-credito").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.credito);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-balance").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.balance);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-fecha_hora").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.fecha_hora);
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_tabla!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_tabla>-1){
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_tabla").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_tabla) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_tabla").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_tabla).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_tabla").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_tabla").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_tabla").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_origen").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_origen);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-descripcion").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.descripcion);
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_estado!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_estado>-1){
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_estado").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_estado) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_estado").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_estado").select2("val", null);
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_asiento!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_asiento>-1){
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_asiento").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_asiento) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_asiento").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_asiento").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_pagar!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_pagar>-1){
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_pagar) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_pagar).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_cobrar!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_cobrar>-1){
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_cobrar) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_cobrar).trigger("change");
			}
		} else { 
			if(jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-tabla_origen").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.tabla_origen);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-origen_empresa").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.origen_empresa);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-motivo_anulacion").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.motivo_anulacion);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-origen_dato").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.origen_dato);
		jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-computador_origen").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.computador_origen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cuenta_corriente_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cuenta_corriente_detalle","cuentascorrientes","","form_cuenta_corriente_detalle",formulario,"","",paraEventoTabla,idFilaTabla,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}
	
	actualizarSpanMensajesCampos(cuenta_corriente_detalle_control) {
		jQuery("#spanstrMensajeid").text(cuenta_corriente_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(cuenta_corriente_detalle_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(cuenta_corriente_detalle_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(cuenta_corriente_detalle_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_ejercicio").text(cuenta_corriente_detalle_control.strMensajeid_ejercicio);		
		jQuery("#spanstrMensajeid_periodo").text(cuenta_corriente_detalle_control.strMensajeid_periodo);		
		jQuery("#spanstrMensajeid_usuario").text(cuenta_corriente_detalle_control.strMensajeid_usuario);		
		jQuery("#spanstrMensajeid_cuenta_corriente").text(cuenta_corriente_detalle_control.strMensajeid_cuenta_corriente);		
		jQuery("#spanstrMensajees_balance_inicial").text(cuenta_corriente_detalle_control.strMensajees_balance_inicial);		
		jQuery("#spanstrMensajees_cheque").text(cuenta_corriente_detalle_control.strMensajees_cheque);		
		jQuery("#spanstrMensajees_deposito").text(cuenta_corriente_detalle_control.strMensajees_deposito);		
		jQuery("#spanstrMensajees_retiro").text(cuenta_corriente_detalle_control.strMensajees_retiro);		
		jQuery("#spanstrMensajenumero_cheque").text(cuenta_corriente_detalle_control.strMensajenumero_cheque);		
		jQuery("#spanstrMensajefecha_emision").text(cuenta_corriente_detalle_control.strMensajefecha_emision);		
		jQuery("#spanstrMensajeid_cliente").text(cuenta_corriente_detalle_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajeid_proveedor").text(cuenta_corriente_detalle_control.strMensajeid_proveedor);		
		jQuery("#spanstrMensajemonto").text(cuenta_corriente_detalle_control.strMensajemonto);		
		jQuery("#spanstrMensajedebito").text(cuenta_corriente_detalle_control.strMensajedebito);		
		jQuery("#spanstrMensajecredito").text(cuenta_corriente_detalle_control.strMensajecredito);		
		jQuery("#spanstrMensajebalance").text(cuenta_corriente_detalle_control.strMensajebalance);		
		jQuery("#spanstrMensajefecha_hora").text(cuenta_corriente_detalle_control.strMensajefecha_hora);		
		jQuery("#spanstrMensajeid_tabla").text(cuenta_corriente_detalle_control.strMensajeid_tabla);		
		jQuery("#spanstrMensajeid_origen").text(cuenta_corriente_detalle_control.strMensajeid_origen);		
		jQuery("#spanstrMensajedescripcion").text(cuenta_corriente_detalle_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeid_estado").text(cuenta_corriente_detalle_control.strMensajeid_estado);		
		jQuery("#spanstrMensajeid_asiento").text(cuenta_corriente_detalle_control.strMensajeid_asiento);		
		jQuery("#spanstrMensajeid_cuenta_pagar").text(cuenta_corriente_detalle_control.strMensajeid_cuenta_pagar);		
		jQuery("#spanstrMensajeid_cuenta_cobrar").text(cuenta_corriente_detalle_control.strMensajeid_cuenta_cobrar);		
		jQuery("#spanstrMensajetabla_origen").text(cuenta_corriente_detalle_control.strMensajetabla_origen);		
		jQuery("#spanstrMensajeorigen_empresa").text(cuenta_corriente_detalle_control.strMensajeorigen_empresa);		
		jQuery("#spanstrMensajemotivo_anulacion").text(cuenta_corriente_detalle_control.strMensajemotivo_anulacion);		
		jQuery("#spanstrMensajeorigen_dato").text(cuenta_corriente_detalle_control.strMensajeorigen_dato);		
		jQuery("#spanstrMensajecomputador_origen").text(cuenta_corriente_detalle_control.strMensajecomputador_origen);		
	}
	
	actualizarCssBotonesMantenimiento(cuenta_corriente_detalle_control) {
		jQuery("#tdbtnNuevocuenta_corriente_detalle").css("visibility",cuenta_corriente_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocuenta_corriente_detalle").css("display",cuenta_corriente_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcuenta_corriente_detalle").css("visibility",cuenta_corriente_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcuenta_corriente_detalle").css("display",cuenta_corriente_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcuenta_corriente_detalle").css("visibility",cuenta_corriente_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcuenta_corriente_detalle").css("display",cuenta_corriente_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcuenta_corriente_detalle").css("visibility",cuenta_corriente_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscuenta_corriente_detalle").css("visibility",cuenta_corriente_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscuenta_corriente_detalle").css("display",cuenta_corriente_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcuenta_corriente_detalle").css("visibility",cuenta_corriente_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcuenta_corriente_detalle").css("visibility",cuenta_corriente_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcuenta_corriente_detalle").css("visibility",cuenta_corriente_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_empresa",cuenta_corriente_detalle_control.empresasFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_3",cuenta_corriente_detalle_control.empresasFK);
		}
	};

	cargarCombosejerciciosFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_ejercicio",cuenta_corriente_detalle_control.ejerciciosFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_4",cuenta_corriente_detalle_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_periodo",cuenta_corriente_detalle_control.periodosFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_5",cuenta_corriente_detalle_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_usuario",cuenta_corriente_detalle_control.usuariosFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_6",cuenta_corriente_detalle_control.usuariosFK);
		}
	};

	cargarComboscuenta_corrientesFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_corriente",cuenta_corriente_detalle_control.cuenta_corrientesFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_7",cuenta_corriente_detalle_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",cuenta_corriente_detalle_control.cuenta_corrientesFK);

	};

	cargarCombosclientesFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cliente",cuenta_corriente_detalle_control.clientesFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_14",cuenta_corriente_detalle_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",cuenta_corriente_detalle_control.clientesFK);

	};

	cargarCombosproveedorsFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_proveedor",cuenta_corriente_detalle_control.proveedorsFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_15",cuenta_corriente_detalle_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",cuenta_corriente_detalle_control.proveedorsFK);

	};

	cargarCombostablasFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_tabla",cuenta_corriente_detalle_control.tablasFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_21",cuenta_corriente_detalle_control.tablasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idtabla-cmbid_tabla",cuenta_corriente_detalle_control.tablasFK);

	};

	cargarCombosestadosFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_estado",cuenta_corriente_detalle_control.estadosFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_24",cuenta_corriente_detalle_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",cuenta_corriente_detalle_control.estadosFK);

	};

	cargarCombosasientosFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_asiento",cuenta_corriente_detalle_control.asientosFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_25",cuenta_corriente_detalle_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",cuenta_corriente_detalle_control.asientosFK);

	};

	cargarComboscuenta_pagarsFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar",cuenta_corriente_detalle_control.cuenta_pagarsFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_26",cuenta_corriente_detalle_control.cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_cuenta_pagar",cuenta_corriente_detalle_control.cuenta_pagarsFK);

	};

	cargarComboscuenta_cobrarsFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar",cuenta_corriente_detalle_control.cuenta_cobrarsFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_27",cuenta_corriente_detalle_control.cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_cuenta_cobrar",cuenta_corriente_detalle_control.cuenta_cobrarsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombosclientesFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombostablasFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombosestadosFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombosasientosFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeComboscuenta_pagarsFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeComboscuenta_cobrarsFK(cuenta_corriente_detalle_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_corriente_detalle_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_corriente_detalle_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idejercicioDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_corriente_detalle_control.idejercicioDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_corriente_detalle_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idperiodoDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_corriente_detalle_control.idperiodoDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_corriente_detalle_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idusuarioDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_corriente_detalle_control.idusuarioDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_corriente_detalle_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != cuenta_corriente_detalle_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(cuenta_corriente_detalle_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(cuenta_corriente_detalle_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idclienteDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cliente").val() != cuenta_corriente_detalle_control.idclienteDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cliente").val(cuenta_corriente_detalle_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(cuenta_corriente_detalle_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idproveedorDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_proveedor").val() != cuenta_corriente_detalle_control.idproveedorDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_proveedor").val(cuenta_corriente_detalle_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(cuenta_corriente_detalle_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostablasFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idtablaDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_tabla").val() != cuenta_corriente_detalle_control.idtablaDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_tabla").val(cuenta_corriente_detalle_control.idtablaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idtabla-cmbid_tabla").val(cuenta_corriente_detalle_control.idtablaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idtabla-cmbid_tabla").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idtabla-cmbid_tabla").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idestadoDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_estado").val() != cuenta_corriente_detalle_control.idestadoDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_estado").val(cuenta_corriente_detalle_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(cuenta_corriente_detalle_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idasientoDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_asiento").val() != cuenta_corriente_detalle_control.idasientoDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_asiento").val(cuenta_corriente_detalle_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(cuenta_corriente_detalle_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_pagarsFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idcuenta_pagarDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != cuenta_corriente_detalle_control.idcuenta_pagarDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(cuenta_corriente_detalle_control.idcuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_cuenta_pagar").val(cuenta_corriente_detalle_control.idcuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_cobrarsFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idcuenta_cobrarDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != cuenta_corriente_detalle_control.idcuenta_cobrarDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(cuenta_corriente_detalle_control.idcuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_cuenta_cobrar").val(cuenta_corriente_detalle_control.idcuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_corriente_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_corriente_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosempresasFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosejerciciosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosperiodosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosusuariosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorComboscuenta_corrientesFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosclientesFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosproveedorsFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tabla",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombostablasFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosestadosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosasientosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorComboscuenta_pagarsFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorComboscuenta_cobrarsFK(cuenta_corriente_detalle_control);
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
	onLoadCombosEventosFK(cuenta_corriente_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosperiodosFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosusuariosFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosclientesFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosproveedorsFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tabla",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombostablasFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosestadosFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosasientosFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeComboscuenta_pagarsFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeComboscuenta_cobrarsFK(cuenta_corriente_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_corriente_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(cuenta_corriente_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_corriente_detalle_funcion1.validarFormularioJQuery(cuenta_corriente_detalle_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_corriente_detalle");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_corriente_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(cuenta_corriente_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,"cuenta_corriente_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tabla","id_tabla","general","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_tabla_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParatabla("id_tabla");
				//alert(jQuery('#form-id_tabla_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_pagar","id_cuenta_pagar","cuentaspagar","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacuenta_pagar("id_cuenta_pagar");
				//alert(jQuery('#form-id_cuenta_pagar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_cobrar","id_cuenta_cobrar","cuentascobrar","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacuenta_cobrar("id_cuenta_cobrar");
				//alert(jQuery('#form-id_cuenta_cobrar_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cuenta_corriente_detalle");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_corriente_detalle_control) {
		
		
		
		if(cuenta_corriente_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_corriente_detalleActualizarToolBar").css("display",cuenta_corriente_detalle_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcuenta_corriente_detalleEliminarToolBar").css("display",cuenta_corriente_detalle_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcuenta_corriente_detalleElementos").css("display",cuenta_corriente_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trcuenta_corriente_detalleAcciones").css("display",cuenta_corriente_detalle_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_corriente_detalleParametrosAcciones").css("display",cuenta_corriente_detalle_control.strVisibleTablaAcciones);
		
		jQuery("#tdcuenta_corriente_detalleCerrarPagina").css("display",cuenta_corriente_detalle_control.strPermisoPopup);		
		jQuery("#tdcuenta_corriente_detalleCerrarPaginaToolBar").css("display",cuenta_corriente_detalle_control.strPermisoPopup);
		//jQuery("#trcuenta_corriente_detalleAccionesRelaciones").css("display",cuenta_corriente_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cuenta_corriente_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_corriente_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cuenta_corriente_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cuenta Corriente Detalles";
		sTituloBanner+=" - " + cuenta_corriente_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_corriente_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcuenta_corriente_detalleRelacionesToolBar").css("display",cuenta_corriente_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscuenta_corriente_detalle").css("display",cuenta_corriente_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cuenta_corriente_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cuenta_corriente_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_corriente_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_corriente_detalle_webcontrol1.registrarEventosControles();
		
		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_corriente_detalle_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_corriente_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_corriente_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_corriente_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_corriente_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_corriente_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cuenta_corriente_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(cuenta_corriente_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(cuenta_corriente_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
						//cuenta_corriente_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(cuenta_corriente_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cuenta_corriente_detalle_constante1.BIG_ID_ACTUAL,"cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
						//cuenta_corriente_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			cuenta_corriente_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);	
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

var cuenta_corriente_detalle_webcontrol1 = new cuenta_corriente_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cuenta_corriente_detalle_webcontrol,cuenta_corriente_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.cuenta_corriente_detalle_webcontrol1 = cuenta_corriente_detalle_webcontrol1;


if(cuenta_corriente_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_corriente_detalle_webcontrol1.onLoadWindow; 
}

//</script>