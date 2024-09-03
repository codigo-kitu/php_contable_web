//<script type="text/javascript" language="javascript">



//var reporte_monicaJQueryPaginaWebInteraccion= function (reporte_monica_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {reporte_monica_constante,reporte_monica_constante1} from '../util/reporte_monica_constante.js';

import {reporte_monica_funcion,reporte_monica_funcion1} from '../util/reporte_monica_funcion.js';


class reporte_monica_webcontrol extends GeneralEntityWebControl {
	
	reporte_monica_control=null;
	reporte_monica_controlInicial=null;
	reporte_monica_controlAuxiliar=null;
		
	//if(reporte_monica_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(reporte_monica_control) {
		super();
		
		this.reporte_monica_control=reporte_monica_control;
	}
		
	actualizarVariablesPagina(reporte_monica_control) {
		
		if(reporte_monica_control.action=="index" || reporte_monica_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(reporte_monica_control);
			
		} 
		
		
		else if(reporte_monica_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(reporte_monica_control);
			
		} else if(reporte_monica_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(reporte_monica_control);
			
		} else if(reporte_monica_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(reporte_monica_control);		
		
		} else if(reporte_monica_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(reporte_monica_control);
		
		}  else if(reporte_monica_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(reporte_monica_control);
		
		} else if(reporte_monica_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(reporte_monica_control);		
		
		} else if(reporte_monica_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(reporte_monica_control);		
		
		} else if(reporte_monica_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(reporte_monica_control);		
		
		} else if(reporte_monica_control.action.includes("Busqueda") ||
				  reporte_monica_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(reporte_monica_control);
			
		} else if(reporte_monica_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(reporte_monica_control)
		}
		
		
		
	
		else if(reporte_monica_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(reporte_monica_control);	
		
		} else if(reporte_monica_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(reporte_monica_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + reporte_monica_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(reporte_monica_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(reporte_monica_control) {
		this.actualizarPaginaAccionesGenerales(reporte_monica_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(reporte_monica_control) {
		
		this.actualizarPaginaCargaGeneral(reporte_monica_control);
		this.actualizarPaginaOrderBy(reporte_monica_control);
		this.actualizarPaginaTablaDatos(reporte_monica_control);
		this.actualizarPaginaCargaGeneralControles(reporte_monica_control);
		//this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(reporte_monica_control);
		this.actualizarPaginaAreaBusquedas(reporte_monica_control);
		this.actualizarPaginaCargaCombosFK(reporte_monica_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(reporte_monica_control) {
		//this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(reporte_monica_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(reporte_monica_control) {
		
		this.actualizarPaginaCargaGeneral(reporte_monica_control);
		this.actualizarPaginaTablaDatos(reporte_monica_control);
		this.actualizarPaginaCargaGeneralControles(reporte_monica_control);
		//this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(reporte_monica_control);
		this.actualizarPaginaAreaBusquedas(reporte_monica_control);
		this.actualizarPaginaCargaCombosFK(reporte_monica_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		//this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		//this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		//this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		//this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		//this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		//this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(reporte_monica_control) {
		//this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(reporte_monica_control) {
		this.actualizarPaginaAbrirLink(reporte_monica_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);				
		//this.actualizarPaginaFormulario(reporte_monica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);
		//this.actualizarPaginaFormulario(reporte_monica_control);
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		//this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);
		//this.actualizarPaginaFormulario(reporte_monica_control);
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(reporte_monica_control) {
		//this.actualizarPaginaFormulario(reporte_monica_control);
		this.onLoadCombosDefectoFK(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);
		//this.actualizarPaginaFormulario(reporte_monica_control);
		this.onLoadCombosDefectoFK(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);		
		//this.actualizarPaginaAreaMantenimiento(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(reporte_monica_control) {
		this.actualizarPaginaAbrirLink(reporte_monica_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(reporte_monica_control) {
		this.actualizarPaginaTablaDatos(reporte_monica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(reporte_monica_control) {
					//super.actualizarPaginaImprimir(reporte_monica_control,"reporte_monica");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",reporte_monica_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("reporte_monica_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(reporte_monica_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(reporte_monica_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(reporte_monica_control) {
		//super.actualizarPaginaImprimir(reporte_monica_control,"reporte_monica");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("reporte_monica_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(reporte_monica_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",reporte_monica_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(reporte_monica_control) {
		//super.actualizarPaginaImprimir(reporte_monica_control,"reporte_monica");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("reporte_monica_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(reporte_monica_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",reporte_monica_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(reporte_monica_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(reporte_monica_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(reporte_monica_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(reporte_monica_control);
			
		this.actualizarPaginaAbrirLink(reporte_monica_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(reporte_monica_control) {
		
		if(reporte_monica_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(reporte_monica_control);
		}
		
		if(reporte_monica_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(reporte_monica_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(reporte_monica_control) {
		if(reporte_monica_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("reporte_monicaReturnGeneral",JSON.stringify(reporte_monica_control.reporte_monicaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(reporte_monica_control) {
		if(reporte_monica_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && reporte_monica_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(reporte_monica_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(reporte_monica_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(reporte_monica_control, mostrar) {
		
		if(mostrar==true) {
			reporte_monica_funcion1.resaltarRestaurarDivsPagina(false,"reporte_monica");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				reporte_monica_funcion1.resaltarRestaurarDivMantenimiento(false,"reporte_monica");
			}			
			
			reporte_monica_funcion1.mostrarDivMensaje(true,reporte_monica_control.strAuxiliarMensaje,reporte_monica_control.strAuxiliarCssMensaje);
		
		} else {
			reporte_monica_funcion1.mostrarDivMensaje(false,reporte_monica_control.strAuxiliarMensaje,reporte_monica_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(reporte_monica_control) {
		if(reporte_monica_funcion1.esPaginaForm(reporte_monica_constante1)==true) {
			window.opener.reporte_monica_webcontrol1.actualizarPaginaTablaDatos(reporte_monica_control);
		} else {
			this.actualizarPaginaTablaDatos(reporte_monica_control);
		}
	}
	
	actualizarPaginaAbrirLink(reporte_monica_control) {
		reporte_monica_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(reporte_monica_control.strAuxiliarUrlPagina);
				
		reporte_monica_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(reporte_monica_control.strAuxiliarTipo,reporte_monica_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(reporte_monica_control) {
		reporte_monica_funcion1.resaltarRestaurarDivMensaje(true,reporte_monica_control.strAuxiliarMensajeAlert,reporte_monica_control.strAuxiliarCssMensaje);
			
		if(reporte_monica_funcion1.esPaginaForm(reporte_monica_constante1)==true) {
			window.opener.reporte_monica_funcion1.resaltarRestaurarDivMensaje(true,reporte_monica_control.strAuxiliarMensajeAlert,reporte_monica_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(reporte_monica_control) {
		this.reporte_monica_controlInicial=reporte_monica_control;
			
		if(reporte_monica_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(reporte_monica_control.strStyleDivArbol,reporte_monica_control.strStyleDivContent
																,reporte_monica_control.strStyleDivOpcionesBanner,reporte_monica_control.strStyleDivExpandirColapsar
																,reporte_monica_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=reporte_monica_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",reporte_monica_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(reporte_monica_control) {
		this.actualizarCssBotonesPagina(reporte_monica_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(reporte_monica_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(reporte_monica_control.tiposReportes,reporte_monica_control.tiposReporte
															 	,reporte_monica_control.tiposPaginacion,reporte_monica_control.tiposAcciones
																,reporte_monica_control.tiposColumnasSelect,reporte_monica_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(reporte_monica_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(reporte_monica_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(reporte_monica_control);			
	}
	
	actualizarPaginaUsuarioInvitado(reporte_monica_control) {
	
		var indexPosition=reporte_monica_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=reporte_monica_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(reporte_monica_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(reporte_monica_control.strRecargarFkTiposNinguno!=null && reporte_monica_control.strRecargarFkTiposNinguno!='NINGUNO' && reporte_monica_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(reporte_monica_control) {
		jQuery("#divBusquedareporte_monicaAjaxWebPart").css("display",reporte_monica_control.strPermisoBusqueda);
		jQuery("#trreporte_monicaCabeceraBusquedas").css("display",reporte_monica_control.strPermisoBusqueda);
		jQuery("#trBusquedareporte_monica").css("display",reporte_monica_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(reporte_monica_control.htmlTablaOrderBy!=null
			&& reporte_monica_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByreporte_monicaAjaxWebPart").html(reporte_monica_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//reporte_monica_webcontrol1.registrarOrderByActions();
			
		}
			
		if(reporte_monica_control.htmlTablaOrderByRel!=null
			&& reporte_monica_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelreporte_monicaAjaxWebPart").html(reporte_monica_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(reporte_monica_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedareporte_monicaAjaxWebPart").css("display","none");
			jQuery("#trreporte_monicaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedareporte_monica").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(reporte_monica_control) {
		
		if(!reporte_monica_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(reporte_monica_control);
		} else {
			jQuery("#divTablaDatosreporte_monicasAjaxWebPart").html(reporte_monica_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosreporte_monicas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(reporte_monica_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosreporte_monicas=jQuery("#tblTablaDatosreporte_monicas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("reporte_monica",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',reporte_monica_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			reporte_monica_webcontrol1.registrarControlesTableEdition(reporte_monica_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		reporte_monica_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(reporte_monica_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("reporte_monica_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(reporte_monica_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosreporte_monicasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(reporte_monica_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(reporte_monica_control);
		
		const divOrderBy = document.getElementById("divOrderByreporte_monicaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(reporte_monica_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelreporte_monicaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(reporte_monica_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(reporte_monica_control.reporte_monicaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(reporte_monica_control);			
		}
	}
	
	actualizarCamposFilaTabla(reporte_monica_control) {
		var i=0;
		
		i=reporte_monica_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(reporte_monica_control.reporte_monicaActual.id);
		jQuery("#t-version_row_"+i+"").val(reporte_monica_control.reporte_monicaActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(reporte_monica_control.reporte_monicaActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(reporte_monica_control.reporte_monicaActual.nombre);
		jQuery("#t-cel_"+i+"_4").val(reporte_monica_control.reporte_monicaActual.descripcion);
		jQuery("#t-cel_"+i+"_5").val(reporte_monica_control.reporte_monicaActual.estado);
		jQuery("#t-cel_"+i+"_6").val(reporte_monica_control.reporte_monicaActual.modulo);
		jQuery("#t-cel_"+i+"_7").val(reporte_monica_control.reporte_monicaActual.sub_modulo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(reporte_monica_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(reporte_monica_control) {
		reporte_monica_funcion1.registrarControlesTableValidacionEdition(reporte_monica_control,reporte_monica_webcontrol1,reporte_monica_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(reporte_monica_control) {
		jQuery("#divResumenreporte_monicaActualAjaxWebPart").html(reporte_monica_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(reporte_monica_control) {
		//jQuery("#divAccionesRelacionesreporte_monicaAjaxWebPart").html(reporte_monica_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("reporte_monica_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(reporte_monica_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesreporte_monicaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		reporte_monica_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(reporte_monica_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(reporte_monica_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(reporte_monica_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionreporte_monica();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("reporte_monica",id,"general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monicaConstante,strParametros);
		
		//reporte_monica_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//reporte_monica_control
		
	
	}
	
	onLoadCombosDefectoFK(reporte_monica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(reporte_monica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(reporte_monica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(reporte_monica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(reporte_monica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(reporte_monica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(reporte_monica_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(reporte_monica_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);			
			
			
		
			
			if(reporte_monica_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("reporte_monica");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("reporte_monica");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(reporte_monica_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,"reporte_monica");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(reporte_monica_control) {
		
		jQuery("#divBusquedareporte_monicaAjaxWebPart").css("display",reporte_monica_control.strPermisoBusqueda);
		jQuery("#trreporte_monicaCabeceraBusquedas").css("display",reporte_monica_control.strPermisoBusqueda);
		jQuery("#trBusquedareporte_monica").css("display",reporte_monica_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportereporte_monica").css("display",reporte_monica_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosreporte_monica").attr("style",reporte_monica_control.strPermisoMostrarTodos);		
		
		if(reporte_monica_control.strPermisoNuevo!=null) {
			jQuery("#tdreporte_monicaNuevo").css("display",reporte_monica_control.strPermisoNuevo);
			jQuery("#tdreporte_monicaNuevoToolBar").css("display",reporte_monica_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdreporte_monicaDuplicar").css("display",reporte_monica_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdreporte_monicaDuplicarToolBar").css("display",reporte_monica_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdreporte_monicaNuevoGuardarCambios").css("display",reporte_monica_control.strPermisoNuevo);
			jQuery("#tdreporte_monicaNuevoGuardarCambiosToolBar").css("display",reporte_monica_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(reporte_monica_control.strPermisoActualizar!=null) {
			jQuery("#tdreporte_monicaCopiar").css("display",reporte_monica_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdreporte_monicaCopiarToolBar").css("display",reporte_monica_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdreporte_monicaConEditar").css("display",reporte_monica_control.strPermisoActualizar);
		}
		
		jQuery("#tdreporte_monicaGuardarCambios").css("display",reporte_monica_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdreporte_monicaGuardarCambiosToolBar").css("display",reporte_monica_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdreporte_monicaCerrarPagina").css("display",reporte_monica_control.strPermisoPopup);		
		jQuery("#tdreporte_monicaCerrarPaginaToolBar").css("display",reporte_monica_control.strPermisoPopup);
		//jQuery("#trreporte_monicaAccionesRelaciones").css("display",reporte_monica_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=reporte_monica_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + reporte_monica_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + reporte_monica_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Reportes Monicas";
		sTituloBanner+=" - " + reporte_monica_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + reporte_monica_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdreporte_monicaRelacionesToolBar").css("display",reporte_monica_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosreporte_monica").css("display",reporte_monica_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		reporte_monica_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		reporte_monica_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		reporte_monica_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		reporte_monica_webcontrol1.registrarEventosControles();
		
		if(reporte_monica_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(reporte_monica_constante1.STR_ES_RELACIONADO=="false") {
			reporte_monica_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(reporte_monica_constante1.STR_ES_RELACIONES=="true") {
			if(reporte_monica_constante1.BIT_ES_PAGINA_FORM==true) {
				reporte_monica_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(reporte_monica_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(reporte_monica_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				reporte_monica_webcontrol1.onLoad();
			
			//} else {
				//if(reporte_monica_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			reporte_monica_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("reporte_monica","general","",reporte_monica_funcion1,reporte_monica_webcontrol1,reporte_monica_constante1);	
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

var reporte_monica_webcontrol1 = new reporte_monica_webcontrol();

//Para ser llamado desde otro archivo (import)
export {reporte_monica_webcontrol,reporte_monica_webcontrol1};

//Para ser llamado desde window.opener
window.reporte_monica_webcontrol1 = reporte_monica_webcontrol1;


if(reporte_monica_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = reporte_monica_webcontrol1.onLoadWindow; 
}

//</script>