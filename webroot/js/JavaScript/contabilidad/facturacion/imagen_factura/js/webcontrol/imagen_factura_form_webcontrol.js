//<script type="text/javascript" language="javascript">



//var imagen_facturaJQueryPaginaWebInteraccion= function (imagen_factura_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_factura_constante,imagen_factura_constante1} from '../util/imagen_factura_constante.js';

import {imagen_factura_funcion,imagen_factura_funcion1} from '../util/imagen_factura_form_funcion.js';


class imagen_factura_webcontrol extends GeneralEntityWebControl {
	
	imagen_factura_control=null;
	imagen_factura_controlInicial=null;
	imagen_factura_controlAuxiliar=null;
		
	//if(imagen_factura_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_factura_control) {
		super();
		
		this.imagen_factura_control=imagen_factura_control;
	}
		
	actualizarVariablesPagina(imagen_factura_control) {
		
		if(imagen_factura_control.action=="index" || imagen_factura_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_factura_control);
			
		} 
		
		
		
	
		else if(imagen_factura_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_factura_control);	
		
		} else if(imagen_factura_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_factura_control);		
		}
	
	
		
		
		else if(imagen_factura_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(imagen_factura_control);		
		
		} else if(imagen_factura_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_factura_control);		
		
		} 
		//else if(imagen_factura_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_factura_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_factura_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_factura_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_factura_control) {
		this.actualizarPaginaAccionesGenerales(imagen_factura_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_factura_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_factura_control);
		this.actualizarPaginaOrderBy(imagen_factura_control);
		this.actualizarPaginaTablaDatos(imagen_factura_control);
		this.actualizarPaginaCargaGeneralControles(imagen_factura_control);
		//this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_factura_control);
		this.actualizarPaginaAreaBusquedas(imagen_factura_control);
		this.actualizarPaginaCargaCombosFK(imagen_factura_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_factura_control) {
		//this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_factura_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(imagen_factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_factura_control);		
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(imagen_factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_factura_control);		
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(imagen_factura_control) {
		this.actualizarPaginaTablaDatosAuxiliar(imagen_factura_control);		
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(imagen_factura_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_factura_control);
		this.actualizarPaginaCargaCombosFK(imagen_factura_control);
		this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(imagen_factura_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(imagen_factura_control) {
		this.actualizarPaginaCargaGeneralControles(imagen_factura_control);
		this.actualizarPaginaCargaCombosFK(imagen_factura_control);
		this.actualizarPaginaFormulario(imagen_factura_control);
		this.onLoadCombosDefectoFK(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(imagen_factura_control) {
		//FORMULARIO
		if(imagen_factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_factura_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_factura_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		
		//COMBOS FK
		if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_factura_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(imagen_factura_control) {
		//FORMULARIO
		if(imagen_factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_factura_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(imagen_factura_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);	
		
		//COMBOS FK
		if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_factura_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(imagen_factura_control) {
		//FORMULARIO
		if(imagen_factura_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(imagen_factura_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);	
		//COMBOS FK
		if(imagen_factura_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(imagen_factura_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_factura_control) {
		
		if(imagen_factura_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_factura_control);
		}
		
		if(imagen_factura_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_factura_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_factura_control) {
		if(imagen_factura_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_facturaReturnGeneral",JSON.stringify(imagen_factura_control.imagen_facturaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control) {
		if(imagen_factura_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_factura_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_factura_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_factura_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_factura_control, mostrar) {
		
		if(mostrar==true) {
			imagen_factura_funcion1.resaltarRestaurarDivsPagina(false,"imagen_factura");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_factura_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_factura");
			}			
			
			imagen_factura_funcion1.mostrarDivMensaje(true,imagen_factura_control.strAuxiliarMensaje,imagen_factura_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_factura_funcion1.mostrarDivMensaje(false,imagen_factura_control.strAuxiliarMensaje,imagen_factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_factura_control) {
		if(imagen_factura_funcion1.esPaginaForm(imagen_factura_constante1)==true) {
			window.opener.imagen_factura_webcontrol1.actualizarPaginaTablaDatos(imagen_factura_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_factura_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_factura_control) {
		imagen_factura_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_factura_control.strAuxiliarUrlPagina);
				
		imagen_factura_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_factura_control.strAuxiliarTipo,imagen_factura_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_factura_control) {
		imagen_factura_funcion1.resaltarRestaurarDivMensaje(true,imagen_factura_control.strAuxiliarMensajeAlert,imagen_factura_control.strAuxiliarCssMensaje);
			
		if(imagen_factura_funcion1.esPaginaForm(imagen_factura_constante1)==true) {
			window.opener.imagen_factura_funcion1.resaltarRestaurarDivMensaje(true,imagen_factura_control.strAuxiliarMensajeAlert,imagen_factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_factura_control) {
		this.imagen_factura_controlInicial=imagen_factura_control;
			
		if(imagen_factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_factura_control.strStyleDivArbol,imagen_factura_control.strStyleDivContent
																,imagen_factura_control.strStyleDivOpcionesBanner,imagen_factura_control.strStyleDivExpandirColapsar
																,imagen_factura_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_factura_control) {
		this.actualizarCssBotonesPagina(imagen_factura_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_factura_control.tiposReportes,imagen_factura_control.tiposReporte
															 	,imagen_factura_control.tiposPaginacion,imagen_factura_control.tiposAcciones
																,imagen_factura_control.tiposColumnasSelect,imagen_factura_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_factura_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_factura_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_factura_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_factura_control) {
	
		var indexPosition=imagen_factura_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_factura_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_factura_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",imagen_factura_control.strRecargarFkTipos,",")) { 
				imagen_factura_webcontrol1.cargarCombosfacturasFK(imagen_factura_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_factura_control.strRecargarFkTiposNinguno!=null && imagen_factura_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_factura_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_factura",imagen_factura_control.strRecargarFkTiposNinguno,",")) { 
					imagen_factura_webcontrol1.cargarCombosfacturasFK(imagen_factura_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablafacturaFK(imagen_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_factura_funcion1,imagen_factura_control.facturasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(imagen_factura_control) {
		jQuery("#tdimagen_facturaNuevo").css("display",imagen_factura_control.strPermisoNuevo);
		jQuery("#trimagen_facturaElementos").css("display",imagen_factura_control.strVisibleTablaElementos);
		jQuery("#trimagen_facturaAcciones").css("display",imagen_factura_control.strVisibleTablaAcciones);
		jQuery("#trimagen_facturaParametrosAcciones").css("display",imagen_factura_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(imagen_factura_control) {
	
		this.actualizarCssBotonesMantenimiento(imagen_factura_control);
				
		if(imagen_factura_control.imagen_facturaActual!=null) {//form
			
			this.actualizarCamposFormulario(imagen_factura_control);			
		}
						
		this.actualizarSpanMensajesCampos(imagen_factura_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(imagen_factura_control) {
	
		jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id").val(imagen_factura_control.imagen_facturaActual.id);
		jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-created_at").val(imagen_factura_control.imagen_facturaActual.versionRow);
		jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-updated_at").val(imagen_factura_control.imagen_facturaActual.versionRow);
		
		if(imagen_factura_control.imagen_facturaActual.id_factura!=null && imagen_factura_control.imagen_facturaActual.id_factura>-1){
			if(jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").val() != imagen_factura_control.imagen_facturaActual.id_factura) {
				jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").val(imagen_factura_control.imagen_facturaActual.id_factura).trigger("change");
			}
		} else { 
			//jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").select2("val", null);
			if(jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_imagen").val(imagen_factura_control.imagen_facturaActual.id_imagen);
		jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-imagen").val(imagen_factura_control.imagen_facturaActual.imagen);
		jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-nro_factura").val(imagen_factura_control.imagen_facturaActual.nro_factura);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+imagen_factura_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("imagen_factura","facturacion","","form_imagen_factura",formulario,"","",paraEventoTabla,idFilaTabla,imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
	}
	
	actualizarSpanMensajesCampos(imagen_factura_control) {
		jQuery("#spanstrMensajeid").text(imagen_factura_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(imagen_factura_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(imagen_factura_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_factura").text(imagen_factura_control.strMensajeid_factura);		
		jQuery("#spanstrMensajeid_imagen").text(imagen_factura_control.strMensajeid_imagen);		
		jQuery("#spanstrMensajeimagen").text(imagen_factura_control.strMensajeimagen);		
		jQuery("#spanstrMensajenro_factura").text(imagen_factura_control.strMensajenro_factura);		
	}
	
	actualizarCssBotonesMantenimiento(imagen_factura_control) {
		jQuery("#tdbtnNuevoimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevoimagen_factura").css("display",imagen_factura_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarimagen_factura").css("display",imagen_factura_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarimagen_factura").css("display",imagen_factura_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosimagen_factura").css("display",imagen_factura_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarimagen_factura").css("visibility",imagen_factura_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosfacturasFK(imagen_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura",imagen_factura_control.facturasFK);

		if(imagen_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_factura_control.idFilaTablaActual+"_3",imagen_factura_control.facturasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura",imagen_factura_control.facturasFK);

	};

	
	
	registrarComboActionChangeCombosfacturasFK(imagen_factura_control) {

	};

	
	
	setDefectoValorCombosfacturasFK(imagen_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_factura_control.idfacturaDefaultFK>-1 && jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").val() != imagen_factura_control.idfacturaDefaultFK) {
				jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").val(imagen_factura_control.idfacturaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val(imagen_factura_control.idfacturaDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_factura_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",imagen_factura_control.strRecargarFkTipos,",")) { 
				imagen_factura_webcontrol1.setDefectoValorCombosfacturasFK(imagen_factura_control);
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
	onLoadCombosEventosFK(imagen_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",imagen_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_factura_webcontrol1.registrarComboActionChangeCombosfacturasFK(imagen_factura_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_factura_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(imagen_factura_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_factura_funcion1.validarFormularioJQuery(imagen_factura_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_factura");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_factura");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_factura_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,"imagen_factura");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("factura","id_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura_img_busqueda").click(function(){
				imagen_factura_webcontrol1.abrirBusquedaParafactura("id_factura");
				//alert(jQuery('#form-id_factura_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_factura_control) {
		
		
		
		if(imagen_factura_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_facturaActualizarToolBar").css("display",imagen_factura_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdimagen_facturaEliminarToolBar").css("display",imagen_factura_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trimagen_facturaElementos").css("display",imagen_factura_control.strVisibleTablaElementos);
		
		jQuery("#trimagen_facturaAcciones").css("display",imagen_factura_control.strVisibleTablaAcciones);
		jQuery("#trimagen_facturaParametrosAcciones").css("display",imagen_factura_control.strVisibleTablaAcciones);
		
		jQuery("#tdimagen_facturaCerrarPagina").css("display",imagen_factura_control.strPermisoPopup);		
		jQuery("#tdimagen_facturaCerrarPaginaToolBar").css("display",imagen_factura_control.strPermisoPopup);
		//jQuery("#trimagen_facturaAccionesRelaciones").css("display",imagen_factura_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_factura_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_factura_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_factura_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Facturases";
		sTituloBanner+=" - " + imagen_factura_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_factura_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_facturaRelacionesToolBar").css("display",imagen_factura_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_factura").css("display",imagen_factura_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_factura_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_factura_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_factura_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_factura_webcontrol1.registrarEventosControles();
		
		if(imagen_factura_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_factura_constante1.STR_ES_RELACIONADO=="false") {
			imagen_factura_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_factura_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_factura_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_factura_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_factura_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_factura_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(imagen_factura_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(imagen_factura_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
						//imagen_factura_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(imagen_factura_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(imagen_factura_constante1.BIG_ID_ACTUAL,"imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
						//imagen_factura_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			imagen_factura_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);	
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

var imagen_factura_webcontrol1 = new imagen_factura_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_factura_webcontrol,imagen_factura_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_factura_webcontrol1 = imagen_factura_webcontrol1;


if(imagen_factura_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_factura_webcontrol1.onLoadWindow; 
}

//</script>