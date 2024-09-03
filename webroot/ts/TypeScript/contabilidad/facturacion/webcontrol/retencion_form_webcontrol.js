//<script type="text/javascript" language="javascript">



//var retencionJQueryPaginaWebInteraccion= function (retencion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {retencion_constante,retencion_constante1} from '../util/retencion_constante.js';

import {retencion_funcion,retencion_funcion1} from '../util/retencion_form_funcion.js';


class retencion_webcontrol extends GeneralEntityWebControl {
	
	retencion_control=null;
	retencion_controlInicial=null;
	retencion_controlAuxiliar=null;
		
	//if(retencion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(retencion_control) {
		super();
		
		this.retencion_control=retencion_control;
	}
		
	actualizarVariablesPagina(retencion_control) {
		
		if(retencion_control.action=="index" || retencion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(retencion_control);
			
		} 
		
		
		
	
		else if(retencion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(retencion_control);	
		
		} else if(retencion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_control);		
		}
	
		else if(retencion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(retencion_control);		
		}
	
		else if(retencion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(retencion_control);
		}
		
		
		else if(retencion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(retencion_control);
		
		} else if(retencion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(retencion_control);
		
		} else if(retencion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(retencion_control);
		
		} else if(retencion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(retencion_control);
		
		} else if(retencion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(retencion_control);
		
		} else if(retencion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(retencion_control);		
		
		} else if(retencion_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(retencion_control);		
		
		} 
		//else if(retencion_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(retencion_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + retencion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(retencion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(retencion_control) {
		this.actualizarPaginaAccionesGenerales(retencion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(retencion_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_control);
		this.actualizarPaginaOrderBy(retencion_control);
		this.actualizarPaginaTablaDatos(retencion_control);
		this.actualizarPaginaCargaGeneralControles(retencion_control);
		//this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_control);
		this.actualizarPaginaAreaBusquedas(retencion_control);
		this.actualizarPaginaCargaCombosFK(retencion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(retencion_control) {
		//this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(retencion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(retencion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_control);		
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(retencion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_control);		
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(retencion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_control);		
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(retencion_control) {
		this.actualizarPaginaCargaGeneralControles(retencion_control);
		this.actualizarPaginaCargaCombosFK(retencion_control);
		this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(retencion_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(retencion_control) {
		this.actualizarPaginaCargaGeneralControles(retencion_control);
		this.actualizarPaginaCargaCombosFK(retencion_control);
		this.actualizarPaginaFormulario(retencion_control);
		this.onLoadCombosDefectoFK(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(retencion_control) {
		//FORMULARIO
		if(retencion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(retencion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		
		//COMBOS FK
		if(retencion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(retencion_control) {
		//FORMULARIO
		if(retencion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(retencion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);	
		
		//COMBOS FK
		if(retencion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(retencion_control) {
		//FORMULARIO
		if(retencion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);	
		//COMBOS FK
		if(retencion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(retencion_control) {
		
		if(retencion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(retencion_control);
		}
		
		if(retencion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(retencion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(retencion_control) {
		if(retencion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("retencionReturnGeneral",JSON.stringify(retencion_control.retencionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(retencion_control) {
		if(retencion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && retencion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(retencion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(retencion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(retencion_control, mostrar) {
		
		if(mostrar==true) {
			retencion_funcion1.resaltarRestaurarDivsPagina(false,"retencion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				retencion_funcion1.resaltarRestaurarDivMantenimiento(false,"retencion");
			}			
			
			retencion_funcion1.mostrarDivMensaje(true,retencion_control.strAuxiliarMensaje,retencion_control.strAuxiliarCssMensaje);
		
		} else {
			retencion_funcion1.mostrarDivMensaje(false,retencion_control.strAuxiliarMensaje,retencion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(retencion_control) {
		if(retencion_funcion1.esPaginaForm(retencion_constante1)==true) {
			window.opener.retencion_webcontrol1.actualizarPaginaTablaDatos(retencion_control);
		} else {
			this.actualizarPaginaTablaDatos(retencion_control);
		}
	}
	
	actualizarPaginaAbrirLink(retencion_control) {
		retencion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(retencion_control.strAuxiliarUrlPagina);
				
		retencion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(retencion_control.strAuxiliarTipo,retencion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(retencion_control) {
		retencion_funcion1.resaltarRestaurarDivMensaje(true,retencion_control.strAuxiliarMensajeAlert,retencion_control.strAuxiliarCssMensaje);
			
		if(retencion_funcion1.esPaginaForm(retencion_constante1)==true) {
			window.opener.retencion_funcion1.resaltarRestaurarDivMensaje(true,retencion_control.strAuxiliarMensajeAlert,retencion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(retencion_control) {
		this.retencion_controlInicial=retencion_control;
			
		if(retencion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(retencion_control.strStyleDivArbol,retencion_control.strStyleDivContent
																,retencion_control.strStyleDivOpcionesBanner,retencion_control.strStyleDivExpandirColapsar
																,retencion_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(retencion_control) {
		this.actualizarCssBotonesPagina(retencion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(retencion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(retencion_control.tiposReportes,retencion_control.tiposReporte
															 	,retencion_control.tiposPaginacion,retencion_control.tiposAcciones
																,retencion_control.tiposColumnasSelect,retencion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(retencion_control.tiposRelaciones,retencion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(retencion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(retencion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(retencion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(retencion_control) {
	
		var indexPosition=retencion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=retencion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(retencion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.cargarCombosempresasFK(retencion_control);
			}

			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.cargarComboscuenta_ventassFK(retencion_control);
			}

			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.cargarComboscuenta_comprassFK(retencion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(retencion_control.strRecargarFkTiposNinguno!=null && retencion_control.strRecargarFkTiposNinguno!='NINGUNO' && retencion_control.strRecargarFkTiposNinguno!='') {
			
				if(retencion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",retencion_control.strRecargarFkTiposNinguno,",")) { 
					retencion_webcontrol1.cargarCombosempresasFK(retencion_control);
				}

				if(retencion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_control.strRecargarFkTiposNinguno,",")) { 
					retencion_webcontrol1.cargarComboscuenta_ventassFK(retencion_control);
				}

				if(retencion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_control.strRecargarFkTiposNinguno,",")) { 
					retencion_webcontrol1.cargarComboscuenta_comprassFK(retencion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(retencion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_funcion1,retencion_control.empresasFK);
	}

	cargarComboEditarTablacuenta_ventasFK(retencion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_funcion1,retencion_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_comprasFK(retencion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_funcion1,retencion_control.cuenta_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(retencion_control) {
		jQuery("#tdretencionNuevo").css("display",retencion_control.strPermisoNuevo);
		jQuery("#trretencionElementos").css("display",retencion_control.strVisibleTablaElementos);
		jQuery("#trretencionAcciones").css("display",retencion_control.strVisibleTablaAcciones);
		jQuery("#trretencionParametrosAcciones").css("display",retencion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(retencion_control) {
	
		this.actualizarCssBotonesMantenimiento(retencion_control);
				
		if(retencion_control.retencionActual!=null) {//form
			
			this.actualizarCamposFormulario(retencion_control);			
		}
						
		this.actualizarSpanMensajesCampos(retencion_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(retencion_control) {
	
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id").val(retencion_control.retencionActual.id);
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-version_row").val(retencion_control.retencionActual.versionRow);
		
		if(retencion_control.retencionActual.id_empresa!=null && retencion_control.retencionActual.id_empresa>-1){
			if(jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_control.retencionActual.id_empresa) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").val(retencion_control.retencionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-codigo").val(retencion_control.retencionActual.codigo);
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-descripcion").val(retencion_control.retencionActual.descripcion);
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-valor").val(retencion_control.retencionActual.valor);
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-valor_base").val(retencion_control.retencionActual.valor_base);
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-predeterminado").prop('checked',retencion_control.retencionActual.predeterminado);
		
		if(retencion_control.retencionActual.id_cuenta_ventas!=null && retencion_control.retencionActual.id_cuenta_ventas>-1){
			if(jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_control.retencionActual.id_cuenta_ventas) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_control.retencionActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retencion_control.retencionActual.id_cuenta_compras!=null && retencion_control.retencionActual.id_cuenta_compras>-1){
			if(jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_control.retencionActual.id_cuenta_compras) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_control.retencionActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-cuenta_contable_ventas").val(retencion_control.retencionActual.cuenta_contable_ventas);
		jQuery("#form"+retencion_constante1.STR_SUFIJO+"-cuenta_contable_compras").val(retencion_control.retencionActual.cuenta_contable_compras);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+retencion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("retencion","facturacion","","form_retencion",formulario,"","",paraEventoTabla,idFilaTabla,retencion_funcion1,retencion_webcontrol1,retencion_constante1);
	}
	
	actualizarSpanMensajesCampos(retencion_control) {
		jQuery("#spanstrMensajeid").text(retencion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(retencion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(retencion_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(retencion_control.strMensajecodigo);		
		jQuery("#spanstrMensajedescripcion").text(retencion_control.strMensajedescripcion);		
		jQuery("#spanstrMensajevalor").text(retencion_control.strMensajevalor);		
		jQuery("#spanstrMensajevalor_base").text(retencion_control.strMensajevalor_base);		
		jQuery("#spanstrMensajepredeterminado").text(retencion_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta_ventas").text(retencion_control.strMensajeid_cuenta_ventas);		
		jQuery("#spanstrMensajeid_cuenta_compras").text(retencion_control.strMensajeid_cuenta_compras);		
		jQuery("#spanstrMensajecuenta_contable_ventas").text(retencion_control.strMensajecuenta_contable_ventas);		
		jQuery("#spanstrMensajecuenta_contable_compras").text(retencion_control.strMensajecuenta_contable_compras);		
	}
	
	actualizarCssBotonesMantenimiento(retencion_control) {
		jQuery("#tdbtnNuevoretencion").css("visibility",retencion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoretencion").css("display",retencion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarretencion").css("visibility",retencion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarretencion").css("display",retencion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarretencion").css("visibility",retencion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarretencion").css("display",retencion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarretencion").css("visibility",retencion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosretencion").css("visibility",retencion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosretencion").css("display",retencion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarretencion").css("visibility",retencion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarretencion").css("visibility",retencion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarretencion").css("visibility",retencion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(retencion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa",retencion_control.empresasFK);

		if(retencion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_control.idFilaTablaActual+"_2",retencion_control.empresasFK);
		}
	};

	cargarComboscuenta_ventassFK(retencion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas",retencion_control.cuenta_ventassFK);

		if(retencion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_control.idFilaTablaActual+"_8",retencion_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",retencion_control.cuenta_ventassFK);

	};

	cargarComboscuenta_comprassFK(retencion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras",retencion_control.cuenta_comprassFK);

		if(retencion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_control.idFilaTablaActual+"_9",retencion_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",retencion_control.cuenta_comprassFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(retencion_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(retencion_control) {

	};

	registrarComboActionChangeComboscuenta_comprassFK(retencion_control) {

	};

	
	
	setDefectoValorCombosempresasFK(retencion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_control.idempresaDefaultFK>-1 && jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_control.idempresaDefaultFK) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").val(retencion_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(retencion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(retencion_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprassFK(retencion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(retencion_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//retencion_control
		
	
	}
	
	onLoadCombosDefectoFK(retencion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.setDefectoValorCombosempresasFK(retencion_control);
			}

			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.setDefectoValorComboscuenta_ventassFK(retencion_control);
			}

			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.setDefectoValorComboscuenta_comprassFK(retencion_control);
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
	onLoadCombosEventosFK(retencion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_webcontrol1.registrarComboActionChangeCombosempresasFK(retencion_control);
			//}

			//if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(retencion_control);
			//}

			//if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(retencion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(retencion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(retencion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(retencion_constante1.BIT_ES_PAGINA_FORM==true) {
				retencion_funcion1.validarFormularioJQuery(retencion_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("retencion");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("retencion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(retencion_funcion1,retencion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(retencion_funcion1,retencion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(retencion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,"retencion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				retencion_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				retencion_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				retencion_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("retencion");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(retencion_control) {
		
		
		
		if(retencion_control.strPermisoActualizar!=null) {
			jQuery("#tdretencionActualizarToolBar").css("display",retencion_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdretencionEliminarToolBar").css("display",retencion_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trretencionElementos").css("display",retencion_control.strVisibleTablaElementos);
		
		jQuery("#trretencionAcciones").css("display",retencion_control.strVisibleTablaAcciones);
		jQuery("#trretencionParametrosAcciones").css("display",retencion_control.strVisibleTablaAcciones);
		
		jQuery("#tdretencionCerrarPagina").css("display",retencion_control.strPermisoPopup);		
		jQuery("#tdretencionCerrarPaginaToolBar").css("display",retencion_control.strPermisoPopup);
		//jQuery("#trretencionAccionesRelaciones").css("display",retencion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=retencion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retencion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + retencion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Retenciones";
		sTituloBanner+=" - " + retencion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retencion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdretencionRelacionesToolBar").css("display",retencion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosretencion").css("display",retencion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		retencion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		retencion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		retencion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		retencion_webcontrol1.registrarEventosControles();
		
		if(retencion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(retencion_constante1.STR_ES_RELACIONADO=="false") {
			retencion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(retencion_constante1.STR_ES_RELACIONES=="true") {
			if(retencion_constante1.BIT_ES_PAGINA_FORM==true) {
				retencion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(retencion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(retencion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(retencion_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(retencion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
						//retencion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(retencion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(retencion_constante1.BIG_ID_ACTUAL,"retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
						//retencion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			retencion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);	
	}
}

var retencion_webcontrol1 = new retencion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {retencion_webcontrol,retencion_webcontrol1};

//Para ser llamado desde window.opener
window.retencion_webcontrol1 = retencion_webcontrol1;


if(retencion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = retencion_webcontrol1.onLoadWindow; 
}

//</script>