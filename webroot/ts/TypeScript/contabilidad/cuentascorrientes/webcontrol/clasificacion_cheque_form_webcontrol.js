//<script type="text/javascript" language="javascript">



//var clasificacion_chequeJQueryPaginaWebInteraccion= function (clasificacion_cheque_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {clasificacion_cheque_constante,clasificacion_cheque_constante1} from '../util/clasificacion_cheque_constante.js';

import {clasificacion_cheque_funcion,clasificacion_cheque_funcion1} from '../util/clasificacion_cheque_form_funcion.js';


class clasificacion_cheque_webcontrol extends GeneralEntityWebControl {
	
	clasificacion_cheque_control=null;
	clasificacion_cheque_controlInicial=null;
	clasificacion_cheque_controlAuxiliar=null;
		
	//if(clasificacion_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(clasificacion_cheque_control) {
		super();
		
		this.clasificacion_cheque_control=clasificacion_cheque_control;
	}
		
	actualizarVariablesPagina(clasificacion_cheque_control) {
		
		if(clasificacion_cheque_control.action=="index" || clasificacion_cheque_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(clasificacion_cheque_control);
			
		} 
		
		
		
	
		else if(clasificacion_cheque_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(clasificacion_cheque_control);	
		
		} else if(clasificacion_cheque_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(clasificacion_cheque_control);		
		}
	
	
		
		
		else if(clasificacion_cheque_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(clasificacion_cheque_control);
		
		} else if(clasificacion_cheque_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(clasificacion_cheque_control);		
		
		} else if(clasificacion_cheque_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(clasificacion_cheque_control);		
		
		} 
		//else if(clasificacion_cheque_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(clasificacion_cheque_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + clasificacion_cheque_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(clasificacion_cheque_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(clasificacion_cheque_control) {
		this.actualizarPaginaAccionesGenerales(clasificacion_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(clasificacion_cheque_control) {
		
		this.actualizarPaginaCargaGeneral(clasificacion_cheque_control);
		this.actualizarPaginaOrderBy(clasificacion_cheque_control);
		this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		this.actualizarPaginaCargaGeneralControles(clasificacion_cheque_control);
		//this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(clasificacion_cheque_control);
		this.actualizarPaginaAreaBusquedas(clasificacion_cheque_control);
		this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(clasificacion_cheque_control) {
		//this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(clasificacion_cheque_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(clasificacion_cheque_control) {
		this.actualizarPaginaTablaDatosAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(clasificacion_cheque_control) {
		this.actualizarPaginaCargaGeneralControles(clasificacion_cheque_control);
		this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);
		this.actualizarPaginaFormulario(clasificacion_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(clasificacion_cheque_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(clasificacion_cheque_control) {
		this.actualizarPaginaCargaGeneralControles(clasificacion_cheque_control);
		this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);
		this.actualizarPaginaFormulario(clasificacion_cheque_control);
		this.onLoadCombosDefectoFK(clasificacion_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(clasificacion_cheque_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(clasificacion_cheque_control) {
		//FORMULARIO
		if(clasificacion_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(clasificacion_cheque_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(clasificacion_cheque_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);		
		
		//COMBOS FK
		if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(clasificacion_cheque_control) {
		//FORMULARIO
		if(clasificacion_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(clasificacion_cheque_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(clasificacion_cheque_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);	
		
		//COMBOS FK
		if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(clasificacion_cheque_control) {
		//FORMULARIO
		if(clasificacion_cheque_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(clasificacion_cheque_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control);	
		//COMBOS FK
		if(clasificacion_cheque_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(clasificacion_cheque_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(clasificacion_cheque_control) {
		
		if(clasificacion_cheque_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(clasificacion_cheque_control);
		}
		
		if(clasificacion_cheque_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(clasificacion_cheque_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(clasificacion_cheque_control) {
		if(clasificacion_cheque_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("clasificacion_chequeReturnGeneral",JSON.stringify(clasificacion_cheque_control.clasificacion_chequeReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(clasificacion_cheque_control) {
		if(clasificacion_cheque_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && clasificacion_cheque_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(clasificacion_cheque_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(clasificacion_cheque_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(clasificacion_cheque_control, mostrar) {
		
		if(mostrar==true) {
			clasificacion_cheque_funcion1.resaltarRestaurarDivsPagina(false,"clasificacion_cheque");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				clasificacion_cheque_funcion1.resaltarRestaurarDivMantenimiento(false,"clasificacion_cheque");
			}			
			
			clasificacion_cheque_funcion1.mostrarDivMensaje(true,clasificacion_cheque_control.strAuxiliarMensaje,clasificacion_cheque_control.strAuxiliarCssMensaje);
		
		} else {
			clasificacion_cheque_funcion1.mostrarDivMensaje(false,clasificacion_cheque_control.strAuxiliarMensaje,clasificacion_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(clasificacion_cheque_control) {
		if(clasificacion_cheque_funcion1.esPaginaForm(clasificacion_cheque_constante1)==true) {
			window.opener.clasificacion_cheque_webcontrol1.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		} else {
			this.actualizarPaginaTablaDatos(clasificacion_cheque_control);
		}
	}
	
	actualizarPaginaAbrirLink(clasificacion_cheque_control) {
		clasificacion_cheque_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(clasificacion_cheque_control.strAuxiliarUrlPagina);
				
		clasificacion_cheque_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(clasificacion_cheque_control.strAuxiliarTipo,clasificacion_cheque_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(clasificacion_cheque_control) {
		clasificacion_cheque_funcion1.resaltarRestaurarDivMensaje(true,clasificacion_cheque_control.strAuxiliarMensajeAlert,clasificacion_cheque_control.strAuxiliarCssMensaje);
			
		if(clasificacion_cheque_funcion1.esPaginaForm(clasificacion_cheque_constante1)==true) {
			window.opener.clasificacion_cheque_funcion1.resaltarRestaurarDivMensaje(true,clasificacion_cheque_control.strAuxiliarMensajeAlert,clasificacion_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(clasificacion_cheque_control) {
		this.clasificacion_cheque_controlInicial=clasificacion_cheque_control;
			
		if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(clasificacion_cheque_control.strStyleDivArbol,clasificacion_cheque_control.strStyleDivContent
																,clasificacion_cheque_control.strStyleDivOpcionesBanner,clasificacion_cheque_control.strStyleDivExpandirColapsar
																,clasificacion_cheque_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(clasificacion_cheque_control) {
		this.actualizarCssBotonesPagina(clasificacion_cheque_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(clasificacion_cheque_control.tiposReportes,clasificacion_cheque_control.tiposReporte
															 	,clasificacion_cheque_control.tiposPaginacion,clasificacion_cheque_control.tiposAcciones
																,clasificacion_cheque_control.tiposColumnasSelect,clasificacion_cheque_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(clasificacion_cheque_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(clasificacion_cheque_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(clasificacion_cheque_control);			
	}
	
	actualizarPaginaUsuarioInvitado(clasificacion_cheque_control) {
	
		var indexPosition=clasificacion_cheque_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=clasificacion_cheque_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(clasificacion_cheque_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente_detalle",clasificacion_cheque_control.strRecargarFkTipos,",")) { 
				clasificacion_cheque_webcontrol1.cargarComboscuenta_corriente_detallesFK(clasificacion_cheque_control);
			}

			if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",clasificacion_cheque_control.strRecargarFkTipos,",")) { 
				clasificacion_cheque_webcontrol1.cargarComboscategoria_chequesFK(clasificacion_cheque_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(clasificacion_cheque_control.strRecargarFkTiposNinguno!=null && clasificacion_cheque_control.strRecargarFkTiposNinguno!='NINGUNO' && clasificacion_cheque_control.strRecargarFkTiposNinguno!='') {
			
				if(clasificacion_cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente_detalle",clasificacion_cheque_control.strRecargarFkTiposNinguno,",")) { 
					clasificacion_cheque_webcontrol1.cargarComboscuenta_corriente_detallesFK(clasificacion_cheque_control);
				}

				if(clasificacion_cheque_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_cheque",clasificacion_cheque_control.strRecargarFkTiposNinguno,",")) { 
					clasificacion_cheque_webcontrol1.cargarComboscategoria_chequesFK(clasificacion_cheque_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablacuenta_corriente_detalleFK(clasificacion_cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,clasificacion_cheque_funcion1,clasificacion_cheque_control.cuenta_corriente_detallesFK);
	}

	cargarComboEditarTablacategoria_chequeFK(clasificacion_cheque_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,clasificacion_cheque_funcion1,clasificacion_cheque_control.categoria_chequesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(clasificacion_cheque_control) {
		jQuery("#tdclasificacion_chequeNuevo").css("display",clasificacion_cheque_control.strPermisoNuevo);
		jQuery("#trclasificacion_chequeElementos").css("display",clasificacion_cheque_control.strVisibleTablaElementos);
		jQuery("#trclasificacion_chequeAcciones").css("display",clasificacion_cheque_control.strVisibleTablaAcciones);
		jQuery("#trclasificacion_chequeParametrosAcciones").css("display",clasificacion_cheque_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(clasificacion_cheque_control) {
	
		this.actualizarCssBotonesMantenimiento(clasificacion_cheque_control);
				
		if(clasificacion_cheque_control.clasificacion_chequeActual!=null) {//form
			
			this.actualizarCamposFormulario(clasificacion_cheque_control);			
		}
						
		this.actualizarSpanMensajesCampos(clasificacion_cheque_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(clasificacion_cheque_control) {
	
		jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id").val(clasificacion_cheque_control.clasificacion_chequeActual.id);
		jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-version_row").val(clasificacion_cheque_control.clasificacion_chequeActual.versionRow);
		
		if(clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle!=null && clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle>-1){
			if(jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").val() != clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle) {
				jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").val(clasificacion_cheque_control.clasificacion_chequeActual.id_cuenta_corriente_detalle).trigger("change");
			}
		} else { 
			//jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").select2("val", null);
			if(jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque!=null && clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque>-1){
			if(jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val() != clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque) {
				jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val(clasificacion_cheque_control.clasificacion_chequeActual.id_categoria_cheque).trigger("change");
			}
		} else { 
			//jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").select2("val", null);
			if(jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-monto").val(clasificacion_cheque_control.clasificacion_chequeActual.monto);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+clasificacion_cheque_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("clasificacion_cheque","cuentascorrientes","","form_clasificacion_cheque",formulario,"","",paraEventoTabla,idFilaTabla,clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
	}
	
	actualizarSpanMensajesCampos(clasificacion_cheque_control) {
		jQuery("#spanstrMensajeid").text(clasificacion_cheque_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(clasificacion_cheque_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_cuenta_corriente_detalle").text(clasificacion_cheque_control.strMensajeid_cuenta_corriente_detalle);		
		jQuery("#spanstrMensajeid_categoria_cheque").text(clasificacion_cheque_control.strMensajeid_categoria_cheque);		
		jQuery("#spanstrMensajemonto").text(clasificacion_cheque_control.strMensajemonto);		
	}
	
	actualizarCssBotonesMantenimiento(clasificacion_cheque_control) {
		jQuery("#tdbtnNuevoclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoclasificacion_cheque").css("display",clasificacion_cheque_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarclasificacion_cheque").css("display",clasificacion_cheque_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarclasificacion_cheque").css("display",clasificacion_cheque_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosclasificacion_cheque").css("display",clasificacion_cheque_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarclasificacion_cheque").css("visibility",clasificacion_cheque_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarComboscuenta_corriente_detallesFK(clasificacion_cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle",clasificacion_cheque_control.cuenta_corriente_detallesFK);

		if(clasificacion_cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+clasificacion_cheque_control.idFilaTablaActual+"_2",clasificacion_cheque_control.cuenta_corriente_detallesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle-cmbid_cuenta_corriente_detalle",clasificacion_cheque_control.cuenta_corriente_detallesFK);

	};

	cargarComboscategoria_chequesFK(clasificacion_cheque_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque",clasificacion_cheque_control.categoria_chequesFK);

		if(clasificacion_cheque_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+clasificacion_cheque_control.idFilaTablaActual+"_3",clasificacion_cheque_control.categoria_chequesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque",clasificacion_cheque_control.categoria_chequesFK);

	};

	
	
	registrarComboActionChangeComboscuenta_corriente_detallesFK(clasificacion_cheque_control) {

	};

	registrarComboActionChangeComboscategoria_chequesFK(clasificacion_cheque_control) {

	};

	
	
	setDefectoValorComboscuenta_corriente_detallesFK(clasificacion_cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(clasificacion_cheque_control.idcuenta_corriente_detalleDefaultFK>-1 && jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").val() != clasificacion_cheque_control.idcuenta_corriente_detalleDefaultFK) {
				jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle").val(clasificacion_cheque_control.idcuenta_corriente_detalleDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle-cmbid_cuenta_corriente_detalle").val(clasificacion_cheque_control.idcuenta_corriente_detalleDefaultForeignKey).trigger("change");
			if(jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle-cmbid_cuenta_corriente_detalle").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcuenta_corriente_detalle-cmbid_cuenta_corriente_detalle").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_chequesFK(clasificacion_cheque_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(clasificacion_cheque_control.idcategoria_chequeDefaultFK>-1 && jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val() != clasificacion_cheque_control.idcategoria_chequeDefaultFK) {
				jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque").val(clasificacion_cheque_control.idcategoria_chequeDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val(clasificacion_cheque_control.idcategoria_chequeDefaultForeignKey).trigger("change");
			if(jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+clasificacion_cheque_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//clasificacion_cheque_control
		
	
	}
	
	onLoadCombosDefectoFK(clasificacion_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(clasificacion_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente_detalle",clasificacion_cheque_control.strRecargarFkTipos,",")) { 
				clasificacion_cheque_webcontrol1.setDefectoValorComboscuenta_corriente_detallesFK(clasificacion_cheque_control);
			}

			if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",clasificacion_cheque_control.strRecargarFkTipos,",")) { 
				clasificacion_cheque_webcontrol1.setDefectoValorComboscategoria_chequesFK(clasificacion_cheque_control);
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
	onLoadCombosEventosFK(clasificacion_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(clasificacion_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente_detalle",clasificacion_cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				clasificacion_cheque_webcontrol1.registrarComboActionChangeComboscuenta_corriente_detallesFK(clasificacion_cheque_control);
			//}

			//if(clasificacion_cheque_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",clasificacion_cheque_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				clasificacion_cheque_webcontrol1.registrarComboActionChangeComboscategoria_chequesFK(clasificacion_cheque_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(clasificacion_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(clasificacion_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(clasificacion_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(clasificacion_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				clasificacion_cheque_funcion1.validarFormularioJQuery(clasificacion_cheque_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("clasificacion_cheque");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("clasificacion_cheque");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,"clasificacion_cheque");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente_detalle","id_cuenta_corriente_detalle","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_cuenta_corriente_detalle_img_busqueda").click(function(){
				clasificacion_cheque_webcontrol1.abrirBusquedaParacuenta_corriente_detalle("id_cuenta_corriente_detalle");
				//alert(jQuery('#form-id_cuenta_corriente_detalle_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_cheque","id_categoria_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+clasificacion_cheque_constante1.STR_SUFIJO+"-id_categoria_cheque_img_busqueda").click(function(){
				clasificacion_cheque_webcontrol1.abrirBusquedaParacategoria_cheque("id_categoria_cheque");
				//alert(jQuery('#form-id_categoria_cheque_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(clasificacion_cheque_control) {
		
		
		
		if(clasificacion_cheque_control.strPermisoActualizar!=null) {
			jQuery("#tdclasificacion_chequeActualizarToolBar").css("display",clasificacion_cheque_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdclasificacion_chequeEliminarToolBar").css("display",clasificacion_cheque_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trclasificacion_chequeElementos").css("display",clasificacion_cheque_control.strVisibleTablaElementos);
		
		jQuery("#trclasificacion_chequeAcciones").css("display",clasificacion_cheque_control.strVisibleTablaAcciones);
		jQuery("#trclasificacion_chequeParametrosAcciones").css("display",clasificacion_cheque_control.strVisibleTablaAcciones);
		
		jQuery("#tdclasificacion_chequeCerrarPagina").css("display",clasificacion_cheque_control.strPermisoPopup);		
		jQuery("#tdclasificacion_chequeCerrarPaginaToolBar").css("display",clasificacion_cheque_control.strPermisoPopup);
		//jQuery("#trclasificacion_chequeAccionesRelaciones").css("display",clasificacion_cheque_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=clasificacion_cheque_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + clasificacion_cheque_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + clasificacion_cheque_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Clasificacion Cheques";
		sTituloBanner+=" - " + clasificacion_cheque_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + clasificacion_cheque_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdclasificacion_chequeRelacionesToolBar").css("display",clasificacion_cheque_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosclasificacion_cheque").css("display",clasificacion_cheque_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		clasificacion_cheque_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		clasificacion_cheque_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		clasificacion_cheque_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		clasificacion_cheque_webcontrol1.registrarEventosControles();
		
		if(clasificacion_cheque_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="false") {
			clasificacion_cheque_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(clasificacion_cheque_constante1.STR_ES_RELACIONES=="true") {
			if(clasificacion_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				clasificacion_cheque_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(clasificacion_cheque_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(clasificacion_cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(clasificacion_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(clasificacion_cheque_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
						//clasificacion_cheque_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(clasificacion_cheque_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(clasificacion_cheque_constante1.BIG_ID_ACTUAL,"clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);
						//clasificacion_cheque_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			clasificacion_cheque_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("clasificacion_cheque","cuentascorrientes","",clasificacion_cheque_funcion1,clasificacion_cheque_webcontrol1,clasificacion_cheque_constante1);	
	}
}

var clasificacion_cheque_webcontrol1 = new clasificacion_cheque_webcontrol();

//Para ser llamado desde otro archivo (import)
export {clasificacion_cheque_webcontrol,clasificacion_cheque_webcontrol1};

//Para ser llamado desde window.opener
window.clasificacion_cheque_webcontrol1 = clasificacion_cheque_webcontrol1;


if(clasificacion_cheque_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = clasificacion_cheque_webcontrol1.onLoadWindow; 
}

//</script>