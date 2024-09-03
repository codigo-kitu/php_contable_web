//<script type="text/javascript" language="javascript">



//var periodoJQueryPaginaWebInteraccion= function (periodo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {periodo_constante,periodo_constante1} from '../util/periodo_constante.js';

import {periodo_funcion,periodo_funcion1} from '../util/periodo_form_funcion.js';


class periodo_webcontrol extends GeneralEntityWebControl {
	
	periodo_control=null;
	periodo_controlInicial=null;
	periodo_controlAuxiliar=null;
		
	//if(periodo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(periodo_control) {
		super();
		
		this.periodo_control=periodo_control;
	}
		
	actualizarVariablesPagina(periodo_control) {
		
		if(periodo_control.action=="index" || periodo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(periodo_control);
			
		} 
		
		
		
	
		else if(periodo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(periodo_control);	
		
		} else if(periodo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(periodo_control);		
		}
	
	
		
		
		else if(periodo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(periodo_control);
		
		} else if(periodo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(periodo_control);
		
		} else if(periodo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(periodo_control);
		
		} else if(periodo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(periodo_control);
		
		} else if(periodo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(periodo_control);
		
		} else if(periodo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(periodo_control);		
		
		} else if(periodo_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(periodo_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + periodo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(periodo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(periodo_control) {
		this.actualizarPaginaAccionesGenerales(periodo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(periodo_control) {
		
		this.actualizarPaginaCargaGeneral(periodo_control);
		this.actualizarPaginaOrderBy(periodo_control);
		this.actualizarPaginaTablaDatos(periodo_control);
		this.actualizarPaginaCargaGeneralControles(periodo_control);
		//this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(periodo_control);
		this.actualizarPaginaAreaBusquedas(periodo_control);
		this.actualizarPaginaCargaCombosFK(periodo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(periodo_control) {
		//this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(periodo_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(periodo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(periodo_control);		
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(periodo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(periodo_control);		
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(periodo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(periodo_control);		
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(periodo_control) {
		this.actualizarPaginaCargaGeneralControles(periodo_control);
		this.actualizarPaginaCargaCombosFK(periodo_control);
		this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(periodo_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(periodo_control) {
		this.actualizarPaginaCargaGeneralControles(periodo_control);
		this.actualizarPaginaCargaCombosFK(periodo_control);
		this.actualizarPaginaFormulario(periodo_control);
		this.onLoadCombosDefectoFK(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(periodo_control) {
		//FORMULARIO
		if(periodo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(periodo_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(periodo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		
		//COMBOS FK
		if(periodo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(periodo_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(periodo_control) {
		//FORMULARIO
		if(periodo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(periodo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);	
		//COMBOS FK
		if(periodo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(periodo_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(periodo_control) {
		
		if(periodo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(periodo_control);
		}
		
		if(periodo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(periodo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(periodo_control) {
		if(periodo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("periodoReturnGeneral",JSON.stringify(periodo_control.periodoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(periodo_control) {
		if(periodo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && periodo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(periodo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(periodo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(periodo_control, mostrar) {
		
		if(mostrar==true) {
			periodo_funcion1.resaltarRestaurarDivsPagina(false,"periodo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				periodo_funcion1.resaltarRestaurarDivMantenimiento(false,"periodo");
			}			
			
			periodo_funcion1.mostrarDivMensaje(true,periodo_control.strAuxiliarMensaje,periodo_control.strAuxiliarCssMensaje);
		
		} else {
			periodo_funcion1.mostrarDivMensaje(false,periodo_control.strAuxiliarMensaje,periodo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(periodo_control) {
		if(periodo_funcion1.esPaginaForm(periodo_constante1)==true) {
			window.opener.periodo_webcontrol1.actualizarPaginaTablaDatos(periodo_control);
		} else {
			this.actualizarPaginaTablaDatos(periodo_control);
		}
	}
	
	actualizarPaginaAbrirLink(periodo_control) {
		periodo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(periodo_control.strAuxiliarUrlPagina);
				
		periodo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(periodo_control.strAuxiliarTipo,periodo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(periodo_control) {
		periodo_funcion1.resaltarRestaurarDivMensaje(true,periodo_control.strAuxiliarMensajeAlert,periodo_control.strAuxiliarCssMensaje);
			
		if(periodo_funcion1.esPaginaForm(periodo_constante1)==true) {
			window.opener.periodo_funcion1.resaltarRestaurarDivMensaje(true,periodo_control.strAuxiliarMensajeAlert,periodo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(periodo_control) {
		this.periodo_controlInicial=periodo_control;
			
		if(periodo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(periodo_control.strStyleDivArbol,periodo_control.strStyleDivContent
																,periodo_control.strStyleDivOpcionesBanner,periodo_control.strStyleDivExpandirColapsar
																,periodo_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(periodo_control) {
		this.actualizarCssBotonesPagina(periodo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(periodo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(periodo_control.tiposReportes,periodo_control.tiposReporte
															 	,periodo_control.tiposPaginacion,periodo_control.tiposAcciones
																,periodo_control.tiposColumnasSelect,periodo_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(periodo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(periodo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(periodo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(periodo_control) {
	
		var indexPosition=periodo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=periodo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(periodo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(periodo_control.strRecargarFkTiposNinguno!=null && periodo_control.strRecargarFkTiposNinguno!='NINGUNO' && periodo_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(periodo_control) {
		jQuery("#tdperiodoNuevo").css("display",periodo_control.strPermisoNuevo);
		jQuery("#trperiodoElementos").css("display",periodo_control.strVisibleTablaElementos);
		jQuery("#trperiodoAcciones").css("display",periodo_control.strVisibleTablaAcciones);
		jQuery("#trperiodoParametrosAcciones").css("display",periodo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(periodo_control) {
	
		this.actualizarCssBotonesMantenimiento(periodo_control);
				
		if(periodo_control.periodoActual!=null) {//form
			
			this.actualizarCamposFormulario(periodo_control);			
		}
						
		this.actualizarSpanMensajesCampos(periodo_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(periodo_control) {
	
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-id").val(periodo_control.periodoActual.id);
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-created_at").val(periodo_control.periodoActual.versionRow);
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-updated_at").val(periodo_control.periodoActual.versionRow);
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-nombre").val(periodo_control.periodoActual.nombre);
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-fecha_inicio").val(periodo_control.periodoActual.fecha_inicio);
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-fecha_fin").val(periodo_control.periodoActual.fecha_fin);
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-descripcion").val(periodo_control.periodoActual.descripcion);
		jQuery("#form"+periodo_constante1.STR_SUFIJO+"-activo").prop('checked',periodo_control.periodoActual.activo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+periodo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("periodo","contabilidad","","form_periodo",formulario,"","",paraEventoTabla,idFilaTabla,periodo_funcion1,periodo_webcontrol1,periodo_constante1);
	}
	
	actualizarSpanMensajesCampos(periodo_control) {
		jQuery("#spanstrMensajeid").text(periodo_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(periodo_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(periodo_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajenombre").text(periodo_control.strMensajenombre);		
		jQuery("#spanstrMensajefecha_inicio").text(periodo_control.strMensajefecha_inicio);		
		jQuery("#spanstrMensajefecha_fin").text(periodo_control.strMensajefecha_fin);		
		jQuery("#spanstrMensajedescripcion").text(periodo_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeactivo").text(periodo_control.strMensajeactivo);		
	}
	
	actualizarCssBotonesMantenimiento(periodo_control) {
		jQuery("#tdbtnNuevoperiodo").css("visibility",periodo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoperiodo").css("display",periodo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarperiodo").css("visibility",periodo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarperiodo").css("display",periodo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarperiodo").css("visibility",periodo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarperiodo").css("display",periodo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarperiodo").css("visibility",periodo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosperiodo").css("visibility",periodo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosperiodo").css("display",periodo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarperiodo").css("visibility",periodo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarperiodo").css("visibility",periodo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarperiodo").css("visibility",periodo_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//periodo_control
		
	
	}
	
	onLoadCombosDefectoFK(periodo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(periodo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(periodo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(periodo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(periodo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(periodo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(periodo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(periodo_constante1.BIT_ES_PAGINA_FORM==true) {
				periodo_funcion1.validarFormularioJQuery(periodo_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("periodo");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("periodo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(periodo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,"periodo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(periodo_control) {
		
		
		
		if(periodo_control.strPermisoActualizar!=null) {
			jQuery("#tdperiodoActualizarToolBar").css("display",periodo_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdperiodoEliminarToolBar").css("display",periodo_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trperiodoElementos").css("display",periodo_control.strVisibleTablaElementos);
		
		jQuery("#trperiodoAcciones").css("display",periodo_control.strVisibleTablaAcciones);
		jQuery("#trperiodoParametrosAcciones").css("display",periodo_control.strVisibleTablaAcciones);
		
		jQuery("#tdperiodoCerrarPagina").css("display",periodo_control.strPermisoPopup);		
		jQuery("#tdperiodoCerrarPaginaToolBar").css("display",periodo_control.strPermisoPopup);
		//jQuery("#trperiodoAccionesRelaciones").css("display",periodo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=periodo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + periodo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + periodo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " periodos";
		sTituloBanner+=" - " + periodo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + periodo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdperiodoRelacionesToolBar").css("display",periodo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosperiodo").css("display",periodo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		periodo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		periodo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		periodo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		periodo_webcontrol1.registrarEventosControles();
		
		if(periodo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(periodo_constante1.STR_ES_RELACIONADO=="false") {
			periodo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(periodo_constante1.STR_ES_RELACIONES=="true") {
			if(periodo_constante1.BIT_ES_PAGINA_FORM==true) {
				periodo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(periodo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(periodo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(periodo_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(periodo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
						//periodo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(periodo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(periodo_constante1.BIG_ID_ACTUAL,"periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
						//periodo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			periodo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);	
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

var periodo_webcontrol1 = new periodo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {periodo_webcontrol,periodo_webcontrol1};

//Para ser llamado desde window.opener
window.periodo_webcontrol1 = periodo_webcontrol1;


if(periodo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = periodo_webcontrol1.onLoadWindow; 
}

//</script>