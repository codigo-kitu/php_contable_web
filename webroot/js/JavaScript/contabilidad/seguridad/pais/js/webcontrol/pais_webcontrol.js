//<script type="text/javascript" language="javascript">



//var paisJQueryPaginaWebInteraccion= function (pais_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {pais_constante,pais_constante1} from '../util/pais_constante.js';

import {pais_funcion,pais_funcion1} from '../util/pais_funcion.js';


class pais_webcontrol extends GeneralEntityWebControl {
	
	pais_control=null;
	pais_controlInicial=null;
	pais_controlAuxiliar=null;
		
	//if(pais_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(pais_control) {
		super();
		
		this.pais_control=pais_control;
	}
		
	actualizarVariablesPagina(pais_control) {
		
		if(pais_control.action=="index" || pais_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(pais_control);
			
		} 
		
		
		else if(pais_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(pais_control);
		
		} else if(pais_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(pais_control);
		
		} else if(pais_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(pais_control);
		
		} else if(pais_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(pais_control);
			
		} else if(pais_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(pais_control);
			
		} else if(pais_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(pais_control);
		
		} else if(pais_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(pais_control);		
		
		} else if(pais_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(pais_control);
		
		} else if(pais_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(pais_control);
		
		} else if(pais_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(pais_control);
		
		} else if(pais_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(pais_control);
		
		}  else if(pais_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(pais_control);
		
		} else if(pais_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(pais_control);
		
		} else if(pais_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(pais_control);
		
		} else if(pais_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(pais_control);
		
		} else if(pais_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(pais_control);
		
		} else if(pais_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(pais_control);
		
		} else if(pais_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(pais_control);
		
		} else if(pais_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(pais_control);
		
		} else if(pais_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(pais_control);
		
		} else if(pais_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(pais_control);		
		
		} else if(pais_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(pais_control);		
		
		} else if(pais_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(pais_control);		
		
		} else if(pais_control.action.includes("Busqueda") ||
				  pais_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(pais_control);
			
		} else if(pais_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(pais_control)
		}
		
		
		
	
		else if(pais_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(pais_control);	
		
		} else if(pais_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(pais_control);		
		}
	
		else if(pais_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(pais_control);		
		}
	
		else if(pais_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(pais_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + pais_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(pais_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(pais_control) {
		this.actualizarPaginaAccionesGenerales(pais_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(pais_control) {
		
		this.actualizarPaginaCargaGeneral(pais_control);
		this.actualizarPaginaOrderBy(pais_control);
		this.actualizarPaginaTablaDatos(pais_control);
		this.actualizarPaginaCargaGeneralControles(pais_control);
		//this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(pais_control);
		this.actualizarPaginaAreaBusquedas(pais_control);
		this.actualizarPaginaCargaCombosFK(pais_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(pais_control) {
		//this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(pais_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(pais_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(pais_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(pais_control) {
		
		this.actualizarPaginaCargaGeneral(pais_control);
		this.actualizarPaginaTablaDatos(pais_control);
		this.actualizarPaginaCargaGeneralControles(pais_control);
		//this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(pais_control);
		this.actualizarPaginaAreaBusquedas(pais_control);
		this.actualizarPaginaCargaCombosFK(pais_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		//this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		//this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		//this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		//this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		//this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		//this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(pais_control) {
		//this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(pais_control) {
		this.actualizarPaginaAbrirLink(pais_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);				
		//this.actualizarPaginaFormulario(pais_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);
		//this.actualizarPaginaFormulario(pais_control);
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		//this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);
		//this.actualizarPaginaFormulario(pais_control);
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(pais_control) {
		//this.actualizarPaginaFormulario(pais_control);
		this.onLoadCombosDefectoFK(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);
		//this.actualizarPaginaFormulario(pais_control);
		this.onLoadCombosDefectoFK(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		//this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(pais_control) {
		this.actualizarPaginaAbrirLink(pais_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(pais_control) {
					//super.actualizarPaginaImprimir(pais_control,"pais");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",pais_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("pais_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(pais_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(pais_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(pais_control) {
		//super.actualizarPaginaImprimir(pais_control,"pais");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("pais_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(pais_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",pais_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(pais_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(pais_control) {
		//super.actualizarPaginaImprimir(pais_control,"pais");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("pais_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(pais_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",pais_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(pais_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(pais_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(pais_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(pais_control);
			
		this.actualizarPaginaAbrirLink(pais_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(pais_control) {
		this.actualizarPaginaTablaDatos(pais_control);
		this.actualizarPaginaFormulario(pais_control);
		this.actualizarPaginaMensajePantallaAuxiliar(pais_control);		
		this.actualizarPaginaAreaMantenimiento(pais_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(pais_control) {
		
		if(pais_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(pais_control);
		}
		
		if(pais_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(pais_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(pais_control) {
		if(pais_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("paisReturnGeneral",JSON.stringify(pais_control.paisReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(pais_control) {
		if(pais_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && pais_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(pais_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(pais_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(pais_control, mostrar) {
		
		if(mostrar==true) {
			pais_funcion1.resaltarRestaurarDivsPagina(false,"pais");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				pais_funcion1.resaltarRestaurarDivMantenimiento(false,"pais");
			}			
			
			pais_funcion1.mostrarDivMensaje(true,pais_control.strAuxiliarMensaje,pais_control.strAuxiliarCssMensaje);
		
		} else {
			pais_funcion1.mostrarDivMensaje(false,pais_control.strAuxiliarMensaje,pais_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(pais_control) {
		if(pais_funcion1.esPaginaForm(pais_constante1)==true) {
			window.opener.pais_webcontrol1.actualizarPaginaTablaDatos(pais_control);
		} else {
			this.actualizarPaginaTablaDatos(pais_control);
		}
	}
	
	actualizarPaginaAbrirLink(pais_control) {
		pais_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(pais_control.strAuxiliarUrlPagina);
				
		pais_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(pais_control.strAuxiliarTipo,pais_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(pais_control) {
		pais_funcion1.resaltarRestaurarDivMensaje(true,pais_control.strAuxiliarMensajeAlert,pais_control.strAuxiliarCssMensaje);
			
		if(pais_funcion1.esPaginaForm(pais_constante1)==true) {
			window.opener.pais_funcion1.resaltarRestaurarDivMensaje(true,pais_control.strAuxiliarMensajeAlert,pais_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(pais_control) {
		this.pais_controlInicial=pais_control;
			
		if(pais_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(pais_control.strStyleDivArbol,pais_control.strStyleDivContent
																,pais_control.strStyleDivOpcionesBanner,pais_control.strStyleDivExpandirColapsar
																,pais_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=pais_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",pais_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(pais_control) {
		this.actualizarCssBotonesPagina(pais_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(pais_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(pais_control.tiposReportes,pais_control.tiposReporte
															 	,pais_control.tiposPaginacion,pais_control.tiposAcciones
																,pais_control.tiposColumnasSelect,pais_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(pais_control.tiposRelaciones,pais_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(pais_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(pais_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(pais_control);			
	}
	
	actualizarPaginaUsuarioInvitado(pais_control) {
	
		var indexPosition=pais_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=pais_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(pais_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(pais_control.strRecargarFkTiposNinguno!=null && pais_control.strRecargarFkTiposNinguno!='NINGUNO' && pais_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(pais_control) {
		jQuery("#divBusquedapaisAjaxWebPart").css("display",pais_control.strPermisoBusqueda);
		jQuery("#trpaisCabeceraBusquedas").css("display",pais_control.strPermisoBusqueda);
		jQuery("#trBusquedapais").css("display",pais_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(pais_control.htmlTablaOrderBy!=null
			&& pais_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBypaisAjaxWebPart").html(pais_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//pais_webcontrol1.registrarOrderByActions();
			
		}
			
		if(pais_control.htmlTablaOrderByRel!=null
			&& pais_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelpaisAjaxWebPart").html(pais_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(pais_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedapaisAjaxWebPart").css("display","none");
			jQuery("#trpaisCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedapais").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(pais_control) {
		
		if(!pais_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(pais_control);
		} else {
			jQuery("#divTablaDatospaissAjaxWebPart").html(pais_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatospaiss=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(pais_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatospaiss=jQuery("#tblTablaDatospaiss").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("pais",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',pais_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			pais_webcontrol1.registrarControlesTableEdition(pais_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		pais_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(pais_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("pais_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(pais_control);
		
		const divTablaDatos = document.getElementById("divTablaDatospaissAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(pais_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(pais_control);
		
		const divOrderBy = document.getElementById("divOrderBypaisAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(pais_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelpaisAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(pais_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(pais_control.paisActual!=null) {//form
			
			this.actualizarCamposFilaTabla(pais_control);			
		}
	}
	
	actualizarCamposFilaTabla(pais_control) {
		var i=0;
		
		i=pais_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(pais_control.paisActual.id);
		jQuery("#t-version_row_"+i+"").val(pais_control.paisActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(pais_control.paisActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(pais_control.paisActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(pais_control.paisActual.nombre);
		jQuery("#t-cel_"+i+"_5").val(pais_control.paisActual.iva);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(pais_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionparametro_general").click(function(){
		jQuery("#tblTablaDatospaiss").on("click",".imgrelacionparametro_general", function () {

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaparametro_generales(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatospaiss").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatospaiss").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaproveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondato_general_usuario").click(function(){
		jQuery("#tblTablaDatospaiss").on("click",".imgrelaciondato_general_usuario", function () {

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionsucursal").click(function(){
		jQuery("#tblTablaDatospaiss").on("click",".imgrelacionsucursal", function () {

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParasucursals(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionprovincia").click(function(){
		jQuery("#tblTablaDatospaiss").on("click",".imgrelacionprovincia", function () {

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaprovinciaes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionempresa").click(function(){
		jQuery("#tblTablaDatospaiss").on("click",".imgrelacionempresa", function () {

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaempresas(idActual);
		});				
	}
		
	

	registrarSesionParaparametro_generales(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"pais","parametro_general","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1,"es","");
	}

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"pais","cliente","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1,"s","");
	}

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"pais","proveedor","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1,"es","");
	}

	registrarSesionParadato_general_usuarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"pais","dato_general_usuario","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1,"s","");
	}

	registrarSesionParasucursals(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"pais","sucursal","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1,"s","");
	}

	registrarSesionParaprovinciaes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"pais","provincia","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1,"es","");
	}

	registrarSesionParaempresas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"pais","empresa","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1,"s","");
	}
	
	registrarControlesTableEdition(pais_control) {
		pais_funcion1.registrarControlesTableValidacionEdition(pais_control,pais_webcontrol1,pais_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(pais_control) {
		jQuery("#divResumenpaisActualAjaxWebPart").html(pais_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(pais_control) {
		//jQuery("#divAccionesRelacionespaisAjaxWebPart").html(pais_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("pais_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(pais_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionespaisAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		pais_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(pais_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(pais_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(pais_control) {
		
		if(pais_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+pais_constante1.STR_SUFIJO+"BusquedaPorCodigo").attr("style",pais_control.strVisibleBusquedaPorCodigo);
			jQuery("#tblstrVisible"+pais_constante1.STR_SUFIJO+"BusquedaPorCodigo").attr("style",pais_control.strVisibleBusquedaPorCodigo);
		}

		if(pais_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+pais_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",pais_control.strVisibleBusquedaPorNombre);
			jQuery("#tblstrVisible"+pais_constante1.STR_SUFIJO+"BusquedaPorNombre").attr("style",pais_control.strVisibleBusquedaPorNombre);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionpais();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("pais","seguridad","",pais_funcion1,pais_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("pais",id,"seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionparametro_general").click(function(){

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaparametro_generales(idActual);
		});
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		jQuery("#imgdivrelaciondato_general_usuario").click(function(){

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParadato_general_usuarios(idActual);
		});
		jQuery("#imgdivrelacionsucursal").click(function(){

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParasucursals(idActual);
		});
		jQuery("#imgdivrelacionprovincia").click(function(){

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaprovinciaes(idActual);
		});
		jQuery("#imgdivrelacionempresa").click(function(){

			var idActual=jQuery(this).attr("idactualpais");

			pais_webcontrol1.registrarSesionParaempresas(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,paisConstante,strParametros);
		
		//pais_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//pais_control
		
	
	}
	
	onLoadCombosDefectoFK(pais_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pais_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(pais_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pais_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(pais_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pais_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(pais_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(pais_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("pais","seguridad","",pais_funcion1,pais_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("pais","seguridad","",pais_funcion1,pais_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("pais","BusquedaPorCodigo","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("pais","BusquedaPorNombre","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
		
			
			if(pais_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("pais","seguridad","",pais_funcion1,pais_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("pais");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("pais");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(pais_funcion1,pais_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(pais_funcion1,pais_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(pais_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("pais","seguridad","",pais_funcion1,pais_webcontrol1,"pais");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("pais","seguridad","",pais_funcion1,pais_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("pais");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(pais_control) {
		
		jQuery("#divBusquedapaisAjaxWebPart").css("display",pais_control.strPermisoBusqueda);
		jQuery("#trpaisCabeceraBusquedas").css("display",pais_control.strPermisoBusqueda);
		jQuery("#trBusquedapais").css("display",pais_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportepais").css("display",pais_control.strPermisoReporte);			
		jQuery("#tdMostrarTodospais").attr("style",pais_control.strPermisoMostrarTodos);		
		
		if(pais_control.strPermisoNuevo!=null) {
			jQuery("#tdpaisNuevo").css("display",pais_control.strPermisoNuevo);
			jQuery("#tdpaisNuevoToolBar").css("display",pais_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdpaisDuplicar").css("display",pais_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdpaisDuplicarToolBar").css("display",pais_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdpaisNuevoGuardarCambios").css("display",pais_control.strPermisoNuevo);
			jQuery("#tdpaisNuevoGuardarCambiosToolBar").css("display",pais_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(pais_control.strPermisoActualizar!=null) {
			jQuery("#tdpaisCopiar").css("display",pais_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpaisCopiarToolBar").css("display",pais_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpaisConEditar").css("display",pais_control.strPermisoActualizar);
		}
		
		jQuery("#tdpaisGuardarCambios").css("display",pais_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdpaisGuardarCambiosToolBar").css("display",pais_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdpaisCerrarPagina").css("display",pais_control.strPermisoPopup);		
		jQuery("#tdpaisCerrarPaginaToolBar").css("display",pais_control.strPermisoPopup);
		//jQuery("#trpaisAccionesRelaciones").css("display",pais_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=pais_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + pais_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + pais_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Paises";
		sTituloBanner+=" - " + pais_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + pais_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdpaisRelacionesToolBar").css("display",pais_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultospais").css("display",pais_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("pais","seguridad","",pais_funcion1,pais_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		pais_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		pais_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		pais_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		pais_webcontrol1.registrarEventosControles();
		
		if(pais_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(pais_constante1.STR_ES_RELACIONADO=="false") {
			pais_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(pais_constante1.STR_ES_RELACIONES=="true") {
			if(pais_constante1.BIT_ES_PAGINA_FORM==true) {
				pais_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(pais_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(pais_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				pais_webcontrol1.onLoad();
			
			//} else {
				//if(pais_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			pais_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("pais","seguridad","",pais_funcion1,pais_webcontrol1,pais_constante1);	
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

var pais_webcontrol1 = new pais_webcontrol();

//Para ser llamado desde otro archivo (import)
export {pais_webcontrol,pais_webcontrol1};

//Para ser llamado desde window.opener
window.pais_webcontrol1 = pais_webcontrol1;


if(pais_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = pais_webcontrol1.onLoadWindow; 
}

//</script>