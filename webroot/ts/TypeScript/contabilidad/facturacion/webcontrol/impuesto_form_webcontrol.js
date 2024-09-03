//<script type="text/javascript" language="javascript">



//var impuestoJQueryPaginaWebInteraccion= function (impuesto_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {impuesto_constante,impuesto_constante1} from '../util/impuesto_constante.js';

import {impuesto_funcion,impuesto_funcion1} from '../util/impuesto_form_funcion.js';


class impuesto_webcontrol extends GeneralEntityWebControl {
	
	impuesto_control=null;
	impuesto_controlInicial=null;
	impuesto_controlAuxiliar=null;
		
	//if(impuesto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(impuesto_control) {
		super();
		
		this.impuesto_control=impuesto_control;
	}
		
	actualizarVariablesPagina(impuesto_control) {
		
		if(impuesto_control.action=="index" || impuesto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(impuesto_control);
			
		} 
		
		
		
	
		else if(impuesto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(impuesto_control);	
		
		} else if(impuesto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(impuesto_control);		
		}
	
		else if(impuesto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(impuesto_control);		
		}
	
		else if(impuesto_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(impuesto_control);
		}
		
		
		else if(impuesto_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(impuesto_control);
		
		} else if(impuesto_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(impuesto_control);
		
		} else if(impuesto_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(impuesto_control);
		
		} else if(impuesto_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(impuesto_control);
		
		} else if(impuesto_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(impuesto_control);
		
		} else if(impuesto_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(impuesto_control);		
		
		} else if(impuesto_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(impuesto_control);		
		
		} 
		//else if(impuesto_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(impuesto_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + impuesto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(impuesto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(impuesto_control) {
		this.actualizarPaginaAccionesGenerales(impuesto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(impuesto_control) {
		
		this.actualizarPaginaCargaGeneral(impuesto_control);
		this.actualizarPaginaOrderBy(impuesto_control);
		this.actualizarPaginaTablaDatos(impuesto_control);
		this.actualizarPaginaCargaGeneralControles(impuesto_control);
		//this.actualizarPaginaFormulario(impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(impuesto_control);
		this.actualizarPaginaAreaBusquedas(impuesto_control);
		this.actualizarPaginaCargaCombosFK(impuesto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(impuesto_control) {
		//this.actualizarPaginaFormulario(impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(impuesto_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(impuesto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(impuesto_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(impuesto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(impuesto_control);		
		this.actualizarPaginaFormulario(impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(impuesto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(impuesto_control);		
		this.actualizarPaginaFormulario(impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(impuesto_control) {
		this.actualizarPaginaTablaDatosAuxiliar(impuesto_control);		
		this.actualizarPaginaFormulario(impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(impuesto_control) {
		this.actualizarPaginaCargaGeneralControles(impuesto_control);
		this.actualizarPaginaCargaCombosFK(impuesto_control);
		this.actualizarPaginaFormulario(impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(impuesto_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(impuesto_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(impuesto_control) {
		this.actualizarPaginaCargaGeneralControles(impuesto_control);
		this.actualizarPaginaCargaCombosFK(impuesto_control);
		this.actualizarPaginaFormulario(impuesto_control);
		this.onLoadCombosDefectoFK(impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(impuesto_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(impuesto_control) {
		//FORMULARIO
		if(impuesto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(impuesto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(impuesto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		
		//COMBOS FK
		if(impuesto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(impuesto_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(impuesto_control) {
		//FORMULARIO
		if(impuesto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(impuesto_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(impuesto_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);	
		
		//COMBOS FK
		if(impuesto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(impuesto_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(impuesto_control) {
		//FORMULARIO
		if(impuesto_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(impuesto_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);	
		//COMBOS FK
		if(impuesto_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(impuesto_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(impuesto_control) {
		
		if(impuesto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(impuesto_control);
		}
		
		if(impuesto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(impuesto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(impuesto_control) {
		if(impuesto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("impuestoReturnGeneral",JSON.stringify(impuesto_control.impuestoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(impuesto_control) {
		if(impuesto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && impuesto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(impuesto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(impuesto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(impuesto_control, mostrar) {
		
		if(mostrar==true) {
			impuesto_funcion1.resaltarRestaurarDivsPagina(false,"impuesto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				impuesto_funcion1.resaltarRestaurarDivMantenimiento(false,"impuesto");
			}			
			
			impuesto_funcion1.mostrarDivMensaje(true,impuesto_control.strAuxiliarMensaje,impuesto_control.strAuxiliarCssMensaje);
		
		} else {
			impuesto_funcion1.mostrarDivMensaje(false,impuesto_control.strAuxiliarMensaje,impuesto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(impuesto_control) {
		if(impuesto_funcion1.esPaginaForm(impuesto_constante1)==true) {
			window.opener.impuesto_webcontrol1.actualizarPaginaTablaDatos(impuesto_control);
		} else {
			this.actualizarPaginaTablaDatos(impuesto_control);
		}
	}
	
	actualizarPaginaAbrirLink(impuesto_control) {
		impuesto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(impuesto_control.strAuxiliarUrlPagina);
				
		impuesto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(impuesto_control.strAuxiliarTipo,impuesto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(impuesto_control) {
		impuesto_funcion1.resaltarRestaurarDivMensaje(true,impuesto_control.strAuxiliarMensajeAlert,impuesto_control.strAuxiliarCssMensaje);
			
		if(impuesto_funcion1.esPaginaForm(impuesto_constante1)==true) {
			window.opener.impuesto_funcion1.resaltarRestaurarDivMensaje(true,impuesto_control.strAuxiliarMensajeAlert,impuesto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(impuesto_control) {
		this.impuesto_controlInicial=impuesto_control;
			
		if(impuesto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(impuesto_control.strStyleDivArbol,impuesto_control.strStyleDivContent
																,impuesto_control.strStyleDivOpcionesBanner,impuesto_control.strStyleDivExpandirColapsar
																,impuesto_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(impuesto_control) {
		this.actualizarCssBotonesPagina(impuesto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(impuesto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(impuesto_control.tiposReportes,impuesto_control.tiposReporte
															 	,impuesto_control.tiposPaginacion,impuesto_control.tiposAcciones
																,impuesto_control.tiposColumnasSelect,impuesto_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(impuesto_control.tiposRelaciones,impuesto_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(impuesto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(impuesto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(impuesto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(impuesto_control) {
	
		var indexPosition=impuesto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=impuesto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(impuesto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",impuesto_control.strRecargarFkTipos,",")) { 
				impuesto_webcontrol1.cargarCombosempresasFK(impuesto_control);
			}

			if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",impuesto_control.strRecargarFkTipos,",")) { 
				impuesto_webcontrol1.cargarComboscuenta_ventassFK(impuesto_control);
			}

			if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",impuesto_control.strRecargarFkTipos,",")) { 
				impuesto_webcontrol1.cargarComboscuenta_comprassFK(impuesto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(impuesto_control.strRecargarFkTiposNinguno!=null && impuesto_control.strRecargarFkTiposNinguno!='NINGUNO' && impuesto_control.strRecargarFkTiposNinguno!='') {
			
				if(impuesto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",impuesto_control.strRecargarFkTiposNinguno,",")) { 
					impuesto_webcontrol1.cargarCombosempresasFK(impuesto_control);
				}

				if(impuesto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",impuesto_control.strRecargarFkTiposNinguno,",")) { 
					impuesto_webcontrol1.cargarComboscuenta_ventassFK(impuesto_control);
				}

				if(impuesto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",impuesto_control.strRecargarFkTiposNinguno,",")) { 
					impuesto_webcontrol1.cargarComboscuenta_comprassFK(impuesto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(impuesto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,impuesto_funcion1,impuesto_control.empresasFK);
	}

	cargarComboEditarTablacuenta_ventasFK(impuesto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,impuesto_funcion1,impuesto_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_comprasFK(impuesto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,impuesto_funcion1,impuesto_control.cuenta_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(impuesto_control) {
		jQuery("#tdimpuestoNuevo").css("display",impuesto_control.strPermisoNuevo);
		jQuery("#trimpuestoElementos").css("display",impuesto_control.strVisibleTablaElementos);
		jQuery("#trimpuestoAcciones").css("display",impuesto_control.strVisibleTablaAcciones);
		jQuery("#trimpuestoParametrosAcciones").css("display",impuesto_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(impuesto_control) {
	
		this.actualizarCssBotonesMantenimiento(impuesto_control);
				
		if(impuesto_control.impuestoActual!=null) {//form
			
			this.actualizarCamposFormulario(impuesto_control);			
		}
						
		this.actualizarSpanMensajesCampos(impuesto_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(impuesto_control) {
	
		jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id").val(impuesto_control.impuestoActual.id);
		jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-version_row").val(impuesto_control.impuestoActual.versionRow);
		
		if(impuesto_control.impuestoActual.id_empresa!=null && impuesto_control.impuestoActual.id_empresa>-1){
			if(jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_empresa").val() != impuesto_control.impuestoActual.id_empresa) {
				jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_empresa").val(impuesto_control.impuestoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-codigo").val(impuesto_control.impuestoActual.codigo);
		jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-descripcion").val(impuesto_control.impuestoActual.descripcion);
		jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-valor").val(impuesto_control.impuestoActual.valor);
		jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-predeterminado").prop('checked',impuesto_control.impuestoActual.predeterminado);
		
		if(impuesto_control.impuestoActual.id_cuenta_ventas!=null && impuesto_control.impuestoActual.id_cuenta_ventas>-1){
			if(jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != impuesto_control.impuestoActual.id_cuenta_ventas) {
				jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(impuesto_control.impuestoActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(impuesto_control.impuestoActual.id_cuenta_compras!=null && impuesto_control.impuestoActual.id_cuenta_compras>-1){
			if(jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != impuesto_control.impuestoActual.id_cuenta_compras) {
				jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val(impuesto_control.impuestoActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-cuenta_contable_ventas").val(impuesto_control.impuestoActual.cuenta_contable_ventas);
		jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-cuenta_contable_compras").val(impuesto_control.impuestoActual.cuenta_contable_compras);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+impuesto_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("impuesto","facturacion","","form_impuesto",formulario,"","",paraEventoTabla,idFilaTabla,impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
	}
	
	actualizarSpanMensajesCampos(impuesto_control) {
		jQuery("#spanstrMensajeid").text(impuesto_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(impuesto_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_empresa").text(impuesto_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(impuesto_control.strMensajecodigo);		
		jQuery("#spanstrMensajedescripcion").text(impuesto_control.strMensajedescripcion);		
		jQuery("#spanstrMensajevalor").text(impuesto_control.strMensajevalor);		
		jQuery("#spanstrMensajepredeterminado").text(impuesto_control.strMensajepredeterminado);		
		jQuery("#spanstrMensajeid_cuenta_ventas").text(impuesto_control.strMensajeid_cuenta_ventas);		
		jQuery("#spanstrMensajeid_cuenta_compras").text(impuesto_control.strMensajeid_cuenta_compras);		
		jQuery("#spanstrMensajecuenta_contable_ventas").text(impuesto_control.strMensajecuenta_contable_ventas);		
		jQuery("#spanstrMensajecuenta_contable_compras").text(impuesto_control.strMensajecuenta_contable_compras);		
	}
	
	actualizarCssBotonesMantenimiento(impuesto_control) {
		jQuery("#tdbtnNuevoimpuesto").css("visibility",impuesto_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimpuesto").css("display",impuesto_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimpuesto").css("visibility",impuesto_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimpuesto").css("display",impuesto_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimpuesto").css("visibility",impuesto_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimpuesto").css("display",impuesto_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimpuesto").css("visibility",impuesto_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimpuesto").css("visibility",impuesto_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimpuesto").css("display",impuesto_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimpuesto").css("visibility",impuesto_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimpuesto").css("visibility",impuesto_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimpuesto").css("visibility",impuesto_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(impuesto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+impuesto_constante1.STR_SUFIJO+"-id_empresa",impuesto_control.empresasFK);

		if(impuesto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+impuesto_control.idFilaTablaActual+"_2",impuesto_control.empresasFK);
		}
	};

	cargarComboscuenta_ventassFK(impuesto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas",impuesto_control.cuenta_ventassFK);

		if(impuesto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+impuesto_control.idFilaTablaActual+"_7",impuesto_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",impuesto_control.cuenta_ventassFK);

	};

	cargarComboscuenta_comprassFK(impuesto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras",impuesto_control.cuenta_comprassFK);

		if(impuesto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+impuesto_control.idFilaTablaActual+"_8",impuesto_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",impuesto_control.cuenta_comprassFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(impuesto_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(impuesto_control) {

	};

	registrarComboActionChangeComboscuenta_comprassFK(impuesto_control) {

	};

	
	
	setDefectoValorCombosempresasFK(impuesto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(impuesto_control.idempresaDefaultFK>-1 && jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_empresa").val() != impuesto_control.idempresaDefaultFK) {
				jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_empresa").val(impuesto_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(impuesto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(impuesto_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != impuesto_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(impuesto_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(impuesto_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprassFK(impuesto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(impuesto_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != impuesto_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val(impuesto_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(impuesto_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//impuesto_control
		
	
	}
	
	onLoadCombosDefectoFK(impuesto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(impuesto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",impuesto_control.strRecargarFkTipos,",")) { 
				impuesto_webcontrol1.setDefectoValorCombosempresasFK(impuesto_control);
			}

			if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",impuesto_control.strRecargarFkTipos,",")) { 
				impuesto_webcontrol1.setDefectoValorComboscuenta_ventassFK(impuesto_control);
			}

			if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",impuesto_control.strRecargarFkTipos,",")) { 
				impuesto_webcontrol1.setDefectoValorComboscuenta_comprassFK(impuesto_control);
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
	onLoadCombosEventosFK(impuesto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(impuesto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",impuesto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				impuesto_webcontrol1.registrarComboActionChangeCombosempresasFK(impuesto_control);
			//}

			//if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",impuesto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				impuesto_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(impuesto_control);
			//}

			//if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",impuesto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				impuesto_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(impuesto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(impuesto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(impuesto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(impuesto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(impuesto_constante1.BIT_ES_PAGINA_FORM==true) {
				impuesto_funcion1.validarFormularioJQuery(impuesto_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("impuesto");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("impuesto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(impuesto_funcion1,impuesto_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(impuesto_funcion1,impuesto_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(impuesto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,"impuesto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				impuesto_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				impuesto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				impuesto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("impuesto");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(impuesto_control) {
		
		
		
		if(impuesto_control.strPermisoActualizar!=null) {
			jQuery("#tdimpuestoActualizarToolBar").css("display",impuesto_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdimpuestoEliminarToolBar").css("display",impuesto_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trimpuestoElementos").css("display",impuesto_control.strVisibleTablaElementos);
		
		jQuery("#trimpuestoAcciones").css("display",impuesto_control.strVisibleTablaAcciones);
		jQuery("#trimpuestoParametrosAcciones").css("display",impuesto_control.strVisibleTablaAcciones);
		
		jQuery("#tdimpuestoCerrarPagina").css("display",impuesto_control.strPermisoPopup);		
		jQuery("#tdimpuestoCerrarPaginaToolBar").css("display",impuesto_control.strPermisoPopup);
		//jQuery("#trimpuestoAccionesRelaciones").css("display",impuesto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=impuesto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + impuesto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + impuesto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Impuestos";
		sTituloBanner+=" - " + impuesto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + impuesto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimpuestoRelacionesToolBar").css("display",impuesto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimpuesto").css("display",impuesto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		impuesto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		impuesto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		impuesto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		impuesto_webcontrol1.registrarEventosControles();
		
		if(impuesto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(impuesto_constante1.STR_ES_RELACIONADO=="false") {
			impuesto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(impuesto_constante1.STR_ES_RELACIONES=="true") {
			if(impuesto_constante1.BIT_ES_PAGINA_FORM==true) {
				impuesto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(impuesto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(impuesto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(impuesto_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(impuesto_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
						//impuesto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(impuesto_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(impuesto_constante1.BIG_ID_ACTUAL,"impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
						//impuesto_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			impuesto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);	
	}
}

var impuesto_webcontrol1 = new impuesto_webcontrol();

//Para ser llamado desde otro archivo (import)
export {impuesto_webcontrol,impuesto_webcontrol1};

//Para ser llamado desde window.opener
window.impuesto_webcontrol1 = impuesto_webcontrol1;


if(impuesto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = impuesto_webcontrol1.onLoadWindow; 
}

//</script>