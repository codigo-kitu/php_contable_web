//<script type="text/javascript" language="javascript">



//var imagen_cotizacionJQueryPaginaWebInteraccion= function (imagen_cotizacion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_cotizacion_constante,imagen_cotizacion_constante1} from '../util/imagen_cotizacion_constante.js';

import {imagen_cotizacion_funcion,imagen_cotizacion_funcion1} from '../util/imagen_cotizacion_form_funcion.js';


class imagen_cotizacion_webcontrol extends GeneralEntityWebControl {
	
	imagen_cotizacion_control=null;
	imagen_cotizacion_controlInicial=null;
	imagen_cotizacion_controlAuxiliar=null;
		
	//if(imagen_cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_cotizacion_control) {
		super();
		
		this.imagen_cotizacion_control=imagen_cotizacion_control;
	}
		
	actualizarVariablesPagina(imagen_cotizacion_control) {
		
		if(imagen_cotizacion_control.action=="index" || imagen_cotizacion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_cotizacion_control);
			
		} 
		
		
		
	
		else if(imagen_cotizacion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_cotizacion_control);	
		
		} else if(imagen_cotizacion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_cotizacion_control);		
		}
	
	
		
		
		else if(imagen_cotizacion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_cotizacion_control);
		
		} else if(imagen_cotizacion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_cotizacion_control);		
		
		} else if(imagen_cotizacion_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_cotizacion_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_cotizacion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_cotizacion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_cotizacion_control) {
		this.actualizarPaginaAccionesGenerales(imagen_cotizacion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_cotizacion_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_cotizacion_control);
		this.actualizarPaginaOrderBy(imagen_cotizacion_control);
		this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		this.actualizarPaginaCargaGeneralControles(imagen_cotizacion_control);
		//this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_cotizacion_control);
		this.actualizarPaginaAreaBusquedas(imagen_cotizacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_cotizacion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_cotizacion_control) {
		//this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_cotizacion_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_cotizacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_cotizacion_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_cotizacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_cotizacion_control);
		this.actualizarPaginaFormulario(imagen_cotizacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(imagen_cotizacion_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_cotizacion_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_cotizacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_cotizacion_control);
		this.actualizarPaginaFormulario(imagen_cotizacion_control);
		this.onLoadCombosDefectoFK(imagen_cotizacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_cotizacion_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_cotizacion_control) {
		//FORMULARIO
		if(imagen_cotizacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_cotizacion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_cotizacion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);		
		
		//COMBOS FK
		if(imagen_cotizacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_cotizacion_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_cotizacion_control) {
		//FORMULARIO
		if(imagen_cotizacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_cotizacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control);	
		//COMBOS FK
		if(imagen_cotizacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_cotizacion_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_cotizacion_control) {
		
		if(imagen_cotizacion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_cotizacion_control);
		}
		
		if(imagen_cotizacion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_cotizacion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_cotizacion_control) {
		if(imagen_cotizacion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_cotizacionReturnGeneral",JSON.stringify(imagen_cotizacion_control.imagen_cotizacionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_cotizacion_control) {
		if(imagen_cotizacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_cotizacion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_cotizacion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_cotizacion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_cotizacion_control, mostrar) {
		
		if(mostrar==true) {
			imagen_cotizacion_funcion1.resaltarRestaurarDivsPagina(false,"imagen_cotizacion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_cotizacion_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_cotizacion");
			}			
			
			imagen_cotizacion_funcion1.mostrarDivMensaje(true,imagen_cotizacion_control.strAuxiliarMensaje,imagen_cotizacion_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_cotizacion_funcion1.mostrarDivMensaje(false,imagen_cotizacion_control.strAuxiliarMensaje,imagen_cotizacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_cotizacion_control) {
		if(imagen_cotizacion_funcion1.esPaginaForm(imagen_cotizacion_constante1)==true) {
			window.opener.imagen_cotizacion_webcontrol1.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_cotizacion_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_cotizacion_control) {
		imagen_cotizacion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_cotizacion_control.strAuxiliarUrlPagina);
				
		imagen_cotizacion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_cotizacion_control.strAuxiliarTipo,imagen_cotizacion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_cotizacion_control) {
		imagen_cotizacion_funcion1.resaltarRestaurarDivMensaje(true,imagen_cotizacion_control.strAuxiliarMensajeAlert,imagen_cotizacion_control.strAuxiliarCssMensaje);
			
		if(imagen_cotizacion_funcion1.esPaginaForm(imagen_cotizacion_constante1)==true) {
			window.opener.imagen_cotizacion_funcion1.resaltarRestaurarDivMensaje(true,imagen_cotizacion_control.strAuxiliarMensajeAlert,imagen_cotizacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_cotizacion_control) {
		this.imagen_cotizacion_controlInicial=imagen_cotizacion_control;
			
		if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_cotizacion_control.strStyleDivArbol,imagen_cotizacion_control.strStyleDivContent
																,imagen_cotizacion_control.strStyleDivOpcionesBanner,imagen_cotizacion_control.strStyleDivExpandirColapsar
																,imagen_cotizacion_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_cotizacion_control) {
		this.actualizarCssBotonesPagina(imagen_cotizacion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_cotizacion_control.tiposReportes,imagen_cotizacion_control.tiposReporte
															 	,imagen_cotizacion_control.tiposPaginacion,imagen_cotizacion_control.tiposAcciones
																,imagen_cotizacion_control.tiposColumnasSelect,imagen_cotizacion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_cotizacion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_cotizacion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_cotizacion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_cotizacion_control) {
	
		var indexPosition=imagen_cotizacion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_cotizacion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_cotizacion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_cotizacion_control.strRecargarFkTiposNinguno!=null && imagen_cotizacion_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_cotizacion_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(imagen_cotizacion_control) {
		jQuery("#tdimagen_cotizacionNuevo").css("display",imagen_cotizacion_control.strPermisoNuevo);
		jQuery("#trimagen_cotizacionElementos").css("display",imagen_cotizacion_control.strVisibleTablaElementos);
		jQuery("#trimagen_cotizacionAcciones").css("display",imagen_cotizacion_control.strVisibleTablaAcciones);
		jQuery("#trimagen_cotizacionParametrosAcciones").css("display",imagen_cotizacion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_cotizacion_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_cotizacion_control);
				
		if(imagen_cotizacion_control.imagen_cotizacionActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_cotizacion_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_cotizacion_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_cotizacion_control) {
	
		jQuery("#form"+imagen_cotizacion_constante1.STR_SUFIJO+"-id").val(imagen_cotizacion_control.imagen_cotizacionActual.id);
		jQuery("#form"+imagen_cotizacion_constante1.STR_SUFIJO+"-created_at").val(imagen_cotizacion_control.imagen_cotizacionActual.versionRow);
		jQuery("#form"+imagen_cotizacion_constante1.STR_SUFIJO+"-updated_at").val(imagen_cotizacion_control.imagen_cotizacionActual.versionRow);
		jQuery("#form"+imagen_cotizacion_constante1.STR_SUFIJO+"-imagen").val(imagen_cotizacion_control.imagen_cotizacionActual.imagen);
		jQuery("#form"+imagen_cotizacion_constante1.STR_SUFIJO+"-nro_cotizacion").val(imagen_cotizacion_control.imagen_cotizacionActual.nro_cotizacion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_cotizacion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_cotizacion","inventario","","form_imagen_cotizacion",formulario,"","",paraEventoTabla,idFilaTabla,imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
	}
	
	actualizarSpanMensajesCampos(imagen_cotizacion_control) {
		jQuery("#spanstrMensajeid").text(imagen_cotizacion_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(imagen_cotizacion_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(imagen_cotizacion_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeimagen").text(imagen_cotizacion_control.strMensajeimagen);		
		jQuery("#spanstrMensajenro_cotizacion").text(imagen_cotizacion_control.strMensajenro_cotizacion);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_cotizacion_control) {
		jQuery("#tdbtnNuevoimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_cotizacion").css("display",imagen_cotizacion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_cotizacion").css("display",imagen_cotizacion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_cotizacion").css("display",imagen_cotizacion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_cotizacion").css("display",imagen_cotizacion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_cotizacion").css("visibility",imagen_cotizacion_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_cotizacion_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(imagen_cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_cotizacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_cotizacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_cotizacion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(imagen_cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_cotizacion_funcion1.validarFormularioJQuery(imagen_cotizacion_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_cotizacion");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_cotizacion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,"imagen_cotizacion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_cotizacion_control) {
		
		
		
		if(imagen_cotizacion_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_cotizacionActualizarToolBar").css("display",imagen_cotizacion_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdimagen_cotizacionEliminarToolBar").css("display",imagen_cotizacion_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trimagen_cotizacionElementos").css("display",imagen_cotizacion_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_cotizacionAcciones").css("display",imagen_cotizacion_control.strVisibleTablaAcciones);
		jQuery("#trimagen_cotizacionParametrosAcciones").css("display",imagen_cotizacion_control.strVisibleTablaAcciones);
		
		jQuery("#tdimagen_cotizacionCerrarPagina").css("display",imagen_cotizacion_control.strPermisoPopup);		
		jQuery("#tdimagen_cotizacionCerrarPaginaToolBar").css("display",imagen_cotizacion_control.strPermisoPopup);
		//jQuery("#trimagen_cotizacionAccionesRelaciones").css("display",imagen_cotizacion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_cotizacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_cotizacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_cotizacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Cotizaciones";
		sTituloBanner+=" - " + imagen_cotizacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_cotizacion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_cotizacionRelacionesToolBar").css("display",imagen_cotizacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_cotizacion").css("display",imagen_cotizacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_cotizacion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_cotizacion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_cotizacion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_cotizacion_webcontrol1.registrarEventosControles();
		
		if(imagen_cotizacion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="false") {
			imagen_cotizacion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_cotizacion_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_cotizacion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_cotizacion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_cotizacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(imagen_cotizacion_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(imagen_cotizacion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
						//imagen_cotizacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(imagen_cotizacion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_cotizacion_constante1.BIG_ID_ACTUAL,"imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);
						//imagen_cotizacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			imagen_cotizacion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_cotizacion","inventario","",imagen_cotizacion_funcion1,imagen_cotizacion_webcontrol1,imagen_cotizacion_constante1);	
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

var imagen_cotizacion_webcontrol1 = new imagen_cotizacion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_cotizacion_webcontrol,imagen_cotizacion_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_cotizacion_webcontrol1 = imagen_cotizacion_webcontrol1;


if(imagen_cotizacion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_cotizacion_webcontrol1.onLoadWindow; 
}

//</script>