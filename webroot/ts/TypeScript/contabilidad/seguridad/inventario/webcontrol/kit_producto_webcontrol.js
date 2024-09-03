//<script type="text/javascript" language="javascript">



//var kit_productoJQueryPaginaWebInteraccion= function (kit_producto_control) {
//this.,this.,this.

import {kit_producto_constante,kit_producto_constante1} from '../util/kit_producto_constante.js';

import {kit_producto_funcion,kit_producto_funcion1} from '../util/kit_producto_funcion.js';


class kit_producto_webcontrol extends GeneralEntityWebControl {
	
	kit_producto_control=null;
	kit_producto_controlInicial=null;
	kit_producto_controlAuxiliar=null;
		
	//if(kit_producto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(kit_producto_control) {
		super();
		
		this.kit_producto_control=kit_producto_control;
	}
		
	actualizarVariablesPagina(kit_producto_control) {
		
		if(kit_producto_control.action=="index" || kit_producto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(kit_producto_control);
			
		} 
		
		
		else if(kit_producto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(kit_producto_control);
		
		} else if(kit_producto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(kit_producto_control);
		
		} else if(kit_producto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(kit_producto_control);
		
		} else if(kit_producto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(kit_producto_control);
			
		} else if(kit_producto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(kit_producto_control);
			
		} else if(kit_producto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(kit_producto_control);
		
		} else if(kit_producto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(kit_producto_control);		
		
		} else if(kit_producto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(kit_producto_control);
		
		} else if(kit_producto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(kit_producto_control);
		
		} else if(kit_producto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(kit_producto_control);
		
		} else if(kit_producto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(kit_producto_control);
		
		}  else if(kit_producto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(kit_producto_control);
		
		} else if(kit_producto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(kit_producto_control);
		
		} else if(kit_producto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(kit_producto_control);
		
		} else if(kit_producto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(kit_producto_control);
		
		} else if(kit_producto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(kit_producto_control);
		
		} else if(kit_producto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(kit_producto_control);
		
		} else if(kit_producto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(kit_producto_control);
		
		} else if(kit_producto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(kit_producto_control);
		
		} else if(kit_producto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(kit_producto_control);
		
		} else if(kit_producto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(kit_producto_control);		
		
		} else if(kit_producto_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(kit_producto_control);		
		
		} else if(kit_producto_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(kit_producto_control);		
		
		} else if(kit_producto_control.action.includes("Busqueda") ||
				  kit_producto_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(kit_producto_control);
			
		} else if(kit_producto_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(kit_producto_control)
		}
		
		
		
	
		else if(kit_producto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(kit_producto_control);	
		
		} else if(kit_producto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(kit_producto_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + kit_producto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(kit_producto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(kit_producto_control) {
		this.actualizarPaginaAccionesGenerales(kit_producto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(kit_producto_control) {
		
		this.actualizarPaginaCargaGeneral(kit_producto_control);
		this.actualizarPaginaOrderBy(kit_producto_control);
		this.actualizarPaginaTablaDatos(kit_producto_control);
		this.actualizarPaginaCargaGeneralControles(kit_producto_control);
		//this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(kit_producto_control);
		this.actualizarPaginaAreaBusquedas(kit_producto_control);
		this.actualizarPaginaCargaCombosFK(kit_producto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(kit_producto_control) {
		//this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(kit_producto_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(kit_producto_control) {
		
		this.actualizarPaginaCargaGeneral(kit_producto_control);
		this.actualizarPaginaTablaDatos(kit_producto_control);
		this.actualizarPaginaCargaGeneralControles(kit_producto_control);
		//this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(kit_producto_control);
		this.actualizarPaginaAreaBusquedas(kit_producto_control);
		this.actualizarPaginaCargaCombosFK(kit_producto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		//this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		//this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		//this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(kit_producto_control) {
		//this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(kit_producto_control) {
		this.actualizarPaginaAbrirLink(kit_producto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);				
		//this.actualizarPaginaFormulario(kit_producto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);
		//this.actualizarPaginaFormulario(kit_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);
		//this.actualizarPaginaFormulario(kit_producto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(kit_producto_control) {
		//this.actualizarPaginaFormulario(kit_producto_control);
		this.onLoadCombosDefectoFK(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);
		//this.actualizarPaginaFormulario(kit_producto_control);
		this.onLoadCombosDefectoFK(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);		
		//this.actualizarPaginaAreaMantenimiento(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(kit_producto_control) {
		this.actualizarPaginaAbrirLink(kit_producto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(kit_producto_control) {
		this.actualizarPaginaTablaDatos(kit_producto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(kit_producto_control) {
					//super.actualizarPaginaImprimir(kit_producto_control,"kit_producto");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",kit_producto_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("kit_producto_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(kit_producto_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(kit_producto_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(kit_producto_control) {
		//super.actualizarPaginaImprimir(kit_producto_control,"kit_producto");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("kit_producto_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(kit_producto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",kit_producto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(kit_producto_control) {
		//super.actualizarPaginaImprimir(kit_producto_control,"kit_producto");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("kit_producto_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(kit_producto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",kit_producto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(kit_producto_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(kit_producto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(kit_producto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(kit_producto_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(kit_producto_control);
			
		this.actualizarPaginaAbrirLink(kit_producto_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(kit_producto_control) {
		
		if(kit_producto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(kit_producto_control);
		}
		
		if(kit_producto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(kit_producto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(kit_producto_control) {
		if(kit_producto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("kit_productoReturnGeneral",JSON.stringify(kit_producto_control.kit_productoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(kit_producto_control) {
		if(kit_producto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && kit_producto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(kit_producto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(kit_producto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(kit_producto_control, mostrar) {
		
		if(mostrar==true) {
			kit_producto_funcion1.resaltarRestaurarDivsPagina(false,"kit_producto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				kit_producto_funcion1.resaltarRestaurarDivMantenimiento(false,"kit_producto");
			}			
			
			kit_producto_funcion1.mostrarDivMensaje(true,kit_producto_control.strAuxiliarMensaje,kit_producto_control.strAuxiliarCssMensaje);
		
		} else {
			kit_producto_funcion1.mostrarDivMensaje(false,kit_producto_control.strAuxiliarMensaje,kit_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(kit_producto_control) {
		if(kit_producto_funcion1.esPaginaForm(kit_producto_constante1)==true) {
			window.opener.kit_producto_webcontrol1.actualizarPaginaTablaDatos(kit_producto_control);
		} else {
			this.actualizarPaginaTablaDatos(kit_producto_control);
		}
	}
	
	actualizarPaginaAbrirLink(kit_producto_control) {
		kit_producto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(kit_producto_control.strAuxiliarUrlPagina);
				
		kit_producto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(kit_producto_control.strAuxiliarTipo,kit_producto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(kit_producto_control) {
		kit_producto_funcion1.resaltarRestaurarDivMensaje(true,kit_producto_control.strAuxiliarMensajeAlert,kit_producto_control.strAuxiliarCssMensaje);
			
		if(kit_producto_funcion1.esPaginaForm(kit_producto_constante1)==true) {
			window.opener.kit_producto_funcion1.resaltarRestaurarDivMensaje(true,kit_producto_control.strAuxiliarMensajeAlert,kit_producto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(kit_producto_control) {
		this.kit_producto_controlInicial=kit_producto_control;
			
		if(kit_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(kit_producto_control.strStyleDivArbol,kit_producto_control.strStyleDivContent
																,kit_producto_control.strStyleDivOpcionesBanner,kit_producto_control.strStyleDivExpandirColapsar
																,kit_producto_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=kit_producto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",kit_producto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(kit_producto_control) {
		this.actualizarCssBotonesPagina(kit_producto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(kit_producto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(kit_producto_control.tiposReportes,kit_producto_control.tiposReporte
															 	,kit_producto_control.tiposPaginacion,kit_producto_control.tiposAcciones
																,kit_producto_control.tiposColumnasSelect,kit_producto_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(kit_producto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(kit_producto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(kit_producto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(kit_producto_control) {
	
		var indexPosition=kit_producto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=kit_producto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(kit_producto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(kit_producto_control.strRecargarFkTiposNinguno!=null && kit_producto_control.strRecargarFkTiposNinguno!='NINGUNO' && kit_producto_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(kit_producto_control) {
		jQuery("#divBusquedakit_productoAjaxWebPart").css("display",kit_producto_control.strPermisoBusqueda);
		jQuery("#trkit_productoCabeceraBusquedas").css("display",kit_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedakit_producto").css("display",kit_producto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(kit_producto_control.htmlTablaOrderBy!=null
			&& kit_producto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBykit_productoAjaxWebPart").html(kit_producto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//kit_producto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(kit_producto_control.htmlTablaOrderByRel!=null
			&& kit_producto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelkit_productoAjaxWebPart").html(kit_producto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(kit_producto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedakit_productoAjaxWebPart").css("display","none");
			jQuery("#trkit_productoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedakit_producto").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(kit_producto_control) {
		
		if(!kit_producto_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(kit_producto_control);
		} else {
			jQuery("#divTablaDatoskit_productosAjaxWebPart").html(kit_producto_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoskit_productos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(kit_producto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoskit_productos=jQuery("#tblTablaDatoskit_productos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("kit_producto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',kit_producto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			kit_producto_webcontrol1.registrarControlesTableEdition(kit_producto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		kit_producto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(kit_producto_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("kit_producto_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(kit_producto_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoskit_productosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(kit_producto_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(kit_producto_control);
		
		const divOrderBy = document.getElementById("divOrderBykit_productoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(kit_producto_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelkit_productoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(kit_producto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(kit_producto_control.kit_productoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(kit_producto_control);			
		}
	}
	
	actualizarCamposFilaTabla(kit_producto_control) {
		var i=0;
		
		i=kit_producto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(kit_producto_control.kit_productoActual.id);
		jQuery("#t-version_row_"+i+"").val(kit_producto_control.kit_productoActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(kit_producto_control.kit_productoActual.id_padre);
		jQuery("#t-cel_"+i+"_3").val(kit_producto_control.kit_productoActual.id_hijo);
		jQuery("#t-cel_"+i+"_4").val(kit_producto_control.kit_productoActual.cantidad);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(kit_producto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(kit_producto_control) {
		kit_producto_funcion1.registrarControlesTableValidacionEdition(kit_producto_control,kit_producto_webcontrol1,kit_producto_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(kit_producto_control) {
		jQuery("#divResumenkit_productoActualAjaxWebPart").html(kit_producto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(kit_producto_control) {
		//jQuery("#divAccionesRelacioneskit_productoAjaxWebPart").html(kit_producto_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("kit_producto_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(kit_producto_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacioneskit_productoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		kit_producto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(kit_producto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(kit_producto_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(kit_producto_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionkit_producto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("kit_producto",id,"inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_productoConstante,strParametros);
		
		//kit_producto_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//kit_producto_control
		
	
	}
	
	onLoadCombosDefectoFK(kit_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kit_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(kit_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kit_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(kit_producto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(kit_producto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(kit_producto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(kit_producto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);			
			
			
		
			
			if(kit_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("kit_producto");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("kit_producto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(kit_producto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,"kit_producto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(kit_producto_control) {
		
		jQuery("#divBusquedakit_productoAjaxWebPart").css("display",kit_producto_control.strPermisoBusqueda);
		jQuery("#trkit_productoCabeceraBusquedas").css("display",kit_producto_control.strPermisoBusqueda);
		jQuery("#trBusquedakit_producto").css("display",kit_producto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportekit_producto").css("display",kit_producto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoskit_producto").attr("style",kit_producto_control.strPermisoMostrarTodos);		
		
		if(kit_producto_control.strPermisoNuevo!=null) {
			jQuery("#tdkit_productoNuevo").css("display",kit_producto_control.strPermisoNuevo);
			jQuery("#tdkit_productoNuevoToolBar").css("display",kit_producto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdkit_productoDuplicar").css("display",kit_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdkit_productoDuplicarToolBar").css("display",kit_producto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdkit_productoNuevoGuardarCambios").css("display",kit_producto_control.strPermisoNuevo);
			jQuery("#tdkit_productoNuevoGuardarCambiosToolBar").css("display",kit_producto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(kit_producto_control.strPermisoActualizar!=null) {
			jQuery("#tdkit_productoCopiar").css("display",kit_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdkit_productoCopiarToolBar").css("display",kit_producto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdkit_productoConEditar").css("display",kit_producto_control.strPermisoActualizar);
		}
		
		jQuery("#tdkit_productoGuardarCambios").css("display",kit_producto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdkit_productoGuardarCambiosToolBar").css("display",kit_producto_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdkit_productoCerrarPagina").css("display",kit_producto_control.strPermisoPopup);		
		jQuery("#tdkit_productoCerrarPaginaToolBar").css("display",kit_producto_control.strPermisoPopup);
		//jQuery("#trkit_productoAccionesRelaciones").css("display",kit_producto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=kit_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + kit_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + kit_producto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Kits Productoes";
		sTituloBanner+=" - " + kit_producto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + kit_producto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdkit_productoRelacionesToolBar").css("display",kit_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoskit_producto").css("display",kit_producto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		kit_producto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		kit_producto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		kit_producto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		kit_producto_webcontrol1.registrarEventosControles();
		
		if(kit_producto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(kit_producto_constante1.STR_ES_RELACIONADO=="false") {
			kit_producto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(kit_producto_constante1.STR_ES_RELACIONES=="true") {
			if(kit_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				kit_producto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(kit_producto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(kit_producto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				kit_producto_webcontrol1.onLoad();
			
			//} else {
				//if(kit_producto_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			kit_producto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("kit_producto","inventario","",kit_producto_funcion1,kit_producto_webcontrol1,kit_producto_constante1);	
	}
}

var kit_producto_webcontrol1 = new kit_producto_webcontrol();

export {kit_producto_webcontrol,kit_producto_webcontrol1};

//Para ser llamado desde window.opener
window.kit_producto_webcontrol1 = kit_producto_webcontrol1;


if(kit_producto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = kit_producto_webcontrol1.onLoadWindow; 
}

//</script>