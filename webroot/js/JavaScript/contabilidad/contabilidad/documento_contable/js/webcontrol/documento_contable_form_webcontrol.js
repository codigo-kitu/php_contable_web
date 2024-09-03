//<script type="text/javascript" language="javascript">



//var documento_contableJQueryPaginaWebInteraccion= function (documento_contable_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {documento_contable_constante,documento_contable_constante1} from '../util/documento_contable_constante.js';

import {documento_contable_funcion,documento_contable_funcion1} from '../util/documento_contable_form_funcion.js';


class documento_contable_webcontrol extends GeneralEntityWebControl {
	
	documento_contable_control=null;
	documento_contable_controlInicial=null;
	documento_contable_controlAuxiliar=null;
		
	//if(documento_contable_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(documento_contable_control) {
		super();
		
		this.documento_contable_control=documento_contable_control;
	}
		
	actualizarVariablesPagina(documento_contable_control) {
		
		if(documento_contable_control.action=="index" || documento_contable_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(documento_contable_control);
			
		} 
		
		
		
	
		else if(documento_contable_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(documento_contable_control);	
		
		} else if(documento_contable_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(documento_contable_control);		
		}
	
		else if(documento_contable_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_contable_control);		
		}
	
		else if(documento_contable_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_contable_control);
		}
		
		
		else if(documento_contable_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(documento_contable_control);
		
		} else if(documento_contable_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(documento_contable_control);
		
		} else if(documento_contable_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(documento_contable_control);
		
		} else if(documento_contable_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(documento_contable_control);
		
		} else if(documento_contable_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(documento_contable_control);
		
		} else if(documento_contable_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(documento_contable_control);		
		
		} else if(documento_contable_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(documento_contable_control);		
		
		} 
		//else if(documento_contable_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(documento_contable_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + documento_contable_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(documento_contable_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(documento_contable_control) {
		this.actualizarPaginaAccionesGenerales(documento_contable_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(documento_contable_control) {
		
		this.actualizarPaginaCargaGeneral(documento_contable_control);
		this.actualizarPaginaOrderBy(documento_contable_control);
		this.actualizarPaginaTablaDatos(documento_contable_control);
		this.actualizarPaginaCargaGeneralControles(documento_contable_control);
		//this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_contable_control);
		this.actualizarPaginaAreaBusquedas(documento_contable_control);
		this.actualizarPaginaCargaCombosFK(documento_contable_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(documento_contable_control) {
		//this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(documento_contable_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_contable_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_contable_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(documento_contable_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_contable_control);		
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(documento_contable_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_contable_control);		
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(documento_contable_control) {
		this.actualizarPaginaTablaDatosAuxiliar(documento_contable_control);		
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(documento_contable_control) {
		this.actualizarPaginaCargaGeneralControles(documento_contable_control);
		this.actualizarPaginaCargaCombosFK(documento_contable_control);
		this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(documento_contable_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(documento_contable_control) {
		this.actualizarPaginaCargaGeneralControles(documento_contable_control);
		this.actualizarPaginaCargaCombosFK(documento_contable_control);
		this.actualizarPaginaFormulario(documento_contable_control);
		this.onLoadCombosDefectoFK(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(documento_contable_control) {
		//FORMULARIO
		if(documento_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_contable_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(documento_contable_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		
		//COMBOS FK
		if(documento_contable_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_contable_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(documento_contable_control) {
		//FORMULARIO
		if(documento_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_contable_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(documento_contable_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);	
		
		//COMBOS FK
		if(documento_contable_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_contable_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(documento_contable_control) {
		//FORMULARIO
		if(documento_contable_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(documento_contable_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);	
		//COMBOS FK
		if(documento_contable_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(documento_contable_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(documento_contable_control) {
		
		if(documento_contable_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(documento_contable_control);
		}
		
		if(documento_contable_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(documento_contable_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(documento_contable_control) {
		if(documento_contable_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("documento_contableReturnGeneral",JSON.stringify(documento_contable_control.documento_contableReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(documento_contable_control) {
		if(documento_contable_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_contable_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(documento_contable_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(documento_contable_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(documento_contable_control, mostrar) {
		
		if(mostrar==true) {
			documento_contable_funcion1.resaltarRestaurarDivsPagina(false,"documento_contable");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				documento_contable_funcion1.resaltarRestaurarDivMantenimiento(false,"documento_contable");
			}			
			
			documento_contable_funcion1.mostrarDivMensaje(true,documento_contable_control.strAuxiliarMensaje,documento_contable_control.strAuxiliarCssMensaje);
		
		} else {
			documento_contable_funcion1.mostrarDivMensaje(false,documento_contable_control.strAuxiliarMensaje,documento_contable_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(documento_contable_control) {
		if(documento_contable_funcion1.esPaginaForm(documento_contable_constante1)==true) {
			window.opener.documento_contable_webcontrol1.actualizarPaginaTablaDatos(documento_contable_control);
		} else {
			this.actualizarPaginaTablaDatos(documento_contable_control);
		}
	}
	
	actualizarPaginaAbrirLink(documento_contable_control) {
		documento_contable_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(documento_contable_control.strAuxiliarUrlPagina);
				
		documento_contable_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(documento_contable_control.strAuxiliarTipo,documento_contable_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(documento_contable_control) {
		documento_contable_funcion1.resaltarRestaurarDivMensaje(true,documento_contable_control.strAuxiliarMensajeAlert,documento_contable_control.strAuxiliarCssMensaje);
			
		if(documento_contable_funcion1.esPaginaForm(documento_contable_constante1)==true) {
			window.opener.documento_contable_funcion1.resaltarRestaurarDivMensaje(true,documento_contable_control.strAuxiliarMensajeAlert,documento_contable_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(documento_contable_control) {
		this.documento_contable_controlInicial=documento_contable_control;
			
		if(documento_contable_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(documento_contable_control.strStyleDivArbol,documento_contable_control.strStyleDivContent
																,documento_contable_control.strStyleDivOpcionesBanner,documento_contable_control.strStyleDivExpandirColapsar
																,documento_contable_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(documento_contable_control) {
		this.actualizarCssBotonesPagina(documento_contable_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(documento_contable_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(documento_contable_control.tiposReportes,documento_contable_control.tiposReporte
															 	,documento_contable_control.tiposPaginacion,documento_contable_control.tiposAcciones
																,documento_contable_control.tiposColumnasSelect,documento_contable_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(documento_contable_control.tiposRelaciones,documento_contable_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(documento_contable_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(documento_contable_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(documento_contable_control);			
	}
	
	actualizarPaginaUsuarioInvitado(documento_contable_control) {
	
		var indexPosition=documento_contable_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=documento_contable_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(documento_contable_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(documento_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_contable_control.strRecargarFkTipos,",")) { 
				documento_contable_webcontrol1.cargarCombosempresasFK(documento_contable_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(documento_contable_control.strRecargarFkTiposNinguno!=null && documento_contable_control.strRecargarFkTiposNinguno!='NINGUNO' && documento_contable_control.strRecargarFkTiposNinguno!='') {
			
				if(documento_contable_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",documento_contable_control.strRecargarFkTiposNinguno,",")) { 
					documento_contable_webcontrol1.cargarCombosempresasFK(documento_contable_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(documento_contable_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_contable_funcion1,documento_contable_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(documento_contable_control) {
		jQuery("#tddocumento_contableNuevo").css("display",documento_contable_control.strPermisoNuevo);
		jQuery("#trdocumento_contableElementos").css("display",documento_contable_control.strVisibleTablaElementos);
		jQuery("#trdocumento_contableAcciones").css("display",documento_contable_control.strVisibleTablaAcciones);
		jQuery("#trdocumento_contableParametrosAcciones").css("display",documento_contable_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(documento_contable_control) {
	
		this.actualizarCssBotonesMantenimiento(documento_contable_control);
				
		if(documento_contable_control.documento_contableActual!=null) {//form
			
			this.actualizarCamposFormulario(documento_contable_control);			
		}
						
		this.actualizarSpanMensajesCampos(documento_contable_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(documento_contable_control) {
	
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id").val(documento_contable_control.documento_contableActual.id);
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-created_at").val(documento_contable_control.documento_contableActual.versionRow);
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-updated_at").val(documento_contable_control.documento_contableActual.versionRow);
		
		if(documento_contable_control.documento_contableActual.id_empresa!=null && documento_contable_control.documento_contableActual.id_empresa>-1){
			if(jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").val() != documento_contable_control.documento_contableActual.id_empresa) {
				jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").val(documento_contable_control.documento_contableActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-codigo").val(documento_contable_control.documento_contableActual.codigo);
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-nombre").val(documento_contable_control.documento_contableActual.nombre);
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-secuencial").val(documento_contable_control.documento_contableActual.secuencial);
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-incremento").val(documento_contable_control.documento_contableActual.incremento);
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-reinicia_secuencial_mes").prop('checked',documento_contable_control.documento_contableActual.reinicia_secuencial_mes);
		jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-generado_por").val(documento_contable_control.documento_contableActual.generado_por);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+documento_contable_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("documento_contable","contabilidad","","form_documento_contable",formulario,"","",paraEventoTabla,idFilaTabla,documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
	}
	
	actualizarSpanMensajesCampos(documento_contable_control) {
		jQuery("#spanstrMensajeid").text(documento_contable_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(documento_contable_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(documento_contable_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(documento_contable_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(documento_contable_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(documento_contable_control.strMensajenombre);		
		jQuery("#spanstrMensajesecuencial").text(documento_contable_control.strMensajesecuencial);		
		jQuery("#spanstrMensajeincremento").text(documento_contable_control.strMensajeincremento);		
		jQuery("#spanstrMensajereinicia_secuencial_mes").text(documento_contable_control.strMensajereinicia_secuencial_mes);		
		jQuery("#spanstrMensajegenerado_por").text(documento_contable_control.strMensajegenerado_por);		
	}
	
	actualizarCssBotonesMantenimiento(documento_contable_control) {
		jQuery("#tdbtnNuevodocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodocumento_contable").css("display",documento_contable_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardocumento_contable").css("display",documento_contable_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardocumento_contable").css("display",documento_contable_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdocumento_contable").css("display",documento_contable_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardocumento_contable").css("visibility",documento_contable_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(documento_contable_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa",documento_contable_control.empresasFK);

		if(documento_contable_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_contable_control.idFilaTablaActual+"_3",documento_contable_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(documento_contable_control) {

	};

	
	
	setDefectoValorCombosempresasFK(documento_contable_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_contable_control.idempresaDefaultFK>-1 && jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").val() != documento_contable_control.idempresaDefaultFK) {
				jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").val(documento_contable_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//documento_contable_control
		
	
	}
	
	onLoadCombosDefectoFK(documento_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(documento_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_contable_control.strRecargarFkTipos,",")) { 
				documento_contable_webcontrol1.setDefectoValorCombosempresasFK(documento_contable_control);
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
	onLoadCombosEventosFK(documento_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(documento_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_contable_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_contable_webcontrol1.registrarComboActionChangeCombosempresasFK(documento_contable_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(documento_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(documento_contable_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(documento_contable_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_contable_funcion1.validarFormularioJQuery(documento_contable_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("documento_contable");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("documento_contable");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(documento_contable_funcion1,documento_contable_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(documento_contable_funcion1,documento_contable_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(documento_contable_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,"documento_contable");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				documento_contable_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("documento_contable");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(documento_contable_control) {
		
		
		
		if(documento_contable_control.strPermisoActualizar!=null) {
			jQuery("#tddocumento_contableActualizarToolBar").css("display",documento_contable_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tddocumento_contableEliminarToolBar").css("display",documento_contable_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trdocumento_contableElementos").css("display",documento_contable_control.strVisibleTablaElementos);
		
		jQuery("#trdocumento_contableAcciones").css("display",documento_contable_control.strVisibleTablaAcciones);
		jQuery("#trdocumento_contableParametrosAcciones").css("display",documento_contable_control.strVisibleTablaAcciones);
		
		jQuery("#tddocumento_contableCerrarPagina").css("display",documento_contable_control.strPermisoPopup);		
		jQuery("#tddocumento_contableCerrarPaginaToolBar").css("display",documento_contable_control.strPermisoPopup);
		//jQuery("#trdocumento_contableAccionesRelaciones").css("display",documento_contable_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=documento_contable_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_contable_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + documento_contable_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Documento Contables";
		sTituloBanner+=" - " + documento_contable_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_contable_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddocumento_contableRelacionesToolBar").css("display",documento_contable_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdocumento_contable").css("display",documento_contable_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		documento_contable_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		documento_contable_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		documento_contable_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		documento_contable_webcontrol1.registrarEventosControles();
		
		if(documento_contable_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(documento_contable_constante1.STR_ES_RELACIONADO=="false") {
			documento_contable_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(documento_contable_constante1.STR_ES_RELACIONES=="true") {
			if(documento_contable_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_contable_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(documento_contable_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(documento_contable_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(documento_contable_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(documento_contable_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
						//documento_contable_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(documento_contable_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(documento_contable_constante1.BIG_ID_ACTUAL,"documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
						//documento_contable_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			documento_contable_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);	
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

var documento_contable_webcontrol1 = new documento_contable_webcontrol();

//Para ser llamado desde otro archivo (import)
export {documento_contable_webcontrol,documento_contable_webcontrol1};

//Para ser llamado desde window.opener
window.documento_contable_webcontrol1 = documento_contable_webcontrol1;


if(documento_contable_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = documento_contable_webcontrol1.onLoadWindow; 
}

//</script>