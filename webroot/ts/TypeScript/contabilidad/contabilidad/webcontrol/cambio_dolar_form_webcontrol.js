//<script type="text/javascript" language="javascript">



//var cambio_dolarJQueryPaginaWebInteraccion= function (cambio_dolar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cambio_dolar_constante,cambio_dolar_constante1} from '../util/cambio_dolar_constante.js';

import {cambio_dolar_funcion,cambio_dolar_funcion1} from '../util/cambio_dolar_form_funcion.js';


class cambio_dolar_webcontrol extends GeneralEntityWebControl {
	
	cambio_dolar_control=null;
	cambio_dolar_controlInicial=null;
	cambio_dolar_controlAuxiliar=null;
		
	//if(cambio_dolar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cambio_dolar_control) {
		super();
		
		this.cambio_dolar_control=cambio_dolar_control;
	}
		
	actualizarVariablesPagina(cambio_dolar_control) {
		
		if(cambio_dolar_control.action=="index" || cambio_dolar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cambio_dolar_control);
			
		} 
		
		
		
	
		else if(cambio_dolar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cambio_dolar_control);	
		
		} else if(cambio_dolar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cambio_dolar_control);		
		}
	
	
		
		
		else if(cambio_dolar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cambio_dolar_control);
		
		} else if(cambio_dolar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(cambio_dolar_control);		
		
		} else if(cambio_dolar_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(cambio_dolar_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cambio_dolar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cambio_dolar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cambio_dolar_control) {
		this.actualizarPaginaAccionesGenerales(cambio_dolar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cambio_dolar_control) {
		
		this.actualizarPaginaCargaGeneral(cambio_dolar_control);
		this.actualizarPaginaOrderBy(cambio_dolar_control);
		this.actualizarPaginaTablaDatos(cambio_dolar_control);
		this.actualizarPaginaCargaGeneralControles(cambio_dolar_control);
		//this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cambio_dolar_control);
		this.actualizarPaginaAreaBusquedas(cambio_dolar_control);
		this.actualizarPaginaCargaCombosFK(cambio_dolar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cambio_dolar_control) {
		//this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cambio_dolar_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(cambio_dolar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(cambio_dolar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(cambio_dolar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(cambio_dolar_control) {
		this.actualizarPaginaCargaGeneralControles(cambio_dolar_control);
		this.actualizarPaginaCargaCombosFK(cambio_dolar_control);
		this.actualizarPaginaFormulario(cambio_dolar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(cambio_dolar_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(cambio_dolar_control) {
		this.actualizarPaginaCargaGeneralControles(cambio_dolar_control);
		this.actualizarPaginaCargaCombosFK(cambio_dolar_control);
		this.actualizarPaginaFormulario(cambio_dolar_control);
		this.onLoadCombosDefectoFK(cambio_dolar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		this.actualizarPaginaAreaMantenimiento(cambio_dolar_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(cambio_dolar_control) {
		//FORMULARIO
		if(cambio_dolar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cambio_dolar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(cambio_dolar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);		
		
		//COMBOS FK
		if(cambio_dolar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cambio_dolar_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(cambio_dolar_control) {
		//FORMULARIO
		if(cambio_dolar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(cambio_dolar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control);	
		//COMBOS FK
		if(cambio_dolar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(cambio_dolar_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cambio_dolar_control) {
		
		if(cambio_dolar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cambio_dolar_control);
		}
		
		if(cambio_dolar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cambio_dolar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cambio_dolar_control) {
		if(cambio_dolar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cambio_dolarReturnGeneral",JSON.stringify(cambio_dolar_control.cambio_dolarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cambio_dolar_control) {
		if(cambio_dolar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cambio_dolar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cambio_dolar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cambio_dolar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cambio_dolar_control, mostrar) {
		
		if(mostrar==true) {
			cambio_dolar_funcion1.resaltarRestaurarDivsPagina(false,"cambio_dolar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cambio_dolar_funcion1.resaltarRestaurarDivMantenimiento(false,"cambio_dolar");
			}			
			
			cambio_dolar_funcion1.mostrarDivMensaje(true,cambio_dolar_control.strAuxiliarMensaje,cambio_dolar_control.strAuxiliarCssMensaje);
		
		} else {
			cambio_dolar_funcion1.mostrarDivMensaje(false,cambio_dolar_control.strAuxiliarMensaje,cambio_dolar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cambio_dolar_control) {
		if(cambio_dolar_funcion1.esPaginaForm(cambio_dolar_constante1)==true) {
			window.opener.cambio_dolar_webcontrol1.actualizarPaginaTablaDatos(cambio_dolar_control);
		} else {
			this.actualizarPaginaTablaDatos(cambio_dolar_control);
		}
	}
	
	actualizarPaginaAbrirLink(cambio_dolar_control) {
		cambio_dolar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cambio_dolar_control.strAuxiliarUrlPagina);
				
		cambio_dolar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cambio_dolar_control.strAuxiliarTipo,cambio_dolar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cambio_dolar_control) {
		cambio_dolar_funcion1.resaltarRestaurarDivMensaje(true,cambio_dolar_control.strAuxiliarMensajeAlert,cambio_dolar_control.strAuxiliarCssMensaje);
			
		if(cambio_dolar_funcion1.esPaginaForm(cambio_dolar_constante1)==true) {
			window.opener.cambio_dolar_funcion1.resaltarRestaurarDivMensaje(true,cambio_dolar_control.strAuxiliarMensajeAlert,cambio_dolar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cambio_dolar_control) {
		this.cambio_dolar_controlInicial=cambio_dolar_control;
			
		if(cambio_dolar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cambio_dolar_control.strStyleDivArbol,cambio_dolar_control.strStyleDivContent
																,cambio_dolar_control.strStyleDivOpcionesBanner,cambio_dolar_control.strStyleDivExpandirColapsar
																,cambio_dolar_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cambio_dolar_control) {
		this.actualizarCssBotonesPagina(cambio_dolar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cambio_dolar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cambio_dolar_control.tiposReportes,cambio_dolar_control.tiposReporte
															 	,cambio_dolar_control.tiposPaginacion,cambio_dolar_control.tiposAcciones
																,cambio_dolar_control.tiposColumnasSelect,cambio_dolar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cambio_dolar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cambio_dolar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cambio_dolar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cambio_dolar_control) {
	
		var indexPosition=cambio_dolar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cambio_dolar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cambio_dolar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cambio_dolar_control.strRecargarFkTiposNinguno!=null && cambio_dolar_control.strRecargarFkTiposNinguno!='NINGUNO' && cambio_dolar_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(cambio_dolar_control) {
		jQuery("#tdcambio_dolarNuevo").css("display",cambio_dolar_control.strPermisoNuevo);
		jQuery("#trcambio_dolarElementos").css("display",cambio_dolar_control.strVisibleTablaElementos);
		jQuery("#trcambio_dolarAcciones").css("display",cambio_dolar_control.strVisibleTablaAcciones);
		jQuery("#trcambio_dolarParametrosAcciones").css("display",cambio_dolar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(cambio_dolar_control) {
	
		this.actualizarCssBotonesMantenimiento(cambio_dolar_control);
				
		if(cambio_dolar_control.cambio_dolarActual!=null) {//form
			
			this.actualizarCamposFormulario(cambio_dolar_control);			
		}
						
		this.actualizarSpanMensajesCampos(cambio_dolar_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(cambio_dolar_control) {
	
		jQuery("#form"+cambio_dolar_constante1.STR_SUFIJO+"-id").val(cambio_dolar_control.cambio_dolarActual.id);
		jQuery("#form"+cambio_dolar_constante1.STR_SUFIJO+"-version_row").val(cambio_dolar_control.cambio_dolarActual.versionRow);
		jQuery("#form"+cambio_dolar_constante1.STR_SUFIJO+"-fecha_cambio").val(cambio_dolar_control.cambio_dolarActual.fecha_cambio);
		jQuery("#form"+cambio_dolar_constante1.STR_SUFIJO+"-dolar_compra").val(cambio_dolar_control.cambio_dolarActual.dolar_compra);
		jQuery("#form"+cambio_dolar_constante1.STR_SUFIJO+"-dolar_venta").val(cambio_dolar_control.cambio_dolarActual.dolar_venta);
		jQuery("#form"+cambio_dolar_constante1.STR_SUFIJO+"-origen").val(cambio_dolar_control.cambio_dolarActual.origen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+cambio_dolar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("cambio_dolar","contabilidad","","form_cambio_dolar",formulario,"","",paraEventoTabla,idFilaTabla,cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
	}
	
	actualizarSpanMensajesCampos(cambio_dolar_control) {
		jQuery("#spanstrMensajeid").text(cambio_dolar_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(cambio_dolar_control.strMensajeversion_row);		
		jQuery("#spanstrMensajefecha_cambio").text(cambio_dolar_control.strMensajefecha_cambio);		
		jQuery("#spanstrMensajedolar_compra").text(cambio_dolar_control.strMensajedolar_compra);		
		jQuery("#spanstrMensajedolar_venta").text(cambio_dolar_control.strMensajedolar_venta);		
		jQuery("#spanstrMensajeorigen").text(cambio_dolar_control.strMensajeorigen);		
	}
	
	actualizarCssBotonesMantenimiento(cambio_dolar_control) {
		jQuery("#tdbtnNuevocambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocambio_dolar").css("display",cambio_dolar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcambio_dolar").css("display",cambio_dolar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcambio_dolar").css("display",cambio_dolar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscambio_dolar").css("display",cambio_dolar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcambio_dolar").css("visibility",cambio_dolar_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cambio_dolar_control
		
	
	}
	
	onLoadCombosDefectoFK(cambio_dolar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cambio_dolar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(cambio_dolar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cambio_dolar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cambio_dolar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cambio_dolar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cambio_dolar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(cambio_dolar_constante1.BIT_ES_PAGINA_FORM==true) {
				cambio_dolar_funcion1.validarFormularioJQuery(cambio_dolar_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cambio_dolar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cambio_dolar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(cambio_dolar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,"cambio_dolar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cambio_dolar_control) {
		
		
		
		if(cambio_dolar_control.strPermisoActualizar!=null) {
			jQuery("#tdcambio_dolarActualizarToolBar").css("display",cambio_dolar_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcambio_dolarEliminarToolBar").css("display",cambio_dolar_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcambio_dolarElementos").css("display",cambio_dolar_control.strVisibleTablaElementos);
		
		jQuery("#trcambio_dolarAcciones").css("display",cambio_dolar_control.strVisibleTablaAcciones);
		jQuery("#trcambio_dolarParametrosAcciones").css("display",cambio_dolar_control.strVisibleTablaAcciones);
		
		jQuery("#tdcambio_dolarCerrarPagina").css("display",cambio_dolar_control.strPermisoPopup);		
		jQuery("#tdcambio_dolarCerrarPaginaToolBar").css("display",cambio_dolar_control.strPermisoPopup);
		//jQuery("#trcambio_dolarAccionesRelaciones").css("display",cambio_dolar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cambio_dolar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cambio_dolar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cambio_dolar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cambio Dolares";
		sTituloBanner+=" - " + cambio_dolar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cambio_dolar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcambio_dolarRelacionesToolBar").css("display",cambio_dolar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscambio_dolar").css("display",cambio_dolar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cambio_dolar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cambio_dolar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cambio_dolar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cambio_dolar_webcontrol1.registrarEventosControles();
		
		if(cambio_dolar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cambio_dolar_constante1.STR_ES_RELACIONADO=="false") {
			cambio_dolar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cambio_dolar_constante1.STR_ES_RELACIONES=="true") {
			if(cambio_dolar_constante1.BIT_ES_PAGINA_FORM==true) {
				cambio_dolar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cambio_dolar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cambio_dolar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(cambio_dolar_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(cambio_dolar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
						//cambio_dolar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(cambio_dolar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(cambio_dolar_constante1.BIG_ID_ACTUAL,"cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);
						//cambio_dolar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			cambio_dolar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cambio_dolar","contabilidad","",cambio_dolar_funcion1,cambio_dolar_webcontrol1,cambio_dolar_constante1);	
	}
}

var cambio_dolar_webcontrol1 = new cambio_dolar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cambio_dolar_webcontrol,cambio_dolar_webcontrol1};

//Para ser llamado desde window.opener
window.cambio_dolar_webcontrol1 = cambio_dolar_webcontrol1;


if(cambio_dolar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cambio_dolar_webcontrol1.onLoadWindow; 
}

//</script>