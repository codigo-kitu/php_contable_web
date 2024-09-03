//<script type="text/javascript" language="javascript">



//var kit_productoJQueryPaginaWebInteraccion= function (kit_producto_control) {
//this.,this.,this.

import {kit_producto_constante,kit_producto_constante1} from '../util/kit_producto_constante.js';

import {kit_producto_funcion,kit_producto_funcion1} from '../util/kit_producto_form_funcion.js';


class kit_producto_webcontrol extends GeneralEntityWebControl {
	
	kit_producto_control=null;
	kit_producto_controlInicial=null;
	kit_producto_controlAuxiliar=null;
		
	//if(kit_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(kit_producto_control) {
		super();
		
		this.kit_producto_control=kit_producto_control;
	}
		
	actualizarVariablesPagina(kit_producto_control) {
		
		if(kit_producto_control.action=="index" || kit_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(kit_producto_control);
			
		} 
		
		
		
	
		else if(kit_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(kit_producto_control);	
		
		} else if(kit_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(kit_producto_control);		
		}
	
	
		
		
		else if(kit_producto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(kit_producto_control);
		
		} else if(kit_producto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(kit_producto_control);
		
		} else if(kit_producto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(kit_producto_control);
		
		} else if(kit_producto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(kit_producto_control);
		
		} else if(kit_producto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(kit_producto_control);
		
		} else if(kit_producto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(kit_producto_control);		
		
		} else if(kit_producto_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(kit_producto_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + kit_producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(kit_producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(kit_producto_control) {
		this.actualizarPaginaAccionesGenerales(kit_producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(kit_producto_control) {
		
		this.actualizarPaginaCargaGeneral(kit_producto_control);
		this.actualizarPaginaOrderBy(kit_producto_control);
		this.actualizarPaginaTablaDatos(kit_producto_control);
		this.actualizarPaginaCargaGeneralControles(kit_producto_control);
		//this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(kit_producto_control);
		this.actualizarPaginaAreaBusquedas(kit_producto_control);
		this.actualizarPaginaCargaCombosFK(kit_producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(kit_producto_control) {
		//this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(kit_producto_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(kit_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kit_producto_control);		
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(kit_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kit_producto_control);		
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(kit_producto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kit_producto_control);		
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(kit_producto_control) {
		this.actualizarPaginaCargaGeneralControles(kit_producto_control);
		this.actualizarPaginaCargaCombosFK(kit_producto_control);
		this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(kit_producto_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(kit_producto_control) {
		this.actualizarPaginaCargaGeneralControles(kit_producto_control);
		this.actualizarPaginaCargaCombosFK(kit_producto_control);
		this.actualizarPaginaFormulario(kit_producto_control);
		this.onLoadCombosDefectoFK(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(kit_producto_control) {
		//FORMULARIO
		if(kit_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(kit_producto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(kit_producto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		
		//COMBOS FK
		if(kit_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(kit_producto_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(kit_producto_control) {
		//FORMULARIO
		if(kit_producto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(kit_producto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);	
		//COMBOS FK
		if(kit_producto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(kit_producto_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(kit_producto_control) {
		
		if(kit_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(kit_producto_control);
		}
		
		if(kit_producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(kit_producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(kit_producto_control) {
		if(kit_producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("kit_productoReturnGeneral",JSON.stringify(kit_producto_control.kit_productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(kit_producto_control) {
		if(kit_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && kit_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(kit_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(kit_producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(kit_producto_control, mostrar) {
		
		if(mostrar==true) {
			kit_producto_funcion1.resaltarRestaurarDivsPagina(false,"kit_producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				kit_producto_funcion1.resaltarRestaurarDivMantenimiento(false,"kit_producto");
			}			
			
			kit_producto_funcion1.mostrarDivMensaje(true,kit_producto_control.strAuxiliarMensaje,kit_producto_control.strAuxiliarCssMensaje);
		
		} else {
			kit_producto_funcion1.mostrarDivMensaje(false,kit_producto_control.strAuxiliarMensaje,kit_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(kit_producto_control) {
		if(kit_producto_funcion1.esPaginaForm(kit_producto_constante1)==true) {
			window.opener.kit_producto_webcontrol1.actualizarPaginaTablaDatos(kit_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(kit_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(kit_producto_control) {
		kit_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(kit_producto_control.strAuxiliarUrlPagina);
				
		kit_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(kit_producto_control.strAuxiliarTipo,kit_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(kit_producto_control) {
		kit_producto_funcion1.resaltarRestaurarDivMensaje(true,kit_producto_control.strAuxiliarMensajeAlert,kit_producto_control.strAuxiliarCssMensaje);
			
		if(kit_producto_funcion1.esPaginaForm(kit_producto_constante1)==true) {
			window.opener.kit_producto_funcion1.resaltarRestaurarDivMensaje(true,kit_producto_control.strAuxiliarMensajeAlert,kit_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(kit_producto_control) {
		this.kit_producto_controlInicial=kit_producto_control;
			
		if(kit_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(kit_producto_control.strStyleDivArbol,kit_producto_control.strStyleDivContent
																,kit_producto_control.strStyleDivOpcionesBanner,kit_producto_control.strStyleDivExpandirColapsar
																,kit_producto_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(kit_producto_control) {
		this.actualizarCssBotonesPagina(kit_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(kit_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(kit_producto_control.tiposReportes,kit_producto_control.tiposReporte
															 	,kit_producto_control.tiposPaginacion,kit_producto_control.tiposAcciones
																,kit_producto_control.tiposColumnasSelect,kit_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(kit_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(kit_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(kit_producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(kit_producto_control) {
	
		var indexPosition=kit_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=kit_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(kit_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(kit_producto_control.strRecargarFkTiposNinguno!=null && kit_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && kit_producto_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(kit_producto_control) {
		jQuery("#tdkit_productoNuevo").css("display",kit_producto_control.strPermisoNuevo);
		jQuery("#trkit_productoElementos").css("display",kit_producto_control.strVisibleTablaElementos);
		jQuery("#trkit_productoAcciones").css("display",kit_producto_control.strVisibleTablaAcciones);
		jQuery("#trkit_productoParametrosAcciones").css("display",kit_producto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(kit_producto_control) {
	
		this.actualizarCssBotonesMantenimiento(kit_producto_control);
				
		if(kit_producto_control.kit_productoActual!=null) {//form
			
			this.actualizarCamposFormulario(kit_producto_control);			
		}
						
		this.actualizarSpanMensajesCampos(kit_producto_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(kit_producto_control) {
	
		jQuery("#form"+kit_producto_constante1.STR_SUFIJO+"-id").val(kit_producto_control.kit_productoActual.id);
		jQuery("#form"+kit_producto_constante1.STR_SUFIJO+"-version_row").val(kit_producto_control.kit_productoActual.versionRow);
		jQuery("#form"+kit_producto_constante1.STR_SUFIJO+"-id_padre").val(kit_producto_control.kit_productoActual.id_padre);
		jQuery("#form"+kit_producto_constante1.STR_SUFIJO+"-id_hijo").val(kit_producto_control.kit_productoActual.id_hijo);
		jQuery("#form"+kit_producto_constante1.STR_SUFIJO+"-cantidad").val(kit_producto_control.kit_productoActual.cantidad);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+kit_producto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("kit_producto","inventario","","form_kit_producto",formulario,"","",paraEventoTabla,idFilaTabla,kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
	}
	
	actualizarSpanMensajesCampos(kit_producto_control) {
		jQuery("#spanstrMensajeid").text(kit_producto_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(kit_producto_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_padre").text(kit_producto_control.strMensajeid_padre);		
		jQuery("#spanstrMensajeid_hijo").text(kit_producto_control.strMensajeid_hijo);		
		jQuery("#spanstrMensajecantidad").text(kit_producto_control.strMensajecantidad);		
	}
	
	actualizarCssBotonesMantenimiento(kit_producto_control) {
		jQuery("#tdbtnNuevokit_producto").css("visibility",kit_producto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevokit_producto").css("display",kit_producto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarkit_producto").css("visibility",kit_producto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarkit_producto").css("display",kit_producto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarkit_producto").css("visibility",kit_producto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarkit_producto").css("display",kit_producto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarkit_producto").css("visibility",kit_producto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioskit_producto").css("visibility",kit_producto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioskit_producto").css("display",kit_producto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarkit_producto").css("visibility",kit_producto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarkit_producto").css("visibility",kit_producto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarkit_producto").css("visibility",kit_producto_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//kit_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(kit_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kit_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(kit_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kit_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(kit_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kit_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(kit_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(kit_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				kit_producto_funcion1.validarFormularioJQuery(kit_producto_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("kit_producto");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("kit_producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(kit_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,"kit_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(kit_producto_control) {
		
		
		
		if(kit_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdkit_productoActualizarToolBar").css("display",kit_producto_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdkit_productoEliminarToolBar").css("display",kit_producto_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trkit_productoElementos").css("display",kit_producto_control.strVisibleTablaElementos);
		
		jQuery("#trkit_productoAcciones").css("display",kit_producto_control.strVisibleTablaAcciones);
		jQuery("#trkit_productoParametrosAcciones").css("display",kit_producto_control.strVisibleTablaAcciones);
		
		jQuery("#tdkit_productoCerrarPagina").css("display",kit_producto_control.strPermisoPopup);		
		jQuery("#tdkit_productoCerrarPaginaToolBar").css("display",kit_producto_control.strPermisoPopup);
		//jQuery("#trkit_productoAccionesRelaciones").css("display",kit_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=kit_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + kit_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + kit_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Kits Productoes";
		sTituloBanner+=" - " + kit_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + kit_producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdkit_productoRelacionesToolBar").css("display",kit_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoskit_producto").css("display",kit_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		kit_producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		kit_producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		kit_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		kit_producto_webcontrol1.registrarEventosControles();
		
		if(kit_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(kit_producto_constante1.STR_ES_RELACIONADO=="false") {
			kit_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(kit_producto_constante1.STR_ES_RELACIONES=="true") {
			if(kit_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				kit_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(kit_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(kit_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(kit_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(kit_producto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
						//kit_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(kit_producto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(kit_producto_constante1.BIG_ID_ACTUAL,"kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
						//kit_producto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			kit_producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);	
	}
}

var kit_producto_webcontrol1 = new kit_producto_webcontrol();

export {kit_producto_webcontrol,kit_producto_webcontrol1};

//Para ser llamado desde window.opener
window.kit_producto_webcontrol1 = kit_producto_webcontrol1;


if(kit_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = kit_producto_webcontrol1.onLoadWindow; 
}

//</script>