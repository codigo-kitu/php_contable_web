//<script type="text/javascript" language="javascript">



//var otro_documentoJQueryPaginaWebInteraccion= function (otro_documento_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {otro_documento_constante,otro_documento_constante1} from '../util/otro_documento_constante.js';

import {otro_documento_funcion,otro_documento_funcion1} from '../util/otro_documento_form_funcion.js';


class otro_documento_webcontrol extends GeneralEntityWebControl {
	
	otro_documento_control=null;
	otro_documento_controlInicial=null;
	otro_documento_controlAuxiliar=null;
		
	//if(otro_documento_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(otro_documento_control) {
		super();
		
		this.otro_documento_control=otro_documento_control;
	}
		
	actualizarVariablesPagina(otro_documento_control) {
		
		if(otro_documento_control.action=="index" || otro_documento_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(otro_documento_control);
			
		} 
		
		
		
	
		else if(otro_documento_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(otro_documento_control);	
		
		} else if(otro_documento_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(otro_documento_control);		
		}
	
	
		
		
		else if(otro_documento_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(otro_documento_control);
		
		} else if(otro_documento_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(otro_documento_control);
		
		} else if(otro_documento_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(otro_documento_control);
		
		} else if(otro_documento_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(otro_documento_control);
		
		} else if(otro_documento_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(otro_documento_control);
		
		} else if(otro_documento_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(otro_documento_control);		
		
		} else if(otro_documento_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(otro_documento_control);		
		
		} 
		//else if(otro_documento_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(otro_documento_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + otro_documento_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(otro_documento_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(otro_documento_control) {
		this.actualizarPaginaAccionesGenerales(otro_documento_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(otro_documento_control) {
		
		this.actualizarPaginaCargaGeneral(otro_documento_control);
		this.actualizarPaginaOrderBy(otro_documento_control);
		this.actualizarPaginaTablaDatos(otro_documento_control);
		this.actualizarPaginaCargaGeneralControles(otro_documento_control);
		//this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_documento_control);
		this.actualizarPaginaAreaBusquedas(otro_documento_control);
		this.actualizarPaginaCargaCombosFK(otro_documento_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(otro_documento_control) {
		//this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(otro_documento_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(otro_documento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_documento_control);		
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(otro_documento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_documento_control);		
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(otro_documento_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_documento_control);		
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(otro_documento_control) {
		this.actualizarPaginaCargaGeneralControles(otro_documento_control);
		this.actualizarPaginaCargaCombosFK(otro_documento_control);
		this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(otro_documento_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(otro_documento_control) {
		this.actualizarPaginaCargaGeneralControles(otro_documento_control);
		this.actualizarPaginaCargaCombosFK(otro_documento_control);
		this.actualizarPaginaFormulario(otro_documento_control);
		this.onLoadCombosDefectoFK(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(otro_documento_control) {
		//FORMULARIO
		if(otro_documento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_documento_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(otro_documento_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		
		//COMBOS FK
		if(otro_documento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_documento_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(otro_documento_control) {
		//FORMULARIO
		if(otro_documento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_documento_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(otro_documento_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);	
		
		//COMBOS FK
		if(otro_documento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_documento_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(otro_documento_control) {
		//FORMULARIO
		if(otro_documento_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_documento_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);	
		//COMBOS FK
		if(otro_documento_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_documento_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(otro_documento_control) {
		
		if(otro_documento_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(otro_documento_control);
		}
		
		if(otro_documento_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(otro_documento_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(otro_documento_control) {
		if(otro_documento_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("otro_documentoReturnGeneral",JSON.stringify(otro_documento_control.otro_documentoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(otro_documento_control) {
		if(otro_documento_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && otro_documento_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(otro_documento_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(otro_documento_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(otro_documento_control, mostrar) {
		
		if(mostrar==true) {
			otro_documento_funcion1.resaltarRestaurarDivsPagina(false,"otro_documento");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				otro_documento_funcion1.resaltarRestaurarDivMantenimiento(false,"otro_documento");
			}			
			
			otro_documento_funcion1.mostrarDivMensaje(true,otro_documento_control.strAuxiliarMensaje,otro_documento_control.strAuxiliarCssMensaje);
		
		} else {
			otro_documento_funcion1.mostrarDivMensaje(false,otro_documento_control.strAuxiliarMensaje,otro_documento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(otro_documento_control) {
		if(otro_documento_funcion1.esPaginaForm(otro_documento_constante1)==true) {
			window.opener.otro_documento_webcontrol1.actualizarPaginaTablaDatos(otro_documento_control);
		} else {
			this.actualizarPaginaTablaDatos(otro_documento_control);
		}
	}
	
	actualizarPaginaAbrirLink(otro_documento_control) {
		otro_documento_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(otro_documento_control.strAuxiliarUrlPagina);
				
		otro_documento_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(otro_documento_control.strAuxiliarTipo,otro_documento_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(otro_documento_control) {
		otro_documento_funcion1.resaltarRestaurarDivMensaje(true,otro_documento_control.strAuxiliarMensajeAlert,otro_documento_control.strAuxiliarCssMensaje);
			
		if(otro_documento_funcion1.esPaginaForm(otro_documento_constante1)==true) {
			window.opener.otro_documento_funcion1.resaltarRestaurarDivMensaje(true,otro_documento_control.strAuxiliarMensajeAlert,otro_documento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(otro_documento_control) {
		this.otro_documento_controlInicial=otro_documento_control;
			
		if(otro_documento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(otro_documento_control.strStyleDivArbol,otro_documento_control.strStyleDivContent
																,otro_documento_control.strStyleDivOpcionesBanner,otro_documento_control.strStyleDivExpandirColapsar
																,otro_documento_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(otro_documento_control) {
		this.actualizarCssBotonesPagina(otro_documento_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(otro_documento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(otro_documento_control.tiposReportes,otro_documento_control.tiposReporte
															 	,otro_documento_control.tiposPaginacion,otro_documento_control.tiposAcciones
																,otro_documento_control.tiposColumnasSelect,otro_documento_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(otro_documento_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(otro_documento_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(otro_documento_control);			
	}
	
	actualizarPaginaUsuarioInvitado(otro_documento_control) {
	
		var indexPosition=otro_documento_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=otro_documento_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(otro_documento_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(otro_documento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_archivo",otro_documento_control.strRecargarFkTipos,",")) { 
				otro_documento_webcontrol1.cargarCombosarchivosFK(otro_documento_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(otro_documento_control.strRecargarFkTiposNinguno!=null && otro_documento_control.strRecargarFkTiposNinguno!='NINGUNO' && otro_documento_control.strRecargarFkTiposNinguno!='') {
			
				if(otro_documento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_archivo",otro_documento_control.strRecargarFkTiposNinguno,",")) { 
					otro_documento_webcontrol1.cargarCombosarchivosFK(otro_documento_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaarchivoFK(otro_documento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_documento_funcion1,otro_documento_control.archivosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(otro_documento_control) {
		jQuery("#tdotro_documentoNuevo").css("display",otro_documento_control.strPermisoNuevo);
		jQuery("#trotro_documentoElementos").css("display",otro_documento_control.strVisibleTablaElementos);
		jQuery("#trotro_documentoAcciones").css("display",otro_documento_control.strVisibleTablaAcciones);
		jQuery("#trotro_documentoParametrosAcciones").css("display",otro_documento_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(otro_documento_control) {
	
		this.actualizarCssBotonesMantenimiento(otro_documento_control);
				
		if(otro_documento_control.otro_documentoActual!=null) {//form
			
			this.actualizarCamposFormulario(otro_documento_control);			
		}
						
		this.actualizarSpanMensajesCampos(otro_documento_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(otro_documento_control) {
	
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id").val(otro_documento_control.otro_documentoActual.id);
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-created_at").val(otro_documento_control.otro_documentoActual.versionRow);
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-updated_at").val(otro_documento_control.otro_documentoActual.versionRow);
		
		if(otro_documento_control.otro_documentoActual.id_archivo!=null && otro_documento_control.otro_documentoActual.id_archivo>-1){
			if(jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").val() != otro_documento_control.otro_documentoActual.id_archivo) {
				jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").val(otro_documento_control.otro_documentoActual.id_archivo).trigger("change");
			}
		} else { 
			//jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").select2("val", null);
			if(jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-nombre").val(otro_documento_control.otro_documentoActual.nombre);
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-data").val(otro_documento_control.otro_documentoActual.data);
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-campo1").val(otro_documento_control.otro_documentoActual.campo1);
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-campo2").val(otro_documento_control.otro_documentoActual.campo2);
		jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-campo3").val(otro_documento_control.otro_documentoActual.campo3);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+otro_documento_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("otro_documento","general","","form_otro_documento",formulario,"","",paraEventoTabla,idFilaTabla,otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
	}
	
	actualizarSpanMensajesCampos(otro_documento_control) {
		jQuery("#spanstrMensajeid").text(otro_documento_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(otro_documento_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(otro_documento_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_archivo").text(otro_documento_control.strMensajeid_archivo);		
		jQuery("#spanstrMensajenombre").text(otro_documento_control.strMensajenombre);		
		jQuery("#spanstrMensajedata").text(otro_documento_control.strMensajedata);		
		jQuery("#spanstrMensajecampo1").text(otro_documento_control.strMensajecampo1);		
		jQuery("#spanstrMensajecampo2").text(otro_documento_control.strMensajecampo2);		
		jQuery("#spanstrMensajecampo3").text(otro_documento_control.strMensajecampo3);		
	}
	
	actualizarCssBotonesMantenimiento(otro_documento_control) {
		jQuery("#tdbtnNuevootro_documento").css("visibility",otro_documento_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevootro_documento").css("display",otro_documento_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarotro_documento").css("visibility",otro_documento_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarotro_documento").css("display",otro_documento_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarotro_documento").css("visibility",otro_documento_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarotro_documento").css("display",otro_documento_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarotro_documento").css("visibility",otro_documento_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosotro_documento").css("visibility",otro_documento_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosotro_documento").css("display",otro_documento_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarotro_documento").css("visibility",otro_documento_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarotro_documento").css("visibility",otro_documento_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarotro_documento").css("visibility",otro_documento_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosarchivosFK(otro_documento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo",otro_documento_control.archivosFK);

		if(otro_documento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_documento_control.idFilaTablaActual+"_3",otro_documento_control.archivosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo-cmbid_archivo",otro_documento_control.archivosFK);

	};

	
	
	registrarComboActionChangeCombosarchivosFK(otro_documento_control) {

	};

	
	
	setDefectoValorCombosarchivosFK(otro_documento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_documento_control.idarchivoDefaultFK>-1 && jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").val() != otro_documento_control.idarchivoDefaultFK) {
				jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").val(otro_documento_control.idarchivoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo-cmbid_archivo").val(otro_documento_control.idarchivoDefaultForeignKey).trigger("change");
			if(jQuery("#"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo-cmbid_archivo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo-cmbid_archivo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//otro_documento_control
		
	
	}
	
	onLoadCombosDefectoFK(otro_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(otro_documento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_archivo",otro_documento_control.strRecargarFkTipos,",")) { 
				otro_documento_webcontrol1.setDefectoValorCombosarchivosFK(otro_documento_control);
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
	onLoadCombosEventosFK(otro_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(otro_documento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_archivo",otro_documento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_documento_webcontrol1.registrarComboActionChangeCombosarchivosFK(otro_documento_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(otro_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(otro_documento_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(otro_documento_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_documento_funcion1.validarFormularioJQuery(otro_documento_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("otro_documento");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("otro_documento");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(otro_documento_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,"otro_documento");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("archivo","id_archivo","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo_img_busqueda").click(function(){
				otro_documento_webcontrol1.abrirBusquedaParaarchivo("id_archivo");
				//alert(jQuery('#form-id_archivo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(otro_documento_control) {
		
		
		
		if(otro_documento_control.strPermisoActualizar!=null) {
			jQuery("#tdotro_documentoActualizarToolBar").css("display",otro_documento_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdotro_documentoEliminarToolBar").css("display",otro_documento_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trotro_documentoElementos").css("display",otro_documento_control.strVisibleTablaElementos);
		
		jQuery("#trotro_documentoAcciones").css("display",otro_documento_control.strVisibleTablaAcciones);
		jQuery("#trotro_documentoParametrosAcciones").css("display",otro_documento_control.strVisibleTablaAcciones);
		
		jQuery("#tdotro_documentoCerrarPagina").css("display",otro_documento_control.strPermisoPopup);		
		jQuery("#tdotro_documentoCerrarPaginaToolBar").css("display",otro_documento_control.strPermisoPopup);
		//jQuery("#trotro_documentoAccionesRelaciones").css("display",otro_documento_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=otro_documento_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_documento_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + otro_documento_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Otros Documentoses";
		sTituloBanner+=" - " + otro_documento_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_documento_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdotro_documentoRelacionesToolBar").css("display",otro_documento_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosotro_documento").css("display",otro_documento_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		otro_documento_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		otro_documento_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		otro_documento_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		otro_documento_webcontrol1.registrarEventosControles();
		
		if(otro_documento_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(otro_documento_constante1.STR_ES_RELACIONADO=="false") {
			otro_documento_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(otro_documento_constante1.STR_ES_RELACIONES=="true") {
			if(otro_documento_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_documento_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(otro_documento_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(otro_documento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(otro_documento_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(otro_documento_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
						//otro_documento_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(otro_documento_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(otro_documento_constante1.BIG_ID_ACTUAL,"otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
						//otro_documento_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			otro_documento_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);	
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

var otro_documento_webcontrol1 = new otro_documento_webcontrol();

//Para ser llamado desde otro archivo (import)
export {otro_documento_webcontrol,otro_documento_webcontrol1};

//Para ser llamado desde window.opener
window.otro_documento_webcontrol1 = otro_documento_webcontrol1;


if(otro_documento_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = otro_documento_webcontrol1.onLoadWindow; 
}

//</script>