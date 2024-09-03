//<script type="text/javascript" language="javascript">



//var propiedad_empresaJQueryPaginaWebInteraccion= function (propiedad_empresa_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {propiedad_empresa_constante,propiedad_empresa_constante1} from '../util/propiedad_empresa_constante.js';

import {propiedad_empresa_funcion,propiedad_empresa_funcion1} from '../util/propiedad_empresa_form_funcion.js';


class propiedad_empresa_webcontrol extends GeneralEntityWebControl {
	
	propiedad_empresa_control=null;
	propiedad_empresa_controlInicial=null;
	propiedad_empresa_controlAuxiliar=null;
		
	//if(propiedad_empresa_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(propiedad_empresa_control) {
		super();
		
		this.propiedad_empresa_control=propiedad_empresa_control;
	}
		
	actualizarVariablesPagina(propiedad_empresa_control) {
		
		if(propiedad_empresa_control.action=="index" || propiedad_empresa_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(propiedad_empresa_control);
			
		} 
		
		
		
	
		else if(propiedad_empresa_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(propiedad_empresa_control);	
		
		} else if(propiedad_empresa_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(propiedad_empresa_control);		
		}
	
	
		
		
		else if(propiedad_empresa_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(propiedad_empresa_control);		
		
		} else if(propiedad_empresa_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(propiedad_empresa_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + propiedad_empresa_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(propiedad_empresa_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(propiedad_empresa_control) {
		this.actualizarPaginaAccionesGenerales(propiedad_empresa_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(propiedad_empresa_control) {
		
		this.actualizarPaginaCargaGeneral(propiedad_empresa_control);
		this.actualizarPaginaOrderBy(propiedad_empresa_control);
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);
		this.actualizarPaginaCargaGeneralControles(propiedad_empresa_control);
		//this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(propiedad_empresa_control);
		this.actualizarPaginaAreaBusquedas(propiedad_empresa_control);
		this.actualizarPaginaCargaCombosFK(propiedad_empresa_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(propiedad_empresa_control) {
		//this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(propiedad_empresa_control) {
		
	}
	
	



	actualizarVariablesPaginaAccionNuevo(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatosAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatosAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatosAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(propiedad_empresa_control) {
		this.actualizarPaginaCargaGeneralControles(propiedad_empresa_control);
		this.actualizarPaginaCargaCombosFK(propiedad_empresa_control);
		this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(propiedad_empresa_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(propiedad_empresa_control) {
		this.actualizarPaginaCargaGeneralControles(propiedad_empresa_control);
		this.actualizarPaginaCargaCombosFK(propiedad_empresa_control);
		this.actualizarPaginaFormulario(propiedad_empresa_control);
		this.onLoadCombosDefectoFK(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(propiedad_empresa_control) {
		//FORMULARIO
		if(propiedad_empresa_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(propiedad_empresa_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(propiedad_empresa_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		
		//COMBOS FK
		if(propiedad_empresa_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(propiedad_empresa_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(propiedad_empresa_control) {
		//FORMULARIO
		if(propiedad_empresa_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(propiedad_empresa_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);	
		//COMBOS FK
		if(propiedad_empresa_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(propiedad_empresa_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(propiedad_empresa_control) {
		
		if(propiedad_empresa_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(propiedad_empresa_control);
		}
		
		if(propiedad_empresa_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(propiedad_empresa_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(propiedad_empresa_control) {
		if(propiedad_empresa_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("propiedad_empresaReturnGeneral",JSON.stringify(propiedad_empresa_control.propiedad_empresaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control) {
		if(propiedad_empresa_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && propiedad_empresa_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(propiedad_empresa_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(propiedad_empresa_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(propiedad_empresa_control, mostrar) {
		
		if(mostrar==true) {
			propiedad_empresa_funcion1.resaltarRestaurarDivsPagina(false,"propiedad_empresa");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				propiedad_empresa_funcion1.resaltarRestaurarDivMantenimiento(false,"propiedad_empresa");
			}			
			
			propiedad_empresa_funcion1.mostrarDivMensaje(true,propiedad_empresa_control.strAuxiliarMensaje,propiedad_empresa_control.strAuxiliarCssMensaje);
		
		} else {
			propiedad_empresa_funcion1.mostrarDivMensaje(false,propiedad_empresa_control.strAuxiliarMensaje,propiedad_empresa_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(propiedad_empresa_control) {
		if(propiedad_empresa_funcion1.esPaginaForm(propiedad_empresa_constante1)==true) {
			window.opener.propiedad_empresa_webcontrol1.actualizarPaginaTablaDatos(propiedad_empresa_control);
		} else {
			this.actualizarPaginaTablaDatos(propiedad_empresa_control);
		}
	}
	
	actualizarPaginaAbrirLink(propiedad_empresa_control) {
		propiedad_empresa_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(propiedad_empresa_control.strAuxiliarUrlPagina);
				
		propiedad_empresa_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(propiedad_empresa_control.strAuxiliarTipo,propiedad_empresa_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(propiedad_empresa_control) {
		propiedad_empresa_funcion1.resaltarRestaurarDivMensaje(true,propiedad_empresa_control.strAuxiliarMensajeAlert,propiedad_empresa_control.strAuxiliarCssMensaje);
			
		if(propiedad_empresa_funcion1.esPaginaForm(propiedad_empresa_constante1)==true) {
			window.opener.propiedad_empresa_funcion1.resaltarRestaurarDivMensaje(true,propiedad_empresa_control.strAuxiliarMensajeAlert,propiedad_empresa_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(propiedad_empresa_control) {
		this.propiedad_empresa_controlInicial=propiedad_empresa_control;
			
		if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(propiedad_empresa_control.strStyleDivArbol,propiedad_empresa_control.strStyleDivContent
																,propiedad_empresa_control.strStyleDivOpcionesBanner,propiedad_empresa_control.strStyleDivExpandirColapsar
																,propiedad_empresa_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(propiedad_empresa_control) {
		this.actualizarCssBotonesPagina(propiedad_empresa_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(propiedad_empresa_control.tiposReportes,propiedad_empresa_control.tiposReporte
															 	,propiedad_empresa_control.tiposPaginacion,propiedad_empresa_control.tiposAcciones
																,propiedad_empresa_control.tiposColumnasSelect,propiedad_empresa_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(propiedad_empresa_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(propiedad_empresa_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(propiedad_empresa_control);			
	}
	
	actualizarPaginaUsuarioInvitado(propiedad_empresa_control) {
	
		var indexPosition=propiedad_empresa_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=propiedad_empresa_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(propiedad_empresa_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(propiedad_empresa_control.strRecargarFkTiposNinguno!=null && propiedad_empresa_control.strRecargarFkTiposNinguno!='NINGUNO' && propiedad_empresa_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(propiedad_empresa_control) {
		jQuery("#tdpropiedad_empresaNuevo").css("display",propiedad_empresa_control.strPermisoNuevo);
		jQuery("#trpropiedad_empresaElementos").css("display",propiedad_empresa_control.strVisibleTablaElementos);
		jQuery("#trpropiedad_empresaAcciones").css("display",propiedad_empresa_control.strVisibleTablaAcciones);
		jQuery("#trpropiedad_empresaParametrosAcciones").css("display",propiedad_empresa_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(propiedad_empresa_control) {
	
		this.actualizarCssBotonesMantenimiento(propiedad_empresa_control);
				
		if(propiedad_empresa_control.propiedad_empresaActual!=null) {//form
			
			this.actualizarCamposFormulario(propiedad_empresa_control);			
		}
						
		this.actualizarSpanMensajesCampos(propiedad_empresa_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(propiedad_empresa_control) {
	
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-id").val(propiedad_empresa_control.propiedad_empresaActual.id);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-created_at").val(propiedad_empresa_control.propiedad_empresaActual.versionRow);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-updated_at").val(propiedad_empresa_control.propiedad_empresaActual.versionRow);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-nombre_empresa").val(propiedad_empresa_control.propiedad_empresaActual.nombre_empresa);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-calle_1").val(propiedad_empresa_control.propiedad_empresaActual.calle_1);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-calle_2").val(propiedad_empresa_control.propiedad_empresaActual.calle_2);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-calle_3").val(propiedad_empresa_control.propiedad_empresaActual.calle_3);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-barrio").val(propiedad_empresa_control.propiedad_empresaActual.barrio);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-ciudad").val(propiedad_empresa_control.propiedad_empresaActual.ciudad);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-estado").val(propiedad_empresa_control.propiedad_empresaActual.estado);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-codigo_postal").val(propiedad_empresa_control.propiedad_empresaActual.codigo_postal);
		jQuery("#form"+propiedad_empresa_constante1.STR_SUFIJO+"-codigo_pais").val(propiedad_empresa_control.propiedad_empresaActual.codigo_pais);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+propiedad_empresa_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("propiedad_empresa","general","","form_propiedad_empresa",formulario,"","",paraEventoTabla,idFilaTabla,propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
	}
	
	actualizarSpanMensajesCampos(propiedad_empresa_control) {
		jQuery("#spanstrMensajeid").text(propiedad_empresa_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(propiedad_empresa_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(propiedad_empresa_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajenombre_empresa").text(propiedad_empresa_control.strMensajenombre_empresa);		
		jQuery("#spanstrMensajecalle_1").text(propiedad_empresa_control.strMensajecalle_1);		
		jQuery("#spanstrMensajecalle_2").text(propiedad_empresa_control.strMensajecalle_2);		
		jQuery("#spanstrMensajecalle_3").text(propiedad_empresa_control.strMensajecalle_3);		
		jQuery("#spanstrMensajebarrio").text(propiedad_empresa_control.strMensajebarrio);		
		jQuery("#spanstrMensajeciudad").text(propiedad_empresa_control.strMensajeciudad);		
		jQuery("#spanstrMensajeestado").text(propiedad_empresa_control.strMensajeestado);		
		jQuery("#spanstrMensajecodigo_postal").text(propiedad_empresa_control.strMensajecodigo_postal);		
		jQuery("#spanstrMensajecodigo_pais").text(propiedad_empresa_control.strMensajecodigo_pais);		
	}
	
	actualizarCssBotonesMantenimiento(propiedad_empresa_control) {
		jQuery("#tdbtnNuevopropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevopropiedad_empresa").css("display",propiedad_empresa_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarpropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarpropiedad_empresa").css("display",propiedad_empresa_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarpropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarpropiedad_empresa").css("display",propiedad_empresa_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarpropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambiospropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambiospropiedad_empresa").css("display",propiedad_empresa_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarpropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarpropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarpropiedad_empresa").css("visibility",propiedad_empresa_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//propiedad_empresa_control
		
	
	}
	
	onLoadCombosDefectoFK(propiedad_empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(propiedad_empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(propiedad_empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(propiedad_empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(propiedad_empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(propiedad_empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(propiedad_empresa_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(propiedad_empresa_constante1.BIT_ES_PAGINA_FORM==true) {
				propiedad_empresa_funcion1.validarFormularioJQuery(propiedad_empresa_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("propiedad_empresa");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("propiedad_empresa");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,"propiedad_empresa");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(propiedad_empresa_control) {
		
		
		
		if(propiedad_empresa_control.strPermisoActualizar!=null) {
			jQuery("#tdpropiedad_empresaActualizarToolBar").css("display",propiedad_empresa_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdpropiedad_empresaEliminarToolBar").css("display",propiedad_empresa_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trpropiedad_empresaElementos").css("display",propiedad_empresa_control.strVisibleTablaElementos);
		
		jQuery("#trpropiedad_empresaAcciones").css("display",propiedad_empresa_control.strVisibleTablaAcciones);
		jQuery("#trpropiedad_empresaParametrosAcciones").css("display",propiedad_empresa_control.strVisibleTablaAcciones);
		
		jQuery("#tdpropiedad_empresaCerrarPagina").css("display",propiedad_empresa_control.strPermisoPopup);		
		jQuery("#tdpropiedad_empresaCerrarPaginaToolBar").css("display",propiedad_empresa_control.strPermisoPopup);
		//jQuery("#trpropiedad_empresaAccionesRelaciones").css("display",propiedad_empresa_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=propiedad_empresa_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + propiedad_empresa_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + propiedad_empresa_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Propiedades Empresas";
		sTituloBanner+=" - " + propiedad_empresa_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + propiedad_empresa_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdpropiedad_empresaRelacionesToolBar").css("display",propiedad_empresa_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultospropiedad_empresa").css("display",propiedad_empresa_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		propiedad_empresa_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		propiedad_empresa_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		propiedad_empresa_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		propiedad_empresa_webcontrol1.registrarEventosControles();
		
		if(propiedad_empresa_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="false") {
			propiedad_empresa_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(propiedad_empresa_constante1.STR_ES_RELACIONES=="true") {
			if(propiedad_empresa_constante1.BIT_ES_PAGINA_FORM==true) {
				propiedad_empresa_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(propiedad_empresa_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(propiedad_empresa_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(propiedad_empresa_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(propiedad_empresa_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
						//propiedad_empresa_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(propiedad_empresa_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(propiedad_empresa_constante1.BIG_ID_ACTUAL,"propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
						//propiedad_empresa_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			propiedad_empresa_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);	
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

var propiedad_empresa_webcontrol1 = new propiedad_empresa_webcontrol();

//Para ser llamado desde otro archivo (import)
export {propiedad_empresa_webcontrol,propiedad_empresa_webcontrol1};

//Para ser llamado desde window.opener
window.propiedad_empresa_webcontrol1 = propiedad_empresa_webcontrol1;


if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = propiedad_empresa_webcontrol1.onLoadWindow; 
}

//</script>