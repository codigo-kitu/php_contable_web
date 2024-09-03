//<script type="text/javascript" language="javascript">



//var unidadJQueryPaginaWebInteraccion= function (unidad_control) {
//this.,this.,this.

import {unidad_constante,unidad_constante1} from '../util/unidad_constante.js';

import {unidad_funcion,unidad_funcion1} from '../util/unidad_funcion.js';


class unidad_webcontrol extends GeneralEntityWebControl {
	
	unidad_control=null;
	unidad_controlInicial=null;
	unidad_controlAuxiliar=null;
		
	//if(unidad_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(unidad_control) {
		super();
		
		this.unidad_control=unidad_control;
	}
		
	actualizarVariablesPagina(unidad_control) {
		
		if(unidad_control.action=="index" || unidad_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(unidad_control);
			
		} 
		
		
		else if(unidad_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(unidad_control);
		
		} else if(unidad_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(unidad_control);
		
		} else if(unidad_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(unidad_control);
		
		} else if(unidad_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(unidad_control);
			
		} else if(unidad_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(unidad_control);
			
		} else if(unidad_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(unidad_control);
		
		} else if(unidad_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(unidad_control);		
		
		} else if(unidad_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(unidad_control);
		
		} else if(unidad_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(unidad_control);
		
		} else if(unidad_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(unidad_control);
		
		} else if(unidad_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(unidad_control);
		
		}  else if(unidad_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(unidad_control);
		
		} else if(unidad_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(unidad_control);
		
		} else if(unidad_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(unidad_control);
		
		} else if(unidad_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(unidad_control);
		
		} else if(unidad_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(unidad_control);
		
		} else if(unidad_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(unidad_control);
		
		} else if(unidad_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(unidad_control);
		
		} else if(unidad_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(unidad_control);
		
		} else if(unidad_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(unidad_control);
		
		} else if(unidad_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(unidad_control);		
		
		} else if(unidad_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(unidad_control);		
		
		} else if(unidad_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(unidad_control);		
		
		} else if(unidad_control.action.includes("Busqueda") ||
				  unidad_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(unidad_control);
			
		} else if(unidad_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(unidad_control)
		}
		
		
		
	
		else if(unidad_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(unidad_control);	
		
		} else if(unidad_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(unidad_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + unidad_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(unidad_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(unidad_control) {
		this.actualizarPaginaAccionesGenerales(unidad_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(unidad_control) {
		
		this.actualizarPaginaCargaGeneral(unidad_control);
		this.actualizarPaginaOrderBy(unidad_control);
		this.actualizarPaginaTablaDatos(unidad_control);
		this.actualizarPaginaCargaGeneralControles(unidad_control);
		//this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(unidad_control);
		this.actualizarPaginaAreaBusquedas(unidad_control);
		this.actualizarPaginaCargaCombosFK(unidad_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(unidad_control) {
		//this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(unidad_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(unidad_control) {
		
		this.actualizarPaginaCargaGeneral(unidad_control);
		this.actualizarPaginaTablaDatos(unidad_control);
		this.actualizarPaginaCargaGeneralControles(unidad_control);
		//this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(unidad_control);
		this.actualizarPaginaAreaBusquedas(unidad_control);
		this.actualizarPaginaCargaCombosFK(unidad_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		//this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		//this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		//this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		//this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		//this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		//this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(unidad_control) {
		//this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(unidad_control) {
		this.actualizarPaginaAbrirLink(unidad_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);				
		//this.actualizarPaginaFormulario(unidad_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);
		//this.actualizarPaginaFormulario(unidad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		//this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);
		//this.actualizarPaginaFormulario(unidad_control);
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(unidad_control) {
		//this.actualizarPaginaFormulario(unidad_control);
		this.onLoadCombosDefectoFK(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);
		//this.actualizarPaginaFormulario(unidad_control);
		this.onLoadCombosDefectoFK(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);		
		//this.actualizarPaginaAreaMantenimiento(unidad_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(unidad_control) {
		this.actualizarPaginaAbrirLink(unidad_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(unidad_control) {
		this.actualizarPaginaTablaDatos(unidad_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(unidad_control) {
					//super.actualizarPaginaImprimir(unidad_control,"unidad");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",unidad_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("unidad_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(unidad_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(unidad_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(unidad_control) {
		//super.actualizarPaginaImprimir(unidad_control,"unidad");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("unidad_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(unidad_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",unidad_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(unidad_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(unidad_control) {
		//super.actualizarPaginaImprimir(unidad_control,"unidad");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("unidad_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(unidad_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",unidad_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(unidad_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(unidad_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(unidad_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(unidad_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(unidad_control);
			
		this.actualizarPaginaAbrirLink(unidad_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(unidad_control) {
		
		if(unidad_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(unidad_control);
		}
		
		if(unidad_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(unidad_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(unidad_control) {
		if(unidad_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("unidadReturnGeneral",JSON.stringify(unidad_control.unidadReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(unidad_control) {
		if(unidad_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && unidad_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(unidad_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(unidad_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(unidad_control, mostrar) {
		
		if(mostrar==true) {
			unidad_funcion1.resaltarRestaurarDivsPagina(false,"unidad");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				unidad_funcion1.resaltarRestaurarDivMantenimiento(false,"unidad");
			}			
			
			unidad_funcion1.mostrarDivMensaje(true,unidad_control.strAuxiliarMensaje,unidad_control.strAuxiliarCssMensaje);
		
		} else {
			unidad_funcion1.mostrarDivMensaje(false,unidad_control.strAuxiliarMensaje,unidad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(unidad_control) {
		if(unidad_funcion1.esPaginaForm(unidad_constante1)==true) {
			window.opener.unidad_webcontrol1.actualizarPaginaTablaDatos(unidad_control);
		} else {
			this.actualizarPaginaTablaDatos(unidad_control);
		}
	}
	
	actualizarPaginaAbrirLink(unidad_control) {
		unidad_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(unidad_control.strAuxiliarUrlPagina);
				
		unidad_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(unidad_control.strAuxiliarTipo,unidad_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(unidad_control) {
		unidad_funcion1.resaltarRestaurarDivMensaje(true,unidad_control.strAuxiliarMensajeAlert,unidad_control.strAuxiliarCssMensaje);
			
		if(unidad_funcion1.esPaginaForm(unidad_constante1)==true) {
			window.opener.unidad_funcion1.resaltarRestaurarDivMensaje(true,unidad_control.strAuxiliarMensajeAlert,unidad_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(unidad_control) {
		this.unidad_controlInicial=unidad_control;
			
		if(unidad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(unidad_control.strStyleDivArbol,unidad_control.strStyleDivContent
																,unidad_control.strStyleDivOpcionesBanner,unidad_control.strStyleDivExpandirColapsar
																,unidad_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=unidad_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",unidad_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(unidad_control) {
		this.actualizarCssBotonesPagina(unidad_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(unidad_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(unidad_control.tiposReportes,unidad_control.tiposReporte
															 	,unidad_control.tiposPaginacion,unidad_control.tiposAcciones
																,unidad_control.tiposColumnasSelect,unidad_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(unidad_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(unidad_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(unidad_control);			
	}
	
	actualizarPaginaUsuarioInvitado(unidad_control) {
	
		var indexPosition=unidad_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=unidad_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(unidad_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(unidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",unidad_control.strRecargarFkTipos,",")) { 
				unidad_webcontrol1.cargarCombosempresasFK(unidad_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(unidad_control.strRecargarFkTiposNinguno!=null && unidad_control.strRecargarFkTiposNinguno!='NINGUNO' && unidad_control.strRecargarFkTiposNinguno!='') {
			
				if(unidad_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",unidad_control.strRecargarFkTiposNinguno,",")) { 
					unidad_webcontrol1.cargarCombosempresasFK(unidad_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(unidad_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,unidad_funcion1,unidad_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(unidad_control) {
		jQuery("#divBusquedaunidadAjaxWebPart").css("display",unidad_control.strPermisoBusqueda);
		jQuery("#trunidadCabeceraBusquedas").css("display",unidad_control.strPermisoBusqueda);
		jQuery("#trBusquedaunidad").css("display",unidad_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(unidad_control.htmlTablaOrderBy!=null
			&& unidad_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByunidadAjaxWebPart").html(unidad_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//unidad_webcontrol1.registrarOrderByActions();
			
		}
			
		if(unidad_control.htmlTablaOrderByRel!=null
			&& unidad_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelunidadAjaxWebPart").html(unidad_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(unidad_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaunidadAjaxWebPart").css("display","none");
			jQuery("#trunidadCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaunidad").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(unidad_control) {
		
		if(!unidad_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(unidad_control);
		} else {
			jQuery("#divTablaDatosunidadsAjaxWebPart").html(unidad_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosunidads=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(unidad_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosunidads=jQuery("#tblTablaDatosunidads").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("unidad",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',unidad_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			unidad_webcontrol1.registrarControlesTableEdition(unidad_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		unidad_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(unidad_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("unidad_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(unidad_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosunidadsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(unidad_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(unidad_control);
		
		const divOrderBy = document.getElementById("divOrderByunidadAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(unidad_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelunidadAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(unidad_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(unidad_control.unidadActual!=null) {//form
			
			this.actualizarCamposFilaTabla(unidad_control);			
		}
	}
	
	actualizarCamposFilaTabla(unidad_control) {
		var i=0;
		
		i=unidad_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(unidad_control.unidadActual.id);
		jQuery("#t-version_row_"+i+"").val(unidad_control.unidadActual.versionRow);
		
		if(unidad_control.unidadActual.id_empresa!=null && unidad_control.unidadActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != unidad_control.unidadActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(unidad_control.unidadActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(unidad_control.unidadActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(unidad_control.unidadActual.nombre);
		jQuery("#t-cel_"+i+"_5").prop('checked',unidad_control.unidadActual.defecto_venta);
		jQuery("#t-cel_"+i+"_6").prop('checked',unidad_control.unidadActual.defecto_compra);
		jQuery("#t-cel_"+i+"_7").val(unidad_control.unidadActual.numero_productos);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(unidad_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(unidad_control) {
		unidad_funcion1.registrarControlesTableValidacionEdition(unidad_control,unidad_webcontrol1,unidad_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(unidad_control) {
		jQuery("#divResumenunidadActualAjaxWebPart").html(unidad_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(unidad_control) {
		//jQuery("#divAccionesRelacionesunidadAjaxWebPart").html(unidad_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("unidad_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(unidad_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesunidadAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		unidad_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(unidad_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(unidad_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(unidad_control) {
		
		if(unidad_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+unidad_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",unidad_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+unidad_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",unidad_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionunidad();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("unidad",id,"inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		unidad_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("unidad","empresa","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidadConstante,strParametros);
		
		//unidad_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(unidad_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa",unidad_control.empresasFK);

		if(unidad_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+unidad_control.idFilaTablaActual+"_2",unidad_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(unidad_control) {

	};

	
	
	setDefectoValorCombosempresasFK(unidad_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(unidad_control.idempresaDefaultFK>-1 && jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").val() != unidad_control.idempresaDefaultFK) {
				jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa").val(unidad_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//unidad_control
		
	
	}
	
	onLoadCombosDefectoFK(unidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(unidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(unidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",unidad_control.strRecargarFkTipos,",")) { 
				unidad_webcontrol1.setDefectoValorCombosempresasFK(unidad_control);
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
	onLoadCombosEventosFK(unidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(unidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(unidad_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",unidad_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				unidad_webcontrol1.registrarComboActionChangeCombosempresasFK(unidad_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(unidad_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(unidad_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(unidad_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(unidad_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("unidad","FK_Idempresa","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
		
			
			if(unidad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("unidad");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("unidad");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(unidad_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,"unidad");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+unidad_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				unidad_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(unidad_control) {
		
		jQuery("#divBusquedaunidadAjaxWebPart").css("display",unidad_control.strPermisoBusqueda);
		jQuery("#trunidadCabeceraBusquedas").css("display",unidad_control.strPermisoBusqueda);
		jQuery("#trBusquedaunidad").css("display",unidad_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteunidad").css("display",unidad_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosunidad").attr("style",unidad_control.strPermisoMostrarTodos);		
		
		if(unidad_control.strPermisoNuevo!=null) {
			jQuery("#tdunidadNuevo").css("display",unidad_control.strPermisoNuevo);
			jQuery("#tdunidadNuevoToolBar").css("display",unidad_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdunidadDuplicar").css("display",unidad_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdunidadDuplicarToolBar").css("display",unidad_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdunidadNuevoGuardarCambios").css("display",unidad_control.strPermisoNuevo);
			jQuery("#tdunidadNuevoGuardarCambiosToolBar").css("display",unidad_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(unidad_control.strPermisoActualizar!=null) {
			jQuery("#tdunidadCopiar").css("display",unidad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdunidadCopiarToolBar").css("display",unidad_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdunidadConEditar").css("display",unidad_control.strPermisoActualizar);
		}
		
		jQuery("#tdunidadGuardarCambios").css("display",unidad_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdunidadGuardarCambiosToolBar").css("display",unidad_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdunidadCerrarPagina").css("display",unidad_control.strPermisoPopup);		
		jQuery("#tdunidadCerrarPaginaToolBar").css("display",unidad_control.strPermisoPopup);
		//jQuery("#trunidadAccionesRelaciones").css("display",unidad_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=unidad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + unidad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + unidad_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Unidades";
		sTituloBanner+=" - " + unidad_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + unidad_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdunidadRelacionesToolBar").css("display",unidad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosunidad").css("display",unidad_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("unidad","inventario","",unidad_funcion1,unidad_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		unidad_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		unidad_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		unidad_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		unidad_webcontrol1.registrarEventosControles();
		
		if(unidad_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(unidad_constante1.STR_ES_RELACIONADO=="false") {
			unidad_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(unidad_constante1.STR_ES_RELACIONES=="true") {
			if(unidad_constante1.BIT_ES_PAGINA_FORM==true) {
				unidad_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(unidad_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(unidad_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				unidad_webcontrol1.onLoad();
			
			//} else {
				//if(unidad_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			unidad_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("unidad","inventario","",unidad_funcion1,unidad_webcontrol1,unidad_constante1);	
	}
}

var unidad_webcontrol1 = new unidad_webcontrol();

export {unidad_webcontrol,unidad_webcontrol1};

//Para ser llamado desde window.opener
window.unidad_webcontrol1 = unidad_webcontrol1;


if(unidad_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = unidad_webcontrol1.onLoadWindow; 
}

//</script>