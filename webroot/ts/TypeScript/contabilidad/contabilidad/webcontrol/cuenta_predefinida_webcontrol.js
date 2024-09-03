//<script type="text/javascript" language="javascript">



//var cuenta_predefinidaJQueryPaginaWebInteraccion= function (cuenta_predefinida_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cuenta_predefinida_constante,cuenta_predefinida_constante1} from '../util/cuenta_predefinida_constante.js';

import {cuenta_predefinida_funcion,cuenta_predefinida_funcion1} from '../util/cuenta_predefinida_funcion.js';


class cuenta_predefinida_webcontrol extends GeneralEntityWebControl {
	
	cuenta_predefinida_control=null;
	cuenta_predefinida_controlInicial=null;
	cuenta_predefinida_controlAuxiliar=null;
		
	//if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_predefinida_control) {
		super();
		
		this.cuenta_predefinida_control=cuenta_predefinida_control;
	}
		
	actualizarVariablesPagina(cuenta_predefinida_control) {
		
		if(cuenta_predefinida_control.action=="index" || cuenta_predefinida_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_predefinida_control);
			
		} 
		
		
		else if(cuenta_predefinida_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cuenta_predefinida_control);
			
		} else if(cuenta_predefinida_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cuenta_predefinida_control);
			
		} else if(cuenta_predefinida_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_predefinida_control);		
		
		} else if(cuenta_predefinida_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cuenta_predefinida_control);
		
		}  else if(cuenta_predefinida_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_predefinida_control);
		
		} else if(cuenta_predefinida_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_predefinida_control);		
		
		} else if(cuenta_predefinida_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cuenta_predefinida_control);		
		
		} else if(cuenta_predefinida_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(cuenta_predefinida_control);		
		
		} else if(cuenta_predefinida_control.action.includes("Busqueda") ||
				  cuenta_predefinida_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(cuenta_predefinida_control);
			
		} else if(cuenta_predefinida_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cuenta_predefinida_control)
		}
		
		
		
	
		else if(cuenta_predefinida_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_predefinida_control);	
		
		} else if(cuenta_predefinida_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_predefinida_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cuenta_predefinida_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cuenta_predefinida_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cuenta_predefinida_control) {
		this.actualizarPaginaAccionesGenerales(cuenta_predefinida_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cuenta_predefinida_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_predefinida_control);
		this.actualizarPaginaOrderBy(cuenta_predefinida_control);
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_predefinida_control);
		//this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_predefinida_control);
		this.actualizarPaginaAreaBusquedas(cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_predefinida_control) {
		//this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_predefinida_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_predefinida_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_predefinida_control);
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_predefinida_control);
		//this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_predefinida_control);
		this.actualizarPaginaAreaBusquedas(cuenta_predefinida_control);
		this.actualizarPaginaCargaCombosFK(cuenta_predefinida_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		//this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		//this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		//this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cuenta_predefinida_control) {
		//this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_predefinida_control) {
		this.actualizarPaginaAbrirLink(cuenta_predefinida_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);				
		//this.actualizarPaginaFormulario(cuenta_predefinida_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		//this.actualizarPaginaFormulario(cuenta_predefinida_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		//this.actualizarPaginaFormulario(cuenta_predefinida_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cuenta_predefinida_control) {
		//this.actualizarPaginaFormulario(cuenta_predefinida_control);
		this.onLoadCombosDefectoFK(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		//this.actualizarPaginaFormulario(cuenta_predefinida_control);
		this.onLoadCombosDefectoFK(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_predefinida_control) {
		this.actualizarPaginaAbrirLink(cuenta_predefinida_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_predefinida_control) {
		this.actualizarPaginaTablaDatos(cuenta_predefinida_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_predefinida_control) {
					//super.actualizarPaginaImprimir(cuenta_predefinida_control,"cuenta_predefinida");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_predefinida_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("cuenta_predefinida_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cuenta_predefinida_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_predefinida_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_predefinida_control) {
		//super.actualizarPaginaImprimir(cuenta_predefinida_control,"cuenta_predefinida");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("cuenta_predefinida_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(cuenta_predefinida_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_predefinida_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cuenta_predefinida_control) {
		//super.actualizarPaginaImprimir(cuenta_predefinida_control,"cuenta_predefinida");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("cuenta_predefinida_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cuenta_predefinida_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_predefinida_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_predefinida_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(cuenta_predefinida_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cuenta_predefinida_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(cuenta_predefinida_control);
			
		this.actualizarPaginaAbrirLink(cuenta_predefinida_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cuenta_predefinida_control) {
		
		if(cuenta_predefinida_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_predefinida_control);
		}
		
		if(cuenta_predefinida_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cuenta_predefinida_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cuenta_predefinida_control) {
		if(cuenta_predefinida_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cuenta_predefinidaReturnGeneral",JSON.stringify(cuenta_predefinida_control.cuenta_predefinidaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cuenta_predefinida_control) {
		if(cuenta_predefinida_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_predefinida_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_predefinida_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_predefinida_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cuenta_predefinida_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_predefinida_funcion1.resaltarRestaurarDivsPagina(false,"cuenta_predefinida");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_predefinida_funcion1.resaltarRestaurarDivMantenimiento(false,"cuenta_predefinida");
			}			
			
			cuenta_predefinida_funcion1.mostrarDivMensaje(true,cuenta_predefinida_control.strAuxiliarMensaje,cuenta_predefinida_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_predefinida_funcion1.mostrarDivMensaje(false,cuenta_predefinida_control.strAuxiliarMensaje,cuenta_predefinida_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_predefinida_control) {
		if(cuenta_predefinida_funcion1.esPaginaForm(cuenta_predefinida_constante1)==true) {
			window.opener.cuenta_predefinida_webcontrol1.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_predefinida_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_predefinida_control) {
		cuenta_predefinida_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_predefinida_control.strAuxiliarUrlPagina);
				
		cuenta_predefinida_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_predefinida_control.strAuxiliarTipo,cuenta_predefinida_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_predefinida_control) {
		cuenta_predefinida_funcion1.resaltarRestaurarDivMensaje(true,cuenta_predefinida_control.strAuxiliarMensajeAlert,cuenta_predefinida_control.strAuxiliarCssMensaje);
			
		if(cuenta_predefinida_funcion1.esPaginaForm(cuenta_predefinida_constante1)==true) {
			window.opener.cuenta_predefinida_funcion1.resaltarRestaurarDivMensaje(true,cuenta_predefinida_control.strAuxiliarMensajeAlert,cuenta_predefinida_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cuenta_predefinida_control) {
		this.cuenta_predefinida_controlInicial=cuenta_predefinida_control;
			
		if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_predefinida_control.strStyleDivArbol,cuenta_predefinida_control.strStyleDivContent
																,cuenta_predefinida_control.strStyleDivOpcionesBanner,cuenta_predefinida_control.strStyleDivExpandirColapsar
																,cuenta_predefinida_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=cuenta_predefinida_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cuenta_predefinida_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cuenta_predefinida_control) {
		this.actualizarCssBotonesPagina(cuenta_predefinida_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_predefinida_control.tiposReportes,cuenta_predefinida_control.tiposReporte
															 	,cuenta_predefinida_control.tiposPaginacion,cuenta_predefinida_control.tiposAcciones
																,cuenta_predefinida_control.tiposColumnasSelect,cuenta_predefinida_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_predefinida_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_predefinida_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_predefinida_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_predefinida_control) {
	
		var indexPosition=cuenta_predefinida_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_predefinida_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cuenta_predefinida_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.cargarCombosempresasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta_predefinida",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.cargarCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.cargarCombostipo_cuentasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.cargarCombostipo_nivel_cuentasFK(cuenta_predefinida_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_predefinida_control.strRecargarFkTiposNinguno!=null && cuenta_predefinida_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_predefinida_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_predefinida_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_predefinida_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_predefinida_webcontrol1.cargarCombosempresasFK(cuenta_predefinida_control);
				}

				if(cuenta_predefinida_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_cuenta_predefinida",cuenta_predefinida_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_predefinida_webcontrol1.cargarCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control);
				}

				if(cuenta_predefinida_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_predefinida_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_predefinida_webcontrol1.cargarCombostipo_cuentasFK(cuenta_predefinida_control);
				}

				if(cuenta_predefinida_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_predefinida_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_predefinida_webcontrol1.cargarCombostipo_nivel_cuentasFK(cuenta_predefinida_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_predefinida_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_predefinida_funcion1,cuenta_predefinida_control.empresasFK);
	}

	cargarComboEditarTablatipo_cuenta_predefinidaFK(cuenta_predefinida_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_predefinida_funcion1,cuenta_predefinida_control.tipo_cuenta_predefinidasFK);
	}

	cargarComboEditarTablatipo_cuentaFK(cuenta_predefinida_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_predefinida_funcion1,cuenta_predefinida_control.tipo_cuentasFK);
	}

	cargarComboEditarTablatipo_nivel_cuentaFK(cuenta_predefinida_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_predefinida_funcion1,cuenta_predefinida_control.tipo_nivel_cuentasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(cuenta_predefinida_control) {
		jQuery("#divBusquedacuenta_predefinidaAjaxWebPart").css("display",cuenta_predefinida_control.strPermisoBusqueda);
		jQuery("#trcuenta_predefinidaCabeceraBusquedas").css("display",cuenta_predefinida_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_predefinida").css("display",cuenta_predefinida_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cuenta_predefinida_control.htmlTablaOrderBy!=null
			&& cuenta_predefinida_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycuenta_predefinidaAjaxWebPart").html(cuenta_predefinida_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cuenta_predefinida_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cuenta_predefinida_control.htmlTablaOrderByRel!=null
			&& cuenta_predefinida_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcuenta_predefinidaAjaxWebPart").html(cuenta_predefinida_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacuenta_predefinidaAjaxWebPart").css("display","none");
			jQuery("#trcuenta_predefinidaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacuenta_predefinida").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(cuenta_predefinida_control) {
		
		if(!cuenta_predefinida_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(cuenta_predefinida_control);
		} else {
			jQuery("#divTablaDatoscuenta_predefinidasAjaxWebPart").html(cuenta_predefinida_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscuenta_predefinidas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscuenta_predefinidas=jQuery("#tblTablaDatoscuenta_predefinidas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cuenta_predefinida",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cuenta_predefinida_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cuenta_predefinida_webcontrol1.registrarControlesTableEdition(cuenta_predefinida_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cuenta_predefinida_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(cuenta_predefinida_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("cuenta_predefinida_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cuenta_predefinida_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscuenta_predefinidasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(cuenta_predefinida_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(cuenta_predefinida_control);
		
		const divOrderBy = document.getElementById("divOrderBycuenta_predefinidaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(cuenta_predefinida_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcuenta_predefinidaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(cuenta_predefinida_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cuenta_predefinida_control);			
		}
	}
	
	actualizarCamposFilaTabla(cuenta_predefinida_control) {
		var i=0;
		
		i=cuenta_predefinida_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cuenta_predefinida_control.cuenta_predefinidaActual.id);
		jQuery("#t-version_row_"+i+"").val(cuenta_predefinida_control.cuenta_predefinidaActual.versionRow);
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida) {
				jQuery("#t-cel_"+i+"_3").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta_predefinida).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta) {
				jQuery("#t-cel_"+i+"_4").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta!=null && cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta) {
				jQuery("#t-cel_"+i+"_5").val(cuenta_predefinida_control.cuenta_predefinidaActual.id_tipo_nivel_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(cuenta_predefinida_control.cuenta_predefinidaActual.codigo_tabla);
		jQuery("#t-cel_"+i+"_7").val(cuenta_predefinida_control.cuenta_predefinidaActual.codigo_cuenta);
		jQuery("#t-cel_"+i+"_8").val(cuenta_predefinida_control.cuenta_predefinidaActual.nombre_cuenta);
		jQuery("#t-cel_"+i+"_9").val(cuenta_predefinida_control.cuenta_predefinidaActual.monto_minimo);
		jQuery("#t-cel_"+i+"_10").val(cuenta_predefinida_control.cuenta_predefinidaActual.valor_retencion);
		jQuery("#t-cel_"+i+"_11").val(cuenta_predefinida_control.cuenta_predefinidaActual.balance);
		jQuery("#t-cel_"+i+"_12").val(cuenta_predefinida_control.cuenta_predefinidaActual.porcentaje_base);
		jQuery("#t-cel_"+i+"_13").val(cuenta_predefinida_control.cuenta_predefinidaActual.seleccionar);
		jQuery("#t-cel_"+i+"_14").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.centro_costos);
		jQuery("#t-cel_"+i+"_15").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.retencion);
		jQuery("#t-cel_"+i+"_16").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.usa_base);
		jQuery("#t-cel_"+i+"_17").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.nit);
		jQuery("#t-cel_"+i+"_18").prop('checked',cuenta_predefinida_control.cuenta_predefinidaActual.modifica);
		jQuery("#t-cel_"+i+"_19").val(cuenta_predefinida_control.cuenta_predefinidaActual.ultima_transaccion);
		jQuery("#t-cel_"+i+"_20").val(cuenta_predefinida_control.cuenta_predefinidaActual.comenta1);
		jQuery("#t-cel_"+i+"_21").val(cuenta_predefinida_control.cuenta_predefinidaActual.comenta2);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cuenta_predefinida_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(cuenta_predefinida_control) {
		cuenta_predefinida_funcion1.registrarControlesTableValidacionEdition(cuenta_predefinida_control,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(cuenta_predefinida_control) {
		jQuery("#divResumencuenta_predefinidaActualAjaxWebPart").html(cuenta_predefinida_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_predefinida_control) {
		//jQuery("#divAccionesRelacionescuenta_predefinidaAjaxWebPart").html(cuenta_predefinida_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("cuenta_predefinida_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cuenta_predefinida_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescuenta_predefinidaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		cuenta_predefinida_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cuenta_predefinida_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cuenta_predefinida_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cuenta_predefinida_control) {
		
		if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_predefinida_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_predefinida_control.strVisibleFK_Idempresa);
		}

		if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta").attr("style",cuenta_predefinida_control.strVisibleFK_Idtipo_cuenta);
			jQuery("#tblstrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta").attr("style",cuenta_predefinida_control.strVisibleFK_Idtipo_cuenta);
		}

		if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida").attr("style",cuenta_predefinida_control.strVisibleFK_Idtipo_cuenta_predefinida);
			jQuery("#tblstrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida").attr("style",cuenta_predefinida_control.strVisibleFK_Idtipo_cuenta_predefinida);
		}

		if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta").attr("style",cuenta_predefinida_control.strVisibleFK_Idtipo_nivel_cuenta);
			jQuery("#tblstrVisible"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta").attr("style",cuenta_predefinida_control.strVisibleFK_Idtipo_nivel_cuenta);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncuenta_predefinida();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cuenta_predefinida",id,"contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cuenta_predefinida_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_predefinida","empresa","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
	}

	abrirBusquedaParatipo_cuenta_predefinida(strNombreCampoBusqueda){//idActual
		cuenta_predefinida_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_predefinida","tipo_cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
	}

	abrirBusquedaParatipo_cuenta(strNombreCampoBusqueda){//idActual
		cuenta_predefinida_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_predefinida","tipo_cuenta","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
	}

	abrirBusquedaParatipo_nivel_cuenta(strNombreCampoBusqueda){//idActual
		cuenta_predefinida_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_predefinida","tipo_nivel_cuenta","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinidaConstante,strParametros);
		
		//cuenta_predefinida_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cuenta_predefinida_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa",cuenta_predefinida_control.empresasFK);

		if(cuenta_predefinida_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_predefinida_control.idFilaTablaActual+"_2",cuenta_predefinida_control.empresasFK);
		}
	};

	cargarCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida",cuenta_predefinida_control.tipo_cuenta_predefinidasFK);

		if(cuenta_predefinida_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_predefinida_control.idFilaTablaActual+"_3",cuenta_predefinida_control.tipo_cuenta_predefinidasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida-cmbid_tipo_cuenta_predefinida",cuenta_predefinida_control.tipo_cuenta_predefinidasFK);

	};

	cargarCombostipo_cuentasFK(cuenta_predefinida_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta",cuenta_predefinida_control.tipo_cuentasFK);

		if(cuenta_predefinida_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_predefinida_control.idFilaTablaActual+"_4",cuenta_predefinida_control.tipo_cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta",cuenta_predefinida_control.tipo_cuentasFK);

	};

	cargarCombostipo_nivel_cuentasFK(cuenta_predefinida_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta",cuenta_predefinida_control.tipo_nivel_cuentasFK);

		if(cuenta_predefinida_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_predefinida_control.idFilaTablaActual+"_5",cuenta_predefinida_control.tipo_nivel_cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta",cuenta_predefinida_control.tipo_nivel_cuentasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_predefinida_control) {

	};

	registrarComboActionChangeCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control) {

	};

	registrarComboActionChangeCombostipo_cuentasFK(cuenta_predefinida_control) {

	};

	registrarComboActionChangeCombostipo_nivel_cuentasFK(cuenta_predefinida_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_predefinida_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_predefinida_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_predefinida_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_predefinida_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_predefinida_control.idtipo_cuenta_predefinidaDefaultFK>-1 && jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").val() != cuenta_predefinida_control.idtipo_cuenta_predefinidaDefaultFK) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida").val(cuenta_predefinida_control.idtipo_cuenta_predefinidaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida-cmbid_tipo_cuenta_predefinida").val(cuenta_predefinida_control.idtipo_cuenta_predefinidaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida-cmbid_tipo_cuenta_predefinida").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta_predefinida-cmbid_tipo_cuenta_predefinida").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_cuentasFK(cuenta_predefinida_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_predefinida_control.idtipo_cuentaDefaultFK>-1 && jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").val() != cuenta_predefinida_control.idtipo_cuentaDefaultFK) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta").val(cuenta_predefinida_control.idtipo_cuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val(cuenta_predefinida_control.idtipo_cuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_cuenta-cmbid_tipo_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostipo_nivel_cuentasFK(cuenta_predefinida_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_predefinida_control.idtipo_nivel_cuentaDefaultFK>-1 && jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val() != cuenta_predefinida_control.idtipo_nivel_cuentaDefaultFK) {
				jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta").val(cuenta_predefinida_control.idtipo_nivel_cuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val(cuenta_predefinida_control.idtipo_nivel_cuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_predefinida_constante1.STR_SUFIJO+"FK_Idtipo_nivel_cuenta-cmbid_tipo_nivel_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_predefinida_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.setDefectoValorCombosempresasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta_predefinida",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.setDefectoValorCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.setDefectoValorCombostipo_cuentasFK(cuenta_predefinida_control);
			}

			if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 
				cuenta_predefinida_webcontrol1.setDefectoValorCombostipo_nivel_cuentasFK(cuenta_predefinida_control);
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
	onLoadCombosEventosFK(cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_predefinida_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_predefinida_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_predefinida_control);
			//}

			//if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta_predefinida",cuenta_predefinida_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_predefinida_webcontrol1.registrarComboActionChangeCombostipo_cuenta_predefinidasFK(cuenta_predefinida_control);
			//}

			//if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_predefinida_webcontrol1.registrarComboActionChangeCombostipo_cuentasFK(cuenta_predefinida_control);
			//}

			//if(cuenta_predefinida_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tipo_nivel_cuenta",cuenta_predefinida_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_predefinida_webcontrol1.registrarComboActionChangeCombostipo_nivel_cuentasFK(cuenta_predefinida_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_predefinida_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_predefinida_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cuenta_predefinida_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_predefinida","FK_Idempresa","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_predefinida","FK_Idtipo_cuenta","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_predefinida","FK_Idtipo_cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_predefinida","FK_Idtipo_nivel_cuenta","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
		
			
			if(cuenta_predefinida_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_predefinida");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_predefinida");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,"cuenta_predefinida");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_predefinida_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_cuenta_predefinida","id_tipo_cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_predefinida_img_busqueda").click(function(){
				cuenta_predefinida_webcontrol1.abrirBusquedaParatipo_cuenta_predefinida("id_tipo_cuenta_predefinida");
				//alert(jQuery('#form-id_tipo_cuenta_predefinida_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_cuenta","id_tipo_cuenta","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_cuenta_img_busqueda").click(function(){
				cuenta_predefinida_webcontrol1.abrirBusquedaParatipo_cuenta("id_tipo_cuenta");
				//alert(jQuery('#form-id_tipo_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tipo_nivel_cuenta","id_tipo_nivel_cuenta","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_predefinida_constante1.STR_SUFIJO+"-id_tipo_nivel_cuenta_img_busqueda").click(function(){
				cuenta_predefinida_webcontrol1.abrirBusquedaParatipo_nivel_cuenta("id_tipo_nivel_cuenta");
				//alert(jQuery('#form-id_tipo_nivel_cuenta_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_predefinida_control) {
		
		jQuery("#divBusquedacuenta_predefinidaAjaxWebPart").css("display",cuenta_predefinida_control.strPermisoBusqueda);
		jQuery("#trcuenta_predefinidaCabeceraBusquedas").css("display",cuenta_predefinida_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_predefinida").css("display",cuenta_predefinida_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecuenta_predefinida").css("display",cuenta_predefinida_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscuenta_predefinida").attr("style",cuenta_predefinida_control.strPermisoMostrarTodos);		
		
		if(cuenta_predefinida_control.strPermisoNuevo!=null) {
			jQuery("#tdcuenta_predefinidaNuevo").css("display",cuenta_predefinida_control.strPermisoNuevo);
			jQuery("#tdcuenta_predefinidaNuevoToolBar").css("display",cuenta_predefinida_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcuenta_predefinidaDuplicar").css("display",cuenta_predefinida_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_predefinidaDuplicarToolBar").css("display",cuenta_predefinida_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_predefinidaNuevoGuardarCambios").css("display",cuenta_predefinida_control.strPermisoNuevo);
			jQuery("#tdcuenta_predefinidaNuevoGuardarCambiosToolBar").css("display",cuenta_predefinida_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cuenta_predefinida_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_predefinidaCopiar").css("display",cuenta_predefinida_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_predefinidaCopiarToolBar").css("display",cuenta_predefinida_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_predefinidaConEditar").css("display",cuenta_predefinida_control.strPermisoActualizar);
		}
		
		jQuery("#tdcuenta_predefinidaGuardarCambios").css("display",cuenta_predefinida_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcuenta_predefinidaGuardarCambiosToolBar").css("display",cuenta_predefinida_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcuenta_predefinidaCerrarPagina").css("display",cuenta_predefinida_control.strPermisoPopup);		
		jQuery("#tdcuenta_predefinidaCerrarPaginaToolBar").css("display",cuenta_predefinida_control.strPermisoPopup);
		//jQuery("#trcuenta_predefinidaAccionesRelaciones").css("display",cuenta_predefinida_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cuenta_predefinida_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_predefinida_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cuenta_predefinida_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cuentas Predefinidases";
		sTituloBanner+=" - " + cuenta_predefinida_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_predefinida_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcuenta_predefinidaRelacionesToolBar").css("display",cuenta_predefinida_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscuenta_predefinida").css("display",cuenta_predefinida_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cuenta_predefinida_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cuenta_predefinida_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_predefinida_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_predefinida_webcontrol1.registrarEventosControles();
		
		if(cuenta_predefinida_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_predefinida_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_predefinida_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_predefinida_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_predefinida_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_predefinida_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cuenta_predefinida_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cuenta_predefinida_webcontrol1.onLoad();
			
			//} else {
				//if(cuenta_predefinida_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			cuenta_predefinida_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_predefinida","contabilidad","",cuenta_predefinida_funcion1,cuenta_predefinida_webcontrol1,cuenta_predefinida_constante1);	
	}
}

var cuenta_predefinida_webcontrol1 = new cuenta_predefinida_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cuenta_predefinida_webcontrol,cuenta_predefinida_webcontrol1};

//Para ser llamado desde window.opener
window.cuenta_predefinida_webcontrol1 = cuenta_predefinida_webcontrol1;


if(cuenta_predefinida_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_predefinida_webcontrol1.onLoadWindow; 
}

//</script>