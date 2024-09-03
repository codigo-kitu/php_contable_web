//<script type="text/javascript" language="javascript">



//var imagen_kardexJQueryPaginaWebInteraccion= function (imagen_kardex_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_kardex_constante,imagen_kardex_constante1} from '../util/imagen_kardex_constante.js';

import {imagen_kardex_funcion,imagen_kardex_funcion1} from '../util/imagen_kardex_funcion.js';


class imagen_kardex_webcontrol extends GeneralEntityWebControl {
	
	imagen_kardex_control=null;
	imagen_kardex_controlInicial=null;
	imagen_kardex_controlAuxiliar=null;
		
	//if(imagen_kardex_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_kardex_control) {
		super();
		
		this.imagen_kardex_control=imagen_kardex_control;
	}
		
	actualizarVariablesPagina(imagen_kardex_control) {
		
		if(imagen_kardex_control.action=="index" || imagen_kardex_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_kardex_control);
			
		} 
		
		
		else if(imagen_kardex_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_kardex_control);
			
		} else if(imagen_kardex_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_kardex_control);
			
		} else if(imagen_kardex_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_kardex_control);		
		
		} else if(imagen_kardex_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_kardex_control);
		
		}  else if(imagen_kardex_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_kardex_control);
		
		} else if(imagen_kardex_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_kardex_control);		
		
		} else if(imagen_kardex_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_kardex_control);		
		
		} else if(imagen_kardex_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_kardex_control);		
		
		} else if(imagen_kardex_control.action.includes("Busqueda") ||
				  imagen_kardex_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(imagen_kardex_control);
			
		} else if(imagen_kardex_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_kardex_control)
		}
		
		
		
	
		else if(imagen_kardex_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_kardex_control);	
		
		} else if(imagen_kardex_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_kardex_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_kardex_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_kardex_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_kardex_control) {
		this.actualizarPaginaAccionesGenerales(imagen_kardex_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_kardex_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_kardex_control);
		this.actualizarPaginaOrderBy(imagen_kardex_control);
		this.actualizarPaginaTablaDatos(imagen_kardex_control);
		this.actualizarPaginaCargaGeneralControles(imagen_kardex_control);
		//this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_kardex_control);
		this.actualizarPaginaAreaBusquedas(imagen_kardex_control);
		this.actualizarPaginaCargaCombosFK(imagen_kardex_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_kardex_control) {
		//this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_kardex_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_kardex_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_kardex_control);
		this.actualizarPaginaTablaDatos(imagen_kardex_control);
		this.actualizarPaginaCargaGeneralControles(imagen_kardex_control);
		//this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_kardex_control);
		this.actualizarPaginaAreaBusquedas(imagen_kardex_control);
		this.actualizarPaginaCargaCombosFK(imagen_kardex_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		//this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		//this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		//this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_kardex_control) {
		//this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_kardex_control) {
		this.actualizarPaginaAbrirLink(imagen_kardex_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);				
		//this.actualizarPaginaFormulario(imagen_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);
		//this.actualizarPaginaFormulario(imagen_kardex_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);
		//this.actualizarPaginaFormulario(imagen_kardex_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_kardex_control) {
		//this.actualizarPaginaFormulario(imagen_kardex_control);
		this.onLoadCombosDefectoFK(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);
		//this.actualizarPaginaFormulario(imagen_kardex_control);
		this.onLoadCombosDefectoFK(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_kardex_control) {
		this.actualizarPaginaAbrirLink(imagen_kardex_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_kardex_control) {
		this.actualizarPaginaTablaDatos(imagen_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_kardex_control) {
					//super.actualizarPaginaImprimir(imagen_kardex_control,"imagen_kardex");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_kardex_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("imagen_kardex_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_kardex_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_kardex_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_kardex_control) {
		//super.actualizarPaginaImprimir(imagen_kardex_control,"imagen_kardex");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("imagen_kardex_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(imagen_kardex_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_kardex_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_kardex_control) {
		//super.actualizarPaginaImprimir(imagen_kardex_control,"imagen_kardex");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("imagen_kardex_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_kardex_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_kardex_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_kardex_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_kardex_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_kardex_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(imagen_kardex_control);
			
		this.actualizarPaginaAbrirLink(imagen_kardex_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_kardex_control) {
		
		if(imagen_kardex_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_kardex_control);
		}
		
		if(imagen_kardex_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_kardex_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_kardex_control) {
		if(imagen_kardex_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_kardexReturnGeneral",JSON.stringify(imagen_kardex_control.imagen_kardexReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_kardex_control) {
		if(imagen_kardex_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_kardex_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_kardex_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_kardex_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_kardex_control, mostrar) {
		
		if(mostrar==true) {
			imagen_kardex_funcion1.resaltarRestaurarDivsPagina(false,"imagen_kardex");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_kardex_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_kardex");
			}			
			
			imagen_kardex_funcion1.mostrarDivMensaje(true,imagen_kardex_control.strAuxiliarMensaje,imagen_kardex_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_kardex_funcion1.mostrarDivMensaje(false,imagen_kardex_control.strAuxiliarMensaje,imagen_kardex_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_kardex_control) {
		if(imagen_kardex_funcion1.esPaginaForm(imagen_kardex_constante1)==true) {
			window.opener.imagen_kardex_webcontrol1.actualizarPaginaTablaDatos(imagen_kardex_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_kardex_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_kardex_control) {
		imagen_kardex_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_kardex_control.strAuxiliarUrlPagina);
				
		imagen_kardex_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_kardex_control.strAuxiliarTipo,imagen_kardex_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_kardex_control) {
		imagen_kardex_funcion1.resaltarRestaurarDivMensaje(true,imagen_kardex_control.strAuxiliarMensajeAlert,imagen_kardex_control.strAuxiliarCssMensaje);
			
		if(imagen_kardex_funcion1.esPaginaForm(imagen_kardex_constante1)==true) {
			window.opener.imagen_kardex_funcion1.resaltarRestaurarDivMensaje(true,imagen_kardex_control.strAuxiliarMensajeAlert,imagen_kardex_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_kardex_control) {
		this.imagen_kardex_controlInicial=imagen_kardex_control;
			
		if(imagen_kardex_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_kardex_control.strStyleDivArbol,imagen_kardex_control.strStyleDivContent
																,imagen_kardex_control.strStyleDivOpcionesBanner,imagen_kardex_control.strStyleDivExpandirColapsar
																,imagen_kardex_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_kardex_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_kardex_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_kardex_control) {
		this.actualizarCssBotonesPagina(imagen_kardex_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_kardex_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_kardex_control.tiposReportes,imagen_kardex_control.tiposReporte
															 	,imagen_kardex_control.tiposPaginacion,imagen_kardex_control.tiposAcciones
																,imagen_kardex_control.tiposColumnasSelect,imagen_kardex_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_kardex_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_kardex_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_kardex_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_kardex_control) {
	
		var indexPosition=imagen_kardex_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_kardex_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_kardex_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_kardex_control.strRecargarFkTiposNinguno!=null && imagen_kardex_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_kardex_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(imagen_kardex_control) {
		jQuery("#divBusquedaimagen_kardexAjaxWebPart").css("display",imagen_kardex_control.strPermisoBusqueda);
		jQuery("#trimagen_kardexCabeceraBusquedas").css("display",imagen_kardex_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_kardex").css("display",imagen_kardex_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_kardex_control.htmlTablaOrderBy!=null
			&& imagen_kardex_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_kardexAjaxWebPart").html(imagen_kardex_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_kardex_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_kardex_control.htmlTablaOrderByRel!=null
			&& imagen_kardex_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_kardexAjaxWebPart").html(imagen_kardex_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_kardex_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_kardexAjaxWebPart").css("display","none");
			jQuery("#trimagen_kardexCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_kardex").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(imagen_kardex_control) {
		
		if(!imagen_kardex_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(imagen_kardex_control);
		} else {
			jQuery("#divTablaDatosimagen_kardexsAjaxWebPart").html(imagen_kardex_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_kardexs=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_kardex_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_kardexs=jQuery("#tblTablaDatosimagen_kardexs").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_kardex",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_kardex_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_kardex_webcontrol1.registrarControlesTableEdition(imagen_kardex_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_kardex_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(imagen_kardex_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("imagen_kardex_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_kardex_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosimagen_kardexsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(imagen_kardex_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(imagen_kardex_control);
		
		const divOrderBy = document.getElementById("divOrderByimagen_kardexAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(imagen_kardex_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelimagen_kardexAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(imagen_kardex_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_kardex_control.imagen_kardexActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_kardex_control);			
		}
	}
	
	actualizarCamposFilaTabla(imagen_kardex_control) {
		var i=0;
		
		i=imagen_kardex_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_kardex_control.imagen_kardexActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_kardex_control.imagen_kardexActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(imagen_kardex_control.imagen_kardexActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(imagen_kardex_control.imagen_kardexActual.nro_documento);
		jQuery("#t-cel_"+i+"_4").val(imagen_kardex_control.imagen_kardexActual.imagen);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_kardex_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_kardex_control) {
		imagen_kardex_funcion1.registrarControlesTableValidacionEdition(imagen_kardex_control,imagen_kardex_webcontrol1,imagen_kardex_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_kardex_control) {
		jQuery("#divResumenimagen_kardexActualAjaxWebPart").html(imagen_kardex_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_kardex_control) {
		//jQuery("#divAccionesRelacionesimagen_kardexAjaxWebPart").html(imagen_kardex_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("imagen_kardex_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_kardex_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesimagen_kardexAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		imagen_kardex_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_kardex_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_kardex_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_kardex_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_kardex();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_kardex",id,"inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardexConstante,strParametros);
		
		//imagen_kardex_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_kardex_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(imagen_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_kardex_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_kardex_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);			
			
			
		
			
			if(imagen_kardex_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_kardex");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_kardex");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_kardex_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,"imagen_kardex");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_kardex_control) {
		
		jQuery("#divBusquedaimagen_kardexAjaxWebPart").css("display",imagen_kardex_control.strPermisoBusqueda);
		jQuery("#trimagen_kardexCabeceraBusquedas").css("display",imagen_kardex_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_kardex").css("display",imagen_kardex_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_kardex").css("display",imagen_kardex_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_kardex").attr("style",imagen_kardex_control.strPermisoMostrarTodos);		
		
		if(imagen_kardex_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_kardexNuevo").css("display",imagen_kardex_control.strPermisoNuevo);
			jQuery("#tdimagen_kardexNuevoToolBar").css("display",imagen_kardex_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_kardexDuplicar").css("display",imagen_kardex_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_kardexDuplicarToolBar").css("display",imagen_kardex_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_kardexNuevoGuardarCambios").css("display",imagen_kardex_control.strPermisoNuevo);
			jQuery("#tdimagen_kardexNuevoGuardarCambiosToolBar").css("display",imagen_kardex_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_kardex_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_kardexCopiar").css("display",imagen_kardex_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_kardexCopiarToolBar").css("display",imagen_kardex_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_kardexConEditar").css("display",imagen_kardex_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_kardexGuardarCambios").css("display",imagen_kardex_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_kardexGuardarCambiosToolBar").css("display",imagen_kardex_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdimagen_kardexCerrarPagina").css("display",imagen_kardex_control.strPermisoPopup);		
		jQuery("#tdimagen_kardexCerrarPaginaToolBar").css("display",imagen_kardex_control.strPermisoPopup);
		//jQuery("#trimagen_kardexAccionesRelaciones").css("display",imagen_kardex_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_kardex_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_kardex_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_kardex_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Kardexes";
		sTituloBanner+=" - " + imagen_kardex_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_kardex_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_kardexRelacionesToolBar").css("display",imagen_kardex_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_kardex").css("display",imagen_kardex_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_kardex_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_kardex_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_kardex_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_kardex_webcontrol1.registrarEventosControles();
		
		if(imagen_kardex_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_kardex_constante1.STR_ES_RELACIONADO=="false") {
			imagen_kardex_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_kardex_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_kardex_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_kardex_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_kardex_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_kardex_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_kardex_webcontrol1.onLoad();
			
			//} else {
				//if(imagen_kardex_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			imagen_kardex_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_kardex","inventario","",imagen_kardex_funcion1,imagen_kardex_webcontrol1,imagen_kardex_constante1);	
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

var imagen_kardex_webcontrol1 = new imagen_kardex_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_kardex_webcontrol,imagen_kardex_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_kardex_webcontrol1 = imagen_kardex_webcontrol1;


if(imagen_kardex_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_kardex_webcontrol1.onLoadWindow; 
}

//</script>