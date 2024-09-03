//<script type="text/javascript" language="javascript">



//var bancoJQueryPaginaWebInteraccion= function (banco_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {banco_constante,banco_constante1} from '../util/banco_constante.js';

import {banco_funcion,banco_funcion1} from '../util/banco_form_funcion.js';


class banco_webcontrol extends GeneralEntityWebControl {
	
	banco_control=null;
	banco_controlInicial=null;
	banco_controlAuxiliar=null;
		
	//if(banco_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(banco_control) {
		super();
		
		this.banco_control=banco_control;
	}
		
	actualizarVariablesPagina(banco_control) {
		
		if(banco_control.action=="index" || banco_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(banco_control);
			
		} 
		
		
		
	
		else if(banco_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(banco_control);	
		
		} else if(banco_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(banco_control);		
		}
	
		else if(banco_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(banco_control);		
		}
	
		else if(banco_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(banco_control);
		}
		
		
		else if(banco_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(banco_control);
		
		} else if(banco_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(banco_control);
		
		} else if(banco_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(banco_control);
		
		} else if(banco_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(banco_control);
		
		} else if(banco_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(banco_control);
		
		} else if(banco_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(banco_control);		
		
		} else if(banco_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(banco_control);		
		
		} 
		//else if(banco_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(banco_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + banco_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(banco_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(banco_control) {
		this.actualizarPaginaAccionesGenerales(banco_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(banco_control) {
		
		this.actualizarPaginaCargaGeneral(banco_control);
		this.actualizarPaginaOrderBy(banco_control);
		this.actualizarPaginaTablaDatos(banco_control);
		this.actualizarPaginaCargaGeneralControles(banco_control);
		//this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(banco_control);
		this.actualizarPaginaAreaBusquedas(banco_control);
		this.actualizarPaginaCargaCombosFK(banco_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(banco_control) {
		//this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(banco_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(banco_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(banco_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(banco_control) {
		this.actualizarPaginaTablaDatosAuxiliar(banco_control);		
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(banco_control) {
		this.actualizarPaginaTablaDatosAuxiliar(banco_control);		
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(banco_control) {
		this.actualizarPaginaTablaDatosAuxiliar(banco_control);		
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(banco_control) {
		this.actualizarPaginaCargaGeneralControles(banco_control);
		this.actualizarPaginaCargaCombosFK(banco_control);
		this.actualizarPaginaFormulario(banco_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(banco_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(banco_control) {
		this.actualizarPaginaCargaGeneralControles(banco_control);
		this.actualizarPaginaCargaCombosFK(banco_control);
		this.actualizarPaginaFormulario(banco_control);
		this.onLoadCombosDefectoFK(banco_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		this.actualizarPaginaAreaMantenimiento(banco_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(banco_control) {
		//FORMULARIO
		if(banco_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(banco_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(banco_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);		
		
		//COMBOS FK
		if(banco_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(banco_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(banco_control) {
		//FORMULARIO
		if(banco_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(banco_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(banco_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);	
		
		//COMBOS FK
		if(banco_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(banco_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(banco_control) {
		//FORMULARIO
		if(banco_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(banco_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(banco_control);	
		//COMBOS FK
		if(banco_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(banco_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(banco_control) {
		
		if(banco_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(banco_control);
		}
		
		if(banco_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(banco_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(banco_control) {
		if(banco_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("bancoReturnGeneral",JSON.stringify(banco_control.bancoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(banco_control) {
		if(banco_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && banco_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(banco_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(banco_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(banco_control, mostrar) {
		
		if(mostrar==true) {
			banco_funcion1.resaltarRestaurarDivsPagina(false,"banco");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				banco_funcion1.resaltarRestaurarDivMantenimiento(false,"banco");
			}			
			
			banco_funcion1.mostrarDivMensaje(true,banco_control.strAuxiliarMensaje,banco_control.strAuxiliarCssMensaje);
		
		} else {
			banco_funcion1.mostrarDivMensaje(false,banco_control.strAuxiliarMensaje,banco_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(banco_control) {
		if(banco_funcion1.esPaginaForm(banco_constante1)==true) {
			window.opener.banco_webcontrol1.actualizarPaginaTablaDatos(banco_control);
		} else {
			this.actualizarPaginaTablaDatos(banco_control);
		}
	}
	
	actualizarPaginaAbrirLink(banco_control) {
		banco_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(banco_control.strAuxiliarUrlPagina);
				
		banco_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(banco_control.strAuxiliarTipo,banco_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(banco_control) {
		banco_funcion1.resaltarRestaurarDivMensaje(true,banco_control.strAuxiliarMensajeAlert,banco_control.strAuxiliarCssMensaje);
			
		if(banco_funcion1.esPaginaForm(banco_constante1)==true) {
			window.opener.banco_funcion1.resaltarRestaurarDivMensaje(true,banco_control.strAuxiliarMensajeAlert,banco_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(banco_control) {
		this.banco_controlInicial=banco_control;
			
		if(banco_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(banco_control.strStyleDivArbol,banco_control.strStyleDivContent
																,banco_control.strStyleDivOpcionesBanner,banco_control.strStyleDivExpandirColapsar
																,banco_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(banco_control) {
		this.actualizarCssBotonesPagina(banco_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(banco_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(banco_control.tiposReportes,banco_control.tiposReporte
															 	,banco_control.tiposPaginacion,banco_control.tiposAcciones
																,banco_control.tiposColumnasSelect,banco_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(banco_control.tiposRelaciones,banco_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(banco_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(banco_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(banco_control);			
	}
	
	actualizarPaginaUsuarioInvitado(banco_control) {
	
		var indexPosition=banco_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=banco_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(banco_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(banco_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",banco_control.strRecargarFkTipos,",")) { 
				banco_webcontrol1.cargarCombosempresasFK(banco_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(banco_control.strRecargarFkTiposNinguno!=null && banco_control.strRecargarFkTiposNinguno!='NINGUNO' && banco_control.strRecargarFkTiposNinguno!='') {
			
				if(banco_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",banco_control.strRecargarFkTiposNinguno,",")) { 
					banco_webcontrol1.cargarCombosempresasFK(banco_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(banco_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,banco_funcion1,banco_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(banco_control) {
		jQuery("#tdbancoNuevo").css("display",banco_control.strPermisoNuevo);
		jQuery("#trbancoElementos").css("display",banco_control.strVisibleTablaElementos);
		jQuery("#trbancoAcciones").css("display",banco_control.strVisibleTablaAcciones);
		jQuery("#trbancoParametrosAcciones").css("display",banco_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(banco_control) {
	
		this.actualizarCssBotonesMantenimiento(banco_control);
				
		if(banco_control.bancoActual!=null) {//form
			
			this.actualizarCamposFormulario(banco_control);			
		}
						
		this.actualizarSpanMensajesCampos(banco_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(banco_control) {
	
		jQuery("#form"+banco_constante1.STR_SUFIJO+"-id").val(banco_control.bancoActual.id);
		jQuery("#form"+banco_constante1.STR_SUFIJO+"-created_at").val(banco_control.bancoActual.versionRow);
		jQuery("#form"+banco_constante1.STR_SUFIJO+"-updated_at").val(banco_control.bancoActual.versionRow);
		
		if(banco_control.bancoActual.id_empresa!=null && banco_control.bancoActual.id_empresa>-1){
			if(jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").val() != banco_control.bancoActual.id_empresa) {
				jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").val(banco_control.bancoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").select2("val", null);
			if(jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+banco_constante1.STR_SUFIJO+"-codigo").val(banco_control.bancoActual.codigo);
		jQuery("#form"+banco_constante1.STR_SUFIJO+"-nombre").val(banco_control.bancoActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+banco_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("banco","cuentascorrientes","","form_banco",formulario,"","",paraEventoTabla,idFilaTabla,banco_funcion1,banco_webcontrol1,banco_constante1);
	}
	
	actualizarSpanMensajesCampos(banco_control) {
		jQuery("#spanstrMensajeid").text(banco_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(banco_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(banco_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_empresa").text(banco_control.strMensajeid_empresa);		
		jQuery("#spanstrMensajecodigo").text(banco_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(banco_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(banco_control) {
		jQuery("#tdbtnNuevobanco").css("visibility",banco_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevobanco").css("display",banco_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarbanco").css("visibility",banco_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarbanco").css("display",banco_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarbanco").css("visibility",banco_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarbanco").css("display",banco_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarbanco").css("visibility",banco_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosbanco").css("visibility",banco_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosbanco").css("display",banco_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarbanco").css("visibility",banco_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarbanco").css("visibility",banco_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarbanco").css("visibility",banco_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(banco_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+banco_constante1.STR_SUFIJO+"-id_empresa",banco_control.empresasFK);

		if(banco_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+banco_control.idFilaTablaActual+"_3",banco_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(banco_control) {

	};

	
	
	setDefectoValorCombosempresasFK(banco_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(banco_control.idempresaDefaultFK>-1 && jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").val() != banco_control.idempresaDefaultFK) {
				jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa").val(banco_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//banco_control
		
	
	}
	
	onLoadCombosDefectoFK(banco_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(banco_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(banco_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",banco_control.strRecargarFkTipos,",")) { 
				banco_webcontrol1.setDefectoValorCombosempresasFK(banco_control);
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
	onLoadCombosEventosFK(banco_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(banco_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(banco_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",banco_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				banco_webcontrol1.registrarComboActionChangeCombosempresasFK(banco_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(banco_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(banco_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(banco_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(banco_constante1.BIT_ES_PAGINA_FORM==true) {
				banco_funcion1.validarFormularioJQuery(banco_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("banco");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("banco");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(banco_funcion1,banco_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(banco_funcion1,banco_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(banco_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,"banco");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",banco_funcion1,banco_webcontrol1,banco_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+banco_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				banco_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("banco");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(banco_control) {
		
		
		
		if(banco_control.strPermisoActualizar!=null) {
			jQuery("#tdbancoActualizarToolBar").css("display",banco_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdbancoEliminarToolBar").css("display",banco_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trbancoElementos").css("display",banco_control.strVisibleTablaElementos);
		
		jQuery("#trbancoAcciones").css("display",banco_control.strVisibleTablaAcciones);
		jQuery("#trbancoParametrosAcciones").css("display",banco_control.strVisibleTablaAcciones);
		
		jQuery("#tdbancoCerrarPagina").css("display",banco_control.strPermisoPopup);		
		jQuery("#tdbancoCerrarPaginaToolBar").css("display",banco_control.strPermisoPopup);
		//jQuery("#trbancoAccionesRelaciones").css("display",banco_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=banco_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + banco_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + banco_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Bancos";
		sTituloBanner+=" - " + banco_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + banco_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdbancoRelacionesToolBar").css("display",banco_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosbanco").css("display",banco_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		banco_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		banco_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		banco_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		banco_webcontrol1.registrarEventosControles();
		
		if(banco_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(banco_constante1.STR_ES_RELACIONADO=="false") {
			banco_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(banco_constante1.STR_ES_RELACIONES=="true") {
			if(banco_constante1.BIT_ES_PAGINA_FORM==true) {
				banco_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(banco_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(banco_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(banco_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(banco_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
						//banco_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(banco_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(banco_constante1.BIG_ID_ACTUAL,"banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);
						//banco_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			banco_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("banco","cuentascorrientes","",banco_funcion1,banco_webcontrol1,banco_constante1);	
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

var banco_webcontrol1 = new banco_webcontrol();

//Para ser llamado desde otro archivo (import)
export {banco_webcontrol,banco_webcontrol1};

//Para ser llamado desde window.opener
window.banco_webcontrol1 = banco_webcontrol1;


if(banco_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = banco_webcontrol1.onLoadWindow; 
}

//</script>