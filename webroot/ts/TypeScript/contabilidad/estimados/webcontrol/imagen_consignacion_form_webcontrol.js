//<script type="text/javascript" language="javascript">



//var imagen_consignacionJQueryPaginaWebInteraccion= function (imagen_consignacion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_consignacion_constante,imagen_consignacion_constante1} from '../util/imagen_consignacion_constante.js';

import {imagen_consignacion_funcion,imagen_consignacion_funcion1} from '../util/imagen_consignacion_form_funcion.js';


class imagen_consignacion_webcontrol extends GeneralEntityWebControl {
	
	imagen_consignacion_control=null;
	imagen_consignacion_controlInicial=null;
	imagen_consignacion_controlAuxiliar=null;
		
	//if(imagen_consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_consignacion_control) {
		super();
		
		this.imagen_consignacion_control=imagen_consignacion_control;
	}
		
	actualizarVariablesPagina(imagen_consignacion_control) {
		
		if(imagen_consignacion_control.action=="index" || imagen_consignacion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_consignacion_control);
			
		} 
		
		
		
	
		else if(imagen_consignacion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_consignacion_control);	
		
		} else if(imagen_consignacion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_consignacion_control);		
		}
	
	
		
		
		else if(imagen_consignacion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_consignacion_control);
		
		} else if(imagen_consignacion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_consignacion_control);		
		
		} else if(imagen_consignacion_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_consignacion_control);		
		
		} 
		//else if(imagen_consignacion_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_consignacion_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_consignacion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_consignacion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_consignacion_control) {
		this.actualizarPaginaAccionesGenerales(imagen_consignacion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_consignacion_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_consignacion_control);
		this.actualizarPaginaOrderBy(imagen_consignacion_control);
		this.actualizarPaginaTablaDatos(imagen_consignacion_control);
		this.actualizarPaginaCargaGeneralControles(imagen_consignacion_control);
		//this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_consignacion_control);
		this.actualizarPaginaAreaBusquedas(imagen_consignacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_consignacion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_consignacion_control) {
		//this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_consignacion_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_consignacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_consignacion_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_consignacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_consignacion_control);
		this.actualizarPaginaFormulario(imagen_consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(imagen_consignacion_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_consignacion_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_consignacion_control);
		this.actualizarPaginaCargaCombosFK(imagen_consignacion_control);
		this.actualizarPaginaFormulario(imagen_consignacion_control);
		this.onLoadCombosDefectoFK(imagen_consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_consignacion_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_consignacion_control) {
		//FORMULARIO
		if(imagen_consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_consignacion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_consignacion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);		
		
		//COMBOS FK
		if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_consignacion_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_consignacion_control) {
		//FORMULARIO
		if(imagen_consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_consignacion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_consignacion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);	
		
		//COMBOS FK
		if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_consignacion_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_consignacion_control) {
		//FORMULARIO
		if(imagen_consignacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_consignacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control);	
		//COMBOS FK
		if(imagen_consignacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_consignacion_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_consignacion_control) {
		
		if(imagen_consignacion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_consignacion_control);
		}
		
		if(imagen_consignacion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_consignacion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_consignacion_control) {
		if(imagen_consignacion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_consignacionReturnGeneral",JSON.stringify(imagen_consignacion_control.imagen_consignacionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_consignacion_control) {
		if(imagen_consignacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_consignacion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_consignacion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_consignacion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_consignacion_control, mostrar) {
		
		if(mostrar==true) {
			imagen_consignacion_funcion1.resaltarRestaurarDivsPagina(false,"imagen_consignacion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_consignacion_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_consignacion");
			}			
			
			imagen_consignacion_funcion1.mostrarDivMensaje(true,imagen_consignacion_control.strAuxiliarMensaje,imagen_consignacion_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_consignacion_funcion1.mostrarDivMensaje(false,imagen_consignacion_control.strAuxiliarMensaje,imagen_consignacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_consignacion_control) {
		if(imagen_consignacion_funcion1.esPaginaForm(imagen_consignacion_constante1)==true) {
			window.opener.imagen_consignacion_webcontrol1.actualizarPaginaTablaDatos(imagen_consignacion_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_consignacion_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_consignacion_control) {
		imagen_consignacion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_consignacion_control.strAuxiliarUrlPagina);
				
		imagen_consignacion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_consignacion_control.strAuxiliarTipo,imagen_consignacion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_consignacion_control) {
		imagen_consignacion_funcion1.resaltarRestaurarDivMensaje(true,imagen_consignacion_control.strAuxiliarMensajeAlert,imagen_consignacion_control.strAuxiliarCssMensaje);
			
		if(imagen_consignacion_funcion1.esPaginaForm(imagen_consignacion_constante1)==true) {
			window.opener.imagen_consignacion_funcion1.resaltarRestaurarDivMensaje(true,imagen_consignacion_control.strAuxiliarMensajeAlert,imagen_consignacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_consignacion_control) {
		this.imagen_consignacion_controlInicial=imagen_consignacion_control;
			
		if(imagen_consignacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_consignacion_control.strStyleDivArbol,imagen_consignacion_control.strStyleDivContent
																,imagen_consignacion_control.strStyleDivOpcionesBanner,imagen_consignacion_control.strStyleDivExpandirColapsar
																,imagen_consignacion_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_consignacion_control) {
		this.actualizarCssBotonesPagina(imagen_consignacion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_consignacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_consignacion_control.tiposReportes,imagen_consignacion_control.tiposReporte
															 	,imagen_consignacion_control.tiposPaginacion,imagen_consignacion_control.tiposAcciones
																,imagen_consignacion_control.tiposColumnasSelect,imagen_consignacion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_consignacion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_consignacion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_consignacion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_consignacion_control) {
	
		var indexPosition=imagen_consignacion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_consignacion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_consignacion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_consignacion",imagen_consignacion_control.strRecargarFkTipos,",")) { 
				imagen_consignacion_webcontrol1.cargarCombosconsignacionsFK(imagen_consignacion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_consignacion_control.strRecargarFkTiposNinguno!=null && imagen_consignacion_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_consignacion_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_consignacion",imagen_consignacion_control.strRecargarFkTiposNinguno,",")) { 
					imagen_consignacion_webcontrol1.cargarCombosconsignacionsFK(imagen_consignacion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaconsignacionFK(imagen_consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_consignacion_funcion1,imagen_consignacion_control.consignacionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(imagen_consignacion_control) {
		jQuery("#tdimagen_consignacionNuevo").css("display",imagen_consignacion_control.strPermisoNuevo);
		jQuery("#trimagen_consignacionElementos").css("display",imagen_consignacion_control.strVisibleTablaElementos);
		jQuery("#trimagen_consignacionAcciones").css("display",imagen_consignacion_control.strVisibleTablaAcciones);
		jQuery("#trimagen_consignacionParametrosAcciones").css("display",imagen_consignacion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_consignacion_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_consignacion_control);
				
		if(imagen_consignacion_control.imagen_consignacionActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_consignacion_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_consignacion_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_consignacion_control) {
	
		jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id").val(imagen_consignacion_control.imagen_consignacionActual.id);
		jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-version_row").val(imagen_consignacion_control.imagen_consignacionActual.versionRow);
		
		if(imagen_consignacion_control.imagen_consignacionActual.id_consignacion!=null && imagen_consignacion_control.imagen_consignacionActual.id_consignacion>-1){
			if(jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion").val() != imagen_consignacion_control.imagen_consignacionActual.id_consignacion) {
				jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion").val(imagen_consignacion_control.imagen_consignacionActual.id_consignacion).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion").select2("val", null);
			if(jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-imagen").val(imagen_consignacion_control.imagen_consignacionActual.imagen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_consignacion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_consignacion","estimados","","form_imagen_consignacion",formulario,"","",paraEventoTabla,idFilaTabla,imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
	}
	
	actualizarSpanMensajesCampos(imagen_consignacion_control) {
		jQuery("#spanstrMensajeid").text(imagen_consignacion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_consignacion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_consignacion").text(imagen_consignacion_control.strMensajeid_consignacion);		
		jQuery("#spanstrMensajeimagen").text(imagen_consignacion_control.strMensajeimagen);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_consignacion_control) {
		jQuery("#tdbtnNuevoimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_consignacion").css("display",imagen_consignacion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_consignacion").css("display",imagen_consignacion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_consignacion").css("display",imagen_consignacion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_consignacion").css("display",imagen_consignacion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_consignacion").css("visibility",imagen_consignacion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosconsignacionsFK(imagen_consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion",imagen_consignacion_control.consignacionsFK);

		if(imagen_consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_consignacion_control.idFilaTablaActual+"_2",imagen_consignacion_control.consignacionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_consignacion_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion",imagen_consignacion_control.consignacionsFK);

	};

	
	
	registrarComboActionChangeCombosconsignacionsFK(imagen_consignacion_control) {

	};

	
	
	setDefectoValorCombosconsignacionsFK(imagen_consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_consignacion_control.idconsignacionDefaultFK>-1 && jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion").val() != imagen_consignacion_control.idconsignacionDefaultFK) {
				jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion").val(imagen_consignacion_control.idconsignacionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_consignacion_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion").val(imagen_consignacion_control.idconsignacionDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_consignacion_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_consignacion_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_consignacion_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_consignacion",imagen_consignacion_control.strRecargarFkTipos,",")) { 
				imagen_consignacion_webcontrol1.setDefectoValorCombosconsignacionsFK(imagen_consignacion_control);
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
	onLoadCombosEventosFK(imagen_consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_consignacion",imagen_consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_consignacion_webcontrol1.registrarComboActionChangeCombosconsignacionsFK(imagen_consignacion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(imagen_consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_consignacion_funcion1.validarFormularioJQuery(imagen_consignacion_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_consignacion");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_consignacion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_consignacion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,"imagen_consignacion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("consignacion","id_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_consignacion_constante1.STR_SUFIJO+"-id_consignacion_img_busqueda").click(function(){
				imagen_consignacion_webcontrol1.abrirBusquedaParaconsignacion("id_consignacion");
				//alert(jQuery('#form-id_consignacion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_consignacion_control) {
		
		
		
		if(imagen_consignacion_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_consignacionActualizarToolBar").css("display",imagen_consignacion_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdimagen_consignacionEliminarToolBar").css("display",imagen_consignacion_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trimagen_consignacionElementos").css("display",imagen_consignacion_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_consignacionAcciones").css("display",imagen_consignacion_control.strVisibleTablaAcciones);
		jQuery("#trimagen_consignacionParametrosAcciones").css("display",imagen_consignacion_control.strVisibleTablaAcciones);
		
		jQuery("#tdimagen_consignacionCerrarPagina").css("display",imagen_consignacion_control.strPermisoPopup);		
		jQuery("#tdimagen_consignacionCerrarPaginaToolBar").css("display",imagen_consignacion_control.strPermisoPopup);
		//jQuery("#trimagen_consignacionAccionesRelaciones").css("display",imagen_consignacion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_consignacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_consignacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_consignacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Consignaciones";
		sTituloBanner+=" - " + imagen_consignacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_consignacion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_consignacionRelacionesToolBar").css("display",imagen_consignacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_consignacion").css("display",imagen_consignacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_consignacion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_consignacion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_consignacion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_consignacion_webcontrol1.registrarEventosControles();
		
		if(imagen_consignacion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_consignacion_constante1.STR_ES_RELACIONADO=="false") {
			imagen_consignacion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_consignacion_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_consignacion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_consignacion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_consignacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(imagen_consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(imagen_consignacion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
						//imagen_consignacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(imagen_consignacion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_consignacion_constante1.BIG_ID_ACTUAL,"imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);
						//imagen_consignacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			imagen_consignacion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_consignacion","estimados","",imagen_consignacion_funcion1,imagen_consignacion_webcontrol1,imagen_consignacion_constante1);	
	}
}

var imagen_consignacion_webcontrol1 = new imagen_consignacion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_consignacion_webcontrol,imagen_consignacion_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_consignacion_webcontrol1 = imagen_consignacion_webcontrol1;


if(imagen_consignacion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_consignacion_webcontrol1.onLoadWindow; 
}

//</script>