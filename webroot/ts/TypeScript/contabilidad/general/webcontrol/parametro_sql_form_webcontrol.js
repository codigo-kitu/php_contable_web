//<script type="text/javascript" language="javascript">



//var parametro_sqlJQueryPaginaWebInteraccion= function (parametro_sql_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_sql_constante,parametro_sql_constante1} from '../util/parametro_sql_constante.js';

import {parametro_sql_funcion,parametro_sql_funcion1} from '../util/parametro_sql_form_funcion.js';


class parametro_sql_webcontrol extends GeneralEntityWebControl {
	
	parametro_sql_control=null;
	parametro_sql_controlInicial=null;
	parametro_sql_controlAuxiliar=null;
		
	//if(parametro_sql_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_sql_control) {
		super();
		
		this.parametro_sql_control=parametro_sql_control;
	}
		
	actualizarVariablesPagina(parametro_sql_control) {
		
		if(parametro_sql_control.action=="index" || parametro_sql_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_sql_control);
			
		} 
		
		
		
	
		else if(parametro_sql_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_sql_control);	
		
		} else if(parametro_sql_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_sql_control);		
		}
	
	
		
		
		else if(parametro_sql_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_sql_control);
		
		} else if(parametro_sql_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_sql_control);		
		
		} else if(parametro_sql_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_sql_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_sql_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_sql_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_sql_control) {
		this.actualizarPaginaAccionesGenerales(parametro_sql_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_sql_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_sql_control);
		this.actualizarPaginaOrderBy(parametro_sql_control);
		this.actualizarPaginaTablaDatos(parametro_sql_control);
		this.actualizarPaginaCargaGeneralControles(parametro_sql_control);
		//this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_sql_control);
		this.actualizarPaginaAreaBusquedas(parametro_sql_control);
		this.actualizarPaginaCargaCombosFK(parametro_sql_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_sql_control) {
		//this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_sql_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(parametro_sql_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_sql_control);		
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_sql_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_sql_control);		
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_sql_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_sql_control);		
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_sql_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_sql_control);
		this.actualizarPaginaCargaCombosFK(parametro_sql_control);
		this.actualizarPaginaFormulario(parametro_sql_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(parametro_sql_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_sql_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_sql_control);
		this.actualizarPaginaCargaCombosFK(parametro_sql_control);
		this.actualizarPaginaFormulario(parametro_sql_control);
		this.onLoadCombosDefectoFK(parametro_sql_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_sql_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_sql_control) {
		//FORMULARIO
		if(parametro_sql_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_sql_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_sql_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);		
		
		//COMBOS FK
		if(parametro_sql_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_sql_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_sql_control) {
		//FORMULARIO
		if(parametro_sql_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_sql_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control);	
		//COMBOS FK
		if(parametro_sql_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_sql_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_sql_control) {
		
		if(parametro_sql_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_sql_control);
		}
		
		if(parametro_sql_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_sql_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_sql_control) {
		if(parametro_sql_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_sqlReturnGeneral",JSON.stringify(parametro_sql_control.parametro_sqlReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_sql_control) {
		if(parametro_sql_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_sql_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_sql_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_sql_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_sql_control, mostrar) {
		
		if(mostrar==true) {
			parametro_sql_funcion1.resaltarRestaurarDivsPagina(false,"parametro_sql");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_sql_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_sql");
			}			
			
			parametro_sql_funcion1.mostrarDivMensaje(true,parametro_sql_control.strAuxiliarMensaje,parametro_sql_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_sql_funcion1.mostrarDivMensaje(false,parametro_sql_control.strAuxiliarMensaje,parametro_sql_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_sql_control) {
		if(parametro_sql_funcion1.esPaginaForm(parametro_sql_constante1)==true) {
			window.opener.parametro_sql_webcontrol1.actualizarPaginaTablaDatos(parametro_sql_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_sql_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_sql_control) {
		parametro_sql_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_sql_control.strAuxiliarUrlPagina);
				
		parametro_sql_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_sql_control.strAuxiliarTipo,parametro_sql_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_sql_control) {
		parametro_sql_funcion1.resaltarRestaurarDivMensaje(true,parametro_sql_control.strAuxiliarMensajeAlert,parametro_sql_control.strAuxiliarCssMensaje);
			
		if(parametro_sql_funcion1.esPaginaForm(parametro_sql_constante1)==true) {
			window.opener.parametro_sql_funcion1.resaltarRestaurarDivMensaje(true,parametro_sql_control.strAuxiliarMensajeAlert,parametro_sql_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_sql_control) {
		this.parametro_sql_controlInicial=parametro_sql_control;
			
		if(parametro_sql_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_sql_control.strStyleDivArbol,parametro_sql_control.strStyleDivContent
																,parametro_sql_control.strStyleDivOpcionesBanner,parametro_sql_control.strStyleDivExpandirColapsar
																,parametro_sql_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_sql_control) {
		this.actualizarCssBotonesPagina(parametro_sql_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_sql_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_sql_control.tiposReportes,parametro_sql_control.tiposReporte
															 	,parametro_sql_control.tiposPaginacion,parametro_sql_control.tiposAcciones
																,parametro_sql_control.tiposColumnasSelect,parametro_sql_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_sql_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_sql_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_sql_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_sql_control) {
	
		var indexPosition=parametro_sql_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_sql_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_sql_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_sql_control.strRecargarFkTiposNinguno!=null && parametro_sql_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_sql_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(parametro_sql_control) {
		jQuery("#tdparametro_sqlNuevo").css("display",parametro_sql_control.strPermisoNuevo);
		jQuery("#trparametro_sqlElementos").css("display",parametro_sql_control.strVisibleTablaElementos);
		jQuery("#trparametro_sqlAcciones").css("display",parametro_sql_control.strVisibleTablaAcciones);
		jQuery("#trparametro_sqlParametrosAcciones").css("display",parametro_sql_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_sql_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_sql_control);
				
		if(parametro_sql_control.parametro_sqlActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_sql_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_sql_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_sql_control) {
	
		jQuery("#form"+parametro_sql_constante1.STR_SUFIJO+"-id").val(parametro_sql_control.parametro_sqlActual.id);
		jQuery("#form"+parametro_sql_constante1.STR_SUFIJO+"-version_row").val(parametro_sql_control.parametro_sqlActual.versionRow);
		jQuery("#form"+parametro_sql_constante1.STR_SUFIJO+"-binario1").val(parametro_sql_control.parametro_sqlActual.binario1);
		jQuery("#form"+parametro_sql_constante1.STR_SUFIJO+"-binario2").val(parametro_sql_control.parametro_sqlActual.binario2);
		jQuery("#form"+parametro_sql_constante1.STR_SUFIJO+"-binario3").val(parametro_sql_control.parametro_sqlActual.binario3);
		jQuery("#form"+parametro_sql_constante1.STR_SUFIJO+"-binario4").val(parametro_sql_control.parametro_sqlActual.binario4);
		jQuery("#form"+parametro_sql_constante1.STR_SUFIJO+"-binario5").val(parametro_sql_control.parametro_sqlActual.binario5);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_sql_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_sql","general","","form_parametro_sql",formulario,"","",paraEventoTabla,idFilaTabla,parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
	}
	
	actualizarSpanMensajesCampos(parametro_sql_control) {
		jQuery("#spanstrMensajeid").text(parametro_sql_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_sql_control.strMensajeversion_row);		
		jQuery("#spanstrMensajebinario1").text(parametro_sql_control.strMensajebinario1);		
		jQuery("#spanstrMensajebinario2").text(parametro_sql_control.strMensajebinario2);		
		jQuery("#spanstrMensajebinario3").text(parametro_sql_control.strMensajebinario3);		
		jQuery("#spanstrMensajebinario4").text(parametro_sql_control.strMensajebinario4);		
		jQuery("#spanstrMensajebinario5").text(parametro_sql_control.strMensajebinario5);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_sql_control) {
		jQuery("#tdbtnNuevoparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_sql").css("display",parametro_sql_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_sql").css("display",parametro_sql_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_sql").css("display",parametro_sql_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_sql").css("display",parametro_sql_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_sql").css("visibility",parametro_sql_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_sql_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_sql_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_sql_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(parametro_sql_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_sql_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_sql_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_sql_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_sql_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(parametro_sql_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_sql_funcion1.validarFormularioJQuery(parametro_sql_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_sql");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_sql");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_sql_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,"parametro_sql");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_sql_control) {
		
		
		
		if(parametro_sql_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_sqlActualizarToolBar").css("display",parametro_sql_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdparametro_sqlEliminarToolBar").css("display",parametro_sql_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trparametro_sqlElementos").css("display",parametro_sql_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_sqlAcciones").css("display",parametro_sql_control.strVisibleTablaAcciones);
		jQuery("#trparametro_sqlParametrosAcciones").css("display",parametro_sql_control.strVisibleTablaAcciones);
		
		jQuery("#tdparametro_sqlCerrarPagina").css("display",parametro_sql_control.strPermisoPopup);		
		jQuery("#tdparametro_sqlCerrarPaginaToolBar").css("display",parametro_sql_control.strPermisoPopup);
		//jQuery("#trparametro_sqlAccionesRelaciones").css("display",parametro_sql_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_sql_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_sql_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_sql_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametros Sqles";
		sTituloBanner+=" - " + parametro_sql_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_sql_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_sqlRelacionesToolBar").css("display",parametro_sql_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_sql").css("display",parametro_sql_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_sql_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_sql_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_sql_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_sql_webcontrol1.registrarEventosControles();
		
		if(parametro_sql_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_sql_constante1.STR_ES_RELACIONADO=="false") {
			parametro_sql_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_sql_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_sql_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_sql_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_sql_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_sql_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(parametro_sql_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(parametro_sql_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
						//parametro_sql_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(parametro_sql_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_sql_constante1.BIG_ID_ACTUAL,"parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);
						//parametro_sql_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			parametro_sql_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_sql","general","",parametro_sql_funcion1,parametro_sql_webcontrol1,parametro_sql_constante1);	
	}
}

var parametro_sql_webcontrol1 = new parametro_sql_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_sql_webcontrol,parametro_sql_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_sql_webcontrol1 = parametro_sql_webcontrol1;


if(parametro_sql_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_sql_webcontrol1.onLoadWindow; 
}

//</script>