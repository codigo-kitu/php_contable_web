//<script type="text/javascript" language="javascript">



//var sub_categoria_productoJQueryPaginaWebInteraccion= function (sub_categoria_producto_control) {
//this.,this.,this.

import {sub_categoria_producto_constante,sub_categoria_producto_constante1} from '../util/sub_categoria_producto_constante.js';

import {sub_categoria_producto_funcion,sub_categoria_producto_funcion1} from '../util/sub_categoria_producto_funcion.js';


class sub_categoria_producto_webcontrol extends GeneralEntityWebControl {
	
	sub_categoria_producto_control=null;
	sub_categoria_producto_controlInicial=null;
	sub_categoria_producto_controlAuxiliar=null;
		
	//if(sub_categoria_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(sub_categoria_producto_control) {
		super();
		
		this.sub_categoria_producto_control=sub_categoria_producto_control;
	}
		
	actualizarVariablesPagina(sub_categoria_producto_control) {
		
		if(sub_categoria_producto_control.action=="index" || sub_categoria_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(sub_categoria_producto_control);
			
		} 
		
		
		else if(sub_categoria_producto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(sub_categoria_producto_control);
			
		} else if(sub_categoria_producto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(sub_categoria_producto_control);
			
		} else if(sub_categoria_producto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(sub_categoria_producto_control);		
		
		} else if(sub_categoria_producto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(sub_categoria_producto_control);
		
		}  else if(sub_categoria_producto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(sub_categoria_producto_control);
		
		} else if(sub_categoria_producto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(sub_categoria_producto_control);		
		
		} else if(sub_categoria_producto_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(sub_categoria_producto_control);		
		
		} else if(sub_categoria_producto_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(sub_categoria_producto_control);		
		
		} else if(sub_categoria_producto_control.action.includes("Busqueda") ||
				  sub_categoria_producto_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(sub_categoria_producto_control);
			
		} else if(sub_categoria_producto_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(sub_categoria_producto_control)
		}
		
		
		
	
		else if(sub_categoria_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(sub_categoria_producto_control);	
		
		} else if(sub_categoria_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(sub_categoria_producto_control);		
		}
	
		else if(sub_categoria_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(sub_categoria_producto_control);		
		}
	
		else if(sub_categoria_producto_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(sub_categoria_producto_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + sub_categoria_producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(sub_categoria_producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(sub_categoria_producto_control) {
		this.actualizarPaginaAccionesGenerales(sub_categoria_producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(sub_categoria_producto_control) {
		
		this.actualizarPaginaCargaGeneral(sub_categoria_producto_control);
		this.actualizarPaginaOrderBy(sub_categoria_producto_control);
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);
		this.actualizarPaginaCargaGeneralControles(sub_categoria_producto_control);
		//this.actualizarPaginaFormulario(sub_categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(sub_categoria_producto_control);
		this.actualizarPaginaAreaBusquedas(sub_categoria_producto_control);
		this.actualizarPaginaCargaCombosFK(sub_categoria_producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(sub_categoria_producto_control) {
		//this.actualizarPaginaFormulario(sub_categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(sub_categoria_producto_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(sub_categoria_producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(sub_categoria_producto_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(sub_categoria_producto_control) {
		
		this.actualizarPaginaCargaGeneral(sub_categoria_producto_control);
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);
		this.actualizarPaginaCargaGeneralControles(sub_categoria_producto_control);
		//this.actualizarPaginaFormulario(sub_categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(sub_categoria_producto_control);
		this.actualizarPaginaAreaBusquedas(sub_categoria_producto_control);
		this.actualizarPaginaCargaCombosFK(sub_categoria_producto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);		
		//this.actualizarPaginaFormulario(sub_categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);		
		//this.actualizarPaginaFormulario(sub_categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);		
		//this.actualizarPaginaFormulario(sub_categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(sub_categoria_producto_control) {
		//this.actualizarPaginaFormulario(sub_categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(sub_categoria_producto_control) {
		this.actualizarPaginaAbrirLink(sub_categoria_producto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);				
		//this.actualizarPaginaFormulario(sub_categoria_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);
		//this.actualizarPaginaFormulario(sub_categoria_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);
		//this.actualizarPaginaFormulario(sub_categoria_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(sub_categoria_producto_control) {
		//this.actualizarPaginaFormulario(sub_categoria_producto_control);
		this.onLoadCombosDefectoFK(sub_categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);
		//this.actualizarPaginaFormulario(sub_categoria_producto_control);
		this.onLoadCombosDefectoFK(sub_categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(sub_categoria_producto_control) {
		this.actualizarPaginaAbrirLink(sub_categoria_producto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(sub_categoria_producto_control) {
					//super.actualizarPaginaImprimir(sub_categoria_producto_control,"sub_categoria_producto");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",sub_categoria_producto_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("sub_categoria_producto_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(sub_categoria_producto_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(sub_categoria_producto_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(sub_categoria_producto_control) {
		//super.actualizarPaginaImprimir(sub_categoria_producto_control,"sub_categoria_producto");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("sub_categoria_producto_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(sub_categoria_producto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",sub_categoria_producto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(sub_categoria_producto_control) {
		//super.actualizarPaginaImprimir(sub_categoria_producto_control,"sub_categoria_producto");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("sub_categoria_producto_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(sub_categoria_producto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",sub_categoria_producto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(sub_categoria_producto_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(sub_categoria_producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(sub_categoria_producto_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(sub_categoria_producto_control);
			
		this.actualizarPaginaAbrirLink(sub_categoria_producto_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(sub_categoria_producto_control) {
		this.actualizarPaginaTablaDatos(sub_categoria_producto_control);
		this.actualizarPaginaFormulario(sub_categoria_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control);		
		this.actualizarPaginaAreaMantenimiento(sub_categoria_producto_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(sub_categoria_producto_control) {
		
		if(sub_categoria_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(sub_categoria_producto_control);
		}
		
		if(sub_categoria_producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(sub_categoria_producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(sub_categoria_producto_control) {
		if(sub_categoria_producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("sub_categoria_productoReturnGeneral",JSON.stringify(sub_categoria_producto_control.sub_categoria_productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(sub_categoria_producto_control) {
		if(sub_categoria_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && sub_categoria_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(sub_categoria_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(sub_categoria_producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(sub_categoria_producto_control, mostrar) {
		
		if(mostrar==true) {
			sub_categoria_producto_funcion1.resaltarRestaurarDivsPagina(false,"sub_categoria_producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				sub_categoria_producto_funcion1.resaltarRestaurarDivMantenimiento(false,"sub_categoria_producto");
			}			
			
			sub_categoria_producto_funcion1.mostrarDivMensaje(true,sub_categoria_producto_control.strAuxiliarMensaje,sub_categoria_producto_control.strAuxiliarCssMensaje);
		
		} else {
			sub_categoria_producto_funcion1.mostrarDivMensaje(false,sub_categoria_producto_control.strAuxiliarMensaje,sub_categoria_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(sub_categoria_producto_control) {
		if(sub_categoria_producto_funcion1.esPaginaForm(sub_categoria_producto_constante1)==true) {
			window.opener.sub_categoria_producto_webcontrol1.actualizarPaginaTablaDatos(sub_categoria_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(sub_categoria_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(sub_categoria_producto_control) {
		sub_categoria_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(sub_categoria_producto_control.strAuxiliarUrlPagina);
				
		sub_categoria_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(sub_categoria_producto_control.strAuxiliarTipo,sub_categoria_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(sub_categoria_producto_control) {
		sub_categoria_producto_funcion1.resaltarRestaurarDivMensaje(true,sub_categoria_producto_control.strAuxiliarMensajeAlert,sub_categoria_producto_control.strAuxiliarCssMensaje);
			
		if(sub_categoria_producto_funcion1.esPaginaForm(sub_categoria_producto_constante1)==true) {
			window.opener.sub_categoria_producto_funcion1.resaltarRestaurarDivMensaje(true,sub_categoria_producto_control.strAuxiliarMensajeAlert,sub_categoria_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(sub_categoria_producto_control) {
		this.sub_categoria_producto_controlInicial=sub_categoria_producto_control;
			
		if(sub_categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(sub_categoria_producto_control.strStyleDivArbol,sub_categoria_producto_control.strStyleDivContent
																,sub_categoria_producto_control.strStyleDivOpcionesBanner,sub_categoria_producto_control.strStyleDivExpandirColapsar
																,sub_categoria_producto_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=sub_categoria_producto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",sub_categoria_producto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(sub_categoria_producto_control) {
		this.actualizarCssBotonesPagina(sub_categoria_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(sub_categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(sub_categoria_producto_control.tiposReportes,sub_categoria_producto_control.tiposReporte
															 	,sub_categoria_producto_control.tiposPaginacion,sub_categoria_producto_control.tiposAcciones
																,sub_categoria_producto_control.tiposColumnasSelect,sub_categoria_producto_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(sub_categoria_producto_control.tiposRelaciones,sub_categoria_producto_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(sub_categoria_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(sub_categoria_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(sub_categoria_producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(sub_categoria_producto_control) {
	
		var indexPosition=sub_categoria_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=sub_categoria_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(sub_categoria_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(sub_categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",sub_categoria_producto_control.strRecargarFkTipos,",")) { 
				sub_categoria_producto_webcontrol1.cargarCombosempresasFK(sub_categoria_producto_control);
			}

			if(sub_categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",sub_categoria_producto_control.strRecargarFkTipos,",")) { 
				sub_categoria_producto_webcontrol1.cargarComboscategoria_productosFK(sub_categoria_producto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(sub_categoria_producto_control.strRecargarFkTiposNinguno!=null && sub_categoria_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && sub_categoria_producto_control.strRecargarFkTiposNinguno!='') {
			
				if(sub_categoria_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",sub_categoria_producto_control.strRecargarFkTiposNinguno,",")) { 
					sub_categoria_producto_webcontrol1.cargarCombosempresasFK(sub_categoria_producto_control);
				}

				if(sub_categoria_producto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_categoria_producto",sub_categoria_producto_control.strRecargarFkTiposNinguno,",")) { 
					sub_categoria_producto_webcontrol1.cargarComboscategoria_productosFK(sub_categoria_producto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(sub_categoria_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,sub_categoria_producto_funcion1,sub_categoria_producto_control.empresasFK);
	}

	cargarComboEditarTablacategoria_productoFK(sub_categoria_producto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,sub_categoria_producto_funcion1,sub_categoria_producto_control.categoria_productosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(sub_categoria_producto_control) {
		jQuery("#divBusquedasub_categoria_productoAjaxWebPart").css("display",sub_categoria_producto_control.strPermisoBusqueda);
		jQuery("#trsub_categoria_productoCabeceraBusquedas").css("display",sub_categoria_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedasub_categoria_producto").css("display",sub_categoria_producto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(sub_categoria_producto_control.htmlTablaOrderBy!=null
			&& sub_categoria_producto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBysub_categoria_productoAjaxWebPart").html(sub_categoria_producto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//sub_categoria_producto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(sub_categoria_producto_control.htmlTablaOrderByRel!=null
			&& sub_categoria_producto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelsub_categoria_productoAjaxWebPart").html(sub_categoria_producto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(sub_categoria_producto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedasub_categoria_productoAjaxWebPart").css("display","none");
			jQuery("#trsub_categoria_productoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedasub_categoria_producto").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(sub_categoria_producto_control) {
		
		if(!sub_categoria_producto_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(sub_categoria_producto_control);
		} else {
			jQuery("#divTablaDatossub_categoria_productosAjaxWebPart").html(sub_categoria_producto_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatossub_categoria_productos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(sub_categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatossub_categoria_productos=jQuery("#tblTablaDatossub_categoria_productos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("sub_categoria_producto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',sub_categoria_producto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			sub_categoria_producto_webcontrol1.registrarControlesTableEdition(sub_categoria_producto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		sub_categoria_producto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(sub_categoria_producto_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("sub_categoria_producto_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(sub_categoria_producto_control);
		
		const divTablaDatos = document.getElementById("divTablaDatossub_categoria_productosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(sub_categoria_producto_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(sub_categoria_producto_control);
		
		const divOrderBy = document.getElementById("divOrderBysub_categoria_productoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(sub_categoria_producto_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelsub_categoria_productoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(sub_categoria_producto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(sub_categoria_producto_control.sub_categoria_productoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(sub_categoria_producto_control);			
		}
	}
	
	actualizarCamposFilaTabla(sub_categoria_producto_control) {
		var i=0;
		
		i=sub_categoria_producto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(sub_categoria_producto_control.sub_categoria_productoActual.id);
		jQuery("#t-version_row_"+i+"").val(sub_categoria_producto_control.sub_categoria_productoActual.versionRow);
		
		if(sub_categoria_producto_control.sub_categoria_productoActual.id_empresa!=null && sub_categoria_producto_control.sub_categoria_productoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != sub_categoria_producto_control.sub_categoria_productoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(sub_categoria_producto_control.sub_categoria_productoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(sub_categoria_producto_control.sub_categoria_productoActual.id_categoria_producto!=null && sub_categoria_producto_control.sub_categoria_productoActual.id_categoria_producto>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != sub_categoria_producto_control.sub_categoria_productoActual.id_categoria_producto) {
				jQuery("#t-cel_"+i+"_3").val(sub_categoria_producto_control.sub_categoria_productoActual.id_categoria_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(sub_categoria_producto_control.sub_categoria_productoActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(sub_categoria_producto_control.sub_categoria_productoActual.nombre);
		jQuery("#t-cel_"+i+"_6").prop('checked',sub_categoria_producto_control.sub_categoria_productoActual.predeterminado);
		jQuery("#t-cel_"+i+"_7").val(sub_categoria_producto_control.sub_categoria_productoActual.imagen);
		jQuery("#t-cel_"+i+"_8").val(sub_categoria_producto_control.sub_categoria_productoActual.numero_productos);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(sub_categoria_producto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproducto").click(function(){
		jQuery("#tblTablaDatossub_categoria_productos").on("click",".imgrelacionproducto", function () {

			var idActual=jQuery(this).attr("idactualsub_categoria_producto");

			sub_categoria_producto_webcontrol1.registrarSesionParaproductos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_producto").click(function(){
		jQuery("#tblTablaDatossub_categoria_productos").on("click",".imgrelacionlista_producto", function () {

			var idActual=jQuery(this).attr("idactualsub_categoria_producto");

			sub_categoria_producto_webcontrol1.registrarSesionParalista_productoes(idActual);
		});				
	}
		
	

	registrarSesionParaproductos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"sub_categoria_producto","producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1,"s","");
	}

	registrarSesionParalista_productoes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"sub_categoria_producto","lista_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1,"es","");
	}
	
	registrarControlesTableEdition(sub_categoria_producto_control) {
		sub_categoria_producto_funcion1.registrarControlesTableValidacionEdition(sub_categoria_producto_control,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(sub_categoria_producto_control) {
		jQuery("#divResumensub_categoria_productoActualAjaxWebPart").html(sub_categoria_producto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(sub_categoria_producto_control) {
		//jQuery("#divAccionesRelacionessub_categoria_productoAjaxWebPart").html(sub_categoria_producto_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("sub_categoria_producto_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(sub_categoria_producto_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionessub_categoria_productoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		sub_categoria_producto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(sub_categoria_producto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(sub_categoria_producto_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(sub_categoria_producto_control) {
		
		if(sub_categoria_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+sub_categoria_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto").attr("style",sub_categoria_producto_control.strVisibleFK_Idcategoria_producto);
			jQuery("#tblstrVisible"+sub_categoria_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto").attr("style",sub_categoria_producto_control.strVisibleFK_Idcategoria_producto);
		}

		if(sub_categoria_producto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+sub_categoria_producto_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",sub_categoria_producto_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+sub_categoria_producto_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",sub_categoria_producto_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionsub_categoria_producto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("sub_categoria_producto",id,"inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		sub_categoria_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("sub_categoria_producto","empresa","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
	}

	abrirBusquedaParacategoria_producto(strNombreCampoBusqueda){//idActual
		sub_categoria_producto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("sub_categoria_producto","categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionproducto").click(function(){

			var idActual=jQuery(this).attr("idactualsub_categoria_producto");

			sub_categoria_producto_webcontrol1.registrarSesionParaproductos(idActual);
		});
		jQuery("#imgdivrelacionlista_producto").click(function(){

			var idActual=jQuery(this).attr("idactualsub_categoria_producto");

			sub_categoria_producto_webcontrol1.registrarSesionParalista_productoes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_productoConstante,strParametros);
		
		//sub_categoria_producto_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(sub_categoria_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_empresa",sub_categoria_producto_control.empresasFK);

		if(sub_categoria_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+sub_categoria_producto_control.idFilaTablaActual+"_2",sub_categoria_producto_control.empresasFK);
		}
	};

	cargarComboscategoria_productosFK(sub_categoria_producto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_categoria_producto",sub_categoria_producto_control.categoria_productosFK);

		if(sub_categoria_producto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+sub_categoria_producto_control.idFilaTablaActual+"_3",sub_categoria_producto_control.categoria_productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+sub_categoria_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto",sub_categoria_producto_control.categoria_productosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(sub_categoria_producto_control) {

	};

	registrarComboActionChangeComboscategoria_productosFK(sub_categoria_producto_control) {

	};

	
	
	setDefectoValorCombosempresasFK(sub_categoria_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(sub_categoria_producto_control.idempresaDefaultFK>-1 && jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val() != sub_categoria_producto_control.idempresaDefaultFK) {
				jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_empresa").val(sub_categoria_producto_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscategoria_productosFK(sub_categoria_producto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(sub_categoria_producto_control.idcategoria_productoDefaultFK>-1 && jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val() != sub_categoria_producto_control.idcategoria_productoDefaultFK) {
				jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_categoria_producto").val(sub_categoria_producto_control.idcategoria_productoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+sub_categoria_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val(sub_categoria_producto_control.idcategoria_productoDefaultForeignKey).trigger("change");
			if(jQuery("#"+sub_categoria_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+sub_categoria_producto_constante1.STR_SUFIJO+"FK_Idcategoria_producto-cmbid_categoria_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//sub_categoria_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(sub_categoria_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sub_categoria_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(sub_categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",sub_categoria_producto_control.strRecargarFkTipos,",")) { 
				sub_categoria_producto_webcontrol1.setDefectoValorCombosempresasFK(sub_categoria_producto_control);
			}

			if(sub_categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",sub_categoria_producto_control.strRecargarFkTipos,",")) { 
				sub_categoria_producto_webcontrol1.setDefectoValorComboscategoria_productosFK(sub_categoria_producto_control);
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
	onLoadCombosEventosFK(sub_categoria_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sub_categoria_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(sub_categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",sub_categoria_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				sub_categoria_producto_webcontrol1.registrarComboActionChangeCombosempresasFK(sub_categoria_producto_control);
			//}

			//if(sub_categoria_producto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_categoria_producto",sub_categoria_producto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				sub_categoria_producto_webcontrol1.registrarComboActionChangeComboscategoria_productosFK(sub_categoria_producto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(sub_categoria_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(sub_categoria_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(sub_categoria_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(sub_categoria_producto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("sub_categoria_producto","FK_Idcategoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("sub_categoria_producto","FK_Idempresa","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
		
			
			if(sub_categoria_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("sub_categoria_producto");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("sub_categoria_producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(sub_categoria_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,"sub_categoria_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				sub_categoria_producto_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("categoria_producto","id_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+sub_categoria_producto_constante1.STR_SUFIJO+"-id_categoria_producto_img_busqueda").click(function(){
				sub_categoria_producto_webcontrol1.abrirBusquedaParacategoria_producto("id_categoria_producto");
				//alert(jQuery('#form-id_categoria_producto_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("sub_categoria_producto");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(sub_categoria_producto_control) {
		
		jQuery("#divBusquedasub_categoria_productoAjaxWebPart").css("display",sub_categoria_producto_control.strPermisoBusqueda);
		jQuery("#trsub_categoria_productoCabeceraBusquedas").css("display",sub_categoria_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedasub_categoria_producto").css("display",sub_categoria_producto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportesub_categoria_producto").css("display",sub_categoria_producto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodossub_categoria_producto").attr("style",sub_categoria_producto_control.strPermisoMostrarTodos);		
		
		if(sub_categoria_producto_control.strPermisoNuevo!=null) {
			jQuery("#tdsub_categoria_productoNuevo").css("display",sub_categoria_producto_control.strPermisoNuevo);
			jQuery("#tdsub_categoria_productoNuevoToolBar").css("display",sub_categoria_producto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdsub_categoria_productoDuplicar").css("display",sub_categoria_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdsub_categoria_productoDuplicarToolBar").css("display",sub_categoria_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdsub_categoria_productoNuevoGuardarCambios").css("display",sub_categoria_producto_control.strPermisoNuevo);
			jQuery("#tdsub_categoria_productoNuevoGuardarCambiosToolBar").css("display",sub_categoria_producto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(sub_categoria_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdsub_categoria_productoCopiar").css("display",sub_categoria_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdsub_categoria_productoCopiarToolBar").css("display",sub_categoria_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdsub_categoria_productoConEditar").css("display",sub_categoria_producto_control.strPermisoActualizar);
		}
		
		jQuery("#tdsub_categoria_productoGuardarCambios").css("display",sub_categoria_producto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdsub_categoria_productoGuardarCambiosToolBar").css("display",sub_categoria_producto_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdsub_categoria_productoCerrarPagina").css("display",sub_categoria_producto_control.strPermisoPopup);		
		jQuery("#tdsub_categoria_productoCerrarPaginaToolBar").css("display",sub_categoria_producto_control.strPermisoPopup);
		//jQuery("#trsub_categoria_productoAccionesRelaciones").css("display",sub_categoria_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=sub_categoria_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + sub_categoria_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + sub_categoria_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Sub Categoria Productos";
		sTituloBanner+=" - " + sub_categoria_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + sub_categoria_producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdsub_categoria_productoRelacionesToolBar").css("display",sub_categoria_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultossub_categoria_producto").css("display",sub_categoria_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		sub_categoria_producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		sub_categoria_producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		sub_categoria_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		sub_categoria_producto_webcontrol1.registrarEventosControles();
		
		if(sub_categoria_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(sub_categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
			sub_categoria_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(sub_categoria_producto_constante1.STR_ES_RELACIONES=="true") {
			if(sub_categoria_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				sub_categoria_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(sub_categoria_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(sub_categoria_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				sub_categoria_producto_webcontrol1.onLoad();
			
			//} else {
				//if(sub_categoria_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			sub_categoria_producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("sub_categoria_producto","inventario","",sub_categoria_producto_funcion1,sub_categoria_producto_webcontrol1,sub_categoria_producto_constante1);	
	}
}

var sub_categoria_producto_webcontrol1 = new sub_categoria_producto_webcontrol();

export {sub_categoria_producto_webcontrol,sub_categoria_producto_webcontrol1};

//Para ser llamado desde window.opener
window.sub_categoria_producto_webcontrol1 = sub_categoria_producto_webcontrol1;


if(sub_categoria_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = sub_categoria_producto_webcontrol1.onLoadWindow; 
}

//</script>