//<script type="text/javascript" language="javascript">



//var monedaJQueryPaginaWebInteraccion= function (moneda_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {moneda_constante,moneda_constante1} from '../util/moneda_constante.js';

import {moneda_funcion,moneda_funcion1} from '../util/moneda_form_funcion.js';


class moneda_webcontrol extends GeneralEntityWebControl {
	
	moneda_control=null;
	moneda_controlInicial=null;
	moneda_controlAuxiliar=null;
		
	//if(moneda_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(moneda_control) {
		super();
		
		this.moneda_control=moneda_control;
	}
		
	actualizarVariablesPagina(moneda_control) {
		
		if(moneda_control.action=="index" || moneda_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(moneda_control);
			
		} 
		
		
		
	
		else if(moneda_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(moneda_control);	
		
		} else if(moneda_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(moneda_control);		
		}
	
		else if(moneda_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(moneda_control);		
		}
	
		else if(moneda_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(moneda_control);
		}
		
		
		else if(moneda_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(moneda_control);
		
		} else if(moneda_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(moneda_control);
		
		} else if(moneda_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(moneda_control);
		
		} else if(moneda_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(moneda_control);
		
		} else if(moneda_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(moneda_control);
		
		} else if(moneda_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(moneda_control);		
		
		} else if(moneda_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(moneda_control);		
		
		} 
		//else if(moneda_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(moneda_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + moneda_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(moneda_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(moneda_control) {
		this.actualizarPaginaAccionesGenerales(moneda_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(moneda_control) {
		
		this.actualizarPaginaCargaGeneral(moneda_control);
		this.actualizarPaginaOrderBy(moneda_control);
		this.actualizarPaginaTablaDatos(moneda_control);
		this.actualizarPaginaCargaGeneralControles(moneda_control);
		//this.actualizarPaginaFormulario(moneda_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(moneda_control);
		this.actualizarPaginaAreaBusquedas(moneda_control);
		this.actualizarPaginaCargaCombosFK(moneda_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(moneda_control) {
		//this.actualizarPaginaFormulario(moneda_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		this.actualizarPaginaAreaMantenimiento(moneda_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(moneda_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(moneda_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(moneda_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(moneda_control) {
		this.actualizarPaginaTablaDatosAuxiliar(moneda_control);		
		this.actualizarPaginaFormulario(moneda_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		this.actualizarPaginaAreaMantenimiento(moneda_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(moneda_control) {
		this.actualizarPaginaTablaDatosAuxiliar(moneda_control);		
		this.actualizarPaginaFormulario(moneda_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		this.actualizarPaginaAreaMantenimiento(moneda_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(moneda_control) {
		this.actualizarPaginaTablaDatosAuxiliar(moneda_control);		
		this.actualizarPaginaFormulario(moneda_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		this.actualizarPaginaAreaMantenimiento(moneda_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(moneda_control) {
		this.actualizarPaginaCargaGeneralControles(moneda_control);
		this.actualizarPaginaCargaCombosFK(moneda_control);
		this.actualizarPaginaFormulario(moneda_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		this.actualizarPaginaAreaMantenimiento(moneda_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(moneda_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(moneda_control) {
		this.actualizarPaginaCargaGeneralControles(moneda_control);
		this.actualizarPaginaCargaCombosFK(moneda_control);
		this.actualizarPaginaFormulario(moneda_control);
		this.onLoadCombosDefectoFK(moneda_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		this.actualizarPaginaAreaMantenimiento(moneda_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(moneda_control) {
		//FORMULARIO
		if(moneda_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(moneda_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(moneda_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);		
		
		//COMBOS FK
		if(moneda_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(moneda_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(moneda_control) {
		//FORMULARIO
		if(moneda_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(moneda_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(moneda_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);	
		
		//COMBOS FK
		if(moneda_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(moneda_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(moneda_control) {
		//FORMULARIO
		if(moneda_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(moneda_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(moneda_control);	
		//COMBOS FK
		if(moneda_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(moneda_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(moneda_control) {
		
		if(moneda_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(moneda_control);
		}
		
		if(moneda_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(moneda_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(moneda_control) {
		if(moneda_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("monedaReturnGeneral",JSON.stringify(moneda_control.monedaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(moneda_control) {
		if(moneda_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && moneda_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(moneda_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(moneda_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(moneda_control, mostrar) {
		
		if(mostrar==true) {
			moneda_funcion1.resaltarRestaurarDivsPagina(false,"moneda");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				moneda_funcion1.resaltarRestaurarDivMantenimiento(false,"moneda");
			}			
			
			moneda_funcion1.mostrarDivMensaje(true,moneda_control.strAuxiliarMensaje,moneda_control.strAuxiliarCssMensaje);
		
		} else {
			moneda_funcion1.mostrarDivMensaje(false,moneda_control.strAuxiliarMensaje,moneda_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(moneda_control) {
		if(moneda_funcion1.esPaginaForm(moneda_constante1)==true) {
			window.opener.moneda_webcontrol1.actualizarPaginaTablaDatos(moneda_control);
		} else {
			this.actualizarPaginaTablaDatos(moneda_control);
		}
	}
	
	actualizarPaginaAbrirLink(moneda_control) {
		moneda_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(moneda_control.strAuxiliarUrlPagina);
				
		moneda_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(moneda_control.strAuxiliarTipo,moneda_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(moneda_control) {
		moneda_funcion1.resaltarRestaurarDivMensaje(true,moneda_control.strAuxiliarMensajeAlert,moneda_control.strAuxiliarCssMensaje);
			
		if(moneda_funcion1.esPaginaForm(moneda_constante1)==true) {
			window.opener.moneda_funcion1.resaltarRestaurarDivMensaje(true,moneda_control.strAuxiliarMensajeAlert,moneda_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(moneda_control) {
		this.moneda_controlInicial=moneda_control;
			
		if(moneda_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(moneda_control.strStyleDivArbol,moneda_control.strStyleDivContent
																,moneda_control.strStyleDivOpcionesBanner,moneda_control.strStyleDivExpandirColapsar
																,moneda_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(moneda_control) {
		this.actualizarCssBotonesPagina(moneda_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(moneda_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(moneda_control.tiposReportes,moneda_control.tiposReporte
															 	,moneda_control.tiposPaginacion,moneda_control.tiposAcciones
																,moneda_control.tiposColumnasSelect,moneda_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(moneda_control.tiposRelaciones,moneda_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(moneda_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(moneda_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(moneda_control);			
	}
	
	actualizarPaginaUsuarioInvitado(moneda_control) {
	
		var indexPosition=moneda_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=moneda_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(moneda_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(moneda_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",moneda_control.strRecargarFkTipos,",")) { 
				moneda_webcontrol1.cargarCombosempresasFK(moneda_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(moneda_control.strRecargarFkTiposNinguno!=null && moneda_control.strRecargarFkTiposNinguno!='NINGUNO' && moneda_control.strRecargarFkTiposNinguno!='') {
			
				if(moneda_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",moneda_control.strRecargarFkTiposNinguno,",")) { 
					moneda_webcontrol1.cargarCombosempresasFK(moneda_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(moneda_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,moneda_funcion1,moneda_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(moneda_control) {
		jQuery("#tdmonedaNuevo").css("display",moneda_control.strPermisoNuevo);
		jQuery("#trmonedaElementos").css("display",moneda_control.strVisibleTablaElementos);
		jQuery("#trmonedaAcciones").css("display",moneda_control.strVisibleTablaAcciones);
		jQuery("#trmonedaParametrosAcciones").css("display",moneda_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(moneda_control) {
	
		this.actualizarCssBotonesMantenimiento(moneda_control);
				
		if(moneda_control.monedaActual!=null) {//form
			
			this.actualizarCamposFormulario(moneda_control);			
		}
						
		this.actualizarSpanMensajesCampos(moneda_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(moneda_control) {
	
		jQuery("#form"+moneda_constante1.STR_SUFIJO+"-id").val(moneda_control.monedaActual.id);
		jQuery("#form"+moneda_constante1.STR_SUFIJO+"-version_row").val(moneda_control.monedaActual.versionRow);
		
		if(moneda_control.monedaActual.id_empresa!=null && moneda_control.monedaActual.id_empresa>-1){
			if(jQuery("#form"+moneda_constante1.STR_SUFIJO+"-id_empresa").val() != moneda_control.monedaActual.id_empresa) {
				jQuery("#form"+moneda_constante1.STR_SUFIJO+"-id_empresa").val(moneda_control.monedaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+moneda_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+moneda_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+moneda_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+moneda_constante1.STR_SUFIJO+"-codigo").val(moneda_control.monedaActual.codigo);
		jQuery("#form"+moneda_constante1.STR_SUFIJO+"-nombre").val(moneda_control.monedaActual.nombre);
		jQuery("#form"+moneda_constante1.STR_SUFIJO+"-simbolo").val(moneda_control.monedaActual.simbolo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+moneda_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("moneda","contabilidad","","form_moneda",formulario,"","",paraEventoTabla,idFilaTabla,moneda_funcion1,moneda_webcontrol1,moneda_constante1);
	}
	
	actualizarSpanMensajesCampos(moneda_control) {
		jQuery("#spanstrMensajeid").text(moneda_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(moneda_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(moneda_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(moneda_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(moneda_control.strMensajenombre);		
		jQuery("#spanstrMensajesimbolo").text(moneda_control.strMensajesimbolo);		
	}
	
	actualizarCssBotonesMantenimiento(moneda_control) {
		jQuery("#tdbtnNuevomoneda").css("visibility",moneda_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevomoneda").css("display",moneda_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarmoneda").css("visibility",moneda_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarmoneda").css("display",moneda_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarmoneda").css("visibility",moneda_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarmoneda").css("display",moneda_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarmoneda").css("visibility",moneda_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosmoneda").css("visibility",moneda_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosmoneda").css("display",moneda_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarmoneda").css("visibility",moneda_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarmoneda").css("visibility",moneda_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarmoneda").css("visibility",moneda_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(moneda_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+moneda_constante1.STR_SUFIJO+"-id_empresa",moneda_control.empresasFK);

		if(moneda_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+moneda_control.idFilaTablaActual+"_2",moneda_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(moneda_control) {

	};

	
	
	setDefectoValorCombosempresasFK(moneda_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(moneda_control.idempresaDefaultFK>-1 && jQuery("#form"+moneda_constante1.STR_SUFIJO+"-id_empresa").val() != moneda_control.idempresaDefaultFK) {
				jQuery("#form"+moneda_constante1.STR_SUFIJO+"-id_empresa").val(moneda_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//moneda_control
		
	
	}
	
	onLoadCombosDefectoFK(moneda_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(moneda_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(moneda_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",moneda_control.strRecargarFkTipos,",")) { 
				moneda_webcontrol1.setDefectoValorCombosempresasFK(moneda_control);
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
	onLoadCombosEventosFK(moneda_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(moneda_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(moneda_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",moneda_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				moneda_webcontrol1.registrarComboActionChangeCombosempresasFK(moneda_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(moneda_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(moneda_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(moneda_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(moneda_constante1.BIT_ES_PAGINA_FORM==true) {
				moneda_funcion1.validarFormularioJQuery(moneda_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("moneda");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("moneda");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(moneda_funcion1,moneda_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(moneda_funcion1,moneda_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(moneda_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,"moneda");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+moneda_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				moneda_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("moneda");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(moneda_control) {
		
		
		
		if(moneda_control.strPermisoActualizar!=null) {
			jQuery("#tdmonedaActualizarToolBar").css("display",moneda_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdmonedaEliminarToolBar").css("display",moneda_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trmonedaElementos").css("display",moneda_control.strVisibleTablaElementos);
		
		jQuery("#trmonedaAcciones").css("display",moneda_control.strVisibleTablaAcciones);
		jQuery("#trmonedaParametrosAcciones").css("display",moneda_control.strVisibleTablaAcciones);
		
		jQuery("#tdmonedaCerrarPagina").css("display",moneda_control.strPermisoPopup);		
		jQuery("#tdmonedaCerrarPaginaToolBar").css("display",moneda_control.strPermisoPopup);
		//jQuery("#trmonedaAccionesRelaciones").css("display",moneda_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=moneda_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + moneda_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + moneda_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Monedas";
		sTituloBanner+=" - " + moneda_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + moneda_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdmonedaRelacionesToolBar").css("display",moneda_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosmoneda").css("display",moneda_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		moneda_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		moneda_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		moneda_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		moneda_webcontrol1.registrarEventosControles();
		
		if(moneda_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(moneda_constante1.STR_ES_RELACIONADO=="false") {
			moneda_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(moneda_constante1.STR_ES_RELACIONES=="true") {
			if(moneda_constante1.BIT_ES_PAGINA_FORM==true) {
				moneda_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(moneda_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(moneda_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(moneda_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(moneda_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
						//moneda_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(moneda_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(moneda_constante1.BIG_ID_ACTUAL,"moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);
						//moneda_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			moneda_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("moneda","contabilidad","",moneda_funcion1,moneda_webcontrol1,moneda_constante1);	
	}
}

var moneda_webcontrol1 = new moneda_webcontrol();

//Para ser llamado desde otro archivo (import)
export {moneda_webcontrol,moneda_webcontrol1};

//Para ser llamado desde window.opener
window.moneda_webcontrol1 = moneda_webcontrol1;


if(moneda_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = moneda_webcontrol1.onLoadWindow; 
}

//</script>