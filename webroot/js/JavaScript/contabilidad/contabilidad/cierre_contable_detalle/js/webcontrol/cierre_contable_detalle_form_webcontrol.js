//<script type="text/javascript" language="javascript">



//var cierre_contable_detalleJQueryPaginaWebInteraccion= function (cierre_contable_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cierre_contable_detalle_constante,cierre_contable_detalle_constante1} from '../util/cierre_contable_detalle_constante.js';

import {cierre_contable_detalle_funcion,cierre_contable_detalle_funcion1} from '../util/cierre_contable_detalle_form_funcion.js';


class cierre_contable_detalle_webcontrol extends GeneralEntityWebControl {
	
	cierre_contable_detalle_control=null;
	cierre_contable_detalle_controlInicial=null;
	cierre_contable_detalle_controlAuxiliar=null;
		
	//if(cierre_contable_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cierre_contable_detalle_control) {
		super();
		
		this.cierre_contable_detalle_control=cierre_contable_detalle_control;
	}
		
	actualizarVariablesPagina(cierre_contable_detalle_control) {
		
		if(cierre_contable_detalle_control.action=="index" || cierre_contable_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cierre_contable_detalle_control);
			
		} 
		
		
		
	
		else if(cierre_contable_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cierre_contable_detalle_control);	
		
		} else if(cierre_contable_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cierre_contable_detalle_control);		
		}
	
	
		
		
		else if(cierre_contable_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cierre_contable_detalle_control);		
		
		} else if(cierre_contable_detalle_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cierre_contable_detalle_control);		
		
		} 
		//else if(cierre_contable_detalle_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cierre_contable_detalle_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cierre_contable_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cierre_contable_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cierre_contable_detalle_control) {
		this.actualizarPaginaAccionesGenerales(cierre_contable_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cierre_contable_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cierre_contable_detalle_control);
		this.actualizarPaginaOrderBy(cierre_contable_detalle_control);
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cierre_contable_detalle_control);
		//this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_detalle_control);
		this.actualizarPaginaAreaBusquedas(cierre_contable_detalle_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cierre_contable_detalle_control) {
		//this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cierre_contable_detalle_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cierre_contable_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(cierre_contable_detalle_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(cierre_contable_detalle_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cierre_contable_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(cierre_contable_detalle_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);
		this.actualizarPaginaFormulario(cierre_contable_detalle_control);
		this.onLoadCombosDefectoFK(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cierre_contable_detalle_control) {
		//FORMULARIO
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cierre_contable_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cierre_contable_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		
		//COMBOS FK
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(cierre_contable_detalle_control) {
		//FORMULARIO
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cierre_contable_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cierre_contable_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);	
		
		//COMBOS FK
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(cierre_contable_detalle_control) {
		//FORMULARIO
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cierre_contable_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);	
		//COMBOS FK
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cierre_contable_detalle_control) {
		
		if(cierre_contable_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cierre_contable_detalle_control);
		}
		
		if(cierre_contable_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cierre_contable_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cierre_contable_detalle_control) {
		if(cierre_contable_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cierre_contable_detalleReturnGeneral",JSON.stringify(cierre_contable_detalle_control.cierre_contable_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control) {
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cierre_contable_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cierre_contable_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cierre_contable_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cierre_contable_detalle_control, mostrar) {
		
		if(mostrar==true) {
			cierre_contable_detalle_funcion1.resaltarRestaurarDivsPagina(false,"cierre_contable_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cierre_contable_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"cierre_contable_detalle");
			}			
			
			cierre_contable_detalle_funcion1.mostrarDivMensaje(true,cierre_contable_detalle_control.strAuxiliarMensaje,cierre_contable_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			cierre_contable_detalle_funcion1.mostrarDivMensaje(false,cierre_contable_detalle_control.strAuxiliarMensaje,cierre_contable_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cierre_contable_detalle_control) {
		if(cierre_contable_detalle_funcion1.esPaginaForm(cierre_contable_detalle_constante1)==true) {
			window.opener.cierre_contable_detalle_webcontrol1.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(cierre_contable_detalle_control) {
		cierre_contable_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cierre_contable_detalle_control.strAuxiliarUrlPagina);
				
		cierre_contable_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cierre_contable_detalle_control.strAuxiliarTipo,cierre_contable_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cierre_contable_detalle_control) {
		cierre_contable_detalle_funcion1.resaltarRestaurarDivMensaje(true,cierre_contable_detalle_control.strAuxiliarMensajeAlert,cierre_contable_detalle_control.strAuxiliarCssMensaje);
			
		if(cierre_contable_detalle_funcion1.esPaginaForm(cierre_contable_detalle_constante1)==true) {
			window.opener.cierre_contable_detalle_funcion1.resaltarRestaurarDivMensaje(true,cierre_contable_detalle_control.strAuxiliarMensajeAlert,cierre_contable_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cierre_contable_detalle_control) {
		this.cierre_contable_detalle_controlInicial=cierre_contable_detalle_control;
			
		if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cierre_contable_detalle_control.strStyleDivArbol,cierre_contable_detalle_control.strStyleDivContent
																,cierre_contable_detalle_control.strStyleDivOpcionesBanner,cierre_contable_detalle_control.strStyleDivExpandirColapsar
																,cierre_contable_detalle_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cierre_contable_detalle_control) {
		this.actualizarCssBotonesPagina(cierre_contable_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cierre_contable_detalle_control.tiposReportes,cierre_contable_detalle_control.tiposReporte
															 	,cierre_contable_detalle_control.tiposPaginacion,cierre_contable_detalle_control.tiposAcciones
																,cierre_contable_detalle_control.tiposColumnasSelect,cierre_contable_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cierre_contable_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cierre_contable_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cierre_contable_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cierre_contable_detalle_control) {
	
		var indexPosition=cierre_contable_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cierre_contable_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cierre_contable_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cierre_contable_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cierre_contable",cierre_contable_detalle_control.strRecargarFkTipos,",")) { 
				cierre_contable_detalle_webcontrol1.cargarComboscierre_contablesFK(cierre_contable_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cierre_contable_detalle_control.strRecargarFkTiposNinguno!=null && cierre_contable_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && cierre_contable_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(cierre_contable_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cierre_contable",cierre_contable_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cierre_contable_detalle_webcontrol1.cargarComboscierre_contablesFK(cierre_contable_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablacierre_contableFK(cierre_contable_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cierre_contable_detalle_funcion1,cierre_contable_detalle_control.cierre_contablesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control) {
		jQuery("#tdcierre_contable_detalleNuevo").css("display",cierre_contable_detalle_control.strPermisoNuevo);
		jQuery("#trcierre_contable_detalleElementos").css("display",cierre_contable_detalle_control.strVisibleTablaElementos);
		jQuery("#trcierre_contable_detalleAcciones").css("display",cierre_contable_detalle_control.strVisibleTablaAcciones);
		jQuery("#trcierre_contable_detalleParametrosAcciones").css("display",cierre_contable_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cierre_contable_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(cierre_contable_detalle_control);
				
		if(cierre_contable_detalle_control.cierre_contable_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(cierre_contable_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(cierre_contable_detalle_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cierre_contable_detalle_control) {
	
		jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id").val(cierre_contable_detalle_control.cierre_contable_detalleActual.id);
		jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-created_at").val(cierre_contable_detalle_control.cierre_contable_detalleActual.versionRow);
		jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-updated_at").val(cierre_contable_detalle_control.cierre_contable_detalleActual.versionRow);
		jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_detalle").val(cierre_contable_detalle_control.cierre_contable_detalleActual.id_detalle);
		
		if(cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable!=null && cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable>-1){
			if(jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").val() != cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable) {
				jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").val(cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable).trigger("change");
			}
		} else { 
			//jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").select2("val", null);
			if(jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-nro_documento").val(cierre_contable_detalle_control.cierre_contable_detalleActual.nro_documento);
		jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-tipo_factura").val(cierre_contable_detalle_control.cierre_contable_detalleActual.tipo_factura);
		jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-monto").val(cierre_contable_detalle_control.cierre_contable_detalleActual.monto);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cierre_contable_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cierre_contable_detalle","contabilidad","","form_cierre_contable_detalle",formulario,"","",paraEventoTabla,idFilaTabla,cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
	}
	
	actualizarSpanMensajesCampos(cierre_contable_detalle_control) {
		jQuery("#spanstrMensajeid").text(cierre_contable_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(cierre_contable_detalle_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(cierre_contable_detalle_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_detalle").text(cierre_contable_detalle_control.strMensajeid_detalle);		
		jQuery("#spanstrMensajeid_cierre_contable").text(cierre_contable_detalle_control.strMensajeid_cierre_contable);		
		jQuery("#spanstrMensajenro_documento").text(cierre_contable_detalle_control.strMensajenro_documento);		
		jQuery("#spanstrMensajetipo_factura").text(cierre_contable_detalle_control.strMensajetipo_factura);		
		jQuery("#spanstrMensajemonto").text(cierre_contable_detalle_control.strMensajemonto);		
	}
	
	actualizarCssBotonesMantenimiento(cierre_contable_detalle_control) {
		jQuery("#tdbtnNuevocierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocierre_contable_detalle").css("display",cierre_contable_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcierre_contable_detalle").css("display",cierre_contable_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcierre_contable_detalle").css("display",cierre_contable_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscierre_contable_detalle").css("display",cierre_contable_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcierre_contable_detalle").css("visibility",cierre_contable_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarComboscierre_contablesFK(cierre_contable_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable",cierre_contable_detalle_control.cierre_contablesFK);

		if(cierre_contable_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cierre_contable_detalle_control.idFilaTablaActual+"_4",cierre_contable_detalle_control.cierre_contablesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable-cmbid_cierre_contable",cierre_contable_detalle_control.cierre_contablesFK);

	};

	
	
	registrarComboActionChangeComboscierre_contablesFK(cierre_contable_detalle_control) {

	};

	
	
	setDefectoValorComboscierre_contablesFK(cierre_contable_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cierre_contable_detalle_control.idcierre_contableDefaultFK>-1 && jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").val() != cierre_contable_detalle_control.idcierre_contableDefaultFK) {
				jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").val(cierre_contable_detalle_control.idcierre_contableDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable-cmbid_cierre_contable").val(cierre_contable_detalle_control.idcierre_contableDefaultForeignKey).trigger("change");
			if(jQuery("#"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable-cmbid_cierre_contable").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable-cmbid_cierre_contable").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cierre_contable_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(cierre_contable_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cierre_contable_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cierre_contable",cierre_contable_detalle_control.strRecargarFkTipos,",")) { 
				cierre_contable_detalle_webcontrol1.setDefectoValorComboscierre_contablesFK(cierre_contable_detalle_control);
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
	onLoadCombosEventosFK(cierre_contable_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cierre_contable_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cierre_contable",cierre_contable_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cierre_contable_detalle_webcontrol1.registrarComboActionChangeComboscierre_contablesFK(cierre_contable_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cierre_contable_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cierre_contable_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(cierre_contable_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				cierre_contable_detalle_funcion1.validarFormularioJQuery(cierre_contable_detalle_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cierre_contable_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cierre_contable_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,"cierre_contable_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cierre_contable","id_cierre_contable","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable_img_busqueda").click(function(){
				cierre_contable_detalle_webcontrol1.abrirBusquedaParacierre_contable("id_cierre_contable");
				//alert(jQuery('#form-id_cierre_contable_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cierre_contable_detalle_control) {
		
		
		
		if(cierre_contable_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdcierre_contable_detalleActualizarToolBar").css("display",cierre_contable_detalle_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcierre_contable_detalleEliminarToolBar").css("display",cierre_contable_detalle_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcierre_contable_detalleElementos").css("display",cierre_contable_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trcierre_contable_detalleAcciones").css("display",cierre_contable_detalle_control.strVisibleTablaAcciones);
		jQuery("#trcierre_contable_detalleParametrosAcciones").css("display",cierre_contable_detalle_control.strVisibleTablaAcciones);
		
		jQuery("#tdcierre_contable_detalleCerrarPagina").css("display",cierre_contable_detalle_control.strPermisoPopup);		
		jQuery("#tdcierre_contable_detalleCerrarPaginaToolBar").css("display",cierre_contable_detalle_control.strPermisoPopup);
		//jQuery("#trcierre_contable_detalleAccionesRelaciones").css("display",cierre_contable_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cierre_contable_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cierre_contable_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cierre_contable_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cierre Detalles";
		sTituloBanner+=" - " + cierre_contable_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cierre_contable_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcierre_contable_detalleRelacionesToolBar").css("display",cierre_contable_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscierre_contable_detalle").css("display",cierre_contable_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cierre_contable_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cierre_contable_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cierre_contable_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cierre_contable_detalle_webcontrol1.registrarEventosControles();
		
		if(cierre_contable_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="false") {
			cierre_contable_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cierre_contable_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(cierre_contable_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				cierre_contable_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cierre_contable_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cierre_contable_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(cierre_contable_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(cierre_contable_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
						//cierre_contable_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(cierre_contable_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cierre_contable_detalle_constante1.BIG_ID_ACTUAL,"cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
						//cierre_contable_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			cierre_contable_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);	
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

var cierre_contable_detalle_webcontrol1 = new cierre_contable_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cierre_contable_detalle_webcontrol,cierre_contable_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.cierre_contable_detalle_webcontrol1 = cierre_contable_detalle_webcontrol1;


if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cierre_contable_detalle_webcontrol1.onLoadWindow; 
}

//</script>