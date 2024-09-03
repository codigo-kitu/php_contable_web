//<script type="text/javascript" language="javascript">



//var asientoJQueryPaginaWebInteraccion= function (asiento_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {asiento_constante,asiento_constante1} from '../util/asiento_constante.js';

import {asiento_funcion,asiento_funcion1} from '../util/asiento_funcion.js';


class asiento_webcontrol extends GeneralEntityWebControl {
	
	asiento_control=null;
	asiento_controlInicial=null;
	asiento_controlAuxiliar=null;
		
	//if(asiento_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(asiento_control) {
		super();
		
		this.asiento_control=asiento_control;
	}
		
	actualizarVariablesPagina(asiento_control) {
		
		if(asiento_control.action=="index" || asiento_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(asiento_control);
			
		} 
		
		
		else if(asiento_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_control);
		
		} else if(asiento_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(asiento_control);
		
		} else if(asiento_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_control);
		
		} else if(asiento_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(asiento_control);
			
		} else if(asiento_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(asiento_control);
			
		} else if(asiento_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_control);
		
		} else if(asiento_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_control);		
		
		} else if(asiento_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(asiento_control);
		
		} else if(asiento_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(asiento_control);
		
		} else if(asiento_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(asiento_control);
		
		} else if(asiento_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(asiento_control);
		
		}  else if(asiento_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_control);
		
		} else if(asiento_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_control);
		
		} else if(asiento_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(asiento_control);
		
		} else if(asiento_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_control);
		
		} else if(asiento_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(asiento_control);
		
		} else if(asiento_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_control);
		
		} else if(asiento_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_control);
		
		} else if(asiento_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(asiento_control);
		
		} else if(asiento_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_control);
		
		} else if(asiento_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_control);		
		
		} else if(asiento_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(asiento_control);		
		
		} else if(asiento_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(asiento_control);		
		
		} else if(asiento_control.action.includes("Busqueda") ||
				  asiento_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(asiento_control);
			
		} else if(asiento_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(asiento_control)
		}
		
		
		
	
		else if(asiento_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(asiento_control);	
		
		} else if(asiento_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_control);		
		}
	
		else if(asiento_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_control);		
		}
	
		else if(asiento_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(asiento_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + asiento_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(asiento_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(asiento_control) {
		this.actualizarPaginaAccionesGenerales(asiento_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(asiento_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_control);
		this.actualizarPaginaOrderBy(asiento_control);
		this.actualizarPaginaTablaDatos(asiento_control);
		this.actualizarPaginaCargaGeneralControles(asiento_control);
		//this.actualizarPaginaFormulario(asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_control);
		this.actualizarPaginaAreaBusquedas(asiento_control);
		this.actualizarPaginaCargaCombosFK(asiento_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(asiento_control) {
		//this.actualizarPaginaFormulario(asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(asiento_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_control);
		this.actualizarPaginaTablaDatos(asiento_control);
		this.actualizarPaginaCargaGeneralControles(asiento_control);
		//this.actualizarPaginaFormulario(asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_control);
		this.actualizarPaginaAreaBusquedas(asiento_control);
		this.actualizarPaginaCargaCombosFK(asiento_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);		
		//this.actualizarPaginaFormulario(asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);		
		//this.actualizarPaginaFormulario(asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);		
		//this.actualizarPaginaFormulario(asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(asiento_control) {
		//this.actualizarPaginaFormulario(asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_control) {
		this.actualizarPaginaAbrirLink(asiento_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);				
		//this.actualizarPaginaFormulario(asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);
		//this.actualizarPaginaFormulario(asiento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);
		//this.actualizarPaginaFormulario(asiento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(asiento_control) {
		//this.actualizarPaginaFormulario(asiento_control);
		this.onLoadCombosDefectoFK(asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);
		//this.actualizarPaginaFormulario(asiento_control);
		this.onLoadCombosDefectoFK(asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_control) {
		this.actualizarPaginaAbrirLink(asiento_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_control) {
					//super.actualizarPaginaImprimir(asiento_control,"asiento");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",asiento_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("asiento_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(asiento_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(asiento_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_control) {
		//super.actualizarPaginaImprimir(asiento_control,"asiento");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("asiento_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(asiento_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",asiento_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(asiento_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(asiento_control) {
		//super.actualizarPaginaImprimir(asiento_control,"asiento");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("asiento_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(asiento_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",asiento_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(asiento_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(asiento_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(asiento_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(asiento_control);
			
		this.actualizarPaginaAbrirLink(asiento_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(asiento_control) {
		this.actualizarPaginaTablaDatos(asiento_control);
		this.actualizarPaginaFormulario(asiento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(asiento_control) {
		
		if(asiento_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(asiento_control);
		}
		
		if(asiento_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(asiento_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(asiento_control) {
		if(asiento_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("asientoReturnGeneral",JSON.stringify(asiento_control.asientoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(asiento_control) {
		if(asiento_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(asiento_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(asiento_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(asiento_control, mostrar) {
		
		if(mostrar==true) {
			asiento_funcion1.resaltarRestaurarDivsPagina(false,"asiento");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				asiento_funcion1.resaltarRestaurarDivMantenimiento(false,"asiento");
			}			
			
			asiento_funcion1.mostrarDivMensaje(true,asiento_control.strAuxiliarMensaje,asiento_control.strAuxiliarCssMensaje);
		
		} else {
			asiento_funcion1.mostrarDivMensaje(false,asiento_control.strAuxiliarMensaje,asiento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(asiento_control) {
		if(asiento_funcion1.esPaginaForm(asiento_constante1)==true) {
			window.opener.asiento_webcontrol1.actualizarPaginaTablaDatos(asiento_control);
		} else {
			this.actualizarPaginaTablaDatos(asiento_control);
		}
	}
	
	actualizarPaginaAbrirLink(asiento_control) {
		asiento_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(asiento_control.strAuxiliarUrlPagina);
				
		asiento_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(asiento_control.strAuxiliarTipo,asiento_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(asiento_control) {
		asiento_funcion1.resaltarRestaurarDivMensaje(true,asiento_control.strAuxiliarMensajeAlert,asiento_control.strAuxiliarCssMensaje);
			
		if(asiento_funcion1.esPaginaForm(asiento_constante1)==true) {
			window.opener.asiento_funcion1.resaltarRestaurarDivMensaje(true,asiento_control.strAuxiliarMensajeAlert,asiento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(asiento_control) {
		this.asiento_controlInicial=asiento_control;
			
		if(asiento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(asiento_control.strStyleDivArbol,asiento_control.strStyleDivContent
																,asiento_control.strStyleDivOpcionesBanner,asiento_control.strStyleDivExpandirColapsar
																,asiento_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=asiento_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",asiento_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(asiento_control) {
		this.actualizarCssBotonesPagina(asiento_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(asiento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(asiento_control.tiposReportes,asiento_control.tiposReporte
															 	,asiento_control.tiposPaginacion,asiento_control.tiposAcciones
																,asiento_control.tiposColumnasSelect,asiento_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(asiento_control.tiposRelaciones,asiento_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(asiento_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(asiento_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(asiento_control);			
	}
	
	actualizarPaginaUsuarioInvitado(asiento_control) {
	
		var indexPosition=asiento_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=asiento_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(asiento_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.cargarCombosempresasFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.cargarCombossucursalsFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.cargarCombosejerciciosFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.cargarCombosperiodosFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.cargarCombosusuariosFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_predefinido",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.cargarCombosasiento_predefinidosFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.cargarCombosdocumento_contablesFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.cargarComboslibro_auxiliarsFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.cargarCombosfuentesFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.cargarComboscentro_costosFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.cargarCombosestadosFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable_origen",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.cargarCombosdocumento_contable_origensFK(asiento_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(asiento_control.strRecargarFkTiposNinguno!=null && asiento_control.strRecargarFkTiposNinguno!='NINGUNO' && asiento_control.strRecargarFkTiposNinguno!='') {
			
				if(asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",asiento_control.strRecargarFkTiposNinguno,",")) { 
					asiento_webcontrol1.cargarCombosempresasFK(asiento_control);
				}

				if(asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",asiento_control.strRecargarFkTiposNinguno,",")) { 
					asiento_webcontrol1.cargarCombossucursalsFK(asiento_control);
				}

				if(asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_control.strRecargarFkTiposNinguno,",")) { 
					asiento_webcontrol1.cargarCombosejerciciosFK(asiento_control);
				}

				if(asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",asiento_control.strRecargarFkTiposNinguno,",")) { 
					asiento_webcontrol1.cargarCombosperiodosFK(asiento_control);
				}

				if(asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",asiento_control.strRecargarFkTiposNinguno,",")) { 
					asiento_webcontrol1.cargarCombosusuariosFK(asiento_control);
				}

				if(asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento_predefinido",asiento_control.strRecargarFkTiposNinguno,",")) { 
					asiento_webcontrol1.cargarCombosasiento_predefinidosFK(asiento_control);
				}

				if(asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_control.strRecargarFkTiposNinguno,",")) { 
					asiento_webcontrol1.cargarCombosdocumento_contablesFK(asiento_control);
				}

				if(asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_control.strRecargarFkTiposNinguno,",")) { 
					asiento_webcontrol1.cargarComboslibro_auxiliarsFK(asiento_control);
				}

				if(asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_fuente",asiento_control.strRecargarFkTiposNinguno,",")) { 
					asiento_webcontrol1.cargarCombosfuentesFK(asiento_control);
				}

				if(asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_control.strRecargarFkTiposNinguno,",")) { 
					asiento_webcontrol1.cargarComboscentro_costosFK(asiento_control);
				}

				if(asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",asiento_control.strRecargarFkTiposNinguno,",")) { 
					asiento_webcontrol1.cargarCombosestadosFK(asiento_control);
				}

				if(asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_contable_origen",asiento_control.strRecargarFkTiposNinguno,",")) { 
					asiento_webcontrol1.cargarCombosdocumento_contable_origensFK(asiento_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_funcion1,asiento_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_funcion1,asiento_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_funcion1,asiento_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_funcion1,asiento_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_funcion1,asiento_control.usuariosFK);
	}

	cargarComboEditarTablaasiento_predefinidoFK(asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_funcion1,asiento_control.asiento_predefinidosFK);
	}

	cargarComboEditarTabladocumento_contableFK(asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_funcion1,asiento_control.documento_contablesFK);
	}

	cargarComboEditarTablalibro_auxiliarFK(asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_funcion1,asiento_control.libro_auxiliarsFK);
	}

	cargarComboEditarTablafuenteFK(asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_funcion1,asiento_control.fuentesFK);
	}

	cargarComboEditarTablacentro_costoFK(asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_funcion1,asiento_control.centro_costosFK);
	}

	cargarComboEditarTablaestadoFK(asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_funcion1,asiento_control.estadosFK);
	}

	cargarComboEditarTabladocumento_contable_origenFK(asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_funcion1,asiento_control.documento_contable_origensFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(asiento_control) {
		jQuery("#divBusquedaasientoAjaxWebPart").css("display",asiento_control.strPermisoBusqueda);
		jQuery("#trasientoCabeceraBusquedas").css("display",asiento_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento").css("display",asiento_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(asiento_control.htmlTablaOrderBy!=null
			&& asiento_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByasientoAjaxWebPart").html(asiento_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//asiento_webcontrol1.registrarOrderByActions();
			
		}
			
		if(asiento_control.htmlTablaOrderByRel!=null
			&& asiento_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelasientoAjaxWebPart").html(asiento_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(asiento_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaasientoAjaxWebPart").css("display","none");
			jQuery("#trasientoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaasiento").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(asiento_control) {
		
		if(!asiento_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(asiento_control);
		} else {
			jQuery("#divTablaDatosasientosAjaxWebPart").html(asiento_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosasientos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(asiento_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosasientos=jQuery("#tblTablaDatosasientos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("asiento",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',asiento_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			asiento_webcontrol1.registrarControlesTableEdition(asiento_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		asiento_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(asiento_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("asiento_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(asiento_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosasientosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(asiento_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(asiento_control);
		
		const divOrderBy = document.getElementById("divOrderByasientoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(asiento_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelasientoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(asiento_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(asiento_control.asientoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(asiento_control);			
		}
	}
	
	actualizarCamposFilaTabla(asiento_control) {
		var i=0;
		
		i=asiento_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(asiento_control.asientoActual.id);
		jQuery("#t-version_row_"+i+"").val(asiento_control.asientoActual.versionRow);
		
		if(asiento_control.asientoActual.id_empresa!=null && asiento_control.asientoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != asiento_control.asientoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(asiento_control.asientoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_control.asientoActual.id_sucursal!=null && asiento_control.asientoActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != asiento_control.asientoActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(asiento_control.asientoActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_control.asientoActual.id_ejercicio!=null && asiento_control.asientoActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != asiento_control.asientoActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(asiento_control.asientoActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_control.asientoActual.id_periodo!=null && asiento_control.asientoActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != asiento_control.asientoActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(asiento_control.asientoActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_control.asientoActual.id_usuario!=null && asiento_control.asientoActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != asiento_control.asientoActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(asiento_control.asientoActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(asiento_control.asientoActual.numero);
		jQuery("#t-cel_"+i+"_8").val(asiento_control.asientoActual.fecha);
		
		if(asiento_control.asientoActual.id_asiento_predefinido!=null && asiento_control.asientoActual.id_asiento_predefinido>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != asiento_control.asientoActual.id_asiento_predefinido) {
				jQuery("#t-cel_"+i+"_9").val(asiento_control.asientoActual.id_asiento_predefinido).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_9").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_control.asientoActual.id_documento_contable!=null && asiento_control.asientoActual.id_documento_contable>-1){
			if(jQuery("#t-cel_"+i+"_10").val() != asiento_control.asientoActual.id_documento_contable) {
				jQuery("#t-cel_"+i+"_10").val(asiento_control.asientoActual.id_documento_contable).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_10").select2("val", null);
			if(jQuery("#t-cel_"+i+"_10").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_10").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_control.asientoActual.id_libro_auxiliar!=null && asiento_control.asientoActual.id_libro_auxiliar>-1){
			if(jQuery("#t-cel_"+i+"_11").val() != asiento_control.asientoActual.id_libro_auxiliar) {
				jQuery("#t-cel_"+i+"_11").val(asiento_control.asientoActual.id_libro_auxiliar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_11").select2("val", null);
			if(jQuery("#t-cel_"+i+"_11").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_11").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_control.asientoActual.id_fuente!=null && asiento_control.asientoActual.id_fuente>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != asiento_control.asientoActual.id_fuente) {
				jQuery("#t-cel_"+i+"_12").val(asiento_control.asientoActual.id_fuente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_control.asientoActual.id_centro_costo!=null && asiento_control.asientoActual.id_centro_costo>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != asiento_control.asientoActual.id_centro_costo) {
				jQuery("#t-cel_"+i+"_13").val(asiento_control.asientoActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(asiento_control.asientoActual.descripcion);
		jQuery("#t-cel_"+i+"_15").val(asiento_control.asientoActual.total_debito);
		jQuery("#t-cel_"+i+"_16").val(asiento_control.asientoActual.total_credito);
		jQuery("#t-cel_"+i+"_17").val(asiento_control.asientoActual.diferencia);
		
		if(asiento_control.asientoActual.id_estado!=null && asiento_control.asientoActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_18").val() != asiento_control.asientoActual.id_estado) {
				jQuery("#t-cel_"+i+"_18").val(asiento_control.asientoActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_18").select2("val", null);
			if(jQuery("#t-cel_"+i+"_18").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_18").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_control.asientoActual.id_documento_contable_origen!=null && asiento_control.asientoActual.id_documento_contable_origen>-1){
			if(jQuery("#t-cel_"+i+"_19").val() != asiento_control.asientoActual.id_documento_contable_origen) {
				jQuery("#t-cel_"+i+"_19").val(asiento_control.asientoActual.id_documento_contable_origen).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_19").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_19").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_20").val(asiento_control.asientoActual.valor);
		jQuery("#t-cel_"+i+"_21").val(asiento_control.asientoActual.nro_nit);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(asiento_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_detalle").click(function(){
		jQuery("#tblTablaDatosasientos").on("click",".imgrelacionasiento_detalle", function () {

			var idActual=jQuery(this).attr("idactualasiento");

			asiento_webcontrol1.registrarSesionParaasiento_detallees(idActual);
		});				
	}
		
	

	registrarSesionParaasiento_detallees(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"asiento","asiento_detalle","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1,"es","");
	}
	
	registrarControlesTableEdition(asiento_control) {
		asiento_funcion1.registrarControlesTableValidacionEdition(asiento_control,asiento_webcontrol1,asiento_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(asiento_control) {
		jQuery("#divResumenasientoActualAjaxWebPart").html(asiento_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_control) {
		//jQuery("#divAccionesRelacionesasientoAjaxWebPart").html(asiento_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("asiento_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(asiento_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesasientoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		asiento_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(asiento_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(asiento_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(asiento_control) {
		
		if(asiento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idasiento_predefinido").attr("style",asiento_control.strVisibleFK_Idasiento_predefinido);
			jQuery("#tblstrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idasiento_predefinido").attr("style",asiento_control.strVisibleFK_Idasiento_predefinido);
		}

		if(asiento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_control.strVisibleFK_Idcentro_costo);
			jQuery("#tblstrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_control.strVisibleFK_Idcentro_costo);
		}

		if(asiento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_constante1.STR_SUFIJO+"FK_Iddocumento_contable").attr("style",asiento_control.strVisibleFK_Iddocumento_contable);
			jQuery("#tblstrVisible"+asiento_constante1.STR_SUFIJO+"FK_Iddocumento_contable").attr("style",asiento_control.strVisibleFK_Iddocumento_contable);
		}

		if(asiento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_constante1.STR_SUFIJO+"FK_Iddocumento_contable_origen").attr("style",asiento_control.strVisibleFK_Iddocumento_contable_origen);
			jQuery("#tblstrVisible"+asiento_constante1.STR_SUFIJO+"FK_Iddocumento_contable_origen").attr("style",asiento_control.strVisibleFK_Iddocumento_contable_origen);
		}

		if(asiento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",asiento_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",asiento_control.strVisibleFK_Idejercicio);
		}

		if(asiento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_control.strVisibleFK_Idempresa);
		}

		if(asiento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idestado").attr("style",asiento_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idestado").attr("style",asiento_control.strVisibleFK_Idestado);
		}

		if(asiento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idfuente").attr("style",asiento_control.strVisibleFK_Idfuente);
			jQuery("#tblstrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idfuente").attr("style",asiento_control.strVisibleFK_Idfuente);
		}

		if(asiento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar").attr("style",asiento_control.strVisibleFK_Idlibro_auxiliar);
			jQuery("#tblstrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar").attr("style",asiento_control.strVisibleFK_Idlibro_auxiliar);
		}

		if(asiento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",asiento_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",asiento_control.strVisibleFK_Idperiodo);
		}

		if(asiento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",asiento_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",asiento_control.strVisibleFK_Idsucursal);
		}

		if(asiento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",asiento_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+asiento_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",asiento_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionasiento();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("asiento",id,"contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		asiento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento","empresa","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		asiento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento","sucursal","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		asiento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento","ejercicio","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		asiento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento","periodo","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		asiento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento","usuario","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
	}

	abrirBusquedaParaasiento_predefinido(strNombreCampoBusqueda){//idActual
		asiento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento","asiento_predefinido","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
	}

	abrirBusquedaParadocumento_contable(strNombreCampoBusqueda){//idActual
		asiento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento","documento_contable","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
	}

	abrirBusquedaParalibro_auxiliar(strNombreCampoBusqueda){//idActual
		asiento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento","libro_auxiliar","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
	}

	abrirBusquedaParafuente(strNombreCampoBusqueda){//idActual
		asiento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento","fuente","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
	}

	abrirBusquedaParacentro_costo(strNombreCampoBusqueda){//idActual
		asiento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento","centro_costo","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		asiento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento","estado","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
	}

	abrirBusquedaParadocumento_contable(strNombreCampoBusqueda){//idActual
		asiento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento","documento_contable","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionasiento_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualasiento");

			asiento_webcontrol1.registrarSesionParaasiento_detallees(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1,asientoConstante,strParametros);
		
		//asiento_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_constante1.STR_SUFIJO+"-id_empresa",asiento_control.empresasFK);

		if(asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_control.idFilaTablaActual+"_2",asiento_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_constante1.STR_SUFIJO+"-id_sucursal",asiento_control.sucursalsFK);

		if(asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_control.idFilaTablaActual+"_3",asiento_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_constante1.STR_SUFIJO+"-id_ejercicio",asiento_control.ejerciciosFK);

		if(asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_control.idFilaTablaActual+"_4",asiento_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_constante1.STR_SUFIJO+"-id_periodo",asiento_control.periodosFK);

		if(asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_control.idFilaTablaActual+"_5",asiento_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_constante1.STR_SUFIJO+"-id_usuario",asiento_control.usuariosFK);

		if(asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_control.idFilaTablaActual+"_6",asiento_control.usuariosFK);
		}
	};

	cargarCombosasiento_predefinidosFK(asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_constante1.STR_SUFIJO+"-id_asiento_predefinido",asiento_control.asiento_predefinidosFK);

		if(asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_control.idFilaTablaActual+"_9",asiento_control.asiento_predefinidosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_constante1.STR_SUFIJO+"FK_Idasiento_predefinido-cmbid_asiento_predefinido",asiento_control.asiento_predefinidosFK);

	};

	cargarCombosdocumento_contablesFK(asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_constante1.STR_SUFIJO+"-id_documento_contable",asiento_control.documento_contablesFK);

		if(asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_control.idFilaTablaActual+"_10",asiento_control.documento_contablesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable",asiento_control.documento_contablesFK);

	};

	cargarComboslibro_auxiliarsFK(asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_constante1.STR_SUFIJO+"-id_libro_auxiliar",asiento_control.libro_auxiliarsFK);

		if(asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_control.idFilaTablaActual+"_11",asiento_control.libro_auxiliarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar",asiento_control.libro_auxiliarsFK);

	};

	cargarCombosfuentesFK(asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_constante1.STR_SUFIJO+"-id_fuente",asiento_control.fuentesFK);

		if(asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_control.idFilaTablaActual+"_12",asiento_control.fuentesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente",asiento_control.fuentesFK);

	};

	cargarComboscentro_costosFK(asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_constante1.STR_SUFIJO+"-id_centro_costo",asiento_control.centro_costosFK);

		if(asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_control.idFilaTablaActual+"_13",asiento_control.centro_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo",asiento_control.centro_costosFK);

	};

	cargarCombosestadosFK(asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_constante1.STR_SUFIJO+"-id_estado",asiento_control.estadosFK);

		if(asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_control.idFilaTablaActual+"_18",asiento_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",asiento_control.estadosFK);

	};

	cargarCombosdocumento_contable_origensFK(asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_constante1.STR_SUFIJO+"-id_documento_contable_origen",asiento_control.documento_contable_origensFK);

		if(asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_control.idFilaTablaActual+"_19",asiento_control.documento_contable_origensFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_constante1.STR_SUFIJO+"FK_Iddocumento_contable_origen-cmbid_documento_contable_origen",asiento_control.documento_contable_origensFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(asiento_control) {

	};

	registrarComboActionChangeCombossucursalsFK(asiento_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(asiento_control) {

	};

	registrarComboActionChangeCombosperiodosFK(asiento_control) {

	};

	registrarComboActionChangeCombosusuariosFK(asiento_control) {

	};

	registrarComboActionChangeCombosasiento_predefinidosFK(asiento_control) {

	};

	registrarComboActionChangeCombosdocumento_contablesFK(asiento_control) {

	};

	registrarComboActionChangeComboslibro_auxiliarsFK(asiento_control) {

	};

	registrarComboActionChangeCombosfuentesFK(asiento_control) {

	};

	registrarComboActionChangeComboscentro_costosFK(asiento_control) {

	};

	registrarComboActionChangeCombosestadosFK(asiento_control) {

	};

	registrarComboActionChangeCombosdocumento_contable_origensFK(asiento_control) {

	};

	
	
	setDefectoValorCombosempresasFK(asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_control.idempresaDefaultFK>-1 && jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_control.idempresaDefaultFK) {
				jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_empresa").val(asiento_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_control.idsucursalDefaultFK>-1 && jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_sucursal").val() != asiento_control.idsucursalDefaultFK) {
				jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_sucursal").val(asiento_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_control.idejercicioDefaultFK>-1 && jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_ejercicio").val() != asiento_control.idejercicioDefaultFK) {
				jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_ejercicio").val(asiento_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_control.idperiodoDefaultFK>-1 && jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_periodo").val() != asiento_control.idperiodoDefaultFK) {
				jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_periodo").val(asiento_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_control.idusuarioDefaultFK>-1 && jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_usuario").val() != asiento_control.idusuarioDefaultFK) {
				jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_usuario").val(asiento_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosasiento_predefinidosFK(asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_control.idasiento_predefinidoDefaultFK>-1 && jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_asiento_predefinido").val() != asiento_control.idasiento_predefinidoDefaultFK) {
				jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_asiento_predefinido").val(asiento_control.idasiento_predefinidoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idasiento_predefinido-cmbid_asiento_predefinido").val(asiento_control.idasiento_predefinidoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idasiento_predefinido-cmbid_asiento_predefinido").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idasiento_predefinido-cmbid_asiento_predefinido").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_contablesFK(asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_control.iddocumento_contableDefaultFK>-1 && jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_documento_contable").val() != asiento_control.iddocumento_contableDefaultFK) {
				jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_documento_contable").val(asiento_control.iddocumento_contableDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable").val(asiento_control.iddocumento_contableDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboslibro_auxiliarsFK(asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_control.idlibro_auxiliarDefaultFK>-1 && jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != asiento_control.idlibro_auxiliarDefaultFK) {
				jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(asiento_control.idlibro_auxiliarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(asiento_control.idlibro_auxiliarDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosfuentesFK(asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_control.idfuenteDefaultFK>-1 && jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_fuente").val() != asiento_control.idfuenteDefaultFK) {
				jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_fuente").val(asiento_control.idfuenteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val(asiento_control.idfuenteDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscentro_costosFK(asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_control.idcentro_costoDefaultFK>-1 && jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_control.idcentro_costoDefaultFK) {
				jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_control.idcentro_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(asiento_control.idcentro_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_control.idestadoDefaultFK>-1 && jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_estado").val() != asiento_control.idestadoDefaultFK) {
				jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_estado").val(asiento_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(asiento_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_contable_origensFK(asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_control.iddocumento_contable_origenDefaultFK>-1 && jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_documento_contable_origen").val() != asiento_control.iddocumento_contable_origenDefaultFK) {
				jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_documento_contable_origen").val(asiento_control.iddocumento_contable_origenDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Iddocumento_contable_origen-cmbid_documento_contable_origen").val(asiento_control.iddocumento_contable_origenDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Iddocumento_contable_origen-cmbid_documento_contable_origen").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_constante1.STR_SUFIJO+"FK_Iddocumento_contable_origen-cmbid_documento_contable_origen").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	









		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);


	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(asiento_constante1.BIT_ES_PAGINA_FORM==true) {
			
							asiento_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(asiento_constante1.BIT_ES_PAGINA_FORM==true) {
			
		asiento_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//asiento_control
		
	
	}
	
	onLoadCombosDefectoFK(asiento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.setDefectoValorCombosempresasFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.setDefectoValorCombossucursalsFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.setDefectoValorCombosejerciciosFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.setDefectoValorCombosperiodosFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.setDefectoValorCombosusuariosFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_predefinido",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.setDefectoValorCombosasiento_predefinidosFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.setDefectoValorCombosdocumento_contablesFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.setDefectoValorComboslibro_auxiliarsFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.setDefectoValorCombosfuentesFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.setDefectoValorComboscentro_costosFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.setDefectoValorCombosestadosFK(asiento_control);
			}

			if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable_origen",asiento_control.strRecargarFkTipos,",")) { 
				asiento_webcontrol1.setDefectoValorCombosdocumento_contable_origensFK(asiento_control);
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
	onLoadCombosEventosFK(asiento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_webcontrol1.registrarComboActionChangeCombosempresasFK(asiento_control);
			//}

			//if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_webcontrol1.registrarComboActionChangeCombossucursalsFK(asiento_control);
			//}

			//if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_webcontrol1.registrarComboActionChangeCombosejerciciosFK(asiento_control);
			//}

			//if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_webcontrol1.registrarComboActionChangeCombosperiodosFK(asiento_control);
			//}

			//if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_webcontrol1.registrarComboActionChangeCombosusuariosFK(asiento_control);
			//}

			//if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_predefinido",asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_webcontrol1.registrarComboActionChangeCombosasiento_predefinidosFK(asiento_control);
			//}

			//if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_webcontrol1.registrarComboActionChangeCombosdocumento_contablesFK(asiento_control);
			//}

			//if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_webcontrol1.registrarComboActionChangeComboslibro_auxiliarsFK(asiento_control);
			//}

			//if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_webcontrol1.registrarComboActionChangeCombosfuentesFK(asiento_control);
			//}

			//if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_webcontrol1.registrarComboActionChangeComboscentro_costosFK(asiento_control);
			//}

			//if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_webcontrol1.registrarComboActionChangeCombosestadosFK(asiento_control);
			//}

			//if(asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable_origen",asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_webcontrol1.registrarComboActionChangeCombosdocumento_contable_origensFK(asiento_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(asiento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(asiento_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(asiento_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento","FK_Idasiento_predefinido","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento","FK_Idcentro_costo","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento","FK_Iddocumento_contable","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento","FK_Iddocumento_contable_origen","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento","FK_Idejercicio","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento","FK_Idempresa","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento","FK_Idestado","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento","FK_Idfuente","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento","FK_Idlibro_auxiliar","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento","FK_Idperiodo","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento","FK_Idsucursal","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento","FK_Idusuario","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
		
			
			if(asiento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("asiento");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("asiento");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(asiento_funcion1,asiento_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(asiento_funcion1,asiento_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(asiento_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1,"asiento");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				asiento_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				asiento_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				asiento_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				asiento_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				asiento_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento_predefinido","id_asiento_predefinido","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_asiento_predefinido_img_busqueda").click(function(){
				asiento_webcontrol1.abrirBusquedaParaasiento_predefinido("id_asiento_predefinido");
				//alert(jQuery('#form-id_asiento_predefinido_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_contable","id_documento_contable","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_documento_contable_img_busqueda").click(function(){
				asiento_webcontrol1.abrirBusquedaParadocumento_contable("id_documento_contable");
				//alert(jQuery('#form-id_documento_contable_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("libro_auxiliar","id_libro_auxiliar","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_libro_auxiliar_img_busqueda").click(function(){
				asiento_webcontrol1.abrirBusquedaParalibro_auxiliar("id_libro_auxiliar");
				//alert(jQuery('#form-id_libro_auxiliar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("fuente","id_fuente","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_fuente_img_busqueda").click(function(){
				asiento_webcontrol1.abrirBusquedaParafuente("id_fuente");
				//alert(jQuery('#form-id_fuente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("centro_costo","id_centro_costo","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_centro_costo_img_busqueda").click(function(){
				asiento_webcontrol1.abrirBusquedaParacentro_costo("id_centro_costo");
				//alert(jQuery('#form-id_centro_costo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				asiento_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_contable","id_documento_contable_origen","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_constante1.STR_SUFIJO+"-id_documento_contable_origen_img_busqueda").click(function(){
				asiento_webcontrol1.abrirBusquedaParadocumento_contable("id_documento_contable_origen");
				//alert(jQuery('#form-id_documento_contable_origen_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("asiento");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(asiento_control) {
		
		jQuery("#divBusquedaasientoAjaxWebPart").css("display",asiento_control.strPermisoBusqueda);
		jQuery("#trasientoCabeceraBusquedas").css("display",asiento_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento").css("display",asiento_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteasiento").css("display",asiento_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosasiento").attr("style",asiento_control.strPermisoMostrarTodos);		
		
		if(asiento_control.strPermisoNuevo!=null) {
			jQuery("#tdasientoNuevo").css("display",asiento_control.strPermisoNuevo);
			jQuery("#tdasientoNuevoToolBar").css("display",asiento_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdasientoDuplicar").css("display",asiento_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasientoDuplicarToolBar").css("display",asiento_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasientoNuevoGuardarCambios").css("display",asiento_control.strPermisoNuevo);
			jQuery("#tdasientoNuevoGuardarCambiosToolBar").css("display",asiento_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(asiento_control.strPermisoActualizar!=null) {
			jQuery("#tdasientoCopiar").css("display",asiento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasientoCopiarToolBar").css("display",asiento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasientoConEditar").css("display",asiento_control.strPermisoActualizar);
		}
		
		jQuery("#tdasientoGuardarCambios").css("display",asiento_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdasientoGuardarCambiosToolBar").css("display",asiento_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdasientoCerrarPagina").css("display",asiento_control.strPermisoPopup);		
		jQuery("#tdasientoCerrarPaginaToolBar").css("display",asiento_control.strPermisoPopup);
		//jQuery("#trasientoAccionesRelaciones").css("display",asiento_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=asiento_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + asiento_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Asientos";
		sTituloBanner+=" - " + asiento_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdasientoRelacionesToolBar").css("display",asiento_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosasiento").css("display",asiento_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		asiento_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		asiento_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		asiento_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		asiento_webcontrol1.registrarEventosControles();
		
		if(asiento_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(asiento_constante1.STR_ES_RELACIONADO=="false") {
			asiento_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(asiento_constante1.STR_ES_RELACIONES=="true") {
			if(asiento_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(asiento_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(asiento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				asiento_webcontrol1.onLoad();
			
			//} else {
				//if(asiento_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			asiento_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("asiento","contabilidad","",asiento_funcion1,asiento_webcontrol1,asiento_constante1);	
	}
}

var asiento_webcontrol1 = new asiento_webcontrol();

//Para ser llamado desde otro archivo (import)
export {asiento_webcontrol,asiento_webcontrol1};

//Para ser llamado desde window.opener
window.asiento_webcontrol1 = asiento_webcontrol1;


if(asiento_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = asiento_webcontrol1.onLoadWindow; 
}

//</script>