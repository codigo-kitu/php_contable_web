//<script type="text/javascript" language="javascript">



//var libro_auxiliarJQueryPaginaWebInteraccion= function (libro_auxiliar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {libro_auxiliar_constante,libro_auxiliar_constante1} from '../util/libro_auxiliar_constante.js';

import {libro_auxiliar_funcion,libro_auxiliar_funcion1} from '../util/libro_auxiliar_funcion.js';


class libro_auxiliar_webcontrol extends GeneralEntityWebControl {
	
	libro_auxiliar_control=null;
	libro_auxiliar_controlInicial=null;
	libro_auxiliar_controlAuxiliar=null;
		
	//if(libro_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(libro_auxiliar_control) {
		super();
		
		this.libro_auxiliar_control=libro_auxiliar_control;
	}
		
	actualizarVariablesPagina(libro_auxiliar_control) {
		
		if(libro_auxiliar_control.action=="index" || libro_auxiliar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(libro_auxiliar_control);
			
		} 
		
		
		else if(libro_auxiliar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(libro_auxiliar_control);
			
		} else if(libro_auxiliar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(libro_auxiliar_control);
			
		} else if(libro_auxiliar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(libro_auxiliar_control);		
		
		} else if(libro_auxiliar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(libro_auxiliar_control);
		
		}  else if(libro_auxiliar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(libro_auxiliar_control);
		
		} else if(libro_auxiliar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(libro_auxiliar_control);		
		
		} else if(libro_auxiliar_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(libro_auxiliar_control);		
		
		} else if(libro_auxiliar_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(libro_auxiliar_control);		
		
		} else if(libro_auxiliar_control.action.includes("Busqueda") ||
				  libro_auxiliar_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(libro_auxiliar_control);
			
		} else if(libro_auxiliar_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(libro_auxiliar_control)
		}
		
		
		
	
		else if(libro_auxiliar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(libro_auxiliar_control);	
		
		} else if(libro_auxiliar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(libro_auxiliar_control);		
		}
	
		else if(libro_auxiliar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(libro_auxiliar_control);		
		}
	
		else if(libro_auxiliar_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(libro_auxiliar_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + libro_auxiliar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(libro_auxiliar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(libro_auxiliar_control) {
		this.actualizarPaginaAccionesGenerales(libro_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(libro_auxiliar_control) {
		
		this.actualizarPaginaCargaGeneral(libro_auxiliar_control);
		this.actualizarPaginaOrderBy(libro_auxiliar_control);
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		this.actualizarPaginaCargaGeneralControles(libro_auxiliar_control);
		//this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(libro_auxiliar_control);
		this.actualizarPaginaAreaBusquedas(libro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(libro_auxiliar_control) {
		//this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(libro_auxiliar_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(libro_auxiliar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(libro_auxiliar_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(libro_auxiliar_control) {
		
		this.actualizarPaginaCargaGeneral(libro_auxiliar_control);
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		this.actualizarPaginaCargaGeneralControles(libro_auxiliar_control);
		//this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(libro_auxiliar_control);
		this.actualizarPaginaAreaBusquedas(libro_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(libro_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		//this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		//this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		//this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		//this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		//this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		//this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(libro_auxiliar_control) {
		//this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(libro_auxiliar_control) {
		this.actualizarPaginaAbrirLink(libro_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);				
		//this.actualizarPaginaFormulario(libro_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		//this.actualizarPaginaFormulario(libro_auxiliar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		//this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		//this.actualizarPaginaFormulario(libro_auxiliar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(libro_auxiliar_control) {
		//this.actualizarPaginaFormulario(libro_auxiliar_control);
		this.onLoadCombosDefectoFK(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		//this.actualizarPaginaFormulario(libro_auxiliar_control);
		this.onLoadCombosDefectoFK(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		//this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(libro_auxiliar_control) {
		this.actualizarPaginaAbrirLink(libro_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(libro_auxiliar_control) {
					//super.actualizarPaginaImprimir(libro_auxiliar_control,"libro_auxiliar");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",libro_auxiliar_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("libro_auxiliar_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(libro_auxiliar_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(libro_auxiliar_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(libro_auxiliar_control) {
		//super.actualizarPaginaImprimir(libro_auxiliar_control,"libro_auxiliar");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("libro_auxiliar_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(libro_auxiliar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",libro_auxiliar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(libro_auxiliar_control) {
		//super.actualizarPaginaImprimir(libro_auxiliar_control,"libro_auxiliar");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("libro_auxiliar_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(libro_auxiliar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",libro_auxiliar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(libro_auxiliar_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(libro_auxiliar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(libro_auxiliar_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(libro_auxiliar_control);
			
		this.actualizarPaginaAbrirLink(libro_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(libro_auxiliar_control) {
		this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		this.actualizarPaginaFormulario(libro_auxiliar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(libro_auxiliar_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(libro_auxiliar_control) {
		
		if(libro_auxiliar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(libro_auxiliar_control);
		}
		
		if(libro_auxiliar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(libro_auxiliar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(libro_auxiliar_control) {
		if(libro_auxiliar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("libro_auxiliarReturnGeneral",JSON.stringify(libro_auxiliar_control.libro_auxiliarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(libro_auxiliar_control) {
		if(libro_auxiliar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && libro_auxiliar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(libro_auxiliar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(libro_auxiliar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(libro_auxiliar_control, mostrar) {
		
		if(mostrar==true) {
			libro_auxiliar_funcion1.resaltarRestaurarDivsPagina(false,"libro_auxiliar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				libro_auxiliar_funcion1.resaltarRestaurarDivMantenimiento(false,"libro_auxiliar");
			}			
			
			libro_auxiliar_funcion1.mostrarDivMensaje(true,libro_auxiliar_control.strAuxiliarMensaje,libro_auxiliar_control.strAuxiliarCssMensaje);
		
		} else {
			libro_auxiliar_funcion1.mostrarDivMensaje(false,libro_auxiliar_control.strAuxiliarMensaje,libro_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(libro_auxiliar_control) {
		if(libro_auxiliar_funcion1.esPaginaForm(libro_auxiliar_constante1)==true) {
			window.opener.libro_auxiliar_webcontrol1.actualizarPaginaTablaDatos(libro_auxiliar_control);
		} else {
			this.actualizarPaginaTablaDatos(libro_auxiliar_control);
		}
	}
	
	actualizarPaginaAbrirLink(libro_auxiliar_control) {
		libro_auxiliar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(libro_auxiliar_control.strAuxiliarUrlPagina);
				
		libro_auxiliar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(libro_auxiliar_control.strAuxiliarTipo,libro_auxiliar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(libro_auxiliar_control) {
		libro_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,libro_auxiliar_control.strAuxiliarMensajeAlert,libro_auxiliar_control.strAuxiliarCssMensaje);
			
		if(libro_auxiliar_funcion1.esPaginaForm(libro_auxiliar_constante1)==true) {
			window.opener.libro_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,libro_auxiliar_control.strAuxiliarMensajeAlert,libro_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(libro_auxiliar_control) {
		this.libro_auxiliar_controlInicial=libro_auxiliar_control;
			
		if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(libro_auxiliar_control.strStyleDivArbol,libro_auxiliar_control.strStyleDivContent
																,libro_auxiliar_control.strStyleDivOpcionesBanner,libro_auxiliar_control.strStyleDivExpandirColapsar
																,libro_auxiliar_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=libro_auxiliar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",libro_auxiliar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(libro_auxiliar_control) {
		this.actualizarCssBotonesPagina(libro_auxiliar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(libro_auxiliar_control.tiposReportes,libro_auxiliar_control.tiposReporte
															 	,libro_auxiliar_control.tiposPaginacion,libro_auxiliar_control.tiposAcciones
																,libro_auxiliar_control.tiposColumnasSelect,libro_auxiliar_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(libro_auxiliar_control.tiposRelaciones,libro_auxiliar_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(libro_auxiliar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(libro_auxiliar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(libro_auxiliar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(libro_auxiliar_control) {
	
		var indexPosition=libro_auxiliar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=libro_auxiliar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(libro_auxiliar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(libro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",libro_auxiliar_control.strRecargarFkTipos,",")) { 
				libro_auxiliar_webcontrol1.cargarCombosempresasFK(libro_auxiliar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(libro_auxiliar_control.strRecargarFkTiposNinguno!=null && libro_auxiliar_control.strRecargarFkTiposNinguno!='NINGUNO' && libro_auxiliar_control.strRecargarFkTiposNinguno!='') {
			
				if(libro_auxiliar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",libro_auxiliar_control.strRecargarFkTiposNinguno,",")) { 
					libro_auxiliar_webcontrol1.cargarCombosempresasFK(libro_auxiliar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(libro_auxiliar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,libro_auxiliar_funcion1,libro_auxiliar_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(libro_auxiliar_control) {
		jQuery("#divBusquedalibro_auxiliarAjaxWebPart").css("display",libro_auxiliar_control.strPermisoBusqueda);
		jQuery("#trlibro_auxiliarCabeceraBusquedas").css("display",libro_auxiliar_control.strPermisoBusqueda);
		jQuery("#trBusquedalibro_auxiliar").css("display",libro_auxiliar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(libro_auxiliar_control.htmlTablaOrderBy!=null
			&& libro_auxiliar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBylibro_auxiliarAjaxWebPart").html(libro_auxiliar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//libro_auxiliar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(libro_auxiliar_control.htmlTablaOrderByRel!=null
			&& libro_auxiliar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRellibro_auxiliarAjaxWebPart").html(libro_auxiliar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedalibro_auxiliarAjaxWebPart").css("display","none");
			jQuery("#trlibro_auxiliarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedalibro_auxiliar").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(libro_auxiliar_control) {
		
		if(!libro_auxiliar_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(libro_auxiliar_control);
		} else {
			jQuery("#divTablaDatoslibro_auxiliarsAjaxWebPart").html(libro_auxiliar_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoslibro_auxiliars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoslibro_auxiliars=jQuery("#tblTablaDatoslibro_auxiliars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("libro_auxiliar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',libro_auxiliar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			libro_auxiliar_webcontrol1.registrarControlesTableEdition(libro_auxiliar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		libro_auxiliar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(libro_auxiliar_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("libro_auxiliar_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(libro_auxiliar_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoslibro_auxiliarsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(libro_auxiliar_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(libro_auxiliar_control);
		
		const divOrderBy = document.getElementById("divOrderBylibro_auxiliarAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(libro_auxiliar_control);
		
		const divOrderByRel = document.getElementById("divOrderByRellibro_auxiliarAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(libro_auxiliar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(libro_auxiliar_control.libro_auxiliarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(libro_auxiliar_control);			
		}
	}
	
	actualizarCamposFilaTabla(libro_auxiliar_control) {
		var i=0;
		
		i=libro_auxiliar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(libro_auxiliar_control.libro_auxiliarActual.id);
		jQuery("#t-version_row_"+i+"").val(libro_auxiliar_control.libro_auxiliarActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(libro_auxiliar_control.libro_auxiliarActual.versionRow);
		
		if(libro_auxiliar_control.libro_auxiliarActual.id_empresa!=null && libro_auxiliar_control.libro_auxiliarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != libro_auxiliar_control.libro_auxiliarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(libro_auxiliar_control.libro_auxiliarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(libro_auxiliar_control.libro_auxiliarActual.iniciales);
		jQuery("#t-cel_"+i+"_5").val(libro_auxiliar_control.libro_auxiliarActual.nombre);
		jQuery("#t-cel_"+i+"_6").val(libro_auxiliar_control.libro_auxiliarActual.secuencial);
		jQuery("#t-cel_"+i+"_7").val(libro_auxiliar_control.libro_auxiliarActual.incremento);
		jQuery("#t-cel_"+i+"_8").prop('checked',libro_auxiliar_control.libro_auxiliarActual.reinicia_secuencial_mes);
		jQuery("#t-cel_"+i+"_9").val(libro_auxiliar_control.libro_auxiliarActual.generado_por);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(libro_auxiliar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncontador_auxiliar").click(function(){
		jQuery("#tblTablaDatoslibro_auxiliars").on("click",".imgrelacioncontador_auxiliar", function () {

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParacontador_auxiliares(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_predefinido").click(function(){
		jQuery("#tblTablaDatoslibro_auxiliars").on("click",".imgrelacionasiento_predefinido", function () {

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_automatico").click(function(){
		jQuery("#tblTablaDatoslibro_auxiliars").on("click",".imgrelacionasiento_automatico", function () {

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParaasiento_automaticos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento").click(function(){
		jQuery("#tblTablaDatoslibro_auxiliars").on("click",".imgrelacionasiento", function () {

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParaasientos(idActual);
		});				
	}
		
	

	registrarSesionParacontador_auxiliares(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"libro_auxiliar","contador_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1,"es","");
	}

	registrarSesionParaasiento_predefinidos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"libro_auxiliar","asiento_predefinido","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1,"s","");
	}

	registrarSesionParaasiento_automaticos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"libro_auxiliar","asiento_automatico","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1,"s","");
	}

	registrarSesionParaasientos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"libro_auxiliar","asiento","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1,"s","");
	}
	
	registrarControlesTableEdition(libro_auxiliar_control) {
		libro_auxiliar_funcion1.registrarControlesTableValidacionEdition(libro_auxiliar_control,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(libro_auxiliar_control) {
		jQuery("#divResumenlibro_auxiliarActualAjaxWebPart").html(libro_auxiliar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(libro_auxiliar_control) {
		//jQuery("#divAccionesRelacioneslibro_auxiliarAjaxWebPart").html(libro_auxiliar_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("libro_auxiliar_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(libro_auxiliar_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacioneslibro_auxiliarAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		libro_auxiliar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(libro_auxiliar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(libro_auxiliar_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(libro_auxiliar_control) {
		
		if(libro_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+libro_auxiliar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",libro_auxiliar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+libro_auxiliar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",libro_auxiliar_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionlibro_auxiliar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("libro_auxiliar",id,"contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		libro_auxiliar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("libro_auxiliar","empresa","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncontador_auxiliar").click(function(){

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParacontador_auxiliares(idActual);
		});
		jQuery("#imgdivrelacionasiento_predefinido").click(function(){

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});
		jQuery("#imgdivrelacionasiento_automatico").click(function(){

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParaasiento_automaticos(idActual);
		});
		jQuery("#imgdivrelacionasiento").click(function(){

			var idActual=jQuery(this).attr("idactuallibro_auxiliar");

			libro_auxiliar_webcontrol1.registrarSesionParaasientos(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliarConstante,strParametros);
		
		//libro_auxiliar_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(libro_auxiliar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa",libro_auxiliar_control.empresasFK);

		if(libro_auxiliar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+libro_auxiliar_control.idFilaTablaActual+"_3",libro_auxiliar_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(libro_auxiliar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(libro_auxiliar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(libro_auxiliar_control.idempresaDefaultFK>-1 && jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val() != libro_auxiliar_control.idempresaDefaultFK) {
				jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa").val(libro_auxiliar_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//libro_auxiliar_control
		
	
	}
	
	onLoadCombosDefectoFK(libro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(libro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(libro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",libro_auxiliar_control.strRecargarFkTipos,",")) { 
				libro_auxiliar_webcontrol1.setDefectoValorCombosempresasFK(libro_auxiliar_control);
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
	onLoadCombosEventosFK(libro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(libro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(libro_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",libro_auxiliar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				libro_auxiliar_webcontrol1.registrarComboActionChangeCombosempresasFK(libro_auxiliar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(libro_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(libro_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(libro_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(libro_auxiliar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("libro_auxiliar","FK_Idempresa","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
		
			
			if(libro_auxiliar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("libro_auxiliar");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("libro_auxiliar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,"libro_auxiliar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+libro_auxiliar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				libro_auxiliar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("libro_auxiliar");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(libro_auxiliar_control) {
		
		jQuery("#divBusquedalibro_auxiliarAjaxWebPart").css("display",libro_auxiliar_control.strPermisoBusqueda);
		jQuery("#trlibro_auxiliarCabeceraBusquedas").css("display",libro_auxiliar_control.strPermisoBusqueda);
		jQuery("#trBusquedalibro_auxiliar").css("display",libro_auxiliar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportelibro_auxiliar").css("display",libro_auxiliar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoslibro_auxiliar").attr("style",libro_auxiliar_control.strPermisoMostrarTodos);		
		
		if(libro_auxiliar_control.strPermisoNuevo!=null) {
			jQuery("#tdlibro_auxiliarNuevo").css("display",libro_auxiliar_control.strPermisoNuevo);
			jQuery("#tdlibro_auxiliarNuevoToolBar").css("display",libro_auxiliar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdlibro_auxiliarDuplicar").css("display",libro_auxiliar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlibro_auxiliarDuplicarToolBar").css("display",libro_auxiliar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdlibro_auxiliarNuevoGuardarCambios").css("display",libro_auxiliar_control.strPermisoNuevo);
			jQuery("#tdlibro_auxiliarNuevoGuardarCambiosToolBar").css("display",libro_auxiliar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(libro_auxiliar_control.strPermisoActualizar!=null) {
			jQuery("#tdlibro_auxiliarCopiar").css("display",libro_auxiliar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlibro_auxiliarCopiarToolBar").css("display",libro_auxiliar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdlibro_auxiliarConEditar").css("display",libro_auxiliar_control.strPermisoActualizar);
		}
		
		jQuery("#tdlibro_auxiliarGuardarCambios").css("display",libro_auxiliar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdlibro_auxiliarGuardarCambiosToolBar").css("display",libro_auxiliar_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdlibro_auxiliarCerrarPagina").css("display",libro_auxiliar_control.strPermisoPopup);		
		jQuery("#tdlibro_auxiliarCerrarPaginaToolBar").css("display",libro_auxiliar_control.strPermisoPopup);
		//jQuery("#trlibro_auxiliarAccionesRelaciones").css("display",libro_auxiliar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=libro_auxiliar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + libro_auxiliar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + libro_auxiliar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Libro Auxiliares";
		sTituloBanner+=" - " + libro_auxiliar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + libro_auxiliar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdlibro_auxiliarRelacionesToolBar").css("display",libro_auxiliar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoslibro_auxiliar").css("display",libro_auxiliar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		libro_auxiliar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		libro_auxiliar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		libro_auxiliar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		libro_auxiliar_webcontrol1.registrarEventosControles();
		
		if(libro_auxiliar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			libro_auxiliar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(libro_auxiliar_constante1.STR_ES_RELACIONES=="true") {
			if(libro_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				libro_auxiliar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(libro_auxiliar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(libro_auxiliar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				libro_auxiliar_webcontrol1.onLoad();
			
			//} else {
				//if(libro_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			libro_auxiliar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("libro_auxiliar","contabilidad","",libro_auxiliar_funcion1,libro_auxiliar_webcontrol1,libro_auxiliar_constante1);	
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

var libro_auxiliar_webcontrol1 = new libro_auxiliar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {libro_auxiliar_webcontrol,libro_auxiliar_webcontrol1};

//Para ser llamado desde window.opener
window.libro_auxiliar_webcontrol1 = libro_auxiliar_webcontrol1;


if(libro_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = libro_auxiliar_webcontrol1.onLoadWindow; 
}

//</script>