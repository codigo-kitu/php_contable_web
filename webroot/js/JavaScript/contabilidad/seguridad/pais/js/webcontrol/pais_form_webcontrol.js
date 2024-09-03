//<script type="text/javascript" language="javascript">



//var paisJQueryPaginaWebInteraccion= function (pais_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {pais_constante,pais_constante1} from '../util/pais_constante.js';

import {pais_funcion,pais_funcion1} from '../util/pais_form_funcion.js';


class pais_webcontrol extends GeneralEntityWebControl {
	
	pais_control=null;
	pais_controlInicial=null;
	pais_controlAuxiliar=null;
		
	//if(pais_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(pais_control) {
		super();
		
		this.pais_control=pais_control;
	}
		
	actualizarVariablesPagina(pais_control) {
		
		if(pais_control.action=="index" || pais_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(pais_control);
			
		} 
		
		
		
	
		else if(pais_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(pais_control);	
		
		} else if(pais_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(pais_control);		
		}
	
		else if(pais_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(pais_control);		
		}
	
		else if(pais_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(pais_control);
		}
		
		
		else if(pais_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(pais_control);
		
		} else if(pais_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(pais_control);
		
		} else if(pais_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(pais_control);
		
		} else if(pais_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(pais_control);
		
		} else if(pais_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(pais_control);
		
		} else if(pais_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(pais_control);		
		
		} else if(pais_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(pais_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + pais_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(pais_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(pais_control) {
		this.actualizarPaginaAccionesGenerales(pais_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(pais_control) {
		
		this.actualizarPaginaCargaGeneral(pais_control);
		this.actualizarPaginaOrderBy(pais_control);
		this.actualizarPaginaTablaDatos(pais_control);
		this.actualizarPaginaCargaGeneralControles(pais_control);
		//this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(pais_control);
		this.actualizarPaginaAreaBusquedas(pais_control);
		this.actualizarPaginaCargaCombosFK(pais_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(pais_control) {
		//this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(pais_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(pais_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(pais_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(pais_control) {
		this.actualizarPaginaTablaDatosAuxiliar(pais_control);		
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(pais_control) {
		this.actualizarPaginaTablaDatosAuxiliar(pais_control);		
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(pais_control) {
		this.actualizarPaginaTablaDatosAuxiliar(pais_control);		
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(pais_control) {
		this.actualizarPaginaCargaGeneralControles(pais_control);
		this.actualizarPaginaCargaCombosFK(pais_control);
		this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(pais_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(pais_control) {
		this.actualizarPaginaCargaGeneralControles(pais_control);
		this.actualizarPaginaCargaCombosFK(pais_control);
		this.actualizarPaginaFormulario(pais_control);
		this.onLoadCombosDefectoFK(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(pais_control) {
		//FORMULARIO
		if(pais_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(pais_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(pais_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		
		//COMBOS FK
		if(pais_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(pais_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(pais_control) {
		//FORMULARIO
		if(pais_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(pais_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);	
		//COMBOS FK
		if(pais_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(pais_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(pais_control) {
		
		if(pais_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(pais_control);
		}
		
		if(pais_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(pais_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(pais_control) {
		if(pais_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("paisReturnGeneral",JSON.stringify(pais_control.paisReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(pais_control) {
		if(pais_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && pais_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(pais_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(pais_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(pais_control, mostrar) {
		
		if(mostrar==true) {
			pais_funcion1.resaltarRestaurarDivsPagina(false,"pais");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				pais_funcion1.resaltarRestaurarDivMantenimiento(false,"pais");
			}			
			
			pais_funcion1.mostrarDivMensaje(true,pais_control.strAuxiliarMensaje,pais_control.strAuxiliarCssMensaje);
		
		} else {
			pais_funcion1.mostrarDivMensaje(false,pais_control.strAuxiliarMensaje,pais_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(pais_control) {
		if(pais_funcion1.esPaginaForm(pais_constante1)==true) {
			window.opener.pais_webcontrol1.actualizarPaginaTablaDatos(pais_control);
		} else {
			this.actualizarPaginaTablaDatos(pais_control);
		}
	}
	
	actualizarPaginaAbrirLink(pais_control) {
		pais_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(pais_control.strAuxiliarUrlPagina);
				
		pais_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(pais_control.strAuxiliarTipo,pais_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(pais_control) {
		pais_funcion1.resaltarRestaurarDivMensaje(true,pais_control.strAuxiliarMensajeAlert,pais_control.strAuxiliarCssMensaje);
			
		if(pais_funcion1.esPaginaForm(pais_constante1)==true) {
			window.opener.pais_funcion1.resaltarRestaurarDivMensaje(true,pais_control.strAuxiliarMensajeAlert,pais_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(pais_control) {
		this.pais_controlInicial=pais_control;
			
		if(pais_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(pais_control.strStyleDivArbol,pais_control.strStyleDivContent
																,pais_control.strStyleDivOpcionesBanner,pais_control.strStyleDivExpandirColapsar
																,pais_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(pais_control) {
		this.actualizarCssBotonesPagina(pais_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(pais_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(pais_control.tiposReportes,pais_control.tiposReporte
															 	,pais_control.tiposPaginacion,pais_control.tiposAcciones
																,pais_control.tiposColumnasSelect,pais_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(pais_control.tiposRelaciones,pais_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(pais_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(pais_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(pais_control);			
	}
	
	actualizarPaginaUsuarioInvitado(pais_control) {
	
		var indexPosition=pais_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=pais_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(pais_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(pais_control.strRecargarFkTiposNinguno!=null && pais_control.strRecargarFkTiposNinguno!='NINGUNO' && pais_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(pais_control) {
		jQuery("#tdpaisNuevo").css("display",pais_control.strPermisoNuevo);
		jQuery("#trpaisElementos").css("display",pais_control.strVisibleTablaElementos);
		jQuery("#trpaisAcciones").css("display",pais_control.strVisibleTablaAcciones);
		jQuery("#trpaisParametrosAcciones").css("display",pais_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(pais_control) {
	
		this.actualizarCssBotonesMantenimiento(pais_control);
				
		if(pais_control.paisActual!=null) {//form
			
			this.actualizarCamposFormulario(pais_control);			
		}
						
		this.actualizarSpanMensajesCampos(pais_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(pais_control) {
	
		jQuery("#form"+pais_constante1.STR_SUFIJO+"-id").val(pais_control.paisActual.id);
		jQuery("#form"+pais_constante1.STR_SUFIJO+"-created_at").val(pais_control.paisActual.versionRow);
		jQuery("#form"+pais_constante1.STR_SUFIJO+"-updated_at").val(pais_control.paisActual.versionRow);
		jQuery("#form"+pais_constante1.STR_SUFIJO+"-codigo").val(pais_control.paisActual.codigo);
		jQuery("#form"+pais_constante1.STR_SUFIJO+"-nombre").val(pais_control.paisActual.nombre);
		jQuery("#form"+pais_constante1.STR_SUFIJO+"-iva").val(pais_control.paisActual.iva);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+pais_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("pais","seguridad","","form_pais",formulario,"","",paraEventoTabla,idFilaTabla,pais_funcion1,pais_webcontrol1,pais_constante1);
	}
	
	actualizarSpanMensajesCampos(pais_control) {
		jQuery("#spanstrMensajeid").text(pais_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(pais_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(pais_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajecodigo").text(pais_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(pais_control.strMensajenombre);		
		jQuery("#spanstrMensajeiva").text(pais_control.strMensajeiva);		
	}
	
	actualizarCssBotonesMantenimiento(pais_control) {
		jQuery("#tdbtnNuevopais").css("visibility",pais_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevopais").css("display",pais_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarpais").css("visibility",pais_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarpais").css("display",pais_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarpais").css("visibility",pais_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarpais").css("display",pais_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarpais").css("visibility",pais_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiospais").css("visibility",pais_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiospais").css("display",pais_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarpais").css("visibility",pais_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarpais").css("visibility",pais_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarpais").css("visibility",pais_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//pais_control
		
	
	}
	
	onLoadCombosDefectoFK(pais_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pais_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(pais_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pais_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(pais_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pais_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(pais_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("pais","seguridad","",pais_funcion1,pais_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(pais_constante1.BIT_ES_PAGINA_FORM==true) {
				pais_funcion1.validarFormularioJQuery(pais_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("pais");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("pais");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(pais_funcion1,pais_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(pais_funcion1,pais_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(pais_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("pais","seguridad","",pais_funcion1,pais_webcontrol1,"pais");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("pais");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(pais_control) {
		
		
		
		if(pais_control.strPermisoActualizar!=null) {
			jQuery("#tdpaisActualizarToolBar").css("display",pais_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdpaisEliminarToolBar").css("display",pais_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trpaisElementos").css("display",pais_control.strVisibleTablaElementos);
		
		jQuery("#trpaisAcciones").css("display",pais_control.strVisibleTablaAcciones);
		jQuery("#trpaisParametrosAcciones").css("display",pais_control.strVisibleTablaAcciones);
		
		jQuery("#tdpaisCerrarPagina").css("display",pais_control.strPermisoPopup);		
		jQuery("#tdpaisCerrarPaginaToolBar").css("display",pais_control.strPermisoPopup);
		//jQuery("#trpaisAccionesRelaciones").css("display",pais_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=pais_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + pais_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + pais_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Paises";
		sTituloBanner+=" - " + pais_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + pais_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdpaisRelacionesToolBar").css("display",pais_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultospais").css("display",pais_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("pais","seguridad","",pais_funcion1,pais_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		pais_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		pais_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		pais_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		pais_webcontrol1.registrarEventosControles();
		
		if(pais_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(pais_constante1.STR_ES_RELACIONADO=="false") {
			pais_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(pais_constante1.STR_ES_RELACIONES=="true") {
			if(pais_constante1.BIT_ES_PAGINA_FORM==true) {
				pais_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(pais_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(pais_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(pais_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(pais_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
						//pais_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(pais_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(pais_constante1.BIG_ID_ACTUAL,"pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
						//pais_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			pais_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);	
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

var pais_webcontrol1 = new pais_webcontrol();

//Para ser llamado desde otro archivo (import)
export {pais_webcontrol,pais_webcontrol1};

//Para ser llamado desde window.opener
window.pais_webcontrol1 = pais_webcontrol1;


if(pais_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = pais_webcontrol1.onLoadWindow; 
}

//</script>