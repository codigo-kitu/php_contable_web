//<script type="text/javascript" language="javascript">



//var libro_auxiliarJQueryPaginaWebInteraccion= function (libro_auxiliar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {libro_auxiliar_constante,libro_auxiliar_constante1} from '../util/libro_auxiliar_constante.js';

import {libro_auxiliar_funcion,libro_auxiliar_funcion1} from '../util/libro_auxiliar_form_funcion.js';


class libro_auxiliar_webcontrol extends GeneralEntityWebControl {
	
	libro_auxiliar_control=null;
	libro_auxiliar_controlInicial=null;
	libro_auxiliar_controlAuxiliar=null;
		
	//if(libro_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(libro_auxiliar_control) {
		super();
		
		this.libro_auxiliar_control=libro_auxiliar_control;
	}
		
	actualizarVariablesPagina(libro_auxiliar_control) {
		
		if(libro_auxiliar_control.action=="index" || libro_auxiliar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(libro_auxiliar_control);
			
		} 
		
		
		
	
		else if(libro_auxiliar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(libro_auxiliar_control);	
		
		} else if(libro_auxiliar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(libro_auxiliar_control);		
		}
	
		else if(libro_auxiliar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(libro_auxiliar_control);		
		}
	
		else if(libro_auxiliar_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(libro_auxiliar_control);
		}
		
		
		else if(libro_auxiliar_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(libro_auxiliar_control);		
		
		} else if(libro_auxiliar_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(libro_auxiliar_control);		
		
		} 
		//else if(libro_auxiliar_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(libro_auxiliar_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + libro_auxiliar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(libro_auxiliar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(libro_auxiliar_control) {
		this.actualizarPaginaAccionesGenerales(libro_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(libro_auxiliar_control) {
		
		this.actualizarPaginaCargaGeneral(libro_auxiliar_control);
		this.actualizarPaginaOrderBy(libro_auxiliar_control);
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		this.actualizarPaginaCargaGeneralControles(libro_auxiliar_control);
		//this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(libro_auxiliar_control);
		this.actualizarPaginaAreaBusquedas(libro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(libro_auxiliar_control) {
		//this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(libro_auxiliar_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(libro_auxiliar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(libro_auxiliar_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatosAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(libro_auxiliar_control) {
		this.actualizarPaginaCargaGeneralControles(libro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);
		this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(libro_auxiliar_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(libro_auxiliar_control) {
		this.actualizarPaginaCargaGeneralControles(libro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);
		this.actualizarPaginaFormulario(libro_auxiliar_control);
		this.onLoadCombosDefectoFK(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(libro_auxiliar_control) {
		//FORMULARIO
		if(libro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(libro_auxiliar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(libro_auxiliar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		
		//COMBOS FK
		if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(libro_auxiliar_control) {
		//FORMULARIO
		if(libro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(libro_auxiliar_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(libro_auxiliar_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);	
		
		//COMBOS FK
		if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(libro_auxiliar_control) {
		//FORMULARIO
		if(libro_auxiliar_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(libro_auxiliar_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);	
		//COMBOS FK
		if(libro_auxiliar_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(libro_auxiliar_control) {
		
		if(libro_auxiliar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(libro_auxiliar_control);
		}
		
		if(libro_auxiliar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(libro_auxiliar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(libro_auxiliar_control) {
		if(libro_auxiliar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("libro_auxiliarReturnGeneral",JSON.stringify(libro_auxiliar_control.libro_auxiliarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control) {
		if(libro_auxiliar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && libro_auxiliar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(libro_auxiliar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(libro_auxiliar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(libro_auxiliar_control, mostrar) {
		
		if(mostrar==true) {
			libro_auxiliar_funcion1.resaltarRestaurarDivsPagina(false,"libro_auxiliar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				libro_auxiliar_funcion1.resaltarRestaurarDivMantenimiento(false,"libro_auxiliar");
			}			
			
			libro_auxiliar_funcion1.mostrarDivMensaje(true,libro_auxiliar_control.strAuxiliarMensaje,libro_auxiliar_control.strAuxiliarCssMensaje);
		
		} else {
			libro_auxiliar_funcion1.mostrarDivMensaje(false,libro_auxiliar_control.strAuxiliarMensaje,libro_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(libro_auxiliar_control) {
		if(libro_auxiliar_funcion1.esPaginaForm(libro_auxiliar_constante1)==true) {
			window.opener.libro_auxiliar_webcontrol1.actualizarPaginaTablaDatos(libro_auxiliar_control);
		} else {
			this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		}
	}
	
	actualizarPaginaAbrirLink(libro_auxiliar_control) {
		libro_auxiliar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(libro_auxiliar_control.strAuxiliarUrlPagina);
				
		libro_auxiliar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(libro_auxiliar_control.strAuxiliarTipo,libro_auxiliar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(libro_auxiliar_control) {
		libro_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,libro_auxiliar_control.strAuxiliarMensajeAlert,libro_auxiliar_control.strAuxiliarCssMensaje);
			
		if(libro_auxiliar_funcion1.esPaginaForm(libro_auxiliar_constante1)==true) {
			window.opener.libro_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,libro_auxiliar_control.strAuxiliarMensajeAlert,libro_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(libro_auxiliar_control) {
		this.libro_auxiliar_controlInicial=libro_auxiliar_control;
			
		if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(libro_auxiliar_control.strStyleDivArbol,libro_auxiliar_control.strStyleDivContent
																,libro_auxiliar_control.strStyleDivOpcionesBanner,libro_auxiliar_control.strStyleDivExpandirColapsar
																,libro_auxiliar_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(libro_auxiliar_control) {
		this.actualizarCssBotonesPagina(libro_auxiliar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(libro_auxiliar_control.tiposReportes,libro_auxiliar_control.tiposReporte
															 	,libro_auxiliar_control.tiposPaginacion,libro_auxiliar_control.tiposAcciones
																,libro_auxiliar_control.tiposColumnasSelect,libro_auxiliar_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(libro_auxiliar_control.tiposRelaciones,libro_auxiliar_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(libro_auxiliar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(libro_auxiliar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(libro_auxiliar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(libro_auxiliar_control) {
	
		var indexPosition=libro_auxiliar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=libro_auxiliar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(libro_auxiliar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(libro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",libro_auxiliar_control.strRecargarFkTipos,",")) { 
				libro_auxiliar_webcontrol1.cargarCombosempresasFK(libro_auxiliar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(libro_auxiliar_control.strRecargarFkTiposNinguno!=null && libro_auxiliar_control.strRecargarFkTiposNinguno!='NINGUNO' && libro_auxiliar_control.strRecargarFkTiposNinguno!='') {
			
				if(libro_auxiliar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",libro_auxiliar_control.strRecargarFkTiposNinguno,",")) { 
					libro_auxiliar_webcontrol1.cargarCombosempresasFK(libro_auxiliar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(libro_auxiliar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,libro_auxiliar_funcion1,libro_auxiliar_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(libro_auxiliar_control) {
		jQuery("#tdlibro_auxiliarNuevo").css("display",libro_auxiliar_control.strPermisoNuevo);
		jQuery("#trlibro_auxiliarElementos").css("display",libro_auxiliar_control.strVisibleTablaElementos);
		jQuery("#trlibro_auxiliarAcciones").css("display",libro_auxiliar_control.strVisibleTablaAcciones);
		jQuery("#trlibro_auxiliarParametrosAcciones").css("display",libro_auxiliar_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(libro_auxiliar_control) {
	
		this.actualizarCssBotonesMantenimiento(libro_auxiliar_control);
				
		if(libro_auxiliar_control.libro_auxiliarActual!=null) {//form
			
			this.actualizarCamposFormulario(libro_auxiliar_control);			
		}
						
		this.actualizarSpanMensajesCampos(libro_auxiliar_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(libro_auxiliar_control) {
	
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id").val(libro_auxiliar_control.libro_auxiliarActual.id);
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-created_at").val(libro_auxiliar_control.libro_auxiliarActual.versionRow);
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-updated_at").val(libro_auxiliar_control.libro_auxiliarActual.versionRow);
		
		if(libro_auxiliar_control.libro_auxiliarActual.id_empresa!=null && libro_auxiliar_control.libro_auxiliarActual.id_empresa>-1){
			if(jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val() != libro_auxiliar_control.libro_auxiliarActual.id_empresa) {
				jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val(libro_auxiliar_control.libro_auxiliarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-iniciales").val(libro_auxiliar_control.libro_auxiliarActual.iniciales);
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-nombre").val(libro_auxiliar_control.libro_auxiliarActual.nombre);
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-secuencial").val(libro_auxiliar_control.libro_auxiliarActual.secuencial);
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-incremento").val(libro_auxiliar_control.libro_auxiliarActual.incremento);
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-reinicia_secuencial_mes").prop('checked',libro_auxiliar_control.libro_auxiliarActual.reinicia_secuencial_mes);
		jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-generado_por").val(libro_auxiliar_control.libro_auxiliarActual.generado_por);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+libro_auxiliar_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("libro_auxiliar","contabilidad","","form_libro_auxiliar",formulario,"","",paraEventoTabla,idFilaTabla,libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
	}
	
	actualizarSpanMensajesCampos(libro_auxiliar_control) {
		jQuery("#spanstrMensajeid").text(libro_auxiliar_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(libro_auxiliar_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(libro_auxiliar_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(libro_auxiliar_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeiniciales").text(libro_auxiliar_control.strMensajeiniciales);		
		jQuery("#spanstrMensajenombre").text(libro_auxiliar_control.strMensajenombre);		
		jQuery("#spanstrMensajesecuencial").text(libro_auxiliar_control.strMensajesecuencial);		
		jQuery("#spanstrMensajeincremento").text(libro_auxiliar_control.strMensajeincremento);		
		jQuery("#spanstrMensajereinicia_secuencial_mes").text(libro_auxiliar_control.strMensajereinicia_secuencial_mes);		
		jQuery("#spanstrMensajegenerado_por").text(libro_auxiliar_control.strMensajegenerado_por);		
	}
	
	actualizarCssBotonesMantenimiento(libro_auxiliar_control) {
		jQuery("#tdbtnNuevolibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevolibro_auxiliar").css("display",libro_auxiliar_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarlibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarlibro_auxiliar").css("display",libro_auxiliar_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarlibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarlibro_auxiliar").css("display",libro_auxiliar_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarlibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioslibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioslibro_auxiliar").css("display",libro_auxiliar_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarlibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarlibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarlibro_auxiliar").css("visibility",libro_auxiliar_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(libro_auxiliar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa",libro_auxiliar_control.empresasFK);

		if(libro_auxiliar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+libro_auxiliar_control.idFilaTablaActual+"_3",libro_auxiliar_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(libro_auxiliar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(libro_auxiliar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(libro_auxiliar_control.idempresaDefaultFK>-1 && jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val() != libro_auxiliar_control.idempresaDefaultFK) {
				jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val(libro_auxiliar_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//libro_auxiliar_control
		
	
	}
	
	onLoadCombosDefectoFK(libro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(libro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(libro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",libro_auxiliar_control.strRecargarFkTipos,",")) { 
				libro_auxiliar_webcontrol1.setDefectoValorCombosempresasFK(libro_auxiliar_control);
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
	onLoadCombosEventosFK(libro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(libro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(libro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",libro_auxiliar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				libro_auxiliar_webcontrol1.registrarComboActionChangeCombosempresasFK(libro_auxiliar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(libro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(libro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(libro_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(libro_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				libro_auxiliar_funcion1.validarFormularioJQuery(libro_auxiliar_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("libro_auxiliar");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("libro_auxiliar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,"libro_auxiliar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				libro_auxiliar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("libro_auxiliar");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(libro_auxiliar_control) {
		
		
		
		if(libro_auxiliar_control.strPermisoActualizar!=null) {
			jQuery("#tdlibro_auxiliarActualizarToolBar").css("display",libro_auxiliar_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdlibro_auxiliarEliminarToolBar").css("display",libro_auxiliar_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trlibro_auxiliarElementos").css("display",libro_auxiliar_control.strVisibleTablaElementos);
		
		jQuery("#trlibro_auxiliarAcciones").css("display",libro_auxiliar_control.strVisibleTablaAcciones);
		jQuery("#trlibro_auxiliarParametrosAcciones").css("display",libro_auxiliar_control.strVisibleTablaAcciones);
		
		jQuery("#tdlibro_auxiliarCerrarPagina").css("display",libro_auxiliar_control.strPermisoPopup);		
		jQuery("#tdlibro_auxiliarCerrarPaginaToolBar").css("display",libro_auxiliar_control.strPermisoPopup);
		//jQuery("#trlibro_auxiliarAccionesRelaciones").css("display",libro_auxiliar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=libro_auxiliar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + libro_auxiliar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + libro_auxiliar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Libro Auxiliares";
		sTituloBanner+=" - " + libro_auxiliar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + libro_auxiliar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdlibro_auxiliarRelacionesToolBar").css("display",libro_auxiliar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoslibro_auxiliar").css("display",libro_auxiliar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		libro_auxiliar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		libro_auxiliar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		libro_auxiliar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		libro_auxiliar_webcontrol1.registrarEventosControles();
		
		if(libro_auxiliar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			libro_auxiliar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(libro_auxiliar_constante1.STR_ES_RELACIONES=="true") {
			if(libro_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				libro_auxiliar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(libro_auxiliar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(libro_auxiliar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(libro_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(libro_auxiliar_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
						//libro_auxiliar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(libro_auxiliar_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(libro_auxiliar_constante1.BIG_ID_ACTUAL,"libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
						//libro_auxiliar_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			libro_auxiliar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);	
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

var libro_auxiliar_webcontrol1 = new libro_auxiliar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {libro_auxiliar_webcontrol,libro_auxiliar_webcontrol1};

//Para ser llamado desde window.opener
window.libro_auxiliar_webcontrol1 = libro_auxiliar_webcontrol1;


if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = libro_auxiliar_webcontrol1.onLoadWindow; 
}

//</script>