//<script type="text/javascript" language="javascript">



//var categoria_clienteJQueryPaginaWebInteraccion= function (categoria_cliente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {categoria_cliente_constante,categoria_cliente_constante1} from '../util/categoria_cliente_constante.js';

import {categoria_cliente_funcion,categoria_cliente_funcion1} from '../util/categoria_cliente_form_funcion.js';


class categoria_cliente_webcontrol extends GeneralEntityWebControl {
	
	categoria_cliente_control=null;
	categoria_cliente_controlInicial=null;
	categoria_cliente_controlAuxiliar=null;
		
	//if(categoria_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(categoria_cliente_control) {
		super();
		
		this.categoria_cliente_control=categoria_cliente_control;
	}
		
	actualizarVariablesPagina(categoria_cliente_control) {
		
		if(categoria_cliente_control.action=="index" || categoria_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(categoria_cliente_control);
			
		} 
		
		
		
	
		else if(categoria_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(categoria_cliente_control);	
		
		} else if(categoria_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_cliente_control);		
		}
	
		else if(categoria_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(categoria_cliente_control);		
		}
	
		else if(categoria_cliente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_cliente_control);
		}
		
		
		else if(categoria_cliente_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(categoria_cliente_control);		
		
		} else if(categoria_cliente_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_cliente_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + categoria_cliente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(categoria_cliente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(categoria_cliente_control) {
		this.actualizarPaginaAccionesGenerales(categoria_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(categoria_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(categoria_cliente_control);
		this.actualizarPaginaOrderBy(categoria_cliente_control);
		this.actualizarPaginaTablaDatos(categoria_cliente_control);
		this.actualizarPaginaCargaGeneralControles(categoria_cliente_control);
		//this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(categoria_cliente_control);
		this.actualizarPaginaAreaBusquedas(categoria_cliente_control);
		this.actualizarPaginaCargaCombosFK(categoria_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(categoria_cliente_control) {
		//this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_cliente_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_cliente_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(categoria_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(categoria_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(categoria_cliente_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_cliente_control);
		this.actualizarPaginaCargaCombosFK(categoria_cliente_control);
		this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(categoria_cliente_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_cliente_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_cliente_control);
		this.actualizarPaginaCargaCombosFK(categoria_cliente_control);
		this.actualizarPaginaFormulario(categoria_cliente_control);
		this.onLoadCombosDefectoFK(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_cliente_control) {
		//FORMULARIO
		if(categoria_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_cliente_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(categoria_cliente_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		
		//COMBOS FK
		if(categoria_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_cliente_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(categoria_cliente_control) {
		//FORMULARIO
		if(categoria_cliente_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_cliente_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);	
		//COMBOS FK
		if(categoria_cliente_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_cliente_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(categoria_cliente_control) {
		
		if(categoria_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(categoria_cliente_control);
		}
		
		if(categoria_cliente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(categoria_cliente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(categoria_cliente_control) {
		if(categoria_cliente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("categoria_clienteReturnGeneral",JSON.stringify(categoria_cliente_control.categoria_clienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control) {
		if(categoria_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && categoria_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(categoria_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(categoria_cliente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(categoria_cliente_control, mostrar) {
		
		if(mostrar==true) {
			categoria_cliente_funcion1.resaltarRestaurarDivsPagina(false,"categoria_cliente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				categoria_cliente_funcion1.resaltarRestaurarDivMantenimiento(false,"categoria_cliente");
			}			
			
			categoria_cliente_funcion1.mostrarDivMensaje(true,categoria_cliente_control.strAuxiliarMensaje,categoria_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			categoria_cliente_funcion1.mostrarDivMensaje(false,categoria_cliente_control.strAuxiliarMensaje,categoria_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(categoria_cliente_control) {
		if(categoria_cliente_funcion1.esPaginaForm(categoria_cliente_constante1)==true) {
			window.opener.categoria_cliente_webcontrol1.actualizarPaginaTablaDatos(categoria_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(categoria_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(categoria_cliente_control) {
		categoria_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(categoria_cliente_control.strAuxiliarUrlPagina);
				
		categoria_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(categoria_cliente_control.strAuxiliarTipo,categoria_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(categoria_cliente_control) {
		categoria_cliente_funcion1.resaltarRestaurarDivMensaje(true,categoria_cliente_control.strAuxiliarMensajeAlert,categoria_cliente_control.strAuxiliarCssMensaje);
			
		if(categoria_cliente_funcion1.esPaginaForm(categoria_cliente_constante1)==true) {
			window.opener.categoria_cliente_funcion1.resaltarRestaurarDivMensaje(true,categoria_cliente_control.strAuxiliarMensajeAlert,categoria_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(categoria_cliente_control) {
		this.categoria_cliente_controlInicial=categoria_cliente_control;
			
		if(categoria_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(categoria_cliente_control.strStyleDivArbol,categoria_cliente_control.strStyleDivContent
																,categoria_cliente_control.strStyleDivOpcionesBanner,categoria_cliente_control.strStyleDivExpandirColapsar
																,categoria_cliente_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(categoria_cliente_control) {
		this.actualizarCssBotonesPagina(categoria_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(categoria_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(categoria_cliente_control.tiposReportes,categoria_cliente_control.tiposReporte
															 	,categoria_cliente_control.tiposPaginacion,categoria_cliente_control.tiposAcciones
																,categoria_cliente_control.tiposColumnasSelect,categoria_cliente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(categoria_cliente_control.tiposRelaciones,categoria_cliente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(categoria_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(categoria_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(categoria_cliente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(categoria_cliente_control) {
	
		var indexPosition=categoria_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=categoria_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(categoria_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(categoria_cliente_control.strRecargarFkTiposNinguno!=null && categoria_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && categoria_cliente_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(categoria_cliente_control) {
		jQuery("#tdcategoria_clienteNuevo").css("display",categoria_cliente_control.strPermisoNuevo);
		jQuery("#trcategoria_clienteElementos").css("display",categoria_cliente_control.strVisibleTablaElementos);
		jQuery("#trcategoria_clienteAcciones").css("display",categoria_cliente_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_clienteParametrosAcciones").css("display",categoria_cliente_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(categoria_cliente_control) {
	
		this.actualizarCssBotonesMantenimiento(categoria_cliente_control);
				
		if(categoria_cliente_control.categoria_clienteActual!=null) {//form
			
			this.actualizarCamposFormulario(categoria_cliente_control);			
		}
						
		this.actualizarSpanMensajesCampos(categoria_cliente_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(categoria_cliente_control) {
	
		jQuery("#form"+categoria_cliente_constante1.STR_SUFIJO+"-id").val(categoria_cliente_control.categoria_clienteActual.id);
		jQuery("#form"+categoria_cliente_constante1.STR_SUFIJO+"-created_at").val(categoria_cliente_control.categoria_clienteActual.versionRow);
		jQuery("#form"+categoria_cliente_constante1.STR_SUFIJO+"-updated_at").val(categoria_cliente_control.categoria_clienteActual.versionRow);
		jQuery("#form"+categoria_cliente_constante1.STR_SUFIJO+"-nombre").val(categoria_cliente_control.categoria_clienteActual.nombre);
		jQuery("#form"+categoria_cliente_constante1.STR_SUFIJO+"-predeterminado").prop('checked',categoria_cliente_control.categoria_clienteActual.predeterminado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+categoria_cliente_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("categoria_cliente","cuentascobrar","","form_categoria_cliente",formulario,"","",paraEventoTabla,idFilaTabla,categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
	}
	
	actualizarSpanMensajesCampos(categoria_cliente_control) {
		jQuery("#spanstrMensajeid").text(categoria_cliente_control.strMensajeid);		
		jQuery("#spanstrMensajecreated_at").text(categoria_cliente_control.strMensajecreated_at);		
		jQuery("#spanstrMensajeupdated_at").text(categoria_cliente_control.strMensajeupdated_at);		
		jQuery("#spanstrMensajenombre").text(categoria_cliente_control.strMensajenombre);		
		jQuery("#spanstrMensajepredeterminado").text(categoria_cliente_control.strMensajepredeterminado);		
	}
	
	actualizarCssBotonesMantenimiento(categoria_cliente_control) {
		jQuery("#tdbtnNuevocategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocategoria_cliente").css("display",categoria_cliente_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcategoria_cliente").css("display",categoria_cliente_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcategoria_cliente").css("display",categoria_cliente_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscategoria_cliente").css("display",categoria_cliente_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcategoria_cliente").css("visibility",categoria_cliente_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//categoria_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(categoria_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(categoria_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(categoria_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(categoria_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(categoria_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				categoria_cliente_funcion1.validarFormularioJQuery(categoria_cliente_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("categoria_cliente");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("categoria_cliente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(categoria_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,"categoria_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("categoria_cliente");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(categoria_cliente_control) {
		
		
		
		if(categoria_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdcategoria_clienteActualizarToolBar").css("display",categoria_cliente_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcategoria_clienteEliminarToolBar").css("display",categoria_cliente_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcategoria_clienteElementos").css("display",categoria_cliente_control.strVisibleTablaElementos);
		
		jQuery("#trcategoria_clienteAcciones").css("display",categoria_cliente_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_clienteParametrosAcciones").css("display",categoria_cliente_control.strVisibleTablaAcciones);
		
		jQuery("#tdcategoria_clienteCerrarPagina").css("display",categoria_cliente_control.strPermisoPopup);		
		jQuery("#tdcategoria_clienteCerrarPaginaToolBar").css("display",categoria_cliente_control.strPermisoPopup);
		//jQuery("#trcategoria_clienteAccionesRelaciones").css("display",categoria_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=categoria_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + categoria_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + categoria_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Categorias Clientes";
		sTituloBanner+=" - " + categoria_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + categoria_cliente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcategoria_clienteRelacionesToolBar").css("display",categoria_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscategoria_cliente").css("display",categoria_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		categoria_cliente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		categoria_cliente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		categoria_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		categoria_cliente_webcontrol1.registrarEventosControles();
		
		if(categoria_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(categoria_cliente_constante1.STR_ES_RELACIONADO=="false") {
			categoria_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(categoria_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(categoria_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				categoria_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(categoria_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(categoria_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(categoria_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(categoria_cliente_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
						//categoria_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(categoria_cliente_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(categoria_cliente_constante1.BIG_ID_ACTUAL,"categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
						//categoria_cliente_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			categoria_cliente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);	
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

var categoria_cliente_webcontrol1 = new categoria_cliente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {categoria_cliente_webcontrol,categoria_cliente_webcontrol1};

//Para ser llamado desde window.opener
window.categoria_cliente_webcontrol1 = categoria_cliente_webcontrol1;


if(categoria_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = categoria_cliente_webcontrol1.onLoadWindow; 
}

//</script>