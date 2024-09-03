//<script type="text/javascript" language="javascript">



//var cuenta_cobrarJQueryPaginaWebInteraccion= function (cuenta_cobrar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cuenta_cobrar_constante,cuenta_cobrar_constante1} from '../util/cuenta_cobrar_constante.js';

import {cuenta_cobrar_funcion,cuenta_cobrar_funcion1} from '../util/cuenta_cobrar_funcion.js';


class cuenta_cobrar_webcontrol extends GeneralEntityWebControl {
	
	cuenta_cobrar_control=null;
	cuenta_cobrar_controlInicial=null;
	cuenta_cobrar_controlAuxiliar=null;
		
	//if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_cobrar_control) {
		super();
		
		this.cuenta_cobrar_control=cuenta_cobrar_control;
	}
		
	actualizarVariablesPagina(cuenta_cobrar_control) {
		
		if(cuenta_cobrar_control.action=="index" || cuenta_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_cobrar_control);
			
		} 
		
		
		else if(cuenta_cobrar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cuenta_cobrar_control);
			
		} else if(cuenta_cobrar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cuenta_cobrar_control);
			
		} else if(cuenta_cobrar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_cobrar_control);		
		
		} else if(cuenta_cobrar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cuenta_cobrar_control);
		
		}  else if(cuenta_cobrar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_cobrar_control);
		
		} else if(cuenta_cobrar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_cobrar_control);		
		
		} else if(cuenta_cobrar_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cuenta_cobrar_control);		
		
		} else if(cuenta_cobrar_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(cuenta_cobrar_control);		
		
		} else if(cuenta_cobrar_control.action.includes("Busqueda") ||
				  cuenta_cobrar_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(cuenta_cobrar_control);
			
		} else if(cuenta_cobrar_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cuenta_cobrar_control)
		}
		
		
		
	
		else if(cuenta_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_cobrar_control);	
		
		} else if(cuenta_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_cobrar_control);		
		}
	
		else if(cuenta_cobrar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_cobrar_control);		
		}
	
		else if(cuenta_cobrar_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_cobrar_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cuenta_cobrar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cuenta_cobrar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cuenta_cobrar_control) {
		this.actualizarPaginaAccionesGenerales(cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_cobrar_control);
		this.actualizarPaginaOrderBy(cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(cuenta_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_cobrar_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_cobrar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_cobrar_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);				
		//this.actualizarPaginaFormulario(cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_cobrar_control) {
					//super.actualizarPaginaImprimir(cuenta_cobrar_control,"cuenta_cobrar");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_cobrar_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("cuenta_cobrar_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cuenta_cobrar_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_cobrar_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_cobrar_control) {
		//super.actualizarPaginaImprimir(cuenta_cobrar_control,"cuenta_cobrar");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("cuenta_cobrar_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(cuenta_cobrar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_cobrar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cuenta_cobrar_control) {
		//super.actualizarPaginaImprimir(cuenta_cobrar_control,"cuenta_cobrar");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("cuenta_cobrar_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cuenta_cobrar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_cobrar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_cobrar_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(cuenta_cobrar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cuenta_cobrar_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(cuenta_cobrar_control);
			
		this.actualizarPaginaAbrirLink(cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(cuenta_cobrar_control);
		this.actualizarPaginaFormulario(cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_cobrar_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cuenta_cobrar_control) {
		
		if(cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_cobrar_control);
		}
		
		if(cuenta_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cuenta_cobrar_control) {
		if(cuenta_cobrar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cuenta_cobrarReturnGeneral",JSON.stringify(cuenta_cobrar_control.cuenta_cobrarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cuenta_cobrar_control) {
		if(cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_cobrar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cuenta_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_cobrar_funcion1.resaltarRestaurarDivsPagina(false,"cuenta_cobrar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false,"cuenta_cobrar");
			}			
			
			cuenta_cobrar_funcion1.mostrarDivMensaje(true,cuenta_cobrar_control.strAuxiliarMensaje,cuenta_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_cobrar_funcion1.mostrarDivMensaje(false,cuenta_cobrar_control.strAuxiliarMensaje,cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_cobrar_control) {
		if(cuenta_cobrar_funcion1.esPaginaForm(cuenta_cobrar_constante1)==true) {
			window.opener.cuenta_cobrar_webcontrol1.actualizarPaginaTablaDatos(cuenta_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_cobrar_control) {
		cuenta_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_cobrar_control.strAuxiliarUrlPagina);
				
		cuenta_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_cobrar_control.strAuxiliarTipo,cuenta_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_cobrar_control) {
		cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,cuenta_cobrar_control.strAuxiliarMensajeAlert,cuenta_cobrar_control.strAuxiliarCssMensaje);
			
		if(cuenta_cobrar_funcion1.esPaginaForm(cuenta_cobrar_constante1)==true) {
			window.opener.cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,cuenta_cobrar_control.strAuxiliarMensajeAlert,cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cuenta_cobrar_control) {
		this.cuenta_cobrar_controlInicial=cuenta_cobrar_control;
			
		if(cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_cobrar_control.strStyleDivArbol,cuenta_cobrar_control.strStyleDivContent
																,cuenta_cobrar_control.strStyleDivOpcionesBanner,cuenta_cobrar_control.strStyleDivExpandirColapsar
																,cuenta_cobrar_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=cuenta_cobrar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cuenta_cobrar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cuenta_cobrar_control) {
		this.actualizarCssBotonesPagina(cuenta_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_cobrar_control.tiposReportes,cuenta_cobrar_control.tiposReporte
															 	,cuenta_cobrar_control.tiposPaginacion,cuenta_cobrar_control.tiposAcciones
																,cuenta_cobrar_control.tiposColumnasSelect,cuenta_cobrar_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cuenta_cobrar_control.tiposRelaciones,cuenta_cobrar_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_cobrar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_cobrar_control) {
	
		var indexPosition=cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cuenta_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombosempresasFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombosfacturasFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombosclientesFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombostermino_pago_clientesFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_cobrar",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.cargarCombosestado_cuentas_cobrarsFK(cuenta_cobrar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_cobrar_control.strRecargarFkTiposNinguno!=null && cuenta_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_cobrar_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombosempresasFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_factura",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombosfacturasFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombosclientesFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombostermino_pago_clientesFK(cuenta_cobrar_control);
				}

				if(cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado_cuentas_cobrar",cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_cobrar_webcontrol1.cargarCombosestado_cuentas_cobrarsFK(cuenta_cobrar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_factura") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.cuenta_cobrarActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.cuenta_cobrarActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.cuenta_cobrarActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.usuariosFK);
	}

	cargarComboEditarTablafacturaFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.facturasFK);
	}

	cargarComboEditarTablaclienteFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.clientesFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablaestado_cuentas_cobrarFK(cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_cobrar_funcion1,cuenta_cobrar_control.estado_cuentas_cobrarsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(cuenta_cobrar_control) {
		jQuery("#divBusquedacuenta_cobrarAjaxWebPart").css("display",cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trcuenta_cobrarCabeceraBusquedas").css("display",cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_cobrar").css("display",cuenta_cobrar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cuenta_cobrar_control.htmlTablaOrderBy!=null
			&& cuenta_cobrar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycuenta_cobrarAjaxWebPart").html(cuenta_cobrar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cuenta_cobrar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cuenta_cobrar_control.htmlTablaOrderByRel!=null
			&& cuenta_cobrar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcuenta_cobrarAjaxWebPart").html(cuenta_cobrar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacuenta_cobrarAjaxWebPart").css("display","none");
			jQuery("#trcuenta_cobrarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacuenta_cobrar").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(cuenta_cobrar_control) {
		
		if(!cuenta_cobrar_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(cuenta_cobrar_control);
		} else {
			jQuery("#divTablaDatoscuenta_cobrarsAjaxWebPart").html(cuenta_cobrar_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscuenta_cobrars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscuenta_cobrars=jQuery("#tblTablaDatoscuenta_cobrars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cuenta_cobrar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cuenta_cobrar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cuenta_cobrar_webcontrol1.registrarControlesTableEdition(cuenta_cobrar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cuenta_cobrar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(cuenta_cobrar_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("cuenta_cobrar_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cuenta_cobrar_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscuenta_cobrarsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(cuenta_cobrar_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(cuenta_cobrar_control);
		
		const divOrderBy = document.getElementById("divOrderBycuenta_cobrarAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(cuenta_cobrar_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcuenta_cobrarAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(cuenta_cobrar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cuenta_cobrar_control.cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cuenta_cobrar_control);			
		}
	}
	
	actualizarCamposFilaTabla(cuenta_cobrar_control) {
		var i=0;
		
		i=cuenta_cobrar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cuenta_cobrar_control.cuenta_cobrarActual.id);
		jQuery("#t-version_row_"+i+"").val(cuenta_cobrar_control.cuenta_cobrarActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(cuenta_cobrar_control.cuenta_cobrarActual.versionRow);
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_empresa!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(cuenta_cobrar_control.cuenta_cobrarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_sucursal!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_4").val(cuenta_cobrar_control.cuenta_cobrarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_ejercicio!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_5").val(cuenta_cobrar_control.cuenta_cobrarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_periodo!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_periodo) {
				jQuery("#t-cel_"+i+"_6").val(cuenta_cobrar_control.cuenta_cobrarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_usuario!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_usuario) {
				jQuery("#t-cel_"+i+"_7").val(cuenta_cobrar_control.cuenta_cobrarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_factura!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_factura>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_factura) {
				jQuery("#t-cel_"+i+"_8").val(cuenta_cobrar_control.cuenta_cobrarActual.id_factura).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_8").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_cliente!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_cliente) {
				jQuery("#t-cel_"+i+"_9").val(cuenta_cobrar_control.cuenta_cobrarActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_9").select2("val", null);
			if(jQuery("#t-cel_"+i+"_9").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(cuenta_cobrar_control.cuenta_cobrarActual.numero);
		jQuery("#t-cel_"+i+"_11").val(cuenta_cobrar_control.cuenta_cobrarActual.fecha_emision);
		jQuery("#t-cel_"+i+"_12").val(cuenta_cobrar_control.cuenta_cobrarActual.fecha_vence);
		jQuery("#t-cel_"+i+"_13").val(cuenta_cobrar_control.cuenta_cobrarActual.fecha_ultimo_movimiento);
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_termino_pago_cliente!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_termino_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_14").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_termino_pago_cliente) {
				jQuery("#t-cel_"+i+"_14").val(cuenta_cobrar_control.cuenta_cobrarActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_14").select2("val", null);
			if(jQuery("#t-cel_"+i+"_14").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_14").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_15").val(cuenta_cobrar_control.cuenta_cobrarActual.monto);
		jQuery("#t-cel_"+i+"_16").val(cuenta_cobrar_control.cuenta_cobrarActual.saldo);
		jQuery("#t-cel_"+i+"_17").val(cuenta_cobrar_control.cuenta_cobrarActual.porcentaje);
		jQuery("#t-cel_"+i+"_18").val(cuenta_cobrar_control.cuenta_cobrarActual.descripcion);
		
		if(cuenta_cobrar_control.cuenta_cobrarActual.id_estado_cuentas_cobrar!=null && cuenta_cobrar_control.cuenta_cobrarActual.id_estado_cuentas_cobrar>-1){
			if(jQuery("#t-cel_"+i+"_19").val() != cuenta_cobrar_control.cuenta_cobrarActual.id_estado_cuentas_cobrar) {
				jQuery("#t-cel_"+i+"_19").val(cuenta_cobrar_control.cuenta_cobrarActual.id_estado_cuentas_cobrar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_19").select2("val", null);
			if(jQuery("#t-cel_"+i+"_19").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_19").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_20").val(cuenta_cobrar_control.cuenta_cobrarActual.referencia);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cuenta_cobrar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondebito_cuenta_cobrar").click(function(){
		jQuery("#tblTablaDatoscuenta_cobrars").on("click",".imgrelaciondebito_cuenta_cobrar", function () {

			var idActual=jQuery(this).attr("idactualcuenta_cobrar");

			cuenta_cobrar_webcontrol1.registrarSesionParadebito_cuenta_cobrars(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionpago_cuenta_cobrar").click(function(){
		jQuery("#tblTablaDatoscuenta_cobrars").on("click",".imgrelacionpago_cuenta_cobrar", function () {

			var idActual=jQuery(this).attr("idactualcuenta_cobrar");

			cuenta_cobrar_webcontrol1.registrarSesionParapago_cuenta_cobrars(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncredito_cuenta_cobrar").click(function(){
		jQuery("#tblTablaDatoscuenta_cobrars").on("click",".imgrelacioncredito_cuenta_cobrar", function () {

			var idActual=jQuery(this).attr("idactualcuenta_cobrar");

			cuenta_cobrar_webcontrol1.registrarSesionParacredito_cuenta_cobrars(idActual);
		});				
	}
		
	

	registrarSesionParadebito_cuenta_cobrars(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_cobrar","debito_cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1,"s","");
	}

	registrarSesionParapago_cuenta_cobrars(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_cobrar","pago_cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1,"s","");
	}

	registrarSesionParacredito_cuenta_cobrars(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_cobrar","credito_cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1,"s","");
	}
	
	registrarControlesTableEdition(cuenta_cobrar_control) {
		cuenta_cobrar_funcion1.registrarControlesTableValidacionEdition(cuenta_cobrar_control,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(cuenta_cobrar_control) {
		jQuery("#divResumencuenta_cobrarActualAjaxWebPart").html(cuenta_cobrar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_cobrar_control) {
		//jQuery("#divAccionesRelacionescuenta_cobrarAjaxWebPart").html(cuenta_cobrar_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("cuenta_cobrar_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cuenta_cobrar_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescuenta_cobrarAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		cuenta_cobrar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cuenta_cobrar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cuenta_cobrar_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cuenta_cobrar_control) {
		
		if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cuenta_cobrar_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cuenta_cobrar_control.strVisibleFK_Idejercicio);
		}

		if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_cobrar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_cobrar_control.strVisibleFK_Idempresa);
		}

		if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_cobrar").attr("style",cuenta_cobrar_control.strVisibleFK_Idestado_cuentas_cobrar);
			jQuery("#tblstrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_cobrar").attr("style",cuenta_cobrar_control.strVisibleFK_Idestado_cuentas_cobrar);
		}

		if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idfactura").attr("style",cuenta_cobrar_control.strVisibleFK_Idfactura);
			jQuery("#tblstrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idfactura").attr("style",cuenta_cobrar_control.strVisibleFK_Idfactura);
		}

		if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cuenta_cobrar_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cuenta_cobrar_control.strVisibleFK_Idperiodo);
		}

		if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",cuenta_cobrar_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",cuenta_cobrar_control.strVisibleFK_Idproveedor);
		}

		if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",cuenta_cobrar_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",cuenta_cobrar_control.strVisibleFK_Idsucursal);
		}

		if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente").attr("style",cuenta_cobrar_control.strVisibleFK_Idtermino_pago_cliente);
			jQuery("#tblstrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente").attr("style",cuenta_cobrar_control.strVisibleFK_Idtermino_pago_cliente);
		}

		if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cuenta_cobrar_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cuenta_cobrar_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncuenta_cobrar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cuenta_cobrar",id,"cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_cobrar","empresa","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_cobrar","sucursal","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_cobrar","ejercicio","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_cobrar","periodo","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_cobrar","usuario","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}

	abrirBusquedaParafactura(strNombreCampoBusqueda){//idActual
		cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_cobrar","factura","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_cobrar","cliente","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_cobrar","termino_pago_cliente","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}

	abrirBusquedaParaestado_cuentas_cobrar(strNombreCampoBusqueda){//idActual
		cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_cobrar","estado_cuentas_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelaciondebito_cuenta_cobrar").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_cobrar");

			cuenta_cobrar_webcontrol1.registrarSesionParadebito_cuenta_cobrars(idActual);
		});
		jQuery("#imgdivrelacionpago_cuenta_cobrar").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_cobrar");

			cuenta_cobrar_webcontrol1.registrarSesionParapago_cuenta_cobrars(idActual);
		});
		jQuery("#imgdivrelacioncredito_cuenta_cobrar").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_cobrar");

			cuenta_cobrar_webcontrol1.registrarSesionParacredito_cuenta_cobrars(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrarConstante,strParametros);
		
		//cuenta_cobrar_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa",cuenta_cobrar_control.empresasFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_3",cuenta_cobrar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal",cuenta_cobrar_control.sucursalsFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_4",cuenta_cobrar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio",cuenta_cobrar_control.ejerciciosFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_5",cuenta_cobrar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo",cuenta_cobrar_control.periodosFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_6",cuenta_cobrar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario",cuenta_cobrar_control.usuariosFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_7",cuenta_cobrar_control.usuariosFK);
		}
	};

	cargarCombosfacturasFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura",cuenta_cobrar_control.facturasFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_8",cuenta_cobrar_control.facturasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura",cuenta_cobrar_control.facturasFK);

	};

	cargarCombosclientesFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente",cuenta_cobrar_control.clientesFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_9",cuenta_cobrar_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_cliente",cuenta_cobrar_control.clientesFK);

	};

	cargarCombostermino_pago_clientesFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente",cuenta_cobrar_control.termino_pago_clientesFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_14",cuenta_cobrar_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente",cuenta_cobrar_control.termino_pago_clientesFK);

	};

	cargarCombosestado_cuentas_cobrarsFK(cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_cuentas_cobrar",cuenta_cobrar_control.estado_cuentas_cobrarsFK);

		if(cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_cobrar_control.idFilaTablaActual+"_19",cuenta_cobrar_control.estado_cuentas_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_cobrar-cmbid_estado_cuentas_cobrar",cuenta_cobrar_control.estado_cuentas_cobrarsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosfacturasFK(cuenta_cobrar_control) {
		this.registrarComboActionChangeid_factura("form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura",false,0);


		this.registrarComboActionChangeid_factura(""+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura",false,0);


	};

	registrarComboActionChangeCombosclientesFK(cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosestado_cuentas_cobrarsFK(cuenta_cobrar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_cobrar_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_cobrar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idsucursalDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != cuenta_cobrar_control.idsucursalDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(cuenta_cobrar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idejercicioDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_cobrar_control.idejercicioDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_cobrar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idperiodoDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_cobrar_control.idperiodoDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_cobrar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idusuarioDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_cobrar_control.idusuarioDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_cobrar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosfacturasFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idfacturaDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura").val() != cuenta_cobrar_control.idfacturaDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura").val(cuenta_cobrar_control.idfacturaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val(cuenta_cobrar_control.idfacturaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idclienteDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente").val() != cuenta_cobrar_control.idclienteDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente").val(cuenta_cobrar_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_cliente").val(cuenta_cobrar_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != cuenta_cobrar_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(cuenta_cobrar_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente").val(cuenta_cobrar_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestado_cuentas_cobrarsFK(cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_cobrar_control.idestado_cuentas_cobrarDefaultFK>-1 && jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_cuentas_cobrar").val() != cuenta_cobrar_control.idestado_cuentas_cobrarDefaultFK) {
				jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_cuentas_cobrar").val(cuenta_cobrar_control.idestado_cuentas_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_cobrar-cmbid_estado_cuentas_cobrar").val(cuenta_cobrar_control.idestado_cuentas_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_cobrar-cmbid_estado_cuentas_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado_cuentas_cobrar-cmbid_estado_cuentas_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_factura(id_factura,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("cuenta_cobrar","cuentascobrar","","id_factura",id_factura,"NINGUNO","",paraEventoTabla,idFilaTabla,cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	







		jQuery("#form-id_estado_cuentas_cobrar").prop("disabled", habilitarDeshabilitar);

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombosempresasFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombossucursalsFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombosejerciciosFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombosperiodosFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombosusuariosFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombosfacturasFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombosclientesFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(cuenta_cobrar_control);
			}

			if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_cobrar",cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				cuenta_cobrar_webcontrol1.setDefectoValorCombosestado_cuentas_cobrarsFK(cuenta_cobrar_control);
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
	onLoadCombosEventosFK(cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombossucursalsFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosperiodosFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosusuariosFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosfacturasFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosclientesFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(cuenta_cobrar_control);
			//}

			//if(cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_cobrar",cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosestado_cuentas_cobrarsFK(cuenta_cobrar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cuenta_cobrar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_cobrar","FK_Idejercicio","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_cobrar","FK_Idempresa","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_cobrar","FK_Idestado_cuentas_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_cobrar","FK_Idfactura","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_cobrar","FK_Idperiodo","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_cobrar","FK_Idproveedor","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_cobrar","FK_Idsucursal","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_cobrar","FK_Idtermino_pago_cliente","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_cobrar","FK_Idusuario","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
		
			
			if(cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_cobrar");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_cobrar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,"cuenta_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("factura","id_factura","facturacion","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_factura_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParafactura("id_factura");
				//alert(jQuery('#form-id_factura_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado_cuentas_cobrar","id_estado_cuentas_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_cuentas_cobrar_img_busqueda").click(function(){
				cuenta_cobrar_webcontrol1.abrirBusquedaParaestado_cuentas_cobrar("id_estado_cuentas_cobrar");
				//alert(jQuery('#form-id_estado_cuentas_cobrar_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cuenta_cobrar");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_cobrar_control) {
		
		jQuery("#divBusquedacuenta_cobrarAjaxWebPart").css("display",cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trcuenta_cobrarCabeceraBusquedas").css("display",cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_cobrar").css("display",cuenta_cobrar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecuenta_cobrar").css("display",cuenta_cobrar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscuenta_cobrar").attr("style",cuenta_cobrar_control.strPermisoMostrarTodos);		
		
		if(cuenta_cobrar_control.strPermisoNuevo!=null) {
			jQuery("#tdcuenta_cobrarNuevo").css("display",cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tdcuenta_cobrarNuevoToolBar").css("display",cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcuenta_cobrarDuplicar").css("display",cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_cobrarDuplicarToolBar").css("display",cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_cobrarNuevoGuardarCambios").css("display",cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tdcuenta_cobrarNuevoGuardarCambiosToolBar").css("display",cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cuenta_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_cobrarCopiar").css("display",cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_cobrarCopiarToolBar").css("display",cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_cobrarConEditar").css("display",cuenta_cobrar_control.strPermisoActualizar);
		}
		
		jQuery("#tdcuenta_cobrarGuardarCambios").css("display",cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcuenta_cobrarGuardarCambiosToolBar").css("display",cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcuenta_cobrarCerrarPagina").css("display",cuenta_cobrar_control.strPermisoPopup);		
		jQuery("#tdcuenta_cobrarCerrarPaginaToolBar").css("display",cuenta_cobrar_control.strPermisoPopup);
		//jQuery("#trcuenta_cobrarAccionesRelaciones").css("display",cuenta_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cuenta Cobrars";
		sTituloBanner+=" - " + cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_cobrar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcuenta_cobrarRelacionesToolBar").css("display",cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscuenta_cobrar").css("display",cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cuenta_cobrar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cuenta_cobrar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_cobrar_webcontrol1.registrarEventosControles();
		
		if(cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cuenta_cobrar_webcontrol1.onLoad();
			
			//} else {
				//if(cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			cuenta_cobrar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_cobrar","cuentascobrar","",cuenta_cobrar_funcion1,cuenta_cobrar_webcontrol1,cuenta_cobrar_constante1);	
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

var cuenta_cobrar_webcontrol1 = new cuenta_cobrar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cuenta_cobrar_webcontrol,cuenta_cobrar_webcontrol1};

//Para ser llamado desde window.opener
window.cuenta_cobrar_webcontrol1 = cuenta_cobrar_webcontrol1;


if(cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_cobrar_webcontrol1.onLoadWindow; 
}

//</script>