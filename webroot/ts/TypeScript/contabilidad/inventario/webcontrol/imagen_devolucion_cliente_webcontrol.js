//<script type="text/javascript" language="javascript">



//var imagen_devolucion_clienteJQueryPaginaWebInteraccion= function (imagen_devolucion_cliente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_devolucion_cliente_constante,imagen_devolucion_cliente_constante1} from '../util/imagen_devolucion_cliente_constante.js';

import {imagen_devolucion_cliente_funcion,imagen_devolucion_cliente_funcion1} from '../util/imagen_devolucion_cliente_funcion.js';


class imagen_devolucion_cliente_webcontrol extends GeneralEntityWebControl {
	
	imagen_devolucion_cliente_control=null;
	imagen_devolucion_cliente_controlInicial=null;
	imagen_devolucion_cliente_controlAuxiliar=null;
		
	//if(imagen_devolucion_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_devolucion_cliente_control) {
		super();
		
		this.imagen_devolucion_cliente_control=imagen_devolucion_cliente_control;
	}
		
	actualizarVariablesPagina(imagen_devolucion_cliente_control) {
		
		if(imagen_devolucion_cliente_control.action=="index" || imagen_devolucion_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_devolucion_cliente_control);
			
		} 
		
		
		else if(imagen_devolucion_cliente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_devolucion_cliente_control);
			
		} else if(imagen_devolucion_cliente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_devolucion_cliente_control);
			
		} else if(imagen_devolucion_cliente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_devolucion_cliente_control);		
		
		} else if(imagen_devolucion_cliente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_devolucion_cliente_control);
		
		}  else if(imagen_devolucion_cliente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_devolucion_cliente_control);
		
		} else if(imagen_devolucion_cliente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_devolucion_cliente_control);		
		
		} else if(imagen_devolucion_cliente_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_devolucion_cliente_control);		
		
		} else if(imagen_devolucion_cliente_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_devolucion_cliente_control);		
		
		} else if(imagen_devolucion_cliente_control.action.includes("Busqueda") ||
				  imagen_devolucion_cliente_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(imagen_devolucion_cliente_control);
			
		} else if(imagen_devolucion_cliente_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_devolucion_cliente_control)
		}
		
		
		
	
		else if(imagen_devolucion_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_devolucion_cliente_control);	
		
		} else if(imagen_devolucion_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_devolucion_cliente_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_devolucion_cliente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_devolucion_cliente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_devolucion_cliente_control) {
		this.actualizarPaginaAccionesGenerales(imagen_devolucion_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_devolucion_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_devolucion_cliente_control);
		this.actualizarPaginaOrderBy(imagen_devolucion_cliente_control);
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
		this.actualizarPaginaCargaGeneralControles(imagen_devolucion_cliente_control);
		//this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_devolucion_cliente_control);
		this.actualizarPaginaAreaBusquedas(imagen_devolucion_cliente_control);
		this.actualizarPaginaCargaCombosFK(imagen_devolucion_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_devolucion_cliente_control) {
		//this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_devolucion_cliente_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_devolucion_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_devolucion_cliente_control);
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
		this.actualizarPaginaCargaGeneralControles(imagen_devolucion_cliente_control);
		//this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_devolucion_cliente_control);
		this.actualizarPaginaAreaBusquedas(imagen_devolucion_cliente_control);
		this.actualizarPaginaCargaCombosFK(imagen_devolucion_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		//this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		//this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		//this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_devolucion_cliente_control) {
		//this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_devolucion_cliente_control) {
		this.actualizarPaginaAbrirLink(imagen_devolucion_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);				
		//this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
		//this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
		//this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_devolucion_cliente_control) {
		//this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);
		this.onLoadCombosDefectoFK(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
		//this.actualizarPaginaFormulario(imagen_devolucion_cliente_control);
		this.onLoadCombosDefectoFK(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_devolucion_cliente_control) {
		this.actualizarPaginaAbrirLink(imagen_devolucion_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_devolucion_cliente_control) {
		this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_devolucion_cliente_control) {
					//super.actualizarPaginaImprimir(imagen_devolucion_cliente_control,"imagen_devolucion_cliente");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_devolucion_cliente_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("imagen_devolucion_cliente_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_devolucion_cliente_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_devolucion_cliente_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_devolucion_cliente_control) {
		//super.actualizarPaginaImprimir(imagen_devolucion_cliente_control,"imagen_devolucion_cliente");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("imagen_devolucion_cliente_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(imagen_devolucion_cliente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_devolucion_cliente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_devolucion_cliente_control) {
		//super.actualizarPaginaImprimir(imagen_devolucion_cliente_control,"imagen_devolucion_cliente");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("imagen_devolucion_cliente_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_devolucion_cliente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_devolucion_cliente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_devolucion_cliente_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_devolucion_cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_devolucion_cliente_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(imagen_devolucion_cliente_control);
			
		this.actualizarPaginaAbrirLink(imagen_devolucion_cliente_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_devolucion_cliente_control) {
		
		if(imagen_devolucion_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_devolucion_cliente_control);
		}
		
		if(imagen_devolucion_cliente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_devolucion_cliente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_devolucion_cliente_control) {
		if(imagen_devolucion_cliente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_devolucion_clienteReturnGeneral",JSON.stringify(imagen_devolucion_cliente_control.imagen_devolucion_clienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_devolucion_cliente_control) {
		if(imagen_devolucion_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_devolucion_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_devolucion_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_devolucion_cliente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_devolucion_cliente_control, mostrar) {
		
		if(mostrar==true) {
			imagen_devolucion_cliente_funcion1.resaltarRestaurarDivsPagina(false,"imagen_devolucion_cliente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_devolucion_cliente_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_devolucion_cliente");
			}			
			
			imagen_devolucion_cliente_funcion1.mostrarDivMensaje(true,imagen_devolucion_cliente_control.strAuxiliarMensaje,imagen_devolucion_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_devolucion_cliente_funcion1.mostrarDivMensaje(false,imagen_devolucion_cliente_control.strAuxiliarMensaje,imagen_devolucion_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_devolucion_cliente_control) {
		if(imagen_devolucion_cliente_funcion1.esPaginaForm(imagen_devolucion_cliente_constante1)==true) {
			window.opener.imagen_devolucion_cliente_webcontrol1.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_devolucion_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_devolucion_cliente_control) {
		imagen_devolucion_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_devolucion_cliente_control.strAuxiliarUrlPagina);
				
		imagen_devolucion_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_devolucion_cliente_control.strAuxiliarTipo,imagen_devolucion_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_devolucion_cliente_control) {
		imagen_devolucion_cliente_funcion1.resaltarRestaurarDivMensaje(true,imagen_devolucion_cliente_control.strAuxiliarMensajeAlert,imagen_devolucion_cliente_control.strAuxiliarCssMensaje);
			
		if(imagen_devolucion_cliente_funcion1.esPaginaForm(imagen_devolucion_cliente_constante1)==true) {
			window.opener.imagen_devolucion_cliente_funcion1.resaltarRestaurarDivMensaje(true,imagen_devolucion_cliente_control.strAuxiliarMensajeAlert,imagen_devolucion_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_devolucion_cliente_control) {
		this.imagen_devolucion_cliente_controlInicial=imagen_devolucion_cliente_control;
			
		if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_devolucion_cliente_control.strStyleDivArbol,imagen_devolucion_cliente_control.strStyleDivContent
																,imagen_devolucion_cliente_control.strStyleDivOpcionesBanner,imagen_devolucion_cliente_control.strStyleDivExpandirColapsar
																,imagen_devolucion_cliente_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_devolucion_cliente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_devolucion_cliente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_devolucion_cliente_control) {
		this.actualizarCssBotonesPagina(imagen_devolucion_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_devolucion_cliente_control.tiposReportes,imagen_devolucion_cliente_control.tiposReporte
															 	,imagen_devolucion_cliente_control.tiposPaginacion,imagen_devolucion_cliente_control.tiposAcciones
																,imagen_devolucion_cliente_control.tiposColumnasSelect,imagen_devolucion_cliente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_devolucion_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_devolucion_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_devolucion_cliente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_devolucion_cliente_control) {
	
		var indexPosition=imagen_devolucion_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_devolucion_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_devolucion_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_devolucion_cliente_control.strRecargarFkTiposNinguno!=null && imagen_devolucion_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_devolucion_cliente_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(imagen_devolucion_cliente_control) {
		jQuery("#divBusquedaimagen_devolucion_clienteAjaxWebPart").css("display",imagen_devolucion_cliente_control.strPermisoBusqueda);
		jQuery("#trimagen_devolucion_clienteCabeceraBusquedas").css("display",imagen_devolucion_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_devolucion_cliente").css("display",imagen_devolucion_cliente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_devolucion_cliente_control.htmlTablaOrderBy!=null
			&& imagen_devolucion_cliente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_devolucion_clienteAjaxWebPart").html(imagen_devolucion_cliente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_devolucion_cliente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_devolucion_cliente_control.htmlTablaOrderByRel!=null
			&& imagen_devolucion_cliente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_devolucion_clienteAjaxWebPart").html(imagen_devolucion_cliente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_devolucion_clienteAjaxWebPart").css("display","none");
			jQuery("#trimagen_devolucion_clienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_devolucion_cliente").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(imagen_devolucion_cliente_control) {
		
		if(!imagen_devolucion_cliente_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(imagen_devolucion_cliente_control);
		} else {
			jQuery("#divTablaDatosimagen_devolucion_clientesAjaxWebPart").html(imagen_devolucion_cliente_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_devolucion_clientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_devolucion_clientes=jQuery("#tblTablaDatosimagen_devolucion_clientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_devolucion_cliente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_devolucion_cliente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_devolucion_cliente_webcontrol1.registrarControlesTableEdition(imagen_devolucion_cliente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_devolucion_cliente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(imagen_devolucion_cliente_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("imagen_devolucion_cliente_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_devolucion_cliente_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosimagen_devolucion_clientesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(imagen_devolucion_cliente_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(imagen_devolucion_cliente_control);
		
		const divOrderBy = document.getElementById("divOrderByimagen_devolucion_clienteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(imagen_devolucion_cliente_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelimagen_devolucion_clienteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(imagen_devolucion_cliente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_devolucion_cliente_control);			
		}
	}
	
	actualizarCamposFilaTabla(imagen_devolucion_cliente_control) {
		var i=0;
		
		i=imagen_devolucion_cliente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.id_imagen);
		jQuery("#t-cel_"+i+"_3").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.imagen);
		jQuery("#t-cel_"+i+"_4").val(imagen_devolucion_cliente_control.imagen_devolucion_clienteActual.nro_devolucion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_devolucion_cliente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_devolucion_cliente_control) {
		imagen_devolucion_cliente_funcion1.registrarControlesTableValidacionEdition(imagen_devolucion_cliente_control,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_devolucion_cliente_control) {
		jQuery("#divResumenimagen_devolucion_clienteActualAjaxWebPart").html(imagen_devolucion_cliente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_devolucion_cliente_control) {
		//jQuery("#divAccionesRelacionesimagen_devolucion_clienteAjaxWebPart").html(imagen_devolucion_cliente_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("imagen_devolucion_cliente_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_devolucion_cliente_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesimagen_devolucion_clienteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		imagen_devolucion_cliente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_devolucion_cliente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_devolucion_cliente_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_devolucion_cliente_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_devolucion_cliente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_devolucion_cliente",id,"inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_clienteConstante,strParametros);
		
		//imagen_devolucion_cliente_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_devolucion_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_devolucion_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_devolucion_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(imagen_devolucion_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_devolucion_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_devolucion_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_devolucion_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_devolucion_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_devolucion_cliente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);			
			
			
		
			
			if(imagen_devolucion_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_devolucion_cliente");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_devolucion_cliente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,"imagen_devolucion_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_devolucion_cliente_control) {
		
		jQuery("#divBusquedaimagen_devolucion_clienteAjaxWebPart").css("display",imagen_devolucion_cliente_control.strPermisoBusqueda);
		jQuery("#trimagen_devolucion_clienteCabeceraBusquedas").css("display",imagen_devolucion_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_devolucion_cliente").css("display",imagen_devolucion_cliente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_devolucion_cliente").css("display",imagen_devolucion_cliente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_devolucion_cliente").attr("style",imagen_devolucion_cliente_control.strPermisoMostrarTodos);		
		
		if(imagen_devolucion_cliente_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_devolucion_clienteNuevo").css("display",imagen_devolucion_cliente_control.strPermisoNuevo);
			jQuery("#tdimagen_devolucion_clienteNuevoToolBar").css("display",imagen_devolucion_cliente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_devolucion_clienteDuplicar").css("display",imagen_devolucion_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_devolucion_clienteDuplicarToolBar").css("display",imagen_devolucion_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_devolucion_clienteNuevoGuardarCambios").css("display",imagen_devolucion_cliente_control.strPermisoNuevo);
			jQuery("#tdimagen_devolucion_clienteNuevoGuardarCambiosToolBar").css("display",imagen_devolucion_cliente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_devolucion_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_devolucion_clienteCopiar").css("display",imagen_devolucion_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_devolucion_clienteCopiarToolBar").css("display",imagen_devolucion_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_devolucion_clienteConEditar").css("display",imagen_devolucion_cliente_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_devolucion_clienteGuardarCambios").css("display",imagen_devolucion_cliente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_devolucion_clienteGuardarCambiosToolBar").css("display",imagen_devolucion_cliente_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdimagen_devolucion_clienteCerrarPagina").css("display",imagen_devolucion_cliente_control.strPermisoPopup);		
		jQuery("#tdimagen_devolucion_clienteCerrarPaginaToolBar").css("display",imagen_devolucion_cliente_control.strPermisoPopup);
		//jQuery("#trimagen_devolucion_clienteAccionesRelaciones").css("display",imagen_devolucion_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_devolucion_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_devolucion_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_devolucion_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Devolucion Clientes";
		sTituloBanner+=" - " + imagen_devolucion_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_devolucion_cliente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_devolucion_clienteRelacionesToolBar").css("display",imagen_devolucion_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_devolucion_cliente").css("display",imagen_devolucion_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_devolucion_cliente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_devolucion_cliente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_devolucion_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_devolucion_cliente_webcontrol1.registrarEventosControles();
		
		if(imagen_devolucion_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO=="false") {
			imagen_devolucion_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_devolucion_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_devolucion_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_devolucion_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_devolucion_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_devolucion_cliente_webcontrol1.onLoad();
			
			//} else {
				//if(imagen_devolucion_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			imagen_devolucion_cliente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_devolucion_cliente","inventario","",imagen_devolucion_cliente_funcion1,imagen_devolucion_cliente_webcontrol1,imagen_devolucion_cliente_constante1);	
	}
}

var imagen_devolucion_cliente_webcontrol1 = new imagen_devolucion_cliente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_devolucion_cliente_webcontrol,imagen_devolucion_cliente_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_devolucion_cliente_webcontrol1 = imagen_devolucion_cliente_webcontrol1;


if(imagen_devolucion_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_devolucion_cliente_webcontrol1.onLoadWindow; 
}

//</script>