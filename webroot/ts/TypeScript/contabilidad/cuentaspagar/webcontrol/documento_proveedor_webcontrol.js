//<script type="text/javascript" language="javascript">



//var documento_proveedorJQueryPaginaWebInteraccion= function (documento_proveedor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {documento_proveedor_constante,documento_proveedor_constante1} from '../util/documento_proveedor_constante.js';

import {documento_proveedor_funcion,documento_proveedor_funcion1} from '../util/documento_proveedor_funcion.js';


class documento_proveedor_webcontrol extends GeneralEntityWebControl {
	
	documento_proveedor_control=null;
	documento_proveedor_controlInicial=null;
	documento_proveedor_controlAuxiliar=null;
		
	//if(documento_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(documento_proveedor_control) {
		super();
		
		this.documento_proveedor_control=documento_proveedor_control;
	}
		
	actualizarVariablesPagina(documento_proveedor_control) {
		
		if(documento_proveedor_control.action=="index" || documento_proveedor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(documento_proveedor_control);
			
		} 
		
		
		else if(documento_proveedor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(documento_proveedor_control);
			
		} else if(documento_proveedor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(documento_proveedor_control);
			
		} else if(documento_proveedor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_proveedor_control);		
		
		} else if(documento_proveedor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(documento_proveedor_control);
		
		}  else if(documento_proveedor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_proveedor_control);
		
		} else if(documento_proveedor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_proveedor_control);		
		
		} else if(documento_proveedor_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(documento_proveedor_control);		
		
		} else if(documento_proveedor_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(documento_proveedor_control);		
		
		} else if(documento_proveedor_control.action.includes("Busqueda") ||
				  documento_proveedor_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(documento_proveedor_control);
			
		} else if(documento_proveedor_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(documento_proveedor_control)
		}
		
		
		
	
		else if(documento_proveedor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(documento_proveedor_control);	
		
		} else if(documento_proveedor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(documento_proveedor_control);		
		}
	
		else if(documento_proveedor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_proveedor_control);		
		}
	
		else if(documento_proveedor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_proveedor_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + documento_proveedor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(documento_proveedor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(documento_proveedor_control) {
		this.actualizarPaginaAccionesGenerales(documento_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(documento_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(documento_proveedor_control);
		this.actualizarPaginaOrderBy(documento_proveedor_control);
		this.actualizarPaginaTablaDatos(documento_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(documento_proveedor_control);
		//this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_proveedor_control);
		this.actualizarPaginaAreaBusquedas(documento_proveedor_control);
		this.actualizarPaginaCargaCombosFK(documento_proveedor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(documento_proveedor_control) {
		//this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(documento_proveedor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_proveedor_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_proveedor_control) {
		
		this.actualizarPaginaCargaGeneral(documento_proveedor_control);
		this.actualizarPaginaTablaDatos(documento_proveedor_control);
		this.actualizarPaginaCargaGeneralControles(documento_proveedor_control);
		//this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_proveedor_control);
		this.actualizarPaginaAreaBusquedas(documento_proveedor_control);
		this.actualizarPaginaCargaCombosFK(documento_proveedor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		//this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		//this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		//this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(documento_proveedor_control) {
		//this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_proveedor_control) {
		this.actualizarPaginaAbrirLink(documento_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);				
		//this.actualizarPaginaFormulario(documento_proveedor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);
		//this.actualizarPaginaFormulario(documento_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);
		//this.actualizarPaginaFormulario(documento_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(documento_proveedor_control) {
		//this.actualizarPaginaFormulario(documento_proveedor_control);
		this.onLoadCombosDefectoFK(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);
		//this.actualizarPaginaFormulario(documento_proveedor_control);
		this.onLoadCombosDefectoFK(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_proveedor_control) {
		this.actualizarPaginaAbrirLink(documento_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_proveedor_control) {
					//super.actualizarPaginaImprimir(documento_proveedor_control,"documento_proveedor");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_proveedor_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("documento_proveedor_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(documento_proveedor_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_proveedor_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_proveedor_control) {
		//super.actualizarPaginaImprimir(documento_proveedor_control,"documento_proveedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("documento_proveedor_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(documento_proveedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_proveedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(documento_proveedor_control) {
		//super.actualizarPaginaImprimir(documento_proveedor_control,"documento_proveedor");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("documento_proveedor_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(documento_proveedor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_proveedor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_proveedor_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(documento_proveedor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(documento_proveedor_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(documento_proveedor_control);
			
		this.actualizarPaginaAbrirLink(documento_proveedor_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(documento_proveedor_control) {
		this.actualizarPaginaTablaDatos(documento_proveedor_control);
		this.actualizarPaginaFormulario(documento_proveedor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control);		
		this.actualizarPaginaAreaMantenimiento(documento_proveedor_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(documento_proveedor_control) {
		
		if(documento_proveedor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(documento_proveedor_control);
		}
		
		if(documento_proveedor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(documento_proveedor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(documento_proveedor_control) {
		if(documento_proveedor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("documento_proveedorReturnGeneral",JSON.stringify(documento_proveedor_control.documento_proveedorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(documento_proveedor_control) {
		if(documento_proveedor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_proveedor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(documento_proveedor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(documento_proveedor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(documento_proveedor_control, mostrar) {
		
		if(mostrar==true) {
			documento_proveedor_funcion1.resaltarRestaurarDivsPagina(false,"documento_proveedor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				documento_proveedor_funcion1.resaltarRestaurarDivMantenimiento(false,"documento_proveedor");
			}			
			
			documento_proveedor_funcion1.mostrarDivMensaje(true,documento_proveedor_control.strAuxiliarMensaje,documento_proveedor_control.strAuxiliarCssMensaje);
		
		} else {
			documento_proveedor_funcion1.mostrarDivMensaje(false,documento_proveedor_control.strAuxiliarMensaje,documento_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(documento_proveedor_control) {
		if(documento_proveedor_funcion1.esPaginaForm(documento_proveedor_constante1)==true) {
			window.opener.documento_proveedor_webcontrol1.actualizarPaginaTablaDatos(documento_proveedor_control);
		} else {
			this.actualizarPaginaTablaDatos(documento_proveedor_control);
		}
	}
	
	actualizarPaginaAbrirLink(documento_proveedor_control) {
		documento_proveedor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(documento_proveedor_control.strAuxiliarUrlPagina);
				
		documento_proveedor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(documento_proveedor_control.strAuxiliarTipo,documento_proveedor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(documento_proveedor_control) {
		documento_proveedor_funcion1.resaltarRestaurarDivMensaje(true,documento_proveedor_control.strAuxiliarMensajeAlert,documento_proveedor_control.strAuxiliarCssMensaje);
			
		if(documento_proveedor_funcion1.esPaginaForm(documento_proveedor_constante1)==true) {
			window.opener.documento_proveedor_funcion1.resaltarRestaurarDivMensaje(true,documento_proveedor_control.strAuxiliarMensajeAlert,documento_proveedor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(documento_proveedor_control) {
		this.documento_proveedor_controlInicial=documento_proveedor_control;
			
		if(documento_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(documento_proveedor_control.strStyleDivArbol,documento_proveedor_control.strStyleDivContent
																,documento_proveedor_control.strStyleDivOpcionesBanner,documento_proveedor_control.strStyleDivExpandirColapsar
																,documento_proveedor_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=documento_proveedor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",documento_proveedor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(documento_proveedor_control) {
		this.actualizarCssBotonesPagina(documento_proveedor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(documento_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(documento_proveedor_control.tiposReportes,documento_proveedor_control.tiposReporte
															 	,documento_proveedor_control.tiposPaginacion,documento_proveedor_control.tiposAcciones
																,documento_proveedor_control.tiposColumnasSelect,documento_proveedor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(documento_proveedor_control.tiposRelaciones,documento_proveedor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(documento_proveedor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(documento_proveedor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(documento_proveedor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(documento_proveedor_control) {
	
		var indexPosition=documento_proveedor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=documento_proveedor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(documento_proveedor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(documento_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_proveedor_control.strRecargarFkTipos,",")) { 
				documento_proveedor_webcontrol1.cargarCombosproveedorsFK(documento_proveedor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(documento_proveedor_control.strRecargarFkTiposNinguno!=null && documento_proveedor_control.strRecargarFkTiposNinguno!='NINGUNO' && documento_proveedor_control.strRecargarFkTiposNinguno!='') {
			
				if(documento_proveedor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",documento_proveedor_control.strRecargarFkTiposNinguno,",")) { 
					documento_proveedor_webcontrol1.cargarCombosproveedorsFK(documento_proveedor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproveedorFK(documento_proveedor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_proveedor_funcion1,documento_proveedor_control.proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(documento_proveedor_control) {
		jQuery("#divBusquedadocumento_proveedorAjaxWebPart").css("display",documento_proveedor_control.strPermisoBusqueda);
		jQuery("#trdocumento_proveedorCabeceraBusquedas").css("display",documento_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_proveedor").css("display",documento_proveedor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(documento_proveedor_control.htmlTablaOrderBy!=null
			&& documento_proveedor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydocumento_proveedorAjaxWebPart").html(documento_proveedor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//documento_proveedor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(documento_proveedor_control.htmlTablaOrderByRel!=null
			&& documento_proveedor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldocumento_proveedorAjaxWebPart").html(documento_proveedor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(documento_proveedor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadocumento_proveedorAjaxWebPart").css("display","none");
			jQuery("#trdocumento_proveedorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadocumento_proveedor").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(documento_proveedor_control) {
		
		if(!documento_proveedor_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(documento_proveedor_control);
		} else {
			jQuery("#divTablaDatosdocumento_proveedorsAjaxWebPart").html(documento_proveedor_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdocumento_proveedors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(documento_proveedor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdocumento_proveedors=jQuery("#tblTablaDatosdocumento_proveedors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("documento_proveedor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',documento_proveedor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			documento_proveedor_webcontrol1.registrarControlesTableEdition(documento_proveedor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		documento_proveedor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(documento_proveedor_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("documento_proveedor_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(documento_proveedor_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosdocumento_proveedorsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(documento_proveedor_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(documento_proveedor_control);
		
		const divOrderBy = document.getElementById("divOrderBydocumento_proveedorAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(documento_proveedor_control);
		
		const divOrderByRel = document.getElementById("divOrderByReldocumento_proveedorAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(documento_proveedor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(documento_proveedor_control.documento_proveedorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(documento_proveedor_control);			
		}
	}
	
	actualizarCamposFilaTabla(documento_proveedor_control) {
		var i=0;
		
		i=documento_proveedor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(documento_proveedor_control.documento_proveedorActual.id);
		jQuery("#t-version_row_"+i+"").val(documento_proveedor_control.documento_proveedorActual.versionRow);
		
		if(documento_proveedor_control.documento_proveedorActual.id_proveedor!=null && documento_proveedor_control.documento_proveedorActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != documento_proveedor_control.documento_proveedorActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_2").val(documento_proveedor_control.documento_proveedorActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(documento_proveedor_control.documento_proveedorActual.documento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(documento_proveedor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondocumento_cliente").click(function(){
		jQuery("#tblTablaDatosdocumento_proveedors").on("click",".imgrelaciondocumento_cliente", function () {

			var idActual=jQuery(this).attr("idactualdocumento_proveedor");

			documento_proveedor_webcontrol1.registrarSesionParadocumento_clientees(idActual);
		});				
	}
		
	

	registrarSesionParadocumento_clientees(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_proveedor","documento_cliente","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1,"es","");
	}
	
	registrarControlesTableEdition(documento_proveedor_control) {
		documento_proveedor_funcion1.registrarControlesTableValidacionEdition(documento_proveedor_control,documento_proveedor_webcontrol1,documento_proveedor_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(documento_proveedor_control) {
		jQuery("#divResumendocumento_proveedorActualAjaxWebPart").html(documento_proveedor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_proveedor_control) {
		//jQuery("#divAccionesRelacionesdocumento_proveedorAjaxWebPart").html(documento_proveedor_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("documento_proveedor_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(documento_proveedor_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesdocumento_proveedorAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		documento_proveedor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(documento_proveedor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(documento_proveedor_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(documento_proveedor_control) {
		
		if(documento_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",documento_proveedor_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",documento_proveedor_control.strVisibleFK_Idproveedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondocumento_proveedor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("documento_proveedor",id,"cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);		
	}
	
	

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		documento_proveedor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_proveedor","proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelaciondocumento_cliente").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_proveedor");

			documento_proveedor_webcontrol1.registrarSesionParadocumento_clientees(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedorConstante,strParametros);
		
		//documento_proveedor_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosproveedorsFK(documento_proveedor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor",documento_proveedor_control.proveedorsFK);

		if(documento_proveedor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_proveedor_control.idFilaTablaActual+"_2",documento_proveedor_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",documento_proveedor_control.proveedorsFK);

	};

	
	
	registrarComboActionChangeCombosproveedorsFK(documento_proveedor_control) {

	};

	
	
	setDefectoValorCombosproveedorsFK(documento_proveedor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_proveedor_control.idproveedorDefaultFK>-1 && jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val() != documento_proveedor_control.idproveedorDefaultFK) {
				jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor").val(documento_proveedor_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(documento_proveedor_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_proveedor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//documento_proveedor_control
		
	
	}
	
	onLoadCombosDefectoFK(documento_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(documento_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_proveedor_control.strRecargarFkTipos,",")) { 
				documento_proveedor_webcontrol1.setDefectoValorCombosproveedorsFK(documento_proveedor_control);
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
	onLoadCombosEventosFK(documento_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(documento_proveedor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_proveedor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_proveedor_webcontrol1.registrarComboActionChangeCombosproveedorsFK(documento_proveedor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(documento_proveedor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_proveedor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(documento_proveedor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(documento_proveedor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_proveedor","FK_Idproveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
		
			
			if(documento_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("documento_proveedor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("documento_proveedor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(documento_proveedor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,"documento_proveedor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_proveedor_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				documento_proveedor_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("documento_proveedor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(documento_proveedor_control) {
		
		jQuery("#divBusquedadocumento_proveedorAjaxWebPart").css("display",documento_proveedor_control.strPermisoBusqueda);
		jQuery("#trdocumento_proveedorCabeceraBusquedas").css("display",documento_proveedor_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_proveedor").css("display",documento_proveedor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedocumento_proveedor").css("display",documento_proveedor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdocumento_proveedor").attr("style",documento_proveedor_control.strPermisoMostrarTodos);		
		
		if(documento_proveedor_control.strPermisoNuevo!=null) {
			jQuery("#tddocumento_proveedorNuevo").css("display",documento_proveedor_control.strPermisoNuevo);
			jQuery("#tddocumento_proveedorNuevoToolBar").css("display",documento_proveedor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddocumento_proveedorDuplicar").css("display",documento_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_proveedorDuplicarToolBar").css("display",documento_proveedor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_proveedorNuevoGuardarCambios").css("display",documento_proveedor_control.strPermisoNuevo);
			jQuery("#tddocumento_proveedorNuevoGuardarCambiosToolBar").css("display",documento_proveedor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(documento_proveedor_control.strPermisoActualizar!=null) {
			jQuery("#tddocumento_proveedorCopiar").css("display",documento_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_proveedorCopiarToolBar").css("display",documento_proveedor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_proveedorConEditar").css("display",documento_proveedor_control.strPermisoActualizar);
		}
		
		jQuery("#tddocumento_proveedorGuardarCambios").css("display",documento_proveedor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddocumento_proveedorGuardarCambiosToolBar").css("display",documento_proveedor_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tddocumento_proveedorCerrarPagina").css("display",documento_proveedor_control.strPermisoPopup);		
		jQuery("#tddocumento_proveedorCerrarPaginaToolBar").css("display",documento_proveedor_control.strPermisoPopup);
		//jQuery("#trdocumento_proveedorAccionesRelaciones").css("display",documento_proveedor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=documento_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + documento_proveedor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Documentos Proveedoreses";
		sTituloBanner+=" - " + documento_proveedor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_proveedor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddocumento_proveedorRelacionesToolBar").css("display",documento_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdocumento_proveedor").css("display",documento_proveedor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		documento_proveedor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		documento_proveedor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		documento_proveedor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		documento_proveedor_webcontrol1.registrarEventosControles();
		
		if(documento_proveedor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(documento_proveedor_constante1.STR_ES_RELACIONADO=="false") {
			documento_proveedor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(documento_proveedor_constante1.STR_ES_RELACIONES=="true") {
			if(documento_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_proveedor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(documento_proveedor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(documento_proveedor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				documento_proveedor_webcontrol1.onLoad();
			
			//} else {
				//if(documento_proveedor_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			documento_proveedor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("documento_proveedor","cuentaspagar","",documento_proveedor_funcion1,documento_proveedor_webcontrol1,documento_proveedor_constante1);	
	}
}

var documento_proveedor_webcontrol1 = new documento_proveedor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {documento_proveedor_webcontrol,documento_proveedor_webcontrol1};

//Para ser llamado desde window.opener
window.documento_proveedor_webcontrol1 = documento_proveedor_webcontrol1;


if(documento_proveedor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = documento_proveedor_webcontrol1.onLoadWindow; 
}

//</script>