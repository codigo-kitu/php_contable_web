//<script type="text/javascript" language="javascript">



//var fuenteJQueryPaginaWebInteraccion= function (fuente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {fuente_constante,fuente_constante1} from '../util/fuente_constante.js';

import {fuente_funcion,fuente_funcion1} from '../util/fuente_form_funcion.js';


class fuente_webcontrol extends GeneralEntityWebControl {
	
	fuente_control=null;
	fuente_controlInicial=null;
	fuente_controlAuxiliar=null;
		
	//if(fuente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(fuente_control) {
		super();
		
		this.fuente_control=fuente_control;
	}
		
	actualizarVariablesPagina(fuente_control) {
		
		if(fuente_control.action=="index" || fuente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(fuente_control);
			
		} 
		
		
		
	
		else if(fuente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(fuente_control);	
		
		} else if(fuente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(fuente_control);		
		}
	
		else if(fuente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(fuente_control);		
		}
	
		else if(fuente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(fuente_control);
		}
		
		
		else if(fuente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(fuente_control);
		
		} else if(fuente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(fuente_control);
		
		} else if(fuente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(fuente_control);
		
		} else if(fuente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(fuente_control);
		
		} else if(fuente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(fuente_control);
		
		} else if(fuente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(fuente_control);		
		
		} else if(fuente_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(fuente_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + fuente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(fuente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(fuente_control) {
		this.actualizarPaginaAccionesGenerales(fuente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(fuente_control) {
		
		this.actualizarPaginaCargaGeneral(fuente_control);
		this.actualizarPaginaOrderBy(fuente_control);
		this.actualizarPaginaTablaDatos(fuente_control);
		this.actualizarPaginaCargaGeneralControles(fuente_control);
		//this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(fuente_control);
		this.actualizarPaginaAreaBusquedas(fuente_control);
		this.actualizarPaginaCargaCombosFK(fuente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(fuente_control) {
		//this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(fuente_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(fuente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(fuente_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(fuente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(fuente_control);		
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(fuente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(fuente_control);		
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(fuente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(fuente_control);		
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(fuente_control) {
		this.actualizarPaginaCargaGeneralControles(fuente_control);
		this.actualizarPaginaCargaCombosFK(fuente_control);
		this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(fuente_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(fuente_control) {
		this.actualizarPaginaCargaGeneralControles(fuente_control);
		this.actualizarPaginaCargaCombosFK(fuente_control);
		this.actualizarPaginaFormulario(fuente_control);
		this.onLoadCombosDefectoFK(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(fuente_control) {
		//FORMULARIO
		if(fuente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(fuente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(fuente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		
		//COMBOS FK
		if(fuente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(fuente_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(fuente_control) {
		//FORMULARIO
		if(fuente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(fuente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);	
		//COMBOS FK
		if(fuente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(fuente_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(fuente_control) {
		
		if(fuente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(fuente_control);
		}
		
		if(fuente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(fuente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(fuente_control) {
		if(fuente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("fuenteReturnGeneral",JSON.stringify(fuente_control.fuenteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(fuente_control) {
		if(fuente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && fuente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(fuente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(fuente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(fuente_control, mostrar) {
		
		if(mostrar==true) {
			fuente_funcion1.resaltarRestaurarDivsPagina(false,"fuente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				fuente_funcion1.resaltarRestaurarDivMantenimiento(false,"fuente");
			}			
			
			fuente_funcion1.mostrarDivMensaje(true,fuente_control.strAuxiliarMensaje,fuente_control.strAuxiliarCssMensaje);
		
		} else {
			fuente_funcion1.mostrarDivMensaje(false,fuente_control.strAuxiliarMensaje,fuente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(fuente_control) {
		if(fuente_funcion1.esPaginaForm(fuente_constante1)==true) {
			window.opener.fuente_webcontrol1.actualizarPaginaTablaDatos(fuente_control);
		} else {
			this.actualizarPaginaTablaDatos(fuente_control);
		}
	}
	
	actualizarPaginaAbrirLink(fuente_control) {
		fuente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(fuente_control.strAuxiliarUrlPagina);
				
		fuente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(fuente_control.strAuxiliarTipo,fuente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(fuente_control) {
		fuente_funcion1.resaltarRestaurarDivMensaje(true,fuente_control.strAuxiliarMensajeAlert,fuente_control.strAuxiliarCssMensaje);
			
		if(fuente_funcion1.esPaginaForm(fuente_constante1)==true) {
			window.opener.fuente_funcion1.resaltarRestaurarDivMensaje(true,fuente_control.strAuxiliarMensajeAlert,fuente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(fuente_control) {
		this.fuente_controlInicial=fuente_control;
			
		if(fuente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(fuente_control.strStyleDivArbol,fuente_control.strStyleDivContent
																,fuente_control.strStyleDivOpcionesBanner,fuente_control.strStyleDivExpandirColapsar
																,fuente_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(fuente_control) {
		this.actualizarCssBotonesPagina(fuente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(fuente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(fuente_control.tiposReportes,fuente_control.tiposReporte
															 	,fuente_control.tiposPaginacion,fuente_control.tiposAcciones
																,fuente_control.tiposColumnasSelect,fuente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(fuente_control.tiposRelaciones,fuente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(fuente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(fuente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(fuente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(fuente_control) {
	
		var indexPosition=fuente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=fuente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(fuente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(fuente_control.strRecargarFkTiposNinguno!=null && fuente_control.strRecargarFkTiposNinguno!='NINGUNO' && fuente_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(fuente_control) {
		jQuery("#tdfuenteNuevo").css("display",fuente_control.strPermisoNuevo);
		jQuery("#trfuenteElementos").css("display",fuente_control.strVisibleTablaElementos);
		jQuery("#trfuenteAcciones").css("display",fuente_control.strVisibleTablaAcciones);
		jQuery("#trfuenteParametrosAcciones").css("display",fuente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(fuente_control) {
	
		this.actualizarCssBotonesMantenimiento(fuente_control);
				
		if(fuente_control.fuenteActual!=null) {//form
			
			this.actualizarCamposFormulario(fuente_control);			
		}
						
		this.actualizarSpanMensajesCampos(fuente_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(fuente_control) {
	
		jQuery("#form"+fuente_constante1.STR_SUFIJO+"-id").val(fuente_control.fuenteActual.id);
		jQuery("#form"+fuente_constante1.STR_SUFIJO+"-version_row").val(fuente_control.fuenteActual.versionRow);
		jQuery("#form"+fuente_constante1.STR_SUFIJO+"-codigo").val(fuente_control.fuenteActual.codigo);
		jQuery("#form"+fuente_constante1.STR_SUFIJO+"-nombre").val(fuente_control.fuenteActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+fuente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("fuente","contabilidad","","form_fuente",formulario,"","",paraEventoTabla,idFilaTabla,fuente_funcion1,fuente_webcontrol1,fuente_constante1);
	}
	
	actualizarSpanMensajesCampos(fuente_control) {
		jQuery("#spanstrMensajeid").text(fuente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(fuente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(fuente_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(fuente_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(fuente_control) {
		jQuery("#tdbtnNuevofuente").css("visibility",fuente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevofuente").css("display",fuente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarfuente").css("visibility",fuente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarfuente").css("display",fuente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarfuente").css("visibility",fuente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarfuente").css("display",fuente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarfuente").css("visibility",fuente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosfuente").css("visibility",fuente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosfuente").css("display",fuente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarfuente").css("visibility",fuente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarfuente").css("visibility",fuente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarfuente").css("visibility",fuente_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//fuente_control
		
	
	}
	
	onLoadCombosDefectoFK(fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(fuente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(fuente_constante1.BIT_ES_PAGINA_FORM==true) {
				fuente_funcion1.validarFormularioJQuery(fuente_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("fuente");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("fuente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(fuente_funcion1,fuente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(fuente_funcion1,fuente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(fuente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,"fuente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("fuente");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(fuente_control) {
		
		
		
		if(fuente_control.strPermisoActualizar!=null) {
			jQuery("#tdfuenteActualizarToolBar").css("display",fuente_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdfuenteEliminarToolBar").css("display",fuente_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trfuenteElementos").css("display",fuente_control.strVisibleTablaElementos);
		
		jQuery("#trfuenteAcciones").css("display",fuente_control.strVisibleTablaAcciones);
		jQuery("#trfuenteParametrosAcciones").css("display",fuente_control.strVisibleTablaAcciones);
		
		jQuery("#tdfuenteCerrarPagina").css("display",fuente_control.strPermisoPopup);		
		jQuery("#tdfuenteCerrarPaginaToolBar").css("display",fuente_control.strPermisoPopup);
		//jQuery("#trfuenteAccionesRelaciones").css("display",fuente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=fuente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + fuente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + fuente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Fuentes";
		sTituloBanner+=" - " + fuente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + fuente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdfuenteRelacionesToolBar").css("display",fuente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosfuente").css("display",fuente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		fuente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		fuente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		fuente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		fuente_webcontrol1.registrarEventosControles();
		
		if(fuente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(fuente_constante1.STR_ES_RELACIONADO=="false") {
			fuente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(fuente_constante1.STR_ES_RELACIONES=="true") {
			if(fuente_constante1.BIT_ES_PAGINA_FORM==true) {
				fuente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(fuente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(fuente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(fuente_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(fuente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
						//fuente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(fuente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(fuente_constante1.BIG_ID_ACTUAL,"fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
						//fuente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			fuente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);	
	}
}

var fuente_webcontrol1 = new fuente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {fuente_webcontrol,fuente_webcontrol1};

//Para ser llamado desde window.opener
window.fuente_webcontrol1 = fuente_webcontrol1;


if(fuente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = fuente_webcontrol1.onLoadWindow; 
}

//</script>