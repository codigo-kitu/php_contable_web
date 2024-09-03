//<script type="text/javascript" language="javascript">



//var forma_pago_clienteJQueryPaginaWebInteraccion= function (forma_pago_cliente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {forma_pago_cliente_constante,forma_pago_cliente_constante1} from '../util/forma_pago_cliente_constante.js';

import {forma_pago_cliente_funcion,forma_pago_cliente_funcion1} from '../util/forma_pago_cliente_form_funcion.js';


class forma_pago_cliente_webcontrol extends GeneralEntityWebControl {
	
	forma_pago_cliente_control=null;
	forma_pago_cliente_controlInicial=null;
	forma_pago_cliente_controlAuxiliar=null;
		
	//if(forma_pago_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(forma_pago_cliente_control) {
		super();
		
		this.forma_pago_cliente_control=forma_pago_cliente_control;
	}
		
	actualizarVariablesPagina(forma_pago_cliente_control) {
		
		if(forma_pago_cliente_control.action=="index" || forma_pago_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(forma_pago_cliente_control);
			
		} 
		
		
		
	
		else if(forma_pago_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(forma_pago_cliente_control);	
		
		} else if(forma_pago_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(forma_pago_cliente_control);		
		}
	
		else if(forma_pago_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(forma_pago_cliente_control);		
		}
	
		else if(forma_pago_cliente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(forma_pago_cliente_control);
		}
		
		
		else if(forma_pago_cliente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(forma_pago_cliente_control);
		
		} else if(forma_pago_cliente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(forma_pago_cliente_control);		
		
		} else if(forma_pago_cliente_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(forma_pago_cliente_control);		
		
		} 
		//else if(forma_pago_cliente_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(forma_pago_cliente_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + forma_pago_cliente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(forma_pago_cliente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(forma_pago_cliente_control) {
		this.actualizarPaginaAccionesGenerales(forma_pago_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(forma_pago_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(forma_pago_cliente_control);
		this.actualizarPaginaOrderBy(forma_pago_cliente_control);
		this.actualizarPaginaTablaDatos(forma_pago_cliente_control);
		this.actualizarPaginaCargaGeneralControles(forma_pago_cliente_control);
		//this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(forma_pago_cliente_control);
		this.actualizarPaginaAreaBusquedas(forma_pago_cliente_control);
		this.actualizarPaginaCargaCombosFK(forma_pago_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(forma_pago_cliente_control) {
		//this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(forma_pago_cliente_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(forma_pago_cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(forma_pago_cliente_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(forma_pago_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(forma_pago_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(forma_pago_cliente_control);
		this.actualizarPaginaCargaCombosFK(forma_pago_cliente_control);
		this.actualizarPaginaFormulario(forma_pago_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(forma_pago_cliente_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(forma_pago_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(forma_pago_cliente_control);
		this.actualizarPaginaCargaCombosFK(forma_pago_cliente_control);
		this.actualizarPaginaFormulario(forma_pago_cliente_control);
		this.onLoadCombosDefectoFK(forma_pago_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_cliente_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(forma_pago_cliente_control) {
		//FORMULARIO
		if(forma_pago_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(forma_pago_cliente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(forma_pago_cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);		
		
		//COMBOS FK
		if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(forma_pago_cliente_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(forma_pago_cliente_control) {
		//FORMULARIO
		if(forma_pago_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(forma_pago_cliente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(forma_pago_cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);	
		
		//COMBOS FK
		if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(forma_pago_cliente_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(forma_pago_cliente_control) {
		//FORMULARIO
		if(forma_pago_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(forma_pago_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control);	
		//COMBOS FK
		if(forma_pago_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(forma_pago_cliente_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(forma_pago_cliente_control) {
		
		if(forma_pago_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(forma_pago_cliente_control);
		}
		
		if(forma_pago_cliente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(forma_pago_cliente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(forma_pago_cliente_control) {
		if(forma_pago_cliente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("forma_pago_clienteReturnGeneral",JSON.stringify(forma_pago_cliente_control.forma_pago_clienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(forma_pago_cliente_control) {
		if(forma_pago_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && forma_pago_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(forma_pago_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(forma_pago_cliente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(forma_pago_cliente_control, mostrar) {
		
		if(mostrar==true) {
			forma_pago_cliente_funcion1.resaltarRestaurarDivsPagina(false,"forma_pago_cliente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				forma_pago_cliente_funcion1.resaltarRestaurarDivMantenimiento(false,"forma_pago_cliente");
			}			
			
			forma_pago_cliente_funcion1.mostrarDivMensaje(true,forma_pago_cliente_control.strAuxiliarMensaje,forma_pago_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			forma_pago_cliente_funcion1.mostrarDivMensaje(false,forma_pago_cliente_control.strAuxiliarMensaje,forma_pago_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(forma_pago_cliente_control) {
		if(forma_pago_cliente_funcion1.esPaginaForm(forma_pago_cliente_constante1)==true) {
			window.opener.forma_pago_cliente_webcontrol1.actualizarPaginaTablaDatos(forma_pago_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(forma_pago_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(forma_pago_cliente_control) {
		forma_pago_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(forma_pago_cliente_control.strAuxiliarUrlPagina);
				
		forma_pago_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(forma_pago_cliente_control.strAuxiliarTipo,forma_pago_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(forma_pago_cliente_control) {
		forma_pago_cliente_funcion1.resaltarRestaurarDivMensaje(true,forma_pago_cliente_control.strAuxiliarMensajeAlert,forma_pago_cliente_control.strAuxiliarCssMensaje);
			
		if(forma_pago_cliente_funcion1.esPaginaForm(forma_pago_cliente_constante1)==true) {
			window.opener.forma_pago_cliente_funcion1.resaltarRestaurarDivMensaje(true,forma_pago_cliente_control.strAuxiliarMensajeAlert,forma_pago_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(forma_pago_cliente_control) {
		this.forma_pago_cliente_controlInicial=forma_pago_cliente_control;
			
		if(forma_pago_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(forma_pago_cliente_control.strStyleDivArbol,forma_pago_cliente_control.strStyleDivContent
																,forma_pago_cliente_control.strStyleDivOpcionesBanner,forma_pago_cliente_control.strStyleDivExpandirColapsar
																,forma_pago_cliente_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(forma_pago_cliente_control) {
		this.actualizarCssBotonesPagina(forma_pago_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(forma_pago_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(forma_pago_cliente_control.tiposReportes,forma_pago_cliente_control.tiposReporte
															 	,forma_pago_cliente_control.tiposPaginacion,forma_pago_cliente_control.tiposAcciones
																,forma_pago_cliente_control.tiposColumnasSelect,forma_pago_cliente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(forma_pago_cliente_control.tiposRelaciones,forma_pago_cliente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(forma_pago_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(forma_pago_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(forma_pago_cliente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(forma_pago_cliente_control) {
	
		var indexPosition=forma_pago_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=forma_pago_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(forma_pago_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_cliente_control.strRecargarFkTipos,",")) { 
				forma_pago_cliente_webcontrol1.cargarCombosempresasFK(forma_pago_cliente_control);
			}

			if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_cliente_control.strRecargarFkTipos,",")) { 
				forma_pago_cliente_webcontrol1.cargarCombostipo_forma_pagosFK(forma_pago_cliente_control);
			}

			if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_cliente_control.strRecargarFkTipos,",")) { 
				forma_pago_cliente_webcontrol1.cargarComboscuentasFK(forma_pago_cliente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(forma_pago_cliente_control.strRecargarFkTiposNinguno!=null && forma_pago_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && forma_pago_cliente_control.strRecargarFkTiposNinguno!='') {
			
				if(forma_pago_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_cliente_control.strRecargarFkTiposNinguno,",")) { 
					forma_pago_cliente_webcontrol1.cargarCombosempresasFK(forma_pago_cliente_control);
				}

				if(forma_pago_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_cliente_control.strRecargarFkTiposNinguno,",")) { 
					forma_pago_cliente_webcontrol1.cargarCombostipo_forma_pagosFK(forma_pago_cliente_control);
				}

				if(forma_pago_cliente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_cliente_control.strRecargarFkTiposNinguno,",")) { 
					forma_pago_cliente_webcontrol1.cargarComboscuentasFK(forma_pago_cliente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(forma_pago_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,forma_pago_cliente_funcion1,forma_pago_cliente_control.empresasFK);
	}

	cargarComboEditarTablatipo_forma_pagoFK(forma_pago_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,forma_pago_cliente_funcion1,forma_pago_cliente_control.tipo_forma_pagosFK);
	}

	cargarComboEditarTablacuentaFK(forma_pago_cliente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,forma_pago_cliente_funcion1,forma_pago_cliente_control.cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(forma_pago_cliente_control) {
		jQuery("#tdforma_pago_clienteNuevo").css("display",forma_pago_cliente_control.strPermisoNuevo);
		jQuery("#trforma_pago_clienteElementos").css("display",forma_pago_cliente_control.strVisibleTablaElementos);
		jQuery("#trforma_pago_clienteAcciones").css("display",forma_pago_cliente_control.strVisibleTablaAcciones);
		jQuery("#trforma_pago_clienteParametrosAcciones").css("display",forma_pago_cliente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(forma_pago_cliente_control) {
	
		this.actualizarCssBotonesMantenimiento(forma_pago_cliente_control);
				
		if(forma_pago_cliente_control.forma_pago_clienteActual!=null) {//form
			
			this.actualizarCamposFormulario(forma_pago_cliente_control);			
		}
						
		this.actualizarSpanMensajesCampos(forma_pago_cliente_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(forma_pago_cliente_control) {
	
		jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id").val(forma_pago_cliente_control.forma_pago_clienteActual.id);
		jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-version_row").val(forma_pago_cliente_control.forma_pago_clienteActual.versionRow);
		
		if(forma_pago_cliente_control.forma_pago_clienteActual.id_empresa!=null && forma_pago_cliente_control.forma_pago_clienteActual.id_empresa>-1){
			if(jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val() != forma_pago_cliente_control.forma_pago_clienteActual.id_empresa) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val(forma_pago_cliente_control.forma_pago_clienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(forma_pago_cliente_control.forma_pago_clienteActual.id_tipo_forma_pago!=null && forma_pago_cliente_control.forma_pago_clienteActual.id_tipo_forma_pago>-1){
			if(jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val() != forma_pago_cliente_control.forma_pago_clienteActual.id_tipo_forma_pago) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val(forma_pago_cliente_control.forma_pago_clienteActual.id_tipo_forma_pago).trigger("change");
			}
		} else { 
			//jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago").select2("val", null);
			if(jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-codigo").val(forma_pago_cliente_control.forma_pago_clienteActual.codigo);
		jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-nombre").val(forma_pago_cliente_control.forma_pago_clienteActual.nombre);
		jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-predeterminado").prop('checked',forma_pago_cliente_control.forma_pago_clienteActual.predeterminado);
		
		if(forma_pago_cliente_control.forma_pago_clienteActual.id_cuenta!=null && forma_pago_cliente_control.forma_pago_clienteActual.id_cuenta>-1){
			if(jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val() != forma_pago_cliente_control.forma_pago_clienteActual.id_cuenta) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val(forma_pago_cliente_control.forma_pago_clienteActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-cuenta_contable").val(forma_pago_cliente_control.forma_pago_clienteActual.cuenta_contable);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+forma_pago_cliente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("forma_pago_cliente","cuentascobrar","","form_forma_pago_cliente",formulario,"","",paraEventoTabla,idFilaTabla,forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
	}
	
	actualizarSpanMensajesCampos(forma_pago_cliente_control) {
		jQuery("#spanstrMensajeid").text(forma_pago_cliente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(forma_pago_cliente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(forma_pago_cliente_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajeid_tipo_forma_pago").text(forma_pago_cliente_control.strMensajeid_tipo_forma_pago);		
		jQuery("#spanstrMensajecodigo").text(forma_pago_cliente_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(forma_pago_cliente_control.strMensajenombre);		
		jQuery("#spanstrMensajepredeterminado").text(forma_pago_cliente_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta").text(forma_pago_cliente_control.strMensajeid_cuenta);		
		jQuery("#spanstrMensajecuenta_contable").text(forma_pago_cliente_control.strMensajecuenta_contable);		
	}
	
	actualizarCssBotonesMantenimiento(forma_pago_cliente_control) {
		jQuery("#tdbtnNuevoforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoforma_pago_cliente").css("display",forma_pago_cliente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarforma_pago_cliente").css("display",forma_pago_cliente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarforma_pago_cliente").css("display",forma_pago_cliente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosforma_pago_cliente").css("display",forma_pago_cliente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarforma_pago_cliente").css("visibility",forma_pago_cliente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(forma_pago_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa",forma_pago_cliente_control.empresasFK);

		if(forma_pago_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+forma_pago_cliente_control.idFilaTablaActual+"_2",forma_pago_cliente_control.empresasFK);
		}
	};

	cargarCombostipo_forma_pagosFK(forma_pago_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago",forma_pago_cliente_control.tipo_forma_pagosFK);

		if(forma_pago_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+forma_pago_cliente_control.idFilaTablaActual+"_3",forma_pago_cliente_control.tipo_forma_pagosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago",forma_pago_cliente_control.tipo_forma_pagosFK);

	};

	cargarComboscuentasFK(forma_pago_cliente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta",forma_pago_cliente_control.cuentasFK);

		if(forma_pago_cliente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+forma_pago_cliente_control.idFilaTablaActual+"_7",forma_pago_cliente_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",forma_pago_cliente_control.cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(forma_pago_cliente_control) {

	};

	registrarComboActionChangeCombostipo_forma_pagosFK(forma_pago_cliente_control) {

	};

	registrarComboActionChangeComboscuentasFK(forma_pago_cliente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(forma_pago_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(forma_pago_cliente_control.idempresaDefaultFK>-1 && jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val() != forma_pago_cliente_control.idempresaDefaultFK) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa").val(forma_pago_cliente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_forma_pagosFK(forma_pago_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(forma_pago_cliente_control.idtipo_forma_pagoDefaultFK>-1 && jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val() != forma_pago_cliente_control.idtipo_forma_pagoDefaultFK) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val(forma_pago_cliente_control.idtipo_forma_pagoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago").val(forma_pago_cliente_control.idtipo_forma_pagoDefaultForeignKey).trigger("change");
			if(jQuery("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(forma_pago_cliente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(forma_pago_cliente_control.idcuentaDefaultFK>-1 && jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val() != forma_pago_cliente_control.idcuentaDefaultFK) {
				jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta").val(forma_pago_cliente_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(forma_pago_cliente_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+forma_pago_cliente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//forma_pago_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(forma_pago_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(forma_pago_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_cliente_control.strRecargarFkTipos,",")) { 
				forma_pago_cliente_webcontrol1.setDefectoValorCombosempresasFK(forma_pago_cliente_control);
			}

			if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_cliente_control.strRecargarFkTipos,",")) { 
				forma_pago_cliente_webcontrol1.setDefectoValorCombostipo_forma_pagosFK(forma_pago_cliente_control);
			}

			if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_cliente_control.strRecargarFkTipos,",")) { 
				forma_pago_cliente_webcontrol1.setDefectoValorComboscuentasFK(forma_pago_cliente_control);
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
	onLoadCombosEventosFK(forma_pago_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(forma_pago_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				forma_pago_cliente_webcontrol1.registrarComboActionChangeCombosempresasFK(forma_pago_cliente_control);
			//}

			//if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				forma_pago_cliente_webcontrol1.registrarComboActionChangeCombostipo_forma_pagosFK(forma_pago_cliente_control);
			//}

			//if(forma_pago_cliente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_cliente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				forma_pago_cliente_webcontrol1.registrarComboActionChangeComboscuentasFK(forma_pago_cliente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(forma_pago_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(forma_pago_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(forma_pago_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(forma_pago_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				forma_pago_cliente_funcion1.validarFormularioJQuery(forma_pago_cliente_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("forma_pago_cliente");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("forma_pago_cliente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(forma_pago_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,"forma_pago_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				forma_pago_cliente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_forma_pago","id_tipo_forma_pago","general","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_tipo_forma_pago_img_busqueda").click(function(){
				forma_pago_cliente_webcontrol1.abrirBusquedaParatipo_forma_pago("id_tipo_forma_pago");
				//alert(jQuery('#form-id_tipo_forma_pago_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+forma_pago_cliente_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				forma_pago_cliente_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("forma_pago_cliente");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(forma_pago_cliente_control) {
		
		
		
		if(forma_pago_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdforma_pago_clienteActualizarToolBar").css("display",forma_pago_cliente_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdforma_pago_clienteEliminarToolBar").css("display",forma_pago_cliente_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trforma_pago_clienteElementos").css("display",forma_pago_cliente_control.strVisibleTablaElementos);
		
		jQuery("#trforma_pago_clienteAcciones").css("display",forma_pago_cliente_control.strVisibleTablaAcciones);
		jQuery("#trforma_pago_clienteParametrosAcciones").css("display",forma_pago_cliente_control.strVisibleTablaAcciones);
		
		jQuery("#tdforma_pago_clienteCerrarPagina").css("display",forma_pago_cliente_control.strPermisoPopup);		
		jQuery("#tdforma_pago_clienteCerrarPaginaToolBar").css("display",forma_pago_cliente_control.strPermisoPopup);
		//jQuery("#trforma_pago_clienteAccionesRelaciones").css("display",forma_pago_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=forma_pago_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + forma_pago_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + forma_pago_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Forma Pago Clientes";
		sTituloBanner+=" - " + forma_pago_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + forma_pago_cliente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdforma_pago_clienteRelacionesToolBar").css("display",forma_pago_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosforma_pago_cliente").css("display",forma_pago_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		forma_pago_cliente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		forma_pago_cliente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		forma_pago_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		forma_pago_cliente_webcontrol1.registrarEventosControles();
		
		if(forma_pago_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(forma_pago_cliente_constante1.STR_ES_RELACIONADO=="false") {
			forma_pago_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(forma_pago_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(forma_pago_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				forma_pago_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(forma_pago_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(forma_pago_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(forma_pago_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(forma_pago_cliente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
						//forma_pago_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(forma_pago_cliente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(forma_pago_cliente_constante1.BIG_ID_ACTUAL,"forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);
						//forma_pago_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			forma_pago_cliente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("forma_pago_cliente","cuentascobrar","",forma_pago_cliente_funcion1,forma_pago_cliente_webcontrol1,forma_pago_cliente_constante1);	
	}
}

var forma_pago_cliente_webcontrol1 = new forma_pago_cliente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {forma_pago_cliente_webcontrol,forma_pago_cliente_webcontrol1};

//Para ser llamado desde window.opener
window.forma_pago_cliente_webcontrol1 = forma_pago_cliente_webcontrol1;


if(forma_pago_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = forma_pago_cliente_webcontrol1.onLoadWindow; 
}

//</script>