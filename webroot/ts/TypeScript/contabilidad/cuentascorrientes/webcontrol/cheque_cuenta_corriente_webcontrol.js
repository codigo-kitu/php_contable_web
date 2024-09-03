//<script type="text/javascript" language="javascript">



//var cheque_cuenta_corrienteJQueryPaginaWebInteraccion= function (cheque_cuenta_corriente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cheque_cuenta_corriente_constante,cheque_cuenta_corriente_constante1} from '../util/cheque_cuenta_corriente_constante.js';

import {cheque_cuenta_corriente_funcion,cheque_cuenta_corriente_funcion1} from '../util/cheque_cuenta_corriente_funcion.js';


class cheque_cuenta_corriente_webcontrol extends GeneralEntityWebControl {
	
	cheque_cuenta_corriente_control=null;
	cheque_cuenta_corriente_controlInicial=null;
	cheque_cuenta_corriente_controlAuxiliar=null;
		
	//if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cheque_cuenta_corriente_control) {
		super();
		
		this.cheque_cuenta_corriente_control=cheque_cuenta_corriente_control;
	}
		
	actualizarVariablesPagina(cheque_cuenta_corriente_control) {
		
		if(cheque_cuenta_corriente_control.action=="index" || cheque_cuenta_corriente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cheque_cuenta_corriente_control);
			
		} 
		
		
		else if(cheque_cuenta_corriente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cheque_cuenta_corriente_control);
			
		} else if(cheque_cuenta_corriente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cheque_cuenta_corriente_control);
			
		} else if(cheque_cuenta_corriente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cheque_cuenta_corriente_control);		
		
		} else if(cheque_cuenta_corriente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cheque_cuenta_corriente_control);
		
		}  else if(cheque_cuenta_corriente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cheque_cuenta_corriente_control);
		
		} else if(cheque_cuenta_corriente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cheque_cuenta_corriente_control);		
		
		} else if(cheque_cuenta_corriente_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cheque_cuenta_corriente_control);		
		
		} else if(cheque_cuenta_corriente_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(cheque_cuenta_corriente_control);		
		
		} else if(cheque_cuenta_corriente_control.action.includes("Busqueda") ||
				  cheque_cuenta_corriente_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(cheque_cuenta_corriente_control);
			
		} else if(cheque_cuenta_corriente_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cheque_cuenta_corriente_control)
		}
		
		
		
	
		else if(cheque_cuenta_corriente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cheque_cuenta_corriente_control);	
		
		} else if(cheque_cuenta_corriente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cheque_cuenta_corriente_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cheque_cuenta_corriente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cheque_cuenta_corriente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cheque_cuenta_corriente_control) {
		this.actualizarPaginaAccionesGenerales(cheque_cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cheque_cuenta_corriente_control) {
		
		this.actualizarPaginaCargaGeneral(cheque_cuenta_corriente_control);
		this.actualizarPaginaOrderBy(cheque_cuenta_corriente_control);
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);
		this.actualizarPaginaCargaGeneralControles(cheque_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cheque_cuenta_corriente_control);
		this.actualizarPaginaAreaBusquedas(cheque_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(cheque_cuenta_corriente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cheque_cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cheque_cuenta_corriente_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cheque_cuenta_corriente_control) {
		
		this.actualizarPaginaCargaGeneral(cheque_cuenta_corriente_control);
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);
		this.actualizarPaginaCargaGeneralControles(cheque_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cheque_cuenta_corriente_control);
		this.actualizarPaginaAreaBusquedas(cheque_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(cheque_cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);		
		//this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);		
		//this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);		
		//this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cheque_cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cheque_cuenta_corriente_control) {
		this.actualizarPaginaAbrirLink(cheque_cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);				
		//this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cheque_cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);
		this.onLoadCombosDefectoFK(cheque_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(cheque_cuenta_corriente_control);
		this.onLoadCombosDefectoFK(cheque_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cheque_cuenta_corriente_control) {
		this.actualizarPaginaAbrirLink(cheque_cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cheque_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cheque_cuenta_corriente_control) {
					//super.actualizarPaginaImprimir(cheque_cuenta_corriente_control,"cheque_cuenta_corriente");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cheque_cuenta_corriente_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("cheque_cuenta_corriente_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cheque_cuenta_corriente_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cheque_cuenta_corriente_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cheque_cuenta_corriente_control) {
		//super.actualizarPaginaImprimir(cheque_cuenta_corriente_control,"cheque_cuenta_corriente");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("cheque_cuenta_corriente_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(cheque_cuenta_corriente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cheque_cuenta_corriente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cheque_cuenta_corriente_control) {
		//super.actualizarPaginaImprimir(cheque_cuenta_corriente_control,"cheque_cuenta_corriente");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("cheque_cuenta_corriente_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cheque_cuenta_corriente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cheque_cuenta_corriente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cheque_cuenta_corriente_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(cheque_cuenta_corriente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cheque_cuenta_corriente_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(cheque_cuenta_corriente_control);
			
		this.actualizarPaginaAbrirLink(cheque_cuenta_corriente_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cheque_cuenta_corriente_control) {
		
		if(cheque_cuenta_corriente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cheque_cuenta_corriente_control);
		}
		
		if(cheque_cuenta_corriente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cheque_cuenta_corriente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cheque_cuenta_corriente_control) {
		if(cheque_cuenta_corriente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cheque_cuenta_corrienteReturnGeneral",JSON.stringify(cheque_cuenta_corriente_control.cheque_cuenta_corrienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cheque_cuenta_corriente_control) {
		if(cheque_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cheque_cuenta_corriente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cheque_cuenta_corriente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cheque_cuenta_corriente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cheque_cuenta_corriente_control, mostrar) {
		
		if(mostrar==true) {
			cheque_cuenta_corriente_funcion1.resaltarRestaurarDivsPagina(false,"cheque_cuenta_corriente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cheque_cuenta_corriente_funcion1.resaltarRestaurarDivMantenimiento(false,"cheque_cuenta_corriente");
			}			
			
			cheque_cuenta_corriente_funcion1.mostrarDivMensaje(true,cheque_cuenta_corriente_control.strAuxiliarMensaje,cheque_cuenta_corriente_control.strAuxiliarCssMensaje);
		
		} else {
			cheque_cuenta_corriente_funcion1.mostrarDivMensaje(false,cheque_cuenta_corriente_control.strAuxiliarMensaje,cheque_cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cheque_cuenta_corriente_control) {
		if(cheque_cuenta_corriente_funcion1.esPaginaForm(cheque_cuenta_corriente_constante1)==true) {
			window.opener.cheque_cuenta_corriente_webcontrol1.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);
		} else {
			this.actualizarPaginaTablaDatos(cheque_cuenta_corriente_control);
		}
	}
	
	actualizarPaginaAbrirLink(cheque_cuenta_corriente_control) {
		cheque_cuenta_corriente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cheque_cuenta_corriente_control.strAuxiliarUrlPagina);
				
		cheque_cuenta_corriente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cheque_cuenta_corriente_control.strAuxiliarTipo,cheque_cuenta_corriente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cheque_cuenta_corriente_control) {
		cheque_cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,cheque_cuenta_corriente_control.strAuxiliarMensajeAlert,cheque_cuenta_corriente_control.strAuxiliarCssMensaje);
			
		if(cheque_cuenta_corriente_funcion1.esPaginaForm(cheque_cuenta_corriente_constante1)==true) {
			window.opener.cheque_cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,cheque_cuenta_corriente_control.strAuxiliarMensajeAlert,cheque_cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cheque_cuenta_corriente_control) {
		this.cheque_cuenta_corriente_controlInicial=cheque_cuenta_corriente_control;
			
		if(cheque_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cheque_cuenta_corriente_control.strStyleDivArbol,cheque_cuenta_corriente_control.strStyleDivContent
																,cheque_cuenta_corriente_control.strStyleDivOpcionesBanner,cheque_cuenta_corriente_control.strStyleDivExpandirColapsar
																,cheque_cuenta_corriente_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=cheque_cuenta_corriente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cheque_cuenta_corriente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cheque_cuenta_corriente_control) {
		this.actualizarCssBotonesPagina(cheque_cuenta_corriente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cheque_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cheque_cuenta_corriente_control.tiposReportes,cheque_cuenta_corriente_control.tiposReporte
															 	,cheque_cuenta_corriente_control.tiposPaginacion,cheque_cuenta_corriente_control.tiposAcciones
																,cheque_cuenta_corriente_control.tiposColumnasSelect,cheque_cuenta_corriente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cheque_cuenta_corriente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cheque_cuenta_corriente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cheque_cuenta_corriente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cheque_cuenta_corriente_control) {
	
		var indexPosition=cheque_cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cheque_cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cheque_cuenta_corriente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosempresasFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombossucursalsFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosejerciciosFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosperiodosFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosusuariosFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarComboscuenta_corrientesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarComboscategoria_chequesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosclientesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosproveedorsFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_beneficiario_ocacional_cheque",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosbeneficiario_ocacional_chequesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.cargarCombosestado_deposito_retirosFK(cheque_cuenta_corriente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!=null && cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!='NINGUNO' && cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!='') {
			
				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosempresasFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombossucursalsFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosejerciciosFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosperiodosFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosusuariosFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarComboscuenta_corrientesFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_cheque",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarComboscategoria_chequesFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosclientesFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosproveedorsFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_beneficiario_ocacional_cheque",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosbeneficiario_ocacional_chequesFK(cheque_cuenta_corriente_control);
				}

				if(cheque_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",cheque_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cheque_cuenta_corriente_webcontrol1.cargarCombosestado_deposito_retirosFK(cheque_cuenta_corriente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.cuenta_corrientesFK);
	}

	cargarComboEditarTablacategoria_chequeFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.categoria_chequesFK);
	}

	cargarComboEditarTablaclienteFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.clientesFK);
	}

	cargarComboEditarTablaproveedorFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.proveedorsFK);
	}

	cargarComboEditarTablabeneficiario_ocacional_chequeFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.beneficiario_ocacional_chequesFK);
	}

	cargarComboEditarTablaestado_deposito_retiroFK(cheque_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_control.estado_deposito_retirosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(cheque_cuenta_corriente_control) {
		jQuery("#divBusquedacheque_cuenta_corrienteAjaxWebPart").css("display",cheque_cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trcheque_cuenta_corrienteCabeceraBusquedas").css("display",cheque_cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trBusquedacheque_cuenta_corriente").css("display",cheque_cuenta_corriente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cheque_cuenta_corriente_control.htmlTablaOrderBy!=null
			&& cheque_cuenta_corriente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycheque_cuenta_corrienteAjaxWebPart").html(cheque_cuenta_corriente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cheque_cuenta_corriente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cheque_cuenta_corriente_control.htmlTablaOrderByRel!=null
			&& cheque_cuenta_corriente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcheque_cuenta_corrienteAjaxWebPart").html(cheque_cuenta_corriente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cheque_cuenta_corriente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacheque_cuenta_corrienteAjaxWebPart").css("display","none");
			jQuery("#trcheque_cuenta_corrienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacheque_cuenta_corriente").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(cheque_cuenta_corriente_control) {
		
		if(!cheque_cuenta_corriente_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(cheque_cuenta_corriente_control);
		} else {
			jQuery("#divTablaDatoscheque_cuenta_corrientesAjaxWebPart").html(cheque_cuenta_corriente_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscheque_cuenta_corrientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cheque_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscheque_cuenta_corrientes=jQuery("#tblTablaDatoscheque_cuenta_corrientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cheque_cuenta_corriente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cheque_cuenta_corriente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cheque_cuenta_corriente_webcontrol1.registrarControlesTableEdition(cheque_cuenta_corriente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cheque_cuenta_corriente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(cheque_cuenta_corriente_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("cheque_cuenta_corriente_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cheque_cuenta_corriente_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscheque_cuenta_corrientesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(cheque_cuenta_corriente_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(cheque_cuenta_corriente_control);
		
		const divOrderBy = document.getElementById("divOrderBycheque_cuenta_corrienteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(cheque_cuenta_corriente_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcheque_cuenta_corrienteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(cheque_cuenta_corriente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cheque_cuenta_corriente_control);			
		}
	}
	
	actualizarCamposFilaTabla(cheque_cuenta_corriente_control) {
		var i=0;
		
		i=cheque_cuenta_corriente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id);
		jQuery("#t-version_row_"+i+"").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.versionRow);
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_empresa!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_sucursal!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_ejercicio!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_periodo!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_usuario!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cuenta_corriente!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cuenta_corriente>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cuenta_corriente) {
				jQuery("#t-cel_"+i+"_7").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_categoria_cheque!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_categoria_cheque>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_categoria_cheque) {
				jQuery("#t-cel_"+i+"_8").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_categoria_cheque).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cliente!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cliente) {
				jQuery("#t-cel_"+i+"_9").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_9").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_proveedor!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_10").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_10").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_proveedor).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_10").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_10").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_beneficiario_ocacional_cheque!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_beneficiario_ocacional_cheque>-1){
			if(jQuery("#t-cel_"+i+"_11").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_beneficiario_ocacional_cheque) {
				jQuery("#t-cel_"+i+"_11").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_beneficiario_ocacional_cheque).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_11").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_11").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_12").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.numero_cheque);
		jQuery("#t-cel_"+i+"_13").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.fecha_emision);
		jQuery("#t-cel_"+i+"_14").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.monto);
		jQuery("#t-cel_"+i+"_15").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.monto_texto);
		jQuery("#t-cel_"+i+"_16").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.saldo);
		jQuery("#t-cel_"+i+"_17").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.descripcion);
		jQuery("#t-cel_"+i+"_18").prop('checked',cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.cobrado);
		jQuery("#t-cel_"+i+"_19").prop('checked',cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.impreso);
		
		if(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_estado_deposito_retiro!=null && cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_estado_deposito_retiro>-1){
			if(jQuery("#t-cel_"+i+"_20").val() != cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_estado_deposito_retiro) {
				jQuery("#t-cel_"+i+"_20").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.id_estado_deposito_retiro).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_20").select2("val", null);
			if(jQuery("#t-cel_"+i+"_20").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_20").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_21").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.debito);
		jQuery("#t-cel_"+i+"_22").val(cheque_cuenta_corriente_control.cheque_cuenta_corrienteActual.credito);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cheque_cuenta_corriente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(cheque_cuenta_corriente_control) {
		cheque_cuenta_corriente_funcion1.registrarControlesTableValidacionEdition(cheque_cuenta_corriente_control,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(cheque_cuenta_corriente_control) {
		jQuery("#divResumencheque_cuenta_corrienteActualAjaxWebPart").html(cheque_cuenta_corriente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cheque_cuenta_corriente_control) {
		//jQuery("#divAccionesRelacionescheque_cuenta_corrienteAjaxWebPart").html(cheque_cuenta_corriente_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("cheque_cuenta_corriente_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cheque_cuenta_corriente_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescheque_cuenta_corrienteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		cheque_cuenta_corriente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cheque_cuenta_corriente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cheque_cuenta_corriente_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cheque_cuenta_corriente_control) {
		
		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idbeneficiario_ocacional);
			jQuery("#tblstrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idbeneficiario_ocacional);
		}

		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcategoria_cheque").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idcategoria_cheque);
			jQuery("#tblstrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcategoria_cheque").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idcategoria_cheque);
		}

		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idcliente);
		}

		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idcuenta_corriente);
			jQuery("#tblstrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idcuenta_corriente);
		}

		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idejercicio);
		}

		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idempresa);
		}

		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idestado_deposito_retiro);
			jQuery("#tblstrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idestado_deposito_retiro);
		}

		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idperiodo);
		}

		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idproveedor);
		}

		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idsucursal);
		}

		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cheque_cuenta_corriente_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncheque_cuenta_corriente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cheque_cuenta_corriente",id,"cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cheque_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque_cuenta_corriente","empresa","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		cheque_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque_cuenta_corriente","sucursal","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		cheque_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque_cuenta_corriente","ejercicio","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		cheque_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque_cuenta_corriente","periodo","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		cheque_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque_cuenta_corriente","usuario","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}

	abrirBusquedaParacuenta_corriente(strNombreCampoBusqueda){//idActual
		cheque_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque_cuenta_corriente","cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}

	abrirBusquedaParacategoria_cheque(strNombreCampoBusqueda){//idActual
		cheque_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque_cuenta_corriente","categoria_cheque","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		cheque_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque_cuenta_corriente","cliente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		cheque_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque_cuenta_corriente","proveedor","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}

	abrirBusquedaParabeneficiario_ocacional_cheque(strNombreCampoBusqueda){//idActual
		cheque_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque_cuenta_corriente","beneficiario_ocacional_cheque","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}

	abrirBusquedaParaestado_deposito_retiro(strNombreCampoBusqueda){//idActual
		cheque_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cheque_cuenta_corriente","estado_deposito_retiro","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corrienteConstante,strParametros);
		
		//cheque_cuenta_corriente_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa",cheque_cuenta_corriente_control.empresasFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_2",cheque_cuenta_corriente_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal",cheque_cuenta_corriente_control.sucursalsFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_3",cheque_cuenta_corriente_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio",cheque_cuenta_corriente_control.ejerciciosFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_4",cheque_cuenta_corriente_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo",cheque_cuenta_corriente_control.periodosFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_5",cheque_cuenta_corriente_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario",cheque_cuenta_corriente_control.usuariosFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_6",cheque_cuenta_corriente_control.usuariosFK);
		}
	};

	cargarComboscuenta_corrientesFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente",cheque_cuenta_corriente_control.cuenta_corrientesFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_7",cheque_cuenta_corriente_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",cheque_cuenta_corriente_control.cuenta_corrientesFK);

	};

	cargarComboscategoria_chequesFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_categoria_cheque",cheque_cuenta_corriente_control.categoria_chequesFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_8",cheque_cuenta_corriente_control.categoria_chequesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque",cheque_cuenta_corriente_control.categoria_chequesFK);

	};

	cargarCombosclientesFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cliente",cheque_cuenta_corriente_control.clientesFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_9",cheque_cuenta_corriente_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",cheque_cuenta_corriente_control.clientesFK);

	};

	cargarCombosproveedorsFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_proveedor",cheque_cuenta_corriente_control.proveedorsFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_10",cheque_cuenta_corriente_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",cheque_cuenta_corriente_control.proveedorsFK);

	};

	cargarCombosbeneficiario_ocacional_chequesFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque",cheque_cuenta_corriente_control.beneficiario_ocacional_chequesFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_11",cheque_cuenta_corriente_control.beneficiario_ocacional_chequesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional-cmbid_beneficiario_ocacional_cheque",cheque_cuenta_corriente_control.beneficiario_ocacional_chequesFK);

	};

	cargarCombosestado_deposito_retirosFK(cheque_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro",cheque_cuenta_corriente_control.estado_deposito_retirosFK);

		if(cheque_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cheque_cuenta_corriente_control.idFilaTablaActual+"_20",cheque_cuenta_corriente_control.estado_deposito_retirosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro",cheque_cuenta_corriente_control.estado_deposito_retirosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombossucursalsFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeComboscategoria_chequesFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosclientesFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosbeneficiario_ocacional_chequesFK(cheque_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosestado_deposito_retirosFK(cheque_cuenta_corriente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idempresaDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != cheque_cuenta_corriente_control.idempresaDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(cheque_cuenta_corriente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idsucursalDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val() != cheque_cuenta_corriente_control.idsucursalDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val(cheque_cuenta_corriente_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idejercicioDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != cheque_cuenta_corriente_control.idejercicioDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(cheque_cuenta_corriente_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idperiodoDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != cheque_cuenta_corriente_control.idperiodoDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(cheque_cuenta_corriente_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idusuarioDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != cheque_cuenta_corriente_control.idusuarioDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(cheque_cuenta_corriente_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != cheque_cuenta_corriente_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(cheque_cuenta_corriente_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(cheque_cuenta_corriente_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_chequesFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idcategoria_chequeDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_categoria_cheque").val() != cheque_cuenta_corriente_control.idcategoria_chequeDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_categoria_cheque").val(cheque_cuenta_corriente_control.idcategoria_chequeDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val(cheque_cuenta_corriente_control.idcategoria_chequeDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcategoria_cheque-cmbid_categoria_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idclienteDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cliente").val() != cheque_cuenta_corriente_control.idclienteDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cliente").val(cheque_cuenta_corriente_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(cheque_cuenta_corriente_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idproveedorDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_proveedor").val() != cheque_cuenta_corriente_control.idproveedorDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_proveedor").val(cheque_cuenta_corriente_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(cheque_cuenta_corriente_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbeneficiario_ocacional_chequesFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idbeneficiario_ocacional_chequeDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque").val() != cheque_cuenta_corriente_control.idbeneficiario_ocacional_chequeDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque").val(cheque_cuenta_corriente_control.idbeneficiario_ocacional_chequeDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional-cmbid_beneficiario_ocacional_cheque").val(cheque_cuenta_corriente_control.idbeneficiario_ocacional_chequeDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional-cmbid_beneficiario_ocacional_cheque").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbeneficiario_ocacional-cmbid_beneficiario_ocacional_cheque").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestado_deposito_retirosFK(cheque_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cheque_cuenta_corriente_control.idestado_deposito_retiroDefaultFK>-1 && jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != cheque_cuenta_corriente_control.idestado_deposito_retiroDefaultFK) {
				jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(cheque_cuenta_corriente_control.idestado_deposito_retiroDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val(cheque_cuenta_corriente_control.idestado_deposito_retiroDefaultForeignKey).trigger("change");
			if(jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	









		jQuery("#form-id_estado_deposito_retiro").prop("disabled", habilitarDeshabilitar);

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cheque_cuenta_corriente_control
		
	
	}
	
	onLoadCombosDefectoFK(cheque_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cheque_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosempresasFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombossucursalsFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosejerciciosFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosperiodosFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosusuariosFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorComboscuenta_corrientesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorComboscategoria_chequesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosclientesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosproveedorsFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_beneficiario_ocacional_cheque",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosbeneficiario_ocacional_chequesFK(cheque_cuenta_corriente_control);
			}

			if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cheque_cuenta_corriente_webcontrol1.setDefectoValorCombosestado_deposito_retirosFK(cheque_cuenta_corriente_control);
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
	onLoadCombosEventosFK(cheque_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cheque_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosempresasFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombossucursalsFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosperiodosFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosusuariosFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_cheque",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeComboscategoria_chequesFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosclientesFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosproveedorsFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_beneficiario_ocacional_cheque",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosbeneficiario_ocacional_chequesFK(cheque_cuenta_corriente_control);
			//}

			//if(cheque_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",cheque_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cheque_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosestado_deposito_retirosFK(cheque_cuenta_corriente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cheque_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cheque_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cheque_cuenta_corriente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque_cuenta_corriente","FK_Idbeneficiario_ocacional","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque_cuenta_corriente","FK_Idcategoria_cheque","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque_cuenta_corriente","FK_Idcliente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque_cuenta_corriente","FK_Idcuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque_cuenta_corriente","FK_Idejercicio","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque_cuenta_corriente","FK_Idempresa","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque_cuenta_corriente","FK_Idestado_deposito_retiro","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque_cuenta_corriente","FK_Idperiodo","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque_cuenta_corriente","FK_Idproveedor","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque_cuenta_corriente","FK_Idsucursal","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cheque_cuenta_corriente","FK_Idusuario","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
		
			
			if(cheque_cuenta_corriente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cheque_cuenta_corriente");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cheque_cuenta_corriente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(cheque_cuenta_corriente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,"cheque_cuenta_corriente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_cheque","id_categoria_cheque","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_categoria_cheque_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParacategoria_cheque("id_categoria_cheque");
				//alert(jQuery('#form-id_categoria_cheque_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("beneficiario_ocacional_cheque","id_beneficiario_ocacional_cheque","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_beneficiario_ocacional_cheque_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParabeneficiario_ocacional_cheque("id_beneficiario_ocacional_cheque");
				//alert(jQuery('#form-id_beneficiario_ocacional_cheque_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado_deposito_retiro","id_estado_deposito_retiro","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cheque_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro_img_busqueda").click(function(){
				cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaestado_deposito_retiro("id_estado_deposito_retiro");
				//alert(jQuery('#form-id_estado_deposito_retiro_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cheque_cuenta_corriente_control) {
		
		jQuery("#divBusquedacheque_cuenta_corrienteAjaxWebPart").css("display",cheque_cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trcheque_cuenta_corrienteCabeceraBusquedas").css("display",cheque_cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trBusquedacheque_cuenta_corriente").css("display",cheque_cuenta_corriente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecheque_cuenta_corriente").css("display",cheque_cuenta_corriente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscheque_cuenta_corriente").attr("style",cheque_cuenta_corriente_control.strPermisoMostrarTodos);		
		
		if(cheque_cuenta_corriente_control.strPermisoNuevo!=null) {
			jQuery("#tdcheque_cuenta_corrienteNuevo").css("display",cheque_cuenta_corriente_control.strPermisoNuevo);
			jQuery("#tdcheque_cuenta_corrienteNuevoToolBar").css("display",cheque_cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcheque_cuenta_corrienteDuplicar").css("display",cheque_cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcheque_cuenta_corrienteDuplicarToolBar").css("display",cheque_cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcheque_cuenta_corrienteNuevoGuardarCambios").css("display",cheque_cuenta_corriente_control.strPermisoNuevo);
			jQuery("#tdcheque_cuenta_corrienteNuevoGuardarCambiosToolBar").css("display",cheque_cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cheque_cuenta_corriente_control.strPermisoActualizar!=null) {
			jQuery("#tdcheque_cuenta_corrienteCopiar").css("display",cheque_cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcheque_cuenta_corrienteCopiarToolBar").css("display",cheque_cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcheque_cuenta_corrienteConEditar").css("display",cheque_cuenta_corriente_control.strPermisoActualizar);
		}
		
		jQuery("#tdcheque_cuenta_corrienteGuardarCambios").css("display",cheque_cuenta_corriente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcheque_cuenta_corrienteGuardarCambiosToolBar").css("display",cheque_cuenta_corriente_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcheque_cuenta_corrienteCerrarPagina").css("display",cheque_cuenta_corriente_control.strPermisoPopup);		
		jQuery("#tdcheque_cuenta_corrienteCerrarPaginaToolBar").css("display",cheque_cuenta_corriente_control.strPermisoPopup);
		//jQuery("#trcheque_cuenta_corrienteAccionesRelaciones").css("display",cheque_cuenta_corriente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cheque_cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cheque_cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cheque_cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cheques";
		sTituloBanner+=" - " + cheque_cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cheque_cuenta_corriente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcheque_cuenta_corrienteRelacionesToolBar").css("display",cheque_cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscheque_cuenta_corriente").css("display",cheque_cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cheque_cuenta_corriente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cheque_cuenta_corriente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cheque_cuenta_corriente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cheque_cuenta_corriente_webcontrol1.registrarEventosControles();
		
		if(cheque_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cheque_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			cheque_cuenta_corriente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cheque_cuenta_corriente_constante1.STR_ES_RELACIONES=="true") {
			if(cheque_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				cheque_cuenta_corriente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cheque_cuenta_corriente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cheque_cuenta_corriente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cheque_cuenta_corriente_webcontrol1.onLoad();
			
			//} else {
				//if(cheque_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			cheque_cuenta_corriente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cheque_cuenta_corriente","cuentascorrientes","",cheque_cuenta_corriente_funcion1,cheque_cuenta_corriente_webcontrol1,cheque_cuenta_corriente_constante1);	
	}
}

var cheque_cuenta_corriente_webcontrol1 = new cheque_cuenta_corriente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cheque_cuenta_corriente_webcontrol,cheque_cuenta_corriente_webcontrol1};

//Para ser llamado desde window.opener
window.cheque_cuenta_corriente_webcontrol1 = cheque_cuenta_corriente_webcontrol1;


if(cheque_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cheque_cuenta_corriente_webcontrol1.onLoadWindow; 
}

//</script>