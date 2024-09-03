//<script type="text/javascript" language="javascript">



//var kardex_detalleJQueryPaginaWebInteraccion= function (kardex_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {kardex_detalle_constante,kardex_detalle_constante1} from '../util/kardex_detalle_constante.js';

import {kardex_detalle_funcion,kardex_detalle_funcion1} from '../util/kardex_detalle_form_funcion.js';


class kardex_detalle_webcontrol extends GeneralEntityWebControl {
	
	kardex_detalle_control=null;
	kardex_detalle_controlInicial=null;
	kardex_detalle_controlAuxiliar=null;
		
	//if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(kardex_detalle_control) {
		super();
		
		this.kardex_detalle_control=kardex_detalle_control;
	}
		
	actualizarVariablesPagina(kardex_detalle_control) {
		
		if(kardex_detalle_control.action=="index" || kardex_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(kardex_detalle_control);
			
		} 
		
		
		
	
		else if(kardex_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(kardex_detalle_control);	
		
		} else if(kardex_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(kardex_detalle_control);		
		}
	
	
		
		
		else if(kardex_detalle_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(kardex_detalle_control);
		
		} else if(kardex_detalle_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(kardex_detalle_control);		
		
		} else if(kardex_detalle_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(kardex_detalle_control);		
		
		} 
		//else if(kardex_detalle_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(kardex_detalle_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + kardex_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(kardex_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(kardex_detalle_control) {
		this.actualizarPaginaAccionesGenerales(kardex_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(kardex_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(kardex_detalle_control);
		this.actualizarPaginaOrderBy(kardex_detalle_control);
		this.actualizarPaginaTablaDatos(kardex_detalle_control);
		this.actualizarPaginaCargaGeneralControles(kardex_detalle_control);
		//this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(kardex_detalle_control);
		this.actualizarPaginaAreaBusquedas(kardex_detalle_control);
		this.actualizarPaginaCargaCombosFK(kardex_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(kardex_detalle_control) {
		//this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(kardex_detalle_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(kardex_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(kardex_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(kardex_detalle_control) {
		this.actualizarPaginaTablaDatosAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(kardex_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(kardex_detalle_control);
		this.actualizarPaginaCargaCombosFK(kardex_detalle_control);
		this.actualizarPaginaFormulario(kardex_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(kardex_detalle_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(kardex_detalle_control) {
		this.actualizarPaginaCargaGeneralControles(kardex_detalle_control);
		this.actualizarPaginaCargaCombosFK(kardex_detalle_control);
		this.actualizarPaginaFormulario(kardex_detalle_control);
		this.onLoadCombosDefectoFK(kardex_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(kardex_detalle_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(kardex_detalle_control) {
		//FORMULARIO
		if(kardex_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(kardex_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(kardex_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);		
		
		//COMBOS FK
		if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(kardex_detalle_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(kardex_detalle_control) {
		//FORMULARIO
		if(kardex_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(kardex_detalle_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(kardex_detalle_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);	
		
		//COMBOS FK
		if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(kardex_detalle_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(kardex_detalle_control) {
		//FORMULARIO
		if(kardex_detalle_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(kardex_detalle_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control);	
		//COMBOS FK
		if(kardex_detalle_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(kardex_detalle_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(kardex_detalle_control) {
		
		if(kardex_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(kardex_detalle_control);
		}
		
		if(kardex_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(kardex_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(kardex_detalle_control) {
		if(kardex_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("kardex_detalleReturnGeneral",JSON.stringify(kardex_detalle_control.kardex_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(kardex_detalle_control) {
		if(kardex_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && kardex_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(kardex_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(kardex_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(kardex_detalle_control, mostrar) {
		
		if(mostrar==true) {
			kardex_detalle_funcion1.resaltarRestaurarDivsPagina(false,"kardex_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				kardex_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"kardex_detalle");
			}			
			
			kardex_detalle_funcion1.mostrarDivMensaje(true,kardex_detalle_control.strAuxiliarMensaje,kardex_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			kardex_detalle_funcion1.mostrarDivMensaje(false,kardex_detalle_control.strAuxiliarMensaje,kardex_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(kardex_detalle_control) {
		if(kardex_detalle_funcion1.esPaginaForm(kardex_detalle_constante1)==true) {
			window.opener.kardex_detalle_webcontrol1.actualizarPaginaTablaDatos(kardex_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(kardex_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(kardex_detalle_control) {
		kardex_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(kardex_detalle_control.strAuxiliarUrlPagina);
				
		kardex_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(kardex_detalle_control.strAuxiliarTipo,kardex_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(kardex_detalle_control) {
		kardex_detalle_funcion1.resaltarRestaurarDivMensaje(true,kardex_detalle_control.strAuxiliarMensajeAlert,kardex_detalle_control.strAuxiliarCssMensaje);
			
		if(kardex_detalle_funcion1.esPaginaForm(kardex_detalle_constante1)==true) {
			window.opener.kardex_detalle_funcion1.resaltarRestaurarDivMensaje(true,kardex_detalle_control.strAuxiliarMensajeAlert,kardex_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(kardex_detalle_control) {
		this.kardex_detalle_controlInicial=kardex_detalle_control;
			
		if(kardex_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(kardex_detalle_control.strStyleDivArbol,kardex_detalle_control.strStyleDivContent
																,kardex_detalle_control.strStyleDivOpcionesBanner,kardex_detalle_control.strStyleDivExpandirColapsar
																,kardex_detalle_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(kardex_detalle_control) {
		this.actualizarCssBotonesPagina(kardex_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(kardex_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(kardex_detalle_control.tiposReportes,kardex_detalle_control.tiposReporte
															 	,kardex_detalle_control.tiposPaginacion,kardex_detalle_control.tiposAcciones
																,kardex_detalle_control.tiposColumnasSelect,kardex_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(kardex_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(kardex_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(kardex_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(kardex_detalle_control) {
	
		var indexPosition=kardex_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=kardex_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(kardex_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarComboskardexsFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarCombosbodegasFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarCombosproductosFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarCombosunidadsFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_lote_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.cargarComboslote_productosFK(kardex_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(kardex_detalle_control.strRecargarFkTiposNinguno!=null && kardex_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && kardex_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarComboskardexsFK(kardex_detalle_control);
				}

				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarCombosbodegasFK(kardex_detalle_control);
				}

				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarCombosproductosFK(kardex_detalle_control);
				}

				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarCombosunidadsFK(kardex_detalle_control);
				}

				if(kardex_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_lote_producto",kardex_detalle_control.strRecargarFkTiposNinguno,",")) { 
					kardex_detalle_webcontrol1.cargarComboslote_productosFK(kardex_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.kardex_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.kardex_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.kardex_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.kardex_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.kardex_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.kardex_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablakardexFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.kardexsFK);
	}

	cargarComboEditarTablabodegaFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.unidadsFK);
	}

	cargarComboEditarTablalote_productoFK(kardex_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,kardex_detalle_funcion1,kardex_detalle_control.lote_productosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(kardex_detalle_control) {
		jQuery("#tdkardex_detalleNuevo").css("display",kardex_detalle_control.strPermisoNuevo);
		jQuery("#trkardex_detalleElementos").css("display",kardex_detalle_control.strVisibleTablaElementos);
		jQuery("#trkardex_detalleAcciones").css("display",kardex_detalle_control.strVisibleTablaAcciones);
		jQuery("#trkardex_detalleParametrosAcciones").css("display",kardex_detalle_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(kardex_detalle_control) {
	
		this.actualizarCssBotonesMantenimiento(kardex_detalle_control);
				
		if(kardex_detalle_control.kardex_detalleActual!=null) {//form
			
			this.actualizarCamposFormulario(kardex_detalle_control);			
		}
						
		this.actualizarSpanMensajesCampos(kardex_detalle_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(kardex_detalle_control) {
	
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id").val(kardex_detalle_control.kardex_detalleActual.id);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-created_at").val(kardex_detalle_control.kardex_detalleActual.versionRow);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-updated_at").val(kardex_detalle_control.kardex_detalleActual.versionRow);
		
		if(kardex_detalle_control.kardex_detalleActual.id_kardex!=null && kardex_detalle_control.kardex_detalleActual.id_kardex>-1){
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex").val() != kardex_detalle_control.kardex_detalleActual.id_kardex) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex").val(kardex_detalle_control.kardex_detalleActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-numero_item").val(kardex_detalle_control.kardex_detalleActual.numero_item);
		
		if(kardex_detalle_control.kardex_detalleActual.id_bodega!=null && kardex_detalle_control.kardex_detalleActual.id_bodega>-1){
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != kardex_detalle_control.kardex_detalleActual.id_bodega) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").val(kardex_detalle_control.kardex_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").select2("val", null);
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_detalle_control.kardex_detalleActual.id_producto!=null && kardex_detalle_control.kardex_detalleActual.id_producto>-1){
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").val() != kardex_detalle_control.kardex_detalleActual.id_producto) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").val(kardex_detalle_control.kardex_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").select2("val", null);
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(kardex_detalle_control.kardex_detalleActual.id_unidad!=null && kardex_detalle_control.kardex_detalleActual.id_unidad>-1){
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != kardex_detalle_control.kardex_detalleActual.id_unidad) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").val(kardex_detalle_control.kardex_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").select2("val", null);
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-cantidad").val(kardex_detalle_control.kardex_detalleActual.cantidad);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-costo").val(kardex_detalle_control.kardex_detalleActual.costo);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-total").val(kardex_detalle_control.kardex_detalleActual.total);
		
		if(kardex_detalle_control.kardex_detalleActual.id_lote_producto!=null && kardex_detalle_control.kardex_detalleActual.id_lote_producto>-1){
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto").val() != kardex_detalle_control.kardex_detalleActual.id_lote_producto) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto").val(kardex_detalle_control.kardex_detalleActual.id_lote_producto).trigger("change");
			}
		} else { 
			if(jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-descripcion").val(kardex_detalle_control.kardex_detalleActual.descripcion);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-cantidad_disponible").val(kardex_detalle_control.kardex_detalleActual.cantidad_disponible);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-cantidad_disponible_total").val(kardex_detalle_control.kardex_detalleActual.cantidad_disponible_total);
		jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-costo_anterior").val(kardex_detalle_control.kardex_detalleActual.costo_anterior);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+kardex_detalle_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("kardex_detalle","inventario","","form_kardex_detalle",formulario,"","",paraEventoTabla,idFilaTabla,kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}
	
	actualizarSpanMensajesCampos(kardex_detalle_control) {
		jQuery("#spanstrMensajeid").text(kardex_detalle_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(kardex_detalle_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(kardex_detalle_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_kardex").text(kardex_detalle_control.strMensajeid_kardex);		
		jQuery("#spanstrMensajenumero_item").text(kardex_detalle_control.strMensajenumero_item);		
		jQuery("#spanstrMensajeid_bodega").text(kardex_detalle_control.strMensajeid_bodega);		
		jQuery("#spanstrMensajeid_producto").text(kardex_detalle_control.strMensajeid_producto);		
		jQuery("#spanstrMensajeid_unidad").text(kardex_detalle_control.strMensajeid_unidad);		
		jQuery("#spanstrMensajecantidad").text(kardex_detalle_control.strMensajecantidad);		
		jQuery("#spanstrMensajecosto").text(kardex_detalle_control.strMensajecosto);		
		jQuery("#spanstrMensajetotal").text(kardex_detalle_control.strMensajetotal);		
		jQuery("#spanstrMensajeid_lote_producto").text(kardex_detalle_control.strMensajeid_lote_producto);		
		jQuery("#spanstrMensajedescripcion").text(kardex_detalle_control.strMensajedescripcion);		
		jQuery("#spanstrMensajecantidad_disponible").text(kardex_detalle_control.strMensajecantidad_disponible);		
		jQuery("#spanstrMensajecantidad_disponible_total").text(kardex_detalle_control.strMensajecantidad_disponible_total);		
		jQuery("#spanstrMensajecosto_anterior").text(kardex_detalle_control.strMensajecosto_anterior);		
	}
	
	actualizarCssBotonesMantenimiento(kardex_detalle_control) {
		jQuery("#tdbtnNuevokardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevokardex_detalle").css("display",kardex_detalle_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarkardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarkardex_detalle").css("display",kardex_detalle_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarkardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarkardex_detalle").css("display",kardex_detalle_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarkardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioskardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioskardex_detalle").css("display",kardex_detalle_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarkardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarkardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarkardex_detalle").css("visibility",kardex_detalle_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarComboskardexsFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex",kardex_detalle_control.kardexsFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_3",kardex_detalle_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",kardex_detalle_control.kardexsFK);

	};

	cargarCombosbodegasFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega",kardex_detalle_control.bodegasFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_5",kardex_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",kardex_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto",kardex_detalle_control.productosFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_6",kardex_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",kardex_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad",kardex_detalle_control.unidadsFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_7",kardex_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",kardex_detalle_control.unidadsFK);

	};

	cargarComboslote_productosFK(kardex_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto",kardex_detalle_control.lote_productosFK);

		if(kardex_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+kardex_detalle_control.idFilaTablaActual+"_11",kardex_detalle_control.lote_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote-cmbid_lote_producto",kardex_detalle_control.lote_productosFK);

	};

	
	
	registrarComboActionChangeComboskardexsFK(kardex_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(kardex_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(kardex_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(kardex_detalle_control) {

	};

	registrarComboActionChangeComboslote_productosFK(kardex_detalle_control) {

	};

	
	
	setDefectoValorComboskardexsFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idkardexDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex").val() != kardex_detalle_control.idkardexDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex").val(kardex_detalle_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(kardex_detalle_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != kardex_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega").val(kardex_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(kardex_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").val() != kardex_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto").val(kardex_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(kardex_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != kardex_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad").val(kardex_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(kardex_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboslote_productosFK(kardex_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(kardex_detalle_control.idlote_productoDefaultFK>-1 && jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto").val() != kardex_detalle_control.idlote_productoDefaultFK) {
				jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto").val(kardex_detalle_control.idlote_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote-cmbid_lote_producto").val(kardex_detalle_control.idlote_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote-cmbid_lote_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+kardex_detalle_constante1.STR_SUFIJO+"FK_Idlote-cmbid_lote_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("kardex_detalle","inventario","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("kardex_detalle","inventario","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	





	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//kardex_detalle_control
		
	

		var cantidad="form"+kardex_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("kardex_detalle","inventario","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

		var costo="form"+kardex_detalle_constante1.STR_SUFIJO+"-costo";
		funcionGeneralEventoJQuery.setTextoAccionChange("kardex_detalle","inventario","","costo",costo,"","",paraEventoTabla,idFilaTabla,kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(kardex_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kardex_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorComboskardexsFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorCombosbodegasFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorCombosproductosFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorCombosunidadsFK(kardex_detalle_control);
			}

			if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_lote_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 
				kardex_detalle_webcontrol1.setDefectoValorComboslote_productosFK(kardex_detalle_control);
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
	onLoadCombosEventosFK(kardex_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kardex_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeComboskardexsFK(kardex_detalle_control);
			//}

			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(kardex_detalle_control);
			//}

			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(kardex_detalle_control);
			//}

			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(kardex_detalle_control);
			//}

			//if(kardex_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_lote_producto",kardex_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				kardex_detalle_webcontrol1.registrarComboActionChangeComboslote_productosFK(kardex_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(kardex_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kardex_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(kardex_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				kardex_detalle_funcion1.validarFormularioJQuery(kardex_detalle_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("kardex_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("kardex_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(kardex_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,"kardex_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("lote_producto","id_lote_producto","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+kardex_detalle_constante1.STR_SUFIJO+"-id_lote_producto_img_busqueda").click(function(){
				kardex_detalle_webcontrol1.abrirBusquedaParalote_producto("id_lote_producto");
				//alert(jQuery('#form-id_lote_producto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(kardex_detalle_control) {
		
		
		
		if(kardex_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdkardex_detalleActualizarToolBar").css("display",kardex_detalle_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdkardex_detalleEliminarToolBar").css("display",kardex_detalle_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trkardex_detalleElementos").css("display",kardex_detalle_control.strVisibleTablaElementos);
		
		jQuery("#trkardex_detalleAcciones").css("display",kardex_detalle_control.strVisibleTablaAcciones);
		jQuery("#trkardex_detalleParametrosAcciones").css("display",kardex_detalle_control.strVisibleTablaAcciones);
		
		jQuery("#tdkardex_detalleCerrarPagina").css("display",kardex_detalle_control.strPermisoPopup);		
		jQuery("#tdkardex_detalleCerrarPaginaToolBar").css("display",kardex_detalle_control.strPermisoPopup);
		//jQuery("#trkardex_detalleAccionesRelaciones").css("display",kardex_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=kardex_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + kardex_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + kardex_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Detalles";
		sTituloBanner+=" - " + kardex_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + kardex_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdkardex_detalleRelacionesToolBar").css("display",kardex_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoskardex_detalle").css("display",kardex_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		kardex_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		kardex_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		kardex_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		kardex_detalle_webcontrol1.registrarEventosControles();
		
		if(kardex_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(kardex_detalle_constante1.STR_ES_RELACIONADO=="false") {
			kardex_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(kardex_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(kardex_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				kardex_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(kardex_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(kardex_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(kardex_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(kardex_detalle_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
						//kardex_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(kardex_detalle_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(kardex_detalle_constante1.BIG_ID_ACTUAL,"kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);
						//kardex_detalle_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			kardex_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("kardex_detalle","inventario","",kardex_detalle_funcion1,kardex_detalle_webcontrol1,kardex_detalle_constante1);	
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

var kardex_detalle_webcontrol1 = new kardex_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {kardex_detalle_webcontrol,kardex_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.kardex_detalle_webcontrol1 = kardex_detalle_webcontrol1;


if(kardex_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = kardex_detalle_webcontrol1.onLoadWindow; 
}

//</script>