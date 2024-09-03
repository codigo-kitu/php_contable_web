//<script type="text/javascript" language="javascript">



//var forma_pago_proveedorJQueryPaginaWebInteraccion= function (forma_pago_proveedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {forma_pago_proveedor_constante,forma_pago_proveedor_constante1} from '../util/forma_pago_proveedor_constante.js';

import {forma_pago_proveedor_funcion,forma_pago_proveedor_funcion1} from '../util/forma_pago_proveedor_funcion.js';


class forma_pago_proveedor_webcontrol extends GeneralEntityWebControl {
	
	forma_pago_proveedor_control=null;
	forma_pago_proveedor_controlInicial=null;
	forma_pago_proveedor_controlAuxiliar=null;
		
	//if(forma_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(forma_pago_proveedor_control) {
		super();
		
		this.forma_pago_proveedor_control=forma_pago_proveedor_control;
	}
		
	actualizarVariablesPagina(forma_pago_proveedor_control) {
		
		if(forma_pago_proveedor_control.action=="index" || forma_pago_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(forma_pago_proveedor_control);
			
		} 
		
		
		else if(forma_pago_proveedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(forma_pago_proveedor_control);
			
		} else if(forma_pago_proveedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(forma_pago_proveedor_control);
			
		} else if(forma_pago_proveedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(forma_pago_proveedor_control);		
		
		} else if(forma_pago_proveedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(forma_pago_proveedor_control);
		
		}  else if(forma_pago_proveedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(forma_pago_proveedor_control);
		
		} else if(forma_pago_proveedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(forma_pago_proveedor_control);		
		
		} else if(forma_pago_proveedor_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(forma_pago_proveedor_control);		
		
		} else if(forma_pago_proveedor_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(forma_pago_proveedor_control);		
		
		} else if(forma_pago_proveedor_control.action.includes("Busqueda") ||
				  forma_pago_proveedor_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(forma_pago_proveedor_control);
			
		} else if(forma_pago_proveedor_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(forma_pago_proveedor_control)
		}
		
		
		
	
		else if(forma_pago_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(forma_pago_proveedor_control);	
		
		} else if(forma_pago_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(forma_pago_proveedor_control);		
		}
	
		else if(forma_pago_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(forma_pago_proveedor_control);		
		}
	
		else if(forma_pago_proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(forma_pago_proveedor_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + forma_pago_proveedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(forma_pago_proveedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(forma_pago_proveedor_control) {
		this.actualizarPaginaAccionesGenerales(forma_pago_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(forma_pago_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(forma_pago_proveedor_control);
		this.actualizarPaginaOrderBy(forma_pago_proveedor_control);
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(forma_pago_proveedor_control);
		//this.actualizarPaginaFormulario(forma_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(forma_pago_proveedor_control);
		this.actualizarPaginaAreaBusquedas(forma_pago_proveedor_control);
		this.actualizarPaginaCargaCombosFK(forma_pago_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(forma_pago_proveedor_control) {
		//this.actualizarPaginaFormulario(forma_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(forma_pago_proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(forma_pago_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(forma_pago_proveedor_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(forma_pago_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(forma_pago_proveedor_control);
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(forma_pago_proveedor_control);
		//this.actualizarPaginaFormulario(forma_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(forma_pago_proveedor_control);
		this.actualizarPaginaAreaBusquedas(forma_pago_proveedor_control);
		this.actualizarPaginaCargaCombosFK(forma_pago_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);		
		//this.actualizarPaginaFormulario(forma_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);		
		//this.actualizarPaginaFormulario(forma_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);		
		//this.actualizarPaginaFormulario(forma_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(forma_pago_proveedor_control) {
		//this.actualizarPaginaFormulario(forma_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(forma_pago_proveedor_control) {
		this.actualizarPaginaAbrirLink(forma_pago_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);				
		//this.actualizarPaginaFormulario(forma_pago_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);
		//this.actualizarPaginaFormulario(forma_pago_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);
		//this.actualizarPaginaFormulario(forma_pago_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(forma_pago_proveedor_control) {
		//this.actualizarPaginaFormulario(forma_pago_proveedor_control);
		this.onLoadCombosDefectoFK(forma_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);
		//this.actualizarPaginaFormulario(forma_pago_proveedor_control);
		this.onLoadCombosDefectoFK(forma_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(forma_pago_proveedor_control) {
		this.actualizarPaginaAbrirLink(forma_pago_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(forma_pago_proveedor_control) {
					//super.actualizarPaginaImprimir(forma_pago_proveedor_control,"forma_pago_proveedor");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",forma_pago_proveedor_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("forma_pago_proveedor_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(forma_pago_proveedor_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(forma_pago_proveedor_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(forma_pago_proveedor_control) {
		//super.actualizarPaginaImprimir(forma_pago_proveedor_control,"forma_pago_proveedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("forma_pago_proveedor_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(forma_pago_proveedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",forma_pago_proveedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(forma_pago_proveedor_control) {
		//super.actualizarPaginaImprimir(forma_pago_proveedor_control,"forma_pago_proveedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("forma_pago_proveedor_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(forma_pago_proveedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",forma_pago_proveedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(forma_pago_proveedor_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(forma_pago_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(forma_pago_proveedor_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(forma_pago_proveedor_control);
			
		this.actualizarPaginaAbrirLink(forma_pago_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(forma_pago_proveedor_control) {
		this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);
		this.actualizarPaginaFormulario(forma_pago_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(forma_pago_proveedor_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(forma_pago_proveedor_control) {
		
		if(forma_pago_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(forma_pago_proveedor_control);
		}
		
		if(forma_pago_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(forma_pago_proveedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(forma_pago_proveedor_control) {
		if(forma_pago_proveedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("forma_pago_proveedorReturnGeneral",JSON.stringify(forma_pago_proveedor_control.forma_pago_proveedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(forma_pago_proveedor_control) {
		if(forma_pago_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && forma_pago_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(forma_pago_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(forma_pago_proveedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(forma_pago_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			forma_pago_proveedor_funcion1.resaltarRestaurarDivsPagina(false,"forma_pago_proveedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				forma_pago_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false,"forma_pago_proveedor");
			}			
			
			forma_pago_proveedor_funcion1.mostrarDivMensaje(true,forma_pago_proveedor_control.strAuxiliarMensaje,forma_pago_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			forma_pago_proveedor_funcion1.mostrarDivMensaje(false,forma_pago_proveedor_control.strAuxiliarMensaje,forma_pago_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(forma_pago_proveedor_control) {
		if(forma_pago_proveedor_funcion1.esPaginaForm(forma_pago_proveedor_constante1)==true) {
			window.opener.forma_pago_proveedor_webcontrol1.actualizarPaginaTablaDatos(forma_pago_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(forma_pago_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(forma_pago_proveedor_control) {
		forma_pago_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(forma_pago_proveedor_control.strAuxiliarUrlPagina);
				
		forma_pago_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(forma_pago_proveedor_control.strAuxiliarTipo,forma_pago_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(forma_pago_proveedor_control) {
		forma_pago_proveedor_funcion1.resaltarRestaurarDivMensaje(true,forma_pago_proveedor_control.strAuxiliarMensajeAlert,forma_pago_proveedor_control.strAuxiliarCssMensaje);
			
		if(forma_pago_proveedor_funcion1.esPaginaForm(forma_pago_proveedor_constante1)==true) {
			window.opener.forma_pago_proveedor_funcion1.resaltarRestaurarDivMensaje(true,forma_pago_proveedor_control.strAuxiliarMensajeAlert,forma_pago_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(forma_pago_proveedor_control) {
		this.forma_pago_proveedor_controlInicial=forma_pago_proveedor_control;
			
		if(forma_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(forma_pago_proveedor_control.strStyleDivArbol,forma_pago_proveedor_control.strStyleDivContent
																,forma_pago_proveedor_control.strStyleDivOpcionesBanner,forma_pago_proveedor_control.strStyleDivExpandirColapsar
																,forma_pago_proveedor_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=forma_pago_proveedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",forma_pago_proveedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(forma_pago_proveedor_control) {
		this.actualizarCssBotonesPagina(forma_pago_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(forma_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(forma_pago_proveedor_control.tiposReportes,forma_pago_proveedor_control.tiposReporte
															 	,forma_pago_proveedor_control.tiposPaginacion,forma_pago_proveedor_control.tiposAcciones
																,forma_pago_proveedor_control.tiposColumnasSelect,forma_pago_proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(forma_pago_proveedor_control.tiposRelaciones,forma_pago_proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(forma_pago_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(forma_pago_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(forma_pago_proveedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(forma_pago_proveedor_control) {
	
		var indexPosition=forma_pago_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=forma_pago_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(forma_pago_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 
				forma_pago_proveedor_webcontrol1.cargarCombosempresasFK(forma_pago_proveedor_control);
			}

			if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 
				forma_pago_proveedor_webcontrol1.cargarCombostipo_forma_pagosFK(forma_pago_proveedor_control);
			}

			if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 
				forma_pago_proveedor_webcontrol1.cargarComboscuentasFK(forma_pago_proveedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(forma_pago_proveedor_control.strRecargarFkTiposNinguno!=null && forma_pago_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && forma_pago_proveedor_control.strRecargarFkTiposNinguno!='') {
			
				if(forma_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					forma_pago_proveedor_webcontrol1.cargarCombosempresasFK(forma_pago_proveedor_control);
				}

				if(forma_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					forma_pago_proveedor_webcontrol1.cargarCombostipo_forma_pagosFK(forma_pago_proveedor_control);
				}

				if(forma_pago_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					forma_pago_proveedor_webcontrol1.cargarComboscuentasFK(forma_pago_proveedor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(forma_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,forma_pago_proveedor_funcion1,forma_pago_proveedor_control.empresasFK);
	}

	cargarComboEditarTablatipo_forma_pagoFK(forma_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,forma_pago_proveedor_funcion1,forma_pago_proveedor_control.tipo_forma_pagosFK);
	}

	cargarComboEditarTablacuentaFK(forma_pago_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,forma_pago_proveedor_funcion1,forma_pago_proveedor_control.cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(forma_pago_proveedor_control) {
		jQuery("#divBusquedaforma_pago_proveedorAjaxWebPart").css("display",forma_pago_proveedor_control.strPermisoBusqueda);
		jQuery("#trforma_pago_proveedorCabeceraBusquedas").css("display",forma_pago_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedaforma_pago_proveedor").css("display",forma_pago_proveedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(forma_pago_proveedor_control.htmlTablaOrderBy!=null
			&& forma_pago_proveedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByforma_pago_proveedorAjaxWebPart").html(forma_pago_proveedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//forma_pago_proveedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(forma_pago_proveedor_control.htmlTablaOrderByRel!=null
			&& forma_pago_proveedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelforma_pago_proveedorAjaxWebPart").html(forma_pago_proveedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(forma_pago_proveedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaforma_pago_proveedorAjaxWebPart").css("display","none");
			jQuery("#trforma_pago_proveedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaforma_pago_proveedor").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(forma_pago_proveedor_control) {
		
		if(!forma_pago_proveedor_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(forma_pago_proveedor_control);
		} else {
			jQuery("#divTablaDatosforma_pago_proveedorsAjaxWebPart").html(forma_pago_proveedor_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosforma_pago_proveedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(forma_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosforma_pago_proveedors=jQuery("#tblTablaDatosforma_pago_proveedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("forma_pago_proveedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',forma_pago_proveedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			forma_pago_proveedor_webcontrol1.registrarControlesTableEdition(forma_pago_proveedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		forma_pago_proveedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(forma_pago_proveedor_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("forma_pago_proveedor_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(forma_pago_proveedor_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosforma_pago_proveedorsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(forma_pago_proveedor_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(forma_pago_proveedor_control);
		
		const divOrderBy = document.getElementById("divOrderByforma_pago_proveedorAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(forma_pago_proveedor_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelforma_pago_proveedorAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(forma_pago_proveedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(forma_pago_proveedor_control.forma_pago_proveedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(forma_pago_proveedor_control);			
		}
	}
	
	actualizarCamposFilaTabla(forma_pago_proveedor_control) {
		var i=0;
		
		i=forma_pago_proveedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(forma_pago_proveedor_control.forma_pago_proveedorActual.id);
		jQuery("#t-version_row_"+i+"").val(forma_pago_proveedor_control.forma_pago_proveedorActual.versionRow);
		
		if(forma_pago_proveedor_control.forma_pago_proveedorActual.id_empresa!=null && forma_pago_proveedor_control.forma_pago_proveedorActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != forma_pago_proveedor_control.forma_pago_proveedorActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(forma_pago_proveedor_control.forma_pago_proveedorActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(forma_pago_proveedor_control.forma_pago_proveedorActual.id_tipo_forma_pago!=null && forma_pago_proveedor_control.forma_pago_proveedorActual.id_tipo_forma_pago>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != forma_pago_proveedor_control.forma_pago_proveedorActual.id_tipo_forma_pago) {
				jQuery("#t-cel_"+i+"_3").val(forma_pago_proveedor_control.forma_pago_proveedorActual.id_tipo_forma_pago).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(forma_pago_proveedor_control.forma_pago_proveedorActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(forma_pago_proveedor_control.forma_pago_proveedorActual.nombre);
		jQuery("#t-cel_"+i+"_6").prop('checked',forma_pago_proveedor_control.forma_pago_proveedorActual.predeterminado);
		
		if(forma_pago_proveedor_control.forma_pago_proveedorActual.id_cuenta!=null && forma_pago_proveedor_control.forma_pago_proveedorActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != forma_pago_proveedor_control.forma_pago_proveedorActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_7").val(forma_pago_proveedor_control.forma_pago_proveedorActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_7").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(forma_pago_proveedor_control.forma_pago_proveedorActual.cuenta_contable);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(forma_pago_proveedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondebito_cuenta_pagar").click(function(){
		jQuery("#tblTablaDatosforma_pago_proveedors").on("click",".imgrelaciondebito_cuenta_pagar", function () {

			var idActual=jQuery(this).attr("idactualforma_pago_proveedor");

			forma_pago_proveedor_webcontrol1.registrarSesionParadebito_cuenta_pagars(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionpago_cuenta_pagar").click(function(){
		jQuery("#tblTablaDatosforma_pago_proveedors").on("click",".imgrelacionpago_cuenta_pagar", function () {

			var idActual=jQuery(this).attr("idactualforma_pago_proveedor");

			forma_pago_proveedor_webcontrol1.registrarSesionParapago_cuenta_pagars(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondocumento_cuenta_pagar").click(function(){
		jQuery("#tblTablaDatosforma_pago_proveedors").on("click",".imgrelaciondocumento_cuenta_pagar", function () {

			var idActual=jQuery(this).attr("idactualforma_pago_proveedor");

			forma_pago_proveedor_webcontrol1.registrarSesionParadocumento_cuenta_pagares(idActual);
		});				
	}
		
	

	registrarSesionParadebito_cuenta_pagars(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"forma_pago_proveedor","debito_cuenta_pagar","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1,"s","");
	}

	registrarSesionParapago_cuenta_pagars(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"forma_pago_proveedor","pago_cuenta_pagar","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1,"s","");
	}

	registrarSesionParadocumento_cuenta_pagares(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"forma_pago_proveedor","documento_cuenta_pagar","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1,"es","");
	}
	
	registrarControlesTableEdition(forma_pago_proveedor_control) {
		forma_pago_proveedor_funcion1.registrarControlesTableValidacionEdition(forma_pago_proveedor_control,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(forma_pago_proveedor_control) {
		jQuery("#divResumenforma_pago_proveedorActualAjaxWebPart").html(forma_pago_proveedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(forma_pago_proveedor_control) {
		//jQuery("#divAccionesRelacionesforma_pago_proveedorAjaxWebPart").html(forma_pago_proveedor_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("forma_pago_proveedor_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(forma_pago_proveedor_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesforma_pago_proveedorAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		forma_pago_proveedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(forma_pago_proveedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(forma_pago_proveedor_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(forma_pago_proveedor_control) {
		
		if(forma_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",forma_pago_proveedor_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",forma_pago_proveedor_control.strVisibleFK_Idcuenta);
		}

		if(forma_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",forma_pago_proveedor_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",forma_pago_proveedor_control.strVisibleFK_Idempresa);
		}

		if(forma_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago").attr("style",forma_pago_proveedor_control.strVisibleFK_Idtipo_forma_pago);
			jQuery("#tblstrVisible"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago").attr("style",forma_pago_proveedor_control.strVisibleFK_Idtipo_forma_pago);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionforma_pago_proveedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("forma_pago_proveedor",id,"cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		forma_pago_proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("forma_pago_proveedor","empresa","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
	}

	abrirBusquedaParatipo_forma_pago(strNombreCampoBusqueda){//idActual
		forma_pago_proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("forma_pago_proveedor","tipo_forma_pago","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		forma_pago_proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("forma_pago_proveedor","cuenta","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelaciondebito_cuenta_pagar").click(function(){

			var idActual=jQuery(this).attr("idactualforma_pago_proveedor");

			forma_pago_proveedor_webcontrol1.registrarSesionParadebito_cuenta_pagars(idActual);
		});
		jQuery("#imgdivrelacionpago_cuenta_pagar").click(function(){

			var idActual=jQuery(this).attr("idactualforma_pago_proveedor");

			forma_pago_proveedor_webcontrol1.registrarSesionParapago_cuenta_pagars(idActual);
		});
		jQuery("#imgdivrelaciondocumento_cuenta_pagar").click(function(){

			var idActual=jQuery(this).attr("idactualforma_pago_proveedor");

			forma_pago_proveedor_webcontrol1.registrarSesionParadocumento_cuenta_pagares(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedorConstante,strParametros);
		
		//forma_pago_proveedor_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(forma_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa",forma_pago_proveedor_control.empresasFK);

		if(forma_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+forma_pago_proveedor_control.idFilaTablaActual+"_2",forma_pago_proveedor_control.empresasFK);
		}
	};

	cargarCombostipo_forma_pagosFK(forma_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_forma_pago",forma_pago_proveedor_control.tipo_forma_pagosFK);

		if(forma_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+forma_pago_proveedor_control.idFilaTablaActual+"_3",forma_pago_proveedor_control.tipo_forma_pagosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago",forma_pago_proveedor_control.tipo_forma_pagosFK);

	};

	cargarComboscuentasFK(forma_pago_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta",forma_pago_proveedor_control.cuentasFK);

		if(forma_pago_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+forma_pago_proveedor_control.idFilaTablaActual+"_7",forma_pago_proveedor_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",forma_pago_proveedor_control.cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(forma_pago_proveedor_control) {

	};

	registrarComboActionChangeCombostipo_forma_pagosFK(forma_pago_proveedor_control) {

	};

	registrarComboActionChangeComboscuentasFK(forma_pago_proveedor_control) {

	};

	
	
	setDefectoValorCombosempresasFK(forma_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(forma_pago_proveedor_control.idempresaDefaultFK>-1 && jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val() != forma_pago_proveedor_control.idempresaDefaultFK) {
				jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa").val(forma_pago_proveedor_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_forma_pagosFK(forma_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(forma_pago_proveedor_control.idtipo_forma_pagoDefaultFK>-1 && jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val() != forma_pago_proveedor_control.idtipo_forma_pagoDefaultFK) {
				jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_forma_pago").val(forma_pago_proveedor_control.idtipo_forma_pagoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago").val(forma_pago_proveedor_control.idtipo_forma_pagoDefaultForeignKey).trigger("change");
			if(jQuery("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idtipo_forma_pago-cmbid_tipo_forma_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(forma_pago_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(forma_pago_proveedor_control.idcuentaDefaultFK>-1 && jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val() != forma_pago_proveedor_control.idcuentaDefaultFK) {
				jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta").val(forma_pago_proveedor_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(forma_pago_proveedor_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+forma_pago_proveedor_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//forma_pago_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(forma_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(forma_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 
				forma_pago_proveedor_webcontrol1.setDefectoValorCombosempresasFK(forma_pago_proveedor_control);
			}

			if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 
				forma_pago_proveedor_webcontrol1.setDefectoValorCombostipo_forma_pagosFK(forma_pago_proveedor_control);
			}

			if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 
				forma_pago_proveedor_webcontrol1.setDefectoValorComboscuentasFK(forma_pago_proveedor_control);
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
	onLoadCombosEventosFK(forma_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(forma_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				forma_pago_proveedor_webcontrol1.registrarComboActionChangeCombosempresasFK(forma_pago_proveedor_control);
			//}

			//if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_forma_pago",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				forma_pago_proveedor_webcontrol1.registrarComboActionChangeCombostipo_forma_pagosFK(forma_pago_proveedor_control);
			//}

			//if(forma_pago_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",forma_pago_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				forma_pago_proveedor_webcontrol1.registrarComboActionChangeComboscuentasFK(forma_pago_proveedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(forma_pago_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(forma_pago_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(forma_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(forma_pago_proveedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("forma_pago_proveedor","FK_Idcuenta","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("forma_pago_proveedor","FK_Idempresa","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("forma_pago_proveedor","FK_Idtipo_forma_pago","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
		
			
			if(forma_pago_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("forma_pago_proveedor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("forma_pago_proveedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(forma_pago_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,"forma_pago_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				forma_pago_proveedor_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_forma_pago","id_tipo_forma_pago","general","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_tipo_forma_pago_img_busqueda").click(function(){
				forma_pago_proveedor_webcontrol1.abrirBusquedaParatipo_forma_pago("id_tipo_forma_pago");
				//alert(jQuery('#form-id_tipo_forma_pago_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+forma_pago_proveedor_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				forma_pago_proveedor_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("forma_pago_proveedor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(forma_pago_proveedor_control) {
		
		jQuery("#divBusquedaforma_pago_proveedorAjaxWebPart").css("display",forma_pago_proveedor_control.strPermisoBusqueda);
		jQuery("#trforma_pago_proveedorCabeceraBusquedas").css("display",forma_pago_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedaforma_pago_proveedor").css("display",forma_pago_proveedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteforma_pago_proveedor").css("display",forma_pago_proveedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosforma_pago_proveedor").attr("style",forma_pago_proveedor_control.strPermisoMostrarTodos);		
		
		if(forma_pago_proveedor_control.strPermisoNuevo!=null) {
			jQuery("#tdforma_pago_proveedorNuevo").css("display",forma_pago_proveedor_control.strPermisoNuevo);
			jQuery("#tdforma_pago_proveedorNuevoToolBar").css("display",forma_pago_proveedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdforma_pago_proveedorDuplicar").css("display",forma_pago_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdforma_pago_proveedorDuplicarToolBar").css("display",forma_pago_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdforma_pago_proveedorNuevoGuardarCambios").css("display",forma_pago_proveedor_control.strPermisoNuevo);
			jQuery("#tdforma_pago_proveedorNuevoGuardarCambiosToolBar").css("display",forma_pago_proveedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(forma_pago_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdforma_pago_proveedorCopiar").css("display",forma_pago_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdforma_pago_proveedorCopiarToolBar").css("display",forma_pago_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdforma_pago_proveedorConEditar").css("display",forma_pago_proveedor_control.strPermisoActualizar);
		}
		
		jQuery("#tdforma_pago_proveedorGuardarCambios").css("display",forma_pago_proveedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdforma_pago_proveedorGuardarCambiosToolBar").css("display",forma_pago_proveedor_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdforma_pago_proveedorCerrarPagina").css("display",forma_pago_proveedor_control.strPermisoPopup);		
		jQuery("#tdforma_pago_proveedorCerrarPaginaToolBar").css("display",forma_pago_proveedor_control.strPermisoPopup);
		//jQuery("#trforma_pago_proveedorAccionesRelaciones").css("display",forma_pago_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=forma_pago_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + forma_pago_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + forma_pago_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Forma Pago Proveedores";
		sTituloBanner+=" - " + forma_pago_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + forma_pago_proveedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdforma_pago_proveedorRelacionesToolBar").css("display",forma_pago_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosforma_pago_proveedor").css("display",forma_pago_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		forma_pago_proveedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		forma_pago_proveedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		forma_pago_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		forma_pago_proveedor_webcontrol1.registrarEventosControles();
		
		if(forma_pago_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(forma_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			forma_pago_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(forma_pago_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(forma_pago_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				forma_pago_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(forma_pago_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(forma_pago_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				forma_pago_proveedor_webcontrol1.onLoad();
			
			//} else {
				//if(forma_pago_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			forma_pago_proveedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("forma_pago_proveedor","cuentaspagar","",forma_pago_proveedor_funcion1,forma_pago_proveedor_webcontrol1,forma_pago_proveedor_constante1);	
	}
}

var forma_pago_proveedor_webcontrol1 = new forma_pago_proveedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {forma_pago_proveedor_webcontrol,forma_pago_proveedor_webcontrol1};

//Para ser llamado desde window.opener
window.forma_pago_proveedor_webcontrol1 = forma_pago_proveedor_webcontrol1;


if(forma_pago_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = forma_pago_proveedor_webcontrol1.onLoadWindow; 
}

//</script>