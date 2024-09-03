//<script type="text/javascript" language="javascript">



//var imagen_orden_compraJQueryPaginaWebInteraccion= function (imagen_orden_compra_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_orden_compra_constante,imagen_orden_compra_constante1} from '../util/imagen_orden_compra_constante.js';

import {imagen_orden_compra_funcion,imagen_orden_compra_funcion1} from '../util/imagen_orden_compra_form_funcion.js';


class imagen_orden_compra_webcontrol extends GeneralEntityWebControl {
	
	imagen_orden_compra_control=null;
	imagen_orden_compra_controlInicial=null;
	imagen_orden_compra_controlAuxiliar=null;
		
	//if(imagen_orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_orden_compra_control) {
		super();
		
		this.imagen_orden_compra_control=imagen_orden_compra_control;
	}
		
	actualizarVariablesPagina(imagen_orden_compra_control) {
		
		if(imagen_orden_compra_control.action=="index" || imagen_orden_compra_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_orden_compra_control);
			
		} 
		
		
		
	
		else if(imagen_orden_compra_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_orden_compra_control);	
		
		} else if(imagen_orden_compra_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_orden_compra_control);		
		}
	
	
		
		
		else if(imagen_orden_compra_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_orden_compra_control);		
		
		} else if(imagen_orden_compra_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_orden_compra_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_orden_compra_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_orden_compra_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_orden_compra_control) {
		this.actualizarPaginaAccionesGenerales(imagen_orden_compra_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_orden_compra_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_orden_compra_control);
		this.actualizarPaginaOrderBy(imagen_orden_compra_control);
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		this.actualizarPaginaCargaGeneralControles(imagen_orden_compra_control);
		//this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_orden_compra_control);
		this.actualizarPaginaAreaBusquedas(imagen_orden_compra_control);
		this.actualizarPaginaCargaCombosFK(imagen_orden_compra_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_orden_compra_control) {
		//this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_orden_compra_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_orden_compra_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_orden_compra_control);
		this.actualizarPaginaCargaCombosFK(imagen_orden_compra_control);
		this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(imagen_orden_compra_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_orden_compra_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_orden_compra_control);
		this.actualizarPaginaCargaCombosFK(imagen_orden_compra_control);
		this.actualizarPaginaFormulario(imagen_orden_compra_control);
		this.onLoadCombosDefectoFK(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_orden_compra_control) {
		//FORMULARIO
		if(imagen_orden_compra_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_orden_compra_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_orden_compra_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		
		//COMBOS FK
		if(imagen_orden_compra_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_orden_compra_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_orden_compra_control) {
		//FORMULARIO
		if(imagen_orden_compra_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_orden_compra_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);	
		//COMBOS FK
		if(imagen_orden_compra_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_orden_compra_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_orden_compra_control) {
		
		if(imagen_orden_compra_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_orden_compra_control);
		}
		
		if(imagen_orden_compra_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_orden_compra_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_orden_compra_control) {
		if(imagen_orden_compra_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_orden_compraReturnGeneral",JSON.stringify(imagen_orden_compra_control.imagen_orden_compraReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control) {
		if(imagen_orden_compra_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_orden_compra_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_orden_compra_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_orden_compra_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_orden_compra_control, mostrar) {
		
		if(mostrar==true) {
			imagen_orden_compra_funcion1.resaltarRestaurarDivsPagina(false,"imagen_orden_compra");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_orden_compra_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_orden_compra");
			}			
			
			imagen_orden_compra_funcion1.mostrarDivMensaje(true,imagen_orden_compra_control.strAuxiliarMensaje,imagen_orden_compra_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_orden_compra_funcion1.mostrarDivMensaje(false,imagen_orden_compra_control.strAuxiliarMensaje,imagen_orden_compra_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_orden_compra_control) {
		if(imagen_orden_compra_funcion1.esPaginaForm(imagen_orden_compra_constante1)==true) {
			window.opener.imagen_orden_compra_webcontrol1.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_orden_compra_control) {
		imagen_orden_compra_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_orden_compra_control.strAuxiliarUrlPagina);
				
		imagen_orden_compra_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_orden_compra_control.strAuxiliarTipo,imagen_orden_compra_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_orden_compra_control) {
		imagen_orden_compra_funcion1.resaltarRestaurarDivMensaje(true,imagen_orden_compra_control.strAuxiliarMensajeAlert,imagen_orden_compra_control.strAuxiliarCssMensaje);
			
		if(imagen_orden_compra_funcion1.esPaginaForm(imagen_orden_compra_constante1)==true) {
			window.opener.imagen_orden_compra_funcion1.resaltarRestaurarDivMensaje(true,imagen_orden_compra_control.strAuxiliarMensajeAlert,imagen_orden_compra_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_orden_compra_control) {
		this.imagen_orden_compra_controlInicial=imagen_orden_compra_control;
			
		if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_orden_compra_control.strStyleDivArbol,imagen_orden_compra_control.strStyleDivContent
																,imagen_orden_compra_control.strStyleDivOpcionesBanner,imagen_orden_compra_control.strStyleDivExpandirColapsar
																,imagen_orden_compra_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_orden_compra_control) {
		this.actualizarCssBotonesPagina(imagen_orden_compra_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_orden_compra_control.tiposReportes,imagen_orden_compra_control.tiposReporte
															 	,imagen_orden_compra_control.tiposPaginacion,imagen_orden_compra_control.tiposAcciones
																,imagen_orden_compra_control.tiposColumnasSelect,imagen_orden_compra_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_orden_compra_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_orden_compra_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_orden_compra_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_orden_compra_control) {
	
		var indexPosition=imagen_orden_compra_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_orden_compra_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_orden_compra_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_orden_compra_control.strRecargarFkTiposNinguno!=null && imagen_orden_compra_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_orden_compra_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(imagen_orden_compra_control) {
		jQuery("#tdimagen_orden_compraNuevo").css("display",imagen_orden_compra_control.strPermisoNuevo);
		jQuery("#trimagen_orden_compraElementos").css("display",imagen_orden_compra_control.strVisibleTablaElementos);
		jQuery("#trimagen_orden_compraAcciones").css("display",imagen_orden_compra_control.strVisibleTablaAcciones);
		jQuery("#trimagen_orden_compraParametrosAcciones").css("display",imagen_orden_compra_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_orden_compra_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_orden_compra_control);
				
		if(imagen_orden_compra_control.imagen_orden_compraActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_orden_compra_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_orden_compra_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_orden_compra_control) {
	
		jQuery("#form"+imagen_orden_compra_constante1.STR_SUFIJO+"-id").val(imagen_orden_compra_control.imagen_orden_compraActual.id);
		jQuery("#form"+imagen_orden_compra_constante1.STR_SUFIJO+"-version_row").val(imagen_orden_compra_control.imagen_orden_compraActual.versionRow);
		jQuery("#form"+imagen_orden_compra_constante1.STR_SUFIJO+"-imagen").val(imagen_orden_compra_control.imagen_orden_compraActual.imagen);
		jQuery("#form"+imagen_orden_compra_constante1.STR_SUFIJO+"-nro_compra").val(imagen_orden_compra_control.imagen_orden_compraActual.nro_compra);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_orden_compra_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_orden_compra","inventario","","form_imagen_orden_compra",formulario,"","",paraEventoTabla,idFilaTabla,imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
	}
	
	actualizarSpanMensajesCampos(imagen_orden_compra_control) {
		jQuery("#spanstrMensajeid").text(imagen_orden_compra_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_orden_compra_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeimagen").text(imagen_orden_compra_control.strMensajeimagen);		
		jQuery("#spanstrMensajenro_compra").text(imagen_orden_compra_control.strMensajenro_compra);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_orden_compra_control) {
		jQuery("#tdbtnNuevoimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_orden_compra").css("display",imagen_orden_compra_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_orden_compra").css("display",imagen_orden_compra_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_orden_compra").css("display",imagen_orden_compra_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_orden_compra").css("display",imagen_orden_compra_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_orden_compra").css("visibility",imagen_orden_compra_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_orden_compra_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(imagen_orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(imagen_orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_orden_compra_funcion1.validarFormularioJQuery(imagen_orden_compra_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_orden_compra");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_orden_compra");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,"imagen_orden_compra");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_orden_compra_control) {
		
		
		
		if(imagen_orden_compra_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_orden_compraActualizarToolBar").css("display",imagen_orden_compra_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdimagen_orden_compraEliminarToolBar").css("display",imagen_orden_compra_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trimagen_orden_compraElementos").css("display",imagen_orden_compra_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_orden_compraAcciones").css("display",imagen_orden_compra_control.strVisibleTablaAcciones);
		jQuery("#trimagen_orden_compraParametrosAcciones").css("display",imagen_orden_compra_control.strVisibleTablaAcciones);
		
		jQuery("#tdimagen_orden_compraCerrarPagina").css("display",imagen_orden_compra_control.strPermisoPopup);		
		jQuery("#tdimagen_orden_compraCerrarPaginaToolBar").css("display",imagen_orden_compra_control.strPermisoPopup);
		//jQuery("#trimagen_orden_compraAccionesRelaciones").css("display",imagen_orden_compra_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_orden_compra_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_orden_compra_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_orden_compra_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Orden Compras";
		sTituloBanner+=" - " + imagen_orden_compra_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_orden_compra_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_orden_compraRelacionesToolBar").css("display",imagen_orden_compra_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_orden_compra").css("display",imagen_orden_compra_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_orden_compra_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_orden_compra_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_orden_compra_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_orden_compra_webcontrol1.registrarEventosControles();
		
		if(imagen_orden_compra_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			imagen_orden_compra_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_orden_compra_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_orden_compra_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_orden_compra_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_orden_compra_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(imagen_orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(imagen_orden_compra_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
						//imagen_orden_compra_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(imagen_orden_compra_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_orden_compra_constante1.BIG_ID_ACTUAL,"imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
						//imagen_orden_compra_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			imagen_orden_compra_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);	
	}
}

var imagen_orden_compra_webcontrol1 = new imagen_orden_compra_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_orden_compra_webcontrol,imagen_orden_compra_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_orden_compra_webcontrol1 = imagen_orden_compra_webcontrol1;


if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_orden_compra_webcontrol1.onLoadWindow; 
}

//</script>