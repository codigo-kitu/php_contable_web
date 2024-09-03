//<script type="text/javascript" language="javascript">



//var tipo_forma_pagoJQueryPaginaWebInteraccion= function (tipo_forma_pago_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_forma_pago_constante,tipo_forma_pago_constante1} from '../util/tipo_forma_pago_constante.js';

import {tipo_forma_pago_funcion,tipo_forma_pago_funcion1} from '../util/tipo_forma_pago_form_funcion.js';


class tipo_forma_pago_webcontrol extends GeneralEntityWebControl {
	
	tipo_forma_pago_control=null;
	tipo_forma_pago_controlInicial=null;
	tipo_forma_pago_controlAuxiliar=null;
		
	//if(tipo_forma_pago_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_forma_pago_control) {
		super();
		
		this.tipo_forma_pago_control=tipo_forma_pago_control;
	}
		
	actualizarVariablesPagina(tipo_forma_pago_control) {
		
		if(tipo_forma_pago_control.action=="index" || tipo_forma_pago_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_forma_pago_control);
			
		} 
		
		
		
	
		else if(tipo_forma_pago_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_forma_pago_control);	
		
		} else if(tipo_forma_pago_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_forma_pago_control);		
		}
	
		else if(tipo_forma_pago_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_forma_pago_control);		
		}
	
		else if(tipo_forma_pago_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_forma_pago_control);
		}
		
		
		else if(tipo_forma_pago_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(tipo_forma_pago_control);
		
		} else if(tipo_forma_pago_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(tipo_forma_pago_control);
		
		} else if(tipo_forma_pago_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(tipo_forma_pago_control);
		
		} else if(tipo_forma_pago_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_forma_pago_control);
		
		} else if(tipo_forma_pago_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_forma_pago_control);
		
		} else if(tipo_forma_pago_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(tipo_forma_pago_control);		
		
		} else if(tipo_forma_pago_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_forma_pago_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tipo_forma_pago_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(tipo_forma_pago_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tipo_forma_pago_control) {
		this.actualizarPaginaAccionesGenerales(tipo_forma_pago_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tipo_forma_pago_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_forma_pago_control);
		this.actualizarPaginaOrderBy(tipo_forma_pago_control);
		this.actualizarPaginaTablaDatos(tipo_forma_pago_control);
		this.actualizarPaginaCargaGeneralControles(tipo_forma_pago_control);
		//this.actualizarPaginaFormulario(tipo_forma_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_forma_pago_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_forma_pago_control);
		this.actualizarPaginaAreaBusquedas(tipo_forma_pago_control);
		this.actualizarPaginaCargaCombosFK(tipo_forma_pago_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_forma_pago_control) {
		//this.actualizarPaginaFormulario(tipo_forma_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_forma_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_forma_pago_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_forma_pago_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_forma_pago_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_forma_pago_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_forma_pago_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(tipo_forma_pago_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_forma_pago_control);		
		this.actualizarPaginaFormulario(tipo_forma_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_forma_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_forma_pago_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tipo_forma_pago_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_forma_pago_control);		
		this.actualizarPaginaFormulario(tipo_forma_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_forma_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_forma_pago_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tipo_forma_pago_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_forma_pago_control);		
		this.actualizarPaginaFormulario(tipo_forma_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_forma_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_forma_pago_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_forma_pago_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_forma_pago_control);
		this.actualizarPaginaCargaCombosFK(tipo_forma_pago_control);
		this.actualizarPaginaFormulario(tipo_forma_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_forma_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_forma_pago_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(tipo_forma_pago_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_forma_pago_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_forma_pago_control);
		this.actualizarPaginaCargaCombosFK(tipo_forma_pago_control);
		this.actualizarPaginaFormulario(tipo_forma_pago_control);
		this.onLoadCombosDefectoFK(tipo_forma_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_forma_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_forma_pago_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_forma_pago_control) {
		//FORMULARIO
		if(tipo_forma_pago_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_forma_pago_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(tipo_forma_pago_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_forma_pago_control);		
		
		//COMBOS FK
		if(tipo_forma_pago_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_forma_pago_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(tipo_forma_pago_control) {
		//FORMULARIO
		if(tipo_forma_pago_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_forma_pago_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_forma_pago_control);	
		//COMBOS FK
		if(tipo_forma_pago_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_forma_pago_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tipo_forma_pago_control) {
		
		if(tipo_forma_pago_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_forma_pago_control);
		}
		
		if(tipo_forma_pago_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(tipo_forma_pago_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tipo_forma_pago_control) {
		if(tipo_forma_pago_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tipo_forma_pagoReturnGeneral",JSON.stringify(tipo_forma_pago_control.tipo_forma_pagoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tipo_forma_pago_control) {
		if(tipo_forma_pago_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_forma_pago_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_forma_pago_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_forma_pago_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tipo_forma_pago_control, mostrar) {
		
		if(mostrar==true) {
			tipo_forma_pago_funcion1.resaltarRestaurarDivsPagina(false,"tipo_forma_pago");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_forma_pago_funcion1.resaltarRestaurarDivMantenimiento(false,"tipo_forma_pago");
			}			
			
			tipo_forma_pago_funcion1.mostrarDivMensaje(true,tipo_forma_pago_control.strAuxiliarMensaje,tipo_forma_pago_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_forma_pago_funcion1.mostrarDivMensaje(false,tipo_forma_pago_control.strAuxiliarMensaje,tipo_forma_pago_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_forma_pago_control) {
		if(tipo_forma_pago_funcion1.esPaginaForm(tipo_forma_pago_constante1)==true) {
			window.opener.tipo_forma_pago_webcontrol1.actualizarPaginaTablaDatos(tipo_forma_pago_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_forma_pago_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_forma_pago_control) {
		tipo_forma_pago_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_forma_pago_control.strAuxiliarUrlPagina);
				
		tipo_forma_pago_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_forma_pago_control.strAuxiliarTipo,tipo_forma_pago_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_forma_pago_control) {
		tipo_forma_pago_funcion1.resaltarRestaurarDivMensaje(true,tipo_forma_pago_control.strAuxiliarMensajeAlert,tipo_forma_pago_control.strAuxiliarCssMensaje);
			
		if(tipo_forma_pago_funcion1.esPaginaForm(tipo_forma_pago_constante1)==true) {
			window.opener.tipo_forma_pago_funcion1.resaltarRestaurarDivMensaje(true,tipo_forma_pago_control.strAuxiliarMensajeAlert,tipo_forma_pago_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(tipo_forma_pago_control) {
		this.tipo_forma_pago_controlInicial=tipo_forma_pago_control;
			
		if(tipo_forma_pago_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_forma_pago_control.strStyleDivArbol,tipo_forma_pago_control.strStyleDivContent
																,tipo_forma_pago_control.strStyleDivOpcionesBanner,tipo_forma_pago_control.strStyleDivExpandirColapsar
																,tipo_forma_pago_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(tipo_forma_pago_control) {
		this.actualizarCssBotonesPagina(tipo_forma_pago_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_forma_pago_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_forma_pago_control.tiposReportes,tipo_forma_pago_control.tiposReporte
															 	,tipo_forma_pago_control.tiposPaginacion,tipo_forma_pago_control.tiposAcciones
																,tipo_forma_pago_control.tiposColumnasSelect,tipo_forma_pago_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tipo_forma_pago_control.tiposRelaciones,tipo_forma_pago_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_forma_pago_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_forma_pago_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_forma_pago_control);			
	}
	
	actualizarPaginaUsuarioInvitado(tipo_forma_pago_control) {
	
		var indexPosition=tipo_forma_pago_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_forma_pago_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(tipo_forma_pago_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_forma_pago_control.strRecargarFkTiposNinguno!=null && tipo_forma_pago_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_forma_pago_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(tipo_forma_pago_control) {
		jQuery("#tdtipo_forma_pagoNuevo").css("display",tipo_forma_pago_control.strPermisoNuevo);
		jQuery("#trtipo_forma_pagoElementos").css("display",tipo_forma_pago_control.strVisibleTablaElementos);
		jQuery("#trtipo_forma_pagoAcciones").css("display",tipo_forma_pago_control.strVisibleTablaAcciones);
		jQuery("#trtipo_forma_pagoParametrosAcciones").css("display",tipo_forma_pago_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(tipo_forma_pago_control) {
	
		this.actualizarCssBotonesMantenimiento(tipo_forma_pago_control);
				
		if(tipo_forma_pago_control.tipo_forma_pagoActual!=null) {//form
			
			this.actualizarCamposFormulario(tipo_forma_pago_control);			
		}
						
		this.actualizarSpanMensajesCampos(tipo_forma_pago_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tipo_forma_pago_control) {
	
		jQuery("#form"+tipo_forma_pago_constante1.STR_SUFIJO+"-id").val(tipo_forma_pago_control.tipo_forma_pagoActual.id);
		jQuery("#form"+tipo_forma_pago_constante1.STR_SUFIJO+"-version_row").val(tipo_forma_pago_control.tipo_forma_pagoActual.versionRow);
		jQuery("#form"+tipo_forma_pago_constante1.STR_SUFIJO+"-codigo").val(tipo_forma_pago_control.tipo_forma_pagoActual.codigo);
		jQuery("#form"+tipo_forma_pago_constante1.STR_SUFIJO+"-nombre").val(tipo_forma_pago_control.tipo_forma_pagoActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tipo_forma_pago_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tipo_forma_pago","general","","form_tipo_forma_pago",formulario,"","",paraEventoTabla,idFilaTabla,tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1,tipo_forma_pago_constante1);
	}
	
	actualizarSpanMensajesCampos(tipo_forma_pago_control) {
		jQuery("#spanstrMensajeid").text(tipo_forma_pago_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(tipo_forma_pago_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(tipo_forma_pago_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tipo_forma_pago_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(tipo_forma_pago_control) {
		jQuery("#tdbtnNuevotipo_forma_pago").css("visibility",tipo_forma_pago_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotipo_forma_pago").css("display",tipo_forma_pago_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartipo_forma_pago").css("visibility",tipo_forma_pago_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartipo_forma_pago").css("display",tipo_forma_pago_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartipo_forma_pago").css("visibility",tipo_forma_pago_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartipo_forma_pago").css("display",tipo_forma_pago_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartipo_forma_pago").css("visibility",tipo_forma_pago_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostipo_forma_pago").css("visibility",tipo_forma_pago_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostipo_forma_pago").css("display",tipo_forma_pago_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartipo_forma_pago").css("visibility",tipo_forma_pago_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartipo_forma_pago").css("visibility",tipo_forma_pago_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartipo_forma_pago").css("visibility",tipo_forma_pago_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1,tipo_forma_pago_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_forma_pago_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_forma_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_forma_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(tipo_forma_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_forma_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_forma_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_forma_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_forma_pago_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1,tipo_forma_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1,tipo_forma_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1,tipo_forma_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1,tipo_forma_pago_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(tipo_forma_pago_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_forma_pago_funcion1.validarFormularioJQuery(tipo_forma_pago_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_forma_pago");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_forma_pago");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1,tipo_forma_pago_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(tipo_forma_pago_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1,"tipo_forma_pago");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tipo_forma_pago");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_forma_pago_control) {
		
		
		
		if(tipo_forma_pago_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_forma_pagoActualizarToolBar").css("display",tipo_forma_pago_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdtipo_forma_pagoEliminarToolBar").css("display",tipo_forma_pago_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trtipo_forma_pagoElementos").css("display",tipo_forma_pago_control.strVisibleTablaElementos);
		
		jQuery("#trtipo_forma_pagoAcciones").css("display",tipo_forma_pago_control.strVisibleTablaAcciones);
		jQuery("#trtipo_forma_pagoParametrosAcciones").css("display",tipo_forma_pago_control.strVisibleTablaAcciones);
		
		jQuery("#tdtipo_forma_pagoCerrarPagina").css("display",tipo_forma_pago_control.strPermisoPopup);		
		jQuery("#tdtipo_forma_pagoCerrarPaginaToolBar").css("display",tipo_forma_pago_control.strPermisoPopup);
		//jQuery("#trtipo_forma_pagoAccionesRelaciones").css("display",tipo_forma_pago_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tipo_forma_pago_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_forma_pago_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tipo_forma_pago_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tipo Forma Pagos";
		sTituloBanner+=" - " + tipo_forma_pago_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_forma_pago_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtipo_forma_pagoRelacionesToolBar").css("display",tipo_forma_pago_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostipo_forma_pago").css("display",tipo_forma_pago_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1,tipo_forma_pago_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tipo_forma_pago_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tipo_forma_pago_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_forma_pago_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_forma_pago_webcontrol1.registrarEventosControles();
		
		if(tipo_forma_pago_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_forma_pago_constante1.STR_ES_RELACIONADO=="false") {
			tipo_forma_pago_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_forma_pago_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_forma_pago_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_forma_pago_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_forma_pago_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tipo_forma_pago_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(tipo_forma_pago_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(tipo_forma_pago_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1,tipo_forma_pago_constante1);
						//tipo_forma_pago_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(tipo_forma_pago_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tipo_forma_pago_constante1.BIG_ID_ACTUAL,"tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1,tipo_forma_pago_constante1);
						//tipo_forma_pago_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			tipo_forma_pago_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_forma_pago","general","",tipo_forma_pago_funcion1,tipo_forma_pago_webcontrol1,tipo_forma_pago_constante1);	
	}
}

var tipo_forma_pago_webcontrol1 = new tipo_forma_pago_webcontrol();

//Para ser llamado desde otro archivo (import)
export {tipo_forma_pago_webcontrol,tipo_forma_pago_webcontrol1};

//Para ser llamado desde window.opener
window.tipo_forma_pago_webcontrol1 = tipo_forma_pago_webcontrol1;


if(tipo_forma_pago_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_forma_pago_webcontrol1.onLoadWindow; 
}

//</script>