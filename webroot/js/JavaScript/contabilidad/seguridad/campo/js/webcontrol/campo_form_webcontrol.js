//<script type="text/javascript" language="javascript">



//var campoJQueryPaginaWebInteraccion= function (campo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {campo_constante,campo_constante1} from '../util/campo_constante.js';

import {campo_funcion,campo_funcion1} from '../util/campo_form_funcion.js';


class campo_webcontrol extends GeneralEntityWebControl {
	
	campo_control=null;
	campo_controlInicial=null;
	campo_controlAuxiliar=null;
		
	//if(campo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(campo_control) {
		super();
		
		this.campo_control=campo_control;
	}
		
	actualizarVariablesPagina(campo_control) {
		
		if(campo_control.action=="index" || campo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(campo_control);
			
		} 
		
		
		
	
		else if(campo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(campo_control);	
		
		} else if(campo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(campo_control);		
		}
	
		else if(campo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(campo_control);		
		}
	
		else if(campo_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(campo_control);
		}
		
		
		else if(campo_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(campo_control);
		
		} else if(campo_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(campo_control);
		
		} else if(campo_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(campo_control);
		
		} else if(campo_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(campo_control);
		
		} else if(campo_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(campo_control);
		
		} else if(campo_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(campo_control);		
		
		} else if(campo_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(campo_control);		
		
		} 
		//else if(campo_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(campo_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + campo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(campo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(campo_control) {
		this.actualizarPaginaAccionesGenerales(campo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(campo_control) {
		
		this.actualizarPaginaCargaGeneral(campo_control);
		this.actualizarPaginaOrderBy(campo_control);
		this.actualizarPaginaTablaDatos(campo_control);
		this.actualizarPaginaCargaGeneralControles(campo_control);
		//this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(campo_control);
		this.actualizarPaginaAreaBusquedas(campo_control);
		this.actualizarPaginaCargaCombosFK(campo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(campo_control) {
		//this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(campo_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(campo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(campo_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(campo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(campo_control);		
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(campo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(campo_control);		
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(campo_control) {
		this.actualizarPaginaTablaDatosAuxiliar(campo_control);		
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(campo_control) {
		this.actualizarPaginaCargaGeneralControles(campo_control);
		this.actualizarPaginaCargaCombosFK(campo_control);
		this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(campo_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(campo_control) {
		this.actualizarPaginaCargaGeneralControles(campo_control);
		this.actualizarPaginaCargaCombosFK(campo_control);
		this.actualizarPaginaFormulario(campo_control);
		this.onLoadCombosDefectoFK(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(campo_control) {
		//FORMULARIO
		if(campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(campo_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(campo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		
		//COMBOS FK
		if(campo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(campo_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(campo_control) {
		//FORMULARIO
		if(campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(campo_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(campo_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);	
		
		//COMBOS FK
		if(campo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(campo_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(campo_control) {
		//FORMULARIO
		if(campo_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(campo_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);	
		//COMBOS FK
		if(campo_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(campo_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(campo_control) {
		
		if(campo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(campo_control);
		}
		
		if(campo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(campo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(campo_control) {
		if(campo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("campoReturnGeneral",JSON.stringify(campo_control.campoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(campo_control) {
		if(campo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && campo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(campo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(campo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(campo_control, mostrar) {
		
		if(mostrar==true) {
			campo_funcion1.resaltarRestaurarDivsPagina(false,"campo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				campo_funcion1.resaltarRestaurarDivMantenimiento(false,"campo");
			}			
			
			campo_funcion1.mostrarDivMensaje(true,campo_control.strAuxiliarMensaje,campo_control.strAuxiliarCssMensaje);
		
		} else {
			campo_funcion1.mostrarDivMensaje(false,campo_control.strAuxiliarMensaje,campo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(campo_control) {
		if(campo_funcion1.esPaginaForm(campo_constante1)==true) {
			window.opener.campo_webcontrol1.actualizarPaginaTablaDatos(campo_control);
		} else {
			this.actualizarPaginaTablaDatos(campo_control);
		}
	}
	
	actualizarPaginaAbrirLink(campo_control) {
		campo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(campo_control.strAuxiliarUrlPagina);
				
		campo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(campo_control.strAuxiliarTipo,campo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(campo_control) {
		campo_funcion1.resaltarRestaurarDivMensaje(true,campo_control.strAuxiliarMensajeAlert,campo_control.strAuxiliarCssMensaje);
			
		if(campo_funcion1.esPaginaForm(campo_constante1)==true) {
			window.opener.campo_funcion1.resaltarRestaurarDivMensaje(true,campo_control.strAuxiliarMensajeAlert,campo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(campo_control) {
		this.campo_controlInicial=campo_control;
			
		if(campo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(campo_control.strStyleDivArbol,campo_control.strStyleDivContent
																,campo_control.strStyleDivOpcionesBanner,campo_control.strStyleDivExpandirColapsar
																,campo_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(campo_control) {
		this.actualizarCssBotonesPagina(campo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(campo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(campo_control.tiposReportes,campo_control.tiposReporte
															 	,campo_control.tiposPaginacion,campo_control.tiposAcciones
																,campo_control.tiposColumnasSelect,campo_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(campo_control.tiposRelaciones,campo_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(campo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(campo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(campo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(campo_control) {
	
		var indexPosition=campo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=campo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(campo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",campo_control.strRecargarFkTipos,",")) { 
				campo_webcontrol1.cargarCombosopcionsFK(campo_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(campo_control.strRecargarFkTiposNinguno!=null && campo_control.strRecargarFkTiposNinguno!='NINGUNO' && campo_control.strRecargarFkTiposNinguno!='') {
			
				if(campo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_opcion",campo_control.strRecargarFkTiposNinguno,",")) { 
					campo_webcontrol1.cargarCombosopcionsFK(campo_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaopcionFK(campo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,campo_funcion1,campo_control.opcionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(campo_control) {
		jQuery("#tdcampoNuevo").css("display",campo_control.strPermisoNuevo);
		jQuery("#trcampoElementos").css("display",campo_control.strVisibleTablaElementos);
		jQuery("#trcampoAcciones").css("display",campo_control.strVisibleTablaAcciones);
		jQuery("#trcampoParametrosAcciones").css("display",campo_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(campo_control) {
	
		this.actualizarCssBotonesMantenimiento(campo_control);
				
		if(campo_control.campoActual!=null) {//form
			
			this.actualizarCamposFormulario(campo_control);			
		}
						
		this.actualizarSpanMensajesCampos(campo_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(campo_control) {
	
		jQuery("#form"+campo_constante1.STR_SUFIJO+"-id").val(campo_control.campoActual.id);
		jQuery("#form"+campo_constante1.STR_SUFIJO+"-created_at").val(campo_control.campoActual.versionRow);
		jQuery("#form"+campo_constante1.STR_SUFIJO+"-updated_at").val(campo_control.campoActual.versionRow);
		
		if(campo_control.campoActual.id_opcion!=null && campo_control.campoActual.id_opcion>-1){
			if(jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").val() != campo_control.campoActual.id_opcion) {
				jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").val(campo_control.campoActual.id_opcion).trigger("change");
			}
		} else { 
			//jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").select2("val", null);
			if(jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+campo_constante1.STR_SUFIJO+"-codigo").val(campo_control.campoActual.codigo);
		jQuery("#form"+campo_constante1.STR_SUFIJO+"-nombre").val(campo_control.campoActual.nombre);
		jQuery("#form"+campo_constante1.STR_SUFIJO+"-descripcion").val(campo_control.campoActual.descripcion);
		jQuery("#form"+campo_constante1.STR_SUFIJO+"-estado").prop('checked',campo_control.campoActual.estado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+campo_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("campo","seguridad","","form_campo",formulario,"","",paraEventoTabla,idFilaTabla,campo_funcion1,campo_webcontrol1,campo_constante1);
	}
	
	actualizarSpanMensajesCampos(campo_control) {
		jQuery("#spanstrMensajeid").text(campo_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(campo_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(campo_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_opcion").text(campo_control.strMensajeid_opcion);		
		jQuery("#spanstrMensajecodigo").text(campo_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(campo_control.strMensajenombre);		
		jQuery("#spanstrMensajedescripcion").text(campo_control.strMensajedescripcion);		
		jQuery("#spanstrMensajeestado").text(campo_control.strMensajeestado);		
	}
	
	actualizarCssBotonesMantenimiento(campo_control) {
		jQuery("#tdbtnNuevocampo").css("visibility",campo_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocampo").css("display",campo_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcampo").css("visibility",campo_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcampo").css("display",campo_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcampo").css("visibility",campo_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcampo").css("display",campo_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcampo").css("visibility",campo_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscampo").css("visibility",campo_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscampo").css("display",campo_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcampo").css("visibility",campo_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcampo").css("visibility",campo_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcampo").css("visibility",campo_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosopcionsFK(campo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+campo_constante1.STR_SUFIJO+"-id_opcion",campo_control.opcionsFK);

		if(campo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+campo_control.idFilaTablaActual+"_3",campo_control.opcionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+campo_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion",campo_control.opcionsFK);

	};

	
	
	registrarComboActionChangeCombosopcionsFK(campo_control) {

	};

	
	
	setDefectoValorCombosopcionsFK(campo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(campo_control.idopcionDefaultFK>-1 && jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").val() != campo_control.idopcionDefaultFK) {
				jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").val(campo_control.idopcionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+campo_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(campo_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+campo_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+campo_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//campo_control
		
	
	}
	
	onLoadCombosDefectoFK(campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",campo_control.strRecargarFkTipos,",")) { 
				campo_webcontrol1.setDefectoValorCombosopcionsFK(campo_control);
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
	onLoadCombosEventosFK(campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",campo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				campo_webcontrol1.registrarComboActionChangeCombosopcionsFK(campo_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(campo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("campo","seguridad","",campo_funcion1,campo_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(campo_constante1.BIT_ES_PAGINA_FORM==true) {
				campo_funcion1.validarFormularioJQuery(campo_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("campo");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("campo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(campo_funcion1,campo_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(campo_funcion1,campo_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(campo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("campo","seguridad","",campo_funcion1,campo_webcontrol1,"campo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("opcion","id_opcion","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion_img_busqueda").click(function(){
				campo_webcontrol1.abrirBusquedaParaopcion("id_opcion");
				//alert(jQuery('#form-id_opcion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("campo");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(campo_control) {
		
		
		
		if(campo_control.strPermisoActualizar!=null) {
			jQuery("#tdcampoActualizarToolBar").css("display",campo_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcampoEliminarToolBar").css("display",campo_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcampoElementos").css("display",campo_control.strVisibleTablaElementos);
		
		jQuery("#trcampoAcciones").css("display",campo_control.strVisibleTablaAcciones);
		jQuery("#trcampoParametrosAcciones").css("display",campo_control.strVisibleTablaAcciones);
		
		jQuery("#tdcampoCerrarPagina").css("display",campo_control.strPermisoPopup);		
		jQuery("#tdcampoCerrarPaginaToolBar").css("display",campo_control.strPermisoPopup);
		//jQuery("#trcampoAccionesRelaciones").css("display",campo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=campo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + campo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + campo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Campos";
		sTituloBanner+=" - " + campo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + campo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcampoRelacionesToolBar").css("display",campo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscampo").css("display",campo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("campo","seguridad","",campo_funcion1,campo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		campo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		campo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		campo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		campo_webcontrol1.registrarEventosControles();
		
		if(campo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(campo_constante1.STR_ES_RELACIONADO=="false") {
			campo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(campo_constante1.STR_ES_RELACIONES=="true") {
			if(campo_constante1.BIT_ES_PAGINA_FORM==true) {
				campo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(campo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(campo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(campo_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(campo_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
						//campo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(campo_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(campo_constante1.BIG_ID_ACTUAL,"campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
						//campo_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			campo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);	
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

var campo_webcontrol1 = new campo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {campo_webcontrol,campo_webcontrol1};

//Para ser llamado desde window.opener
window.campo_webcontrol1 = campo_webcontrol1;


if(campo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = campo_webcontrol1.onLoadWindow; 
}

//</script>