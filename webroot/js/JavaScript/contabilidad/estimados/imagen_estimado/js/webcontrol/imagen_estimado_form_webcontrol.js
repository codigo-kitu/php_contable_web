//<script type="text/javascript" language="javascript">



//var imagen_estimadoJQueryPaginaWebInteraccion= function (imagen_estimado_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_estimado_constante,imagen_estimado_constante1} from '../util/imagen_estimado_constante.js';

import {imagen_estimado_funcion,imagen_estimado_funcion1} from '../util/imagen_estimado_form_funcion.js';


class imagen_estimado_webcontrol extends GeneralEntityWebControl {
	
	imagen_estimado_control=null;
	imagen_estimado_controlInicial=null;
	imagen_estimado_controlAuxiliar=null;
		
	//if(imagen_estimado_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_estimado_control) {
		super();
		
		this.imagen_estimado_control=imagen_estimado_control;
	}
		
	actualizarVariablesPagina(imagen_estimado_control) {
		
		if(imagen_estimado_control.action=="index" || imagen_estimado_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_estimado_control);
			
		} 
		
		
		
	
		else if(imagen_estimado_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_estimado_control);	
		
		} else if(imagen_estimado_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_estimado_control);		
		}
	
	
		
		
		else if(imagen_estimado_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_estimado_control);		
		
		} else if(imagen_estimado_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_estimado_control);		
		
		} 
		//else if(imagen_estimado_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_estimado_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_estimado_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_estimado_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_estimado_control) {
		this.actualizarPaginaAccionesGenerales(imagen_estimado_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_estimado_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_estimado_control);
		this.actualizarPaginaOrderBy(imagen_estimado_control);
		this.actualizarPaginaTablaDatos(imagen_estimado_control);
		this.actualizarPaginaCargaGeneralControles(imagen_estimado_control);
		//this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_estimado_control);
		this.actualizarPaginaAreaBusquedas(imagen_estimado_control);
		this.actualizarPaginaCargaCombosFK(imagen_estimado_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_estimado_control) {
		//this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_estimado_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(imagen_estimado_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_estimado_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_estimado_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_estimado_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_estimado_control);
		this.actualizarPaginaCargaCombosFK(imagen_estimado_control);
		this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(imagen_estimado_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_estimado_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_estimado_control);
		this.actualizarPaginaCargaCombosFK(imagen_estimado_control);
		this.actualizarPaginaFormulario(imagen_estimado_control);
		this.onLoadCombosDefectoFK(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_estimado_control) {
		//FORMULARIO
		if(imagen_estimado_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_estimado_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_estimado_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		
		//COMBOS FK
		if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_estimado_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_estimado_control) {
		//FORMULARIO
		if(imagen_estimado_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_estimado_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_estimado_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);	
		
		//COMBOS FK
		if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_estimado_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_estimado_control) {
		//FORMULARIO
		if(imagen_estimado_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_estimado_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);	
		//COMBOS FK
		if(imagen_estimado_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_estimado_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_estimado_control) {
		
		if(imagen_estimado_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_estimado_control);
		}
		
		if(imagen_estimado_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_estimado_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_estimado_control) {
		if(imagen_estimado_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_estimadoReturnGeneral",JSON.stringify(imagen_estimado_control.imagen_estimadoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control) {
		if(imagen_estimado_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_estimado_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_estimado_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_estimado_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_estimado_control, mostrar) {
		
		if(mostrar==true) {
			imagen_estimado_funcion1.resaltarRestaurarDivsPagina(false,"imagen_estimado");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_estimado_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_estimado");
			}			
			
			imagen_estimado_funcion1.mostrarDivMensaje(true,imagen_estimado_control.strAuxiliarMensaje,imagen_estimado_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_estimado_funcion1.mostrarDivMensaje(false,imagen_estimado_control.strAuxiliarMensaje,imagen_estimado_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_estimado_control) {
		if(imagen_estimado_funcion1.esPaginaForm(imagen_estimado_constante1)==true) {
			window.opener.imagen_estimado_webcontrol1.actualizarPaginaTablaDatos(imagen_estimado_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_estimado_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_estimado_control) {
		imagen_estimado_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_estimado_control.strAuxiliarUrlPagina);
				
		imagen_estimado_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_estimado_control.strAuxiliarTipo,imagen_estimado_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_estimado_control) {
		imagen_estimado_funcion1.resaltarRestaurarDivMensaje(true,imagen_estimado_control.strAuxiliarMensajeAlert,imagen_estimado_control.strAuxiliarCssMensaje);
			
		if(imagen_estimado_funcion1.esPaginaForm(imagen_estimado_constante1)==true) {
			window.opener.imagen_estimado_funcion1.resaltarRestaurarDivMensaje(true,imagen_estimado_control.strAuxiliarMensajeAlert,imagen_estimado_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_estimado_control) {
		this.imagen_estimado_controlInicial=imagen_estimado_control;
			
		if(imagen_estimado_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_estimado_control.strStyleDivArbol,imagen_estimado_control.strStyleDivContent
																,imagen_estimado_control.strStyleDivOpcionesBanner,imagen_estimado_control.strStyleDivExpandirColapsar
																,imagen_estimado_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_estimado_control) {
		this.actualizarCssBotonesPagina(imagen_estimado_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_estimado_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_estimado_control.tiposReportes,imagen_estimado_control.tiposReporte
															 	,imagen_estimado_control.tiposPaginacion,imagen_estimado_control.tiposAcciones
																,imagen_estimado_control.tiposColumnasSelect,imagen_estimado_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_estimado_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_estimado_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_estimado_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_estimado_control) {
	
		var indexPosition=imagen_estimado_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_estimado_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_estimado_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",imagen_estimado_control.strRecargarFkTipos,",")) { 
				imagen_estimado_webcontrol1.cargarCombosestimadosFK(imagen_estimado_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_estimado_control.strRecargarFkTiposNinguno!=null && imagen_estimado_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_estimado_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estimado",imagen_estimado_control.strRecargarFkTiposNinguno,",")) { 
					imagen_estimado_webcontrol1.cargarCombosestimadosFK(imagen_estimado_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaestimadoFK(imagen_estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_estimado_funcion1,imagen_estimado_control.estimadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(imagen_estimado_control) {
		jQuery("#tdimagen_estimadoNuevo").css("display",imagen_estimado_control.strPermisoNuevo);
		jQuery("#trimagen_estimadoElementos").css("display",imagen_estimado_control.strVisibleTablaElementos);
		jQuery("#trimagen_estimadoAcciones").css("display",imagen_estimado_control.strVisibleTablaAcciones);
		jQuery("#trimagen_estimadoParametrosAcciones").css("display",imagen_estimado_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_estimado_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_estimado_control);
				
		if(imagen_estimado_control.imagen_estimadoActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_estimado_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_estimado_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_estimado_control) {
	
		jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id").val(imagen_estimado_control.imagen_estimadoActual.id);
		jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-created_at").val(imagen_estimado_control.imagen_estimadoActual.versionRow);
		jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-updated_at").val(imagen_estimado_control.imagen_estimadoActual.versionRow);
		
		if(imagen_estimado_control.imagen_estimadoActual.id_estimado!=null && imagen_estimado_control.imagen_estimadoActual.id_estimado>-1){
			if(jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").val() != imagen_estimado_control.imagen_estimadoActual.id_estimado) {
				jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").val(imagen_estimado_control.imagen_estimadoActual.id_estimado).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").select2("val", null);
			if(jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-imagen").val(imagen_estimado_control.imagen_estimadoActual.imagen);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_estimado_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_estimado","estimados","","form_imagen_estimado",formulario,"","",paraEventoTabla,idFilaTabla,imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
	}
	
	actualizarSpanMensajesCampos(imagen_estimado_control) {
		jQuery("#spanstrMensajeid").text(imagen_estimado_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(imagen_estimado_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(imagen_estimado_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_estimado").text(imagen_estimado_control.strMensajeid_estimado);		
		jQuery("#spanstrMensajeimagen").text(imagen_estimado_control.strMensajeimagen);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_estimado_control) {
		jQuery("#tdbtnNuevoimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_estimado").css("display",imagen_estimado_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_estimado").css("display",imagen_estimado_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_estimado").css("display",imagen_estimado_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_estimado").css("display",imagen_estimado_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_estimado").css("visibility",imagen_estimado_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosestimadosFK(imagen_estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado",imagen_estimado_control.estimadosFK);

		if(imagen_estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_estimado_control.idFilaTablaActual+"_3",imagen_estimado_control.estimadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado",imagen_estimado_control.estimadosFK);

	};

	
	
	registrarComboActionChangeCombosestimadosFK(imagen_estimado_control) {

	};

	
	
	setDefectoValorCombosestimadosFK(imagen_estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_estimado_control.idestimadoDefaultFK>-1 && jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").val() != imagen_estimado_control.idestimadoDefaultFK) {
				jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").val(imagen_estimado_control.idestimadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val(imagen_estimado_control.idestimadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_estimado_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",imagen_estimado_control.strRecargarFkTipos,",")) { 
				imagen_estimado_webcontrol1.setDefectoValorCombosestimadosFK(imagen_estimado_control);
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
	onLoadCombosEventosFK(imagen_estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",imagen_estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_estimado_webcontrol1.registrarComboActionChangeCombosestimadosFK(imagen_estimado_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_estimado_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(imagen_estimado_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_estimado_funcion1.validarFormularioJQuery(imagen_estimado_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_estimado");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_estimado");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_estimado_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,"imagen_estimado");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estimado","id_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado_img_busqueda").click(function(){
				imagen_estimado_webcontrol1.abrirBusquedaParaestimado("id_estimado");
				//alert(jQuery('#form-id_estimado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_estimado_control) {
		
		
		
		if(imagen_estimado_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_estimadoActualizarToolBar").css("display",imagen_estimado_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdimagen_estimadoEliminarToolBar").css("display",imagen_estimado_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trimagen_estimadoElementos").css("display",imagen_estimado_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_estimadoAcciones").css("display",imagen_estimado_control.strVisibleTablaAcciones);
		jQuery("#trimagen_estimadoParametrosAcciones").css("display",imagen_estimado_control.strVisibleTablaAcciones);
		
		jQuery("#tdimagen_estimadoCerrarPagina").css("display",imagen_estimado_control.strPermisoPopup);		
		jQuery("#tdimagen_estimadoCerrarPaginaToolBar").css("display",imagen_estimado_control.strPermisoPopup);
		//jQuery("#trimagen_estimadoAccionesRelaciones").css("display",imagen_estimado_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_estimado_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_estimado_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_estimado_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Estimados";
		sTituloBanner+=" - " + imagen_estimado_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_estimado_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_estimadoRelacionesToolBar").css("display",imagen_estimado_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_estimado").css("display",imagen_estimado_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_estimado_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_estimado_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_estimado_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_estimado_webcontrol1.registrarEventosControles();
		
		if(imagen_estimado_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_estimado_constante1.STR_ES_RELACIONADO=="false") {
			imagen_estimado_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_estimado_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_estimado_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_estimado_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_estimado_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_estimado_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(imagen_estimado_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(imagen_estimado_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
						//imagen_estimado_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(imagen_estimado_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_estimado_constante1.BIG_ID_ACTUAL,"imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
						//imagen_estimado_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			imagen_estimado_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);	
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

var imagen_estimado_webcontrol1 = new imagen_estimado_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_estimado_webcontrol,imagen_estimado_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_estimado_webcontrol1 = imagen_estimado_webcontrol1;


if(imagen_estimado_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_estimado_webcontrol1.onLoadWindow; 
}

//</script>