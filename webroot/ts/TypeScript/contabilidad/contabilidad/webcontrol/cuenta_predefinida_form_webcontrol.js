//<script type="text/javascript" language="javascript">



//var cuenta_predefinidaJQueryPaginaWebInteraccion= function (cuenta_predefinida_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cuenta_predefinida_constante,cuenta_predefinida_constante1} from '../util/cuenta_predefinida_constante.js';

import {cuenta_predefinida_funcion,cuenta_predefinida_funcion1} from '../util/cuenta_predefinida_form_funcion.js';


class cuenta_predefinida_webcontrol extends GeneralEntityWebControl {
	
	cuenta_predefinida_control=null;
	cuenta_predefinida_controlInicial=null;
	cuenta_predefinida_controlAuxiliar=null;
		
	//if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_predefinida_control) {
		super();
		
		this.cuenta_predefinida_control=cuenta_predefinida_control;
	}
		
	actualizarVariablesPagina(cuenta_predefinida_control) {
		
		if(cuenta_predefinida_control.action=="index" || cuenta_predefinida_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_predefinida_control);
			
		} 
		
		
		
	
		else if(cuenta_predefinida_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_predefinida_control);	
		
		} else if(cuenta_predefinida_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_predefinida_control);		
		}
	
	
		
		
		else if(cuenta_predefinida_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cuenta_predefinida_control);		
		
		} else if(cuenta_predefinida_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_predefinida_control);		
		
		} 
		//else if(cuenta_predefinida_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_predefinida_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cuenta_predefinida_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cuenta_predefinida_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cuenta_predefinida_control) {
		this.actualizarPaginaAccionesGenerales(cuenta_predefinida_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cuenta_predefinida_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_predefinida_control);
		this.actualizarPaginaOrderBy(cuenta_predefinida_control);
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_predefinida_control);
		//this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_predefinida_control);
		this.actualizarPaginaAreaBusquedas(cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_predefinida_control) {
		//this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_predefinida_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cuenta_predefinida_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);
		this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(cuenta_predefinida_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cuenta_predefinida_control) {
		this.actualizarPaginaCargaGeneralControles(cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);
		this.actualizarPaginaFormulario(cuenta_predefinida_control);
		this.onLoadCombosDefectoFK(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cuenta_predefinida_control) {
		//FORMULARIO
		if(cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_predefinida_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_predefinida_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		
		//COMBOS FK
		if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cuenta_predefinida_control) {
		//FORMULARIO
		if(cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_predefinida_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cuenta_predefinida_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);	
		
		//COMBOS FK
		if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(cuenta_predefinida_control) {
		//FORMULARIO
		if(cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cuenta_predefinida_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);	
		//COMBOS FK
		if(cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cuenta_predefinida_control) {
		
		if(cuenta_predefinida_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_predefinida_control);
		}
		
		if(cuenta_predefinida_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cuenta_predefinida_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cuenta_predefinida_control) {
		if(cuenta_predefinida_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cuenta_predefinidaReturnGeneral",JSON.stringify(cuenta_predefinida_control.cuenta_predefinidaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control) {
		if(cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_predefinida_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_predefinida_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_predefinida_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cuenta_predefinida_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_predefinida_funcion1.resaltarRestaurarDivsPagina(false,"cuenta_predefinida");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_predefinida_funcion1.resaltarRestaurarDivMantenimiento(false,"cuenta_predefinida");
			}			
			
			cuenta_predefinida_funcion1.mostrarDivMensaje(true,cuenta_predefinida_control.strAuxiliarMensaje,cuenta_predefinida_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_predefinida_funcion1.mostrarDivMensaje(false,cuenta_predefinida_control.strAuxiliarMensaje,cuenta_predefinida_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_predefinida_control) {
		if(cuenta_predefinida_funcion1.esPaginaForm(cuenta_predefinida_constante1)==true) {
			window.opener.cuenta_predefinida_webcontrol1.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_predefinida_control) {
		cuenta_predefinida_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_predefinida_control.strAuxiliarUrlPagina);
				
		cuenta_predefinida_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_predefinida_control.strAuxiliarTipo,cuenta_predefinida_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_predefinida_control) {
		cuenta_predefinida_funcion1.resaltarRestaurarDivMensaje(true,cuenta_predefinida_control.strAuxiliarMensajeAlert,cuenta_predefinida_control.strAuxiliarCssMensaje);
			
		if(cuenta_predefinida_funcion1.esPaginaForm(cuenta_predefinida_constante1)==true) {
			window.opener.cuenta_predefinida_funcion1.resaltarRestaurarDivMensaje(true,cuenta_predefinida_control.strAuxiliarMensajeAlert,cuenta_predefinida_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cuenta_predefinida_control) {
		this.cuenta_predefinida_controlInicial=cuenta_predefinida_control;
			
		if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_predefinida_control.strStyleDivArbol,cuenta_predefinida_control.strStyleDivContent
																,cuenta_predefinida_control.strStyleDivOpcionesBanner,cuenta_predefinida_control.strStyleDivExpandirColapsar
																,cuenta_predefinida_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cuenta_predefinida_control) {
		this.actualizarCssBotonesPagina(cuenta_predefinida_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_predefinida_control.tiposReportes,cuenta_predefinida_control.tiposReporte
															 	,cuenta_predefinida_control.tiposPaginacion,cuenta_predefinida_control.tiposAcciones
																,cuenta_predefinida_control.tiposColumnasSelect,cuenta_predefinida_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_predefinida_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_predefinida_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_predefinida_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_predefinida_control) {
	
		var indexPosition=cuenta_predefinida_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_predefinida_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cuenta_predefinida_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.cargarCombosempresasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta_predefinida",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.cargarCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.cargarCombostipo_cuentasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.cargarCombostipo_nivel_cuentasFK(cuenta_predefinida_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_predefinida_control.strRecargarFkTiposNinguno!=null && cuenta_predefinida_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_predefinida_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_predefinida_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_predefinida_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_predefinida_webcontrol1.cargarCombosempresasFK(cuenta_predefinida_control);
				}

				if(cuenta_predefinida_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_cuenta_predefinida",cuenta_predefinida_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_predefinida_webcontrol1.cargarCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control);
				}

				if(cuenta_predefinida_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_predefinida_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_predefinida_webcontrol1.cargarCombostipo_cuentasFK(cuenta_predefinida_control);
				}

				if(cuenta_predefinida_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_predefinida_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_predefinida_webcontrol1.cargarCombostipo_nivel_cuentasFK(cuenta_predefinida_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_predefinida_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_predefinida_funcion1,cuenta_predefinida_control.empresasFK);
	}

	cargarComboEditarTablatipo_cuenta_predefinidaFK(cuenta_predefinida_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_predefinida_funcion1,cuenta_predefinida_control.tipo_cuenta_predefinidasFK);
	}

	cargarComboEditarTablatipo_cuentaFK(cuenta_predefinida_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_predefinida_funcion1,cuenta_predefinida_control.tipo_cuentasFK);
	}

	cargarComboEditarTablatipo_nivel_cuentaFK(cuenta_predefinida_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_predefinida_funcion1,cuenta_predefinida_control.tipo_nivel_cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(cuenta_predefinida_control) {
		jQuery("#tdcuenta_predefinidaNuevo").css("display",cuenta_predefinida_control.strPermisoNuevo);
		jQuery("#trcuenta_predefinidaElementos").css("display",cuenta_predefinida_control.strVisibleTablaElementos);
		jQuery("#trcuenta_predefinidaAcciones").css("display",cuenta_predefinida_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_predefinidaParametrosAcciones").css("display",cuenta_predefinida_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cuenta_predefinida_control) {
	
		this.actualizarCssBotonesMantenimiento(cuenta_predefinida_control);
				
		if(cuenta_predefinida_control.cuenta_predefinidaActual!=null) {//form
			
			this.actualizarCamposFormulario(cuenta_predefinida_control);			
		}
						
		this.actualizarSpanMensajesCampos(cuenta_predefinida_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cuenta_predefinida_control) {
	
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id").val(cuenta_predefinida_control.cuenta_predefinidaActual.id);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-version_row").val(cuenta_predefinida_control.cuenta_predefinidaActual.versionRow);
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa>-1){
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida>-1){
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").select2("val", null);
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta>-1){
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").select2("val", null);
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta>-1){
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").select2("val", null);
			if(jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-codigo_tabla").val(cuenta_predefinida_control.cuenta_predefinidaActual.codigo_tabla);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-codigo_cuenta").val(cuenta_predefinida_control.cuenta_predefinidaActual.codigo_cuenta);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-nombre_cuenta").val(cuenta_predefinida_control.cuenta_predefinidaActual.nombre_cuenta);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-monto_minimo").val(cuenta_predefinida_control.cuenta_predefinidaActual.monto_minimo);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-valor_retencion").val(cuenta_predefinida_control.cuenta_predefinidaActual.valor_retencion);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-balance").val(cuenta_predefinida_control.cuenta_predefinidaActual.balance);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-porcentaje_base").val(cuenta_predefinida_control.cuenta_predefinidaActual.porcentaje_base);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-seleccionar").val(cuenta_predefinida_control.cuenta_predefinidaActual.seleccionar);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-centro_costos").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.centro_costos);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-retencion").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.retencion);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-usa_base").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.usa_base);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-nit").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.nit);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-modifica").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.modifica);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-ultima_transaccion").val(cuenta_predefinida_control.cuenta_predefinidaActual.ultima_transaccion);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-comenta1").val(cuenta_predefinida_control.cuenta_predefinidaActual.comenta1);
		jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-comenta2").val(cuenta_predefinida_control.cuenta_predefinidaActual.comenta2);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cuenta_predefinida_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cuenta_predefinida","contabilidad","","form_cuenta_predefinida",formulario,"","",paraEventoTabla,idFilaTabla,cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
	}
	
	actualizarSpanMensajesCampos(cuenta_predefinida_control) {
		jQuery("#spanstrMensajeid").text(cuenta_predefinida_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cuenta_predefinida_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(cuenta_predefinida_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_tipo_cuenta_predefinida").text(cuenta_predefinida_control.strMensajeid_tipo_cuenta_predefinida);		
		jQuery("#spanstrMensajeid_tipo_cuenta").text(cuenta_predefinida_control.strMensajeid_tipo_cuenta);		
		jQuery("#spanstrMensajeid_tipo_nivel_cuenta").text(cuenta_predefinida_control.strMensajeid_tipo_nivel_cuenta);		
		jQuery("#spanstrMensajecodigo_tabla").text(cuenta_predefinida_control.strMensajecodigo_tabla);		
		jQuery("#spanstrMensajecodigo_cuenta").text(cuenta_predefinida_control.strMensajecodigo_cuenta);		
		jQuery("#spanstrMensajenombre_cuenta").text(cuenta_predefinida_control.strMensajenombre_cuenta);		
		jQuery("#spanstrMensajemonto_minimo").text(cuenta_predefinida_control.strMensajemonto_minimo);		
		jQuery("#spanstrMensajevalor_retencion").text(cuenta_predefinida_control.strMensajevalor_retencion);		
		jQuery("#spanstrMensajebalance").text(cuenta_predefinida_control.strMensajebalance);		
		jQuery("#spanstrMensajeporcentaje_base").text(cuenta_predefinida_control.strMensajeporcentaje_base);		
		jQuery("#spanstrMensajeseleccionar").text(cuenta_predefinida_control.strMensajeseleccionar);		
		jQuery("#spanstrMensajecentro_costos").text(cuenta_predefinida_control.strMensajecentro_costos);		
		jQuery("#spanstrMensajeretencion").text(cuenta_predefinida_control.strMensajeretencion);		
		jQuery("#spanstrMensajeusa_base").text(cuenta_predefinida_control.strMensajeusa_base);		
		jQuery("#spanstrMensajenit").text(cuenta_predefinida_control.strMensajenit);		
		jQuery("#spanstrMensajemodifica").text(cuenta_predefinida_control.strMensajemodifica);		
		jQuery("#spanstrMensajeultima_transaccion").text(cuenta_predefinida_control.strMensajeultima_transaccion);		
		jQuery("#spanstrMensajecomenta1").text(cuenta_predefinida_control.strMensajecomenta1);		
		jQuery("#spanstrMensajecomenta2").text(cuenta_predefinida_control.strMensajecomenta2);		
	}
	
	actualizarCssBotonesMantenimiento(cuenta_predefinida_control) {
		jQuery("#tdbtnNuevocuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocuenta_predefinida").css("display",cuenta_predefinida_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcuenta_predefinida").css("display",cuenta_predefinida_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcuenta_predefinida").css("display",cuenta_predefinida_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscuenta_predefinida").css("display",cuenta_predefinida_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcuenta_predefinida").css("visibility",cuenta_predefinida_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cuenta_predefinida_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa",cuenta_predefinida_control.empresasFK);

		if(cuenta_predefinida_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_predefinida_control.idFilaTablaActual+"_2",cuenta_predefinida_control.empresasFK);
		}
	};

	cargarCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida",cuenta_predefinida_control.tipo_cuenta_predefinidasFK);

		if(cuenta_predefinida_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_predefinida_control.idFilaTablaActual+"_3",cuenta_predefinida_control.tipo_cuenta_predefinidasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida-cmbid_tipo_cuenta_predefinida",cuenta_predefinida_control.tipo_cuenta_predefinidasFK);

	};

	cargarCombostipo_cuentasFK(cuenta_predefinida_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta",cuenta_predefinida_control.tipo_cuentasFK);

		if(cuenta_predefinida_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_predefinida_control.idFilaTablaActual+"_4",cuenta_predefinida_control.tipo_cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta",cuenta_predefinida_control.tipo_cuentasFK);

	};

	cargarCombostipo_nivel_cuentasFK(cuenta_predefinida_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta",cuenta_predefinida_control.tipo_nivel_cuentasFK);

		if(cuenta_predefinida_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_predefinida_control.idFilaTablaActual+"_5",cuenta_predefinida_control.tipo_nivel_cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta",cuenta_predefinida_control.tipo_nivel_cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_predefinida_control) {

	};

	registrarComboActionChangeCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control) {

	};

	registrarComboActionChangeCombostipo_cuentasFK(cuenta_predefinida_control) {

	};

	registrarComboActionChangeCombostipo_nivel_cuentasFK(cuenta_predefinida_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_predefinida_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_predefinida_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_predefinida_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_predefinida_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_predefinida_control.idtipo_cuenta_predefinidaDefaultFK>-1 && jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").val() != cuenta_predefinida_control.idtipo_cuenta_predefinidaDefaultFK) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").val(cuenta_predefinida_control.idtipo_cuenta_predefinidaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida-cmbid_tipo_cuenta_predefinida").val(cuenta_predefinida_control.idtipo_cuenta_predefinidaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida-cmbid_tipo_cuenta_predefinida").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida-cmbid_tipo_cuenta_predefinida").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_cuentasFK(cuenta_predefinida_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_predefinida_control.idtipo_cuentaDefaultFK>-1 && jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != cuenta_predefinida_control.idtipo_cuentaDefaultFK) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(cuenta_predefinida_control.idtipo_cuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val(cuenta_predefinida_control.idtipo_cuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_nivel_cuentasFK(cuenta_predefinida_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_predefinida_control.idtipo_nivel_cuentaDefaultFK>-1 && jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val() != cuenta_predefinida_control.idtipo_nivel_cuentaDefaultFK) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val(cuenta_predefinida_control.idtipo_nivel_cuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val(cuenta_predefinida_control.idtipo_nivel_cuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_predefinida_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.setDefectoValorCombosempresasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta_predefinida",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.setDefectoValorCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.setDefectoValorCombostipo_cuentasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.setDefectoValorCombostipo_nivel_cuentasFK(cuenta_predefinida_control);
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
	onLoadCombosEventosFK(cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_predefinida_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_predefinida_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_predefinida_control);
			//}

			//if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta_predefinida",cuenta_predefinida_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_predefinida_webcontrol1.registrarComboActionChangeCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control);
			//}

			//if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_predefinida_webcontrol1.registrarComboActionChangeCombostipo_cuentasFK(cuenta_predefinida_control);
			//}

			//if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_predefinida_webcontrol1.registrarComboActionChangeCombostipo_nivel_cuentasFK(cuenta_predefinida_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(cuenta_predefinida_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_predefinida_funcion1.validarFormularioJQuery(cuenta_predefinida_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_predefinida");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_predefinida");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,"cuenta_predefinida");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_predefinida_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_cuenta_predefinida","id_tipo_cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida_img_busqueda").click(function(){
				cuenta_predefinida_webcontrol1.abrirBusquedaParatipo_cuenta_predefinida("id_tipo_cuenta_predefinida");
				//alert(jQuery('#form-id_tipo_cuenta_predefinida_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_cuenta","id_tipo_cuenta","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_img_busqueda").click(function(){
				cuenta_predefinida_webcontrol1.abrirBusquedaParatipo_cuenta("id_tipo_cuenta");
				//alert(jQuery('#form-id_tipo_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_nivel_cuenta","id_tipo_nivel_cuenta","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta_img_busqueda").click(function(){
				cuenta_predefinida_webcontrol1.abrirBusquedaParatipo_nivel_cuenta("id_tipo_nivel_cuenta");
				//alert(jQuery('#form-id_tipo_nivel_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_predefinida_control) {
		
		
		
		if(cuenta_predefinida_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_predefinidaActualizarToolBar").css("display",cuenta_predefinida_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcuenta_predefinidaEliminarToolBar").css("display",cuenta_predefinida_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcuenta_predefinidaElementos").css("display",cuenta_predefinida_control.strVisibleTablaElementos);
		
		jQuery("#trcuenta_predefinidaAcciones").css("display",cuenta_predefinida_control.strVisibleTablaAcciones);
		jQuery("#trcuenta_predefinidaParametrosAcciones").css("display",cuenta_predefinida_control.strVisibleTablaAcciones);
		
		jQuery("#tdcuenta_predefinidaCerrarPagina").css("display",cuenta_predefinida_control.strPermisoPopup);		
		jQuery("#tdcuenta_predefinidaCerrarPaginaToolBar").css("display",cuenta_predefinida_control.strPermisoPopup);
		//jQuery("#trcuenta_predefinidaAccionesRelaciones").css("display",cuenta_predefinida_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cuenta_predefinida_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_predefinida_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cuenta_predefinida_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cuentas Predefinidases";
		sTituloBanner+=" - " + cuenta_predefinida_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_predefinida_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcuenta_predefinidaRelacionesToolBar").css("display",cuenta_predefinida_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscuenta_predefinida").css("display",cuenta_predefinida_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cuenta_predefinida_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cuenta_predefinida_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_predefinida_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_predefinida_webcontrol1.registrarEventosControles();
		
		if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_predefinida_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_predefinida_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_predefinida_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_predefinida_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_predefinida_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cuenta_predefinida_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(cuenta_predefinida_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(cuenta_predefinida_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
						//cuenta_predefinida_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(cuenta_predefinida_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cuenta_predefinida_constante1.BIG_ID_ACTUAL,"cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
						//cuenta_predefinida_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			cuenta_predefinida_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);	
	}
}

var cuenta_predefinida_webcontrol1 = new cuenta_predefinida_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cuenta_predefinida_webcontrol,cuenta_predefinida_webcontrol1};

//Para ser llamado desde window.opener
window.cuenta_predefinida_webcontrol1 = cuenta_predefinida_webcontrol1;


if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_predefinida_webcontrol1.onLoadWindow; 
}

//</script>