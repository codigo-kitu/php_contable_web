//<script type="text/javascript" language="javascript">



//var consignacionJQueryPaginaWebInteraccion= function (consignacion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {consignacion_constante,consignacion_constante1} from '../util/consignacion_constante.js';

import {consignacion_funcion,consignacion_funcion1} from '../util/consignacion_funcion.js';


class consignacion_webcontrol extends GeneralEntityWebControl {
	
	consignacion_control=null;
	consignacion_controlInicial=null;
	consignacion_controlAuxiliar=null;
		
	//if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(consignacion_control) {
		super();
		
		this.consignacion_control=consignacion_control;
	}
		
	actualizarVariablesPagina(consignacion_control) {
		
		if(consignacion_control.action=="index" || consignacion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(consignacion_control);
			
		} 
		
		
		else if(consignacion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(consignacion_control);
		
		} else if(consignacion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(consignacion_control);
		
		} else if(consignacion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(consignacion_control);
		
		} else if(consignacion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(consignacion_control);
			
		} else if(consignacion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(consignacion_control);
			
		} else if(consignacion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(consignacion_control);
		
		} else if(consignacion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(consignacion_control);		
		
		} else if(consignacion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(consignacion_control);
		
		} else if(consignacion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(consignacion_control);
		
		} else if(consignacion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(consignacion_control);
		
		} else if(consignacion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(consignacion_control);
		
		}  else if(consignacion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(consignacion_control);
		
		} else if(consignacion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(consignacion_control);
		
		} else if(consignacion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(consignacion_control);
		
		} else if(consignacion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(consignacion_control);
		
		} else if(consignacion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(consignacion_control);
		
		} else if(consignacion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(consignacion_control);
		
		} else if(consignacion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(consignacion_control);
		
		} else if(consignacion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(consignacion_control);
		
		} else if(consignacion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(consignacion_control);
		
		} else if(consignacion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(consignacion_control);		
		
		} else if(consignacion_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(consignacion_control);		
		
		} else if(consignacion_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(consignacion_control);		
		
		} else if(consignacion_control.action.includes("Busqueda") ||
				  consignacion_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(consignacion_control);
			
		} else if(consignacion_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(consignacion_control)
		}
		
		
		
	
		else if(consignacion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(consignacion_control);	
		
		} else if(consignacion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(consignacion_control);		
		}
	
		else if(consignacion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(consignacion_control);		
		}
	
		else if(consignacion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(consignacion_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + consignacion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(consignacion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(consignacion_control) {
		this.actualizarPaginaAccionesGenerales(consignacion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(consignacion_control) {
		
		this.actualizarPaginaCargaGeneral(consignacion_control);
		this.actualizarPaginaOrderBy(consignacion_control);
		this.actualizarPaginaTablaDatos(consignacion_control);
		this.actualizarPaginaCargaGeneralControles(consignacion_control);
		//this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(consignacion_control);
		this.actualizarPaginaAreaBusquedas(consignacion_control);
		this.actualizarPaginaCargaCombosFK(consignacion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(consignacion_control) {
		//this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(consignacion_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(consignacion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(consignacion_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(consignacion_control) {
		
		this.actualizarPaginaCargaGeneral(consignacion_control);
		this.actualizarPaginaTablaDatos(consignacion_control);
		this.actualizarPaginaCargaGeneralControles(consignacion_control);
		//this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(consignacion_control);
		this.actualizarPaginaAreaBusquedas(consignacion_control);
		this.actualizarPaginaCargaCombosFK(consignacion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		//this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		//this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		//this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		//this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		//this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		//this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(consignacion_control) {
		//this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(consignacion_control) {
		this.actualizarPaginaAbrirLink(consignacion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);				
		//this.actualizarPaginaFormulario(consignacion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);
		//this.actualizarPaginaFormulario(consignacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		//this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);
		//this.actualizarPaginaFormulario(consignacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(consignacion_control) {
		//this.actualizarPaginaFormulario(consignacion_control);
		this.onLoadCombosDefectoFK(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);
		//this.actualizarPaginaFormulario(consignacion_control);
		this.onLoadCombosDefectoFK(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		//this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(consignacion_control) {
		this.actualizarPaginaAbrirLink(consignacion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(consignacion_control) {
					//super.actualizarPaginaImprimir(consignacion_control,"consignacion");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",consignacion_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("consignacion_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(consignacion_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(consignacion_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(consignacion_control) {
		//super.actualizarPaginaImprimir(consignacion_control,"consignacion");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("consignacion_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(consignacion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",consignacion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(consignacion_control) {
		//super.actualizarPaginaImprimir(consignacion_control,"consignacion");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("consignacion_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(consignacion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",consignacion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(consignacion_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(consignacion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(consignacion_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(consignacion_control);
			
		this.actualizarPaginaAbrirLink(consignacion_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(consignacion_control) {
		this.actualizarPaginaTablaDatos(consignacion_control);
		this.actualizarPaginaFormulario(consignacion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(consignacion_control) {
		
		if(consignacion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(consignacion_control);
		}
		
		if(consignacion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(consignacion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(consignacion_control) {
		if(consignacion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("consignacionReturnGeneral",JSON.stringify(consignacion_control.consignacionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(consignacion_control) {
		if(consignacion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && consignacion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(consignacion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(consignacion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(consignacion_control, mostrar) {
		
		if(mostrar==true) {
			consignacion_funcion1.resaltarRestaurarDivsPagina(false,"consignacion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				consignacion_funcion1.resaltarRestaurarDivMantenimiento(false,"consignacion");
			}			
			
			consignacion_funcion1.mostrarDivMensaje(true,consignacion_control.strAuxiliarMensaje,consignacion_control.strAuxiliarCssMensaje);
		
		} else {
			consignacion_funcion1.mostrarDivMensaje(false,consignacion_control.strAuxiliarMensaje,consignacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(consignacion_control) {
		if(consignacion_funcion1.esPaginaForm(consignacion_constante1)==true) {
			window.opener.consignacion_webcontrol1.actualizarPaginaTablaDatos(consignacion_control);
		} else {
			this.actualizarPaginaTablaDatos(consignacion_control);
		}
	}
	
	actualizarPaginaAbrirLink(consignacion_control) {
		consignacion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(consignacion_control.strAuxiliarUrlPagina);
				
		consignacion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(consignacion_control.strAuxiliarTipo,consignacion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(consignacion_control) {
		consignacion_funcion1.resaltarRestaurarDivMensaje(true,consignacion_control.strAuxiliarMensajeAlert,consignacion_control.strAuxiliarCssMensaje);
			
		if(consignacion_funcion1.esPaginaForm(consignacion_constante1)==true) {
			window.opener.consignacion_funcion1.resaltarRestaurarDivMensaje(true,consignacion_control.strAuxiliarMensajeAlert,consignacion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(consignacion_control) {
		this.consignacion_controlInicial=consignacion_control;
			
		if(consignacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(consignacion_control.strStyleDivArbol,consignacion_control.strStyleDivContent
																,consignacion_control.strStyleDivOpcionesBanner,consignacion_control.strStyleDivExpandirColapsar
																,consignacion_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=consignacion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",consignacion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(consignacion_control) {
		this.actualizarCssBotonesPagina(consignacion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(consignacion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(consignacion_control.tiposReportes,consignacion_control.tiposReporte
															 	,consignacion_control.tiposPaginacion,consignacion_control.tiposAcciones
																,consignacion_control.tiposColumnasSelect,consignacion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(consignacion_control.tiposRelaciones,consignacion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(consignacion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(consignacion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(consignacion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(consignacion_control) {
	
		var indexPosition=consignacion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=consignacion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(consignacion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosempresasFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombossucursalsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosejerciciosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosperiodosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosusuariosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosclientesFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosvendedorsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombostermino_pago_clientesFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosmonedasFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosestadosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarComboskardexsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.cargarCombosasientosFK(consignacion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(consignacion_control.strRecargarFkTiposNinguno!=null && consignacion_control.strRecargarFkTiposNinguno!='NINGUNO' && consignacion_control.strRecargarFkTiposNinguno!='') {
			
				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosempresasFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombossucursalsFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosejerciciosFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosperiodosFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosusuariosFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosclientesFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosvendedorsFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombostermino_pago_clientesFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_moneda",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosmonedasFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosestadosFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarComboskardexsFK(consignacion_control);
				}

				if(consignacion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",consignacion_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_webcontrol1.cargarCombosasientosFK(consignacion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_cliente") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+consignacion_constante1.STR_SUFIJO+"-id_cliente" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.consignacionActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.consignacionActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.consignacionActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.usuariosFK);
	}

	cargarComboEditarTablaclienteFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.clientesFK);
	}

	cargarComboEditarTablavendedorFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablamonedaFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.monedasFK);
	}

	cargarComboEditarTablaestadoFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.estadosFK);
	}

	cargarComboEditarTablakardexFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.kardexsFK);
	}

	cargarComboEditarTablaasientoFK(consignacion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_funcion1,consignacion_control.asientosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(consignacion_control) {
		jQuery("#divBusquedaconsignacionAjaxWebPart").css("display",consignacion_control.strPermisoBusqueda);
		jQuery("#trconsignacionCabeceraBusquedas").css("display",consignacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaconsignacion").css("display",consignacion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(consignacion_control.htmlTablaOrderBy!=null
			&& consignacion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByconsignacionAjaxWebPart").html(consignacion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//consignacion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(consignacion_control.htmlTablaOrderByRel!=null
			&& consignacion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelconsignacionAjaxWebPart").html(consignacion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(consignacion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaconsignacionAjaxWebPart").css("display","none");
			jQuery("#trconsignacionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaconsignacion").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(consignacion_control) {
		
		if(!consignacion_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(consignacion_control);
		} else {
			jQuery("#divTablaDatosconsignacionsAjaxWebPart").html(consignacion_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosconsignacions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(consignacion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosconsignacions=jQuery("#tblTablaDatosconsignacions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("consignacion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',consignacion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			consignacion_webcontrol1.registrarControlesTableEdition(consignacion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		consignacion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(consignacion_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("consignacion_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(consignacion_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosconsignacionsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(consignacion_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(consignacion_control);
		
		const divOrderBy = document.getElementById("divOrderByconsignacionAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(consignacion_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelconsignacionAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(consignacion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(consignacion_control.consignacionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(consignacion_control);			
		}
	}
	
	actualizarCamposFilaTabla(consignacion_control) {
		var i=0;
		
		i=consignacion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(consignacion_control.consignacionActual.id);
		jQuery("#t-version_row_"+i+"").val(consignacion_control.consignacionActual.versionRow);
		
		if(consignacion_control.consignacionActual.id_empresa!=null && consignacion_control.consignacionActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != consignacion_control.consignacionActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(consignacion_control.consignacionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_sucursal!=null && consignacion_control.consignacionActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != consignacion_control.consignacionActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(consignacion_control.consignacionActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_ejercicio!=null && consignacion_control.consignacionActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != consignacion_control.consignacionActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(consignacion_control.consignacionActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_periodo!=null && consignacion_control.consignacionActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != consignacion_control.consignacionActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(consignacion_control.consignacionActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_usuario!=null && consignacion_control.consignacionActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != consignacion_control.consignacionActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(consignacion_control.consignacionActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(consignacion_control.consignacionActual.numero);
		
		if(consignacion_control.consignacionActual.id_cliente!=null && consignacion_control.consignacionActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != consignacion_control.consignacionActual.id_cliente) {
				jQuery("#t-cel_"+i+"_8").val(consignacion_control.consignacionActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(consignacion_control.consignacionActual.ruc);
		jQuery("#t-cel_"+i+"_10").val(consignacion_control.consignacionActual.referencia_cliente);
		jQuery("#t-cel_"+i+"_11").val(consignacion_control.consignacionActual.fecha_emision);
		
		if(consignacion_control.consignacionActual.id_vendedor!=null && consignacion_control.consignacionActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != consignacion_control.consignacionActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_12").val(consignacion_control.consignacionActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_termino_pago_cliente!=null && consignacion_control.consignacionActual.id_termino_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != consignacion_control.consignacionActual.id_termino_pago_cliente) {
				jQuery("#t-cel_"+i+"_13").val(consignacion_control.consignacionActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(consignacion_control.consignacionActual.fecha_vence);
		
		if(consignacion_control.consignacionActual.id_moneda!=null && consignacion_control.consignacionActual.id_moneda>-1){
			if(jQuery("#t-cel_"+i+"_15").val() != consignacion_control.consignacionActual.id_moneda) {
				jQuery("#t-cel_"+i+"_15").val(consignacion_control.consignacionActual.id_moneda).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_15").select2("val", null);
			if(jQuery("#t-cel_"+i+"_15").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_15").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_16").val(consignacion_control.consignacionActual.cotizacion);
		jQuery("#t-cel_"+i+"_17").val(consignacion_control.consignacionActual.direccion);
		jQuery("#t-cel_"+i+"_18").val(consignacion_control.consignacionActual.enviar_a);
		jQuery("#t-cel_"+i+"_19").val(consignacion_control.consignacionActual.observacion);
		jQuery("#t-cel_"+i+"_20").prop('checked',consignacion_control.consignacionActual.impuesto_en_precio);
		jQuery("#t-cel_"+i+"_21").prop('checked',consignacion_control.consignacionActual.genero_factura);
		
		if(consignacion_control.consignacionActual.id_estado!=null && consignacion_control.consignacionActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_22").val() != consignacion_control.consignacionActual.id_estado) {
				jQuery("#t-cel_"+i+"_22").val(consignacion_control.consignacionActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_22").select2("val", null);
			if(jQuery("#t-cel_"+i+"_22").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_22").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_23").val(consignacion_control.consignacionActual.sub_total);
		jQuery("#t-cel_"+i+"_24").val(consignacion_control.consignacionActual.descuento_monto);
		jQuery("#t-cel_"+i+"_25").val(consignacion_control.consignacionActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_26").val(consignacion_control.consignacionActual.iva_monto);
		jQuery("#t-cel_"+i+"_27").val(consignacion_control.consignacionActual.iva_porciento);
		jQuery("#t-cel_"+i+"_28").val(consignacion_control.consignacionActual.retencion_fuente_monto);
		jQuery("#t-cel_"+i+"_29").val(consignacion_control.consignacionActual.retencion_fuente_porciento);
		jQuery("#t-cel_"+i+"_30").val(consignacion_control.consignacionActual.retencion_iva_monto);
		jQuery("#t-cel_"+i+"_31").val(consignacion_control.consignacionActual.retencion_iva_porciento);
		jQuery("#t-cel_"+i+"_32").val(consignacion_control.consignacionActual.total);
		jQuery("#t-cel_"+i+"_33").val(consignacion_control.consignacionActual.otro_monto);
		jQuery("#t-cel_"+i+"_34").val(consignacion_control.consignacionActual.otro_porciento);
		jQuery("#t-cel_"+i+"_35").val(consignacion_control.consignacionActual.retencion_ica_porciento);
		jQuery("#t-cel_"+i+"_36").val(consignacion_control.consignacionActual.retencion_ica_monto);
		
		if(consignacion_control.consignacionActual.id_kardex!=null && consignacion_control.consignacionActual.id_kardex>-1){
			if(jQuery("#t-cel_"+i+"_37").val() != consignacion_control.consignacionActual.id_kardex) {
				jQuery("#t-cel_"+i+"_37").val(consignacion_control.consignacionActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_37").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_37").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_control.consignacionActual.id_asiento!=null && consignacion_control.consignacionActual.id_asiento>-1){
			if(jQuery("#t-cel_"+i+"_38").val() != consignacion_control.consignacionActual.id_asiento) {
				jQuery("#t-cel_"+i+"_38").val(consignacion_control.consignacionActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_38").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_38").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(consignacion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionimagen_consignacion").click(function(){
		jQuery("#tblTablaDatosconsignacions").on("click",".imgrelacionimagen_consignacion", function () {

			var idActual=jQuery(this).attr("idactualconsignacion");

			consignacion_webcontrol1.registrarSesionParaimagen_consignaciones(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionconsignacion_detalle").click(function(){
		jQuery("#tblTablaDatosconsignacions").on("click",".imgrelacionconsignacion_detalle", function () {

			var idActual=jQuery(this).attr("idactualconsignacion");

			consignacion_webcontrol1.registrarSesionParaconsignacion_detalles(idActual);
		});				
	}
		
	

	registrarSesionParaimagen_consignaciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"consignacion","imagen_consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1,"es","");
	}

	registrarSesionParaconsignacion_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"consignacion","consignacion_detalle","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1,"s","");
	}
	
	registrarControlesTableEdition(consignacion_control) {
		consignacion_funcion1.registrarControlesTableValidacionEdition(consignacion_control,consignacion_webcontrol1,consignacion_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(consignacion_control) {
		jQuery("#divResumenconsignacionActualAjaxWebPart").html(consignacion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(consignacion_control) {
		//jQuery("#divAccionesRelacionesconsignacionAjaxWebPart").html(consignacion_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("consignacion_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(consignacion_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesconsignacionAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		consignacion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(consignacion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(consignacion_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(consignacion_control) {
		
		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",consignacion_control.strVisibleFK_Idasiento);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",consignacion_control.strVisibleFK_Idasiento);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",consignacion_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",consignacion_control.strVisibleFK_Idcliente);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",consignacion_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",consignacion_control.strVisibleFK_Idejercicio);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",consignacion_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",consignacion_control.strVisibleFK_Idempresa);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idestado").attr("style",consignacion_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idestado").attr("style",consignacion_control.strVisibleFK_Idestado);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",consignacion_control.strVisibleFK_Idkardex);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",consignacion_control.strVisibleFK_Idkardex);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",consignacion_control.strVisibleFK_Idmoneda);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",consignacion_control.strVisibleFK_Idmoneda);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",consignacion_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",consignacion_control.strVisibleFK_Idperiodo);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",consignacion_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",consignacion_control.strVisibleFK_Idsucursal);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",consignacion_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",consignacion_control.strVisibleFK_Idtermino_pago);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",consignacion_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",consignacion_control.strVisibleFK_Idusuario);
		}

		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",consignacion_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",consignacion_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionconsignacion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("consignacion",id,"estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","empresa","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","sucursal","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","ejercicio","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","periodo","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","usuario","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","cliente","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","vendedor","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","termino_pago_cliente","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParamoneda(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","moneda","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","estado","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParakardex(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","kardex","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}

	abrirBusquedaParaasiento(strNombreCampoBusqueda){//idActual
		consignacion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion","asiento","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionimagen_consignacion").click(function(){

			var idActual=jQuery(this).attr("idactualconsignacion");

			consignacion_webcontrol1.registrarSesionParaimagen_consignaciones(idActual);
		});
		jQuery("#imgdivrelacionconsignacion_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualconsignacion");

			consignacion_webcontrol1.registrarSesionParaconsignacion_detalles(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacionConstante,strParametros);
		
		//consignacion_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa",consignacion_control.empresasFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_2",consignacion_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal",consignacion_control.sucursalsFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_3",consignacion_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio",consignacion_control.ejerciciosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_4",consignacion_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo",consignacion_control.periodosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_5",consignacion_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario",consignacion_control.usuariosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_6",consignacion_control.usuariosFK);
		}
	};

	cargarCombosclientesFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente",consignacion_control.clientesFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_8",consignacion_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",consignacion_control.clientesFK);

	};

	cargarCombosvendedorsFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor",consignacion_control.vendedorsFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_12",consignacion_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",consignacion_control.vendedorsFK);

	};

	cargarCombostermino_pago_clientesFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente",consignacion_control.termino_pago_clientesFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_13",consignacion_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",consignacion_control.termino_pago_clientesFK);

	};

	cargarCombosmonedasFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_moneda",consignacion_control.monedasFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_15",consignacion_control.monedasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda",consignacion_control.monedasFK);

	};

	cargarCombosestadosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado",consignacion_control.estadosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_22",consignacion_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",consignacion_control.estadosFK);

	};

	cargarComboskardexsFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex",consignacion_control.kardexsFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_37",consignacion_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",consignacion_control.kardexsFK);

	};

	cargarCombosasientosFK(consignacion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento",consignacion_control.asientosFK);

		if(consignacion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_control.idFilaTablaActual+"_38",consignacion_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",consignacion_control.asientosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(consignacion_control) {

	};

	registrarComboActionChangeCombossucursalsFK(consignacion_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(consignacion_control) {

	};

	registrarComboActionChangeCombosperiodosFK(consignacion_control) {

	};

	registrarComboActionChangeCombosusuariosFK(consignacion_control) {

	};

	registrarComboActionChangeCombosclientesFK(consignacion_control) {
		this.registrarComboActionChangeid_cliente("form"+consignacion_constante1.STR_SUFIJO+"-id_cliente",false,0);


		this.registrarComboActionChangeid_cliente(""+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(consignacion_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(consignacion_control) {

	};

	registrarComboActionChangeCombosmonedasFK(consignacion_control) {

	};

	registrarComboActionChangeCombosestadosFK(consignacion_control) {

	};

	registrarComboActionChangeComboskardexsFK(consignacion_control) {

	};

	registrarComboActionChangeCombosasientosFK(consignacion_control) {

	};

	
	
	setDefectoValorCombosempresasFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idempresaDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").val() != consignacion_control.idempresaDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa").val(consignacion_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idsucursalDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").val() != consignacion_control.idsucursalDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal").val(consignacion_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idejercicioDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").val() != consignacion_control.idejercicioDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio").val(consignacion_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idperiodoDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").val() != consignacion_control.idperiodoDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo").val(consignacion_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idusuarioDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").val() != consignacion_control.idusuarioDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario").val(consignacion_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idclienteDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").val() != consignacion_control.idclienteDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente").val(consignacion_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(consignacion_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idvendedorDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").val() != consignacion_control.idvendedorDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor").val(consignacion_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(consignacion_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != consignacion_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(consignacion_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(consignacion_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmonedasFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idmonedaDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_moneda").val() != consignacion_control.idmonedaDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_moneda").val(consignacion_control.idmonedaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(consignacion_control.idmonedaDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idestadoDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").val() != consignacion_control.idestadoDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado").val(consignacion_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(consignacion_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardexsFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idkardexDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex").val() != consignacion_control.idkardexDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex").val(consignacion_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(consignacion_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(consignacion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_control.idasientoDefaultFK>-1 && jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento").val() != consignacion_control.idasientoDefaultFK) {
				jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento").val(consignacion_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(consignacion_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_cliente(id_cliente,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("consignacion","estimados","","id_cliente",id_cliente,"NINGUNO","",paraEventoTabla,idFilaTabla,consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	







		jQuery("#form-id_moneda").prop("disabled", habilitarDeshabilitar);
		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);



	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
			
							imagen_consignacion_webcontrol1.onLoadWindow();
							consignacion_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
			
		imagen_consignacion_webcontrol1.onLoadRecargarRelacionado();
		consignacion_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//consignacion_control
		
	
	}
	
	onLoadCombosDefectoFK(consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosempresasFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombossucursalsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosejerciciosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosperiodosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosusuariosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosclientesFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosvendedorsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosmonedasFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosestadosFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorComboskardexsFK(consignacion_control);
			}

			if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",consignacion_control.strRecargarFkTipos,",")) { 
				consignacion_webcontrol1.setDefectoValorCombosasientosFK(consignacion_control);
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
	onLoadCombosEventosFK(consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosempresasFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombossucursalsFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosejerciciosFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosperiodosFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosusuariosFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosclientesFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosvendedorsFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosmonedasFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosestadosFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeComboskardexsFK(consignacion_control);
			//}

			//if(consignacion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",consignacion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_webcontrol1.registrarComboActionChangeCombosasientosFK(consignacion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(consignacion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(consignacion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(consignacion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idasiento","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idcliente","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idejercicio","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idempresa","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idestado","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idkardex","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idmoneda","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idperiodo","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idsucursal","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idtermino_pago","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idusuario","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion","FK_Idvendedor","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
		
			
			if(consignacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("consignacion");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("consignacion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(consignacion_funcion1,consignacion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(consignacion_funcion1,consignacion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(consignacion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,"consignacion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("moneda","id_moneda","contabilidad","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_moneda_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParamoneda("id_moneda");
				//alert(jQuery('#form-id_moneda_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				consignacion_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("consignacion");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(consignacion_control) {
		
		jQuery("#divBusquedaconsignacionAjaxWebPart").css("display",consignacion_control.strPermisoBusqueda);
		jQuery("#trconsignacionCabeceraBusquedas").css("display",consignacion_control.strPermisoBusqueda);
		jQuery("#trBusquedaconsignacion").css("display",consignacion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteconsignacion").css("display",consignacion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosconsignacion").attr("style",consignacion_control.strPermisoMostrarTodos);		
		
		if(consignacion_control.strPermisoNuevo!=null) {
			jQuery("#tdconsignacionNuevo").css("display",consignacion_control.strPermisoNuevo);
			jQuery("#tdconsignacionNuevoToolBar").css("display",consignacion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdconsignacionDuplicar").css("display",consignacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdconsignacionDuplicarToolBar").css("display",consignacion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdconsignacionNuevoGuardarCambios").css("display",consignacion_control.strPermisoNuevo);
			jQuery("#tdconsignacionNuevoGuardarCambiosToolBar").css("display",consignacion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(consignacion_control.strPermisoActualizar!=null) {
			jQuery("#tdconsignacionCopiar").css("display",consignacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdconsignacionCopiarToolBar").css("display",consignacion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdconsignacionConEditar").css("display",consignacion_control.strPermisoActualizar);
		}
		
		jQuery("#tdconsignacionGuardarCambios").css("display",consignacion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdconsignacionGuardarCambiosToolBar").css("display",consignacion_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdconsignacionCerrarPagina").css("display",consignacion_control.strPermisoPopup);		
		jQuery("#tdconsignacionCerrarPaginaToolBar").css("display",consignacion_control.strPermisoPopup);
		//jQuery("#trconsignacionAccionesRelaciones").css("display",consignacion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=consignacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + consignacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + consignacion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Consignaciones";
		sTituloBanner+=" - " + consignacion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + consignacion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdconsignacionRelacionesToolBar").css("display",consignacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosconsignacion").css("display",consignacion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		consignacion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		consignacion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		consignacion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		consignacion_webcontrol1.registrarEventosControles();
		
		if(consignacion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(consignacion_constante1.STR_ES_RELACIONADO=="false") {
			consignacion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(consignacion_constante1.STR_ES_RELACIONES=="true") {
			if(consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
				consignacion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(consignacion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(consignacion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				consignacion_webcontrol1.onLoad();
			
			//} else {
				//if(consignacion_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			consignacion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("consignacion","estimados","",consignacion_funcion1,consignacion_webcontrol1,consignacion_constante1);	
	}
}

var consignacion_webcontrol1 = new consignacion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {consignacion_webcontrol,consignacion_webcontrol1};

//Para ser llamado desde window.opener
window.consignacion_webcontrol1 = consignacion_webcontrol1;


if(consignacion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = consignacion_webcontrol1.onLoadWindow; 
}

//</script>