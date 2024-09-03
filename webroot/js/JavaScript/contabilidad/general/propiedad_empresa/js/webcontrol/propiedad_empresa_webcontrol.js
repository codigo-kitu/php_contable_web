//<script type="text/javascript" language="javascript">



//var propiedad_empresaJQueryPaginaWebInteraccion= function (propiedad_empresa_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {propiedad_empresa_constante,propiedad_empresa_constante1} from '../util/propiedad_empresa_constante.js';

import {propiedad_empresa_funcion,propiedad_empresa_funcion1} from '../util/propiedad_empresa_funcion.js';


class propiedad_empresa_webcontrol extends GeneralEntityWebControl {
	
	propiedad_empresa_control=null;
	propiedad_empresa_controlInicial=null;
	propiedad_empresa_controlAuxiliar=null;
		
	//if(propiedad_empresa_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(propiedad_empresa_control) {
		super();
		
		this.propiedad_empresa_control=propiedad_empresa_control;
	}
		
	actualizarVariablesPagina(propiedad_empresa_control) {
		
		if(propiedad_empresa_control.action=="index" || propiedad_empresa_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(propiedad_empresa_control);
			
		} 
		
		
		else if(propiedad_empresa_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(propiedad_empresa_control);
			
		} else if(propiedad_empresa_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(propiedad_empresa_control);
			
		} else if(propiedad_empresa_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(propiedad_empresa_control);		
		
		} else if(propiedad_empresa_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(propiedad_empresa_control);
		
		}  else if(propiedad_empresa_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(propiedad_empresa_control);
		
		} else if(propiedad_empresa_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(propiedad_empresa_control);		
		
		} else if(propiedad_empresa_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(propiedad_empresa_control);		
		
		} else if(propiedad_empresa_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(propiedad_empresa_control);		
		
		} else if(propiedad_empresa_control.action.includes("Busqueda") ||
				  propiedad_empresa_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(propiedad_empresa_control);
			
		} else if(propiedad_empresa_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(propiedad_empresa_control)
		}
		
		
		
	
		else if(propiedad_empresa_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(propiedad_empresa_control);	
		
		} else if(propiedad_empresa_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(propiedad_empresa_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + propiedad_empresa_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(propiedad_empresa_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(propiedad_empresa_control) {
		this.actualizarPaginaAccionesGenerales(propiedad_empresa_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(propiedad_empresa_control) {
		
		this.actualizarPaginaCargaGeneral(propiedad_empresa_control);
		this.actualizarPaginaOrderBy(propiedad_empresa_control);
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);
		this.actualizarPaginaCargaGeneralControles(propiedad_empresa_control);
		//this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(propiedad_empresa_control);
		this.actualizarPaginaAreaBusquedas(propiedad_empresa_control);
		this.actualizarPaginaCargaCombosFK(propiedad_empresa_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(propiedad_empresa_control) {
		//this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(propiedad_empresa_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(propiedad_empresa_control) {
		
		this.actualizarPaginaCargaGeneral(propiedad_empresa_control);
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);
		this.actualizarPaginaCargaGeneralControles(propiedad_empresa_control);
		//this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(propiedad_empresa_control);
		this.actualizarPaginaAreaBusquedas(propiedad_empresa_control);
		this.actualizarPaginaCargaCombosFK(propiedad_empresa_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		//this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		//this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		//this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		//this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		//this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		//this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(propiedad_empresa_control) {
		//this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(propiedad_empresa_control) {
		this.actualizarPaginaAbrirLink(propiedad_empresa_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);				
		//this.actualizarPaginaFormulario(propiedad_empresa_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);
		//this.actualizarPaginaFormulario(propiedad_empresa_control);
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		//this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);
		//this.actualizarPaginaFormulario(propiedad_empresa_control);
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(propiedad_empresa_control) {
		//this.actualizarPaginaFormulario(propiedad_empresa_control);
		this.onLoadCombosDefectoFK(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);
		//this.actualizarPaginaFormulario(propiedad_empresa_control);
		this.onLoadCombosDefectoFK(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);		
		//this.actualizarPaginaAreaMantenimiento(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(propiedad_empresa_control) {
		this.actualizarPaginaAbrirLink(propiedad_empresa_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(propiedad_empresa_control) {
		this.actualizarPaginaTablaDatos(propiedad_empresa_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(propiedad_empresa_control) {
					//super.actualizarPaginaImprimir(propiedad_empresa_control,"propiedad_empresa");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",propiedad_empresa_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("propiedad_empresa_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(propiedad_empresa_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(propiedad_empresa_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(propiedad_empresa_control) {
		//super.actualizarPaginaImprimir(propiedad_empresa_control,"propiedad_empresa");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("propiedad_empresa_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(propiedad_empresa_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",propiedad_empresa_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(propiedad_empresa_control) {
		//super.actualizarPaginaImprimir(propiedad_empresa_control,"propiedad_empresa");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("propiedad_empresa_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(propiedad_empresa_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",propiedad_empresa_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(propiedad_empresa_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(propiedad_empresa_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(propiedad_empresa_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(propiedad_empresa_control);
			
		this.actualizarPaginaAbrirLink(propiedad_empresa_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(propiedad_empresa_control) {
		
		if(propiedad_empresa_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(propiedad_empresa_control);
		}
		
		if(propiedad_empresa_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(propiedad_empresa_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(propiedad_empresa_control) {
		if(propiedad_empresa_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("propiedad_empresaReturnGeneral",JSON.stringify(propiedad_empresa_control.propiedad_empresaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(propiedad_empresa_control) {
		if(propiedad_empresa_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && propiedad_empresa_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(propiedad_empresa_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(propiedad_empresa_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(propiedad_empresa_control, mostrar) {
		
		if(mostrar==true) {
			propiedad_empresa_funcion1.resaltarRestaurarDivsPagina(false,"propiedad_empresa");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				propiedad_empresa_funcion1.resaltarRestaurarDivMantenimiento(false,"propiedad_empresa");
			}			
			
			propiedad_empresa_funcion1.mostrarDivMensaje(true,propiedad_empresa_control.strAuxiliarMensaje,propiedad_empresa_control.strAuxiliarCssMensaje);
		
		} else {
			propiedad_empresa_funcion1.mostrarDivMensaje(false,propiedad_empresa_control.strAuxiliarMensaje,propiedad_empresa_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(propiedad_empresa_control) {
		if(propiedad_empresa_funcion1.esPaginaForm(propiedad_empresa_constante1)==true) {
			window.opener.propiedad_empresa_webcontrol1.actualizarPaginaTablaDatos(propiedad_empresa_control);
		} else {
			this.actualizarPaginaTablaDatos(propiedad_empresa_control);
		}
	}
	
	actualizarPaginaAbrirLink(propiedad_empresa_control) {
		propiedad_empresa_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(propiedad_empresa_control.strAuxiliarUrlPagina);
				
		propiedad_empresa_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(propiedad_empresa_control.strAuxiliarTipo,propiedad_empresa_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(propiedad_empresa_control) {
		propiedad_empresa_funcion1.resaltarRestaurarDivMensaje(true,propiedad_empresa_control.strAuxiliarMensajeAlert,propiedad_empresa_control.strAuxiliarCssMensaje);
			
		if(propiedad_empresa_funcion1.esPaginaForm(propiedad_empresa_constante1)==true) {
			window.opener.propiedad_empresa_funcion1.resaltarRestaurarDivMensaje(true,propiedad_empresa_control.strAuxiliarMensajeAlert,propiedad_empresa_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(propiedad_empresa_control) {
		this.propiedad_empresa_controlInicial=propiedad_empresa_control;
			
		if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(propiedad_empresa_control.strStyleDivArbol,propiedad_empresa_control.strStyleDivContent
																,propiedad_empresa_control.strStyleDivOpcionesBanner,propiedad_empresa_control.strStyleDivExpandirColapsar
																,propiedad_empresa_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=propiedad_empresa_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",propiedad_empresa_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(propiedad_empresa_control) {
		this.actualizarCssBotonesPagina(propiedad_empresa_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(propiedad_empresa_control.tiposReportes,propiedad_empresa_control.tiposReporte
															 	,propiedad_empresa_control.tiposPaginacion,propiedad_empresa_control.tiposAcciones
																,propiedad_empresa_control.tiposColumnasSelect,propiedad_empresa_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(propiedad_empresa_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(propiedad_empresa_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(propiedad_empresa_control);			
	}
	
	actualizarPaginaUsuarioInvitado(propiedad_empresa_control) {
	
		var indexPosition=propiedad_empresa_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=propiedad_empresa_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(propiedad_empresa_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(propiedad_empresa_control.strRecargarFkTiposNinguno!=null && propiedad_empresa_control.strRecargarFkTiposNinguno!='NINGUNO' && propiedad_empresa_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(propiedad_empresa_control) {
		jQuery("#divBusquedapropiedad_empresaAjaxWebPart").css("display",propiedad_empresa_control.strPermisoBusqueda);
		jQuery("#trpropiedad_empresaCabeceraBusquedas").css("display",propiedad_empresa_control.strPermisoBusqueda);
		jQuery("#trBusquedapropiedad_empresa").css("display",propiedad_empresa_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(propiedad_empresa_control.htmlTablaOrderBy!=null
			&& propiedad_empresa_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBypropiedad_empresaAjaxWebPart").html(propiedad_empresa_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//propiedad_empresa_webcontrol1.registrarOrderByActions();
			
		}
			
		if(propiedad_empresa_control.htmlTablaOrderByRel!=null
			&& propiedad_empresa_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelpropiedad_empresaAjaxWebPart").html(propiedad_empresa_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedapropiedad_empresaAjaxWebPart").css("display","none");
			jQuery("#trpropiedad_empresaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedapropiedad_empresa").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(propiedad_empresa_control) {
		
		if(!propiedad_empresa_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(propiedad_empresa_control);
		} else {
			jQuery("#divTablaDatospropiedad_empresasAjaxWebPart").html(propiedad_empresa_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatospropiedad_empresas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatospropiedad_empresas=jQuery("#tblTablaDatospropiedad_empresas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("propiedad_empresa",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',propiedad_empresa_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			propiedad_empresa_webcontrol1.registrarControlesTableEdition(propiedad_empresa_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		propiedad_empresa_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(propiedad_empresa_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("propiedad_empresa_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(propiedad_empresa_control);
		
		const divTablaDatos = document.getElementById("divTablaDatospropiedad_empresasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(propiedad_empresa_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(propiedad_empresa_control);
		
		const divOrderBy = document.getElementById("divOrderBypropiedad_empresaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(propiedad_empresa_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelpropiedad_empresaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(propiedad_empresa_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(propiedad_empresa_control.propiedad_empresaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(propiedad_empresa_control);			
		}
	}
	
	actualizarCamposFilaTabla(propiedad_empresa_control) {
		var i=0;
		
		i=propiedad_empresa_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(propiedad_empresa_control.propiedad_empresaActual.id);
		jQuery("#t-version_row_"+i+"").val(propiedad_empresa_control.propiedad_empresaActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(propiedad_empresa_control.propiedad_empresaActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(propiedad_empresa_control.propiedad_empresaActual.nombre_empresa);
		jQuery("#t-cel_"+i+"_4").val(propiedad_empresa_control.propiedad_empresaActual.calle_1);
		jQuery("#t-cel_"+i+"_5").val(propiedad_empresa_control.propiedad_empresaActual.calle_2);
		jQuery("#t-cel_"+i+"_6").val(propiedad_empresa_control.propiedad_empresaActual.calle_3);
		jQuery("#t-cel_"+i+"_7").val(propiedad_empresa_control.propiedad_empresaActual.barrio);
		jQuery("#t-cel_"+i+"_8").val(propiedad_empresa_control.propiedad_empresaActual.ciudad);
		jQuery("#t-cel_"+i+"_9").val(propiedad_empresa_control.propiedad_empresaActual.estado);
		jQuery("#t-cel_"+i+"_10").val(propiedad_empresa_control.propiedad_empresaActual.codigo_postal);
		jQuery("#t-cel_"+i+"_11").val(propiedad_empresa_control.propiedad_empresaActual.codigo_pais);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(propiedad_empresa_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(propiedad_empresa_control) {
		propiedad_empresa_funcion1.registrarControlesTableValidacionEdition(propiedad_empresa_control,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(propiedad_empresa_control) {
		jQuery("#divResumenpropiedad_empresaActualAjaxWebPart").html(propiedad_empresa_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(propiedad_empresa_control) {
		//jQuery("#divAccionesRelacionespropiedad_empresaAjaxWebPart").html(propiedad_empresa_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("propiedad_empresa_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(propiedad_empresa_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionespropiedad_empresaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		propiedad_empresa_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(propiedad_empresa_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(propiedad_empresa_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(propiedad_empresa_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionpropiedad_empresa();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("propiedad_empresa",id,"general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresaConstante,strParametros);
		
		//propiedad_empresa_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//propiedad_empresa_control
		
	
	}
	
	onLoadCombosDefectoFK(propiedad_empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(propiedad_empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(propiedad_empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(propiedad_empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(propiedad_empresa_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(propiedad_empresa_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(propiedad_empresa_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(propiedad_empresa_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);			
			
			
		
			
			if(propiedad_empresa_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("propiedad_empresa");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("propiedad_empresa");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,"propiedad_empresa");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(propiedad_empresa_control) {
		
		jQuery("#divBusquedapropiedad_empresaAjaxWebPart").css("display",propiedad_empresa_control.strPermisoBusqueda);
		jQuery("#trpropiedad_empresaCabeceraBusquedas").css("display",propiedad_empresa_control.strPermisoBusqueda);
		jQuery("#trBusquedapropiedad_empresa").css("display",propiedad_empresa_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportepropiedad_empresa").css("display",propiedad_empresa_control.strPermisoReporte);			
		jQuery("#tdMostrarTodospropiedad_empresa").attr("style",propiedad_empresa_control.strPermisoMostrarTodos);		
		
		if(propiedad_empresa_control.strPermisoNuevo!=null) {
			jQuery("#tdpropiedad_empresaNuevo").css("display",propiedad_empresa_control.strPermisoNuevo);
			jQuery("#tdpropiedad_empresaNuevoToolBar").css("display",propiedad_empresa_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdpropiedad_empresaDuplicar").css("display",propiedad_empresa_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdpropiedad_empresaDuplicarToolBar").css("display",propiedad_empresa_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdpropiedad_empresaNuevoGuardarCambios").css("display",propiedad_empresa_control.strPermisoNuevo);
			jQuery("#tdpropiedad_empresaNuevoGuardarCambiosToolBar").css("display",propiedad_empresa_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(propiedad_empresa_control.strPermisoActualizar!=null) {
			jQuery("#tdpropiedad_empresaCopiar").css("display",propiedad_empresa_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpropiedad_empresaCopiarToolBar").css("display",propiedad_empresa_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpropiedad_empresaConEditar").css("display",propiedad_empresa_control.strPermisoActualizar);
		}
		
		jQuery("#tdpropiedad_empresaGuardarCambios").css("display",propiedad_empresa_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdpropiedad_empresaGuardarCambiosToolBar").css("display",propiedad_empresa_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdpropiedad_empresaCerrarPagina").css("display",propiedad_empresa_control.strPermisoPopup);		
		jQuery("#tdpropiedad_empresaCerrarPaginaToolBar").css("display",propiedad_empresa_control.strPermisoPopup);
		//jQuery("#trpropiedad_empresaAccionesRelaciones").css("display",propiedad_empresa_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=propiedad_empresa_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + propiedad_empresa_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + propiedad_empresa_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Propiedades Empresas";
		sTituloBanner+=" - " + propiedad_empresa_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + propiedad_empresa_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdpropiedad_empresaRelacionesToolBar").css("display",propiedad_empresa_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultospropiedad_empresa").css("display",propiedad_empresa_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		propiedad_empresa_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		propiedad_empresa_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		propiedad_empresa_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		propiedad_empresa_webcontrol1.registrarEventosControles();
		
		if(propiedad_empresa_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="false") {
			propiedad_empresa_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(propiedad_empresa_constante1.STR_ES_RELACIONES=="true") {
			if(propiedad_empresa_constante1.BIT_ES_PAGINA_FORM==true) {
				propiedad_empresa_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(propiedad_empresa_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(propiedad_empresa_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				propiedad_empresa_webcontrol1.onLoad();
			
			//} else {
				//if(propiedad_empresa_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			propiedad_empresa_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("propiedad_empresa","general","",propiedad_empresa_funcion1,propiedad_empresa_webcontrol1,propiedad_empresa_constante1);	
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

var propiedad_empresa_webcontrol1 = new propiedad_empresa_webcontrol();

//Para ser llamado desde otro archivo (import)
export {propiedad_empresa_webcontrol,propiedad_empresa_webcontrol1};

//Para ser llamado desde window.opener
window.propiedad_empresa_webcontrol1 = propiedad_empresa_webcontrol1;


if(propiedad_empresa_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = propiedad_empresa_webcontrol1.onLoadWindow; 
}

//</script>