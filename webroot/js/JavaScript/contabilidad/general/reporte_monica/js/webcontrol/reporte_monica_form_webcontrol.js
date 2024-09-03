//<script type="text/javascript" language="javascript">



//var reporte_monicaJQueryPaginaWebInteraccion= function (reporte_monica_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {reporte_monica_constante,reporte_monica_constante1} from '../util/reporte_monica_constante.js';

import {reporte_monica_funcion,reporte_monica_funcion1} from '../util/reporte_monica_form_funcion.js';


class reporte_monica_webcontrol extends GeneralEntityWebControl {
	
	reporte_monica_control=null;
	reporte_monica_controlInicial=null;
	reporte_monica_controlAuxiliar=null;
		
	//if(reporte_monica_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(reporte_monica_control) {
		super();
		
		this.reporte_monica_control=reporte_monica_control;
	}
		
	actualizarVariablesPagina(reporte_monica_control) {
		
		if(reporte_monica_control.action=="index" || reporte_monica_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(reporte_monica_control);
			
		} 
		
		
		
	
		else if(reporte_monica_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(reporte_monica_control);	
		
		} else if(reporte_monica_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(reporte_monica_control);		
		}
	
	
		
		
		else if(reporte_monica_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(reporte_monica_control);		
		
		} else if(reporte_monica_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(reporte_monica_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + reporte_monica_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(reporte_monica_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(reporte_monica_control) {
		this.actualizarPaginaAccionesGenerales(reporte_monica_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(reporte_monica_control) {
		
		this.actualizarPaginaCargaGeneral(reporte_monica_control);
		this.actualizarPaginaOrderBy(reporte_monica_control);
		this.actualizarPaginaTablaDatos(reporte_monica_control);
		this.actualizarPaginaCargaGeneralControles(reporte_monica_control);
		//this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(reporte_monica_control);
		this.actualizarPaginaAreaBusquedas(reporte_monica_control);
		this.actualizarPaginaCargaCombosFK(reporte_monica_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(reporte_monica_control) {
		//this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(reporte_monica_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(reporte_monica_control) {
		this.actualizarPaginaTablaDatosAuxiliar(reporte_monica_control);		
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(reporte_monica_control) {
		this.actualizarPaginaTablaDatosAuxiliar(reporte_monica_control);		
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(reporte_monica_control) {
		this.actualizarPaginaTablaDatosAuxiliar(reporte_monica_control);		
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(reporte_monica_control) {
		this.actualizarPaginaCargaGeneralControles(reporte_monica_control);
		this.actualizarPaginaCargaCombosFK(reporte_monica_control);
		this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(reporte_monica_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(reporte_monica_control) {
		this.actualizarPaginaCargaGeneralControles(reporte_monica_control);
		this.actualizarPaginaCargaCombosFK(reporte_monica_control);
		this.actualizarPaginaFormulario(reporte_monica_control);
		this.onLoadCombosDefectoFK(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(reporte_monica_control) {
		//FORMULARIO
		if(reporte_monica_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(reporte_monica_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(reporte_monica_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		
		//COMBOS FK
		if(reporte_monica_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(reporte_monica_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(reporte_monica_control) {
		//FORMULARIO
		if(reporte_monica_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(reporte_monica_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);	
		//COMBOS FK
		if(reporte_monica_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(reporte_monica_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(reporte_monica_control) {
		
		if(reporte_monica_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(reporte_monica_control);
		}
		
		if(reporte_monica_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(reporte_monica_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(reporte_monica_control) {
		if(reporte_monica_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("reporte_monicaReturnGeneral",JSON.stringify(reporte_monica_control.reporte_monicaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control) {
		if(reporte_monica_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && reporte_monica_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(reporte_monica_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(reporte_monica_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(reporte_monica_control, mostrar) {
		
		if(mostrar==true) {
			reporte_monica_funcion1.resaltarRestaurarDivsPagina(false,"reporte_monica");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				reporte_monica_funcion1.resaltarRestaurarDivMantenimiento(false,"reporte_monica");
			}			
			
			reporte_monica_funcion1.mostrarDivMensaje(true,reporte_monica_control.strAuxiliarMensaje,reporte_monica_control.strAuxiliarCssMensaje);
		
		} else {
			reporte_monica_funcion1.mostrarDivMensaje(false,reporte_monica_control.strAuxiliarMensaje,reporte_monica_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(reporte_monica_control) {
		if(reporte_monica_funcion1.esPaginaForm(reporte_monica_constante1)==true) {
			window.opener.reporte_monica_webcontrol1.actualizarPaginaTablaDatos(reporte_monica_control);
		} else {
			this.actualizarPaginaTablaDatos(reporte_monica_control);
		}
	}
	
	actualizarPaginaAbrirLink(reporte_monica_control) {
		reporte_monica_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(reporte_monica_control.strAuxiliarUrlPagina);
				
		reporte_monica_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(reporte_monica_control.strAuxiliarTipo,reporte_monica_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(reporte_monica_control) {
		reporte_monica_funcion1.resaltarRestaurarDivMensaje(true,reporte_monica_control.strAuxiliarMensajeAlert,reporte_monica_control.strAuxiliarCssMensaje);
			
		if(reporte_monica_funcion1.esPaginaForm(reporte_monica_constante1)==true) {
			window.opener.reporte_monica_funcion1.resaltarRestaurarDivMensaje(true,reporte_monica_control.strAuxiliarMensajeAlert,reporte_monica_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(reporte_monica_control) {
		this.reporte_monica_controlInicial=reporte_monica_control;
			
		if(reporte_monica_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(reporte_monica_control.strStyleDivArbol,reporte_monica_control.strStyleDivContent
																,reporte_monica_control.strStyleDivOpcionesBanner,reporte_monica_control.strStyleDivExpandirColapsar
																,reporte_monica_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(reporte_monica_control) {
		this.actualizarCssBotonesPagina(reporte_monica_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(reporte_monica_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(reporte_monica_control.tiposReportes,reporte_monica_control.tiposReporte
															 	,reporte_monica_control.tiposPaginacion,reporte_monica_control.tiposAcciones
																,reporte_monica_control.tiposColumnasSelect,reporte_monica_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(reporte_monica_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(reporte_monica_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(reporte_monica_control);			
	}
	
	actualizarPaginaUsuarioInvitado(reporte_monica_control) {
	
		var indexPosition=reporte_monica_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=reporte_monica_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(reporte_monica_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(reporte_monica_control.strRecargarFkTiposNinguno!=null && reporte_monica_control.strRecargarFkTiposNinguno!='NINGUNO' && reporte_monica_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(reporte_monica_control) {
		jQuery("#tdreporte_monicaNuevo").css("display",reporte_monica_control.strPermisoNuevo);
		jQuery("#trreporte_monicaElementos").css("display",reporte_monica_control.strVisibleTablaElementos);
		jQuery("#trreporte_monicaAcciones").css("display",reporte_monica_control.strVisibleTablaAcciones);
		jQuery("#trreporte_monicaParametrosAcciones").css("display",reporte_monica_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(reporte_monica_control) {
	
		this.actualizarCssBotonesMantenimiento(reporte_monica_control);
				
		if(reporte_monica_control.reporte_monicaActual!=null) {//form
			
			this.actualizarCamposFormulario(reporte_monica_control);			
		}
						
		this.actualizarSpanMensajesCampos(reporte_monica_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(reporte_monica_control) {
	
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-id").val(reporte_monica_control.reporte_monicaActual.id);
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-created_at").val(reporte_monica_control.reporte_monicaActual.versionRow);
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-updated_at").val(reporte_monica_control.reporte_monicaActual.versionRow);
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-nombre").val(reporte_monica_control.reporte_monicaActual.nombre);
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-descripcion").val(reporte_monica_control.reporte_monicaActual.descripcion);
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-estado").val(reporte_monica_control.reporte_monicaActual.estado);
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-modulo").val(reporte_monica_control.reporte_monicaActual.modulo);
		jQuery("#form"+reporte_monica_constante1.STR_SUFIJO+"-sub_modulo").val(reporte_monica_control.reporte_monicaActual.sub_modulo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+reporte_monica_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("reporte_monica","general","","form_reporte_monica",formulario,"","",paraEventoTabla,idFilaTabla,reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
	}
	
	actualizarSpanMensajesCampos(reporte_monica_control) {
		jQuery("#spanstrMensajeid").text(reporte_monica_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(reporte_monica_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(reporte_monica_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajenombre").text(reporte_monica_control.strMensajenombre);		
		jQuery("#spanstrMensajedescripcion").text(reporte_monica_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeestado").text(reporte_monica_control.strMensajeestado);		
		jQuery("#spanstrMensajemodulo").text(reporte_monica_control.strMensajemodulo);		
		jQuery("#spanstrMensajesub_modulo").text(reporte_monica_control.strMensajesub_modulo);		
	}
	
	actualizarCssBotonesMantenimiento(reporte_monica_control) {
		jQuery("#tdbtnNuevoreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoreporte_monica").css("display",reporte_monica_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarreporte_monica").css("display",reporte_monica_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarreporte_monica").css("display",reporte_monica_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosreporte_monica").css("display",reporte_monica_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarreporte_monica").css("visibility",reporte_monica_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//reporte_monica_control
		
	
	}
	
	onLoadCombosDefectoFK(reporte_monica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(reporte_monica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(reporte_monica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(reporte_monica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(reporte_monica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(reporte_monica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(reporte_monica_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(reporte_monica_constante1.BIT_ES_PAGINA_FORM==true) {
				reporte_monica_funcion1.validarFormularioJQuery(reporte_monica_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("reporte_monica");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("reporte_monica");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(reporte_monica_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,"reporte_monica");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(reporte_monica_control) {
		
		
		
		if(reporte_monica_control.strPermisoActualizar!=null) {
			jQuery("#tdreporte_monicaActualizarToolBar").css("display",reporte_monica_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdreporte_monicaEliminarToolBar").css("display",reporte_monica_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trreporte_monicaElementos").css("display",reporte_monica_control.strVisibleTablaElementos);
		
		jQuery("#trreporte_monicaAcciones").css("display",reporte_monica_control.strVisibleTablaAcciones);
		jQuery("#trreporte_monicaParametrosAcciones").css("display",reporte_monica_control.strVisibleTablaAcciones);
		
		jQuery("#tdreporte_monicaCerrarPagina").css("display",reporte_monica_control.strPermisoPopup);		
		jQuery("#tdreporte_monicaCerrarPaginaToolBar").css("display",reporte_monica_control.strPermisoPopup);
		//jQuery("#trreporte_monicaAccionesRelaciones").css("display",reporte_monica_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=reporte_monica_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + reporte_monica_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + reporte_monica_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Reportes Monicas";
		sTituloBanner+=" - " + reporte_monica_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + reporte_monica_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdreporte_monicaRelacionesToolBar").css("display",reporte_monica_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosreporte_monica").css("display",reporte_monica_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		reporte_monica_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		reporte_monica_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		reporte_monica_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		reporte_monica_webcontrol1.registrarEventosControles();
		
		if(reporte_monica_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(reporte_monica_constante1.STR_ES_RELACIONADO=="false") {
			reporte_monica_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(reporte_monica_constante1.STR_ES_RELACIONES=="true") {
			if(reporte_monica_constante1.BIT_ES_PAGINA_FORM==true) {
				reporte_monica_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(reporte_monica_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(reporte_monica_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(reporte_monica_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(reporte_monica_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
						//reporte_monica_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(reporte_monica_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(reporte_monica_constante1.BIG_ID_ACTUAL,"reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
						//reporte_monica_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			reporte_monica_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);	
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

var reporte_monica_webcontrol1 = new reporte_monica_webcontrol();

//Para ser llamado desde otro archivo (import)
export {reporte_monica_webcontrol,reporte_monica_webcontrol1};

//Para ser llamado desde window.opener
window.reporte_monica_webcontrol1 = reporte_monica_webcontrol1;


if(reporte_monica_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = reporte_monica_webcontrol1.onLoadWindow; 
}

//</script>