//<script type="text/javascript" language="javascript">



//var centro_costoJQueryPaginaWebInteraccion= function (centro_costo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {centro_costo_constante,centro_costo_constante1} from '../util/centro_costo_constante.js';

import {centro_costo_funcion,centro_costo_funcion1} from '../util/centro_costo_funcion.js';


class centro_costo_webcontrol extends GeneralEntityWebControl {
	
	centro_costo_control=null;
	centro_costo_controlInicial=null;
	centro_costo_controlAuxiliar=null;
		
	//if(centro_costo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(centro_costo_control) {
		super();
		
		this.centro_costo_control=centro_costo_control;
	}
		
	actualizarVariablesPagina(centro_costo_control) {
		
		if(centro_costo_control.action=="index" || centro_costo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(centro_costo_control);
			
		} 
		
		
		else if(centro_costo_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(centro_costo_control);
		
		} else if(centro_costo_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(centro_costo_control);
		
		} else if(centro_costo_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(centro_costo_control);
		
		} else if(centro_costo_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(centro_costo_control);
			
		} else if(centro_costo_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(centro_costo_control);
			
		} else if(centro_costo_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(centro_costo_control);
		
		} else if(centro_costo_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(centro_costo_control);		
		
		} else if(centro_costo_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(centro_costo_control);
		
		} else if(centro_costo_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(centro_costo_control);
		
		} else if(centro_costo_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(centro_costo_control);
		
		} else if(centro_costo_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(centro_costo_control);
		
		}  else if(centro_costo_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(centro_costo_control);
		
		} else if(centro_costo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(centro_costo_control);
		
		} else if(centro_costo_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(centro_costo_control);
		
		} else if(centro_costo_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(centro_costo_control);
		
		} else if(centro_costo_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(centro_costo_control);
		
		} else if(centro_costo_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(centro_costo_control);
		
		} else if(centro_costo_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(centro_costo_control);
		
		} else if(centro_costo_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(centro_costo_control);
		
		} else if(centro_costo_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(centro_costo_control);
		
		} else if(centro_costo_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(centro_costo_control);		
		
		} else if(centro_costo_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(centro_costo_control);		
		
		} else if(centro_costo_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(centro_costo_control);		
		
		} else if(centro_costo_control.action.includes("Busqueda") ||
				  centro_costo_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(centro_costo_control);
			
		} else if(centro_costo_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(centro_costo_control)
		}
		
		
		
	
		else if(centro_costo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(centro_costo_control);	
		
		} else if(centro_costo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(centro_costo_control);		
		}
	
		else if(centro_costo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(centro_costo_control);		
		}
	
		else if(centro_costo_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(centro_costo_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + centro_costo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(centro_costo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(centro_costo_control) {
		this.actualizarPaginaAccionesGenerales(centro_costo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(centro_costo_control) {
		
		this.actualizarPaginaCargaGeneral(centro_costo_control);
		this.actualizarPaginaOrderBy(centro_costo_control);
		this.actualizarPaginaTablaDatos(centro_costo_control);
		this.actualizarPaginaCargaGeneralControles(centro_costo_control);
		//this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(centro_costo_control);
		this.actualizarPaginaAreaBusquedas(centro_costo_control);
		this.actualizarPaginaCargaCombosFK(centro_costo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(centro_costo_control) {
		//this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(centro_costo_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(centro_costo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(centro_costo_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(centro_costo_control) {
		
		this.actualizarPaginaCargaGeneral(centro_costo_control);
		this.actualizarPaginaTablaDatos(centro_costo_control);
		this.actualizarPaginaCargaGeneralControles(centro_costo_control);
		//this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(centro_costo_control);
		this.actualizarPaginaAreaBusquedas(centro_costo_control);
		this.actualizarPaginaCargaCombosFK(centro_costo_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		//this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		//this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		//this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		//this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		//this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		//this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(centro_costo_control) {
		//this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(centro_costo_control) {
		this.actualizarPaginaAbrirLink(centro_costo_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);				
		//this.actualizarPaginaFormulario(centro_costo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);
		//this.actualizarPaginaFormulario(centro_costo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		//this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);
		//this.actualizarPaginaFormulario(centro_costo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(centro_costo_control) {
		//this.actualizarPaginaFormulario(centro_costo_control);
		this.onLoadCombosDefectoFK(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);
		//this.actualizarPaginaFormulario(centro_costo_control);
		this.onLoadCombosDefectoFK(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		//this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(centro_costo_control) {
		this.actualizarPaginaAbrirLink(centro_costo_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(centro_costo_control) {
					//super.actualizarPaginaImprimir(centro_costo_control,"centro_costo");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",centro_costo_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("centro_costo_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(centro_costo_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(centro_costo_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(centro_costo_control) {
		//super.actualizarPaginaImprimir(centro_costo_control,"centro_costo");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("centro_costo_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(centro_costo_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",centro_costo_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(centro_costo_control) {
		//super.actualizarPaginaImprimir(centro_costo_control,"centro_costo");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("centro_costo_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(centro_costo_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",centro_costo_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(centro_costo_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(centro_costo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(centro_costo_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(centro_costo_control);
			
		this.actualizarPaginaAbrirLink(centro_costo_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(centro_costo_control) {
		this.actualizarPaginaTablaDatos(centro_costo_control);
		this.actualizarPaginaFormulario(centro_costo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(centro_costo_control);		
		this.actualizarPaginaAreaMantenimiento(centro_costo_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(centro_costo_control) {
		
		if(centro_costo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(centro_costo_control);
		}
		
		if(centro_costo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(centro_costo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(centro_costo_control) {
		if(centro_costo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("centro_costoReturnGeneral",JSON.stringify(centro_costo_control.centro_costoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(centro_costo_control) {
		if(centro_costo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && centro_costo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(centro_costo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(centro_costo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(centro_costo_control, mostrar) {
		
		if(mostrar==true) {
			centro_costo_funcion1.resaltarRestaurarDivsPagina(false,"centro_costo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				centro_costo_funcion1.resaltarRestaurarDivMantenimiento(false,"centro_costo");
			}			
			
			centro_costo_funcion1.mostrarDivMensaje(true,centro_costo_control.strAuxiliarMensaje,centro_costo_control.strAuxiliarCssMensaje);
		
		} else {
			centro_costo_funcion1.mostrarDivMensaje(false,centro_costo_control.strAuxiliarMensaje,centro_costo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(centro_costo_control) {
		if(centro_costo_funcion1.esPaginaForm(centro_costo_constante1)==true) {
			window.opener.centro_costo_webcontrol1.actualizarPaginaTablaDatos(centro_costo_control);
		} else {
			this.actualizarPaginaTablaDatos(centro_costo_control);
		}
	}
	
	actualizarPaginaAbrirLink(centro_costo_control) {
		centro_costo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(centro_costo_control.strAuxiliarUrlPagina);
				
		centro_costo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(centro_costo_control.strAuxiliarTipo,centro_costo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(centro_costo_control) {
		centro_costo_funcion1.resaltarRestaurarDivMensaje(true,centro_costo_control.strAuxiliarMensajeAlert,centro_costo_control.strAuxiliarCssMensaje);
			
		if(centro_costo_funcion1.esPaginaForm(centro_costo_constante1)==true) {
			window.opener.centro_costo_funcion1.resaltarRestaurarDivMensaje(true,centro_costo_control.strAuxiliarMensajeAlert,centro_costo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(centro_costo_control) {
		this.centro_costo_controlInicial=centro_costo_control;
			
		if(centro_costo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(centro_costo_control.strStyleDivArbol,centro_costo_control.strStyleDivContent
																,centro_costo_control.strStyleDivOpcionesBanner,centro_costo_control.strStyleDivExpandirColapsar
																,centro_costo_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=centro_costo_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",centro_costo_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(centro_costo_control) {
		this.actualizarCssBotonesPagina(centro_costo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(centro_costo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(centro_costo_control.tiposReportes,centro_costo_control.tiposReporte
															 	,centro_costo_control.tiposPaginacion,centro_costo_control.tiposAcciones
																,centro_costo_control.tiposColumnasSelect,centro_costo_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(centro_costo_control.tiposRelaciones,centro_costo_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(centro_costo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(centro_costo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(centro_costo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(centro_costo_control) {
	
		var indexPosition=centro_costo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=centro_costo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(centro_costo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(centro_costo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",centro_costo_control.strRecargarFkTipos,",")) { 
				centro_costo_webcontrol1.cargarCombosempresasFK(centro_costo_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(centro_costo_control.strRecargarFkTiposNinguno!=null && centro_costo_control.strRecargarFkTiposNinguno!='NINGUNO' && centro_costo_control.strRecargarFkTiposNinguno!='') {
			
				if(centro_costo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",centro_costo_control.strRecargarFkTiposNinguno,",")) { 
					centro_costo_webcontrol1.cargarCombosempresasFK(centro_costo_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(centro_costo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,centro_costo_funcion1,centro_costo_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(centro_costo_control) {
		jQuery("#divBusquedacentro_costoAjaxWebPart").css("display",centro_costo_control.strPermisoBusqueda);
		jQuery("#trcentro_costoCabeceraBusquedas").css("display",centro_costo_control.strPermisoBusqueda);
		jQuery("#trBusquedacentro_costo").css("display",centro_costo_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(centro_costo_control.htmlTablaOrderBy!=null
			&& centro_costo_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycentro_costoAjaxWebPart").html(centro_costo_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//centro_costo_webcontrol1.registrarOrderByActions();
			
		}
			
		if(centro_costo_control.htmlTablaOrderByRel!=null
			&& centro_costo_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcentro_costoAjaxWebPart").html(centro_costo_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(centro_costo_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacentro_costoAjaxWebPart").css("display","none");
			jQuery("#trcentro_costoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacentro_costo").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(centro_costo_control) {
		
		if(!centro_costo_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(centro_costo_control);
		} else {
			jQuery("#divTablaDatoscentro_costosAjaxWebPart").html(centro_costo_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscentro_costos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(centro_costo_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscentro_costos=jQuery("#tblTablaDatoscentro_costos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("centro_costo",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',centro_costo_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			centro_costo_webcontrol1.registrarControlesTableEdition(centro_costo_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		centro_costo_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(centro_costo_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("centro_costo_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(centro_costo_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscentro_costosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(centro_costo_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(centro_costo_control);
		
		const divOrderBy = document.getElementById("divOrderBycentro_costoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(centro_costo_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcentro_costoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(centro_costo_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(centro_costo_control.centro_costoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(centro_costo_control);			
		}
	}
	
	actualizarCamposFilaTabla(centro_costo_control) {
		var i=0;
		
		i=centro_costo_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(centro_costo_control.centro_costoActual.id);
		jQuery("#t-version_row_"+i+"").val(centro_costo_control.centro_costoActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(centro_costo_control.centro_costoActual.versionRow);
		
		if(centro_costo_control.centro_costoActual.id_empresa!=null && centro_costo_control.centro_costoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != centro_costo_control.centro_costoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(centro_costo_control.centro_costoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(centro_costo_control.centro_costoActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(centro_costo_control.centro_costoActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(centro_costo_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_predefinido").click(function(){
		jQuery("#tblTablaDatoscentro_costos").on("click",".imgrelacionasiento_predefinido", function () {

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento").click(function(){
		jQuery("#tblTablaDatoscentro_costos").on("click",".imgrelacionasiento", function () {

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasientos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_automatico_detalle").click(function(){
		jQuery("#tblTablaDatoscentro_costos").on("click",".imgrelacionasiento_automatico_detalle", function () {

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_automatico").click(function(){
		jQuery("#tblTablaDatoscentro_costos").on("click",".imgrelacionasiento_automatico", function () {

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasiento_automaticos(idActual);
		});				
	}
		
	

	registrarSesionParaasiento_predefinidos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"centro_costo","asiento_predefinido","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1,"s","");
	}

	registrarSesionParaasientos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"centro_costo","asiento","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1,"s","");
	}

	registrarSesionParaasiento_automatico_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"centro_costo","asiento_automatico_detalle","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1,"s","");
	}

	registrarSesionParaasiento_automaticos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"centro_costo","asiento_automatico","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1,"s","");
	}
	
	registrarControlesTableEdition(centro_costo_control) {
		centro_costo_funcion1.registrarControlesTableValidacionEdition(centro_costo_control,centro_costo_webcontrol1,centro_costo_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(centro_costo_control) {
		jQuery("#divResumencentro_costoActualAjaxWebPart").html(centro_costo_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(centro_costo_control) {
		//jQuery("#divAccionesRelacionescentro_costoAjaxWebPart").html(centro_costo_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("centro_costo_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(centro_costo_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescentro_costoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		centro_costo_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(centro_costo_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(centro_costo_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(centro_costo_control) {
		
		if(centro_costo_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+centro_costo_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",centro_costo_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+centro_costo_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",centro_costo_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncentro_costo();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("centro_costo",id,"contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		centro_costo_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("centro_costo","empresa","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionasiento_predefinido").click(function(){

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});
		jQuery("#imgdivrelacionasiento").click(function(){

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasientos(idActual);
		});
		jQuery("#imgdivrelacionasiento_automatico_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		});
		jQuery("#imgdivrelacionasiento_automatico").click(function(){

			var idActual=jQuery(this).attr("idactualcentro_costo");

			centro_costo_webcontrol1.registrarSesionParaasiento_automaticos(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costoConstante,strParametros);
		
		//centro_costo_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(centro_costo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa",centro_costo_control.empresasFK);

		if(centro_costo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+centro_costo_control.idFilaTablaActual+"_3",centro_costo_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(centro_costo_control) {

	};

	
	
	setDefectoValorCombosempresasFK(centro_costo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(centro_costo_control.idempresaDefaultFK>-1 && jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").val() != centro_costo_control.idempresaDefaultFK) {
				jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa").val(centro_costo_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//centro_costo_control
		
	
	}
	
	onLoadCombosDefectoFK(centro_costo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(centro_costo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(centro_costo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",centro_costo_control.strRecargarFkTipos,",")) { 
				centro_costo_webcontrol1.setDefectoValorCombosempresasFK(centro_costo_control);
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
	onLoadCombosEventosFK(centro_costo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(centro_costo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(centro_costo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",centro_costo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				centro_costo_webcontrol1.registrarComboActionChangeCombosempresasFK(centro_costo_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(centro_costo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(centro_costo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(centro_costo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(centro_costo_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("centro_costo","FK_Idempresa","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
		
			
			if(centro_costo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("centro_costo");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("centro_costo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(centro_costo_funcion1,centro_costo_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(centro_costo_funcion1,centro_costo_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(centro_costo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,"centro_costo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+centro_costo_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				centro_costo_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("centro_costo");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(centro_costo_control) {
		
		jQuery("#divBusquedacentro_costoAjaxWebPart").css("display",centro_costo_control.strPermisoBusqueda);
		jQuery("#trcentro_costoCabeceraBusquedas").css("display",centro_costo_control.strPermisoBusqueda);
		jQuery("#trBusquedacentro_costo").css("display",centro_costo_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecentro_costo").css("display",centro_costo_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscentro_costo").attr("style",centro_costo_control.strPermisoMostrarTodos);		
		
		if(centro_costo_control.strPermisoNuevo!=null) {
			jQuery("#tdcentro_costoNuevo").css("display",centro_costo_control.strPermisoNuevo);
			jQuery("#tdcentro_costoNuevoToolBar").css("display",centro_costo_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcentro_costoDuplicar").css("display",centro_costo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcentro_costoDuplicarToolBar").css("display",centro_costo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcentro_costoNuevoGuardarCambios").css("display",centro_costo_control.strPermisoNuevo);
			jQuery("#tdcentro_costoNuevoGuardarCambiosToolBar").css("display",centro_costo_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(centro_costo_control.strPermisoActualizar!=null) {
			jQuery("#tdcentro_costoCopiar").css("display",centro_costo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcentro_costoCopiarToolBar").css("display",centro_costo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcentro_costoConEditar").css("display",centro_costo_control.strPermisoActualizar);
		}
		
		jQuery("#tdcentro_costoGuardarCambios").css("display",centro_costo_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcentro_costoGuardarCambiosToolBar").css("display",centro_costo_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcentro_costoCerrarPagina").css("display",centro_costo_control.strPermisoPopup);		
		jQuery("#tdcentro_costoCerrarPaginaToolBar").css("display",centro_costo_control.strPermisoPopup);
		//jQuery("#trcentro_costoAccionesRelaciones").css("display",centro_costo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=centro_costo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + centro_costo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + centro_costo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Centro Costos";
		sTituloBanner+=" - " + centro_costo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + centro_costo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcentro_costoRelacionesToolBar").css("display",centro_costo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscentro_costo").css("display",centro_costo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		centro_costo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		centro_costo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		centro_costo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		centro_costo_webcontrol1.registrarEventosControles();
		
		if(centro_costo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(centro_costo_constante1.STR_ES_RELACIONADO=="false") {
			centro_costo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(centro_costo_constante1.STR_ES_RELACIONES=="true") {
			if(centro_costo_constante1.BIT_ES_PAGINA_FORM==true) {
				centro_costo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(centro_costo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(centro_costo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				centro_costo_webcontrol1.onLoad();
			
			//} else {
				//if(centro_costo_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			centro_costo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("centro_costo","contabilidad","",centro_costo_funcion1,centro_costo_webcontrol1,centro_costo_constante1);	
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

var centro_costo_webcontrol1 = new centro_costo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {centro_costo_webcontrol,centro_costo_webcontrol1};

//Para ser llamado desde window.opener
window.centro_costo_webcontrol1 = centro_costo_webcontrol1;


if(centro_costo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = centro_costo_webcontrol1.onLoadWindow; 
}

//</script>