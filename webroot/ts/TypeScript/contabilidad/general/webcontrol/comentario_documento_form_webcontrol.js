//<script type="text/javascript" language="javascript">



//var comentario_documentoJQueryPaginaWebInteraccion= function (comentario_documento_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {comentario_documento_constante,comentario_documento_constante1} from '../util/comentario_documento_constante.js';

import {comentario_documento_funcion,comentario_documento_funcion1} from '../util/comentario_documento_form_funcion.js';


class comentario_documento_webcontrol extends GeneralEntityWebControl {
	
	comentario_documento_control=null;
	comentario_documento_controlInicial=null;
	comentario_documento_controlAuxiliar=null;
		
	//if(comentario_documento_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(comentario_documento_control) {
		super();
		
		this.comentario_documento_control=comentario_documento_control;
	}
		
	actualizarVariablesPagina(comentario_documento_control) {
		
		if(comentario_documento_control.action=="index" || comentario_documento_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(comentario_documento_control);
			
		} 
		
		
		
	
		else if(comentario_documento_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(comentario_documento_control);	
		
		} else if(comentario_documento_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(comentario_documento_control);		
		}
	
	
		
		
		else if(comentario_documento_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(comentario_documento_control);
		
		} else if(comentario_documento_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(comentario_documento_control);		
		
		} else if(comentario_documento_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(comentario_documento_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + comentario_documento_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(comentario_documento_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(comentario_documento_control) {
		this.actualizarPaginaAccionesGenerales(comentario_documento_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(comentario_documento_control) {
		
		this.actualizarPaginaCargaGeneral(comentario_documento_control);
		this.actualizarPaginaOrderBy(comentario_documento_control);
		this.actualizarPaginaTablaDatos(comentario_documento_control);
		this.actualizarPaginaCargaGeneralControles(comentario_documento_control);
		//this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(comentario_documento_control);
		this.actualizarPaginaAreaBusquedas(comentario_documento_control);
		this.actualizarPaginaCargaCombosFK(comentario_documento_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(comentario_documento_control) {
		//this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(comentario_documento_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(comentario_documento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(comentario_documento_control);		
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(comentario_documento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(comentario_documento_control);		
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(comentario_documento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(comentario_documento_control);		
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(comentario_documento_control) {
		this.actualizarPaginaCargaGeneralControles(comentario_documento_control);
		this.actualizarPaginaCargaCombosFK(comentario_documento_control);
		this.actualizarPaginaFormulario(comentario_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(comentario_documento_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(comentario_documento_control) {
		this.actualizarPaginaCargaGeneralControles(comentario_documento_control);
		this.actualizarPaginaCargaCombosFK(comentario_documento_control);
		this.actualizarPaginaFormulario(comentario_documento_control);
		this.onLoadCombosDefectoFK(comentario_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		this.actualizarPaginaAreaMantenimiento(comentario_documento_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(comentario_documento_control) {
		//FORMULARIO
		if(comentario_documento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(comentario_documento_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(comentario_documento_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);		
		
		//COMBOS FK
		if(comentario_documento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(comentario_documento_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(comentario_documento_control) {
		//FORMULARIO
		if(comentario_documento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(comentario_documento_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control);	
		//COMBOS FK
		if(comentario_documento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(comentario_documento_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(comentario_documento_control) {
		
		if(comentario_documento_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(comentario_documento_control);
		}
		
		if(comentario_documento_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(comentario_documento_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(comentario_documento_control) {
		if(comentario_documento_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("comentario_documentoReturnGeneral",JSON.stringify(comentario_documento_control.comentario_documentoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(comentario_documento_control) {
		if(comentario_documento_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && comentario_documento_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(comentario_documento_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(comentario_documento_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(comentario_documento_control, mostrar) {
		
		if(mostrar==true) {
			comentario_documento_funcion1.resaltarRestaurarDivsPagina(false,"comentario_documento");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				comentario_documento_funcion1.resaltarRestaurarDivMantenimiento(false,"comentario_documento");
			}			
			
			comentario_documento_funcion1.mostrarDivMensaje(true,comentario_documento_control.strAuxiliarMensaje,comentario_documento_control.strAuxiliarCssMensaje);
		
		} else {
			comentario_documento_funcion1.mostrarDivMensaje(false,comentario_documento_control.strAuxiliarMensaje,comentario_documento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(comentario_documento_control) {
		if(comentario_documento_funcion1.esPaginaForm(comentario_documento_constante1)==true) {
			window.opener.comentario_documento_webcontrol1.actualizarPaginaTablaDatos(comentario_documento_control);
		} else {
			this.actualizarPaginaTablaDatos(comentario_documento_control);
		}
	}
	
	actualizarPaginaAbrirLink(comentario_documento_control) {
		comentario_documento_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(comentario_documento_control.strAuxiliarUrlPagina);
				
		comentario_documento_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(comentario_documento_control.strAuxiliarTipo,comentario_documento_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(comentario_documento_control) {
		comentario_documento_funcion1.resaltarRestaurarDivMensaje(true,comentario_documento_control.strAuxiliarMensajeAlert,comentario_documento_control.strAuxiliarCssMensaje);
			
		if(comentario_documento_funcion1.esPaginaForm(comentario_documento_constante1)==true) {
			window.opener.comentario_documento_funcion1.resaltarRestaurarDivMensaje(true,comentario_documento_control.strAuxiliarMensajeAlert,comentario_documento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(comentario_documento_control) {
		this.comentario_documento_controlInicial=comentario_documento_control;
			
		if(comentario_documento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(comentario_documento_control.strStyleDivArbol,comentario_documento_control.strStyleDivContent
																,comentario_documento_control.strStyleDivOpcionesBanner,comentario_documento_control.strStyleDivExpandirColapsar
																,comentario_documento_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(comentario_documento_control) {
		this.actualizarCssBotonesPagina(comentario_documento_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(comentario_documento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(comentario_documento_control.tiposReportes,comentario_documento_control.tiposReporte
															 	,comentario_documento_control.tiposPaginacion,comentario_documento_control.tiposAcciones
																,comentario_documento_control.tiposColumnasSelect,comentario_documento_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(comentario_documento_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(comentario_documento_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(comentario_documento_control);			
	}
	
	actualizarPaginaUsuarioInvitado(comentario_documento_control) {
	
		var indexPosition=comentario_documento_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=comentario_documento_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(comentario_documento_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(comentario_documento_control.strRecargarFkTiposNinguno!=null && comentario_documento_control.strRecargarFkTiposNinguno!='NINGUNO' && comentario_documento_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(comentario_documento_control) {
		jQuery("#tdcomentario_documentoNuevo").css("display",comentario_documento_control.strPermisoNuevo);
		jQuery("#trcomentario_documentoElementos").css("display",comentario_documento_control.strVisibleTablaElementos);
		jQuery("#trcomentario_documentoAcciones").css("display",comentario_documento_control.strVisibleTablaAcciones);
		jQuery("#trcomentario_documentoParametrosAcciones").css("display",comentario_documento_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(comentario_documento_control) {
	
		this.actualizarCssBotonesMantenimiento(comentario_documento_control);
				
		if(comentario_documento_control.comentario_documentoActual!=null) {//form
			
			this.actualizarCamposFormulario(comentario_documento_control);			
		}
						
		this.actualizarSpanMensajesCampos(comentario_documento_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(comentario_documento_control) {
	
		jQuery("#form"+comentario_documento_constante1.STR_SUFIJO+"-id").val(comentario_documento_control.comentario_documentoActual.id);
		jQuery("#form"+comentario_documento_constante1.STR_SUFIJO+"-version_row").val(comentario_documento_control.comentario_documentoActual.versionRow);
		jQuery("#form"+comentario_documento_constante1.STR_SUFIJO+"-tipo_documento").val(comentario_documento_control.comentario_documentoActual.tipo_documento);
		jQuery("#form"+comentario_documento_constante1.STR_SUFIJO+"-comentario").val(comentario_documento_control.comentario_documentoActual.comentario);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+comentario_documento_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("comentario_documento","general","","form_comentario_documento",formulario,"","",paraEventoTabla,idFilaTabla,comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
	}
	
	actualizarSpanMensajesCampos(comentario_documento_control) {
		jQuery("#spanstrMensajeid").text(comentario_documento_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(comentario_documento_control.strMensajeversion_row);		
		jQuery("#spanstrMensajetipo_documento").text(comentario_documento_control.strMensajetipo_documento);		
		jQuery("#spanstrMensajecomentario").text(comentario_documento_control.strMensajecomentario);		
	}
	
	actualizarCssBotonesMantenimiento(comentario_documento_control) {
		jQuery("#tdbtnNuevocomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocomentario_documento").css("display",comentario_documento_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcomentario_documento").css("display",comentario_documento_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcomentario_documento").css("display",comentario_documento_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscomentario_documento").css("display",comentario_documento_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcomentario_documento").css("visibility",comentario_documento_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//comentario_documento_control
		
	
	}
	
	onLoadCombosDefectoFK(comentario_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(comentario_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(comentario_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(comentario_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(comentario_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(comentario_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(comentario_documento_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(comentario_documento_constante1.BIT_ES_PAGINA_FORM==true) {
				comentario_documento_funcion1.validarFormularioJQuery(comentario_documento_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("comentario_documento");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("comentario_documento");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(comentario_documento_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,"comentario_documento");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(comentario_documento_control) {
		
		
		
		if(comentario_documento_control.strPermisoActualizar!=null) {
			jQuery("#tdcomentario_documentoActualizarToolBar").css("display",comentario_documento_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcomentario_documentoEliminarToolBar").css("display",comentario_documento_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcomentario_documentoElementos").css("display",comentario_documento_control.strVisibleTablaElementos);
		
		jQuery("#trcomentario_documentoAcciones").css("display",comentario_documento_control.strVisibleTablaAcciones);
		jQuery("#trcomentario_documentoParametrosAcciones").css("display",comentario_documento_control.strVisibleTablaAcciones);
		
		jQuery("#tdcomentario_documentoCerrarPagina").css("display",comentario_documento_control.strPermisoPopup);		
		jQuery("#tdcomentario_documentoCerrarPaginaToolBar").css("display",comentario_documento_control.strPermisoPopup);
		//jQuery("#trcomentario_documentoAccionesRelaciones").css("display",comentario_documento_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=comentario_documento_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + comentario_documento_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + comentario_documento_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Comentario Documentos";
		sTituloBanner+=" - " + comentario_documento_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + comentario_documento_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcomentario_documentoRelacionesToolBar").css("display",comentario_documento_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscomentario_documento").css("display",comentario_documento_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		comentario_documento_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		comentario_documento_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		comentario_documento_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		comentario_documento_webcontrol1.registrarEventosControles();
		
		if(comentario_documento_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(comentario_documento_constante1.STR_ES_RELACIONADO=="false") {
			comentario_documento_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(comentario_documento_constante1.STR_ES_RELACIONES=="true") {
			if(comentario_documento_constante1.BIT_ES_PAGINA_FORM==true) {
				comentario_documento_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(comentario_documento_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(comentario_documento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(comentario_documento_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(comentario_documento_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
						//comentario_documento_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(comentario_documento_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(comentario_documento_constante1.BIG_ID_ACTUAL,"comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);
						//comentario_documento_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			comentario_documento_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("comentario_documento","general","",comentario_documento_funcion1,comentario_documento_webcontrol1,comentario_documento_constante1);	
	}
}

var comentario_documento_webcontrol1 = new comentario_documento_webcontrol();

//Para ser llamado desde otro archivo (import)
export {comentario_documento_webcontrol,comentario_documento_webcontrol1};

//Para ser llamado desde window.opener
window.comentario_documento_webcontrol1 = comentario_documento_webcontrol1;


if(comentario_documento_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = comentario_documento_webcontrol1.onLoadWindow; 
}

//</script>