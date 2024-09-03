//<script type="text/javascript" language="javascript">



//var contador_auxiliarJQueryPaginaWebInteraccion= function (contador_auxiliar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {contador_auxiliar_constante,contador_auxiliar_constante1} from '../util/contador_auxiliar_constante.js';

import {contador_auxiliar_funcion,contador_auxiliar_funcion1} from '../util/contador_auxiliar_form_funcion.js';


class contador_auxiliar_webcontrol extends GeneralEntityWebControl {
	
	contador_auxiliar_control=null;
	contador_auxiliar_controlInicial=null;
	contador_auxiliar_controlAuxiliar=null;
		
	//if(contador_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(contador_auxiliar_control) {
		super();
		
		this.contador_auxiliar_control=contador_auxiliar_control;
	}
		
	actualizarVariablesPagina(contador_auxiliar_control) {
		
		if(contador_auxiliar_control.action=="index" || contador_auxiliar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(contador_auxiliar_control);
			
		} 
		
		
		
	
		else if(contador_auxiliar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(contador_auxiliar_control);	
		
		} else if(contador_auxiliar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(contador_auxiliar_control);		
		}
	
	
		
		
		else if(contador_auxiliar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(contador_auxiliar_control);		
		
		} else if(contador_auxiliar_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(contador_auxiliar_control);		
		
		} 
		//else if(contador_auxiliar_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(contador_auxiliar_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + contador_auxiliar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(contador_auxiliar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(contador_auxiliar_control) {
		this.actualizarPaginaAccionesGenerales(contador_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(contador_auxiliar_control) {
		
		this.actualizarPaginaCargaGeneral(contador_auxiliar_control);
		this.actualizarPaginaOrderBy(contador_auxiliar_control);
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);
		this.actualizarPaginaCargaGeneralControles(contador_auxiliar_control);
		//this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(contador_auxiliar_control);
		this.actualizarPaginaAreaBusquedas(contador_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(contador_auxiliar_control) {
		//this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(contador_auxiliar_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(contador_auxiliar_control) {
		this.actualizarPaginaCargaGeneralControles(contador_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);
		this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(contador_auxiliar_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(contador_auxiliar_control) {
		this.actualizarPaginaCargaGeneralControles(contador_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);
		this.actualizarPaginaFormulario(contador_auxiliar_control);
		this.onLoadCombosDefectoFK(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(contador_auxiliar_control) {
		//FORMULARIO
		if(contador_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(contador_auxiliar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(contador_auxiliar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		
		//COMBOS FK
		if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(contador_auxiliar_control) {
		//FORMULARIO
		if(contador_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(contador_auxiliar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(contador_auxiliar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);	
		
		//COMBOS FK
		if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(contador_auxiliar_control) {
		//FORMULARIO
		if(contador_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(contador_auxiliar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);	
		//COMBOS FK
		if(contador_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(contador_auxiliar_control) {
		
		if(contador_auxiliar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(contador_auxiliar_control);
		}
		
		if(contador_auxiliar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(contador_auxiliar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(contador_auxiliar_control) {
		if(contador_auxiliar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("contador_auxiliarReturnGeneral",JSON.stringify(contador_auxiliar_control.contador_auxiliarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control) {
		if(contador_auxiliar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && contador_auxiliar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(contador_auxiliar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(contador_auxiliar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(contador_auxiliar_control, mostrar) {
		
		if(mostrar==true) {
			contador_auxiliar_funcion1.resaltarRestaurarDivsPagina(false,"contador_auxiliar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				contador_auxiliar_funcion1.resaltarRestaurarDivMantenimiento(false,"contador_auxiliar");
			}			
			
			contador_auxiliar_funcion1.mostrarDivMensaje(true,contador_auxiliar_control.strAuxiliarMensaje,contador_auxiliar_control.strAuxiliarCssMensaje);
		
		} else {
			contador_auxiliar_funcion1.mostrarDivMensaje(false,contador_auxiliar_control.strAuxiliarMensaje,contador_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(contador_auxiliar_control) {
		if(contador_auxiliar_funcion1.esPaginaForm(contador_auxiliar_constante1)==true) {
			window.opener.contador_auxiliar_webcontrol1.actualizarPaginaTablaDatos(contador_auxiliar_control);
		} else {
			this.actualizarPaginaTablaDatos(contador_auxiliar_control);
		}
	}
	
	actualizarPaginaAbrirLink(contador_auxiliar_control) {
		contador_auxiliar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(contador_auxiliar_control.strAuxiliarUrlPagina);
				
		contador_auxiliar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(contador_auxiliar_control.strAuxiliarTipo,contador_auxiliar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(contador_auxiliar_control) {
		contador_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,contador_auxiliar_control.strAuxiliarMensajeAlert,contador_auxiliar_control.strAuxiliarCssMensaje);
			
		if(contador_auxiliar_funcion1.esPaginaForm(contador_auxiliar_constante1)==true) {
			window.opener.contador_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,contador_auxiliar_control.strAuxiliarMensajeAlert,contador_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(contador_auxiliar_control) {
		this.contador_auxiliar_controlInicial=contador_auxiliar_control;
			
		if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(contador_auxiliar_control.strStyleDivArbol,contador_auxiliar_control.strStyleDivContent
																,contador_auxiliar_control.strStyleDivOpcionesBanner,contador_auxiliar_control.strStyleDivExpandirColapsar
																,contador_auxiliar_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(contador_auxiliar_control) {
		this.actualizarCssBotonesPagina(contador_auxiliar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(contador_auxiliar_control.tiposReportes,contador_auxiliar_control.tiposReporte
															 	,contador_auxiliar_control.tiposPaginacion,contador_auxiliar_control.tiposAcciones
																,contador_auxiliar_control.tiposColumnasSelect,contador_auxiliar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(contador_auxiliar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(contador_auxiliar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(contador_auxiliar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(contador_auxiliar_control) {
	
		var indexPosition=contador_auxiliar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=contador_auxiliar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(contador_auxiliar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(contador_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",contador_auxiliar_control.strRecargarFkTipos,",")) { 
				contador_auxiliar_webcontrol1.cargarComboslibro_auxiliarsFK(contador_auxiliar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(contador_auxiliar_control.strRecargarFkTiposNinguno!=null && contador_auxiliar_control.strRecargarFkTiposNinguno!='NINGUNO' && contador_auxiliar_control.strRecargarFkTiposNinguno!='') {
			
				if(contador_auxiliar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_libro_auxiliar",contador_auxiliar_control.strRecargarFkTiposNinguno,",")) { 
					contador_auxiliar_webcontrol1.cargarComboslibro_auxiliarsFK(contador_auxiliar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablalibro_auxiliarFK(contador_auxiliar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,contador_auxiliar_funcion1,contador_auxiliar_control.libro_auxiliarsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(contador_auxiliar_control) {
		jQuery("#tdcontador_auxiliarNuevo").css("display",contador_auxiliar_control.strPermisoNuevo);
		jQuery("#trcontador_auxiliarElementos").css("display",contador_auxiliar_control.strVisibleTablaElementos);
		jQuery("#trcontador_auxiliarAcciones").css("display",contador_auxiliar_control.strVisibleTablaAcciones);
		jQuery("#trcontador_auxiliarParametrosAcciones").css("display",contador_auxiliar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(contador_auxiliar_control) {
	
		this.actualizarCssBotonesMantenimiento(contador_auxiliar_control);
				
		if(contador_auxiliar_control.contador_auxiliarActual!=null) {//form
			
			this.actualizarCamposFormulario(contador_auxiliar_control);			
		}
						
		this.actualizarSpanMensajesCampos(contador_auxiliar_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(contador_auxiliar_control) {
	
		jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id").val(contador_auxiliar_control.contador_auxiliarActual.id);
		jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-created_at").val(contador_auxiliar_control.contador_auxiliarActual.versionRow);
		jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-updated_at").val(contador_auxiliar_control.contador_auxiliarActual.versionRow);
		jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_contador").val(contador_auxiliar_control.contador_auxiliarActual.id_contador);
		
		if(contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar!=null && contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar>-1){
			if(jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar) {
				jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar).trigger("change");
			}
		} else { 
			//jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").select2("val", null);
			if(jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-periodo_anual").val(contador_auxiliar_control.contador_auxiliarActual.periodo_anual);
		jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-mes").val(contador_auxiliar_control.contador_auxiliarActual.mes);
		jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-contador").val(contador_auxiliar_control.contador_auxiliarActual.contador);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+contador_auxiliar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("contador_auxiliar","contabilidad","","form_contador_auxiliar",formulario,"","",paraEventoTabla,idFilaTabla,contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
	}
	
	actualizarSpanMensajesCampos(contador_auxiliar_control) {
		jQuery("#spanstrMensajeid").text(contador_auxiliar_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(contador_auxiliar_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(contador_auxiliar_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_contador").text(contador_auxiliar_control.strMensajeid_contador);		
		jQuery("#spanstrMensajeid_libro_auxiliar").text(contador_auxiliar_control.strMensajeid_libro_auxiliar);		
		jQuery("#spanstrMensajeperiodo_anual").text(contador_auxiliar_control.strMensajeperiodo_anual);		
		jQuery("#spanstrMensajemes").text(contador_auxiliar_control.strMensajemes);		
		jQuery("#spanstrMensajecontador").text(contador_auxiliar_control.strMensajecontador);		
	}
	
	actualizarCssBotonesMantenimiento(contador_auxiliar_control) {
		jQuery("#tdbtnNuevocontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocontador_auxiliar").css("display",contador_auxiliar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcontador_auxiliar").css("display",contador_auxiliar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcontador_auxiliar").css("display",contador_auxiliar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscontador_auxiliar").css("display",contador_auxiliar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcontador_auxiliar").css("visibility",contador_auxiliar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarComboslibro_auxiliarsFK(contador_auxiliar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar",contador_auxiliar_control.libro_auxiliarsFK);

		if(contador_auxiliar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+contador_auxiliar_control.idFilaTablaActual+"_4",contador_auxiliar_control.libro_auxiliarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar",contador_auxiliar_control.libro_auxiliarsFK);

	};

	
	
	registrarComboActionChangeComboslibro_auxiliarsFK(contador_auxiliar_control) {

	};

	
	
	setDefectoValorComboslibro_auxiliarsFK(contador_auxiliar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(contador_auxiliar_control.idlibro_auxiliarDefaultFK>-1 && jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != contador_auxiliar_control.idlibro_auxiliarDefaultFK) {
				jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(contador_auxiliar_control.idlibro_auxiliarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(contador_auxiliar_control.idlibro_auxiliarDefaultForeignKey).trigger("change");
			if(jQuery("#"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//contador_auxiliar_control
		
	
	}
	
	onLoadCombosDefectoFK(contador_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(contador_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(contador_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",contador_auxiliar_control.strRecargarFkTipos,",")) { 
				contador_auxiliar_webcontrol1.setDefectoValorComboslibro_auxiliarsFK(contador_auxiliar_control);
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
	onLoadCombosEventosFK(contador_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(contador_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(contador_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",contador_auxiliar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				contador_auxiliar_webcontrol1.registrarComboActionChangeComboslibro_auxiliarsFK(contador_auxiliar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(contador_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(contador_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(contador_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(contador_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				contador_auxiliar_funcion1.validarFormularioJQuery(contador_auxiliar_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("contador_auxiliar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("contador_auxiliar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,"contador_auxiliar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("libro_auxiliar","id_libro_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar_img_busqueda").click(function(){
				contador_auxiliar_webcontrol1.abrirBusquedaParalibro_auxiliar("id_libro_auxiliar");
				//alert(jQuery('#form-id_libro_auxiliar_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(contador_auxiliar_control) {
		
		
		
		if(contador_auxiliar_control.strPermisoActualizar!=null) {
			jQuery("#tdcontador_auxiliarActualizarToolBar").css("display",contador_auxiliar_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcontador_auxiliarEliminarToolBar").css("display",contador_auxiliar_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcontador_auxiliarElementos").css("display",contador_auxiliar_control.strVisibleTablaElementos);
		
		jQuery("#trcontador_auxiliarAcciones").css("display",contador_auxiliar_control.strVisibleTablaAcciones);
		jQuery("#trcontador_auxiliarParametrosAcciones").css("display",contador_auxiliar_control.strVisibleTablaAcciones);
		
		jQuery("#tdcontador_auxiliarCerrarPagina").css("display",contador_auxiliar_control.strPermisoPopup);		
		jQuery("#tdcontador_auxiliarCerrarPaginaToolBar").css("display",contador_auxiliar_control.strPermisoPopup);
		//jQuery("#trcontador_auxiliarAccionesRelaciones").css("display",contador_auxiliar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=contador_auxiliar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + contador_auxiliar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + contador_auxiliar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Contadores Auxiliareses";
		sTituloBanner+=" - " + contador_auxiliar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + contador_auxiliar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcontador_auxiliarRelacionesToolBar").css("display",contador_auxiliar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscontador_auxiliar").css("display",contador_auxiliar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		contador_auxiliar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		contador_auxiliar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		contador_auxiliar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		contador_auxiliar_webcontrol1.registrarEventosControles();
		
		if(contador_auxiliar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			contador_auxiliar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(contador_auxiliar_constante1.STR_ES_RELACIONES=="true") {
			if(contador_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				contador_auxiliar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(contador_auxiliar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(contador_auxiliar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(contador_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(contador_auxiliar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
						//contador_auxiliar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(contador_auxiliar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(contador_auxiliar_constante1.BIG_ID_ACTUAL,"contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
						//contador_auxiliar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			contador_auxiliar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);	
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

var contador_auxiliar_webcontrol1 = new contador_auxiliar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {contador_auxiliar_webcontrol,contador_auxiliar_webcontrol1};

//Para ser llamado desde window.opener
window.contador_auxiliar_webcontrol1 = contador_auxiliar_webcontrol1;


if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = contador_auxiliar_webcontrol1.onLoadWindow; 
}

//</script>