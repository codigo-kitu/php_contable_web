//<script type="text/javascript" language="javascript">



//var tipo_fondoJQueryPaginaWebInteraccion= function (tipo_fondo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_fondo_constante,tipo_fondo_constante1} from '../util/tipo_fondo_constante.js';

import {tipo_fondo_funcion,tipo_fondo_funcion1} from '../util/tipo_fondo_funcion.js';


class tipo_fondo_webcontrol extends GeneralEntityWebControl {
	
	tipo_fondo_control=null;
	tipo_fondo_controlInicial=null;
	tipo_fondo_controlAuxiliar=null;
		
	//if(tipo_fondo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_fondo_control) {
		super();
		
		this.tipo_fondo_control=tipo_fondo_control;
	}
		
	actualizarVariablesPagina(tipo_fondo_control) {
		
		if(tipo_fondo_control.action=="index" || tipo_fondo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_fondo_control);
			
		} 
		
		
		else if(tipo_fondo_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(tipo_fondo_control);
			
		} else if(tipo_fondo_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(tipo_fondo_control);
			
		} else if(tipo_fondo_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_fondo_control);		
		
		} else if(tipo_fondo_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(tipo_fondo_control);
		
		}  else if(tipo_fondo_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_fondo_control);
		
		} else if(tipo_fondo_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_fondo_control);		
		
		} else if(tipo_fondo_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(tipo_fondo_control);		
		
		} else if(tipo_fondo_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(tipo_fondo_control);		
		
		} else if(tipo_fondo_control.action.includes("Busqueda") ||
				  tipo_fondo_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(tipo_fondo_control);
			
		} else if(tipo_fondo_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(tipo_fondo_control)
		}
		
		
		
	
		else if(tipo_fondo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_fondo_control);	
		
		} else if(tipo_fondo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_fondo_control);		
		}
	
		else if(tipo_fondo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_fondo_control);		
		}
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tipo_fondo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(tipo_fondo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tipo_fondo_control) {
		this.actualizarPaginaAccionesGenerales(tipo_fondo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tipo_fondo_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_fondo_control);
		this.actualizarPaginaOrderBy(tipo_fondo_control);
		this.actualizarPaginaTablaDatos(tipo_fondo_control);
		this.actualizarPaginaCargaGeneralControles(tipo_fondo_control);
		//this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_fondo_control);
		this.actualizarPaginaAreaBusquedas(tipo_fondo_control);
		this.actualizarPaginaCargaCombosFK(tipo_fondo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_fondo_control) {
		//this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_fondo_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_fondo_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_fondo_control);
		this.actualizarPaginaTablaDatos(tipo_fondo_control);
		this.actualizarPaginaCargaGeneralControles(tipo_fondo_control);
		//this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_fondo_control);
		this.actualizarPaginaAreaBusquedas(tipo_fondo_control);
		this.actualizarPaginaCargaCombosFK(tipo_fondo_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		//this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		//this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		//this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(tipo_fondo_control) {
		//this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_fondo_control) {
		this.actualizarPaginaAbrirLink(tipo_fondo_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);				
		//this.actualizarPaginaFormulario(tipo_fondo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);
		//this.actualizarPaginaFormulario(tipo_fondo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);
		//this.actualizarPaginaFormulario(tipo_fondo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(tipo_fondo_control) {
		//this.actualizarPaginaFormulario(tipo_fondo_control);
		this.onLoadCombosDefectoFK(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);
		//this.actualizarPaginaFormulario(tipo_fondo_control);
		this.onLoadCombosDefectoFK(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_fondo_control) {
		this.actualizarPaginaAbrirLink(tipo_fondo_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_fondo_control) {
					//super.actualizarPaginaImprimir(tipo_fondo_control,"tipo_fondo");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_fondo_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("tipo_fondo_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(tipo_fondo_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_fondo_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_fondo_control) {
		//super.actualizarPaginaImprimir(tipo_fondo_control,"tipo_fondo");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("tipo_fondo_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(tipo_fondo_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_fondo_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(tipo_fondo_control) {
		//super.actualizarPaginaImprimir(tipo_fondo_control,"tipo_fondo");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("tipo_fondo_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(tipo_fondo_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_fondo_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_fondo_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(tipo_fondo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(tipo_fondo_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(tipo_fondo_control);
			
		this.actualizarPaginaAbrirLink(tipo_fondo_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(tipo_fondo_control) {
		this.actualizarPaginaTablaDatos(tipo_fondo_control);
		this.actualizarPaginaFormulario(tipo_fondo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_fondo_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tipo_fondo_control) {
		
		if(tipo_fondo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_fondo_control);
		}
		
		if(tipo_fondo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(tipo_fondo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tipo_fondo_control) {
		if(tipo_fondo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tipo_fondoReturnGeneral",JSON.stringify(tipo_fondo_control.tipo_fondoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tipo_fondo_control) {
		if(tipo_fondo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_fondo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_fondo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_fondo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tipo_fondo_control, mostrar) {
		
		if(mostrar==true) {
			tipo_fondo_funcion1.resaltarRestaurarDivsPagina(false,"tipo_fondo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_fondo_funcion1.resaltarRestaurarDivMantenimiento(false,"tipo_fondo");
			}			
			
			tipo_fondo_funcion1.mostrarDivMensaje(true,tipo_fondo_control.strAuxiliarMensaje,tipo_fondo_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_fondo_funcion1.mostrarDivMensaje(false,tipo_fondo_control.strAuxiliarMensaje,tipo_fondo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_fondo_control) {
		if(tipo_fondo_funcion1.esPaginaForm(tipo_fondo_constante1)==true) {
			window.opener.tipo_fondo_webcontrol1.actualizarPaginaTablaDatos(tipo_fondo_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_fondo_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_fondo_control) {
		tipo_fondo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_fondo_control.strAuxiliarUrlPagina);
				
		tipo_fondo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_fondo_control.strAuxiliarTipo,tipo_fondo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_fondo_control) {
		tipo_fondo_funcion1.resaltarRestaurarDivMensaje(true,tipo_fondo_control.strAuxiliarMensajeAlert,tipo_fondo_control.strAuxiliarCssMensaje);
			
		if(tipo_fondo_funcion1.esPaginaForm(tipo_fondo_constante1)==true) {
			window.opener.tipo_fondo_funcion1.resaltarRestaurarDivMensaje(true,tipo_fondo_control.strAuxiliarMensajeAlert,tipo_fondo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(tipo_fondo_control) {
		this.tipo_fondo_controlInicial=tipo_fondo_control;
			
		if(tipo_fondo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_fondo_control.strStyleDivArbol,tipo_fondo_control.strStyleDivContent
																,tipo_fondo_control.strStyleDivOpcionesBanner,tipo_fondo_control.strStyleDivExpandirColapsar
																,tipo_fondo_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=tipo_fondo_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",tipo_fondo_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(tipo_fondo_control) {
		this.actualizarCssBotonesPagina(tipo_fondo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_fondo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_fondo_control.tiposReportes,tipo_fondo_control.tiposReporte
															 	,tipo_fondo_control.tiposPaginacion,tipo_fondo_control.tiposAcciones
																,tipo_fondo_control.tiposColumnasSelect,tipo_fondo_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_fondo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_fondo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_fondo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(tipo_fondo_control) {
	
		var indexPosition=tipo_fondo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_fondo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(tipo_fondo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_fondo_control.strRecargarFkTiposNinguno!=null && tipo_fondo_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_fondo_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(tipo_fondo_control) {
		jQuery("#divBusquedatipo_fondoAjaxWebPart").css("display",tipo_fondo_control.strPermisoBusqueda);
		jQuery("#trtipo_fondoCabeceraBusquedas").css("display",tipo_fondo_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_fondo").css("display",tipo_fondo_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(tipo_fondo_control.htmlTablaOrderBy!=null
			&& tipo_fondo_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytipo_fondoAjaxWebPart").html(tipo_fondo_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//tipo_fondo_webcontrol1.registrarOrderByActions();
			
		}
			
		if(tipo_fondo_control.htmlTablaOrderByRel!=null
			&& tipo_fondo_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltipo_fondoAjaxWebPart").html(tipo_fondo_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(tipo_fondo_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatipo_fondoAjaxWebPart").css("display","none");
			jQuery("#trtipo_fondoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatipo_fondo").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(tipo_fondo_control) {
		
		if(!tipo_fondo_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(tipo_fondo_control);
		} else {
			jQuery("#divTablaDatostipo_fondosAjaxWebPart").html(tipo_fondo_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostipo_fondos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(tipo_fondo_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostipo_fondos=jQuery("#tblTablaDatostipo_fondos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("tipo_fondo",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',tipo_fondo_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			tipo_fondo_webcontrol1.registrarControlesTableEdition(tipo_fondo_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		tipo_fondo_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(tipo_fondo_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("tipo_fondo_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(tipo_fondo_control);
		
		const divTablaDatos = document.getElementById("divTablaDatostipo_fondosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(tipo_fondo_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(tipo_fondo_control);
		
		const divOrderBy = document.getElementById("divOrderBytipo_fondoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(tipo_fondo_control);
		
		const divOrderByRel = document.getElementById("divOrderByReltipo_fondoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(tipo_fondo_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(tipo_fondo_control.tipo_fondoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(tipo_fondo_control);			
		}
	}
	
	actualizarCamposFilaTabla(tipo_fondo_control) {
		var i=0;
		
		i=tipo_fondo_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(tipo_fondo_control.tipo_fondoActual.id);
		jQuery("#t-version_row_"+i+"").val(tipo_fondo_control.tipo_fondoActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(tipo_fondo_control.tipo_fondoActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(tipo_fondo_control.tipo_fondoActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(tipo_fondo_control.tipo_fondoActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(tipo_fondo_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(tipo_fondo_control) {
		tipo_fondo_funcion1.registrarControlesTableValidacionEdition(tipo_fondo_control,tipo_fondo_webcontrol1,tipo_fondo_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(tipo_fondo_control) {
		jQuery("#divResumentipo_fondoActualAjaxWebPart").html(tipo_fondo_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_fondo_control) {
		//jQuery("#divAccionesRelacionestipo_fondoAjaxWebPart").html(tipo_fondo_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("tipo_fondo_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(tipo_fondo_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionestipo_fondoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		tipo_fondo_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(tipo_fondo_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(tipo_fondo_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(tipo_fondo_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontipo_fondo();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("tipo_fondo",id,"seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondoConstante,strParametros);
		
		//tipo_fondo_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_fondo_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_fondo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_fondo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(tipo_fondo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_fondo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_fondo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_fondo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_fondo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(tipo_fondo_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);			
			
			
		
			
			if(tipo_fondo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_fondo");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_fondo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(tipo_fondo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,"tipo_fondo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_fondo_control) {
		
		jQuery("#divBusquedatipo_fondoAjaxWebPart").css("display",tipo_fondo_control.strPermisoBusqueda);
		jQuery("#trtipo_fondoCabeceraBusquedas").css("display",tipo_fondo_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_fondo").css("display",tipo_fondo_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetipo_fondo").css("display",tipo_fondo_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostipo_fondo").attr("style",tipo_fondo_control.strPermisoMostrarTodos);		
		
		if(tipo_fondo_control.strPermisoNuevo!=null) {
			jQuery("#tdtipo_fondoNuevo").css("display",tipo_fondo_control.strPermisoNuevo);
			jQuery("#tdtipo_fondoNuevoToolBar").css("display",tipo_fondo_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtipo_fondoDuplicar").css("display",tipo_fondo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_fondoDuplicarToolBar").css("display",tipo_fondo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_fondoNuevoGuardarCambios").css("display",tipo_fondo_control.strPermisoNuevo);
			jQuery("#tdtipo_fondoNuevoGuardarCambiosToolBar").css("display",tipo_fondo_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(tipo_fondo_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_fondoCopiar").css("display",tipo_fondo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_fondoCopiarToolBar").css("display",tipo_fondo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_fondoConEditar").css("display",tipo_fondo_control.strPermisoActualizar);
		}
		
		jQuery("#tdtipo_fondoGuardarCambios").css("display",tipo_fondo_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtipo_fondoGuardarCambiosToolBar").css("display",tipo_fondo_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdtipo_fondoCerrarPagina").css("display",tipo_fondo_control.strPermisoPopup);		
		jQuery("#tdtipo_fondoCerrarPaginaToolBar").css("display",tipo_fondo_control.strPermisoPopup);
		//jQuery("#trtipo_fondoAccionesRelaciones").css("display",tipo_fondo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tipo_fondo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_fondo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tipo_fondo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tipo Fondos";
		sTituloBanner+=" - " + tipo_fondo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_fondo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtipo_fondoRelacionesToolBar").css("display",tipo_fondo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostipo_fondo").css("display",tipo_fondo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tipo_fondo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tipo_fondo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_fondo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_fondo_webcontrol1.registrarEventosControles();
		
		if(tipo_fondo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_fondo_constante1.STR_ES_RELACIONADO=="false") {
			tipo_fondo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_fondo_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_fondo_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_fondo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_fondo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tipo_fondo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				tipo_fondo_webcontrol1.onLoad();
			
			//} else {
				//if(tipo_fondo_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			tipo_fondo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_fondo","seguridad","",tipo_fondo_funcion1,tipo_fondo_webcontrol1,tipo_fondo_constante1);	
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

var tipo_fondo_webcontrol1 = new tipo_fondo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {tipo_fondo_webcontrol,tipo_fondo_webcontrol1};

//Para ser llamado desde window.opener
window.tipo_fondo_webcontrol1 = tipo_fondo_webcontrol1;


if(tipo_fondo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_fondo_webcontrol1.onLoadWindow; 
}

//</script>