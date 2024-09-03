//<script type="text/javascript" language="javascript">



//var devolucion_detalleJQueryPaginaWebInteraccion= function (devolucion_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {devolucion_detalle_constante,devolucion_detalle_constante1} from '../util/devolucion_detalle_constante.js';

import {devolucion_detalle_funcion,devolucion_detalle_funcion1} from '../util/devolucion_detalle_form_funcion.js';


class devolucion_detalle_webcontrol extends GeneralEntityWebControl {
	
	devolucion_detalle_control=null;
	devolucion_detalle_controlInicial=null;
	devolucion_detalle_controlAuxiliar=null;
		
	//if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(devolucion_detalle_control) {
		super();
		
		this.devolucion_detalle_control=devolucion_detalle_control;
	}
		
	actualizarVariablesPagina(devolucion_detalle_control) {
		
		if(devolucion_detalle_control.action=="index" || devolucion_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(devolucion_detalle_control);
			
		} 
		
		
		
	
		else if(devolucion_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(devolucion_detalle_control);	
		
		} else if(devolucion_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_detalle_control);		
		}
	
	
		
		
		else if(devolucion_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(devolucion_detalle_control);
		
		} else if(devolucion_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(devolucion_detalle_control);		
		
		} else if(devolucion_detalle_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(devolucion_detalle_control);		
		
		} 
		//else if(devolucion_detalle_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(devolucion_detalle_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + devolucion_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(devolucion_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(devolucion_detalle_control) {
		this.actualizarPaginaAccionesGenerales(devolucion_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(devolucion_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(devolucion_detalle_control);
		this.actualizarPaginaOrderBy(devolucion_detalle_control);
		this.actualizarPaginaTablaDatos(devolucion_detalle_control);
		this.actualizarPaginaCargaGeneralControles(devolucion_detalle_control);
		//this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_detalle_control);
		this.actualizarPaginaAreaBusquedas(devolucion_detalle_control);
		this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(devolucion_detalle_control) {
		//this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_detalle_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(devolucion_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(devolucion_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(devolucion_detalle_control);
		this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);
		this.actualizarPaginaFormulario(devolucion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(devolucion_detalle_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(devolucion_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(devolucion_detalle_control);
		this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);
		this.actualizarPaginaFormulario(devolucion_detalle_control);
		this.onLoadCombosDefectoFK(devolucion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_detalle_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(devolucion_detalle_control) {
		//FORMULARIO
		if(devolucion_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(devolucion_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);		
		
		//COMBOS FK
		if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(devolucion_detalle_control) {
		//FORMULARIO
		if(devolucion_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(devolucion_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);	
		
		//COMBOS FK
		if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(devolucion_detalle_control) {
		//FORMULARIO
		if(devolucion_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(devolucion_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control);	
		//COMBOS FK
		if(devolucion_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(devolucion_detalle_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(devolucion_detalle_control) {
		
		if(devolucion_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(devolucion_detalle_control);
		}
		
		if(devolucion_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(devolucion_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(devolucion_detalle_control) {
		if(devolucion_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("devolucion_detalleReturnGeneral",JSON.stringify(devolucion_detalle_control.devolucion_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(devolucion_detalle_control) {
		if(devolucion_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && devolucion_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(devolucion_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(devolucion_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(devolucion_detalle_control, mostrar) {
		
		if(mostrar==true) {
			devolucion_detalle_funcion1.resaltarRestaurarDivsPagina(false,"devolucion_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				devolucion_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"devolucion_detalle");
			}			
			
			devolucion_detalle_funcion1.mostrarDivMensaje(true,devolucion_detalle_control.strAuxiliarMensaje,devolucion_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			devolucion_detalle_funcion1.mostrarDivMensaje(false,devolucion_detalle_control.strAuxiliarMensaje,devolucion_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(devolucion_detalle_control) {
		if(devolucion_detalle_funcion1.esPaginaForm(devolucion_detalle_constante1)==true) {
			window.opener.devolucion_detalle_webcontrol1.actualizarPaginaTablaDatos(devolucion_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(devolucion_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(devolucion_detalle_control) {
		devolucion_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(devolucion_detalle_control.strAuxiliarUrlPagina);
				
		devolucion_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(devolucion_detalle_control.strAuxiliarTipo,devolucion_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(devolucion_detalle_control) {
		devolucion_detalle_funcion1.resaltarRestaurarDivMensaje(true,devolucion_detalle_control.strAuxiliarMensajeAlert,devolucion_detalle_control.strAuxiliarCssMensaje);
			
		if(devolucion_detalle_funcion1.esPaginaForm(devolucion_detalle_constante1)==true) {
			window.opener.devolucion_detalle_funcion1.resaltarRestaurarDivMensaje(true,devolucion_detalle_control.strAuxiliarMensajeAlert,devolucion_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(devolucion_detalle_control) {
		this.devolucion_detalle_controlInicial=devolucion_detalle_control;
			
		if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(devolucion_detalle_control.strStyleDivArbol,devolucion_detalle_control.strStyleDivContent
																,devolucion_detalle_control.strStyleDivOpcionesBanner,devolucion_detalle_control.strStyleDivExpandirColapsar
																,devolucion_detalle_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(devolucion_detalle_control) {
		this.actualizarCssBotonesPagina(devolucion_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(devolucion_detalle_control.tiposReportes,devolucion_detalle_control.tiposReporte
															 	,devolucion_detalle_control.tiposPaginacion,devolucion_detalle_control.tiposAcciones
																,devolucion_detalle_control.tiposColumnasSelect,devolucion_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(devolucion_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(devolucion_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(devolucion_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(devolucion_detalle_control) {
	
		var indexPosition=devolucion_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=devolucion_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(devolucion_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_devolucion",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.cargarCombosdevolucionsFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.cargarCombosbodegasFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.cargarCombosproductosFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.cargarCombosunidadsFK(devolucion_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(devolucion_detalle_control.strRecargarFkTiposNinguno!=null && devolucion_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && devolucion_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(devolucion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_devolucion",devolucion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_detalle_webcontrol1.cargarCombosdevolucionsFK(devolucion_detalle_control);
				}

				if(devolucion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",devolucion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_detalle_webcontrol1.cargarCombosbodegasFK(devolucion_detalle_control);
				}

				if(devolucion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",devolucion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_detalle_webcontrol1.cargarCombosproductosFK(devolucion_detalle_control);
				}

				if(devolucion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",devolucion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_detalle_webcontrol1.cargarCombosunidadsFK(devolucion_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.devolucion_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.devolucion_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.devolucion_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.devolucion_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.devolucion_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.devolucion_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTabladevolucionFK(devolucion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_detalle_funcion1,devolucion_detalle_control.devolucionsFK);
	}

	cargarComboEditarTablabodegaFK(devolucion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_detalle_funcion1,devolucion_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(devolucion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_detalle_funcion1,devolucion_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(devolucion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_detalle_funcion1,devolucion_detalle_control.unidadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(devolucion_detalle_control) {
		jQuery("#tddevolucion_detalleNuevo").css("display",devolucion_detalle_control.strPermisoNuevo);
		jQuery("#trdevolucion_detalleElementos").css("display",devolucion_detalle_control.strVisibleTablaElementos);
		jQuery("#trdevolucion_detalleAcciones").css("display",devolucion_detalle_control.strVisibleTablaAcciones);
		jQuery("#trdevolucion_detalleParametrosAcciones").css("display",devolucion_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(devolucion_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(devolucion_detalle_control);
				
		if(devolucion_detalle_control.devolucion_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(devolucion_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(devolucion_detalle_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(devolucion_detalle_control) {
	
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id").val(devolucion_detalle_control.devolucion_detalleActual.id);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-created_at").val(devolucion_detalle_control.devolucion_detalleActual.versionRow);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-updated_at").val(devolucion_detalle_control.devolucion_detalleActual.versionRow);
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_devolucion!=null && devolucion_detalle_control.devolucion_detalleActual.id_devolucion>-1){
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").val() != devolucion_detalle_control.devolucion_detalleActual.id_devolucion) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").val(devolucion_detalle_control.devolucion_detalleActual.id_devolucion).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").select2("val", null);
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_bodega!=null && devolucion_detalle_control.devolucion_detalleActual.id_bodega>-1){
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != devolucion_detalle_control.devolucion_detalleActual.id_bodega) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(devolucion_detalle_control.devolucion_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_producto!=null && devolucion_detalle_control.devolucion_detalleActual.id_producto>-1){
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != devolucion_detalle_control.devolucion_detalleActual.id_producto) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").val(devolucion_detalle_control.devolucion_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_detalle_control.devolucion_detalleActual.id_unidad!=null && devolucion_detalle_control.devolucion_detalleActual.id_unidad>-1){
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != devolucion_detalle_control.devolucion_detalleActual.id_unidad) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(devolucion_detalle_control.devolucion_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").select2("val", null);
			if(jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-numero_item").val(devolucion_detalle_control.devolucion_detalleActual.numero_item);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-cantidad").val(devolucion_detalle_control.devolucion_detalleActual.cantidad);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-precio").val(devolucion_detalle_control.devolucion_detalleActual.precio);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-sub_total").val(devolucion_detalle_control.devolucion_detalleActual.sub_total);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-descuento_porciento").val(devolucion_detalle_control.devolucion_detalleActual.descuento_porciento);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-descuento_monto").val(devolucion_detalle_control.devolucion_detalleActual.descuento_monto);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-iva_porciento").val(devolucion_detalle_control.devolucion_detalleActual.iva_porciento);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-iva_monto").val(devolucion_detalle_control.devolucion_detalleActual.iva_monto);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-total").val(devolucion_detalle_control.devolucion_detalleActual.total);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-observacion").val(devolucion_detalle_control.devolucion_detalleActual.observacion);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-impuesto2_porciento").val(devolucion_detalle_control.devolucion_detalleActual.impuesto2_porciento);
		jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-impuesto2_monto").val(devolucion_detalle_control.devolucion_detalleActual.impuesto2_monto);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+devolucion_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("devolucion_detalle","inventario","","form_devolucion_detalle",formulario,"","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}
	
	actualizarSpanMensajesCampos(devolucion_detalle_control) {
		jQuery("#spanstrMensajeid").text(devolucion_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(devolucion_detalle_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(devolucion_detalle_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_devolucion").text(devolucion_detalle_control.strMensajeid_devolucion);		
		jQuery("#spanstrMensajeid_bodega").text(devolucion_detalle_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(devolucion_detalle_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_unidad").text(devolucion_detalle_control.strMensajeid_unidad);		
		jQuery("#spanstrMensajenumero_item").text(devolucion_detalle_control.strMensajenumero_item);		
		jQuery("#spanstrMensajecantidad").text(devolucion_detalle_control.strMensajecantidad);		
		jQuery("#spanstrMensajeprecio").text(devolucion_detalle_control.strMensajeprecio);		
		jQuery("#spanstrMensajesub_total").text(devolucion_detalle_control.strMensajesub_total);		
		jQuery("#spanstrMensajedescuento_porciento").text(devolucion_detalle_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajedescuento_monto").text(devolucion_detalle_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajeiva_porciento").text(devolucion_detalle_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(devolucion_detalle_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajetotal").text(devolucion_detalle_control.strMensajetotal);		
		jQuery("#spanstrMensajeobservacion").text(devolucion_detalle_control.strMensajeobservacion);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(devolucion_detalle_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(devolucion_detalle_control.strMensajeimpuesto2_monto);		
	}
	
	actualizarCssBotonesMantenimiento(devolucion_detalle_control) {
		jQuery("#tdbtnNuevodevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevodevolucion_detalle").css("display",devolucion_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizardevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizardevolucion_detalle").css("display",devolucion_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminardevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminardevolucion_detalle").css("display",devolucion_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelardevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosdevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosdevolucion_detalle").css("display",devolucion_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBardevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBardevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBardevolucion_detalle").css("visibility",devolucion_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosdevolucionsFK(devolucion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion",devolucion_detalle_control.devolucionsFK);

		if(devolucion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_detalle_control.idFilaTablaActual+"_3",devolucion_detalle_control.devolucionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion-cmbid_devolucion",devolucion_detalle_control.devolucionsFK);

	};

	cargarCombosbodegasFK(devolucion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega",devolucion_detalle_control.bodegasFK);

		if(devolucion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_detalle_control.idFilaTablaActual+"_4",devolucion_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",devolucion_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(devolucion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto",devolucion_detalle_control.productosFK);

		if(devolucion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_detalle_control.idFilaTablaActual+"_5",devolucion_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",devolucion_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(devolucion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad",devolucion_detalle_control.unidadsFK);

		if(devolucion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_detalle_control.idFilaTablaActual+"_6",devolucion_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",devolucion_detalle_control.unidadsFK);

	};

	
	
	registrarComboActionChangeCombosdevolucionsFK(devolucion_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(devolucion_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(devolucion_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(devolucion_detalle_control) {

	};

	
	
	setDefectoValorCombosdevolucionsFK(devolucion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_detalle_control.iddevolucionDefaultFK>-1 && jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").val() != devolucion_detalle_control.iddevolucionDefaultFK) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion").val(devolucion_detalle_control.iddevolucionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion-cmbid_devolucion").val(devolucion_detalle_control.iddevolucionDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion-cmbid_devolucion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Iddevolucion-cmbid_devolucion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(devolucion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != devolucion_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(devolucion_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(devolucion_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(devolucion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != devolucion_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto").val(devolucion_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(devolucion_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(devolucion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != devolucion_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(devolucion_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(devolucion_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("devolucion_detalle","inventario","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("devolucion_detalle","inventario","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//devolucion_detalle_control
		
	

		var cantidad="form"+devolucion_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_detalle","inventario","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

		var precio="form"+devolucion_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_detalle","inventario","","precio",precio,"","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

		var descuento_porciento="form"+devolucion_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_detalle","inventario","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

		var iva_porciento="form"+devolucion_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("devolucion_detalle","inventario","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(devolucion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_devolucion",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.setDefectoValorCombosdevolucionsFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.setDefectoValorCombosbodegasFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.setDefectoValorCombosproductosFK(devolucion_detalle_control);
			}

			if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",devolucion_detalle_control.strRecargarFkTipos,",")) { 
				devolucion_detalle_webcontrol1.setDefectoValorCombosunidadsFK(devolucion_detalle_control);
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
	onLoadCombosEventosFK(devolucion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_devolucion",devolucion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_detalle_webcontrol1.registrarComboActionChangeCombosdevolucionsFK(devolucion_detalle_control);
			//}

			//if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",devolucion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(devolucion_detalle_control);
			//}

			//if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",devolucion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(devolucion_detalle_control);
			//}

			//if(devolucion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",devolucion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(devolucion_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(devolucion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(devolucion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				devolucion_detalle_funcion1.validarFormularioJQuery(devolucion_detalle_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("devolucion_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("devolucion_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,"devolucion_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("devolucion","id_devolucion","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_devolucion_img_busqueda").click(function(){
				devolucion_detalle_webcontrol1.abrirBusquedaParadevolucion("id_devolucion");
				//alert(jQuery('#form-id_devolucion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				devolucion_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				devolucion_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				devolucion_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(devolucion_detalle_control) {
		
		
		
		if(devolucion_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tddevolucion_detalleActualizarToolBar").css("display",devolucion_detalle_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tddevolucion_detalleEliminarToolBar").css("display",devolucion_detalle_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trdevolucion_detalleElementos").css("display",devolucion_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trdevolucion_detalleAcciones").css("display",devolucion_detalle_control.strVisibleTablaAcciones);
		jQuery("#trdevolucion_detalleParametrosAcciones").css("display",devolucion_detalle_control.strVisibleTablaAcciones);
		
		jQuery("#tddevolucion_detalleCerrarPagina").css("display",devolucion_detalle_control.strPermisoPopup);		
		jQuery("#tddevolucion_detalleCerrarPaginaToolBar").css("display",devolucion_detalle_control.strPermisoPopup);
		//jQuery("#trdevolucion_detalleAccionesRelaciones").css("display",devolucion_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=devolucion_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + devolucion_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + devolucion_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Devolucion Detalles";
		sTituloBanner+=" - " + devolucion_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + devolucion_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddevolucion_detalleRelacionesToolBar").css("display",devolucion_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdevolucion_detalle").css("display",devolucion_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		devolucion_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		devolucion_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		devolucion_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		devolucion_detalle_webcontrol1.registrarEventosControles();
		
		if(devolucion_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			devolucion_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(devolucion_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(devolucion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				devolucion_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(devolucion_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(devolucion_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(devolucion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(devolucion_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
						//devolucion_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(devolucion_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(devolucion_detalle_constante1.BIG_ID_ACTUAL,"devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);
						//devolucion_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			devolucion_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("devolucion_detalle","inventario","",devolucion_detalle_funcion1,devolucion_detalle_webcontrol1,devolucion_detalle_constante1);	
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

var devolucion_detalle_webcontrol1 = new devolucion_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {devolucion_detalle_webcontrol,devolucion_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.devolucion_detalle_webcontrol1 = devolucion_detalle_webcontrol1;


if(devolucion_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = devolucion_detalle_webcontrol1.onLoadWindow; 
}

//</script>