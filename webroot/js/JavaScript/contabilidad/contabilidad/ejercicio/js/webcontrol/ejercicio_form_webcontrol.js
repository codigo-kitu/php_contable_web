//<script type="text/javascript" language="javascript">



//var ejercicioJQueryPaginaWebInteraccion= function (ejercicio_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {ejercicio_constante,ejercicio_constante1} from '../util/ejercicio_constante.js';

import {ejercicio_funcion,ejercicio_funcion1} from '../util/ejercicio_form_funcion.js';


class ejercicio_webcontrol extends GeneralEntityWebControl {
	
	ejercicio_control=null;
	ejercicio_controlInicial=null;
	ejercicio_controlAuxiliar=null;
		
	//if(ejercicio_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(ejercicio_control) {
		super();
		
		this.ejercicio_control=ejercicio_control;
	}
		
	actualizarVariablesPagina(ejercicio_control) {
		
		if(ejercicio_control.action=="index" || ejercicio_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(ejercicio_control);
			
		} 
		
		
		
	
		else if(ejercicio_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(ejercicio_control);	
		
		} else if(ejercicio_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(ejercicio_control);		
		}
	
	
		
		
		else if(ejercicio_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(ejercicio_control);
		
		} else if(ejercicio_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(ejercicio_control);
		
		} else if(ejercicio_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(ejercicio_control);
		
		} else if(ejercicio_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(ejercicio_control);
		
		} else if(ejercicio_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(ejercicio_control);
		
		} else if(ejercicio_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(ejercicio_control);		
		
		} else if(ejercicio_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(ejercicio_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + ejercicio_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(ejercicio_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(ejercicio_control) {
		this.actualizarPaginaAccionesGenerales(ejercicio_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(ejercicio_control) {
		
		this.actualizarPaginaCargaGeneral(ejercicio_control);
		this.actualizarPaginaOrderBy(ejercicio_control);
		this.actualizarPaginaTablaDatos(ejercicio_control);
		this.actualizarPaginaCargaGeneralControles(ejercicio_control);
		//this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(ejercicio_control);
		this.actualizarPaginaAreaBusquedas(ejercicio_control);
		this.actualizarPaginaCargaCombosFK(ejercicio_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(ejercicio_control) {
		//this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(ejercicio_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(ejercicio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(ejercicio_control);		
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(ejercicio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(ejercicio_control);		
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(ejercicio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(ejercicio_control);		
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(ejercicio_control) {
		this.actualizarPaginaCargaGeneralControles(ejercicio_control);
		this.actualizarPaginaCargaCombosFK(ejercicio_control);
		this.actualizarPaginaFormulario(ejercicio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(ejercicio_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(ejercicio_control) {
		this.actualizarPaginaCargaGeneralControles(ejercicio_control);
		this.actualizarPaginaCargaCombosFK(ejercicio_control);
		this.actualizarPaginaFormulario(ejercicio_control);
		this.onLoadCombosDefectoFK(ejercicio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		this.actualizarPaginaAreaMantenimiento(ejercicio_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(ejercicio_control) {
		//FORMULARIO
		if(ejercicio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(ejercicio_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(ejercicio_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);		
		
		//COMBOS FK
		if(ejercicio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(ejercicio_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(ejercicio_control) {
		//FORMULARIO
		if(ejercicio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(ejercicio_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(ejercicio_control);	
		//COMBOS FK
		if(ejercicio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(ejercicio_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(ejercicio_control) {
		
		if(ejercicio_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(ejercicio_control);
		}
		
		if(ejercicio_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(ejercicio_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(ejercicio_control) {
		if(ejercicio_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("ejercicioReturnGeneral",JSON.stringify(ejercicio_control.ejercicioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(ejercicio_control) {
		if(ejercicio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && ejercicio_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(ejercicio_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(ejercicio_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(ejercicio_control, mostrar) {
		
		if(mostrar==true) {
			ejercicio_funcion1.resaltarRestaurarDivsPagina(false,"ejercicio");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				ejercicio_funcion1.resaltarRestaurarDivMantenimiento(false,"ejercicio");
			}			
			
			ejercicio_funcion1.mostrarDivMensaje(true,ejercicio_control.strAuxiliarMensaje,ejercicio_control.strAuxiliarCssMensaje);
		
		} else {
			ejercicio_funcion1.mostrarDivMensaje(false,ejercicio_control.strAuxiliarMensaje,ejercicio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(ejercicio_control) {
		if(ejercicio_funcion1.esPaginaForm(ejercicio_constante1)==true) {
			window.opener.ejercicio_webcontrol1.actualizarPaginaTablaDatos(ejercicio_control);
		} else {
			this.actualizarPaginaTablaDatos(ejercicio_control);
		}
	}
	
	actualizarPaginaAbrirLink(ejercicio_control) {
		ejercicio_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(ejercicio_control.strAuxiliarUrlPagina);
				
		ejercicio_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(ejercicio_control.strAuxiliarTipo,ejercicio_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(ejercicio_control) {
		ejercicio_funcion1.resaltarRestaurarDivMensaje(true,ejercicio_control.strAuxiliarMensajeAlert,ejercicio_control.strAuxiliarCssMensaje);
			
		if(ejercicio_funcion1.esPaginaForm(ejercicio_constante1)==true) {
			window.opener.ejercicio_funcion1.resaltarRestaurarDivMensaje(true,ejercicio_control.strAuxiliarMensajeAlert,ejercicio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(ejercicio_control) {
		this.ejercicio_controlInicial=ejercicio_control;
			
		if(ejercicio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(ejercicio_control.strStyleDivArbol,ejercicio_control.strStyleDivContent
																,ejercicio_control.strStyleDivOpcionesBanner,ejercicio_control.strStyleDivExpandirColapsar
																,ejercicio_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(ejercicio_control) {
		this.actualizarCssBotonesPagina(ejercicio_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(ejercicio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(ejercicio_control.tiposReportes,ejercicio_control.tiposReporte
															 	,ejercicio_control.tiposPaginacion,ejercicio_control.tiposAcciones
																,ejercicio_control.tiposColumnasSelect,ejercicio_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(ejercicio_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(ejercicio_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(ejercicio_control);			
	}
	
	actualizarPaginaUsuarioInvitado(ejercicio_control) {
	
		var indexPosition=ejercicio_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=ejercicio_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(ejercicio_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(ejercicio_control.strRecargarFkTiposNinguno!=null && ejercicio_control.strRecargarFkTiposNinguno!='NINGUNO' && ejercicio_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(ejercicio_control) {
		jQuery("#tdejercicioNuevo").css("display",ejercicio_control.strPermisoNuevo);
		jQuery("#trejercicioElementos").css("display",ejercicio_control.strVisibleTablaElementos);
		jQuery("#trejercicioAcciones").css("display",ejercicio_control.strVisibleTablaAcciones);
		jQuery("#trejercicioParametrosAcciones").css("display",ejercicio_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(ejercicio_control) {
	
		this.actualizarCssBotonesMantenimiento(ejercicio_control);
				
		if(ejercicio_control.ejercicioActual!=null) {//form
			
			this.actualizarCamposFormulario(ejercicio_control);			
		}
						
		this.actualizarSpanMensajesCampos(ejercicio_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(ejercicio_control) {
	
		jQuery("#form"+ejercicio_constante1.STR_SUFIJO+"-id").val(ejercicio_control.ejercicioActual.id);
		jQuery("#form"+ejercicio_constante1.STR_SUFIJO+"-created_at").val(ejercicio_control.ejercicioActual.versionRow);
		jQuery("#form"+ejercicio_constante1.STR_SUFIJO+"-updated_at").val(ejercicio_control.ejercicioActual.versionRow);
		jQuery("#form"+ejercicio_constante1.STR_SUFIJO+"-fecha_inicio").val(ejercicio_control.ejercicioActual.fecha_inicio);
		jQuery("#form"+ejercicio_constante1.STR_SUFIJO+"-fecha_fin").val(ejercicio_control.ejercicioActual.fecha_fin);
		jQuery("#form"+ejercicio_constante1.STR_SUFIJO+"-descripcion").val(ejercicio_control.ejercicioActual.descripcion);
		jQuery("#form"+ejercicio_constante1.STR_SUFIJO+"-activo").prop('checked',ejercicio_control.ejercicioActual.activo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+ejercicio_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("ejercicio","contabilidad","","form_ejercicio",formulario,"","",paraEventoTabla,idFilaTabla,ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
	}
	
	actualizarSpanMensajesCampos(ejercicio_control) {
		jQuery("#spanstrMensajeid").text(ejercicio_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(ejercicio_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(ejercicio_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajefecha_inicio").text(ejercicio_control.strMensajefecha_inicio);		
		jQuery("#spanstrMensajefecha_fin").text(ejercicio_control.strMensajefecha_fin);		
		jQuery("#spanstrMensajedescripcion").text(ejercicio_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeactivo").text(ejercicio_control.strMensajeactivo);		
	}
	
	actualizarCssBotonesMantenimiento(ejercicio_control) {
		jQuery("#tdbtnNuevoejercicio").css("visibility",ejercicio_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoejercicio").css("display",ejercicio_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarejercicio").css("visibility",ejercicio_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarejercicio").css("display",ejercicio_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarejercicio").css("visibility",ejercicio_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarejercicio").css("display",ejercicio_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarejercicio").css("visibility",ejercicio_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosejercicio").css("visibility",ejercicio_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosejercicio").css("display",ejercicio_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarejercicio").css("visibility",ejercicio_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarejercicio").css("visibility",ejercicio_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarejercicio").css("visibility",ejercicio_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//ejercicio_control
		
	
	}
	
	onLoadCombosDefectoFK(ejercicio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ejercicio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(ejercicio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ejercicio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(ejercicio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ejercicio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(ejercicio_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(ejercicio_constante1.BIT_ES_PAGINA_FORM==true) {
				ejercicio_funcion1.validarFormularioJQuery(ejercicio_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("ejercicio");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("ejercicio");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(ejercicio_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,"ejercicio");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(ejercicio_control) {
		
		
		
		if(ejercicio_control.strPermisoActualizar!=null) {
			jQuery("#tdejercicioActualizarToolBar").css("display",ejercicio_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdejercicioEliminarToolBar").css("display",ejercicio_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trejercicioElementos").css("display",ejercicio_control.strVisibleTablaElementos);
		
		jQuery("#trejercicioAcciones").css("display",ejercicio_control.strVisibleTablaAcciones);
		jQuery("#trejercicioParametrosAcciones").css("display",ejercicio_control.strVisibleTablaAcciones);
		
		jQuery("#tdejercicioCerrarPagina").css("display",ejercicio_control.strPermisoPopup);		
		jQuery("#tdejercicioCerrarPaginaToolBar").css("display",ejercicio_control.strPermisoPopup);
		//jQuery("#trejercicioAccionesRelaciones").css("display",ejercicio_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=ejercicio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + ejercicio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + ejercicio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " ejercicios";
		sTituloBanner+=" - " + ejercicio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + ejercicio_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdejercicioRelacionesToolBar").css("display",ejercicio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosejercicio").css("display",ejercicio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		ejercicio_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		ejercicio_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		ejercicio_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		ejercicio_webcontrol1.registrarEventosControles();
		
		if(ejercicio_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(ejercicio_constante1.STR_ES_RELACIONADO=="false") {
			ejercicio_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(ejercicio_constante1.STR_ES_RELACIONES=="true") {
			if(ejercicio_constante1.BIT_ES_PAGINA_FORM==true) {
				ejercicio_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(ejercicio_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(ejercicio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(ejercicio_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(ejercicio_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
						//ejercicio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(ejercicio_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(ejercicio_constante1.BIG_ID_ACTUAL,"ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);
						//ejercicio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			ejercicio_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("ejercicio","contabilidad","",ejercicio_funcion1,ejercicio_webcontrol1,ejercicio_constante1);	
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

var ejercicio_webcontrol1 = new ejercicio_webcontrol();

//Para ser llamado desde otro archivo (import)
export {ejercicio_webcontrol,ejercicio_webcontrol1};

//Para ser llamado desde window.opener
window.ejercicio_webcontrol1 = ejercicio_webcontrol1;


if(ejercicio_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = ejercicio_webcontrol1.onLoadWindow; 
}

//</script>