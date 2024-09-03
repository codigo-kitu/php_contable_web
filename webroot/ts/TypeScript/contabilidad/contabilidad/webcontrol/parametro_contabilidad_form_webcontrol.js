//<script type="text/javascript" language="javascript">



//var parametro_contabilidadJQueryPaginaWebInteraccion= function (parametro_contabilidad_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_contabilidad_constante,parametro_contabilidad_constante1} from '../util/parametro_contabilidad_constante.js';

import {parametro_contabilidad_funcion,parametro_contabilidad_funcion1} from '../util/parametro_contabilidad_form_funcion.js';


class parametro_contabilidad_webcontrol extends GeneralEntityWebControl {
	
	parametro_contabilidad_control=null;
	parametro_contabilidad_controlInicial=null;
	parametro_contabilidad_controlAuxiliar=null;
		
	//if(parametro_contabilidad_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_contabilidad_control) {
		super();
		
		this.parametro_contabilidad_control=parametro_contabilidad_control;
	}
		
	actualizarVariablesPagina(parametro_contabilidad_control) {
		
		if(parametro_contabilidad_control.action=="index" || parametro_contabilidad_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_contabilidad_control);
			
		} 
		
		
		
	
		else if(parametro_contabilidad_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_contabilidad_control);	
		
		} else if(parametro_contabilidad_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_contabilidad_control);		
		}
	
	
		
		
		else if(parametro_contabilidad_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_contabilidad_control);		
		
		} else if(parametro_contabilidad_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_contabilidad_control);		
		
		} 
		//else if(parametro_contabilidad_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_contabilidad_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_contabilidad_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_contabilidad_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_contabilidad_control) {
		this.actualizarPaginaAccionesGenerales(parametro_contabilidad_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_contabilidad_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_contabilidad_control);
		this.actualizarPaginaOrderBy(parametro_contabilidad_control);
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);
		this.actualizarPaginaCargaGeneralControles(parametro_contabilidad_control);
		//this.actualizarPaginaFormulario(parametro_contabilidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_contabilidad_control);
		this.actualizarPaginaAreaBusquedas(parametro_contabilidad_control);
		this.actualizarPaginaCargaCombosFK(parametro_contabilidad_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_contabilidad_control) {
		//this.actualizarPaginaFormulario(parametro_contabilidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_contabilidad_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_contabilidad_control);		
		this.actualizarPaginaFormulario(parametro_contabilidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_contabilidad_control);		
		this.actualizarPaginaFormulario(parametro_contabilidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_contabilidad_control);		
		this.actualizarPaginaFormulario(parametro_contabilidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_contabilidad_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_contabilidad_control);
		this.actualizarPaginaCargaCombosFK(parametro_contabilidad_control);
		this.actualizarPaginaFormulario(parametro_contabilidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(parametro_contabilidad_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_contabilidad_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_contabilidad_control);
		this.actualizarPaginaCargaCombosFK(parametro_contabilidad_control);
		this.actualizarPaginaFormulario(parametro_contabilidad_control);
		this.onLoadCombosDefectoFK(parametro_contabilidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_contabilidad_control) {
		//FORMULARIO
		if(parametro_contabilidad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_contabilidad_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_contabilidad_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		
		//COMBOS FK
		if(parametro_contabilidad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_contabilidad_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_contabilidad_control) {
		//FORMULARIO
		if(parametro_contabilidad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_contabilidad_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_contabilidad_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);	
		
		//COMBOS FK
		if(parametro_contabilidad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_contabilidad_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_contabilidad_control) {
		//FORMULARIO
		if(parametro_contabilidad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_contabilidad_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);	
		//COMBOS FK
		if(parametro_contabilidad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_contabilidad_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_contabilidad_control) {
		
		if(parametro_contabilidad_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_contabilidad_control);
		}
		
		if(parametro_contabilidad_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_contabilidad_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_contabilidad_control) {
		if(parametro_contabilidad_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_contabilidadReturnGeneral",JSON.stringify(parametro_contabilidad_control.parametro_contabilidadReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control) {
		if(parametro_contabilidad_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_contabilidad_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_contabilidad_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_contabilidad_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_contabilidad_control, mostrar) {
		
		if(mostrar==true) {
			parametro_contabilidad_funcion1.resaltarRestaurarDivsPagina(false,"parametro_contabilidad");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_contabilidad_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_contabilidad");
			}			
			
			parametro_contabilidad_funcion1.mostrarDivMensaje(true,parametro_contabilidad_control.strAuxiliarMensaje,parametro_contabilidad_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_contabilidad_funcion1.mostrarDivMensaje(false,parametro_contabilidad_control.strAuxiliarMensaje,parametro_contabilidad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_contabilidad_control) {
		if(parametro_contabilidad_funcion1.esPaginaForm(parametro_contabilidad_constante1)==true) {
			window.opener.parametro_contabilidad_webcontrol1.actualizarPaginaTablaDatos(parametro_contabilidad_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_contabilidad_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_contabilidad_control) {
		parametro_contabilidad_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_contabilidad_control.strAuxiliarUrlPagina);
				
		parametro_contabilidad_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_contabilidad_control.strAuxiliarTipo,parametro_contabilidad_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_contabilidad_control) {
		parametro_contabilidad_funcion1.resaltarRestaurarDivMensaje(true,parametro_contabilidad_control.strAuxiliarMensajeAlert,parametro_contabilidad_control.strAuxiliarCssMensaje);
			
		if(parametro_contabilidad_funcion1.esPaginaForm(parametro_contabilidad_constante1)==true) {
			window.opener.parametro_contabilidad_funcion1.resaltarRestaurarDivMensaje(true,parametro_contabilidad_control.strAuxiliarMensajeAlert,parametro_contabilidad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_contabilidad_control) {
		this.parametro_contabilidad_controlInicial=parametro_contabilidad_control;
			
		if(parametro_contabilidad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_contabilidad_control.strStyleDivArbol,parametro_contabilidad_control.strStyleDivContent
																,parametro_contabilidad_control.strStyleDivOpcionesBanner,parametro_contabilidad_control.strStyleDivExpandirColapsar
																,parametro_contabilidad_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_contabilidad_control) {
		this.actualizarCssBotonesPagina(parametro_contabilidad_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_contabilidad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_contabilidad_control.tiposReportes,parametro_contabilidad_control.tiposReporte
															 	,parametro_contabilidad_control.tiposPaginacion,parametro_contabilidad_control.tiposAcciones
																,parametro_contabilidad_control.tiposColumnasSelect,parametro_contabilidad_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_contabilidad_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_contabilidad_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_contabilidad_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_contabilidad_control) {
	
		var indexPosition=parametro_contabilidad_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_contabilidad_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_contabilidad_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_contabilidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_contabilidad_control.strRecargarFkTipos,",")) { 
				parametro_contabilidad_webcontrol1.cargarCombosempresasFK(parametro_contabilidad_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_contabilidad_control.strRecargarFkTiposNinguno!=null && parametro_contabilidad_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_contabilidad_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_contabilidad_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",parametro_contabilidad_control.strRecargarFkTiposNinguno,",")) { 
					parametro_contabilidad_webcontrol1.cargarCombosempresasFK(parametro_contabilidad_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(parametro_contabilidad_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_contabilidad_funcion1,parametro_contabilidad_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(parametro_contabilidad_control) {
		jQuery("#tdparametro_contabilidadNuevo").css("display",parametro_contabilidad_control.strPermisoNuevo);
		jQuery("#trparametro_contabilidadElementos").css("display",parametro_contabilidad_control.strVisibleTablaElementos);
		jQuery("#trparametro_contabilidadAcciones").css("display",parametro_contabilidad_control.strVisibleTablaAcciones);
		jQuery("#trparametro_contabilidadParametrosAcciones").css("display",parametro_contabilidad_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_contabilidad_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_contabilidad_control);
				
		if(parametro_contabilidad_control.parametro_contabilidadActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_contabilidad_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_contabilidad_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_contabilidad_control) {
	
		jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-id").val(parametro_contabilidad_control.parametro_contabilidadActual.id);
		jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-version_row").val(parametro_contabilidad_control.parametro_contabilidadActual.versionRow);
		
		if(parametro_contabilidad_control.parametro_contabilidadActual.id_empresa!=null && parametro_contabilidad_control.parametro_contabilidadActual.id_empresa>-1){
			if(jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_contabilidad_control.parametro_contabilidadActual.id_empresa) {
				jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-id_empresa").val(parametro_contabilidad_control.parametro_contabilidadActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-numero_asiento").val(parametro_contabilidad_control.parametro_contabilidadActual.numero_asiento);
		jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-con_asiento_simple_facturacion").prop('checked',parametro_contabilidad_control.parametro_contabilidadActual.con_asiento_simple_facturacion);
		jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-con_eliminacion_fisica_asiento").prop('checked',parametro_contabilidad_control.parametro_contabilidadActual.con_eliminacion_fisica_asiento);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_contabilidad_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_contabilidad","contabilidad","","form_parametro_contabilidad",formulario,"","",paraEventoTabla,idFilaTabla,parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
	}
	
	actualizarSpanMensajesCampos(parametro_contabilidad_control) {
		jQuery("#spanstrMensajeid").text(parametro_contabilidad_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_contabilidad_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(parametro_contabilidad_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajenumero_asiento").text(parametro_contabilidad_control.strMensajenumero_asiento);		
		jQuery("#spanstrMensajecon_asiento_simple_facturacion").text(parametro_contabilidad_control.strMensajecon_asiento_simple_facturacion);		
		jQuery("#spanstrMensajecon_eliminacion_fisica_asiento").text(parametro_contabilidad_control.strMensajecon_eliminacion_fisica_asiento);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_contabilidad_control) {
		jQuery("#tdbtnNuevoparametro_contabilidad").css("visibility",parametro_contabilidad_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_contabilidad").css("display",parametro_contabilidad_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_contabilidad").css("visibility",parametro_contabilidad_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_contabilidad").css("display",parametro_contabilidad_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_contabilidad").css("visibility",parametro_contabilidad_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_contabilidad").css("display",parametro_contabilidad_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_contabilidad").css("visibility",parametro_contabilidad_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_contabilidad").css("visibility",parametro_contabilidad_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_contabilidad").css("display",parametro_contabilidad_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_contabilidad").css("visibility",parametro_contabilidad_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_contabilidad").css("visibility",parametro_contabilidad_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_contabilidad").css("visibility",parametro_contabilidad_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(parametro_contabilidad_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-id_empresa",parametro_contabilidad_control.empresasFK);

		if(parametro_contabilidad_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_contabilidad_control.idFilaTablaActual+"_2",parametro_contabilidad_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(parametro_contabilidad_control) {

	};

	
	
	setDefectoValorCombosempresasFK(parametro_contabilidad_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_contabilidad_control.idempresaDefaultFK>-1 && jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_contabilidad_control.idempresaDefaultFK) {
				jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-id_empresa").val(parametro_contabilidad_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_contabilidad_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_contabilidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_contabilidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_contabilidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_contabilidad_control.strRecargarFkTipos,",")) { 
				parametro_contabilidad_webcontrol1.setDefectoValorCombosempresasFK(parametro_contabilidad_control);
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
	onLoadCombosEventosFK(parametro_contabilidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_contabilidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_contabilidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_contabilidad_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_contabilidad_webcontrol1.registrarComboActionChangeCombosempresasFK(parametro_contabilidad_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_contabilidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_contabilidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_contabilidad_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(parametro_contabilidad_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_contabilidad_funcion1.validarFormularioJQuery(parametro_contabilidad_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_contabilidad");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_contabilidad");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_contabilidad_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,"parametro_contabilidad");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				parametro_contabilidad_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_contabilidad_control) {
		
		
		
		if(parametro_contabilidad_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_contabilidadActualizarToolBar").css("display",parametro_contabilidad_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdparametro_contabilidadEliminarToolBar").css("display",parametro_contabilidad_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trparametro_contabilidadElementos").css("display",parametro_contabilidad_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_contabilidadAcciones").css("display",parametro_contabilidad_control.strVisibleTablaAcciones);
		jQuery("#trparametro_contabilidadParametrosAcciones").css("display",parametro_contabilidad_control.strVisibleTablaAcciones);
		
		jQuery("#tdparametro_contabilidadCerrarPagina").css("display",parametro_contabilidad_control.strPermisoPopup);		
		jQuery("#tdparametro_contabilidadCerrarPaginaToolBar").css("display",parametro_contabilidad_control.strPermisoPopup);
		//jQuery("#trparametro_contabilidadAccionesRelaciones").css("display",parametro_contabilidad_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_contabilidad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_contabilidad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_contabilidad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametro Contabilidads";
		sTituloBanner+=" - " + parametro_contabilidad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_contabilidad_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_contabilidadRelacionesToolBar").css("display",parametro_contabilidad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_contabilidad").css("display",parametro_contabilidad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_contabilidad_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_contabilidad_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_contabilidad_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_contabilidad_webcontrol1.registrarEventosControles();
		
		if(parametro_contabilidad_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_contabilidad_constante1.STR_ES_RELACIONADO=="false") {
			parametro_contabilidad_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_contabilidad_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_contabilidad_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_contabilidad_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_contabilidad_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_contabilidad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(parametro_contabilidad_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(parametro_contabilidad_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
						//parametro_contabilidad_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(parametro_contabilidad_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_contabilidad_constante1.BIG_ID_ACTUAL,"parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
						//parametro_contabilidad_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			parametro_contabilidad_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);	
	}
}

var parametro_contabilidad_webcontrol1 = new parametro_contabilidad_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_contabilidad_webcontrol,parametro_contabilidad_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_contabilidad_webcontrol1 = parametro_contabilidad_webcontrol1;


if(parametro_contabilidad_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_contabilidad_webcontrol1.onLoadWindow; 
}

//</script>