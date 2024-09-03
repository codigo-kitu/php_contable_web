//<script type="text/javascript" language="javascript">



//var ciudadJQueryPaginaWebInteraccion= function (ciudad_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {ciudad_constante,ciudad_constante1} from '../util/ciudad_constante.js';

import {ciudad_funcion,ciudad_funcion1} from '../util/ciudad_form_funcion.js';


class ciudad_webcontrol extends GeneralEntityWebControl {
	
	ciudad_control=null;
	ciudad_controlInicial=null;
	ciudad_controlAuxiliar=null;
		
	//if(ciudad_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(ciudad_control) {
		super();
		
		this.ciudad_control=ciudad_control;
	}
		
	actualizarVariablesPagina(ciudad_control) {
		
		if(ciudad_control.action=="index" || ciudad_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(ciudad_control);
			
		} 
		
		
		
	
		else if(ciudad_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(ciudad_control);	
		
		} else if(ciudad_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(ciudad_control);		
		}
	
		else if(ciudad_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(ciudad_control);		
		}
	
		else if(ciudad_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(ciudad_control);
		}
		
		
		else if(ciudad_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(ciudad_control);
		
		} else if(ciudad_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(ciudad_control);
		
		} else if(ciudad_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(ciudad_control);
		
		} else if(ciudad_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(ciudad_control);
		
		} else if(ciudad_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(ciudad_control);
		
		} else if(ciudad_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(ciudad_control);		
		
		} else if(ciudad_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(ciudad_control);		
		
		} 
		//else if(ciudad_control.action=="recargarFormularioGeneralFk") {
		//	this.actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(ciudad_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + ciudad_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(ciudad_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(ciudad_control) {
		this.actualizarPaginaAccionesGenerales(ciudad_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(ciudad_control) {
		
		this.actualizarPaginaCargaGeneral(ciudad_control);
		this.actualizarPaginaOrderBy(ciudad_control);
		this.actualizarPaginaTablaDatos(ciudad_control);
		this.actualizarPaginaCargaGeneralControles(ciudad_control);
		//this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(ciudad_control);
		this.actualizarPaginaAreaBusquedas(ciudad_control);
		this.actualizarPaginaCargaCombosFK(ciudad_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(ciudad_control) {
		//this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(ciudad_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(ciudad_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(ciudad_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(ciudad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(ciudad_control);		
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(ciudad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(ciudad_control);		
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(ciudad_control) {
		this.actualizarPaginaTablaDatosAuxiliar(ciudad_control);		
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(ciudad_control) {
		this.actualizarPaginaCargaGeneralControles(ciudad_control);
		this.actualizarPaginaCargaCombosFK(ciudad_control);
		this.actualizarPaginaFormulario(ciudad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(ciudad_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(ciudad_control) {
		this.actualizarPaginaCargaGeneralControles(ciudad_control);
		this.actualizarPaginaCargaCombosFK(ciudad_control);
		this.actualizarPaginaFormulario(ciudad_control);
		this.onLoadCombosDefectoFK(ciudad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		this.actualizarPaginaAreaMantenimiento(ciudad_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(ciudad_control) {
		//FORMULARIO
		if(ciudad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(ciudad_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(ciudad_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);		
		
		//COMBOS FK
		if(ciudad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(ciudad_control);
		}
	}
	
	/*
	actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(ciudad_control) {
		//FORMULARIO
		if(ciudad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(ciudad_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(ciudad_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);	
		
		//COMBOS FK
		if(ciudad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(ciudad_control);
		}
	}
	*/
	
	actualizarVariablesPaginaAccionManejarEventos(ciudad_control) {
		//FORMULARIO
		if(ciudad_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(ciudad_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(ciudad_control);	
		//COMBOS FK
		if(ciudad_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(ciudad_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(ciudad_control) {
		
		if(ciudad_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(ciudad_control);
		}
		
		if(ciudad_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(ciudad_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(ciudad_control) {
		if(ciudad_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("ciudadReturnGeneral",JSON.stringify(ciudad_control.ciudadReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(ciudad_control) {
		if(ciudad_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && ciudad_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(ciudad_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(ciudad_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(ciudad_control, mostrar) {
		
		if(mostrar==true) {
			ciudad_funcion1.resaltarRestaurarDivsPagina(false,"ciudad");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				ciudad_funcion1.resaltarRestaurarDivMantenimiento(false,"ciudad");
			}			
			
			ciudad_funcion1.mostrarDivMensaje(true,ciudad_control.strAuxiliarMensaje,ciudad_control.strAuxiliarCssMensaje);
		
		} else {
			ciudad_funcion1.mostrarDivMensaje(false,ciudad_control.strAuxiliarMensaje,ciudad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(ciudad_control) {
		if(ciudad_funcion1.esPaginaForm(ciudad_constante1)==true) {
			window.opener.ciudad_webcontrol1.actualizarPaginaTablaDatos(ciudad_control);
		} else {
			this.actualizarPaginaTablaDatos(ciudad_control);
		}
	}
	
	actualizarPaginaAbrirLink(ciudad_control) {
		ciudad_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(ciudad_control.strAuxiliarUrlPagina);
				
		ciudad_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(ciudad_control.strAuxiliarTipo,ciudad_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(ciudad_control) {
		ciudad_funcion1.resaltarRestaurarDivMensaje(true,ciudad_control.strAuxiliarMensajeAlert,ciudad_control.strAuxiliarCssMensaje);
			
		if(ciudad_funcion1.esPaginaForm(ciudad_constante1)==true) {
			window.opener.ciudad_funcion1.resaltarRestaurarDivMensaje(true,ciudad_control.strAuxiliarMensajeAlert,ciudad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(ciudad_control) {
		this.ciudad_controlInicial=ciudad_control;
			
		if(ciudad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(ciudad_control.strStyleDivArbol,ciudad_control.strStyleDivContent
																,ciudad_control.strStyleDivOpcionesBanner,ciudad_control.strStyleDivExpandirColapsar
																,ciudad_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(ciudad_control) {
		this.actualizarCssBotonesPagina(ciudad_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(ciudad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(ciudad_control.tiposReportes,ciudad_control.tiposReporte
															 	,ciudad_control.tiposPaginacion,ciudad_control.tiposAcciones
																,ciudad_control.tiposColumnasSelect,ciudad_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(ciudad_control.tiposRelaciones,ciudad_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(ciudad_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(ciudad_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(ciudad_control);			
	}
	
	actualizarPaginaUsuarioInvitado(ciudad_control) {
	
		var indexPosition=ciudad_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=ciudad_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(ciudad_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(ciudad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",ciudad_control.strRecargarFkTipos,",")) { 
				ciudad_webcontrol1.cargarCombosprovinciasFK(ciudad_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(ciudad_control.strRecargarFkTiposNinguno!=null && ciudad_control.strRecargarFkTiposNinguno!='NINGUNO' && ciudad_control.strRecargarFkTiposNinguno!='') {
			
				if(ciudad_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_provincia",ciudad_control.strRecargarFkTiposNinguno,",")) { 
					ciudad_webcontrol1.cargarCombosprovinciasFK(ciudad_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaprovinciaFK(ciudad_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,ciudad_funcion1,ciudad_control.provinciasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(ciudad_control) {
		jQuery("#tdciudadNuevo").css("display",ciudad_control.strPermisoNuevo);
		jQuery("#trciudadElementos").css("display",ciudad_control.strVisibleTablaElementos);
		jQuery("#trciudadAcciones").css("display",ciudad_control.strVisibleTablaAcciones);
		jQuery("#trciudadParametrosAcciones").css("display",ciudad_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(ciudad_control) {
	
		this.actualizarCssBotonesMantenimiento(ciudad_control);
				
		if(ciudad_control.ciudadActual!=null) {//form
			
			this.actualizarCamposFormulario(ciudad_control);			
		}
						
		this.actualizarSpanMensajesCampos(ciudad_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(ciudad_control) {
	
		jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id").val(ciudad_control.ciudadActual.id);
		jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-created_at").val(ciudad_control.ciudadActual.versionRow);
		jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-updated_at").val(ciudad_control.ciudadActual.versionRow);
		
		if(ciudad_control.ciudadActual.id_provincia!=null && ciudad_control.ciudadActual.id_provincia>-1){
			if(jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").val() != ciudad_control.ciudadActual.id_provincia) {
				jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").val(ciudad_control.ciudadActual.id_provincia).trigger("change");
			}
		} else { 
			//jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").select2("val", null);
			if(jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-codigo").val(ciudad_control.ciudadActual.codigo);
		jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-nombre").val(ciudad_control.ciudadActual.nombre);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+ciudad_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("ciudad","seguridad","","form_ciudad",formulario,"","",paraEventoTabla,idFilaTabla,ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
	}
	
	actualizarSpanMensajesCampos(ciudad_control) {
		jQuery("#spanstrMensajeid").text(ciudad_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(ciudad_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(ciudad_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajeid_provincia").text(ciudad_control.strMensajeid_provincia);		
		jQuery("#spanstrMensajecodigo").text(ciudad_control.strMensajecodigo);		
		jQuery("#spanstrMensajenombre").text(ciudad_control.strMensajenombre);		
	}
	
	actualizarCssBotonesMantenimiento(ciudad_control) {
		jQuery("#tdbtnNuevociudad").css("visibility",ciudad_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevociudad").css("display",ciudad_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarciudad").css("visibility",ciudad_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarciudad").css("display",ciudad_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarciudad").css("visibility",ciudad_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarciudad").css("display",ciudad_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarciudad").css("visibility",ciudad_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiosciudad").css("visibility",ciudad_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiosciudad").css("display",ciudad_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarciudad").css("visibility",ciudad_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarciudad").css("visibility",ciudad_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarciudad").css("visibility",ciudad_control.strVisibleCeldaCancelar);						
		//TOOLBAR FORMULARIO
	}	
	
	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosprovinciasFK(ciudad_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia",ciudad_control.provinciasFK);

		if(ciudad_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+ciudad_control.idFilaTablaActual+"_3",ciudad_control.provinciasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia",ciudad_control.provinciasFK);

	};

	
	
	registrarComboActionChangeCombosprovinciasFK(ciudad_control) {

	};

	
	
	setDefectoValorCombosprovinciasFK(ciudad_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(ciudad_control.idprovinciaDefaultFK>-1 && jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").val() != ciudad_control.idprovinciaDefaultFK) {
				jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia").val(ciudad_control.idprovinciaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(ciudad_control.idprovinciaDefaultForeignKey).trigger("change");
			if(jQuery("#"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+ciudad_constante1.STR_SUFIJO+"FK_Idprovincia-cmbid_provincia").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//ciudad_control
		
	
	}
	
	onLoadCombosDefectoFK(ciudad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ciudad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(ciudad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",ciudad_control.strRecargarFkTipos,",")) { 
				ciudad_webcontrol1.setDefectoValorCombosprovinciasFK(ciudad_control);
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
	onLoadCombosEventosFK(ciudad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ciudad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(ciudad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_provincia",ciudad_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				ciudad_webcontrol1.registrarComboActionChangeCombosprovinciasFK(ciudad_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(ciudad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(ciudad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(ciudad_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(ciudad_constante1.BIT_ES_PAGINA_FORM==true) {
				ciudad_funcion1.validarFormularioJQuery(ciudad_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("ciudad");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("ciudad");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(ciudad_funcion1,ciudad_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(ciudad_funcion1,ciudad_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(ciudad_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,"ciudad");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("provincia","id_provincia","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+ciudad_constante1.STR_SUFIJO+"-id_provincia_img_busqueda").click(function(){
				ciudad_webcontrol1.abrirBusquedaParaprovincia("id_provincia");
				//alert(jQuery('#form-id_provincia_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("ciudad");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(ciudad_control) {
		
		
		
		if(ciudad_control.strPermisoActualizar!=null) {
			jQuery("#tdciudadActualizarToolBar").css("display",ciudad_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdciudadEliminarToolBar").css("display",ciudad_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trciudadElementos").css("display",ciudad_control.strVisibleTablaElementos);
		
		jQuery("#trciudadAcciones").css("display",ciudad_control.strVisibleTablaAcciones);
		jQuery("#trciudadParametrosAcciones").css("display",ciudad_control.strVisibleTablaAcciones);
		
		jQuery("#tdciudadCerrarPagina").css("display",ciudad_control.strPermisoPopup);		
		jQuery("#tdciudadCerrarPaginaToolBar").css("display",ciudad_control.strPermisoPopup);
		//jQuery("#trciudadAccionesRelaciones").css("display",ciudad_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=ciudad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + ciudad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + ciudad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Ciudades";
		sTituloBanner+=" - " + ciudad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + ciudad_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdciudadRelacionesToolBar").css("display",ciudad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosciudad").css("display",ciudad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		ciudad_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		ciudad_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		ciudad_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		ciudad_webcontrol1.registrarEventosControles();
		
		if(ciudad_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(ciudad_constante1.STR_ES_RELACIONADO=="false") {
			ciudad_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(ciudad_constante1.STR_ES_RELACIONES=="true") {
			if(ciudad_constante1.BIT_ES_PAGINA_FORM==true) {
				ciudad_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(ciudad_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(ciudad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(ciudad_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(ciudad_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
						//ciudad_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(ciudad_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(ciudad_constante1.BIG_ID_ACTUAL,"ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);
						//ciudad_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			ciudad_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("ciudad","seguridad","",ciudad_funcion1,ciudad_webcontrol1,ciudad_constante1);	
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

var ciudad_webcontrol1 = new ciudad_webcontrol();

//Para ser llamado desde otro archivo (import)
export {ciudad_webcontrol,ciudad_webcontrol1};

//Para ser llamado desde window.opener
window.ciudad_webcontrol1 = ciudad_webcontrol1;


if(ciudad_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = ciudad_webcontrol1.onLoadWindow; 
}

//</script>