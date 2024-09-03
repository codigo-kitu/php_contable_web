//<script type="text/javascript" language="javascript">



//var parametro_genericoJQueryPaginaWebInteraccion= function (parametro_generico_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_generico_constante,parametro_generico_constante1} from '../util/parametro_generico_constante.js';

import {parametro_generico_funcion,parametro_generico_funcion1} from '../util/parametro_generico_form_funcion.js';


class parametro_generico_webcontrol extends GeneralEntityWebControl {
	
	parametro_generico_control=null;
	parametro_generico_controlInicial=null;
	parametro_generico_controlAuxiliar=null;
		
	//if(parametro_generico_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_generico_control) {
		super();
		
		this.parametro_generico_control=parametro_generico_control;
	}
		
	actualizarVariablesPagina(parametro_generico_control) {
		
		if(parametro_generico_control.action=="index" || parametro_generico_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_generico_control);
			
		} 
		
		
		
	
		else if(parametro_generico_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_generico_control);	
		
		} else if(parametro_generico_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_generico_control);		
		}
	
	
		
		
		else if(parametro_generico_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_generico_control);		
		
		} else if(parametro_generico_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_generico_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_generico_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_generico_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_generico_control) {
		this.actualizarPaginaAccionesGenerales(parametro_generico_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_generico_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_generico_control);
		this.actualizarPaginaOrderBy(parametro_generico_control);
		this.actualizarPaginaTablaDatos(parametro_generico_control);
		this.actualizarPaginaCargaGeneralControles(parametro_generico_control);
		//this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_generico_control);
		this.actualizarPaginaAreaBusquedas(parametro_generico_control);
		this.actualizarPaginaCargaCombosFK(parametro_generico_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_generico_control) {
		//this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_generico_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(parametro_generico_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_generico_control);		
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_generico_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_generico_control);		
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_generico_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_generico_control);		
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_generico_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_generico_control);
		this.actualizarPaginaCargaCombosFK(parametro_generico_control);
		this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(parametro_generico_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_generico_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_generico_control);
		this.actualizarPaginaCargaCombosFK(parametro_generico_control);
		this.actualizarPaginaFormulario(parametro_generico_control);
		this.onLoadCombosDefectoFK(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_generico_control) {
		//FORMULARIO
		if(parametro_generico_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_generico_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_generico_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		
		//COMBOS FK
		if(parametro_generico_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_generico_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_generico_control) {
		//FORMULARIO
		if(parametro_generico_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_generico_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);	
		//COMBOS FK
		if(parametro_generico_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_generico_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_generico_control) {
		
		if(parametro_generico_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_generico_control);
		}
		
		if(parametro_generico_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_generico_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_generico_control) {
		if(parametro_generico_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_genericoReturnGeneral",JSON.stringify(parametro_generico_control.parametro_genericoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control) {
		if(parametro_generico_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_generico_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_generico_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_generico_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_generico_control, mostrar) {
		
		if(mostrar==true) {
			parametro_generico_funcion1.resaltarRestaurarDivsPagina(false,"parametro_generico");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_generico_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_generico");
			}			
			
			parametro_generico_funcion1.mostrarDivMensaje(true,parametro_generico_control.strAuxiliarMensaje,parametro_generico_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_generico_funcion1.mostrarDivMensaje(false,parametro_generico_control.strAuxiliarMensaje,parametro_generico_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_generico_control) {
		if(parametro_generico_funcion1.esPaginaForm(parametro_generico_constante1)==true) {
			window.opener.parametro_generico_webcontrol1.actualizarPaginaTablaDatos(parametro_generico_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_generico_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_generico_control) {
		parametro_generico_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_generico_control.strAuxiliarUrlPagina);
				
		parametro_generico_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_generico_control.strAuxiliarTipo,parametro_generico_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_generico_control) {
		parametro_generico_funcion1.resaltarRestaurarDivMensaje(true,parametro_generico_control.strAuxiliarMensajeAlert,parametro_generico_control.strAuxiliarCssMensaje);
			
		if(parametro_generico_funcion1.esPaginaForm(parametro_generico_constante1)==true) {
			window.opener.parametro_generico_funcion1.resaltarRestaurarDivMensaje(true,parametro_generico_control.strAuxiliarMensajeAlert,parametro_generico_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_generico_control) {
		this.parametro_generico_controlInicial=parametro_generico_control;
			
		if(parametro_generico_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_generico_control.strStyleDivArbol,parametro_generico_control.strStyleDivContent
																,parametro_generico_control.strStyleDivOpcionesBanner,parametro_generico_control.strStyleDivExpandirColapsar
																,parametro_generico_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_generico_control) {
		this.actualizarCssBotonesPagina(parametro_generico_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_generico_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_generico_control.tiposReportes,parametro_generico_control.tiposReporte
															 	,parametro_generico_control.tiposPaginacion,parametro_generico_control.tiposAcciones
																,parametro_generico_control.tiposColumnasSelect,parametro_generico_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_generico_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_generico_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_generico_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_generico_control) {
	
		var indexPosition=parametro_generico_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_generico_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_generico_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_generico_control.strRecargarFkTiposNinguno!=null && parametro_generico_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_generico_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(parametro_generico_control) {
		jQuery("#tdparametro_genericoNuevo").css("display",parametro_generico_control.strPermisoNuevo);
		jQuery("#trparametro_genericoElementos").css("display",parametro_generico_control.strVisibleTablaElementos);
		jQuery("#trparametro_genericoAcciones").css("display",parametro_generico_control.strVisibleTablaAcciones);
		jQuery("#trparametro_genericoParametrosAcciones").css("display",parametro_generico_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_generico_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_generico_control);
				
		if(parametro_generico_control.parametro_genericoActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_generico_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_generico_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_generico_control) {
	
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-id").val(parametro_generico_control.parametro_genericoActual.id);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-created_at").val(parametro_generico_control.parametro_genericoActual.versionRow);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-updated_at").val(parametro_generico_control.parametro_genericoActual.versionRow);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-parametro").val(parametro_generico_control.parametro_genericoActual.parametro);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-descripcion_pantalla").val(parametro_generico_control.parametro_genericoActual.descripcion_pantalla);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-valor_caracteristica").val(parametro_generico_control.parametro_genericoActual.valor_caracteristica);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-valor2_caracteristica").val(parametro_generico_control.parametro_genericoActual.valor2_caracteristica);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-valor3_caracteristica").val(parametro_generico_control.parametro_genericoActual.valor3_caracteristica);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-valor_fecha").val(parametro_generico_control.parametro_genericoActual.valor_fecha);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-valor_numerico").val(parametro_generico_control.parametro_genericoActual.valor_numerico);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-valor2_numerico").val(parametro_generico_control.parametro_genericoActual.valor2_numerico);
		jQuery("#form"+parametro_generico_constante1.STR_SUFIJO+"-valor_binario").val(parametro_generico_control.parametro_genericoActual.valor_binario);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_generico_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_generico","general","","form_parametro_generico",formulario,"","",paraEventoTabla,idFilaTabla,parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
	}
	
	actualizarSpanMensajesCampos(parametro_generico_control) {
		jQuery("#spanstrMensajeid").text(parametro_generico_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(parametro_generico_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(parametro_generico_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeparametro").text(parametro_generico_control.strMensajeparametro);		
		jQuery("#spanstrMensajedescripcion_pantalla").text(parametro_generico_control.strMensajedescripcion_pantalla);		
		jQuery("#spanstrMensajevalor_caracteristica").text(parametro_generico_control.strMensajevalor_caracteristica);		
		jQuery("#spanstrMensajevalor2_caracteristica").text(parametro_generico_control.strMensajevalor2_caracteristica);		
		jQuery("#spanstrMensajevalor3_caracteristica").text(parametro_generico_control.strMensajevalor3_caracteristica);		
		jQuery("#spanstrMensajevalor_fecha").text(parametro_generico_control.strMensajevalor_fecha);		
		jQuery("#spanstrMensajevalor_numerico").text(parametro_generico_control.strMensajevalor_numerico);		
		jQuery("#spanstrMensajevalor2_numerico").text(parametro_generico_control.strMensajevalor2_numerico);		
		jQuery("#spanstrMensajevalor_binario").text(parametro_generico_control.strMensajevalor_binario);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_generico_control) {
		jQuery("#tdbtnNuevoparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_generico").css("display",parametro_generico_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_generico").css("display",parametro_generico_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_generico").css("display",parametro_generico_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_generico").css("display",parametro_generico_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_generico").css("visibility",parametro_generico_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_generico_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_generico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_generico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(parametro_generico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_generico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_generico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_generico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_generico_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(parametro_generico_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_generico_funcion1.validarFormularioJQuery(parametro_generico_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_generico");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_generico");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_generico_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,"parametro_generico");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_generico_control) {
		
		
		
		if(parametro_generico_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_genericoActualizarToolBar").css("display",parametro_generico_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdparametro_genericoEliminarToolBar").css("display",parametro_generico_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trparametro_genericoElementos").css("display",parametro_generico_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_genericoAcciones").css("display",parametro_generico_control.strVisibleTablaAcciones);
		jQuery("#trparametro_genericoParametrosAcciones").css("display",parametro_generico_control.strVisibleTablaAcciones);
		
		jQuery("#tdparametro_genericoCerrarPagina").css("display",parametro_generico_control.strPermisoPopup);		
		jQuery("#tdparametro_genericoCerrarPaginaToolBar").css("display",parametro_generico_control.strPermisoPopup);
		//jQuery("#trparametro_genericoAccionesRelaciones").css("display",parametro_generico_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_generico_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_generico_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_generico_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametros Genericoses";
		sTituloBanner+=" - " + parametro_generico_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_generico_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_genericoRelacionesToolBar").css("display",parametro_generico_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_generico").css("display",parametro_generico_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_generico_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_generico_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_generico_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_generico_webcontrol1.registrarEventosControles();
		
		if(parametro_generico_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_generico_constante1.STR_ES_RELACIONADO=="false") {
			parametro_generico_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_generico_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_generico_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_generico_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_generico_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_generico_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(parametro_generico_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(parametro_generico_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
						//parametro_generico_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(parametro_generico_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_generico_constante1.BIG_ID_ACTUAL,"parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
						//parametro_generico_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			parametro_generico_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);	
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

var parametro_generico_webcontrol1 = new parametro_generico_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_generico_webcontrol,parametro_generico_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_generico_webcontrol1 = parametro_generico_webcontrol1;


if(parametro_generico_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_generico_webcontrol1.onLoadWindow; 
}

//</script>