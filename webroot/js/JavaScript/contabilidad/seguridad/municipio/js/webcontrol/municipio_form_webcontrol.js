//<script type="text/javascript" language="javascript">



//var municipioJQueryPaginaWebInteraccion= function (municipio_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {municipio_constante,municipio_constante1} from '../util/municipio_constante.js';

import {municipio_funcion,municipio_funcion1} from '../util/municipio_form_funcion.js';


class municipio_webcontrol extends GeneralEntityWebControl {
	
	municipio_control=null;
	municipio_controlInicial=null;
	municipio_controlAuxiliar=null;
		
	//if(municipio_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(municipio_control) {
		super();
		
		this.municipio_control=municipio_control;
	}
		
	actualizarVariablesPagina(municipio_control) {
		
		if(municipio_control.action=="index" || municipio_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(municipio_control);
			
		} 
		
		
		
	
		else if(municipio_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(municipio_control);	
		
		} else if(municipio_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(municipio_control);		
		}
	
	
		
		
		else if(municipio_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(municipio_control);
		
		} else if(municipio_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(municipio_control);
		
		} else if(municipio_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(municipio_control);
		
		} else if(municipio_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(municipio_control);
		
		} else if(municipio_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(municipio_control);
		
		} else if(municipio_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(municipio_control);		
		
		} else if(municipio_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(municipio_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + municipio_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(municipio_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(municipio_control) {
		this.actualizarPaginaAccionesGenerales(municipio_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(municipio_control) {
		
		this.actualizarPaginaCargaGeneral(municipio_control);
		this.actualizarPaginaOrderBy(municipio_control);
		this.actualizarPaginaTablaDatos(municipio_control);
		this.actualizarPaginaCargaGeneralControles(municipio_control);
		//this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(municipio_control);
		this.actualizarPaginaAreaBusquedas(municipio_control);
		this.actualizarPaginaCargaCombosFK(municipio_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(municipio_control) {
		//this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(municipio_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(municipio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(municipio_control);		
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(municipio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(municipio_control);		
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(municipio_control) {
		this.actualizarPaginaTablaDatosAuxiliar(municipio_control);		
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(municipio_control) {
		this.actualizarPaginaCargaGeneralControles(municipio_control);
		this.actualizarPaginaCargaCombosFK(municipio_control);
		this.actualizarPaginaFormulario(municipio_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(municipio_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(municipio_control) {
		this.actualizarPaginaCargaGeneralControles(municipio_control);
		this.actualizarPaginaCargaCombosFK(municipio_control);
		this.actualizarPaginaFormulario(municipio_control);
		this.onLoadCombosDefectoFK(municipio_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		this.actualizarPaginaAreaMantenimiento(municipio_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(municipio_control) {
		//FORMULARIO
		if(municipio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(municipio_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(municipio_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);		
		
		//COMBOS FK
		if(municipio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(municipio_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(municipio_control) {
		//FORMULARIO
		if(municipio_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(municipio_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(municipio_control);	
		//COMBOS FK
		if(municipio_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(municipio_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(municipio_control) {
		
		if(municipio_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(municipio_control);
		}
		
		if(municipio_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(municipio_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(municipio_control) {
		if(municipio_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("municipioReturnGeneral",JSON.stringify(municipio_control.municipioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(municipio_control) {
		if(municipio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && municipio_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(municipio_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(municipio_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(municipio_control, mostrar) {
		
		if(mostrar==true) {
			municipio_funcion1.resaltarRestaurarDivsPagina(false,"municipio");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				municipio_funcion1.resaltarRestaurarDivMantenimiento(false,"municipio");
			}			
			
			municipio_funcion1.mostrarDivMensaje(true,municipio_control.strAuxiliarMensaje,municipio_control.strAuxiliarCssMensaje);
		
		} else {
			municipio_funcion1.mostrarDivMensaje(false,municipio_control.strAuxiliarMensaje,municipio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(municipio_control) {
		if(municipio_funcion1.esPaginaForm(municipio_constante1)==true) {
			window.opener.municipio_webcontrol1.actualizarPaginaTablaDatos(municipio_control);
		} else {
			this.actualizarPaginaTablaDatos(municipio_control);
		}
	}
	
	actualizarPaginaAbrirLink(municipio_control) {
		municipio_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(municipio_control.strAuxiliarUrlPagina);
				
		municipio_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(municipio_control.strAuxiliarTipo,municipio_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(municipio_control) {
		municipio_funcion1.resaltarRestaurarDivMensaje(true,municipio_control.strAuxiliarMensajeAlert,municipio_control.strAuxiliarCssMensaje);
			
		if(municipio_funcion1.esPaginaForm(municipio_constante1)==true) {
			window.opener.municipio_funcion1.resaltarRestaurarDivMensaje(true,municipio_control.strAuxiliarMensajeAlert,municipio_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(municipio_control) {
		this.municipio_controlInicial=municipio_control;
			
		if(municipio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(municipio_control.strStyleDivArbol,municipio_control.strStyleDivContent
																,municipio_control.strStyleDivOpcionesBanner,municipio_control.strStyleDivExpandirColapsar
																,municipio_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(municipio_control) {
		this.actualizarCssBotonesPagina(municipio_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(municipio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(municipio_control.tiposReportes,municipio_control.tiposReporte
															 	,municipio_control.tiposPaginacion,municipio_control.tiposAcciones
																,municipio_control.tiposColumnasSelect,municipio_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(municipio_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(municipio_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(municipio_control);			
	}
	
	actualizarPaginaUsuarioInvitado(municipio_control) {
	
		var indexPosition=municipio_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=municipio_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(municipio_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(municipio_control.strRecargarFkTiposNinguno!=null && municipio_control.strRecargarFkTiposNinguno!='NINGUNO' && municipio_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(municipio_control) {
		jQuery("#tdmunicipioNuevo").css("display",municipio_control.strPermisoNuevo);
		jQuery("#trmunicipioElementos").css("display",municipio_control.strVisibleTablaElementos);
		jQuery("#trmunicipioAcciones").css("display",municipio_control.strVisibleTablaAcciones);
		jQuery("#trmunicipioParametrosAcciones").css("display",municipio_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(municipio_control) {
	
		this.actualizarCssBotonesMantenimiento(municipio_control);
				
		if(municipio_control.municipioActual!=null) {//form
			
			this.actualizarCamposFormulario(municipio_control);			
		}
						
		this.actualizarSpanMensajesCampos(municipio_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(municipio_control) {
	
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-id").val(municipio_control.municipioActual.id);
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-created_at").val(municipio_control.municipioActual.versionRow);
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-updated_at").val(municipio_control.municipioActual.versionRow);
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-codigo").val(municipio_control.municipioActual.codigo);
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-municipio").val(municipio_control.municipioActual.municipio);
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-departamento").val(municipio_control.municipioActual.departamento);
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-codigo_departamento").val(municipio_control.municipioActual.codigo_departamento);
		jQuery("#form"+municipio_constante1.STR_SUFIJO+"-codigo_municipio").val(municipio_control.municipioActual.codigo_municipio);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+municipio_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("municipio","seguridad","","form_municipio",formulario,"","",paraEventoTabla,idFilaTabla,municipio_funcion1,municipio_webcontrol1,municipio_constante1);
	}
	
	actualizarSpanMensajesCampos(municipio_control) {
		jQuery("#spanstrMensajeid").text(municipio_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(municipio_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(municipio_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajecodigo").text(municipio_control.strMensajecodigo);		
		jQuery("#spanstrMensajemunicipio").text(municipio_control.strMensajemunicipio);		
		jQuery("#spanstrMensajedepartamento").text(municipio_control.strMensajedepartamento);		
		jQuery("#spanstrMensajecodigo_departamento").text(municipio_control.strMensajecodigo_departamento);		
		jQuery("#spanstrMensajecodigo_municipio").text(municipio_control.strMensajecodigo_municipio);		
	}
	
	actualizarCssBotonesMantenimiento(municipio_control) {
		jQuery("#tdbtnNuevomunicipio").css("visibility",municipio_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevomunicipio").css("display",municipio_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarmunicipio").css("visibility",municipio_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarmunicipio").css("display",municipio_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarmunicipio").css("visibility",municipio_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarmunicipio").css("display",municipio_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarmunicipio").css("visibility",municipio_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosmunicipio").css("visibility",municipio_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosmunicipio").css("display",municipio_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarmunicipio").css("visibility",municipio_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarmunicipio").css("visibility",municipio_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarmunicipio").css("visibility",municipio_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//municipio_control
		
	
	}
	
	onLoadCombosDefectoFK(municipio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(municipio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(municipio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(municipio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(municipio_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(municipio_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(municipio_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(municipio_constante1.BIT_ES_PAGINA_FORM==true) {
				municipio_funcion1.validarFormularioJQuery(municipio_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("municipio");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("municipio");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(municipio_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,"municipio");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(municipio_control) {
		
		
		
		if(municipio_control.strPermisoActualizar!=null) {
			jQuery("#tdmunicipioActualizarToolBar").css("display",municipio_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdmunicipioEliminarToolBar").css("display",municipio_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trmunicipioElementos").css("display",municipio_control.strVisibleTablaElementos);
		
		jQuery("#trmunicipioAcciones").css("display",municipio_control.strVisibleTablaAcciones);
		jQuery("#trmunicipioParametrosAcciones").css("display",municipio_control.strVisibleTablaAcciones);
		
		jQuery("#tdmunicipioCerrarPagina").css("display",municipio_control.strPermisoPopup);		
		jQuery("#tdmunicipioCerrarPaginaToolBar").css("display",municipio_control.strPermisoPopup);
		//jQuery("#trmunicipioAccionesRelaciones").css("display",municipio_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=municipio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + municipio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + municipio_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Municipios";
		sTituloBanner+=" - " + municipio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + municipio_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdmunicipioRelacionesToolBar").css("display",municipio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosmunicipio").css("display",municipio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		municipio_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		municipio_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		municipio_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		municipio_webcontrol1.registrarEventosControles();
		
		if(municipio_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(municipio_constante1.STR_ES_RELACIONADO=="false") {
			municipio_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(municipio_constante1.STR_ES_RELACIONES=="true") {
			if(municipio_constante1.BIT_ES_PAGINA_FORM==true) {
				municipio_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(municipio_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(municipio_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(municipio_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(municipio_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
						//municipio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(municipio_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(municipio_constante1.BIG_ID_ACTUAL,"municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);
						//municipio_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			municipio_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("municipio","seguridad","",municipio_funcion1,municipio_webcontrol1,municipio_constante1);	
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

var municipio_webcontrol1 = new municipio_webcontrol();

//Para ser llamado desde otro archivo (import)
export {municipio_webcontrol,municipio_webcontrol1};

//Para ser llamado desde window.opener
window.municipio_webcontrol1 = municipio_webcontrol1;


if(municipio_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = municipio_webcontrol1.onLoadWindow; 
}

//</script>