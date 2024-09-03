//<script type="text/javascript" language="javascript">



//var otro_parametroJQueryPaginaWebInteraccion= function (otro_parametro_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {otro_parametro_constante,otro_parametro_constante1} from '../util/otro_parametro_constante.js';

import {otro_parametro_funcion,otro_parametro_funcion1} from '../util/otro_parametro_funcion.js';


class otro_parametro_webcontrol extends GeneralEntityWebControl {
	
	otro_parametro_control=null;
	otro_parametro_controlInicial=null;
	otro_parametro_controlAuxiliar=null;
		
	//if(otro_parametro_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(otro_parametro_control) {
		super();
		
		this.otro_parametro_control=otro_parametro_control;
	}
		
	actualizarVariablesPagina(otro_parametro_control) {
		
		if(otro_parametro_control.action=="index" || otro_parametro_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(otro_parametro_control);
			
		} 
		
		
		else if(otro_parametro_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(otro_parametro_control);
			
		} else if(otro_parametro_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(otro_parametro_control);
			
		} else if(otro_parametro_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(otro_parametro_control);		
		
		} else if(otro_parametro_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(otro_parametro_control);
		
		}  else if(otro_parametro_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(otro_parametro_control);
		
		} else if(otro_parametro_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(otro_parametro_control);		
		
		} else if(otro_parametro_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(otro_parametro_control);		
		
		} else if(otro_parametro_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(otro_parametro_control);		
		
		} else if(otro_parametro_control.action.includes("Busqueda") ||
				  otro_parametro_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(otro_parametro_control);
			
		} else if(otro_parametro_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(otro_parametro_control)
		}
		
		
		
	
		else if(otro_parametro_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(otro_parametro_control);	
		
		} else if(otro_parametro_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(otro_parametro_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + otro_parametro_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(otro_parametro_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(otro_parametro_control) {
		this.actualizarPaginaAccionesGenerales(otro_parametro_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(otro_parametro_control) {
		
		this.actualizarPaginaCargaGeneral(otro_parametro_control);
		this.actualizarPaginaOrderBy(otro_parametro_control);
		this.actualizarPaginaTablaDatos(otro_parametro_control);
		this.actualizarPaginaCargaGeneralControles(otro_parametro_control);
		//this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_parametro_control);
		this.actualizarPaginaAreaBusquedas(otro_parametro_control);
		this.actualizarPaginaCargaCombosFK(otro_parametro_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(otro_parametro_control) {
		//this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(otro_parametro_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(otro_parametro_control) {
		
		this.actualizarPaginaCargaGeneral(otro_parametro_control);
		this.actualizarPaginaTablaDatos(otro_parametro_control);
		this.actualizarPaginaCargaGeneralControles(otro_parametro_control);
		//this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_parametro_control);
		this.actualizarPaginaAreaBusquedas(otro_parametro_control);
		this.actualizarPaginaCargaCombosFK(otro_parametro_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		//this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		//this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		//this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(otro_parametro_control) {
		//this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(otro_parametro_control) {
		this.actualizarPaginaAbrirLink(otro_parametro_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);				
		//this.actualizarPaginaFormulario(otro_parametro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);
		//this.actualizarPaginaFormulario(otro_parametro_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);
		//this.actualizarPaginaFormulario(otro_parametro_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(otro_parametro_control) {
		//this.actualizarPaginaFormulario(otro_parametro_control);
		this.onLoadCombosDefectoFK(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);
		//this.actualizarPaginaFormulario(otro_parametro_control);
		this.onLoadCombosDefectoFK(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(otro_parametro_control) {
		this.actualizarPaginaAbrirLink(otro_parametro_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(otro_parametro_control) {
		this.actualizarPaginaTablaDatos(otro_parametro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(otro_parametro_control) {
					//super.actualizarPaginaImprimir(otro_parametro_control,"otro_parametro");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",otro_parametro_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("otro_parametro_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(otro_parametro_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(otro_parametro_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(otro_parametro_control) {
		//super.actualizarPaginaImprimir(otro_parametro_control,"otro_parametro");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("otro_parametro_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(otro_parametro_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",otro_parametro_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(otro_parametro_control) {
		//super.actualizarPaginaImprimir(otro_parametro_control,"otro_parametro");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("otro_parametro_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(otro_parametro_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",otro_parametro_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(otro_parametro_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(otro_parametro_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(otro_parametro_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(otro_parametro_control);
			
		this.actualizarPaginaAbrirLink(otro_parametro_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(otro_parametro_control) {
		
		if(otro_parametro_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(otro_parametro_control);
		}
		
		if(otro_parametro_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(otro_parametro_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(otro_parametro_control) {
		if(otro_parametro_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("otro_parametroReturnGeneral",JSON.stringify(otro_parametro_control.otro_parametroReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(otro_parametro_control) {
		if(otro_parametro_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && otro_parametro_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(otro_parametro_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(otro_parametro_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(otro_parametro_control, mostrar) {
		
		if(mostrar==true) {
			otro_parametro_funcion1.resaltarRestaurarDivsPagina(false,"otro_parametro");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				otro_parametro_funcion1.resaltarRestaurarDivMantenimiento(false,"otro_parametro");
			}			
			
			otro_parametro_funcion1.mostrarDivMensaje(true,otro_parametro_control.strAuxiliarMensaje,otro_parametro_control.strAuxiliarCssMensaje);
		
		} else {
			otro_parametro_funcion1.mostrarDivMensaje(false,otro_parametro_control.strAuxiliarMensaje,otro_parametro_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(otro_parametro_control) {
		if(otro_parametro_funcion1.esPaginaForm(otro_parametro_constante1)==true) {
			window.opener.otro_parametro_webcontrol1.actualizarPaginaTablaDatos(otro_parametro_control);
		} else {
			this.actualizarPaginaTablaDatos(otro_parametro_control);
		}
	}
	
	actualizarPaginaAbrirLink(otro_parametro_control) {
		otro_parametro_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(otro_parametro_control.strAuxiliarUrlPagina);
				
		otro_parametro_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(otro_parametro_control.strAuxiliarTipo,otro_parametro_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(otro_parametro_control) {
		otro_parametro_funcion1.resaltarRestaurarDivMensaje(true,otro_parametro_control.strAuxiliarMensajeAlert,otro_parametro_control.strAuxiliarCssMensaje);
			
		if(otro_parametro_funcion1.esPaginaForm(otro_parametro_constante1)==true) {
			window.opener.otro_parametro_funcion1.resaltarRestaurarDivMensaje(true,otro_parametro_control.strAuxiliarMensajeAlert,otro_parametro_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(otro_parametro_control) {
		this.otro_parametro_controlInicial=otro_parametro_control;
			
		if(otro_parametro_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(otro_parametro_control.strStyleDivArbol,otro_parametro_control.strStyleDivContent
																,otro_parametro_control.strStyleDivOpcionesBanner,otro_parametro_control.strStyleDivExpandirColapsar
																,otro_parametro_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=otro_parametro_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",otro_parametro_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(otro_parametro_control) {
		this.actualizarCssBotonesPagina(otro_parametro_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(otro_parametro_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(otro_parametro_control.tiposReportes,otro_parametro_control.tiposReporte
															 	,otro_parametro_control.tiposPaginacion,otro_parametro_control.tiposAcciones
																,otro_parametro_control.tiposColumnasSelect,otro_parametro_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(otro_parametro_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(otro_parametro_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(otro_parametro_control);			
	}
	
	actualizarPaginaUsuarioInvitado(otro_parametro_control) {
	
		var indexPosition=otro_parametro_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=otro_parametro_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(otro_parametro_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(otro_parametro_control.strRecargarFkTiposNinguno!=null && otro_parametro_control.strRecargarFkTiposNinguno!='NINGUNO' && otro_parametro_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(otro_parametro_control) {
		jQuery("#divBusquedaotro_parametroAjaxWebPart").css("display",otro_parametro_control.strPermisoBusqueda);
		jQuery("#trotro_parametroCabeceraBusquedas").css("display",otro_parametro_control.strPermisoBusqueda);
		jQuery("#trBusquedaotro_parametro").css("display",otro_parametro_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(otro_parametro_control.htmlTablaOrderBy!=null
			&& otro_parametro_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByotro_parametroAjaxWebPart").html(otro_parametro_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//otro_parametro_webcontrol1.registrarOrderByActions();
			
		}
			
		if(otro_parametro_control.htmlTablaOrderByRel!=null
			&& otro_parametro_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelotro_parametroAjaxWebPart").html(otro_parametro_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(otro_parametro_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaotro_parametroAjaxWebPart").css("display","none");
			jQuery("#trotro_parametroCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaotro_parametro").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(otro_parametro_control) {
		
		if(!otro_parametro_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(otro_parametro_control);
		} else {
			jQuery("#divTablaDatosotro_parametrosAjaxWebPart").html(otro_parametro_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosotro_parametros=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(otro_parametro_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosotro_parametros=jQuery("#tblTablaDatosotro_parametros").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("otro_parametro",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',otro_parametro_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			otro_parametro_webcontrol1.registrarControlesTableEdition(otro_parametro_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		otro_parametro_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(otro_parametro_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("otro_parametro_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(otro_parametro_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosotro_parametrosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(otro_parametro_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(otro_parametro_control);
		
		const divOrderBy = document.getElementById("divOrderByotro_parametroAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(otro_parametro_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelotro_parametroAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(otro_parametro_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(otro_parametro_control.otro_parametroActual!=null) {//form
			
			this.actualizarCamposFilaTabla(otro_parametro_control);			
		}
	}
	
	actualizarCamposFilaTabla(otro_parametro_control) {
		var i=0;
		
		i=otro_parametro_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(otro_parametro_control.otro_parametroActual.id);
		jQuery("#t-version_row_"+i+"").val(otro_parametro_control.otro_parametroActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(otro_parametro_control.otro_parametroActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(otro_parametro_control.otro_parametroActual.codigo2);
		jQuery("#t-cel_"+i+"_4").val(otro_parametro_control.otro_parametroActual.grupo);
		jQuery("#t-cel_"+i+"_5").val(otro_parametro_control.otro_parametroActual.descripcion);
		jQuery("#t-cel_"+i+"_6").val(otro_parametro_control.otro_parametroActual.texto1);
		jQuery("#t-cel_"+i+"_7").val(otro_parametro_control.otro_parametroActual.orden);
		jQuery("#t-cel_"+i+"_8").val(otro_parametro_control.otro_parametroActual.monto1);
		jQuery("#t-cel_"+i+"_9").prop('checked',otro_parametro_control.otro_parametroActual.activo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(otro_parametro_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(otro_parametro_control) {
		otro_parametro_funcion1.registrarControlesTableValidacionEdition(otro_parametro_control,otro_parametro_webcontrol1,otro_parametro_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(otro_parametro_control) {
		jQuery("#divResumenotro_parametroActualAjaxWebPart").html(otro_parametro_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_parametro_control) {
		//jQuery("#divAccionesRelacionesotro_parametroAjaxWebPart").html(otro_parametro_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("otro_parametro_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(otro_parametro_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesotro_parametroAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		otro_parametro_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(otro_parametro_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(otro_parametro_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(otro_parametro_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionotro_parametro();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("otro_parametro",id,"general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametroConstante,strParametros);
		
		//otro_parametro_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//otro_parametro_control
		
	
	}
	
	onLoadCombosDefectoFK(otro_parametro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_parametro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(otro_parametro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_parametro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(otro_parametro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_parametro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(otro_parametro_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(otro_parametro_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);			
			
			
		
			
			if(otro_parametro_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("otro_parametro");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("otro_parametro");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(otro_parametro_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,"otro_parametro");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(otro_parametro_control) {
		
		jQuery("#divBusquedaotro_parametroAjaxWebPart").css("display",otro_parametro_control.strPermisoBusqueda);
		jQuery("#trotro_parametroCabeceraBusquedas").css("display",otro_parametro_control.strPermisoBusqueda);
		jQuery("#trBusquedaotro_parametro").css("display",otro_parametro_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteotro_parametro").css("display",otro_parametro_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosotro_parametro").attr("style",otro_parametro_control.strPermisoMostrarTodos);		
		
		if(otro_parametro_control.strPermisoNuevo!=null) {
			jQuery("#tdotro_parametroNuevo").css("display",otro_parametro_control.strPermisoNuevo);
			jQuery("#tdotro_parametroNuevoToolBar").css("display",otro_parametro_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdotro_parametroDuplicar").css("display",otro_parametro_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdotro_parametroDuplicarToolBar").css("display",otro_parametro_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdotro_parametroNuevoGuardarCambios").css("display",otro_parametro_control.strPermisoNuevo);
			jQuery("#tdotro_parametroNuevoGuardarCambiosToolBar").css("display",otro_parametro_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(otro_parametro_control.strPermisoActualizar!=null) {
			jQuery("#tdotro_parametroCopiar").css("display",otro_parametro_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_parametroCopiarToolBar").css("display",otro_parametro_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_parametroConEditar").css("display",otro_parametro_control.strPermisoActualizar);
		}
		
		jQuery("#tdotro_parametroGuardarCambios").css("display",otro_parametro_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdotro_parametroGuardarCambiosToolBar").css("display",otro_parametro_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdotro_parametroCerrarPagina").css("display",otro_parametro_control.strPermisoPopup);		
		jQuery("#tdotro_parametroCerrarPaginaToolBar").css("display",otro_parametro_control.strPermisoPopup);
		//jQuery("#trotro_parametroAccionesRelaciones").css("display",otro_parametro_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=otro_parametro_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_parametro_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + otro_parametro_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Otros Parametroses";
		sTituloBanner+=" - " + otro_parametro_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_parametro_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdotro_parametroRelacionesToolBar").css("display",otro_parametro_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosotro_parametro").css("display",otro_parametro_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		otro_parametro_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		otro_parametro_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		otro_parametro_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		otro_parametro_webcontrol1.registrarEventosControles();
		
		if(otro_parametro_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(otro_parametro_constante1.STR_ES_RELACIONADO=="false") {
			otro_parametro_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(otro_parametro_constante1.STR_ES_RELACIONES=="true") {
			if(otro_parametro_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_parametro_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(otro_parametro_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(otro_parametro_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				otro_parametro_webcontrol1.onLoad();
			
			//} else {
				//if(otro_parametro_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			otro_parametro_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("otro_parametro","general","",otro_parametro_funcion1,otro_parametro_webcontrol1,otro_parametro_constante1);	
	}
}

var otro_parametro_webcontrol1 = new otro_parametro_webcontrol();

//Para ser llamado desde otro archivo (import)
export {otro_parametro_webcontrol,otro_parametro_webcontrol1};

//Para ser llamado desde window.opener
window.otro_parametro_webcontrol1 = otro_parametro_webcontrol1;


if(otro_parametro_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = otro_parametro_webcontrol1.onLoadWindow; 
}

//</script>