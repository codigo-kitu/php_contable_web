//<script type="text/javascript" language="javascript">



//var cuenta_corrienteJQueryPaginaWebInteraccion= function (cuenta_corriente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cuenta_corriente_constante,cuenta_corriente_constante1} from '../util/cuenta_corriente_constante.js';

import {cuenta_corriente_funcion,cuenta_corriente_funcion1} from '../util/cuenta_corriente_funcion.js';


class cuenta_corriente_webcontrol extends GeneralEntityWebControl {
	
	cuenta_corriente_control=null;
	cuenta_corriente_controlInicial=null;
	cuenta_corriente_controlAuxiliar=null;
		
	//if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_corriente_control) {
		super();
		
		this.cuenta_corriente_control=cuenta_corriente_control;
	}
		
	actualizarVariablesPagina(cuenta_corriente_control) {
		
		if(cuenta_corriente_control.action=="index" || cuenta_corriente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_corriente_control);
			
		} 
		
		
		else if(cuenta_corriente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cuenta_corriente_control);
			
		} else if(cuenta_corriente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cuenta_corriente_control);
			
		} else if(cuenta_corriente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_corriente_control);		
		
		} else if(cuenta_corriente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cuenta_corriente_control);
		
		}  else if(cuenta_corriente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_corriente_control);
		
		} else if(cuenta_corriente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_corriente_control);		
		
		} else if(cuenta_corriente_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cuenta_corriente_control);		
		
		} else if(cuenta_corriente_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(cuenta_corriente_control);		
		
		} else if(cuenta_corriente_control.action.includes("Busqueda") ||
				  cuenta_corriente_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(cuenta_corriente_control);
			
		} else if(cuenta_corriente_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cuenta_corriente_control)
		}
		
		
		
	
		else if(cuenta_corriente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_corriente_control);	
		
		} else if(cuenta_corriente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_corriente_control);		
		}
	
		else if(cuenta_corriente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_corriente_control);		
		}
	
		else if(cuenta_corriente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_corriente_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cuenta_corriente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cuenta_corriente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cuenta_corriente_control) {
		this.actualizarPaginaAccionesGenerales(cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cuenta_corriente_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_corriente_control);
		this.actualizarPaginaOrderBy(cuenta_corriente_control);
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_corriente_control);
		//this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_corriente_control);
		this.actualizarPaginaAreaBusquedas(cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_corriente_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_corriente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_corriente_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_corriente_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_corriente_control);
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_corriente_control);
		//this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_corriente_control);
		this.actualizarPaginaAreaBusquedas(cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		//this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		//this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		//this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_corriente_control) {
		this.actualizarPaginaAbrirLink(cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);				
		//this.actualizarPaginaFormulario(cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		//this.actualizarPaginaFormulario(cuenta_corriente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		//this.actualizarPaginaFormulario(cuenta_corriente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(cuenta_corriente_control);
		this.onLoadCombosDefectoFK(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		//this.actualizarPaginaFormulario(cuenta_corriente_control);
		this.onLoadCombosDefectoFK(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_corriente_control) {
		this.actualizarPaginaAbrirLink(cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_corriente_control) {
					//super.actualizarPaginaImprimir(cuenta_corriente_control,"cuenta_corriente");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_corriente_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("cuenta_corriente_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cuenta_corriente_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_corriente_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_corriente_control) {
		//super.actualizarPaginaImprimir(cuenta_corriente_control,"cuenta_corriente");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("cuenta_corriente_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(cuenta_corriente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_corriente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cuenta_corriente_control) {
		//super.actualizarPaginaImprimir(cuenta_corriente_control,"cuenta_corriente");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("cuenta_corriente_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cuenta_corriente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_corriente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_corriente_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(cuenta_corriente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cuenta_corriente_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(cuenta_corriente_control);
			
		this.actualizarPaginaAbrirLink(cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		this.actualizarPaginaFormulario(cuenta_corriente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cuenta_corriente_control) {
		
		if(cuenta_corriente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_corriente_control);
		}
		
		if(cuenta_corriente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cuenta_corriente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cuenta_corriente_control) {
		if(cuenta_corriente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cuenta_corrienteReturnGeneral",JSON.stringify(cuenta_corriente_control.cuenta_corrienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_control) {
		if(cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_corriente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_corriente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_corriente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cuenta_corriente_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_corriente_funcion1.resaltarRestaurarDivsPagina(false,"cuenta_corriente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_corriente_funcion1.resaltarRestaurarDivMantenimiento(false,"cuenta_corriente");
			}			
			
			cuenta_corriente_funcion1.mostrarDivMensaje(true,cuenta_corriente_control.strAuxiliarMensaje,cuenta_corriente_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_corriente_funcion1.mostrarDivMensaje(false,cuenta_corriente_control.strAuxiliarMensaje,cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_corriente_control) {
		if(cuenta_corriente_funcion1.esPaginaForm(cuenta_corriente_constante1)==true) {
			window.opener.cuenta_corriente_webcontrol1.actualizarPaginaTablaDatos(cuenta_corriente_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_corriente_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_corriente_control) {
		cuenta_corriente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_corriente_control.strAuxiliarUrlPagina);
				
		cuenta_corriente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_corriente_control.strAuxiliarTipo,cuenta_corriente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_corriente_control) {
		cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,cuenta_corriente_control.strAuxiliarMensajeAlert,cuenta_corriente_control.strAuxiliarCssMensaje);
			
		if(cuenta_corriente_funcion1.esPaginaForm(cuenta_corriente_constante1)==true) {
			window.opener.cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,cuenta_corriente_control.strAuxiliarMensajeAlert,cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cuenta_corriente_control) {
		this.cuenta_corriente_controlInicial=cuenta_corriente_control;
			
		if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_corriente_control.strStyleDivArbol,cuenta_corriente_control.strStyleDivContent
																,cuenta_corriente_control.strStyleDivOpcionesBanner,cuenta_corriente_control.strStyleDivExpandirColapsar
																,cuenta_corriente_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=cuenta_corriente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cuenta_corriente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cuenta_corriente_control) {
		this.actualizarCssBotonesPagina(cuenta_corriente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_corriente_control.tiposReportes,cuenta_corriente_control.tiposReporte
															 	,cuenta_corriente_control.tiposPaginacion,cuenta_corriente_control.tiposAcciones
																,cuenta_corriente_control.tiposColumnasSelect,cuenta_corriente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cuenta_corriente_control.tiposRelaciones,cuenta_corriente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_corriente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_corriente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_corriente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_corriente_control) {
	
		var indexPosition=cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cuenta_corriente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarCombosempresasFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarCombosusuariosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_banco",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarCombosbancosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarComboscuentasFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_corrientes",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.cargarCombosestado_cuentas_corrientessFK(cuenta_corriente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_corriente_control.strRecargarFkTiposNinguno!=null && cuenta_corriente_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_corriente_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarCombosempresasFK(cuenta_corriente_control);
				}

				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarCombosusuariosFK(cuenta_corriente_control);
				}

				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_banco",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarCombosbancosFK(cuenta_corriente_control);
				}

				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarComboscuentasFK(cuenta_corriente_control);
				}

				if(cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado_cuentas_corrientes",cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_webcontrol1.cargarCombosestado_cuentas_corrientessFK(cuenta_corriente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.empresasFK);
	}

	cargarComboEditarTablausuarioFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.usuariosFK);
	}

	cargarComboEditarTablabancoFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.bancosFK);
	}

	cargarComboEditarTablacuentaFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.cuentasFK);
	}

	cargarComboEditarTablaestado_cuentas_corrientesFK(cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_funcion1,cuenta_corriente_control.estado_cuentas_corrientessFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(cuenta_corriente_control) {
		jQuery("#divBusquedacuenta_corrienteAjaxWebPart").css("display",cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trcuenta_corrienteCabeceraBusquedas").css("display",cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_corriente").css("display",cuenta_corriente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cuenta_corriente_control.htmlTablaOrderBy!=null
			&& cuenta_corriente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycuenta_corrienteAjaxWebPart").html(cuenta_corriente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cuenta_corriente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cuenta_corriente_control.htmlTablaOrderByRel!=null
			&& cuenta_corriente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcuenta_corrienteAjaxWebPart").html(cuenta_corriente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacuenta_corrienteAjaxWebPart").css("display","none");
			jQuery("#trcuenta_corrienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacuenta_corriente").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(cuenta_corriente_control) {
		
		if(!cuenta_corriente_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(cuenta_corriente_control);
		} else {
			jQuery("#divTablaDatoscuenta_corrientesAjaxWebPart").html(cuenta_corriente_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscuenta_corrientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscuenta_corrientes=jQuery("#tblTablaDatoscuenta_corrientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cuenta_corriente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cuenta_corriente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cuenta_corriente_webcontrol1.registrarControlesTableEdition(cuenta_corriente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cuenta_corriente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(cuenta_corriente_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("cuenta_corriente_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cuenta_corriente_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscuenta_corrientesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(cuenta_corriente_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(cuenta_corriente_control);
		
		const divOrderBy = document.getElementById("divOrderBycuenta_corrienteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(cuenta_corriente_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcuenta_corrienteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(cuenta_corriente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cuenta_corriente_control.cuenta_corrienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cuenta_corriente_control);			
		}
	}
	
	actualizarCamposFilaTabla(cuenta_corriente_control) {
		var i=0;
		
		i=cuenta_corriente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cuenta_corriente_control.cuenta_corrienteActual.id);
		jQuery("#t-version_row_"+i+"").val(cuenta_corriente_control.cuenta_corrienteActual.versionRow);
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_empresa!=null && cuenta_corriente_control.cuenta_corrienteActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cuenta_corriente_control.cuenta_corrienteActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(cuenta_corriente_control.cuenta_corrienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_usuario!=null && cuenta_corriente_control.cuenta_corrienteActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cuenta_corriente_control.cuenta_corrienteActual.id_usuario) {
				jQuery("#t-cel_"+i+"_3").val(cuenta_corriente_control.cuenta_corrienteActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_banco!=null && cuenta_corriente_control.cuenta_corrienteActual.id_banco>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cuenta_corriente_control.cuenta_corrienteActual.id_banco) {
				jQuery("#t-cel_"+i+"_4").val(cuenta_corriente_control.cuenta_corrienteActual.id_banco).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(cuenta_corriente_control.cuenta_corrienteActual.numero_cuenta);
		jQuery("#t-cel_"+i+"_6").val(cuenta_corriente_control.cuenta_corrienteActual.balance_inicial);
		jQuery("#t-cel_"+i+"_7").val(cuenta_corriente_control.cuenta_corrienteActual.saldo);
		jQuery("#t-cel_"+i+"_8").val(cuenta_corriente_control.cuenta_corrienteActual.contador_cheque);
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_cuenta!=null && cuenta_corriente_control.cuenta_corrienteActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != cuenta_corriente_control.cuenta_corrienteActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_9").val(cuenta_corriente_control.cuenta_corrienteActual.id_cuenta).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_9").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(cuenta_corriente_control.cuenta_corrienteActual.descripcion);
		jQuery("#t-cel_"+i+"_11").val(cuenta_corriente_control.cuenta_corrienteActual.icono);
		
		if(cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes!=null && cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes) {
				jQuery("#t-cel_"+i+"_12").val(cuenta_corriente_control.cuenta_corrienteActual.id_estado_cuentas_corrientes).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cuenta_corriente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondeposito_cuenta_corriente").click(function(){
		jQuery("#tblTablaDatoscuenta_corrientes").on("click",".imgrelaciondeposito_cuenta_corriente", function () {

			var idActual=jQuery(this).attr("idactualcuenta_corriente");

			cuenta_corriente_webcontrol1.registrarSesionParadeposito_cuenta_corrientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncheque_cuenta_corriente").click(function(){
		jQuery("#tblTablaDatoscuenta_corrientes").on("click",".imgrelacioncheque_cuenta_corriente", function () {

			var idActual=jQuery(this).attr("idactualcuenta_corriente");

			cuenta_corriente_webcontrol1.registrarSesionParacheque_cuenta_corrientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionretiro_cuenta_corriente").click(function(){
		jQuery("#tblTablaDatoscuenta_corrientes").on("click",".imgrelacionretiro_cuenta_corriente", function () {

			var idActual=jQuery(this).attr("idactualcuenta_corriente");

			cuenta_corriente_webcontrol1.registrarSesionPararetiro_cuenta_corrientes(idActual);
		});				
	}
		
	

	registrarSesionParadeposito_cuenta_corrientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_corriente","deposito_cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1,"s","");
	}

	registrarSesionParacheque_cuenta_corrientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_corriente","cheque_cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1,"s","");
	}

	registrarSesionPararetiro_cuenta_corrientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_corriente","retiro_cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1,"s","");
	}
	
	registrarControlesTableEdition(cuenta_corriente_control) {
		cuenta_corriente_funcion1.registrarControlesTableValidacionEdition(cuenta_corriente_control,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(cuenta_corriente_control) {
		jQuery("#divResumencuenta_corrienteActualAjaxWebPart").html(cuenta_corriente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_corriente_control) {
		//jQuery("#divAccionesRelacionescuenta_corrienteAjaxWebPart").html(cuenta_corriente_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("cuenta_corriente_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cuenta_corriente_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescuenta_corrienteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		cuenta_corriente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cuenta_corriente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cuenta_corriente_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cuenta_corriente_control) {
		
		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco").attr("style",cuenta_corriente_control.strVisibleFK_Idbanco);
			jQuery("#tblstrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco").attr("style",cuenta_corriente_control.strVisibleFK_Idbanco);
		}

		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",cuenta_corriente_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",cuenta_corriente_control.strVisibleFK_Idcuenta);
		}

		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_corriente_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_corriente_control.strVisibleFK_Idempresa);
		}

		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes").attr("style",cuenta_corriente_control.strVisibleFK_Idestado_cuentas_corrientes);
			jQuery("#tblstrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes").attr("style",cuenta_corriente_control.strVisibleFK_Idestado_cuentas_corrientes);
		}

		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cuenta_corriente_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cuenta_corriente_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncuenta_corriente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cuenta_corriente",id,"cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente","empresa","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente","usuario","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}

	abrirBusquedaParabanco(strNombreCampoBusqueda){//idActual
		cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente","banco","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente","cuenta","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}

	abrirBusquedaParaestado_cuentas_corrientes(strNombreCampoBusqueda){//idActual
		cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente","estado_cuentas_corrientes","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelaciondeposito_cuenta_corriente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_corriente");

			cuenta_corriente_webcontrol1.registrarSesionParadeposito_cuenta_corrientes(idActual);
		});
		jQuery("#imgdivrelacioncheque_cuenta_corriente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_corriente");

			cuenta_corriente_webcontrol1.registrarSesionParacheque_cuenta_corrientes(idActual);
		});
		jQuery("#imgdivrelacionretiro_cuenta_corriente").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_corriente");

			cuenta_corriente_webcontrol1.registrarSesionPararetiro_cuenta_corrientes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corrienteConstante,strParametros);
		
		//cuenta_corriente_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa",cuenta_corriente_control.empresasFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_2",cuenta_corriente_control.empresasFK);
		}
	};

	cargarCombosusuariosFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario",cuenta_corriente_control.usuariosFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_3",cuenta_corriente_control.usuariosFK);
		}
	};

	cargarCombosbancosFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco",cuenta_corriente_control.bancosFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_4",cuenta_corriente_control.bancosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco",cuenta_corriente_control.bancosFK);

	};

	cargarComboscuentasFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta",cuenta_corriente_control.cuentasFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_9",cuenta_corriente_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",cuenta_corriente_control.cuentasFK);

	};

	cargarCombosestado_cuentas_corrientessFK(cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes",cuenta_corriente_control.estado_cuentas_corrientessFK);

		if(cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_control.idFilaTablaActual+"_12",cuenta_corriente_control.estado_cuentas_corrientessFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes-cmbid_estado_cuentas_corrientes",cuenta_corriente_control.estado_cuentas_corrientessFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosbancosFK(cuenta_corriente_control) {

	};

	registrarComboActionChangeComboscuentasFK(cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosestado_cuentas_corrientessFK(cuenta_corriente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_corriente_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_corriente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idusuarioDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_corriente_control.idusuarioDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_corriente_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosbancosFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idbancoDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").val() != cuenta_corriente_control.idbancoDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco").val(cuenta_corriente_control.idbancoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco").val(cuenta_corriente_control.idbancoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idbanco-cmbid_banco").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idcuentaDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta").val() != cuenta_corriente_control.idcuentaDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta").val(cuenta_corriente_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(cuenta_corriente_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestado_cuentas_corrientessFK(cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_control.idestado_cuentas_corrientesDefaultFK>-1 && jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").val() != cuenta_corriente_control.idestado_cuentas_corrientesDefaultFK) {
				jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes").val(cuenta_corriente_control.idestado_cuentas_corrientesDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes-cmbid_estado_cuentas_corrientes").val(cuenta_corriente_control.idestado_cuentas_corrientesDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes-cmbid_estado_cuentas_corrientes").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_cuentas_corrientes-cmbid_estado_cuentas_corrientes").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	



		jQuery("#form-id_estado_cuentas_corrientes").prop("disabled", habilitarDeshabilitar);

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_corriente_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorCombosempresasFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorCombosusuariosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_banco",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorCombosbancosFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorComboscuentasFK(cuenta_corriente_control);
			}

			if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_corrientes",cuenta_corriente_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_webcontrol1.setDefectoValorCombosestado_cuentas_corrientessFK(cuenta_corriente_control);
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
	onLoadCombosEventosFK(cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_corriente_control);
			//}

			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeCombosusuariosFK(cuenta_corriente_control);
			//}

			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_banco",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeCombosbancosFK(cuenta_corriente_control);
			//}

			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeComboscuentasFK(cuenta_corriente_control);
			//}

			//if(cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_cuentas_corrientes",cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_webcontrol1.registrarComboActionChangeCombosestado_cuentas_corrientessFK(cuenta_corriente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cuenta_corriente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente","FK_Idbanco","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente","FK_Idcuenta","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente","FK_Idempresa","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente","FK_Idestado_cuentas_corrientes","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente","FK_Idusuario","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
		
			
			if(cuenta_corriente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_corriente");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_corriente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,"cuenta_corriente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("banco","id_banco","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_banco_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParabanco("id_banco");
				//alert(jQuery('#form-id_banco_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado_cuentas_corrientes","id_estado_cuentas_corrientes","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_cuentas_corrientes_img_busqueda").click(function(){
				cuenta_corriente_webcontrol1.abrirBusquedaParaestado_cuentas_corrientes("id_estado_cuentas_corrientes");
				//alert(jQuery('#form-id_estado_cuentas_corrientes_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cuenta_corriente");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_corriente_control) {
		
		jQuery("#divBusquedacuenta_corrienteAjaxWebPart").css("display",cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trcuenta_corrienteCabeceraBusquedas").css("display",cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_corriente").css("display",cuenta_corriente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecuenta_corriente").css("display",cuenta_corriente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscuenta_corriente").attr("style",cuenta_corriente_control.strPermisoMostrarTodos);		
		
		if(cuenta_corriente_control.strPermisoNuevo!=null) {
			jQuery("#tdcuenta_corrienteNuevo").css("display",cuenta_corriente_control.strPermisoNuevo);
			jQuery("#tdcuenta_corrienteNuevoToolBar").css("display",cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcuenta_corrienteDuplicar").css("display",cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_corrienteDuplicarToolBar").css("display",cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_corrienteNuevoGuardarCambios").css("display",cuenta_corriente_control.strPermisoNuevo);
			jQuery("#tdcuenta_corrienteNuevoGuardarCambiosToolBar").css("display",cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cuenta_corriente_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_corrienteCopiar").css("display",cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_corrienteCopiarToolBar").css("display",cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_corrienteConEditar").css("display",cuenta_corriente_control.strPermisoActualizar);
		}
		
		jQuery("#tdcuenta_corrienteGuardarCambios").css("display",cuenta_corriente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcuenta_corrienteGuardarCambiosToolBar").css("display",cuenta_corriente_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcuenta_corrienteCerrarPagina").css("display",cuenta_corriente_control.strPermisoPopup);		
		jQuery("#tdcuenta_corrienteCerrarPaginaToolBar").css("display",cuenta_corriente_control.strPermisoPopup);
		//jQuery("#trcuenta_corrienteAccionesRelaciones").css("display",cuenta_corriente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cuenta Corrientes";
		sTituloBanner+=" - " + cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_corriente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcuenta_corrienteRelacionesToolBar").css("display",cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscuenta_corriente").css("display",cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cuenta_corriente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cuenta_corriente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_corriente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_corriente_webcontrol1.registrarEventosControles();
		
		if(cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_corriente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_corriente_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_corriente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_corriente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cuenta_corriente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cuenta_corriente_webcontrol1.onLoad();
			
			//} else {
				//if(cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			cuenta_corriente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_corriente","cuentascorrientes","",cuenta_corriente_funcion1,cuenta_corriente_webcontrol1,cuenta_corriente_constante1);	
	}
}

var cuenta_corriente_webcontrol1 = new cuenta_corriente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cuenta_corriente_webcontrol,cuenta_corriente_webcontrol1};

//Para ser llamado desde window.opener
window.cuenta_corriente_webcontrol1 = cuenta_corriente_webcontrol1;


if(cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_corriente_webcontrol1.onLoadWindow; 
}

//</script>