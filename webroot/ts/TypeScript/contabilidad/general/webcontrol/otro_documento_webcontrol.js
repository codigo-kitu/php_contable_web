//<script type="text/javascript" language="javascript">



//var otro_documentoJQueryPaginaWebInteraccion= function (otro_documento_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {otro_documento_constante,otro_documento_constante1} from '../util/otro_documento_constante.js';

import {otro_documento_funcion,otro_documento_funcion1} from '../util/otro_documento_funcion.js';


class otro_documento_webcontrol extends GeneralEntityWebControl {
	
	otro_documento_control=null;
	otro_documento_controlInicial=null;
	otro_documento_controlAuxiliar=null;
		
	//if(otro_documento_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(otro_documento_control) {
		super();
		
		this.otro_documento_control=otro_documento_control;
	}
		
	actualizarVariablesPagina(otro_documento_control) {
		
		if(otro_documento_control.action=="index" || otro_documento_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(otro_documento_control);
			
		} 
		
		
		else if(otro_documento_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(otro_documento_control);
		
		} else if(otro_documento_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(otro_documento_control);
		
		} else if(otro_documento_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(otro_documento_control);
		
		} else if(otro_documento_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(otro_documento_control);
			
		} else if(otro_documento_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(otro_documento_control);
			
		} else if(otro_documento_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(otro_documento_control);
		
		} else if(otro_documento_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(otro_documento_control);		
		
		} else if(otro_documento_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(otro_documento_control);
		
		} else if(otro_documento_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(otro_documento_control);
		
		} else if(otro_documento_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(otro_documento_control);
		
		} else if(otro_documento_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(otro_documento_control);
		
		}  else if(otro_documento_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(otro_documento_control);
		
		} else if(otro_documento_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(otro_documento_control);
		
		} else if(otro_documento_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(otro_documento_control);
		
		} else if(otro_documento_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(otro_documento_control);
		
		} else if(otro_documento_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(otro_documento_control);
		
		} else if(otro_documento_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(otro_documento_control);
		
		} else if(otro_documento_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(otro_documento_control);
		
		} else if(otro_documento_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(otro_documento_control);
		
		} else if(otro_documento_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(otro_documento_control);
		
		} else if(otro_documento_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(otro_documento_control);		
		
		} else if(otro_documento_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(otro_documento_control);		
		
		} else if(otro_documento_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(otro_documento_control);		
		
		} else if(otro_documento_control.action.includes("Busqueda") ||
				  otro_documento_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(otro_documento_control);
			
		} else if(otro_documento_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(otro_documento_control)
		}
		
		
		
	
		else if(otro_documento_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(otro_documento_control);	
		
		} else if(otro_documento_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(otro_documento_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + otro_documento_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(otro_documento_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(otro_documento_control) {
		this.actualizarPaginaAccionesGenerales(otro_documento_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(otro_documento_control) {
		
		this.actualizarPaginaCargaGeneral(otro_documento_control);
		this.actualizarPaginaOrderBy(otro_documento_control);
		this.actualizarPaginaTablaDatos(otro_documento_control);
		this.actualizarPaginaCargaGeneralControles(otro_documento_control);
		//this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_documento_control);
		this.actualizarPaginaAreaBusquedas(otro_documento_control);
		this.actualizarPaginaCargaCombosFK(otro_documento_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(otro_documento_control) {
		//this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(otro_documento_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(otro_documento_control) {
		
		this.actualizarPaginaCargaGeneral(otro_documento_control);
		this.actualizarPaginaTablaDatos(otro_documento_control);
		this.actualizarPaginaCargaGeneralControles(otro_documento_control);
		//this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_documento_control);
		this.actualizarPaginaAreaBusquedas(otro_documento_control);
		this.actualizarPaginaCargaCombosFK(otro_documento_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		//this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		//this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		//this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(otro_documento_control) {
		//this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(otro_documento_control) {
		this.actualizarPaginaAbrirLink(otro_documento_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);				
		//this.actualizarPaginaFormulario(otro_documento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);
		//this.actualizarPaginaFormulario(otro_documento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);
		//this.actualizarPaginaFormulario(otro_documento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(otro_documento_control) {
		//this.actualizarPaginaFormulario(otro_documento_control);
		this.onLoadCombosDefectoFK(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);
		//this.actualizarPaginaFormulario(otro_documento_control);
		this.onLoadCombosDefectoFK(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(otro_documento_control) {
		this.actualizarPaginaAbrirLink(otro_documento_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(otro_documento_control) {
		this.actualizarPaginaTablaDatos(otro_documento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(otro_documento_control) {
					//super.actualizarPaginaImprimir(otro_documento_control,"otro_documento");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",otro_documento_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("otro_documento_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(otro_documento_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(otro_documento_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(otro_documento_control) {
		//super.actualizarPaginaImprimir(otro_documento_control,"otro_documento");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("otro_documento_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(otro_documento_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",otro_documento_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(otro_documento_control) {
		//super.actualizarPaginaImprimir(otro_documento_control,"otro_documento");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("otro_documento_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(otro_documento_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",otro_documento_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(otro_documento_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(otro_documento_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(otro_documento_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(otro_documento_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(otro_documento_control);
			
		this.actualizarPaginaAbrirLink(otro_documento_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(otro_documento_control) {
		
		if(otro_documento_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(otro_documento_control);
		}
		
		if(otro_documento_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(otro_documento_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(otro_documento_control) {
		if(otro_documento_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("otro_documentoReturnGeneral",JSON.stringify(otro_documento_control.otro_documentoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(otro_documento_control) {
		if(otro_documento_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && otro_documento_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(otro_documento_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(otro_documento_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(otro_documento_control, mostrar) {
		
		if(mostrar==true) {
			otro_documento_funcion1.resaltarRestaurarDivsPagina(false,"otro_documento");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				otro_documento_funcion1.resaltarRestaurarDivMantenimiento(false,"otro_documento");
			}			
			
			otro_documento_funcion1.mostrarDivMensaje(true,otro_documento_control.strAuxiliarMensaje,otro_documento_control.strAuxiliarCssMensaje);
		
		} else {
			otro_documento_funcion1.mostrarDivMensaje(false,otro_documento_control.strAuxiliarMensaje,otro_documento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(otro_documento_control) {
		if(otro_documento_funcion1.esPaginaForm(otro_documento_constante1)==true) {
			window.opener.otro_documento_webcontrol1.actualizarPaginaTablaDatos(otro_documento_control);
		} else {
			this.actualizarPaginaTablaDatos(otro_documento_control);
		}
	}
	
	actualizarPaginaAbrirLink(otro_documento_control) {
		otro_documento_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(otro_documento_control.strAuxiliarUrlPagina);
				
		otro_documento_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(otro_documento_control.strAuxiliarTipo,otro_documento_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(otro_documento_control) {
		otro_documento_funcion1.resaltarRestaurarDivMensaje(true,otro_documento_control.strAuxiliarMensajeAlert,otro_documento_control.strAuxiliarCssMensaje);
			
		if(otro_documento_funcion1.esPaginaForm(otro_documento_constante1)==true) {
			window.opener.otro_documento_funcion1.resaltarRestaurarDivMensaje(true,otro_documento_control.strAuxiliarMensajeAlert,otro_documento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(otro_documento_control) {
		this.otro_documento_controlInicial=otro_documento_control;
			
		if(otro_documento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(otro_documento_control.strStyleDivArbol,otro_documento_control.strStyleDivContent
																,otro_documento_control.strStyleDivOpcionesBanner,otro_documento_control.strStyleDivExpandirColapsar
																,otro_documento_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=otro_documento_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",otro_documento_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(otro_documento_control) {
		this.actualizarCssBotonesPagina(otro_documento_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(otro_documento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(otro_documento_control.tiposReportes,otro_documento_control.tiposReporte
															 	,otro_documento_control.tiposPaginacion,otro_documento_control.tiposAcciones
																,otro_documento_control.tiposColumnasSelect,otro_documento_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(otro_documento_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(otro_documento_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(otro_documento_control);			
	}
	
	actualizarPaginaUsuarioInvitado(otro_documento_control) {
	
		var indexPosition=otro_documento_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=otro_documento_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(otro_documento_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(otro_documento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_archivo",otro_documento_control.strRecargarFkTipos,",")) { 
				otro_documento_webcontrol1.cargarCombosarchivosFK(otro_documento_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(otro_documento_control.strRecargarFkTiposNinguno!=null && otro_documento_control.strRecargarFkTiposNinguno!='NINGUNO' && otro_documento_control.strRecargarFkTiposNinguno!='') {
			
				if(otro_documento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_archivo",otro_documento_control.strRecargarFkTiposNinguno,",")) { 
					otro_documento_webcontrol1.cargarCombosarchivosFK(otro_documento_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaarchivoFK(otro_documento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_documento_funcion1,otro_documento_control.archivosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(otro_documento_control) {
		jQuery("#divBusquedaotro_documentoAjaxWebPart").css("display",otro_documento_control.strPermisoBusqueda);
		jQuery("#trotro_documentoCabeceraBusquedas").css("display",otro_documento_control.strPermisoBusqueda);
		jQuery("#trBusquedaotro_documento").css("display",otro_documento_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(otro_documento_control.htmlTablaOrderBy!=null
			&& otro_documento_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByotro_documentoAjaxWebPart").html(otro_documento_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//otro_documento_webcontrol1.registrarOrderByActions();
			
		}
			
		if(otro_documento_control.htmlTablaOrderByRel!=null
			&& otro_documento_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelotro_documentoAjaxWebPart").html(otro_documento_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(otro_documento_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaotro_documentoAjaxWebPart").css("display","none");
			jQuery("#trotro_documentoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaotro_documento").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(otro_documento_control) {
		
		if(!otro_documento_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(otro_documento_control);
		} else {
			jQuery("#divTablaDatosotro_documentosAjaxWebPart").html(otro_documento_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosotro_documentos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(otro_documento_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosotro_documentos=jQuery("#tblTablaDatosotro_documentos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("otro_documento",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',otro_documento_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			otro_documento_webcontrol1.registrarControlesTableEdition(otro_documento_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		otro_documento_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(otro_documento_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("otro_documento_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(otro_documento_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosotro_documentosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(otro_documento_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(otro_documento_control);
		
		const divOrderBy = document.getElementById("divOrderByotro_documentoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(otro_documento_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelotro_documentoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(otro_documento_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(otro_documento_control.otro_documentoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(otro_documento_control);			
		}
	}
	
	actualizarCamposFilaTabla(otro_documento_control) {
		var i=0;
		
		i=otro_documento_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(otro_documento_control.otro_documentoActual.id);
		jQuery("#t-version_row_"+i+"").val(otro_documento_control.otro_documentoActual.versionRow);
		
		if(otro_documento_control.otro_documentoActual.id_archivo!=null && otro_documento_control.otro_documentoActual.id_archivo>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != otro_documento_control.otro_documentoActual.id_archivo) {
				jQuery("#t-cel_"+i+"_2").val(otro_documento_control.otro_documentoActual.id_archivo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(otro_documento_control.otro_documentoActual.nombre);
		jQuery("#t-cel_"+i+"_4").val(otro_documento_control.otro_documentoActual.data);
		jQuery("#t-cel_"+i+"_5").val(otro_documento_control.otro_documentoActual.campo1);
		jQuery("#t-cel_"+i+"_6").val(otro_documento_control.otro_documentoActual.campo2);
		jQuery("#t-cel_"+i+"_7").val(otro_documento_control.otro_documentoActual.campo3);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(otro_documento_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(otro_documento_control) {
		otro_documento_funcion1.registrarControlesTableValidacionEdition(otro_documento_control,otro_documento_webcontrol1,otro_documento_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(otro_documento_control) {
		jQuery("#divResumenotro_documentoActualAjaxWebPart").html(otro_documento_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_documento_control) {
		//jQuery("#divAccionesRelacionesotro_documentoAjaxWebPart").html(otro_documento_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("otro_documento_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(otro_documento_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesotro_documentoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		otro_documento_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(otro_documento_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(otro_documento_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(otro_documento_control) {
		
		if(otro_documento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo").attr("style",otro_documento_control.strVisibleFK_Idarchivo);
			jQuery("#tblstrVisible"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo").attr("style",otro_documento_control.strVisibleFK_Idarchivo);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionotro_documento();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("otro_documento",id,"general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);		
	}
	
	

	abrirBusquedaParaarchivo(strNombreCampoBusqueda){//idActual
		otro_documento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("otro_documento","archivo","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documentoConstante,strParametros);
		
		//otro_documento_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosarchivosFK(otro_documento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo",otro_documento_control.archivosFK);

		if(otro_documento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_documento_control.idFilaTablaActual+"_2",otro_documento_control.archivosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo-cmbid_archivo",otro_documento_control.archivosFK);

	};

	
	
	registrarComboActionChangeCombosarchivosFK(otro_documento_control) {

	};

	
	
	setDefectoValorCombosarchivosFK(otro_documento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_documento_control.idarchivoDefaultFK>-1 && jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").val() != otro_documento_control.idarchivoDefaultFK) {
				jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo").val(otro_documento_control.idarchivoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo-cmbid_archivo").val(otro_documento_control.idarchivoDefaultForeignKey).trigger("change");
			if(jQuery("#"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo-cmbid_archivo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+otro_documento_constante1.STR_SUFIJO+"FK_Idarchivo-cmbid_archivo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//otro_documento_control
		
	
	}
	
	onLoadCombosDefectoFK(otro_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(otro_documento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_archivo",otro_documento_control.strRecargarFkTipos,",")) { 
				otro_documento_webcontrol1.setDefectoValorCombosarchivosFK(otro_documento_control);
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
	onLoadCombosEventosFK(otro_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(otro_documento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_archivo",otro_documento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_documento_webcontrol1.registrarComboActionChangeCombosarchivosFK(otro_documento_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(otro_documento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_documento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(otro_documento_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(otro_documento_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("otro_documento","FK_Idarchivo","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
		
			
			if(otro_documento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("otro_documento");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("otro_documento");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(otro_documento_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,"otro_documento");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("archivo","id_archivo","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_documento_constante1.STR_SUFIJO+"-id_archivo_img_busqueda").click(function(){
				otro_documento_webcontrol1.abrirBusquedaParaarchivo("id_archivo");
				//alert(jQuery('#form-id_archivo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(otro_documento_control) {
		
		jQuery("#divBusquedaotro_documentoAjaxWebPart").css("display",otro_documento_control.strPermisoBusqueda);
		jQuery("#trotro_documentoCabeceraBusquedas").css("display",otro_documento_control.strPermisoBusqueda);
		jQuery("#trBusquedaotro_documento").css("display",otro_documento_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteotro_documento").css("display",otro_documento_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosotro_documento").attr("style",otro_documento_control.strPermisoMostrarTodos);		
		
		if(otro_documento_control.strPermisoNuevo!=null) {
			jQuery("#tdotro_documentoNuevo").css("display",otro_documento_control.strPermisoNuevo);
			jQuery("#tdotro_documentoNuevoToolBar").css("display",otro_documento_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdotro_documentoDuplicar").css("display",otro_documento_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdotro_documentoDuplicarToolBar").css("display",otro_documento_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdotro_documentoNuevoGuardarCambios").css("display",otro_documento_control.strPermisoNuevo);
			jQuery("#tdotro_documentoNuevoGuardarCambiosToolBar").css("display",otro_documento_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(otro_documento_control.strPermisoActualizar!=null) {
			jQuery("#tdotro_documentoCopiar").css("display",otro_documento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_documentoCopiarToolBar").css("display",otro_documento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_documentoConEditar").css("display",otro_documento_control.strPermisoActualizar);
		}
		
		jQuery("#tdotro_documentoGuardarCambios").css("display",otro_documento_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdotro_documentoGuardarCambiosToolBar").css("display",otro_documento_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdotro_documentoCerrarPagina").css("display",otro_documento_control.strPermisoPopup);		
		jQuery("#tdotro_documentoCerrarPaginaToolBar").css("display",otro_documento_control.strPermisoPopup);
		//jQuery("#trotro_documentoAccionesRelaciones").css("display",otro_documento_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=otro_documento_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_documento_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + otro_documento_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Otros Documentoses";
		sTituloBanner+=" - " + otro_documento_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_documento_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdotro_documentoRelacionesToolBar").css("display",otro_documento_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosotro_documento").css("display",otro_documento_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		otro_documento_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		otro_documento_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		otro_documento_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		otro_documento_webcontrol1.registrarEventosControles();
		
		if(otro_documento_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(otro_documento_constante1.STR_ES_RELACIONADO=="false") {
			otro_documento_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(otro_documento_constante1.STR_ES_RELACIONES=="true") {
			if(otro_documento_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_documento_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(otro_documento_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(otro_documento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				otro_documento_webcontrol1.onLoad();
			
			//} else {
				//if(otro_documento_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			otro_documento_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("otro_documento","general","",otro_documento_funcion1,otro_documento_webcontrol1,otro_documento_constante1);	
	}
}

var otro_documento_webcontrol1 = new otro_documento_webcontrol();

//Para ser llamado desde otro archivo (import)
export {otro_documento_webcontrol,otro_documento_webcontrol1};

//Para ser llamado desde window.opener
window.otro_documento_webcontrol1 = otro_documento_webcontrol1;


if(otro_documento_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = otro_documento_webcontrol1.onLoadWindow; 
}

//</script>