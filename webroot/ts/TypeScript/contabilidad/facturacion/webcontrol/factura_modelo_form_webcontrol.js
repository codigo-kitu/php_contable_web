//<script type="text/javascript" language="javascript">



//var factura_modeloJQueryPaginaWebInteraccion= function (factura_modelo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {factura_modelo_constante,factura_modelo_constante1} from '../util/factura_modelo_constante.js';

import {factura_modelo_funcion,factura_modelo_funcion1} from '../util/factura_modelo_form_funcion.js';


class factura_modelo_webcontrol extends GeneralEntityWebControl {
	
	factura_modelo_control=null;
	factura_modelo_controlInicial=null;
	factura_modelo_controlAuxiliar=null;
		
	//if(factura_modelo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(factura_modelo_control) {
		super();
		
		this.factura_modelo_control=factura_modelo_control;
	}
		
	actualizarVariablesPagina(factura_modelo_control) {
		
		if(factura_modelo_control.action=="index" || factura_modelo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(factura_modelo_control);
			
		} 
		
		
		
	
		else if(factura_modelo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(factura_modelo_control);	
		
		} else if(factura_modelo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(factura_modelo_control);		
		}
	
	
		
		
		else if(factura_modelo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_modelo_control);
		
		} else if(factura_modelo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(factura_modelo_control);		
		
		} else if(factura_modelo_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_modelo_control);		
		
		} 
		//else if(factura_modelo_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_modelo_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + factura_modelo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(factura_modelo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(factura_modelo_control) {
		this.actualizarPaginaAccionesGenerales(factura_modelo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(factura_modelo_control) {
		
		this.actualizarPaginaCargaGeneral(factura_modelo_control);
		this.actualizarPaginaOrderBy(factura_modelo_control);
		this.actualizarPaginaTablaDatos(factura_modelo_control);
		this.actualizarPaginaCargaGeneralControles(factura_modelo_control);
		//this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_modelo_control);
		this.actualizarPaginaAreaBusquedas(factura_modelo_control);
		this.actualizarPaginaCargaCombosFK(factura_modelo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(factura_modelo_control) {
		//this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(factura_modelo_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(factura_modelo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_modelo_control);		
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(factura_modelo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_modelo_control);		
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(factura_modelo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(factura_modelo_control);		
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(factura_modelo_control) {
		this.actualizarPaginaCargaGeneralControles(factura_modelo_control);
		this.actualizarPaginaCargaCombosFK(factura_modelo_control);
		this.actualizarPaginaFormulario(factura_modelo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(factura_modelo_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(factura_modelo_control) {
		this.actualizarPaginaCargaGeneralControles(factura_modelo_control);
		this.actualizarPaginaCargaCombosFK(factura_modelo_control);
		this.actualizarPaginaFormulario(factura_modelo_control);
		this.onLoadCombosDefectoFK(factura_modelo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		this.actualizarPaginaAreaMantenimiento(factura_modelo_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(factura_modelo_control) {
		//FORMULARIO
		if(factura_modelo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_modelo_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(factura_modelo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);		
		
		//COMBOS FK
		if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_modelo_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(factura_modelo_control) {
		//FORMULARIO
		if(factura_modelo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_modelo_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(factura_modelo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);	
		
		//COMBOS FK
		if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_modelo_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(factura_modelo_control) {
		//FORMULARIO
		if(factura_modelo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(factura_modelo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control);	
		//COMBOS FK
		if(factura_modelo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(factura_modelo_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(factura_modelo_control) {
		
		if(factura_modelo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(factura_modelo_control);
		}
		
		if(factura_modelo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(factura_modelo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(factura_modelo_control) {
		if(factura_modelo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("factura_modeloReturnGeneral",JSON.stringify(factura_modelo_control.factura_modeloReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(factura_modelo_control) {
		if(factura_modelo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_modelo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(factura_modelo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(factura_modelo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(factura_modelo_control, mostrar) {
		
		if(mostrar==true) {
			factura_modelo_funcion1.resaltarRestaurarDivsPagina(false,"factura_modelo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				factura_modelo_funcion1.resaltarRestaurarDivMantenimiento(false,"factura_modelo");
			}			
			
			factura_modelo_funcion1.mostrarDivMensaje(true,factura_modelo_control.strAuxiliarMensaje,factura_modelo_control.strAuxiliarCssMensaje);
		
		} else {
			factura_modelo_funcion1.mostrarDivMensaje(false,factura_modelo_control.strAuxiliarMensaje,factura_modelo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(factura_modelo_control) {
		if(factura_modelo_funcion1.esPaginaForm(factura_modelo_constante1)==true) {
			window.opener.factura_modelo_webcontrol1.actualizarPaginaTablaDatos(factura_modelo_control);
		} else {
			this.actualizarPaginaTablaDatos(factura_modelo_control);
		}
	}
	
	actualizarPaginaAbrirLink(factura_modelo_control) {
		factura_modelo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(factura_modelo_control.strAuxiliarUrlPagina);
				
		factura_modelo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(factura_modelo_control.strAuxiliarTipo,factura_modelo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(factura_modelo_control) {
		factura_modelo_funcion1.resaltarRestaurarDivMensaje(true,factura_modelo_control.strAuxiliarMensajeAlert,factura_modelo_control.strAuxiliarCssMensaje);
			
		if(factura_modelo_funcion1.esPaginaForm(factura_modelo_constante1)==true) {
			window.opener.factura_modelo_funcion1.resaltarRestaurarDivMensaje(true,factura_modelo_control.strAuxiliarMensajeAlert,factura_modelo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(factura_modelo_control) {
		this.factura_modelo_controlInicial=factura_modelo_control;
			
		if(factura_modelo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(factura_modelo_control.strStyleDivArbol,factura_modelo_control.strStyleDivContent
																,factura_modelo_control.strStyleDivOpcionesBanner,factura_modelo_control.strStyleDivExpandirColapsar
																,factura_modelo_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(factura_modelo_control) {
		this.actualizarCssBotonesPagina(factura_modelo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(factura_modelo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(factura_modelo_control.tiposReportes,factura_modelo_control.tiposReporte
															 	,factura_modelo_control.tiposPaginacion,factura_modelo_control.tiposAcciones
																,factura_modelo_control.tiposColumnasSelect,factura_modelo_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(factura_modelo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(factura_modelo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(factura_modelo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(factura_modelo_control) {
	
		var indexPosition=factura_modelo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=factura_modelo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(factura_modelo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(factura_modelo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura_lote",factura_modelo_control.strRecargarFkTipos,",")) { 
				factura_modelo_webcontrol1.cargarCombosfactura_lotesFK(factura_modelo_control);
			}

			if(factura_modelo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_modelo_control.strRecargarFkTipos,",")) { 
				factura_modelo_webcontrol1.cargarCombosclientesFK(factura_modelo_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(factura_modelo_control.strRecargarFkTiposNinguno!=null && factura_modelo_control.strRecargarFkTiposNinguno!='NINGUNO' && factura_modelo_control.strRecargarFkTiposNinguno!='') {
			
				if(factura_modelo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_factura_lote",factura_modelo_control.strRecargarFkTiposNinguno,",")) { 
					factura_modelo_webcontrol1.cargarCombosfactura_lotesFK(factura_modelo_control);
				}

				if(factura_modelo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",factura_modelo_control.strRecargarFkTiposNinguno,",")) { 
					factura_modelo_webcontrol1.cargarCombosclientesFK(factura_modelo_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablafactura_loteFK(factura_modelo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_modelo_funcion1,factura_modelo_control.factura_lotesFK);
	}

	cargarComboEditarTablaclienteFK(factura_modelo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_modelo_funcion1,factura_modelo_control.clientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(factura_modelo_control) {
		jQuery("#tdfactura_modeloNuevo").css("display",factura_modelo_control.strPermisoNuevo);
		jQuery("#trfactura_modeloElementos").css("display",factura_modelo_control.strVisibleTablaElementos);
		jQuery("#trfactura_modeloAcciones").css("display",factura_modelo_control.strVisibleTablaAcciones);
		jQuery("#trfactura_modeloParametrosAcciones").css("display",factura_modelo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(factura_modelo_control) {
	
		this.actualizarCssBotonesMantenimiento(factura_modelo_control);
				
		if(factura_modelo_control.factura_modeloActual!=null) {//form
			
			this.actualizarCamposFormulario(factura_modelo_control);			
		}
						
		this.actualizarSpanMensajesCampos(factura_modelo_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(factura_modelo_control) {
	
		jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id").val(factura_modelo_control.factura_modeloActual.id);
		jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-version_row").val(factura_modelo_control.factura_modeloActual.versionRow);
		
		if(factura_modelo_control.factura_modeloActual.id_factura_lote!=null && factura_modelo_control.factura_modeloActual.id_factura_lote>-1){
			if(jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote").val() != factura_modelo_control.factura_modeloActual.id_factura_lote) {
				jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote").val(factura_modelo_control.factura_modeloActual.id_factura_lote).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote").select2("val", null);
			if(jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_modelo_control.factura_modeloActual.id_cliente!=null && factura_modelo_control.factura_modeloActual.id_cliente>-1){
			if(jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente").val() != factura_modelo_control.factura_modeloActual.id_cliente) {
				jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente").val(factura_modelo_control.factura_modeloActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente").select2("val", null);
			if(jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-marcado").prop('checked',factura_modelo_control.factura_modeloActual.marcado);
		jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-ultimo").val(factura_modelo_control.factura_modeloActual.ultimo);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+factura_modelo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("factura_modelo","facturacion","","form_factura_modelo",formulario,"","",paraEventoTabla,idFilaTabla,factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
	}
	
	actualizarSpanMensajesCampos(factura_modelo_control) {
		jQuery("#spanstrMensajeid").text(factura_modelo_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(factura_modelo_control.strMensajeversion_row);		
		jQuery("#spanstrMensajeid_factura_lote").text(factura_modelo_control.strMensajeid_factura_lote);		
		jQuery("#spanstrMensajeid_cliente").text(factura_modelo_control.strMensajeid_cliente);		
		jQuery("#spanstrMensajemarcado").text(factura_modelo_control.strMensajemarcado);		
		jQuery("#spanstrMensajeultimo").text(factura_modelo_control.strMensajeultimo);		
	}
	
	actualizarCssBotonesMantenimiento(factura_modelo_control) {
		jQuery("#tdbtnNuevofactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevofactura_modelo").css("display",factura_modelo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarfactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarfactura_modelo").css("display",factura_modelo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarfactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarfactura_modelo").css("display",factura_modelo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarfactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosfactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosfactura_modelo").css("display",factura_modelo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarfactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarfactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarfactura_modelo").css("visibility",factura_modelo_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosfactura_lotesFK(factura_modelo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote",factura_modelo_control.factura_lotesFK);

		if(factura_modelo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_modelo_control.idFilaTablaActual+"_2",factura_modelo_control.factura_lotesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote",factura_modelo_control.factura_lotesFK);

	};

	cargarCombosclientesFK(factura_modelo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente",factura_modelo_control.clientesFK);

		if(factura_modelo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_modelo_control.idFilaTablaActual+"_3",factura_modelo_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",factura_modelo_control.clientesFK);

	};

	
	
	registrarComboActionChangeCombosfactura_lotesFK(factura_modelo_control) {

	};

	registrarComboActionChangeCombosclientesFK(factura_modelo_control) {

	};

	
	
	setDefectoValorCombosfactura_lotesFK(factura_modelo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_modelo_control.idfactura_loteDefaultFK>-1 && jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote").val() != factura_modelo_control.idfactura_loteDefaultFK) {
				jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote").val(factura_modelo_control.idfactura_loteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote").val(factura_modelo_control.idfactura_loteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idfactura_lote-cmbid_factura_lote").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(factura_modelo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_modelo_control.idclienteDefaultFK>-1 && jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente").val() != factura_modelo_control.idclienteDefaultFK) {
				jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente").val(factura_modelo_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(factura_modelo_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_modelo_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//factura_modelo_control
		
	
	}
	
	onLoadCombosDefectoFK(factura_modelo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_modelo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(factura_modelo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura_lote",factura_modelo_control.strRecargarFkTipos,",")) { 
				factura_modelo_webcontrol1.setDefectoValorCombosfactura_lotesFK(factura_modelo_control);
			}

			if(factura_modelo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_modelo_control.strRecargarFkTipos,",")) { 
				factura_modelo_webcontrol1.setDefectoValorCombosclientesFK(factura_modelo_control);
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
	onLoadCombosEventosFK(factura_modelo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_modelo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(factura_modelo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura_lote",factura_modelo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_modelo_webcontrol1.registrarComboActionChangeCombosfactura_lotesFK(factura_modelo_control);
			//}

			//if(factura_modelo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_modelo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_modelo_webcontrol1.registrarComboActionChangeCombosclientesFK(factura_modelo_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(factura_modelo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_modelo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(factura_modelo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(factura_modelo_constante1.BIT_ES_PAGINA_FORM==true) {
				factura_modelo_funcion1.validarFormularioJQuery(factura_modelo_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("factura_modelo");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("factura_modelo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(factura_modelo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,"factura_modelo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("factura_lote","id_factura_lote","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_factura_lote_img_busqueda").click(function(){
				factura_modelo_webcontrol1.abrirBusquedaParafactura_lote("id_factura_lote");
				//alert(jQuery('#form-id_factura_lote_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_modelo_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				factura_modelo_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(factura_modelo_control) {
		
		
		
		if(factura_modelo_control.strPermisoActualizar!=null) {
			jQuery("#tdfactura_modeloActualizarToolBar").css("display",factura_modelo_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdfactura_modeloEliminarToolBar").css("display",factura_modelo_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trfactura_modeloElementos").css("display",factura_modelo_control.strVisibleTablaElementos);
		
		jQuery("#trfactura_modeloAcciones").css("display",factura_modelo_control.strVisibleTablaAcciones);
		jQuery("#trfactura_modeloParametrosAcciones").css("display",factura_modelo_control.strVisibleTablaAcciones);
		
		jQuery("#tdfactura_modeloCerrarPagina").css("display",factura_modelo_control.strPermisoPopup);		
		jQuery("#tdfactura_modeloCerrarPaginaToolBar").css("display",factura_modelo_control.strPermisoPopup);
		//jQuery("#trfactura_modeloAccionesRelaciones").css("display",factura_modelo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=factura_modelo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + factura_modelo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + factura_modelo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Facturas Modeloses";
		sTituloBanner+=" - " + factura_modelo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + factura_modelo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdfactura_modeloRelacionesToolBar").css("display",factura_modelo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosfactura_modelo").css("display",factura_modelo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		factura_modelo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		factura_modelo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		factura_modelo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		factura_modelo_webcontrol1.registrarEventosControles();
		
		if(factura_modelo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(factura_modelo_constante1.STR_ES_RELACIONADO=="false") {
			factura_modelo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(factura_modelo_constante1.STR_ES_RELACIONES=="true") {
			if(factura_modelo_constante1.BIT_ES_PAGINA_FORM==true) {
				factura_modelo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(factura_modelo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(factura_modelo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(factura_modelo_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(factura_modelo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
						//factura_modelo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(factura_modelo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(factura_modelo_constante1.BIG_ID_ACTUAL,"factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);
						//factura_modelo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			factura_modelo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("factura_modelo","facturacion","",factura_modelo_funcion1,factura_modelo_webcontrol1,factura_modelo_constante1);	
	}
}

var factura_modelo_webcontrol1 = new factura_modelo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {factura_modelo_webcontrol,factura_modelo_webcontrol1};

//Para ser llamado desde window.opener
window.factura_modelo_webcontrol1 = factura_modelo_webcontrol1;


if(factura_modelo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = factura_modelo_webcontrol1.onLoadWindow; 
}

//</script>