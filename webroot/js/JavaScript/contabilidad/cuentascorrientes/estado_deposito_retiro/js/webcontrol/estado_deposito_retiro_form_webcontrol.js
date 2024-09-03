//<script type="text/javascript" language="javascript">



//var estado_deposito_retiroJQueryPaginaWebInteraccion= function (estado_deposito_retiro_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {estado_deposito_retiro_constante,estado_deposito_retiro_constante1} from '../util/estado_deposito_retiro_constante.js';

import {estado_deposito_retiro_funcion,estado_deposito_retiro_funcion1} from '../util/estado_deposito_retiro_form_funcion.js';


class estado_deposito_retiro_webcontrol extends GeneralEntityWebControl {
	
	estado_deposito_retiro_control=null;
	estado_deposito_retiro_controlInicial=null;
	estado_deposito_retiro_controlAuxiliar=null;
		
	//if(estado_deposito_retiro_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(estado_deposito_retiro_control) {
		super();
		
		this.estado_deposito_retiro_control=estado_deposito_retiro_control;
	}
		
	actualizarVariablesPagina(estado_deposito_retiro_control) {
		
		if(estado_deposito_retiro_control.action=="index" || estado_deposito_retiro_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(estado_deposito_retiro_control);
			
		} 
		
		
		
	
		else if(estado_deposito_retiro_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(estado_deposito_retiro_control);	
		
		} else if(estado_deposito_retiro_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(estado_deposito_retiro_control);		
		}
	
		else if(estado_deposito_retiro_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(estado_deposito_retiro_control);		
		}
	
		
		
		else if(estado_deposito_retiro_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(estado_deposito_retiro_control);		
		
		} else if(estado_deposito_retiro_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(estado_deposito_retiro_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + estado_deposito_retiro_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(estado_deposito_retiro_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(estado_deposito_retiro_control) {
		this.actualizarPaginaAccionesGenerales(estado_deposito_retiro_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(estado_deposito_retiro_control) {
		
		this.actualizarPaginaCargaGeneral(estado_deposito_retiro_control);
		this.actualizarPaginaOrderBy(estado_deposito_retiro_control);
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);
		this.actualizarPaginaCargaGeneralControles(estado_deposito_retiro_control);
		//this.actualizarPaginaFormulario(estado_deposito_retiro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estado_deposito_retiro_control);
		this.actualizarPaginaAreaBusquedas(estado_deposito_retiro_control);
		this.actualizarPaginaCargaCombosFK(estado_deposito_retiro_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(estado_deposito_retiro_control) {
		//this.actualizarPaginaFormulario(estado_deposito_retiro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(estado_deposito_retiro_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estado_deposito_retiro_control);		
		this.actualizarPaginaFormulario(estado_deposito_retiro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estado_deposito_retiro_control);		
		this.actualizarPaginaFormulario(estado_deposito_retiro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatosAuxiliar(estado_deposito_retiro_control);		
		this.actualizarPaginaFormulario(estado_deposito_retiro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(estado_deposito_retiro_control) {
		this.actualizarPaginaCargaGeneralControles(estado_deposito_retiro_control);
		this.actualizarPaginaCargaCombosFK(estado_deposito_retiro_control);
		this.actualizarPaginaFormulario(estado_deposito_retiro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(estado_deposito_retiro_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(estado_deposito_retiro_control) {
		this.actualizarPaginaCargaGeneralControles(estado_deposito_retiro_control);
		this.actualizarPaginaCargaCombosFK(estado_deposito_retiro_control);
		this.actualizarPaginaFormulario(estado_deposito_retiro_control);
		this.onLoadCombosDefectoFK(estado_deposito_retiro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(estado_deposito_retiro_control) {
		//FORMULARIO
		if(estado_deposito_retiro_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(estado_deposito_retiro_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(estado_deposito_retiro_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		
		//COMBOS FK
		if(estado_deposito_retiro_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(estado_deposito_retiro_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(estado_deposito_retiro_control) {
		//FORMULARIO
		if(estado_deposito_retiro_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(estado_deposito_retiro_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);	
		//COMBOS FK
		if(estado_deposito_retiro_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(estado_deposito_retiro_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(estado_deposito_retiro_control) {
		
		if(estado_deposito_retiro_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(estado_deposito_retiro_control);
		}
		
		if(estado_deposito_retiro_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(estado_deposito_retiro_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(estado_deposito_retiro_control) {
		if(estado_deposito_retiro_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("estado_deposito_retiroReturnGeneral",JSON.stringify(estado_deposito_retiro_control.estado_deposito_retiroReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control) {
		if(estado_deposito_retiro_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && estado_deposito_retiro_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(estado_deposito_retiro_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(estado_deposito_retiro_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(estado_deposito_retiro_control, mostrar) {
		
		if(mostrar==true) {
			estado_deposito_retiro_funcion1.resaltarRestaurarDivsPagina(false,"estado_deposito_retiro");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				estado_deposito_retiro_funcion1.resaltarRestaurarDivMantenimiento(false,"estado_deposito_retiro");
			}			
			
			estado_deposito_retiro_funcion1.mostrarDivMensaje(true,estado_deposito_retiro_control.strAuxiliarMensaje,estado_deposito_retiro_control.strAuxiliarCssMensaje);
		
		} else {
			estado_deposito_retiro_funcion1.mostrarDivMensaje(false,estado_deposito_retiro_control.strAuxiliarMensaje,estado_deposito_retiro_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(estado_deposito_retiro_control) {
		if(estado_deposito_retiro_funcion1.esPaginaForm(estado_deposito_retiro_constante1)==true) {
			window.opener.estado_deposito_retiro_webcontrol1.actualizarPaginaTablaDatos(estado_deposito_retiro_control);
		} else {
			this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);
		}
	}
	
	actualizarPaginaAbrirLink(estado_deposito_retiro_control) {
		estado_deposito_retiro_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(estado_deposito_retiro_control.strAuxiliarUrlPagina);
				
		estado_deposito_retiro_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(estado_deposito_retiro_control.strAuxiliarTipo,estado_deposito_retiro_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(estado_deposito_retiro_control) {
		estado_deposito_retiro_funcion1.resaltarRestaurarDivMensaje(true,estado_deposito_retiro_control.strAuxiliarMensajeAlert,estado_deposito_retiro_control.strAuxiliarCssMensaje);
			
		if(estado_deposito_retiro_funcion1.esPaginaForm(estado_deposito_retiro_constante1)==true) {
			window.opener.estado_deposito_retiro_funcion1.resaltarRestaurarDivMensaje(true,estado_deposito_retiro_control.strAuxiliarMensajeAlert,estado_deposito_retiro_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(estado_deposito_retiro_control) {
		this.estado_deposito_retiro_controlInicial=estado_deposito_retiro_control;
			
		if(estado_deposito_retiro_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(estado_deposito_retiro_control.strStyleDivArbol,estado_deposito_retiro_control.strStyleDivContent
																,estado_deposito_retiro_control.strStyleDivOpcionesBanner,estado_deposito_retiro_control.strStyleDivExpandirColapsar
																,estado_deposito_retiro_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(estado_deposito_retiro_control) {
		this.actualizarCssBotonesPagina(estado_deposito_retiro_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(estado_deposito_retiro_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(estado_deposito_retiro_control.tiposReportes,estado_deposito_retiro_control.tiposReporte
															 	,estado_deposito_retiro_control.tiposPaginacion,estado_deposito_retiro_control.tiposAcciones
																,estado_deposito_retiro_control.tiposColumnasSelect,estado_deposito_retiro_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(estado_deposito_retiro_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(estado_deposito_retiro_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(estado_deposito_retiro_control);			
	}
	
	actualizarPaginaUsuarioInvitado(estado_deposito_retiro_control) {
	
		var indexPosition=estado_deposito_retiro_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=estado_deposito_retiro_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(estado_deposito_retiro_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(estado_deposito_retiro_control.strRecargarFkTiposNinguno!=null && estado_deposito_retiro_control.strRecargarFkTiposNinguno!='NINGUNO' && estado_deposito_retiro_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control) {
		jQuery("#tdestado_deposito_retiroNuevo").css("display",estado_deposito_retiro_control.strPermisoNuevo);
		jQuery("#trestado_deposito_retiroElementos").css("display",estado_deposito_retiro_control.strVisibleTablaElementos);
		jQuery("#trestado_deposito_retiroAcciones").css("display",estado_deposito_retiro_control.strVisibleTablaAcciones);
		jQuery("#trestado_deposito_retiroParametrosAcciones").css("display",estado_deposito_retiro_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(estado_deposito_retiro_control) {
	
		this.actualizarCssBotonesMantenimiento(estado_deposito_retiro_control);
				
		if(estado_deposito_retiro_control.estado_deposito_retiroActual!=null) {//form
			
			this.actualizarCamposFormulario(estado_deposito_retiro_control);			
		}
						
		this.actualizarSpanMensajesCampos(estado_deposito_retiro_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(estado_deposito_retiro_control) {
	
		jQuery("#form"+estado_deposito_retiro_constante1.STR_SUFIJO+"-id").val(estado_deposito_retiro_control.estado_deposito_retiroActual.id);
		jQuery("#form"+estado_deposito_retiro_constante1.STR_SUFIJO+"-created_at").val(estado_deposito_retiro_control.estado_deposito_retiroActual.versionRow);
		jQuery("#form"+estado_deposito_retiro_constante1.STR_SUFIJO+"-updated_at").val(estado_deposito_retiro_control.estado_deposito_retiroActual.versionRow);
		jQuery("#form"+estado_deposito_retiro_constante1.STR_SUFIJO+"-codigo").val(estado_deposito_retiro_control.estado_deposito_retiroActual.codigo);
		jQuery("#form"+estado_deposito_retiro_constante1.STR_SUFIJO+"-nombre").val(estado_deposito_retiro_control.estado_deposito_retiroActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+estado_deposito_retiro_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("estado_deposito_retiro","cuentascorrientes","","form_estado_deposito_retiro",formulario,"","",paraEventoTabla,idFilaTabla,estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
	}
	
	actualizarSpanMensajesCampos(estado_deposito_retiro_control) {
		jQuery("#spanstrMensajeid").text(estado_deposito_retiro_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(estado_deposito_retiro_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(estado_deposito_retiro_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajecodigo").text(estado_deposito_retiro_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(estado_deposito_retiro_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(estado_deposito_retiro_control) {
		jQuery("#tdbtnNuevoestado_deposito_retiro").css("visibility",estado_deposito_retiro_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoestado_deposito_retiro").css("display",estado_deposito_retiro_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarestado_deposito_retiro").css("visibility",estado_deposito_retiro_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarestado_deposito_retiro").css("display",estado_deposito_retiro_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarestado_deposito_retiro").css("visibility",estado_deposito_retiro_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarestado_deposito_retiro").css("display",estado_deposito_retiro_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarestado_deposito_retiro").css("visibility",estado_deposito_retiro_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosestado_deposito_retiro").css("visibility",estado_deposito_retiro_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosestado_deposito_retiro").css("display",estado_deposito_retiro_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarestado_deposito_retiro").css("visibility",estado_deposito_retiro_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarestado_deposito_retiro").css("visibility",estado_deposito_retiro_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarestado_deposito_retiro").css("visibility",estado_deposito_retiro_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	
	
	
	
	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	
	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//estado_deposito_retiro_control
		
	
	}
	
	onLoadCombosDefectoFK(estado_deposito_retiro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estado_deposito_retiro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			
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
	onLoadCombosEventosFK(estado_deposito_retiro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estado_deposito_retiro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(estado_deposito_retiro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estado_deposito_retiro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(estado_deposito_retiro_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(estado_deposito_retiro_constante1.BIT_ES_PAGINA_FORM==true) {
				estado_deposito_retiro_funcion1.validarFormularioJQuery(estado_deposito_retiro_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("estado_deposito_retiro");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("estado_deposito_retiro");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(estado_deposito_retiro_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,"estado_deposito_retiro");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(estado_deposito_retiro_control) {
		
		
		
		if(estado_deposito_retiro_control.strPermisoActualizar!=null) {
			jQuery("#tdestado_deposito_retiroActualizarToolBar").css("display",estado_deposito_retiro_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdestado_deposito_retiroEliminarToolBar").css("display",estado_deposito_retiro_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trestado_deposito_retiroElementos").css("display",estado_deposito_retiro_control.strVisibleTablaElementos);
		
		jQuery("#trestado_deposito_retiroAcciones").css("display",estado_deposito_retiro_control.strVisibleTablaAcciones);
		jQuery("#trestado_deposito_retiroParametrosAcciones").css("display",estado_deposito_retiro_control.strVisibleTablaAcciones);
		
		jQuery("#tdestado_deposito_retiroCerrarPagina").css("display",estado_deposito_retiro_control.strPermisoPopup);		
		jQuery("#tdestado_deposito_retiroCerrarPaginaToolBar").css("display",estado_deposito_retiro_control.strPermisoPopup);
		//jQuery("#trestado_deposito_retiroAccionesRelaciones").css("display",estado_deposito_retiro_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=estado_deposito_retiro_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + estado_deposito_retiro_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + estado_deposito_retiro_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Estado Deposito Retiro Cheques";
		sTituloBanner+=" - " + estado_deposito_retiro_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + estado_deposito_retiro_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdestado_deposito_retiroRelacionesToolBar").css("display",estado_deposito_retiro_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosestado_deposito_retiro").css("display",estado_deposito_retiro_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		estado_deposito_retiro_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		estado_deposito_retiro_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		estado_deposito_retiro_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		estado_deposito_retiro_webcontrol1.registrarEventosControles();
		
		if(estado_deposito_retiro_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(estado_deposito_retiro_constante1.STR_ES_RELACIONADO=="false") {
			estado_deposito_retiro_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(estado_deposito_retiro_constante1.STR_ES_RELACIONES=="true") {
			if(estado_deposito_retiro_constante1.BIT_ES_PAGINA_FORM==true) {
				estado_deposito_retiro_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(estado_deposito_retiro_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(estado_deposito_retiro_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(estado_deposito_retiro_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(estado_deposito_retiro_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
						//estado_deposito_retiro_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(estado_deposito_retiro_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(estado_deposito_retiro_constante1.BIG_ID_ACTUAL,"estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
						//estado_deposito_retiro_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			estado_deposito_retiro_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);	
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

var estado_deposito_retiro_webcontrol1 = new estado_deposito_retiro_webcontrol();

//Para ser llamado desde otro archivo (import)
export {estado_deposito_retiro_webcontrol,estado_deposito_retiro_webcontrol1};

//Para ser llamado desde window.opener
window.estado_deposito_retiro_webcontrol1 = estado_deposito_retiro_webcontrol1;


if(estado_deposito_retiro_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = estado_deposito_retiro_webcontrol1.onLoadWindow; 
}

//</script>