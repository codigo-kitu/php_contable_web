//<script type="text/javascript" language="javascript">



//var tipo_kardexJQueryPaginaWebInteraccion= function (tipo_kardex_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_kardex_constante,tipo_kardex_constante1} from '../util/tipo_kardex_constante.js';

import {tipo_kardex_funcion,tipo_kardex_funcion1} from '../util/tipo_kardex_form_funcion.js';


class tipo_kardex_webcontrol extends GeneralEntityWebControl {
	
	tipo_kardex_control=null;
	tipo_kardex_controlInicial=null;
	tipo_kardex_controlAuxiliar=null;
		
	//if(tipo_kardex_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_kardex_control) {
		super();
		
		this.tipo_kardex_control=tipo_kardex_control;
	}
		
	actualizarVariablesPagina(tipo_kardex_control) {
		
		if(tipo_kardex_control.action=="index" || tipo_kardex_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_kardex_control);
			
		} 
		
		
		
	
		else if(tipo_kardex_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_kardex_control);	
		
		} else if(tipo_kardex_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_kardex_control);		
		}
	
		else if(tipo_kardex_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_kardex_control);		
		}
	
		else if(tipo_kardex_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_kardex_control);
		}
		
		
		else if(tipo_kardex_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(tipo_kardex_control);		
		
		} else if(tipo_kardex_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_kardex_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tipo_kardex_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(tipo_kardex_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tipo_kardex_control) {
		this.actualizarPaginaAccionesGenerales(tipo_kardex_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tipo_kardex_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_kardex_control);
		this.actualizarPaginaOrderBy(tipo_kardex_control);
		this.actualizarPaginaTablaDatos(tipo_kardex_control);
		this.actualizarPaginaCargaGeneralControles(tipo_kardex_control);
		//this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_kardex_control);
		this.actualizarPaginaAreaBusquedas(tipo_kardex_control);
		this.actualizarPaginaCargaCombosFK(tipo_kardex_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_kardex_control) {
		//this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_kardex_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_kardex_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_kardex_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(tipo_kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tipo_kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tipo_kardex_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_kardex_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_kardex_control);
		this.actualizarPaginaCargaCombosFK(tipo_kardex_control);
		this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(tipo_kardex_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_kardex_control) {
		this.actualizarPaginaCargaGeneralControles(tipo_kardex_control);
		this.actualizarPaginaCargaCombosFK(tipo_kardex_control);
		this.actualizarPaginaFormulario(tipo_kardex_control);
		this.onLoadCombosDefectoFK(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_kardex_control) {
		//FORMULARIO
		if(tipo_kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_kardex_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(tipo_kardex_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		
		//COMBOS FK
		if(tipo_kardex_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_kardex_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(tipo_kardex_control) {
		//FORMULARIO
		if(tipo_kardex_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tipo_kardex_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);	
		//COMBOS FK
		if(tipo_kardex_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tipo_kardex_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tipo_kardex_control) {
		
		if(tipo_kardex_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_kardex_control);
		}
		
		if(tipo_kardex_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(tipo_kardex_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tipo_kardex_control) {
		if(tipo_kardex_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tipo_kardexReturnGeneral",JSON.stringify(tipo_kardex_control.tipo_kardexReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control) {
		if(tipo_kardex_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_kardex_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_kardex_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_kardex_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tipo_kardex_control, mostrar) {
		
		if(mostrar==true) {
			tipo_kardex_funcion1.resaltarRestaurarDivsPagina(false,"tipo_kardex");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_kardex_funcion1.resaltarRestaurarDivMantenimiento(false,"tipo_kardex");
			}			
			
			tipo_kardex_funcion1.mostrarDivMensaje(true,tipo_kardex_control.strAuxiliarMensaje,tipo_kardex_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_kardex_funcion1.mostrarDivMensaje(false,tipo_kardex_control.strAuxiliarMensaje,tipo_kardex_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_kardex_control) {
		if(tipo_kardex_funcion1.esPaginaForm(tipo_kardex_constante1)==true) {
			window.opener.tipo_kardex_webcontrol1.actualizarPaginaTablaDatos(tipo_kardex_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_kardex_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_kardex_control) {
		tipo_kardex_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_kardex_control.strAuxiliarUrlPagina);
				
		tipo_kardex_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_kardex_control.strAuxiliarTipo,tipo_kardex_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_kardex_control) {
		tipo_kardex_funcion1.resaltarRestaurarDivMensaje(true,tipo_kardex_control.strAuxiliarMensajeAlert,tipo_kardex_control.strAuxiliarCssMensaje);
			
		if(tipo_kardex_funcion1.esPaginaForm(tipo_kardex_constante1)==true) {
			window.opener.tipo_kardex_funcion1.resaltarRestaurarDivMensaje(true,tipo_kardex_control.strAuxiliarMensajeAlert,tipo_kardex_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(tipo_kardex_control) {
		this.tipo_kardex_controlInicial=tipo_kardex_control;
			
		if(tipo_kardex_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_kardex_control.strStyleDivArbol,tipo_kardex_control.strStyleDivContent
																,tipo_kardex_control.strStyleDivOpcionesBanner,tipo_kardex_control.strStyleDivExpandirColapsar
																,tipo_kardex_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(tipo_kardex_control) {
		this.actualizarCssBotonesPagina(tipo_kardex_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_kardex_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_kardex_control.tiposReportes,tipo_kardex_control.tiposReporte
															 	,tipo_kardex_control.tiposPaginacion,tipo_kardex_control.tiposAcciones
																,tipo_kardex_control.tiposColumnasSelect,tipo_kardex_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tipo_kardex_control.tiposRelaciones,tipo_kardex_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_kardex_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_kardex_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_kardex_control);			
	}
	
	actualizarPaginaUsuarioInvitado(tipo_kardex_control) {
	
		var indexPosition=tipo_kardex_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_kardex_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(tipo_kardex_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_kardex_control.strRecargarFkTiposNinguno!=null && tipo_kardex_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_kardex_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(tipo_kardex_control) {
		jQuery("#tdtipo_kardexNuevo").css("display",tipo_kardex_control.strPermisoNuevo);
		jQuery("#trtipo_kardexElementos").css("display",tipo_kardex_control.strVisibleTablaElementos);
		jQuery("#trtipo_kardexAcciones").css("display",tipo_kardex_control.strVisibleTablaAcciones);
		jQuery("#trtipo_kardexParametrosAcciones").css("display",tipo_kardex_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(tipo_kardex_control) {
	
		this.actualizarCssBotonesMantenimiento(tipo_kardex_control);
				
		if(tipo_kardex_control.tipo_kardexActual!=null) {//form
			
			this.actualizarCamposFormulario(tipo_kardex_control);			
		}
						
		this.actualizarSpanMensajesCampos(tipo_kardex_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tipo_kardex_control) {
	
		jQuery("#form"+tipo_kardex_constante1.STR_SUFIJO+"-id").val(tipo_kardex_control.tipo_kardexActual.id);
		jQuery("#form"+tipo_kardex_constante1.STR_SUFIJO+"-version_row").val(tipo_kardex_control.tipo_kardexActual.versionRow);
		jQuery("#form"+tipo_kardex_constante1.STR_SUFIJO+"-codigo").val(tipo_kardex_control.tipo_kardexActual.codigo);
		jQuery("#form"+tipo_kardex_constante1.STR_SUFIJO+"-nombre").val(tipo_kardex_control.tipo_kardexActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tipo_kardex_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tipo_kardex","inventario","","form_tipo_kardex",formulario,"","",paraEventoTabla,idFilaTabla,tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
	}
	
	actualizarSpanMensajesCampos(tipo_kardex_control) {
		jQuery("#spanstrMensajeid").text(tipo_kardex_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(tipo_kardex_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(tipo_kardex_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tipo_kardex_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(tipo_kardex_control) {
		jQuery("#tdbtnNuevotipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotipo_kardex").css("display",tipo_kardex_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartipo_kardex").css("display",tipo_kardex_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartipo_kardex").css("display",tipo_kardex_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostipo_kardex").css("display",tipo_kardex_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartipo_kardex").css("visibility",tipo_kardex_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_kardex_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(tipo_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_kardex_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(tipo_kardex_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_kardex_funcion1.validarFormularioJQuery(tipo_kardex_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_kardex");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_kardex");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(tipo_kardex_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,"tipo_kardex");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tipo_kardex");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_kardex_control) {
		
		
		
		if(tipo_kardex_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_kardexActualizarToolBar").css("display",tipo_kardex_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdtipo_kardexEliminarToolBar").css("display",tipo_kardex_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trtipo_kardexElementos").css("display",tipo_kardex_control.strVisibleTablaElementos);
		
		jQuery("#trtipo_kardexAcciones").css("display",tipo_kardex_control.strVisibleTablaAcciones);
		jQuery("#trtipo_kardexParametrosAcciones").css("display",tipo_kardex_control.strVisibleTablaAcciones);
		
		jQuery("#tdtipo_kardexCerrarPagina").css("display",tipo_kardex_control.strPermisoPopup);		
		jQuery("#tdtipo_kardexCerrarPaginaToolBar").css("display",tipo_kardex_control.strPermisoPopup);
		//jQuery("#trtipo_kardexAccionesRelaciones").css("display",tipo_kardex_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tipo_kardex_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_kardex_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tipo_kardex_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tipo Kadexs";
		sTituloBanner+=" - " + tipo_kardex_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_kardex_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtipo_kardexRelacionesToolBar").css("display",tipo_kardex_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostipo_kardex").css("display",tipo_kardex_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tipo_kardex_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tipo_kardex_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_kardex_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_kardex_webcontrol1.registrarEventosControles();
		
		if(tipo_kardex_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_kardex_constante1.STR_ES_RELACIONADO=="false") {
			tipo_kardex_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_kardex_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_kardex_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_kardex_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_kardex_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tipo_kardex_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(tipo_kardex_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(tipo_kardex_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
						//tipo_kardex_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(tipo_kardex_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tipo_kardex_constante1.BIG_ID_ACTUAL,"tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
						//tipo_kardex_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			tipo_kardex_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);	
	}
}

var tipo_kardex_webcontrol1 = new tipo_kardex_webcontrol();

//Para ser llamado desde otro archivo (import)
export {tipo_kardex_webcontrol,tipo_kardex_webcontrol1};

//Para ser llamado desde window.opener
window.tipo_kardex_webcontrol1 = tipo_kardex_webcontrol1;


if(tipo_kardex_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_kardex_webcontrol1.onLoadWindow; 
}

//</script>