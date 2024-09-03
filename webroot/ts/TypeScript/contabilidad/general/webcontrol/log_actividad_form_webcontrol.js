//<script type="text/javascript" language="javascript">



//var log_actividadJQueryPaginaWebInteraccion= function (log_actividad_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {log_actividad_constante,log_actividad_constante1} from '../util/log_actividad_constante.js';

import {log_actividad_funcion,log_actividad_funcion1} from '../util/log_actividad_form_funcion.js';


class log_actividad_webcontrol extends GeneralEntityWebControl {
	
	log_actividad_control=null;
	log_actividad_controlInicial=null;
	log_actividad_controlAuxiliar=null;
		
	//if(log_actividad_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(log_actividad_control) {
		super();
		
		this.log_actividad_control=log_actividad_control;
	}
		
	actualizarVariablesPagina(log_actividad_control) {
		
		if(log_actividad_control.action=="index" || log_actividad_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(log_actividad_control);
			
		} 
		
		
		
	
		else if(log_actividad_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(log_actividad_control);	
		
		} else if(log_actividad_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(log_actividad_control);		
		}
	
	
		
		
		else if(log_actividad_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(log_actividad_control);
		
		} else if(log_actividad_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(log_actividad_control);
		
		} else if(log_actividad_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(log_actividad_control);
		
		} else if(log_actividad_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(log_actividad_control);
		
		} else if(log_actividad_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(log_actividad_control);
		
		} else if(log_actividad_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(log_actividad_control);		
		
		} else if(log_actividad_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(log_actividad_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + log_actividad_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(log_actividad_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(log_actividad_control) {
		this.actualizarPaginaAccionesGenerales(log_actividad_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(log_actividad_control) {
		
		this.actualizarPaginaCargaGeneral(log_actividad_control);
		this.actualizarPaginaOrderBy(log_actividad_control);
		this.actualizarPaginaTablaDatos(log_actividad_control);
		this.actualizarPaginaCargaGeneralControles(log_actividad_control);
		//this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(log_actividad_control);
		this.actualizarPaginaAreaBusquedas(log_actividad_control);
		this.actualizarPaginaCargaCombosFK(log_actividad_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(log_actividad_control) {
		//this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(log_actividad_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(log_actividad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(log_actividad_control);		
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(log_actividad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(log_actividad_control);		
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(log_actividad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(log_actividad_control);		
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(log_actividad_control) {
		this.actualizarPaginaCargaGeneralControles(log_actividad_control);
		this.actualizarPaginaCargaCombosFK(log_actividad_control);
		this.actualizarPaginaFormulario(log_actividad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(log_actividad_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(log_actividad_control) {
		this.actualizarPaginaCargaGeneralControles(log_actividad_control);
		this.actualizarPaginaCargaCombosFK(log_actividad_control);
		this.actualizarPaginaFormulario(log_actividad_control);
		this.onLoadCombosDefectoFK(log_actividad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		this.actualizarPaginaAreaMantenimiento(log_actividad_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(log_actividad_control) {
		//FORMULARIO
		if(log_actividad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(log_actividad_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(log_actividad_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);		
		
		//COMBOS FK
		if(log_actividad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(log_actividad_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(log_actividad_control) {
		//FORMULARIO
		if(log_actividad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(log_actividad_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(log_actividad_control);	
		//COMBOS FK
		if(log_actividad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(log_actividad_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(log_actividad_control) {
		
		if(log_actividad_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(log_actividad_control);
		}
		
		if(log_actividad_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(log_actividad_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(log_actividad_control) {
		if(log_actividad_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("log_actividadReturnGeneral",JSON.stringify(log_actividad_control.log_actividadReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(log_actividad_control) {
		if(log_actividad_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && log_actividad_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(log_actividad_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(log_actividad_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(log_actividad_control, mostrar) {
		
		if(mostrar==true) {
			log_actividad_funcion1.resaltarRestaurarDivsPagina(false,"log_actividad");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				log_actividad_funcion1.resaltarRestaurarDivMantenimiento(false,"log_actividad");
			}			
			
			log_actividad_funcion1.mostrarDivMensaje(true,log_actividad_control.strAuxiliarMensaje,log_actividad_control.strAuxiliarCssMensaje);
		
		} else {
			log_actividad_funcion1.mostrarDivMensaje(false,log_actividad_control.strAuxiliarMensaje,log_actividad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(log_actividad_control) {
		if(log_actividad_funcion1.esPaginaForm(log_actividad_constante1)==true) {
			window.opener.log_actividad_webcontrol1.actualizarPaginaTablaDatos(log_actividad_control);
		} else {
			this.actualizarPaginaTablaDatos(log_actividad_control);
		}
	}
	
	actualizarPaginaAbrirLink(log_actividad_control) {
		log_actividad_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(log_actividad_control.strAuxiliarUrlPagina);
				
		log_actividad_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(log_actividad_control.strAuxiliarTipo,log_actividad_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(log_actividad_control) {
		log_actividad_funcion1.resaltarRestaurarDivMensaje(true,log_actividad_control.strAuxiliarMensajeAlert,log_actividad_control.strAuxiliarCssMensaje);
			
		if(log_actividad_funcion1.esPaginaForm(log_actividad_constante1)==true) {
			window.opener.log_actividad_funcion1.resaltarRestaurarDivMensaje(true,log_actividad_control.strAuxiliarMensajeAlert,log_actividad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(log_actividad_control) {
		this.log_actividad_controlInicial=log_actividad_control;
			
		if(log_actividad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(log_actividad_control.strStyleDivArbol,log_actividad_control.strStyleDivContent
																,log_actividad_control.strStyleDivOpcionesBanner,log_actividad_control.strStyleDivExpandirColapsar
																,log_actividad_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(log_actividad_control) {
		this.actualizarCssBotonesPagina(log_actividad_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(log_actividad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(log_actividad_control.tiposReportes,log_actividad_control.tiposReporte
															 	,log_actividad_control.tiposPaginacion,log_actividad_control.tiposAcciones
																,log_actividad_control.tiposColumnasSelect,log_actividad_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(log_actividad_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(log_actividad_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(log_actividad_control);			
	}
	
	actualizarPaginaUsuarioInvitado(log_actividad_control) {
	
		var indexPosition=log_actividad_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=log_actividad_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(log_actividad_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(log_actividad_control.strRecargarFkTiposNinguno!=null && log_actividad_control.strRecargarFkTiposNinguno!='NINGUNO' && log_actividad_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(log_actividad_control) {
		jQuery("#tdlog_actividadNuevo").css("display",log_actividad_control.strPermisoNuevo);
		jQuery("#trlog_actividadElementos").css("display",log_actividad_control.strVisibleTablaElementos);
		jQuery("#trlog_actividadAcciones").css("display",log_actividad_control.strVisibleTablaAcciones);
		jQuery("#trlog_actividadParametrosAcciones").css("display",log_actividad_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(log_actividad_control) {
	
		this.actualizarCssBotonesMantenimiento(log_actividad_control);
				
		if(log_actividad_control.log_actividadActual!=null) {//form
			
			this.actualizarCamposFormulario(log_actividad_control);			
		}
						
		this.actualizarSpanMensajesCampos(log_actividad_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(log_actividad_control) {
	
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-id").val(log_actividad_control.log_actividadActual.id);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-version_row").val(log_actividad_control.log_actividadActual.versionRow);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-log_id").val(log_actividad_control.log_actividadActual.log_id);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-fecha").val(log_actividad_control.log_actividadActual.fecha);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-hora").val(log_actividad_control.log_actividadActual.hora);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-computador").val(log_actividad_control.log_actividadActual.computador);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-usuario").val(log_actividad_control.log_actividadActual.usuario);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-descripcion").val(log_actividad_control.log_actividadActual.descripcion);
		jQuery("#form"+log_actividad_constante1.STR_SUFIJO+"-modulo").val(log_actividad_control.log_actividadActual.modulo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+log_actividad_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("log_actividad","general","","form_log_actividad",formulario,"","",paraEventoTabla,idFilaTabla,log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
	}
	
	actualizarSpanMensajesCampos(log_actividad_control) {
		jQuery("#spanstrMensajeid").text(log_actividad_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(log_actividad_control.strMensajeversion_row);		
		jQuery("#spanstrMensajelog_id").text(log_actividad_control.strMensajelog_id);		
		jQuery("#spanstrMensajefecha").text(log_actividad_control.strMensajefecha);		
		jQuery("#spanstrMensajehora").text(log_actividad_control.strMensajehora);		
		jQuery("#spanstrMensajecomputador").text(log_actividad_control.strMensajecomputador);		
		jQuery("#spanstrMensajeusuario").text(log_actividad_control.strMensajeusuario);		
		jQuery("#spanstrMensajedescripcion").text(log_actividad_control.strMensajedescripcion);		
		jQuery("#spanstrMensajemodulo").text(log_actividad_control.strMensajemodulo);		
	}
	
	actualizarCssBotonesMantenimiento(log_actividad_control) {
		jQuery("#tdbtnNuevolog_actividad").css("visibility",log_actividad_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevolog_actividad").css("display",log_actividad_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarlog_actividad").css("visibility",log_actividad_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarlog_actividad").css("display",log_actividad_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarlog_actividad").css("visibility",log_actividad_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarlog_actividad").css("display",log_actividad_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarlog_actividad").css("visibility",log_actividad_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioslog_actividad").css("visibility",log_actividad_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioslog_actividad").css("display",log_actividad_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarlog_actividad").css("visibility",log_actividad_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarlog_actividad").css("visibility",log_actividad_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarlog_actividad").css("visibility",log_actividad_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//log_actividad_control
		
	
	}
	
	onLoadCombosDefectoFK(log_actividad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(log_actividad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(log_actividad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(log_actividad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(log_actividad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(log_actividad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(log_actividad_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(log_actividad_constante1.BIT_ES_PAGINA_FORM==true) {
				log_actividad_funcion1.validarFormularioJQuery(log_actividad_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("log_actividad");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("log_actividad");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(log_actividad_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,"log_actividad");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(log_actividad_control) {
		
		
		
		if(log_actividad_control.strPermisoActualizar!=null) {
			jQuery("#tdlog_actividadActualizarToolBar").css("display",log_actividad_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdlog_actividadEliminarToolBar").css("display",log_actividad_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trlog_actividadElementos").css("display",log_actividad_control.strVisibleTablaElementos);
		
		jQuery("#trlog_actividadAcciones").css("display",log_actividad_control.strVisibleTablaAcciones);
		jQuery("#trlog_actividadParametrosAcciones").css("display",log_actividad_control.strVisibleTablaAcciones);
		
		jQuery("#tdlog_actividadCerrarPagina").css("display",log_actividad_control.strPermisoPopup);		
		jQuery("#tdlog_actividadCerrarPaginaToolBar").css("display",log_actividad_control.strPermisoPopup);
		//jQuery("#trlog_actividadAccionesRelaciones").css("display",log_actividad_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=log_actividad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + log_actividad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + log_actividad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Log Actividadeses";
		sTituloBanner+=" - " + log_actividad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + log_actividad_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdlog_actividadRelacionesToolBar").css("display",log_actividad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoslog_actividad").css("display",log_actividad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		log_actividad_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		log_actividad_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		log_actividad_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		log_actividad_webcontrol1.registrarEventosControles();
		
		if(log_actividad_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(log_actividad_constante1.STR_ES_RELACIONADO=="false") {
			log_actividad_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(log_actividad_constante1.STR_ES_RELACIONES=="true") {
			if(log_actividad_constante1.BIT_ES_PAGINA_FORM==true) {
				log_actividad_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(log_actividad_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(log_actividad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(log_actividad_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(log_actividad_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
						//log_actividad_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(log_actividad_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(log_actividad_constante1.BIG_ID_ACTUAL,"log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);
						//log_actividad_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			log_actividad_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("log_actividad","general","",log_actividad_funcion1,log_actividad_webcontrol1,log_actividad_constante1);	
	}
}

var log_actividad_webcontrol1 = new log_actividad_webcontrol();

//Para ser llamado desde otro archivo (import)
export {log_actividad_webcontrol,log_actividad_webcontrol1};

//Para ser llamado desde window.opener
window.log_actividad_webcontrol1 = log_actividad_webcontrol1;


if(log_actividad_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = log_actividad_webcontrol1.onLoadWindow; 
}

//</script>