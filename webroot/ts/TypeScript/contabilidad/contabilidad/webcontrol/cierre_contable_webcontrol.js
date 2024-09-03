//<script type="text/javascript" language="javascript">



//var cierre_contableJQueryPaginaWebInteraccion= function (cierre_contable_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cierre_contable_constante,cierre_contable_constante1} from '../util/cierre_contable_constante.js';

import {cierre_contable_funcion,cierre_contable_funcion1} from '../util/cierre_contable_funcion.js';


class cierre_contable_webcontrol extends GeneralEntityWebControl {
	
	cierre_contable_control=null;
	cierre_contable_controlInicial=null;
	cierre_contable_controlAuxiliar=null;
		
	//if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cierre_contable_control) {
		super();
		
		this.cierre_contable_control=cierre_contable_control;
	}
		
	actualizarVariablesPagina(cierre_contable_control) {
		
		if(cierre_contable_control.action=="index" || cierre_contable_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cierre_contable_control);
			
		} 
		
		
		else if(cierre_contable_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cierre_contable_control);
			
		} else if(cierre_contable_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cierre_contable_control);
			
		} else if(cierre_contable_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cierre_contable_control);		
		
		} else if(cierre_contable_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cierre_contable_control);
		
		}  else if(cierre_contable_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cierre_contable_control);
		
		} else if(cierre_contable_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cierre_contable_control);		
		
		} else if(cierre_contable_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cierre_contable_control);		
		
		} else if(cierre_contable_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(cierre_contable_control);		
		
		} else if(cierre_contable_control.action.includes("Busqueda") ||
				  cierre_contable_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(cierre_contable_control);
			
		} else if(cierre_contable_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cierre_contable_control)
		}
		
		
		
	
		else if(cierre_contable_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cierre_contable_control);	
		
		} else if(cierre_contable_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cierre_contable_control);		
		}
	
		else if(cierre_contable_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cierre_contable_control);		
		}
	
		else if(cierre_contable_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cierre_contable_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cierre_contable_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cierre_contable_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cierre_contable_control) {
		this.actualizarPaginaAccionesGenerales(cierre_contable_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cierre_contable_control) {
		
		this.actualizarPaginaCargaGeneral(cierre_contable_control);
		this.actualizarPaginaOrderBy(cierre_contable_control);
		this.actualizarPaginaTablaDatos(cierre_contable_control);
		this.actualizarPaginaCargaGeneralControles(cierre_contable_control);
		//this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_control);
		this.actualizarPaginaAreaBusquedas(cierre_contable_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cierre_contable_control) {
		//this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cierre_contable_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cierre_contable_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cierre_contable_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cierre_contable_control) {
		
		this.actualizarPaginaCargaGeneral(cierre_contable_control);
		this.actualizarPaginaTablaDatos(cierre_contable_control);
		this.actualizarPaginaCargaGeneralControles(cierre_contable_control);
		//this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_control);
		this.actualizarPaginaAreaBusquedas(cierre_contable_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		//this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		//this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		//this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		//this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		//this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		//this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cierre_contable_control) {
		//this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cierre_contable_control) {
		this.actualizarPaginaAbrirLink(cierre_contable_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);				
		//this.actualizarPaginaFormulario(cierre_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);
		//this.actualizarPaginaFormulario(cierre_contable_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		//this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);
		//this.actualizarPaginaFormulario(cierre_contable_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cierre_contable_control) {
		//this.actualizarPaginaFormulario(cierre_contable_control);
		this.onLoadCombosDefectoFK(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);
		//this.actualizarPaginaFormulario(cierre_contable_control);
		this.onLoadCombosDefectoFK(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		//this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cierre_contable_control) {
		this.actualizarPaginaAbrirLink(cierre_contable_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cierre_contable_control) {
					//super.actualizarPaginaImprimir(cierre_contable_control,"cierre_contable");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cierre_contable_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("cierre_contable_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cierre_contable_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cierre_contable_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cierre_contable_control) {
		//super.actualizarPaginaImprimir(cierre_contable_control,"cierre_contable");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("cierre_contable_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(cierre_contable_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cierre_contable_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cierre_contable_control) {
		//super.actualizarPaginaImprimir(cierre_contable_control,"cierre_contable");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("cierre_contable_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cierre_contable_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cierre_contable_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cierre_contable_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(cierre_contable_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cierre_contable_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(cierre_contable_control);
			
		this.actualizarPaginaAbrirLink(cierre_contable_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(cierre_contable_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_control);
		this.actualizarPaginaFormulario(cierre_contable_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cierre_contable_control) {
		
		if(cierre_contable_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cierre_contable_control);
		}
		
		if(cierre_contable_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cierre_contable_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cierre_contable_control) {
		if(cierre_contable_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cierre_contableReturnGeneral",JSON.stringify(cierre_contable_control.cierre_contableReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cierre_contable_control) {
		if(cierre_contable_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cierre_contable_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cierre_contable_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cierre_contable_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cierre_contable_control, mostrar) {
		
		if(mostrar==true) {
			cierre_contable_funcion1.resaltarRestaurarDivsPagina(false,"cierre_contable");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cierre_contable_funcion1.resaltarRestaurarDivMantenimiento(false,"cierre_contable");
			}			
			
			cierre_contable_funcion1.mostrarDivMensaje(true,cierre_contable_control.strAuxiliarMensaje,cierre_contable_control.strAuxiliarCssMensaje);
		
		} else {
			cierre_contable_funcion1.mostrarDivMensaje(false,cierre_contable_control.strAuxiliarMensaje,cierre_contable_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cierre_contable_control) {
		if(cierre_contable_funcion1.esPaginaForm(cierre_contable_constante1)==true) {
			window.opener.cierre_contable_webcontrol1.actualizarPaginaTablaDatos(cierre_contable_control);
		} else {
			this.actualizarPaginaTablaDatos(cierre_contable_control);
		}
	}
	
	actualizarPaginaAbrirLink(cierre_contable_control) {
		cierre_contable_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cierre_contable_control.strAuxiliarUrlPagina);
				
		cierre_contable_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cierre_contable_control.strAuxiliarTipo,cierre_contable_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cierre_contable_control) {
		cierre_contable_funcion1.resaltarRestaurarDivMensaje(true,cierre_contable_control.strAuxiliarMensajeAlert,cierre_contable_control.strAuxiliarCssMensaje);
			
		if(cierre_contable_funcion1.esPaginaForm(cierre_contable_constante1)==true) {
			window.opener.cierre_contable_funcion1.resaltarRestaurarDivMensaje(true,cierre_contable_control.strAuxiliarMensajeAlert,cierre_contable_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cierre_contable_control) {
		this.cierre_contable_controlInicial=cierre_contable_control;
			
		if(cierre_contable_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cierre_contable_control.strStyleDivArbol,cierre_contable_control.strStyleDivContent
																,cierre_contable_control.strStyleDivOpcionesBanner,cierre_contable_control.strStyleDivExpandirColapsar
																,cierre_contable_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=cierre_contable_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cierre_contable_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cierre_contable_control) {
		this.actualizarCssBotonesPagina(cierre_contable_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cierre_contable_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cierre_contable_control.tiposReportes,cierre_contable_control.tiposReporte
															 	,cierre_contable_control.tiposPaginacion,cierre_contable_control.tiposAcciones
																,cierre_contable_control.tiposColumnasSelect,cierre_contable_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cierre_contable_control.tiposRelaciones,cierre_contable_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cierre_contable_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cierre_contable_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cierre_contable_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cierre_contable_control) {
	
		var indexPosition=cierre_contable_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cierre_contable_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cierre_contable_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.cargarCombosempresasFK(cierre_contable_control);
			}

			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.cargarCombosejerciciosFK(cierre_contable_control);
			}

			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.cargarCombosperiodosFK(cierre_contable_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cierre_contable_control.strRecargarFkTiposNinguno!=null && cierre_contable_control.strRecargarFkTiposNinguno!='NINGUNO' && cierre_contable_control.strRecargarFkTiposNinguno!='') {
			
				if(cierre_contable_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cierre_contable_control.strRecargarFkTiposNinguno,",")) { 
					cierre_contable_webcontrol1.cargarCombosempresasFK(cierre_contable_control);
				}

				if(cierre_contable_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cierre_contable_control.strRecargarFkTiposNinguno,",")) { 
					cierre_contable_webcontrol1.cargarCombosejerciciosFK(cierre_contable_control);
				}

				if(cierre_contable_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cierre_contable_control.strRecargarFkTiposNinguno,",")) { 
					cierre_contable_webcontrol1.cargarCombosperiodosFK(cierre_contable_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cierre_contable_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cierre_contable_funcion1,cierre_contable_control.empresasFK);
	}

	cargarComboEditarTablaejercicioFK(cierre_contable_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cierre_contable_funcion1,cierre_contable_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cierre_contable_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cierre_contable_funcion1,cierre_contable_control.periodosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(cierre_contable_control) {
		jQuery("#divBusquedacierre_contableAjaxWebPart").css("display",cierre_contable_control.strPermisoBusqueda);
		jQuery("#trcierre_contableCabeceraBusquedas").css("display",cierre_contable_control.strPermisoBusqueda);
		jQuery("#trBusquedacierre_contable").css("display",cierre_contable_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cierre_contable_control.htmlTablaOrderBy!=null
			&& cierre_contable_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycierre_contableAjaxWebPart").html(cierre_contable_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cierre_contable_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cierre_contable_control.htmlTablaOrderByRel!=null
			&& cierre_contable_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcierre_contableAjaxWebPart").html(cierre_contable_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cierre_contable_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacierre_contableAjaxWebPart").css("display","none");
			jQuery("#trcierre_contableCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacierre_contable").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(cierre_contable_control) {
		
		if(!cierre_contable_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(cierre_contable_control);
		} else {
			jQuery("#divTablaDatoscierre_contablesAjaxWebPart").html(cierre_contable_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscierre_contables=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cierre_contable_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscierre_contables=jQuery("#tblTablaDatoscierre_contables").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cierre_contable",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cierre_contable_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cierre_contable_webcontrol1.registrarControlesTableEdition(cierre_contable_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cierre_contable_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(cierre_contable_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("cierre_contable_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cierre_contable_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscierre_contablesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(cierre_contable_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(cierre_contable_control);
		
		const divOrderBy = document.getElementById("divOrderBycierre_contableAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(cierre_contable_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcierre_contableAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(cierre_contable_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cierre_contable_control.cierre_contableActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cierre_contable_control);			
		}
	}
	
	actualizarCamposFilaTabla(cierre_contable_control) {
		var i=0;
		
		i=cierre_contable_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cierre_contable_control.cierre_contableActual.id);
		jQuery("#t-version_row_"+i+"").val(cierre_contable_control.cierre_contableActual.versionRow);
		
		if(cierre_contable_control.cierre_contableActual.id_empresa!=null && cierre_contable_control.cierre_contableActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cierre_contable_control.cierre_contableActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(cierre_contable_control.cierre_contableActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cierre_contable_control.cierre_contableActual.id_ejercicio!=null && cierre_contable_control.cierre_contableActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cierre_contable_control.cierre_contableActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_3").val(cierre_contable_control.cierre_contableActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cierre_contable_control.cierre_contableActual.id_periodo!=null && cierre_contable_control.cierre_contableActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cierre_contable_control.cierre_contableActual.id_periodo) {
				jQuery("#t-cel_"+i+"_4").val(cierre_contable_control.cierre_contableActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(cierre_contable_control.cierre_contableActual.fecha_cierre);
		jQuery("#t-cel_"+i+"_6").val(cierre_contable_control.cierre_contableActual.gan_per);
		jQuery("#t-cel_"+i+"_7").val(cierre_contable_control.cierre_contableActual.total_cuentas);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cierre_contable_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncierre_contable_detalle").click(function(){
		jQuery("#tblTablaDatoscierre_contables").on("click",".imgrelacioncierre_contable_detalle", function () {

			var idActual=jQuery(this).attr("idactualcierre_contable");

			cierre_contable_webcontrol1.registrarSesionParacierre_contable_detalles(idActual);
		});				
	}
		
	

	registrarSesionParacierre_contable_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cierre_contable","cierre_contable_detalle","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1,"s","");
	}
	
	registrarControlesTableEdition(cierre_contable_control) {
		cierre_contable_funcion1.registrarControlesTableValidacionEdition(cierre_contable_control,cierre_contable_webcontrol1,cierre_contable_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(cierre_contable_control) {
		jQuery("#divResumencierre_contableActualAjaxWebPart").html(cierre_contable_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cierre_contable_control) {
		//jQuery("#divAccionesRelacionescierre_contableAjaxWebPart").html(cierre_contable_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("cierre_contable_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cierre_contable_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescierre_contableAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		cierre_contable_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cierre_contable_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cierre_contable_control) {
		
		if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cierre_contable_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cierre_contable_control.strVisibleFK_Idejercicio);
		}

		if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cierre_contable_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cierre_contable_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cierre_contable_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cierre_contable_control.strVisibleFK_Idempresa);
		}

		if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cierre_contable_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cierre_contable_control.strVisibleFK_Idperiodo);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncierre_contable();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cierre_contable",id,"contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cierre_contable_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cierre_contable","empresa","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		cierre_contable_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cierre_contable","ejercicio","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		cierre_contable_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cierre_contable","periodo","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncierre_contable_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualcierre_contable");

			cierre_contable_webcontrol1.registrarSesionParacierre_contable_detalles(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contableConstante,strParametros);
		
		//cierre_contable_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cierre_contable_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa",cierre_contable_control.empresasFK);

		if(cierre_contable_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cierre_contable_control.idFilaTablaActual+"_2",cierre_contable_control.empresasFK);
		}
	};

	cargarCombosejerciciosFK(cierre_contable_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio",cierre_contable_control.ejerciciosFK);

		if(cierre_contable_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cierre_contable_control.idFilaTablaActual+"_3",cierre_contable_control.ejerciciosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio",cierre_contable_control.ejerciciosFK);

	};

	cargarCombosperiodosFK(cierre_contable_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo",cierre_contable_control.periodosFK);

		if(cierre_contable_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cierre_contable_control.idFilaTablaActual+"_4",cierre_contable_control.periodosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo",cierre_contable_control.periodosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cierre_contable_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cierre_contable_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cierre_contable_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cierre_contable_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cierre_contable_control.idempresaDefaultFK>-1 && jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").val() != cierre_contable_control.idempresaDefaultFK) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa").val(cierre_contable_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cierre_contable_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cierre_contable_control.idejercicioDefaultFK>-1 && jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").val() != cierre_contable_control.idejercicioDefaultFK) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio").val(cierre_contable_control.idejercicioDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val(cierre_contable_control.idejercicioDefaultForeignKey).trigger("change");
			if(jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idejercicio-cmbid_ejercicio").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cierre_contable_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cierre_contable_control.idperiodoDefaultFK>-1 && jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").val() != cierre_contable_control.idperiodoDefaultFK) {
				jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo").val(cierre_contable_control.idperiodoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val(cierre_contable_control.idperiodoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cierre_contable_constante1.STR_SUFIJO+"FK_Idperiodo-cmbid_periodo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cierre_contable_control
		
	
	}
	
	onLoadCombosDefectoFK(cierre_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.setDefectoValorCombosempresasFK(cierre_contable_control);
			}

			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.setDefectoValorCombosejerciciosFK(cierre_contable_control);
			}

			if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cierre_contable_control.strRecargarFkTipos,",")) { 
				cierre_contable_webcontrol1.setDefectoValorCombosperiodosFK(cierre_contable_control);
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
	onLoadCombosEventosFK(cierre_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cierre_contable_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cierre_contable_webcontrol1.registrarComboActionChangeCombosempresasFK(cierre_contable_control);
			//}

			//if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cierre_contable_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cierre_contable_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cierre_contable_control);
			//}

			//if(cierre_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cierre_contable_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cierre_contable_webcontrol1.registrarComboActionChangeCombosperiodosFK(cierre_contable_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cierre_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cierre_contable_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("cierre_contable","FK_Idejercicio","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cierre_contable","FK_Idempresa","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cierre_contable","FK_Idperiodo","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
		
			
			if(cierre_contable_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cierre_contable");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cierre_contable");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cierre_contable_funcion1,cierre_contable_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cierre_contable_funcion1,cierre_contable_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(cierre_contable_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,"cierre_contable");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cierre_contable_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cierre_contable_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cierre_contable_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cierre_contable_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cierre_contable");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cierre_contable_control) {
		
		jQuery("#divBusquedacierre_contableAjaxWebPart").css("display",cierre_contable_control.strPermisoBusqueda);
		jQuery("#trcierre_contableCabeceraBusquedas").css("display",cierre_contable_control.strPermisoBusqueda);
		jQuery("#trBusquedacierre_contable").css("display",cierre_contable_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecierre_contable").css("display",cierre_contable_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscierre_contable").attr("style",cierre_contable_control.strPermisoMostrarTodos);		
		
		if(cierre_contable_control.strPermisoNuevo!=null) {
			jQuery("#tdcierre_contableNuevo").css("display",cierre_contable_control.strPermisoNuevo);
			jQuery("#tdcierre_contableNuevoToolBar").css("display",cierre_contable_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcierre_contableDuplicar").css("display",cierre_contable_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcierre_contableDuplicarToolBar").css("display",cierre_contable_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcierre_contableNuevoGuardarCambios").css("display",cierre_contable_control.strPermisoNuevo);
			jQuery("#tdcierre_contableNuevoGuardarCambiosToolBar").css("display",cierre_contable_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cierre_contable_control.strPermisoActualizar!=null) {
			jQuery("#tdcierre_contableCopiar").css("display",cierre_contable_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcierre_contableCopiarToolBar").css("display",cierre_contable_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcierre_contableConEditar").css("display",cierre_contable_control.strPermisoActualizar);
		}
		
		jQuery("#tdcierre_contableGuardarCambios").css("display",cierre_contable_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcierre_contableGuardarCambiosToolBar").css("display",cierre_contable_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcierre_contableCerrarPagina").css("display",cierre_contable_control.strPermisoPopup);		
		jQuery("#tdcierre_contableCerrarPaginaToolBar").css("display",cierre_contable_control.strPermisoPopup);
		//jQuery("#trcierre_contableAccionesRelaciones").css("display",cierre_contable_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cierre_contable_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cierre_contable_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cierre_contable_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cierres Contableses";
		sTituloBanner+=" - " + cierre_contable_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cierre_contable_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcierre_contableRelacionesToolBar").css("display",cierre_contable_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscierre_contable").css("display",cierre_contable_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cierre_contable_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cierre_contable_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cierre_contable_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cierre_contable_webcontrol1.registrarEventosControles();
		
		if(cierre_contable_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cierre_contable_constante1.STR_ES_RELACIONADO=="false") {
			cierre_contable_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cierre_contable_constante1.STR_ES_RELACIONES=="true") {
			if(cierre_contable_constante1.BIT_ES_PAGINA_FORM==true) {
				cierre_contable_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cierre_contable_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cierre_contable_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cierre_contable_webcontrol1.onLoad();
			
			//} else {
				//if(cierre_contable_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			cierre_contable_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cierre_contable","contabilidad","",cierre_contable_funcion1,cierre_contable_webcontrol1,cierre_contable_constante1);	
	}
}

var cierre_contable_webcontrol1 = new cierre_contable_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cierre_contable_webcontrol,cierre_contable_webcontrol1};

//Para ser llamado desde window.opener
window.cierre_contable_webcontrol1 = cierre_contable_webcontrol1;


if(cierre_contable_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cierre_contable_webcontrol1.onLoadWindow; 
}

//</script>