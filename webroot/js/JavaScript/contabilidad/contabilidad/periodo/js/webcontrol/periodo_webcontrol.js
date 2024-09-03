//<script type="text/javascript" language="javascript">



//var periodoJQueryPaginaWebInteraccion= function (periodo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {periodo_constante,periodo_constante1} from '../util/periodo_constante.js';

import {periodo_funcion,periodo_funcion1} from '../util/periodo_funcion.js';


class periodo_webcontrol extends GeneralEntityWebControl {
	
	periodo_control=null;
	periodo_controlInicial=null;
	periodo_controlAuxiliar=null;
		
	//if(periodo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(periodo_control) {
		super();
		
		this.periodo_control=periodo_control;
	}
		
	actualizarVariablesPagina(periodo_control) {
		
		if(periodo_control.action=="index" || periodo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(periodo_control);
			
		} 
		
		
		else if(periodo_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(periodo_control);
		
		} else if(periodo_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(periodo_control);
		
		} else if(periodo_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(periodo_control);
		
		} else if(periodo_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(periodo_control);
			
		} else if(periodo_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(periodo_control);
			
		} else if(periodo_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(periodo_control);
		
		} else if(periodo_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(periodo_control);		
		
		} else if(periodo_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(periodo_control);
		
		} else if(periodo_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(periodo_control);
		
		} else if(periodo_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(periodo_control);
		
		} else if(periodo_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(periodo_control);
		
		}  else if(periodo_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(periodo_control);
		
		} else if(periodo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(periodo_control);
		
		} else if(periodo_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(periodo_control);
		
		} else if(periodo_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(periodo_control);
		
		} else if(periodo_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(periodo_control);
		
		} else if(periodo_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(periodo_control);
		
		} else if(periodo_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(periodo_control);
		
		} else if(periodo_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(periodo_control);
		
		} else if(periodo_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(periodo_control);
		
		} else if(periodo_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(periodo_control);		
		
		} else if(periodo_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(periodo_control);		
		
		} else if(periodo_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(periodo_control);		
		
		} else if(periodo_control.action.includes("Busqueda") ||
				  periodo_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(periodo_control);
			
		} else if(periodo_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(periodo_control)
		}
		
		
		
	
		else if(periodo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(periodo_control);	
		
		} else if(periodo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(periodo_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + periodo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(periodo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(periodo_control) {
		this.actualizarPaginaAccionesGenerales(periodo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(periodo_control) {
		
		this.actualizarPaginaCargaGeneral(periodo_control);
		this.actualizarPaginaOrderBy(periodo_control);
		this.actualizarPaginaTablaDatos(periodo_control);
		this.actualizarPaginaCargaGeneralControles(periodo_control);
		//this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(periodo_control);
		this.actualizarPaginaAreaBusquedas(periodo_control);
		this.actualizarPaginaCargaCombosFK(periodo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(periodo_control) {
		//this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(periodo_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(periodo_control) {
		
		this.actualizarPaginaCargaGeneral(periodo_control);
		this.actualizarPaginaTablaDatos(periodo_control);
		this.actualizarPaginaCargaGeneralControles(periodo_control);
		//this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(periodo_control);
		this.actualizarPaginaAreaBusquedas(periodo_control);
		this.actualizarPaginaCargaCombosFK(periodo_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		//this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		//this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		//this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		//this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		//this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		//this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(periodo_control) {
		//this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(periodo_control) {
		this.actualizarPaginaAbrirLink(periodo_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);				
		//this.actualizarPaginaFormulario(periodo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);
		//this.actualizarPaginaFormulario(periodo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		//this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);
		//this.actualizarPaginaFormulario(periodo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(periodo_control) {
		//this.actualizarPaginaFormulario(periodo_control);
		this.onLoadCombosDefectoFK(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);
		//this.actualizarPaginaFormulario(periodo_control);
		this.onLoadCombosDefectoFK(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);		
		//this.actualizarPaginaAreaMantenimiento(periodo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(periodo_control) {
		this.actualizarPaginaAbrirLink(periodo_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(periodo_control) {
		this.actualizarPaginaTablaDatos(periodo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(periodo_control) {
					//super.actualizarPaginaImprimir(periodo_control,"periodo");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",periodo_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("periodo_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(periodo_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(periodo_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(periodo_control) {
		//super.actualizarPaginaImprimir(periodo_control,"periodo");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("periodo_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(periodo_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",periodo_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(periodo_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(periodo_control) {
		//super.actualizarPaginaImprimir(periodo_control,"periodo");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("periodo_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(periodo_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",periodo_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(periodo_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(periodo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(periodo_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(periodo_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(periodo_control);
			
		this.actualizarPaginaAbrirLink(periodo_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(periodo_control) {
		
		if(periodo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(periodo_control);
		}
		
		if(periodo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(periodo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(periodo_control) {
		if(periodo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("periodoReturnGeneral",JSON.stringify(periodo_control.periodoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(periodo_control) {
		if(periodo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && periodo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(periodo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(periodo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(periodo_control, mostrar) {
		
		if(mostrar==true) {
			periodo_funcion1.resaltarRestaurarDivsPagina(false,"periodo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				periodo_funcion1.resaltarRestaurarDivMantenimiento(false,"periodo");
			}			
			
			periodo_funcion1.mostrarDivMensaje(true,periodo_control.strAuxiliarMensaje,periodo_control.strAuxiliarCssMensaje);
		
		} else {
			periodo_funcion1.mostrarDivMensaje(false,periodo_control.strAuxiliarMensaje,periodo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(periodo_control) {
		if(periodo_funcion1.esPaginaForm(periodo_constante1)==true) {
			window.opener.periodo_webcontrol1.actualizarPaginaTablaDatos(periodo_control);
		} else {
			this.actualizarPaginaTablaDatos(periodo_control);
		}
	}
	
	actualizarPaginaAbrirLink(periodo_control) {
		periodo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(periodo_control.strAuxiliarUrlPagina);
				
		periodo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(periodo_control.strAuxiliarTipo,periodo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(periodo_control) {
		periodo_funcion1.resaltarRestaurarDivMensaje(true,periodo_control.strAuxiliarMensajeAlert,periodo_control.strAuxiliarCssMensaje);
			
		if(periodo_funcion1.esPaginaForm(periodo_constante1)==true) {
			window.opener.periodo_funcion1.resaltarRestaurarDivMensaje(true,periodo_control.strAuxiliarMensajeAlert,periodo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(periodo_control) {
		this.periodo_controlInicial=periodo_control;
			
		if(periodo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(periodo_control.strStyleDivArbol,periodo_control.strStyleDivContent
																,periodo_control.strStyleDivOpcionesBanner,periodo_control.strStyleDivExpandirColapsar
																,periodo_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=periodo_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",periodo_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(periodo_control) {
		this.actualizarCssBotonesPagina(periodo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(periodo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(periodo_control.tiposReportes,periodo_control.tiposReporte
															 	,periodo_control.tiposPaginacion,periodo_control.tiposAcciones
																,periodo_control.tiposColumnasSelect,periodo_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(periodo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(periodo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(periodo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(periodo_control) {
	
		var indexPosition=periodo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=periodo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(periodo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(periodo_control.strRecargarFkTiposNinguno!=null && periodo_control.strRecargarFkTiposNinguno!='NINGUNO' && periodo_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(periodo_control) {
		jQuery("#divBusquedaperiodoAjaxWebPart").css("display",periodo_control.strPermisoBusqueda);
		jQuery("#trperiodoCabeceraBusquedas").css("display",periodo_control.strPermisoBusqueda);
		jQuery("#trBusquedaperiodo").css("display",periodo_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(periodo_control.htmlTablaOrderBy!=null
			&& periodo_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByperiodoAjaxWebPart").html(periodo_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//periodo_webcontrol1.registrarOrderByActions();
			
		}
			
		if(periodo_control.htmlTablaOrderByRel!=null
			&& periodo_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelperiodoAjaxWebPart").html(periodo_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(periodo_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaperiodoAjaxWebPart").css("display","none");
			jQuery("#trperiodoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaperiodo").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(periodo_control) {
		
		if(!periodo_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(periodo_control);
		} else {
			jQuery("#divTablaDatosperiodosAjaxWebPart").html(periodo_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosperiodos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(periodo_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosperiodos=jQuery("#tblTablaDatosperiodos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("periodo",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',periodo_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			periodo_webcontrol1.registrarControlesTableEdition(periodo_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		periodo_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(periodo_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("periodo_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(periodo_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosperiodosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(periodo_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(periodo_control);
		
		const divOrderBy = document.getElementById("divOrderByperiodoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(periodo_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelperiodoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(periodo_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(periodo_control.periodoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(periodo_control);			
		}
	}
	
	actualizarCamposFilaTabla(periodo_control) {
		var i=0;
		
		i=periodo_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(periodo_control.periodoActual.id);
		jQuery("#t-version_row_"+i+"").val(periodo_control.periodoActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(periodo_control.periodoActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(periodo_control.periodoActual.nombre);
		jQuery("#t-cel_"+i+"_4").val(periodo_control.periodoActual.fecha_inicio);
		jQuery("#t-cel_"+i+"_5").val(periodo_control.periodoActual.fecha_fin);
		jQuery("#t-cel_"+i+"_6").val(periodo_control.periodoActual.descripcion);
		jQuery("#t-cel_"+i+"_7").prop('checked',periodo_control.periodoActual.activo);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(periodo_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(periodo_control) {
		periodo_funcion1.registrarControlesTableValidacionEdition(periodo_control,periodo_webcontrol1,periodo_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(periodo_control) {
		jQuery("#divResumenperiodoActualAjaxWebPart").html(periodo_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(periodo_control) {
		//jQuery("#divAccionesRelacionesperiodoAjaxWebPart").html(periodo_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("periodo_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(periodo_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesperiodoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		periodo_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(periodo_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(periodo_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(periodo_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionperiodo();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("periodo",id,"contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodoConstante,strParametros);
		
		//periodo_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//periodo_control
		
	
	}
	
	onLoadCombosDefectoFK(periodo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(periodo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(periodo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(periodo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(periodo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(periodo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(periodo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(periodo_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);			
			
			
		
			
			if(periodo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("periodo");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("periodo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(periodo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,"periodo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(periodo_control) {
		
		jQuery("#divBusquedaperiodoAjaxWebPart").css("display",periodo_control.strPermisoBusqueda);
		jQuery("#trperiodoCabeceraBusquedas").css("display",periodo_control.strPermisoBusqueda);
		jQuery("#trBusquedaperiodo").css("display",periodo_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteperiodo").css("display",periodo_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosperiodo").attr("style",periodo_control.strPermisoMostrarTodos);		
		
		if(periodo_control.strPermisoNuevo!=null) {
			jQuery("#tdperiodoNuevo").css("display",periodo_control.strPermisoNuevo);
			jQuery("#tdperiodoNuevoToolBar").css("display",periodo_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdperiodoDuplicar").css("display",periodo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperiodoDuplicarToolBar").css("display",periodo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperiodoNuevoGuardarCambios").css("display",periodo_control.strPermisoNuevo);
			jQuery("#tdperiodoNuevoGuardarCambiosToolBar").css("display",periodo_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(periodo_control.strPermisoActualizar!=null) {
			jQuery("#tdperiodoCopiar").css("display",periodo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperiodoCopiarToolBar").css("display",periodo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperiodoConEditar").css("display",periodo_control.strPermisoActualizar);
		}
		
		jQuery("#tdperiodoGuardarCambios").css("display",periodo_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdperiodoGuardarCambiosToolBar").css("display",periodo_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdperiodoCerrarPagina").css("display",periodo_control.strPermisoPopup);		
		jQuery("#tdperiodoCerrarPaginaToolBar").css("display",periodo_control.strPermisoPopup);
		//jQuery("#trperiodoAccionesRelaciones").css("display",periodo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=periodo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + periodo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + periodo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " periodos";
		sTituloBanner+=" - " + periodo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + periodo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdperiodoRelacionesToolBar").css("display",periodo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosperiodo").css("display",periodo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		periodo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		periodo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		periodo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		periodo_webcontrol1.registrarEventosControles();
		
		if(periodo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(periodo_constante1.STR_ES_RELACIONADO=="false") {
			periodo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(periodo_constante1.STR_ES_RELACIONES=="true") {
			if(periodo_constante1.BIT_ES_PAGINA_FORM==true) {
				periodo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(periodo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(periodo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				periodo_webcontrol1.onLoad();
			
			//} else {
				//if(periodo_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			periodo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("periodo","contabilidad","",periodo_funcion1,periodo_webcontrol1,periodo_constante1);	
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

var periodo_webcontrol1 = new periodo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {periodo_webcontrol,periodo_webcontrol1};

//Para ser llamado desde window.opener
window.periodo_webcontrol1 = periodo_webcontrol1;


if(periodo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = periodo_webcontrol1.onLoadWindow; 
}

//</script>