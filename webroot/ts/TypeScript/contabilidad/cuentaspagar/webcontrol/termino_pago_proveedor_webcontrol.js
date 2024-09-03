//<script type="text/javascript" language="javascript">



//var termino_pago_proveedorJQueryPaginaWebInteraccion= function (termino_pago_proveedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {termino_pago_proveedor_constante,termino_pago_proveedor_constante1} from '../util/termino_pago_proveedor_constante.js';

import {termino_pago_proveedor_funcion,termino_pago_proveedor_funcion1} from '../util/termino_pago_proveedor_funcion.js';


class termino_pago_proveedor_webcontrol extends GeneralEntityWebControl {
	
	termino_pago_proveedor_control=null;
	termino_pago_proveedor_controlInicial=null;
	termino_pago_proveedor_controlAuxiliar=null;
		
	//if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(termino_pago_proveedor_control) {
		super();
		
		this.termino_pago_proveedor_control=termino_pago_proveedor_control;
	}
		
	actualizarVariablesPagina(termino_pago_proveedor_control) {
		
		if(termino_pago_proveedor_control.action=="index" || termino_pago_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(termino_pago_proveedor_control);
			
		} 
		
		
		else if(termino_pago_proveedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(termino_pago_proveedor_control);
			
		} else if(termino_pago_proveedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(termino_pago_proveedor_control);
			
		} else if(termino_pago_proveedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(termino_pago_proveedor_control);		
		
		} else if(termino_pago_proveedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(termino_pago_proveedor_control);
		
		}  else if(termino_pago_proveedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(termino_pago_proveedor_control);
		
		} else if(termino_pago_proveedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(termino_pago_proveedor_control);		
		
		} else if(termino_pago_proveedor_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(termino_pago_proveedor_control);		
		
		} else if(termino_pago_proveedor_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(termino_pago_proveedor_control);		
		
		} else if(termino_pago_proveedor_control.action.includes("Busqueda") ||
				  termino_pago_proveedor_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(termino_pago_proveedor_control);
			
		} else if(termino_pago_proveedor_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(termino_pago_proveedor_control)
		}
		
		
		
	
		else if(termino_pago_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(termino_pago_proveedor_control);	
		
		} else if(termino_pago_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(termino_pago_proveedor_control);		
		}
	
		else if(termino_pago_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(termino_pago_proveedor_control);		
		}
	
		else if(termino_pago_proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(termino_pago_proveedor_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + termino_pago_proveedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(termino_pago_proveedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(termino_pago_proveedor_control) {
		this.actualizarPaginaAccionesGenerales(termino_pago_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(termino_pago_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(termino_pago_proveedor_control);
		this.actualizarPaginaOrderBy(termino_pago_proveedor_control);
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(termino_pago_proveedor_control);
		//this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(termino_pago_proveedor_control);
		this.actualizarPaginaAreaBusquedas(termino_pago_proveedor_control);
		this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(termino_pago_proveedor_control) {
		//this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(termino_pago_proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(termino_pago_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(termino_pago_proveedor_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(termino_pago_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(termino_pago_proveedor_control);
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(termino_pago_proveedor_control);
		//this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(termino_pago_proveedor_control);
		this.actualizarPaginaAreaBusquedas(termino_pago_proveedor_control);
		this.actualizarPaginaCargaCombosFK(termino_pago_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		//this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		//this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		//this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(termino_pago_proveedor_control) {
		//this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(termino_pago_proveedor_control) {
		this.actualizarPaginaAbrirLink(termino_pago_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);				
		//this.actualizarPaginaFormulario(termino_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		//this.actualizarPaginaFormulario(termino_pago_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		//this.actualizarPaginaFormulario(termino_pago_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(termino_pago_proveedor_control) {
		//this.actualizarPaginaFormulario(termino_pago_proveedor_control);
		this.onLoadCombosDefectoFK(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		//this.actualizarPaginaFormulario(termino_pago_proveedor_control);
		this.onLoadCombosDefectoFK(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(termino_pago_proveedor_control) {
		this.actualizarPaginaAbrirLink(termino_pago_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(termino_pago_proveedor_control) {
					//super.actualizarPaginaImprimir(termino_pago_proveedor_control,"termino_pago_proveedor");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",termino_pago_proveedor_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("termino_pago_proveedor_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(termino_pago_proveedor_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(termino_pago_proveedor_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(termino_pago_proveedor_control) {
		//super.actualizarPaginaImprimir(termino_pago_proveedor_control,"termino_pago_proveedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("termino_pago_proveedor_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(termino_pago_proveedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",termino_pago_proveedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(termino_pago_proveedor_control) {
		//super.actualizarPaginaImprimir(termino_pago_proveedor_control,"termino_pago_proveedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("termino_pago_proveedor_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(termino_pago_proveedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",termino_pago_proveedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(termino_pago_proveedor_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(termino_pago_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(termino_pago_proveedor_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(termino_pago_proveedor_control);
			
		this.actualizarPaginaAbrirLink(termino_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(termino_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		this.actualizarPaginaFormulario(termino_pago_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(termino_pago_proveedor_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(termino_pago_proveedor_control) {
		
		if(termino_pago_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(termino_pago_proveedor_control);
		}
		
		if(termino_pago_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(termino_pago_proveedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(termino_pago_proveedor_control) {
		if(termino_pago_proveedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("termino_pago_proveedorReturnGeneral",JSON.stringify(termino_pago_proveedor_control.termino_pago_proveedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(termino_pago_proveedor_control) {
		if(termino_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && termino_pago_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(termino_pago_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(termino_pago_proveedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(termino_pago_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			termino_pago_proveedor_funcion1.resaltarRestaurarDivsPagina(false,"termino_pago_proveedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				termino_pago_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false,"termino_pago_proveedor");
			}			
			
			termino_pago_proveedor_funcion1.mostrarDivMensaje(true,termino_pago_proveedor_control.strAuxiliarMensaje,termino_pago_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			termino_pago_proveedor_funcion1.mostrarDivMensaje(false,termino_pago_proveedor_control.strAuxiliarMensaje,termino_pago_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(termino_pago_proveedor_control) {
		if(termino_pago_proveedor_funcion1.esPaginaForm(termino_pago_proveedor_constante1)==true) {
			window.opener.termino_pago_proveedor_webcontrol1.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(termino_pago_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(termino_pago_proveedor_control) {
		termino_pago_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(termino_pago_proveedor_control.strAuxiliarUrlPagina);
				
		termino_pago_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(termino_pago_proveedor_control.strAuxiliarTipo,termino_pago_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(termino_pago_proveedor_control) {
		termino_pago_proveedor_funcion1.resaltarRestaurarDivMensaje(true,termino_pago_proveedor_control.strAuxiliarMensajeAlert,termino_pago_proveedor_control.strAuxiliarCssMensaje);
			
		if(termino_pago_proveedor_funcion1.esPaginaForm(termino_pago_proveedor_constante1)==true) {
			window.opener.termino_pago_proveedor_funcion1.resaltarRestaurarDivMensaje(true,termino_pago_proveedor_control.strAuxiliarMensajeAlert,termino_pago_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(termino_pago_proveedor_control) {
		this.termino_pago_proveedor_controlInicial=termino_pago_proveedor_control;
			
		if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(termino_pago_proveedor_control.strStyleDivArbol,termino_pago_proveedor_control.strStyleDivContent
																,termino_pago_proveedor_control.strStyleDivOpcionesBanner,termino_pago_proveedor_control.strStyleDivExpandirColapsar
																,termino_pago_proveedor_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=termino_pago_proveedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",termino_pago_proveedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(termino_pago_proveedor_control) {
		this.actualizarCssBotonesPagina(termino_pago_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(termino_pago_proveedor_control.tiposReportes,termino_pago_proveedor_control.tiposReporte
															 	,termino_pago_proveedor_control.tiposPaginacion,termino_pago_proveedor_control.tiposAcciones
																,termino_pago_proveedor_control.tiposColumnasSelect,termino_pago_proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(termino_pago_proveedor_control.tiposRelaciones,termino_pago_proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(termino_pago_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(termino_pago_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(termino_pago_proveedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(termino_pago_proveedor_control) {
	
		var indexPosition=termino_pago_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=termino_pago_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(termino_pago_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.cargarCombosempresasFK(termino_pago_proveedor_control);
			}

			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.cargarCombostipo_termino_pagosFK(termino_pago_proveedor_control);
			}

			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.cargarComboscuentasFK(termino_pago_proveedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(termino_pago_proveedor_control.strRecargarFkTiposNinguno!=null && termino_pago_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && termino_pago_proveedor_control.strRecargarFkTiposNinguno!='') {
			
				if(termino_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					termino_pago_proveedor_webcontrol1.cargarCombosempresasFK(termino_pago_proveedor_control);
				}

				if(termino_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					termino_pago_proveedor_webcontrol1.cargarCombostipo_termino_pagosFK(termino_pago_proveedor_control);
				}

				if(termino_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					termino_pago_proveedor_webcontrol1.cargarComboscuentasFK(termino_pago_proveedor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_tipo_termino_pago") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.termino_pago_proveedorActual.NONE!=null){
					if(jQuery("#form-NONE").val() != objetoController.termino_pago_proveedorActual.NONE) {
						jQuery("#form-NONE").val(objetoController.termino_pago_proveedorActual.NONE).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(termino_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,termino_pago_proveedor_funcion1,termino_pago_proveedor_control.empresasFK);
	}

	cargarComboEditarTablatipo_termino_pagoFK(termino_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,termino_pago_proveedor_funcion1,termino_pago_proveedor_control.tipo_termino_pagosFK);
	}

	cargarComboEditarTablacuentaFK(termino_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,termino_pago_proveedor_funcion1,termino_pago_proveedor_control.cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(termino_pago_proveedor_control) {
		jQuery("#divBusquedatermino_pago_proveedorAjaxWebPart").css("display",termino_pago_proveedor_control.strPermisoBusqueda);
		jQuery("#trtermino_pago_proveedorCabeceraBusquedas").css("display",termino_pago_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedatermino_pago_proveedor").css("display",termino_pago_proveedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(termino_pago_proveedor_control.htmlTablaOrderBy!=null
			&& termino_pago_proveedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytermino_pago_proveedorAjaxWebPart").html(termino_pago_proveedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//termino_pago_proveedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(termino_pago_proveedor_control.htmlTablaOrderByRel!=null
			&& termino_pago_proveedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltermino_pago_proveedorAjaxWebPart").html(termino_pago_proveedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatermino_pago_proveedorAjaxWebPart").css("display","none");
			jQuery("#trtermino_pago_proveedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatermino_pago_proveedor").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(termino_pago_proveedor_control) {
		
		if(!termino_pago_proveedor_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(termino_pago_proveedor_control);
		} else {
			jQuery("#divTablaDatostermino_pago_proveedorsAjaxWebPart").html(termino_pago_proveedor_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostermino_pago_proveedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostermino_pago_proveedors=jQuery("#tblTablaDatostermino_pago_proveedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("termino_pago_proveedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',termino_pago_proveedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			termino_pago_proveedor_webcontrol1.registrarControlesTableEdition(termino_pago_proveedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		termino_pago_proveedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(termino_pago_proveedor_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("termino_pago_proveedor_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(termino_pago_proveedor_control);
		
		const divTablaDatos = document.getElementById("divTablaDatostermino_pago_proveedorsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(termino_pago_proveedor_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(termino_pago_proveedor_control);
		
		const divOrderBy = document.getElementById("divOrderBytermino_pago_proveedorAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(termino_pago_proveedor_control);
		
		const divOrderByRel = document.getElementById("divOrderByReltermino_pago_proveedorAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(termino_pago_proveedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(termino_pago_proveedor_control);			
		}
	}
	
	actualizarCamposFilaTabla(termino_pago_proveedor_control) {
		var i=0;
		
		i=termino_pago_proveedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id);
		jQuery("#t-version_row_"+i+"").val(termino_pago_proveedor_control.termino_pago_proveedorActual.versionRow);
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa!=null && termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago!=null && termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago) {
				jQuery("#t-cel_"+i+"_3").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id_tipo_termino_pago).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(termino_pago_proveedor_control.termino_pago_proveedorActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(termino_pago_proveedor_control.termino_pago_proveedorActual.descripcion);
		jQuery("#t-cel_"+i+"_6").val(termino_pago_proveedor_control.termino_pago_proveedorActual.monto);
		jQuery("#t-cel_"+i+"_7").val(termino_pago_proveedor_control.termino_pago_proveedorActual.dias);
		jQuery("#t-cel_"+i+"_8").val(termino_pago_proveedor_control.termino_pago_proveedorActual.inicial);
		jQuery("#t-cel_"+i+"_9").val(termino_pago_proveedor_control.termino_pago_proveedorActual.cuotas);
		jQuery("#t-cel_"+i+"_10").val(termino_pago_proveedor_control.termino_pago_proveedorActual.descuento_pronto_pago);
		jQuery("#t-cel_"+i+"_11").prop('checked',termino_pago_proveedor_control.termino_pago_proveedorActual.predeterminado);
		
		if(termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta!=null && termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_12").val(termino_pago_proveedor_control.termino_pago_proveedorActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_13").val(termino_pago_proveedor_control.termino_pago_proveedorActual.cuenta_contable);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(termino_pago_proveedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatostermino_pago_proveedors").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParaproveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta_pagar").click(function(){
		jQuery("#tblTablaDatostermino_pago_proveedors").on("click",".imgrelacioncuenta_pagar", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParacuenta_pagars(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncotizacion").click(function(){
		jQuery("#tblTablaDatostermino_pago_proveedors").on("click",".imgrelacioncotizacion", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParacotizaciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionorden_compra").click(function(){
		jQuery("#tblTablaDatostermino_pago_proveedors").on("click",".imgrelacionorden_compra", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncredito_cuenta_pagar").click(function(){
		jQuery("#tblTablaDatostermino_pago_proveedors").on("click",".imgrelacioncredito_cuenta_pagar", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParacredito_cuenta_pagars(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionparametro_inventario").click(function(){
		jQuery("#tblTablaDatostermino_pago_proveedors").on("click",".imgrelacionparametro_inventario", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParaparametro_inventarios(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion").click(function(){
		jQuery("#tblTablaDatostermino_pago_proveedors").on("click",".imgrelaciondevolucion", function () {

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParadevoluciones(idActual);
		});				
	}
		
	

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_proveedor","proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1,"es","");
	}

	registrarSesionParacuenta_pagars(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_proveedor","cuenta_pagar","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1,"s","");
	}

	registrarSesionParacotizaciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_proveedor","cotizacion","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1,"es","");
	}

	registrarSesionParaorden_compras(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_proveedor","orden_compra","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1,"s","");
	}

	registrarSesionParacredito_cuenta_pagars(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_proveedor","credito_cuenta_pagar","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1,"s","");
	}

	registrarSesionParaparametro_inventarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_proveedor","parametro_inventario","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1,"s","");
	}

	registrarSesionParadevoluciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"termino_pago_proveedor","devolucion","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1,"es","");
	}
	
	registrarControlesTableEdition(termino_pago_proveedor_control) {
		termino_pago_proveedor_funcion1.registrarControlesTableValidacionEdition(termino_pago_proveedor_control,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(termino_pago_proveedor_control) {
		jQuery("#divResumentermino_pago_proveedorActualAjaxWebPart").html(termino_pago_proveedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(termino_pago_proveedor_control) {
		//jQuery("#divAccionesRelacionestermino_pago_proveedorAjaxWebPart").html(termino_pago_proveedor_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("termino_pago_proveedor_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(termino_pago_proveedor_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionestermino_pago_proveedorAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		termino_pago_proveedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(termino_pago_proveedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(termino_pago_proveedor_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(termino_pago_proveedor_control) {
		
		if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",termino_pago_proveedor_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",termino_pago_proveedor_control.strVisibleFK_Idcuenta);
		}

		if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",termino_pago_proveedor_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",termino_pago_proveedor_control.strVisibleFK_Idempresa);
		}

		if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago").attr("style",termino_pago_proveedor_control.strVisibleFK_Idtipo_termino_pago);
			jQuery("#tblstrVisible"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago").attr("style",termino_pago_proveedor_control.strVisibleFK_Idtipo_termino_pago);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontermino_pago_proveedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("termino_pago_proveedor",id,"cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		termino_pago_proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("termino_pago_proveedor","empresa","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}

	abrirBusquedaParatipo_termino_pago(strNombreCampoBusqueda){//idActual
		termino_pago_proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("termino_pago_proveedor","tipo_termino_pago","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		termino_pago_proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("termino_pago_proveedor","cuenta","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		jQuery("#imgdivrelacioncuenta_pagar").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParacuenta_pagars(idActual);
		});
		jQuery("#imgdivrelacioncotizacion").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParacotizaciones(idActual);
		});
		jQuery("#imgdivrelacionorden_compra").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParaorden_compras(idActual);
		});
		jQuery("#imgdivrelacioncredito_cuenta_pagar").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParacredito_cuenta_pagars(idActual);
		});
		jQuery("#imgdivrelacionparametro_inventario").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParaparametro_inventarios(idActual);
		});
		jQuery("#imgdivrelaciondevolucion").click(function(){

			var idActual=jQuery(this).attr("idactualtermino_pago_proveedor");

			termino_pago_proveedor_webcontrol1.registrarSesionParadevoluciones(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedorConstante,strParametros);
		
		//termino_pago_proveedor_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(termino_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa",termino_pago_proveedor_control.empresasFK);

		if(termino_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+termino_pago_proveedor_control.idFilaTablaActual+"_2",termino_pago_proveedor_control.empresasFK);
		}
	};

	cargarCombostipo_termino_pagosFK(termino_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago",termino_pago_proveedor_control.tipo_termino_pagosFK);

		if(termino_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+termino_pago_proveedor_control.idFilaTablaActual+"_3",termino_pago_proveedor_control.tipo_termino_pagosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago",termino_pago_proveedor_control.tipo_termino_pagosFK);

	};

	cargarComboscuentasFK(termino_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta",termino_pago_proveedor_control.cuentasFK);

		if(termino_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+termino_pago_proveedor_control.idFilaTablaActual+"_12",termino_pago_proveedor_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",termino_pago_proveedor_control.cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(termino_pago_proveedor_control) {

	};

	registrarComboActionChangeCombostipo_termino_pagosFK(termino_pago_proveedor_control) {
		this.registrarComboActionChangeid_tipo_termino_pago("form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago",false,0);


		this.registrarComboActionChangeid_tipo_termino_pago(""+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago",false,0);


	};

	registrarComboActionChangeComboscuentasFK(termino_pago_proveedor_control) {

	};

	
	
	setDefectoValorCombosempresasFK(termino_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(termino_pago_proveedor_control.idempresaDefaultFK>-1 && jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != termino_pago_proveedor_control.idempresaDefaultFK) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val(termino_pago_proveedor_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_termino_pagosFK(termino_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(termino_pago_proveedor_control.idtipo_termino_pagoDefaultFK>-1 && jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val() != termino_pago_proveedor_control.idtipo_termino_pagoDefaultFK) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago").val(termino_pago_proveedor_control.idtipo_termino_pagoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago").val(termino_pago_proveedor_control.idtipo_termino_pagoDefaultForeignKey).trigger("change");
			if(jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_termino_pago-cmbid_tipo_termino_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(termino_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(termino_pago_proveedor_control.idcuentaDefaultFK>-1 && jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != termino_pago_proveedor_control.idcuentaDefaultFK) {
				jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(termino_pago_proveedor_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(termino_pago_proveedor_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+termino_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_tipo_termino_pago(id_tipo_termino_pago,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("termino_pago_proveedor","cuentaspagar","","id_tipo_termino_pago",id_tipo_termino_pago,"","",paraEventoTabla,idFilaTabla,termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	



	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//termino_pago_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(termino_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(termino_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.setDefectoValorCombosempresasFK(termino_pago_proveedor_control);
			}

			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.setDefectoValorCombostipo_termino_pagosFK(termino_pago_proveedor_control);
			}

			if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 
				termino_pago_proveedor_webcontrol1.setDefectoValorComboscuentasFK(termino_pago_proveedor_control);
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
	onLoadCombosEventosFK(termino_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(termino_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				termino_pago_proveedor_webcontrol1.registrarComboActionChangeCombosempresasFK(termino_pago_proveedor_control);
			//}

			//if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_termino_pago",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				termino_pago_proveedor_webcontrol1.registrarComboActionChangeCombostipo_termino_pagosFK(termino_pago_proveedor_control);
			//}

			//if(termino_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",termino_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				termino_pago_proveedor_webcontrol1.registrarComboActionChangeComboscuentasFK(termino_pago_proveedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(termino_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(termino_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(termino_pago_proveedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("termino_pago_proveedor","FK_Idcuenta","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("termino_pago_proveedor","FK_Idempresa","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("termino_pago_proveedor","FK_Idtipo_termino_pago","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
		
			
			if(termino_pago_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("termino_pago_proveedor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("termino_pago_proveedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,"termino_pago_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				termino_pago_proveedor_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_termino_pago","id_tipo_termino_pago","general","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_termino_pago_img_busqueda").click(function(){
				termino_pago_proveedor_webcontrol1.abrirBusquedaParatipo_termino_pago("id_tipo_termino_pago");
				//alert(jQuery('#form-id_tipo_termino_pago_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+termino_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				termino_pago_proveedor_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("termino_pago_proveedor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(termino_pago_proveedor_control) {
		
		jQuery("#divBusquedatermino_pago_proveedorAjaxWebPart").css("display",termino_pago_proveedor_control.strPermisoBusqueda);
		jQuery("#trtermino_pago_proveedorCabeceraBusquedas").css("display",termino_pago_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedatermino_pago_proveedor").css("display",termino_pago_proveedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetermino_pago_proveedor").css("display",termino_pago_proveedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostermino_pago_proveedor").attr("style",termino_pago_proveedor_control.strPermisoMostrarTodos);		
		
		if(termino_pago_proveedor_control.strPermisoNuevo!=null) {
			jQuery("#tdtermino_pago_proveedorNuevo").css("display",termino_pago_proveedor_control.strPermisoNuevo);
			jQuery("#tdtermino_pago_proveedorNuevoToolBar").css("display",termino_pago_proveedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtermino_pago_proveedorDuplicar").css("display",termino_pago_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtermino_pago_proveedorDuplicarToolBar").css("display",termino_pago_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtermino_pago_proveedorNuevoGuardarCambios").css("display",termino_pago_proveedor_control.strPermisoNuevo);
			jQuery("#tdtermino_pago_proveedorNuevoGuardarCambiosToolBar").css("display",termino_pago_proveedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(termino_pago_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdtermino_pago_proveedorCopiar").css("display",termino_pago_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtermino_pago_proveedorCopiarToolBar").css("display",termino_pago_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtermino_pago_proveedorConEditar").css("display",termino_pago_proveedor_control.strPermisoActualizar);
		}
		
		jQuery("#tdtermino_pago_proveedorGuardarCambios").css("display",termino_pago_proveedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtermino_pago_proveedorGuardarCambiosToolBar").css("display",termino_pago_proveedor_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdtermino_pago_proveedorCerrarPagina").css("display",termino_pago_proveedor_control.strPermisoPopup);		
		jQuery("#tdtermino_pago_proveedorCerrarPaginaToolBar").css("display",termino_pago_proveedor_control.strPermisoPopup);
		//jQuery("#trtermino_pago_proveedorAccionesRelaciones").css("display",termino_pago_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=termino_pago_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + termino_pago_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + termino_pago_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Terminos Pago Proveedoreses";
		sTituloBanner+=" - " + termino_pago_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + termino_pago_proveedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtermino_pago_proveedorRelacionesToolBar").css("display",termino_pago_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostermino_pago_proveedor").css("display",termino_pago_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		termino_pago_proveedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		termino_pago_proveedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		termino_pago_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		termino_pago_proveedor_webcontrol1.registrarEventosControles();
		
		if(termino_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			termino_pago_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(termino_pago_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(termino_pago_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				termino_pago_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(termino_pago_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(termino_pago_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				termino_pago_proveedor_webcontrol1.onLoad();
			
			//} else {
				//if(termino_pago_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			termino_pago_proveedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("termino_pago_proveedor","cuentaspagar","",termino_pago_proveedor_funcion1,termino_pago_proveedor_webcontrol1,termino_pago_proveedor_constante1);	
	}
}

var termino_pago_proveedor_webcontrol1 = new termino_pago_proveedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {termino_pago_proveedor_webcontrol,termino_pago_proveedor_webcontrol1};

//Para ser llamado desde window.opener
window.termino_pago_proveedor_webcontrol1 = termino_pago_proveedor_webcontrol1;


if(termino_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = termino_pago_proveedor_webcontrol1.onLoadWindow; 
}

//</script>