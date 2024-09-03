//<script type="text/javascript" language="javascript">



//var grupo_opcionJQueryPaginaWebInteraccion= function (grupo_opcion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {grupo_opcion_constante,grupo_opcion_constante1} from '../util/grupo_opcion_constante.js';

import {grupo_opcion_funcion,grupo_opcion_funcion1} from '../util/grupo_opcion_funcion.js';


class grupo_opcion_webcontrol extends GeneralEntityWebControl {
	
	grupo_opcion_control=null;
	grupo_opcion_controlInicial=null;
	grupo_opcion_controlAuxiliar=null;
		
	//if(grupo_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(grupo_opcion_control) {
		super();
		
		this.grupo_opcion_control=grupo_opcion_control;
	}
		
	actualizarVariablesPagina(grupo_opcion_control) {
		
		if(grupo_opcion_control.action=="index" || grupo_opcion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(grupo_opcion_control);
			
		} 
		
		
		else if(grupo_opcion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(grupo_opcion_control);
			
		} else if(grupo_opcion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(grupo_opcion_control);
			
		} else if(grupo_opcion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(grupo_opcion_control);		
		
		} else if(grupo_opcion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(grupo_opcion_control);
		
		}  else if(grupo_opcion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(grupo_opcion_control);
		
		} else if(grupo_opcion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(grupo_opcion_control);		
		
		} else if(grupo_opcion_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(grupo_opcion_control);		
		
		} else if(grupo_opcion_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(grupo_opcion_control);		
		
		} else if(grupo_opcion_control.action.includes("Busqueda") ||
				  grupo_opcion_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(grupo_opcion_control);
			
		} else if(grupo_opcion_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(grupo_opcion_control)
		}
		
		
		
	
		else if(grupo_opcion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(grupo_opcion_control);	
		
		} else if(grupo_opcion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(grupo_opcion_control);		
		}
	
		else if(grupo_opcion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(grupo_opcion_control);		
		}
	
		else if(grupo_opcion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(grupo_opcion_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + grupo_opcion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(grupo_opcion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(grupo_opcion_control) {
		this.actualizarPaginaAccionesGenerales(grupo_opcion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(grupo_opcion_control) {
		
		this.actualizarPaginaCargaGeneral(grupo_opcion_control);
		this.actualizarPaginaOrderBy(grupo_opcion_control);
		this.actualizarPaginaTablaDatos(grupo_opcion_control);
		this.actualizarPaginaCargaGeneralControles(grupo_opcion_control);
		//this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(grupo_opcion_control);
		this.actualizarPaginaAreaBusquedas(grupo_opcion_control);
		this.actualizarPaginaCargaCombosFK(grupo_opcion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(grupo_opcion_control) {
		//this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(grupo_opcion_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(grupo_opcion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(grupo_opcion_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(grupo_opcion_control) {
		
		this.actualizarPaginaCargaGeneral(grupo_opcion_control);
		this.actualizarPaginaTablaDatos(grupo_opcion_control);
		this.actualizarPaginaCargaGeneralControles(grupo_opcion_control);
		//this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(grupo_opcion_control);
		this.actualizarPaginaAreaBusquedas(grupo_opcion_control);
		this.actualizarPaginaCargaCombosFK(grupo_opcion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		//this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		//this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		//this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(grupo_opcion_control) {
		//this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(grupo_opcion_control) {
		this.actualizarPaginaAbrirLink(grupo_opcion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);				
		//this.actualizarPaginaFormulario(grupo_opcion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);
		//this.actualizarPaginaFormulario(grupo_opcion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);
		//this.actualizarPaginaFormulario(grupo_opcion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(grupo_opcion_control) {
		//this.actualizarPaginaFormulario(grupo_opcion_control);
		this.onLoadCombosDefectoFK(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);
		//this.actualizarPaginaFormulario(grupo_opcion_control);
		this.onLoadCombosDefectoFK(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		//this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(grupo_opcion_control) {
		this.actualizarPaginaAbrirLink(grupo_opcion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(grupo_opcion_control) {
					//super.actualizarPaginaImprimir(grupo_opcion_control,"grupo_opcion");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",grupo_opcion_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("grupo_opcion_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(grupo_opcion_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(grupo_opcion_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(grupo_opcion_control) {
		//super.actualizarPaginaImprimir(grupo_opcion_control,"grupo_opcion");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("grupo_opcion_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(grupo_opcion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",grupo_opcion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(grupo_opcion_control) {
		//super.actualizarPaginaImprimir(grupo_opcion_control,"grupo_opcion");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("grupo_opcion_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(grupo_opcion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",grupo_opcion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(grupo_opcion_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(grupo_opcion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(grupo_opcion_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(grupo_opcion_control);
			
		this.actualizarPaginaAbrirLink(grupo_opcion_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(grupo_opcion_control) {
		this.actualizarPaginaTablaDatos(grupo_opcion_control);
		this.actualizarPaginaFormulario(grupo_opcion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control);		
		this.actualizarPaginaAreaMantenimiento(grupo_opcion_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(grupo_opcion_control) {
		
		if(grupo_opcion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(grupo_opcion_control);
		}
		
		if(grupo_opcion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(grupo_opcion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(grupo_opcion_control) {
		if(grupo_opcion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("grupo_opcionReturnGeneral",JSON.stringify(grupo_opcion_control.grupo_opcionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(grupo_opcion_control) {
		if(grupo_opcion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && grupo_opcion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(grupo_opcion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(grupo_opcion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(grupo_opcion_control, mostrar) {
		
		if(mostrar==true) {
			grupo_opcion_funcion1.resaltarRestaurarDivsPagina(false,"grupo_opcion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				grupo_opcion_funcion1.resaltarRestaurarDivMantenimiento(false,"grupo_opcion");
			}			
			
			grupo_opcion_funcion1.mostrarDivMensaje(true,grupo_opcion_control.strAuxiliarMensaje,grupo_opcion_control.strAuxiliarCssMensaje);
		
		} else {
			grupo_opcion_funcion1.mostrarDivMensaje(false,grupo_opcion_control.strAuxiliarMensaje,grupo_opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(grupo_opcion_control) {
		if(grupo_opcion_funcion1.esPaginaForm(grupo_opcion_constante1)==true) {
			window.opener.grupo_opcion_webcontrol1.actualizarPaginaTablaDatos(grupo_opcion_control);
		} else {
			this.actualizarPaginaTablaDatos(grupo_opcion_control);
		}
	}
	
	actualizarPaginaAbrirLink(grupo_opcion_control) {
		grupo_opcion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(grupo_opcion_control.strAuxiliarUrlPagina);
				
		grupo_opcion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(grupo_opcion_control.strAuxiliarTipo,grupo_opcion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(grupo_opcion_control) {
		grupo_opcion_funcion1.resaltarRestaurarDivMensaje(true,grupo_opcion_control.strAuxiliarMensajeAlert,grupo_opcion_control.strAuxiliarCssMensaje);
			
		if(grupo_opcion_funcion1.esPaginaForm(grupo_opcion_constante1)==true) {
			window.opener.grupo_opcion_funcion1.resaltarRestaurarDivMensaje(true,grupo_opcion_control.strAuxiliarMensajeAlert,grupo_opcion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(grupo_opcion_control) {
		this.grupo_opcion_controlInicial=grupo_opcion_control;
			
		if(grupo_opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(grupo_opcion_control.strStyleDivArbol,grupo_opcion_control.strStyleDivContent
																,grupo_opcion_control.strStyleDivOpcionesBanner,grupo_opcion_control.strStyleDivExpandirColapsar
																,grupo_opcion_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=grupo_opcion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",grupo_opcion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(grupo_opcion_control) {
		this.actualizarCssBotonesPagina(grupo_opcion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(grupo_opcion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(grupo_opcion_control.tiposReportes,grupo_opcion_control.tiposReporte
															 	,grupo_opcion_control.tiposPaginacion,grupo_opcion_control.tiposAcciones
																,grupo_opcion_control.tiposColumnasSelect,grupo_opcion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(grupo_opcion_control.tiposRelaciones,grupo_opcion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(grupo_opcion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(grupo_opcion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(grupo_opcion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(grupo_opcion_control) {
	
		var indexPosition=grupo_opcion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=grupo_opcion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(grupo_opcion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(grupo_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",grupo_opcion_control.strRecargarFkTipos,",")) { 
				grupo_opcion_webcontrol1.cargarCombosmodulosFK(grupo_opcion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(grupo_opcion_control.strRecargarFkTiposNinguno!=null && grupo_opcion_control.strRecargarFkTiposNinguno!='NINGUNO' && grupo_opcion_control.strRecargarFkTiposNinguno!='') {
			
				if(grupo_opcion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modulo",grupo_opcion_control.strRecargarFkTiposNinguno,",")) { 
					grupo_opcion_webcontrol1.cargarCombosmodulosFK(grupo_opcion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablamoduloFK(grupo_opcion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,grupo_opcion_funcion1,grupo_opcion_control.modulosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(grupo_opcion_control) {
		jQuery("#divBusquedagrupo_opcionAjaxWebPart").css("display",grupo_opcion_control.strPermisoBusqueda);
		jQuery("#trgrupo_opcionCabeceraBusquedas").css("display",grupo_opcion_control.strPermisoBusqueda);
		jQuery("#trBusquedagrupo_opcion").css("display",grupo_opcion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(grupo_opcion_control.htmlTablaOrderBy!=null
			&& grupo_opcion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBygrupo_opcionAjaxWebPart").html(grupo_opcion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//grupo_opcion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(grupo_opcion_control.htmlTablaOrderByRel!=null
			&& grupo_opcion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelgrupo_opcionAjaxWebPart").html(grupo_opcion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(grupo_opcion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedagrupo_opcionAjaxWebPart").css("display","none");
			jQuery("#trgrupo_opcionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedagrupo_opcion").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(grupo_opcion_control) {
		
		if(!grupo_opcion_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(grupo_opcion_control);
		} else {
			jQuery("#divTablaDatosgrupo_opcionsAjaxWebPart").html(grupo_opcion_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosgrupo_opcions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(grupo_opcion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosgrupo_opcions=jQuery("#tblTablaDatosgrupo_opcions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("grupo_opcion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',grupo_opcion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			grupo_opcion_webcontrol1.registrarControlesTableEdition(grupo_opcion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		grupo_opcion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(grupo_opcion_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("grupo_opcion_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(grupo_opcion_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosgrupo_opcionsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(grupo_opcion_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(grupo_opcion_control);
		
		const divOrderBy = document.getElementById("divOrderBygrupo_opcionAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(grupo_opcion_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelgrupo_opcionAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(grupo_opcion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(grupo_opcion_control.grupo_opcionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(grupo_opcion_control);			
		}
	}
	
	actualizarCamposFilaTabla(grupo_opcion_control) {
		var i=0;
		
		i=grupo_opcion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(grupo_opcion_control.grupo_opcionActual.id);
		jQuery("#t-version_row_"+i+"").val(grupo_opcion_control.grupo_opcionActual.versionRow);
		
		if(grupo_opcion_control.grupo_opcionActual.id_modulo!=null && grupo_opcion_control.grupo_opcionActual.id_modulo>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != grupo_opcion_control.grupo_opcionActual.id_modulo) {
				jQuery("#t-cel_"+i+"_2").val(grupo_opcion_control.grupo_opcionActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(grupo_opcion_control.grupo_opcionActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(grupo_opcion_control.grupo_opcionActual.nombre_principal);
		jQuery("#t-cel_"+i+"_5").val(grupo_opcion_control.grupo_opcionActual.orden);
		jQuery("#t-cel_"+i+"_6").prop('checked',grupo_opcion_control.grupo_opcionActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(grupo_opcion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionopcion").click(function(){
		jQuery("#tblTablaDatosgrupo_opcions").on("click",".imgrelacionopcion", function () {

			var idActual=jQuery(this).attr("idactualgrupo_opcion");

			grupo_opcion_webcontrol1.registrarSesionParaopciones(idActual);
		});				
	}
		
	

	registrarSesionParaopciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"grupo_opcion","opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1,"es","");
	}
	
	registrarControlesTableEdition(grupo_opcion_control) {
		grupo_opcion_funcion1.registrarControlesTableValidacionEdition(grupo_opcion_control,grupo_opcion_webcontrol1,grupo_opcion_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(grupo_opcion_control) {
		jQuery("#divResumengrupo_opcionActualAjaxWebPart").html(grupo_opcion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(grupo_opcion_control) {
		//jQuery("#divAccionesRelacionesgrupo_opcionAjaxWebPart").html(grupo_opcion_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("grupo_opcion_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(grupo_opcion_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesgrupo_opcionAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		grupo_opcion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(grupo_opcion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(grupo_opcion_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(grupo_opcion_control) {
		
		if(grupo_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+grupo_opcion_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",grupo_opcion_control.strVisibleFK_Idmodulo);
			jQuery("#tblstrVisible"+grupo_opcion_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",grupo_opcion_control.strVisibleFK_Idmodulo);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciongrupo_opcion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("grupo_opcion",id,"seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);		
	}
	
	

	abrirBusquedaParamodulo(strNombreCampoBusqueda){//idActual
		grupo_opcion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("grupo_opcion","modulo","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionopcion").click(function(){

			var idActual=jQuery(this).attr("idactualgrupo_opcion");

			grupo_opcion_webcontrol1.registrarSesionParaopciones(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcionConstante,strParametros);
		
		//grupo_opcion_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosmodulosFK(grupo_opcion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo",grupo_opcion_control.modulosFK);

		if(grupo_opcion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+grupo_opcion_control.idFilaTablaActual+"_2",grupo_opcion_control.modulosFK);
		}
	};

	
	
	registrarComboActionChangeCombosmodulosFK(grupo_opcion_control) {

	};

	
	
	setDefectoValorCombosmodulosFK(grupo_opcion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(grupo_opcion_control.idmoduloDefaultFK>-1 && jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").val() != grupo_opcion_control.idmoduloDefaultFK) {
				jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo").val(grupo_opcion_control.idmoduloDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//grupo_opcion_control
		
	
	}
	
	onLoadCombosDefectoFK(grupo_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(grupo_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(grupo_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",grupo_opcion_control.strRecargarFkTipos,",")) { 
				grupo_opcion_webcontrol1.setDefectoValorCombosmodulosFK(grupo_opcion_control);
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
	onLoadCombosEventosFK(grupo_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(grupo_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(grupo_opcion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",grupo_opcion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				grupo_opcion_webcontrol1.registrarComboActionChangeCombosmodulosFK(grupo_opcion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(grupo_opcion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(grupo_opcion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(grupo_opcion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(grupo_opcion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("grupo_opcion","FK_Idmodulo","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
		
			
			if(grupo_opcion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("grupo_opcion");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("grupo_opcion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(grupo_opcion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,"grupo_opcion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("modulo","id_modulo","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+grupo_opcion_constante1.STR_SUFIJO+"-id_modulo_img_busqueda").click(function(){
				grupo_opcion_webcontrol1.abrirBusquedaParamodulo("id_modulo");
				//alert(jQuery('#form-id_modulo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("grupo_opcion");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(grupo_opcion_control) {
		
		jQuery("#divBusquedagrupo_opcionAjaxWebPart").css("display",grupo_opcion_control.strPermisoBusqueda);
		jQuery("#trgrupo_opcionCabeceraBusquedas").css("display",grupo_opcion_control.strPermisoBusqueda);
		jQuery("#trBusquedagrupo_opcion").css("display",grupo_opcion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportegrupo_opcion").css("display",grupo_opcion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosgrupo_opcion").attr("style",grupo_opcion_control.strPermisoMostrarTodos);		
		
		if(grupo_opcion_control.strPermisoNuevo!=null) {
			jQuery("#tdgrupo_opcionNuevo").css("display",grupo_opcion_control.strPermisoNuevo);
			jQuery("#tdgrupo_opcionNuevoToolBar").css("display",grupo_opcion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdgrupo_opcionDuplicar").css("display",grupo_opcion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdgrupo_opcionDuplicarToolBar").css("display",grupo_opcion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdgrupo_opcionNuevoGuardarCambios").css("display",grupo_opcion_control.strPermisoNuevo);
			jQuery("#tdgrupo_opcionNuevoGuardarCambiosToolBar").css("display",grupo_opcion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(grupo_opcion_control.strPermisoActualizar!=null) {
			jQuery("#tdgrupo_opcionCopiar").css("display",grupo_opcion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdgrupo_opcionCopiarToolBar").css("display",grupo_opcion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdgrupo_opcionConEditar").css("display",grupo_opcion_control.strPermisoActualizar);
		}
		
		jQuery("#tdgrupo_opcionGuardarCambios").css("display",grupo_opcion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdgrupo_opcionGuardarCambiosToolBar").css("display",grupo_opcion_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdgrupo_opcionCerrarPagina").css("display",grupo_opcion_control.strPermisoPopup);		
		jQuery("#tdgrupo_opcionCerrarPaginaToolBar").css("display",grupo_opcion_control.strPermisoPopup);
		//jQuery("#trgrupo_opcionAccionesRelaciones").css("display",grupo_opcion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=grupo_opcion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + grupo_opcion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + grupo_opcion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Grupo Opcions";
		sTituloBanner+=" - " + grupo_opcion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + grupo_opcion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdgrupo_opcionRelacionesToolBar").css("display",grupo_opcion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosgrupo_opcion").css("display",grupo_opcion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		grupo_opcion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		grupo_opcion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		grupo_opcion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		grupo_opcion_webcontrol1.registrarEventosControles();
		
		if(grupo_opcion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(grupo_opcion_constante1.STR_ES_RELACIONADO=="false") {
			grupo_opcion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(grupo_opcion_constante1.STR_ES_RELACIONES=="true") {
			if(grupo_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				grupo_opcion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(grupo_opcion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(grupo_opcion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				grupo_opcion_webcontrol1.onLoad();
			
			//} else {
				//if(grupo_opcion_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			grupo_opcion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("grupo_opcion","seguridad","",grupo_opcion_funcion1,grupo_opcion_webcontrol1,grupo_opcion_constante1);	
	}
}

var grupo_opcion_webcontrol1 = new grupo_opcion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {grupo_opcion_webcontrol,grupo_opcion_webcontrol1};

//Para ser llamado desde window.opener
window.grupo_opcion_webcontrol1 = grupo_opcion_webcontrol1;


if(grupo_opcion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = grupo_opcion_webcontrol1.onLoadWindow; 
}

//</script>