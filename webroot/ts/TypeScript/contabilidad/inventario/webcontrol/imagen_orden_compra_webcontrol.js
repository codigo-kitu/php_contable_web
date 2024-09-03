//<script type="text/javascript" language="javascript">



//var imagen_orden_compraJQueryPaginaWebInteraccion= function (imagen_orden_compra_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_orden_compra_constante,imagen_orden_compra_constante1} from '../util/imagen_orden_compra_constante.js';

import {imagen_orden_compra_funcion,imagen_orden_compra_funcion1} from '../util/imagen_orden_compra_funcion.js';


class imagen_orden_compra_webcontrol extends GeneralEntityWebControl {
	
	imagen_orden_compra_control=null;
	imagen_orden_compra_controlInicial=null;
	imagen_orden_compra_controlAuxiliar=null;
		
	//if(imagen_orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_orden_compra_control) {
		super();
		
		this.imagen_orden_compra_control=imagen_orden_compra_control;
	}
		
	actualizarVariablesPagina(imagen_orden_compra_control) {
		
		if(imagen_orden_compra_control.action=="index" || imagen_orden_compra_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_orden_compra_control);
			
		} 
		
		
		else if(imagen_orden_compra_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_orden_compra_control);
			
		} else if(imagen_orden_compra_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_orden_compra_control);
			
		} else if(imagen_orden_compra_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_orden_compra_control);		
		
		} else if(imagen_orden_compra_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_orden_compra_control);
		
		}  else if(imagen_orden_compra_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_orden_compra_control);
		
		} else if(imagen_orden_compra_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_orden_compra_control);		
		
		} else if(imagen_orden_compra_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_orden_compra_control);		
		
		} else if(imagen_orden_compra_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_orden_compra_control);		
		
		} else if(imagen_orden_compra_control.action.includes("Busqueda") ||
				  imagen_orden_compra_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(imagen_orden_compra_control);
			
		} else if(imagen_orden_compra_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_orden_compra_control)
		}
		
		
		
	
		else if(imagen_orden_compra_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_orden_compra_control);	
		
		} else if(imagen_orden_compra_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_orden_compra_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_orden_compra_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_orden_compra_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_orden_compra_control) {
		this.actualizarPaginaAccionesGenerales(imagen_orden_compra_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_orden_compra_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_orden_compra_control);
		this.actualizarPaginaOrderBy(imagen_orden_compra_control);
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		this.actualizarPaginaCargaGeneralControles(imagen_orden_compra_control);
		//this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_orden_compra_control);
		this.actualizarPaginaAreaBusquedas(imagen_orden_compra_control);
		this.actualizarPaginaCargaCombosFK(imagen_orden_compra_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_orden_compra_control) {
		//this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_orden_compra_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_orden_compra_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_orden_compra_control);
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		this.actualizarPaginaCargaGeneralControles(imagen_orden_compra_control);
		//this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_orden_compra_control);
		this.actualizarPaginaAreaBusquedas(imagen_orden_compra_control);
		this.actualizarPaginaCargaCombosFK(imagen_orden_compra_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		//this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		//this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		//this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_orden_compra_control) {
		//this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_orden_compra_control) {
		this.actualizarPaginaAbrirLink(imagen_orden_compra_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);				
		//this.actualizarPaginaFormulario(imagen_orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		//this.actualizarPaginaFormulario(imagen_orden_compra_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		//this.actualizarPaginaFormulario(imagen_orden_compra_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_orden_compra_control) {
		//this.actualizarPaginaFormulario(imagen_orden_compra_control);
		this.onLoadCombosDefectoFK(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		//this.actualizarPaginaFormulario(imagen_orden_compra_control);
		this.onLoadCombosDefectoFK(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_orden_compra_control) {
		this.actualizarPaginaAbrirLink(imagen_orden_compra_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_orden_compra_control) {
		this.actualizarPaginaTablaDatos(imagen_orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_orden_compra_control) {
					//super.actualizarPaginaImprimir(imagen_orden_compra_control,"imagen_orden_compra");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_orden_compra_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("imagen_orden_compra_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_orden_compra_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_orden_compra_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_orden_compra_control) {
		//super.actualizarPaginaImprimir(imagen_orden_compra_control,"imagen_orden_compra");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("imagen_orden_compra_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(imagen_orden_compra_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_orden_compra_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_orden_compra_control) {
		//super.actualizarPaginaImprimir(imagen_orden_compra_control,"imagen_orden_compra");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("imagen_orden_compra_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_orden_compra_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_orden_compra_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_orden_compra_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_orden_compra_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_orden_compra_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(imagen_orden_compra_control);
			
		this.actualizarPaginaAbrirLink(imagen_orden_compra_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_orden_compra_control) {
		
		if(imagen_orden_compra_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_orden_compra_control);
		}
		
		if(imagen_orden_compra_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_orden_compra_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_orden_compra_control) {
		if(imagen_orden_compra_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_orden_compraReturnGeneral",JSON.stringify(imagen_orden_compra_control.imagen_orden_compraReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_orden_compra_control) {
		if(imagen_orden_compra_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_orden_compra_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_orden_compra_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_orden_compra_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_orden_compra_control, mostrar) {
		
		if(mostrar==true) {
			imagen_orden_compra_funcion1.resaltarRestaurarDivsPagina(false,"imagen_orden_compra");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_orden_compra_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_orden_compra");
			}			
			
			imagen_orden_compra_funcion1.mostrarDivMensaje(true,imagen_orden_compra_control.strAuxiliarMensaje,imagen_orden_compra_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_orden_compra_funcion1.mostrarDivMensaje(false,imagen_orden_compra_control.strAuxiliarMensaje,imagen_orden_compra_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_orden_compra_control) {
		if(imagen_orden_compra_funcion1.esPaginaForm(imagen_orden_compra_constante1)==true) {
			window.opener.imagen_orden_compra_webcontrol1.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_orden_compra_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_orden_compra_control) {
		imagen_orden_compra_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_orden_compra_control.strAuxiliarUrlPagina);
				
		imagen_orden_compra_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_orden_compra_control.strAuxiliarTipo,imagen_orden_compra_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_orden_compra_control) {
		imagen_orden_compra_funcion1.resaltarRestaurarDivMensaje(true,imagen_orden_compra_control.strAuxiliarMensajeAlert,imagen_orden_compra_control.strAuxiliarCssMensaje);
			
		if(imagen_orden_compra_funcion1.esPaginaForm(imagen_orden_compra_constante1)==true) {
			window.opener.imagen_orden_compra_funcion1.resaltarRestaurarDivMensaje(true,imagen_orden_compra_control.strAuxiliarMensajeAlert,imagen_orden_compra_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_orden_compra_control) {
		this.imagen_orden_compra_controlInicial=imagen_orden_compra_control;
			
		if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_orden_compra_control.strStyleDivArbol,imagen_orden_compra_control.strStyleDivContent
																,imagen_orden_compra_control.strStyleDivOpcionesBanner,imagen_orden_compra_control.strStyleDivExpandirColapsar
																,imagen_orden_compra_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_orden_compra_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_orden_compra_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_orden_compra_control) {
		this.actualizarCssBotonesPagina(imagen_orden_compra_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_orden_compra_control.tiposReportes,imagen_orden_compra_control.tiposReporte
															 	,imagen_orden_compra_control.tiposPaginacion,imagen_orden_compra_control.tiposAcciones
																,imagen_orden_compra_control.tiposColumnasSelect,imagen_orden_compra_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_orden_compra_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_orden_compra_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_orden_compra_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_orden_compra_control) {
	
		var indexPosition=imagen_orden_compra_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_orden_compra_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_orden_compra_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_orden_compra_control.strRecargarFkTiposNinguno!=null && imagen_orden_compra_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_orden_compra_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(imagen_orden_compra_control) {
		jQuery("#divBusquedaimagen_orden_compraAjaxWebPart").css("display",imagen_orden_compra_control.strPermisoBusqueda);
		jQuery("#trimagen_orden_compraCabeceraBusquedas").css("display",imagen_orden_compra_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_orden_compra").css("display",imagen_orden_compra_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_orden_compra_control.htmlTablaOrderBy!=null
			&& imagen_orden_compra_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_orden_compraAjaxWebPart").html(imagen_orden_compra_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_orden_compra_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_orden_compra_control.htmlTablaOrderByRel!=null
			&& imagen_orden_compra_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_orden_compraAjaxWebPart").html(imagen_orden_compra_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_orden_compraAjaxWebPart").css("display","none");
			jQuery("#trimagen_orden_compraCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_orden_compra").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(imagen_orden_compra_control) {
		
		if(!imagen_orden_compra_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(imagen_orden_compra_control);
		} else {
			jQuery("#divTablaDatosimagen_orden_comprasAjaxWebPart").html(imagen_orden_compra_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_orden_compras=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_orden_compras=jQuery("#tblTablaDatosimagen_orden_compras").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_orden_compra",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_orden_compra_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_orden_compra_webcontrol1.registrarControlesTableEdition(imagen_orden_compra_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_orden_compra_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(imagen_orden_compra_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("imagen_orden_compra_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_orden_compra_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosimagen_orden_comprasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(imagen_orden_compra_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(imagen_orden_compra_control);
		
		const divOrderBy = document.getElementById("divOrderByimagen_orden_compraAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(imagen_orden_compra_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelimagen_orden_compraAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(imagen_orden_compra_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_orden_compra_control.imagen_orden_compraActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_orden_compra_control);			
		}
	}
	
	actualizarCamposFilaTabla(imagen_orden_compra_control) {
		var i=0;
		
		i=imagen_orden_compra_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_orden_compra_control.imagen_orden_compraActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_orden_compra_control.imagen_orden_compraActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(imagen_orden_compra_control.imagen_orden_compraActual.imagen);
		jQuery("#t-cel_"+i+"_3").val(imagen_orden_compra_control.imagen_orden_compraActual.nro_compra);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_orden_compra_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_orden_compra_control) {
		imagen_orden_compra_funcion1.registrarControlesTableValidacionEdition(imagen_orden_compra_control,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_orden_compra_control) {
		jQuery("#divResumenimagen_orden_compraActualAjaxWebPart").html(imagen_orden_compra_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_orden_compra_control) {
		//jQuery("#divAccionesRelacionesimagen_orden_compraAjaxWebPart").html(imagen_orden_compra_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("imagen_orden_compra_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_orden_compra_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesimagen_orden_compraAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		imagen_orden_compra_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_orden_compra_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_orden_compra_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_orden_compra_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_orden_compra();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_orden_compra",id,"inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compraConstante,strParametros);
		
		//imagen_orden_compra_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_orden_compra_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(imagen_orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_orden_compra_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);			
			
			
		
			
			if(imagen_orden_compra_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_orden_compra");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_orden_compra");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,"imagen_orden_compra");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_orden_compra_control) {
		
		jQuery("#divBusquedaimagen_orden_compraAjaxWebPart").css("display",imagen_orden_compra_control.strPermisoBusqueda);
		jQuery("#trimagen_orden_compraCabeceraBusquedas").css("display",imagen_orden_compra_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_orden_compra").css("display",imagen_orden_compra_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_orden_compra").css("display",imagen_orden_compra_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_orden_compra").attr("style",imagen_orden_compra_control.strPermisoMostrarTodos);		
		
		if(imagen_orden_compra_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_orden_compraNuevo").css("display",imagen_orden_compra_control.strPermisoNuevo);
			jQuery("#tdimagen_orden_compraNuevoToolBar").css("display",imagen_orden_compra_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_orden_compraDuplicar").css("display",imagen_orden_compra_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_orden_compraDuplicarToolBar").css("display",imagen_orden_compra_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_orden_compraNuevoGuardarCambios").css("display",imagen_orden_compra_control.strPermisoNuevo);
			jQuery("#tdimagen_orden_compraNuevoGuardarCambiosToolBar").css("display",imagen_orden_compra_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_orden_compra_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_orden_compraCopiar").css("display",imagen_orden_compra_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_orden_compraCopiarToolBar").css("display",imagen_orden_compra_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_orden_compraConEditar").css("display",imagen_orden_compra_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_orden_compraGuardarCambios").css("display",imagen_orden_compra_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_orden_compraGuardarCambiosToolBar").css("display",imagen_orden_compra_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdimagen_orden_compraCerrarPagina").css("display",imagen_orden_compra_control.strPermisoPopup);		
		jQuery("#tdimagen_orden_compraCerrarPaginaToolBar").css("display",imagen_orden_compra_control.strPermisoPopup);
		//jQuery("#trimagen_orden_compraAccionesRelaciones").css("display",imagen_orden_compra_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_orden_compra_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_orden_compra_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_orden_compra_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Orden Compras";
		sTituloBanner+=" - " + imagen_orden_compra_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_orden_compra_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_orden_compraRelacionesToolBar").css("display",imagen_orden_compra_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_orden_compra").css("display",imagen_orden_compra_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_orden_compra_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_orden_compra_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_orden_compra_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_orden_compra_webcontrol1.registrarEventosControles();
		
		if(imagen_orden_compra_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			imagen_orden_compra_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_orden_compra_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_orden_compra_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_orden_compra_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_orden_compra_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_orden_compra_webcontrol1.onLoad();
			
			//} else {
				//if(imagen_orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			imagen_orden_compra_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_orden_compra","inventario","",imagen_orden_compra_funcion1,imagen_orden_compra_webcontrol1,imagen_orden_compra_constante1);	
	}
}

var imagen_orden_compra_webcontrol1 = new imagen_orden_compra_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_orden_compra_webcontrol,imagen_orden_compra_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_orden_compra_webcontrol1 = imagen_orden_compra_webcontrol1;


if(imagen_orden_compra_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_orden_compra_webcontrol1.onLoadWindow; 
}

//</script>