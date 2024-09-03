//<script type="text/javascript" language="javascript">



//var devolucionJQueryPaginaWebInteraccion= function (devolucion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {devolucion_constante,devolucion_constante1} from '../util/devolucion_constante.js';

import {devolucion_funcion,devolucion_funcion1} from '../util/devolucion_funcion.js';


class devolucion_webcontrol extends GeneralEntityWebControl {
	
	devolucion_control=null;
	devolucion_controlInicial=null;
	devolucion_controlAuxiliar=null;
		
	//if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(devolucion_control) {
		super();
		
		this.devolucion_control=devolucion_control;
	}
		
	actualizarVariablesPagina(devolucion_control) {
		
		if(devolucion_control.action=="index" || devolucion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(devolucion_control);
			
		} 
		
		
		else if(devolucion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(devolucion_control);
		
		} else if(devolucion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(devolucion_control);
		
		} else if(devolucion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(devolucion_control);
		
		} else if(devolucion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(devolucion_control);
			
		} else if(devolucion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(devolucion_control);
			
		} else if(devolucion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(devolucion_control);
		
		} else if(devolucion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(devolucion_control);		
		
		} else if(devolucion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(devolucion_control);
		
		} else if(devolucion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(devolucion_control);
		
		} else if(devolucion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(devolucion_control);
		
		} else if(devolucion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(devolucion_control);
		
		}  else if(devolucion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(devolucion_control);
		
		} else if(devolucion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(devolucion_control);
		
		} else if(devolucion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(devolucion_control);
		
		} else if(devolucion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(devolucion_control);
		
		} else if(devolucion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(devolucion_control);
		
		} else if(devolucion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(devolucion_control);
		
		} else if(devolucion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(devolucion_control);
		
		} else if(devolucion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(devolucion_control);
		
		} else if(devolucion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(devolucion_control);
		
		} else if(devolucion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(devolucion_control);		
		
		} else if(devolucion_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(devolucion_control);		
		
		} else if(devolucion_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(devolucion_control);		
		
		} else if(devolucion_control.action.includes("Busqueda") ||
				  devolucion_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(devolucion_control);
			
		} else if(devolucion_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(devolucion_control)
		}
		
		
		
	
		else if(devolucion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(devolucion_control);	
		
		} else if(devolucion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_control);		
		}
	
		else if(devolucion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(devolucion_control);		
		}
	
		else if(devolucion_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(devolucion_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + devolucion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(devolucion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(devolucion_control) {
		this.actualizarPaginaAccionesGenerales(devolucion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(devolucion_control) {
		
		this.actualizarPaginaCargaGeneral(devolucion_control);
		this.actualizarPaginaOrderBy(devolucion_control);
		this.actualizarPaginaTablaDatos(devolucion_control);
		this.actualizarPaginaCargaGeneralControles(devolucion_control);
		//this.actualizarPaginaFormulario(devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_control);
		this.actualizarPaginaAreaBusquedas(devolucion_control);
		this.actualizarPaginaCargaCombosFK(devolucion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(devolucion_control) {
		//this.actualizarPaginaFormulario(devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(devolucion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(devolucion_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(devolucion_control) {
		
		this.actualizarPaginaCargaGeneral(devolucion_control);
		this.actualizarPaginaTablaDatos(devolucion_control);
		this.actualizarPaginaCargaGeneralControles(devolucion_control);
		//this.actualizarPaginaFormulario(devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_control);
		this.actualizarPaginaAreaBusquedas(devolucion_control);
		this.actualizarPaginaCargaCombosFK(devolucion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);		
		//this.actualizarPaginaFormulario(devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);		
		//this.actualizarPaginaFormulario(devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);		
		//this.actualizarPaginaFormulario(devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(devolucion_control) {
		//this.actualizarPaginaFormulario(devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(devolucion_control) {
		this.actualizarPaginaAbrirLink(devolucion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);				
		//this.actualizarPaginaFormulario(devolucion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);
		//this.actualizarPaginaFormulario(devolucion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);
		//this.actualizarPaginaFormulario(devolucion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(devolucion_control) {
		//this.actualizarPaginaFormulario(devolucion_control);
		this.onLoadCombosDefectoFK(devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);
		//this.actualizarPaginaFormulario(devolucion_control);
		this.onLoadCombosDefectoFK(devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(devolucion_control) {
		this.actualizarPaginaAbrirLink(devolucion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(devolucion_control) {
					//super.actualizarPaginaImprimir(devolucion_control,"devolucion");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",devolucion_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("devolucion_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(devolucion_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(devolucion_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(devolucion_control) {
		//super.actualizarPaginaImprimir(devolucion_control,"devolucion");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("devolucion_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(devolucion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",devolucion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(devolucion_control) {
		//super.actualizarPaginaImprimir(devolucion_control,"devolucion");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("devolucion_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(devolucion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",devolucion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(devolucion_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(devolucion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(devolucion_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(devolucion_control);
			
		this.actualizarPaginaAbrirLink(devolucion_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(devolucion_control) {
		this.actualizarPaginaTablaDatos(devolucion_control);
		this.actualizarPaginaFormulario(devolucion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(devolucion_control) {
		
		if(devolucion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(devolucion_control);
		}
		
		if(devolucion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(devolucion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(devolucion_control) {
		if(devolucion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("devolucionReturnGeneral",JSON.stringify(devolucion_control.devolucionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(devolucion_control) {
		if(devolucion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && devolucion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(devolucion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(devolucion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(devolucion_control, mostrar) {
		
		if(mostrar==true) {
			devolucion_funcion1.resaltarRestaurarDivsPagina(false,"devolucion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				devolucion_funcion1.resaltarRestaurarDivMantenimiento(false,"devolucion");
			}			
			
			devolucion_funcion1.mostrarDivMensaje(true,devolucion_control.strAuxiliarMensaje,devolucion_control.strAuxiliarCssMensaje);
		
		} else {
			devolucion_funcion1.mostrarDivMensaje(false,devolucion_control.strAuxiliarMensaje,devolucion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(devolucion_control) {
		if(devolucion_funcion1.esPaginaForm(devolucion_constante1)==true) {
			window.opener.devolucion_webcontrol1.actualizarPaginaTablaDatos(devolucion_control);
		} else {
			this.actualizarPaginaTablaDatos(devolucion_control);
		}
	}
	
	actualizarPaginaAbrirLink(devolucion_control) {
		devolucion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(devolucion_control.strAuxiliarUrlPagina);
				
		devolucion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(devolucion_control.strAuxiliarTipo,devolucion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(devolucion_control) {
		devolucion_funcion1.resaltarRestaurarDivMensaje(true,devolucion_control.strAuxiliarMensajeAlert,devolucion_control.strAuxiliarCssMensaje);
			
		if(devolucion_funcion1.esPaginaForm(devolucion_constante1)==true) {
			window.opener.devolucion_funcion1.resaltarRestaurarDivMensaje(true,devolucion_control.strAuxiliarMensajeAlert,devolucion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(devolucion_control) {
		this.devolucion_controlInicial=devolucion_control;
			
		if(devolucion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(devolucion_control.strStyleDivArbol,devolucion_control.strStyleDivContent
																,devolucion_control.strStyleDivOpcionesBanner,devolucion_control.strStyleDivExpandirColapsar
																,devolucion_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=devolucion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",devolucion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(devolucion_control) {
		this.actualizarCssBotonesPagina(devolucion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(devolucion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(devolucion_control.tiposReportes,devolucion_control.tiposReporte
															 	,devolucion_control.tiposPaginacion,devolucion_control.tiposAcciones
																,devolucion_control.tiposColumnasSelect,devolucion_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(devolucion_control.tiposRelaciones,devolucion_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(devolucion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(devolucion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(devolucion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(devolucion_control) {
	
		var indexPosition=devolucion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=devolucion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(devolucion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosempresasFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombossucursalsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosejerciciosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosperiodosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosusuariosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosproveedorsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosvendedorsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombostermino_pago_proveedorsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosmonedasFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosestadosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosasientosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarCombosdocumento_cuenta_pagarsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.cargarComboskardexsFK(devolucion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(devolucion_control.strRecargarFkTiposNinguno!=null && devolucion_control.strRecargarFkTiposNinguno!='NINGUNO' && devolucion_control.strRecargarFkTiposNinguno!='') {
			
				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosempresasFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombossucursalsFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosejerciciosFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosperiodosFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosusuariosFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosproveedorsFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosvendedorsFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombostermino_pago_proveedorsFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_moneda",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosmonedasFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosestadosFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosasientosFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarCombosdocumento_cuenta_pagarsFK(devolucion_control);
				}

				if(devolucion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",devolucion_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_webcontrol1.cargarComboskardexsFK(devolucion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_proveedor") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.devolucionActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.devolucionActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.devolucionActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.usuariosFK);
	}

	cargarComboEditarTablaproveedorFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.proveedorsFK);
	}

	cargarComboEditarTablavendedorFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_proveedorFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.termino_pago_proveedorsFK);
	}

	cargarComboEditarTablamonedaFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.monedasFK);
	}

	cargarComboEditarTablaestadoFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.estadosFK);
	}

	cargarComboEditarTablaasientoFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.asientosFK);
	}

	cargarComboEditarTabladocumento_cuenta_pagarFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.documento_cuenta_pagarsFK);
	}

	cargarComboEditarTablakardexFK(devolucion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_funcion1,devolucion_control.kardexsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(devolucion_control) {
		jQuery("#divBusquedadevolucionAjaxWebPart").css("display",devolucion_control.strPermisoBusqueda);
		jQuery("#trdevolucionCabeceraBusquedas").css("display",devolucion_control.strPermisoBusqueda);
		jQuery("#trBusquedadevolucion").css("display",devolucion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(devolucion_control.htmlTablaOrderBy!=null
			&& devolucion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydevolucionAjaxWebPart").html(devolucion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//devolucion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(devolucion_control.htmlTablaOrderByRel!=null
			&& devolucion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldevolucionAjaxWebPart").html(devolucion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(devolucion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadevolucionAjaxWebPart").css("display","none");
			jQuery("#trdevolucionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadevolucion").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(devolucion_control) {
		
		if(!devolucion_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(devolucion_control);
		} else {
			jQuery("#divTablaDatosdevolucionsAjaxWebPart").html(devolucion_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdevolucions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(devolucion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdevolucions=jQuery("#tblTablaDatosdevolucions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("devolucion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',devolucion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			devolucion_webcontrol1.registrarControlesTableEdition(devolucion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		devolucion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(devolucion_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("devolucion_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(devolucion_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosdevolucionsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(devolucion_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(devolucion_control);
		
		const divOrderBy = document.getElementById("divOrderBydevolucionAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(devolucion_control);
		
		const divOrderByRel = document.getElementById("divOrderByReldevolucionAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(devolucion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(devolucion_control.devolucionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(devolucion_control);			
		}
	}
	
	actualizarCamposFilaTabla(devolucion_control) {
		var i=0;
		
		i=devolucion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(devolucion_control.devolucionActual.id);
		jQuery("#t-version_row_"+i+"").val(devolucion_control.devolucionActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(devolucion_control.devolucionActual.versionRow);
		
		if(devolucion_control.devolucionActual.id_empresa!=null && devolucion_control.devolucionActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != devolucion_control.devolucionActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(devolucion_control.devolucionActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_sucursal!=null && devolucion_control.devolucionActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != devolucion_control.devolucionActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_4").val(devolucion_control.devolucionActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_ejercicio!=null && devolucion_control.devolucionActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != devolucion_control.devolucionActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_5").val(devolucion_control.devolucionActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_periodo!=null && devolucion_control.devolucionActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != devolucion_control.devolucionActual.id_periodo) {
				jQuery("#t-cel_"+i+"_6").val(devolucion_control.devolucionActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_usuario!=null && devolucion_control.devolucionActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != devolucion_control.devolucionActual.id_usuario) {
				jQuery("#t-cel_"+i+"_7").val(devolucion_control.devolucionActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(devolucion_control.devolucionActual.numero);
		
		if(devolucion_control.devolucionActual.id_proveedor!=null && devolucion_control.devolucionActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != devolucion_control.devolucionActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_9").val(devolucion_control.devolucionActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_9").select2("val", null);
			if(jQuery("#t-cel_"+i+"_9").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_vendedor!=null && devolucion_control.devolucionActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_10").val() != devolucion_control.devolucionActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_10").val(devolucion_control.devolucionActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_10").select2("val", null);
			if(jQuery("#t-cel_"+i+"_10").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_10").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_11").val(devolucion_control.devolucionActual.ruc);
		jQuery("#t-cel_"+i+"_12").val(devolucion_control.devolucionActual.fecha_emision);
		
		if(devolucion_control.devolucionActual.id_termino_pago_proveedor!=null && devolucion_control.devolucionActual.id_termino_pago_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != devolucion_control.devolucionActual.id_termino_pago_proveedor) {
				jQuery("#t-cel_"+i+"_13").val(devolucion_control.devolucionActual.id_termino_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(devolucion_control.devolucionActual.fecha_vence);
		jQuery("#t-cel_"+i+"_15").val(devolucion_control.devolucionActual.cotizacion);
		
		if(devolucion_control.devolucionActual.id_moneda!=null && devolucion_control.devolucionActual.id_moneda>-1){
			if(jQuery("#t-cel_"+i+"_16").val() != devolucion_control.devolucionActual.id_moneda) {
				jQuery("#t-cel_"+i+"_16").val(devolucion_control.devolucionActual.id_moneda).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_16").select2("val", null);
			if(jQuery("#t-cel_"+i+"_16").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_16").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_estado!=null && devolucion_control.devolucionActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_17").val() != devolucion_control.devolucionActual.id_estado) {
				jQuery("#t-cel_"+i+"_17").val(devolucion_control.devolucionActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_17").select2("val", null);
			if(jQuery("#t-cel_"+i+"_17").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_17").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_18").val(devolucion_control.devolucionActual.direccion);
		jQuery("#t-cel_"+i+"_19").val(devolucion_control.devolucionActual.envia);
		jQuery("#t-cel_"+i+"_20").val(devolucion_control.devolucionActual.observacion);
		jQuery("#t-cel_"+i+"_21").prop('checked',devolucion_control.devolucionActual.impuesto_en_precio);
		jQuery("#t-cel_"+i+"_22").val(devolucion_control.devolucionActual.sub_total);
		jQuery("#t-cel_"+i+"_23").val(devolucion_control.devolucionActual.descuento_monto);
		jQuery("#t-cel_"+i+"_24").val(devolucion_control.devolucionActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_25").val(devolucion_control.devolucionActual.iva_monto);
		jQuery("#t-cel_"+i+"_26").val(devolucion_control.devolucionActual.iva_porciento);
		jQuery("#t-cel_"+i+"_27").val(devolucion_control.devolucionActual.total);
		jQuery("#t-cel_"+i+"_28").val(devolucion_control.devolucionActual.otro_monto);
		jQuery("#t-cel_"+i+"_29").val(devolucion_control.devolucionActual.otro_porciento);
		jQuery("#t-cel_"+i+"_30").val(devolucion_control.devolucionActual.factura_proveedor);
		jQuery("#t-cel_"+i+"_31").val(devolucion_control.devolucionActual.pago);
		
		if(devolucion_control.devolucionActual.id_asiento!=null && devolucion_control.devolucionActual.id_asiento>-1){
			if(jQuery("#t-cel_"+i+"_32").val() != devolucion_control.devolucionActual.id_asiento) {
				jQuery("#t-cel_"+i+"_32").val(devolucion_control.devolucionActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_32").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_32").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_documento_cuenta_pagar!=null && devolucion_control.devolucionActual.id_documento_cuenta_pagar>-1){
			if(jQuery("#t-cel_"+i+"_33").val() != devolucion_control.devolucionActual.id_documento_cuenta_pagar) {
				jQuery("#t-cel_"+i+"_33").val(devolucion_control.devolucionActual.id_documento_cuenta_pagar).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_33").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_33").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_control.devolucionActual.id_kardex!=null && devolucion_control.devolucionActual.id_kardex>-1){
			if(jQuery("#t-cel_"+i+"_34").val() != devolucion_control.devolucionActual.id_kardex) {
				jQuery("#t-cel_"+i+"_34").val(devolucion_control.devolucionActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_34").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_34").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(devolucion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion_detalle").click(function(){
		jQuery("#tblTablaDatosdevolucions").on("click",".imgrelaciondevolucion_detalle", function () {

			var idActual=jQuery(this).attr("idactualdevolucion");

			devolucion_webcontrol1.registrarSesionParadevolucion_detalles(idActual);
		});				
	}
		
	

	registrarSesionParadevolucion_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"devolucion","devolucion_detalle","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1,"s","");
	}
	
	registrarControlesTableEdition(devolucion_control) {
		devolucion_funcion1.registrarControlesTableValidacionEdition(devolucion_control,devolucion_webcontrol1,devolucion_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(devolucion_control) {
		jQuery("#divResumendevolucionActualAjaxWebPart").html(devolucion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(devolucion_control) {
		//jQuery("#divAccionesRelacionesdevolucionAjaxWebPart").html(devolucion_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("devolucion_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(devolucion_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesdevolucionAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		devolucion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(devolucion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(devolucion_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(devolucion_control) {
		
		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",devolucion_control.strVisibleFK_Idasiento);
			jQuery("#tblstrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",devolucion_control.strVisibleFK_Idasiento);
		}

		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar").attr("style",devolucion_control.strVisibleFK_Iddocumento_cuenta_pagar);
			jQuery("#tblstrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar").attr("style",devolucion_control.strVisibleFK_Iddocumento_cuenta_pagar);
		}

		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",devolucion_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",devolucion_control.strVisibleFK_Idejercicio);
		}

		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",devolucion_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",devolucion_control.strVisibleFK_Idempresa);
		}

		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idestado").attr("style",devolucion_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idestado").attr("style",devolucion_control.strVisibleFK_Idestado);
		}

		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",devolucion_control.strVisibleFK_Idkardex);
			jQuery("#tblstrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",devolucion_control.strVisibleFK_Idkardex);
		}

		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",devolucion_control.strVisibleFK_Idmoneda);
			jQuery("#tblstrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",devolucion_control.strVisibleFK_Idmoneda);
		}

		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",devolucion_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",devolucion_control.strVisibleFK_Idperiodo);
		}

		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",devolucion_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",devolucion_control.strVisibleFK_Idproveedor);
		}

		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",devolucion_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",devolucion_control.strVisibleFK_Idsucursal);
		}

		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",devolucion_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",devolucion_control.strVisibleFK_Idtermino_pago);
		}

		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",devolucion_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",devolucion_control.strVisibleFK_Idusuario);
		}

		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",devolucion_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+devolucion_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",devolucion_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondevolucion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("devolucion",id,"inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		devolucion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion","empresa","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		devolucion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion","sucursal","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		devolucion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion","ejercicio","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		devolucion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion","periodo","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		devolucion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion","usuario","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		devolucion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion","proveedor","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		devolucion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion","vendedor","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}

	abrirBusquedaParatermino_pago_proveedor(strNombreCampoBusqueda){//idActual
		devolucion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion","termino_pago_proveedor","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}

	abrirBusquedaParamoneda(strNombreCampoBusqueda){//idActual
		devolucion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion","moneda","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		devolucion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion","estado","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}

	abrirBusquedaParaasiento(strNombreCampoBusqueda){//idActual
		devolucion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion","asiento","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}

	abrirBusquedaParadocumento_cuenta_pagar(strNombreCampoBusqueda){//idActual
		devolucion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion","documento_cuenta_pagar","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}

	abrirBusquedaParakardex(strNombreCampoBusqueda){//idActual
		devolucion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion","kardex","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelaciondevolucion_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualdevolucion");

			devolucion_webcontrol1.registrarSesionParadevolucion_detalles(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucionConstante,strParametros);
		
		//devolucion_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_empresa",devolucion_control.empresasFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_3",devolucion_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_sucursal",devolucion_control.sucursalsFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_4",devolucion_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_ejercicio",devolucion_control.ejerciciosFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_5",devolucion_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_periodo",devolucion_control.periodosFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_6",devolucion_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_usuario",devolucion_control.usuariosFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_7",devolucion_control.usuariosFK);
		}
	};

	cargarCombosproveedorsFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor",devolucion_control.proveedorsFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_9",devolucion_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",devolucion_control.proveedorsFK);

	};

	cargarCombosvendedorsFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_vendedor",devolucion_control.vendedorsFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_10",devolucion_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",devolucion_control.vendedorsFK);

	};

	cargarCombostermino_pago_proveedorsFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor",devolucion_control.termino_pago_proveedorsFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_13",devolucion_control.termino_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor",devolucion_control.termino_pago_proveedorsFK);

	};

	cargarCombosmonedasFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_moneda",devolucion_control.monedasFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_16",devolucion_control.monedasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda",devolucion_control.monedasFK);

	};

	cargarCombosestadosFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_estado",devolucion_control.estadosFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_17",devolucion_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",devolucion_control.estadosFK);

	};

	cargarCombosasientosFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_asiento",devolucion_control.asientosFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_32",devolucion_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",devolucion_control.asientosFK);

	};

	cargarCombosdocumento_cuenta_pagarsFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar",devolucion_control.documento_cuenta_pagarsFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_33",devolucion_control.documento_cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar",devolucion_control.documento_cuenta_pagarsFK);

	};

	cargarComboskardexsFK(devolucion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_constante1.STR_SUFIJO+"-id_kardex",devolucion_control.kardexsFK);

		if(devolucion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_control.idFilaTablaActual+"_34",devolucion_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",devolucion_control.kardexsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(devolucion_control) {

	};

	registrarComboActionChangeCombossucursalsFK(devolucion_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(devolucion_control) {

	};

	registrarComboActionChangeCombosperiodosFK(devolucion_control) {

	};

	registrarComboActionChangeCombosusuariosFK(devolucion_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(devolucion_control) {
		this.registrarComboActionChangeid_proveedor("form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor",false,0);


		this.registrarComboActionChangeid_proveedor(""+devolucion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(devolucion_control) {

	};

	registrarComboActionChangeCombostermino_pago_proveedorsFK(devolucion_control) {

	};

	registrarComboActionChangeCombosmonedasFK(devolucion_control) {

	};

	registrarComboActionChangeCombosestadosFK(devolucion_control) {

	};

	registrarComboActionChangeCombosasientosFK(devolucion_control) {

	};

	registrarComboActionChangeCombosdocumento_cuenta_pagarsFK(devolucion_control) {

	};

	registrarComboActionChangeComboskardexsFK(devolucion_control) {

	};

	
	
	setDefectoValorCombosempresasFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idempresaDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_empresa").val() != devolucion_control.idempresaDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_empresa").val(devolucion_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idsucursalDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_sucursal").val() != devolucion_control.idsucursalDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_sucursal").val(devolucion_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idejercicioDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_ejercicio").val() != devolucion_control.idejercicioDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_ejercicio").val(devolucion_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idperiodoDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_periodo").val() != devolucion_control.idperiodoDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_periodo").val(devolucion_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idusuarioDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_usuario").val() != devolucion_control.idusuarioDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_usuario").val(devolucion_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idproveedorDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor").val() != devolucion_control.idproveedorDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor").val(devolucion_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(devolucion_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idvendedorDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_vendedor").val() != devolucion_control.idvendedorDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_vendedor").val(devolucion_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(devolucion_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_proveedorsFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idtermino_pago_proveedorDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val() != devolucion_control.idtermino_pago_proveedorDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor").val(devolucion_control.idtermino_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor").val(devolucion_control.idtermino_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmonedasFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idmonedaDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_moneda").val() != devolucion_control.idmonedaDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_moneda").val(devolucion_control.idmonedaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(devolucion_control.idmonedaDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idestadoDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_estado").val() != devolucion_control.idestadoDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_estado").val(devolucion_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(devolucion_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idasientoDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_asiento").val() != devolucion_control.idasientoDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_asiento").val(devolucion_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(devolucion_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_cuenta_pagarsFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.iddocumento_cuenta_pagarDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val() != devolucion_control.iddocumento_cuenta_pagarDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val(devolucion_control.iddocumento_cuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val(devolucion_control.iddocumento_cuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardexsFK(devolucion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_control.idkardexDefaultFK>-1 && jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_kardex").val() != devolucion_control.idkardexDefaultFK) {
				jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_kardex").val(devolucion_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(devolucion_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_proveedor(id_proveedor,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("devolucion","inventario","","id_proveedor",id_proveedor,"NINGUNO","",paraEventoTabla,idFilaTabla,devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	







		jQuery("#form-id_moneda").prop("disabled", habilitarDeshabilitar);
		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(devolucion_constante1.BIT_ES_PAGINA_FORM==true) {
			
							devolucion_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(devolucion_constante1.BIT_ES_PAGINA_FORM==true) {
			
		devolucion_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//devolucion_control
		
	
	}
	
	onLoadCombosDefectoFK(devolucion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosempresasFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombossucursalsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosejerciciosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosperiodosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosusuariosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosproveedorsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosvendedorsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombostermino_pago_proveedorsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosmonedasFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosestadosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosasientosFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorCombosdocumento_cuenta_pagarsFK(devolucion_control);
			}

			if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",devolucion_control.strRecargarFkTipos,",")) { 
				devolucion_webcontrol1.setDefectoValorComboskardexsFK(devolucion_control);
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
	onLoadCombosEventosFK(devolucion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosempresasFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombossucursalsFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosejerciciosFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosperiodosFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosusuariosFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosproveedorsFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosvendedorsFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_proveedor",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombostermino_pago_proveedorsFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosmonedasFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosestadosFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosasientosFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_pagarsFK(devolucion_control);
			//}

			//if(devolucion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",devolucion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_webcontrol1.registrarComboActionChangeComboskardexsFK(devolucion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(devolucion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(devolucion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(devolucion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion","FK_Idasiento","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion","FK_Iddocumento_cuenta_pagar","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion","FK_Idejercicio","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion","FK_Idempresa","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion","FK_Idestado","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion","FK_Idkardex","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion","FK_Idmoneda","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion","FK_Idperiodo","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion","FK_Idproveedor","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion","FK_Idsucursal","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion","FK_Idtermino_pago","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion","FK_Idusuario","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion","FK_Idvendedor","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
		
			
			if(devolucion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("devolucion");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("devolucion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(devolucion_funcion1,devolucion_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(devolucion_funcion1,devolucion_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(devolucion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,"devolucion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_proveedor","id_termino_pago_proveedor","cuentaspagar","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_termino_pago_proveedor_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParatermino_pago_proveedor("id_termino_pago_proveedor");
				//alert(jQuery('#form-id_termino_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("moneda","id_moneda","contabilidad","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_moneda_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParamoneda("id_moneda");
				//alert(jQuery('#form-id_moneda_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_pagar","id_documento_cuenta_pagar","cuentaspagar","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParadocumento_cuenta_pagar("id_documento_cuenta_pagar");
				//alert(jQuery('#form-id_documento_cuenta_pagar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				devolucion_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("devolucion");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(devolucion_control) {
		
		jQuery("#divBusquedadevolucionAjaxWebPart").css("display",devolucion_control.strPermisoBusqueda);
		jQuery("#trdevolucionCabeceraBusquedas").css("display",devolucion_control.strPermisoBusqueda);
		jQuery("#trBusquedadevolucion").css("display",devolucion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedevolucion").css("display",devolucion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdevolucion").attr("style",devolucion_control.strPermisoMostrarTodos);		
		
		if(devolucion_control.strPermisoNuevo!=null) {
			jQuery("#tddevolucionNuevo").css("display",devolucion_control.strPermisoNuevo);
			jQuery("#tddevolucionNuevoToolBar").css("display",devolucion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddevolucionDuplicar").css("display",devolucion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddevolucionDuplicarToolBar").css("display",devolucion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddevolucionNuevoGuardarCambios").css("display",devolucion_control.strPermisoNuevo);
			jQuery("#tddevolucionNuevoGuardarCambiosToolBar").css("display",devolucion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(devolucion_control.strPermisoActualizar!=null) {
			jQuery("#tddevolucionCopiar").css("display",devolucion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddevolucionCopiarToolBar").css("display",devolucion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddevolucionConEditar").css("display",devolucion_control.strPermisoActualizar);
		}
		
		jQuery("#tddevolucionGuardarCambios").css("display",devolucion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddevolucionGuardarCambiosToolBar").css("display",devolucion_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tddevolucionCerrarPagina").css("display",devolucion_control.strPermisoPopup);		
		jQuery("#tddevolucionCerrarPaginaToolBar").css("display",devolucion_control.strPermisoPopup);
		//jQuery("#trdevolucionAccionesRelaciones").css("display",devolucion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=devolucion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + devolucion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + devolucion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Devoluciones";
		sTituloBanner+=" - " + devolucion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + devolucion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddevolucionRelacionesToolBar").css("display",devolucion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdevolucion").css("display",devolucion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		devolucion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		devolucion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		devolucion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		devolucion_webcontrol1.registrarEventosControles();
		
		if(devolucion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(devolucion_constante1.STR_ES_RELACIONADO=="false") {
			devolucion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(devolucion_constante1.STR_ES_RELACIONES=="true") {
			if(devolucion_constante1.BIT_ES_PAGINA_FORM==true) {
				devolucion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(devolucion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(devolucion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				devolucion_webcontrol1.onLoad();
			
			//} else {
				//if(devolucion_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			devolucion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("devolucion","inventario","",devolucion_funcion1,devolucion_webcontrol1,devolucion_constante1);	
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

var devolucion_webcontrol1 = new devolucion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {devolucion_webcontrol,devolucion_webcontrol1};

//Para ser llamado desde window.opener
window.devolucion_webcontrol1 = devolucion_webcontrol1;


if(devolucion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = devolucion_webcontrol1.onLoadWindow; 
}

//</script>