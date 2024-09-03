//<script type="text/javascript" language="javascript">



//var beneficiario_ocacional_chequeJQueryPaginaWebInteraccion= function (beneficiario_ocacional_cheque_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {beneficiario_ocacional_cheque_constante,beneficiario_ocacional_cheque_constante1} from '../util/beneficiario_ocacional_cheque_constante.js';

import {beneficiario_ocacional_cheque_funcion,beneficiario_ocacional_cheque_funcion1} from '../util/beneficiario_ocacional_cheque_funcion.js';


class beneficiario_ocacional_cheque_webcontrol extends GeneralEntityWebControl {
	
	beneficiario_ocacional_cheque_control=null;
	beneficiario_ocacional_cheque_controlInicial=null;
	beneficiario_ocacional_cheque_controlAuxiliar=null;
		
	//if(beneficiario_ocacional_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(beneficiario_ocacional_cheque_control) {
		super();
		
		this.beneficiario_ocacional_cheque_control=beneficiario_ocacional_cheque_control;
	}
		
	actualizarVariablesPagina(beneficiario_ocacional_cheque_control) {
		
		if(beneficiario_ocacional_cheque_control.action=="index" || beneficiario_ocacional_cheque_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(beneficiario_ocacional_cheque_control);
			
		} 
		
		
		else if(beneficiario_ocacional_cheque_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(beneficiario_ocacional_cheque_control);
			
		} else if(beneficiario_ocacional_cheque_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(beneficiario_ocacional_cheque_control);
			
		} else if(beneficiario_ocacional_cheque_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(beneficiario_ocacional_cheque_control);		
		
		} else if(beneficiario_ocacional_cheque_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(beneficiario_ocacional_cheque_control);
		
		}  else if(beneficiario_ocacional_cheque_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(beneficiario_ocacional_cheque_control);
		
		} else if(beneficiario_ocacional_cheque_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(beneficiario_ocacional_cheque_control);		
		
		} else if(beneficiario_ocacional_cheque_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(beneficiario_ocacional_cheque_control);		
		
		} else if(beneficiario_ocacional_cheque_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(beneficiario_ocacional_cheque_control);		
		
		} else if(beneficiario_ocacional_cheque_control.action.includes("Busqueda") ||
				  beneficiario_ocacional_cheque_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(beneficiario_ocacional_cheque_control);
			
		} else if(beneficiario_ocacional_cheque_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(beneficiario_ocacional_cheque_control)
		}
		
		
		
	
		else if(beneficiario_ocacional_cheque_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(beneficiario_ocacional_cheque_control);	
		
		} else if(beneficiario_ocacional_cheque_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(beneficiario_ocacional_cheque_control);		
		}
	
		else if(beneficiario_ocacional_cheque_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(beneficiario_ocacional_cheque_control);		
		}
	
		else if(beneficiario_ocacional_cheque_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(beneficiario_ocacional_cheque_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + beneficiario_ocacional_cheque_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(beneficiario_ocacional_cheque_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaAccionesGenerales(beneficiario_ocacional_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(beneficiario_ocacional_cheque_control) {
		
		this.actualizarPaginaCargaGeneral(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaOrderBy(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaCargaGeneralControles(beneficiario_ocacional_cheque_control);
		//this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaAreaBusquedas(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(beneficiario_ocacional_cheque_control) {
		//this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(beneficiario_ocacional_cheque_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(beneficiario_ocacional_cheque_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(beneficiario_ocacional_cheque_control) {
		
		this.actualizarPaginaCargaGeneral(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaCargaGeneralControles(beneficiario_ocacional_cheque_control);
		//this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaAreaBusquedas(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		//this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		//this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		//this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		//this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		//this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		//this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(beneficiario_ocacional_cheque_control) {
		//this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaAbrirLink(beneficiario_ocacional_cheque_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);				
		//this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		//this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		//this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		//this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(beneficiario_ocacional_cheque_control) {
		//this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
		this.onLoadCombosDefectoFK(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		//this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
		this.onLoadCombosDefectoFK(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		//this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaAbrirLink(beneficiario_ocacional_cheque_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(beneficiario_ocacional_cheque_control) {
					//super.actualizarPaginaImprimir(beneficiario_ocacional_cheque_control,"beneficiario_ocacional_cheque");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",beneficiario_ocacional_cheque_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("beneficiario_ocacional_cheque_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(beneficiario_ocacional_cheque_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(beneficiario_ocacional_cheque_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(beneficiario_ocacional_cheque_control) {
		//super.actualizarPaginaImprimir(beneficiario_ocacional_cheque_control,"beneficiario_ocacional_cheque");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("beneficiario_ocacional_cheque_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(beneficiario_ocacional_cheque_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",beneficiario_ocacional_cheque_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(beneficiario_ocacional_cheque_control) {
		//super.actualizarPaginaImprimir(beneficiario_ocacional_cheque_control,"beneficiario_ocacional_cheque");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("beneficiario_ocacional_cheque_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(beneficiario_ocacional_cheque_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",beneficiario_ocacional_cheque_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(beneficiario_ocacional_cheque_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(beneficiario_ocacional_cheque_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(beneficiario_ocacional_cheque_control);
			
		this.actualizarPaginaAbrirLink(beneficiario_ocacional_cheque_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(beneficiario_ocacional_cheque_control) {
		this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaFormulario(beneficiario_ocacional_cheque_control);
		this.actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control);		
		this.actualizarPaginaAreaMantenimiento(beneficiario_ocacional_cheque_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(beneficiario_ocacional_cheque_control) {
		
		if(beneficiario_ocacional_cheque_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(beneficiario_ocacional_cheque_control);
		}
		
		if(beneficiario_ocacional_cheque_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(beneficiario_ocacional_cheque_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(beneficiario_ocacional_cheque_control) {
		if(beneficiario_ocacional_cheque_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("beneficiario_ocacional_chequeReturnGeneral",JSON.stringify(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(beneficiario_ocacional_cheque_control) {
		if(beneficiario_ocacional_cheque_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && beneficiario_ocacional_cheque_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(beneficiario_ocacional_cheque_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(beneficiario_ocacional_cheque_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(beneficiario_ocacional_cheque_control, mostrar) {
		
		if(mostrar==true) {
			beneficiario_ocacional_cheque_funcion1.resaltarRestaurarDivsPagina(false,"beneficiario_ocacional_cheque");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				beneficiario_ocacional_cheque_funcion1.resaltarRestaurarDivMantenimiento(false,"beneficiario_ocacional_cheque");
			}			
			
			beneficiario_ocacional_cheque_funcion1.mostrarDivMensaje(true,beneficiario_ocacional_cheque_control.strAuxiliarMensaje,beneficiario_ocacional_cheque_control.strAuxiliarCssMensaje);
		
		} else {
			beneficiario_ocacional_cheque_funcion1.mostrarDivMensaje(false,beneficiario_ocacional_cheque_control.strAuxiliarMensaje,beneficiario_ocacional_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(beneficiario_ocacional_cheque_control) {
		if(beneficiario_ocacional_cheque_funcion1.esPaginaForm(beneficiario_ocacional_cheque_constante1)==true) {
			window.opener.beneficiario_ocacional_cheque_webcontrol1.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		} else {
			this.actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control);
		}
	}
	
	actualizarPaginaAbrirLink(beneficiario_ocacional_cheque_control) {
		beneficiario_ocacional_cheque_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(beneficiario_ocacional_cheque_control.strAuxiliarUrlPagina);
				
		beneficiario_ocacional_cheque_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(beneficiario_ocacional_cheque_control.strAuxiliarTipo,beneficiario_ocacional_cheque_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(beneficiario_ocacional_cheque_control) {
		beneficiario_ocacional_cheque_funcion1.resaltarRestaurarDivMensaje(true,beneficiario_ocacional_cheque_control.strAuxiliarMensajeAlert,beneficiario_ocacional_cheque_control.strAuxiliarCssMensaje);
			
		if(beneficiario_ocacional_cheque_funcion1.esPaginaForm(beneficiario_ocacional_cheque_constante1)==true) {
			window.opener.beneficiario_ocacional_cheque_funcion1.resaltarRestaurarDivMensaje(true,beneficiario_ocacional_cheque_control.strAuxiliarMensajeAlert,beneficiario_ocacional_cheque_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(beneficiario_ocacional_cheque_control) {
		this.beneficiario_ocacional_cheque_controlInicial=beneficiario_ocacional_cheque_control;
			
		if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(beneficiario_ocacional_cheque_control.strStyleDivArbol,beneficiario_ocacional_cheque_control.strStyleDivContent
																,beneficiario_ocacional_cheque_control.strStyleDivOpcionesBanner,beneficiario_ocacional_cheque_control.strStyleDivExpandirColapsar
																,beneficiario_ocacional_cheque_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=beneficiario_ocacional_cheque_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",beneficiario_ocacional_cheque_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(beneficiario_ocacional_cheque_control) {
		this.actualizarCssBotonesPagina(beneficiario_ocacional_cheque_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(beneficiario_ocacional_cheque_control.tiposReportes,beneficiario_ocacional_cheque_control.tiposReporte
															 	,beneficiario_ocacional_cheque_control.tiposPaginacion,beneficiario_ocacional_cheque_control.tiposAcciones
																,beneficiario_ocacional_cheque_control.tiposColumnasSelect,beneficiario_ocacional_cheque_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(beneficiario_ocacional_cheque_control.tiposRelaciones,beneficiario_ocacional_cheque_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(beneficiario_ocacional_cheque_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(beneficiario_ocacional_cheque_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(beneficiario_ocacional_cheque_control);			
	}
	
	actualizarPaginaUsuarioInvitado(beneficiario_ocacional_cheque_control) {
	
		var indexPosition=beneficiario_ocacional_cheque_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=beneficiario_ocacional_cheque_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(beneficiario_ocacional_cheque_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(beneficiario_ocacional_cheque_control.strRecargarFkTiposNinguno!=null && beneficiario_ocacional_cheque_control.strRecargarFkTiposNinguno!='NINGUNO' && beneficiario_ocacional_cheque_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(beneficiario_ocacional_cheque_control) {
		jQuery("#divBusquedabeneficiario_ocacional_chequeAjaxWebPart").css("display",beneficiario_ocacional_cheque_control.strPermisoBusqueda);
		jQuery("#trbeneficiario_ocacional_chequeCabeceraBusquedas").css("display",beneficiario_ocacional_cheque_control.strPermisoBusqueda);
		jQuery("#trBusquedabeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(beneficiario_ocacional_cheque_control.htmlTablaOrderBy!=null
			&& beneficiario_ocacional_cheque_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBybeneficiario_ocacional_chequeAjaxWebPart").html(beneficiario_ocacional_cheque_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//beneficiario_ocacional_cheque_webcontrol1.registrarOrderByActions();
			
		}
			
		if(beneficiario_ocacional_cheque_control.htmlTablaOrderByRel!=null
			&& beneficiario_ocacional_cheque_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelbeneficiario_ocacional_chequeAjaxWebPart").html(beneficiario_ocacional_cheque_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedabeneficiario_ocacional_chequeAjaxWebPart").css("display","none");
			jQuery("#trbeneficiario_ocacional_chequeCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedabeneficiario_ocacional_cheque").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(beneficiario_ocacional_cheque_control) {
		
		if(!beneficiario_ocacional_cheque_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(beneficiario_ocacional_cheque_control);
		} else {
			jQuery("#divTablaDatosbeneficiario_ocacional_chequesAjaxWebPart").html(beneficiario_ocacional_cheque_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosbeneficiario_ocacional_cheques=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosbeneficiario_ocacional_cheques=jQuery("#tblTablaDatosbeneficiario_ocacional_cheques").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("beneficiario_ocacional_cheque",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',beneficiario_ocacional_cheque_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			beneficiario_ocacional_cheque_webcontrol1.registrarControlesTableEdition(beneficiario_ocacional_cheque_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		beneficiario_ocacional_cheque_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(beneficiario_ocacional_cheque_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("beneficiario_ocacional_cheque_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(beneficiario_ocacional_cheque_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosbeneficiario_ocacional_chequesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(beneficiario_ocacional_cheque_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(beneficiario_ocacional_cheque_control);
		
		const divOrderBy = document.getElementById("divOrderBybeneficiario_ocacional_chequeAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(beneficiario_ocacional_cheque_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelbeneficiario_ocacional_chequeAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(beneficiario_ocacional_cheque_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual!=null) {//form
			
			this.actualizarCamposFilaTabla(beneficiario_ocacional_cheque_control);			
		}
	}
	
	actualizarCamposFilaTabla(beneficiario_ocacional_cheque_control) {
		var i=0;
		
		i=beneficiario_ocacional_cheque_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.id);
		jQuery("#t-version_row_"+i+"").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.nombre);
		jQuery("#t-cel_"+i+"_4").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.direccion_1);
		jQuery("#t-cel_"+i+"_5").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.direccion_2);
		jQuery("#t-cel_"+i+"_6").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.direccion_3);
		jQuery("#t-cel_"+i+"_7").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.telefono);
		jQuery("#t-cel_"+i+"_8").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.telefono_movil);
		jQuery("#t-cel_"+i+"_9").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.email);
		jQuery("#t-cel_"+i+"_10").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.notas);
		jQuery("#t-cel_"+i+"_11").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.registro_ocacional);
		jQuery("#t-cel_"+i+"_12").val(beneficiario_ocacional_cheque_control.beneficiario_ocacional_chequeActual.registro_tributario);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(beneficiario_ocacional_cheque_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncheque_cuenta_corriente").click(function(){
		jQuery("#tblTablaDatosbeneficiario_ocacional_cheques").on("click",".imgrelacioncheque_cuenta_corriente", function () {

			var idActual=jQuery(this).attr("idactualbeneficiario_ocacional_cheque");

			beneficiario_ocacional_cheque_webcontrol1.registrarSesionParacheque_cuenta_corrientes(idActual);
		});				
	}
		
	

	registrarSesionParacheque_cuenta_corrientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"beneficiario_ocacional_cheque","cheque_cuenta_corriente","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1,"s","");
	}
	
	registrarControlesTableEdition(beneficiario_ocacional_cheque_control) {
		beneficiario_ocacional_cheque_funcion1.registrarControlesTableValidacionEdition(beneficiario_ocacional_cheque_control,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(beneficiario_ocacional_cheque_control) {
		jQuery("#divResumenbeneficiario_ocacional_chequeActualAjaxWebPart").html(beneficiario_ocacional_cheque_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(beneficiario_ocacional_cheque_control) {
		//jQuery("#divAccionesRelacionesbeneficiario_ocacional_chequeAjaxWebPart").html(beneficiario_ocacional_cheque_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("beneficiario_ocacional_cheque_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(beneficiario_ocacional_cheque_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesbeneficiario_ocacional_chequeAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		beneficiario_ocacional_cheque_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(beneficiario_ocacional_cheque_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(beneficiario_ocacional_cheque_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(beneficiario_ocacional_cheque_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionbeneficiario_ocacional_cheque();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("beneficiario_ocacional_cheque",id,"cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncheque_cuenta_corriente").click(function(){

			var idActual=jQuery(this).attr("idactualbeneficiario_ocacional_cheque");

			beneficiario_ocacional_cheque_webcontrol1.registrarSesionParacheque_cuenta_corrientes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_chequeConstante,strParametros);
		
		//beneficiario_ocacional_cheque_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//beneficiario_ocacional_cheque_control
		
	
	}
	
	onLoadCombosDefectoFK(beneficiario_ocacional_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(beneficiario_ocacional_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(beneficiario_ocacional_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(beneficiario_ocacional_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(beneficiario_ocacional_cheque_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(beneficiario_ocacional_cheque_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(beneficiario_ocacional_cheque_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(beneficiario_ocacional_cheque_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);			
			
			
		
			
			if(beneficiario_ocacional_cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("beneficiario_ocacional_cheque");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("beneficiario_ocacional_cheque");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,"beneficiario_ocacional_cheque");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("beneficiario_ocacional_cheque");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(beneficiario_ocacional_cheque_control) {
		
		jQuery("#divBusquedabeneficiario_ocacional_chequeAjaxWebPart").css("display",beneficiario_ocacional_cheque_control.strPermisoBusqueda);
		jQuery("#trbeneficiario_ocacional_chequeCabeceraBusquedas").css("display",beneficiario_ocacional_cheque_control.strPermisoBusqueda);
		jQuery("#trBusquedabeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportebeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosbeneficiario_ocacional_cheque").attr("style",beneficiario_ocacional_cheque_control.strPermisoMostrarTodos);		
		
		if(beneficiario_ocacional_cheque_control.strPermisoNuevo!=null) {
			jQuery("#tdbeneficiario_ocacional_chequeNuevo").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo);
			jQuery("#tdbeneficiario_ocacional_chequeNuevoToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdbeneficiario_ocacional_chequeDuplicar").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdbeneficiario_ocacional_chequeDuplicarToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdbeneficiario_ocacional_chequeNuevoGuardarCambios").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo);
			jQuery("#tdbeneficiario_ocacional_chequeNuevoGuardarCambiosToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(beneficiario_ocacional_cheque_control.strPermisoActualizar!=null) {
			jQuery("#tdbeneficiario_ocacional_chequeCopiar").css("display",beneficiario_ocacional_cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbeneficiario_ocacional_chequeCopiarToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdbeneficiario_ocacional_chequeConEditar").css("display",beneficiario_ocacional_cheque_control.strPermisoActualizar);
		}
		
		jQuery("#tdbeneficiario_ocacional_chequeGuardarCambios").css("display",beneficiario_ocacional_cheque_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdbeneficiario_ocacional_chequeGuardarCambiosToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdbeneficiario_ocacional_chequeCerrarPagina").css("display",beneficiario_ocacional_cheque_control.strPermisoPopup);		
		jQuery("#tdbeneficiario_ocacional_chequeCerrarPaginaToolBar").css("display",beneficiario_ocacional_cheque_control.strPermisoPopup);
		//jQuery("#trbeneficiario_ocacional_chequeAccionesRelaciones").css("display",beneficiario_ocacional_cheque_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=beneficiario_ocacional_cheque_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + beneficiario_ocacional_cheque_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + beneficiario_ocacional_cheque_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Beneficiario Ocacionales";
		sTituloBanner+=" - " + beneficiario_ocacional_cheque_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + beneficiario_ocacional_cheque_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdbeneficiario_ocacional_chequeRelacionesToolBar").css("display",beneficiario_ocacional_cheque_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosbeneficiario_ocacional_cheque").css("display",beneficiario_ocacional_cheque_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		beneficiario_ocacional_cheque_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		beneficiario_ocacional_cheque_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		beneficiario_ocacional_cheque_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		beneficiario_ocacional_cheque_webcontrol1.registrarEventosControles();
		
		if(beneficiario_ocacional_cheque_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="false") {
			beneficiario_ocacional_cheque_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONES=="true") {
			if(beneficiario_ocacional_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				beneficiario_ocacional_cheque_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(beneficiario_ocacional_cheque_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(beneficiario_ocacional_cheque_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				beneficiario_ocacional_cheque_webcontrol1.onLoad();
			
			//} else {
				//if(beneficiario_ocacional_cheque_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			beneficiario_ocacional_cheque_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("beneficiario_ocacional_cheque","cuentascorrientes","",beneficiario_ocacional_cheque_funcion1,beneficiario_ocacional_cheque_webcontrol1,beneficiario_ocacional_cheque_constante1);	
	}
}

var beneficiario_ocacional_cheque_webcontrol1 = new beneficiario_ocacional_cheque_webcontrol();

//Para ser llamado desde otro archivo (import)
export {beneficiario_ocacional_cheque_webcontrol,beneficiario_ocacional_cheque_webcontrol1};

//Para ser llamado desde window.opener
window.beneficiario_ocacional_cheque_webcontrol1 = beneficiario_ocacional_cheque_webcontrol1;


if(beneficiario_ocacional_cheque_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = beneficiario_ocacional_cheque_webcontrol1.onLoadWindow; 
}

//</script>