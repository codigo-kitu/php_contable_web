//<script type="text/javascript" language="javascript">



//var giro_negocio_proveedorJQueryPaginaWebInteraccion= function (giro_negocio_proveedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {giro_negocio_proveedor_constante,giro_negocio_proveedor_constante1} from '../util/giro_negocio_proveedor_constante.js';

import {giro_negocio_proveedor_funcion,giro_negocio_proveedor_funcion1} from '../util/giro_negocio_proveedor_funcion.js';


class giro_negocio_proveedor_webcontrol extends GeneralEntityWebControl {
	
	giro_negocio_proveedor_control=null;
	giro_negocio_proveedor_controlInicial=null;
	giro_negocio_proveedor_controlAuxiliar=null;
		
	//if(giro_negocio_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(giro_negocio_proveedor_control) {
		super();
		
		this.giro_negocio_proveedor_control=giro_negocio_proveedor_control;
	}
		
	actualizarVariablesPagina(giro_negocio_proveedor_control) {
		
		if(giro_negocio_proveedor_control.action=="index" || giro_negocio_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(giro_negocio_proveedor_control);
			
		} 
		
		
		else if(giro_negocio_proveedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(giro_negocio_proveedor_control);
			
		} else if(giro_negocio_proveedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(giro_negocio_proveedor_control);
			
		} else if(giro_negocio_proveedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(giro_negocio_proveedor_control);		
		
		} else if(giro_negocio_proveedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(giro_negocio_proveedor_control);
		
		}  else if(giro_negocio_proveedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(giro_negocio_proveedor_control);
		
		} else if(giro_negocio_proveedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(giro_negocio_proveedor_control);		
		
		} else if(giro_negocio_proveedor_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(giro_negocio_proveedor_control);		
		
		} else if(giro_negocio_proveedor_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(giro_negocio_proveedor_control);		
		
		} else if(giro_negocio_proveedor_control.action.includes("Busqueda") ||
				  giro_negocio_proveedor_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(giro_negocio_proveedor_control);
			
		} else if(giro_negocio_proveedor_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(giro_negocio_proveedor_control)
		}
		
		
		
	
		else if(giro_negocio_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(giro_negocio_proveedor_control);	
		
		} else if(giro_negocio_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(giro_negocio_proveedor_control);		
		}
	
		else if(giro_negocio_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(giro_negocio_proveedor_control);		
		}
	
		else if(giro_negocio_proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(giro_negocio_proveedor_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + giro_negocio_proveedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(giro_negocio_proveedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(giro_negocio_proveedor_control) {
		this.actualizarPaginaAccionesGenerales(giro_negocio_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(giro_negocio_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(giro_negocio_proveedor_control);
		this.actualizarPaginaOrderBy(giro_negocio_proveedor_control);
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(giro_negocio_proveedor_control);
		//this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(giro_negocio_proveedor_control);
		this.actualizarPaginaAreaBusquedas(giro_negocio_proveedor_control);
		this.actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(giro_negocio_proveedor_control) {
		//this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(giro_negocio_proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(giro_negocio_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(giro_negocio_proveedor_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(giro_negocio_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(giro_negocio_proveedor_control);
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(giro_negocio_proveedor_control);
		//this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(giro_negocio_proveedor_control);
		this.actualizarPaginaAreaBusquedas(giro_negocio_proveedor_control);
		this.actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		//this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		//this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		//this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(giro_negocio_proveedor_control) {
		//this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(giro_negocio_proveedor_control) {
		this.actualizarPaginaAbrirLink(giro_negocio_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);				
		//this.actualizarPaginaFormulario(giro_negocio_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		//this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		//this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(giro_negocio_proveedor_control) {
		//this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
		this.onLoadCombosDefectoFK(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		//this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
		this.onLoadCombosDefectoFK(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(giro_negocio_proveedor_control) {
		this.actualizarPaginaAbrirLink(giro_negocio_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(giro_negocio_proveedor_control) {
					//super.actualizarPaginaImprimir(giro_negocio_proveedor_control,"giro_negocio_proveedor");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",giro_negocio_proveedor_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("giro_negocio_proveedor_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(giro_negocio_proveedor_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(giro_negocio_proveedor_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(giro_negocio_proveedor_control) {
		//super.actualizarPaginaImprimir(giro_negocio_proveedor_control,"giro_negocio_proveedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("giro_negocio_proveedor_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(giro_negocio_proveedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",giro_negocio_proveedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(giro_negocio_proveedor_control) {
		//super.actualizarPaginaImprimir(giro_negocio_proveedor_control,"giro_negocio_proveedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("giro_negocio_proveedor_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(giro_negocio_proveedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",giro_negocio_proveedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(giro_negocio_proveedor_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(giro_negocio_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(giro_negocio_proveedor_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(giro_negocio_proveedor_control);
			
		this.actualizarPaginaAbrirLink(giro_negocio_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(giro_negocio_proveedor_control) {
		this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		this.actualizarPaginaFormulario(giro_negocio_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(giro_negocio_proveedor_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(giro_negocio_proveedor_control) {
		
		if(giro_negocio_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(giro_negocio_proveedor_control);
		}
		
		if(giro_negocio_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(giro_negocio_proveedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(giro_negocio_proveedor_control) {
		if(giro_negocio_proveedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("giro_negocio_proveedorReturnGeneral",JSON.stringify(giro_negocio_proveedor_control.giro_negocio_proveedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(giro_negocio_proveedor_control) {
		if(giro_negocio_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && giro_negocio_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(giro_negocio_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(giro_negocio_proveedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(giro_negocio_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			giro_negocio_proveedor_funcion1.resaltarRestaurarDivsPagina(false,"giro_negocio_proveedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				giro_negocio_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false,"giro_negocio_proveedor");
			}			
			
			giro_negocio_proveedor_funcion1.mostrarDivMensaje(true,giro_negocio_proveedor_control.strAuxiliarMensaje,giro_negocio_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			giro_negocio_proveedor_funcion1.mostrarDivMensaje(false,giro_negocio_proveedor_control.strAuxiliarMensaje,giro_negocio_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(giro_negocio_proveedor_control) {
		if(giro_negocio_proveedor_funcion1.esPaginaForm(giro_negocio_proveedor_constante1)==true) {
			window.opener.giro_negocio_proveedor_webcontrol1.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(giro_negocio_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(giro_negocio_proveedor_control) {
		giro_negocio_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(giro_negocio_proveedor_control.strAuxiliarUrlPagina);
				
		giro_negocio_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(giro_negocio_proveedor_control.strAuxiliarTipo,giro_negocio_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(giro_negocio_proveedor_control) {
		giro_negocio_proveedor_funcion1.resaltarRestaurarDivMensaje(true,giro_negocio_proveedor_control.strAuxiliarMensajeAlert,giro_negocio_proveedor_control.strAuxiliarCssMensaje);
			
		if(giro_negocio_proveedor_funcion1.esPaginaForm(giro_negocio_proveedor_constante1)==true) {
			window.opener.giro_negocio_proveedor_funcion1.resaltarRestaurarDivMensaje(true,giro_negocio_proveedor_control.strAuxiliarMensajeAlert,giro_negocio_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(giro_negocio_proveedor_control) {
		this.giro_negocio_proveedor_controlInicial=giro_negocio_proveedor_control;
			
		if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(giro_negocio_proveedor_control.strStyleDivArbol,giro_negocio_proveedor_control.strStyleDivContent
																,giro_negocio_proveedor_control.strStyleDivOpcionesBanner,giro_negocio_proveedor_control.strStyleDivExpandirColapsar
																,giro_negocio_proveedor_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=giro_negocio_proveedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",giro_negocio_proveedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(giro_negocio_proveedor_control) {
		this.actualizarCssBotonesPagina(giro_negocio_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(giro_negocio_proveedor_control.tiposReportes,giro_negocio_proveedor_control.tiposReporte
															 	,giro_negocio_proveedor_control.tiposPaginacion,giro_negocio_proveedor_control.tiposAcciones
																,giro_negocio_proveedor_control.tiposColumnasSelect,giro_negocio_proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(giro_negocio_proveedor_control.tiposRelaciones,giro_negocio_proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(giro_negocio_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(giro_negocio_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(giro_negocio_proveedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(giro_negocio_proveedor_control) {
	
		var indexPosition=giro_negocio_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=giro_negocio_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(giro_negocio_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(giro_negocio_proveedor_control.strRecargarFkTiposNinguno!=null && giro_negocio_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && giro_negocio_proveedor_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(giro_negocio_proveedor_control) {
		jQuery("#divBusquedagiro_negocio_proveedorAjaxWebPart").css("display",giro_negocio_proveedor_control.strPermisoBusqueda);
		jQuery("#trgiro_negocio_proveedorCabeceraBusquedas").css("display",giro_negocio_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedagiro_negocio_proveedor").css("display",giro_negocio_proveedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(giro_negocio_proveedor_control.htmlTablaOrderBy!=null
			&& giro_negocio_proveedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBygiro_negocio_proveedorAjaxWebPart").html(giro_negocio_proveedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//giro_negocio_proveedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(giro_negocio_proveedor_control.htmlTablaOrderByRel!=null
			&& giro_negocio_proveedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelgiro_negocio_proveedorAjaxWebPart").html(giro_negocio_proveedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedagiro_negocio_proveedorAjaxWebPart").css("display","none");
			jQuery("#trgiro_negocio_proveedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedagiro_negocio_proveedor").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(giro_negocio_proveedor_control) {
		
		if(!giro_negocio_proveedor_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(giro_negocio_proveedor_control);
		} else {
			jQuery("#divTablaDatosgiro_negocio_proveedorsAjaxWebPart").html(giro_negocio_proveedor_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosgiro_negocio_proveedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosgiro_negocio_proveedors=jQuery("#tblTablaDatosgiro_negocio_proveedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("giro_negocio_proveedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',giro_negocio_proveedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			giro_negocio_proveedor_webcontrol1.registrarControlesTableEdition(giro_negocio_proveedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		giro_negocio_proveedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(giro_negocio_proveedor_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("giro_negocio_proveedor_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(giro_negocio_proveedor_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosgiro_negocio_proveedorsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(giro_negocio_proveedor_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(giro_negocio_proveedor_control);
		
		const divOrderBy = document.getElementById("divOrderBygiro_negocio_proveedorAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(giro_negocio_proveedor_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelgiro_negocio_proveedorAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(giro_negocio_proveedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(giro_negocio_proveedor_control.giro_negocio_proveedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(giro_negocio_proveedor_control);			
		}
	}
	
	actualizarCamposFilaTabla(giro_negocio_proveedor_control) {
		var i=0;
		
		i=giro_negocio_proveedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(giro_negocio_proveedor_control.giro_negocio_proveedorActual.id);
		jQuery("#t-version_row_"+i+"").val(giro_negocio_proveedor_control.giro_negocio_proveedorActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(giro_negocio_proveedor_control.giro_negocio_proveedorActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(giro_negocio_proveedor_control.giro_negocio_proveedorActual.nombre);
		jQuery("#t-cel_"+i+"_4").prop('checked',giro_negocio_proveedor_control.giro_negocio_proveedorActual.predeterminado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(giro_negocio_proveedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatosgiro_negocio_proveedors").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualgiro_negocio_proveedor");

			giro_negocio_proveedor_webcontrol1.registrarSesionParaproveedores(idActual);
		});				
	}
		
	

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"giro_negocio_proveedor","proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1,"es","");
	}
	
	registrarControlesTableEdition(giro_negocio_proveedor_control) {
		giro_negocio_proveedor_funcion1.registrarControlesTableValidacionEdition(giro_negocio_proveedor_control,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(giro_negocio_proveedor_control) {
		jQuery("#divResumengiro_negocio_proveedorActualAjaxWebPart").html(giro_negocio_proveedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(giro_negocio_proveedor_control) {
		//jQuery("#divAccionesRelacionesgiro_negocio_proveedorAjaxWebPart").html(giro_negocio_proveedor_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("giro_negocio_proveedor_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(giro_negocio_proveedor_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesgiro_negocio_proveedorAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		giro_negocio_proveedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(giro_negocio_proveedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(giro_negocio_proveedor_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(giro_negocio_proveedor_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciongiro_negocio_proveedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("giro_negocio_proveedor",id,"cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualgiro_negocio_proveedor");

			giro_negocio_proveedor_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedorConstante,strParametros);
		
		//giro_negocio_proveedor_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//giro_negocio_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(giro_negocio_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(giro_negocio_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(giro_negocio_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(giro_negocio_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(giro_negocio_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(giro_negocio_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(giro_negocio_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(giro_negocio_proveedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);			
			
			
		
			
			if(giro_negocio_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("giro_negocio_proveedor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("giro_negocio_proveedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,"giro_negocio_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("giro_negocio_proveedor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(giro_negocio_proveedor_control) {
		
		jQuery("#divBusquedagiro_negocio_proveedorAjaxWebPart").css("display",giro_negocio_proveedor_control.strPermisoBusqueda);
		jQuery("#trgiro_negocio_proveedorCabeceraBusquedas").css("display",giro_negocio_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedagiro_negocio_proveedor").css("display",giro_negocio_proveedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportegiro_negocio_proveedor").css("display",giro_negocio_proveedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosgiro_negocio_proveedor").attr("style",giro_negocio_proveedor_control.strPermisoMostrarTodos);		
		
		if(giro_negocio_proveedor_control.strPermisoNuevo!=null) {
			jQuery("#tdgiro_negocio_proveedorNuevo").css("display",giro_negocio_proveedor_control.strPermisoNuevo);
			jQuery("#tdgiro_negocio_proveedorNuevoToolBar").css("display",giro_negocio_proveedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdgiro_negocio_proveedorDuplicar").css("display",giro_negocio_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdgiro_negocio_proveedorDuplicarToolBar").css("display",giro_negocio_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdgiro_negocio_proveedorNuevoGuardarCambios").css("display",giro_negocio_proveedor_control.strPermisoNuevo);
			jQuery("#tdgiro_negocio_proveedorNuevoGuardarCambiosToolBar").css("display",giro_negocio_proveedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(giro_negocio_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tdgiro_negocio_proveedorCopiar").css("display",giro_negocio_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdgiro_negocio_proveedorCopiarToolBar").css("display",giro_negocio_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdgiro_negocio_proveedorConEditar").css("display",giro_negocio_proveedor_control.strPermisoActualizar);
		}
		
		jQuery("#tdgiro_negocio_proveedorGuardarCambios").css("display",giro_negocio_proveedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdgiro_negocio_proveedorGuardarCambiosToolBar").css("display",giro_negocio_proveedor_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdgiro_negocio_proveedorCerrarPagina").css("display",giro_negocio_proveedor_control.strPermisoPopup);		
		jQuery("#tdgiro_negocio_proveedorCerrarPaginaToolBar").css("display",giro_negocio_proveedor_control.strPermisoPopup);
		//jQuery("#trgiro_negocio_proveedorAccionesRelaciones").css("display",giro_negocio_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=giro_negocio_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + giro_negocio_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + giro_negocio_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Giro Negocios Proveedores";
		sTituloBanner+=" - " + giro_negocio_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + giro_negocio_proveedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdgiro_negocio_proveedorRelacionesToolBar").css("display",giro_negocio_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosgiro_negocio_proveedor").css("display",giro_negocio_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		giro_negocio_proveedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		giro_negocio_proveedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		giro_negocio_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		giro_negocio_proveedor_webcontrol1.registrarEventosControles();
		
		if(giro_negocio_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			giro_negocio_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(giro_negocio_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(giro_negocio_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				giro_negocio_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(giro_negocio_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(giro_negocio_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				giro_negocio_proveedor_webcontrol1.onLoad();
			
			//} else {
				//if(giro_negocio_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			giro_negocio_proveedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("giro_negocio_proveedor","cuentaspagar","",giro_negocio_proveedor_funcion1,giro_negocio_proveedor_webcontrol1,giro_negocio_proveedor_constante1);	
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

var giro_negocio_proveedor_webcontrol1 = new giro_negocio_proveedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {giro_negocio_proveedor_webcontrol,giro_negocio_proveedor_webcontrol1};

//Para ser llamado desde window.opener
window.giro_negocio_proveedor_webcontrol1 = giro_negocio_proveedor_webcontrol1;


if(giro_negocio_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = giro_negocio_proveedor_webcontrol1.onLoadWindow; 
}

//</script>