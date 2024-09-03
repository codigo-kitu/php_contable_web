//<script type="text/javascript" language="javascript">



//var opcionJQueryPaginaWebInteraccion= function (opcion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {opcion_constante,opcion_constante1} from '../util/opcion_constante.js';

import {opcion_funcion,opcion_funcion1} from '../util/opcion_form_funcion.js';


class opcion_webcontrol extends GeneralEntityWebControl {
	
	opcion_control=null;
	opcion_controlInicial=null;
	opcion_controlAuxiliar=null;
		
	//if(opcion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(opcion_control) {
		super();
		
		this.opcion_control=opcion_control;
	}
		
	actualizarVariablesPagina(opcion_control) {
		
		if(opcion_control.action=="index" || opcion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(opcion_control);
			
		} 
		
		
		
	
		else if(opcion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(opcion_control);	
		
		} else if(opcion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(opcion_control);		
		}
	
		else if(opcion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(opcion_control);		
		}
	
		else if(opcion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(opcion_control);
		}
		
		
		else if(opcion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(opcion_control);
		
		} else if(opcion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(opcion_control);
		
		} else if(opcion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(opcion_control);
		
		} else if(opcion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(opcion_control);
		
		} else if(opcion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(opcion_control);
		
		} else if(opcion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(opcion_control);		
		
		} else if(opcion_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(opcion_control);		
		
		} 
		//else if(opcion_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(opcion_control);		
		//}

		else if(opcion_control.action=="abrirArbol") {
			this.actualizarVariablesPaginaAccionAbrirArbol(opcion_control);
		}
		else if(opcion_control.action=="cargarArbol") {
			this.actualizarVariablesPaginaAccionCargarArbol(opcion_control);
		}
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + opcion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(opcion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(opcion_control) {
		this.actualizarPaginaAccionesGenerales(opcion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(opcion_control) {
		
		this.actualizarPaginaCargaGeneral(opcion_control);
		this.actualizarPaginaOrderBy(opcion_control);
		this.actualizarPaginaTablaDatos(opcion_control);
		this.actualizarPaginaCargaGeneralControles(opcion_control);
		//this.actualizarPaginaFormulario(opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(opcion_control);
		this.actualizarPaginaAreaBusquedas(opcion_control);
		this.actualizarPaginaCargaCombosFK(opcion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(opcion_control) {
		//this.actualizarPaginaFormulario(opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		this.actualizarPaginaAreaMantenimiento(opcion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(opcion_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(opcion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(opcion_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(opcion_control);		
		this.actualizarPaginaFormulario(opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		this.actualizarPaginaAreaMantenimiento(opcion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(opcion_control);		
		this.actualizarPaginaFormulario(opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		this.actualizarPaginaAreaMantenimiento(opcion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(opcion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(opcion_control);		
		this.actualizarPaginaFormulario(opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		this.actualizarPaginaAreaMantenimiento(opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(opcion_control) {
		this.actualizarPaginaCargaGeneralControles(opcion_control);
		this.actualizarPaginaCargaCombosFK(opcion_control);
		this.actualizarPaginaFormulario(opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		this.actualizarPaginaAreaMantenimiento(opcion_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(opcion_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(opcion_control) {
		this.actualizarPaginaCargaGeneralControles(opcion_control);
		this.actualizarPaginaCargaCombosFK(opcion_control);
		this.actualizarPaginaFormulario(opcion_control);
		this.onLoadCombosDefectoFK(opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		this.actualizarPaginaAreaMantenimiento(opcion_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(opcion_control) {
		//FORMULARIO
		if(opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(opcion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(opcion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);		
		
		//COMBOS FK
		if(opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(opcion_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(opcion_control) {
		//FORMULARIO
		if(opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(opcion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(opcion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);	
		
		//COMBOS FK
		if(opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(opcion_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(opcion_control) {
		//FORMULARIO
		if(opcion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(opcion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(opcion_control);	
		//COMBOS FK
		if(opcion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(opcion_control);
		}
	}
	
	actualizarVariablesPaginaAccionAbrirArbol(opcion_control) {
		
	}
	
	actualizarVariablesPaginaAccionCargarArbol(opcion_control) {
		
	}
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(opcion_control) {
		
		if(opcion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(opcion_control);
		}
		
		if(opcion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(opcion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(opcion_control) {
		if(opcion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("opcionReturnGeneral",JSON.stringify(opcion_control.opcionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(opcion_control) {
		if(opcion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && opcion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(opcion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(opcion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(opcion_control, mostrar) {
		
		if(mostrar==true) {
			opcion_funcion1.resaltarRestaurarDivsPagina(false,"opcion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				opcion_funcion1.resaltarRestaurarDivMantenimiento(false,"opcion");
			}			
			
			opcion_funcion1.mostrarDivMensaje(true,opcion_control.strAuxiliarMensaje,opcion_control.strAuxiliarCssMensaje);
		
		} else {
			opcion_funcion1.mostrarDivMensaje(false,opcion_control.strAuxiliarMensaje,opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(opcion_control) {
		if(opcion_funcion1.esPaginaForm(opcion_constante1)==true) {
			window.opener.opcion_webcontrol1.actualizarPaginaTablaDatos(opcion_control);
		} else {
			this.actualizarPaginaTablaDatos(opcion_control);
		}
	}
	
	actualizarPaginaAbrirLink(opcion_control) {
		opcion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(opcion_control.strAuxiliarUrlPagina);
				
		opcion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(opcion_control.strAuxiliarTipo,opcion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(opcion_control) {
		opcion_funcion1.resaltarRestaurarDivMensaje(true,opcion_control.strAuxiliarMensajeAlert,opcion_control.strAuxiliarCssMensaje);
			
		if(opcion_funcion1.esPaginaForm(opcion_constante1)==true) {
			window.opener.opcion_funcion1.resaltarRestaurarDivMensaje(true,opcion_control.strAuxiliarMensajeAlert,opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(opcion_control) {
		this.opcion_controlInicial=opcion_control;
			
		if(opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(opcion_control.strStyleDivArbol,opcion_control.strStyleDivContent
																,opcion_control.strStyleDivOpcionesBanner,opcion_control.strStyleDivExpandirColapsar
																,opcion_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(opcion_control) {
		this.actualizarCssBotonesPagina(opcion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(opcion_control.tiposReportes,opcion_control.tiposReporte
															 	,opcion_control.tiposPaginacion,opcion_control.tiposAcciones
																,opcion_control.tiposColumnasSelect,opcion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(opcion_control.tiposRelaciones,opcion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(opcion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(opcion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(opcion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(opcion_control) {
	
		var indexPosition=opcion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=opcion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(opcion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.cargarCombossistemasFK(opcion_control);
			}

			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.cargarCombosopcionsFK(opcion_control);
			}

			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_grupo_opcion",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.cargarCombosgrupo_opcionsFK(opcion_control);
			}

			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.cargarCombosmodulosFK(opcion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(opcion_control.strRecargarFkTiposNinguno!=null && opcion_control.strRecargarFkTiposNinguno!='NINGUNO' && opcion_control.strRecargarFkTiposNinguno!='') {
			
				if(opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sistema",opcion_control.strRecargarFkTiposNinguno,",")) { 
					opcion_webcontrol1.cargarCombossistemasFK(opcion_control);
				}

				if(opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_opcion",opcion_control.strRecargarFkTiposNinguno,",")) { 
					opcion_webcontrol1.cargarCombosopcionsFK(opcion_control);
				}

				if(opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_grupo_opcion",opcion_control.strRecargarFkTiposNinguno,",")) { 
					opcion_webcontrol1.cargarCombosgrupo_opcionsFK(opcion_control);
				}

				if(opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modulo",opcion_control.strRecargarFkTiposNinguno,",")) { 
					opcion_webcontrol1.cargarCombosmodulosFK(opcion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablasistemaFK(opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,opcion_funcion1,opcion_control.sistemasFK);
	}

	cargarComboEditarTablaopcionFK(opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,opcion_funcion1,opcion_control.opcionsFK);
	}

	cargarComboEditarTablagrupo_opcionFK(opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,opcion_funcion1,opcion_control.grupo_opcionsFK);
	}

	cargarComboEditarTablamoduloFK(opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,opcion_funcion1,opcion_control.modulosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(opcion_control) {
		jQuery("#tdopcionNuevo").css("display",opcion_control.strPermisoNuevo);
		jQuery("#tropcionElementos").css("display",opcion_control.strVisibleTablaElementos);
		jQuery("#tropcionAcciones").css("display",opcion_control.strVisibleTablaAcciones);
		jQuery("#tropcionParametrosAcciones").css("display",opcion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(opcion_control) {
	
		this.actualizarCssBotonesMantenimiento(opcion_control);
				
		if(opcion_control.opcionActual!=null) {//form
			
			this.actualizarCamposFormulario(opcion_control);			
		}
						
		this.actualizarSpanMensajesCampos(opcion_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(opcion_control) {
	
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id").val(opcion_control.opcionActual.id);
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-created_at").val(opcion_control.opcionActual.versionRow);
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-updated_at").val(opcion_control.opcionActual.versionRow);
		
		if(opcion_control.opcionActual.id_sistema!=null && opcion_control.opcionActual.id_sistema>-1){
			if(jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_sistema").val() != opcion_control.opcionActual.id_sistema) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_sistema").val(opcion_control.opcionActual.id_sistema).trigger("change");
			}
		} else { 
			//jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_sistema").select2("val", null);
			if(jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(opcion_control.opcionActual.id_opcion!=null && opcion_control.opcionActual.id_opcion>-1){
			if(jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_opcion").val() != opcion_control.opcionActual.id_opcion) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_opcion").val(opcion_control.opcionActual.id_opcion).trigger("change");
			}
		} else { 
			if(jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_opcion").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(opcion_control.opcionActual.id_grupo_opcion!=null && opcion_control.opcionActual.id_grupo_opcion>-1){
			if(jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_grupo_opcion").val() != opcion_control.opcionActual.id_grupo_opcion) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_grupo_opcion").val(opcion_control.opcionActual.id_grupo_opcion).trigger("change");
			}
		} else { 
			//jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_grupo_opcion").select2("val", null);
			if(jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_grupo_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_grupo_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(opcion_control.opcionActual.id_modulo!=null && opcion_control.opcionActual.id_modulo>-1){
			if(jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_modulo").val() != opcion_control.opcionActual.id_modulo) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_modulo").val(opcion_control.opcionActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_modulo").select2("val", null);
			if(jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-codigo").val(opcion_control.opcionActual.codigo);
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-nombre").val(opcion_control.opcionActual.nombre);
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-posicion").val(opcion_control.opcionActual.posicion);
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-icon_name").val(opcion_control.opcionActual.icon_name);
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-nombre_clase").val(opcion_control.opcionActual.nombre_clase);
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-modulo0").val(opcion_control.opcionActual.modulo0);
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-sub_modulo").val(opcion_control.opcionActual.sub_modulo);
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-paquete").val(opcion_control.opcionActual.paquete);
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-es_para_menu").prop('checked',opcion_control.opcionActual.es_para_menu);
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-es_guardar_relaciones").prop('checked',opcion_control.opcionActual.es_guardar_relaciones);
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-con_mostrar_acciones_campo").prop('checked',opcion_control.opcionActual.con_mostrar_acciones_campo);
		jQuery("#form"+opcion_constante1.STR_SUFIJO+"-estado").prop('checked',opcion_control.opcionActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+opcion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("opcion","seguridad","","form_opcion",formulario,"","",paraEventoTabla,idFilaTabla,opcion_funcion1,opcion_webcontrol1,opcion_constante1);
	}
	
	actualizarSpanMensajesCampos(opcion_control) {
		jQuery("#spanstrMensajeid").text(opcion_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(opcion_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(opcion_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_sistema").text(opcion_control.strMensajeid_sistema);		
		jQuery("#spanstrMensajeid_opcion").text(opcion_control.strMensajeid_opcion);		
		jQuery("#spanstrMensajeid_grupo_opcion").text(opcion_control.strMensajeid_grupo_opcion);		
		jQuery("#spanstrMensajeid_modulo").text(opcion_control.strMensajeid_modulo);		
		jQuery("#spanstrMensajecodigo").text(opcion_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(opcion_control.strMensajenombre);		
		jQuery("#spanstrMensajeposicion").text(opcion_control.strMensajeposicion);		
		jQuery("#spanstrMensajeicon_name").text(opcion_control.strMensajeicon_name);		
		jQuery("#spanstrMensajenombre_clase").text(opcion_control.strMensajenombre_clase);		
		jQuery("#spanstrMensajemodulo0").text(opcion_control.strMensajemodulo0);		
		jQuery("#spanstrMensajesub_modulo").text(opcion_control.strMensajesub_modulo);		
		jQuery("#spanstrMensajepaquete").text(opcion_control.strMensajepaquete);		
		jQuery("#spanstrMensajees_para_menu").text(opcion_control.strMensajees_para_menu);		
		jQuery("#spanstrMensajees_guardar_relaciones").text(opcion_control.strMensajees_guardar_relaciones);		
		jQuery("#spanstrMensajecon_mostrar_acciones_campo").text(opcion_control.strMensajecon_mostrar_acciones_campo);		
		jQuery("#spanstrMensajeestado").text(opcion_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(opcion_control) {
		jQuery("#tdbtnNuevoopcion").css("visibility",opcion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoopcion").css("display",opcion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizaropcion").css("visibility",opcion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizaropcion").css("display",opcion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminaropcion").css("visibility",opcion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminaropcion").css("display",opcion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelaropcion").css("visibility",opcion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosopcion").css("visibility",opcion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosopcion").css("display",opcion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBaropcion").css("visibility",opcion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBaropcion").css("visibility",opcion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBaropcion").css("visibility",opcion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombossistemasFK(opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+opcion_constante1.STR_SUFIJO+"-id_sistema",opcion_control.sistemasFK);

		if(opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+opcion_control.idFilaTablaActual+"_3",opcion_control.sistemasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_sistema",opcion_control.sistemasFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorNombre-cmbid_sistema",opcion_control.sistemasFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+opcion_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema",opcion_control.sistemasFK);

	};

	cargarCombosopcionsFK(opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+opcion_constante1.STR_SUFIJO+"-id_opcion",opcion_control.opcionsFK);

		if(opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+opcion_control.idFilaTablaActual+"_4",opcion_control.opcionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_opcion",opcion_control.opcionsFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion",opcion_control.opcionsFK);

	};

	cargarCombosgrupo_opcionsFK(opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+opcion_constante1.STR_SUFIJO+"-id_grupo_opcion",opcion_control.grupo_opcionsFK);

		if(opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+opcion_control.idFilaTablaActual+"_5",opcion_control.grupo_opcionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+opcion_constante1.STR_SUFIJO+"FK_Idgrupo_opcion-cmbid_grupo_opcion",opcion_control.grupo_opcionsFK);

	};

	cargarCombosmodulosFK(opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+opcion_constante1.STR_SUFIJO+"-id_modulo",opcion_control.modulosFK);

		if(opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+opcion_control.idFilaTablaActual+"_6",opcion_control.modulosFK);
		}
	};

	
	
	registrarComboActionChangeCombossistemasFK(opcion_control) {

	};

	registrarComboActionChangeCombosopcionsFK(opcion_control) {

	};

	registrarComboActionChangeCombosgrupo_opcionsFK(opcion_control) {

	};

	registrarComboActionChangeCombosmodulosFK(opcion_control) {

	};

	
	
	setDefectoValorCombossistemasFK(opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(opcion_control.idsistemaDefaultFK>-1 && jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_sistema").val() != opcion_control.idsistemaDefaultFK) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_sistema").val(opcion_control.idsistemaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_sistema").val(opcion_control.idsistemaDefaultForeignKey).trigger("change");
			if(jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorNombre-cmbid_sistema").val(opcion_control.idsistemaDefaultForeignKey).trigger("change");
			if(jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorNombre-cmbid_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorNombre-cmbid_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(opcion_control.idsistemaDefaultForeignKey).trigger("change");
			if(jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idsistema-cmbid_sistema").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosopcionsFK(opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(opcion_control.idopcionDefaultFK>-1 && jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_opcion").val() != opcion_control.idopcionDefaultFK) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_opcion").val(opcion_control.idopcionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_opcion").val(opcion_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+opcion_constante1.STR_SUFIJO+"BusquedaPorIdSistemaPorIdOpcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(opcion_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosgrupo_opcionsFK(opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(opcion_control.idgrupo_opcionDefaultFK>-1 && jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_grupo_opcion").val() != opcion_control.idgrupo_opcionDefaultFK) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_grupo_opcion").val(opcion_control.idgrupo_opcionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idgrupo_opcion-cmbid_grupo_opcion").val(opcion_control.idgrupo_opcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idgrupo_opcion-cmbid_grupo_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+opcion_constante1.STR_SUFIJO+"FK_Idgrupo_opcion-cmbid_grupo_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmodulosFK(opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(opcion_control.idmoduloDefaultFK>-1 && jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_modulo").val() != opcion_control.idmoduloDefaultFK) {
				jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_modulo").val(opcion_control.idmoduloDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//opcion_control
		
	
	}
	
	onLoadCombosDefectoFK(opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.setDefectoValorCombossistemasFK(opcion_control);
			}

			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.setDefectoValorCombosopcionsFK(opcion_control);
			}

			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_grupo_opcion",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.setDefectoValorCombosgrupo_opcionsFK(opcion_control);
			}

			if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",opcion_control.strRecargarFkTipos,",")) { 
				opcion_webcontrol1.setDefectoValorCombosmodulosFK(opcion_control);
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
	onLoadCombosEventosFK(opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sistema",opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				opcion_webcontrol1.registrarComboActionChangeCombossistemasFK(opcion_control);
			//}

			//if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				opcion_webcontrol1.registrarComboActionChangeCombosopcionsFK(opcion_control);
			//}

			//if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_grupo_opcion",opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				opcion_webcontrol1.registrarComboActionChangeCombosgrupo_opcionsFK(opcion_control);
			//}

			//if(opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				opcion_webcontrol1.registrarComboActionChangeCombosmodulosFK(opcion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(opcion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				opcion_funcion1.validarFormularioJQuery(opcion_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("opcion");		
			
			funcionGeneralEventoJQuery.setBotonArbolAbrirClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("opcion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(opcion_funcion1,opcion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(opcion_funcion1,opcion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(opcion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,"opcion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sistema","id_sistema","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_sistema_img_busqueda").click(function(){
				opcion_webcontrol1.abrirBusquedaParasistema("id_sistema");
				//alert(jQuery('#form-id_sistema_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("opcion","id_opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_opcion_img_busqueda").click(function(){
				opcion_webcontrol1.abrirBusquedaParaopcion("id_opcion");
				//alert(jQuery('#form-id_opcion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("grupo_opcion","id_grupo_opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_grupo_opcion_img_busqueda").click(function(){
				opcion_webcontrol1.abrirBusquedaParagrupo_opcion("id_grupo_opcion");
				//alert(jQuery('#form-id_grupo_opcion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("modulo","id_modulo","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+opcion_constante1.STR_SUFIJO+"-id_modulo_img_busqueda").click(function(){
				opcion_webcontrol1.abrirBusquedaParamodulo("id_modulo");
				//alert(jQuery('#form-id_modulo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("opcion");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(opcion_control) {
		
		
		
		if(opcion_control.strPermisoActualizar!=null) {
			jQuery("#tdopcionActualizarToolBar").css("display",opcion_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdopcionEliminarToolBar").css("display",opcion_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#tropcionElementos").css("display",opcion_control.strVisibleTablaElementos);
		
		jQuery("#tropcionAcciones").css("display",opcion_control.strVisibleTablaAcciones);
		jQuery("#tropcionParametrosAcciones").css("display",opcion_control.strVisibleTablaAcciones);
		
		jQuery("#tdopcionCerrarPagina").css("display",opcion_control.strPermisoPopup);		
		jQuery("#tdopcionCerrarPaginaToolBar").css("display",opcion_control.strPermisoPopup);
		//jQuery("#tropcionAccionesRelaciones").css("display",opcion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=opcion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + opcion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + opcion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Opciones";
		sTituloBanner+=" - " + opcion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + opcion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdopcionRelacionesToolBar").css("display",opcion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosopcion").css("display",opcion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		opcion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		opcion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		opcion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		opcion_webcontrol1.registrarEventosControles();
		
		if(opcion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(opcion_constante1.STR_ES_RELACIONADO=="false") {
			opcion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(opcion_constante1.STR_ES_RELACIONES=="true") {
			if(opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				opcion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(opcion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(opcion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(opcion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
						//opcion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(opcion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(opcion_constante1.BIG_ID_ACTUAL,"opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);
						//opcion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			opcion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("opcion","seguridad","",opcion_funcion1,opcion_webcontrol1,opcion_constante1);	
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

var opcion_webcontrol1 = new opcion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {opcion_webcontrol,opcion_webcontrol1};

//Para ser llamado desde window.opener
window.opcion_webcontrol1 = opcion_webcontrol1;


if(opcion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = opcion_webcontrol1.onLoadWindow; 
}

//</script>