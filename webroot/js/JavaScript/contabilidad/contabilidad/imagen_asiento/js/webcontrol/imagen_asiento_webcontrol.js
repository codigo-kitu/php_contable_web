//<script type="text/javascript" language="javascript">



//var imagen_asientoJQueryPaginaWebInteraccion= function (imagen_asiento_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_asiento_constante,imagen_asiento_constante1} from '../util/imagen_asiento_constante.js';

import {imagen_asiento_funcion,imagen_asiento_funcion1} from '../util/imagen_asiento_funcion.js';


class imagen_asiento_webcontrol extends GeneralEntityWebControl {
	
	imagen_asiento_control=null;
	imagen_asiento_controlInicial=null;
	imagen_asiento_controlAuxiliar=null;
		
	//if(imagen_asiento_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_asiento_control) {
		super();
		
		this.imagen_asiento_control=imagen_asiento_control;
	}
		
	actualizarVariablesPagina(imagen_asiento_control) {
		
		if(imagen_asiento_control.action=="index" || imagen_asiento_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_asiento_control);
			
		} 
		
		
		else if(imagen_asiento_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_asiento_control);
			
		} else if(imagen_asiento_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_asiento_control);
			
		} else if(imagen_asiento_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_asiento_control);		
		
		} else if(imagen_asiento_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_asiento_control);
		
		}  else if(imagen_asiento_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_asiento_control);
		
		} else if(imagen_asiento_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_asiento_control);		
		
		} else if(imagen_asiento_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_asiento_control);		
		
		} else if(imagen_asiento_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_asiento_control);		
		
		} else if(imagen_asiento_control.action.includes("Busqueda") ||
				  imagen_asiento_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(imagen_asiento_control);
			
		} else if(imagen_asiento_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_asiento_control)
		}
		
		
		
	
		else if(imagen_asiento_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_asiento_control);	
		
		} else if(imagen_asiento_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_asiento_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_asiento_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_asiento_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_asiento_control) {
		this.actualizarPaginaAccionesGenerales(imagen_asiento_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_asiento_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_asiento_control);
		this.actualizarPaginaOrderBy(imagen_asiento_control);
		this.actualizarPaginaTablaDatos(imagen_asiento_control);
		this.actualizarPaginaCargaGeneralControles(imagen_asiento_control);
		//this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_asiento_control);
		this.actualizarPaginaAreaBusquedas(imagen_asiento_control);
		this.actualizarPaginaCargaCombosFK(imagen_asiento_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_asiento_control) {
		//this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_asiento_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_asiento_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_asiento_control);
		this.actualizarPaginaTablaDatos(imagen_asiento_control);
		this.actualizarPaginaCargaGeneralControles(imagen_asiento_control);
		//this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_asiento_control);
		this.actualizarPaginaAreaBusquedas(imagen_asiento_control);
		this.actualizarPaginaCargaCombosFK(imagen_asiento_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		//this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		//this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		//this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_asiento_control) {
		//this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_asiento_control) {
		this.actualizarPaginaAbrirLink(imagen_asiento_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);				
		//this.actualizarPaginaFormulario(imagen_asiento_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);
		//this.actualizarPaginaFormulario(imagen_asiento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);
		//this.actualizarPaginaFormulario(imagen_asiento_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_asiento_control) {
		//this.actualizarPaginaFormulario(imagen_asiento_control);
		this.onLoadCombosDefectoFK(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);
		//this.actualizarPaginaFormulario(imagen_asiento_control);
		this.onLoadCombosDefectoFK(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_asiento_control) {
		this.actualizarPaginaAbrirLink(imagen_asiento_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_asiento_control) {
		this.actualizarPaginaTablaDatos(imagen_asiento_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_asiento_control) {
					//super.actualizarPaginaImprimir(imagen_asiento_control,"imagen_asiento");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_asiento_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("imagen_asiento_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_asiento_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_asiento_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_asiento_control) {
		//super.actualizarPaginaImprimir(imagen_asiento_control,"imagen_asiento");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("imagen_asiento_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(imagen_asiento_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_asiento_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_asiento_control) {
		//super.actualizarPaginaImprimir(imagen_asiento_control,"imagen_asiento");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("imagen_asiento_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_asiento_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_asiento_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_asiento_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_asiento_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_asiento_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(imagen_asiento_control);
			
		this.actualizarPaginaAbrirLink(imagen_asiento_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_asiento_control) {
		
		if(imagen_asiento_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_asiento_control);
		}
		
		if(imagen_asiento_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_asiento_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_asiento_control) {
		if(imagen_asiento_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_asientoReturnGeneral",JSON.stringify(imagen_asiento_control.imagen_asientoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_asiento_control) {
		if(imagen_asiento_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_asiento_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_asiento_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_asiento_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_asiento_control, mostrar) {
		
		if(mostrar==true) {
			imagen_asiento_funcion1.resaltarRestaurarDivsPagina(false,"imagen_asiento");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_asiento_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_asiento");
			}			
			
			imagen_asiento_funcion1.mostrarDivMensaje(true,imagen_asiento_control.strAuxiliarMensaje,imagen_asiento_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_asiento_funcion1.mostrarDivMensaje(false,imagen_asiento_control.strAuxiliarMensaje,imagen_asiento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_asiento_control) {
		if(imagen_asiento_funcion1.esPaginaForm(imagen_asiento_constante1)==true) {
			window.opener.imagen_asiento_webcontrol1.actualizarPaginaTablaDatos(imagen_asiento_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_asiento_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_asiento_control) {
		imagen_asiento_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_asiento_control.strAuxiliarUrlPagina);
				
		imagen_asiento_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_asiento_control.strAuxiliarTipo,imagen_asiento_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_asiento_control) {
		imagen_asiento_funcion1.resaltarRestaurarDivMensaje(true,imagen_asiento_control.strAuxiliarMensajeAlert,imagen_asiento_control.strAuxiliarCssMensaje);
			
		if(imagen_asiento_funcion1.esPaginaForm(imagen_asiento_constante1)==true) {
			window.opener.imagen_asiento_funcion1.resaltarRestaurarDivMensaje(true,imagen_asiento_control.strAuxiliarMensajeAlert,imagen_asiento_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_asiento_control) {
		this.imagen_asiento_controlInicial=imagen_asiento_control;
			
		if(imagen_asiento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_asiento_control.strStyleDivArbol,imagen_asiento_control.strStyleDivContent
																,imagen_asiento_control.strStyleDivOpcionesBanner,imagen_asiento_control.strStyleDivExpandirColapsar
																,imagen_asiento_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_asiento_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_asiento_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_asiento_control) {
		this.actualizarCssBotonesPagina(imagen_asiento_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_asiento_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_asiento_control.tiposReportes,imagen_asiento_control.tiposReporte
															 	,imagen_asiento_control.tiposPaginacion,imagen_asiento_control.tiposAcciones
																,imagen_asiento_control.tiposColumnasSelect,imagen_asiento_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_asiento_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_asiento_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_asiento_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_asiento_control) {
	
		var indexPosition=imagen_asiento_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_asiento_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_asiento_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",imagen_asiento_control.strRecargarFkTipos,",")) { 
				imagen_asiento_webcontrol1.cargarCombosasientosFK(imagen_asiento_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_asiento_control.strRecargarFkTiposNinguno!=null && imagen_asiento_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_asiento_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_asiento_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",imagen_asiento_control.strRecargarFkTiposNinguno,",")) { 
					imagen_asiento_webcontrol1.cargarCombosasientosFK(imagen_asiento_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaasientoFK(imagen_asiento_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_asiento_funcion1,imagen_asiento_control.asientosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(imagen_asiento_control) {
		jQuery("#divBusquedaimagen_asientoAjaxWebPart").css("display",imagen_asiento_control.strPermisoBusqueda);
		jQuery("#trimagen_asientoCabeceraBusquedas").css("display",imagen_asiento_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_asiento").css("display",imagen_asiento_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_asiento_control.htmlTablaOrderBy!=null
			&& imagen_asiento_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_asientoAjaxWebPart").html(imagen_asiento_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_asiento_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_asiento_control.htmlTablaOrderByRel!=null
			&& imagen_asiento_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_asientoAjaxWebPart").html(imagen_asiento_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_asiento_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_asientoAjaxWebPart").css("display","none");
			jQuery("#trimagen_asientoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_asiento").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(imagen_asiento_control) {
		
		if(!imagen_asiento_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(imagen_asiento_control);
		} else {
			jQuery("#divTablaDatosimagen_asientosAjaxWebPart").html(imagen_asiento_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_asientos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_asiento_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_asientos=jQuery("#tblTablaDatosimagen_asientos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_asiento",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_asiento_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_asiento_webcontrol1.registrarControlesTableEdition(imagen_asiento_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_asiento_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(imagen_asiento_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("imagen_asiento_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_asiento_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosimagen_asientosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(imagen_asiento_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(imagen_asiento_control);
		
		const divOrderBy = document.getElementById("divOrderByimagen_asientoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(imagen_asiento_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelimagen_asientoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(imagen_asiento_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_asiento_control.imagen_asientoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_asiento_control);			
		}
	}
	
	actualizarCamposFilaTabla(imagen_asiento_control) {
		var i=0;
		
		i=imagen_asiento_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_asiento_control.imagen_asientoActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_asiento_control.imagen_asientoActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(imagen_asiento_control.imagen_asientoActual.versionRow);
		
		if(imagen_asiento_control.imagen_asientoActual.id_asiento!=null && imagen_asiento_control.imagen_asientoActual.id_asiento>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != imagen_asiento_control.imagen_asientoActual.id_asiento) {
				jQuery("#t-cel_"+i+"_3").val(imagen_asiento_control.imagen_asientoActual.id_asiento).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(imagen_asiento_control.imagen_asientoActual.imagen);
		jQuery("#t-cel_"+i+"_5").val(imagen_asiento_control.imagen_asientoActual.nro_asiento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_asiento_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_asiento_control) {
		imagen_asiento_funcion1.registrarControlesTableValidacionEdition(imagen_asiento_control,imagen_asiento_webcontrol1,imagen_asiento_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_asiento_control) {
		jQuery("#divResumenimagen_asientoActualAjaxWebPart").html(imagen_asiento_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_asiento_control) {
		//jQuery("#divAccionesRelacionesimagen_asientoAjaxWebPart").html(imagen_asiento_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("imagen_asiento_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_asiento_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesimagen_asientoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		imagen_asiento_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_asiento_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_asiento_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_asiento_control) {
		
		if(imagen_asiento_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",imagen_asiento_control.strVisibleFK_Idasiento);
			jQuery("#tblstrVisible"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",imagen_asiento_control.strVisibleFK_Idasiento);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_asiento();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_asiento",id,"contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);		
	}
	
	

	abrirBusquedaParaasiento(strNombreCampoBusqueda){//idActual
		imagen_asiento_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_asiento","asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asientoConstante,strParametros);
		
		//imagen_asiento_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosasientosFK(imagen_asiento_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento",imagen_asiento_control.asientosFK);

		if(imagen_asiento_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_asiento_control.idFilaTablaActual+"_3",imagen_asiento_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",imagen_asiento_control.asientosFK);

	};

	
	
	registrarComboActionChangeCombosasientosFK(imagen_asiento_control) {

	};

	
	
	setDefectoValorCombosasientosFK(imagen_asiento_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_asiento_control.idasientoDefaultFK>-1 && jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").val() != imagen_asiento_control.idasientoDefaultFK) {
				jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento").val(imagen_asiento_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(imagen_asiento_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_asiento_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_asiento_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_asiento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_asiento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",imagen_asiento_control.strRecargarFkTipos,",")) { 
				imagen_asiento_webcontrol1.setDefectoValorCombosasientosFK(imagen_asiento_control);
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
	onLoadCombosEventosFK(imagen_asiento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_asiento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_asiento_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",imagen_asiento_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_asiento_webcontrol1.registrarComboActionChangeCombosasientosFK(imagen_asiento_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_asiento_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_asiento_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_asiento_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_asiento_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_asiento","FK_Idasiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
		
			
			if(imagen_asiento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_asiento");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_asiento");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_asiento_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,"imagen_asiento");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_asiento_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				imagen_asiento_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_asiento_control) {
		
		jQuery("#divBusquedaimagen_asientoAjaxWebPart").css("display",imagen_asiento_control.strPermisoBusqueda);
		jQuery("#trimagen_asientoCabeceraBusquedas").css("display",imagen_asiento_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_asiento").css("display",imagen_asiento_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_asiento").css("display",imagen_asiento_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_asiento").attr("style",imagen_asiento_control.strPermisoMostrarTodos);		
		
		if(imagen_asiento_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_asientoNuevo").css("display",imagen_asiento_control.strPermisoNuevo);
			jQuery("#tdimagen_asientoNuevoToolBar").css("display",imagen_asiento_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_asientoDuplicar").css("display",imagen_asiento_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_asientoDuplicarToolBar").css("display",imagen_asiento_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_asientoNuevoGuardarCambios").css("display",imagen_asiento_control.strPermisoNuevo);
			jQuery("#tdimagen_asientoNuevoGuardarCambiosToolBar").css("display",imagen_asiento_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_asiento_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_asientoCopiar").css("display",imagen_asiento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_asientoCopiarToolBar").css("display",imagen_asiento_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_asientoConEditar").css("display",imagen_asiento_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_asientoGuardarCambios").css("display",imagen_asiento_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_asientoGuardarCambiosToolBar").css("display",imagen_asiento_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdimagen_asientoCerrarPagina").css("display",imagen_asiento_control.strPermisoPopup);		
		jQuery("#tdimagen_asientoCerrarPaginaToolBar").css("display",imagen_asiento_control.strPermisoPopup);
		//jQuery("#trimagen_asientoAccionesRelaciones").css("display",imagen_asiento_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_asiento_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_asiento_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_asiento_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Asientoses";
		sTituloBanner+=" - " + imagen_asiento_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_asiento_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_asientoRelacionesToolBar").css("display",imagen_asiento_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_asiento").css("display",imagen_asiento_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_asiento_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_asiento_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_asiento_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_asiento_webcontrol1.registrarEventosControles();
		
		if(imagen_asiento_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_asiento_constante1.STR_ES_RELACIONADO=="false") {
			imagen_asiento_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_asiento_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_asiento_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_asiento_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_asiento_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_asiento_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_asiento_webcontrol1.onLoad();
			
			//} else {
				//if(imagen_asiento_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			imagen_asiento_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_asiento","contabilidad","",imagen_asiento_funcion1,imagen_asiento_webcontrol1,imagen_asiento_constante1);	
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

var imagen_asiento_webcontrol1 = new imagen_asiento_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_asiento_webcontrol,imagen_asiento_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_asiento_webcontrol1 = imagen_asiento_webcontrol1;


if(imagen_asiento_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_asiento_webcontrol1.onLoadWindow; 
}

//</script>