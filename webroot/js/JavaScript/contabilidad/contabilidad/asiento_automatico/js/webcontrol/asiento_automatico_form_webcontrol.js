//<script type="text/javascript" language="javascript">



//var asiento_automaticoJQueryPaginaWebInteraccion= function (asiento_automatico_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {asiento_automatico_constante,asiento_automatico_constante1} from '../util/asiento_automatico_constante.js';

import {asiento_automatico_funcion,asiento_automatico_funcion1} from '../util/asiento_automatico_form_funcion.js';


class asiento_automatico_webcontrol extends GeneralEntityWebControl {
	
	asiento_automatico_control=null;
	asiento_automatico_controlInicial=null;
	asiento_automatico_controlAuxiliar=null;
		
	//if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(asiento_automatico_control) {
		super();
		
		this.asiento_automatico_control=asiento_automatico_control;
	}
		
	actualizarVariablesPagina(asiento_automatico_control) {
		
		if(asiento_automatico_control.action=="index" || asiento_automatico_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(asiento_automatico_control);
			
		} 
		
		
		
	
		else if(asiento_automatico_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(asiento_automatico_control);	
		
		} else if(asiento_automatico_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_automatico_control);		
		}
	
		else if(asiento_automatico_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_automatico_control);		
		}
	
		else if(asiento_automatico_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(asiento_automatico_control);
		}
		
		
		else if(asiento_automatico_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(asiento_automatico_control);		
		
		} else if(asiento_automatico_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_automatico_control);		
		
		} 
		//else if(asiento_automatico_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_automatico_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + asiento_automatico_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(asiento_automatico_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(asiento_automatico_control) {
		this.actualizarPaginaAccionesGenerales(asiento_automatico_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(asiento_automatico_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_automatico_control);
		this.actualizarPaginaOrderBy(asiento_automatico_control);
		this.actualizarPaginaTablaDatos(asiento_automatico_control);
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_control);
		//this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_control);
		this.actualizarPaginaAreaBusquedas(asiento_automatico_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(asiento_automatico_control) {
		//this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_automatico_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(asiento_automatico_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_automatico_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(asiento_automatico_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(asiento_automatico_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(asiento_automatico_control) {
		this.actualizarPaginaTablaDatosAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(asiento_automatico_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_control);
		this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(asiento_automatico_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(asiento_automatico_control) {
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_control);
		this.actualizarPaginaFormulario(asiento_automatico_control);
		this.onLoadCombosDefectoFK(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(asiento_automatico_control) {
		//FORMULARIO
		if(asiento_automatico_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_automatico_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(asiento_automatico_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		
		//COMBOS FK
		if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_automatico_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(asiento_automatico_control) {
		//FORMULARIO
		if(asiento_automatico_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_automatico_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(asiento_automatico_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);	
		
		//COMBOS FK
		if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_automatico_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(asiento_automatico_control) {
		//FORMULARIO
		if(asiento_automatico_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(asiento_automatico_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);	
		//COMBOS FK
		if(asiento_automatico_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(asiento_automatico_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(asiento_automatico_control) {
		
		if(asiento_automatico_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(asiento_automatico_control);
		}
		
		if(asiento_automatico_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(asiento_automatico_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(asiento_automatico_control) {
		if(asiento_automatico_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("asiento_automaticoReturnGeneral",JSON.stringify(asiento_automatico_control.asiento_automaticoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control) {
		if(asiento_automatico_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_automatico_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(asiento_automatico_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(asiento_automatico_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(asiento_automatico_control, mostrar) {
		
		if(mostrar==true) {
			asiento_automatico_funcion1.resaltarRestaurarDivsPagina(false,"asiento_automatico");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				asiento_automatico_funcion1.resaltarRestaurarDivMantenimiento(false,"asiento_automatico");
			}			
			
			asiento_automatico_funcion1.mostrarDivMensaje(true,asiento_automatico_control.strAuxiliarMensaje,asiento_automatico_control.strAuxiliarCssMensaje);
		
		} else {
			asiento_automatico_funcion1.mostrarDivMensaje(false,asiento_automatico_control.strAuxiliarMensaje,asiento_automatico_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(asiento_automatico_control) {
		if(asiento_automatico_funcion1.esPaginaForm(asiento_automatico_constante1)==true) {
			window.opener.asiento_automatico_webcontrol1.actualizarPaginaTablaDatos(asiento_automatico_control);
		} else {
			this.actualizarPaginaTablaDatos(asiento_automatico_control);
		}
	}
	
	actualizarPaginaAbrirLink(asiento_automatico_control) {
		asiento_automatico_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(asiento_automatico_control.strAuxiliarUrlPagina);
				
		asiento_automatico_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(asiento_automatico_control.strAuxiliarTipo,asiento_automatico_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(asiento_automatico_control) {
		asiento_automatico_funcion1.resaltarRestaurarDivMensaje(true,asiento_automatico_control.strAuxiliarMensajeAlert,asiento_automatico_control.strAuxiliarCssMensaje);
			
		if(asiento_automatico_funcion1.esPaginaForm(asiento_automatico_constante1)==true) {
			window.opener.asiento_automatico_funcion1.resaltarRestaurarDivMensaje(true,asiento_automatico_control.strAuxiliarMensajeAlert,asiento_automatico_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(asiento_automatico_control) {
		this.asiento_automatico_controlInicial=asiento_automatico_control;
			
		if(asiento_automatico_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(asiento_automatico_control.strStyleDivArbol,asiento_automatico_control.strStyleDivContent
																,asiento_automatico_control.strStyleDivOpcionesBanner,asiento_automatico_control.strStyleDivExpandirColapsar
																,asiento_automatico_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(asiento_automatico_control) {
		this.actualizarCssBotonesPagina(asiento_automatico_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(asiento_automatico_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(asiento_automatico_control.tiposReportes,asiento_automatico_control.tiposReporte
															 	,asiento_automatico_control.tiposPaginacion,asiento_automatico_control.tiposAcciones
																,asiento_automatico_control.tiposColumnasSelect,asiento_automatico_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(asiento_automatico_control.tiposRelaciones,asiento_automatico_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(asiento_automatico_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(asiento_automatico_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(asiento_automatico_control);			
	}
	
	actualizarPaginaUsuarioInvitado(asiento_automatico_control) {
	
		var indexPosition=asiento_automatico_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=asiento_automatico_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(asiento_automatico_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarCombosempresasFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarCombosmodulosFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarCombosfuentesFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarComboslibro_auxiliarsFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarComboscentro_costosFK(asiento_automatico_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(asiento_automatico_control.strRecargarFkTiposNinguno!=null && asiento_automatico_control.strRecargarFkTiposNinguno!='NINGUNO' && asiento_automatico_control.strRecargarFkTiposNinguno!='') {
			
				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarCombosempresasFK(asiento_automatico_control);
				}

				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modulo",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarCombosmodulosFK(asiento_automatico_control);
				}

				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_fuente",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarCombosfuentesFK(asiento_automatico_control);
				}

				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarComboslibro_auxiliarsFK(asiento_automatico_control);
				}

				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarComboscentro_costosFK(asiento_automatico_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.empresasFK);
	}

	cargarComboEditarTablamoduloFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.modulosFK);
	}

	cargarComboEditarTablafuenteFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.fuentesFK);
	}

	cargarComboEditarTablalibro_auxiliarFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.libro_auxiliarsFK);
	}

	cargarComboEditarTablacentro_costoFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.centro_costosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(asiento_automatico_control) {
		jQuery("#tdasiento_automaticoNuevo").css("display",asiento_automatico_control.strPermisoNuevo);
		jQuery("#trasiento_automaticoElementos").css("display",asiento_automatico_control.strVisibleTablaElementos);
		jQuery("#trasiento_automaticoAcciones").css("display",asiento_automatico_control.strVisibleTablaAcciones);
		jQuery("#trasiento_automaticoParametrosAcciones").css("display",asiento_automatico_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(asiento_automatico_control) {
	
		this.actualizarCssBotonesMantenimiento(asiento_automatico_control);
				
		if(asiento_automatico_control.asiento_automaticoActual!=null) {//form
			
			this.actualizarCamposFormulario(asiento_automatico_control);			
		}
						
		this.actualizarSpanMensajesCampos(asiento_automatico_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(asiento_automatico_control) {
	
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id").val(asiento_automatico_control.asiento_automaticoActual.id);
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-created_at").val(asiento_automatico_control.asiento_automaticoActual.versionRow);
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-updated_at").val(asiento_automatico_control.asiento_automaticoActual.versionRow);
		
		if(asiento_automatico_control.asiento_automaticoActual.id_empresa!=null && asiento_automatico_control.asiento_automaticoActual.id_empresa>-1){
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_automatico_control.asiento_automaticoActual.id_empresa) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").val(asiento_automatico_control.asiento_automaticoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_control.asiento_automaticoActual.id_modulo!=null && asiento_automatico_control.asiento_automaticoActual.id_modulo>-1){
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").val() != asiento_automatico_control.asiento_automaticoActual.id_modulo) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").val(asiento_automatico_control.asiento_automaticoActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").select2("val", null);
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-codigo").val(asiento_automatico_control.asiento_automaticoActual.codigo);
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-nombre").val(asiento_automatico_control.asiento_automaticoActual.nombre);
		
		if(asiento_automatico_control.asiento_automaticoActual.id_fuente!=null && asiento_automatico_control.asiento_automaticoActual.id_fuente>-1){
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").val() != asiento_automatico_control.asiento_automaticoActual.id_fuente) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").val(asiento_automatico_control.asiento_automaticoActual.id_fuente).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").select2("val", null);
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar!=null && asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar>-1){
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").select2("val", null);
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_control.asiento_automaticoActual.id_centro_costo!=null && asiento_automatico_control.asiento_automaticoActual.id_centro_costo>-1){
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_automatico_control.asiento_automaticoActual.id_centro_costo) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_automatico_control.asiento_automaticoActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").select2("val", null);
			if(jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-descripcion").val(asiento_automatico_control.asiento_automaticoActual.descripcion);
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-activo").prop('checked',asiento_automatico_control.asiento_automaticoActual.activo);
		jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-asignada").val(asiento_automatico_control.asiento_automaticoActual.asignada);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+asiento_automatico_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("asiento_automatico","contabilidad","","form_asiento_automatico",formulario,"","",paraEventoTabla,idFilaTabla,asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}
	
	actualizarSpanMensajesCampos(asiento_automatico_control) {
		jQuery("#spanstrMensajeid").text(asiento_automatico_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(asiento_automatico_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(asiento_automatico_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(asiento_automatico_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_modulo").text(asiento_automatico_control.strMensajeid_modulo);		
		jQuery("#spanstrMensajecodigo").text(asiento_automatico_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(asiento_automatico_control.strMensajenombre);		
		jQuery("#spanstrMensajeid_fuente").text(asiento_automatico_control.strMensajeid_fuente);		
		jQuery("#spanstrMensajeid_libro_auxiliar").text(asiento_automatico_control.strMensajeid_libro_auxiliar);		
		jQuery("#spanstrMensajeid_centro_costo").text(asiento_automatico_control.strMensajeid_centro_costo);		
		jQuery("#spanstrMensajedescripcion").text(asiento_automatico_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeactivo").text(asiento_automatico_control.strMensajeactivo);		
		jQuery("#spanstrMensajeasignada").text(asiento_automatico_control.strMensajeasignada);		
	}
	
	actualizarCssBotonesMantenimiento(asiento_automatico_control) {
		jQuery("#tdbtnNuevoasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoasiento_automatico").css("display",asiento_automatico_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarasiento_automatico").css("display",asiento_automatico_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarasiento_automatico").css("display",asiento_automatico_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosasiento_automatico").css("display",asiento_automatico_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarasiento_automatico").css("visibility",asiento_automatico_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa",asiento_automatico_control.empresasFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_3",asiento_automatico_control.empresasFK);
		}
	};

	cargarCombosmodulosFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo",asiento_automatico_control.modulosFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_4",asiento_automatico_control.modulosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo",asiento_automatico_control.modulosFK);

	};

	cargarCombosfuentesFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente",asiento_automatico_control.fuentesFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_7",asiento_automatico_control.fuentesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente",asiento_automatico_control.fuentesFK);

	};

	cargarComboslibro_auxiliarsFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar",asiento_automatico_control.libro_auxiliarsFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_8",asiento_automatico_control.libro_auxiliarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar",asiento_automatico_control.libro_auxiliarsFK);

	};

	cargarComboscentro_costosFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo",asiento_automatico_control.centro_costosFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_9",asiento_automatico_control.centro_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo",asiento_automatico_control.centro_costosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(asiento_automatico_control) {

	};

	registrarComboActionChangeCombosmodulosFK(asiento_automatico_control) {

	};

	registrarComboActionChangeCombosfuentesFK(asiento_automatico_control) {

	};

	registrarComboActionChangeComboslibro_auxiliarsFK(asiento_automatico_control) {

	};

	registrarComboActionChangeComboscentro_costosFK(asiento_automatico_control) {

	};

	
	
	setDefectoValorCombosempresasFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idempresaDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_automatico_control.idempresaDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").val(asiento_automatico_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosmodulosFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idmoduloDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").val() != asiento_automatico_control.idmoduloDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").val(asiento_automatico_control.idmoduloDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val(asiento_automatico_control.idmoduloDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosfuentesFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idfuenteDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").val() != asiento_automatico_control.idfuenteDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").val(asiento_automatico_control.idfuenteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val(asiento_automatico_control.idfuenteDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboslibro_auxiliarsFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idlibro_auxiliarDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != asiento_automatico_control.idlibro_auxiliarDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(asiento_automatico_control.idlibro_auxiliarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(asiento_automatico_control.idlibro_auxiliarDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscentro_costosFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idcentro_costoDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_automatico_control.idcentro_costoDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_automatico_control.idcentro_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(asiento_automatico_control.idcentro_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//asiento_automatico_control
		
	
	}
	
	onLoadCombosDefectoFK(asiento_automatico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorCombosempresasFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorCombosmodulosFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorCombosfuentesFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorComboslibro_auxiliarsFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorComboscentro_costosFK(asiento_automatico_control);
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
	onLoadCombosEventosFK(asiento_automatico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeCombosempresasFK(asiento_automatico_control);
			//}

			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeCombosmodulosFK(asiento_automatico_control);
			//}

			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeCombosfuentesFK(asiento_automatico_control);
			//}

			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeComboslibro_auxiliarsFK(asiento_automatico_control);
			//}

			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeComboscentro_costosFK(asiento_automatico_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(asiento_automatico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(asiento_automatico_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_automatico_funcion1.validarFormularioJQuery(asiento_automatico_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("asiento_automatico");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("asiento_automatico");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(asiento_automatico_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,"asiento_automatico");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("modulo","id_modulo","seguridad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParamodulo("id_modulo");
				//alert(jQuery('#form-id_modulo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("fuente","id_fuente","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParafuente("id_fuente");
				//alert(jQuery('#form-id_fuente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("libro_auxiliar","id_libro_auxiliar","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParalibro_auxiliar("id_libro_auxiliar");
				//alert(jQuery('#form-id_libro_auxiliar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("centro_costo","id_centro_costo","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParacentro_costo("id_centro_costo");
				//alert(jQuery('#form-id_centro_costo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("asiento_automatico");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(asiento_automatico_control) {
		
		
		
		if(asiento_automatico_control.strPermisoActualizar!=null) {
			jQuery("#tdasiento_automaticoActualizarToolBar").css("display",asiento_automatico_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdasiento_automaticoEliminarToolBar").css("display",asiento_automatico_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trasiento_automaticoElementos").css("display",asiento_automatico_control.strVisibleTablaElementos);
		
		jQuery("#trasiento_automaticoAcciones").css("display",asiento_automatico_control.strVisibleTablaAcciones);
		jQuery("#trasiento_automaticoParametrosAcciones").css("display",asiento_automatico_control.strVisibleTablaAcciones);
		
		jQuery("#tdasiento_automaticoCerrarPagina").css("display",asiento_automatico_control.strPermisoPopup);		
		jQuery("#tdasiento_automaticoCerrarPaginaToolBar").css("display",asiento_automatico_control.strPermisoPopup);
		//jQuery("#trasiento_automaticoAccionesRelaciones").css("display",asiento_automatico_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=asiento_automatico_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_automatico_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + asiento_automatico_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Asiento Automaticos";
		sTituloBanner+=" - " + asiento_automatico_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_automatico_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdasiento_automaticoRelacionesToolBar").css("display",asiento_automatico_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosasiento_automatico").css("display",asiento_automatico_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		asiento_automatico_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		asiento_automatico_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		asiento_automatico_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		asiento_automatico_webcontrol1.registrarEventosControles();
		
		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(asiento_automatico_constante1.STR_ES_RELACIONADO=="false") {
			asiento_automatico_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(asiento_automatico_constante1.STR_ES_RELACIONES=="true") {
			if(asiento_automatico_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_automatico_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(asiento_automatico_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(asiento_automatico_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(asiento_automatico_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(asiento_automatico_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
						//asiento_automatico_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(asiento_automatico_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(asiento_automatico_constante1.BIG_ID_ACTUAL,"asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
						//asiento_automatico_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			asiento_automatico_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);	
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

var asiento_automatico_webcontrol1 = new asiento_automatico_webcontrol();

//Para ser llamado desde otro archivo (import)
export {asiento_automatico_webcontrol,asiento_automatico_webcontrol1};

//Para ser llamado desde window.opener
window.asiento_automatico_webcontrol1 = asiento_automatico_webcontrol1;


if(asiento_automatico_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = asiento_automatico_webcontrol1.onLoadWindow; 
}

//</script>