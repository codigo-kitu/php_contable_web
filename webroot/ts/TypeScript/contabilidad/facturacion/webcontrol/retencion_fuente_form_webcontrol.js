//<script type="text/javascript" language="javascript">



//var retencion_fuenteJQueryPaginaWebInteraccion= function (retencion_fuente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {retencion_fuente_constante,retencion_fuente_constante1} from '../util/retencion_fuente_constante.js';

import {retencion_fuente_funcion,retencion_fuente_funcion1} from '../util/retencion_fuente_form_funcion.js';


class retencion_fuente_webcontrol extends GeneralEntityWebControl {
	
	retencion_fuente_control=null;
	retencion_fuente_controlInicial=null;
	retencion_fuente_controlAuxiliar=null;
		
	//if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(retencion_fuente_control) {
		super();
		
		this.retencion_fuente_control=retencion_fuente_control;
	}
		
	actualizarVariablesPagina(retencion_fuente_control) {
		
		if(retencion_fuente_control.action=="index" || retencion_fuente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(retencion_fuente_control);
			
		} 
		
		
		
	
		else if(retencion_fuente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(retencion_fuente_control);	
		
		} else if(retencion_fuente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_fuente_control);		
		}
	
		else if(retencion_fuente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(retencion_fuente_control);		
		}
	
		else if(retencion_fuente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(retencion_fuente_control);
		}
		
		
		else if(retencion_fuente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(retencion_fuente_control);		
		
		} else if(retencion_fuente_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(retencion_fuente_control);		
		
		} 
		//else if(retencion_fuente_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(retencion_fuente_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + retencion_fuente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(retencion_fuente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(retencion_fuente_control) {
		this.actualizarPaginaAccionesGenerales(retencion_fuente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(retencion_fuente_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_fuente_control);
		this.actualizarPaginaOrderBy(retencion_fuente_control);
		this.actualizarPaginaTablaDatos(retencion_fuente_control);
		this.actualizarPaginaCargaGeneralControles(retencion_fuente_control);
		//this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_fuente_control);
		this.actualizarPaginaAreaBusquedas(retencion_fuente_control);
		this.actualizarPaginaCargaCombosFK(retencion_fuente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(retencion_fuente_control) {
		//this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_fuente_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(retencion_fuente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_fuente_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(retencion_fuente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(retencion_fuente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(retencion_fuente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(retencion_fuente_control) {
		this.actualizarPaginaCargaGeneralControles(retencion_fuente_control);
		this.actualizarPaginaCargaCombosFK(retencion_fuente_control);
		this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(retencion_fuente_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(retencion_fuente_control) {
		this.actualizarPaginaCargaGeneralControles(retencion_fuente_control);
		this.actualizarPaginaCargaCombosFK(retencion_fuente_control);
		this.actualizarPaginaFormulario(retencion_fuente_control);
		this.onLoadCombosDefectoFK(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(retencion_fuente_control) {
		//FORMULARIO
		if(retencion_fuente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_fuente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(retencion_fuente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		
		//COMBOS FK
		if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_fuente_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(retencion_fuente_control) {
		//FORMULARIO
		if(retencion_fuente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_fuente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(retencion_fuente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);	
		
		//COMBOS FK
		if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_fuente_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(retencion_fuente_control) {
		//FORMULARIO
		if(retencion_fuente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(retencion_fuente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);	
		//COMBOS FK
		if(retencion_fuente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(retencion_fuente_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(retencion_fuente_control) {
		
		if(retencion_fuente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(retencion_fuente_control);
		}
		
		if(retencion_fuente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(retencion_fuente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(retencion_fuente_control) {
		if(retencion_fuente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("retencion_fuenteReturnGeneral",JSON.stringify(retencion_fuente_control.retencion_fuenteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control) {
		if(retencion_fuente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && retencion_fuente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(retencion_fuente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(retencion_fuente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(retencion_fuente_control, mostrar) {
		
		if(mostrar==true) {
			retencion_fuente_funcion1.resaltarRestaurarDivsPagina(false,"retencion_fuente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				retencion_fuente_funcion1.resaltarRestaurarDivMantenimiento(false,"retencion_fuente");
			}			
			
			retencion_fuente_funcion1.mostrarDivMensaje(true,retencion_fuente_control.strAuxiliarMensaje,retencion_fuente_control.strAuxiliarCssMensaje);
		
		} else {
			retencion_fuente_funcion1.mostrarDivMensaje(false,retencion_fuente_control.strAuxiliarMensaje,retencion_fuente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(retencion_fuente_control) {
		if(retencion_fuente_funcion1.esPaginaForm(retencion_fuente_constante1)==true) {
			window.opener.retencion_fuente_webcontrol1.actualizarPaginaTablaDatos(retencion_fuente_control);
		} else {
			this.actualizarPaginaTablaDatos(retencion_fuente_control);
		}
	}
	
	actualizarPaginaAbrirLink(retencion_fuente_control) {
		retencion_fuente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(retencion_fuente_control.strAuxiliarUrlPagina);
				
		retencion_fuente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(retencion_fuente_control.strAuxiliarTipo,retencion_fuente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(retencion_fuente_control) {
		retencion_fuente_funcion1.resaltarRestaurarDivMensaje(true,retencion_fuente_control.strAuxiliarMensajeAlert,retencion_fuente_control.strAuxiliarCssMensaje);
			
		if(retencion_fuente_funcion1.esPaginaForm(retencion_fuente_constante1)==true) {
			window.opener.retencion_fuente_funcion1.resaltarRestaurarDivMensaje(true,retencion_fuente_control.strAuxiliarMensajeAlert,retencion_fuente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(retencion_fuente_control) {
		this.retencion_fuente_controlInicial=retencion_fuente_control;
			
		if(retencion_fuente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(retencion_fuente_control.strStyleDivArbol,retencion_fuente_control.strStyleDivContent
																,retencion_fuente_control.strStyleDivOpcionesBanner,retencion_fuente_control.strStyleDivExpandirColapsar
																,retencion_fuente_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(retencion_fuente_control) {
		this.actualizarCssBotonesPagina(retencion_fuente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(retencion_fuente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(retencion_fuente_control.tiposReportes,retencion_fuente_control.tiposReporte
															 	,retencion_fuente_control.tiposPaginacion,retencion_fuente_control.tiposAcciones
																,retencion_fuente_control.tiposColumnasSelect,retencion_fuente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(retencion_fuente_control.tiposRelaciones,retencion_fuente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(retencion_fuente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(retencion_fuente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(retencion_fuente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(retencion_fuente_control) {
	
		var indexPosition=retencion_fuente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=retencion_fuente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(retencion_fuente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.cargarCombosempresasFK(retencion_fuente_control);
			}

			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.cargarComboscuenta_ventassFK(retencion_fuente_control);
			}

			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.cargarComboscuenta_comprassFK(retencion_fuente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(retencion_fuente_control.strRecargarFkTiposNinguno!=null && retencion_fuente_control.strRecargarFkTiposNinguno!='NINGUNO' && retencion_fuente_control.strRecargarFkTiposNinguno!='') {
			
				if(retencion_fuente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",retencion_fuente_control.strRecargarFkTiposNinguno,",")) { 
					retencion_fuente_webcontrol1.cargarCombosempresasFK(retencion_fuente_control);
				}

				if(retencion_fuente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_fuente_control.strRecargarFkTiposNinguno,",")) { 
					retencion_fuente_webcontrol1.cargarComboscuenta_ventassFK(retencion_fuente_control);
				}

				if(retencion_fuente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_fuente_control.strRecargarFkTiposNinguno,",")) { 
					retencion_fuente_webcontrol1.cargarComboscuenta_comprassFK(retencion_fuente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(retencion_fuente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_fuente_funcion1,retencion_fuente_control.empresasFK);
	}

	cargarComboEditarTablacuenta_ventasFK(retencion_fuente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_fuente_funcion1,retencion_fuente_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_comprasFK(retencion_fuente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_fuente_funcion1,retencion_fuente_control.cuenta_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(retencion_fuente_control) {
		jQuery("#tdretencion_fuenteNuevo").css("display",retencion_fuente_control.strPermisoNuevo);
		jQuery("#trretencion_fuenteElementos").css("display",retencion_fuente_control.strVisibleTablaElementos);
		jQuery("#trretencion_fuenteAcciones").css("display",retencion_fuente_control.strVisibleTablaAcciones);
		jQuery("#trretencion_fuenteParametrosAcciones").css("display",retencion_fuente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(retencion_fuente_control) {
	
		this.actualizarCssBotonesMantenimiento(retencion_fuente_control);
				
		if(retencion_fuente_control.retencion_fuenteActual!=null) {//form
			
			this.actualizarCamposFormulario(retencion_fuente_control);			
		}
						
		this.actualizarSpanMensajesCampos(retencion_fuente_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(retencion_fuente_control) {
	
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id").val(retencion_fuente_control.retencion_fuenteActual.id);
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-version_row").val(retencion_fuente_control.retencion_fuenteActual.versionRow);
		
		if(retencion_fuente_control.retencion_fuenteActual.id_empresa!=null && retencion_fuente_control.retencion_fuenteActual.id_empresa>-1){
			if(jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_fuente_control.retencion_fuenteActual.id_empresa) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").val(retencion_fuente_control.retencion_fuenteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-codigo").val(retencion_fuente_control.retencion_fuenteActual.codigo);
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-descripcion").val(retencion_fuente_control.retencion_fuenteActual.descripcion);
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-valor").val(retencion_fuente_control.retencion_fuenteActual.valor);
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-valor_base").val(retencion_fuente_control.retencion_fuenteActual.valor_base);
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-predeterminado").prop('checked',retencion_fuente_control.retencion_fuenteActual.predeterminado);
		
		if(retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas!=null && retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas>-1){
			if(jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras!=null && retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras>-1){
			if(jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-cuenta_contable_ventas").val(retencion_fuente_control.retencion_fuenteActual.cuenta_contable_ventas);
		jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-cuenta_contable_compras").val(retencion_fuente_control.retencion_fuenteActual.cuenta_contable_compras);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+retencion_fuente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("retencion_fuente","facturacion","","form_retencion_fuente",formulario,"","",paraEventoTabla,idFilaTabla,retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
	}
	
	actualizarSpanMensajesCampos(retencion_fuente_control) {
		jQuery("#spanstrMensajeid").text(retencion_fuente_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(retencion_fuente_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(retencion_fuente_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(retencion_fuente_control.strMensajecodigo);		
		jQuery("#spanstrMensajedescripcion").text(retencion_fuente_control.strMensajedescripcion);		
		jQuery("#spanstrMensajevalor").text(retencion_fuente_control.strMensajevalor);		
		jQuery("#spanstrMensajevalor_base").text(retencion_fuente_control.strMensajevalor_base);		
		jQuery("#spanstrMensajepredeterminado").text(retencion_fuente_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta_ventas").text(retencion_fuente_control.strMensajeid_cuenta_ventas);		
		jQuery("#spanstrMensajeid_cuenta_compras").text(retencion_fuente_control.strMensajeid_cuenta_compras);		
		jQuery("#spanstrMensajecuenta_contable_ventas").text(retencion_fuente_control.strMensajecuenta_contable_ventas);		
		jQuery("#spanstrMensajecuenta_contable_compras").text(retencion_fuente_control.strMensajecuenta_contable_compras);		
	}
	
	actualizarCssBotonesMantenimiento(retencion_fuente_control) {
		jQuery("#tdbtnNuevoretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoretencion_fuente").css("display",retencion_fuente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarretencion_fuente").css("display",retencion_fuente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarretencion_fuente").css("display",retencion_fuente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosretencion_fuente").css("display",retencion_fuente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarretencion_fuente").css("visibility",retencion_fuente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(retencion_fuente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa",retencion_fuente_control.empresasFK);

		if(retencion_fuente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_fuente_control.idFilaTablaActual+"_2",retencion_fuente_control.empresasFK);
		}
	};

	cargarComboscuenta_ventassFK(retencion_fuente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas",retencion_fuente_control.cuenta_ventassFK);

		if(retencion_fuente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_fuente_control.idFilaTablaActual+"_8",retencion_fuente_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",retencion_fuente_control.cuenta_ventassFK);

	};

	cargarComboscuenta_comprassFK(retencion_fuente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras",retencion_fuente_control.cuenta_comprassFK);

		if(retencion_fuente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_fuente_control.idFilaTablaActual+"_9",retencion_fuente_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",retencion_fuente_control.cuenta_comprassFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(retencion_fuente_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(retencion_fuente_control) {

	};

	registrarComboActionChangeComboscuenta_comprassFK(retencion_fuente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(retencion_fuente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_fuente_control.idempresaDefaultFK>-1 && jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_fuente_control.idempresaDefaultFK) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").val(retencion_fuente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(retencion_fuente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_fuente_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_fuente_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_fuente_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(retencion_fuente_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprassFK(retencion_fuente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_fuente_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_fuente_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_fuente_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(retencion_fuente_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//retencion_fuente_control
		
	
	}
	
	onLoadCombosDefectoFK(retencion_fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.setDefectoValorCombosempresasFK(retencion_fuente_control);
			}

			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.setDefectoValorComboscuenta_ventassFK(retencion_fuente_control);
			}

			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.setDefectoValorComboscuenta_comprassFK(retencion_fuente_control);
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
	onLoadCombosEventosFK(retencion_fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_fuente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_fuente_webcontrol1.registrarComboActionChangeCombosempresasFK(retencion_fuente_control);
			//}

			//if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_fuente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_fuente_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(retencion_fuente_control);
			//}

			//if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_fuente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_fuente_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(retencion_fuente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(retencion_fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(retencion_fuente_constante1.BIT_ES_PAGINA_FORM==true) {
				retencion_fuente_funcion1.validarFormularioJQuery(retencion_fuente_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("retencion_fuente");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("retencion_fuente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(retencion_fuente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,"retencion_fuente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				retencion_fuente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				retencion_fuente_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				retencion_fuente_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("retencion_fuente");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(retencion_fuente_control) {
		
		
		
		if(retencion_fuente_control.strPermisoActualizar!=null) {
			jQuery("#tdretencion_fuenteActualizarToolBar").css("display",retencion_fuente_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdretencion_fuenteEliminarToolBar").css("display",retencion_fuente_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trretencion_fuenteElementos").css("display",retencion_fuente_control.strVisibleTablaElementos);
		
		jQuery("#trretencion_fuenteAcciones").css("display",retencion_fuente_control.strVisibleTablaAcciones);
		jQuery("#trretencion_fuenteParametrosAcciones").css("display",retencion_fuente_control.strVisibleTablaAcciones);
		
		jQuery("#tdretencion_fuenteCerrarPagina").css("display",retencion_fuente_control.strPermisoPopup);		
		jQuery("#tdretencion_fuenteCerrarPaginaToolBar").css("display",retencion_fuente_control.strPermisoPopup);
		//jQuery("#trretencion_fuenteAccionesRelaciones").css("display",retencion_fuente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=retencion_fuente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retencion_fuente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + retencion_fuente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Retencion Fuentees";
		sTituloBanner+=" - " + retencion_fuente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retencion_fuente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdretencion_fuenteRelacionesToolBar").css("display",retencion_fuente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosretencion_fuente").css("display",retencion_fuente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		retencion_fuente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		retencion_fuente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		retencion_fuente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		retencion_fuente_webcontrol1.registrarEventosControles();
		
		if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(retencion_fuente_constante1.STR_ES_RELACIONADO=="false") {
			retencion_fuente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(retencion_fuente_constante1.STR_ES_RELACIONES=="true") {
			if(retencion_fuente_constante1.BIT_ES_PAGINA_FORM==true) {
				retencion_fuente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(retencion_fuente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(retencion_fuente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(retencion_fuente_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(retencion_fuente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
						//retencion_fuente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(retencion_fuente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(retencion_fuente_constante1.BIG_ID_ACTUAL,"retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
						//retencion_fuente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			retencion_fuente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);	
	}
}

var retencion_fuente_webcontrol1 = new retencion_fuente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {retencion_fuente_webcontrol,retencion_fuente_webcontrol1};

//Para ser llamado desde window.opener
window.retencion_fuente_webcontrol1 = retencion_fuente_webcontrol1;


if(retencion_fuente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = retencion_fuente_webcontrol1.onLoadWindow; 
}

//</script>