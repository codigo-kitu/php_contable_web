//<script type="text/javascript" language="javascript">



//var tipo_tecla_mascaraJQueryPaginaWebInteraccion= function (tipo_tecla_mascara_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_tecla_mascara_constante,tipo_tecla_mascara_constante1} from '../util/tipo_tecla_mascara_constante.js';

import {tipo_tecla_mascara_funcion,tipo_tecla_mascara_funcion1} from '../util/tipo_tecla_mascara_form_funcion.js';


class tipo_tecla_mascara_webcontrol extends GeneralEntityWebControl {
	
	tipo_tecla_mascara_control=null;
	tipo_tecla_mascara_controlInicial=null;
	tipo_tecla_mascara_controlAuxiliar=null;
		
	//if(tipo_tecla_mascara_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_tecla_mascara_control) {
		super();
		
		this.tipo_tecla_mascara_control=tipo_tecla_mascara_control;
	}
		
	actualizarVariablesPagina(tipo_tecla_mascara_control) {
		
		if(tipo_tecla_mascara_control.action=="index" || tipo_tecla_mascara_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_tecla_mascara_control);
			
		} 
		
		
		
	
		else if(tipo_tecla_mascara_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_tecla_mascara_control);	
		
		} else if(tipo_tecla_mascara_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_tecla_mascara_control);		
		}
	
		else if(tipo_tecla_mascara_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_tecla_mascara_control);		
		}
	
		
		
		else if(tipo_tecla_mascara_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(tipo_tecla_mascara_control);		
		
		} else if(tipo_tecla_mascara_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_tecla_mascara_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tipo_tecla_mascara_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(tipo_tecla_mascara_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tipo_tecla_mascara_control) {
		this.actualizarPaginaAccionesGenerales(tipo_tecla_mascara_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tipo_tecla_mascara_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_tecla_mascara_control);
		this.actualizarPaginaOrderBy(tipo_tecla_mascara_control);
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		this.actualizarPaginaCargaGeneralControles(tipo_tecla_mascara_control);
		//this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_tecla_mascara_control);
		this.actualizarPaginaAreaBusquedas(tipo_tecla_mascara_control);
		this.actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_tecla_mascara_control) {
		//this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_tecla_mascara_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_tecla_mascara_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_tecla_mascara_control);
		this.actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control);
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(tipo_tecla_mascara_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_tecla_mascara_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_tecla_mascara_control);
		this.actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control);
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
		this.onLoadCombosDefectoFK(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_tecla_mascara_control) {
		//FORMULARIO
		if(tipo_tecla_mascara_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_tecla_mascara_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(tipo_tecla_mascara_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		
		//COMBOS FK
		if(tipo_tecla_mascara_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(tipo_tecla_mascara_control) {
		//FORMULARIO
		if(tipo_tecla_mascara_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);	
		//COMBOS FK
		if(tipo_tecla_mascara_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tipo_tecla_mascara_control) {
		
		if(tipo_tecla_mascara_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_tecla_mascara_control);
		}
		
		if(tipo_tecla_mascara_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(tipo_tecla_mascara_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tipo_tecla_mascara_control) {
		if(tipo_tecla_mascara_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tipo_tecla_mascaraReturnGeneral",JSON.stringify(tipo_tecla_mascara_control.tipo_tecla_mascaraReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control) {
		if(tipo_tecla_mascara_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_tecla_mascara_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_tecla_mascara_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_tecla_mascara_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tipo_tecla_mascara_control, mostrar) {
		
		if(mostrar==true) {
			tipo_tecla_mascara_funcion1.resaltarRestaurarDivsPagina(false,"tipo_tecla_mascara");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_tecla_mascara_funcion1.resaltarRestaurarDivMantenimiento(false,"tipo_tecla_mascara");
			}			
			
			tipo_tecla_mascara_funcion1.mostrarDivMensaje(true,tipo_tecla_mascara_control.strAuxiliarMensaje,tipo_tecla_mascara_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_tecla_mascara_funcion1.mostrarDivMensaje(false,tipo_tecla_mascara_control.strAuxiliarMensaje,tipo_tecla_mascara_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_tecla_mascara_control) {
		if(tipo_tecla_mascara_funcion1.esPaginaForm(tipo_tecla_mascara_constante1)==true) {
			window.opener.tipo_tecla_mascara_webcontrol1.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_tecla_mascara_control) {
		tipo_tecla_mascara_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_tecla_mascara_control.strAuxiliarUrlPagina);
				
		tipo_tecla_mascara_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_tecla_mascara_control.strAuxiliarTipo,tipo_tecla_mascara_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_tecla_mascara_control) {
		tipo_tecla_mascara_funcion1.resaltarRestaurarDivMensaje(true,tipo_tecla_mascara_control.strAuxiliarMensajeAlert,tipo_tecla_mascara_control.strAuxiliarCssMensaje);
			
		if(tipo_tecla_mascara_funcion1.esPaginaForm(tipo_tecla_mascara_constante1)==true) {
			window.opener.tipo_tecla_mascara_funcion1.resaltarRestaurarDivMensaje(true,tipo_tecla_mascara_control.strAuxiliarMensajeAlert,tipo_tecla_mascara_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(tipo_tecla_mascara_control) {
		this.tipo_tecla_mascara_controlInicial=tipo_tecla_mascara_control;
			
		if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_tecla_mascara_control.strStyleDivArbol,tipo_tecla_mascara_control.strStyleDivContent
																,tipo_tecla_mascara_control.strStyleDivOpcionesBanner,tipo_tecla_mascara_control.strStyleDivExpandirColapsar
																,tipo_tecla_mascara_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(tipo_tecla_mascara_control) {
		this.actualizarCssBotonesPagina(tipo_tecla_mascara_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_tecla_mascara_control.tiposReportes,tipo_tecla_mascara_control.tiposReporte
															 	,tipo_tecla_mascara_control.tiposPaginacion,tipo_tecla_mascara_control.tiposAcciones
																,tipo_tecla_mascara_control.tiposColumnasSelect,tipo_tecla_mascara_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_tecla_mascara_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_tecla_mascara_control);			
	}
	
	actualizarPaginaUsuarioInvitado(tipo_tecla_mascara_control) {
	
		var indexPosition=tipo_tecla_mascara_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_tecla_mascara_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(tipo_tecla_mascara_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_tecla_mascara_control.strRecargarFkTiposNinguno!=null && tipo_tecla_mascara_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_tecla_mascara_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control) {
		jQuery("#tdtipo_tecla_mascaraNuevo").css("display",tipo_tecla_mascara_control.strPermisoNuevo);
		jQuery("#trtipo_tecla_mascaraElementos").css("display",tipo_tecla_mascara_control.strVisibleTablaElementos);
		jQuery("#trtipo_tecla_mascaraAcciones").css("display",tipo_tecla_mascara_control.strVisibleTablaAcciones);
		jQuery("#trtipo_tecla_mascaraParametrosAcciones").css("display",tipo_tecla_mascara_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(tipo_tecla_mascara_control) {
	
		this.actualizarCssBotonesMantenimiento(tipo_tecla_mascara_control);
				
		if(tipo_tecla_mascara_control.tipo_tecla_mascaraActual!=null) {//form
			
			this.actualizarCamposFormulario(tipo_tecla_mascara_control);			
		}
						
		this.actualizarSpanMensajesCampos(tipo_tecla_mascara_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tipo_tecla_mascara_control) {
	
		jQuery("#form"+tipo_tecla_mascara_constante1.STR_SUFIJO+"-id").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.id);
		jQuery("#form"+tipo_tecla_mascara_constante1.STR_SUFIJO+"-version_row").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.versionRow);
		jQuery("#form"+tipo_tecla_mascara_constante1.STR_SUFIJO+"-codigo").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.codigo);
		jQuery("#form"+tipo_tecla_mascara_constante1.STR_SUFIJO+"-nombre").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tipo_tecla_mascara_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tipo_tecla_mascara","seguridad","","form_tipo_tecla_mascara",formulario,"","",paraEventoTabla,idFilaTabla,tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
	}
	
	actualizarSpanMensajesCampos(tipo_tecla_mascara_control) {
		jQuery("#spanstrMensajeid").text(tipo_tecla_mascara_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(tipo_tecla_mascara_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(tipo_tecla_mascara_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tipo_tecla_mascara_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(tipo_tecla_mascara_control) {
		jQuery("#tdbtnNuevotipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotipo_tecla_mascara").css("display",tipo_tecla_mascara_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartipo_tecla_mascara").css("display",tipo_tecla_mascara_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartipo_tecla_mascara").css("display",tipo_tecla_mascara_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostipo_tecla_mascara").css("display",tipo_tecla_mascara_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartipo_tecla_mascara").css("visibility",tipo_tecla_mascara_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_tecla_mascara_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_tecla_mascara_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_tecla_mascara_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(tipo_tecla_mascara_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_tecla_mascara_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_tecla_mascara_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_tecla_mascara_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_tecla_mascara_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(tipo_tecla_mascara_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_tecla_mascara_funcion1.validarFormularioJQuery(tipo_tecla_mascara_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_tecla_mascara");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_tecla_mascara");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,"tipo_tecla_mascara");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_tecla_mascara_control) {
		
		
		
		if(tipo_tecla_mascara_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_tecla_mascaraActualizarToolBar").css("display",tipo_tecla_mascara_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdtipo_tecla_mascaraEliminarToolBar").css("display",tipo_tecla_mascara_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trtipo_tecla_mascaraElementos").css("display",tipo_tecla_mascara_control.strVisibleTablaElementos);
		
		jQuery("#trtipo_tecla_mascaraAcciones").css("display",tipo_tecla_mascara_control.strVisibleTablaAcciones);
		jQuery("#trtipo_tecla_mascaraParametrosAcciones").css("display",tipo_tecla_mascara_control.strVisibleTablaAcciones);
		
		jQuery("#tdtipo_tecla_mascaraCerrarPagina").css("display",tipo_tecla_mascara_control.strPermisoPopup);		
		jQuery("#tdtipo_tecla_mascaraCerrarPaginaToolBar").css("display",tipo_tecla_mascara_control.strPermisoPopup);
		//jQuery("#trtipo_tecla_mascaraAccionesRelaciones").css("display",tipo_tecla_mascara_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tipo_tecla_mascara_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_tecla_mascara_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tipo_tecla_mascara_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tipo Tecla Mascaras";
		sTituloBanner+=" - " + tipo_tecla_mascara_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_tecla_mascara_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtipo_tecla_mascaraRelacionesToolBar").css("display",tipo_tecla_mascara_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostipo_tecla_mascara").css("display",tipo_tecla_mascara_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tipo_tecla_mascara_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tipo_tecla_mascara_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_tecla_mascara_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_tecla_mascara_webcontrol1.registrarEventosControles();
		
		if(tipo_tecla_mascara_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="false") {
			tipo_tecla_mascara_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_tecla_mascara_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_tecla_mascara_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_tecla_mascara_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_tecla_mascara_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tipo_tecla_mascara_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(tipo_tecla_mascara_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(tipo_tecla_mascara_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
						//tipo_tecla_mascara_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(tipo_tecla_mascara_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tipo_tecla_mascara_constante1.BIG_ID_ACTUAL,"tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
						//tipo_tecla_mascara_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			tipo_tecla_mascara_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);	
	}
}

var tipo_tecla_mascara_webcontrol1 = new tipo_tecla_mascara_webcontrol();

//Para ser llamado desde otro archivo (import)
export {tipo_tecla_mascara_webcontrol,tipo_tecla_mascara_webcontrol1};

//Para ser llamado desde window.opener
window.tipo_tecla_mascara_webcontrol1 = tipo_tecla_mascara_webcontrol1;


if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_tecla_mascara_webcontrol1.onLoadWindow; 
}

//</script>