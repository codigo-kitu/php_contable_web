//<script type="text/javascript" language="javascript">



//var categoria_clienteJQueryPaginaWebInteraccion= function (categoria_cliente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {categoria_cliente_constante,categoria_cliente_constante1} from '../util/categoria_cliente_constante.js';

import {categoria_cliente_funcion,categoria_cliente_funcion1} from '../util/categoria_cliente_funcion.js';


class categoria_cliente_webcontrol extends GeneralEntityWebControl {
	
	categoria_cliente_control=null;
	categoria_cliente_controlInicial=null;
	categoria_cliente_controlAuxiliar=null;
		
	//if(categoria_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(categoria_cliente_control) {
		super();
		
		this.categoria_cliente_control=categoria_cliente_control;
	}
		
	actualizarVariablesPagina(categoria_cliente_control) {
		
		if(categoria_cliente_control.action=="index" || categoria_cliente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(categoria_cliente_control);
			
		} 
		
		
		else if(categoria_cliente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(categoria_cliente_control);
			
		} else if(categoria_cliente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(categoria_cliente_control);
			
		} else if(categoria_cliente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(categoria_cliente_control);		
		
		} else if(categoria_cliente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(categoria_cliente_control);
		
		}  else if(categoria_cliente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(categoria_cliente_control);
		
		} else if(categoria_cliente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(categoria_cliente_control);		
		
		} else if(categoria_cliente_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(categoria_cliente_control);		
		
		} else if(categoria_cliente_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(categoria_cliente_control);		
		
		} else if(categoria_cliente_control.action.includes("Busqueda") ||
				  categoria_cliente_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(categoria_cliente_control);
			
		} else if(categoria_cliente_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(categoria_cliente_control)
		}
		
		
		
	
		else if(categoria_cliente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(categoria_cliente_control);	
		
		} else if(categoria_cliente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_cliente_control);		
		}
	
		else if(categoria_cliente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(categoria_cliente_control);		
		}
	
		else if(categoria_cliente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_cliente_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + categoria_cliente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(categoria_cliente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(categoria_cliente_control) {
		this.actualizarPaginaAccionesGenerales(categoria_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(categoria_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(categoria_cliente_control);
		this.actualizarPaginaOrderBy(categoria_cliente_control);
		this.actualizarPaginaTablaDatos(categoria_cliente_control);
		this.actualizarPaginaCargaGeneralControles(categoria_cliente_control);
		//this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(categoria_cliente_control);
		this.actualizarPaginaAreaBusquedas(categoria_cliente_control);
		this.actualizarPaginaCargaCombosFK(categoria_cliente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(categoria_cliente_control) {
		//this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(categoria_cliente_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(categoria_cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_cliente_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(categoria_cliente_control) {
		
		this.actualizarPaginaCargaGeneral(categoria_cliente_control);
		this.actualizarPaginaTablaDatos(categoria_cliente_control);
		this.actualizarPaginaCargaGeneralControles(categoria_cliente_control);
		//this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(categoria_cliente_control);
		this.actualizarPaginaAreaBusquedas(categoria_cliente_control);
		this.actualizarPaginaCargaCombosFK(categoria_cliente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		//this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		//this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		//this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(categoria_cliente_control) {
		//this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(categoria_cliente_control) {
		this.actualizarPaginaAbrirLink(categoria_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);				
		//this.actualizarPaginaFormulario(categoria_cliente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);
		//this.actualizarPaginaFormulario(categoria_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);
		//this.actualizarPaginaFormulario(categoria_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(categoria_cliente_control) {
		//this.actualizarPaginaFormulario(categoria_cliente_control);
		this.onLoadCombosDefectoFK(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);
		//this.actualizarPaginaFormulario(categoria_cliente_control);
		this.onLoadCombosDefectoFK(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		//this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(categoria_cliente_control) {
		this.actualizarPaginaAbrirLink(categoria_cliente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(categoria_cliente_control) {
					//super.actualizarPaginaImprimir(categoria_cliente_control,"categoria_cliente");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",categoria_cliente_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("categoria_cliente_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(categoria_cliente_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(categoria_cliente_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(categoria_cliente_control) {
		//super.actualizarPaginaImprimir(categoria_cliente_control,"categoria_cliente");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("categoria_cliente_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(categoria_cliente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",categoria_cliente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(categoria_cliente_control) {
		//super.actualizarPaginaImprimir(categoria_cliente_control,"categoria_cliente");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("categoria_cliente_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(categoria_cliente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",categoria_cliente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(categoria_cliente_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(categoria_cliente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(categoria_cliente_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(categoria_cliente_control);
			
		this.actualizarPaginaAbrirLink(categoria_cliente_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(categoria_cliente_control) {
		this.actualizarPaginaTablaDatos(categoria_cliente_control);
		this.actualizarPaginaFormulario(categoria_cliente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control);		
		this.actualizarPaginaAreaMantenimiento(categoria_cliente_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(categoria_cliente_control) {
		
		if(categoria_cliente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(categoria_cliente_control);
		}
		
		if(categoria_cliente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(categoria_cliente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(categoria_cliente_control) {
		if(categoria_cliente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("categoria_clienteReturnGeneral",JSON.stringify(categoria_cliente_control.categoria_clienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(categoria_cliente_control) {
		if(categoria_cliente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && categoria_cliente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(categoria_cliente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(categoria_cliente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(categoria_cliente_control, mostrar) {
		
		if(mostrar==true) {
			categoria_cliente_funcion1.resaltarRestaurarDivsPagina(false,"categoria_cliente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				categoria_cliente_funcion1.resaltarRestaurarDivMantenimiento(false,"categoria_cliente");
			}			
			
			categoria_cliente_funcion1.mostrarDivMensaje(true,categoria_cliente_control.strAuxiliarMensaje,categoria_cliente_control.strAuxiliarCssMensaje);
		
		} else {
			categoria_cliente_funcion1.mostrarDivMensaje(false,categoria_cliente_control.strAuxiliarMensaje,categoria_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(categoria_cliente_control) {
		if(categoria_cliente_funcion1.esPaginaForm(categoria_cliente_constante1)==true) {
			window.opener.categoria_cliente_webcontrol1.actualizarPaginaTablaDatos(categoria_cliente_control);
		} else {
			this.actualizarPaginaTablaDatos(categoria_cliente_control);
		}
	}
	
	actualizarPaginaAbrirLink(categoria_cliente_control) {
		categoria_cliente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(categoria_cliente_control.strAuxiliarUrlPagina);
				
		categoria_cliente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(categoria_cliente_control.strAuxiliarTipo,categoria_cliente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(categoria_cliente_control) {
		categoria_cliente_funcion1.resaltarRestaurarDivMensaje(true,categoria_cliente_control.strAuxiliarMensajeAlert,categoria_cliente_control.strAuxiliarCssMensaje);
			
		if(categoria_cliente_funcion1.esPaginaForm(categoria_cliente_constante1)==true) {
			window.opener.categoria_cliente_funcion1.resaltarRestaurarDivMensaje(true,categoria_cliente_control.strAuxiliarMensajeAlert,categoria_cliente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(categoria_cliente_control) {
		this.categoria_cliente_controlInicial=categoria_cliente_control;
			
		if(categoria_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(categoria_cliente_control.strStyleDivArbol,categoria_cliente_control.strStyleDivContent
																,categoria_cliente_control.strStyleDivOpcionesBanner,categoria_cliente_control.strStyleDivExpandirColapsar
																,categoria_cliente_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=categoria_cliente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",categoria_cliente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(categoria_cliente_control) {
		this.actualizarCssBotonesPagina(categoria_cliente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(categoria_cliente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(categoria_cliente_control.tiposReportes,categoria_cliente_control.tiposReporte
															 	,categoria_cliente_control.tiposPaginacion,categoria_cliente_control.tiposAcciones
																,categoria_cliente_control.tiposColumnasSelect,categoria_cliente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(categoria_cliente_control.tiposRelaciones,categoria_cliente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(categoria_cliente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(categoria_cliente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(categoria_cliente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(categoria_cliente_control) {
	
		var indexPosition=categoria_cliente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=categoria_cliente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(categoria_cliente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(categoria_cliente_control.strRecargarFkTiposNinguno!=null && categoria_cliente_control.strRecargarFkTiposNinguno!='NINGUNO' && categoria_cliente_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(categoria_cliente_control) {
		jQuery("#divBusquedacategoria_clienteAjaxWebPart").css("display",categoria_cliente_control.strPermisoBusqueda);
		jQuery("#trcategoria_clienteCabeceraBusquedas").css("display",categoria_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedacategoria_cliente").css("display",categoria_cliente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(categoria_cliente_control.htmlTablaOrderBy!=null
			&& categoria_cliente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycategoria_clienteAjaxWebPart").html(categoria_cliente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//categoria_cliente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(categoria_cliente_control.htmlTablaOrderByRel!=null
			&& categoria_cliente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcategoria_clienteAjaxWebPart").html(categoria_cliente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(categoria_cliente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacategoria_clienteAjaxWebPart").css("display","none");
			jQuery("#trcategoria_clienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacategoria_cliente").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(categoria_cliente_control) {
		
		if(!categoria_cliente_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(categoria_cliente_control);
		} else {
			jQuery("#divTablaDatoscategoria_clientesAjaxWebPart").html(categoria_cliente_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscategoria_clientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(categoria_cliente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscategoria_clientes=jQuery("#tblTablaDatoscategoria_clientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("categoria_cliente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',categoria_cliente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			categoria_cliente_webcontrol1.registrarControlesTableEdition(categoria_cliente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		categoria_cliente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(categoria_cliente_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("categoria_cliente_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(categoria_cliente_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscategoria_clientesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(categoria_cliente_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(categoria_cliente_control);
		
		const divOrderBy = document.getElementById("divOrderBycategoria_clienteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(categoria_cliente_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcategoria_clienteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(categoria_cliente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(categoria_cliente_control.categoria_clienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(categoria_cliente_control);			
		}
	}
	
	actualizarCamposFilaTabla(categoria_cliente_control) {
		var i=0;
		
		i=categoria_cliente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(categoria_cliente_control.categoria_clienteActual.id);
		jQuery("#t-version_row_"+i+"").val(categoria_cliente_control.categoria_clienteActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(categoria_cliente_control.categoria_clienteActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(categoria_cliente_control.categoria_clienteActual.nombre);
		jQuery("#t-cel_"+i+"_4").prop('checked',categoria_cliente_control.categoria_clienteActual.predeterminado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(categoria_cliente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatoscategoria_clientes").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualcategoria_cliente");

			categoria_cliente_webcontrol1.registrarSesionParaclientes(idActual);
		});				
	}
		
	

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"categoria_cliente","cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1,"s","");
	}
	
	registrarControlesTableEdition(categoria_cliente_control) {
		categoria_cliente_funcion1.registrarControlesTableValidacionEdition(categoria_cliente_control,categoria_cliente_webcontrol1,categoria_cliente_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(categoria_cliente_control) {
		jQuery("#divResumencategoria_clienteActualAjaxWebPart").html(categoria_cliente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(categoria_cliente_control) {
		//jQuery("#divAccionesRelacionescategoria_clienteAjaxWebPart").html(categoria_cliente_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("categoria_cliente_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(categoria_cliente_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescategoria_clienteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		categoria_cliente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(categoria_cliente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(categoria_cliente_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(categoria_cliente_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncategoria_cliente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("categoria_cliente",id,"cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualcategoria_cliente");

			categoria_cliente_webcontrol1.registrarSesionParaclientes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_clienteConstante,strParametros);
		
		//categoria_cliente_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//categoria_cliente_control
		
	
	}
	
	onLoadCombosDefectoFK(categoria_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(categoria_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(categoria_cliente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(categoria_cliente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(categoria_cliente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(categoria_cliente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);			
			
			
		
			
			if(categoria_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("categoria_cliente");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("categoria_cliente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(categoria_cliente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,"categoria_cliente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("categoria_cliente");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(categoria_cliente_control) {
		
		jQuery("#divBusquedacategoria_clienteAjaxWebPart").css("display",categoria_cliente_control.strPermisoBusqueda);
		jQuery("#trcategoria_clienteCabeceraBusquedas").css("display",categoria_cliente_control.strPermisoBusqueda);
		jQuery("#trBusquedacategoria_cliente").css("display",categoria_cliente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecategoria_cliente").css("display",categoria_cliente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscategoria_cliente").attr("style",categoria_cliente_control.strPermisoMostrarTodos);		
		
		if(categoria_cliente_control.strPermisoNuevo!=null) {
			jQuery("#tdcategoria_clienteNuevo").css("display",categoria_cliente_control.strPermisoNuevo);
			jQuery("#tdcategoria_clienteNuevoToolBar").css("display",categoria_cliente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcategoria_clienteDuplicar").css("display",categoria_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcategoria_clienteDuplicarToolBar").css("display",categoria_cliente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcategoria_clienteNuevoGuardarCambios").css("display",categoria_cliente_control.strPermisoNuevo);
			jQuery("#tdcategoria_clienteNuevoGuardarCambiosToolBar").css("display",categoria_cliente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(categoria_cliente_control.strPermisoActualizar!=null) {
			jQuery("#tdcategoria_clienteCopiar").css("display",categoria_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcategoria_clienteCopiarToolBar").css("display",categoria_cliente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcategoria_clienteConEditar").css("display",categoria_cliente_control.strPermisoActualizar);
		}
		
		jQuery("#tdcategoria_clienteGuardarCambios").css("display",categoria_cliente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcategoria_clienteGuardarCambiosToolBar").css("display",categoria_cliente_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcategoria_clienteCerrarPagina").css("display",categoria_cliente_control.strPermisoPopup);		
		jQuery("#tdcategoria_clienteCerrarPaginaToolBar").css("display",categoria_cliente_control.strPermisoPopup);
		//jQuery("#trcategoria_clienteAccionesRelaciones").css("display",categoria_cliente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=categoria_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + categoria_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + categoria_cliente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Categorias Clientes";
		sTituloBanner+=" - " + categoria_cliente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + categoria_cliente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcategoria_clienteRelacionesToolBar").css("display",categoria_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscategoria_cliente").css("display",categoria_cliente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		categoria_cliente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		categoria_cliente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		categoria_cliente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		categoria_cliente_webcontrol1.registrarEventosControles();
		
		if(categoria_cliente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(categoria_cliente_constante1.STR_ES_RELACIONADO=="false") {
			categoria_cliente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(categoria_cliente_constante1.STR_ES_RELACIONES=="true") {
			if(categoria_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				categoria_cliente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(categoria_cliente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(categoria_cliente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				categoria_cliente_webcontrol1.onLoad();
			
			//} else {
				//if(categoria_cliente_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			categoria_cliente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("categoria_cliente","cuentascobrar","",categoria_cliente_funcion1,categoria_cliente_webcontrol1,categoria_cliente_constante1);	
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

var categoria_cliente_webcontrol1 = new categoria_cliente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {categoria_cliente_webcontrol,categoria_cliente_webcontrol1};

//Para ser llamado desde window.opener
window.categoria_cliente_webcontrol1 = categoria_cliente_webcontrol1;


if(categoria_cliente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = categoria_cliente_webcontrol1.onLoadWindow; 
}

//</script>