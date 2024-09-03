//<script type="text/javascript" language="javascript">



//var imagen_kardexJQueryPaginaWebInteraccion= function (imagen_kardex_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_kardex_constante,imagen_kardex_constante1} from '../util/imagen_kardex_constante.js';

import {imagen_kardex_funcion,imagen_kardex_funcion1} from '../util/imagen_kardex_form_funcion.js';


class imagen_kardex_webcontrol extends GeneralEntityWebControl {
	
	imagen_kardex_control=null;
	imagen_kardex_controlInicial=null;
	imagen_kardex_controlAuxiliar=null;
		
	//if(imagen_kardex_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_kardex_control) {
		super();
		
		this.imagen_kardex_control=imagen_kardex_control;
	}
		
	actualizarVariablesPagina(imagen_kardex_control) {
		
		if(imagen_kardex_control.action=="index" || imagen_kardex_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_kardex_control);
			
		} 
		
		
		
	
		else if(imagen_kardex_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_kardex_control);	
		
		} else if(imagen_kardex_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_kardex_control);		
		}
	
	
		
		
		else if(imagen_kardex_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_kardex_control);		
		
		} else if(imagen_kardex_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_kardex_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_kardex_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_kardex_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_kardex_control) {
		this.actualizarPaginaAccionesGenerales(imagen_kardex_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_kardex_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_kardex_control);
		this.actualizarPaginaOrderBy(imagen_kardex_control);
		this.actualizarPaginaTablaDatos(imagen_kardex_control);
		this.actualizarPaginaCargaGeneralControles(imagen_kardex_control);
		//this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_kardex_control);
		this.actualizarPaginaAreaBusquedas(imagen_kardex_control);
		this.actualizarPaginaCargaCombosFK(imagen_kardex_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_kardex_control) {
		//this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_kardex_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(imagen_kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_kardex_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_kardex_control);
		this.actualizarPaginaCargaCombosFK(imagen_kardex_control);
		this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(imagen_kardex_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_kardex_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_kardex_control);
		this.actualizarPaginaCargaCombosFK(imagen_kardex_control);
		this.actualizarPaginaFormulario(imagen_kardex_control);
		this.onLoadCombosDefectoFK(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_kardex_control) {
		//FORMULARIO
		if(imagen_kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_kardex_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_kardex_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		
		//COMBOS FK
		if(imagen_kardex_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_kardex_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_kardex_control) {
		//FORMULARIO
		if(imagen_kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_kardex_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);	
		//COMBOS FK
		if(imagen_kardex_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_kardex_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_kardex_control) {
		
		if(imagen_kardex_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_kardex_control);
		}
		
		if(imagen_kardex_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_kardex_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_kardex_control) {
		if(imagen_kardex_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_kardexReturnGeneral",JSON.stringify(imagen_kardex_control.imagen_kardexReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control) {
		if(imagen_kardex_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_kardex_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_kardex_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_kardex_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_kardex_control, mostrar) {
		
		if(mostrar==true) {
			imagen_kardex_funcion1.resaltarRestaurarDivsPagina(false,"imagen_kardex");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_kardex_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_kardex");
			}			
			
			imagen_kardex_funcion1.mostrarDivMensaje(true,imagen_kardex_control.strAuxiliarMensaje,imagen_kardex_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_kardex_funcion1.mostrarDivMensaje(false,imagen_kardex_control.strAuxiliarMensaje,imagen_kardex_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_kardex_control) {
		if(imagen_kardex_funcion1.esPaginaForm(imagen_kardex_constante1)==true) {
			window.opener.imagen_kardex_webcontrol1.actualizarPaginaTablaDatos(imagen_kardex_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_kardex_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_kardex_control) {
		imagen_kardex_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_kardex_control.strAuxiliarUrlPagina);
				
		imagen_kardex_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_kardex_control.strAuxiliarTipo,imagen_kardex_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_kardex_control) {
		imagen_kardex_funcion1.resaltarRestaurarDivMensaje(true,imagen_kardex_control.strAuxiliarMensajeAlert,imagen_kardex_control.strAuxiliarCssMensaje);
			
		if(imagen_kardex_funcion1.esPaginaForm(imagen_kardex_constante1)==true) {
			window.opener.imagen_kardex_funcion1.resaltarRestaurarDivMensaje(true,imagen_kardex_control.strAuxiliarMensajeAlert,imagen_kardex_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_kardex_control) {
		this.imagen_kardex_controlInicial=imagen_kardex_control;
			
		if(imagen_kardex_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_kardex_control.strStyleDivArbol,imagen_kardex_control.strStyleDivContent
																,imagen_kardex_control.strStyleDivOpcionesBanner,imagen_kardex_control.strStyleDivExpandirColapsar
																,imagen_kardex_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_kardex_control) {
		this.actualizarCssBotonesPagina(imagen_kardex_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_kardex_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_kardex_control.tiposReportes,imagen_kardex_control.tiposReporte
															 	,imagen_kardex_control.tiposPaginacion,imagen_kardex_control.tiposAcciones
																,imagen_kardex_control.tiposColumnasSelect,imagen_kardex_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_kardex_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_kardex_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_kardex_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_kardex_control) {
	
		var indexPosition=imagen_kardex_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_kardex_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_kardex_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_kardex_control.strRecargarFkTiposNinguno!=null && imagen_kardex_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_kardex_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(imagen_kardex_control) {
		jQuery("#tdimagen_kardexNuevo").css("display",imagen_kardex_control.strPermisoNuevo);
		jQuery("#trimagen_kardexElementos").css("display",imagen_kardex_control.strVisibleTablaElementos);
		jQuery("#trimagen_kardexAcciones").css("display",imagen_kardex_control.strVisibleTablaAcciones);
		jQuery("#trimagen_kardexParametrosAcciones").css("display",imagen_kardex_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_kardex_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_kardex_control);
				
		if(imagen_kardex_control.imagen_kardexActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_kardex_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_kardex_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_kardex_control) {
	
		jQuery("#form"+imagen_kardex_constante1.STR_SUFIJO+"-id").val(imagen_kardex_control.imagen_kardexActual.id);
		jQuery("#form"+imagen_kardex_constante1.STR_SUFIJO+"-version_row").val(imagen_kardex_control.imagen_kardexActual.versionRow);
		jQuery("#form"+imagen_kardex_constante1.STR_SUFIJO+"-nro_documento").val(imagen_kardex_control.imagen_kardexActual.nro_documento);
		jQuery("#form"+imagen_kardex_constante1.STR_SUFIJO+"-imagen").val(imagen_kardex_control.imagen_kardexActual.imagen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_kardex_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_kardex","inventario","","form_imagen_kardex",formulario,"","",paraEventoTabla,idFilaTabla,imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
	}
	
	actualizarSpanMensajesCampos(imagen_kardex_control) {
		jQuery("#spanstrMensajeid").text(imagen_kardex_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_kardex_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenro_documento").text(imagen_kardex_control.strMensajenro_documento);		
		jQuery("#spanstrMensajeimagen").text(imagen_kardex_control.strMensajeimagen);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_kardex_control) {
		jQuery("#tdbtnNuevoimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_kardex").css("display",imagen_kardex_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_kardex").css("display",imagen_kardex_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_kardex").css("display",imagen_kardex_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_kardex").css("display",imagen_kardex_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_kardex").css("visibility",imagen_kardex_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_kardex_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(imagen_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_kardex_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(imagen_kardex_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_kardex_funcion1.validarFormularioJQuery(imagen_kardex_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_kardex");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_kardex");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_kardex_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,"imagen_kardex");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_kardex_control) {
		
		
		
		if(imagen_kardex_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_kardexActualizarToolBar").css("display",imagen_kardex_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdimagen_kardexEliminarToolBar").css("display",imagen_kardex_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trimagen_kardexElementos").css("display",imagen_kardex_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_kardexAcciones").css("display",imagen_kardex_control.strVisibleTablaAcciones);
		jQuery("#trimagen_kardexParametrosAcciones").css("display",imagen_kardex_control.strVisibleTablaAcciones);
		
		jQuery("#tdimagen_kardexCerrarPagina").css("display",imagen_kardex_control.strPermisoPopup);		
		jQuery("#tdimagen_kardexCerrarPaginaToolBar").css("display",imagen_kardex_control.strPermisoPopup);
		//jQuery("#trimagen_kardexAccionesRelaciones").css("display",imagen_kardex_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_kardex_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_kardex_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_kardex_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Kardexes";
		sTituloBanner+=" - " + imagen_kardex_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_kardex_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_kardexRelacionesToolBar").css("display",imagen_kardex_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_kardex").css("display",imagen_kardex_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_kardex_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_kardex_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_kardex_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_kardex_webcontrol1.registrarEventosControles();
		
		if(imagen_kardex_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_kardex_constante1.STR_ES_RELACIONADO=="false") {
			imagen_kardex_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_kardex_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_kardex_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_kardex_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_kardex_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_kardex_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(imagen_kardex_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(imagen_kardex_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
						//imagen_kardex_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(imagen_kardex_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_kardex_constante1.BIG_ID_ACTUAL,"imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
						//imagen_kardex_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			imagen_kardex_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);	
	}
}

var imagen_kardex_webcontrol1 = new imagen_kardex_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_kardex_webcontrol,imagen_kardex_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_kardex_webcontrol1 = imagen_kardex_webcontrol1;


if(imagen_kardex_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_kardex_webcontrol1.onLoadWindow; 
}

//</script>