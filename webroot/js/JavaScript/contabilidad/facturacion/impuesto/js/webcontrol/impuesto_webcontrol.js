//<script type="text/javascript" language="javascript">



//var impuestoJQueryPaginaWebInteraccion= function (impuesto_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {impuesto_constante,impuesto_constante1} from '../util/impuesto_constante.js';

import {impuesto_funcion,impuesto_funcion1} from '../util/impuesto_funcion.js';


class impuesto_webcontrol extends GeneralEntityWebControl {
	
	impuesto_control=null;
	impuesto_controlInicial=null;
	impuesto_controlAuxiliar=null;
		
	//if(impuesto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(impuesto_control) {
		super();
		
		this.impuesto_control=impuesto_control;
	}
		
	actualizarVariablesPagina(impuesto_control) {
		
		if(impuesto_control.action=="index" || impuesto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(impuesto_control);
			
		} 
		
		
		else if(impuesto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(impuesto_control);
		
		} else if(impuesto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(impuesto_control);
		
		} else if(impuesto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(impuesto_control);
		
		} else if(impuesto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(impuesto_control);
			
		} else if(impuesto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(impuesto_control);
			
		} else if(impuesto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(impuesto_control);
		
		} else if(impuesto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(impuesto_control);		
		
		} else if(impuesto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(impuesto_control);
		
		} else if(impuesto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(impuesto_control);
		
		} else if(impuesto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(impuesto_control);
		
		} else if(impuesto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(impuesto_control);
		
		}  else if(impuesto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(impuesto_control);
		
		} else if(impuesto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(impuesto_control);
		
		} else if(impuesto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(impuesto_control);
		
		} else if(impuesto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(impuesto_control);
		
		} else if(impuesto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(impuesto_control);
		
		} else if(impuesto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(impuesto_control);
		
		} else if(impuesto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(impuesto_control);
		
		} else if(impuesto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(impuesto_control);
		
		} else if(impuesto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(impuesto_control);
		
		} else if(impuesto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(impuesto_control);		
		
		} else if(impuesto_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(impuesto_control);		
		
		} else if(impuesto_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(impuesto_control);		
		
		} else if(impuesto_control.action.includes("Busqueda") ||
				  impuesto_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(impuesto_control);
			
		} else if(impuesto_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(impuesto_control)
		}
		
		
		
	
		else if(impuesto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(impuesto_control);	
		
		} else if(impuesto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(impuesto_control);		
		}
	
		else if(impuesto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(impuesto_control);		
		}
	
		else if(impuesto_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(impuesto_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + impuesto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(impuesto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(impuesto_control) {
		this.actualizarPaginaAccionesGenerales(impuesto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(impuesto_control) {
		
		this.actualizarPaginaCargaGeneral(impuesto_control);
		this.actualizarPaginaOrderBy(impuesto_control);
		this.actualizarPaginaTablaDatos(impuesto_control);
		this.actualizarPaginaCargaGeneralControles(impuesto_control);
		//this.actualizarPaginaFormulario(impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(impuesto_control);
		this.actualizarPaginaAreaBusquedas(impuesto_control);
		this.actualizarPaginaCargaCombosFK(impuesto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(impuesto_control) {
		//this.actualizarPaginaFormulario(impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(impuesto_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(impuesto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(impuesto_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(impuesto_control) {
		
		this.actualizarPaginaCargaGeneral(impuesto_control);
		this.actualizarPaginaTablaDatos(impuesto_control);
		this.actualizarPaginaCargaGeneralControles(impuesto_control);
		//this.actualizarPaginaFormulario(impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(impuesto_control);
		this.actualizarPaginaAreaBusquedas(impuesto_control);
		this.actualizarPaginaCargaCombosFK(impuesto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);		
		//this.actualizarPaginaFormulario(impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		//this.actualizarPaginaAreaMantenimiento(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);		
		//this.actualizarPaginaFormulario(impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		//this.actualizarPaginaAreaMantenimiento(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);		
		//this.actualizarPaginaFormulario(impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		//this.actualizarPaginaAreaMantenimiento(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(impuesto_control) {
		//this.actualizarPaginaFormulario(impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(impuesto_control) {
		this.actualizarPaginaAbrirLink(impuesto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);				
		//this.actualizarPaginaFormulario(impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(impuesto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);
		//this.actualizarPaginaFormulario(impuesto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		//this.actualizarPaginaAreaMantenimiento(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);
		//this.actualizarPaginaFormulario(impuesto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(impuesto_control) {
		//this.actualizarPaginaFormulario(impuesto_control);
		this.onLoadCombosDefectoFK(impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);
		//this.actualizarPaginaFormulario(impuesto_control);
		this.onLoadCombosDefectoFK(impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		//this.actualizarPaginaAreaMantenimiento(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(impuesto_control) {
		this.actualizarPaginaAbrirLink(impuesto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(impuesto_control) {
					//super.actualizarPaginaImprimir(impuesto_control,"impuesto");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",impuesto_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("impuesto_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(impuesto_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(impuesto_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(impuesto_control) {
		//super.actualizarPaginaImprimir(impuesto_control,"impuesto");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("impuesto_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(impuesto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",impuesto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(impuesto_control) {
		//super.actualizarPaginaImprimir(impuesto_control,"impuesto");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("impuesto_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(impuesto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",impuesto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(impuesto_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(impuesto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(impuesto_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(impuesto_control);
			
		this.actualizarPaginaAbrirLink(impuesto_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(impuesto_control) {
		this.actualizarPaginaTablaDatos(impuesto_control);
		this.actualizarPaginaFormulario(impuesto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(impuesto_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(impuesto_control) {
		
		if(impuesto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(impuesto_control);
		}
		
		if(impuesto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(impuesto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(impuesto_control) {
		if(impuesto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("impuestoReturnGeneral",JSON.stringify(impuesto_control.impuestoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(impuesto_control) {
		if(impuesto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && impuesto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(impuesto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(impuesto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(impuesto_control, mostrar) {
		
		if(mostrar==true) {
			impuesto_funcion1.resaltarRestaurarDivsPagina(false,"impuesto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				impuesto_funcion1.resaltarRestaurarDivMantenimiento(false,"impuesto");
			}			
			
			impuesto_funcion1.mostrarDivMensaje(true,impuesto_control.strAuxiliarMensaje,impuesto_control.strAuxiliarCssMensaje);
		
		} else {
			impuesto_funcion1.mostrarDivMensaje(false,impuesto_control.strAuxiliarMensaje,impuesto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(impuesto_control) {
		if(impuesto_funcion1.esPaginaForm(impuesto_constante1)==true) {
			window.opener.impuesto_webcontrol1.actualizarPaginaTablaDatos(impuesto_control);
		} else {
			this.actualizarPaginaTablaDatos(impuesto_control);
		}
	}
	
	actualizarPaginaAbrirLink(impuesto_control) {
		impuesto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(impuesto_control.strAuxiliarUrlPagina);
				
		impuesto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(impuesto_control.strAuxiliarTipo,impuesto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(impuesto_control) {
		impuesto_funcion1.resaltarRestaurarDivMensaje(true,impuesto_control.strAuxiliarMensajeAlert,impuesto_control.strAuxiliarCssMensaje);
			
		if(impuesto_funcion1.esPaginaForm(impuesto_constante1)==true) {
			window.opener.impuesto_funcion1.resaltarRestaurarDivMensaje(true,impuesto_control.strAuxiliarMensajeAlert,impuesto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(impuesto_control) {
		this.impuesto_controlInicial=impuesto_control;
			
		if(impuesto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(impuesto_control.strStyleDivArbol,impuesto_control.strStyleDivContent
																,impuesto_control.strStyleDivOpcionesBanner,impuesto_control.strStyleDivExpandirColapsar
																,impuesto_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=impuesto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",impuesto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(impuesto_control) {
		this.actualizarCssBotonesPagina(impuesto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(impuesto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(impuesto_control.tiposReportes,impuesto_control.tiposReporte
															 	,impuesto_control.tiposPaginacion,impuesto_control.tiposAcciones
																,impuesto_control.tiposColumnasSelect,impuesto_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(impuesto_control.tiposRelaciones,impuesto_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(impuesto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(impuesto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(impuesto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(impuesto_control) {
	
		var indexPosition=impuesto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=impuesto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(impuesto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",impuesto_control.strRecargarFkTipos,",")) { 
				impuesto_webcontrol1.cargarCombosempresasFK(impuesto_control);
			}

			if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",impuesto_control.strRecargarFkTipos,",")) { 
				impuesto_webcontrol1.cargarComboscuenta_ventassFK(impuesto_control);
			}

			if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",impuesto_control.strRecargarFkTipos,",")) { 
				impuesto_webcontrol1.cargarComboscuenta_comprassFK(impuesto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(impuesto_control.strRecargarFkTiposNinguno!=null && impuesto_control.strRecargarFkTiposNinguno!='NINGUNO' && impuesto_control.strRecargarFkTiposNinguno!='') {
			
				if(impuesto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",impuesto_control.strRecargarFkTiposNinguno,",")) { 
					impuesto_webcontrol1.cargarCombosempresasFK(impuesto_control);
				}

				if(impuesto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",impuesto_control.strRecargarFkTiposNinguno,",")) { 
					impuesto_webcontrol1.cargarComboscuenta_ventassFK(impuesto_control);
				}

				if(impuesto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",impuesto_control.strRecargarFkTiposNinguno,",")) { 
					impuesto_webcontrol1.cargarComboscuenta_comprassFK(impuesto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(impuesto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,impuesto_funcion1,impuesto_control.empresasFK);
	}

	cargarComboEditarTablacuenta_ventasFK(impuesto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,impuesto_funcion1,impuesto_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_comprasFK(impuesto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,impuesto_funcion1,impuesto_control.cuenta_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(impuesto_control) {
		jQuery("#divBusquedaimpuestoAjaxWebPart").css("display",impuesto_control.strPermisoBusqueda);
		jQuery("#trimpuestoCabeceraBusquedas").css("display",impuesto_control.strPermisoBusqueda);
		jQuery("#trBusquedaimpuesto").css("display",impuesto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(impuesto_control.htmlTablaOrderBy!=null
			&& impuesto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimpuestoAjaxWebPart").html(impuesto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//impuesto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(impuesto_control.htmlTablaOrderByRel!=null
			&& impuesto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimpuestoAjaxWebPart").html(impuesto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(impuesto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimpuestoAjaxWebPart").css("display","none");
			jQuery("#trimpuestoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimpuesto").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(impuesto_control) {
		
		if(!impuesto_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(impuesto_control);
		} else {
			jQuery("#divTablaDatosimpuestosAjaxWebPart").html(impuesto_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimpuestos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(impuesto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimpuestos=jQuery("#tblTablaDatosimpuestos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("impuesto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',impuesto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			impuesto_webcontrol1.registrarControlesTableEdition(impuesto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		impuesto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(impuesto_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("impuesto_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(impuesto_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosimpuestosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(impuesto_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(impuesto_control);
		
		const divOrderBy = document.getElementById("divOrderByimpuestoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(impuesto_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelimpuestoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(impuesto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(impuesto_control.impuestoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(impuesto_control);			
		}
	}
	
	actualizarCamposFilaTabla(impuesto_control) {
		var i=0;
		
		i=impuesto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(impuesto_control.impuestoActual.id);
		jQuery("#t-version_row_"+i+"").val(impuesto_control.impuestoActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(impuesto_control.impuestoActual.versionRow);
		
		if(impuesto_control.impuestoActual.id_empresa!=null && impuesto_control.impuestoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != impuesto_control.impuestoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(impuesto_control.impuestoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(impuesto_control.impuestoActual.codigo);
		jQuery("#t-cel_"+i+"_5").val(impuesto_control.impuestoActual.descripcion);
		jQuery("#t-cel_"+i+"_6").val(impuesto_control.impuestoActual.valor);
		jQuery("#t-cel_"+i+"_7").prop('checked',impuesto_control.impuestoActual.predeterminado);
		
		if(impuesto_control.impuestoActual.id_cuenta_ventas!=null && impuesto_control.impuestoActual.id_cuenta_ventas>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != impuesto_control.impuestoActual.id_cuenta_ventas) {
				jQuery("#t-cel_"+i+"_8").val(impuesto_control.impuestoActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_8").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(impuesto_control.impuestoActual.id_cuenta_compras!=null && impuesto_control.impuestoActual.id_cuenta_compras>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != impuesto_control.impuestoActual.id_cuenta_compras) {
				jQuery("#t-cel_"+i+"_9").val(impuesto_control.impuestoActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_9").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(impuesto_control.impuestoActual.cuenta_contable_ventas);
		jQuery("#t-cel_"+i+"_11").val(impuesto_control.impuestoActual.cuenta_contable_compras);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(impuesto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_producto_compras").click(function(){
		jQuery("#tblTablaDatosimpuestos").on("click",".imgrelacionlista_producto_compras", function () {

			var idActual=jQuery(this).attr("idactualimpuesto");

			impuesto_webcontrol1.registrarSesion_comprasParalista_productoes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproducto").click(function(){
		jQuery("#tblTablaDatosimpuestos").on("click",".imgrelacionproducto", function () {

			var idActual=jQuery(this).attr("idactualimpuesto");

			impuesto_webcontrol1.registrarSesionParaproductos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatosimpuestos").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualimpuesto");

			impuesto_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatosimpuestos").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualimpuesto");

			impuesto_webcontrol1.registrarSesionParaproveedores(idActual);
		});				
	}
		
	

	registrarSesion_comprasParalista_productoes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"impuesto","lista_producto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1,"es","_compras");
	}

	registrarSesionParaproductos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"impuesto","producto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1,"s","");
	}

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"impuesto","cliente","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1,"s","");
	}

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"impuesto","proveedor","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1,"es","");
	}
	
	registrarControlesTableEdition(impuesto_control) {
		impuesto_funcion1.registrarControlesTableValidacionEdition(impuesto_control,impuesto_webcontrol1,impuesto_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(impuesto_control) {
		jQuery("#divResumenimpuestoActualAjaxWebPart").html(impuesto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(impuesto_control) {
		//jQuery("#divAccionesRelacionesimpuestoAjaxWebPart").html(impuesto_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("impuesto_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(impuesto_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesimpuestoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		impuesto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(impuesto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(impuesto_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(impuesto_control) {
		
		if(impuesto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",impuesto_control.strVisibleFK_Idcuenta_compras);
			jQuery("#tblstrVisible"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",impuesto_control.strVisibleFK_Idcuenta_compras);
		}

		if(impuesto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",impuesto_control.strVisibleFK_Idcuenta_ventas);
			jQuery("#tblstrVisible"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",impuesto_control.strVisibleFK_Idcuenta_ventas);
		}

		if(impuesto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+impuesto_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",impuesto_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+impuesto_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",impuesto_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimpuesto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("impuesto",id,"facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		impuesto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("impuesto","empresa","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		impuesto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("impuesto","cuenta","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		impuesto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("impuesto","cuenta","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionlista_producto").click(function(){

			var idActual=jQuery(this).attr("idactualimpuesto");

			impuesto_webcontrol1.registrarSesionParalista_productoes(idActual);
		});
		jQuery("#imgdivrelacionproducto").click(function(){

			var idActual=jQuery(this).attr("idactualimpuesto");

			impuesto_webcontrol1.registrarSesionParaproductos(idActual);
		});
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualimpuesto");

			impuesto_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualimpuesto");

			impuesto_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuestoConstante,strParametros);
		
		//impuesto_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(impuesto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+impuesto_constante1.STR_SUFIJO+"-id_empresa",impuesto_control.empresasFK);

		if(impuesto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+impuesto_control.idFilaTablaActual+"_3",impuesto_control.empresasFK);
		}
	};

	cargarComboscuenta_ventassFK(impuesto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas",impuesto_control.cuenta_ventassFK);

		if(impuesto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+impuesto_control.idFilaTablaActual+"_8",impuesto_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",impuesto_control.cuenta_ventassFK);

	};

	cargarComboscuenta_comprassFK(impuesto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras",impuesto_control.cuenta_comprassFK);

		if(impuesto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+impuesto_control.idFilaTablaActual+"_9",impuesto_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",impuesto_control.cuenta_comprassFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(impuesto_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(impuesto_control) {

	};

	registrarComboActionChangeComboscuenta_comprassFK(impuesto_control) {

	};

	
	
	setDefectoValorCombosempresasFK(impuesto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(impuesto_control.idempresaDefaultFK>-1 && jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_empresa").val() != impuesto_control.idempresaDefaultFK) {
				jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_empresa").val(impuesto_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(impuesto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(impuesto_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != impuesto_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(impuesto_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(impuesto_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprassFK(impuesto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(impuesto_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != impuesto_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val(impuesto_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(impuesto_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//impuesto_control
		
	
	}
	
	onLoadCombosDefectoFK(impuesto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(impuesto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",impuesto_control.strRecargarFkTipos,",")) { 
				impuesto_webcontrol1.setDefectoValorCombosempresasFK(impuesto_control);
			}

			if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",impuesto_control.strRecargarFkTipos,",")) { 
				impuesto_webcontrol1.setDefectoValorComboscuenta_ventassFK(impuesto_control);
			}

			if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",impuesto_control.strRecargarFkTipos,",")) { 
				impuesto_webcontrol1.setDefectoValorComboscuenta_comprassFK(impuesto_control);
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
	onLoadCombosEventosFK(impuesto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(impuesto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",impuesto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				impuesto_webcontrol1.registrarComboActionChangeCombosempresasFK(impuesto_control);
			//}

			//if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",impuesto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				impuesto_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(impuesto_control);
			//}

			//if(impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",impuesto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				impuesto_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(impuesto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(impuesto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(impuesto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(impuesto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(impuesto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("impuesto","FK_Idcuenta_compras","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("impuesto","FK_Idcuenta_ventas","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("impuesto","FK_Idempresa","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
		
			
			if(impuesto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("impuesto");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("impuesto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(impuesto_funcion1,impuesto_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(impuesto_funcion1,impuesto_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(impuesto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,"impuesto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				impuesto_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				impuesto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				impuesto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("impuesto");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(impuesto_control) {
		
		jQuery("#divBusquedaimpuestoAjaxWebPart").css("display",impuesto_control.strPermisoBusqueda);
		jQuery("#trimpuestoCabeceraBusquedas").css("display",impuesto_control.strPermisoBusqueda);
		jQuery("#trBusquedaimpuesto").css("display",impuesto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimpuesto").css("display",impuesto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimpuesto").attr("style",impuesto_control.strPermisoMostrarTodos);		
		
		if(impuesto_control.strPermisoNuevo!=null) {
			jQuery("#tdimpuestoNuevo").css("display",impuesto_control.strPermisoNuevo);
			jQuery("#tdimpuestoNuevoToolBar").css("display",impuesto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimpuestoDuplicar").css("display",impuesto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimpuestoDuplicarToolBar").css("display",impuesto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimpuestoNuevoGuardarCambios").css("display",impuesto_control.strPermisoNuevo);
			jQuery("#tdimpuestoNuevoGuardarCambiosToolBar").css("display",impuesto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(impuesto_control.strPermisoActualizar!=null) {
			jQuery("#tdimpuestoCopiar").css("display",impuesto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimpuestoCopiarToolBar").css("display",impuesto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimpuestoConEditar").css("display",impuesto_control.strPermisoActualizar);
		}
		
		jQuery("#tdimpuestoGuardarCambios").css("display",impuesto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimpuestoGuardarCambiosToolBar").css("display",impuesto_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdimpuestoCerrarPagina").css("display",impuesto_control.strPermisoPopup);		
		jQuery("#tdimpuestoCerrarPaginaToolBar").css("display",impuesto_control.strPermisoPopup);
		//jQuery("#trimpuestoAccionesRelaciones").css("display",impuesto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=impuesto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + impuesto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + impuesto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Impuestos";
		sTituloBanner+=" - " + impuesto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + impuesto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimpuestoRelacionesToolBar").css("display",impuesto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimpuesto").css("display",impuesto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		impuesto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		impuesto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		impuesto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		impuesto_webcontrol1.registrarEventosControles();
		
		if(impuesto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(impuesto_constante1.STR_ES_RELACIONADO=="false") {
			impuesto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(impuesto_constante1.STR_ES_RELACIONES=="true") {
			if(impuesto_constante1.BIT_ES_PAGINA_FORM==true) {
				impuesto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(impuesto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(impuesto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				impuesto_webcontrol1.onLoad();
			
			//} else {
				//if(impuesto_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			impuesto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("impuesto","facturacion","",impuesto_funcion1,impuesto_webcontrol1,impuesto_constante1);	
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

var impuesto_webcontrol1 = new impuesto_webcontrol();

//Para ser llamado desde otro archivo (import)
export {impuesto_webcontrol,impuesto_webcontrol1};

//Para ser llamado desde window.opener
window.impuesto_webcontrol1 = impuesto_webcontrol1;


if(impuesto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = impuesto_webcontrol1.onLoadWindow; 
}

//</script>