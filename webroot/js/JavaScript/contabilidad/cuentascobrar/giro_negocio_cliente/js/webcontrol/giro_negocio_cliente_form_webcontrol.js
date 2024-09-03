//<script type="text/javascript" language="javascript">



//var giro_negocio_clienteJQueryPaginaWebInteraccion= function (giro_negocio_cliente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {giro_negocio_cliente_constante,giro_negocio_cliente_constante1} from '../util/giro_negocio_cliente_constante.js';

import {giro_negocio_cliente_funcion,giro_negocio_cliente_funcion1} from '../util/giro_negocio_cliente_form_funcion.js';


class giro_negocio_cliente_webcontrol extends GeneralEntityWebControl {
	
	giro_negocio_cliente_control=null;
	giro_negocio_cliente_controlInicial=null;
	giro_negocio_cliente_controlAuxiliar=null;
		
	//if(giro_negocio_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(giro_negocio_cliente_control) {
		super();
		
		this.giro_negocio_cliente_control=giro_negocio_cliente_control;
	}
		
	actualizarVariablesPagina(giro_negocio_cliente_control) {
		
		if(giro_negocio_cliente_control.action=="index" || giro_negocio_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(giro_negocio_cliente_control);
			
		} 
		
		
		
	
		else if(giro_negocio_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(giro_negocio_cliente_control);	
		
		} else if(giro_negocio_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(giro_negocio_cliente_control);		
		}
	
		else if(giro_negocio_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(giro_negocio_cliente_control);		
		}
	
		else if(giro_negocio_cliente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(giro_negocio_cliente_control);
		}
		
		
		else if(giro_negocio_cliente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(giro_negocio_cliente_control);
		
		} else if(giro_negocio_cliente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(giro_negocio_cliente_control);
		
		} else if(giro_negocio_cliente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(giro_negocio_cliente_control);
		
		} else if(giro_negocio_cliente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(giro_negocio_cliente_control);
		
		} else if(giro_negocio_cliente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(giro_negocio_cliente_control);
		
		} else if(giro_negocio_cliente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(giro_negocio_cliente_control);		
		
		} else if(giro_negocio_cliente_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(giro_negocio_cliente_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + giro_negocio_cliente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(giro_negocio_cliente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(giro_negocio_cliente_control) {
		this.actualizarPaginaAccionesGenerales(giro_negocio_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(giro_negocio_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(giro_negocio_cliente_control);
		this.actualizarPaginaOrderBy(giro_negocio_cliente_control);
		this.actualizarPaginaTablaDatos(giro_negocio_cliente_control);
		this.actualizarPaginaCargaGeneralControles(giro_negocio_cliente_control);
		//this.actualizarPaginaFormulario(giro_negocio_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(giro_negocio_cliente_control);
		this.actualizarPaginaAreaBusquedas(giro_negocio_cliente_control);
		this.actualizarPaginaCargaCombosFK(giro_negocio_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(giro_negocio_cliente_control) {
		//this.actualizarPaginaFormulario(giro_negocio_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(giro_negocio_cliente_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(giro_negocio_cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_cliente_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(giro_negocio_cliente_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(giro_negocio_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(giro_negocio_cliente_control);		
		this.actualizarPaginaFormulario(giro_negocio_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_cliente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(giro_negocio_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(giro_negocio_cliente_control);		
		this.actualizarPaginaFormulario(giro_negocio_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(giro_negocio_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(giro_negocio_cliente_control);		
		this.actualizarPaginaFormulario(giro_negocio_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(giro_negocio_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(giro_negocio_cliente_control);
		this.actualizarPaginaCargaCombosFK(giro_negocio_cliente_control);
		this.actualizarPaginaFormulario(giro_negocio_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_cliente_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(giro_negocio_cliente_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(giro_negocio_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(giro_negocio_cliente_control);
		this.actualizarPaginaCargaCombosFK(giro_negocio_cliente_control);
		this.actualizarPaginaFormulario(giro_negocio_cliente_control);
		this.onLoadCombosDefectoFK(giro_negocio_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_cliente_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(giro_negocio_cliente_control) {
		//FORMULARIO
		if(giro_negocio_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(giro_negocio_cliente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(giro_negocio_cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_cliente_control);		
		
		//COMBOS FK
		if(giro_negocio_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(giro_negocio_cliente_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(giro_negocio_cliente_control) {
		//FORMULARIO
		if(giro_negocio_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(giro_negocio_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_cliente_control);	
		//COMBOS FK
		if(giro_negocio_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(giro_negocio_cliente_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(giro_negocio_cliente_control) {
		
		if(giro_negocio_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(giro_negocio_cliente_control);
		}
		
		if(giro_negocio_cliente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(giro_negocio_cliente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(giro_negocio_cliente_control) {
		if(giro_negocio_cliente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("giro_negocio_clienteReturnGeneral",JSON.stringify(giro_negocio_cliente_control.giro_negocio_clienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(giro_negocio_cliente_control) {
		if(giro_negocio_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && giro_negocio_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(giro_negocio_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(giro_negocio_cliente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(giro_negocio_cliente_control, mostrar) {
		
		if(mostrar==true) {
			giro_negocio_cliente_funcion1.resaltarRestaurarDivsPagina(false,"giro_negocio_cliente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				giro_negocio_cliente_funcion1.resaltarRestaurarDivMantenimiento(false,"giro_negocio_cliente");
			}			
			
			giro_negocio_cliente_funcion1.mostrarDivMensaje(true,giro_negocio_cliente_control.strAuxiliarMensaje,giro_negocio_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			giro_negocio_cliente_funcion1.mostrarDivMensaje(false,giro_negocio_cliente_control.strAuxiliarMensaje,giro_negocio_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(giro_negocio_cliente_control) {
		if(giro_negocio_cliente_funcion1.esPaginaForm(giro_negocio_cliente_constante1)==true) {
			window.opener.giro_negocio_cliente_webcontrol1.actualizarPaginaTablaDatos(giro_negocio_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(giro_negocio_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(giro_negocio_cliente_control) {
		giro_negocio_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(giro_negocio_cliente_control.strAuxiliarUrlPagina);
				
		giro_negocio_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(giro_negocio_cliente_control.strAuxiliarTipo,giro_negocio_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(giro_negocio_cliente_control) {
		giro_negocio_cliente_funcion1.resaltarRestaurarDivMensaje(true,giro_negocio_cliente_control.strAuxiliarMensajeAlert,giro_negocio_cliente_control.strAuxiliarCssMensaje);
			
		if(giro_negocio_cliente_funcion1.esPaginaForm(giro_negocio_cliente_constante1)==true) {
			window.opener.giro_negocio_cliente_funcion1.resaltarRestaurarDivMensaje(true,giro_negocio_cliente_control.strAuxiliarMensajeAlert,giro_negocio_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(giro_negocio_cliente_control) {
		this.giro_negocio_cliente_controlInicial=giro_negocio_cliente_control;
			
		if(giro_negocio_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(giro_negocio_cliente_control.strStyleDivArbol,giro_negocio_cliente_control.strStyleDivContent
																,giro_negocio_cliente_control.strStyleDivOpcionesBanner,giro_negocio_cliente_control.strStyleDivExpandirColapsar
																,giro_negocio_cliente_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(giro_negocio_cliente_control) {
		this.actualizarCssBotonesPagina(giro_negocio_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(giro_negocio_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(giro_negocio_cliente_control.tiposReportes,giro_negocio_cliente_control.tiposReporte
															 	,giro_negocio_cliente_control.tiposPaginacion,giro_negocio_cliente_control.tiposAcciones
																,giro_negocio_cliente_control.tiposColumnasSelect,giro_negocio_cliente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(giro_negocio_cliente_control.tiposRelaciones,giro_negocio_cliente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(giro_negocio_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(giro_negocio_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(giro_negocio_cliente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(giro_negocio_cliente_control) {
	
		var indexPosition=giro_negocio_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=giro_negocio_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(giro_negocio_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(giro_negocio_cliente_control.strRecargarFkTiposNinguno!=null && giro_negocio_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && giro_negocio_cliente_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(giro_negocio_cliente_control) {
		jQuery("#tdgiro_negocio_clienteNuevo").css("display",giro_negocio_cliente_control.strPermisoNuevo);
		jQuery("#trgiro_negocio_clienteElementos").css("display",giro_negocio_cliente_control.strVisibleTablaElementos);
		jQuery("#trgiro_negocio_clienteAcciones").css("display",giro_negocio_cliente_control.strVisibleTablaAcciones);
		jQuery("#trgiro_negocio_clienteParametrosAcciones").css("display",giro_negocio_cliente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(giro_negocio_cliente_control) {
	
		this.actualizarCssBotonesMantenimiento(giro_negocio_cliente_control);
				
		if(giro_negocio_cliente_control.giro_negocio_clienteActual!=null) {//form
			
			this.actualizarCamposFormulario(giro_negocio_cliente_control);			
		}
						
		this.actualizarSpanMensajesCampos(giro_negocio_cliente_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(giro_negocio_cliente_control) {
	
		jQuery("#form"+giro_negocio_cliente_constante1.STR_SUFIJO+"-id").val(giro_negocio_cliente_control.giro_negocio_clienteActual.id);
		jQuery("#form"+giro_negocio_cliente_constante1.STR_SUFIJO+"-created_at").val(giro_negocio_cliente_control.giro_negocio_clienteActual.versionRow);
		jQuery("#form"+giro_negocio_cliente_constante1.STR_SUFIJO+"-updated_at").val(giro_negocio_cliente_control.giro_negocio_clienteActual.versionRow);
		jQuery("#form"+giro_negocio_cliente_constante1.STR_SUFIJO+"-nombre").val(giro_negocio_cliente_control.giro_negocio_clienteActual.nombre);
		jQuery("#form"+giro_negocio_cliente_constante1.STR_SUFIJO+"-predeterminado").prop('checked',giro_negocio_cliente_control.giro_negocio_clienteActual.predeterminado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+giro_negocio_cliente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("giro_negocio_cliente","cuentascobrar","","form_giro_negocio_cliente",formulario,"","",paraEventoTabla,idFilaTabla,giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1,giro_negocio_cliente_constante1);
	}
	
	actualizarSpanMensajesCampos(giro_negocio_cliente_control) {
		jQuery("#spanstrMensajeid").text(giro_negocio_cliente_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(giro_negocio_cliente_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(giro_negocio_cliente_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajenombre").text(giro_negocio_cliente_control.strMensajenombre);		
		jQuery("#spanstrMensajepredeterminado").text(giro_negocio_cliente_control.strMensajepredeterminado);		
	}
	
	actualizarCssBotonesMantenimiento(giro_negocio_cliente_control) {
		jQuery("#tdbtnNuevogiro_negocio_cliente").css("visibility",giro_negocio_cliente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevogiro_negocio_cliente").css("display",giro_negocio_cliente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizargiro_negocio_cliente").css("visibility",giro_negocio_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizargiro_negocio_cliente").css("display",giro_negocio_cliente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminargiro_negocio_cliente").css("visibility",giro_negocio_cliente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminargiro_negocio_cliente").css("display",giro_negocio_cliente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelargiro_negocio_cliente").css("visibility",giro_negocio_cliente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosgiro_negocio_cliente").css("visibility",giro_negocio_cliente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosgiro_negocio_cliente").css("display",giro_negocio_cliente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBargiro_negocio_cliente").css("visibility",giro_negocio_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBargiro_negocio_cliente").css("visibility",giro_negocio_cliente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBargiro_negocio_cliente").css("visibility",giro_negocio_cliente_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	
	
	
	
	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	
	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1,giro_negocio_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//giro_negocio_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(giro_negocio_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(giro_negocio_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			
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
	onLoadCombosEventosFK(giro_negocio_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(giro_negocio_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(giro_negocio_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(giro_negocio_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(giro_negocio_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1,giro_negocio_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1,giro_negocio_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1,giro_negocio_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1,giro_negocio_cliente_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(giro_negocio_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				giro_negocio_cliente_funcion1.validarFormularioJQuery(giro_negocio_cliente_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("giro_negocio_cliente");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("giro_negocio_cliente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1,giro_negocio_cliente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(giro_negocio_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1,"giro_negocio_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("giro_negocio_cliente");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(giro_negocio_cliente_control) {
		
		
		
		if(giro_negocio_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdgiro_negocio_clienteActualizarToolBar").css("display",giro_negocio_cliente_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdgiro_negocio_clienteEliminarToolBar").css("display",giro_negocio_cliente_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trgiro_negocio_clienteElementos").css("display",giro_negocio_cliente_control.strVisibleTablaElementos);
		
		jQuery("#trgiro_negocio_clienteAcciones").css("display",giro_negocio_cliente_control.strVisibleTablaAcciones);
		jQuery("#trgiro_negocio_clienteParametrosAcciones").css("display",giro_negocio_cliente_control.strVisibleTablaAcciones);
		
		jQuery("#tdgiro_negocio_clienteCerrarPagina").css("display",giro_negocio_cliente_control.strPermisoPopup);		
		jQuery("#tdgiro_negocio_clienteCerrarPaginaToolBar").css("display",giro_negocio_cliente_control.strPermisoPopup);
		//jQuery("#trgiro_negocio_clienteAccionesRelaciones").css("display",giro_negocio_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=giro_negocio_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + giro_negocio_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + giro_negocio_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Giro Negocioes";
		sTituloBanner+=" - " + giro_negocio_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + giro_negocio_cliente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdgiro_negocio_clienteRelacionesToolBar").css("display",giro_negocio_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosgiro_negocio_cliente").css("display",giro_negocio_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1,giro_negocio_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		giro_negocio_cliente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		giro_negocio_cliente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		giro_negocio_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		giro_negocio_cliente_webcontrol1.registrarEventosControles();
		
		if(giro_negocio_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(giro_negocio_cliente_constante1.STR_ES_RELACIONADO=="false") {
			giro_negocio_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(giro_negocio_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(giro_negocio_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				giro_negocio_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(giro_negocio_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(giro_negocio_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(giro_negocio_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(giro_negocio_cliente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1,giro_negocio_cliente_constante1);
						//giro_negocio_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(giro_negocio_cliente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(giro_negocio_cliente_constante1.BIG_ID_ACTUAL,"giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1,giro_negocio_cliente_constante1);
						//giro_negocio_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			giro_negocio_cliente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("giro_negocio_cliente","cuentascobrar","",giro_negocio_cliente_funcion1,giro_negocio_cliente_webcontrol1,giro_negocio_cliente_constante1);	
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

var giro_negocio_cliente_webcontrol1 = new giro_negocio_cliente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {giro_negocio_cliente_webcontrol,giro_negocio_cliente_webcontrol1};

//Para ser llamado desde window.opener
window.giro_negocio_cliente_webcontrol1 = giro_negocio_cliente_webcontrol1;


if(giro_negocio_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = giro_negocio_cliente_webcontrol1.onLoadWindow; 
}

//</script>