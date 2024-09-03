//<script type="text/javascript" language="javascript">



//var factura_lote_detalleJQueryPaginaWebInteraccion= function (factura_lote_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {factura_lote_detalle_constante,factura_lote_detalle_constante1} from '../util/factura_lote_detalle_constante.js';

import {factura_lote_detalle_funcion,factura_lote_detalle_funcion1} from '../util/factura_lote_detalle_form_funcion.js';


class factura_lote_detalle_webcontrol extends GeneralEntityWebControl {
	
	factura_lote_detalle_control=null;
	factura_lote_detalle_controlInicial=null;
	factura_lote_detalle_controlAuxiliar=null;
		
	//if(factura_lote_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(factura_lote_detalle_control) {
		super();
		
		this.factura_lote_detalle_control=factura_lote_detalle_control;
	}
		
	actualizarVariablesPagina(factura_lote_detalle_control) {
		
		if(factura_lote_detalle_control.action=="index" || factura_lote_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(factura_lote_detalle_control);
			
		} 
		
		
		
	
		else if(factura_lote_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(factura_lote_detalle_control);	
		
		} else if(factura_lote_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(factura_lote_detalle_control);		
		}
	
	
		
		
		else if(factura_lote_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_lote_detalle_control);
		
		} else if(factura_lote_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(factura_lote_detalle_control);		
		
		} else if(factura_lote_detalle_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_lote_detalle_control);		
		
		} 
		//else if(factura_lote_detalle_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_lote_detalle_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + factura_lote_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(factura_lote_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(factura_lote_detalle_control) {
		this.actualizarPaginaAccionesGenerales(factura_lote_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(factura_lote_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(factura_lote_detalle_control);
		this.actualizarPaginaOrderBy(factura_lote_detalle_control);
		this.actualizarPaginaTablaDatos(factura_lote_detalle_control);
		this.actualizarPaginaCargaGeneralControles(factura_lote_detalle_control);
		//this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_lote_detalle_control);
		this.actualizarPaginaAreaBusquedas(factura_lote_detalle_control);
		this.actualizarPaginaCargaCombosFK(factura_lote_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(factura_lote_detalle_control) {
		//this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(factura_lote_detalle_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(factura_lote_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_lote_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(factura_lote_detalle_control);
		this.actualizarPaginaCargaCombosFK(factura_lote_detalle_control);
		this.actualizarPaginaFormulario(factura_lote_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(factura_lote_detalle_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_lote_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(factura_lote_detalle_control);
		this.actualizarPaginaCargaCombosFK(factura_lote_detalle_control);
		this.actualizarPaginaFormulario(factura_lote_detalle_control);
		this.onLoadCombosDefectoFK(factura_lote_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_detalle_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_lote_detalle_control) {
		//FORMULARIO
		if(factura_lote_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_lote_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(factura_lote_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);		
		
		//COMBOS FK
		if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_lote_detalle_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_lote_detalle_control) {
		//FORMULARIO
		if(factura_lote_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_lote_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(factura_lote_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);	
		
		//COMBOS FK
		if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_lote_detalle_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(factura_lote_detalle_control) {
		//FORMULARIO
		if(factura_lote_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_lote_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control);	
		//COMBOS FK
		if(factura_lote_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_lote_detalle_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(factura_lote_detalle_control) {
		
		if(factura_lote_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(factura_lote_detalle_control);
		}
		
		if(factura_lote_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(factura_lote_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(factura_lote_detalle_control) {
		if(factura_lote_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("factura_lote_detalleReturnGeneral",JSON.stringify(factura_lote_detalle_control.factura_lote_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(factura_lote_detalle_control) {
		if(factura_lote_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_lote_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(factura_lote_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(factura_lote_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(factura_lote_detalle_control, mostrar) {
		
		if(mostrar==true) {
			factura_lote_detalle_funcion1.resaltarRestaurarDivsPagina(false,"factura_lote_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				factura_lote_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"factura_lote_detalle");
			}			
			
			factura_lote_detalle_funcion1.mostrarDivMensaje(true,factura_lote_detalle_control.strAuxiliarMensaje,factura_lote_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			factura_lote_detalle_funcion1.mostrarDivMensaje(false,factura_lote_detalle_control.strAuxiliarMensaje,factura_lote_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(factura_lote_detalle_control) {
		if(factura_lote_detalle_funcion1.esPaginaForm(factura_lote_detalle_constante1)==true) {
			window.opener.factura_lote_detalle_webcontrol1.actualizarPaginaTablaDatos(factura_lote_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(factura_lote_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(factura_lote_detalle_control) {
		factura_lote_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(factura_lote_detalle_control.strAuxiliarUrlPagina);
				
		factura_lote_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(factura_lote_detalle_control.strAuxiliarTipo,factura_lote_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(factura_lote_detalle_control) {
		factura_lote_detalle_funcion1.resaltarRestaurarDivMensaje(true,factura_lote_detalle_control.strAuxiliarMensajeAlert,factura_lote_detalle_control.strAuxiliarCssMensaje);
			
		if(factura_lote_detalle_funcion1.esPaginaForm(factura_lote_detalle_constante1)==true) {
			window.opener.factura_lote_detalle_funcion1.resaltarRestaurarDivMensaje(true,factura_lote_detalle_control.strAuxiliarMensajeAlert,factura_lote_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(factura_lote_detalle_control) {
		this.factura_lote_detalle_controlInicial=factura_lote_detalle_control;
			
		if(factura_lote_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(factura_lote_detalle_control.strStyleDivArbol,factura_lote_detalle_control.strStyleDivContent
																,factura_lote_detalle_control.strStyleDivOpcionesBanner,factura_lote_detalle_control.strStyleDivExpandirColapsar
																,factura_lote_detalle_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(factura_lote_detalle_control) {
		this.actualizarCssBotonesPagina(factura_lote_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(factura_lote_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(factura_lote_detalle_control.tiposReportes,factura_lote_detalle_control.tiposReporte
															 	,factura_lote_detalle_control.tiposPaginacion,factura_lote_detalle_control.tiposAcciones
																,factura_lote_detalle_control.tiposColumnasSelect,factura_lote_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(factura_lote_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(factura_lote_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(factura_lote_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(factura_lote_detalle_control) {
	
		var indexPosition=factura_lote_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=factura_lote_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(factura_lote_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura_lote",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.cargarCombosfactura_lotesFK(factura_lote_detalle_control);
			}

			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.cargarCombosbodegasFK(factura_lote_detalle_control);
			}

			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.cargarCombosproductosFK(factura_lote_detalle_control);
			}

			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.cargarCombosunidadsFK(factura_lote_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(factura_lote_detalle_control.strRecargarFkTiposNinguno!=null && factura_lote_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && factura_lote_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(factura_lote_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_factura_lote",factura_lote_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_detalle_webcontrol1.cargarCombosfactura_lotesFK(factura_lote_detalle_control);
				}

				if(factura_lote_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",factura_lote_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_detalle_webcontrol1.cargarCombosbodegasFK(factura_lote_detalle_control);
				}

				if(factura_lote_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",factura_lote_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_detalle_webcontrol1.cargarCombosproductosFK(factura_lote_detalle_control);
				}

				if(factura_lote_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",factura_lote_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_detalle_webcontrol1.cargarCombosunidadsFK(factura_lote_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.factura_lote_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.factura_lote_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.factura_lote_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.factura_lote_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.factura_lote_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.factura_lote_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablafactura_loteFK(factura_lote_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_detalle_funcion1,factura_lote_detalle_control.factura_lotesFK);
	}

	cargarComboEditarTablabodegaFK(factura_lote_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_detalle_funcion1,factura_lote_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(factura_lote_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_detalle_funcion1,factura_lote_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(factura_lote_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_detalle_funcion1,factura_lote_detalle_control.unidadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(factura_lote_detalle_control) {
		jQuery("#tdfactura_lote_detalleNuevo").css("display",factura_lote_detalle_control.strPermisoNuevo);
		jQuery("#trfactura_lote_detalleElementos").css("display",factura_lote_detalle_control.strVisibleTablaElementos);
		jQuery("#trfactura_lote_detalleAcciones").css("display",factura_lote_detalle_control.strVisibleTablaAcciones);
		jQuery("#trfactura_lote_detalleParametrosAcciones").css("display",factura_lote_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(factura_lote_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(factura_lote_detalle_control);
				
		if(factura_lote_detalle_control.factura_lote_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(factura_lote_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(factura_lote_detalle_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(factura_lote_detalle_control) {
	
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id").val(factura_lote_detalle_control.factura_lote_detalleActual.id);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-version_row").val(factura_lote_detalle_control.factura_lote_detalleActual.versionRow);
		
		if(factura_lote_detalle_control.factura_lote_detalleActual.id_factura_lote!=null && factura_lote_detalle_control.factura_lote_detalleActual.id_factura_lote>-1){
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote").val() != factura_lote_detalle_control.factura_lote_detalleActual.id_factura_lote) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote").val(factura_lote_detalle_control.factura_lote_detalleActual.id_factura_lote).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote").select2("val", null);
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_detalle_control.factura_lote_detalleActual.id_bodega!=null && factura_lote_detalle_control.factura_lote_detalleActual.id_bodega>-1){
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != factura_lote_detalle_control.factura_lote_detalleActual.id_bodega) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega").val(factura_lote_detalle_control.factura_lote_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_detalle_control.factura_lote_detalleActual.id_producto!=null && factura_lote_detalle_control.factura_lote_detalleActual.id_producto>-1){
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto").val() != factura_lote_detalle_control.factura_lote_detalleActual.id_producto) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto").val(factura_lote_detalle_control.factura_lote_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_detalle_control.factura_lote_detalleActual.id_unidad!=null && factura_lote_detalle_control.factura_lote_detalleActual.id_unidad>-1){
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != factura_lote_detalle_control.factura_lote_detalleActual.id_unidad) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad").val(factura_lote_detalle_control.factura_lote_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad").select2("val", null);
			if(jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-cantidad").val(factura_lote_detalle_control.factura_lote_detalleActual.cantidad);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-precio").val(factura_lote_detalle_control.factura_lote_detalleActual.precio);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-descuento_porciento").val(factura_lote_detalle_control.factura_lote_detalleActual.descuento_porciento);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-descuento_monto").val(factura_lote_detalle_control.factura_lote_detalleActual.descuento_monto);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-sub_total").val(factura_lote_detalle_control.factura_lote_detalleActual.sub_total);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-iva_porciento").val(factura_lote_detalle_control.factura_lote_detalleActual.iva_porciento);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-iva_monto").val(factura_lote_detalle_control.factura_lote_detalleActual.iva_monto);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-total").val(factura_lote_detalle_control.factura_lote_detalleActual.total);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-recibido").val(factura_lote_detalle_control.factura_lote_detalleActual.recibido);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-observacion").val(factura_lote_detalle_control.factura_lote_detalleActual.observacion);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-impuesto2_porciento").val(factura_lote_detalle_control.factura_lote_detalleActual.impuesto2_porciento);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-impuesto2_monto").val(factura_lote_detalle_control.factura_lote_detalleActual.impuesto2_monto);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-cotizacion").val(factura_lote_detalle_control.factura_lote_detalleActual.cotizacion);
		jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-moneda").val(factura_lote_detalle_control.factura_lote_detalleActual.moneda);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+factura_lote_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("factura_lote_detalle","facturacion","","form_factura_lote_detalle",formulario,"","",paraEventoTabla,idFilaTabla,factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
	}
	
	actualizarSpanMensajesCampos(factura_lote_detalle_control) {
		jQuery("#spanstrMensajeid").text(factura_lote_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(factura_lote_detalle_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_factura_lote").text(factura_lote_detalle_control.strMensajeid_factura_lote);		
		jQuery("#spanstrMensajeid_bodega").text(factura_lote_detalle_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(factura_lote_detalle_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_unidad").text(factura_lote_detalle_control.strMensajeid_unidad);		
		jQuery("#spanstrMensajecantidad").text(factura_lote_detalle_control.strMensajecantidad);		
		jQuery("#spanstrMensajeprecio").text(factura_lote_detalle_control.strMensajeprecio);		
		jQuery("#spanstrMensajedescuento_porciento").text(factura_lote_detalle_control.strMensajedescuento_porciento);		
		jQuery("#spanstrMensajedescuento_monto").text(factura_lote_detalle_control.strMensajedescuento_monto);		
		jQuery("#spanstrMensajesub_total").text(factura_lote_detalle_control.strMensajesub_total);		
		jQuery("#spanstrMensajeiva_porciento").text(factura_lote_detalle_control.strMensajeiva_porciento);		
		jQuery("#spanstrMensajeiva_monto").text(factura_lote_detalle_control.strMensajeiva_monto);		
		jQuery("#spanstrMensajetotal").text(factura_lote_detalle_control.strMensajetotal);		
		jQuery("#spanstrMensajerecibido").text(factura_lote_detalle_control.strMensajerecibido);		
		jQuery("#spanstrMensajeobservacion").text(factura_lote_detalle_control.strMensajeobservacion);		
		jQuery("#spanstrMensajeimpuesto2_porciento").text(factura_lote_detalle_control.strMensajeimpuesto2_porciento);		
		jQuery("#spanstrMensajeimpuesto2_monto").text(factura_lote_detalle_control.strMensajeimpuesto2_monto);		
		jQuery("#spanstrMensajecotizacion").text(factura_lote_detalle_control.strMensajecotizacion);		
		jQuery("#spanstrMensajemoneda").text(factura_lote_detalle_control.strMensajemoneda);		
	}
	
	actualizarCssBotonesMantenimiento(factura_lote_detalle_control) {
		jQuery("#tdbtnNuevofactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevofactura_lote_detalle").css("display",factura_lote_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarfactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarfactura_lote_detalle").css("display",factura_lote_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarfactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarfactura_lote_detalle").css("display",factura_lote_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarfactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosfactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosfactura_lote_detalle").css("display",factura_lote_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarfactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarfactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarfactura_lote_detalle").css("visibility",factura_lote_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosfactura_lotesFK(factura_lote_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote",factura_lote_detalle_control.factura_lotesFK);

		if(factura_lote_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_detalle_control.idFilaTablaActual+"_2",factura_lote_detalle_control.factura_lotesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote",factura_lote_detalle_control.factura_lotesFK);

	};

	cargarCombosbodegasFK(factura_lote_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega",factura_lote_detalle_control.bodegasFK);

		if(factura_lote_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_detalle_control.idFilaTablaActual+"_3",factura_lote_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",factura_lote_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(factura_lote_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto",factura_lote_detalle_control.productosFK);

		if(factura_lote_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_detalle_control.idFilaTablaActual+"_4",factura_lote_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",factura_lote_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(factura_lote_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad",factura_lote_detalle_control.unidadsFK);

		if(factura_lote_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_detalle_control.idFilaTablaActual+"_5",factura_lote_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",factura_lote_detalle_control.unidadsFK);

	};

	
	
	registrarComboActionChangeCombosfactura_lotesFK(factura_lote_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(factura_lote_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(factura_lote_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(factura_lote_detalle_control) {

	};

	
	
	setDefectoValorCombosfactura_lotesFK(factura_lote_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_detalle_control.idfactura_loteDefaultFK>-1 && jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote").val() != factura_lote_detalle_control.idfactura_loteDefaultFK) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote").val(factura_lote_detalle_control.idfactura_loteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote").val(factura_lote_detalle_control.idfactura_loteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(factura_lote_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != factura_lote_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega").val(factura_lote_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(factura_lote_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(factura_lote_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto").val() != factura_lote_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto").val(factura_lote_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(factura_lote_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(factura_lote_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != factura_lote_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad").val(factura_lote_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(factura_lote_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("factura_lote_detalle","facturacion","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("factura_lote_detalle","facturacion","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//factura_lote_detalle_control
		
	

		var cantidad="form"+factura_lote_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_lote_detalle","facturacion","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

		var precio="form"+factura_lote_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_lote_detalle","facturacion","","precio",precio,"","",paraEventoTabla,idFilaTabla,factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

		var descuento_porciento="form"+factura_lote_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_lote_detalle","facturacion","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

		var iva_porciento="form"+factura_lote_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_lote_detalle","facturacion","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(factura_lote_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_lote_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura_lote",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.setDefectoValorCombosfactura_lotesFK(factura_lote_detalle_control);
			}

			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.setDefectoValorCombosbodegasFK(factura_lote_detalle_control);
			}

			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.setDefectoValorCombosproductosFK(factura_lote_detalle_control);
			}

			if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",factura_lote_detalle_control.strRecargarFkTipos,",")) { 
				factura_lote_detalle_webcontrol1.setDefectoValorCombosunidadsFK(factura_lote_detalle_control);
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
	onLoadCombosEventosFK(factura_lote_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_lote_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura_lote",factura_lote_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_detalle_webcontrol1.registrarComboActionChangeCombosfactura_lotesFK(factura_lote_detalle_control);
			//}

			//if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",factura_lote_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(factura_lote_detalle_control);
			//}

			//if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",factura_lote_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(factura_lote_detalle_control);
			//}

			//if(factura_lote_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",factura_lote_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(factura_lote_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(factura_lote_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_lote_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(factura_lote_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(factura_lote_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				factura_lote_detalle_funcion1.validarFormularioJQuery(factura_lote_detalle_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("factura_lote_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("factura_lote_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(factura_lote_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,"factura_lote_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("factura_lote","id_factura_lote","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_factura_lote_img_busqueda").click(function(){
				factura_lote_detalle_webcontrol1.abrirBusquedaParafactura_lote("id_factura_lote");
				//alert(jQuery('#form-id_factura_lote_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				factura_lote_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				factura_lote_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				factura_lote_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(factura_lote_detalle_control) {
		
		
		
		if(factura_lote_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdfactura_lote_detalleActualizarToolBar").css("display",factura_lote_detalle_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdfactura_lote_detalleEliminarToolBar").css("display",factura_lote_detalle_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trfactura_lote_detalleElementos").css("display",factura_lote_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trfactura_lote_detalleAcciones").css("display",factura_lote_detalle_control.strVisibleTablaAcciones);
		jQuery("#trfactura_lote_detalleParametrosAcciones").css("display",factura_lote_detalle_control.strVisibleTablaAcciones);
		
		jQuery("#tdfactura_lote_detalleCerrarPagina").css("display",factura_lote_detalle_control.strPermisoPopup);		
		jQuery("#tdfactura_lote_detalleCerrarPaginaToolBar").css("display",factura_lote_detalle_control.strPermisoPopup);
		//jQuery("#trfactura_lote_detalleAccionesRelaciones").css("display",factura_lote_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=factura_lote_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + factura_lote_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + factura_lote_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Factura Lote Detalles";
		sTituloBanner+=" - " + factura_lote_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + factura_lote_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdfactura_lote_detalleRelacionesToolBar").css("display",factura_lote_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosfactura_lote_detalle").css("display",factura_lote_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		factura_lote_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		factura_lote_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		factura_lote_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		factura_lote_detalle_webcontrol1.registrarEventosControles();
		
		if(factura_lote_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(factura_lote_detalle_constante1.STR_ES_RELACIONADO=="false") {
			factura_lote_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(factura_lote_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(factura_lote_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				factura_lote_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(factura_lote_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(factura_lote_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(factura_lote_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(factura_lote_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
						//factura_lote_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(factura_lote_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(factura_lote_detalle_constante1.BIG_ID_ACTUAL,"factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);
						//factura_lote_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			factura_lote_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("factura_lote_detalle","facturacion","",factura_lote_detalle_funcion1,factura_lote_detalle_webcontrol1,factura_lote_detalle_constante1);	
	}
}

var factura_lote_detalle_webcontrol1 = new factura_lote_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {factura_lote_detalle_webcontrol,factura_lote_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.factura_lote_detalle_webcontrol1 = factura_lote_detalle_webcontrol1;


if(factura_lote_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = factura_lote_detalle_webcontrol1.onLoadWindow; 
}

//</script>