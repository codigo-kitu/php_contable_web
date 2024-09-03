//<script type="text/javascript" language="javascript">



//var instrumento_pagoJQueryPaginaWebInteraccion= function (instrumento_pago_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {instrumento_pago_constante,instrumento_pago_constante1} from '../util/instrumento_pago_constante.js';

import {instrumento_pago_funcion,instrumento_pago_funcion1} from '../util/instrumento_pago_form_funcion.js';


class instrumento_pago_webcontrol extends GeneralEntityWebControl {
	
	instrumento_pago_control=null;
	instrumento_pago_controlInicial=null;
	instrumento_pago_controlAuxiliar=null;
		
	//if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(instrumento_pago_control) {
		super();
		
		this.instrumento_pago_control=instrumento_pago_control;
	}
		
	actualizarVariablesPagina(instrumento_pago_control) {
		
		if(instrumento_pago_control.action=="index" || instrumento_pago_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(instrumento_pago_control);
			
		} 
		
		
		
	
		else if(instrumento_pago_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(instrumento_pago_control);	
		
		} else if(instrumento_pago_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(instrumento_pago_control);		
		}
	
	
		
		
		else if(instrumento_pago_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(instrumento_pago_control);		
		
		} else if(instrumento_pago_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(instrumento_pago_control);		
		
		} 
		//else if(instrumento_pago_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(instrumento_pago_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + instrumento_pago_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(instrumento_pago_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(instrumento_pago_control) {
		this.actualizarPaginaAccionesGenerales(instrumento_pago_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(instrumento_pago_control) {
		
		this.actualizarPaginaCargaGeneral(instrumento_pago_control);
		this.actualizarPaginaOrderBy(instrumento_pago_control);
		this.actualizarPaginaTablaDatos(instrumento_pago_control);
		this.actualizarPaginaCargaGeneralControles(instrumento_pago_control);
		//this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(instrumento_pago_control);
		this.actualizarPaginaAreaBusquedas(instrumento_pago_control);
		this.actualizarPaginaCargaCombosFK(instrumento_pago_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(instrumento_pago_control) {
		//this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(instrumento_pago_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(instrumento_pago_control) {
		this.actualizarPaginaTablaDatosAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(instrumento_pago_control) {
		this.actualizarPaginaTablaDatosAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(instrumento_pago_control) {
		this.actualizarPaginaTablaDatosAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(instrumento_pago_control) {
		this.actualizarPaginaCargaGeneralControles(instrumento_pago_control);
		this.actualizarPaginaCargaCombosFK(instrumento_pago_control);
		this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(instrumento_pago_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(instrumento_pago_control) {
		this.actualizarPaginaCargaGeneralControles(instrumento_pago_control);
		this.actualizarPaginaCargaCombosFK(instrumento_pago_control);
		this.actualizarPaginaFormulario(instrumento_pago_control);
		this.onLoadCombosDefectoFK(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(instrumento_pago_control) {
		//FORMULARIO
		if(instrumento_pago_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(instrumento_pago_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(instrumento_pago_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		
		//COMBOS FK
		if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(instrumento_pago_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(instrumento_pago_control) {
		//FORMULARIO
		if(instrumento_pago_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(instrumento_pago_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(instrumento_pago_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);	
		
		//COMBOS FK
		if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(instrumento_pago_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(instrumento_pago_control) {
		//FORMULARIO
		if(instrumento_pago_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(instrumento_pago_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);	
		//COMBOS FK
		if(instrumento_pago_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(instrumento_pago_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(instrumento_pago_control) {
		
		if(instrumento_pago_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(instrumento_pago_control);
		}
		
		if(instrumento_pago_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(instrumento_pago_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(instrumento_pago_control) {
		if(instrumento_pago_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("instrumento_pagoReturnGeneral",JSON.stringify(instrumento_pago_control.instrumento_pagoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control) {
		if(instrumento_pago_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && instrumento_pago_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(instrumento_pago_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(instrumento_pago_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(instrumento_pago_control, mostrar) {
		
		if(mostrar==true) {
			instrumento_pago_funcion1.resaltarRestaurarDivsPagina(false,"instrumento_pago");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				instrumento_pago_funcion1.resaltarRestaurarDivMantenimiento(false,"instrumento_pago");
			}			
			
			instrumento_pago_funcion1.mostrarDivMensaje(true,instrumento_pago_control.strAuxiliarMensaje,instrumento_pago_control.strAuxiliarCssMensaje);
		
		} else {
			instrumento_pago_funcion1.mostrarDivMensaje(false,instrumento_pago_control.strAuxiliarMensaje,instrumento_pago_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(instrumento_pago_control) {
		if(instrumento_pago_funcion1.esPaginaForm(instrumento_pago_constante1)==true) {
			window.opener.instrumento_pago_webcontrol1.actualizarPaginaTablaDatos(instrumento_pago_control);
		} else {
			this.actualizarPaginaTablaDatos(instrumento_pago_control);
		}
	}
	
	actualizarPaginaAbrirLink(instrumento_pago_control) {
		instrumento_pago_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(instrumento_pago_control.strAuxiliarUrlPagina);
				
		instrumento_pago_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(instrumento_pago_control.strAuxiliarTipo,instrumento_pago_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(instrumento_pago_control) {
		instrumento_pago_funcion1.resaltarRestaurarDivMensaje(true,instrumento_pago_control.strAuxiliarMensajeAlert,instrumento_pago_control.strAuxiliarCssMensaje);
			
		if(instrumento_pago_funcion1.esPaginaForm(instrumento_pago_constante1)==true) {
			window.opener.instrumento_pago_funcion1.resaltarRestaurarDivMensaje(true,instrumento_pago_control.strAuxiliarMensajeAlert,instrumento_pago_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(instrumento_pago_control) {
		this.instrumento_pago_controlInicial=instrumento_pago_control;
			
		if(instrumento_pago_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(instrumento_pago_control.strStyleDivArbol,instrumento_pago_control.strStyleDivContent
																,instrumento_pago_control.strStyleDivOpcionesBanner,instrumento_pago_control.strStyleDivExpandirColapsar
																,instrumento_pago_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(instrumento_pago_control) {
		this.actualizarCssBotonesPagina(instrumento_pago_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(instrumento_pago_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(instrumento_pago_control.tiposReportes,instrumento_pago_control.tiposReporte
															 	,instrumento_pago_control.tiposPaginacion,instrumento_pago_control.tiposAcciones
																,instrumento_pago_control.tiposColumnasSelect,instrumento_pago_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(instrumento_pago_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(instrumento_pago_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(instrumento_pago_control);			
	}
	
	actualizarPaginaUsuarioInvitado(instrumento_pago_control) {
	
		var indexPosition=instrumento_pago_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=instrumento_pago_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(instrumento_pago_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.cargarComboscuenta_comprassFK(instrumento_pago_control);
			}

			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.cargarComboscuenta_ventassFK(instrumento_pago_control);
			}

			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.cargarComboscuenta_corrientesFK(instrumento_pago_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(instrumento_pago_control.strRecargarFkTiposNinguno!=null && instrumento_pago_control.strRecargarFkTiposNinguno!='NINGUNO' && instrumento_pago_control.strRecargarFkTiposNinguno!='') {
			
				if(instrumento_pago_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",instrumento_pago_control.strRecargarFkTiposNinguno,",")) { 
					instrumento_pago_webcontrol1.cargarComboscuenta_comprassFK(instrumento_pago_control);
				}

				if(instrumento_pago_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",instrumento_pago_control.strRecargarFkTiposNinguno,",")) { 
					instrumento_pago_webcontrol1.cargarComboscuenta_ventassFK(instrumento_pago_control);
				}

				if(instrumento_pago_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",instrumento_pago_control.strRecargarFkTiposNinguno,",")) { 
					instrumento_pago_webcontrol1.cargarComboscuenta_corrientesFK(instrumento_pago_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablacuenta_comprasFK(instrumento_pago_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,instrumento_pago_funcion1,instrumento_pago_control.cuenta_comprassFK);
	}

	cargarComboEditarTablacuenta_ventasFK(instrumento_pago_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,instrumento_pago_funcion1,instrumento_pago_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(instrumento_pago_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,instrumento_pago_funcion1,instrumento_pago_control.cuenta_corrientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(instrumento_pago_control) {
		jQuery("#tdinstrumento_pagoNuevo").css("display",instrumento_pago_control.strPermisoNuevo);
		jQuery("#trinstrumento_pagoElementos").css("display",instrumento_pago_control.strVisibleTablaElementos);
		jQuery("#trinstrumento_pagoAcciones").css("display",instrumento_pago_control.strVisibleTablaAcciones);
		jQuery("#trinstrumento_pagoParametrosAcciones").css("display",instrumento_pago_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(instrumento_pago_control) {
	
		this.actualizarCssBotonesMantenimiento(instrumento_pago_control);
				
		if(instrumento_pago_control.instrumento_pagoActual!=null) {//form
			
			this.actualizarCamposFormulario(instrumento_pago_control);			
		}
						
		this.actualizarSpanMensajesCampos(instrumento_pago_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(instrumento_pago_control) {
	
		jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id").val(instrumento_pago_control.instrumento_pagoActual.id);
		jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-version_row").val(instrumento_pago_control.instrumento_pagoActual.versionRow);
		jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-codigo").val(instrumento_pago_control.instrumento_pagoActual.codigo);
		jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-descripcion").val(instrumento_pago_control.instrumento_pagoActual.descripcion);
		jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-predeterminado").val(instrumento_pago_control.instrumento_pagoActual.predeterminado);
		
		if(instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras!=null && instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras>-1){
			if(jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").val(instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			//jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").select2("val", null);
			if(jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas!=null && instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas>-1){
			if(jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			//jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").select2("val", null);
			if(jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-cuenta_contable_compra").val(instrumento_pago_control.instrumento_pagoActual.cuenta_contable_compra);
		jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-cuenta_contable_ventas").val(instrumento_pago_control.instrumento_pagoActual.cuenta_contable_ventas);
		
		if(instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente!=null && instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente>-1){
			if(jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").select2("val", null);
			if(jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+instrumento_pago_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("instrumento_pago","cuentascorrientes","","form_instrumento_pago",formulario,"","",paraEventoTabla,idFilaTabla,instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
	}
	
	actualizarSpanMensajesCampos(instrumento_pago_control) {
		jQuery("#spanstrMensajeid").text(instrumento_pago_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(instrumento_pago_control.strMensajeversion_row);		
		jQuery("#spanstrMensajecodigo").text(instrumento_pago_control.strMensajecodigo);		
		jQuery("#spanstrMensajedescripcion").text(instrumento_pago_control.strMensajedescripcion);		
		jQuery("#spanstrMensajepredeterminado").text(instrumento_pago_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta_compras").text(instrumento_pago_control.strMensajeid_cuenta_compras);		
		jQuery("#spanstrMensajeid_cuenta_ventas").text(instrumento_pago_control.strMensajeid_cuenta_ventas);		
		jQuery("#spanstrMensajecuenta_contable_compra").text(instrumento_pago_control.strMensajecuenta_contable_compra);		
		jQuery("#spanstrMensajecuenta_contable_ventas").text(instrumento_pago_control.strMensajecuenta_contable_ventas);		
		jQuery("#spanstrMensajeid_cuenta_corriente").text(instrumento_pago_control.strMensajeid_cuenta_corriente);		
	}
	
	actualizarCssBotonesMantenimiento(instrumento_pago_control) {
		jQuery("#tdbtnNuevoinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoinstrumento_pago").css("display",instrumento_pago_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarinstrumento_pago").css("display",instrumento_pago_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarinstrumento_pago").css("display",instrumento_pago_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosinstrumento_pago").css("display",instrumento_pago_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarinstrumento_pago").css("visibility",instrumento_pago_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarComboscuenta_comprassFK(instrumento_pago_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras",instrumento_pago_control.cuenta_comprassFK);

		if(instrumento_pago_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+instrumento_pago_control.idFilaTablaActual+"_5",instrumento_pago_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",instrumento_pago_control.cuenta_comprassFK);

	};

	cargarComboscuenta_ventassFK(instrumento_pago_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas",instrumento_pago_control.cuenta_ventassFK);

		if(instrumento_pago_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+instrumento_pago_control.idFilaTablaActual+"_6",instrumento_pago_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",instrumento_pago_control.cuenta_ventassFK);

	};

	cargarComboscuenta_corrientesFK(instrumento_pago_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente",instrumento_pago_control.cuenta_corrientesFK);

		if(instrumento_pago_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+instrumento_pago_control.idFilaTablaActual+"_9",instrumento_pago_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",instrumento_pago_control.cuenta_corrientesFK);

	};

	
	
	registrarComboActionChangeComboscuenta_comprassFK(instrumento_pago_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(instrumento_pago_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(instrumento_pago_control) {

	};

	
	
	setDefectoValorComboscuenta_comprassFK(instrumento_pago_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(instrumento_pago_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != instrumento_pago_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").val(instrumento_pago_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(instrumento_pago_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(instrumento_pago_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(instrumento_pago_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != instrumento_pago_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(instrumento_pago_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(instrumento_pago_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(instrumento_pago_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(instrumento_pago_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != instrumento_pago_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(instrumento_pago_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(instrumento_pago_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//instrumento_pago_control
		
	
	}
	
	onLoadCombosDefectoFK(instrumento_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(instrumento_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.setDefectoValorComboscuenta_comprassFK(instrumento_pago_control);
			}

			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.setDefectoValorComboscuenta_ventassFK(instrumento_pago_control);
			}

			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.setDefectoValorComboscuenta_corrientesFK(instrumento_pago_control);
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
	onLoadCombosEventosFK(instrumento_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(instrumento_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",instrumento_pago_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				instrumento_pago_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(instrumento_pago_control);
			//}

			//if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",instrumento_pago_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				instrumento_pago_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(instrumento_pago_control);
			//}

			//if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",instrumento_pago_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				instrumento_pago_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(instrumento_pago_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(instrumento_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(instrumento_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(instrumento_pago_constante1.BIT_ES_PAGINA_FORM==true) {
				instrumento_pago_funcion1.validarFormularioJQuery(instrumento_pago_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("instrumento_pago");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("instrumento_pago");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(instrumento_pago_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,"instrumento_pago");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				instrumento_pago_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				instrumento_pago_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				instrumento_pago_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(instrumento_pago_control) {
		
		
		
		if(instrumento_pago_control.strPermisoActualizar!=null) {
			jQuery("#tdinstrumento_pagoActualizarToolBar").css("display",instrumento_pago_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdinstrumento_pagoEliminarToolBar").css("display",instrumento_pago_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trinstrumento_pagoElementos").css("display",instrumento_pago_control.strVisibleTablaElementos);
		
		jQuery("#trinstrumento_pagoAcciones").css("display",instrumento_pago_control.strVisibleTablaAcciones);
		jQuery("#trinstrumento_pagoParametrosAcciones").css("display",instrumento_pago_control.strVisibleTablaAcciones);
		
		jQuery("#tdinstrumento_pagoCerrarPagina").css("display",instrumento_pago_control.strPermisoPopup);		
		jQuery("#tdinstrumento_pagoCerrarPaginaToolBar").css("display",instrumento_pago_control.strPermisoPopup);
		//jQuery("#trinstrumento_pagoAccionesRelaciones").css("display",instrumento_pago_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=instrumento_pago_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + instrumento_pago_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + instrumento_pago_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Instrumento Pagos";
		sTituloBanner+=" - " + instrumento_pago_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + instrumento_pago_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdinstrumento_pagoRelacionesToolBar").css("display",instrumento_pago_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosinstrumento_pago").css("display",instrumento_pago_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		instrumento_pago_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		instrumento_pago_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		instrumento_pago_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		instrumento_pago_webcontrol1.registrarEventosControles();
		
		if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(instrumento_pago_constante1.STR_ES_RELACIONADO=="false") {
			instrumento_pago_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(instrumento_pago_constante1.STR_ES_RELACIONES=="true") {
			if(instrumento_pago_constante1.BIT_ES_PAGINA_FORM==true) {
				instrumento_pago_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(instrumento_pago_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(instrumento_pago_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(instrumento_pago_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(instrumento_pago_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
						//instrumento_pago_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(instrumento_pago_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(instrumento_pago_constante1.BIG_ID_ACTUAL,"instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
						//instrumento_pago_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			instrumento_pago_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);	
	}
}

var instrumento_pago_webcontrol1 = new instrumento_pago_webcontrol();

//Para ser llamado desde otro archivo (import)
export {instrumento_pago_webcontrol,instrumento_pago_webcontrol1};

//Para ser llamado desde window.opener
window.instrumento_pago_webcontrol1 = instrumento_pago_webcontrol1;


if(instrumento_pago_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = instrumento_pago_webcontrol1.onLoadWindow; 
}

//</script>