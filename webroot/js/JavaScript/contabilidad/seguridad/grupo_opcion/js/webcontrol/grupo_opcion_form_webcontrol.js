//<script type="text/javascript" language="javascript">



//var grupo_opcionJQueryPaginaWebInteraccion= function (grupo_opcion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {grupo_opcion_constante,grupo_opcion_constante1} from '../util/grupo_opcion_constante.js';

import {grupo_opcion_funcion,grupo_opcion_funcion1} from '../util/grupo_opcion_form_funcion.js';


class grupo_opcion_webcontrol extends GeneralEntityWebControl {
	
	grupo_opcion_control=null;
	grupo_opcion_controlInicial=null;
	grupo_opcion_controlAuxiliar=null;
		
	//if(grupo_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(grupo_opcion_control) {
		super();
		
		this.grupo_opcion_control=grupo_opcion_control;
	}
		
	actualizarVariablesPagina(grupo_opcion_control) {
		
		if(grupo_opcion_control.action=="index" || grupo_opcion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(grupo_opcion_control);
			
		} 
		
		
		
	
		else if(grupo_opcion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(grupo_opcion_control);	
		
		} else if(grupo_opcion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(grupo_opcion_control);		
		}
	
		else if(grupo_opcion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(grupo_opcion_control);		
		}
	
		else if(grupo_opcion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(grupo_opcion_control);
		}
		
		
		else if(grupo_opcion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(grupo_opcion_control);		
		
		} else if(grupo_opcion_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(grupo_opcion_control);		
		
		} 
		//else if(grupo_opcion_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(grupo_opcion_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + grupo_opcion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(grupo_opcion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(grupo_opcion_control) {
		this.actualizarPaginaAccionesGenerales(grupo_opcion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(grupo_opcion_control) {
		
		this.actualizarPaginaCargaGeneral(grupo_opcion_control);
		this.actualizarPaginaOrderBy(grupo_opcion_control);
		this.actualizarPaginaTablaDatos(grupo_opcion_control);
		this.actualizarPaginaCargaGeneralControles(grupo_opcion_control);
		//this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(grupo_opcion_control);
		this.actualizarPaginaAreaBusquedas(grupo_opcion_control);
		this.actualizarPaginaCargaCombosFK(grupo_opcion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(grupo_opcion_control) {
		//this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(grupo_opcion_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(grupo_opcion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(grupo_opcion_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(grupo_opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(grupo_opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(grupo_opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(grupo_opcion_control) {
		this.actualizarPaginaCargaGeneralControles(grupo_opcion_control);
		this.actualizarPaginaCargaCombosFK(grupo_opcion_control);
		this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(grupo_opcion_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(grupo_opcion_control) {
		this.actualizarPaginaCargaGeneralControles(grupo_opcion_control);
		this.actualizarPaginaCargaCombosFK(grupo_opcion_control);
		this.actualizarPaginaFormulario(grupo_opcion_control);
		this.onLoadCombosDefectoFK(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(grupo_opcion_control) {
		//FORMULARIO
		if(grupo_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(grupo_opcion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(grupo_opcion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		
		//COMBOS FK
		if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(grupo_opcion_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(grupo_opcion_control) {
		//FORMULARIO
		if(grupo_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(grupo_opcion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(grupo_opcion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);	
		
		//COMBOS FK
		if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(grupo_opcion_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(grupo_opcion_control) {
		//FORMULARIO
		if(grupo_opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(grupo_opcion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);	
		//COMBOS FK
		if(grupo_opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(grupo_opcion_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(grupo_opcion_control) {
		
		if(grupo_opcion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(grupo_opcion_control);
		}
		
		if(grupo_opcion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(grupo_opcion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(grupo_opcion_control) {
		if(grupo_opcion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("grupo_opcionReturnGeneral",JSON.stringify(grupo_opcion_control.grupo_opcionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control) {
		if(grupo_opcion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && grupo_opcion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(grupo_opcion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(grupo_opcion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(grupo_opcion_control, mostrar) {
		
		if(mostrar==true) {
			grupo_opcion_funcion1.resaltarRestaurarDivsPagina(false,"grupo_opcion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				grupo_opcion_funcion1.resaltarRestaurarDivMantenimiento(false,"grupo_opcion");
			}			
			
			grupo_opcion_funcion1.mostrarDivMensaje(true,grupo_opcion_control.strAuxiliarMensaje,grupo_opcion_control.strAuxiliarCssMensaje);
		
		} else {
			grupo_opcion_funcion1.mostrarDivMensaje(false,grupo_opcion_control.strAuxiliarMensaje,grupo_opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(grupo_opcion_control) {
		if(grupo_opcion_funcion1.esPaginaForm(grupo_opcion_constante1)==true) {
			window.opener.grupo_opcion_webcontrol1.actualizarPaginaTablaDatos(grupo_opcion_control);
		} else {
			this.actualizarPaginaTablaDatos(grupo_opcion_control);
		}
	}
	
	actualizarPaginaAbrirLink(grupo_opcion_control) {
		grupo_opcion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(grupo_opcion_control.strAuxiliarUrlPagina);
				
		grupo_opcion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(grupo_opcion_control.strAuxiliarTipo,grupo_opcion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(grupo_opcion_control) {
		grupo_opcion_funcion1.resaltarRestaurarDivMensaje(true,grupo_opcion_control.strAuxiliarMensajeAlert,grupo_opcion_control.strAuxiliarCssMensaje);
			
		if(grupo_opcion_funcion1.esPaginaForm(grupo_opcion_constante1)==true) {
			window.opener.grupo_opcion_funcion1.resaltarRestaurarDivMensaje(true,grupo_opcion_control.strAuxiliarMensajeAlert,grupo_opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(grupo_opcion_control) {
		this.grupo_opcion_controlInicial=grupo_opcion_control;
			
		if(grupo_opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(grupo_opcion_control.strStyleDivArbol,grupo_opcion_control.strStyleDivContent
																,grupo_opcion_control.strStyleDivOpcionesBanner,grupo_opcion_control.strStyleDivExpandirColapsar
																,grupo_opcion_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(grupo_opcion_control) {
		this.actualizarCssBotonesPagina(grupo_opcion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(grupo_opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(grupo_opcion_control.tiposReportes,grupo_opcion_control.tiposReporte
															 	,grupo_opcion_control.tiposPaginacion,grupo_opcion_control.tiposAcciones
																,grupo_opcion_control.tiposColumnasSelect,grupo_opcion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(grupo_opcion_control.tiposRelaciones,grupo_opcion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(grupo_opcion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(grupo_opcion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(grupo_opcion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(grupo_opcion_control) {
	
		var indexPosition=grupo_opcion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=grupo_opcion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(grupo_opcion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(grupo_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",grupo_opcion_control.strRecargarFkTipos,",")) { 
				grupo_opcion_webcontrol1.cargarCombosmodulosFK(grupo_opcion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(grupo_opcion_control.strRecargarFkTiposNinguno!=null && grupo_opcion_control.strRecargarFkTiposNinguno!='NINGUNO' && grupo_opcion_control.strRecargarFkTiposNinguno!='') {
			
				if(grupo_opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modulo",grupo_opcion_control.strRecargarFkTiposNinguno,",")) { 
					grupo_opcion_webcontrol1.cargarCombosmodulosFK(grupo_opcion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablamoduloFK(grupo_opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,grupo_opcion_funcion1,grupo_opcion_control.modulosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(grupo_opcion_control) {
		jQuery("#tdgrupo_opcionNuevo").css("display",grupo_opcion_control.strPermisoNuevo);
		jQuery("#trgrupo_opcionElementos").css("display",grupo_opcion_control.strVisibleTablaElementos);
		jQuery("#trgrupo_opcionAcciones").css("display",grupo_opcion_control.strVisibleTablaAcciones);
		jQuery("#trgrupo_opcionParametrosAcciones").css("display",grupo_opcion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(grupo_opcion_control) {
	
		this.actualizarCssBotonesMantenimiento(grupo_opcion_control);
				
		if(grupo_opcion_control.grupo_opcionActual!=null) {//form
			
			this.actualizarCamposFormulario(grupo_opcion_control);			
		}
						
		this.actualizarSpanMensajesCampos(grupo_opcion_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(grupo_opcion_control) {
	
		jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id").val(grupo_opcion_control.grupo_opcionActual.id);
		jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-created_at").val(grupo_opcion_control.grupo_opcionActual.versionRow);
		jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-updated_at").val(grupo_opcion_control.grupo_opcionActual.versionRow);
		
		if(grupo_opcion_control.grupo_opcionActual.id_modulo!=null && grupo_opcion_control.grupo_opcionActual.id_modulo>-1){
			if(jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").val() != grupo_opcion_control.grupo_opcionActual.id_modulo) {
				jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").val(grupo_opcion_control.grupo_opcionActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").select2("val", null);
			if(jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-codigo").val(grupo_opcion_control.grupo_opcionActual.codigo);
		jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-nombre_principal").val(grupo_opcion_control.grupo_opcionActual.nombre_principal);
		jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-orden").val(grupo_opcion_control.grupo_opcionActual.orden);
		jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-estado").prop('checked',grupo_opcion_control.grupo_opcionActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+grupo_opcion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("grupo_opcion","seguridad","","form_grupo_opcion",formulario,"","",paraEventoTabla,idFilaTabla,grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
	}
	
	actualizarSpanMensajesCampos(grupo_opcion_control) {
		jQuery("#spanstrMensajeid").text(grupo_opcion_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(grupo_opcion_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(grupo_opcion_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_modulo").text(grupo_opcion_control.strMensajeid_modulo);		
		jQuery("#spanstrMensajecodigo").text(grupo_opcion_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre_principal").text(grupo_opcion_control.strMensajenombre_principal);		
		jQuery("#spanstrMensajeorden").text(grupo_opcion_control.strMensajeorden);		
		jQuery("#spanstrMensajeestado").text(grupo_opcion_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(grupo_opcion_control) {
		jQuery("#tdbtnNuevogrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevogrupo_opcion").css("display",grupo_opcion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizargrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizargrupo_opcion").css("display",grupo_opcion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminargrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminargrupo_opcion").css("display",grupo_opcion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelargrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosgrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosgrupo_opcion").css("display",grupo_opcion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBargrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBargrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBargrupo_opcion").css("visibility",grupo_opcion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosmodulosFK(grupo_opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo",grupo_opcion_control.modulosFK);

		if(grupo_opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+grupo_opcion_control.idFilaTablaActual+"_3",grupo_opcion_control.modulosFK);
		}
	};

	
	
	registrarComboActionChangeCombosmodulosFK(grupo_opcion_control) {

	};

	
	
	setDefectoValorCombosmodulosFK(grupo_opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(grupo_opcion_control.idmoduloDefaultFK>-1 && jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").val() != grupo_opcion_control.idmoduloDefaultFK) {
				jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").val(grupo_opcion_control.idmoduloDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//grupo_opcion_control
		
	
	}
	
	onLoadCombosDefectoFK(grupo_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(grupo_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(grupo_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",grupo_opcion_control.strRecargarFkTipos,",")) { 
				grupo_opcion_webcontrol1.setDefectoValorCombosmodulosFK(grupo_opcion_control);
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
	onLoadCombosEventosFK(grupo_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(grupo_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(grupo_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",grupo_opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				grupo_opcion_webcontrol1.registrarComboActionChangeCombosmodulosFK(grupo_opcion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(grupo_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(grupo_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(grupo_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(grupo_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				grupo_opcion_funcion1.validarFormularioJQuery(grupo_opcion_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("grupo_opcion");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("grupo_opcion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(grupo_opcion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,"grupo_opcion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("modulo","id_modulo","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo_img_busqueda").click(function(){
				grupo_opcion_webcontrol1.abrirBusquedaParamodulo("id_modulo");
				//alert(jQuery('#form-id_modulo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("grupo_opcion");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(grupo_opcion_control) {
		
		
		
		if(grupo_opcion_control.strPermisoActualizar!=null) {
			jQuery("#tdgrupo_opcionActualizarToolBar").css("display",grupo_opcion_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdgrupo_opcionEliminarToolBar").css("display",grupo_opcion_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trgrupo_opcionElementos").css("display",grupo_opcion_control.strVisibleTablaElementos);
		
		jQuery("#trgrupo_opcionAcciones").css("display",grupo_opcion_control.strVisibleTablaAcciones);
		jQuery("#trgrupo_opcionParametrosAcciones").css("display",grupo_opcion_control.strVisibleTablaAcciones);
		
		jQuery("#tdgrupo_opcionCerrarPagina").css("display",grupo_opcion_control.strPermisoPopup);		
		jQuery("#tdgrupo_opcionCerrarPaginaToolBar").css("display",grupo_opcion_control.strPermisoPopup);
		//jQuery("#trgrupo_opcionAccionesRelaciones").css("display",grupo_opcion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=grupo_opcion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + grupo_opcion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + grupo_opcion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Grupo Opcions";
		sTituloBanner+=" - " + grupo_opcion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + grupo_opcion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdgrupo_opcionRelacionesToolBar").css("display",grupo_opcion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosgrupo_opcion").css("display",grupo_opcion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		grupo_opcion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		grupo_opcion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		grupo_opcion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		grupo_opcion_webcontrol1.registrarEventosControles();
		
		if(grupo_opcion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(grupo_opcion_constante1.STR_ES_RELACIONADO=="false") {
			grupo_opcion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(grupo_opcion_constante1.STR_ES_RELACIONES=="true") {
			if(grupo_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				grupo_opcion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(grupo_opcion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(grupo_opcion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(grupo_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(grupo_opcion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
						//grupo_opcion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(grupo_opcion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(grupo_opcion_constante1.BIG_ID_ACTUAL,"grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
						//grupo_opcion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			grupo_opcion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);	
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

var grupo_opcion_webcontrol1 = new grupo_opcion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {grupo_opcion_webcontrol,grupo_opcion_webcontrol1};

//Para ser llamado desde window.opener
window.grupo_opcion_webcontrol1 = grupo_opcion_webcontrol1;


if(grupo_opcion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = grupo_opcion_webcontrol1.onLoadWindow; 
}

//</script>