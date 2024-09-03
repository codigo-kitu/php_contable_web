//<script type="text/javascript" language="javascript">



//var estimado_detalleJQueryPaginaWebInteraccion= function (estimado_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {estimado_detalle_constante,estimado_detalle_constante1} from '../util/estimado_detalle_constante.js';

import {estimado_detalle_funcion,estimado_detalle_funcion1} from '../util/estimado_detalle_funcion.js';


class estimado_detalle_webcontrol extends GeneralEntityWebControl {
	
	estimado_detalle_control=null;
	estimado_detalle_controlInicial=null;
	estimado_detalle_controlAuxiliar=null;
		
	//if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(estimado_detalle_control) {
		super();
		
		this.estimado_detalle_control=estimado_detalle_control;
	}
		
	actualizarVariablesPagina(estimado_detalle_control) {
		
		if(estimado_detalle_control.action=="index" || estimado_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(estimado_detalle_control);
			
		} 
		
		
		else if(estimado_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(estimado_detalle_control);
			
		} else if(estimado_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(estimado_detalle_control);
			
		} else if(estimado_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(estimado_detalle_control);		
		
		} else if(estimado_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(estimado_detalle_control);
		
		}  else if(estimado_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(estimado_detalle_control);
		
		} else if(estimado_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(estimado_detalle_control);		
		
		} else if(estimado_detalle_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(estimado_detalle_control);		
		
		} else if(estimado_detalle_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(estimado_detalle_control);		
		
		} else if(estimado_detalle_control.action.includes("Busqueda") ||
				  estimado_detalle_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(estimado_detalle_control);
			
		} else if(estimado_detalle_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(estimado_detalle_control)
		}
		
		
		
	
		else if(estimado_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(estimado_detalle_control);	
		
		} else if(estimado_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(estimado_detalle_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + estimado_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(estimado_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(estimado_detalle_control) {
		this.actualizarPaginaAccionesGenerales(estimado_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(estimado_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(estimado_detalle_control);
		this.actualizarPaginaOrderBy(estimado_detalle_control);
		this.actualizarPaginaTablaDatos(estimado_detalle_control);
		this.actualizarPaginaCargaGeneralControles(estimado_detalle_control);
		//this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estimado_detalle_control);
		this.actualizarPaginaAreaBusquedas(estimado_detalle_control);
		this.actualizarPaginaCargaCombosFK(estimado_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(estimado_detalle_control) {
		//this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(estimado_detalle_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(estimado_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(estimado_detalle_control);
		this.actualizarPaginaTablaDatos(estimado_detalle_control);
		this.actualizarPaginaCargaGeneralControles(estimado_detalle_control);
		//this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estimado_detalle_control);
		this.actualizarPaginaAreaBusquedas(estimado_detalle_control);
		this.actualizarPaginaCargaCombosFK(estimado_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		//this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		//this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		//this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(estimado_detalle_control) {
		//this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(estimado_detalle_control) {
		this.actualizarPaginaAbrirLink(estimado_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);				
		//this.actualizarPaginaFormulario(estimado_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);
		//this.actualizarPaginaFormulario(estimado_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);
		//this.actualizarPaginaFormulario(estimado_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(estimado_detalle_control) {
		//this.actualizarPaginaFormulario(estimado_detalle_control);
		this.onLoadCombosDefectoFK(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);
		//this.actualizarPaginaFormulario(estimado_detalle_control);
		this.onLoadCombosDefectoFK(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(estimado_detalle_control) {
		this.actualizarPaginaAbrirLink(estimado_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(estimado_detalle_control) {
		this.actualizarPaginaTablaDatos(estimado_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(estimado_detalle_control) {
					//super.actualizarPaginaImprimir(estimado_detalle_control,"estimado_detalle");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",estimado_detalle_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("estimado_detalle_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(estimado_detalle_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(estimado_detalle_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(estimado_detalle_control) {
		//super.actualizarPaginaImprimir(estimado_detalle_control,"estimado_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("estimado_detalle_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(estimado_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",estimado_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(estimado_detalle_control) {
		//super.actualizarPaginaImprimir(estimado_detalle_control,"estimado_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("estimado_detalle_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(estimado_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",estimado_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(estimado_detalle_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(estimado_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(estimado_detalle_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(estimado_detalle_control);
			
		this.actualizarPaginaAbrirLink(estimado_detalle_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(estimado_detalle_control) {
		
		if(estimado_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(estimado_detalle_control);
		}
		
		if(estimado_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(estimado_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(estimado_detalle_control) {
		if(estimado_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("estimado_detalleReturnGeneral",JSON.stringify(estimado_detalle_control.estimado_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(estimado_detalle_control) {
		if(estimado_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && estimado_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(estimado_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(estimado_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(estimado_detalle_control, mostrar) {
		
		if(mostrar==true) {
			estimado_detalle_funcion1.resaltarRestaurarDivsPagina(false,"estimado_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				estimado_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"estimado_detalle");
			}			
			
			estimado_detalle_funcion1.mostrarDivMensaje(true,estimado_detalle_control.strAuxiliarMensaje,estimado_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			estimado_detalle_funcion1.mostrarDivMensaje(false,estimado_detalle_control.strAuxiliarMensaje,estimado_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(estimado_detalle_control) {
		if(estimado_detalle_funcion1.esPaginaForm(estimado_detalle_constante1)==true) {
			window.opener.estimado_detalle_webcontrol1.actualizarPaginaTablaDatos(estimado_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(estimado_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(estimado_detalle_control) {
		estimado_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(estimado_detalle_control.strAuxiliarUrlPagina);
				
		estimado_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(estimado_detalle_control.strAuxiliarTipo,estimado_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(estimado_detalle_control) {
		estimado_detalle_funcion1.resaltarRestaurarDivMensaje(true,estimado_detalle_control.strAuxiliarMensajeAlert,estimado_detalle_control.strAuxiliarCssMensaje);
			
		if(estimado_detalle_funcion1.esPaginaForm(estimado_detalle_constante1)==true) {
			window.opener.estimado_detalle_funcion1.resaltarRestaurarDivMensaje(true,estimado_detalle_control.strAuxiliarMensajeAlert,estimado_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(estimado_detalle_control) {
		this.estimado_detalle_controlInicial=estimado_detalle_control;
			
		if(estimado_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(estimado_detalle_control.strStyleDivArbol,estimado_detalle_control.strStyleDivContent
																,estimado_detalle_control.strStyleDivOpcionesBanner,estimado_detalle_control.strStyleDivExpandirColapsar
																,estimado_detalle_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=estimado_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",estimado_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(estimado_detalle_control) {
		this.actualizarCssBotonesPagina(estimado_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(estimado_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(estimado_detalle_control.tiposReportes,estimado_detalle_control.tiposReporte
															 	,estimado_detalle_control.tiposPaginacion,estimado_detalle_control.tiposAcciones
																,estimado_detalle_control.tiposColumnasSelect,estimado_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(estimado_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(estimado_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(estimado_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(estimado_detalle_control) {
	
		var indexPosition=estimado_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=estimado_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(estimado_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.cargarCombosestimadosFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.cargarCombosbodegasFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.cargarCombosproductosFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.cargarCombosunidadsFK(estimado_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(estimado_detalle_control.strRecargarFkTiposNinguno!=null && estimado_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && estimado_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(estimado_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estimado",estimado_detalle_control.strRecargarFkTiposNinguno,",")) { 
					estimado_detalle_webcontrol1.cargarCombosestimadosFK(estimado_detalle_control);
				}

				if(estimado_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",estimado_detalle_control.strRecargarFkTiposNinguno,",")) { 
					estimado_detalle_webcontrol1.cargarCombosbodegasFK(estimado_detalle_control);
				}

				if(estimado_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",estimado_detalle_control.strRecargarFkTiposNinguno,",")) { 
					estimado_detalle_webcontrol1.cargarCombosproductosFK(estimado_detalle_control);
				}

				if(estimado_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",estimado_detalle_control.strRecargarFkTiposNinguno,",")) { 
					estimado_detalle_webcontrol1.cargarCombosunidadsFK(estimado_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.estimado_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.estimado_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.estimado_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.estimado_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.estimado_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.estimado_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaestimadoFK(estimado_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_detalle_funcion1,estimado_detalle_control.estimadosFK);
	}

	cargarComboEditarTablabodegaFK(estimado_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_detalle_funcion1,estimado_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(estimado_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_detalle_funcion1,estimado_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(estimado_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_detalle_funcion1,estimado_detalle_control.unidadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(estimado_detalle_control) {
		jQuery("#divBusquedaestimado_detalleAjaxWebPart").css("display",estimado_detalle_control.strPermisoBusqueda);
		jQuery("#trestimado_detalleCabeceraBusquedas").css("display",estimado_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaestimado_detalle").css("display",estimado_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(estimado_detalle_control.htmlTablaOrderBy!=null
			&& estimado_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByestimado_detalleAjaxWebPart").html(estimado_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//estimado_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(estimado_detalle_control.htmlTablaOrderByRel!=null
			&& estimado_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelestimado_detalleAjaxWebPart").html(estimado_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(estimado_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaestimado_detalleAjaxWebPart").css("display","none");
			jQuery("#trestimado_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaestimado_detalle").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(estimado_detalle_control) {
		
		if(!estimado_detalle_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(estimado_detalle_control);
		} else {
			jQuery("#divTablaDatosestimado_detallesAjaxWebPart").html(estimado_detalle_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosestimado_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(estimado_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosestimado_detalles=jQuery("#tblTablaDatosestimado_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("estimado_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',estimado_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			estimado_detalle_webcontrol1.registrarControlesTableEdition(estimado_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		estimado_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(estimado_detalle_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("estimado_detalle_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(estimado_detalle_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosestimado_detallesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(estimado_detalle_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(estimado_detalle_control);
		
		const divOrderBy = document.getElementById("divOrderByestimado_detalleAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(estimado_detalle_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelestimado_detalleAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(estimado_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(estimado_detalle_control.estimado_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(estimado_detalle_control);			
		}
	}
	
	actualizarCamposFilaTabla(estimado_detalle_control) {
		var i=0;
		
		i=estimado_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(estimado_detalle_control.estimado_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(estimado_detalle_control.estimado_detalleActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(estimado_detalle_control.estimado_detalleActual.versionRow);
		
		if(estimado_detalle_control.estimado_detalleActual.id_estimado!=null && estimado_detalle_control.estimado_detalleActual.id_estimado>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != estimado_detalle_control.estimado_detalleActual.id_estimado) {
				jQuery("#t-cel_"+i+"_3").val(estimado_detalle_control.estimado_detalleActual.id_estimado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_detalle_control.estimado_detalleActual.id_bodega!=null && estimado_detalle_control.estimado_detalleActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != estimado_detalle_control.estimado_detalleActual.id_bodega) {
				jQuery("#t-cel_"+i+"_4").val(estimado_detalle_control.estimado_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_detalle_control.estimado_detalleActual.id_producto!=null && estimado_detalle_control.estimado_detalleActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != estimado_detalle_control.estimado_detalleActual.id_producto) {
				jQuery("#t-cel_"+i+"_5").val(estimado_detalle_control.estimado_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_detalle_control.estimado_detalleActual.id_unidad!=null && estimado_detalle_control.estimado_detalleActual.id_unidad>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != estimado_detalle_control.estimado_detalleActual.id_unidad) {
				jQuery("#t-cel_"+i+"_6").val(estimado_detalle_control.estimado_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(estimado_detalle_control.estimado_detalleActual.cantidad);
		jQuery("#t-cel_"+i+"_8").val(estimado_detalle_control.estimado_detalleActual.precio);
		jQuery("#t-cel_"+i+"_9").val(estimado_detalle_control.estimado_detalleActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_10").val(estimado_detalle_control.estimado_detalleActual.descuento_monto);
		jQuery("#t-cel_"+i+"_11").val(estimado_detalle_control.estimado_detalleActual.sub_total);
		jQuery("#t-cel_"+i+"_12").val(estimado_detalle_control.estimado_detalleActual.iva_porciento);
		jQuery("#t-cel_"+i+"_13").val(estimado_detalle_control.estimado_detalleActual.iva_monto);
		jQuery("#t-cel_"+i+"_14").val(estimado_detalle_control.estimado_detalleActual.total);
		jQuery("#t-cel_"+i+"_15").val(estimado_detalle_control.estimado_detalleActual.recibido);
		jQuery("#t-cel_"+i+"_16").val(estimado_detalle_control.estimado_detalleActual.observacion);
		jQuery("#t-cel_"+i+"_17").val(estimado_detalle_control.estimado_detalleActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_18").val(estimado_detalle_control.estimado_detalleActual.impuesto2_monto);
		jQuery("#t-cel_"+i+"_19").val(estimado_detalle_control.estimado_detalleActual.cotizacion);
		jQuery("#t-cel_"+i+"_20").val(estimado_detalle_control.estimado_detalleActual.moneda);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(estimado_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(estimado_detalle_control) {
		estimado_detalle_funcion1.registrarControlesTableValidacionEdition(estimado_detalle_control,estimado_detalle_webcontrol1,estimado_detalle_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(estimado_detalle_control) {
		jQuery("#divResumenestimado_detalleActualAjaxWebPart").html(estimado_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(estimado_detalle_control) {
		//jQuery("#divAccionesRelacionesestimado_detalleAjaxWebPart").html(estimado_detalle_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("estimado_detalle_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(estimado_detalle_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesestimado_detalleAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		estimado_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(estimado_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(estimado_detalle_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(estimado_detalle_control) {
		
		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",estimado_detalle_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",estimado_detalle_control.strVisibleFK_Idbodega);
		}

		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado").attr("style",estimado_detalle_control.strVisibleFK_Idestimado);
			jQuery("#tblstrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado").attr("style",estimado_detalle_control.strVisibleFK_Idestimado);
		}

		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",estimado_detalle_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",estimado_detalle_control.strVisibleFK_Idproducto);
		}

		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",estimado_detalle_control.strVisibleFK_Idunidad);
			jQuery("#tblstrVisible"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",estimado_detalle_control.strVisibleFK_Idunidad);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionestimado_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("estimado_detalle",id,"estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);		
	}
	
	

	abrirBusquedaParaestimado(strNombreCampoBusqueda){//idActual
		estimado_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado_detalle","estimado","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		estimado_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado_detalle","bodega","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		estimado_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado_detalle","producto","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		estimado_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado_detalle","unidad","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalleConstante,strParametros);
		
		//estimado_detalle_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosestimadosFK(estimado_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado",estimado_detalle_control.estimadosFK);

		if(estimado_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_detalle_control.idFilaTablaActual+"_3",estimado_detalle_control.estimadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado",estimado_detalle_control.estimadosFK);

	};

	cargarCombosbodegasFK(estimado_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega",estimado_detalle_control.bodegasFK);

		if(estimado_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_detalle_control.idFilaTablaActual+"_4",estimado_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",estimado_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(estimado_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto",estimado_detalle_control.productosFK);

		if(estimado_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_detalle_control.idFilaTablaActual+"_5",estimado_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",estimado_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(estimado_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad",estimado_detalle_control.unidadsFK);

		if(estimado_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_detalle_control.idFilaTablaActual+"_6",estimado_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",estimado_detalle_control.unidadsFK);

	};

	
	
	registrarComboActionChangeCombosestimadosFK(estimado_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(estimado_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(estimado_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(estimado_detalle_control) {

	};

	
	
	setDefectoValorCombosestimadosFK(estimado_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_detalle_control.idestimadoDefaultFK>-1 && jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").val() != estimado_detalle_control.idestimadoDefaultFK) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado").val(estimado_detalle_control.idestimadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val(estimado_detalle_control.idestimadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(estimado_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != estimado_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega").val(estimado_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(estimado_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(estimado_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").val() != estimado_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto").val(estimado_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(estimado_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(estimado_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != estimado_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad").val(estimado_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(estimado_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("estimado_detalle","estimados","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("estimado_detalle","estimados","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//estimado_detalle_control
		
	

		var cantidad="form"+estimado_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("estimado_detalle","estimados","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

		var precio="form"+estimado_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("estimado_detalle","estimados","","precio",precio,"","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

		var descuento_porciento="form"+estimado_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("estimado_detalle","estimados","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

		var iva_porciento="form"+estimado_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("estimado_detalle","estimados","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(estimado_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.setDefectoValorCombosestimadosFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.setDefectoValorCombosbodegasFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.setDefectoValorCombosproductosFK(estimado_detalle_control);
			}

			if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",estimado_detalle_control.strRecargarFkTipos,",")) { 
				estimado_detalle_webcontrol1.setDefectoValorCombosunidadsFK(estimado_detalle_control);
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
	onLoadCombosEventosFK(estimado_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",estimado_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_detalle_webcontrol1.registrarComboActionChangeCombosestimadosFK(estimado_detalle_control);
			//}

			//if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",estimado_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(estimado_detalle_control);
			//}

			//if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",estimado_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(estimado_detalle_control);
			//}

			//if(estimado_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",estimado_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(estimado_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(estimado_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(estimado_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado_detalle","FK_Idbodega","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado_detalle","FK_Idestimado","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado_detalle","FK_Idproducto","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado_detalle","FK_Idunidad","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
		
			
			if(estimado_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("estimado_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("estimado_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(estimado_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,"estimado_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estimado","id_estimado","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_estimado_img_busqueda").click(function(){
				estimado_detalle_webcontrol1.abrirBusquedaParaestimado("id_estimado");
				//alert(jQuery('#form-id_estimado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				estimado_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				estimado_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				estimado_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(estimado_detalle_control) {
		
		jQuery("#divBusquedaestimado_detalleAjaxWebPart").css("display",estimado_detalle_control.strPermisoBusqueda);
		jQuery("#trestimado_detalleCabeceraBusquedas").css("display",estimado_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaestimado_detalle").css("display",estimado_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteestimado_detalle").css("display",estimado_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosestimado_detalle").attr("style",estimado_detalle_control.strPermisoMostrarTodos);		
		
		if(estimado_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdestimado_detalleNuevo").css("display",estimado_detalle_control.strPermisoNuevo);
			jQuery("#tdestimado_detalleNuevoToolBar").css("display",estimado_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdestimado_detalleDuplicar").css("display",estimado_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdestimado_detalleDuplicarToolBar").css("display",estimado_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdestimado_detalleNuevoGuardarCambios").css("display",estimado_detalle_control.strPermisoNuevo);
			jQuery("#tdestimado_detalleNuevoGuardarCambiosToolBar").css("display",estimado_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(estimado_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdestimado_detalleCopiar").css("display",estimado_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdestimado_detalleCopiarToolBar").css("display",estimado_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdestimado_detalleConEditar").css("display",estimado_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdestimado_detalleGuardarCambios").css("display",estimado_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdestimado_detalleGuardarCambiosToolBar").css("display",estimado_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdestimado_detalleCerrarPagina").css("display",estimado_detalle_control.strPermisoPopup);		
		jQuery("#tdestimado_detalleCerrarPaginaToolBar").css("display",estimado_detalle_control.strPermisoPopup);
		//jQuery("#trestimado_detalleAccionesRelaciones").css("display",estimado_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=estimado_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + estimado_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + estimado_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Estimado Detalles";
		sTituloBanner+=" - " + estimado_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + estimado_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdestimado_detalleRelacionesToolBar").css("display",estimado_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosestimado_detalle").css("display",estimado_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		estimado_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		estimado_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		estimado_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		estimado_detalle_webcontrol1.registrarEventosControles();
		
		if(estimado_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(estimado_detalle_constante1.STR_ES_RELACIONADO=="false") {
			estimado_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(estimado_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(estimado_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				estimado_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(estimado_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(estimado_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				estimado_detalle_webcontrol1.onLoad();
			
			//} else {
				//if(estimado_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			estimado_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("estimado_detalle","estimados","",estimado_detalle_funcion1,estimado_detalle_webcontrol1,estimado_detalle_constante1);	
	}
	
	/*
		Variables-Pagina: actualizarVariablesPagina
		Variables-Pagina: actualizarVariablesPagina(AccionesGenerales,AccionIndex,AccionCancelar,AccionMostrarEjecutar,AccionIndex)
		Variables-Pagina: actualizarVariablesPagina(AccionRecargarInformacion,AccionBusquedas,AccionBuscarPorIdGeneral,AccionAnteriores)
		Variables-Pagina: actualizarVariablesPagina(AccionSiguientes,AccionRecargarUltimaInformacion,AccionSeleccionarLoteFk)
		Variables-Pagina: actualizarVariablesPagina(AccionGuardarCambios,AccionDuplicar,AccionCopiar,AccionSeleccionarActual)
		Variables-Pagina: actualizarVariablesPagina(AccionEliminarCascada,AccionEliminarTabla,AccionQuitarElementosTabla,AccionNuevoPreparar)
		Variables-Pagina: actualizarVariablesPagina(AccionNuevoTablaPreparar,AccionNuevoPrepararAbrirPaginaForm,AccionEditarTablaDatos)
		Variables-Pagina: actualizarVariablesPagina(AccionGenerarHtmlReporte,AccionGenerarHtmlFormReporte,AccionGenerarHtmlRelacionesReporte)
		Variables-Pagina: actualizarVariablesPagina(AccionQuitarRelacionesReporte,AccionGenerarReporteAbrirPaginaForm,AccionEliminarCascada)
		Pagina: actualizarPagina(AccionesGenerales,GuardarReturnSession,MensajePantallaAuxiliar,MensajePantalla,TablaDatosAuxiliar)
		Pagina: actualizarPagina(AbrirLink,MensajeAlert,CargaGeneral,CargaGeneralControles,CargaCombosFK,UsuarioInvitado)
		Pagina: actualizarPagina(AreaBusquedas,TablaDatos,TablaDatosJsTemplate,OrderBy,TablaFilaActual)
		Campos: actualizarCamposFilaTabla
		Combos: cargarCombosFK,cargarComboEditarTablaempresaFK,cargarComboEditarTablasucursalFK
		Combos: cargarCombosempresasFK,cargarCombossucursalsFK
		Combos-Defecto: setDefectoValorCombosempresasFK,setDefectoValorCombossucursalsFK
		TablaAccionesControles-Sesion: registrarTablaAcciones,registrarSesion_defectoParaproductos,registrarControlesTableEdition
		Css: actualizarCssBusquedas,actualizarCssBotonesPagina
		Recargar-Buscar: recargarUltimaInformacion,buscarPorIdGeneral
		Abrir: abrirBusquedaParaempresa
		Registrar-Seleccionar: registrarDivAccionesRelaciones,manejarSeleccionarLoteFk
		Eventos: registrarEventosControles
		Registrar: registrarAccionesEventos,registrarPropiedadesPagina
		OnLoad: onLoadRecargarRelacionado,onLoadCombosDefectoFK,onLoadCombosEventosFK
		OnLoad: onLoad,onUnLoadWindow,onLoadWindow,registrarEventosOnLoadGlobal
	*/
}

var estimado_detalle_webcontrol1 = new estimado_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {estimado_detalle_webcontrol,estimado_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.estimado_detalle_webcontrol1 = estimado_detalle_webcontrol1;


if(estimado_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = estimado_detalle_webcontrol1.onLoadWindow; 
}

//</script>