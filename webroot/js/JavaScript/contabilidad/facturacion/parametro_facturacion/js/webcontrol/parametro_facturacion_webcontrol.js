//<script type="text/javascript" language="javascript">



//var parametro_facturacionJQueryPaginaWebInteraccion= function (parametro_facturacion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_facturacion_constante,parametro_facturacion_constante1} from '../util/parametro_facturacion_constante.js';

import {parametro_facturacion_funcion,parametro_facturacion_funcion1} from '../util/parametro_facturacion_funcion.js';


class parametro_facturacion_webcontrol extends GeneralEntityWebControl {
	
	parametro_facturacion_control=null;
	parametro_facturacion_controlInicial=null;
	parametro_facturacion_controlAuxiliar=null;
		
	//if(parametro_facturacion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_facturacion_control) {
		super();
		
		this.parametro_facturacion_control=parametro_facturacion_control;
	}
		
	actualizarVariablesPagina(parametro_facturacion_control) {
		
		if(parametro_facturacion_control.action=="index" || parametro_facturacion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_facturacion_control);
			
		} 
		
		
		else if(parametro_facturacion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_facturacion_control);
			
		} else if(parametro_facturacion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_facturacion_control);
			
		} else if(parametro_facturacion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_facturacion_control);		
		
		} else if(parametro_facturacion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_facturacion_control);
		
		}  else if(parametro_facturacion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_facturacion_control);
		
		} else if(parametro_facturacion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_facturacion_control);		
		
		} else if(parametro_facturacion_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(parametro_facturacion_control);		
		
		} else if(parametro_facturacion_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(parametro_facturacion_control);		
		
		} else if(parametro_facturacion_control.action.includes("Busqueda") ||
				  parametro_facturacion_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(parametro_facturacion_control);
			
		} else if(parametro_facturacion_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(parametro_facturacion_control)
		}
		
		
		
	
		else if(parametro_facturacion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_facturacion_control);	
		
		} else if(parametro_facturacion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_facturacion_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_facturacion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_facturacion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_facturacion_control) {
		this.actualizarPaginaAccionesGenerales(parametro_facturacion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_facturacion_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_facturacion_control);
		this.actualizarPaginaOrderBy(parametro_facturacion_control);
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);
		this.actualizarPaginaCargaGeneralControles(parametro_facturacion_control);
		//this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_facturacion_control);
		this.actualizarPaginaAreaBusquedas(parametro_facturacion_control);
		this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_facturacion_control) {
		//this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_facturacion_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_facturacion_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_facturacion_control);
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);
		this.actualizarPaginaCargaGeneralControles(parametro_facturacion_control);
		//this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_facturacion_control);
		this.actualizarPaginaAreaBusquedas(parametro_facturacion_control);
		this.actualizarPaginaCargaCombosFK(parametro_facturacion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		//this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		//this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		//this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_facturacion_control) {
		//this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_facturacion_control) {
		this.actualizarPaginaAbrirLink(parametro_facturacion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);				
		//this.actualizarPaginaFormulario(parametro_facturacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);
		//this.actualizarPaginaFormulario(parametro_facturacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);
		//this.actualizarPaginaFormulario(parametro_facturacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_facturacion_control) {
		//this.actualizarPaginaFormulario(parametro_facturacion_control);
		this.onLoadCombosDefectoFK(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);
		//this.actualizarPaginaFormulario(parametro_facturacion_control);
		this.onLoadCombosDefectoFK(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_facturacion_control) {
		this.actualizarPaginaAbrirLink(parametro_facturacion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_facturacion_control) {
		this.actualizarPaginaTablaDatos(parametro_facturacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_facturacion_control) {
					//super.actualizarPaginaImprimir(parametro_facturacion_control,"parametro_facturacion");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_facturacion_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("parametro_facturacion_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(parametro_facturacion_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_facturacion_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_facturacion_control) {
		//super.actualizarPaginaImprimir(parametro_facturacion_control,"parametro_facturacion");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("parametro_facturacion_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(parametro_facturacion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_facturacion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(parametro_facturacion_control) {
		//super.actualizarPaginaImprimir(parametro_facturacion_control,"parametro_facturacion");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("parametro_facturacion_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(parametro_facturacion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_facturacion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_facturacion_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(parametro_facturacion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(parametro_facturacion_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(parametro_facturacion_control);
			
		this.actualizarPaginaAbrirLink(parametro_facturacion_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_facturacion_control) {
		
		if(parametro_facturacion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_facturacion_control);
		}
		
		if(parametro_facturacion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_facturacion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_facturacion_control) {
		if(parametro_facturacion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_facturacionReturnGeneral",JSON.stringify(parametro_facturacion_control.parametro_facturacionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_facturacion_control) {
		if(parametro_facturacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_facturacion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_facturacion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_facturacion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_facturacion_control, mostrar) {
		
		if(mostrar==true) {
			parametro_facturacion_funcion1.resaltarRestaurarDivsPagina(false,"parametro_facturacion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_facturacion_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_facturacion");
			}			
			
			parametro_facturacion_funcion1.mostrarDivMensaje(true,parametro_facturacion_control.strAuxiliarMensaje,parametro_facturacion_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_facturacion_funcion1.mostrarDivMensaje(false,parametro_facturacion_control.strAuxiliarMensaje,parametro_facturacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_facturacion_control) {
		if(parametro_facturacion_funcion1.esPaginaForm(parametro_facturacion_constante1)==true) {
			window.opener.parametro_facturacion_webcontrol1.actualizarPaginaTablaDatos(parametro_facturacion_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_facturacion_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_facturacion_control) {
		parametro_facturacion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_facturacion_control.strAuxiliarUrlPagina);
				
		parametro_facturacion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_facturacion_control.strAuxiliarTipo,parametro_facturacion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_facturacion_control) {
		parametro_facturacion_funcion1.resaltarRestaurarDivMensaje(true,parametro_facturacion_control.strAuxiliarMensajeAlert,parametro_facturacion_control.strAuxiliarCssMensaje);
			
		if(parametro_facturacion_funcion1.esPaginaForm(parametro_facturacion_constante1)==true) {
			window.opener.parametro_facturacion_funcion1.resaltarRestaurarDivMensaje(true,parametro_facturacion_control.strAuxiliarMensajeAlert,parametro_facturacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_facturacion_control) {
		this.parametro_facturacion_controlInicial=parametro_facturacion_control;
			
		if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_facturacion_control.strStyleDivArbol,parametro_facturacion_control.strStyleDivContent
																,parametro_facturacion_control.strStyleDivOpcionesBanner,parametro_facturacion_control.strStyleDivExpandirColapsar
																,parametro_facturacion_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_facturacion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_facturacion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_facturacion_control) {
		this.actualizarCssBotonesPagina(parametro_facturacion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_facturacion_control.tiposReportes,parametro_facturacion_control.tiposReporte
															 	,parametro_facturacion_control.tiposPaginacion,parametro_facturacion_control.tiposAcciones
																,parametro_facturacion_control.tiposColumnasSelect,parametro_facturacion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_facturacion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_facturacion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_facturacion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_facturacion_control) {
	
		var indexPosition=parametro_facturacion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_facturacion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_facturacion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_facturacion_control.strRecargarFkTipos,",")) { 
				parametro_facturacion_webcontrol1.cargarCombosempresasFK(parametro_facturacion_control);
			}

			if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",parametro_facturacion_control.strRecargarFkTipos,",")) { 
				parametro_facturacion_webcontrol1.cargarCombostermino_pago_clientesFK(parametro_facturacion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_facturacion_control.strRecargarFkTiposNinguno!=null && parametro_facturacion_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_facturacion_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_facturacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",parametro_facturacion_control.strRecargarFkTiposNinguno,",")) { 
					parametro_facturacion_webcontrol1.cargarCombosempresasFK(parametro_facturacion_control);
				}

				if(parametro_facturacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",parametro_facturacion_control.strRecargarFkTiposNinguno,",")) { 
					parametro_facturacion_webcontrol1.cargarCombostermino_pago_clientesFK(parametro_facturacion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(parametro_facturacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_facturacion_funcion1,parametro_facturacion_control.empresasFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(parametro_facturacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_facturacion_funcion1,parametro_facturacion_control.termino_pago_clientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(parametro_facturacion_control) {
		jQuery("#divBusquedaparametro_facturacionAjaxWebPart").css("display",parametro_facturacion_control.strPermisoBusqueda);
		jQuery("#trparametro_facturacionCabeceraBusquedas").css("display",parametro_facturacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_facturacion").css("display",parametro_facturacion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_facturacion_control.htmlTablaOrderBy!=null
			&& parametro_facturacion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_facturacionAjaxWebPart").html(parametro_facturacion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_facturacion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_facturacion_control.htmlTablaOrderByRel!=null
			&& parametro_facturacion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_facturacionAjaxWebPart").html(parametro_facturacion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_facturacionAjaxWebPart").css("display","none");
			jQuery("#trparametro_facturacionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_facturacion").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(parametro_facturacion_control) {
		
		if(!parametro_facturacion_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(parametro_facturacion_control);
		} else {
			jQuery("#divTablaDatosparametro_facturacionsAjaxWebPart").html(parametro_facturacion_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_facturacions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_facturacions=jQuery("#tblTablaDatosparametro_facturacions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_facturacion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_facturacion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_facturacion_webcontrol1.registrarControlesTableEdition(parametro_facturacion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_facturacion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(parametro_facturacion_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("parametro_facturacion_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(parametro_facturacion_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosparametro_facturacionsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(parametro_facturacion_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(parametro_facturacion_control);
		
		const divOrderBy = document.getElementById("divOrderByparametro_facturacionAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(parametro_facturacion_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelparametro_facturacionAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(parametro_facturacion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_facturacion_control.parametro_facturacionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_facturacion_control);			
		}
	}
	
	actualizarCamposFilaTabla(parametro_facturacion_control) {
		var i=0;
		
		i=parametro_facturacion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_facturacion_control.parametro_facturacionActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_facturacion_control.parametro_facturacionActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(parametro_facturacion_control.parametro_facturacionActual.versionRow);
		
		if(parametro_facturacion_control.parametro_facturacionActual.id_empresa!=null && parametro_facturacion_control.parametro_facturacionActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != parametro_facturacion_control.parametro_facturacionActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(parametro_facturacion_control.parametro_facturacionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(parametro_facturacion_control.parametro_facturacionActual.nombre_factura);
		jQuery("#t-cel_"+i+"_5").val(parametro_facturacion_control.parametro_facturacionActual.numero_factura);
		jQuery("#t-cel_"+i+"_6").val(parametro_facturacion_control.parametro_facturacionActual.incremento_factura);
		jQuery("#t-cel_"+i+"_7").prop('checked',parametro_facturacion_control.parametro_facturacionActual.solo_costo_producto);
		jQuery("#t-cel_"+i+"_8").val(parametro_facturacion_control.parametro_facturacionActual.numero_factura_lote);
		jQuery("#t-cel_"+i+"_9").val(parametro_facturacion_control.parametro_facturacionActual.incremento_factura_lote);
		jQuery("#t-cel_"+i+"_10").val(parametro_facturacion_control.parametro_facturacionActual.numero_devolucion);
		jQuery("#t-cel_"+i+"_11").val(parametro_facturacion_control.parametro_facturacionActual.incremento_devolucion);
		
		if(parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente!=null && parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente) {
				jQuery("#t-cel_"+i+"_12").val(parametro_facturacion_control.parametro_facturacionActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_13").val(parametro_facturacion_control.parametro_facturacionActual.nombre_estimado);
		jQuery("#t-cel_"+i+"_14").val(parametro_facturacion_control.parametro_facturacionActual.numero_estimado);
		jQuery("#t-cel_"+i+"_15").val(parametro_facturacion_control.parametro_facturacionActual.incremento_estimado);
		jQuery("#t-cel_"+i+"_16").prop('checked',parametro_facturacion_control.parametro_facturacionActual.solo_costo_producto_estimado);
		jQuery("#t-cel_"+i+"_17").val(parametro_facturacion_control.parametro_facturacionActual.nombre_consignacion);
		jQuery("#t-cel_"+i+"_18").val(parametro_facturacion_control.parametro_facturacionActual.numero_consignacion);
		jQuery("#t-cel_"+i+"_19").val(parametro_facturacion_control.parametro_facturacionActual.incremento_consignacion);
		jQuery("#t-cel_"+i+"_20").prop('checked',parametro_facturacion_control.parametro_facturacionActual.solo_costo_producto_consignacion);
		jQuery("#t-cel_"+i+"_21").prop('checked',parametro_facturacion_control.parametro_facturacionActual.con_recibo);
		jQuery("#t-cel_"+i+"_22").val(parametro_facturacion_control.parametro_facturacionActual.nombre_recibo);
		jQuery("#t-cel_"+i+"_23").val(parametro_facturacion_control.parametro_facturacionActual.numero_recibo);
		jQuery("#t-cel_"+i+"_24").val(parametro_facturacion_control.parametro_facturacionActual.incremento_recibo);
		jQuery("#t-cel_"+i+"_25").prop('checked',parametro_facturacion_control.parametro_facturacionActual.con_impuesto_recibo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(parametro_facturacion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_facturacion_control) {
		parametro_facturacion_funcion1.registrarControlesTableValidacionEdition(parametro_facturacion_control,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_facturacion_control) {
		jQuery("#divResumenparametro_facturacionActualAjaxWebPart").html(parametro_facturacion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_facturacion_control) {
		//jQuery("#divAccionesRelacionesparametro_facturacionAjaxWebPart").html(parametro_facturacion_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("parametro_facturacion_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(parametro_facturacion_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesparametro_facturacionAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		parametro_facturacion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_facturacion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_facturacion_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_facturacion_control) {
		
		if(parametro_facturacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",parametro_facturacion_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",parametro_facturacion_control.strVisibleFK_Idempresa);
		}

		if(parametro_facturacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",parametro_facturacion_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",parametro_facturacion_control.strVisibleFK_Idtermino_pago);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_facturacion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_facturacion",id,"facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		parametro_facturacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_facturacion","empresa","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
	}

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		parametro_facturacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_facturacion","termino_pago_cliente","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacionConstante,strParametros);
		
		//parametro_facturacion_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(parametro_facturacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_empresa",parametro_facturacion_control.empresasFK);

		if(parametro_facturacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_facturacion_control.idFilaTablaActual+"_3",parametro_facturacion_control.empresasFK);
		}
	};

	cargarCombostermino_pago_clientesFK(parametro_facturacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente",parametro_facturacion_control.termino_pago_clientesFK);

		if(parametro_facturacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_facturacion_control.idFilaTablaActual+"_12",parametro_facturacion_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",parametro_facturacion_control.termino_pago_clientesFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(parametro_facturacion_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(parametro_facturacion_control) {

	};

	
	
	setDefectoValorCombosempresasFK(parametro_facturacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_facturacion_control.idempresaDefaultFK>-1 && jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_facturacion_control.idempresaDefaultFK) {
				jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_empresa").val(parametro_facturacion_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(parametro_facturacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_facturacion_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != parametro_facturacion_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(parametro_facturacion_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(parametro_facturacion_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_facturacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_facturacion_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_facturacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_facturacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_facturacion_control.strRecargarFkTipos,",")) { 
				parametro_facturacion_webcontrol1.setDefectoValorCombosempresasFK(parametro_facturacion_control);
			}

			if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",parametro_facturacion_control.strRecargarFkTipos,",")) { 
				parametro_facturacion_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(parametro_facturacion_control);
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
	onLoadCombosEventosFK(parametro_facturacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_facturacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_facturacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_facturacion_webcontrol1.registrarComboActionChangeCombosempresasFK(parametro_facturacion_control);
			//}

			//if(parametro_facturacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",parametro_facturacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_facturacion_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(parametro_facturacion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_facturacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_facturacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_facturacion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_facturacion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_facturacion","FK_Idempresa","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_facturacion","FK_Idtermino_pago","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
		
			
			if(parametro_facturacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_facturacion");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_facturacion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,"parametro_facturacion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				parametro_facturacion_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_facturacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				parametro_facturacion_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_facturacion_control) {
		
		jQuery("#divBusquedaparametro_facturacionAjaxWebPart").css("display",parametro_facturacion_control.strPermisoBusqueda);
		jQuery("#trparametro_facturacionCabeceraBusquedas").css("display",parametro_facturacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_facturacion").css("display",parametro_facturacion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_facturacion").css("display",parametro_facturacion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_facturacion").attr("style",parametro_facturacion_control.strPermisoMostrarTodos);		
		
		if(parametro_facturacion_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_facturacionNuevo").css("display",parametro_facturacion_control.strPermisoNuevo);
			jQuery("#tdparametro_facturacionNuevoToolBar").css("display",parametro_facturacion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_facturacionDuplicar").css("display",parametro_facturacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_facturacionDuplicarToolBar").css("display",parametro_facturacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_facturacionNuevoGuardarCambios").css("display",parametro_facturacion_control.strPermisoNuevo);
			jQuery("#tdparametro_facturacionNuevoGuardarCambiosToolBar").css("display",parametro_facturacion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_facturacion_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_facturacionCopiar").css("display",parametro_facturacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_facturacionCopiarToolBar").css("display",parametro_facturacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_facturacionConEditar").css("display",parametro_facturacion_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_facturacionGuardarCambios").css("display",parametro_facturacion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_facturacionGuardarCambiosToolBar").css("display",parametro_facturacion_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdparametro_facturacionCerrarPagina").css("display",parametro_facturacion_control.strPermisoPopup);		
		jQuery("#tdparametro_facturacionCerrarPaginaToolBar").css("display",parametro_facturacion_control.strPermisoPopup);
		//jQuery("#trparametro_facturacionAccionesRelaciones").css("display",parametro_facturacion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_facturacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_facturacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_facturacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametro Facturacions";
		sTituloBanner+=" - " + parametro_facturacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_facturacion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_facturacionRelacionesToolBar").css("display",parametro_facturacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_facturacion").css("display",parametro_facturacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_facturacion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_facturacion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_facturacion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_facturacion_webcontrol1.registrarEventosControles();
		
		if(parametro_facturacion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="false") {
			parametro_facturacion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_facturacion_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_facturacion_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_facturacion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_facturacion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_facturacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_facturacion_webcontrol1.onLoad();
			
			//} else {
				//if(parametro_facturacion_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			parametro_facturacion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_facturacion","facturacion","",parametro_facturacion_funcion1,parametro_facturacion_webcontrol1,parametro_facturacion_constante1);	
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

var parametro_facturacion_webcontrol1 = new parametro_facturacion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_facturacion_webcontrol,parametro_facturacion_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_facturacion_webcontrol1 = parametro_facturacion_webcontrol1;


if(parametro_facturacion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_facturacion_webcontrol1.onLoadWindow; 
}

//</script>