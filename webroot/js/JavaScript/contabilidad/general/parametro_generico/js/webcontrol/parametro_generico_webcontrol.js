//<script type="text/javascript" language="javascript">



//var parametro_genericoJQueryPaginaWebInteraccion= function (parametro_generico_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_generico_constante,parametro_generico_constante1} from '../util/parametro_generico_constante.js';

import {parametro_generico_funcion,parametro_generico_funcion1} from '../util/parametro_generico_funcion.js';


class parametro_generico_webcontrol extends GeneralEntityWebControl {
	
	parametro_generico_control=null;
	parametro_generico_controlInicial=null;
	parametro_generico_controlAuxiliar=null;
		
	//if(parametro_generico_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_generico_control) {
		super();
		
		this.parametro_generico_control=parametro_generico_control;
	}
		
	actualizarVariablesPagina(parametro_generico_control) {
		
		if(parametro_generico_control.action=="index" || parametro_generico_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_generico_control);
			
		} 
		
		
		else if(parametro_generico_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_generico_control);
			
		} else if(parametro_generico_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_generico_control);
			
		} else if(parametro_generico_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_generico_control);		
		
		} else if(parametro_generico_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_generico_control);
		
		}  else if(parametro_generico_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_generico_control);
		
		} else if(parametro_generico_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_generico_control);		
		
		} else if(parametro_generico_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(parametro_generico_control);		
		
		} else if(parametro_generico_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(parametro_generico_control);		
		
		} else if(parametro_generico_control.action.includes("Busqueda") ||
				  parametro_generico_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(parametro_generico_control);
			
		} else if(parametro_generico_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(parametro_generico_control)
		}
		
		
		
	
		else if(parametro_generico_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_generico_control);	
		
		} else if(parametro_generico_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_generico_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_generico_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_generico_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_generico_control) {
		this.actualizarPaginaAccionesGenerales(parametro_generico_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_generico_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_generico_control);
		this.actualizarPaginaOrderBy(parametro_generico_control);
		this.actualizarPaginaTablaDatos(parametro_generico_control);
		this.actualizarPaginaCargaGeneralControles(parametro_generico_control);
		//this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_generico_control);
		this.actualizarPaginaAreaBusquedas(parametro_generico_control);
		this.actualizarPaginaCargaCombosFK(parametro_generico_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_generico_control) {
		//this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_generico_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_generico_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_generico_control);
		this.actualizarPaginaTablaDatos(parametro_generico_control);
		this.actualizarPaginaCargaGeneralControles(parametro_generico_control);
		//this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_generico_control);
		this.actualizarPaginaAreaBusquedas(parametro_generico_control);
		this.actualizarPaginaCargaCombosFK(parametro_generico_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		//this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		//this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		//this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_generico_control) {
		//this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_generico_control) {
		this.actualizarPaginaAbrirLink(parametro_generico_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);				
		//this.actualizarPaginaFormulario(parametro_generico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);
		//this.actualizarPaginaFormulario(parametro_generico_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);
		//this.actualizarPaginaFormulario(parametro_generico_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_generico_control) {
		//this.actualizarPaginaFormulario(parametro_generico_control);
		this.onLoadCombosDefectoFK(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);
		//this.actualizarPaginaFormulario(parametro_generico_control);
		this.onLoadCombosDefectoFK(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_generico_control) {
		this.actualizarPaginaAbrirLink(parametro_generico_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_generico_control) {
		this.actualizarPaginaTablaDatos(parametro_generico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_generico_control) {
					//super.actualizarPaginaImprimir(parametro_generico_control,"parametro_generico");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_generico_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("parametro_generico_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(parametro_generico_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_generico_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_generico_control) {
		//super.actualizarPaginaImprimir(parametro_generico_control,"parametro_generico");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("parametro_generico_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(parametro_generico_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_generico_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(parametro_generico_control) {
		//super.actualizarPaginaImprimir(parametro_generico_control,"parametro_generico");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("parametro_generico_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(parametro_generico_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_generico_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_generico_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(parametro_generico_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(parametro_generico_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(parametro_generico_control);
			
		this.actualizarPaginaAbrirLink(parametro_generico_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_generico_control) {
		
		if(parametro_generico_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_generico_control);
		}
		
		if(parametro_generico_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_generico_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_generico_control) {
		if(parametro_generico_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_genericoReturnGeneral",JSON.stringify(parametro_generico_control.parametro_genericoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_generico_control) {
		if(parametro_generico_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_generico_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_generico_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_generico_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_generico_control, mostrar) {
		
		if(mostrar==true) {
			parametro_generico_funcion1.resaltarRestaurarDivsPagina(false,"parametro_generico");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_generico_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_generico");
			}			
			
			parametro_generico_funcion1.mostrarDivMensaje(true,parametro_generico_control.strAuxiliarMensaje,parametro_generico_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_generico_funcion1.mostrarDivMensaje(false,parametro_generico_control.strAuxiliarMensaje,parametro_generico_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_generico_control) {
		if(parametro_generico_funcion1.esPaginaForm(parametro_generico_constante1)==true) {
			window.opener.parametro_generico_webcontrol1.actualizarPaginaTablaDatos(parametro_generico_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_generico_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_generico_control) {
		parametro_generico_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_generico_control.strAuxiliarUrlPagina);
				
		parametro_generico_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_generico_control.strAuxiliarTipo,parametro_generico_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_generico_control) {
		parametro_generico_funcion1.resaltarRestaurarDivMensaje(true,parametro_generico_control.strAuxiliarMensajeAlert,parametro_generico_control.strAuxiliarCssMensaje);
			
		if(parametro_generico_funcion1.esPaginaForm(parametro_generico_constante1)==true) {
			window.opener.parametro_generico_funcion1.resaltarRestaurarDivMensaje(true,parametro_generico_control.strAuxiliarMensajeAlert,parametro_generico_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_generico_control) {
		this.parametro_generico_controlInicial=parametro_generico_control;
			
		if(parametro_generico_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_generico_control.strStyleDivArbol,parametro_generico_control.strStyleDivContent
																,parametro_generico_control.strStyleDivOpcionesBanner,parametro_generico_control.strStyleDivExpandirColapsar
																,parametro_generico_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_generico_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_generico_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_generico_control) {
		this.actualizarCssBotonesPagina(parametro_generico_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_generico_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_generico_control.tiposReportes,parametro_generico_control.tiposReporte
															 	,parametro_generico_control.tiposPaginacion,parametro_generico_control.tiposAcciones
																,parametro_generico_control.tiposColumnasSelect,parametro_generico_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_generico_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_generico_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_generico_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_generico_control) {
	
		var indexPosition=parametro_generico_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_generico_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_generico_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_generico_control.strRecargarFkTiposNinguno!=null && parametro_generico_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_generico_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(parametro_generico_control) {
		jQuery("#divBusquedaparametro_genericoAjaxWebPart").css("display",parametro_generico_control.strPermisoBusqueda);
		jQuery("#trparametro_genericoCabeceraBusquedas").css("display",parametro_generico_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_generico").css("display",parametro_generico_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_generico_control.htmlTablaOrderBy!=null
			&& parametro_generico_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_genericoAjaxWebPart").html(parametro_generico_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_generico_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_generico_control.htmlTablaOrderByRel!=null
			&& parametro_generico_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_genericoAjaxWebPart").html(parametro_generico_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_generico_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_genericoAjaxWebPart").css("display","none");
			jQuery("#trparametro_genericoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_generico").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(parametro_generico_control) {
		
		if(!parametro_generico_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(parametro_generico_control);
		} else {
			jQuery("#divTablaDatosparametro_genericosAjaxWebPart").html(parametro_generico_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_genericos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_generico_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_genericos=jQuery("#tblTablaDatosparametro_genericos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_generico",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_generico_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_generico_webcontrol1.registrarControlesTableEdition(parametro_generico_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_generico_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(parametro_generico_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("parametro_generico_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(parametro_generico_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosparametro_genericosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(parametro_generico_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(parametro_generico_control);
		
		const divOrderBy = document.getElementById("divOrderByparametro_genericoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(parametro_generico_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelparametro_genericoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(parametro_generico_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_generico_control.parametro_genericoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_generico_control);			
		}
	}
	
	actualizarCamposFilaTabla(parametro_generico_control) {
		var i=0;
		
		i=parametro_generico_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_generico_control.parametro_genericoActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_generico_control.parametro_genericoActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(parametro_generico_control.parametro_genericoActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(parametro_generico_control.parametro_genericoActual.parametro);
		jQuery("#t-cel_"+i+"_4").val(parametro_generico_control.parametro_genericoActual.descripcion_pantalla);
		jQuery("#t-cel_"+i+"_5").val(parametro_generico_control.parametro_genericoActual.valor_caracteristica);
		jQuery("#t-cel_"+i+"_6").val(parametro_generico_control.parametro_genericoActual.valor2_caracteristica);
		jQuery("#t-cel_"+i+"_7").val(parametro_generico_control.parametro_genericoActual.valor3_caracteristica);
		jQuery("#t-cel_"+i+"_8").val(parametro_generico_control.parametro_genericoActual.valor_fecha);
		jQuery("#t-cel_"+i+"_9").val(parametro_generico_control.parametro_genericoActual.valor_numerico);
		jQuery("#t-cel_"+i+"_10").val(parametro_generico_control.parametro_genericoActual.valor2_numerico);
		jQuery("#t-cel_"+i+"_11").val(parametro_generico_control.parametro_genericoActual.valor_binario);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(parametro_generico_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_generico_control) {
		parametro_generico_funcion1.registrarControlesTableValidacionEdition(parametro_generico_control,parametro_generico_webcontrol1,parametro_generico_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_generico_control) {
		jQuery("#divResumenparametro_genericoActualAjaxWebPart").html(parametro_generico_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_generico_control) {
		//jQuery("#divAccionesRelacionesparametro_genericoAjaxWebPart").html(parametro_generico_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("parametro_generico_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(parametro_generico_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesparametro_genericoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		parametro_generico_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_generico_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_generico_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_generico_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_generico();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_generico",id,"general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_genericoConstante,strParametros);
		
		//parametro_generico_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_generico_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_generico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_generico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(parametro_generico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_generico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_generico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_generico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_generico_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_generico_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);			
			
			
		
			
			if(parametro_generico_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_generico");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_generico");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_generico_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,"parametro_generico");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_generico_control) {
		
		jQuery("#divBusquedaparametro_genericoAjaxWebPart").css("display",parametro_generico_control.strPermisoBusqueda);
		jQuery("#trparametro_genericoCabeceraBusquedas").css("display",parametro_generico_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_generico").css("display",parametro_generico_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_generico").css("display",parametro_generico_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_generico").attr("style",parametro_generico_control.strPermisoMostrarTodos);		
		
		if(parametro_generico_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_genericoNuevo").css("display",parametro_generico_control.strPermisoNuevo);
			jQuery("#tdparametro_genericoNuevoToolBar").css("display",parametro_generico_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_genericoDuplicar").css("display",parametro_generico_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_genericoDuplicarToolBar").css("display",parametro_generico_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_genericoNuevoGuardarCambios").css("display",parametro_generico_control.strPermisoNuevo);
			jQuery("#tdparametro_genericoNuevoGuardarCambiosToolBar").css("display",parametro_generico_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_generico_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_genericoCopiar").css("display",parametro_generico_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_genericoCopiarToolBar").css("display",parametro_generico_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_genericoConEditar").css("display",parametro_generico_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_genericoGuardarCambios").css("display",parametro_generico_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_genericoGuardarCambiosToolBar").css("display",parametro_generico_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdparametro_genericoCerrarPagina").css("display",parametro_generico_control.strPermisoPopup);		
		jQuery("#tdparametro_genericoCerrarPaginaToolBar").css("display",parametro_generico_control.strPermisoPopup);
		//jQuery("#trparametro_genericoAccionesRelaciones").css("display",parametro_generico_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_generico_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_generico_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_generico_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametros Genericoses";
		sTituloBanner+=" - " + parametro_generico_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_generico_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_genericoRelacionesToolBar").css("display",parametro_generico_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_generico").css("display",parametro_generico_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_generico_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_generico_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_generico_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_generico_webcontrol1.registrarEventosControles();
		
		if(parametro_generico_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_generico_constante1.STR_ES_RELACIONADO=="false") {
			parametro_generico_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_generico_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_generico_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_generico_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_generico_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_generico_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_generico_webcontrol1.onLoad();
			
			//} else {
				//if(parametro_generico_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			parametro_generico_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_generico","general","",parametro_generico_funcion1,parametro_generico_webcontrol1,parametro_generico_constante1);	
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

var parametro_generico_webcontrol1 = new parametro_generico_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_generico_webcontrol,parametro_generico_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_generico_webcontrol1 = parametro_generico_webcontrol1;


if(parametro_generico_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_generico_webcontrol1.onLoadWindow; 
}

//</script>