//<script type="text/javascript" language="javascript">



//var parametro_contabilidadJQueryPaginaWebInteraccion= function (parametro_contabilidad_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_contabilidad_constante,parametro_contabilidad_constante1} from '../util/parametro_contabilidad_constante.js';

import {parametro_contabilidad_funcion,parametro_contabilidad_funcion1} from '../util/parametro_contabilidad_funcion.js';


class parametro_contabilidad_webcontrol extends GeneralEntityWebControl {
	
	parametro_contabilidad_control=null;
	parametro_contabilidad_controlInicial=null;
	parametro_contabilidad_controlAuxiliar=null;
		
	//if(parametro_contabilidad_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_contabilidad_control) {
		super();
		
		this.parametro_contabilidad_control=parametro_contabilidad_control;
	}
		
	actualizarVariablesPagina(parametro_contabilidad_control) {
		
		if(parametro_contabilidad_control.action=="index" || parametro_contabilidad_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_contabilidad_control);
			
		} 
		
		
		else if(parametro_contabilidad_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_contabilidad_control);
			
		} else if(parametro_contabilidad_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_contabilidad_control);
			
		} else if(parametro_contabilidad_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_contabilidad_control);		
		
		} else if(parametro_contabilidad_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_contabilidad_control);
		
		}  else if(parametro_contabilidad_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_contabilidad_control);
		
		} else if(parametro_contabilidad_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_contabilidad_control);		
		
		} else if(parametro_contabilidad_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(parametro_contabilidad_control);		
		
		} else if(parametro_contabilidad_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(parametro_contabilidad_control);		
		
		} else if(parametro_contabilidad_control.action.includes("Busqueda") ||
				  parametro_contabilidad_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(parametro_contabilidad_control);
			
		} else if(parametro_contabilidad_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(parametro_contabilidad_control)
		}
		
		
		
	
		else if(parametro_contabilidad_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_contabilidad_control);	
		
		} else if(parametro_contabilidad_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_contabilidad_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_contabilidad_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_contabilidad_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_contabilidad_control) {
		this.actualizarPaginaAccionesGenerales(parametro_contabilidad_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_contabilidad_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_contabilidad_control);
		this.actualizarPaginaOrderBy(parametro_contabilidad_control);
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);
		this.actualizarPaginaCargaGeneralControles(parametro_contabilidad_control);
		//this.actualizarPaginaFormulario(parametro_contabilidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_contabilidad_control);
		this.actualizarPaginaAreaBusquedas(parametro_contabilidad_control);
		this.actualizarPaginaCargaCombosFK(parametro_contabilidad_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_contabilidad_control) {
		//this.actualizarPaginaFormulario(parametro_contabilidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_contabilidad_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_contabilidad_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_contabilidad_control);
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);
		this.actualizarPaginaCargaGeneralControles(parametro_contabilidad_control);
		//this.actualizarPaginaFormulario(parametro_contabilidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_contabilidad_control);
		this.actualizarPaginaAreaBusquedas(parametro_contabilidad_control);
		this.actualizarPaginaCargaCombosFK(parametro_contabilidad_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);		
		//this.actualizarPaginaFormulario(parametro_contabilidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);		
		//this.actualizarPaginaFormulario(parametro_contabilidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);		
		//this.actualizarPaginaFormulario(parametro_contabilidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_contabilidad_control) {
		//this.actualizarPaginaFormulario(parametro_contabilidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_contabilidad_control) {
		this.actualizarPaginaAbrirLink(parametro_contabilidad_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);				
		//this.actualizarPaginaFormulario(parametro_contabilidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);
		//this.actualizarPaginaFormulario(parametro_contabilidad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);
		//this.actualizarPaginaFormulario(parametro_contabilidad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_contabilidad_control) {
		//this.actualizarPaginaFormulario(parametro_contabilidad_control);
		this.onLoadCombosDefectoFK(parametro_contabilidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);
		//this.actualizarPaginaFormulario(parametro_contabilidad_control);
		this.onLoadCombosDefectoFK(parametro_contabilidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_contabilidad_control) {
		this.actualizarPaginaAbrirLink(parametro_contabilidad_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_contabilidad_control) {
		this.actualizarPaginaTablaDatos(parametro_contabilidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_contabilidad_control) {
					//super.actualizarPaginaImprimir(parametro_contabilidad_control,"parametro_contabilidad");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_contabilidad_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("parametro_contabilidad_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(parametro_contabilidad_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_contabilidad_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_contabilidad_control) {
		//super.actualizarPaginaImprimir(parametro_contabilidad_control,"parametro_contabilidad");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("parametro_contabilidad_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(parametro_contabilidad_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_contabilidad_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(parametro_contabilidad_control) {
		//super.actualizarPaginaImprimir(parametro_contabilidad_control,"parametro_contabilidad");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("parametro_contabilidad_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(parametro_contabilidad_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_contabilidad_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_contabilidad_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(parametro_contabilidad_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(parametro_contabilidad_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(parametro_contabilidad_control);
			
		this.actualizarPaginaAbrirLink(parametro_contabilidad_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_contabilidad_control) {
		
		if(parametro_contabilidad_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_contabilidad_control);
		}
		
		if(parametro_contabilidad_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_contabilidad_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_contabilidad_control) {
		if(parametro_contabilidad_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_contabilidadReturnGeneral",JSON.stringify(parametro_contabilidad_control.parametro_contabilidadReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_contabilidad_control) {
		if(parametro_contabilidad_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_contabilidad_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_contabilidad_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_contabilidad_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_contabilidad_control, mostrar) {
		
		if(mostrar==true) {
			parametro_contabilidad_funcion1.resaltarRestaurarDivsPagina(false,"parametro_contabilidad");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_contabilidad_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_contabilidad");
			}			
			
			parametro_contabilidad_funcion1.mostrarDivMensaje(true,parametro_contabilidad_control.strAuxiliarMensaje,parametro_contabilidad_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_contabilidad_funcion1.mostrarDivMensaje(false,parametro_contabilidad_control.strAuxiliarMensaje,parametro_contabilidad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_contabilidad_control) {
		if(parametro_contabilidad_funcion1.esPaginaForm(parametro_contabilidad_constante1)==true) {
			window.opener.parametro_contabilidad_webcontrol1.actualizarPaginaTablaDatos(parametro_contabilidad_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_contabilidad_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_contabilidad_control) {
		parametro_contabilidad_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_contabilidad_control.strAuxiliarUrlPagina);
				
		parametro_contabilidad_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_contabilidad_control.strAuxiliarTipo,parametro_contabilidad_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_contabilidad_control) {
		parametro_contabilidad_funcion1.resaltarRestaurarDivMensaje(true,parametro_contabilidad_control.strAuxiliarMensajeAlert,parametro_contabilidad_control.strAuxiliarCssMensaje);
			
		if(parametro_contabilidad_funcion1.esPaginaForm(parametro_contabilidad_constante1)==true) {
			window.opener.parametro_contabilidad_funcion1.resaltarRestaurarDivMensaje(true,parametro_contabilidad_control.strAuxiliarMensajeAlert,parametro_contabilidad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_contabilidad_control) {
		this.parametro_contabilidad_controlInicial=parametro_contabilidad_control;
			
		if(parametro_contabilidad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_contabilidad_control.strStyleDivArbol,parametro_contabilidad_control.strStyleDivContent
																,parametro_contabilidad_control.strStyleDivOpcionesBanner,parametro_contabilidad_control.strStyleDivExpandirColapsar
																,parametro_contabilidad_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_contabilidad_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_contabilidad_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_contabilidad_control) {
		this.actualizarCssBotonesPagina(parametro_contabilidad_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_contabilidad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_contabilidad_control.tiposReportes,parametro_contabilidad_control.tiposReporte
															 	,parametro_contabilidad_control.tiposPaginacion,parametro_contabilidad_control.tiposAcciones
																,parametro_contabilidad_control.tiposColumnasSelect,parametro_contabilidad_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_contabilidad_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_contabilidad_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_contabilidad_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_contabilidad_control) {
	
		var indexPosition=parametro_contabilidad_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_contabilidad_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_contabilidad_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_contabilidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_contabilidad_control.strRecargarFkTipos,",")) { 
				parametro_contabilidad_webcontrol1.cargarCombosempresasFK(parametro_contabilidad_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_contabilidad_control.strRecargarFkTiposNinguno!=null && parametro_contabilidad_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_contabilidad_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_contabilidad_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",parametro_contabilidad_control.strRecargarFkTiposNinguno,",")) { 
					parametro_contabilidad_webcontrol1.cargarCombosempresasFK(parametro_contabilidad_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(parametro_contabilidad_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_contabilidad_funcion1,parametro_contabilidad_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(parametro_contabilidad_control) {
		jQuery("#divBusquedaparametro_contabilidadAjaxWebPart").css("display",parametro_contabilidad_control.strPermisoBusqueda);
		jQuery("#trparametro_contabilidadCabeceraBusquedas").css("display",parametro_contabilidad_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_contabilidad").css("display",parametro_contabilidad_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_contabilidad_control.htmlTablaOrderBy!=null
			&& parametro_contabilidad_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_contabilidadAjaxWebPart").html(parametro_contabilidad_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_contabilidad_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_contabilidad_control.htmlTablaOrderByRel!=null
			&& parametro_contabilidad_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_contabilidadAjaxWebPart").html(parametro_contabilidad_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_contabilidad_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_contabilidadAjaxWebPart").css("display","none");
			jQuery("#trparametro_contabilidadCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_contabilidad").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(parametro_contabilidad_control) {
		
		if(!parametro_contabilidad_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(parametro_contabilidad_control);
		} else {
			jQuery("#divTablaDatosparametro_contabilidadsAjaxWebPart").html(parametro_contabilidad_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_contabilidads=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_contabilidad_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_contabilidads=jQuery("#tblTablaDatosparametro_contabilidads").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_contabilidad",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_contabilidad_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_contabilidad_webcontrol1.registrarControlesTableEdition(parametro_contabilidad_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_contabilidad_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(parametro_contabilidad_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("parametro_contabilidad_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(parametro_contabilidad_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosparametro_contabilidadsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(parametro_contabilidad_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(parametro_contabilidad_control);
		
		const divOrderBy = document.getElementById("divOrderByparametro_contabilidadAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(parametro_contabilidad_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelparametro_contabilidadAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(parametro_contabilidad_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_contabilidad_control.parametro_contabilidadActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_contabilidad_control);			
		}
	}
	
	actualizarCamposFilaTabla(parametro_contabilidad_control) {
		var i=0;
		
		i=parametro_contabilidad_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_contabilidad_control.parametro_contabilidadActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_contabilidad_control.parametro_contabilidadActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(parametro_contabilidad_control.parametro_contabilidadActual.versionRow);
		
		if(parametro_contabilidad_control.parametro_contabilidadActual.id_empresa!=null && parametro_contabilidad_control.parametro_contabilidadActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != parametro_contabilidad_control.parametro_contabilidadActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(parametro_contabilidad_control.parametro_contabilidadActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(parametro_contabilidad_control.parametro_contabilidadActual.numero_asiento);
		jQuery("#t-cel_"+i+"_5").prop('checked',parametro_contabilidad_control.parametro_contabilidadActual.con_asiento_simple_facturacion);
		jQuery("#t-cel_"+i+"_6").prop('checked',parametro_contabilidad_control.parametro_contabilidadActual.con_eliminacion_fisica_asiento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(parametro_contabilidad_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_contabilidad_control) {
		parametro_contabilidad_funcion1.registrarControlesTableValidacionEdition(parametro_contabilidad_control,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_contabilidad_control) {
		jQuery("#divResumenparametro_contabilidadActualAjaxWebPart").html(parametro_contabilidad_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_contabilidad_control) {
		//jQuery("#divAccionesRelacionesparametro_contabilidadAjaxWebPart").html(parametro_contabilidad_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("parametro_contabilidad_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(parametro_contabilidad_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesparametro_contabilidadAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		parametro_contabilidad_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_contabilidad_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_contabilidad_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_contabilidad_control) {
		
		if(parametro_contabilidad_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_contabilidad_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",parametro_contabilidad_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+parametro_contabilidad_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",parametro_contabilidad_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_contabilidad();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_contabilidad",id,"contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		parametro_contabilidad_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_contabilidad","empresa","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidadConstante,strParametros);
		
		//parametro_contabilidad_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(parametro_contabilidad_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-id_empresa",parametro_contabilidad_control.empresasFK);

		if(parametro_contabilidad_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_contabilidad_control.idFilaTablaActual+"_3",parametro_contabilidad_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(parametro_contabilidad_control) {

	};

	
	
	setDefectoValorCombosempresasFK(parametro_contabilidad_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_contabilidad_control.idempresaDefaultFK>-1 && jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_contabilidad_control.idempresaDefaultFK) {
				jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-id_empresa").val(parametro_contabilidad_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_contabilidad_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_contabilidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_contabilidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_contabilidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_contabilidad_control.strRecargarFkTipos,",")) { 
				parametro_contabilidad_webcontrol1.setDefectoValorCombosempresasFK(parametro_contabilidad_control);
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
	onLoadCombosEventosFK(parametro_contabilidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_contabilidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_contabilidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_contabilidad_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_contabilidad_webcontrol1.registrarComboActionChangeCombosempresasFK(parametro_contabilidad_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_contabilidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_contabilidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_contabilidad_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_contabilidad_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_contabilidad","FK_Idempresa","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
		
			
			if(parametro_contabilidad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_contabilidad");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_contabilidad");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_contabilidad_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,"parametro_contabilidad");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_contabilidad_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				parametro_contabilidad_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_contabilidad_control) {
		
		jQuery("#divBusquedaparametro_contabilidadAjaxWebPart").css("display",parametro_contabilidad_control.strPermisoBusqueda);
		jQuery("#trparametro_contabilidadCabeceraBusquedas").css("display",parametro_contabilidad_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_contabilidad").css("display",parametro_contabilidad_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_contabilidad").css("display",parametro_contabilidad_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_contabilidad").attr("style",parametro_contabilidad_control.strPermisoMostrarTodos);		
		
		if(parametro_contabilidad_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_contabilidadNuevo").css("display",parametro_contabilidad_control.strPermisoNuevo);
			jQuery("#tdparametro_contabilidadNuevoToolBar").css("display",parametro_contabilidad_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_contabilidadDuplicar").css("display",parametro_contabilidad_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_contabilidadDuplicarToolBar").css("display",parametro_contabilidad_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_contabilidadNuevoGuardarCambios").css("display",parametro_contabilidad_control.strPermisoNuevo);
			jQuery("#tdparametro_contabilidadNuevoGuardarCambiosToolBar").css("display",parametro_contabilidad_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_contabilidad_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_contabilidadCopiar").css("display",parametro_contabilidad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_contabilidadCopiarToolBar").css("display",parametro_contabilidad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_contabilidadConEditar").css("display",parametro_contabilidad_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_contabilidadGuardarCambios").css("display",parametro_contabilidad_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_contabilidadGuardarCambiosToolBar").css("display",parametro_contabilidad_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdparametro_contabilidadCerrarPagina").css("display",parametro_contabilidad_control.strPermisoPopup);		
		jQuery("#tdparametro_contabilidadCerrarPaginaToolBar").css("display",parametro_contabilidad_control.strPermisoPopup);
		//jQuery("#trparametro_contabilidadAccionesRelaciones").css("display",parametro_contabilidad_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_contabilidad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_contabilidad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_contabilidad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametro Contabilidads";
		sTituloBanner+=" - " + parametro_contabilidad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_contabilidad_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_contabilidadRelacionesToolBar").css("display",parametro_contabilidad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_contabilidad").css("display",parametro_contabilidad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_contabilidad_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_contabilidad_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_contabilidad_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_contabilidad_webcontrol1.registrarEventosControles();
		
		if(parametro_contabilidad_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_contabilidad_constante1.STR_ES_RELACIONADO=="false") {
			parametro_contabilidad_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_contabilidad_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_contabilidad_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_contabilidad_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_contabilidad_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_contabilidad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_contabilidad_webcontrol1.onLoad();
			
			//} else {
				//if(parametro_contabilidad_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			parametro_contabilidad_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_contabilidad","contabilidad","",parametro_contabilidad_funcion1,parametro_contabilidad_webcontrol1,parametro_contabilidad_constante1);	
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

var parametro_contabilidad_webcontrol1 = new parametro_contabilidad_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_contabilidad_webcontrol,parametro_contabilidad_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_contabilidad_webcontrol1 = parametro_contabilidad_webcontrol1;


if(parametro_contabilidad_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_contabilidad_webcontrol1.onLoadWindow; 
}

//</script>