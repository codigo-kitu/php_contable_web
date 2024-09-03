//<script type="text/javascript" language="javascript">



//var retencionJQueryPaginaWebInteraccion= function (retencion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {retencion_constante,retencion_constante1} from '../util/retencion_constante.js';

import {retencion_funcion,retencion_funcion1} from '../util/retencion_funcion.js';


class retencion_webcontrol extends GeneralEntityWebControl {
	
	retencion_control=null;
	retencion_controlInicial=null;
	retencion_controlAuxiliar=null;
		
	//if(retencion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(retencion_control) {
		super();
		
		this.retencion_control=retencion_control;
	}
		
	actualizarVariablesPagina(retencion_control) {
		
		if(retencion_control.action=="index" || retencion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(retencion_control);
			
		} 
		
		
		else if(retencion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(retencion_control);
		
		} else if(retencion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(retencion_control);
		
		} else if(retencion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(retencion_control);
		
		} else if(retencion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(retencion_control);
			
		} else if(retencion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(retencion_control);
			
		} else if(retencion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(retencion_control);
		
		} else if(retencion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(retencion_control);		
		
		} else if(retencion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(retencion_control);
		
		} else if(retencion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(retencion_control);
		
		} else if(retencion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(retencion_control);
		
		} else if(retencion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(retencion_control);
		
		}  else if(retencion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(retencion_control);
		
		} else if(retencion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(retencion_control);
		
		} else if(retencion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(retencion_control);
		
		} else if(retencion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(retencion_control);
		
		} else if(retencion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(retencion_control);
		
		} else if(retencion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(retencion_control);
		
		} else if(retencion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(retencion_control);
		
		} else if(retencion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(retencion_control);
		
		} else if(retencion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(retencion_control);
		
		} else if(retencion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(retencion_control);		
		
		} else if(retencion_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(retencion_control);		
		
		} else if(retencion_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(retencion_control);		
		
		} else if(retencion_control.action.includes("Busqueda") ||
				  retencion_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(retencion_control);
			
		} else if(retencion_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(retencion_control)
		}
		
		
		
	
		else if(retencion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(retencion_control);	
		
		} else if(retencion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_control);		
		}
	
		else if(retencion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(retencion_control);		
		}
	
		else if(retencion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(retencion_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + retencion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(retencion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(retencion_control) {
		this.actualizarPaginaAccionesGenerales(retencion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(retencion_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_control);
		this.actualizarPaginaOrderBy(retencion_control);
		this.actualizarPaginaTablaDatos(retencion_control);
		this.actualizarPaginaCargaGeneralControles(retencion_control);
		//this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_control);
		this.actualizarPaginaAreaBusquedas(retencion_control);
		this.actualizarPaginaCargaCombosFK(retencion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(retencion_control) {
		//this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(retencion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(retencion_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_control);
		this.actualizarPaginaTablaDatos(retencion_control);
		this.actualizarPaginaCargaGeneralControles(retencion_control);
		//this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_control);
		this.actualizarPaginaAreaBusquedas(retencion_control);
		this.actualizarPaginaCargaCombosFK(retencion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		//this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		//this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		//this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(retencion_control) {
		//this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(retencion_control) {
		this.actualizarPaginaAbrirLink(retencion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);				
		//this.actualizarPaginaFormulario(retencion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);
		//this.actualizarPaginaFormulario(retencion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);
		//this.actualizarPaginaFormulario(retencion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(retencion_control) {
		//this.actualizarPaginaFormulario(retencion_control);
		this.onLoadCombosDefectoFK(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);
		//this.actualizarPaginaFormulario(retencion_control);
		this.onLoadCombosDefectoFK(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(retencion_control) {
		this.actualizarPaginaAbrirLink(retencion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(retencion_control) {
					//super.actualizarPaginaImprimir(retencion_control,"retencion");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",retencion_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("retencion_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(retencion_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(retencion_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(retencion_control) {
		//super.actualizarPaginaImprimir(retencion_control,"retencion");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("retencion_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(retencion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",retencion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(retencion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(retencion_control) {
		//super.actualizarPaginaImprimir(retencion_control,"retencion");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("retencion_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(retencion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",retencion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(retencion_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(retencion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(retencion_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(retencion_control);
			
		this.actualizarPaginaAbrirLink(retencion_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(retencion_control) {
		this.actualizarPaginaTablaDatos(retencion_control);
		this.actualizarPaginaFormulario(retencion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(retencion_control) {
		
		if(retencion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(retencion_control);
		}
		
		if(retencion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(retencion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(retencion_control) {
		if(retencion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("retencionReturnGeneral",JSON.stringify(retencion_control.retencionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(retencion_control) {
		if(retencion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && retencion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(retencion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(retencion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(retencion_control, mostrar) {
		
		if(mostrar==true) {
			retencion_funcion1.resaltarRestaurarDivsPagina(false,"retencion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				retencion_funcion1.resaltarRestaurarDivMantenimiento(false,"retencion");
			}			
			
			retencion_funcion1.mostrarDivMensaje(true,retencion_control.strAuxiliarMensaje,retencion_control.strAuxiliarCssMensaje);
		
		} else {
			retencion_funcion1.mostrarDivMensaje(false,retencion_control.strAuxiliarMensaje,retencion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(retencion_control) {
		if(retencion_funcion1.esPaginaForm(retencion_constante1)==true) {
			window.opener.retencion_webcontrol1.actualizarPaginaTablaDatos(retencion_control);
		} else {
			this.actualizarPaginaTablaDatos(retencion_control);
		}
	}
	
	actualizarPaginaAbrirLink(retencion_control) {
		retencion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(retencion_control.strAuxiliarUrlPagina);
				
		retencion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(retencion_control.strAuxiliarTipo,retencion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(retencion_control) {
		retencion_funcion1.resaltarRestaurarDivMensaje(true,retencion_control.strAuxiliarMensajeAlert,retencion_control.strAuxiliarCssMensaje);
			
		if(retencion_funcion1.esPaginaForm(retencion_constante1)==true) {
			window.opener.retencion_funcion1.resaltarRestaurarDivMensaje(true,retencion_control.strAuxiliarMensajeAlert,retencion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(retencion_control) {
		this.retencion_controlInicial=retencion_control;
			
		if(retencion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(retencion_control.strStyleDivArbol,retencion_control.strStyleDivContent
																,retencion_control.strStyleDivOpcionesBanner,retencion_control.strStyleDivExpandirColapsar
																,retencion_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=retencion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",retencion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(retencion_control) {
		this.actualizarCssBotonesPagina(retencion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(retencion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(retencion_control.tiposReportes,retencion_control.tiposReporte
															 	,retencion_control.tiposPaginacion,retencion_control.tiposAcciones
																,retencion_control.tiposColumnasSelect,retencion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(retencion_control.tiposRelaciones,retencion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(retencion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(retencion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(retencion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(retencion_control) {
	
		var indexPosition=retencion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=retencion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(retencion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.cargarCombosempresasFK(retencion_control);
			}

			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.cargarComboscuenta_ventassFK(retencion_control);
			}

			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.cargarComboscuenta_comprassFK(retencion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(retencion_control.strRecargarFkTiposNinguno!=null && retencion_control.strRecargarFkTiposNinguno!='NINGUNO' && retencion_control.strRecargarFkTiposNinguno!='') {
			
				if(retencion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",retencion_control.strRecargarFkTiposNinguno,",")) { 
					retencion_webcontrol1.cargarCombosempresasFK(retencion_control);
				}

				if(retencion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_control.strRecargarFkTiposNinguno,",")) { 
					retencion_webcontrol1.cargarComboscuenta_ventassFK(retencion_control);
				}

				if(retencion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_control.strRecargarFkTiposNinguno,",")) { 
					retencion_webcontrol1.cargarComboscuenta_comprassFK(retencion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(retencion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_funcion1,retencion_control.empresasFK);
	}

	cargarComboEditarTablacuenta_ventasFK(retencion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_funcion1,retencion_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_comprasFK(retencion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_funcion1,retencion_control.cuenta_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(retencion_control) {
		jQuery("#divBusquedaretencionAjaxWebPart").css("display",retencion_control.strPermisoBusqueda);
		jQuery("#trretencionCabeceraBusquedas").css("display",retencion_control.strPermisoBusqueda);
		jQuery("#trBusquedaretencion").css("display",retencion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(retencion_control.htmlTablaOrderBy!=null
			&& retencion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByretencionAjaxWebPart").html(retencion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//retencion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(retencion_control.htmlTablaOrderByRel!=null
			&& retencion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelretencionAjaxWebPart").html(retencion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(retencion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaretencionAjaxWebPart").css("display","none");
			jQuery("#trretencionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaretencion").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(retencion_control) {
		
		if(!retencion_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(retencion_control);
		} else {
			jQuery("#divTablaDatosretencionsAjaxWebPart").html(retencion_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosretencions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(retencion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosretencions=jQuery("#tblTablaDatosretencions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("retencion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',retencion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			retencion_webcontrol1.registrarControlesTableEdition(retencion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		retencion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(retencion_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("retencion_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(retencion_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosretencionsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(retencion_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(retencion_control);
		
		const divOrderBy = document.getElementById("divOrderByretencionAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(retencion_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelretencionAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(retencion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(retencion_control.retencionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(retencion_control);			
		}
	}
	
	actualizarCamposFilaTabla(retencion_control) {
		var i=0;
		
		i=retencion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(retencion_control.retencionActual.id);
		jQuery("#t-version_row_"+i+"").val(retencion_control.retencionActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(retencion_control.retencionActual.versionRow);
		
		if(retencion_control.retencionActual.id_empresa!=null && retencion_control.retencionActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != retencion_control.retencionActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(retencion_control.retencionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(retencion_control.retencionActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(retencion_control.retencionActual.descripcion);
		jQuery("#t-cel_"+i+"_6").val(retencion_control.retencionActual.valor);
		jQuery("#t-cel_"+i+"_7").val(retencion_control.retencionActual.valor_base);
		jQuery("#t-cel_"+i+"_8").prop('checked',retencion_control.retencionActual.predeterminado);
		
		if(retencion_control.retencionActual.id_cuenta_ventas!=null && retencion_control.retencionActual.id_cuenta_ventas>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != retencion_control.retencionActual.id_cuenta_ventas) {
				jQuery("#t-cel_"+i+"_9").val(retencion_control.retencionActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_9").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retencion_control.retencionActual.id_cuenta_compras!=null && retencion_control.retencionActual.id_cuenta_compras>-1){
			if(jQuery("#t-cel_"+i+"_10").val() != retencion_control.retencionActual.id_cuenta_compras) {
				jQuery("#t-cel_"+i+"_10").val(retencion_control.retencionActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_10").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_10").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_11").val(retencion_control.retencionActual.cuenta_contable_ventas);
		jQuery("#t-cel_"+i+"_12").val(retencion_control.retencionActual.cuenta_contable_compras);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(retencion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_producto_compras").click(function(){
		jQuery("#tblTablaDatosretencions").on("click",".imgrelacionlista_producto_compras", function () {

			var idActual=jQuery(this).attr("idactualretencion");

			retencion_webcontrol1.registrarSesion_comprasParalista_productoes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproducto").click(function(){
		jQuery("#tblTablaDatosretencions").on("click",".imgrelacionproducto", function () {

			var idActual=jQuery(this).attr("idactualretencion");

			retencion_webcontrol1.registrarSesionParaproductos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatosretencions").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualretencion");

			retencion_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatosretencions").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualretencion");

			retencion_webcontrol1.registrarSesionParaproveedores(idActual);
		});				
	}
		
	

	registrarSesion_comprasParalista_productoes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"retencion","lista_producto","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1,"es","_compras");
	}

	registrarSesionParaproductos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"retencion","producto","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1,"s","");
	}

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"retencion","cliente","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1,"s","");
	}

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"retencion","proveedor","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1,"es","");
	}
	
	registrarControlesTableEdition(retencion_control) {
		retencion_funcion1.registrarControlesTableValidacionEdition(retencion_control,retencion_webcontrol1,retencion_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(retencion_control) {
		jQuery("#divResumenretencionActualAjaxWebPart").html(retencion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_control) {
		//jQuery("#divAccionesRelacionesretencionAjaxWebPart").html(retencion_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("retencion_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(retencion_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesretencionAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		retencion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(retencion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(retencion_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(retencion_control) {
		
		if(retencion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",retencion_control.strVisibleFK_Idcuenta_compras);
			jQuery("#tblstrVisible"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",retencion_control.strVisibleFK_Idcuenta_compras);
		}

		if(retencion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",retencion_control.strVisibleFK_Idcuenta_ventas);
			jQuery("#tblstrVisible"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",retencion_control.strVisibleFK_Idcuenta_ventas);
		}

		if(retencion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",retencion_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+retencion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",retencion_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionretencion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("retencion",id,"facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		retencion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion","empresa","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		retencion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion","cuenta","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		retencion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion","cuenta","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionlista_producto").click(function(){

			var idActual=jQuery(this).attr("idactualretencion");

			retencion_webcontrol1.registrarSesionParalista_productoes(idActual);
		});
		jQuery("#imgdivrelacionproducto").click(function(){

			var idActual=jQuery(this).attr("idactualretencion");

			retencion_webcontrol1.registrarSesionParaproductos(idActual);
		});
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualretencion");

			retencion_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualretencion");

			retencion_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencionConstante,strParametros);
		
		//retencion_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(retencion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa",retencion_control.empresasFK);

		if(retencion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_control.idFilaTablaActual+"_3",retencion_control.empresasFK);
		}
	};

	cargarComboscuenta_ventassFK(retencion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas",retencion_control.cuenta_ventassFK);

		if(retencion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_control.idFilaTablaActual+"_9",retencion_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",retencion_control.cuenta_ventassFK);

	};

	cargarComboscuenta_comprassFK(retencion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras",retencion_control.cuenta_comprassFK);

		if(retencion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_control.idFilaTablaActual+"_10",retencion_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",retencion_control.cuenta_comprassFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(retencion_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(retencion_control) {

	};

	registrarComboActionChangeComboscuenta_comprassFK(retencion_control) {

	};

	
	
	setDefectoValorCombosempresasFK(retencion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_control.idempresaDefaultFK>-1 && jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_control.idempresaDefaultFK) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa").val(retencion_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(retencion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(retencion_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprassFK(retencion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(retencion_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//retencion_control
		
	
	}
	
	onLoadCombosDefectoFK(retencion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.setDefectoValorCombosempresasFK(retencion_control);
			}

			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.setDefectoValorComboscuenta_ventassFK(retencion_control);
			}

			if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_control.strRecargarFkTipos,",")) { 
				retencion_webcontrol1.setDefectoValorComboscuenta_comprassFK(retencion_control);
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
	onLoadCombosEventosFK(retencion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_webcontrol1.registrarComboActionChangeCombosempresasFK(retencion_control);
			//}

			//if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(retencion_control);
			//}

			//if(retencion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(retencion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(retencion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(retencion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(retencion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion","FK_Idcuenta_compras","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion","FK_Idcuenta_ventas","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion","FK_Idempresa","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
		
			
			if(retencion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("retencion");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("retencion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(retencion_funcion1,retencion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(retencion_funcion1,retencion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(retencion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,"retencion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				retencion_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				retencion_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				retencion_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("retencion");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(retencion_control) {
		
		jQuery("#divBusquedaretencionAjaxWebPart").css("display",retencion_control.strPermisoBusqueda);
		jQuery("#trretencionCabeceraBusquedas").css("display",retencion_control.strPermisoBusqueda);
		jQuery("#trBusquedaretencion").css("display",retencion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteretencion").css("display",retencion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosretencion").attr("style",retencion_control.strPermisoMostrarTodos);		
		
		if(retencion_control.strPermisoNuevo!=null) {
			jQuery("#tdretencionNuevo").css("display",retencion_control.strPermisoNuevo);
			jQuery("#tdretencionNuevoToolBar").css("display",retencion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdretencionDuplicar").css("display",retencion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdretencionDuplicarToolBar").css("display",retencion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdretencionNuevoGuardarCambios").css("display",retencion_control.strPermisoNuevo);
			jQuery("#tdretencionNuevoGuardarCambiosToolBar").css("display",retencion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(retencion_control.strPermisoActualizar!=null) {
			jQuery("#tdretencionCopiar").css("display",retencion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencionCopiarToolBar").css("display",retencion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencionConEditar").css("display",retencion_control.strPermisoActualizar);
		}
		
		jQuery("#tdretencionGuardarCambios").css("display",retencion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdretencionGuardarCambiosToolBar").css("display",retencion_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdretencionCerrarPagina").css("display",retencion_control.strPermisoPopup);		
		jQuery("#tdretencionCerrarPaginaToolBar").css("display",retencion_control.strPermisoPopup);
		//jQuery("#trretencionAccionesRelaciones").css("display",retencion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=retencion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retencion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + retencion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Retenciones";
		sTituloBanner+=" - " + retencion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retencion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdretencionRelacionesToolBar").css("display",retencion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosretencion").css("display",retencion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		retencion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		retencion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		retencion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		retencion_webcontrol1.registrarEventosControles();
		
		if(retencion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(retencion_constante1.STR_ES_RELACIONADO=="false") {
			retencion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(retencion_constante1.STR_ES_RELACIONES=="true") {
			if(retencion_constante1.BIT_ES_PAGINA_FORM==true) {
				retencion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(retencion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(retencion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				retencion_webcontrol1.onLoad();
			
			//} else {
				//if(retencion_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			retencion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("retencion","facturacion","",retencion_funcion1,retencion_webcontrol1,retencion_constante1);	
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

var retencion_webcontrol1 = new retencion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {retencion_webcontrol,retencion_webcontrol1};

//Para ser llamado desde window.opener
window.retencion_webcontrol1 = retencion_webcontrol1;


if(retencion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = retencion_webcontrol1.onLoadWindow; 
}

//</script>