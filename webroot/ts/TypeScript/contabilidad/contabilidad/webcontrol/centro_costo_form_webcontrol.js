//<script type="text/javascript" language="javascript">



//var centro_costoJQueryPaginaWebInteraccion= function (centro_costo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {centro_costo_constante,centro_costo_constante1} from '../util/centro_costo_constante.js';

import {centro_costo_funcion,centro_costo_funcion1} from '../util/centro_costo_form_funcion.js';


class centro_costo_webcontrol extends GeneralEntityWebControl {
	
	centro_costo_control=null;
	centro_costo_controlInicial=null;
	centro_costo_controlAuxiliar=null;
		
	//if(centro_costo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(centro_costo_control) {
		super();
		
		this.centro_costo_control=centro_costo_control;
	}
		
	actualizarVariablesPagina(centro_costo_control) {
		
		if(centro_costo_control.action=="index" || centro_costo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(centro_costo_control);
			
		} 
		
		
		
	
		else if(centro_costo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(centro_costo_control);	
		
		} else if(centro_costo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(centro_costo_control);		
		}
	
		else if(centro_costo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(centro_costo_control);		
		}
	
		else if(centro_costo_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(centro_costo_control);
		}
		
		
		else if(centro_costo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(centro_costo_control);
		
		} else if(centro_costo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(centro_costo_control);
		
		} else if(centro_costo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(centro_costo_control);
		
		} else if(centro_costo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(centro_costo_control);
		
		} else if(centro_costo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(centro_costo_control);
		
		} else if(centro_costo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(centro_costo_control);		
		
		} else if(centro_costo_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(centro_costo_control);		
		
		} 
		//else if(centro_costo_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(centro_costo_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + centro_costo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(centro_costo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(centro_costo_control) {
		this.actualizarPaginaAccionesGenerales(centro_costo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(centro_costo_control) {
		
		this.actualizarPaginaCargaGeneral(centro_costo_control);
		this.actualizarPaginaOrderBy(centro_costo_control);
		this.actualizarPaginaTablaDatos(centro_costo_control);
		this.actualizarPaginaCargaGeneralControles(centro_costo_control);
		//this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(centro_costo_control);
		this.actualizarPaginaAreaBusquedas(centro_costo_control);
		this.actualizarPaginaCargaCombosFK(centro_costo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(centro_costo_control) {
		//this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(centro_costo_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(centro_costo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(centro_costo_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(centro_costo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(centro_costo_control);		
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(centro_costo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(centro_costo_control);		
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(centro_costo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(centro_costo_control);		
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(centro_costo_control) {
		this.actualizarPaginaCargaGeneralControles(centro_costo_control);
		this.actualizarPaginaCargaCombosFK(centro_costo_control);
		this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(centro_costo_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(centro_costo_control) {
		this.actualizarPaginaCargaGeneralControles(centro_costo_control);
		this.actualizarPaginaCargaCombosFK(centro_costo_control);
		this.actualizarPaginaFormulario(centro_costo_control);
		this.onLoadCombosDefectoFK(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(centro_costo_control) {
		//FORMULARIO
		if(centro_costo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(centro_costo_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(centro_costo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		
		//COMBOS FK
		if(centro_costo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(centro_costo_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(centro_costo_control) {
		//FORMULARIO
		if(centro_costo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(centro_costo_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(centro_costo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);	
		
		//COMBOS FK
		if(centro_costo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(centro_costo_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(centro_costo_control) {
		//FORMULARIO
		if(centro_costo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(centro_costo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);	
		//COMBOS FK
		if(centro_costo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(centro_costo_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(centro_costo_control) {
		
		if(centro_costo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(centro_costo_control);
		}
		
		if(centro_costo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(centro_costo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(centro_costo_control) {
		if(centro_costo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("centro_costoReturnGeneral",JSON.stringify(centro_costo_control.centro_costoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(centro_costo_control) {
		if(centro_costo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && centro_costo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(centro_costo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(centro_costo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(centro_costo_control, mostrar) {
		
		if(mostrar==true) {
			centro_costo_funcion1.resaltarRestaurarDivsPagina(false,"centro_costo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				centro_costo_funcion1.resaltarRestaurarDivMantenimiento(false,"centro_costo");
			}			
			
			centro_costo_funcion1.mostrarDivMensaje(true,centro_costo_control.strAuxiliarMensaje,centro_costo_control.strAuxiliarCssMensaje);
		
		} else {
			centro_costo_funcion1.mostrarDivMensaje(false,centro_costo_control.strAuxiliarMensaje,centro_costo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(centro_costo_control) {
		if(centro_costo_funcion1.esPaginaForm(centro_costo_constante1)==true) {
			window.opener.centro_costo_webcontrol1.actualizarPaginaTablaDatos(centro_costo_control);
		} else {
			this.actualizarPaginaTablaDatos(centro_costo_control);
		}
	}
	
	actualizarPaginaAbrirLink(centro_costo_control) {
		centro_costo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(centro_costo_control.strAuxiliarUrlPagina);
				
		centro_costo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(centro_costo_control.strAuxiliarTipo,centro_costo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(centro_costo_control) {
		centro_costo_funcion1.resaltarRestaurarDivMensaje(true,centro_costo_control.strAuxiliarMensajeAlert,centro_costo_control.strAuxiliarCssMensaje);
			
		if(centro_costo_funcion1.esPaginaForm(centro_costo_constante1)==true) {
			window.opener.centro_costo_funcion1.resaltarRestaurarDivMensaje(true,centro_costo_control.strAuxiliarMensajeAlert,centro_costo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(centro_costo_control) {
		this.centro_costo_controlInicial=centro_costo_control;
			
		if(centro_costo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(centro_costo_control.strStyleDivArbol,centro_costo_control.strStyleDivContent
																,centro_costo_control.strStyleDivOpcionesBanner,centro_costo_control.strStyleDivExpandirColapsar
																,centro_costo_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(centro_costo_control) {
		this.actualizarCssBotonesPagina(centro_costo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(centro_costo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(centro_costo_control.tiposReportes,centro_costo_control.tiposReporte
															 	,centro_costo_control.tiposPaginacion,centro_costo_control.tiposAcciones
																,centro_costo_control.tiposColumnasSelect,centro_costo_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(centro_costo_control.tiposRelaciones,centro_costo_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(centro_costo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(centro_costo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(centro_costo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(centro_costo_control) {
	
		var indexPosition=centro_costo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=centro_costo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(centro_costo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(centro_costo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",centro_costo_control.strRecargarFkTipos,",")) { 
				centro_costo_webcontrol1.cargarCombosempresasFK(centro_costo_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(centro_costo_control.strRecargarFkTiposNinguno!=null && centro_costo_control.strRecargarFkTiposNinguno!='NINGUNO' && centro_costo_control.strRecargarFkTiposNinguno!='') {
			
				if(centro_costo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",centro_costo_control.strRecargarFkTiposNinguno,",")) { 
					centro_costo_webcontrol1.cargarCombosempresasFK(centro_costo_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(centro_costo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,centro_costo_funcion1,centro_costo_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(centro_costo_control) {
		jQuery("#tdcentro_costoNuevo").css("display",centro_costo_control.strPermisoNuevo);
		jQuery("#trcentro_costoElementos").css("display",centro_costo_control.strVisibleTablaElementos);
		jQuery("#trcentro_costoAcciones").css("display",centro_costo_control.strVisibleTablaAcciones);
		jQuery("#trcentro_costoParametrosAcciones").css("display",centro_costo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(centro_costo_control) {
	
		this.actualizarCssBotonesMantenimiento(centro_costo_control);
				
		if(centro_costo_control.centro_costoActual!=null) {//form
			
			this.actualizarCamposFormulario(centro_costo_control);			
		}
						
		this.actualizarSpanMensajesCampos(centro_costo_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(centro_costo_control) {
	
		jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id").val(centro_costo_control.centro_costoActual.id);
		jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-version_row").val(centro_costo_control.centro_costoActual.versionRow);
		
		if(centro_costo_control.centro_costoActual.id_empresa!=null && centro_costo_control.centro_costoActual.id_empresa>-1){
			if(jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").val() != centro_costo_control.centro_costoActual.id_empresa) {
				jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").val(centro_costo_control.centro_costoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-codigo").val(centro_costo_control.centro_costoActual.codigo);
		jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-nombre").val(centro_costo_control.centro_costoActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+centro_costo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("centro_costo","contabilidad","","form_centro_costo",formulario,"","",paraEventoTabla,idFilaTabla,centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
	}
	
	actualizarSpanMensajesCampos(centro_costo_control) {
		jQuery("#spanstrMensajeid").text(centro_costo_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(centro_costo_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(centro_costo_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(centro_costo_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(centro_costo_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(centro_costo_control) {
		jQuery("#tdbtnNuevocentro_costo").css("visibility",centro_costo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocentro_costo").css("display",centro_costo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcentro_costo").css("visibility",centro_costo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcentro_costo").css("display",centro_costo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcentro_costo").css("visibility",centro_costo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcentro_costo").css("display",centro_costo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcentro_costo").css("visibility",centro_costo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscentro_costo").css("visibility",centro_costo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscentro_costo").css("display",centro_costo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcentro_costo").css("visibility",centro_costo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcentro_costo").css("visibility",centro_costo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcentro_costo").css("visibility",centro_costo_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(centro_costo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa",centro_costo_control.empresasFK);

		if(centro_costo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+centro_costo_control.idFilaTablaActual+"_2",centro_costo_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(centro_costo_control) {

	};

	
	
	setDefectoValorCombosempresasFK(centro_costo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(centro_costo_control.idempresaDefaultFK>-1 && jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").val() != centro_costo_control.idempresaDefaultFK) {
				jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").val(centro_costo_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//centro_costo_control
		
	
	}
	
	onLoadCombosDefectoFK(centro_costo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(centro_costo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(centro_costo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",centro_costo_control.strRecargarFkTipos,",")) { 
				centro_costo_webcontrol1.setDefectoValorCombosempresasFK(centro_costo_control);
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
	onLoadCombosEventosFK(centro_costo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(centro_costo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(centro_costo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",centro_costo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				centro_costo_webcontrol1.registrarComboActionChangeCombosempresasFK(centro_costo_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(centro_costo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(centro_costo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(centro_costo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(centro_costo_constante1.BIT_ES_PAGINA_FORM==true) {
				centro_costo_funcion1.validarFormularioJQuery(centro_costo_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("centro_costo");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("centro_costo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(centro_costo_funcion1,centro_costo_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(centro_costo_funcion1,centro_costo_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(centro_costo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,"centro_costo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				centro_costo_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("centro_costo");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(centro_costo_control) {
		
		
		
		if(centro_costo_control.strPermisoActualizar!=null) {
			jQuery("#tdcentro_costoActualizarToolBar").css("display",centro_costo_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcentro_costoEliminarToolBar").css("display",centro_costo_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcentro_costoElementos").css("display",centro_costo_control.strVisibleTablaElementos);
		
		jQuery("#trcentro_costoAcciones").css("display",centro_costo_control.strVisibleTablaAcciones);
		jQuery("#trcentro_costoParametrosAcciones").css("display",centro_costo_control.strVisibleTablaAcciones);
		
		jQuery("#tdcentro_costoCerrarPagina").css("display",centro_costo_control.strPermisoPopup);		
		jQuery("#tdcentro_costoCerrarPaginaToolBar").css("display",centro_costo_control.strPermisoPopup);
		//jQuery("#trcentro_costoAccionesRelaciones").css("display",centro_costo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=centro_costo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + centro_costo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + centro_costo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Centro Costos";
		sTituloBanner+=" - " + centro_costo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + centro_costo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcentro_costoRelacionesToolBar").css("display",centro_costo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscentro_costo").css("display",centro_costo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		centro_costo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		centro_costo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		centro_costo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		centro_costo_webcontrol1.registrarEventosControles();
		
		if(centro_costo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(centro_costo_constante1.STR_ES_RELACIONADO=="false") {
			centro_costo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(centro_costo_constante1.STR_ES_RELACIONES=="true") {
			if(centro_costo_constante1.BIT_ES_PAGINA_FORM==true) {
				centro_costo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(centro_costo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(centro_costo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(centro_costo_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(centro_costo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
						//centro_costo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(centro_costo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(centro_costo_constante1.BIG_ID_ACTUAL,"centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
						//centro_costo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			centro_costo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);	
	}
}

var centro_costo_webcontrol1 = new centro_costo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {centro_costo_webcontrol,centro_costo_webcontrol1};

//Para ser llamado desde window.opener
window.centro_costo_webcontrol1 = centro_costo_webcontrol1;


if(centro_costo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = centro_costo_webcontrol1.onLoadWindow; 
}

//</script>