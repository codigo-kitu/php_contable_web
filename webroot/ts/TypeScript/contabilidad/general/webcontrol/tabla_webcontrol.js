//<script type="text/javascript" language="javascript">



//var tablaJQueryPaginaWebInteraccion= function (tabla_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tabla_constante,tabla_constante1} from '../util/tabla_constante.js';

import {tabla_funcion,tabla_funcion1} from '../util/tabla_funcion.js';


class tabla_webcontrol extends GeneralEntityWebControl {
	
	tabla_control=null;
	tabla_controlInicial=null;
	tabla_controlAuxiliar=null;
		
	//if(tabla_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tabla_control) {
		super();
		
		this.tabla_control=tabla_control;
	}
		
	actualizarVariablesPagina(tabla_control) {
		
		if(tabla_control.action=="index" || tabla_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tabla_control);
			
		} 
		
		
		else if(tabla_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(tabla_control);
		
		} else if(tabla_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(tabla_control);
		
		} else if(tabla_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(tabla_control);
		
		} else if(tabla_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(tabla_control);
			
		} else if(tabla_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(tabla_control);
			
		} else if(tabla_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(tabla_control);
		
		} else if(tabla_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(tabla_control);		
		
		} else if(tabla_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(tabla_control);
		
		} else if(tabla_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(tabla_control);
		
		} else if(tabla_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(tabla_control);
		
		} else if(tabla_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(tabla_control);
		
		}  else if(tabla_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tabla_control);
		
		} else if(tabla_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tabla_control);
		
		} else if(tabla_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(tabla_control);
		
		} else if(tabla_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(tabla_control);
		
		} else if(tabla_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(tabla_control);
		
		} else if(tabla_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(tabla_control);
		
		} else if(tabla_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tabla_control);
		
		} else if(tabla_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(tabla_control);
		
		} else if(tabla_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(tabla_control);
		
		} else if(tabla_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tabla_control);		
		
		} else if(tabla_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(tabla_control);		
		
		} else if(tabla_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(tabla_control);		
		
		} else if(tabla_control.action.includes("Busqueda") ||
				  tabla_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(tabla_control);
			
		} else if(tabla_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(tabla_control)
		}
		
		
		
	
		else if(tabla_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tabla_control);	
		
		} else if(tabla_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tabla_control);		
		}
	
		else if(tabla_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tabla_control);		
		}
	
		else if(tabla_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tabla_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tabla_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(tabla_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tabla_control) {
		this.actualizarPaginaAccionesGenerales(tabla_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tabla_control) {
		
		this.actualizarPaginaCargaGeneral(tabla_control);
		this.actualizarPaginaOrderBy(tabla_control);
		this.actualizarPaginaTablaDatos(tabla_control);
		this.actualizarPaginaCargaGeneralControles(tabla_control);
		//this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tabla_control);
		this.actualizarPaginaAreaBusquedas(tabla_control);
		this.actualizarPaginaCargaCombosFK(tabla_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(tabla_control) {
		//this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tabla_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tabla_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tabla_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(tabla_control) {
		
		this.actualizarPaginaCargaGeneral(tabla_control);
		this.actualizarPaginaTablaDatos(tabla_control);
		this.actualizarPaginaCargaGeneralControles(tabla_control);
		//this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tabla_control);
		this.actualizarPaginaAreaBusquedas(tabla_control);
		this.actualizarPaginaCargaCombosFK(tabla_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		//this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		//this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		//this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		//this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		//this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		//this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(tabla_control) {
		//this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tabla_control) {
		this.actualizarPaginaAbrirLink(tabla_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);				
		//this.actualizarPaginaFormulario(tabla_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);
		//this.actualizarPaginaFormulario(tabla_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		//this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);
		//this.actualizarPaginaFormulario(tabla_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(tabla_control) {
		//this.actualizarPaginaFormulario(tabla_control);
		this.onLoadCombosDefectoFK(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);
		//this.actualizarPaginaFormulario(tabla_control);
		this.onLoadCombosDefectoFK(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		//this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tabla_control) {
		this.actualizarPaginaAbrirLink(tabla_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(tabla_control) {
					//super.actualizarPaginaImprimir(tabla_control,"tabla");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tabla_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("tabla_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(tabla_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tabla_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tabla_control) {
		//super.actualizarPaginaImprimir(tabla_control,"tabla");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("tabla_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(tabla_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tabla_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tabla_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(tabla_control) {
		//super.actualizarPaginaImprimir(tabla_control,"tabla");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("tabla_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(tabla_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tabla_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tabla_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(tabla_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(tabla_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(tabla_control);
			
		this.actualizarPaginaAbrirLink(tabla_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(tabla_control) {
		this.actualizarPaginaTablaDatos(tabla_control);
		this.actualizarPaginaFormulario(tabla_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tabla_control);		
		this.actualizarPaginaAreaMantenimiento(tabla_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tabla_control) {
		
		if(tabla_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tabla_control);
		}
		
		if(tabla_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(tabla_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tabla_control) {
		if(tabla_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tablaReturnGeneral",JSON.stringify(tabla_control.tablaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tabla_control) {
		if(tabla_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tabla_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tabla_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tabla_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tabla_control, mostrar) {
		
		if(mostrar==true) {
			tabla_funcion1.resaltarRestaurarDivsPagina(false,"tabla");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tabla_funcion1.resaltarRestaurarDivMantenimiento(false,"tabla");
			}			
			
			tabla_funcion1.mostrarDivMensaje(true,tabla_control.strAuxiliarMensaje,tabla_control.strAuxiliarCssMensaje);
		
		} else {
			tabla_funcion1.mostrarDivMensaje(false,tabla_control.strAuxiliarMensaje,tabla_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tabla_control) {
		if(tabla_funcion1.esPaginaForm(tabla_constante1)==true) {
			window.opener.tabla_webcontrol1.actualizarPaginaTablaDatos(tabla_control);
		} else {
			this.actualizarPaginaTablaDatos(tabla_control);
		}
	}
	
	actualizarPaginaAbrirLink(tabla_control) {
		tabla_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tabla_control.strAuxiliarUrlPagina);
				
		tabla_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tabla_control.strAuxiliarTipo,tabla_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tabla_control) {
		tabla_funcion1.resaltarRestaurarDivMensaje(true,tabla_control.strAuxiliarMensajeAlert,tabla_control.strAuxiliarCssMensaje);
			
		if(tabla_funcion1.esPaginaForm(tabla_constante1)==true) {
			window.opener.tabla_funcion1.resaltarRestaurarDivMensaje(true,tabla_control.strAuxiliarMensajeAlert,tabla_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(tabla_control) {
		this.tabla_controlInicial=tabla_control;
			
		if(tabla_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tabla_control.strStyleDivArbol,tabla_control.strStyleDivContent
																,tabla_control.strStyleDivOpcionesBanner,tabla_control.strStyleDivExpandirColapsar
																,tabla_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=tabla_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",tabla_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(tabla_control) {
		this.actualizarCssBotonesPagina(tabla_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tabla_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tabla_control.tiposReportes,tabla_control.tiposReporte
															 	,tabla_control.tiposPaginacion,tabla_control.tiposAcciones
																,tabla_control.tiposColumnasSelect,tabla_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tabla_control.tiposRelaciones,tabla_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(tabla_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tabla_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tabla_control);			
	}
	
	actualizarPaginaUsuarioInvitado(tabla_control) {
	
		var indexPosition=tabla_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tabla_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(tabla_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(tabla_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",tabla_control.strRecargarFkTipos,",")) { 
				tabla_webcontrol1.cargarCombosmodulosFK(tabla_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tabla_control.strRecargarFkTiposNinguno!=null && tabla_control.strRecargarFkTiposNinguno!='NINGUNO' && tabla_control.strRecargarFkTiposNinguno!='') {
			
				if(tabla_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modulo",tabla_control.strRecargarFkTiposNinguno,",")) { 
					tabla_webcontrol1.cargarCombosmodulosFK(tabla_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablamoduloFK(tabla_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,tabla_funcion1,tabla_control.modulosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(tabla_control) {
		jQuery("#divBusquedatablaAjaxWebPart").css("display",tabla_control.strPermisoBusqueda);
		jQuery("#trtablaCabeceraBusquedas").css("display",tabla_control.strPermisoBusqueda);
		jQuery("#trBusquedatabla").css("display",tabla_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(tabla_control.htmlTablaOrderBy!=null
			&& tabla_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytablaAjaxWebPart").html(tabla_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//tabla_webcontrol1.registrarOrderByActions();
			
		}
			
		if(tabla_control.htmlTablaOrderByRel!=null
			&& tabla_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltablaAjaxWebPart").html(tabla_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(tabla_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatablaAjaxWebPart").css("display","none");
			jQuery("#trtablaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatabla").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(tabla_control) {
		
		if(!tabla_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(tabla_control);
		} else {
			jQuery("#divTablaDatostablasAjaxWebPart").html(tabla_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostablas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(tabla_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostablas=jQuery("#tblTablaDatostablas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("tabla",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',tabla_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			tabla_webcontrol1.registrarControlesTableEdition(tabla_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		tabla_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(tabla_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("tabla_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(tabla_control);
		
		const divTablaDatos = document.getElementById("divTablaDatostablasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(tabla_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(tabla_control);
		
		const divOrderBy = document.getElementById("divOrderBytablaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(tabla_control);
		
		const divOrderByRel = document.getElementById("divOrderByReltablaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(tabla_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(tabla_control.tablaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(tabla_control);			
		}
	}
	
	actualizarCamposFilaTabla(tabla_control) {
		var i=0;
		
		i=tabla_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(tabla_control.tablaActual.id);
		jQuery("#t-version_row_"+i+"").val(tabla_control.tablaActual.versionRow);
		
		if(tabla_control.tablaActual.id_modulo!=null && tabla_control.tablaActual.id_modulo>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != tabla_control.tablaActual.id_modulo) {
				jQuery("#t-cel_"+i+"_2").val(tabla_control.tablaActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(tabla_control.tablaActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(tabla_control.tablaActual.nombre);
		jQuery("#t-cel_"+i+"_5").val(tabla_control.tablaActual.descripcion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(tabla_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncuenta_corriente_detalle").click(function(){
		jQuery("#tblTablaDatostablas").on("click",".imgrelacioncuenta_corriente_detalle", function () {

			var idActual=jQuery(this).attr("idactualtabla");

			tabla_webcontrol1.registrarSesionParacuenta_corriente_detalles(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncosto_producto").click(function(){
		jQuery("#tblTablaDatostablas").on("click",".imgrelacioncosto_producto", function () {

			var idActual=jQuery(this).attr("idactualtabla");

			tabla_webcontrol1.registrarSesionParacosto_productos(idActual);
		});				
	}
		
	

	registrarSesionParacuenta_corriente_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tabla","cuenta_corriente_detalle","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1,"s","");
	}

	registrarSesionParacosto_productos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tabla","costo_producto","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1,"s","");
	}
	
	registrarControlesTableEdition(tabla_control) {
		tabla_funcion1.registrarControlesTableValidacionEdition(tabla_control,tabla_webcontrol1,tabla_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(tabla_control) {
		jQuery("#divResumentablaActualAjaxWebPart").html(tabla_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(tabla_control) {
		//jQuery("#divAccionesRelacionestablaAjaxWebPart").html(tabla_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("tabla_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(tabla_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionestablaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		tabla_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(tabla_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(tabla_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(tabla_control) {
		
		if(tabla_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+tabla_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",tabla_control.strVisibleFK_Idmodulo);
			jQuery("#tblstrVisible"+tabla_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",tabla_control.strVisibleFK_Idmodulo);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontabla();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("tabla","general","",tabla_funcion1,tabla_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("tabla",id,"general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);		
	}
	
	

	abrirBusquedaParamodulo(strNombreCampoBusqueda){//idActual
		tabla_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("tabla","modulo","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncuenta_corriente_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualtabla");

			tabla_webcontrol1.registrarSesionParacuenta_corriente_detalles(idActual);
		});
		jQuery("#imgdivrelacioncosto_producto").click(function(){

			var idActual=jQuery(this).attr("idactualtabla");

			tabla_webcontrol1.registrarSesionParacosto_productos(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tablaConstante,strParametros);
		
		//tabla_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosmodulosFK(tabla_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+tabla_constante1.STR_SUFIJO+"-id_modulo",tabla_control.modulosFK);

		if(tabla_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+tabla_control.idFilaTablaActual+"_2",tabla_control.modulosFK);
		}
	};

	
	
	registrarComboActionChangeCombosmodulosFK(tabla_control) {

	};

	
	
	setDefectoValorCombosmodulosFK(tabla_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(tabla_control.idmoduloDefaultFK>-1 && jQuery("#form"+tabla_constante1.STR_SUFIJO+"-id_modulo").val() != tabla_control.idmoduloDefaultFK) {
				jQuery("#form"+tabla_constante1.STR_SUFIJO+"-id_modulo").val(tabla_control.idmoduloDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tabla_control
		
	
	}
	
	onLoadCombosDefectoFK(tabla_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tabla_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(tabla_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",tabla_control.strRecargarFkTipos,",")) { 
				tabla_webcontrol1.setDefectoValorCombosmodulosFK(tabla_control);
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
	onLoadCombosEventosFK(tabla_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tabla_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(tabla_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",tabla_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				tabla_webcontrol1.registrarComboActionChangeCombosmodulosFK(tabla_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tabla_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tabla_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(tabla_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(tabla_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("tabla","general","",tabla_funcion1,tabla_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("tabla","general","",tabla_funcion1,tabla_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("tabla","FK_Idmodulo","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
		
			
			if(tabla_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("tabla","general","",tabla_funcion1,tabla_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tabla");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tabla");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tabla_funcion1,tabla_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tabla_funcion1,tabla_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(tabla_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tabla","general","",tabla_funcion1,tabla_webcontrol1,"tabla");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("modulo","id_modulo","seguridad","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+tabla_constante1.STR_SUFIJO+"-id_modulo_img_busqueda").click(function(){
				tabla_webcontrol1.abrirBusquedaParamodulo("id_modulo");
				//alert(jQuery('#form-id_modulo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tabla","general","",tabla_funcion1,tabla_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tabla");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tabla_control) {
		
		jQuery("#divBusquedatablaAjaxWebPart").css("display",tabla_control.strPermisoBusqueda);
		jQuery("#trtablaCabeceraBusquedas").css("display",tabla_control.strPermisoBusqueda);
		jQuery("#trBusquedatabla").css("display",tabla_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetabla").css("display",tabla_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostabla").attr("style",tabla_control.strPermisoMostrarTodos);		
		
		if(tabla_control.strPermisoNuevo!=null) {
			jQuery("#tdtablaNuevo").css("display",tabla_control.strPermisoNuevo);
			jQuery("#tdtablaNuevoToolBar").css("display",tabla_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtablaDuplicar").css("display",tabla_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtablaDuplicarToolBar").css("display",tabla_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtablaNuevoGuardarCambios").css("display",tabla_control.strPermisoNuevo);
			jQuery("#tdtablaNuevoGuardarCambiosToolBar").css("display",tabla_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(tabla_control.strPermisoActualizar!=null) {
			jQuery("#tdtablaCopiar").css("display",tabla_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtablaCopiarToolBar").css("display",tabla_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtablaConEditar").css("display",tabla_control.strPermisoActualizar);
		}
		
		jQuery("#tdtablaGuardarCambios").css("display",tabla_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtablaGuardarCambiosToolBar").css("display",tabla_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdtablaCerrarPagina").css("display",tabla_control.strPermisoPopup);		
		jQuery("#tdtablaCerrarPaginaToolBar").css("display",tabla_control.strPermisoPopup);
		//jQuery("#trtablaAccionesRelaciones").css("display",tabla_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tabla_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tabla_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tabla_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tablas";
		sTituloBanner+=" - " + tabla_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tabla_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtablaRelacionesToolBar").css("display",tabla_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostabla").css("display",tabla_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tabla","general","",tabla_funcion1,tabla_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tabla_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tabla_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tabla_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tabla_webcontrol1.registrarEventosControles();
		
		if(tabla_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tabla_constante1.STR_ES_RELACIONADO=="false") {
			tabla_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tabla_constante1.STR_ES_RELACIONES=="true") {
			if(tabla_constante1.BIT_ES_PAGINA_FORM==true) {
				tabla_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tabla_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tabla_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				tabla_webcontrol1.onLoad();
			
			//} else {
				//if(tabla_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			tabla_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tabla","general","",tabla_funcion1,tabla_webcontrol1,tabla_constante1);	
	}
}

var tabla_webcontrol1 = new tabla_webcontrol();

//Para ser llamado desde otro archivo (import)
export {tabla_webcontrol,tabla_webcontrol1};

//Para ser llamado desde window.opener
window.tabla_webcontrol1 = tabla_webcontrol1;


if(tabla_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tabla_webcontrol1.onLoadWindow; 
}

//</script>