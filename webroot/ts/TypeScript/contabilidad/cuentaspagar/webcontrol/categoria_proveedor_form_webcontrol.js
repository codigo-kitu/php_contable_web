//<script type="text/javascript" language="javascript">



//var categoria_proveedorJQueryPaginaWebInteraccion= function (categoria_proveedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {categoria_proveedor_constante,categoria_proveedor_constante1} from '../util/categoria_proveedor_constante.js';

import {categoria_proveedor_funcion,categoria_proveedor_funcion1} from '../util/categoria_proveedor_form_funcion.js';


class categoria_proveedor_webcontrol extends GeneralEntityWebControl {
	
	categoria_proveedor_control=null;
	categoria_proveedor_controlInicial=null;
	categoria_proveedor_controlAuxiliar=null;
		
	//if(categoria_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(categoria_proveedor_control) {
		super();
		
		this.categoria_proveedor_control=categoria_proveedor_control;
	}
		
	actualizarVariablesPagina(categoria_proveedor_control) {
		
		if(categoria_proveedor_control.action=="index" || categoria_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(categoria_proveedor_control);
			
		} 
		
		
		
	
		else if(categoria_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(categoria_proveedor_control);	
		
		} else if(categoria_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_proveedor_control);		
		}
	
		else if(categoria_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(categoria_proveedor_control);		
		}
	
		else if(categoria_proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_proveedor_control);
		}
		
		
		else if(categoria_proveedor_control.action=="nuevo") {
			this.actualizarVariablesPaginaAccionNuevo(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="actualizar") {
			this.actualizarVariablesPaginaAccionActualizar(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="eliminar") {
			this.actualizarVariablesPaginaAccionEliminar(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="seleccionarActualPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="nuevoPrepararPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_proveedor_control);
		
		} else if(categoria_proveedor_control.action=="manejarEventos") {
			this.actualizarVariablesPaginaAccionManejarEventos(categoria_proveedor_control);		
		
		} else if(categoria_proveedor_control.action=="recargarFormularioGeneral") {
			this.actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_proveedor_control);		
		
		} 

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + categoria_proveedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(categoria_proveedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(categoria_proveedor_control) {
		this.actualizarPaginaAccionesGenerales(categoria_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(categoria_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(categoria_proveedor_control);
		this.actualizarPaginaOrderBy(categoria_proveedor_control);
		this.actualizarPaginaTablaDatos(categoria_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(categoria_proveedor_control);
		//this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(categoria_proveedor_control);
		this.actualizarPaginaAreaBusquedas(categoria_proveedor_control);
		this.actualizarPaginaCargaCombosFK(categoria_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(categoria_proveedor_control) {
		//this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_proveedor_control);
	}
	



	actualizarVariablesPaginaAccionNuevo(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(categoria_proveedor_control) {
		this.actualizarPaginaTablaDatosAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(categoria_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_proveedor_control);
		this.actualizarPaginaCargaCombosFK(categoria_proveedor_control);
		this.actualizarPaginaFormulario(categoria_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.seleccionarActualPaginaFormularioAdd(categoria_proveedor_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(categoria_proveedor_control) {
		this.actualizarPaginaCargaGeneralControles(categoria_proveedor_control);
		this.actualizarPaginaCargaCombosFK(categoria_proveedor_control);
		this.actualizarPaginaFormulario(categoria_proveedor_control);
		this.onLoadCombosDefectoFK(categoria_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_proveedor_control);		
	}
		
	actualizarVariablesPaginaAccionRecargarFomularioGeneral(categoria_proveedor_control) {
		//FORMULARIO
		if(categoria_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_proveedor_control);			
		}
		
		//FORMULARIO ADD
		this.actualizarPaginaFormularioAdd(categoria_proveedor_control);
		
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);		
		
		//COMBOS FK
		if(categoria_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_proveedor_control);
		}
	}
	
	
	actualizarVariablesPaginaAccionManejarEventos(categoria_proveedor_control) {
		//FORMULARIO
		if(categoria_proveedor_control.paramDivSeccion.bitDivEsCargarMantenimientosAjaxWebPart==true) {
			this.actualizarPaginaFormulario(categoria_proveedor_control);
		}
		//MENSAJE		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control);	
		//COMBOS FK
		if(categoria_proveedor_control.paramDivSeccion.bitDivsEsCargarFKsAjaxWebPart==true) {
			this.actualizarPaginaCargaCombosFK(categoria_proveedor_control);
		}
	}
	
	
	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(categoria_proveedor_control) {
		
		if(categoria_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(categoria_proveedor_control);
		}
		
		if(categoria_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(categoria_proveedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(categoria_proveedor_control) {
		if(categoria_proveedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("categoria_proveedorReturnGeneral",JSON.stringify(categoria_proveedor_control.categoria_proveedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(categoria_proveedor_control) {
		if(categoria_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && categoria_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(categoria_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(categoria_proveedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(categoria_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			categoria_proveedor_funcion1.resaltarRestaurarDivsPagina(false,"categoria_proveedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				categoria_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false,"categoria_proveedor");
			}			
			
			categoria_proveedor_funcion1.mostrarDivMensaje(true,categoria_proveedor_control.strAuxiliarMensaje,categoria_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			categoria_proveedor_funcion1.mostrarDivMensaje(false,categoria_proveedor_control.strAuxiliarMensaje,categoria_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(categoria_proveedor_control) {
		if(categoria_proveedor_funcion1.esPaginaForm(categoria_proveedor_constante1)==true) {
			window.opener.categoria_proveedor_webcontrol1.actualizarPaginaTablaDatos(categoria_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(categoria_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(categoria_proveedor_control) {
		categoria_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(categoria_proveedor_control.strAuxiliarUrlPagina);
				
		categoria_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(categoria_proveedor_control.strAuxiliarTipo,categoria_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(categoria_proveedor_control) {
		categoria_proveedor_funcion1.resaltarRestaurarDivMensaje(true,categoria_proveedor_control.strAuxiliarMensajeAlert,categoria_proveedor_control.strAuxiliarCssMensaje);
			
		if(categoria_proveedor_funcion1.esPaginaForm(categoria_proveedor_constante1)==true) {
			window.opener.categoria_proveedor_funcion1.resaltarRestaurarDivMensaje(true,categoria_proveedor_control.strAuxiliarMensajeAlert,categoria_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(categoria_proveedor_control) {
		this.categoria_proveedor_controlInicial=categoria_proveedor_control;
			
		if(categoria_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(categoria_proveedor_control.strStyleDivArbol,categoria_proveedor_control.strStyleDivContent
																,categoria_proveedor_control.strStyleDivOpcionesBanner,categoria_proveedor_control.strStyleDivExpandirColapsar
																,categoria_proveedor_control.strStyleDivHeader);
			
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(categoria_proveedor_control) {
		this.actualizarCssBotonesPagina(categoria_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(categoria_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(categoria_proveedor_control.tiposReportes,categoria_proveedor_control.tiposReporte
															 	,categoria_proveedor_control.tiposPaginacion,categoria_proveedor_control.tiposAcciones
																,categoria_proveedor_control.tiposColumnasSelect,categoria_proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(categoria_proveedor_control.tiposRelaciones,categoria_proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(categoria_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(categoria_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(categoria_proveedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(categoria_proveedor_control) {
	
		var indexPosition=categoria_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=categoria_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(categoria_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(categoria_proveedor_control.strRecargarFkTiposNinguno!=null && categoria_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && categoria_proveedor_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	


	actualizarPaginaAreaMantenimiento(categoria_proveedor_control) {
		jQuery("#tdcategoria_proveedorNuevo").css("display",categoria_proveedor_control.strPermisoNuevo);
		jQuery("#trcategoria_proveedorElementos").css("display",categoria_proveedor_control.strVisibleTablaElementos);
		jQuery("#trcategoria_proveedorAcciones").css("display",categoria_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_proveedorParametrosAcciones").css("display",categoria_proveedor_control.strVisibleTablaAcciones);			
	}
	
	actualizarPaginaFormulario(categoria_proveedor_control) {
	
		this.actualizarCssBotonesMantenimiento(categoria_proveedor_control);
				
		if(categoria_proveedor_control.categoria_proveedorActual!=null) {//form
			
			this.actualizarCamposFormulario(categoria_proveedor_control);			
		}
						
		this.actualizarSpanMensajesCampos(categoria_proveedor_control);
	}
	
	/*---------------------------------- AREA:FORMULARIO ---------------------------*/

	actualizarCamposFormulario(categoria_proveedor_control) {
	
		jQuery("#form"+categoria_proveedor_constante1.STR_SUFIJO+"-id").val(categoria_proveedor_control.categoria_proveedorActual.id);
		jQuery("#form"+categoria_proveedor_constante1.STR_SUFIJO+"-version_row").val(categoria_proveedor_control.categoria_proveedorActual.versionRow);
		jQuery("#form"+categoria_proveedor_constante1.STR_SUFIJO+"-nombre").val(categoria_proveedor_control.categoria_proveedorActual.nombre);
		jQuery("#form"+categoria_proveedor_constante1.STR_SUFIJO+"-predeterminado").val(categoria_proveedor_control.categoria_proveedorActual.predeterminado);
	}
	
	recargarFormularioGeneral() {	
		var paraEventoTabla=false;
		var idFilaTabla=0;
			
		var formulario="form"+categoria_proveedor_constante1.STR_SUFIJO;
		
		funcionGeneralEventoJQuery.recargarFormularioGeneral("categoria_proveedor","cuentaspagar","","form_categoria_proveedor",formulario,"","",paraEventoTabla,idFilaTabla,categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
	}
	
	actualizarSpanMensajesCampos(categoria_proveedor_control) {
		jQuery("#spanstrMensajeid").text(categoria_proveedor_control.strMensajeid);		
		jQuery("#spanstrMensajeversion_row").text(categoria_proveedor_control.strMensajeversion_row);		
		jQuery("#spanstrMensajenombre").text(categoria_proveedor_control.strMensajenombre);		
		jQuery("#spanstrMensajepredeterminado").text(categoria_proveedor_control.strMensajepredeterminado);		
	}
	
	actualizarCssBotonesMantenimiento(categoria_proveedor_control) {
		jQuery("#tdbtnNuevocategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaNuevo);		
		jQuery("#divNuevocategoria_proveedor").css("display",categoria_proveedor_control.strPermisoNuevo);
										
		jQuery("#tdbtnActualizarcategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#divActualizarcategoria_proveedor").css("display",categoria_proveedor_control.strPermisoActualizar);
			
		jQuery("#tdbtnEliminarcategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaEliminar);		
		jQuery("#divEliminarcategoria_proveedor").css("display",categoria_proveedor_control.strPermisoEliminar);
			
		jQuery("#tdbtnCancelarcategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaCancelar);			
			
		jQuery("#tdbtnGuardarCambioscategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaGuardar);		
		jQuery("#tdbtnGuardarCambioscategoria_proveedor").css("display",categoria_proveedor_control.strPermisoActualizar);
						
		//TOOLBAR FORMULARIO
		jQuery("#tdbtnActualizarToolBarcategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaActualizar);		
		jQuery("#tdbtnEliminarToolBarcategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaEliminar);					
		jQuery("#tdbtnCancelarToolBarcategoria_proveedor").css("visibility",categoria_proveedor_control.strVisibleCeldaCancelar);						
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//categoria_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(categoria_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(categoria_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(categoria_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(categoria_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			
			funcionGeneralEventoJQuery.setBotonNuevoClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonActualizarClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonEliminarClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonCancelarClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setCheckPostAccionNuevoChange("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
		
			funcionGeneralEventoJQuery.setCheckPostAccionSinCerrarChange("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			//IMPRIMIR SOLO FORMULARIO DATOS
			funcionGeneralEventoJQuery.setBotonImprimirClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			//VALIDACION
			// NO SE PUEDE UTILIZAR strSUFIJO, SALE ERROR EN JAVASCRIPT
			if(categoria_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				categoria_proveedor_funcion1.validarFormularioJQuery(categoria_proveedor_constante1);
			}
			



			funcionGeneralEventoJQuery.setBotonCerrarClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("categoria_proveedor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("categoria_proveedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(categoria_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,"categoria_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("categoria_proveedor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(categoria_proveedor_control) {
		
		
		
		if(categoria_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdcategoria_proveedorActualizarToolBar").css("display",categoria_proveedor_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdcategoria_proveedorEliminarToolBar").css("display",categoria_proveedor_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trcategoria_proveedorElementos").css("display",categoria_proveedor_control.strVisibleTablaElementos);
		
		jQuery("#trcategoria_proveedorAcciones").css("display",categoria_proveedor_control.strVisibleTablaAcciones);
		jQuery("#trcategoria_proveedorParametrosAcciones").css("display",categoria_proveedor_control.strVisibleTablaAcciones);
		
		jQuery("#tdcategoria_proveedorCerrarPagina").css("display",categoria_proveedor_control.strPermisoPopup);		
		jQuery("#tdcategoria_proveedorCerrarPaginaToolBar").css("display",categoria_proveedor_control.strPermisoPopup);
		//jQuery("#trcategoria_proveedorAccionesRelaciones").css("display",categoria_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=categoria_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + categoria_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + categoria_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Categorias Proveedores";
		sTituloBanner+=" - " + categoria_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + categoria_proveedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcategoria_proveedorRelacionesToolBar").css("display",categoria_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscategoria_proveedor").css("display",categoria_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		categoria_proveedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		categoria_proveedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		categoria_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		categoria_proveedor_webcontrol1.registrarEventosControles();
		
		if(categoria_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(categoria_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			categoria_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(categoria_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(categoria_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				categoria_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(categoria_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(categoria_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
			
			//} else {
				//if(categoria_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
					if(categoria_proveedor_constante1.STR_ACTION=="indexNuevoPrepararPaginaForm") {
						//Nuevo nuevoPrepararPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarFuncionNuevoPrepararPaginaFormClic("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
						//categoria_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					
					} else if(categoria_proveedor_constante1.STR_ACTION=="indexSeleccionarActualPaginaForm") {
						//Cargar seleccionarActualPaginaForm en Pagina Nueva Form al enviar id, No usar Session desde Principal
						funcionGeneralEventoJQuery.ejecutarImagenSeleccionarClicBase(categoria_proveedor_constante1.BIG_ID_ACTUAL,"categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);
						//categoria_proveedor_webcontrol1.onLoadRecargarRelacionesRelacionados();													
					}
				//}
			//}
			
		} else {
			categoria_proveedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("categoria_proveedor","cuentaspagar","",categoria_proveedor_funcion1,categoria_proveedor_webcontrol1,categoria_proveedor_constante1);	
	}
}

var categoria_proveedor_webcontrol1 = new categoria_proveedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {categoria_proveedor_webcontrol,categoria_proveedor_webcontrol1};

//Para ser llamado desde window.opener
window.categoria_proveedor_webcontrol1 = categoria_proveedor_webcontrol1;


if(categoria_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = categoria_proveedor_webcontrol1.onLoadWindow; 
}

//</script>