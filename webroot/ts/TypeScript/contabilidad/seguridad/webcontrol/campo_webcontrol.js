//<script type="text/javascript" language="javascript">



//var campoJQueryPaginaWebInteraccion= function (campo_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {campo_constante,campo_constante1} from '../util/campo_constante.js';

import {campo_funcion,campo_funcion1} from '../util/campo_funcion.js';


class campo_webcontrol extends GeneralEntityWebControl {
	
	campo_control=null;
	campo_controlInicial=null;
	campo_controlAuxiliar=null;
		
	//if(campo_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(campo_control) {
		super();
		
		this.campo_control=campo_control;
	}
		
	actualizarVariablesPagina(campo_control) {
		
		if(campo_control.action=="index" || campo_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(campo_control);
			
		} 
		
		
		else if(campo_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(campo_control);
		
		} else if(campo_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(campo_control);
		
		} else if(campo_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(campo_control);
		
		} else if(campo_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(campo_control);
			
		} else if(campo_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(campo_control);
			
		} else if(campo_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(campo_control);
		
		} else if(campo_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(campo_control);		
		
		} else if(campo_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(campo_control);
		
		} else if(campo_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(campo_control);
		
		} else if(campo_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(campo_control);
		
		} else if(campo_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(campo_control);
		
		}  else if(campo_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(campo_control);
		
		} else if(campo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(campo_control);
		
		} else if(campo_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(campo_control);
		
		} else if(campo_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(campo_control);
		
		} else if(campo_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(campo_control);
		
		} else if(campo_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(campo_control);
		
		} else if(campo_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(campo_control);
		
		} else if(campo_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(campo_control);
		
		} else if(campo_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(campo_control);
		
		} else if(campo_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(campo_control);		
		
		} else if(campo_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(campo_control);		
		
		} else if(campo_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(campo_control);		
		
		} else if(campo_control.action.includes("Busqueda") ||
				  campo_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(campo_control);
			
		} else if(campo_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(campo_control)
		}
		
		
		
	
		else if(campo_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(campo_control);	
		
		} else if(campo_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(campo_control);		
		}
	
		else if(campo_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(campo_control);		
		}
	
		else if(campo_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(campo_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + campo_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(campo_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(campo_control) {
		this.actualizarPaginaAccionesGenerales(campo_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(campo_control) {
		
		this.actualizarPaginaCargaGeneral(campo_control);
		this.actualizarPaginaOrderBy(campo_control);
		this.actualizarPaginaTablaDatos(campo_control);
		this.actualizarPaginaCargaGeneralControles(campo_control);
		//this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(campo_control);
		this.actualizarPaginaAreaBusquedas(campo_control);
		this.actualizarPaginaCargaCombosFK(campo_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(campo_control) {
		//this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(campo_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(campo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(campo_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(campo_control) {
		
		this.actualizarPaginaCargaGeneral(campo_control);
		this.actualizarPaginaTablaDatos(campo_control);
		this.actualizarPaginaCargaGeneralControles(campo_control);
		//this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(campo_control);
		this.actualizarPaginaAreaBusquedas(campo_control);
		this.actualizarPaginaCargaCombosFK(campo_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		//this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		//this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		//this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		//this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		//this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		//this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(campo_control) {
		//this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(campo_control) {
		this.actualizarPaginaAbrirLink(campo_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);				
		//this.actualizarPaginaFormulario(campo_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);
		//this.actualizarPaginaFormulario(campo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		//this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);
		//this.actualizarPaginaFormulario(campo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(campo_control) {
		//this.actualizarPaginaFormulario(campo_control);
		this.onLoadCombosDefectoFK(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);
		//this.actualizarPaginaFormulario(campo_control);
		this.onLoadCombosDefectoFK(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		//this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(campo_control) {
		this.actualizarPaginaAbrirLink(campo_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(campo_control) {
					//super.actualizarPaginaImprimir(campo_control,"campo");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",campo_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("campo_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(campo_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(campo_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(campo_control) {
		//super.actualizarPaginaImprimir(campo_control,"campo");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("campo_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(campo_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",campo_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(campo_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(campo_control) {
		//super.actualizarPaginaImprimir(campo_control,"campo");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("campo_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(campo_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",campo_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(campo_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(campo_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(campo_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(campo_control);
			
		this.actualizarPaginaAbrirLink(campo_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(campo_control) {
		this.actualizarPaginaTablaDatos(campo_control);
		this.actualizarPaginaFormulario(campo_control);
		this.actualizarPaginaMensajePantallaAuxiliar(campo_control);		
		this.actualizarPaginaAreaMantenimiento(campo_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(campo_control) {
		
		if(campo_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(campo_control);
		}
		
		if(campo_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(campo_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(campo_control) {
		if(campo_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("campoReturnGeneral",JSON.stringify(campo_control.campoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(campo_control) {
		if(campo_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && campo_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(campo_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(campo_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(campo_control, mostrar) {
		
		if(mostrar==true) {
			campo_funcion1.resaltarRestaurarDivsPagina(false,"campo");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				campo_funcion1.resaltarRestaurarDivMantenimiento(false,"campo");
			}			
			
			campo_funcion1.mostrarDivMensaje(true,campo_control.strAuxiliarMensaje,campo_control.strAuxiliarCssMensaje);
		
		} else {
			campo_funcion1.mostrarDivMensaje(false,campo_control.strAuxiliarMensaje,campo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(campo_control) {
		if(campo_funcion1.esPaginaForm(campo_constante1)==true) {
			window.opener.campo_webcontrol1.actualizarPaginaTablaDatos(campo_control);
		} else {
			this.actualizarPaginaTablaDatos(campo_control);
		}
	}
	
	actualizarPaginaAbrirLink(campo_control) {
		campo_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(campo_control.strAuxiliarUrlPagina);
				
		campo_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(campo_control.strAuxiliarTipo,campo_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(campo_control) {
		campo_funcion1.resaltarRestaurarDivMensaje(true,campo_control.strAuxiliarMensajeAlert,campo_control.strAuxiliarCssMensaje);
			
		if(campo_funcion1.esPaginaForm(campo_constante1)==true) {
			window.opener.campo_funcion1.resaltarRestaurarDivMensaje(true,campo_control.strAuxiliarMensajeAlert,campo_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(campo_control) {
		this.campo_controlInicial=campo_control;
			
		if(campo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(campo_control.strStyleDivArbol,campo_control.strStyleDivContent
																,campo_control.strStyleDivOpcionesBanner,campo_control.strStyleDivExpandirColapsar
																,campo_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=campo_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",campo_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(campo_control) {
		this.actualizarCssBotonesPagina(campo_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(campo_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(campo_control.tiposReportes,campo_control.tiposReporte
															 	,campo_control.tiposPaginacion,campo_control.tiposAcciones
																,campo_control.tiposColumnasSelect,campo_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(campo_control.tiposRelaciones,campo_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(campo_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(campo_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(campo_control);			
	}
	
	actualizarPaginaUsuarioInvitado(campo_control) {
	
		var indexPosition=campo_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=campo_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(campo_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",campo_control.strRecargarFkTipos,",")) { 
				campo_webcontrol1.cargarCombosopcionsFK(campo_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(campo_control.strRecargarFkTiposNinguno!=null && campo_control.strRecargarFkTiposNinguno!='NINGUNO' && campo_control.strRecargarFkTiposNinguno!='') {
			
				if(campo_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_opcion",campo_control.strRecargarFkTiposNinguno,",")) { 
					campo_webcontrol1.cargarCombosopcionsFK(campo_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaopcionFK(campo_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,campo_funcion1,campo_control.opcionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(campo_control) {
		jQuery("#divBusquedacampoAjaxWebPart").css("display",campo_control.strPermisoBusqueda);
		jQuery("#trcampoCabeceraBusquedas").css("display",campo_control.strPermisoBusqueda);
		jQuery("#trBusquedacampo").css("display",campo_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(campo_control.htmlTablaOrderBy!=null
			&& campo_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycampoAjaxWebPart").html(campo_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//campo_webcontrol1.registrarOrderByActions();
			
		}
			
		if(campo_control.htmlTablaOrderByRel!=null
			&& campo_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcampoAjaxWebPart").html(campo_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(campo_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacampoAjaxWebPart").css("display","none");
			jQuery("#trcampoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacampo").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(campo_control) {
		
		if(!campo_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(campo_control);
		} else {
			jQuery("#divTablaDatoscamposAjaxWebPart").html(campo_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscampos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(campo_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscampos=jQuery("#tblTablaDatoscampos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("campo",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',campo_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			campo_webcontrol1.registrarControlesTableEdition(campo_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		campo_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(campo_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("campo_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(campo_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscamposAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(campo_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(campo_control);
		
		const divOrderBy = document.getElementById("divOrderBycampoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(campo_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcampoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(campo_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(campo_control.campoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(campo_control);			
		}
	}
	
	actualizarCamposFilaTabla(campo_control) {
		var i=0;
		
		i=campo_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(campo_control.campoActual.id);
		jQuery("#t-version_row_"+i+"").val(campo_control.campoActual.versionRow);
		
		if(campo_control.campoActual.id_opcion!=null && campo_control.campoActual.id_opcion>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != campo_control.campoActual.id_opcion) {
				jQuery("#t-cel_"+i+"_2").val(campo_control.campoActual.id_opcion).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(campo_control.campoActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(campo_control.campoActual.nombre);
		jQuery("#t-cel_"+i+"_5").val(campo_control.campoActual.descripcion);
		jQuery("#t-cel_"+i+"_6").prop('checked',campo_control.campoActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(campo_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionperfil_campo").click(function(){
		jQuery("#tblTablaDatoscampos").on("click",".imgrelacionperfil_campo", function () {

			var idActual=jQuery(this).attr("idactualcampo");

			campo_webcontrol1.registrarSesionParaperfil_campos(idActual);
		});				
	}
		
	

	registrarSesionParaperfil_campos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"campo","perfil_campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1,"s","");
	}
	
	registrarControlesTableEdition(campo_control) {
		campo_funcion1.registrarControlesTableValidacionEdition(campo_control,campo_webcontrol1,campo_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(campo_control) {
		jQuery("#divResumencampoActualAjaxWebPart").html(campo_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(campo_control) {
		//jQuery("#divAccionesRelacionescampoAjaxWebPart").html(campo_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("campo_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(campo_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescampoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		campo_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(campo_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(campo_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(campo_control) {
		
		if(campo_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+campo_constante1.STR_SUFIJO+"FK_Idopcion").attr("style",campo_control.strVisibleFK_Idopcion);
			jQuery("#tblstrVisible"+campo_constante1.STR_SUFIJO+"FK_Idopcion").attr("style",campo_control.strVisibleFK_Idopcion);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncampo();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("campo","seguridad","",campo_funcion1,campo_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("campo",id,"seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);		
	}
	
	

	abrirBusquedaParaopcion(strNombreCampoBusqueda){//idActual
		campo_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("campo","opcion","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionperfil_campo").click(function(){

			var idActual=jQuery(this).attr("idactualcampo");

			campo_webcontrol1.registrarSesionParaperfil_campos(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campoConstante,strParametros);
		
		//campo_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosopcionsFK(campo_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+campo_constante1.STR_SUFIJO+"-id_opcion",campo_control.opcionsFK);

		if(campo_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+campo_control.idFilaTablaActual+"_2",campo_control.opcionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+campo_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion",campo_control.opcionsFK);

	};

	
	
	registrarComboActionChangeCombosopcionsFK(campo_control) {

	};

	
	
	setDefectoValorCombosopcionsFK(campo_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(campo_control.idopcionDefaultFK>-1 && jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").val() != campo_control.idopcionDefaultFK) {
				jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion").val(campo_control.idopcionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+campo_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(campo_control.idopcionDefaultForeignKey).trigger("change");
			if(jQuery("#"+campo_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+campo_constante1.STR_SUFIJO+"FK_Idopcion-cmbid_opcion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//campo_control
		
	
	}
	
	onLoadCombosDefectoFK(campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",campo_control.strRecargarFkTipos,",")) { 
				campo_webcontrol1.setDefectoValorCombosopcionsFK(campo_control);
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
	onLoadCombosEventosFK(campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(campo_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_opcion",campo_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				campo_webcontrol1.registrarComboActionChangeCombosopcionsFK(campo_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(campo_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(campo_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(campo_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(campo_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("campo","seguridad","",campo_funcion1,campo_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("campo","seguridad","",campo_funcion1,campo_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("campo","FK_Idopcion","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
		
			
			if(campo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("campo","seguridad","",campo_funcion1,campo_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("campo");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("campo");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(campo_funcion1,campo_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(campo_funcion1,campo_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(campo_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("campo","seguridad","",campo_funcion1,campo_webcontrol1,"campo");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("opcion","id_opcion","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+campo_constante1.STR_SUFIJO+"-id_opcion_img_busqueda").click(function(){
				campo_webcontrol1.abrirBusquedaParaopcion("id_opcion");
				//alert(jQuery('#form-id_opcion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("campo","seguridad","",campo_funcion1,campo_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("campo");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(campo_control) {
		
		jQuery("#divBusquedacampoAjaxWebPart").css("display",campo_control.strPermisoBusqueda);
		jQuery("#trcampoCabeceraBusquedas").css("display",campo_control.strPermisoBusqueda);
		jQuery("#trBusquedacampo").css("display",campo_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecampo").css("display",campo_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscampo").attr("style",campo_control.strPermisoMostrarTodos);		
		
		if(campo_control.strPermisoNuevo!=null) {
			jQuery("#tdcampoNuevo").css("display",campo_control.strPermisoNuevo);
			jQuery("#tdcampoNuevoToolBar").css("display",campo_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcampoDuplicar").css("display",campo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcampoDuplicarToolBar").css("display",campo_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcampoNuevoGuardarCambios").css("display",campo_control.strPermisoNuevo);
			jQuery("#tdcampoNuevoGuardarCambiosToolBar").css("display",campo_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(campo_control.strPermisoActualizar!=null) {
			jQuery("#tdcampoCopiar").css("display",campo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcampoCopiarToolBar").css("display",campo_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcampoConEditar").css("display",campo_control.strPermisoActualizar);
		}
		
		jQuery("#tdcampoGuardarCambios").css("display",campo_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcampoGuardarCambiosToolBar").css("display",campo_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcampoCerrarPagina").css("display",campo_control.strPermisoPopup);		
		jQuery("#tdcampoCerrarPaginaToolBar").css("display",campo_control.strPermisoPopup);
		//jQuery("#trcampoAccionesRelaciones").css("display",campo_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=campo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + campo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + campo_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Campos";
		sTituloBanner+=" - " + campo_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + campo_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcampoRelacionesToolBar").css("display",campo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscampo").css("display",campo_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("campo","seguridad","",campo_funcion1,campo_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		campo_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		campo_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		campo_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		campo_webcontrol1.registrarEventosControles();
		
		if(campo_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(campo_constante1.STR_ES_RELACIONADO=="false") {
			campo_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(campo_constante1.STR_ES_RELACIONES=="true") {
			if(campo_constante1.BIT_ES_PAGINA_FORM==true) {
				campo_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(campo_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(campo_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				campo_webcontrol1.onLoad();
			
			//} else {
				//if(campo_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			campo_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("campo","seguridad","",campo_funcion1,campo_webcontrol1,campo_constante1);	
	}
}

var campo_webcontrol1 = new campo_webcontrol();

//Para ser llamado desde otro archivo (import)
export {campo_webcontrol,campo_webcontrol1};

//Para ser llamado desde window.opener
window.campo_webcontrol1 = campo_webcontrol1;


if(campo_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = campo_webcontrol1.onLoadWindow; 
}

//</script>