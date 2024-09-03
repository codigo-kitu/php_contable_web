//<script type="text/javascript" language="javascript">



//var tipo_cuenta_predefinidaJQueryPaginaWebInteraccion= function (tipo_cuenta_predefinida_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_cuenta_predefinida_constante,tipo_cuenta_predefinida_constante1} from '../util/tipo_cuenta_predefinida_constante.js';

import {tipo_cuenta_predefinida_funcion,tipo_cuenta_predefinida_funcion1} from '../util/tipo_cuenta_predefinida_form_funcion.js';


class tipo_cuenta_predefinida_webcontrol extends GeneralEntityWebControl {
	
	tipo_cuenta_predefinida_control=null;
	tipo_cuenta_predefinida_controlInicial=null;
	tipo_cuenta_predefinida_controlAuxiliar=null;
		
	//if(tipo_cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_cuenta_predefinida_control) {
		super();
		
		this.tipo_cuenta_predefinida_control=tipo_cuenta_predefinida_control;
	}
		
	actualizarVariablesPagina(tipo_cuenta_predefinida_control) {
		
		if(tipo_cuenta_predefinida_control.action=="index" || tipo_cuenta_predefinida_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_cuenta_predefinida_control);
			
		} 
		
		
		
	
		else if(tipo_cuenta_predefinida_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_cuenta_predefinida_control);	
		
		} else if(tipo_cuenta_predefinida_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_cuenta_predefinida_control);		
		}
	
		else if(tipo_cuenta_predefinida_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_cuenta_predefinida_control);		
		}
	
		else if(tipo_cuenta_predefinida_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_cuenta_predefinida_control);
		}
		
		
		else if(tipo_cuenta_predefinida_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_cuenta_predefinida_control);
		
		} else if(tipo_cuenta_predefinida_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(tipo_cuenta_predefinida_control);		
		
		} else if(tipo_cuenta_predefinida_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_cuenta_predefinida_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tipo_cuenta_predefinida_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(tipo_cuenta_predefinida_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaAccionesGenerales(tipo_cuenta_predefinida_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tipo_cuenta_predefinida_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_cuenta_predefinida_control);
		this.actualizarPaginaOrderBy(tipo_cuenta_predefinida_control);
		this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);
		this.actualizarPaginaCargaGeneralControles(tipo_cuenta_predefinida_control);
		//this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_cuenta_predefinida_control);
		this.actualizarPaginaAreaBusquedas(tipo_cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(tipo_cuenta_predefinida_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_cuenta_predefinida_control) {
		//this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_cuenta_predefinida_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_cuenta_predefinida_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(tipo_cuenta_predefinida_control);
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(tipo_cuenta_predefinida_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_cuenta_predefinida_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(tipo_cuenta_predefinida_control);
		this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);
		this.onLoadCombosDefectoFK(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_cuenta_predefinida_control) {
		//FORMULARIO
		if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(tipo_cuenta_predefinida_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);		
		
		//COMBOS FK
		if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_cuenta_predefinida_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(tipo_cuenta_predefinida_control) {
		//FORMULARIO
		if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_cuenta_predefinida_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control);	
		//COMBOS FK
		if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_cuenta_predefinida_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tipo_cuenta_predefinida_control) {
		
		if(tipo_cuenta_predefinida_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_cuenta_predefinida_control);
		}
		
		if(tipo_cuenta_predefinida_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(tipo_cuenta_predefinida_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tipo_cuenta_predefinida_control) {
		if(tipo_cuenta_predefinida_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tipo_cuenta_predefinidaReturnGeneral",JSON.stringify(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tipo_cuenta_predefinida_control) {
		if(tipo_cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_cuenta_predefinida_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_cuenta_predefinida_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_cuenta_predefinida_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tipo_cuenta_predefinida_control, mostrar) {
		
		if(mostrar==true) {
			tipo_cuenta_predefinida_funcion1.resaltarRestaurarDivsPagina(false,"tipo_cuenta_predefinida");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_cuenta_predefinida_funcion1.resaltarRestaurarDivMantenimiento(false,"tipo_cuenta_predefinida");
			}			
			
			tipo_cuenta_predefinida_funcion1.mostrarDivMensaje(true,tipo_cuenta_predefinida_control.strAuxiliarMensaje,tipo_cuenta_predefinida_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_cuenta_predefinida_funcion1.mostrarDivMensaje(false,tipo_cuenta_predefinida_control.strAuxiliarMensaje,tipo_cuenta_predefinida_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_cuenta_predefinida_control) {
		if(tipo_cuenta_predefinida_funcion1.esPaginaForm(tipo_cuenta_predefinida_constante1)==true) {
			window.opener.tipo_cuenta_predefinida_webcontrol1.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_cuenta_predefinida_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_cuenta_predefinida_control) {
		tipo_cuenta_predefinida_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_cuenta_predefinida_control.strAuxiliarUrlPagina);
				
		tipo_cuenta_predefinida_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_cuenta_predefinida_control.strAuxiliarTipo,tipo_cuenta_predefinida_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_cuenta_predefinida_control) {
		tipo_cuenta_predefinida_funcion1.resaltarRestaurarDivMensaje(true,tipo_cuenta_predefinida_control.strAuxiliarMensajeAlert,tipo_cuenta_predefinida_control.strAuxiliarCssMensaje);
			
		if(tipo_cuenta_predefinida_funcion1.esPaginaForm(tipo_cuenta_predefinida_constante1)==true) {
			window.opener.tipo_cuenta_predefinida_funcion1.resaltarRestaurarDivMensaje(true,tipo_cuenta_predefinida_control.strAuxiliarMensajeAlert,tipo_cuenta_predefinida_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(tipo_cuenta_predefinida_control) {
		this.tipo_cuenta_predefinida_controlInicial=tipo_cuenta_predefinida_control;
			
		if(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_cuenta_predefinida_control.strStyleDivArbol,tipo_cuenta_predefinida_control.strStyleDivContent
																,tipo_cuenta_predefinida_control.strStyleDivOpcionesBanner,tipo_cuenta_predefinida_control.strStyleDivExpandirColapsar
																,tipo_cuenta_predefinida_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(tipo_cuenta_predefinida_control) {
		this.actualizarCssBotonesPagina(tipo_cuenta_predefinida_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_cuenta_predefinida_control.tiposReportes,tipo_cuenta_predefinida_control.tiposReporte
															 	,tipo_cuenta_predefinida_control.tiposPaginacion,tipo_cuenta_predefinida_control.tiposAcciones
																,tipo_cuenta_predefinida_control.tiposColumnasSelect,tipo_cuenta_predefinida_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tipo_cuenta_predefinida_control.tiposRelaciones,tipo_cuenta_predefinida_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_cuenta_predefinida_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_cuenta_predefinida_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_cuenta_predefinida_control);			
	}
	
	actualizarPaginaUsuarioInvitado(tipo_cuenta_predefinida_control) {
	
		var indexPosition=tipo_cuenta_predefinida_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_cuenta_predefinida_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(tipo_cuenta_predefinida_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_cuenta_predefinida_control.strRecargarFkTiposNinguno!=null && tipo_cuenta_predefinida_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_cuenta_predefinida_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(tipo_cuenta_predefinida_control) {
		jQuery("#tdtipo_cuenta_predefinidaNuevo").css("display",tipo_cuenta_predefinida_control.strPermisoNuevo);
		jQuery("#trtipo_cuenta_predefinidaElementos").css("display",tipo_cuenta_predefinida_control.strVisibleTablaElementos);
		jQuery("#trtipo_cuenta_predefinidaAcciones").css("display",tipo_cuenta_predefinida_control.strVisibleTablaAcciones);
		jQuery("#trtipo_cuenta_predefinidaParametrosAcciones").css("display",tipo_cuenta_predefinida_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(tipo_cuenta_predefinida_control) {
	
		this.actualizarCssBotonesMantenimiento(tipo_cuenta_predefinida_control);
				
		if(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual!=null) {//form
			
			this.actualizarCamposFormulario(tipo_cuenta_predefinida_control);			
		}
						
		this.actualizarSpanMensajesCampos(tipo_cuenta_predefinida_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tipo_cuenta_predefinida_control) {
	
		jQuery("#form"+tipo_cuenta_predefinida_constante1.STR_SUFIJO+"-id").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.id);
		jQuery("#form"+tipo_cuenta_predefinida_constante1.STR_SUFIJO+"-version_row").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.versionRow);
		jQuery("#form"+tipo_cuenta_predefinida_constante1.STR_SUFIJO+"-codigo").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.codigo);
		jQuery("#form"+tipo_cuenta_predefinida_constante1.STR_SUFIJO+"-nombre").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.nombre);
		jQuery("#form"+tipo_cuenta_predefinida_constante1.STR_SUFIJO+"-descripcion").val(tipo_cuenta_predefinida_control.tipo_cuenta_predefinidaActual.descripcion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tipo_cuenta_predefinida_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tipo_cuenta_predefinida","contabilidad","","form_tipo_cuenta_predefinida",formulario,"","",paraEventoTabla,idFilaTabla,tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
	}
	
	actualizarSpanMensajesCampos(tipo_cuenta_predefinida_control) {
		jQuery("#spanstrMensajeid").text(tipo_cuenta_predefinida_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(tipo_cuenta_predefinida_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(tipo_cuenta_predefinida_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tipo_cuenta_predefinida_control.strMensajenombre);		
		jQuery("#spanstrMensajedescripcion").text(tipo_cuenta_predefinida_control.strMensajedescripcion);		
	}
	
	actualizarCssBotonesMantenimiento(tipo_cuenta_predefinida_control) {
		jQuery("#tdbtnNuevotipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotipo_cuenta_predefinida").css("display",tipo_cuenta_predefinida_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartipo_cuenta_predefinida").css("display",tipo_cuenta_predefinida_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartipo_cuenta_predefinida").css("display",tipo_cuenta_predefinida_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostipo_cuenta_predefinida").css("display",tipo_cuenta_predefinida_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartipo_cuenta_predefinida").css("visibility",tipo_cuenta_predefinida_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_cuenta_predefinida_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(tipo_cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(tipo_cuenta_predefinida_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_cuenta_predefinida_funcion1.validarFormularioJQuery(tipo_cuenta_predefinida_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_cuenta_predefinida");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_cuenta_predefinida");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,"tipo_cuenta_predefinida");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tipo_cuenta_predefinida");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_cuenta_predefinida_control) {
		
		
		
		if(tipo_cuenta_predefinida_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_cuenta_predefinidaActualizarToolBar").css("display",tipo_cuenta_predefinida_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdtipo_cuenta_predefinidaEliminarToolBar").css("display",tipo_cuenta_predefinida_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trtipo_cuenta_predefinidaElementos").css("display",tipo_cuenta_predefinida_control.strVisibleTablaElementos);
		
		jQuery("#trtipo_cuenta_predefinidaAcciones").css("display",tipo_cuenta_predefinida_control.strVisibleTablaAcciones);
		jQuery("#trtipo_cuenta_predefinidaParametrosAcciones").css("display",tipo_cuenta_predefinida_control.strVisibleTablaAcciones);
		
		jQuery("#tdtipo_cuenta_predefinidaCerrarPagina").css("display",tipo_cuenta_predefinida_control.strPermisoPopup);		
		jQuery("#tdtipo_cuenta_predefinidaCerrarPaginaToolBar").css("display",tipo_cuenta_predefinida_control.strPermisoPopup);
		//jQuery("#trtipo_cuenta_predefinidaAccionesRelaciones").css("display",tipo_cuenta_predefinida_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tipo_cuenta_predefinida_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_cuenta_predefinida_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tipo_cuenta_predefinida_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tipo Cuentas";
		sTituloBanner+=" - " + tipo_cuenta_predefinida_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_cuenta_predefinida_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtipo_cuenta_predefinidaRelacionesToolBar").css("display",tipo_cuenta_predefinida_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostipo_cuenta_predefinida").css("display",tipo_cuenta_predefinida_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tipo_cuenta_predefinida_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tipo_cuenta_predefinida_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_cuenta_predefinida_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_cuenta_predefinida_webcontrol1.registrarEventosControles();
		
		if(tipo_cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			tipo_cuenta_predefinida_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_cuenta_predefinida_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_cuenta_predefinida_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_cuenta_predefinida_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tipo_cuenta_predefinida_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(tipo_cuenta_predefinida_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(tipo_cuenta_predefinida_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
						//tipo_cuenta_predefinida_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(tipo_cuenta_predefinida_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tipo_cuenta_predefinida_constante1.BIG_ID_ACTUAL,"tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);
						//tipo_cuenta_predefinida_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			tipo_cuenta_predefinida_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_cuenta_predefinida","contabilidad","",tipo_cuenta_predefinida_funcion1,tipo_cuenta_predefinida_webcontrol1,tipo_cuenta_predefinida_constante1);	
	}
}

var tipo_cuenta_predefinida_webcontrol1 = new tipo_cuenta_predefinida_webcontrol();

//Para ser llamado desde otro archivo (import)
export {tipo_cuenta_predefinida_webcontrol,tipo_cuenta_predefinida_webcontrol1};

//Para ser llamado desde window.opener
window.tipo_cuenta_predefinida_webcontrol1 = tipo_cuenta_predefinida_webcontrol1;


if(tipo_cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_cuenta_predefinida_webcontrol1.onLoadWindow; 
}

//</script>