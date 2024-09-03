//<script type="text/javascript" language="javascript">



//var otro_impuestoJQueryPaginaWebInteraccion= function (otro_impuesto_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {otro_impuesto_constante,otro_impuesto_constante1} from '../util/otro_impuesto_constante.js';

import {otro_impuesto_funcion,otro_impuesto_funcion1} from '../util/otro_impuesto_form_funcion.js';


class otro_impuesto_webcontrol extends GeneralEntityWebControl {
	
	otro_impuesto_control=null;
	otro_impuesto_controlInicial=null;
	otro_impuesto_controlAuxiliar=null;
		
	//if(otro_impuesto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(otro_impuesto_control) {
		super();
		
		this.otro_impuesto_control=otro_impuesto_control;
	}
		
	actualizarVariablesPagina(otro_impuesto_control) {
		
		if(otro_impuesto_control.action=="index" || otro_impuesto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(otro_impuesto_control);
			
		} 
		
		
		
	
		else if(otro_impuesto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(otro_impuesto_control);	
		
		} else if(otro_impuesto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(otro_impuesto_control);		
		}
	
		else if(otro_impuesto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(otro_impuesto_control);		
		}
	
		else if(otro_impuesto_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(otro_impuesto_control);
		}
		
		
		else if(otro_impuesto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(otro_impuesto_control);		
		
		} else if(otro_impuesto_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(otro_impuesto_control);		
		
		} 
		//else if(otro_impuesto_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(otro_impuesto_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + otro_impuesto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(otro_impuesto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(otro_impuesto_control) {
		this.actualizarPaginaAccionesGenerales(otro_impuesto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(otro_impuesto_control) {
		
		this.actualizarPaginaCargaGeneral(otro_impuesto_control);
		this.actualizarPaginaOrderBy(otro_impuesto_control);
		this.actualizarPaginaTablaDatos(otro_impuesto_control);
		this.actualizarPaginaCargaGeneralControles(otro_impuesto_control);
		//this.actualizarPaginaFormulario(otro_impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_impuesto_control);
		this.actualizarPaginaAreaBusquedas(otro_impuesto_control);
		this.actualizarPaginaCargaCombosFK(otro_impuesto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(otro_impuesto_control) {
		//this.actualizarPaginaFormulario(otro_impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(otro_impuesto_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(otro_impuesto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_impuesto_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(otro_impuesto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_impuesto_control);		
		this.actualizarPaginaFormulario(otro_impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(otro_impuesto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_impuesto_control);		
		this.actualizarPaginaFormulario(otro_impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(otro_impuesto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(otro_impuesto_control);		
		this.actualizarPaginaFormulario(otro_impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(otro_impuesto_control) {
		this.actualizarPaginaCargaGeneralControles(otro_impuesto_control);
		this.actualizarPaginaCargaCombosFK(otro_impuesto_control);
		this.actualizarPaginaFormulario(otro_impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(otro_impuesto_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(otro_impuesto_control) {
		this.actualizarPaginaCargaGeneralControles(otro_impuesto_control);
		this.actualizarPaginaCargaCombosFK(otro_impuesto_control);
		this.actualizarPaginaFormulario(otro_impuesto_control);
		this.onLoadCombosDefectoFK(otro_impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(otro_impuesto_control) {
		//FORMULARIO
		if(otro_impuesto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_impuesto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(otro_impuesto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		
		//COMBOS FK
		if(otro_impuesto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_impuesto_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(otro_impuesto_control) {
		//FORMULARIO
		if(otro_impuesto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_impuesto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(otro_impuesto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);	
		
		//COMBOS FK
		if(otro_impuesto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_impuesto_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(otro_impuesto_control) {
		//FORMULARIO
		if(otro_impuesto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(otro_impuesto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);	
		//COMBOS FK
		if(otro_impuesto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(otro_impuesto_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(otro_impuesto_control) {
		
		if(otro_impuesto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(otro_impuesto_control);
		}
		
		if(otro_impuesto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(otro_impuesto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(otro_impuesto_control) {
		if(otro_impuesto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("otro_impuestoReturnGeneral",JSON.stringify(otro_impuesto_control.otro_impuestoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control) {
		if(otro_impuesto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && otro_impuesto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(otro_impuesto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(otro_impuesto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(otro_impuesto_control, mostrar) {
		
		if(mostrar==true) {
			otro_impuesto_funcion1.resaltarRestaurarDivsPagina(false,"otro_impuesto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				otro_impuesto_funcion1.resaltarRestaurarDivMantenimiento(false,"otro_impuesto");
			}			
			
			otro_impuesto_funcion1.mostrarDivMensaje(true,otro_impuesto_control.strAuxiliarMensaje,otro_impuesto_control.strAuxiliarCssMensaje);
		
		} else {
			otro_impuesto_funcion1.mostrarDivMensaje(false,otro_impuesto_control.strAuxiliarMensaje,otro_impuesto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(otro_impuesto_control) {
		if(otro_impuesto_funcion1.esPaginaForm(otro_impuesto_constante1)==true) {
			window.opener.otro_impuesto_webcontrol1.actualizarPaginaTablaDatos(otro_impuesto_control);
		} else {
			this.actualizarPaginaTablaDatos(otro_impuesto_control);
		}
	}
	
	actualizarPaginaAbrirLink(otro_impuesto_control) {
		otro_impuesto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(otro_impuesto_control.strAuxiliarUrlPagina);
				
		otro_impuesto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(otro_impuesto_control.strAuxiliarTipo,otro_impuesto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(otro_impuesto_control) {
		otro_impuesto_funcion1.resaltarRestaurarDivMensaje(true,otro_impuesto_control.strAuxiliarMensajeAlert,otro_impuesto_control.strAuxiliarCssMensaje);
			
		if(otro_impuesto_funcion1.esPaginaForm(otro_impuesto_constante1)==true) {
			window.opener.otro_impuesto_funcion1.resaltarRestaurarDivMensaje(true,otro_impuesto_control.strAuxiliarMensajeAlert,otro_impuesto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(otro_impuesto_control) {
		this.otro_impuesto_controlInicial=otro_impuesto_control;
			
		if(otro_impuesto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(otro_impuesto_control.strStyleDivArbol,otro_impuesto_control.strStyleDivContent
																,otro_impuesto_control.strStyleDivOpcionesBanner,otro_impuesto_control.strStyleDivExpandirColapsar
																,otro_impuesto_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(otro_impuesto_control) {
		this.actualizarCssBotonesPagina(otro_impuesto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(otro_impuesto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(otro_impuesto_control.tiposReportes,otro_impuesto_control.tiposReporte
															 	,otro_impuesto_control.tiposPaginacion,otro_impuesto_control.tiposAcciones
																,otro_impuesto_control.tiposColumnasSelect,otro_impuesto_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(otro_impuesto_control.tiposRelaciones,otro_impuesto_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(otro_impuesto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(otro_impuesto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(otro_impuesto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(otro_impuesto_control) {
	
		var indexPosition=otro_impuesto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=otro_impuesto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(otro_impuesto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",otro_impuesto_control.strRecargarFkTipos,",")) { 
				otro_impuesto_webcontrol1.cargarCombosempresasFK(otro_impuesto_control);
			}

			if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",otro_impuesto_control.strRecargarFkTipos,",")) { 
				otro_impuesto_webcontrol1.cargarComboscuenta_ventassFK(otro_impuesto_control);
			}

			if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",otro_impuesto_control.strRecargarFkTipos,",")) { 
				otro_impuesto_webcontrol1.cargarComboscuenta_comprassFK(otro_impuesto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(otro_impuesto_control.strRecargarFkTiposNinguno!=null && otro_impuesto_control.strRecargarFkTiposNinguno!='NINGUNO' && otro_impuesto_control.strRecargarFkTiposNinguno!='') {
			
				if(otro_impuesto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",otro_impuesto_control.strRecargarFkTiposNinguno,",")) { 
					otro_impuesto_webcontrol1.cargarCombosempresasFK(otro_impuesto_control);
				}

				if(otro_impuesto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",otro_impuesto_control.strRecargarFkTiposNinguno,",")) { 
					otro_impuesto_webcontrol1.cargarComboscuenta_ventassFK(otro_impuesto_control);
				}

				if(otro_impuesto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",otro_impuesto_control.strRecargarFkTiposNinguno,",")) { 
					otro_impuesto_webcontrol1.cargarComboscuenta_comprassFK(otro_impuesto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(otro_impuesto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_impuesto_funcion1,otro_impuesto_control.empresasFK);
	}

	cargarComboEditarTablacuenta_ventasFK(otro_impuesto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_impuesto_funcion1,otro_impuesto_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_comprasFK(otro_impuesto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_impuesto_funcion1,otro_impuesto_control.cuenta_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(otro_impuesto_control) {
		jQuery("#tdotro_impuestoNuevo").css("display",otro_impuesto_control.strPermisoNuevo);
		jQuery("#trotro_impuestoElementos").css("display",otro_impuesto_control.strVisibleTablaElementos);
		jQuery("#trotro_impuestoAcciones").css("display",otro_impuesto_control.strVisibleTablaAcciones);
		jQuery("#trotro_impuestoParametrosAcciones").css("display",otro_impuesto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(otro_impuesto_control) {
	
		this.actualizarCssBotonesMantenimiento(otro_impuesto_control);
				
		if(otro_impuesto_control.otro_impuestoActual!=null) {//form
			
			this.actualizarCamposFormulario(otro_impuesto_control);			
		}
						
		this.actualizarSpanMensajesCampos(otro_impuesto_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(otro_impuesto_control) {
	
		jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id").val(otro_impuesto_control.otro_impuestoActual.id);
		jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-created_at").val(otro_impuesto_control.otro_impuestoActual.versionRow);
		jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-updated_at").val(otro_impuesto_control.otro_impuestoActual.versionRow);
		
		if(otro_impuesto_control.otro_impuestoActual.id_empresa!=null && otro_impuesto_control.otro_impuestoActual.id_empresa>-1){
			if(jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_empresa").val() != otro_impuesto_control.otro_impuestoActual.id_empresa) {
				jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_empresa").val(otro_impuesto_control.otro_impuestoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-codigo").val(otro_impuesto_control.otro_impuestoActual.codigo);
		jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-descripcion").val(otro_impuesto_control.otro_impuestoActual.descripcion);
		jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-valor").val(otro_impuesto_control.otro_impuestoActual.valor);
		jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-predeterminado").prop('checked',otro_impuesto_control.otro_impuestoActual.predeterminado);
		
		if(otro_impuesto_control.otro_impuestoActual.id_cuenta_ventas!=null && otro_impuesto_control.otro_impuestoActual.id_cuenta_ventas>-1){
			if(jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != otro_impuesto_control.otro_impuestoActual.id_cuenta_ventas) {
				jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(otro_impuesto_control.otro_impuestoActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(otro_impuesto_control.otro_impuestoActual.id_cuenta_compras!=null && otro_impuesto_control.otro_impuestoActual.id_cuenta_compras>-1){
			if(jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != otro_impuesto_control.otro_impuestoActual.id_cuenta_compras) {
				jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val(otro_impuesto_control.otro_impuestoActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-cuenta_contable_ventas").val(otro_impuesto_control.otro_impuestoActual.cuenta_contable_ventas);
		jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-cuenta_contable_compras").val(otro_impuesto_control.otro_impuestoActual.cuenta_contable_compras);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+otro_impuesto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("otro_impuesto","facturacion","","form_otro_impuesto",formulario,"","",paraEventoTabla,idFilaTabla,otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
	}
	
	actualizarSpanMensajesCampos(otro_impuesto_control) {
		jQuery("#spanstrMensajeid").text(otro_impuesto_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(otro_impuesto_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(otro_impuesto_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(otro_impuesto_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(otro_impuesto_control.strMensajecodigo);		
		jQuery("#spanstrMensajedescripcion").text(otro_impuesto_control.strMensajedescripcion);		
		jQuery("#spanstrMensajevalor").text(otro_impuesto_control.strMensajevalor);		
		jQuery("#spanstrMensajepredeterminado").text(otro_impuesto_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta_ventas").text(otro_impuesto_control.strMensajeid_cuenta_ventas);		
		jQuery("#spanstrMensajeid_cuenta_compras").text(otro_impuesto_control.strMensajeid_cuenta_compras);		
		jQuery("#spanstrMensajecuenta_contable_ventas").text(otro_impuesto_control.strMensajecuenta_contable_ventas);		
		jQuery("#spanstrMensajecuenta_contable_compras").text(otro_impuesto_control.strMensajecuenta_contable_compras);		
	}
	
	actualizarCssBotonesMantenimiento(otro_impuesto_control) {
		jQuery("#tdbtnNuevootro_impuesto").css("visibility",otro_impuesto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevootro_impuesto").css("display",otro_impuesto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarotro_impuesto").css("visibility",otro_impuesto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarotro_impuesto").css("display",otro_impuesto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarotro_impuesto").css("visibility",otro_impuesto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarotro_impuesto").css("display",otro_impuesto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarotro_impuesto").css("visibility",otro_impuesto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosotro_impuesto").css("visibility",otro_impuesto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosotro_impuesto").css("display",otro_impuesto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarotro_impuesto").css("visibility",otro_impuesto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarotro_impuesto").css("visibility",otro_impuesto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarotro_impuesto").css("visibility",otro_impuesto_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(otro_impuesto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_empresa",otro_impuesto_control.empresasFK);

		if(otro_impuesto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_impuesto_control.idFilaTablaActual+"_3",otro_impuesto_control.empresasFK);
		}
	};

	cargarComboscuenta_ventassFK(otro_impuesto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas",otro_impuesto_control.cuenta_ventassFK);

		if(otro_impuesto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_impuesto_control.idFilaTablaActual+"_8",otro_impuesto_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",otro_impuesto_control.cuenta_ventassFK);

	};

	cargarComboscuenta_comprassFK(otro_impuesto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras",otro_impuesto_control.cuenta_comprassFK);

		if(otro_impuesto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_impuesto_control.idFilaTablaActual+"_9",otro_impuesto_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",otro_impuesto_control.cuenta_comprassFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(otro_impuesto_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(otro_impuesto_control) {

	};

	registrarComboActionChangeComboscuenta_comprassFK(otro_impuesto_control) {

	};

	
	
	setDefectoValorCombosempresasFK(otro_impuesto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_impuesto_control.idempresaDefaultFK>-1 && jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_empresa").val() != otro_impuesto_control.idempresaDefaultFK) {
				jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_empresa").val(otro_impuesto_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(otro_impuesto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_impuesto_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != otro_impuesto_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(otro_impuesto_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(otro_impuesto_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprassFK(otro_impuesto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_impuesto_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != otro_impuesto_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val(otro_impuesto_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(otro_impuesto_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//otro_impuesto_control
		
	
	}
	
	onLoadCombosDefectoFK(otro_impuesto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_impuesto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",otro_impuesto_control.strRecargarFkTipos,",")) { 
				otro_impuesto_webcontrol1.setDefectoValorCombosempresasFK(otro_impuesto_control);
			}

			if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",otro_impuesto_control.strRecargarFkTipos,",")) { 
				otro_impuesto_webcontrol1.setDefectoValorComboscuenta_ventassFK(otro_impuesto_control);
			}

			if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",otro_impuesto_control.strRecargarFkTipos,",")) { 
				otro_impuesto_webcontrol1.setDefectoValorComboscuenta_comprassFK(otro_impuesto_control);
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
	onLoadCombosEventosFK(otro_impuesto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_impuesto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",otro_impuesto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_impuesto_webcontrol1.registrarComboActionChangeCombosempresasFK(otro_impuesto_control);
			//}

			//if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",otro_impuesto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_impuesto_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(otro_impuesto_control);
			//}

			//if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",otro_impuesto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_impuesto_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(otro_impuesto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(otro_impuesto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_impuesto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(otro_impuesto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(otro_impuesto_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_impuesto_funcion1.validarFormularioJQuery(otro_impuesto_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("otro_impuesto");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("otro_impuesto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(otro_impuesto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,"otro_impuesto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				otro_impuesto_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				otro_impuesto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				otro_impuesto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("otro_impuesto");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(otro_impuesto_control) {
		
		
		
		if(otro_impuesto_control.strPermisoActualizar!=null) {
			jQuery("#tdotro_impuestoActualizarToolBar").css("display",otro_impuesto_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdotro_impuestoEliminarToolBar").css("display",otro_impuesto_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trotro_impuestoElementos").css("display",otro_impuesto_control.strVisibleTablaElementos);
		
		jQuery("#trotro_impuestoAcciones").css("display",otro_impuesto_control.strVisibleTablaAcciones);
		jQuery("#trotro_impuestoParametrosAcciones").css("display",otro_impuesto_control.strVisibleTablaAcciones);
		
		jQuery("#tdotro_impuestoCerrarPagina").css("display",otro_impuesto_control.strPermisoPopup);		
		jQuery("#tdotro_impuestoCerrarPaginaToolBar").css("display",otro_impuesto_control.strPermisoPopup);
		//jQuery("#trotro_impuestoAccionesRelaciones").css("display",otro_impuesto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=otro_impuesto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_impuesto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + otro_impuesto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Otro Impuestos";
		sTituloBanner+=" - " + otro_impuesto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_impuesto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdotro_impuestoRelacionesToolBar").css("display",otro_impuesto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosotro_impuesto").css("display",otro_impuesto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		otro_impuesto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		otro_impuesto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		otro_impuesto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		otro_impuesto_webcontrol1.registrarEventosControles();
		
		if(otro_impuesto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(otro_impuesto_constante1.STR_ES_RELACIONADO=="false") {
			otro_impuesto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(otro_impuesto_constante1.STR_ES_RELACIONES=="true") {
			if(otro_impuesto_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_impuesto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(otro_impuesto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(otro_impuesto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(otro_impuesto_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(otro_impuesto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
						//otro_impuesto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(otro_impuesto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(otro_impuesto_constante1.BIG_ID_ACTUAL,"otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
						//otro_impuesto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			otro_impuesto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);	
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

var otro_impuesto_webcontrol1 = new otro_impuesto_webcontrol();

//Para ser llamado desde otro archivo (import)
export {otro_impuesto_webcontrol,otro_impuesto_webcontrol1};

//Para ser llamado desde window.opener
window.otro_impuesto_webcontrol1 = otro_impuesto_webcontrol1;


if(otro_impuesto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = otro_impuesto_webcontrol1.onLoadWindow; 
}

//</script>