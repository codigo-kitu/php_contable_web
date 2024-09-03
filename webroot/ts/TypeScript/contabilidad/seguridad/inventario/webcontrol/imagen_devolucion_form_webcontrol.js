//<script type="text/javascript" language="javascript">



//var imagen_devolucionJQueryPaginaWebInteraccion= function (imagen_devolucion_control) {
//this.,this.,this.

import {imagen_devolucion_constante,imagen_devolucion_constante1} from '../util/imagen_devolucion_constante.js';

import {imagen_devolucion_funcion,imagen_devolucion_funcion1} from '../util/imagen_devolucion_form_funcion.js';


class imagen_devolucion_webcontrol extends GeneralEntityWebControl {
	
	imagen_devolucion_control=null;
	imagen_devolucion_controlInicial=null;
	imagen_devolucion_controlAuxiliar=null;
		
	//if(imagen_devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_devolucion_control) {
		super();
		
		this.imagen_devolucion_control=imagen_devolucion_control;
	}
		
	actualizarVariablesPagina(imagen_devolucion_control) {
		
		if(imagen_devolucion_control.action=="index" || imagen_devolucion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_devolucion_control);
			
		} 
		
		
		
	
		else if(imagen_devolucion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_devolucion_control);	
		
		} else if(imagen_devolucion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_devolucion_control);		
		}
	
	
		
		
		else if(imagen_devolucion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_devolucion_control);
		
		} else if(imagen_devolucion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_devolucion_control);		
		
		} else if(imagen_devolucion_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_devolucion_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_devolucion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_devolucion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_devolucion_control) {
		this.actualizarPaginaAccionesGenerales(imagen_devolucion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_devolucion_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_devolucion_control);
		this.actualizarPaginaOrderBy(imagen_devolucion_control);
		this.actualizarPaginaTablaDatos(imagen_devolucion_control);
		this.actualizarPaginaCargaGeneralControles(imagen_devolucion_control);
		//this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_devolucion_control);
		this.actualizarPaginaAreaBusquedas(imagen_devolucion_control);
		this.actualizarPaginaCargaCombosFK(imagen_devolucion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_devolucion_control) {
		//this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_devolucion_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_devolucion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_devolucion_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_devolucion_control);
		this.actualizarPaginaCargaCombosFK(imagen_devolucion_control);
		this.actualizarPaginaFormulario(imagen_devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(imagen_devolucion_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_devolucion_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_devolucion_control);
		this.actualizarPaginaCargaCombosFK(imagen_devolucion_control);
		this.actualizarPaginaFormulario(imagen_devolucion_control);
		this.onLoadCombosDefectoFK(imagen_devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_devolucion_control) {
		//FORMULARIO
		if(imagen_devolucion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_devolucion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_devolucion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);		
		
		//COMBOS FK
		if(imagen_devolucion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_devolucion_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_devolucion_control) {
		//FORMULARIO
		if(imagen_devolucion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_devolucion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control);	
		//COMBOS FK
		if(imagen_devolucion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_devolucion_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_devolucion_control) {
		
		if(imagen_devolucion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_devolucion_control);
		}
		
		if(imagen_devolucion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_devolucion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_devolucion_control) {
		if(imagen_devolucion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_devolucionReturnGeneral",JSON.stringify(imagen_devolucion_control.imagen_devolucionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_control) {
		if(imagen_devolucion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_devolucion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_devolucion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_devolucion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_devolucion_control, mostrar) {
		
		if(mostrar==true) {
			imagen_devolucion_funcion1.resaltarRestaurarDivsPagina(false,"imagen_devolucion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_devolucion_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_devolucion");
			}			
			
			imagen_devolucion_funcion1.mostrarDivMensaje(true,imagen_devolucion_control.strAuxiliarMensaje,imagen_devolucion_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_devolucion_funcion1.mostrarDivMensaje(false,imagen_devolucion_control.strAuxiliarMensaje,imagen_devolucion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_devolucion_control) {
		if(imagen_devolucion_funcion1.esPaginaForm(imagen_devolucion_constante1)==true) {
			window.opener.imagen_devolucion_webcontrol1.actualizarPaginaTablaDatos(imagen_devolucion_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_devolucion_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_devolucion_control) {
		imagen_devolucion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_devolucion_control.strAuxiliarUrlPagina);
				
		imagen_devolucion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_devolucion_control.strAuxiliarTipo,imagen_devolucion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_devolucion_control) {
		imagen_devolucion_funcion1.resaltarRestaurarDivMensaje(true,imagen_devolucion_control.strAuxiliarMensajeAlert,imagen_devolucion_control.strAuxiliarCssMensaje);
			
		if(imagen_devolucion_funcion1.esPaginaForm(imagen_devolucion_constante1)==true) {
			window.opener.imagen_devolucion_funcion1.resaltarRestaurarDivMensaje(true,imagen_devolucion_control.strAuxiliarMensajeAlert,imagen_devolucion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_devolucion_control) {
		this.imagen_devolucion_controlInicial=imagen_devolucion_control;
			
		if(imagen_devolucion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_devolucion_control.strStyleDivArbol,imagen_devolucion_control.strStyleDivContent
																,imagen_devolucion_control.strStyleDivOpcionesBanner,imagen_devolucion_control.strStyleDivExpandirColapsar
																,imagen_devolucion_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_devolucion_control) {
		this.actualizarCssBotonesPagina(imagen_devolucion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_devolucion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_devolucion_control.tiposReportes,imagen_devolucion_control.tiposReporte
															 	,imagen_devolucion_control.tiposPaginacion,imagen_devolucion_control.tiposAcciones
																,imagen_devolucion_control.tiposColumnasSelect,imagen_devolucion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_devolucion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_devolucion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_devolucion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_devolucion_control) {
	
		var indexPosition=imagen_devolucion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_devolucion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_devolucion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_devolucion_control.strRecargarFkTiposNinguno!=null && imagen_devolucion_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_devolucion_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(imagen_devolucion_control) {
		jQuery("#tdimagen_devolucionNuevo").css("display",imagen_devolucion_control.strPermisoNuevo);
		jQuery("#trimagen_devolucionElementos").css("display",imagen_devolucion_control.strVisibleTablaElementos);
		jQuery("#trimagen_devolucionAcciones").css("display",imagen_devolucion_control.strVisibleTablaAcciones);
		jQuery("#trimagen_devolucionParametrosAcciones").css("display",imagen_devolucion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_devolucion_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_devolucion_control);
				
		if(imagen_devolucion_control.imagen_devolucionActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_devolucion_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_devolucion_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_devolucion_control) {
	
		jQuery("#form"+imagen_devolucion_constante1.STR_SUFIJO+"-id").val(imagen_devolucion_control.imagen_devolucionActual.id);
		jQuery("#form"+imagen_devolucion_constante1.STR_SUFIJO+"-version_row").val(imagen_devolucion_control.imagen_devolucionActual.versionRow);
		jQuery("#form"+imagen_devolucion_constante1.STR_SUFIJO+"-imagen").val(imagen_devolucion_control.imagen_devolucionActual.imagen);
		jQuery("#form"+imagen_devolucion_constante1.STR_SUFIJO+"-nro_devolucion").val(imagen_devolucion_control.imagen_devolucionActual.nro_devolucion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_devolucion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_devolucion","inventario","","form_imagen_devolucion",formulario,"","",paraEventoTabla,idFilaTabla,imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
	}
	
	actualizarSpanMensajesCampos(imagen_devolucion_control) {
		jQuery("#spanstrMensajeid").text(imagen_devolucion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_devolucion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeimagen").text(imagen_devolucion_control.strMensajeimagen);		
		jQuery("#spanstrMensajenro_devolucion").text(imagen_devolucion_control.strMensajenro_devolucion);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_devolucion_control) {
		jQuery("#tdbtnNuevoimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_devolucion").css("display",imagen_devolucion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_devolucion").css("display",imagen_devolucion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_devolucion").css("display",imagen_devolucion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_devolucion").css("display",imagen_devolucion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_devolucion").css("visibility",imagen_devolucion_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_devolucion_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_devolucion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_devolucion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(imagen_devolucion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_devolucion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_devolucion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_devolucion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(imagen_devolucion_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_devolucion_funcion1.validarFormularioJQuery(imagen_devolucion_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_devolucion");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_devolucion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_devolucion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,"imagen_devolucion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_devolucion_control) {
		
		
		
		if(imagen_devolucion_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_devolucionActualizarToolBar").css("display",imagen_devolucion_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdimagen_devolucionEliminarToolBar").css("display",imagen_devolucion_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trimagen_devolucionElementos").css("display",imagen_devolucion_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_devolucionAcciones").css("display",imagen_devolucion_control.strVisibleTablaAcciones);
		jQuery("#trimagen_devolucionParametrosAcciones").css("display",imagen_devolucion_control.strVisibleTablaAcciones);
		
		jQuery("#tdimagen_devolucionCerrarPagina").css("display",imagen_devolucion_control.strPermisoPopup);		
		jQuery("#tdimagen_devolucionCerrarPaginaToolBar").css("display",imagen_devolucion_control.strPermisoPopup);
		//jQuery("#trimagen_devolucionAccionesRelaciones").css("display",imagen_devolucion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_devolucion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_devolucion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_devolucion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Devoluciones";
		sTituloBanner+=" - " + imagen_devolucion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_devolucion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_devolucionRelacionesToolBar").css("display",imagen_devolucion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_devolucion").css("display",imagen_devolucion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_devolucion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_devolucion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_devolucion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_devolucion_webcontrol1.registrarEventosControles();
		
		if(imagen_devolucion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_devolucion_constante1.STR_ES_RELACIONADO=="false") {
			imagen_devolucion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_devolucion_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_devolucion_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_devolucion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_devolucion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_devolucion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(imagen_devolucion_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(imagen_devolucion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
						//imagen_devolucion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(imagen_devolucion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_devolucion_constante1.BIG_ID_ACTUAL,"imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);
						//imagen_devolucion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			imagen_devolucion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_devolucion","inventario","",imagen_devolucion_funcion1,imagen_devolucion_webcontrol1,imagen_devolucion_constante1);	
	}
}

var imagen_devolucion_webcontrol1 = new imagen_devolucion_webcontrol();

export {imagen_devolucion_webcontrol,imagen_devolucion_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_devolucion_webcontrol1 = imagen_devolucion_webcontrol1;


if(imagen_devolucion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_devolucion_webcontrol1.onLoadWindow; 
}

//</script>