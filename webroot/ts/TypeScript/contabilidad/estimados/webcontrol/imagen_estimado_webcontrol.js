//<script type="text/javascript" language="javascript">



//var imagen_estimadoJQueryPaginaWebInteraccion= function (imagen_estimado_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_estimado_constante,imagen_estimado_constante1} from '../util/imagen_estimado_constante.js';

import {imagen_estimado_funcion,imagen_estimado_funcion1} from '../util/imagen_estimado_funcion.js';


class imagen_estimado_webcontrol extends GeneralEntityWebControl {
	
	imagen_estimado_control=null;
	imagen_estimado_controlInicial=null;
	imagen_estimado_controlAuxiliar=null;
		
	//if(imagen_estimado_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_estimado_control) {
		super();
		
		this.imagen_estimado_control=imagen_estimado_control;
	}
		
	actualizarVariablesPagina(imagen_estimado_control) {
		
		if(imagen_estimado_control.action=="index" || imagen_estimado_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_estimado_control);
			
		} 
		
		
		else if(imagen_estimado_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_estimado_control);
			
		} else if(imagen_estimado_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_estimado_control);
			
		} else if(imagen_estimado_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_estimado_control);		
		
		} else if(imagen_estimado_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_estimado_control);
		
		}  else if(imagen_estimado_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_estimado_control);
		
		} else if(imagen_estimado_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_estimado_control);		
		
		} else if(imagen_estimado_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_estimado_control);		
		
		} else if(imagen_estimado_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_estimado_control);		
		
		} else if(imagen_estimado_control.action.includes("Busqueda") ||
				  imagen_estimado_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(imagen_estimado_control);
			
		} else if(imagen_estimado_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_estimado_control)
		}
		
		
		
	
		else if(imagen_estimado_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_estimado_control);	
		
		} else if(imagen_estimado_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_estimado_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_estimado_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_estimado_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_estimado_control) {
		this.actualizarPaginaAccionesGenerales(imagen_estimado_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_estimado_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_estimado_control);
		this.actualizarPaginaOrderBy(imagen_estimado_control);
		this.actualizarPaginaTablaDatos(imagen_estimado_control);
		this.actualizarPaginaCargaGeneralControles(imagen_estimado_control);
		//this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_estimado_control);
		this.actualizarPaginaAreaBusquedas(imagen_estimado_control);
		this.actualizarPaginaCargaCombosFK(imagen_estimado_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_estimado_control) {
		//this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_estimado_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_estimado_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_estimado_control);
		this.actualizarPaginaTablaDatos(imagen_estimado_control);
		this.actualizarPaginaCargaGeneralControles(imagen_estimado_control);
		//this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_estimado_control);
		this.actualizarPaginaAreaBusquedas(imagen_estimado_control);
		this.actualizarPaginaCargaCombosFK(imagen_estimado_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		//this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		//this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		//this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_estimado_control) {
		//this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_estimado_control) {
		this.actualizarPaginaAbrirLink(imagen_estimado_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);				
		//this.actualizarPaginaFormulario(imagen_estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);
		//this.actualizarPaginaFormulario(imagen_estimado_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);
		//this.actualizarPaginaFormulario(imagen_estimado_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_estimado_control) {
		//this.actualizarPaginaFormulario(imagen_estimado_control);
		this.onLoadCombosDefectoFK(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);
		//this.actualizarPaginaFormulario(imagen_estimado_control);
		this.onLoadCombosDefectoFK(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_estimado_control) {
		this.actualizarPaginaAbrirLink(imagen_estimado_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_estimado_control) {
		this.actualizarPaginaTablaDatos(imagen_estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_estimado_control) {
					//super.actualizarPaginaImprimir(imagen_estimado_control,"imagen_estimado");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_estimado_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("imagen_estimado_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_estimado_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_estimado_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_estimado_control) {
		//super.actualizarPaginaImprimir(imagen_estimado_control,"imagen_estimado");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("imagen_estimado_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(imagen_estimado_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_estimado_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_estimado_control) {
		//super.actualizarPaginaImprimir(imagen_estimado_control,"imagen_estimado");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("imagen_estimado_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_estimado_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_estimado_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_estimado_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_estimado_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_estimado_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(imagen_estimado_control);
			
		this.actualizarPaginaAbrirLink(imagen_estimado_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_estimado_control) {
		
		if(imagen_estimado_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_estimado_control);
		}
		
		if(imagen_estimado_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_estimado_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_estimado_control) {
		if(imagen_estimado_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_estimadoReturnGeneral",JSON.stringify(imagen_estimado_control.imagen_estimadoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_estimado_control) {
		if(imagen_estimado_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_estimado_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_estimado_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_estimado_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_estimado_control, mostrar) {
		
		if(mostrar==true) {
			imagen_estimado_funcion1.resaltarRestaurarDivsPagina(false,"imagen_estimado");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_estimado_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_estimado");
			}			
			
			imagen_estimado_funcion1.mostrarDivMensaje(true,imagen_estimado_control.strAuxiliarMensaje,imagen_estimado_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_estimado_funcion1.mostrarDivMensaje(false,imagen_estimado_control.strAuxiliarMensaje,imagen_estimado_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_estimado_control) {
		if(imagen_estimado_funcion1.esPaginaForm(imagen_estimado_constante1)==true) {
			window.opener.imagen_estimado_webcontrol1.actualizarPaginaTablaDatos(imagen_estimado_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_estimado_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_estimado_control) {
		imagen_estimado_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_estimado_control.strAuxiliarUrlPagina);
				
		imagen_estimado_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_estimado_control.strAuxiliarTipo,imagen_estimado_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_estimado_control) {
		imagen_estimado_funcion1.resaltarRestaurarDivMensaje(true,imagen_estimado_control.strAuxiliarMensajeAlert,imagen_estimado_control.strAuxiliarCssMensaje);
			
		if(imagen_estimado_funcion1.esPaginaForm(imagen_estimado_constante1)==true) {
			window.opener.imagen_estimado_funcion1.resaltarRestaurarDivMensaje(true,imagen_estimado_control.strAuxiliarMensajeAlert,imagen_estimado_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_estimado_control) {
		this.imagen_estimado_controlInicial=imagen_estimado_control;
			
		if(imagen_estimado_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_estimado_control.strStyleDivArbol,imagen_estimado_control.strStyleDivContent
																,imagen_estimado_control.strStyleDivOpcionesBanner,imagen_estimado_control.strStyleDivExpandirColapsar
																,imagen_estimado_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_estimado_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_estimado_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_estimado_control) {
		this.actualizarCssBotonesPagina(imagen_estimado_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_estimado_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_estimado_control.tiposReportes,imagen_estimado_control.tiposReporte
															 	,imagen_estimado_control.tiposPaginacion,imagen_estimado_control.tiposAcciones
																,imagen_estimado_control.tiposColumnasSelect,imagen_estimado_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_estimado_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_estimado_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_estimado_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_estimado_control) {
	
		var indexPosition=imagen_estimado_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_estimado_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_estimado_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",imagen_estimado_control.strRecargarFkTipos,",")) { 
				imagen_estimado_webcontrol1.cargarCombosestimadosFK(imagen_estimado_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_estimado_control.strRecargarFkTiposNinguno!=null && imagen_estimado_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_estimado_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estimado",imagen_estimado_control.strRecargarFkTiposNinguno,",")) { 
					imagen_estimado_webcontrol1.cargarCombosestimadosFK(imagen_estimado_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaestimadoFK(imagen_estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_estimado_funcion1,imagen_estimado_control.estimadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(imagen_estimado_control) {
		jQuery("#divBusquedaimagen_estimadoAjaxWebPart").css("display",imagen_estimado_control.strPermisoBusqueda);
		jQuery("#trimagen_estimadoCabeceraBusquedas").css("display",imagen_estimado_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_estimado").css("display",imagen_estimado_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_estimado_control.htmlTablaOrderBy!=null
			&& imagen_estimado_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_estimadoAjaxWebPart").html(imagen_estimado_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_estimado_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_estimado_control.htmlTablaOrderByRel!=null
			&& imagen_estimado_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_estimadoAjaxWebPart").html(imagen_estimado_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_estimado_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_estimadoAjaxWebPart").css("display","none");
			jQuery("#trimagen_estimadoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_estimado").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(imagen_estimado_control) {
		
		if(!imagen_estimado_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(imagen_estimado_control);
		} else {
			jQuery("#divTablaDatosimagen_estimadosAjaxWebPart").html(imagen_estimado_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_estimados=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_estimado_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_estimados=jQuery("#tblTablaDatosimagen_estimados").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_estimado",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_estimado_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_estimado_webcontrol1.registrarControlesTableEdition(imagen_estimado_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_estimado_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(imagen_estimado_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("imagen_estimado_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_estimado_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosimagen_estimadosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(imagen_estimado_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(imagen_estimado_control);
		
		const divOrderBy = document.getElementById("divOrderByimagen_estimadoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(imagen_estimado_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelimagen_estimadoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(imagen_estimado_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_estimado_control.imagen_estimadoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_estimado_control);			
		}
	}
	
	actualizarCamposFilaTabla(imagen_estimado_control) {
		var i=0;
		
		i=imagen_estimado_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_estimado_control.imagen_estimadoActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_estimado_control.imagen_estimadoActual.versionRow);
		
		if(imagen_estimado_control.imagen_estimadoActual.id_estimado!=null && imagen_estimado_control.imagen_estimadoActual.id_estimado>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != imagen_estimado_control.imagen_estimadoActual.id_estimado) {
				jQuery("#t-cel_"+i+"_2").val(imagen_estimado_control.imagen_estimadoActual.id_estimado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(imagen_estimado_control.imagen_estimadoActual.imagen);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_estimado_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_estimado_control) {
		imagen_estimado_funcion1.registrarControlesTableValidacionEdition(imagen_estimado_control,imagen_estimado_webcontrol1,imagen_estimado_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_estimado_control) {
		jQuery("#divResumenimagen_estimadoActualAjaxWebPart").html(imagen_estimado_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_estimado_control) {
		//jQuery("#divAccionesRelacionesimagen_estimadoAjaxWebPart").html(imagen_estimado_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("imagen_estimado_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_estimado_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesimagen_estimadoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		imagen_estimado_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_estimado_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_estimado_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_estimado_control) {
		
		if(imagen_estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado").attr("style",imagen_estimado_control.strVisibleFK_Idestimado);
			jQuery("#tblstrVisible"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado").attr("style",imagen_estimado_control.strVisibleFK_Idestimado);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_estimado();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_estimado",id,"estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);		
	}
	
	

	abrirBusquedaParaestimado(strNombreCampoBusqueda){//idActual
		imagen_estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_estimado","estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimadoConstante,strParametros);
		
		//imagen_estimado_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosestimadosFK(imagen_estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado",imagen_estimado_control.estimadosFK);

		if(imagen_estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_estimado_control.idFilaTablaActual+"_2",imagen_estimado_control.estimadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado",imagen_estimado_control.estimadosFK);

	};

	
	
	registrarComboActionChangeCombosestimadosFK(imagen_estimado_control) {

	};

	
	
	setDefectoValorCombosestimadosFK(imagen_estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_estimado_control.idestimadoDefaultFK>-1 && jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").val() != imagen_estimado_control.idestimadoDefaultFK) {
				jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado").val(imagen_estimado_control.idestimadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val(imagen_estimado_control.idestimadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_estimado_constante1.STR_SUFIJO+"FK_Idestimado-cmbid_estimado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_estimado_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",imagen_estimado_control.strRecargarFkTipos,",")) { 
				imagen_estimado_webcontrol1.setDefectoValorCombosestimadosFK(imagen_estimado_control);
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
	onLoadCombosEventosFK(imagen_estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estimado",imagen_estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_estimado_webcontrol1.registrarComboActionChangeCombosestimadosFK(imagen_estimado_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_estimado_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_estimado_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_estimado","FK_Idestimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
		
			
			if(imagen_estimado_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_estimado");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_estimado");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_estimado_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,"imagen_estimado");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estimado","id_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_estimado_constante1.STR_SUFIJO+"-id_estimado_img_busqueda").click(function(){
				imagen_estimado_webcontrol1.abrirBusquedaParaestimado("id_estimado");
				//alert(jQuery('#form-id_estimado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_estimado_control) {
		
		jQuery("#divBusquedaimagen_estimadoAjaxWebPart").css("display",imagen_estimado_control.strPermisoBusqueda);
		jQuery("#trimagen_estimadoCabeceraBusquedas").css("display",imagen_estimado_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_estimado").css("display",imagen_estimado_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_estimado").css("display",imagen_estimado_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_estimado").attr("style",imagen_estimado_control.strPermisoMostrarTodos);		
		
		if(imagen_estimado_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_estimadoNuevo").css("display",imagen_estimado_control.strPermisoNuevo);
			jQuery("#tdimagen_estimadoNuevoToolBar").css("display",imagen_estimado_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_estimadoDuplicar").css("display",imagen_estimado_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_estimadoDuplicarToolBar").css("display",imagen_estimado_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_estimadoNuevoGuardarCambios").css("display",imagen_estimado_control.strPermisoNuevo);
			jQuery("#tdimagen_estimadoNuevoGuardarCambiosToolBar").css("display",imagen_estimado_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_estimado_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_estimadoCopiar").css("display",imagen_estimado_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_estimadoCopiarToolBar").css("display",imagen_estimado_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_estimadoConEditar").css("display",imagen_estimado_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_estimadoGuardarCambios").css("display",imagen_estimado_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_estimadoGuardarCambiosToolBar").css("display",imagen_estimado_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdimagen_estimadoCerrarPagina").css("display",imagen_estimado_control.strPermisoPopup);		
		jQuery("#tdimagen_estimadoCerrarPaginaToolBar").css("display",imagen_estimado_control.strPermisoPopup);
		//jQuery("#trimagen_estimadoAccionesRelaciones").css("display",imagen_estimado_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_estimado_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_estimado_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_estimado_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Estimados";
		sTituloBanner+=" - " + imagen_estimado_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_estimado_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_estimadoRelacionesToolBar").css("display",imagen_estimado_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_estimado").css("display",imagen_estimado_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_estimado_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_estimado_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_estimado_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_estimado_webcontrol1.registrarEventosControles();
		
		if(imagen_estimado_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_estimado_constante1.STR_ES_RELACIONADO=="false") {
			imagen_estimado_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_estimado_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_estimado_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_estimado_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_estimado_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_estimado_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_estimado_webcontrol1.onLoad();
			
			//} else {
				//if(imagen_estimado_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			imagen_estimado_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_estimado","estimados","",imagen_estimado_funcion1,imagen_estimado_webcontrol1,imagen_estimado_constante1);	
	}
}

var imagen_estimado_webcontrol1 = new imagen_estimado_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_estimado_webcontrol,imagen_estimado_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_estimado_webcontrol1 = imagen_estimado_webcontrol1;


if(imagen_estimado_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_estimado_webcontrol1.onLoadWindow; 
}

//</script>