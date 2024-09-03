//<script type="text/javascript" language="javascript">



//var tipo_termino_pagoJQueryPaginaWebInteraccion= function (tipo_termino_pago_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_termino_pago_constante,tipo_termino_pago_constante1} from '../util/tipo_termino_pago_constante.js';

import {tipo_termino_pago_funcion,tipo_termino_pago_funcion1} from '../util/tipo_termino_pago_form_funcion.js';


class tipo_termino_pago_webcontrol extends GeneralEntityWebControl {
	
	tipo_termino_pago_control=null;
	tipo_termino_pago_controlInicial=null;
	tipo_termino_pago_controlAuxiliar=null;
		
	//if(tipo_termino_pago_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_termino_pago_control) {
		super();
		
		this.tipo_termino_pago_control=tipo_termino_pago_control;
	}
		
	actualizarVariablesPagina(tipo_termino_pago_control) {
		
		if(tipo_termino_pago_control.action=="index" || tipo_termino_pago_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_termino_pago_control);
			
		} 
		
		
		
	
		else if(tipo_termino_pago_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_termino_pago_control);	
		
		} else if(tipo_termino_pago_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_termino_pago_control);		
		}
	
		else if(tipo_termino_pago_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_termino_pago_control);		
		}
	
		else if(tipo_termino_pago_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_termino_pago_control);
		}
		
		
		else if(tipo_termino_pago_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(tipo_termino_pago_control);		
		
		} else if(tipo_termino_pago_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_termino_pago_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tipo_termino_pago_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(tipo_termino_pago_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tipo_termino_pago_control) {
		this.actualizarPaginaAccionesGenerales(tipo_termino_pago_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tipo_termino_pago_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_termino_pago_control);
		this.actualizarPaginaOrderBy(tipo_termino_pago_control);
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);
		this.actualizarPaginaCargaGeneralControles(tipo_termino_pago_control);
		//this.actualizarPaginaFormulario(tipo_termino_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_termino_pago_control);
		this.actualizarPaginaAreaBusquedas(tipo_termino_pago_control);
		this.actualizarPaginaCargaCombosFK(tipo_termino_pago_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_termino_pago_control) {
		//this.actualizarPaginaFormulario(tipo_termino_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_termino_pago_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_termino_pago_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_termino_pago_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_termino_pago_control);		
		this.actualizarPaginaFormulario(tipo_termino_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_termino_pago_control);		
		this.actualizarPaginaFormulario(tipo_termino_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_termino_pago_control);		
		this.actualizarPaginaFormulario(tipo_termino_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_termino_pago_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_termino_pago_control);
		this.actualizarPaginaCargaCombosFK(tipo_termino_pago_control);
		this.actualizarPaginaFormulario(tipo_termino_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(tipo_termino_pago_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_termino_pago_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_termino_pago_control);
		this.actualizarPaginaCargaCombosFK(tipo_termino_pago_control);
		this.actualizarPaginaFormulario(tipo_termino_pago_control);
		this.onLoadCombosDefectoFK(tipo_termino_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_termino_pago_control) {
		//FORMULARIO
		if(tipo_termino_pago_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_termino_pago_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(tipo_termino_pago_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		
		//COMBOS FK
		if(tipo_termino_pago_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_termino_pago_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(tipo_termino_pago_control) {
		//FORMULARIO
		if(tipo_termino_pago_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_termino_pago_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);	
		//COMBOS FK
		if(tipo_termino_pago_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_termino_pago_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tipo_termino_pago_control) {
		
		if(tipo_termino_pago_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_termino_pago_control);
		}
		
		if(tipo_termino_pago_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(tipo_termino_pago_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tipo_termino_pago_control) {
		if(tipo_termino_pago_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tipo_termino_pagoReturnGeneral",JSON.stringify(tipo_termino_pago_control.tipo_termino_pagoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control) {
		if(tipo_termino_pago_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_termino_pago_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_termino_pago_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_termino_pago_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tipo_termino_pago_control, mostrar) {
		
		if(mostrar==true) {
			tipo_termino_pago_funcion1.resaltarRestaurarDivsPagina(false,"tipo_termino_pago");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_termino_pago_funcion1.resaltarRestaurarDivMantenimiento(false,"tipo_termino_pago");
			}			
			
			tipo_termino_pago_funcion1.mostrarDivMensaje(true,tipo_termino_pago_control.strAuxiliarMensaje,tipo_termino_pago_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_termino_pago_funcion1.mostrarDivMensaje(false,tipo_termino_pago_control.strAuxiliarMensaje,tipo_termino_pago_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_termino_pago_control) {
		if(tipo_termino_pago_funcion1.esPaginaForm(tipo_termino_pago_constante1)==true) {
			window.opener.tipo_termino_pago_webcontrol1.actualizarPaginaTablaDatos(tipo_termino_pago_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_termino_pago_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_termino_pago_control) {
		tipo_termino_pago_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_termino_pago_control.strAuxiliarUrlPagina);
				
		tipo_termino_pago_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_termino_pago_control.strAuxiliarTipo,tipo_termino_pago_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_termino_pago_control) {
		tipo_termino_pago_funcion1.resaltarRestaurarDivMensaje(true,tipo_termino_pago_control.strAuxiliarMensajeAlert,tipo_termino_pago_control.strAuxiliarCssMensaje);
			
		if(tipo_termino_pago_funcion1.esPaginaForm(tipo_termino_pago_constante1)==true) {
			window.opener.tipo_termino_pago_funcion1.resaltarRestaurarDivMensaje(true,tipo_termino_pago_control.strAuxiliarMensajeAlert,tipo_termino_pago_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(tipo_termino_pago_control) {
		this.tipo_termino_pago_controlInicial=tipo_termino_pago_control;
			
		if(tipo_termino_pago_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_termino_pago_control.strStyleDivArbol,tipo_termino_pago_control.strStyleDivContent
																,tipo_termino_pago_control.strStyleDivOpcionesBanner,tipo_termino_pago_control.strStyleDivExpandirColapsar
																,tipo_termino_pago_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(tipo_termino_pago_control) {
		this.actualizarCssBotonesPagina(tipo_termino_pago_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_termino_pago_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_termino_pago_control.tiposReportes,tipo_termino_pago_control.tiposReporte
															 	,tipo_termino_pago_control.tiposPaginacion,tipo_termino_pago_control.tiposAcciones
																,tipo_termino_pago_control.tiposColumnasSelect,tipo_termino_pago_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tipo_termino_pago_control.tiposRelaciones,tipo_termino_pago_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_termino_pago_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_termino_pago_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_termino_pago_control);			
	}
	
	actualizarPaginaUsuarioInvitado(tipo_termino_pago_control) {
	
		var indexPosition=tipo_termino_pago_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_termino_pago_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(tipo_termino_pago_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_termino_pago_control.strRecargarFkTiposNinguno!=null && tipo_termino_pago_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_termino_pago_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(tipo_termino_pago_control) {
		jQuery("#tdtipo_termino_pagoNuevo").css("display",tipo_termino_pago_control.strPermisoNuevo);
		jQuery("#trtipo_termino_pagoElementos").css("display",tipo_termino_pago_control.strVisibleTablaElementos);
		jQuery("#trtipo_termino_pagoAcciones").css("display",tipo_termino_pago_control.strVisibleTablaAcciones);
		jQuery("#trtipo_termino_pagoParametrosAcciones").css("display",tipo_termino_pago_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(tipo_termino_pago_control) {
	
		this.actualizarCssBotonesMantenimiento(tipo_termino_pago_control);
				
		if(tipo_termino_pago_control.tipo_termino_pagoActual!=null) {//form
			
			this.actualizarCamposFormulario(tipo_termino_pago_control);			
		}
						
		this.actualizarSpanMensajesCampos(tipo_termino_pago_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tipo_termino_pago_control) {
	
		jQuery("#form"+tipo_termino_pago_constante1.STR_SUFIJO+"-id").val(tipo_termino_pago_control.tipo_termino_pagoActual.id);
		jQuery("#form"+tipo_termino_pago_constante1.STR_SUFIJO+"-created_at").val(tipo_termino_pago_control.tipo_termino_pagoActual.versionRow);
		jQuery("#form"+tipo_termino_pago_constante1.STR_SUFIJO+"-updated_at").val(tipo_termino_pago_control.tipo_termino_pagoActual.versionRow);
		jQuery("#form"+tipo_termino_pago_constante1.STR_SUFIJO+"-codigo").val(tipo_termino_pago_control.tipo_termino_pagoActual.codigo);
		jQuery("#form"+tipo_termino_pago_constante1.STR_SUFIJO+"-nombre").val(tipo_termino_pago_control.tipo_termino_pagoActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tipo_termino_pago_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tipo_termino_pago","general","","form_tipo_termino_pago",formulario,"","",paraEventoTabla,idFilaTabla,tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
	}
	
	actualizarSpanMensajesCampos(tipo_termino_pago_control) {
		jQuery("#spanstrMensajeid").text(tipo_termino_pago_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(tipo_termino_pago_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(tipo_termino_pago_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajecodigo").text(tipo_termino_pago_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tipo_termino_pago_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(tipo_termino_pago_control) {
		jQuery("#tdbtnNuevotipo_termino_pago").css("visibility",tipo_termino_pago_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotipo_termino_pago").css("display",tipo_termino_pago_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartipo_termino_pago").css("visibility",tipo_termino_pago_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartipo_termino_pago").css("display",tipo_termino_pago_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartipo_termino_pago").css("visibility",tipo_termino_pago_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartipo_termino_pago").css("display",tipo_termino_pago_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartipo_termino_pago").css("visibility",tipo_termino_pago_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostipo_termino_pago").css("visibility",tipo_termino_pago_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostipo_termino_pago").css("display",tipo_termino_pago_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartipo_termino_pago").css("visibility",tipo_termino_pago_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartipo_termino_pago").css("visibility",tipo_termino_pago_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartipo_termino_pago").css("visibility",tipo_termino_pago_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_termino_pago_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_termino_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_termino_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(tipo_termino_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_termino_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_termino_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_termino_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_termino_pago_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(tipo_termino_pago_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_termino_pago_funcion1.validarFormularioJQuery(tipo_termino_pago_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_termino_pago");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_termino_pago");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(tipo_termino_pago_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,"tipo_termino_pago");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tipo_termino_pago");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_termino_pago_control) {
		
		
		
		if(tipo_termino_pago_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_termino_pagoActualizarToolBar").css("display",tipo_termino_pago_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdtipo_termino_pagoEliminarToolBar").css("display",tipo_termino_pago_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trtipo_termino_pagoElementos").css("display",tipo_termino_pago_control.strVisibleTablaElementos);
		
		jQuery("#trtipo_termino_pagoAcciones").css("display",tipo_termino_pago_control.strVisibleTablaAcciones);
		jQuery("#trtipo_termino_pagoParametrosAcciones").css("display",tipo_termino_pago_control.strVisibleTablaAcciones);
		
		jQuery("#tdtipo_termino_pagoCerrarPagina").css("display",tipo_termino_pago_control.strPermisoPopup);		
		jQuery("#tdtipo_termino_pagoCerrarPaginaToolBar").css("display",tipo_termino_pago_control.strPermisoPopup);
		//jQuery("#trtipo_termino_pagoAccionesRelaciones").css("display",tipo_termino_pago_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tipo_termino_pago_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_termino_pago_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tipo_termino_pago_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tipo Termino Pagos";
		sTituloBanner+=" - " + tipo_termino_pago_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_termino_pago_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtipo_termino_pagoRelacionesToolBar").css("display",tipo_termino_pago_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostipo_termino_pago").css("display",tipo_termino_pago_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tipo_termino_pago_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tipo_termino_pago_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_termino_pago_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_termino_pago_webcontrol1.registrarEventosControles();
		
		if(tipo_termino_pago_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_termino_pago_constante1.STR_ES_RELACIONADO=="false") {
			tipo_termino_pago_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_termino_pago_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_termino_pago_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_termino_pago_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_termino_pago_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tipo_termino_pago_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(tipo_termino_pago_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(tipo_termino_pago_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
						//tipo_termino_pago_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(tipo_termino_pago_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tipo_termino_pago_constante1.BIG_ID_ACTUAL,"tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
						//tipo_termino_pago_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			tipo_termino_pago_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);	
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

var tipo_termino_pago_webcontrol1 = new tipo_termino_pago_webcontrol();

//Para ser llamado desde otro archivo (import)
export {tipo_termino_pago_webcontrol,tipo_termino_pago_webcontrol1};

//Para ser llamado desde window.opener
window.tipo_termino_pago_webcontrol1 = tipo_termino_pago_webcontrol1;


if(tipo_termino_pago_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_termino_pago_webcontrol1.onLoadWindow; 
}

//</script>