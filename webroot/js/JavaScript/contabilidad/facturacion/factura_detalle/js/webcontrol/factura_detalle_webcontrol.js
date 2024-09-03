//<script type="text/javascript" language="javascript">



//var factura_detalleJQueryPaginaWebInteraccion= function (factura_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {factura_detalle_constante,factura_detalle_constante1} from '../util/factura_detalle_constante.js';

import {factura_detalle_funcion,factura_detalle_funcion1} from '../util/factura_detalle_funcion.js';


class factura_detalle_webcontrol extends GeneralEntityWebControl {
	
	factura_detalle_control=null;
	factura_detalle_controlInicial=null;
	factura_detalle_controlAuxiliar=null;
		
	//if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(factura_detalle_control) {
		super();
		
		this.factura_detalle_control=factura_detalle_control;
	}
		
	actualizarVariablesPagina(factura_detalle_control) {
		
		if(factura_detalle_control.action=="index" || factura_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(factura_detalle_control);
			
		} 
		
		
		else if(factura_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(factura_detalle_control);
			
		} else if(factura_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(factura_detalle_control);
			
		} else if(factura_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_detalle_control);		
		
		} else if(factura_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(factura_detalle_control);
		
		}  else if(factura_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_detalle_control);
		
		} else if(factura_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_detalle_control);		
		
		} else if(factura_detalle_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(factura_detalle_control);		
		
		} else if(factura_detalle_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(factura_detalle_control);		
		
		} else if(factura_detalle_control.action.includes("Busqueda") ||
				  factura_detalle_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(factura_detalle_control);
			
		} else if(factura_detalle_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(factura_detalle_control)
		}
		
		
		
	
		else if(factura_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(factura_detalle_control);	
		
		} else if(factura_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(factura_detalle_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + factura_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(factura_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(factura_detalle_control) {
		this.actualizarPaginaAccionesGenerales(factura_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(factura_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(factura_detalle_control);
		this.actualizarPaginaOrderBy(factura_detalle_control);
		this.actualizarPaginaTablaDatos(factura_detalle_control);
		this.actualizarPaginaCargaGeneralControles(factura_detalle_control);
		//this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_detalle_control);
		this.actualizarPaginaAreaBusquedas(factura_detalle_control);
		this.actualizarPaginaCargaCombosFK(factura_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(factura_detalle_control) {
		//this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(factura_detalle_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(factura_detalle_control);
		this.actualizarPaginaTablaDatos(factura_detalle_control);
		this.actualizarPaginaCargaGeneralControles(factura_detalle_control);
		//this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_detalle_control);
		this.actualizarPaginaAreaBusquedas(factura_detalle_control);
		this.actualizarPaginaCargaCombosFK(factura_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		//this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		//this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		//this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(factura_detalle_control) {
		//this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_detalle_control) {
		this.actualizarPaginaAbrirLink(factura_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);				
		//this.actualizarPaginaFormulario(factura_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);
		//this.actualizarPaginaFormulario(factura_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);
		//this.actualizarPaginaFormulario(factura_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(factura_detalle_control) {
		//this.actualizarPaginaFormulario(factura_detalle_control);
		this.onLoadCombosDefectoFK(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);
		//this.actualizarPaginaFormulario(factura_detalle_control);
		this.onLoadCombosDefectoFK(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_detalle_control) {
		this.actualizarPaginaAbrirLink(factura_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(factura_detalle_control) {
		this.actualizarPaginaTablaDatos(factura_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_detalle_control) {
					//super.actualizarPaginaImprimir(factura_detalle_control,"factura_detalle");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",factura_detalle_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("factura_detalle_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(factura_detalle_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(factura_detalle_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_detalle_control) {
		//super.actualizarPaginaImprimir(factura_detalle_control,"factura_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("factura_detalle_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(factura_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",factura_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(factura_detalle_control) {
		//super.actualizarPaginaImprimir(factura_detalle_control,"factura_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("factura_detalle_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(factura_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",factura_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(factura_detalle_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(factura_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(factura_detalle_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(factura_detalle_control);
			
		this.actualizarPaginaAbrirLink(factura_detalle_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(factura_detalle_control) {
		
		if(factura_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(factura_detalle_control);
		}
		
		if(factura_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(factura_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(factura_detalle_control) {
		if(factura_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("factura_detalleReturnGeneral",JSON.stringify(factura_detalle_control.factura_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(factura_detalle_control) {
		if(factura_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(factura_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(factura_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(factura_detalle_control, mostrar) {
		
		if(mostrar==true) {
			factura_detalle_funcion1.resaltarRestaurarDivsPagina(false,"factura_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				factura_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"factura_detalle");
			}			
			
			factura_detalle_funcion1.mostrarDivMensaje(true,factura_detalle_control.strAuxiliarMensaje,factura_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			factura_detalle_funcion1.mostrarDivMensaje(false,factura_detalle_control.strAuxiliarMensaje,factura_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(factura_detalle_control) {
		if(factura_detalle_funcion1.esPaginaForm(factura_detalle_constante1)==true) {
			window.opener.factura_detalle_webcontrol1.actualizarPaginaTablaDatos(factura_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(factura_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(factura_detalle_control) {
		factura_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(factura_detalle_control.strAuxiliarUrlPagina);
				
		factura_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(factura_detalle_control.strAuxiliarTipo,factura_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(factura_detalle_control) {
		factura_detalle_funcion1.resaltarRestaurarDivMensaje(true,factura_detalle_control.strAuxiliarMensajeAlert,factura_detalle_control.strAuxiliarCssMensaje);
			
		if(factura_detalle_funcion1.esPaginaForm(factura_detalle_constante1)==true) {
			window.opener.factura_detalle_funcion1.resaltarRestaurarDivMensaje(true,factura_detalle_control.strAuxiliarMensajeAlert,factura_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(factura_detalle_control) {
		this.factura_detalle_controlInicial=factura_detalle_control;
			
		if(factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(factura_detalle_control.strStyleDivArbol,factura_detalle_control.strStyleDivContent
																,factura_detalle_control.strStyleDivOpcionesBanner,factura_detalle_control.strStyleDivExpandirColapsar
																,factura_detalle_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=factura_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",factura_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(factura_detalle_control) {
		this.actualizarCssBotonesPagina(factura_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(factura_detalle_control.tiposReportes,factura_detalle_control.tiposReporte
															 	,factura_detalle_control.tiposPaginacion,factura_detalle_control.tiposAcciones
																,factura_detalle_control.tiposColumnasSelect,factura_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(factura_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(factura_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(factura_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(factura_detalle_control) {
	
		var indexPosition=factura_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=factura_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(factura_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.cargarCombosfacturasFK(factura_detalle_control);
			}

			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.cargarCombosbodegasFK(factura_detalle_control);
			}

			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.cargarCombosproductosFK(factura_detalle_control);
			}

			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.cargarCombosunidadsFK(factura_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(factura_detalle_control.strRecargarFkTiposNinguno!=null && factura_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && factura_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(factura_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_factura",factura_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_detalle_webcontrol1.cargarCombosfacturasFK(factura_detalle_control);
				}

				if(factura_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",factura_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_detalle_webcontrol1.cargarCombosbodegasFK(factura_detalle_control);
				}

				if(factura_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",factura_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_detalle_webcontrol1.cargarCombosproductosFK(factura_detalle_control);
				}

				if(factura_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",factura_detalle_control.strRecargarFkTiposNinguno,",")) { 
					factura_detalle_webcontrol1.cargarCombosunidadsFK(factura_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.factura_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.factura_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.factura_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.factura_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.factura_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.factura_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablafacturaFK(factura_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_detalle_funcion1,factura_detalle_control.facturasFK);
	}

	cargarComboEditarTablabodegaFK(factura_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_detalle_funcion1,factura_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(factura_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_detalle_funcion1,factura_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(factura_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_detalle_funcion1,factura_detalle_control.unidadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(factura_detalle_control) {
		jQuery("#divBusquedafactura_detalleAjaxWebPart").css("display",factura_detalle_control.strPermisoBusqueda);
		jQuery("#trfactura_detalleCabeceraBusquedas").css("display",factura_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura_detalle").css("display",factura_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(factura_detalle_control.htmlTablaOrderBy!=null
			&& factura_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByfactura_detalleAjaxWebPart").html(factura_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//factura_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(factura_detalle_control.htmlTablaOrderByRel!=null
			&& factura_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelfactura_detalleAjaxWebPart").html(factura_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(factura_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedafactura_detalleAjaxWebPart").css("display","none");
			jQuery("#trfactura_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedafactura_detalle").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(factura_detalle_control) {
		
		if(!factura_detalle_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(factura_detalle_control);
		} else {
			jQuery("#divTablaDatosfactura_detallesAjaxWebPart").html(factura_detalle_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosfactura_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosfactura_detalles=jQuery("#tblTablaDatosfactura_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("factura_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',factura_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			factura_detalle_webcontrol1.registrarControlesTableEdition(factura_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		factura_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(factura_detalle_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("factura_detalle_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(factura_detalle_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosfactura_detallesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(factura_detalle_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(factura_detalle_control);
		
		const divOrderBy = document.getElementById("divOrderByfactura_detalleAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(factura_detalle_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelfactura_detalleAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(factura_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(factura_detalle_control.factura_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(factura_detalle_control);			
		}
	}
	
	actualizarCamposFilaTabla(factura_detalle_control) {
		var i=0;
		
		i=factura_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(factura_detalle_control.factura_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(factura_detalle_control.factura_detalleActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(factura_detalle_control.factura_detalleActual.versionRow);
		
		if(factura_detalle_control.factura_detalleActual.id_factura!=null && factura_detalle_control.factura_detalleActual.id_factura>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != factura_detalle_control.factura_detalleActual.id_factura) {
				jQuery("#t-cel_"+i+"_3").val(factura_detalle_control.factura_detalleActual.id_factura).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_detalle_control.factura_detalleActual.id_bodega!=null && factura_detalle_control.factura_detalleActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != factura_detalle_control.factura_detalleActual.id_bodega) {
				jQuery("#t-cel_"+i+"_4").val(factura_detalle_control.factura_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_detalle_control.factura_detalleActual.id_producto!=null && factura_detalle_control.factura_detalleActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != factura_detalle_control.factura_detalleActual.id_producto) {
				jQuery("#t-cel_"+i+"_5").val(factura_detalle_control.factura_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_detalle_control.factura_detalleActual.id_unidad!=null && factura_detalle_control.factura_detalleActual.id_unidad>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != factura_detalle_control.factura_detalleActual.id_unidad) {
				jQuery("#t-cel_"+i+"_6").val(factura_detalle_control.factura_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(factura_detalle_control.factura_detalleActual.cantidad);
		jQuery("#t-cel_"+i+"_8").val(factura_detalle_control.factura_detalleActual.precio);
		jQuery("#t-cel_"+i+"_9").val(factura_detalle_control.factura_detalleActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_10").val(factura_detalle_control.factura_detalleActual.descuento_monto);
		jQuery("#t-cel_"+i+"_11").val(factura_detalle_control.factura_detalleActual.sub_total);
		jQuery("#t-cel_"+i+"_12").val(factura_detalle_control.factura_detalleActual.iva_porciento);
		jQuery("#t-cel_"+i+"_13").val(factura_detalle_control.factura_detalleActual.iva_monto);
		jQuery("#t-cel_"+i+"_14").val(factura_detalle_control.factura_detalleActual.total);
		jQuery("#t-cel_"+i+"_15").val(factura_detalle_control.factura_detalleActual.recibido);
		jQuery("#t-cel_"+i+"_16").val(factura_detalle_control.factura_detalleActual.observacion);
		jQuery("#t-cel_"+i+"_17").val(factura_detalle_control.factura_detalleActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_18").val(factura_detalle_control.factura_detalleActual.impuesto2_monto);
		jQuery("#t-cel_"+i+"_19").val(factura_detalle_control.factura_detalleActual.cotizacion);
		jQuery("#t-cel_"+i+"_20").val(factura_detalle_control.factura_detalleActual.moneda);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(factura_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(factura_detalle_control) {
		factura_detalle_funcion1.registrarControlesTableValidacionEdition(factura_detalle_control,factura_detalle_webcontrol1,factura_detalle_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(factura_detalle_control) {
		jQuery("#divResumenfactura_detalleActualAjaxWebPart").html(factura_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_detalle_control) {
		//jQuery("#divAccionesRelacionesfactura_detalleAjaxWebPart").html(factura_detalle_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("factura_detalle_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(factura_detalle_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesfactura_detalleAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		factura_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(factura_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(factura_detalle_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(factura_detalle_control) {
		
		if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",factura_detalle_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",factura_detalle_control.strVisibleFK_Idbodega);
		}

		if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idfactura").attr("style",factura_detalle_control.strVisibleFK_Idfactura);
			jQuery("#tblstrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idfactura").attr("style",factura_detalle_control.strVisibleFK_Idfactura);
		}

		if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",factura_detalle_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",factura_detalle_control.strVisibleFK_Idproducto);
		}

		if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",factura_detalle_control.strVisibleFK_Idunidad);
			jQuery("#tblstrVisible"+factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",factura_detalle_control.strVisibleFK_Idunidad);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionfactura_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("factura_detalle",id,"facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);		
	}
	
	

	abrirBusquedaParafactura(strNombreCampoBusqueda){//idActual
		factura_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_detalle","factura","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		factura_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_detalle","bodega","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		factura_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_detalle","producto","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		factura_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_detalle","unidad","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalleConstante,strParametros);
		
		//factura_detalle_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosfacturasFK(factura_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_factura",factura_detalle_control.facturasFK);

		if(factura_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_detalle_control.idFilaTablaActual+"_3",factura_detalle_control.facturasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura",factura_detalle_control.facturasFK);

	};

	cargarCombosbodegasFK(factura_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega",factura_detalle_control.bodegasFK);

		if(factura_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_detalle_control.idFilaTablaActual+"_4",factura_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",factura_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(factura_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto",factura_detalle_control.productosFK);

		if(factura_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_detalle_control.idFilaTablaActual+"_5",factura_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",factura_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(factura_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_unidad",factura_detalle_control.unidadsFK);

		if(factura_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_detalle_control.idFilaTablaActual+"_6",factura_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",factura_detalle_control.unidadsFK);

	};

	
	
	registrarComboActionChangeCombosfacturasFK(factura_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(factura_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(factura_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(factura_detalle_control) {

	};

	
	
	setDefectoValorCombosfacturasFK(factura_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_detalle_control.idfacturaDefaultFK>-1 && jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_factura").val() != factura_detalle_control.idfacturaDefaultFK) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_factura").val(factura_detalle_control.idfacturaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val(factura_detalle_control.idfacturaDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(factura_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != factura_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega").val(factura_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(factura_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(factura_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto").val() != factura_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto").val(factura_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(factura_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(factura_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != factura_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_unidad").val(factura_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(factura_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("factura_detalle","facturacion","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("factura_detalle","facturacion","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//factura_detalle_control
		
	

		var cantidad="form"+factura_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_detalle","facturacion","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

		var precio="form"+factura_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_detalle","facturacion","","precio",precio,"","",paraEventoTabla,idFilaTabla,factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

		var descuento_porciento="form"+factura_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_detalle","facturacion","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

		var iva_porciento="form"+factura_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("factura_detalle","facturacion","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(factura_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.setDefectoValorCombosfacturasFK(factura_detalle_control);
			}

			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.setDefectoValorCombosbodegasFK(factura_detalle_control);
			}

			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.setDefectoValorCombosproductosFK(factura_detalle_control);
			}

			if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",factura_detalle_control.strRecargarFkTipos,",")) { 
				factura_detalle_webcontrol1.setDefectoValorCombosunidadsFK(factura_detalle_control);
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
	onLoadCombosEventosFK(factura_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",factura_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_detalle_webcontrol1.registrarComboActionChangeCombosfacturasFK(factura_detalle_control);
			//}

			//if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",factura_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(factura_detalle_control);
			//}

			//if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",factura_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(factura_detalle_control);
			//}

			//if(factura_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",factura_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(factura_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(factura_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(factura_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_detalle","FK_Idbodega","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_detalle","FK_Idfactura","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_detalle","FK_Idproducto","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_detalle","FK_Idunidad","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
		
			
			if(factura_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("factura_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("factura_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(factura_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,"factura_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("factura","id_factura","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_factura_img_busqueda").click(function(){
				factura_detalle_webcontrol1.abrirBusquedaParafactura("id_factura");
				//alert(jQuery('#form-id_factura_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				factura_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				factura_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				factura_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(factura_detalle_control) {
		
		jQuery("#divBusquedafactura_detalleAjaxWebPart").css("display",factura_detalle_control.strPermisoBusqueda);
		jQuery("#trfactura_detalleCabeceraBusquedas").css("display",factura_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura_detalle").css("display",factura_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportefactura_detalle").css("display",factura_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosfactura_detalle").attr("style",factura_detalle_control.strPermisoMostrarTodos);		
		
		if(factura_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdfactura_detalleNuevo").css("display",factura_detalle_control.strPermisoNuevo);
			jQuery("#tdfactura_detalleNuevoToolBar").css("display",factura_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdfactura_detalleDuplicar").css("display",factura_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfactura_detalleDuplicarToolBar").css("display",factura_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfactura_detalleNuevoGuardarCambios").css("display",factura_detalle_control.strPermisoNuevo);
			jQuery("#tdfactura_detalleNuevoGuardarCambiosToolBar").css("display",factura_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(factura_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdfactura_detalleCopiar").css("display",factura_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_detalleCopiarToolBar").css("display",factura_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_detalleConEditar").css("display",factura_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdfactura_detalleGuardarCambios").css("display",factura_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdfactura_detalleGuardarCambiosToolBar").css("display",factura_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdfactura_detalleCerrarPagina").css("display",factura_detalle_control.strPermisoPopup);		
		jQuery("#tdfactura_detalleCerrarPaginaToolBar").css("display",factura_detalle_control.strPermisoPopup);
		//jQuery("#trfactura_detalleAccionesRelaciones").css("display",factura_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=factura_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + factura_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + factura_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Factura Detalles";
		sTituloBanner+=" - " + factura_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + factura_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdfactura_detalleRelacionesToolBar").css("display",factura_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosfactura_detalle").css("display",factura_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		factura_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		factura_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		factura_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		factura_detalle_webcontrol1.registrarEventosControles();
		
		if(factura_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
			factura_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(factura_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(factura_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				factura_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(factura_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(factura_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				factura_detalle_webcontrol1.onLoad();
			
			//} else {
				//if(factura_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			factura_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("factura_detalle","facturacion","",factura_detalle_funcion1,factura_detalle_webcontrol1,factura_detalle_constante1);	
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

var factura_detalle_webcontrol1 = new factura_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {factura_detalle_webcontrol,factura_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.factura_detalle_webcontrol1 = factura_detalle_webcontrol1;


if(factura_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = factura_detalle_webcontrol1.onLoadWindow; 
}

//</script>