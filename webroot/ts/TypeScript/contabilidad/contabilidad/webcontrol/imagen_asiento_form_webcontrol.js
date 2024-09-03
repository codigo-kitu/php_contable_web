//<script type="text/javascript" language="javascript">



//var imagen_asientoJQueryPaginaWebInteraccion= function (imagen_asiento_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_asiento_constante,imagen_asiento_constante1} from '../util/imagen_asiento_constante.js';

import {imagen_asiento_funcion,imagen_asiento_funcion1} from '../util/imagen_asiento_form_funcion.js';


class imagen_asiento_webcontrol extends GeneralEntityWebControl {
	
	imagen_asiento_control=null;
	imagen_asiento_controlInicial=null;
	imagen_asiento_controlAuxiliar=null;
		
	//if(imagen_asiento_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_asiento_control) {
		super();
		
		this.imagen_asiento_control=imagen_asiento_control;
	}
		
	actualizarVariablesPagina(imagen_asiento_control) {
		
		if(imagen_asiento_control.action=="index" || imagen_asiento_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_asiento_control);
			
		} 
		
		
		
	
		else if(imagen_asiento_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_asiento_control);	
		
		} else if(imagen_asiento_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_asiento_control);		
		}
	
	
		
		
		else if(imagen_asiento_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_asiento_control);		
		
		} else if(imagen_asiento_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_asiento_control);		
		
		} 
		//else if(imagen_asiento_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_asiento_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_asiento_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_asiento_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_asiento_control) {
		this.actualizarPaginaAccionesGenerales(imagen_asiento_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_asiento_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_asiento_control);
		this.actualizarPaginaOrderBy(imagen_asiento_control);
		this.actualizarPaginaTablaDatos(imagen_asiento_control);
		this.actualizarPaginaCargaGeneralControles(imagen_asiento_control);
		//this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_asiento_control);
		this.actualizarPaginaAreaBusquedas(imagen_asiento_control);
		this.actualizarPaginaCargaCombosFK(imagen_asiento_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_asiento_control) {
		//this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_asiento_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(imagen_asiento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_asiento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_asiento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_asiento_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_asiento_control);
		this.actualizarPaginaCargaCombosFK(imagen_asiento_control);
		this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(imagen_asiento_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_asiento_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_asiento_control);
		this.actualizarPaginaCargaCombosFK(imagen_asiento_control);
		this.actualizarPaginaFormulario(imagen_asiento_control);
		this.onLoadCombosDefectoFK(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_asiento_control) {
		//FORMULARIO
		if(imagen_asiento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_asiento_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_asiento_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		
		//COMBOS FK
		if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_asiento_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_asiento_control) {
		//FORMULARIO
		if(imagen_asiento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_asiento_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_asiento_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);	
		
		//COMBOS FK
		if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_asiento_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_asiento_control) {
		//FORMULARIO
		if(imagen_asiento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_asiento_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);	
		//COMBOS FK
		if(imagen_asiento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_asiento_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_asiento_control) {
		
		if(imagen_asiento_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_asiento_control);
		}
		
		if(imagen_asiento_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_asiento_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_asiento_control) {
		if(imagen_asiento_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_asientoReturnGeneral",JSON.stringify(imagen_asiento_control.imagen_asientoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control) {
		if(imagen_asiento_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_asiento_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_asiento_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_asiento_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_asiento_control, mostrar) {
		
		if(mostrar==true) {
			imagen_asiento_funcion1.resaltarRestaurarDivsPagina(false,"imagen_asiento");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_asiento_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_asiento");
			}			
			
			imagen_asiento_funcion1.mostrarDivMensaje(true,imagen_asiento_control.strAuxiliarMensaje,imagen_asiento_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_asiento_funcion1.mostrarDivMensaje(false,imagen_asiento_control.strAuxiliarMensaje,imagen_asiento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_asiento_control) {
		if(imagen_asiento_funcion1.esPaginaForm(imagen_asiento_constante1)==true) {
			window.opener.imagen_asiento_webcontrol1.actualizarPaginaTablaDatos(imagen_asiento_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_asiento_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_asiento_control) {
		imagen_asiento_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_asiento_control.strAuxiliarUrlPagina);
				
		imagen_asiento_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_asiento_control.strAuxiliarTipo,imagen_asiento_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_asiento_control) {
		imagen_asiento_funcion1.resaltarRestaurarDivMensaje(true,imagen_asiento_control.strAuxiliarMensajeAlert,imagen_asiento_control.strAuxiliarCssMensaje);
			
		if(imagen_asiento_funcion1.esPaginaForm(imagen_asiento_constante1)==true) {
			window.opener.imagen_asiento_funcion1.resaltarRestaurarDivMensaje(true,imagen_asiento_control.strAuxiliarMensajeAlert,imagen_asiento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_asiento_control) {
		this.imagen_asiento_controlInicial=imagen_asiento_control;
			
		if(imagen_asiento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_asiento_control.strStyleDivArbol,imagen_asiento_control.strStyleDivContent
																,imagen_asiento_control.strStyleDivOpcionesBanner,imagen_asiento_control.strStyleDivExpandirColapsar
																,imagen_asiento_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_asiento_control) {
		this.actualizarCssBotonesPagina(imagen_asiento_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_asiento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_asiento_control.tiposReportes,imagen_asiento_control.tiposReporte
															 	,imagen_asiento_control.tiposPaginacion,imagen_asiento_control.tiposAcciones
																,imagen_asiento_control.tiposColumnasSelect,imagen_asiento_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_asiento_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_asiento_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_asiento_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_asiento_control) {
	
		var indexPosition=imagen_asiento_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_asiento_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_asiento_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",imagen_asiento_control.strRecargarFkTipos,",")) { 
				imagen_asiento_webcontrol1.cargarCombosasientosFK(imagen_asiento_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_asiento_control.strRecargarFkTiposNinguno!=null && imagen_asiento_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_asiento_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",imagen_asiento_control.strRecargarFkTiposNinguno,",")) { 
					imagen_asiento_webcontrol1.cargarCombosasientosFK(imagen_asiento_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaasientoFK(imagen_asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_asiento_funcion1,imagen_asiento_control.asientosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(imagen_asiento_control) {
		jQuery("#tdimagen_asientoNuevo").css("display",imagen_asiento_control.strPermisoNuevo);
		jQuery("#trimagen_asientoElementos").css("display",imagen_asiento_control.strVisibleTablaElementos);
		jQuery("#trimagen_asientoAcciones").css("display",imagen_asiento_control.strVisibleTablaAcciones);
		jQuery("#trimagen_asientoParametrosAcciones").css("display",imagen_asiento_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_asiento_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_asiento_control);
				
		if(imagen_asiento_control.imagen_asientoActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_asiento_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_asiento_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_asiento_control) {
	
		jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id").val(imagen_asiento_control.imagen_asientoActual.id);
		jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-version_row").val(imagen_asiento_control.imagen_asientoActual.versionRow);
		
		if(imagen_asiento_control.imagen_asientoActual.id_asiento!=null && imagen_asiento_control.imagen_asientoActual.id_asiento>-1){
			if(jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").val() != imagen_asiento_control.imagen_asientoActual.id_asiento) {
				jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").val(imagen_asiento_control.imagen_asientoActual.id_asiento).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").select2("val", null);
			if(jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-imagen").val(imagen_asiento_control.imagen_asientoActual.imagen);
		jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-nro_asiento").val(imagen_asiento_control.imagen_asientoActual.nro_asiento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_asiento_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_asiento","contabilidad","","form_imagen_asiento",formulario,"","",paraEventoTabla,idFilaTabla,imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
	}
	
	actualizarSpanMensajesCampos(imagen_asiento_control) {
		jQuery("#spanstrMensajeid").text(imagen_asiento_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(imagen_asiento_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_asiento").text(imagen_asiento_control.strMensajeid_asiento);		
		jQuery("#spanstrMensajeimagen").text(imagen_asiento_control.strMensajeimagen);		
		jQuery("#spanstrMensajenro_asiento").text(imagen_asiento_control.strMensajenro_asiento);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_asiento_control) {
		jQuery("#tdbtnNuevoimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_asiento").css("display",imagen_asiento_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_asiento").css("display",imagen_asiento_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_asiento").css("display",imagen_asiento_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_asiento").css("display",imagen_asiento_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_asiento").css("visibility",imagen_asiento_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosasientosFK(imagen_asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento",imagen_asiento_control.asientosFK);

		if(imagen_asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_asiento_control.idFilaTablaActual+"_2",imagen_asiento_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",imagen_asiento_control.asientosFK);

	};

	
	
	registrarComboActionChangeCombosasientosFK(imagen_asiento_control) {

	};

	
	
	setDefectoValorCombosasientosFK(imagen_asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_asiento_control.idasientoDefaultFK>-1 && jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").val() != imagen_asiento_control.idasientoDefaultFK) {
				jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").val(imagen_asiento_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(imagen_asiento_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_asiento_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_asiento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_asiento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",imagen_asiento_control.strRecargarFkTipos,",")) { 
				imagen_asiento_webcontrol1.setDefectoValorCombosasientosFK(imagen_asiento_control);
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
	onLoadCombosEventosFK(imagen_asiento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_asiento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",imagen_asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_asiento_webcontrol1.registrarComboActionChangeCombosasientosFK(imagen_asiento_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_asiento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_asiento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_asiento_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(imagen_asiento_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_asiento_funcion1.validarFormularioJQuery(imagen_asiento_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_asiento");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_asiento");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_asiento_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,"imagen_asiento");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				imagen_asiento_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_asiento_control) {
		
		
		
		if(imagen_asiento_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_asientoActualizarToolBar").css("display",imagen_asiento_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdimagen_asientoEliminarToolBar").css("display",imagen_asiento_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trimagen_asientoElementos").css("display",imagen_asiento_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_asientoAcciones").css("display",imagen_asiento_control.strVisibleTablaAcciones);
		jQuery("#trimagen_asientoParametrosAcciones").css("display",imagen_asiento_control.strVisibleTablaAcciones);
		
		jQuery("#tdimagen_asientoCerrarPagina").css("display",imagen_asiento_control.strPermisoPopup);		
		jQuery("#tdimagen_asientoCerrarPaginaToolBar").css("display",imagen_asiento_control.strPermisoPopup);
		//jQuery("#trimagen_asientoAccionesRelaciones").css("display",imagen_asiento_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_asiento_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_asiento_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_asiento_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Asientoses";
		sTituloBanner+=" - " + imagen_asiento_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_asiento_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_asientoRelacionesToolBar").css("display",imagen_asiento_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_asiento").css("display",imagen_asiento_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_asiento_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_asiento_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_asiento_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_asiento_webcontrol1.registrarEventosControles();
		
		if(imagen_asiento_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_asiento_constante1.STR_ES_RELACIONADO=="false") {
			imagen_asiento_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_asiento_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_asiento_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_asiento_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_asiento_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_asiento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(imagen_asiento_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(imagen_asiento_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
						//imagen_asiento_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(imagen_asiento_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_asiento_constante1.BIG_ID_ACTUAL,"imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
						//imagen_asiento_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			imagen_asiento_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);	
	}
}

var imagen_asiento_webcontrol1 = new imagen_asiento_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_asiento_webcontrol,imagen_asiento_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_asiento_webcontrol1 = imagen_asiento_webcontrol1;


if(imagen_asiento_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_asiento_webcontrol1.onLoadWindow; 
}

//</script>