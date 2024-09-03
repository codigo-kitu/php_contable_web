//<script type="text/javascript" language="javascript">



//var cotizacion_detalleJQueryPaginaWebInteraccion= function (cotizacion_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cotizacion_detalle_constante,cotizacion_detalle_constante1} from '../util/cotizacion_detalle_constante.js';

import {cotizacion_detalle_funcion,cotizacion_detalle_funcion1} from '../util/cotizacion_detalle_funcion.js';


class cotizacion_detalle_webcontrol extends GeneralEntityWebControl {
	
	cotizacion_detalle_control=null;
	cotizacion_detalle_controlInicial=null;
	cotizacion_detalle_controlAuxiliar=null;
		
	//if(cotizacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cotizacion_detalle_control) {
		super();
		
		this.cotizacion_detalle_control=cotizacion_detalle_control;
	}
		
	actualizarVariablesPagina(cotizacion_detalle_control) {
		
		if(cotizacion_detalle_control.action=="index" || cotizacion_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cotizacion_detalle_control);
			
		} 
		
		
		else if(cotizacion_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cotizacion_detalle_control);
			
		} else if(cotizacion_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cotizacion_detalle_control);
			
		} else if(cotizacion_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cotizacion_detalle_control);		
		
		} else if(cotizacion_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cotizacion_detalle_control);
		
		}  else if(cotizacion_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cotizacion_detalle_control);
		
		} else if(cotizacion_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cotizacion_detalle_control);		
		
		} else if(cotizacion_detalle_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cotizacion_detalle_control);		
		
		} else if(cotizacion_detalle_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(cotizacion_detalle_control);		
		
		} else if(cotizacion_detalle_control.action.includes("Busqueda") ||
				  cotizacion_detalle_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(cotizacion_detalle_control);
			
		} else if(cotizacion_detalle_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cotizacion_detalle_control)
		}
		
		
		
	
		else if(cotizacion_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cotizacion_detalle_control);	
		
		} else if(cotizacion_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cotizacion_detalle_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cotizacion_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cotizacion_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cotizacion_detalle_control) {
		this.actualizarPaginaAccionesGenerales(cotizacion_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cotizacion_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cotizacion_detalle_control);
		this.actualizarPaginaOrderBy(cotizacion_detalle_control);
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cotizacion_detalle_control);
		//this.actualizarPaginaFormulario(cotizacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cotizacion_detalle_control);
		this.actualizarPaginaAreaBusquedas(cotizacion_detalle_control);
		this.actualizarPaginaCargaCombosFK(cotizacion_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cotizacion_detalle_control) {
		//this.actualizarPaginaFormulario(cotizacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cotizacion_detalle_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cotizacion_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cotizacion_detalle_control);
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cotizacion_detalle_control);
		//this.actualizarPaginaFormulario(cotizacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cotizacion_detalle_control);
		this.actualizarPaginaAreaBusquedas(cotizacion_detalle_control);
		this.actualizarPaginaCargaCombosFK(cotizacion_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);		
		//this.actualizarPaginaFormulario(cotizacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);		
		//this.actualizarPaginaFormulario(cotizacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);		
		//this.actualizarPaginaFormulario(cotizacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cotizacion_detalle_control) {
		//this.actualizarPaginaFormulario(cotizacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cotizacion_detalle_control) {
		this.actualizarPaginaAbrirLink(cotizacion_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);				
		//this.actualizarPaginaFormulario(cotizacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);
		//this.actualizarPaginaFormulario(cotizacion_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);
		//this.actualizarPaginaFormulario(cotizacion_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cotizacion_detalle_control) {
		//this.actualizarPaginaFormulario(cotizacion_detalle_control);
		this.onLoadCombosDefectoFK(cotizacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);
		//this.actualizarPaginaFormulario(cotizacion_detalle_control);
		this.onLoadCombosDefectoFK(cotizacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cotizacion_detalle_control) {
		this.actualizarPaginaAbrirLink(cotizacion_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cotizacion_detalle_control) {
		this.actualizarPaginaTablaDatos(cotizacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cotizacion_detalle_control) {
					//super.actualizarPaginaImprimir(cotizacion_detalle_control,"cotizacion_detalle");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cotizacion_detalle_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("cotizacion_detalle_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cotizacion_detalle_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cotizacion_detalle_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cotizacion_detalle_control) {
		//super.actualizarPaginaImprimir(cotizacion_detalle_control,"cotizacion_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("cotizacion_detalle_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(cotizacion_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cotizacion_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cotizacion_detalle_control) {
		//super.actualizarPaginaImprimir(cotizacion_detalle_control,"cotizacion_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("cotizacion_detalle_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cotizacion_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cotizacion_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cotizacion_detalle_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(cotizacion_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cotizacion_detalle_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(cotizacion_detalle_control);
			
		this.actualizarPaginaAbrirLink(cotizacion_detalle_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cotizacion_detalle_control) {
		
		if(cotizacion_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cotizacion_detalle_control);
		}
		
		if(cotizacion_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cotizacion_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cotizacion_detalle_control) {
		if(cotizacion_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cotizacion_detalleReturnGeneral",JSON.stringify(cotizacion_detalle_control.cotizacion_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cotizacion_detalle_control) {
		if(cotizacion_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cotizacion_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cotizacion_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cotizacion_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cotizacion_detalle_control, mostrar) {
		
		if(mostrar==true) {
			cotizacion_detalle_funcion1.resaltarRestaurarDivsPagina(false,"cotizacion_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cotizacion_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"cotizacion_detalle");
			}			
			
			cotizacion_detalle_funcion1.mostrarDivMensaje(true,cotizacion_detalle_control.strAuxiliarMensaje,cotizacion_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			cotizacion_detalle_funcion1.mostrarDivMensaje(false,cotizacion_detalle_control.strAuxiliarMensaje,cotizacion_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cotizacion_detalle_control) {
		if(cotizacion_detalle_funcion1.esPaginaForm(cotizacion_detalle_constante1)==true) {
			window.opener.cotizacion_detalle_webcontrol1.actualizarPaginaTablaDatos(cotizacion_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(cotizacion_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(cotizacion_detalle_control) {
		cotizacion_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cotizacion_detalle_control.strAuxiliarUrlPagina);
				
		cotizacion_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cotizacion_detalle_control.strAuxiliarTipo,cotizacion_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cotizacion_detalle_control) {
		cotizacion_detalle_funcion1.resaltarRestaurarDivMensaje(true,cotizacion_detalle_control.strAuxiliarMensajeAlert,cotizacion_detalle_control.strAuxiliarCssMensaje);
			
		if(cotizacion_detalle_funcion1.esPaginaForm(cotizacion_detalle_constante1)==true) {
			window.opener.cotizacion_detalle_funcion1.resaltarRestaurarDivMensaje(true,cotizacion_detalle_control.strAuxiliarMensajeAlert,cotizacion_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cotizacion_detalle_control) {
		this.cotizacion_detalle_controlInicial=cotizacion_detalle_control;
			
		if(cotizacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cotizacion_detalle_control.strStyleDivArbol,cotizacion_detalle_control.strStyleDivContent
																,cotizacion_detalle_control.strStyleDivOpcionesBanner,cotizacion_detalle_control.strStyleDivExpandirColapsar
																,cotizacion_detalle_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=cotizacion_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cotizacion_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cotizacion_detalle_control) {
		this.actualizarCssBotonesPagina(cotizacion_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cotizacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cotizacion_detalle_control.tiposReportes,cotizacion_detalle_control.tiposReporte
															 	,cotizacion_detalle_control.tiposPaginacion,cotizacion_detalle_control.tiposAcciones
																,cotizacion_detalle_control.tiposColumnasSelect,cotizacion_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cotizacion_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cotizacion_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cotizacion_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cotizacion_detalle_control) {
	
		var indexPosition=cotizacion_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cotizacion_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cotizacion_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cotizacion",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.cargarComboscotizacionsFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.cargarCombosbodegasFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.cargarCombosproductosFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.cargarCombosunidadsFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_suplidor",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.cargarCombosotro_suplidorsFK(cotizacion_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cotizacion_detalle_control.strRecargarFkTiposNinguno!=null && cotizacion_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && cotizacion_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(cotizacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cotizacion",cotizacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_detalle_webcontrol1.cargarComboscotizacionsFK(cotizacion_detalle_control);
				}

				if(cotizacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",cotizacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_detalle_webcontrol1.cargarCombosbodegasFK(cotizacion_detalle_control);
				}

				if(cotizacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",cotizacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_detalle_webcontrol1.cargarCombosproductosFK(cotizacion_detalle_control);
				}

				if(cotizacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",cotizacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_detalle_webcontrol1.cargarCombosunidadsFK(cotizacion_detalle_control);
				}

				if(cotizacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_otro_suplidor",cotizacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cotizacion_detalle_webcontrol1.cargarCombosotro_suplidorsFK(cotizacion_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.cotizacion_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.cotizacion_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.cotizacion_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.cotizacion_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.cotizacion_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.cotizacion_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablacotizacionFK(cotizacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_detalle_funcion1,cotizacion_detalle_control.cotizacionsFK);
	}

	cargarComboEditarTablabodegaFK(cotizacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_detalle_funcion1,cotizacion_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(cotizacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_detalle_funcion1,cotizacion_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(cotizacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_detalle_funcion1,cotizacion_detalle_control.unidadsFK);
	}

	cargarComboEditarTablaotro_suplidorFK(cotizacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cotizacion_detalle_funcion1,cotizacion_detalle_control.otro_suplidorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(cotizacion_detalle_control) {
		jQuery("#divBusquedacotizacion_detalleAjaxWebPart").css("display",cotizacion_detalle_control.strPermisoBusqueda);
		jQuery("#trcotizacion_detalleCabeceraBusquedas").css("display",cotizacion_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedacotizacion_detalle").css("display",cotizacion_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cotizacion_detalle_control.htmlTablaOrderBy!=null
			&& cotizacion_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycotizacion_detalleAjaxWebPart").html(cotizacion_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cotizacion_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cotizacion_detalle_control.htmlTablaOrderByRel!=null
			&& cotizacion_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcotizacion_detalleAjaxWebPart").html(cotizacion_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cotizacion_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacotizacion_detalleAjaxWebPart").css("display","none");
			jQuery("#trcotizacion_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacotizacion_detalle").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(cotizacion_detalle_control) {
		
		if(!cotizacion_detalle_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(cotizacion_detalle_control);
		} else {
			jQuery("#divTablaDatoscotizacion_detallesAjaxWebPart").html(cotizacion_detalle_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscotizacion_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cotizacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscotizacion_detalles=jQuery("#tblTablaDatoscotizacion_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cotizacion_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cotizacion_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cotizacion_detalle_webcontrol1.registrarControlesTableEdition(cotizacion_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cotizacion_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(cotizacion_detalle_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("cotizacion_detalle_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cotizacion_detalle_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscotizacion_detallesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(cotizacion_detalle_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(cotizacion_detalle_control);
		
		const divOrderBy = document.getElementById("divOrderBycotizacion_detalleAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(cotizacion_detalle_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcotizacion_detalleAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(cotizacion_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cotizacion_detalle_control.cotizacion_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cotizacion_detalle_control);			
		}
	}
	
	actualizarCamposFilaTabla(cotizacion_detalle_control) {
		var i=0;
		
		i=cotizacion_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cotizacion_detalle_control.cotizacion_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(cotizacion_detalle_control.cotizacion_detalleActual.versionRow);
		
		if(cotizacion_detalle_control.cotizacion_detalleActual.id_cotizacion!=null && cotizacion_detalle_control.cotizacion_detalleActual.id_cotizacion>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cotizacion_detalle_control.cotizacion_detalleActual.id_cotizacion) {
				jQuery("#t-cel_"+i+"_2").val(cotizacion_detalle_control.cotizacion_detalleActual.id_cotizacion).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_detalle_control.cotizacion_detalleActual.id_bodega!=null && cotizacion_detalle_control.cotizacion_detalleActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cotizacion_detalle_control.cotizacion_detalleActual.id_bodega) {
				jQuery("#t-cel_"+i+"_3").val(cotizacion_detalle_control.cotizacion_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_detalle_control.cotizacion_detalleActual.id_producto!=null && cotizacion_detalle_control.cotizacion_detalleActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cotizacion_detalle_control.cotizacion_detalleActual.id_producto) {
				jQuery("#t-cel_"+i+"_4").val(cotizacion_detalle_control.cotizacion_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cotizacion_detalle_control.cotizacion_detalleActual.id_unidad!=null && cotizacion_detalle_control.cotizacion_detalleActual.id_unidad>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cotizacion_detalle_control.cotizacion_detalleActual.id_unidad) {
				jQuery("#t-cel_"+i+"_5").val(cotizacion_detalle_control.cotizacion_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(cotizacion_detalle_control.cotizacion_detalleActual.cantidad);
		jQuery("#t-cel_"+i+"_7").val(cotizacion_detalle_control.cotizacion_detalleActual.precio);
		jQuery("#t-cel_"+i+"_8").val(cotizacion_detalle_control.cotizacion_detalleActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_9").val(cotizacion_detalle_control.cotizacion_detalleActual.descuento_monto);
		jQuery("#t-cel_"+i+"_10").val(cotizacion_detalle_control.cotizacion_detalleActual.sub_total);
		jQuery("#t-cel_"+i+"_11").val(cotizacion_detalle_control.cotizacion_detalleActual.iva_porciento);
		jQuery("#t-cel_"+i+"_12").val(cotizacion_detalle_control.cotizacion_detalleActual.iva_monto);
		jQuery("#t-cel_"+i+"_13").val(cotizacion_detalle_control.cotizacion_detalleActual.total);
		jQuery("#t-cel_"+i+"_14").val(cotizacion_detalle_control.cotizacion_detalleActual.observacion);
		jQuery("#t-cel_"+i+"_15").val(cotizacion_detalle_control.cotizacion_detalleActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_16").val(cotizacion_detalle_control.cotizacion_detalleActual.impuesto2_monto);
		
		if(cotizacion_detalle_control.cotizacion_detalleActual.id_otro_suplidor!=null && cotizacion_detalle_control.cotizacion_detalleActual.id_otro_suplidor>-1){
			if(jQuery("#t-cel_"+i+"_17").val() != cotizacion_detalle_control.cotizacion_detalleActual.id_otro_suplidor) {
				jQuery("#t-cel_"+i+"_17").val(cotizacion_detalle_control.cotizacion_detalleActual.id_otro_suplidor).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_17").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_17").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cotizacion_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(cotizacion_detalle_control) {
		cotizacion_detalle_funcion1.registrarControlesTableValidacionEdition(cotizacion_detalle_control,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(cotizacion_detalle_control) {
		jQuery("#divResumencotizacion_detalleActualAjaxWebPart").html(cotizacion_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cotizacion_detalle_control) {
		//jQuery("#divAccionesRelacionescotizacion_detalleAjaxWebPart").html(cotizacion_detalle_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("cotizacion_detalle_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cotizacion_detalle_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescotizacion_detalleAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		cotizacion_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cotizacion_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cotizacion_detalle_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cotizacion_detalle_control) {
		
		if(cotizacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",cotizacion_detalle_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",cotizacion_detalle_control.strVisibleFK_Idbodega);
		}

		if(cotizacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idcotizacion").attr("style",cotizacion_detalle_control.strVisibleFK_Idcotizacion);
			jQuery("#tblstrVisible"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idcotizacion").attr("style",cotizacion_detalle_control.strVisibleFK_Idcotizacion);
		}

		if(cotizacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idotro_suplidor").attr("style",cotizacion_detalle_control.strVisibleFK_Idotro_suplidor);
			jQuery("#tblstrVisible"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idotro_suplidor").attr("style",cotizacion_detalle_control.strVisibleFK_Idotro_suplidor);
		}

		if(cotizacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",cotizacion_detalle_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",cotizacion_detalle_control.strVisibleFK_Idproducto);
		}

		if(cotizacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",cotizacion_detalle_control.strVisibleFK_Idunidad);
			jQuery("#tblstrVisible"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",cotizacion_detalle_control.strVisibleFK_Idunidad);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncotizacion_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cotizacion_detalle",id,"inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);		
	}
	
	

	abrirBusquedaParacotizacion(strNombreCampoBusqueda){//idActual
		cotizacion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cotizacion_detalle","cotizacion","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		cotizacion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cotizacion_detalle","bodega","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		cotizacion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cotizacion_detalle","producto","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		cotizacion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cotizacion_detalle","unidad","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}

	abrirBusquedaParaotro_suplidor(strNombreCampoBusqueda){//idActual
		cotizacion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cotizacion_detalle","otro_suplidor","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalleConstante,strParametros);
		
		//cotizacion_detalle_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarComboscotizacionsFK(cotizacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_cotizacion",cotizacion_detalle_control.cotizacionsFK);

		if(cotizacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_detalle_control.idFilaTablaActual+"_2",cotizacion_detalle_control.cotizacionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idcotizacion-cmbid_cotizacion",cotizacion_detalle_control.cotizacionsFK);

	};

	cargarCombosbodegasFK(cotizacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega",cotizacion_detalle_control.bodegasFK);

		if(cotizacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_detalle_control.idFilaTablaActual+"_3",cotizacion_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",cotizacion_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(cotizacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto",cotizacion_detalle_control.productosFK);

		if(cotizacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_detalle_control.idFilaTablaActual+"_4",cotizacion_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",cotizacion_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(cotizacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_unidad",cotizacion_detalle_control.unidadsFK);

		if(cotizacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_detalle_control.idFilaTablaActual+"_5",cotizacion_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",cotizacion_detalle_control.unidadsFK);

	};

	cargarCombosotro_suplidorsFK(cotizacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_otro_suplidor",cotizacion_detalle_control.otro_suplidorsFK);

		if(cotizacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cotizacion_detalle_control.idFilaTablaActual+"_17",cotizacion_detalle_control.otro_suplidorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor",cotizacion_detalle_control.otro_suplidorsFK);

	};

	
	
	registrarComboActionChangeComboscotizacionsFK(cotizacion_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(cotizacion_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(cotizacion_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(cotizacion_detalle_control) {

	};

	registrarComboActionChangeCombosotro_suplidorsFK(cotizacion_detalle_control) {

	};

	
	
	setDefectoValorComboscotizacionsFK(cotizacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_detalle_control.idcotizacionDefaultFK>-1 && jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_cotizacion").val() != cotizacion_detalle_control.idcotizacionDefaultFK) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_cotizacion").val(cotizacion_detalle_control.idcotizacionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idcotizacion-cmbid_cotizacion").val(cotizacion_detalle_control.idcotizacionDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idcotizacion-cmbid_cotizacion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idcotizacion-cmbid_cotizacion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(cotizacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != cotizacion_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(cotizacion_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(cotizacion_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(cotizacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != cotizacion_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto").val(cotizacion_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(cotizacion_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(cotizacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != cotizacion_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(cotizacion_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(cotizacion_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosotro_suplidorsFK(cotizacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cotizacion_detalle_control.idotro_suplidorDefaultFK>-1 && jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_otro_suplidor").val() != cotizacion_detalle_control.idotro_suplidorDefaultFK) {
				jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_otro_suplidor").val(cotizacion_detalle_control.idotro_suplidorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor").val(cotizacion_detalle_control.idotro_suplidorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cotizacion_detalle_constante1.STR_SUFIJO+"FK_Idotro_suplidor-cmbid_otro_suplidor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("cotizacion_detalle","inventario","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("cotizacion_detalle","inventario","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	





	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cotizacion_detalle_control
		
	

		var cantidad="form"+cotizacion_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("cotizacion_detalle","inventario","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

		var precio="form"+cotizacion_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("cotizacion_detalle","inventario","","precio",precio,"","",paraEventoTabla,idFilaTabla,cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

		var descuento_porciento="form"+cotizacion_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("cotizacion_detalle","inventario","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

		var iva_porciento="form"+cotizacion_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("cotizacion_detalle","inventario","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(cotizacion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cotizacion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cotizacion",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.setDefectoValorComboscotizacionsFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.setDefectoValorCombosbodegasFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.setDefectoValorCombosproductosFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.setDefectoValorCombosunidadsFK(cotizacion_detalle_control);
			}

			if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_suplidor",cotizacion_detalle_control.strRecargarFkTipos,",")) { 
				cotizacion_detalle_webcontrol1.setDefectoValorCombosotro_suplidorsFK(cotizacion_detalle_control);
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
	onLoadCombosEventosFK(cotizacion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cotizacion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cotizacion",cotizacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_detalle_webcontrol1.registrarComboActionChangeComboscotizacionsFK(cotizacion_detalle_control);
			//}

			//if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",cotizacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(cotizacion_detalle_control);
			//}

			//if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",cotizacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(cotizacion_detalle_control);
			//}

			//if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",cotizacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(cotizacion_detalle_control);
			//}

			//if(cotizacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_otro_suplidor",cotizacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cotizacion_detalle_webcontrol1.registrarComboActionChangeCombosotro_suplidorsFK(cotizacion_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cotizacion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cotizacion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cotizacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cotizacion_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("cotizacion_detalle","FK_Idbodega","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cotizacion_detalle","FK_Idcotizacion","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cotizacion_detalle","FK_Idotro_suplidor","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cotizacion_detalle","FK_Idproducto","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cotizacion_detalle","FK_Idunidad","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
		
			
			if(cotizacion_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cotizacion_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cotizacion_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(cotizacion_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,"cotizacion_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cotizacion","id_cotizacion","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_cotizacion_img_busqueda").click(function(){
				cotizacion_detalle_webcontrol1.abrirBusquedaParacotizacion("id_cotizacion");
				//alert(jQuery('#form-id_cotizacion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				cotizacion_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				cotizacion_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				cotizacion_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("otro_suplidor","id_otro_suplidor","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cotizacion_detalle_constante1.STR_SUFIJO+"-id_otro_suplidor_img_busqueda").click(function(){
				cotizacion_detalle_webcontrol1.abrirBusquedaParaotro_suplidor("id_otro_suplidor");
				//alert(jQuery('#form-id_otro_suplidor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cotizacion_detalle_control) {
		
		jQuery("#divBusquedacotizacion_detalleAjaxWebPart").css("display",cotizacion_detalle_control.strPermisoBusqueda);
		jQuery("#trcotizacion_detalleCabeceraBusquedas").css("display",cotizacion_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedacotizacion_detalle").css("display",cotizacion_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecotizacion_detalle").css("display",cotizacion_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscotizacion_detalle").attr("style",cotizacion_detalle_control.strPermisoMostrarTodos);		
		
		if(cotizacion_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdcotizacion_detalleNuevo").css("display",cotizacion_detalle_control.strPermisoNuevo);
			jQuery("#tdcotizacion_detalleNuevoToolBar").css("display",cotizacion_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcotizacion_detalleDuplicar").css("display",cotizacion_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcotizacion_detalleDuplicarToolBar").css("display",cotizacion_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcotizacion_detalleNuevoGuardarCambios").css("display",cotizacion_detalle_control.strPermisoNuevo);
			jQuery("#tdcotizacion_detalleNuevoGuardarCambiosToolBar").css("display",cotizacion_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cotizacion_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdcotizacion_detalleCopiar").css("display",cotizacion_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcotizacion_detalleCopiarToolBar").css("display",cotizacion_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcotizacion_detalleConEditar").css("display",cotizacion_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdcotizacion_detalleGuardarCambios").css("display",cotizacion_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcotizacion_detalleGuardarCambiosToolBar").css("display",cotizacion_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcotizacion_detalleCerrarPagina").css("display",cotizacion_detalle_control.strPermisoPopup);		
		jQuery("#tdcotizacion_detalleCerrarPaginaToolBar").css("display",cotizacion_detalle_control.strPermisoPopup);
		//jQuery("#trcotizacion_detalleAccionesRelaciones").css("display",cotizacion_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cotizacion_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cotizacion_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cotizacion_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cotizacion Detalles";
		sTituloBanner+=" - " + cotizacion_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cotizacion_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcotizacion_detalleRelacionesToolBar").css("display",cotizacion_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscotizacion_detalle").css("display",cotizacion_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cotizacion_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cotizacion_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cotizacion_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cotizacion_detalle_webcontrol1.registrarEventosControles();
		
		if(cotizacion_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cotizacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			cotizacion_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cotizacion_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(cotizacion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				cotizacion_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cotizacion_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cotizacion_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cotizacion_detalle_webcontrol1.onLoad();
			
			//} else {
				//if(cotizacion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			cotizacion_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cotizacion_detalle","inventario","",cotizacion_detalle_funcion1,cotizacion_detalle_webcontrol1,cotizacion_detalle_constante1);	
	}
}

var cotizacion_detalle_webcontrol1 = new cotizacion_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cotizacion_detalle_webcontrol,cotizacion_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.cotizacion_detalle_webcontrol1 = cotizacion_detalle_webcontrol1;


if(cotizacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cotizacion_detalle_webcontrol1.onLoadWindow; 
}

//</script>