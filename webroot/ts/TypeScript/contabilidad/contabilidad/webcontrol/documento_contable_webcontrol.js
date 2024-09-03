//<script type="text/javascript" language="javascript">



//var documento_contableJQueryPaginaWebInteraccion= function (documento_contable_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {documento_contable_constante,documento_contable_constante1} from '../util/documento_contable_constante.js';

import {documento_contable_funcion,documento_contable_funcion1} from '../util/documento_contable_funcion.js';


class documento_contable_webcontrol extends GeneralEntityWebControl {
	
	documento_contable_control=null;
	documento_contable_controlInicial=null;
	documento_contable_controlAuxiliar=null;
		
	//if(documento_contable_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(documento_contable_control) {
		super();
		
		this.documento_contable_control=documento_contable_control;
	}
		
	actualizarVariablesPagina(documento_contable_control) {
		
		if(documento_contable_control.action=="index" || documento_contable_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(documento_contable_control);
			
		} 
		
		
		else if(documento_contable_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_contable_control);
		
		} else if(documento_contable_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(documento_contable_control);
		
		} else if(documento_contable_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_contable_control);
		
		} else if(documento_contable_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(documento_contable_control);
			
		} else if(documento_contable_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(documento_contable_control);
			
		} else if(documento_contable_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_contable_control);
		
		} else if(documento_contable_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_contable_control);		
		
		} else if(documento_contable_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(documento_contable_control);
		
		} else if(documento_contable_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(documento_contable_control);
		
		} else if(documento_contable_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(documento_contable_control);
		
		} else if(documento_contable_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(documento_contable_control);
		
		}  else if(documento_contable_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_contable_control);
		
		} else if(documento_contable_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_contable_control);
		
		} else if(documento_contable_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(documento_contable_control);
		
		} else if(documento_contable_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(documento_contable_control);
		
		} else if(documento_contable_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(documento_contable_control);
		
		} else if(documento_contable_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_contable_control);
		
		} else if(documento_contable_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_contable_control);
		
		} else if(documento_contable_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(documento_contable_control);
		
		} else if(documento_contable_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_contable_control);
		
		} else if(documento_contable_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_contable_control);		
		
		} else if(documento_contable_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(documento_contable_control);		
		
		} else if(documento_contable_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(documento_contable_control);		
		
		} else if(documento_contable_control.action.includes("Busqueda") ||
				  documento_contable_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(documento_contable_control);
			
		} else if(documento_contable_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(documento_contable_control)
		}
		
		
		
	
		else if(documento_contable_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(documento_contable_control);	
		
		} else if(documento_contable_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(documento_contable_control);		
		}
	
		else if(documento_contable_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_contable_control);		
		}
	
		else if(documento_contable_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_contable_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + documento_contable_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(documento_contable_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(documento_contable_control) {
		this.actualizarPaginaAccionesGenerales(documento_contable_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(documento_contable_control) {
		
		this.actualizarPaginaCargaGeneral(documento_contable_control);
		this.actualizarPaginaOrderBy(documento_contable_control);
		this.actualizarPaginaTablaDatos(documento_contable_control);
		this.actualizarPaginaCargaGeneralControles(documento_contable_control);
		//this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_contable_control);
		this.actualizarPaginaAreaBusquedas(documento_contable_control);
		this.actualizarPaginaCargaCombosFK(documento_contable_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(documento_contable_control) {
		//this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(documento_contable_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_contable_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_contable_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_contable_control) {
		
		this.actualizarPaginaCargaGeneral(documento_contable_control);
		this.actualizarPaginaTablaDatos(documento_contable_control);
		this.actualizarPaginaCargaGeneralControles(documento_contable_control);
		//this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_contable_control);
		this.actualizarPaginaAreaBusquedas(documento_contable_control);
		this.actualizarPaginaCargaCombosFK(documento_contable_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		//this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		//this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		//this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(documento_contable_control) {
		//this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_contable_control) {
		this.actualizarPaginaAbrirLink(documento_contable_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);				
		//this.actualizarPaginaFormulario(documento_contable_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);
		//this.actualizarPaginaFormulario(documento_contable_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);
		//this.actualizarPaginaFormulario(documento_contable_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(documento_contable_control) {
		//this.actualizarPaginaFormulario(documento_contable_control);
		this.onLoadCombosDefectoFK(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);
		//this.actualizarPaginaFormulario(documento_contable_control);
		this.onLoadCombosDefectoFK(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_contable_control) {
		this.actualizarPaginaAbrirLink(documento_contable_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_contable_control) {
					//super.actualizarPaginaImprimir(documento_contable_control,"documento_contable");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_contable_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("documento_contable_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(documento_contable_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_contable_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_contable_control) {
		//super.actualizarPaginaImprimir(documento_contable_control,"documento_contable");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("documento_contable_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(documento_contable_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_contable_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(documento_contable_control) {
		//super.actualizarPaginaImprimir(documento_contable_control,"documento_contable");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("documento_contable_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(documento_contable_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_contable_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_contable_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(documento_contable_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(documento_contable_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(documento_contable_control);
			
		this.actualizarPaginaAbrirLink(documento_contable_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(documento_contable_control) {
		this.actualizarPaginaTablaDatos(documento_contable_control);
		this.actualizarPaginaFormulario(documento_contable_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_contable_control);		
		this.actualizarPaginaAreaMantenimiento(documento_contable_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(documento_contable_control) {
		
		if(documento_contable_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(documento_contable_control);
		}
		
		if(documento_contable_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(documento_contable_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(documento_contable_control) {
		if(documento_contable_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("documento_contableReturnGeneral",JSON.stringify(documento_contable_control.documento_contableReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(documento_contable_control) {
		if(documento_contable_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_contable_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(documento_contable_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(documento_contable_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(documento_contable_control, mostrar) {
		
		if(mostrar==true) {
			documento_contable_funcion1.resaltarRestaurarDivsPagina(false,"documento_contable");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				documento_contable_funcion1.resaltarRestaurarDivMantenimiento(false,"documento_contable");
			}			
			
			documento_contable_funcion1.mostrarDivMensaje(true,documento_contable_control.strAuxiliarMensaje,documento_contable_control.strAuxiliarCssMensaje);
		
		} else {
			documento_contable_funcion1.mostrarDivMensaje(false,documento_contable_control.strAuxiliarMensaje,documento_contable_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(documento_contable_control) {
		if(documento_contable_funcion1.esPaginaForm(documento_contable_constante1)==true) {
			window.opener.documento_contable_webcontrol1.actualizarPaginaTablaDatos(documento_contable_control);
		} else {
			this.actualizarPaginaTablaDatos(documento_contable_control);
		}
	}
	
	actualizarPaginaAbrirLink(documento_contable_control) {
		documento_contable_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(documento_contable_control.strAuxiliarUrlPagina);
				
		documento_contable_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(documento_contable_control.strAuxiliarTipo,documento_contable_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(documento_contable_control) {
		documento_contable_funcion1.resaltarRestaurarDivMensaje(true,documento_contable_control.strAuxiliarMensajeAlert,documento_contable_control.strAuxiliarCssMensaje);
			
		if(documento_contable_funcion1.esPaginaForm(documento_contable_constante1)==true) {
			window.opener.documento_contable_funcion1.resaltarRestaurarDivMensaje(true,documento_contable_control.strAuxiliarMensajeAlert,documento_contable_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(documento_contable_control) {
		this.documento_contable_controlInicial=documento_contable_control;
			
		if(documento_contable_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(documento_contable_control.strStyleDivArbol,documento_contable_control.strStyleDivContent
																,documento_contable_control.strStyleDivOpcionesBanner,documento_contable_control.strStyleDivExpandirColapsar
																,documento_contable_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=documento_contable_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",documento_contable_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(documento_contable_control) {
		this.actualizarCssBotonesPagina(documento_contable_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(documento_contable_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(documento_contable_control.tiposReportes,documento_contable_control.tiposReporte
															 	,documento_contable_control.tiposPaginacion,documento_contable_control.tiposAcciones
																,documento_contable_control.tiposColumnasSelect,documento_contable_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(documento_contable_control.tiposRelaciones,documento_contable_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(documento_contable_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(documento_contable_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(documento_contable_control);			
	}
	
	actualizarPaginaUsuarioInvitado(documento_contable_control) {
	
		var indexPosition=documento_contable_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=documento_contable_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(documento_contable_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(documento_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_contable_control.strRecargarFkTipos,",")) { 
				documento_contable_webcontrol1.cargarCombosempresasFK(documento_contable_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(documento_contable_control.strRecargarFkTiposNinguno!=null && documento_contable_control.strRecargarFkTiposNinguno!='NINGUNO' && documento_contable_control.strRecargarFkTiposNinguno!='') {
			
				if(documento_contable_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",documento_contable_control.strRecargarFkTiposNinguno,",")) { 
					documento_contable_webcontrol1.cargarCombosempresasFK(documento_contable_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(documento_contable_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_contable_funcion1,documento_contable_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(documento_contable_control) {
		jQuery("#divBusquedadocumento_contableAjaxWebPart").css("display",documento_contable_control.strPermisoBusqueda);
		jQuery("#trdocumento_contableCabeceraBusquedas").css("display",documento_contable_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_contable").css("display",documento_contable_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(documento_contable_control.htmlTablaOrderBy!=null
			&& documento_contable_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydocumento_contableAjaxWebPart").html(documento_contable_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//documento_contable_webcontrol1.registrarOrderByActions();
			
		}
			
		if(documento_contable_control.htmlTablaOrderByRel!=null
			&& documento_contable_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldocumento_contableAjaxWebPart").html(documento_contable_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(documento_contable_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadocumento_contableAjaxWebPart").css("display","none");
			jQuery("#trdocumento_contableCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadocumento_contable").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(documento_contable_control) {
		
		if(!documento_contable_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(documento_contable_control);
		} else {
			jQuery("#divTablaDatosdocumento_contablesAjaxWebPart").html(documento_contable_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdocumento_contables=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(documento_contable_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdocumento_contables=jQuery("#tblTablaDatosdocumento_contables").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("documento_contable",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',documento_contable_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			documento_contable_webcontrol1.registrarControlesTableEdition(documento_contable_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		documento_contable_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(documento_contable_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("documento_contable_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(documento_contable_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosdocumento_contablesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(documento_contable_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(documento_contable_control);
		
		const divOrderBy = document.getElementById("divOrderBydocumento_contableAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(documento_contable_control);
		
		const divOrderByRel = document.getElementById("divOrderByReldocumento_contableAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(documento_contable_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(documento_contable_control.documento_contableActual!=null) {//form
			
			this.actualizarCamposFilaTabla(documento_contable_control);			
		}
	}
	
	actualizarCamposFilaTabla(documento_contable_control) {
		var i=0;
		
		i=documento_contable_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(documento_contable_control.documento_contableActual.id);
		jQuery("#t-version_row_"+i+"").val(documento_contable_control.documento_contableActual.versionRow);
		
		if(documento_contable_control.documento_contableActual.id_empresa!=null && documento_contable_control.documento_contableActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != documento_contable_control.documento_contableActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(documento_contable_control.documento_contableActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(documento_contable_control.documento_contableActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(documento_contable_control.documento_contableActual.nombre);
		jQuery("#t-cel_"+i+"_5").val(documento_contable_control.documento_contableActual.secuencial);
		jQuery("#t-cel_"+i+"_6").val(documento_contable_control.documento_contableActual.incremento);
		jQuery("#t-cel_"+i+"_7").prop('checked',documento_contable_control.documento_contableActual.reinicia_secuencial_mes);
		jQuery("#t-cel_"+i+"_8").val(documento_contable_control.documento_contableActual.generado_por);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(documento_contable_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_predefinido").click(function(){
		jQuery("#tblTablaDatosdocumento_contables").on("click",".imgrelacionasiento_predefinido", function () {

			var idActual=jQuery(this).attr("idactualdocumento_contable");

			documento_contable_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_origen").click(function(){
		jQuery("#tblTablaDatosdocumento_contables").on("click",".imgrelacionasiento_origen", function () {

			var idActual=jQuery(this).attr("idactualdocumento_contable");

			documento_contable_webcontrol1.registrarSesion_origenParaasientos(idActual);
		});				
	}
		
	

	registrarSesionParaasiento_predefinidos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_contable","asiento_predefinido","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1,"s","");
	}

	registrarSesion_origenParaasientos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_contable","asiento","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1,"s","_origen");
	}
	
	registrarControlesTableEdition(documento_contable_control) {
		documento_contable_funcion1.registrarControlesTableValidacionEdition(documento_contable_control,documento_contable_webcontrol1,documento_contable_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(documento_contable_control) {
		jQuery("#divResumendocumento_contableActualAjaxWebPart").html(documento_contable_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_contable_control) {
		//jQuery("#divAccionesRelacionesdocumento_contableAjaxWebPart").html(documento_contable_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("documento_contable_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(documento_contable_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesdocumento_contableAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		documento_contable_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(documento_contable_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(documento_contable_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(documento_contable_control) {
		
		if(documento_contable_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_contable_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",documento_contable_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+documento_contable_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",documento_contable_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondocumento_contable();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("documento_contable",id,"contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		documento_contable_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_contable","empresa","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionasiento_predefinido").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_contable");

			documento_contable_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});
		jQuery("#imgdivrelacionasiento").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_contable");

			documento_contable_webcontrol1.registrarSesionParaasientos(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contableConstante,strParametros);
		
		//documento_contable_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(documento_contable_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa",documento_contable_control.empresasFK);

		if(documento_contable_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_contable_control.idFilaTablaActual+"_2",documento_contable_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(documento_contable_control) {

	};

	
	
	setDefectoValorCombosempresasFK(documento_contable_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_contable_control.idempresaDefaultFK>-1 && jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").val() != documento_contable_control.idempresaDefaultFK) {
				jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa").val(documento_contable_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//documento_contable_control
		
	
	}
	
	onLoadCombosDefectoFK(documento_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(documento_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_contable_control.strRecargarFkTipos,",")) { 
				documento_contable_webcontrol1.setDefectoValorCombosempresasFK(documento_contable_control);
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
	onLoadCombosEventosFK(documento_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(documento_contable_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_contable_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_contable_webcontrol1.registrarComboActionChangeCombosempresasFK(documento_contable_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(documento_contable_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_contable_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(documento_contable_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(documento_contable_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_contable","FK_Idempresa","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
		
			
			if(documento_contable_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("documento_contable");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("documento_contable");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(documento_contable_funcion1,documento_contable_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(documento_contable_funcion1,documento_contable_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(documento_contable_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,"documento_contable");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_contable_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				documento_contable_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("documento_contable");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(documento_contable_control) {
		
		jQuery("#divBusquedadocumento_contableAjaxWebPart").css("display",documento_contable_control.strPermisoBusqueda);
		jQuery("#trdocumento_contableCabeceraBusquedas").css("display",documento_contable_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_contable").css("display",documento_contable_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedocumento_contable").css("display",documento_contable_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdocumento_contable").attr("style",documento_contable_control.strPermisoMostrarTodos);		
		
		if(documento_contable_control.strPermisoNuevo!=null) {
			jQuery("#tddocumento_contableNuevo").css("display",documento_contable_control.strPermisoNuevo);
			jQuery("#tddocumento_contableNuevoToolBar").css("display",documento_contable_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddocumento_contableDuplicar").css("display",documento_contable_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_contableDuplicarToolBar").css("display",documento_contable_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_contableNuevoGuardarCambios").css("display",documento_contable_control.strPermisoNuevo);
			jQuery("#tddocumento_contableNuevoGuardarCambiosToolBar").css("display",documento_contable_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(documento_contable_control.strPermisoActualizar!=null) {
			jQuery("#tddocumento_contableCopiar").css("display",documento_contable_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_contableCopiarToolBar").css("display",documento_contable_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_contableConEditar").css("display",documento_contable_control.strPermisoActualizar);
		}
		
		jQuery("#tddocumento_contableGuardarCambios").css("display",documento_contable_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddocumento_contableGuardarCambiosToolBar").css("display",documento_contable_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tddocumento_contableCerrarPagina").css("display",documento_contable_control.strPermisoPopup);		
		jQuery("#tddocumento_contableCerrarPaginaToolBar").css("display",documento_contable_control.strPermisoPopup);
		//jQuery("#trdocumento_contableAccionesRelaciones").css("display",documento_contable_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=documento_contable_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_contable_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + documento_contable_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Documento Contables";
		sTituloBanner+=" - " + documento_contable_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_contable_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddocumento_contableRelacionesToolBar").css("display",documento_contable_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdocumento_contable").css("display",documento_contable_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		documento_contable_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		documento_contable_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		documento_contable_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		documento_contable_webcontrol1.registrarEventosControles();
		
		if(documento_contable_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(documento_contable_constante1.STR_ES_RELACIONADO=="false") {
			documento_contable_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(documento_contable_constante1.STR_ES_RELACIONES=="true") {
			if(documento_contable_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_contable_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(documento_contable_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(documento_contable_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				documento_contable_webcontrol1.onLoad();
			
			//} else {
				//if(documento_contable_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			documento_contable_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("documento_contable","contabilidad","",documento_contable_funcion1,documento_contable_webcontrol1,documento_contable_constante1);	
	}
}

var documento_contable_webcontrol1 = new documento_contable_webcontrol();

//Para ser llamado desde otro archivo (import)
export {documento_contable_webcontrol,documento_contable_webcontrol1};

//Para ser llamado desde window.opener
window.documento_contable_webcontrol1 = documento_contable_webcontrol1;


if(documento_contable_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = documento_contable_webcontrol1.onLoadWindow; 
}

//</script>