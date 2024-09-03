//<script type="text/javascript" language="javascript">



//var otro_parametroJQueryPaginaWebInteraccion= function (otro_parametro_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {otro_parametro_constante,otro_parametro_constante1} from '../util/otro_parametro_constante.js';

import {otro_parametro_funcion,otro_parametro_funcion1} from '../util/otro_parametro_form_funcion.js';


class otro_parametro_webcontrol extends GeneralEntityWebControl {
	
	otro_parametro_control=null;
	otro_parametro_controlInicial=null;
	otro_parametro_controlAuxiliar=null;
		
	//if(otro_parametro_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(otro_parametro_control) {
		super();
		
		this.otro_parametro_control=otro_parametro_control;
	}
		
	actualizarVariablesPagina(otro_parametro_control) {
		
		if(otro_parametro_control.action=="index" || otro_parametro_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(otro_parametro_control);
			
		} 
		
		
		
	
		else if(otro_parametro_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(otro_parametro_control);	
		
		} else if(otro_parametro_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(otro_parametro_control);		
		}
	
	
		
		
		else if(otro_parametro_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(otro_parametro_control);		
		
		} else if(otro_parametro_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(otro_parametro_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + otro_parametro_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(otro_parametro_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(otro_parametro_control) {
		this.actualizarPaginaAccionesGenerales(otro_parametro_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(otro_parametro_control) {
		
		this.actualizarPaginaCargaGeneral(otro_parametro_control);
		this.actualizarPaginaOrderBy(otro_parametro_control);
		this.actualizarPaginaTablaDatos(otro_parametro_control);
		this.actualizarPaginaCargaGeneralControles(otro_parametro_control);
		//this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_parametro_control);
		this.actualizarPaginaAreaBusquedas(otro_parametro_control);
		this.actualizarPaginaCargaCombosFK(otro_parametro_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(otro_parametro_control) {
		//this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(otro_parametro_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(otro_parametro_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_parametro_control);		
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(otro_parametro_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_parametro_control);		
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(otro_parametro_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_parametro_control);		
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(otro_parametro_control) {
		this.actualizarPaginaCargaGeneralControles(otro_parametro_control);
		this.actualizarPaginaCargaCombosFK(otro_parametro_control);
		this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(otro_parametro_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(otro_parametro_control) {
		this.actualizarPaginaCargaGeneralControles(otro_parametro_control);
		this.actualizarPaginaCargaCombosFK(otro_parametro_control);
		this.actualizarPaginaFormulario(otro_parametro_control);
		this.onLoadCombosDefectoFK(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(otro_parametro_control) {
		//FORMULARIO
		if(otro_parametro_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_parametro_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(otro_parametro_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		
		//COMBOS FK
		if(otro_parametro_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_parametro_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(otro_parametro_control) {
		//FORMULARIO
		if(otro_parametro_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_parametro_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);	
		//COMBOS FK
		if(otro_parametro_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_parametro_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(otro_parametro_control) {
		
		if(otro_parametro_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(otro_parametro_control);
		}
		
		if(otro_parametro_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(otro_parametro_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(otro_parametro_control) {
		if(otro_parametro_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("otro_parametroReturnGeneral",JSON.stringify(otro_parametro_control.otro_parametroReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control) {
		if(otro_parametro_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && otro_parametro_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(otro_parametro_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(otro_parametro_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(otro_parametro_control, mostrar) {
		
		if(mostrar==true) {
			otro_parametro_funcion1.resaltarRestaurarDivsPagina(false,"otro_parametro");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				otro_parametro_funcion1.resaltarRestaurarDivMantenimiento(false,"otro_parametro");
			}			
			
			otro_parametro_funcion1.mostrarDivMensaje(true,otro_parametro_control.strAuxiliarMensaje,otro_parametro_control.strAuxiliarCssMensaje);
		
		} else {
			otro_parametro_funcion1.mostrarDivMensaje(false,otro_parametro_control.strAuxiliarMensaje,otro_parametro_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(otro_parametro_control) {
		if(otro_parametro_funcion1.esPaginaForm(otro_parametro_constante1)==true) {
			window.opener.otro_parametro_webcontrol1.actualizarPaginaTablaDatos(otro_parametro_control);
		} else {
			this.actualizarPaginaTablaDatos(otro_parametro_control);
		}
	}
	
	actualizarPaginaAbrirLink(otro_parametro_control) {
		otro_parametro_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(otro_parametro_control.strAuxiliarUrlPagina);
				
		otro_parametro_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(otro_parametro_control.strAuxiliarTipo,otro_parametro_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(otro_parametro_control) {
		otro_parametro_funcion1.resaltarRestaurarDivMensaje(true,otro_parametro_control.strAuxiliarMensajeAlert,otro_parametro_control.strAuxiliarCssMensaje);
			
		if(otro_parametro_funcion1.esPaginaForm(otro_parametro_constante1)==true) {
			window.opener.otro_parametro_funcion1.resaltarRestaurarDivMensaje(true,otro_parametro_control.strAuxiliarMensajeAlert,otro_parametro_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(otro_parametro_control) {
		this.otro_parametro_controlInicial=otro_parametro_control;
			
		if(otro_parametro_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(otro_parametro_control.strStyleDivArbol,otro_parametro_control.strStyleDivContent
																,otro_parametro_control.strStyleDivOpcionesBanner,otro_parametro_control.strStyleDivExpandirColapsar
																,otro_parametro_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(otro_parametro_control) {
		this.actualizarCssBotonesPagina(otro_parametro_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(otro_parametro_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(otro_parametro_control.tiposReportes,otro_parametro_control.tiposReporte
															 	,otro_parametro_control.tiposPaginacion,otro_parametro_control.tiposAcciones
																,otro_parametro_control.tiposColumnasSelect,otro_parametro_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(otro_parametro_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(otro_parametro_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(otro_parametro_control);			
	}
	
	actualizarPaginaUsuarioInvitado(otro_parametro_control) {
	
		var indexPosition=otro_parametro_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=otro_parametro_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(otro_parametro_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(otro_parametro_control.strRecargarFkTiposNinguno!=null && otro_parametro_control.strRecargarFkTiposNinguno!='NINGUNO' && otro_parametro_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(otro_parametro_control) {
		jQuery("#tdotro_parametroNuevo").css("display",otro_parametro_control.strPermisoNuevo);
		jQuery("#trotro_parametroElementos").css("display",otro_parametro_control.strVisibleTablaElementos);
		jQuery("#trotro_parametroAcciones").css("display",otro_parametro_control.strVisibleTablaAcciones);
		jQuery("#trotro_parametroParametrosAcciones").css("display",otro_parametro_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(otro_parametro_control) {
	
		this.actualizarCssBotonesMantenimiento(otro_parametro_control);
				
		if(otro_parametro_control.otro_parametroActual!=null) {//form
			
			this.actualizarCamposFormulario(otro_parametro_control);			
		}
						
		this.actualizarSpanMensajesCampos(otro_parametro_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(otro_parametro_control) {
	
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-id").val(otro_parametro_control.otro_parametroActual.id);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-version_row").val(otro_parametro_control.otro_parametroActual.versionRow);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-codigo").val(otro_parametro_control.otro_parametroActual.codigo);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-codigo2").val(otro_parametro_control.otro_parametroActual.codigo2);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-grupo").val(otro_parametro_control.otro_parametroActual.grupo);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-descripcion").val(otro_parametro_control.otro_parametroActual.descripcion);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-texto1").val(otro_parametro_control.otro_parametroActual.texto1);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-orden").val(otro_parametro_control.otro_parametroActual.orden);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-monto1").val(otro_parametro_control.otro_parametroActual.monto1);
		jQuery("#form"+otro_parametro_constante1.STR_SUFIJO+"-activo").prop('checked',otro_parametro_control.otro_parametroActual.activo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+otro_parametro_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("otro_parametro","general","","form_otro_parametro",formulario,"","",paraEventoTabla,idFilaTabla,otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
	}
	
	actualizarSpanMensajesCampos(otro_parametro_control) {
		jQuery("#spanstrMensajeid").text(otro_parametro_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(otro_parametro_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(otro_parametro_control.strMensajecodigo);		
		jQuery("#spanstrMensajecodigo2").text(otro_parametro_control.strMensajecodigo2);		
		jQuery("#spanstrMensajegrupo").text(otro_parametro_control.strMensajegrupo);		
		jQuery("#spanstrMensajedescripcion").text(otro_parametro_control.strMensajedescripcion);		
		jQuery("#spanstrMensajetexto1").text(otro_parametro_control.strMensajetexto1);		
		jQuery("#spanstrMensajeorden").text(otro_parametro_control.strMensajeorden);		
		jQuery("#spanstrMensajemonto1").text(otro_parametro_control.strMensajemonto1);		
		jQuery("#spanstrMensajeactivo").text(otro_parametro_control.strMensajeactivo);		
	}
	
	actualizarCssBotonesMantenimiento(otro_parametro_control) {
		jQuery("#tdbtnNuevootro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevootro_parametro").css("display",otro_parametro_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarotro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarotro_parametro").css("display",otro_parametro_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarotro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarotro_parametro").css("display",otro_parametro_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarotro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosotro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosotro_parametro").css("display",otro_parametro_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarotro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarotro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarotro_parametro").css("visibility",otro_parametro_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//otro_parametro_control
		
	
	}
	
	onLoadCombosDefectoFK(otro_parametro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_parametro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(otro_parametro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_parametro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(otro_parametro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_parametro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(otro_parametro_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(otro_parametro_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_parametro_funcion1.validarFormularioJQuery(otro_parametro_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("otro_parametro");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("otro_parametro");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(otro_parametro_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,"otro_parametro");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(otro_parametro_control) {
		
		
		
		if(otro_parametro_control.strPermisoActualizar!=null) {
			jQuery("#tdotro_parametroActualizarToolBar").css("display",otro_parametro_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdotro_parametroEliminarToolBar").css("display",otro_parametro_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trotro_parametroElementos").css("display",otro_parametro_control.strVisibleTablaElementos);
		
		jQuery("#trotro_parametroAcciones").css("display",otro_parametro_control.strVisibleTablaAcciones);
		jQuery("#trotro_parametroParametrosAcciones").css("display",otro_parametro_control.strVisibleTablaAcciones);
		
		jQuery("#tdotro_parametroCerrarPagina").css("display",otro_parametro_control.strPermisoPopup);		
		jQuery("#tdotro_parametroCerrarPaginaToolBar").css("display",otro_parametro_control.strPermisoPopup);
		//jQuery("#trotro_parametroAccionesRelaciones").css("display",otro_parametro_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=otro_parametro_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_parametro_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + otro_parametro_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Otros Parametroses";
		sTituloBanner+=" - " + otro_parametro_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_parametro_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdotro_parametroRelacionesToolBar").css("display",otro_parametro_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosotro_parametro").css("display",otro_parametro_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		otro_parametro_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		otro_parametro_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		otro_parametro_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		otro_parametro_webcontrol1.registrarEventosControles();
		
		if(otro_parametro_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(otro_parametro_constante1.STR_ES_RELACIONADO=="false") {
			otro_parametro_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(otro_parametro_constante1.STR_ES_RELACIONES=="true") {
			if(otro_parametro_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_parametro_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(otro_parametro_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(otro_parametro_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(otro_parametro_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(otro_parametro_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
						//otro_parametro_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(otro_parametro_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(otro_parametro_constante1.BIG_ID_ACTUAL,"otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
						//otro_parametro_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			otro_parametro_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);	
	}
}

var otro_parametro_webcontrol1 = new otro_parametro_webcontrol();

//Para ser llamado desde otro archivo (import)
export {otro_parametro_webcontrol,otro_parametro_webcontrol1};

//Para ser llamado desde window.opener
window.otro_parametro_webcontrol1 = otro_parametro_webcontrol1;


if(otro_parametro_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = otro_parametro_webcontrol1.onLoadWindow; 
}

//</script>