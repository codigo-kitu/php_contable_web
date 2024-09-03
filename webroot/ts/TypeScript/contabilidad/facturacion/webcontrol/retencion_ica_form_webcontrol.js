//<script type="text/javascript" language="javascript">



//var retencion_icaJQueryPaginaWebInteraccion= function (retencion_ica_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {retencion_ica_constante,retencion_ica_constante1} from '../util/retencion_ica_constante.js';

import {retencion_ica_funcion,retencion_ica_funcion1} from '../util/retencion_ica_form_funcion.js';


class retencion_ica_webcontrol extends GeneralEntityWebControl {
	
	retencion_ica_control=null;
	retencion_ica_controlInicial=null;
	retencion_ica_controlAuxiliar=null;
		
	//if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(retencion_ica_control) {
		super();
		
		this.retencion_ica_control=retencion_ica_control;
	}
		
	actualizarVariablesPagina(retencion_ica_control) {
		
		if(retencion_ica_control.action=="index" || retencion_ica_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(retencion_ica_control);
			
		} 
		
		
		
	
		else if(retencion_ica_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(retencion_ica_control);	
		
		} else if(retencion_ica_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_ica_control);		
		}
	
		else if(retencion_ica_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(retencion_ica_control);		
		}
	
		else if(retencion_ica_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(retencion_ica_control);
		}
		
		
		else if(retencion_ica_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(retencion_ica_control);		
		
		} else if(retencion_ica_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(retencion_ica_control);		
		
		} 
		//else if(retencion_ica_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(retencion_ica_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + retencion_ica_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(retencion_ica_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(retencion_ica_control) {
		this.actualizarPaginaAccionesGenerales(retencion_ica_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(retencion_ica_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_ica_control);
		this.actualizarPaginaOrderBy(retencion_ica_control);
		this.actualizarPaginaTablaDatos(retencion_ica_control);
		this.actualizarPaginaCargaGeneralControles(retencion_ica_control);
		//this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_ica_control);
		this.actualizarPaginaAreaBusquedas(retencion_ica_control);
		this.actualizarPaginaCargaCombosFK(retencion_ica_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(retencion_ica_control) {
		//this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_ica_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(retencion_ica_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_ica_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(retencion_ica_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_ica_control);		
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(retencion_ica_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_ica_control);		
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(retencion_ica_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_ica_control);		
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(retencion_ica_control) {
		this.actualizarPaginaCargaGeneralControles(retencion_ica_control);
		this.actualizarPaginaCargaCombosFK(retencion_ica_control);
		this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(retencion_ica_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(retencion_ica_control) {
		this.actualizarPaginaCargaGeneralControles(retencion_ica_control);
		this.actualizarPaginaCargaCombosFK(retencion_ica_control);
		this.actualizarPaginaFormulario(retencion_ica_control);
		this.onLoadCombosDefectoFK(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(retencion_ica_control) {
		//FORMULARIO
		if(retencion_ica_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_ica_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(retencion_ica_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		
		//COMBOS FK
		if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_ica_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(retencion_ica_control) {
		//FORMULARIO
		if(retencion_ica_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_ica_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(retencion_ica_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);	
		
		//COMBOS FK
		if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_ica_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(retencion_ica_control) {
		//FORMULARIO
		if(retencion_ica_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_ica_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);	
		//COMBOS FK
		if(retencion_ica_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_ica_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(retencion_ica_control) {
		
		if(retencion_ica_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(retencion_ica_control);
		}
		
		if(retencion_ica_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(retencion_ica_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(retencion_ica_control) {
		if(retencion_ica_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("retencion_icaReturnGeneral",JSON.stringify(retencion_ica_control.retencion_icaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control) {
		if(retencion_ica_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && retencion_ica_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(retencion_ica_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(retencion_ica_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(retencion_ica_control, mostrar) {
		
		if(mostrar==true) {
			retencion_ica_funcion1.resaltarRestaurarDivsPagina(false,"retencion_ica");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				retencion_ica_funcion1.resaltarRestaurarDivMantenimiento(false,"retencion_ica");
			}			
			
			retencion_ica_funcion1.mostrarDivMensaje(true,retencion_ica_control.strAuxiliarMensaje,retencion_ica_control.strAuxiliarCssMensaje);
		
		} else {
			retencion_ica_funcion1.mostrarDivMensaje(false,retencion_ica_control.strAuxiliarMensaje,retencion_ica_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(retencion_ica_control) {
		if(retencion_ica_funcion1.esPaginaForm(retencion_ica_constante1)==true) {
			window.opener.retencion_ica_webcontrol1.actualizarPaginaTablaDatos(retencion_ica_control);
		} else {
			this.actualizarPaginaTablaDatos(retencion_ica_control);
		}
	}
	
	actualizarPaginaAbrirLink(retencion_ica_control) {
		retencion_ica_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(retencion_ica_control.strAuxiliarUrlPagina);
				
		retencion_ica_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(retencion_ica_control.strAuxiliarTipo,retencion_ica_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(retencion_ica_control) {
		retencion_ica_funcion1.resaltarRestaurarDivMensaje(true,retencion_ica_control.strAuxiliarMensajeAlert,retencion_ica_control.strAuxiliarCssMensaje);
			
		if(retencion_ica_funcion1.esPaginaForm(retencion_ica_constante1)==true) {
			window.opener.retencion_ica_funcion1.resaltarRestaurarDivMensaje(true,retencion_ica_control.strAuxiliarMensajeAlert,retencion_ica_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(retencion_ica_control) {
		this.retencion_ica_controlInicial=retencion_ica_control;
			
		if(retencion_ica_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(retencion_ica_control.strStyleDivArbol,retencion_ica_control.strStyleDivContent
																,retencion_ica_control.strStyleDivOpcionesBanner,retencion_ica_control.strStyleDivExpandirColapsar
																,retencion_ica_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(retencion_ica_control) {
		this.actualizarCssBotonesPagina(retencion_ica_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(retencion_ica_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(retencion_ica_control.tiposReportes,retencion_ica_control.tiposReporte
															 	,retencion_ica_control.tiposPaginacion,retencion_ica_control.tiposAcciones
																,retencion_ica_control.tiposColumnasSelect,retencion_ica_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(retencion_ica_control.tiposRelaciones,retencion_ica_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(retencion_ica_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(retencion_ica_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(retencion_ica_control);			
	}
	
	actualizarPaginaUsuarioInvitado(retencion_ica_control) {
	
		var indexPosition=retencion_ica_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=retencion_ica_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(retencion_ica_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.cargarCombosempresasFK(retencion_ica_control);
			}

			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.cargarComboscuenta_ventassFK(retencion_ica_control);
			}

			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.cargarComboscuenta_comprassFK(retencion_ica_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(retencion_ica_control.strRecargarFkTiposNinguno!=null && retencion_ica_control.strRecargarFkTiposNinguno!='NINGUNO' && retencion_ica_control.strRecargarFkTiposNinguno!='') {
			
				if(retencion_ica_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",retencion_ica_control.strRecargarFkTiposNinguno,",")) { 
					retencion_ica_webcontrol1.cargarCombosempresasFK(retencion_ica_control);
				}

				if(retencion_ica_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_ica_control.strRecargarFkTiposNinguno,",")) { 
					retencion_ica_webcontrol1.cargarComboscuenta_ventassFK(retencion_ica_control);
				}

				if(retencion_ica_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_ica_control.strRecargarFkTiposNinguno,",")) { 
					retencion_ica_webcontrol1.cargarComboscuenta_comprassFK(retencion_ica_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(retencion_ica_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_ica_funcion1,retencion_ica_control.empresasFK);
	}

	cargarComboEditarTablacuenta_ventasFK(retencion_ica_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_ica_funcion1,retencion_ica_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_comprasFK(retencion_ica_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_ica_funcion1,retencion_ica_control.cuenta_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(retencion_ica_control) {
		jQuery("#tdretencion_icaNuevo").css("display",retencion_ica_control.strPermisoNuevo);
		jQuery("#trretencion_icaElementos").css("display",retencion_ica_control.strVisibleTablaElementos);
		jQuery("#trretencion_icaAcciones").css("display",retencion_ica_control.strVisibleTablaAcciones);
		jQuery("#trretencion_icaParametrosAcciones").css("display",retencion_ica_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(retencion_ica_control) {
	
		this.actualizarCssBotonesMantenimiento(retencion_ica_control);
				
		if(retencion_ica_control.retencion_icaActual!=null) {//form
			
			this.actualizarCamposFormulario(retencion_ica_control);			
		}
						
		this.actualizarSpanMensajesCampos(retencion_ica_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(retencion_ica_control) {
	
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id").val(retencion_ica_control.retencion_icaActual.id);
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-version_row").val(retencion_ica_control.retencion_icaActual.versionRow);
		
		if(retencion_ica_control.retencion_icaActual.id_empresa!=null && retencion_ica_control.retencion_icaActual.id_empresa>-1){
			if(jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_ica_control.retencion_icaActual.id_empresa) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").val(retencion_ica_control.retencion_icaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-codigo").val(retencion_ica_control.retencion_icaActual.codigo);
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-descripcion").val(retencion_ica_control.retencion_icaActual.descripcion);
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-valor").val(retencion_ica_control.retencion_icaActual.valor);
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-valor_base").val(retencion_ica_control.retencion_icaActual.valor_base);
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-predeterminado").prop('checked',retencion_ica_control.retencion_icaActual.predeterminado);
		
		if(retencion_ica_control.retencion_icaActual.id_cuenta_ventas!=null && retencion_ica_control.retencion_icaActual.id_cuenta_ventas>-1){
			if(jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_ica_control.retencion_icaActual.id_cuenta_ventas) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_ica_control.retencion_icaActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retencion_ica_control.retencion_icaActual.id_cuenta_compras!=null && retencion_ica_control.retencion_icaActual.id_cuenta_compras>-1){
			if(jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_ica_control.retencion_icaActual.id_cuenta_compras) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_ica_control.retencion_icaActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-cuenta_contable_ventas").val(retencion_ica_control.retencion_icaActual.cuenta_contable_ventas);
		jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-cuenta_contable_compras").val(retencion_ica_control.retencion_icaActual.cuenta_contable_compras);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+retencion_ica_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("retencion_ica","facturacion","","form_retencion_ica",formulario,"","",paraEventoTabla,idFilaTabla,retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
	}
	
	actualizarSpanMensajesCampos(retencion_ica_control) {
		jQuery("#spanstrMensajeid").text(retencion_ica_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(retencion_ica_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(retencion_ica_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(retencion_ica_control.strMensajecodigo);		
		jQuery("#spanstrMensajedescripcion").text(retencion_ica_control.strMensajedescripcion);		
		jQuery("#spanstrMensajevalor").text(retencion_ica_control.strMensajevalor);		
		jQuery("#spanstrMensajevalor_base").text(retencion_ica_control.strMensajevalor_base);		
		jQuery("#spanstrMensajepredeterminado").text(retencion_ica_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta_ventas").text(retencion_ica_control.strMensajeid_cuenta_ventas);		
		jQuery("#spanstrMensajeid_cuenta_compras").text(retencion_ica_control.strMensajeid_cuenta_compras);		
		jQuery("#spanstrMensajecuenta_contable_ventas").text(retencion_ica_control.strMensajecuenta_contable_ventas);		
		jQuery("#spanstrMensajecuenta_contable_compras").text(retencion_ica_control.strMensajecuenta_contable_compras);		
	}
	
	actualizarCssBotonesMantenimiento(retencion_ica_control) {
		jQuery("#tdbtnNuevoretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoretencion_ica").css("display",retencion_ica_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarretencion_ica").css("display",retencion_ica_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarretencion_ica").css("display",retencion_ica_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosretencion_ica").css("display",retencion_ica_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarretencion_ica").css("visibility",retencion_ica_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(retencion_ica_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa",retencion_ica_control.empresasFK);

		if(retencion_ica_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_ica_control.idFilaTablaActual+"_2",retencion_ica_control.empresasFK);
		}
	};

	cargarComboscuenta_ventassFK(retencion_ica_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas",retencion_ica_control.cuenta_ventassFK);

		if(retencion_ica_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_ica_control.idFilaTablaActual+"_8",retencion_ica_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",retencion_ica_control.cuenta_ventassFK);

	};

	cargarComboscuenta_comprassFK(retencion_ica_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras",retencion_ica_control.cuenta_comprassFK);

		if(retencion_ica_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_ica_control.idFilaTablaActual+"_9",retencion_ica_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",retencion_ica_control.cuenta_comprassFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(retencion_ica_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(retencion_ica_control) {

	};

	registrarComboActionChangeComboscuenta_comprassFK(retencion_ica_control) {

	};

	
	
	setDefectoValorCombosempresasFK(retencion_ica_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_ica_control.idempresaDefaultFK>-1 && jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_ica_control.idempresaDefaultFK) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").val(retencion_ica_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(retencion_ica_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_ica_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_ica_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_ica_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(retencion_ica_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprassFK(retencion_ica_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_ica_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_ica_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_ica_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(retencion_ica_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//retencion_ica_control
		
	
	}
	
	onLoadCombosDefectoFK(retencion_ica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_ica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.setDefectoValorCombosempresasFK(retencion_ica_control);
			}

			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.setDefectoValorComboscuenta_ventassFK(retencion_ica_control);
			}

			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.setDefectoValorComboscuenta_comprassFK(retencion_ica_control);
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
	onLoadCombosEventosFK(retencion_ica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_ica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_ica_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_ica_webcontrol1.registrarComboActionChangeCombosempresasFK(retencion_ica_control);
			//}

			//if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_ica_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_ica_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(retencion_ica_control);
			//}

			//if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_ica_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_ica_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(retencion_ica_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(retencion_ica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_ica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(retencion_ica_constante1.BIT_ES_PAGINA_FORM==true) {
				retencion_ica_funcion1.validarFormularioJQuery(retencion_ica_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("retencion_ica");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("retencion_ica");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(retencion_ica_funcion1,retencion_ica_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(retencion_ica_funcion1,retencion_ica_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(retencion_ica_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,"retencion_ica");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				retencion_ica_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				retencion_ica_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				retencion_ica_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("retencion_ica");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(retencion_ica_control) {
		
		
		
		if(retencion_ica_control.strPermisoActualizar!=null) {
			jQuery("#tdretencion_icaActualizarToolBar").css("display",retencion_ica_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdretencion_icaEliminarToolBar").css("display",retencion_ica_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trretencion_icaElementos").css("display",retencion_ica_control.strVisibleTablaElementos);
		
		jQuery("#trretencion_icaAcciones").css("display",retencion_ica_control.strVisibleTablaAcciones);
		jQuery("#trretencion_icaParametrosAcciones").css("display",retencion_ica_control.strVisibleTablaAcciones);
		
		jQuery("#tdretencion_icaCerrarPagina").css("display",retencion_ica_control.strPermisoPopup);		
		jQuery("#tdretencion_icaCerrarPaginaToolBar").css("display",retencion_ica_control.strPermisoPopup);
		//jQuery("#trretencion_icaAccionesRelaciones").css("display",retencion_ica_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=retencion_ica_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retencion_ica_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + retencion_ica_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Retencion Icas";
		sTituloBanner+=" - " + retencion_ica_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retencion_ica_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdretencion_icaRelacionesToolBar").css("display",retencion_ica_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosretencion_ica").css("display",retencion_ica_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		retencion_ica_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		retencion_ica_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		retencion_ica_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		retencion_ica_webcontrol1.registrarEventosControles();
		
		if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(retencion_ica_constante1.STR_ES_RELACIONADO=="false") {
			retencion_ica_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(retencion_ica_constante1.STR_ES_RELACIONES=="true") {
			if(retencion_ica_constante1.BIT_ES_PAGINA_FORM==true) {
				retencion_ica_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(retencion_ica_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(retencion_ica_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(retencion_ica_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(retencion_ica_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
						//retencion_ica_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(retencion_ica_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(retencion_ica_constante1.BIG_ID_ACTUAL,"retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
						//retencion_ica_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			retencion_ica_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);	
	}
}

var retencion_ica_webcontrol1 = new retencion_ica_webcontrol();

//Para ser llamado desde otro archivo (import)
export {retencion_ica_webcontrol,retencion_ica_webcontrol1};

//Para ser llamado desde window.opener
window.retencion_ica_webcontrol1 = retencion_ica_webcontrol1;


if(retencion_ica_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = retencion_ica_webcontrol1.onLoadWindow; 
}

//</script>