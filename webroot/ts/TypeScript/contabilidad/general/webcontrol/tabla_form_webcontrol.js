//<script type="text/javascript" language="javascript">



//var tablaJQueryPaginaWebInteraccion= function (tabla_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tabla_constante,tabla_constante1} from '../util/tabla_constante.js';

import {tabla_funcion,tabla_funcion1} from '../util/tabla_form_funcion.js';


class tabla_webcontrol extends GeneralEntityWebControl {
	
	tabla_control=null;
	tabla_controlInicial=null;
	tabla_controlAuxiliar=null;
		
	//if(tabla_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tabla_control) {
		super();
		
		this.tabla_control=tabla_control;
	}
		
	actualizarVariablesPagina(tabla_control) {
		
		if(tabla_control.action=="index" || tabla_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tabla_control);
			
		} 
		
		
		
	
		else if(tabla_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tabla_control);	
		
		} else if(tabla_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tabla_control);		
		}
	
		else if(tabla_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tabla_control);		
		}
	
		else if(tabla_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tabla_control);
		}
		
		
		else if(tabla_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(tabla_control);
		
		} else if(tabla_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(tabla_control);
		
		} else if(tabla_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(tabla_control);
		
		} else if(tabla_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tabla_control);
		
		} else if(tabla_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tabla_control);
		
		} else if(tabla_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(tabla_control);		
		
		} else if(tabla_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(tabla_control);		
		
		} 
		//else if(tabla_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(tabla_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tabla_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(tabla_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tabla_control) {
		this.actualizarPaginaAccionesGenerales(tabla_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tabla_control) {
		
		this.actualizarPaginaCargaGeneral(tabla_control);
		this.actualizarPaginaOrderBy(tabla_control);
		this.actualizarPaginaTablaDatos(tabla_control);
		this.actualizarPaginaCargaGeneralControles(tabla_control);
		//this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tabla_control);
		this.actualizarPaginaAreaBusquedas(tabla_control);
		this.actualizarPaginaCargaCombosFK(tabla_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(tabla_control) {
		//this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tabla_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tabla_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tabla_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(tabla_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tabla_control);		
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tabla_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tabla_control);		
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tabla_control) {
		this.actualizarPaginaTablaDatosAuxiliar(tabla_control);		
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tabla_control) {
		this.actualizarPaginaCargaGeneralControles(tabla_control);
		this.actualizarPaginaCargaCombosFK(tabla_control);
		this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(tabla_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tabla_control) {
		this.actualizarPaginaCargaGeneralControles(tabla_control);
		this.actualizarPaginaCargaCombosFK(tabla_control);
		this.actualizarPaginaFormulario(tabla_control);
		this.onLoadCombosDefectoFK(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(tabla_control) {
		//FORMULARIO
		if(tabla_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tabla_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(tabla_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		
		//COMBOS FK
		if(tabla_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tabla_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(tabla_control) {
		//FORMULARIO
		if(tabla_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tabla_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(tabla_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);	
		
		//COMBOS FK
		if(tabla_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tabla_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(tabla_control) {
		//FORMULARIO
		if(tabla_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(tabla_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);	
		//COMBOS FK
		if(tabla_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(tabla_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tabla_control) {
		
		if(tabla_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tabla_control);
		}
		
		if(tabla_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(tabla_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tabla_control) {
		if(tabla_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tablaReturnGeneral",JSON.stringify(tabla_control.tablaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tabla_control) {
		if(tabla_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tabla_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tabla_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tabla_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tabla_control, mostrar) {
		
		if(mostrar==true) {
			tabla_funcion1.resaltarRestaurarDivsPagina(false,"tabla");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tabla_funcion1.resaltarRestaurarDivMantenimiento(false,"tabla");
			}			
			
			tabla_funcion1.mostrarDivMensaje(true,tabla_control.strAuxiliarMensaje,tabla_control.strAuxiliarCssMensaje);
		
		} else {
			tabla_funcion1.mostrarDivMensaje(false,tabla_control.strAuxiliarMensaje,tabla_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tabla_control) {
		if(tabla_funcion1.esPaginaForm(tabla_constante1)==true) {
			window.opener.tabla_webcontrol1.actualizarPaginaTablaDatos(tabla_control);
		} else {
			this.actualizarPaginaTablaDatos(tabla_control);
		}
	}
	
	actualizarPaginaAbrirLink(tabla_control) {
		tabla_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tabla_control.strAuxiliarUrlPagina);
				
		tabla_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tabla_control.strAuxiliarTipo,tabla_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tabla_control) {
		tabla_funcion1.resaltarRestaurarDivMensaje(true,tabla_control.strAuxiliarMensajeAlert,tabla_control.strAuxiliarCssMensaje);
			
		if(tabla_funcion1.esPaginaForm(tabla_constante1)==true) {
			window.opener.tabla_funcion1.resaltarRestaurarDivMensaje(true,tabla_control.strAuxiliarMensajeAlert,tabla_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(tabla_control) {
		this.tabla_controlInicial=tabla_control;
			
		if(tabla_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tabla_control.strStyleDivArbol,tabla_control.strStyleDivContent
																,tabla_control.strStyleDivOpcionesBanner,tabla_control.strStyleDivExpandirColapsar
																,tabla_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(tabla_control) {
		this.actualizarCssBotonesPagina(tabla_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tabla_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tabla_control.tiposReportes,tabla_control.tiposReporte
															 	,tabla_control.tiposPaginacion,tabla_control.tiposAcciones
																,tabla_control.tiposColumnasSelect,tabla_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tabla_control.tiposRelaciones,tabla_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(tabla_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tabla_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tabla_control);			
	}
	
	actualizarPaginaUsuarioInvitado(tabla_control) {
	
		var indexPosition=tabla_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tabla_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(tabla_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(tabla_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",tabla_control.strRecargarFkTipos,",")) { 
				tabla_webcontrol1.cargarCombosmodulosFK(tabla_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tabla_control.strRecargarFkTiposNinguno!=null && tabla_control.strRecargarFkTiposNinguno!='NINGUNO' && tabla_control.strRecargarFkTiposNinguno!='') {
			
				if(tabla_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modulo",tabla_control.strRecargarFkTiposNinguno,",")) { 
					tabla_webcontrol1.cargarCombosmodulosFK(tabla_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablamoduloFK(tabla_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,tabla_funcion1,tabla_control.modulosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(tabla_control) {
		jQuery("#tdtablaNuevo").css("display",tabla_control.strPermisoNuevo);
		jQuery("#trtablaElementos").css("display",tabla_control.strVisibleTablaElementos);
		jQuery("#trtablaAcciones").css("display",tabla_control.strVisibleTablaAcciones);
		jQuery("#trtablaParametrosAcciones").css("display",tabla_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(tabla_control) {
	
		this.actualizarCssBotonesMantenimiento(tabla_control);
				
		if(tabla_control.tablaActual!=null) {//form
			
			this.actualizarCamposFormulario(tabla_control);			
		}
						
		this.actualizarSpanMensajesCampos(tabla_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(tabla_control) {
	
		jQuery("#form"+tabla_constante1.STR_SUFIJO+"-id").val(tabla_control.tablaActual.id);
		jQuery("#form"+tabla_constante1.STR_SUFIJO+"-version_row").val(tabla_control.tablaActual.versionRow);
		
		if(tabla_control.tablaActual.id_modulo!=null && tabla_control.tablaActual.id_modulo>-1){
			if(jQuery("#form"+tabla_constante1.STR_SUFIJO+"-id_modulo").val() != tabla_control.tablaActual.id_modulo) {
				jQuery("#form"+tabla_constante1.STR_SUFIJO+"-id_modulo").val(tabla_control.tablaActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#form"+tabla_constante1.STR_SUFIJO+"-id_modulo").select2("val", null);
			if(jQuery("#form"+tabla_constante1.STR_SUFIJO+"-id_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+tabla_constante1.STR_SUFIJO+"-id_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+tabla_constante1.STR_SUFIJO+"-codigo").val(tabla_control.tablaActual.codigo);
		jQuery("#form"+tabla_constante1.STR_SUFIJO+"-nombre").val(tabla_control.tablaActual.nombre);
		jQuery("#form"+tabla_constante1.STR_SUFIJO+"-descripcion").val(tabla_control.tablaActual.descripcion);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+tabla_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("tabla","general","","form_tabla",formulario,"","",paraEventoTabla,idFilaTabla,tabla_funcion1,tabla_webcontrol1,tabla_constante1);
	}
	
	actualizarSpanMensajesCampos(tabla_control) {
		jQuery("#spanstrMensajeid").text(tabla_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(tabla_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_modulo").text(tabla_control.strMensajeid_modulo);		
		jQuery("#spanstrMensajecodigo").text(tabla_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(tabla_control.strMensajenombre);		
		jQuery("#spanstrMensajedescripcion").text(tabla_control.strMensajedescripcion);		
	}
	
	actualizarCssBotonesMantenimiento(tabla_control) {
		jQuery("#tdbtnNuevotabla").css("visibility",tabla_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevotabla").css("display",tabla_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizartabla").css("visibility",tabla_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizartabla").css("display",tabla_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminartabla").css("visibility",tabla_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminartabla").css("display",tabla_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelartabla").css("visibility",tabla_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiostabla").css("visibility",tabla_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiostabla").css("display",tabla_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBartabla").css("visibility",tabla_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBartabla").css("visibility",tabla_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBartabla").css("visibility",tabla_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosmodulosFK(tabla_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+tabla_constante1.STR_SUFIJO+"-id_modulo",tabla_control.modulosFK);

		if(tabla_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+tabla_control.idFilaTablaActual+"_2",tabla_control.modulosFK);
		}
	};

	
	
	registrarComboActionChangeCombosmodulosFK(tabla_control) {

	};

	
	
	setDefectoValorCombosmodulosFK(tabla_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(tabla_control.idmoduloDefaultFK>-1 && jQuery("#form"+tabla_constante1.STR_SUFIJO+"-id_modulo").val() != tabla_control.idmoduloDefaultFK) {
				jQuery("#form"+tabla_constante1.STR_SUFIJO+"-id_modulo").val(tabla_control.idmoduloDefaultFK).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tabla_control
		
	
	}
	
	onLoadCombosDefectoFK(tabla_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tabla_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(tabla_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",tabla_control.strRecargarFkTipos,",")) { 
				tabla_webcontrol1.setDefectoValorCombosmodulosFK(tabla_control);
			}

			
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
	onLoadCombosEventosFK(tabla_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tabla_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(tabla_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",tabla_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				tabla_webcontrol1.registrarComboActionChangeCombosmodulosFK(tabla_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tabla_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tabla_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(tabla_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("tabla","general","",tabla_funcion1,tabla_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(tabla_constante1.BIT_ES_PAGINA_FORM==true) {
				tabla_funcion1.validarFormularioJQuery(tabla_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tabla");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tabla");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tabla_funcion1,tabla_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tabla_funcion1,tabla_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(tabla_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tabla","general","",tabla_funcion1,tabla_webcontrol1,"tabla");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("modulo","id_modulo","seguridad","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+tabla_constante1.STR_SUFIJO+"-id_modulo_img_busqueda").click(function(){
				tabla_webcontrol1.abrirBusquedaParamodulo("id_modulo");
				//alert(jQuery('#form-id_modulo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tabla");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tabla_control) {
		
		
		
		if(tabla_control.strPermisoActualizar!=null) {
			jQuery("#tdtablaActualizarToolBar").css("display",tabla_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdtablaEliminarToolBar").css("display",tabla_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trtablaElementos").css("display",tabla_control.strVisibleTablaElementos);
		
		jQuery("#trtablaAcciones").css("display",tabla_control.strVisibleTablaAcciones);
		jQuery("#trtablaParametrosAcciones").css("display",tabla_control.strVisibleTablaAcciones);
		
		jQuery("#tdtablaCerrarPagina").css("display",tabla_control.strPermisoPopup);		
		jQuery("#tdtablaCerrarPaginaToolBar").css("display",tabla_control.strPermisoPopup);
		//jQuery("#trtablaAccionesRelaciones").css("display",tabla_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tabla_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tabla_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tabla_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tablas";
		sTituloBanner+=" - " + tabla_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tabla_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtablaRelacionesToolBar").css("display",tabla_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostabla").css("display",tabla_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tabla","general","",tabla_funcion1,tabla_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tabla_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tabla_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tabla_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tabla_webcontrol1.registrarEventosControles();
		
		if(tabla_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tabla_constante1.STR_ES_RELACIONADO=="false") {
			tabla_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tabla_constante1.STR_ES_RELACIONES=="true") {
			if(tabla_constante1.BIT_ES_PAGINA_FORM==true) {
				tabla_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tabla_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tabla_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(tabla_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(tabla_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
						//tabla_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(tabla_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(tabla_constante1.BIG_ID_ACTUAL,"tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
						//tabla_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			tabla_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);	
	}
}

var tabla_webcontrol1 = new tabla_webcontrol();

//Para ser llamado desde otro archivo (import)
export {tabla_webcontrol,tabla_webcontrol1};

//Para ser llamado desde window.opener
window.tabla_webcontrol1 = tabla_webcontrol1;


if(tabla_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tabla_webcontrol1.onLoadWindow; 
}

//</script>