//<script type="text/javascript" language="javascript">



//var parametro_facturacionJQueryPaginaWebInteraccion= function (parametro_facturacion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_facturacion_constante,parametro_facturacion_constante1} from '../util/parametro_facturacion_constante.js';

import {parametro_facturacion_funcion,parametro_facturacion_funcion1} from '../util/parametro_facturacion_form_funcion.js';


class parametro_facturacion_webcontrol extends GeneralEntityWebControl {
	
	parametro_facturacion_control=null;
	parametro_facturacion_controlInicial=null;
	parametro_facturacion_controlAuxiliar=null;
		
	//if(parametro_facturacion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_facturacion_control) {
		super();
		
		this.parametro_facturacion_control=parametro_facturacion_control;
	}
		
	actualizarVariablesPagina(parametro_facturacion_control) {
		
		if(parametro_facturacion_control.action=="index" || parametro_facturacion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_facturacion_control);
			
		} 
		
		
		
	
		else if(parametro_facturacion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_facturacion_control);	
		
		} else if(parametro_facturacion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_facturacion_control);		
		}
	
	
		
		
		else if(parametro_facturacion_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(parametro_facturacion_control);		
		
		} else if(parametro_facturacion_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_facturacion_control);		
		
		} 
		//else if(parametro_facturacion_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_facturacion_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_facturacion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_facturacion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_facturacion_control) {
		this.actualizarPaginaAccionesGenerales(parametro_facturacion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_facturacion_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_facturacion_control);
		this.actualizarPaginaOrderBy(parametro_facturacion_control);
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);
		this.actualizarPaginaCargaGeneralControles(parametro_facturacion_control);
		//this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_facturacion_control);
		this.actualizarPaginaAreaBusquedas(parametro_facturacion_control);
		this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_facturacion_control) {
		//this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_facturacion_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatosAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(parametro_facturacion_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_facturacion_control);
		this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);
		this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(parametro_facturacion_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(parametro_facturacion_control) {
		this.actualizarPaginaCargaGeneralControles(parametro_facturacion_control);
		this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);
		this.actualizarPaginaFormulario(parametro_facturacion_control);
		this.onLoadCombosDefectoFK(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(parametro_facturacion_control) {
		//FORMULARIO
		if(parametro_facturacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_facturacion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_facturacion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		
		//COMBOS FK
		if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(parametro_facturacion_control) {
		//FORMULARIO
		if(parametro_facturacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_facturacion_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(parametro_facturacion_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);	
		
		//COMBOS FK
		if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(parametro_facturacion_control) {
		//FORMULARIO
		if(parametro_facturacion_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(parametro_facturacion_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);	
		//COMBOS FK
		if(parametro_facturacion_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_facturacion_control) {
		
		if(parametro_facturacion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_facturacion_control);
		}
		
		if(parametro_facturacion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_facturacion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_facturacion_control) {
		if(parametro_facturacion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_facturacionReturnGeneral",JSON.stringify(parametro_facturacion_control.parametro_facturacionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control) {
		if(parametro_facturacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_facturacion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_facturacion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_facturacion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_facturacion_control, mostrar) {
		
		if(mostrar==true) {
			parametro_facturacion_funcion1.resaltarRestaurarDivsPagina(false,"parametro_facturacion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_facturacion_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_facturacion");
			}			
			
			parametro_facturacion_funcion1.mostrarDivMensaje(true,parametro_facturacion_control.strAuxiliarMensaje,parametro_facturacion_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_facturacion_funcion1.mostrarDivMensaje(false,parametro_facturacion_control.strAuxiliarMensaje,parametro_facturacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_facturacion_control) {
		if(parametro_facturacion_funcion1.esPaginaForm(parametro_facturacion_constante1)==true) {
			window.opener.parametro_facturacion_webcontrol1.actualizarPaginaTablaDatos(parametro_facturacion_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_facturacion_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_facturacion_control) {
		parametro_facturacion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_facturacion_control.strAuxiliarUrlPagina);
				
		parametro_facturacion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_facturacion_control.strAuxiliarTipo,parametro_facturacion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_facturacion_control) {
		parametro_facturacion_funcion1.resaltarRestaurarDivMensaje(true,parametro_facturacion_control.strAuxiliarMensajeAlert,parametro_facturacion_control.strAuxiliarCssMensaje);
			
		if(parametro_facturacion_funcion1.esPaginaForm(parametro_facturacion_constante1)==true) {
			window.opener.parametro_facturacion_funcion1.resaltarRestaurarDivMensaje(true,parametro_facturacion_control.strAuxiliarMensajeAlert,parametro_facturacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_facturacion_control) {
		this.parametro_facturacion_controlInicial=parametro_facturacion_control;
			
		if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_facturacion_control.strStyleDivArbol,parametro_facturacion_control.strStyleDivContent
																,parametro_facturacion_control.strStyleDivOpcionesBanner,parametro_facturacion_control.strStyleDivExpandirColapsar
																,parametro_facturacion_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_facturacion_control) {
		this.actualizarCssBotonesPagina(parametro_facturacion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_facturacion_control.tiposReportes,parametro_facturacion_control.tiposReporte
															 	,parametro_facturacion_control.tiposPaginacion,parametro_facturacion_control.tiposAcciones
																,parametro_facturacion_control.tiposColumnasSelect,parametro_facturacion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_facturacion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_facturacion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_facturacion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_facturacion_control) {
	
		var indexPosition=parametro_facturacion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_facturacion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_facturacion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_facturacion_control.strRecargarFkTipos,",")) { 
				parametro_facturacion_webcontrol1.cargarCombosempresasFK(parametro_facturacion_control);
			}

			if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",parametro_facturacion_control.strRecargarFkTipos,",")) { 
				parametro_facturacion_webcontrol1.cargarCombostermino_pago_clientesFK(parametro_facturacion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_facturacion_control.strRecargarFkTiposNinguno!=null && parametro_facturacion_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_facturacion_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_facturacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",parametro_facturacion_control.strRecargarFkTiposNinguno,",")) { 
					parametro_facturacion_webcontrol1.cargarCombosempresasFK(parametro_facturacion_control);
				}

				if(parametro_facturacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",parametro_facturacion_control.strRecargarFkTiposNinguno,",")) { 
					parametro_facturacion_webcontrol1.cargarCombostermino_pago_clientesFK(parametro_facturacion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(parametro_facturacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_facturacion_funcion1,parametro_facturacion_control.empresasFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(parametro_facturacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_facturacion_funcion1,parametro_facturacion_control.termino_pago_clientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(parametro_facturacion_control) {
		jQuery("#tdparametro_facturacionNuevo").css("display",parametro_facturacion_control.strPermisoNuevo);
		jQuery("#trparametro_facturacionElementos").css("display",parametro_facturacion_control.strVisibleTablaElementos);
		jQuery("#trparametro_facturacionAcciones").css("display",parametro_facturacion_control.strVisibleTablaAcciones);
		jQuery("#trparametro_facturacionParametrosAcciones").css("display",parametro_facturacion_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(parametro_facturacion_control) {
	
		this.actualizarCssBotonesMantenimiento(parametro_facturacion_control);
				
		if(parametro_facturacion_control.parametro_facturacionActual!=null) {//form
			
			this.actualizarCamposFormulario(parametro_facturacion_control);			
		}
						
		this.actualizarSpanMensajesCampos(parametro_facturacion_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(parametro_facturacion_control) {
	
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id").val(parametro_facturacion_control.parametro_facturacionActual.id);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-version_row").val(parametro_facturacion_control.parametro_facturacionActual.versionRow);
		
		if(parametro_facturacion_control.parametro_facturacionActual.id_empresa!=null && parametro_facturacion_control.parametro_facturacionActual.id_empresa>-1){
			if(jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_facturacion_control.parametro_facturacionActual.id_empresa) {
				jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_empresa").val(parametro_facturacion_control.parametro_facturacionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-nombre_factura").val(parametro_facturacion_control.parametro_facturacionActual.nombre_factura);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-numero_factura").val(parametro_facturacion_control.parametro_facturacionActual.numero_factura);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-incremento_factura").val(parametro_facturacion_control.parametro_facturacionActual.incremento_factura);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-solo_costo_producto").prop('checked',parametro_facturacion_control.parametro_facturacionActual.solo_costo_producto);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-numero_factura_lote").val(parametro_facturacion_control.parametro_facturacionActual.numero_factura_lote);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-incremento_factura_lote").val(parametro_facturacion_control.parametro_facturacionActual.incremento_factura_lote);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-numero_devolucion").val(parametro_facturacion_control.parametro_facturacionActual.numero_devolucion);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-incremento_devolucion").val(parametro_facturacion_control.parametro_facturacionActual.incremento_devolucion);
		
		if(parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente!=null && parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente>-1){
			if(jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente) {
				jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").select2("val", null);
			if(jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-nombre_estimado").val(parametro_facturacion_control.parametro_facturacionActual.nombre_estimado);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-numero_estimado").val(parametro_facturacion_control.parametro_facturacionActual.numero_estimado);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-incremento_estimado").val(parametro_facturacion_control.parametro_facturacionActual.incremento_estimado);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-solo_costo_producto_estimado").prop('checked',parametro_facturacion_control.parametro_facturacionActual.solo_costo_producto_estimado);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-nombre_consignacion").val(parametro_facturacion_control.parametro_facturacionActual.nombre_consignacion);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-numero_consignacion").val(parametro_facturacion_control.parametro_facturacionActual.numero_consignacion);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-incremento_consignacion").val(parametro_facturacion_control.parametro_facturacionActual.incremento_consignacion);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-solo_costo_producto_consignacion").prop('checked',parametro_facturacion_control.parametro_facturacionActual.solo_costo_producto_consignacion);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-con_recibo").prop('checked',parametro_facturacion_control.parametro_facturacionActual.con_recibo);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-nombre_recibo").val(parametro_facturacion_control.parametro_facturacionActual.nombre_recibo);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-numero_recibo").val(parametro_facturacion_control.parametro_facturacionActual.numero_recibo);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-incremento_recibo").val(parametro_facturacion_control.parametro_facturacionActual.incremento_recibo);
		jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-con_impuesto_recibo").prop('checked',parametro_facturacion_control.parametro_facturacionActual.con_impuesto_recibo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+parametro_facturacion_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("parametro_facturacion","facturacion","","form_parametro_facturacion",formulario,"","",paraEventoTabla,idFilaTabla,parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
	}
	
	actualizarSpanMensajesCampos(parametro_facturacion_control) {
		jQuery("#spanstrMensajeid").text(parametro_facturacion_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(parametro_facturacion_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(parametro_facturacion_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajenombre_factura").text(parametro_facturacion_control.strMensajenombre_factura);		
		jQuery("#spanstrMensajenumero_factura").text(parametro_facturacion_control.strMensajenumero_factura);		
		jQuery("#spanstrMensajeincremento_factura").text(parametro_facturacion_control.strMensajeincremento_factura);		
		jQuery("#spanstrMensajesolo_costo_producto").text(parametro_facturacion_control.strMensajesolo_costo_producto);		
		jQuery("#spanstrMensajenumero_factura_lote").text(parametro_facturacion_control.strMensajenumero_factura_lote);		
		jQuery("#spanstrMensajeincremento_factura_lote").text(parametro_facturacion_control.strMensajeincremento_factura_lote);		
		jQuery("#spanstrMensajenumero_devolucion").text(parametro_facturacion_control.strMensajenumero_devolucion);		
		jQuery("#spanstrMensajeincremento_devolucion").text(parametro_facturacion_control.strMensajeincremento_devolucion);		
		jQuery("#spanstrMensajeid_termino_pago_cliente").text(parametro_facturacion_control.strMensajeid_termino_pago_cliente);		
		jQuery("#spanstrMensajenombre_estimado").text(parametro_facturacion_control.strMensajenombre_estimado);		
		jQuery("#spanstrMensajenumero_estimado").text(parametro_facturacion_control.strMensajenumero_estimado);		
		jQuery("#spanstrMensajeincremento_estimado").text(parametro_facturacion_control.strMensajeincremento_estimado);		
		jQuery("#spanstrMensajesolo_costo_producto_estimado").text(parametro_facturacion_control.strMensajesolo_costo_producto_estimado);		
		jQuery("#spanstrMensajenombre_consignacion").text(parametro_facturacion_control.strMensajenombre_consignacion);		
		jQuery("#spanstrMensajenumero_consignacion").text(parametro_facturacion_control.strMensajenumero_consignacion);		
		jQuery("#spanstrMensajeincremento_consignacion").text(parametro_facturacion_control.strMensajeincremento_consignacion);		
		jQuery("#spanstrMensajesolo_costo_producto_consignacion").text(parametro_facturacion_control.strMensajesolo_costo_producto_consignacion);		
		jQuery("#spanstrMensajecon_recibo").text(parametro_facturacion_control.strMensajecon_recibo);		
		jQuery("#spanstrMensajenombre_recibo").text(parametro_facturacion_control.strMensajenombre_recibo);		
		jQuery("#spanstrMensajenumero_recibo").text(parametro_facturacion_control.strMensajenumero_recibo);		
		jQuery("#spanstrMensajeincremento_recibo").text(parametro_facturacion_control.strMensajeincremento_recibo);		
		jQuery("#spanstrMensajecon_impuesto_recibo").text(parametro_facturacion_control.strMensajecon_impuesto_recibo);		
	}
	
	actualizarCssBotonesMantenimiento(parametro_facturacion_control) {
		jQuery("#tdbtnNuevoparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoparametro_facturacion").css("display",parametro_facturacion_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarparametro_facturacion").css("display",parametro_facturacion_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarparametro_facturacion").css("display",parametro_facturacion_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosparametro_facturacion").css("display",parametro_facturacion_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarparametro_facturacion").css("visibility",parametro_facturacion_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(parametro_facturacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_empresa",parametro_facturacion_control.empresasFK);

		if(parametro_facturacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_facturacion_control.idFilaTablaActual+"_2",parametro_facturacion_control.empresasFK);
		}
	};

	cargarCombostermino_pago_clientesFK(parametro_facturacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente",parametro_facturacion_control.termino_pago_clientesFK);

		if(parametro_facturacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_facturacion_control.idFilaTablaActual+"_11",parametro_facturacion_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",parametro_facturacion_control.termino_pago_clientesFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(parametro_facturacion_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(parametro_facturacion_control) {

	};

	
	
	setDefectoValorCombosempresasFK(parametro_facturacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_facturacion_control.idempresaDefaultFK>-1 && jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_facturacion_control.idempresaDefaultFK) {
				jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_empresa").val(parametro_facturacion_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(parametro_facturacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_facturacion_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != parametro_facturacion_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(parametro_facturacion_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(parametro_facturacion_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_facturacion_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_facturacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_facturacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_facturacion_control.strRecargarFkTipos,",")) { 
				parametro_facturacion_webcontrol1.setDefectoValorCombosempresasFK(parametro_facturacion_control);
			}

			if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",parametro_facturacion_control.strRecargarFkTipos,",")) { 
				parametro_facturacion_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(parametro_facturacion_control);
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
	onLoadCombosEventosFK(parametro_facturacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_facturacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_facturacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_facturacion_webcontrol1.registrarComboActionChangeCombosempresasFK(parametro_facturacion_control);
			//}

			//if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",parametro_facturacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_facturacion_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(parametro_facturacion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_facturacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_facturacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_facturacion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(parametro_facturacion_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_facturacion_funcion1.validarFormularioJQuery(parametro_facturacion_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_facturacion");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_facturacion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,"parametro_facturacion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				parametro_facturacion_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				parametro_facturacion_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_facturacion_control) {
		
		
		
		if(parametro_facturacion_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_facturacionActualizarToolBar").css("display",parametro_facturacion_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdparametro_facturacionEliminarToolBar").css("display",parametro_facturacion_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trparametro_facturacionElementos").css("display",parametro_facturacion_control.strVisibleTablaElementos);
		
		jQuery("#trparametro_facturacionAcciones").css("display",parametro_facturacion_control.strVisibleTablaAcciones);
		jQuery("#trparametro_facturacionParametrosAcciones").css("display",parametro_facturacion_control.strVisibleTablaAcciones);
		
		jQuery("#tdparametro_facturacionCerrarPagina").css("display",parametro_facturacion_control.strPermisoPopup);		
		jQuery("#tdparametro_facturacionCerrarPaginaToolBar").css("display",parametro_facturacion_control.strPermisoPopup);
		//jQuery("#trparametro_facturacionAccionesRelaciones").css("display",parametro_facturacion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_facturacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_facturacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_facturacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametro Facturacions";
		sTituloBanner+=" - " + parametro_facturacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_facturacion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_facturacionRelacionesToolBar").css("display",parametro_facturacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_facturacion").css("display",parametro_facturacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_facturacion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_facturacion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_facturacion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_facturacion_webcontrol1.registrarEventosControles();
		
		if(parametro_facturacion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="false") {
			parametro_facturacion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_facturacion_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_facturacion_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_facturacion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_facturacion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_facturacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(parametro_facturacion_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(parametro_facturacion_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
						//parametro_facturacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(parametro_facturacion_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(parametro_facturacion_constante1.BIG_ID_ACTUAL,"parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
						//parametro_facturacion_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			parametro_facturacion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);	
	}
}

var parametro_facturacion_webcontrol1 = new parametro_facturacion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_facturacion_webcontrol,parametro_facturacion_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_facturacion_webcontrol1 = parametro_facturacion_webcontrol1;


if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_facturacion_webcontrol1.onLoadWindow; 
}

//</script>