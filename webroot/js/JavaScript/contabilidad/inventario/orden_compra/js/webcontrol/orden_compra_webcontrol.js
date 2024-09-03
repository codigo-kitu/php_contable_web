//<script type="text/javascript" language="javascript">



//var orden_compraJQueryPaginaWebInteraccion= function (orden_compra_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {orden_compra_constante,orden_compra_constante1} from '../util/orden_compra_constante.js';

import {orden_compra_funcion,orden_compra_funcion1} from '../util/orden_compra_funcion.js';


class orden_compra_webcontrol extends GeneralEntityWebControl {
	
	orden_compra_control=null;
	orden_compra_controlInicial=null;
	orden_compra_controlAuxiliar=null;
		
	//if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(orden_compra_control) {
		super();
		
		this.orden_compra_control=orden_compra_control;
	}
		
	actualizarVariablesPagina(orden_compra_control) {
		
		if(orden_compra_control.action=="index" || orden_compra_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(orden_compra_control);
			
		} 
		
		
		else if(orden_compra_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(orden_compra_control);
		
		} else if(orden_compra_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(orden_compra_control);
		
		} else if(orden_compra_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(orden_compra_control);
		
		} else if(orden_compra_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(orden_compra_control);
			
		} else if(orden_compra_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(orden_compra_control);
			
		} else if(orden_compra_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(orden_compra_control);
		
		} else if(orden_compra_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(orden_compra_control);		
		
		} else if(orden_compra_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(orden_compra_control);
		
		} else if(orden_compra_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(orden_compra_control);
		
		} else if(orden_compra_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(orden_compra_control);
		
		} else if(orden_compra_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(orden_compra_control);
		
		}  else if(orden_compra_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(orden_compra_control);
		
		} else if(orden_compra_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(orden_compra_control);
		
		} else if(orden_compra_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(orden_compra_control);
		
		} else if(orden_compra_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(orden_compra_control);
		
		} else if(orden_compra_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(orden_compra_control);
		
		} else if(orden_compra_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(orden_compra_control);
		
		} else if(orden_compra_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(orden_compra_control);
		
		} else if(orden_compra_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(orden_compra_control);
		
		} else if(orden_compra_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(orden_compra_control);
		
		} else if(orden_compra_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(orden_compra_control);		
		
		} else if(orden_compra_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(orden_compra_control);		
		
		} else if(orden_compra_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(orden_compra_control);		
		
		} else if(orden_compra_control.action.includes("Busqueda") ||
				  orden_compra_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(orden_compra_control);
			
		} else if(orden_compra_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(orden_compra_control)
		}
		
		
		
	
		else if(orden_compra_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(orden_compra_control);	
		
		} else if(orden_compra_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(orden_compra_control);		
		}
	
		else if(orden_compra_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(orden_compra_control);		
		}
	
		else if(orden_compra_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(orden_compra_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + orden_compra_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(orden_compra_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(orden_compra_control) {
		this.actualizarPaginaAccionesGenerales(orden_compra_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(orden_compra_control) {
		
		this.actualizarPaginaCargaGeneral(orden_compra_control);
		this.actualizarPaginaOrderBy(orden_compra_control);
		this.actualizarPaginaTablaDatos(orden_compra_control);
		this.actualizarPaginaCargaGeneralControles(orden_compra_control);
		//this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(orden_compra_control);
		this.actualizarPaginaAreaBusquedas(orden_compra_control);
		this.actualizarPaginaCargaCombosFK(orden_compra_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(orden_compra_control) {
		//this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(orden_compra_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(orden_compra_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(orden_compra_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(orden_compra_control) {
		
		this.actualizarPaginaCargaGeneral(orden_compra_control);
		this.actualizarPaginaTablaDatos(orden_compra_control);
		this.actualizarPaginaCargaGeneralControles(orden_compra_control);
		//this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(orden_compra_control);
		this.actualizarPaginaAreaBusquedas(orden_compra_control);
		this.actualizarPaginaCargaCombosFK(orden_compra_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		//this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		//this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		//this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		//this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		//this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		//this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(orden_compra_control) {
		//this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(orden_compra_control) {
		this.actualizarPaginaAbrirLink(orden_compra_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);				
		//this.actualizarPaginaFormulario(orden_compra_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);
		//this.actualizarPaginaFormulario(orden_compra_control);
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		//this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);
		//this.actualizarPaginaFormulario(orden_compra_control);
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(orden_compra_control) {
		//this.actualizarPaginaFormulario(orden_compra_control);
		this.onLoadCombosDefectoFK(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);
		//this.actualizarPaginaFormulario(orden_compra_control);
		this.onLoadCombosDefectoFK(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		//this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(orden_compra_control) {
		this.actualizarPaginaAbrirLink(orden_compra_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(orden_compra_control) {
					//super.actualizarPaginaImprimir(orden_compra_control,"orden_compra");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",orden_compra_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("orden_compra_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(orden_compra_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(orden_compra_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(orden_compra_control) {
		//super.actualizarPaginaImprimir(orden_compra_control,"orden_compra");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("orden_compra_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(orden_compra_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",orden_compra_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(orden_compra_control) {
		//super.actualizarPaginaImprimir(orden_compra_control,"orden_compra");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("orden_compra_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(orden_compra_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",orden_compra_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(orden_compra_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(orden_compra_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(orden_compra_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(orden_compra_control);
			
		this.actualizarPaginaAbrirLink(orden_compra_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(orden_compra_control) {
		this.actualizarPaginaTablaDatos(orden_compra_control);
		this.actualizarPaginaFormulario(orden_compra_control);
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(orden_compra_control) {
		
		if(orden_compra_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(orden_compra_control);
		}
		
		if(orden_compra_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(orden_compra_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(orden_compra_control) {
		if(orden_compra_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("orden_compraReturnGeneral",JSON.stringify(orden_compra_control.orden_compraReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(orden_compra_control) {
		if(orden_compra_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && orden_compra_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(orden_compra_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(orden_compra_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(orden_compra_control, mostrar) {
		
		if(mostrar==true) {
			orden_compra_funcion1.resaltarRestaurarDivsPagina(false,"orden_compra");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				orden_compra_funcion1.resaltarRestaurarDivMantenimiento(false,"orden_compra");
			}			
			
			orden_compra_funcion1.mostrarDivMensaje(true,orden_compra_control.strAuxiliarMensaje,orden_compra_control.strAuxiliarCssMensaje);
		
		} else {
			orden_compra_funcion1.mostrarDivMensaje(false,orden_compra_control.strAuxiliarMensaje,orden_compra_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(orden_compra_control) {
		if(orden_compra_funcion1.esPaginaForm(orden_compra_constante1)==true) {
			window.opener.orden_compra_webcontrol1.actualizarPaginaTablaDatos(orden_compra_control);
		} else {
			this.actualizarPaginaTablaDatos(orden_compra_control);
		}
	}
	
	actualizarPaginaAbrirLink(orden_compra_control) {
		orden_compra_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(orden_compra_control.strAuxiliarUrlPagina);
				
		orden_compra_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(orden_compra_control.strAuxiliarTipo,orden_compra_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(orden_compra_control) {
		orden_compra_funcion1.resaltarRestaurarDivMensaje(true,orden_compra_control.strAuxiliarMensajeAlert,orden_compra_control.strAuxiliarCssMensaje);
			
		if(orden_compra_funcion1.esPaginaForm(orden_compra_constante1)==true) {
			window.opener.orden_compra_funcion1.resaltarRestaurarDivMensaje(true,orden_compra_control.strAuxiliarMensajeAlert,orden_compra_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(orden_compra_control) {
		this.orden_compra_controlInicial=orden_compra_control;
			
		if(orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(orden_compra_control.strStyleDivArbol,orden_compra_control.strStyleDivContent
																,orden_compra_control.strStyleDivOpcionesBanner,orden_compra_control.strStyleDivExpandirColapsar
																,orden_compra_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=orden_compra_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",orden_compra_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(orden_compra_control) {
		this.actualizarCssBotonesPagina(orden_compra_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(orden_compra_control.tiposReportes,orden_compra_control.tiposReporte
															 	,orden_compra_control.tiposPaginacion,orden_compra_control.tiposAcciones
																,orden_compra_control.tiposColumnasSelect,orden_compra_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(orden_compra_control.tiposRelaciones,orden_compra_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(orden_compra_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(orden_compra_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(orden_compra_control);			
	}
	
	actualizarPaginaUsuarioInvitado(orden_compra_control) {
	
		var indexPosition=orden_compra_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=orden_compra_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(orden_compra_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosempresasFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombossucursalsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosejerciciosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosperiodosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosusuariosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosproveedorsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosvendedorsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombostermino_pago_proveedorsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosmonedasFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosestadosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosasientosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarCombosdocumento_cuenta_pagarsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.cargarComboskardexsFK(orden_compra_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(orden_compra_control.strRecargarFkTiposNinguno!=null && orden_compra_control.strRecargarFkTiposNinguno!='NINGUNO' && orden_compra_control.strRecargarFkTiposNinguno!='') {
			
				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosempresasFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombossucursalsFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosejerciciosFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosperiodosFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosusuariosFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosproveedorsFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosvendedorsFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombostermino_pago_proveedorsFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_moneda",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosmonedasFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosestadosFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosasientosFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarCombosdocumento_cuenta_pagarsFK(orden_compra_control);
				}

				if(orden_compra_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",orden_compra_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_webcontrol1.cargarComboskardexsFK(orden_compra_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_proveedor") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.orden_compraActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.orden_compraActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.orden_compraActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.usuariosFK);
	}

	cargarComboEditarTablaproveedorFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.proveedorsFK);
	}

	cargarComboEditarTablavendedorFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_proveedorFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.termino_pago_proveedorsFK);
	}

	cargarComboEditarTablamonedaFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.monedasFK);
	}

	cargarComboEditarTablaestadoFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.estadosFK);
	}

	cargarComboEditarTablaasientoFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.asientosFK);
	}

	cargarComboEditarTabladocumento_cuenta_pagarFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.documento_cuenta_pagarsFK);
	}

	cargarComboEditarTablakardexFK(orden_compra_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_funcion1,orden_compra_control.kardexsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(orden_compra_control) {
		jQuery("#divBusquedaorden_compraAjaxWebPart").css("display",orden_compra_control.strPermisoBusqueda);
		jQuery("#trorden_compraCabeceraBusquedas").css("display",orden_compra_control.strPermisoBusqueda);
		jQuery("#trBusquedaorden_compra").css("display",orden_compra_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(orden_compra_control.htmlTablaOrderBy!=null
			&& orden_compra_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByorden_compraAjaxWebPart").html(orden_compra_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//orden_compra_webcontrol1.registrarOrderByActions();
			
		}
			
		if(orden_compra_control.htmlTablaOrderByRel!=null
			&& orden_compra_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelorden_compraAjaxWebPart").html(orden_compra_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(orden_compra_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaorden_compraAjaxWebPart").css("display","none");
			jQuery("#trorden_compraCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaorden_compra").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(orden_compra_control) {
		
		if(!orden_compra_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(orden_compra_control);
		} else {
			jQuery("#divTablaDatosorden_comprasAjaxWebPart").html(orden_compra_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosorden_compras=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(orden_compra_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosorden_compras=jQuery("#tblTablaDatosorden_compras").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("orden_compra",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',orden_compra_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			orden_compra_webcontrol1.registrarControlesTableEdition(orden_compra_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		orden_compra_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(orden_compra_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("orden_compra_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(orden_compra_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosorden_comprasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(orden_compra_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(orden_compra_control);
		
		const divOrderBy = document.getElementById("divOrderByorden_compraAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(orden_compra_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelorden_compraAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(orden_compra_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(orden_compra_control.orden_compraActual!=null) {//form
			
			this.actualizarCamposFilaTabla(orden_compra_control);			
		}
	}
	
	actualizarCamposFilaTabla(orden_compra_control) {
		var i=0;
		
		i=orden_compra_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(orden_compra_control.orden_compraActual.id);
		jQuery("#t-version_row_"+i+"").val(orden_compra_control.orden_compraActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(orden_compra_control.orden_compraActual.versionRow);
		
		if(orden_compra_control.orden_compraActual.id_empresa!=null && orden_compra_control.orden_compraActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != orden_compra_control.orden_compraActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(orden_compra_control.orden_compraActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_sucursal!=null && orden_compra_control.orden_compraActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != orden_compra_control.orden_compraActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_4").val(orden_compra_control.orden_compraActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_ejercicio!=null && orden_compra_control.orden_compraActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != orden_compra_control.orden_compraActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_5").val(orden_compra_control.orden_compraActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_periodo!=null && orden_compra_control.orden_compraActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != orden_compra_control.orden_compraActual.id_periodo) {
				jQuery("#t-cel_"+i+"_6").val(orden_compra_control.orden_compraActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_usuario!=null && orden_compra_control.orden_compraActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != orden_compra_control.orden_compraActual.id_usuario) {
				jQuery("#t-cel_"+i+"_7").val(orden_compra_control.orden_compraActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(orden_compra_control.orden_compraActual.numero);
		
		if(orden_compra_control.orden_compraActual.id_proveedor!=null && orden_compra_control.orden_compraActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != orden_compra_control.orden_compraActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_9").val(orden_compra_control.orden_compraActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_9").select2("val", null);
			if(jQuery("#t-cel_"+i+"_9").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(orden_compra_control.orden_compraActual.ruc);
		jQuery("#t-cel_"+i+"_11").val(orden_compra_control.orden_compraActual.fecha_emision);
		
		if(orden_compra_control.orden_compraActual.id_vendedor!=null && orden_compra_control.orden_compraActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != orden_compra_control.orden_compraActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_12").val(orden_compra_control.orden_compraActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_termino_pago_proveedor!=null && orden_compra_control.orden_compraActual.id_termino_pago_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != orden_compra_control.orden_compraActual.id_termino_pago_proveedor) {
				jQuery("#t-cel_"+i+"_13").val(orden_compra_control.orden_compraActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(orden_compra_control.orden_compraActual.fecha_vence);
		jQuery("#t-cel_"+i+"_15").val(orden_compra_control.orden_compraActual.cotizacion);
		
		if(orden_compra_control.orden_compraActual.id_moneda!=null && orden_compra_control.orden_compraActual.id_moneda>-1){
			if(jQuery("#t-cel_"+i+"_16").val() != orden_compra_control.orden_compraActual.id_moneda) {
				jQuery("#t-cel_"+i+"_16").val(orden_compra_control.orden_compraActual.id_moneda).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_16").select2("val", null);
			if(jQuery("#t-cel_"+i+"_16").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_16").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_17").prop('checked',orden_compra_control.orden_compraActual.impuesto_en_precio);
		
		if(orden_compra_control.orden_compraActual.id_estado!=null && orden_compra_control.orden_compraActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_18").val() != orden_compra_control.orden_compraActual.id_estado) {
				jQuery("#t-cel_"+i+"_18").val(orden_compra_control.orden_compraActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_18").select2("val", null);
			if(jQuery("#t-cel_"+i+"_18").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_18").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_19").val(orden_compra_control.orden_compraActual.direccion);
		jQuery("#t-cel_"+i+"_20").val(orden_compra_control.orden_compraActual.enviar);
		jQuery("#t-cel_"+i+"_21").val(orden_compra_control.orden_compraActual.observacion);
		jQuery("#t-cel_"+i+"_22").val(orden_compra_control.orden_compraActual.sub_total);
		jQuery("#t-cel_"+i+"_23").val(orden_compra_control.orden_compraActual.descuento_monto);
		jQuery("#t-cel_"+i+"_24").val(orden_compra_control.orden_compraActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_25").val(orden_compra_control.orden_compraActual.iva_monto);
		jQuery("#t-cel_"+i+"_26").val(orden_compra_control.orden_compraActual.iva_porciento);
		jQuery("#t-cel_"+i+"_27").val(orden_compra_control.orden_compraActual.retencion_fuente_monto);
		jQuery("#t-cel_"+i+"_28").val(orden_compra_control.orden_compraActual.retencion_fuente_porciento);
		jQuery("#t-cel_"+i+"_29").val(orden_compra_control.orden_compraActual.retencion_iva_monto);
		jQuery("#t-cel_"+i+"_30").val(orden_compra_control.orden_compraActual.retencion_iva_porciento);
		jQuery("#t-cel_"+i+"_31").val(orden_compra_control.orden_compraActual.total);
		jQuery("#t-cel_"+i+"_32").val(orden_compra_control.orden_compraActual.otro_monto);
		jQuery("#t-cel_"+i+"_33").val(orden_compra_control.orden_compraActual.otro_porciento);
		jQuery("#t-cel_"+i+"_34").val(orden_compra_control.orden_compraActual.retencion_ica_monto);
		jQuery("#t-cel_"+i+"_35").val(orden_compra_control.orden_compraActual.retencion_ica_porciento);
		jQuery("#t-cel_"+i+"_36").val(orden_compra_control.orden_compraActual.factura_proveedor);
		jQuery("#t-cel_"+i+"_37").prop('checked',orden_compra_control.orden_compraActual.recibida);
		jQuery("#t-cel_"+i+"_38").val(orden_compra_control.orden_compraActual.pagos);
		
		if(orden_compra_control.orden_compraActual.id_asiento!=null && orden_compra_control.orden_compraActual.id_asiento>-1){
			if(jQuery("#t-cel_"+i+"_39").val() != orden_compra_control.orden_compraActual.id_asiento) {
				jQuery("#t-cel_"+i+"_39").val(orden_compra_control.orden_compraActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_39").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_39").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_documento_cuenta_pagar!=null && orden_compra_control.orden_compraActual.id_documento_cuenta_pagar>-1){
			if(jQuery("#t-cel_"+i+"_40").val() != orden_compra_control.orden_compraActual.id_documento_cuenta_pagar) {
				jQuery("#t-cel_"+i+"_40").val(orden_compra_control.orden_compraActual.id_documento_cuenta_pagar).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_40").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_40").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_control.orden_compraActual.id_kardex!=null && orden_compra_control.orden_compraActual.id_kardex>-1){
			if(jQuery("#t-cel_"+i+"_41").val() != orden_compra_control.orden_compraActual.id_kardex) {
				jQuery("#t-cel_"+i+"_41").val(orden_compra_control.orden_compraActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_41").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_41").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(orden_compra_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionorden_compra_detalle").click(function(){
		jQuery("#tblTablaDatosorden_compras").on("click",".imgrelacionorden_compra_detalle", function () {

			var idActual=jQuery(this).attr("idactualorden_compra");

			orden_compra_webcontrol1.registrarSesionParaorden_compra_detalles(idActual);
		});				
	}
		
	

	registrarSesionParaorden_compra_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"orden_compra","orden_compra_detalle","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1,"s","");
	}
	
	registrarControlesTableEdition(orden_compra_control) {
		orden_compra_funcion1.registrarControlesTableValidacionEdition(orden_compra_control,orden_compra_webcontrol1,orden_compra_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(orden_compra_control) {
		jQuery("#divResumenorden_compraActualAjaxWebPart").html(orden_compra_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(orden_compra_control) {
		//jQuery("#divAccionesRelacionesorden_compraAjaxWebPart").html(orden_compra_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("orden_compra_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(orden_compra_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesorden_compraAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		orden_compra_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(orden_compra_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(orden_compra_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(orden_compra_control) {
		
		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",orden_compra_control.strVisibleFK_Idasiento);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",orden_compra_control.strVisibleFK_Idasiento);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar").attr("style",orden_compra_control.strVisibleFK_Iddocumento_cuenta_pagar);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar").attr("style",orden_compra_control.strVisibleFK_Iddocumento_cuenta_pagar);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",orden_compra_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",orden_compra_control.strVisibleFK_Idejercicio);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",orden_compra_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",orden_compra_control.strVisibleFK_Idempresa);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idestado").attr("style",orden_compra_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idestado").attr("style",orden_compra_control.strVisibleFK_Idestado);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",orden_compra_control.strVisibleFK_Idkardex);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",orden_compra_control.strVisibleFK_Idkardex);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",orden_compra_control.strVisibleFK_Idmoneda);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",orden_compra_control.strVisibleFK_Idmoneda);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",orden_compra_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",orden_compra_control.strVisibleFK_Idperiodo);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",orden_compra_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",orden_compra_control.strVisibleFK_Idproveedor);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",orden_compra_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",orden_compra_control.strVisibleFK_Idsucursal);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",orden_compra_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",orden_compra_control.strVisibleFK_Idtermino_pago);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",orden_compra_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",orden_compra_control.strVisibleFK_Idusuario);
		}

		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",orden_compra_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+orden_compra_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",orden_compra_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionorden_compra();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("orden_compra",id,"inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","empresa","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","sucursal","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","ejercicio","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","periodo","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","usuario","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","proveedor","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","vendedor","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParatermino_pago_proveedor(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","termino_pago_proveedor","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParamoneda(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","moneda","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","estado","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParaasiento(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","asiento","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParadocumento_cuenta_pagar(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","documento_cuenta_pagar","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}

	abrirBusquedaParakardex(strNombreCampoBusqueda){//idActual
		orden_compra_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra","kardex","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionorden_compra_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualorden_compra");

			orden_compra_webcontrol1.registrarSesionParaorden_compra_detalles(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compraConstante,strParametros);
		
		//orden_compra_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_empresa",orden_compra_control.empresasFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_3",orden_compra_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_sucursal",orden_compra_control.sucursalsFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_4",orden_compra_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_ejercicio",orden_compra_control.ejerciciosFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_5",orden_compra_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_periodo",orden_compra_control.periodosFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_6",orden_compra_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_usuario",orden_compra_control.usuariosFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_7",orden_compra_control.usuariosFK);
		}
	};

	cargarCombosproveedorsFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor",orden_compra_control.proveedorsFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_9",orden_compra_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",orden_compra_control.proveedorsFK);

	};

	cargarCombosvendedorsFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_vendedor",orden_compra_control.vendedorsFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_12",orden_compra_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",orden_compra_control.vendedorsFK);

	};

	cargarCombostermino_pago_proveedorsFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_termino_pago_proveedor",orden_compra_control.termino_pago_proveedorsFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_13",orden_compra_control.termino_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor",orden_compra_control.termino_pago_proveedorsFK);

	};

	cargarCombosmonedasFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_moneda",orden_compra_control.monedasFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_16",orden_compra_control.monedasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda",orden_compra_control.monedasFK);

	};

	cargarCombosestadosFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_estado",orden_compra_control.estadosFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_18",orden_compra_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",orden_compra_control.estadosFK);

	};

	cargarCombosasientosFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_asiento",orden_compra_control.asientosFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_39",orden_compra_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",orden_compra_control.asientosFK);

	};

	cargarCombosdocumento_cuenta_pagarsFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar",orden_compra_control.documento_cuenta_pagarsFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_40",orden_compra_control.documento_cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar",orden_compra_control.documento_cuenta_pagarsFK);

	};

	cargarComboskardexsFK(orden_compra_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_constante1.STR_SUFIJO+"-id_kardex",orden_compra_control.kardexsFK);

		if(orden_compra_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_control.idFilaTablaActual+"_41",orden_compra_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",orden_compra_control.kardexsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(orden_compra_control) {

	};

	registrarComboActionChangeCombossucursalsFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosperiodosFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosusuariosFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(orden_compra_control) {
		this.registrarComboActionChangeid_proveedor("form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor",false,0);


		this.registrarComboActionChangeid_proveedor(""+orden_compra_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(orden_compra_control) {

	};

	registrarComboActionChangeCombostermino_pago_proveedorsFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosmonedasFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosestadosFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosasientosFK(orden_compra_control) {

	};

	registrarComboActionChangeCombosdocumento_cuenta_pagarsFK(orden_compra_control) {

	};

	registrarComboActionChangeComboskardexsFK(orden_compra_control) {

	};

	
	
	setDefectoValorCombosempresasFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idempresaDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_empresa").val() != orden_compra_control.idempresaDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_empresa").val(orden_compra_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idsucursalDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_sucursal").val() != orden_compra_control.idsucursalDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_sucursal").val(orden_compra_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idejercicioDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_ejercicio").val() != orden_compra_control.idejercicioDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_ejercicio").val(orden_compra_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idperiodoDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_periodo").val() != orden_compra_control.idperiodoDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_periodo").val(orden_compra_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idusuarioDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_usuario").val() != orden_compra_control.idusuarioDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_usuario").val(orden_compra_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idproveedorDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor").val() != orden_compra_control.idproveedorDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor").val(orden_compra_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(orden_compra_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idvendedorDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_vendedor").val() != orden_compra_control.idvendedorDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_vendedor").val(orden_compra_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(orden_compra_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_proveedorsFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idtermino_pago_proveedorDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != orden_compra_control.idtermino_pago_proveedorDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(orden_compra_control.idtermino_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor").val(orden_compra_control.idtermino_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmonedasFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idmonedaDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_moneda").val() != orden_compra_control.idmonedaDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_moneda").val(orden_compra_control.idmonedaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(orden_compra_control.idmonedaDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idestadoDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_estado").val() != orden_compra_control.idestadoDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_estado").val(orden_compra_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(orden_compra_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idasientoDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_asiento").val() != orden_compra_control.idasientoDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_asiento").val(orden_compra_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(orden_compra_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_cuenta_pagarsFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.iddocumento_cuenta_pagarDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val() != orden_compra_control.iddocumento_cuenta_pagarDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val(orden_compra_control.iddocumento_cuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val(orden_compra_control.iddocumento_cuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardexsFK(orden_compra_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_control.idkardexDefaultFK>-1 && jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_kardex").val() != orden_compra_control.idkardexDefaultFK) {
				jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_kardex").val(orden_compra_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(orden_compra_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_proveedor(id_proveedor,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("orden_compra","inventario","","id_proveedor",id_proveedor,"NINGUNO","",paraEventoTabla,idFilaTabla,orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	







		jQuery("#form-id_moneda").prop("disabled", habilitarDeshabilitar);
		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
			
							orden_compra_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
			
		orden_compra_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//orden_compra_control
		
	
	}
	
	onLoadCombosDefectoFK(orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosempresasFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombossucursalsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosejerciciosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosperiodosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosusuariosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosproveedorsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosvendedorsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombostermino_pago_proveedorsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosmonedasFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosestadosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosasientosFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorCombosdocumento_cuenta_pagarsFK(orden_compra_control);
			}

			if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",orden_compra_control.strRecargarFkTipos,",")) { 
				orden_compra_webcontrol1.setDefectoValorComboskardexsFK(orden_compra_control);
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
	onLoadCombosEventosFK(orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosempresasFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombossucursalsFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosejerciciosFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosperiodosFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosusuariosFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosproveedorsFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosvendedorsFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombostermino_pago_proveedorsFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosmonedasFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosestadosFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosasientosFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_pagarsFK(orden_compra_control);
			//}

			//if(orden_compra_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",orden_compra_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_webcontrol1.registrarComboActionChangeComboskardexsFK(orden_compra_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(orden_compra_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(orden_compra_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(orden_compra_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idasiento","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Iddocumento_cuenta_pagar","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idejercicio","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idempresa","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idestado","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idkardex","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idmoneda","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idperiodo","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idproveedor","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idsucursal","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idtermino_pago","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idusuario","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra","FK_Idvendedor","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
		
			
			if(orden_compra_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("orden_compra");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("orden_compra");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(orden_compra_funcion1,orden_compra_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(orden_compra_funcion1,orden_compra_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(orden_compra_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,"orden_compra");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_proveedor","id_termino_pago_proveedor","cuentaspagar","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_termino_pago_proveedor_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParatermino_pago_proveedor("id_termino_pago_proveedor");
				//alert(jQuery('#form-id_termino_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("moneda","id_moneda","contabilidad","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_moneda_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParamoneda("id_moneda");
				//alert(jQuery('#form-id_moneda_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_pagar","id_documento_cuenta_pagar","cuentaspagar","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParadocumento_cuenta_pagar("id_documento_cuenta_pagar");
				//alert(jQuery('#form-id_documento_cuenta_pagar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				orden_compra_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("orden_compra");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(orden_compra_control) {
		
		jQuery("#divBusquedaorden_compraAjaxWebPart").css("display",orden_compra_control.strPermisoBusqueda);
		jQuery("#trorden_compraCabeceraBusquedas").css("display",orden_compra_control.strPermisoBusqueda);
		jQuery("#trBusquedaorden_compra").css("display",orden_compra_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteorden_compra").css("display",orden_compra_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosorden_compra").attr("style",orden_compra_control.strPermisoMostrarTodos);		
		
		if(orden_compra_control.strPermisoNuevo!=null) {
			jQuery("#tdorden_compraNuevo").css("display",orden_compra_control.strPermisoNuevo);
			jQuery("#tdorden_compraNuevoToolBar").css("display",orden_compra_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdorden_compraDuplicar").css("display",orden_compra_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdorden_compraDuplicarToolBar").css("display",orden_compra_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdorden_compraNuevoGuardarCambios").css("display",orden_compra_control.strPermisoNuevo);
			jQuery("#tdorden_compraNuevoGuardarCambiosToolBar").css("display",orden_compra_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(orden_compra_control.strPermisoActualizar!=null) {
			jQuery("#tdorden_compraCopiar").css("display",orden_compra_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdorden_compraCopiarToolBar").css("display",orden_compra_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdorden_compraConEditar").css("display",orden_compra_control.strPermisoActualizar);
		}
		
		jQuery("#tdorden_compraGuardarCambios").css("display",orden_compra_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdorden_compraGuardarCambiosToolBar").css("display",orden_compra_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdorden_compraCerrarPagina").css("display",orden_compra_control.strPermisoPopup);		
		jQuery("#tdorden_compraCerrarPaginaToolBar").css("display",orden_compra_control.strPermisoPopup);
		//jQuery("#trorden_compraAccionesRelaciones").css("display",orden_compra_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=orden_compra_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + orden_compra_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + orden_compra_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Orden Compras";
		sTituloBanner+=" - " + orden_compra_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + orden_compra_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdorden_compraRelacionesToolBar").css("display",orden_compra_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosorden_compra").css("display",orden_compra_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		orden_compra_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		orden_compra_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		orden_compra_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		orden_compra_webcontrol1.registrarEventosControles();
		
		if(orden_compra_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(orden_compra_constante1.STR_ES_RELACIONADO=="false") {
			orden_compra_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(orden_compra_constante1.STR_ES_RELACIONES=="true") {
			if(orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
				orden_compra_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(orden_compra_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(orden_compra_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				orden_compra_webcontrol1.onLoad();
			
			//} else {
				//if(orden_compra_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			orden_compra_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("orden_compra","inventario","",orden_compra_funcion1,orden_compra_webcontrol1,orden_compra_constante1);	
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

var orden_compra_webcontrol1 = new orden_compra_webcontrol();

//Para ser llamado desde otro archivo (import)
export {orden_compra_webcontrol,orden_compra_webcontrol1};

//Para ser llamado desde window.opener
window.orden_compra_webcontrol1 = orden_compra_webcontrol1;


if(orden_compra_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = orden_compra_webcontrol1.onLoadWindow; 
}

//</script>