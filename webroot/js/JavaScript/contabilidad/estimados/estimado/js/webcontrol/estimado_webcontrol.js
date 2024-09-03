//<script type="text/javascript" language="javascript">



//var estimadoJQueryPaginaWebInteraccion= function (estimado_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {estimado_constante,estimado_constante1} from '../util/estimado_constante.js';

import {estimado_funcion,estimado_funcion1} from '../util/estimado_funcion.js';


class estimado_webcontrol extends GeneralEntityWebControl {
	
	estimado_control=null;
	estimado_controlInicial=null;
	estimado_controlAuxiliar=null;
		
	//if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(estimado_control) {
		super();
		
		this.estimado_control=estimado_control;
	}
		
	actualizarVariablesPagina(estimado_control) {
		
		if(estimado_control.action=="index" || estimado_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(estimado_control);
			
		} 
		
		
		else if(estimado_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(estimado_control);
		
		} else if(estimado_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(estimado_control);
		
		} else if(estimado_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(estimado_control);
		
		} else if(estimado_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(estimado_control);
			
		} else if(estimado_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(estimado_control);
			
		} else if(estimado_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(estimado_control);
		
		} else if(estimado_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(estimado_control);		
		
		} else if(estimado_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(estimado_control);
		
		} else if(estimado_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(estimado_control);
		
		} else if(estimado_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(estimado_control);
		
		} else if(estimado_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(estimado_control);
		
		}  else if(estimado_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(estimado_control);
		
		} else if(estimado_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(estimado_control);
		
		} else if(estimado_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(estimado_control);
		
		} else if(estimado_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(estimado_control);
		
		} else if(estimado_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(estimado_control);
		
		} else if(estimado_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(estimado_control);
		
		} else if(estimado_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(estimado_control);
		
		} else if(estimado_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(estimado_control);
		
		} else if(estimado_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(estimado_control);
		
		} else if(estimado_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(estimado_control);		
		
		} else if(estimado_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(estimado_control);		
		
		} else if(estimado_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(estimado_control);		
		
		} else if(estimado_control.action.includes("Busqueda") ||
				  estimado_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(estimado_control);
			
		} else if(estimado_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(estimado_control)
		}
		
		
		
	
		else if(estimado_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(estimado_control);	
		
		} else if(estimado_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(estimado_control);		
		}
	
		else if(estimado_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(estimado_control);		
		}
	
		else if(estimado_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(estimado_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + estimado_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(estimado_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(estimado_control) {
		this.actualizarPaginaAccionesGenerales(estimado_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(estimado_control) {
		
		this.actualizarPaginaCargaGeneral(estimado_control);
		this.actualizarPaginaOrderBy(estimado_control);
		this.actualizarPaginaTablaDatos(estimado_control);
		this.actualizarPaginaCargaGeneralControles(estimado_control);
		//this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estimado_control);
		this.actualizarPaginaAreaBusquedas(estimado_control);
		this.actualizarPaginaCargaCombosFK(estimado_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(estimado_control) {
		//this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(estimado_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(estimado_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(estimado_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(estimado_control) {
		
		this.actualizarPaginaCargaGeneral(estimado_control);
		this.actualizarPaginaTablaDatos(estimado_control);
		this.actualizarPaginaCargaGeneralControles(estimado_control);
		//this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estimado_control);
		this.actualizarPaginaAreaBusquedas(estimado_control);
		this.actualizarPaginaCargaCombosFK(estimado_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		//this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		//this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		//this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		//this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		//this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		//this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(estimado_control) {
		//this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(estimado_control) {
		this.actualizarPaginaAbrirLink(estimado_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);				
		//this.actualizarPaginaFormulario(estimado_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);
		//this.actualizarPaginaFormulario(estimado_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		//this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);
		//this.actualizarPaginaFormulario(estimado_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(estimado_control) {
		//this.actualizarPaginaFormulario(estimado_control);
		this.onLoadCombosDefectoFK(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);
		//this.actualizarPaginaFormulario(estimado_control);
		this.onLoadCombosDefectoFK(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		//this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(estimado_control) {
		this.actualizarPaginaAbrirLink(estimado_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(estimado_control) {
					//super.actualizarPaginaImprimir(estimado_control,"estimado");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",estimado_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("estimado_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(estimado_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(estimado_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(estimado_control) {
		//super.actualizarPaginaImprimir(estimado_control,"estimado");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("estimado_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(estimado_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",estimado_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(estimado_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(estimado_control) {
		//super.actualizarPaginaImprimir(estimado_control,"estimado");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("estimado_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(estimado_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",estimado_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(estimado_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(estimado_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(estimado_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(estimado_control);
			
		this.actualizarPaginaAbrirLink(estimado_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(estimado_control) {
		this.actualizarPaginaTablaDatos(estimado_control);
		this.actualizarPaginaFormulario(estimado_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estimado_control);		
		this.actualizarPaginaAreaMantenimiento(estimado_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(estimado_control) {
		
		if(estimado_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(estimado_control);
		}
		
		if(estimado_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(estimado_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(estimado_control) {
		if(estimado_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("estimadoReturnGeneral",JSON.stringify(estimado_control.estimadoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(estimado_control) {
		if(estimado_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && estimado_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(estimado_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(estimado_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(estimado_control, mostrar) {
		
		if(mostrar==true) {
			estimado_funcion1.resaltarRestaurarDivsPagina(false,"estimado");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				estimado_funcion1.resaltarRestaurarDivMantenimiento(false,"estimado");
			}			
			
			estimado_funcion1.mostrarDivMensaje(true,estimado_control.strAuxiliarMensaje,estimado_control.strAuxiliarCssMensaje);
		
		} else {
			estimado_funcion1.mostrarDivMensaje(false,estimado_control.strAuxiliarMensaje,estimado_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(estimado_control) {
		if(estimado_funcion1.esPaginaForm(estimado_constante1)==true) {
			window.opener.estimado_webcontrol1.actualizarPaginaTablaDatos(estimado_control);
		} else {
			this.actualizarPaginaTablaDatos(estimado_control);
		}
	}
	
	actualizarPaginaAbrirLink(estimado_control) {
		estimado_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(estimado_control.strAuxiliarUrlPagina);
				
		estimado_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(estimado_control.strAuxiliarTipo,estimado_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(estimado_control) {
		estimado_funcion1.resaltarRestaurarDivMensaje(true,estimado_control.strAuxiliarMensajeAlert,estimado_control.strAuxiliarCssMensaje);
			
		if(estimado_funcion1.esPaginaForm(estimado_constante1)==true) {
			window.opener.estimado_funcion1.resaltarRestaurarDivMensaje(true,estimado_control.strAuxiliarMensajeAlert,estimado_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(estimado_control) {
		this.estimado_controlInicial=estimado_control;
			
		if(estimado_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(estimado_control.strStyleDivArbol,estimado_control.strStyleDivContent
																,estimado_control.strStyleDivOpcionesBanner,estimado_control.strStyleDivExpandirColapsar
																,estimado_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=estimado_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",estimado_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(estimado_control) {
		this.actualizarCssBotonesPagina(estimado_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(estimado_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(estimado_control.tiposReportes,estimado_control.tiposReporte
															 	,estimado_control.tiposPaginacion,estimado_control.tiposAcciones
																,estimado_control.tiposColumnasSelect,estimado_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(estimado_control.tiposRelaciones,estimado_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(estimado_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(estimado_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(estimado_control);			
	}
	
	actualizarPaginaUsuarioInvitado(estimado_control) {
	
		var indexPosition=estimado_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=estimado_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(estimado_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosempresasFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombossucursalsFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosejerciciosFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosperiodosFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosusuariosFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosclientesFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosproveedorsFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosvendedorsFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombostermino_pago_clientesFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosmonedasFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.cargarCombosestadosFK(estimado_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(estimado_control.strRecargarFkTiposNinguno!=null && estimado_control.strRecargarFkTiposNinguno!='NINGUNO' && estimado_control.strRecargarFkTiposNinguno!='') {
			
				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosempresasFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombossucursalsFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosejerciciosFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosperiodosFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosusuariosFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosclientesFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosproveedorsFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosvendedorsFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombostermino_pago_clientesFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_moneda",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosmonedasFK(estimado_control);
				}

				if(estimado_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",estimado_control.strRecargarFkTiposNinguno,",")) { 
					estimado_webcontrol1.cargarCombosestadosFK(estimado_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_cliente") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+estimado_constante1.STR_SUFIJO+"-id_cliente" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.estimadoActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.estimadoActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.estimadoActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_proveedor") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+estimado_constante1.STR_SUFIJO+"-id_proveedor" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.estimadoActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.estimadoActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.estimadoActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.usuariosFK);
	}

	cargarComboEditarTablaclienteFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.clientesFK);
	}

	cargarComboEditarTablaproveedorFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.proveedorsFK);
	}

	cargarComboEditarTablavendedorFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablamonedaFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.monedasFK);
	}

	cargarComboEditarTablaestadoFK(estimado_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,estimado_funcion1,estimado_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(estimado_control) {
		jQuery("#divBusquedaestimadoAjaxWebPart").css("display",estimado_control.strPermisoBusqueda);
		jQuery("#trestimadoCabeceraBusquedas").css("display",estimado_control.strPermisoBusqueda);
		jQuery("#trBusquedaestimado").css("display",estimado_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(estimado_control.htmlTablaOrderBy!=null
			&& estimado_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByestimadoAjaxWebPart").html(estimado_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//estimado_webcontrol1.registrarOrderByActions();
			
		}
			
		if(estimado_control.htmlTablaOrderByRel!=null
			&& estimado_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelestimadoAjaxWebPart").html(estimado_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(estimado_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaestimadoAjaxWebPart").css("display","none");
			jQuery("#trestimadoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaestimado").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(estimado_control) {
		
		if(!estimado_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(estimado_control);
		} else {
			jQuery("#divTablaDatosestimadosAjaxWebPart").html(estimado_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosestimados=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(estimado_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosestimados=jQuery("#tblTablaDatosestimados").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("estimado",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',estimado_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			estimado_webcontrol1.registrarControlesTableEdition(estimado_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		estimado_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(estimado_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("estimado_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(estimado_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosestimadosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(estimado_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(estimado_control);
		
		const divOrderBy = document.getElementById("divOrderByestimadoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(estimado_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelestimadoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(estimado_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(estimado_control.estimadoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(estimado_control);			
		}
	}
	
	actualizarCamposFilaTabla(estimado_control) {
		var i=0;
		
		i=estimado_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(estimado_control.estimadoActual.id);
		jQuery("#t-version_row_"+i+"").val(estimado_control.estimadoActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(estimado_control.estimadoActual.versionRow);
		
		if(estimado_control.estimadoActual.id_empresa!=null && estimado_control.estimadoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != estimado_control.estimadoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(estimado_control.estimadoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_sucursal!=null && estimado_control.estimadoActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != estimado_control.estimadoActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_4").val(estimado_control.estimadoActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_ejercicio!=null && estimado_control.estimadoActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != estimado_control.estimadoActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_5").val(estimado_control.estimadoActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_periodo!=null && estimado_control.estimadoActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != estimado_control.estimadoActual.id_periodo) {
				jQuery("#t-cel_"+i+"_6").val(estimado_control.estimadoActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_usuario!=null && estimado_control.estimadoActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != estimado_control.estimadoActual.id_usuario) {
				jQuery("#t-cel_"+i+"_7").val(estimado_control.estimadoActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(estimado_control.estimadoActual.numero);
		
		if(estimado_control.estimadoActual.id_cliente!=null && estimado_control.estimadoActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != estimado_control.estimadoActual.id_cliente) {
				jQuery("#t-cel_"+i+"_9").val(estimado_control.estimadoActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_9").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_proveedor!=null && estimado_control.estimadoActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_10").val() != estimado_control.estimadoActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_10").val(estimado_control.estimadoActual.id_proveedor).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_10").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_10").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_11").val(estimado_control.estimadoActual.ruc);
		jQuery("#t-cel_"+i+"_12").val(estimado_control.estimadoActual.referencia_cliente);
		jQuery("#t-cel_"+i+"_13").val(estimado_control.estimadoActual.fecha_emision);
		
		if(estimado_control.estimadoActual.id_vendedor!=null && estimado_control.estimadoActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_14").val() != estimado_control.estimadoActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_14").val(estimado_control.estimadoActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_14").select2("val", null);
			if(jQuery("#t-cel_"+i+"_14").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_14").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(estimado_control.estimadoActual.id_termino_pago_cliente!=null && estimado_control.estimadoActual.id_termino_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_15").val() != estimado_control.estimadoActual.id_termino_pago_cliente) {
				jQuery("#t-cel_"+i+"_15").val(estimado_control.estimadoActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_15").select2("val", null);
			if(jQuery("#t-cel_"+i+"_15").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_15").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_16").val(estimado_control.estimadoActual.fecha_vence);
		
		if(estimado_control.estimadoActual.id_moneda!=null && estimado_control.estimadoActual.id_moneda>-1){
			if(jQuery("#t-cel_"+i+"_17").val() != estimado_control.estimadoActual.id_moneda) {
				jQuery("#t-cel_"+i+"_17").val(estimado_control.estimadoActual.id_moneda).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_17").select2("val", null);
			if(jQuery("#t-cel_"+i+"_17").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_17").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_18").val(estimado_control.estimadoActual.cotizacion);
		
		if(estimado_control.estimadoActual.id_estado!=null && estimado_control.estimadoActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_19").val() != estimado_control.estimadoActual.id_estado) {
				jQuery("#t-cel_"+i+"_19").val(estimado_control.estimadoActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_19").select2("val", null);
			if(jQuery("#t-cel_"+i+"_19").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_19").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_20").val(estimado_control.estimadoActual.direccion);
		jQuery("#t-cel_"+i+"_21").val(estimado_control.estimadoActual.enviar_a);
		jQuery("#t-cel_"+i+"_22").val(estimado_control.estimadoActual.observacion);
		jQuery("#t-cel_"+i+"_23").prop('checked',estimado_control.estimadoActual.iva_en_precio);
		jQuery("#t-cel_"+i+"_24").prop('checked',estimado_control.estimadoActual.genero_factura);
		jQuery("#t-cel_"+i+"_25").val(estimado_control.estimadoActual.sub_total);
		jQuery("#t-cel_"+i+"_26").val(estimado_control.estimadoActual.descuento_monto);
		jQuery("#t-cel_"+i+"_27").val(estimado_control.estimadoActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_28").val(estimado_control.estimadoActual.iva_monto);
		jQuery("#t-cel_"+i+"_29").val(estimado_control.estimadoActual.iva_porciento);
		jQuery("#t-cel_"+i+"_30").val(estimado_control.estimadoActual.retencion_fuente_monto);
		jQuery("#t-cel_"+i+"_31").val(estimado_control.estimadoActual.retencion_fuente_porciento);
		jQuery("#t-cel_"+i+"_32").val(estimado_control.estimadoActual.retencion_iva_monto);
		jQuery("#t-cel_"+i+"_33").val(estimado_control.estimadoActual.retencion_iva_porciento);
		jQuery("#t-cel_"+i+"_34").val(estimado_control.estimadoActual.total);
		jQuery("#t-cel_"+i+"_35").val(estimado_control.estimadoActual.otro_monto);
		jQuery("#t-cel_"+i+"_36").val(estimado_control.estimadoActual.otro_porciento);
		jQuery("#t-cel_"+i+"_37").val(estimado_control.estimadoActual.hora);
		jQuery("#t-cel_"+i+"_38").val(estimado_control.estimadoActual.retencion_ica_monto);
		jQuery("#t-cel_"+i+"_39").val(estimado_control.estimadoActual.retencion_ica_porciento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(estimado_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionimagen_estimado").click(function(){
		jQuery("#tblTablaDatosestimados").on("click",".imgrelacionimagen_estimado", function () {

			var idActual=jQuery(this).attr("idactualestimado");

			estimado_webcontrol1.registrarSesionParaimagen_estimados(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionestimado_detalle").click(function(){
		jQuery("#tblTablaDatosestimados").on("click",".imgrelacionestimado_detalle", function () {

			var idActual=jQuery(this).attr("idactualestimado");

			estimado_webcontrol1.registrarSesionParaestimado_detalles(idActual);
		});				
	}
		
	

	registrarSesionParaimagen_estimados(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"estimado","imagen_estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1,"s","");
	}

	registrarSesionParaestimado_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"estimado","estimado_detalle","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1,"s","");
	}
	
	registrarControlesTableEdition(estimado_control) {
		estimado_funcion1.registrarControlesTableValidacionEdition(estimado_control,estimado_webcontrol1,estimado_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(estimado_control) {
		jQuery("#divResumenestimadoActualAjaxWebPart").html(estimado_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(estimado_control) {
		//jQuery("#divAccionesRelacionesestimadoAjaxWebPart").html(estimado_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("estimado_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(estimado_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesestimadoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		estimado_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(estimado_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(estimado_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(estimado_control) {
		
		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",estimado_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",estimado_control.strVisibleFK_Idcliente);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",estimado_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",estimado_control.strVisibleFK_Idejercicio);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",estimado_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",estimado_control.strVisibleFK_Idempresa);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idestado").attr("style",estimado_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idestado").attr("style",estimado_control.strVisibleFK_Idestado);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",estimado_control.strVisibleFK_Idmoneda);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",estimado_control.strVisibleFK_Idmoneda);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",estimado_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",estimado_control.strVisibleFK_Idperiodo);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",estimado_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",estimado_control.strVisibleFK_Idproveedor);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",estimado_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",estimado_control.strVisibleFK_Idsucursal);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",estimado_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",estimado_control.strVisibleFK_Idtermino_pago);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",estimado_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",estimado_control.strVisibleFK_Idusuario);
		}

		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",estimado_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+estimado_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",estimado_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionestimado();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("estimado",id,"estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","empresa","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","sucursal","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","ejercicio","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","periodo","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","usuario","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","cliente","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","proveedor","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","vendedor","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","termino_pago_cliente","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParamoneda(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","moneda","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		estimado_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("estimado","estado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionimagen_estimado").click(function(){

			var idActual=jQuery(this).attr("idactualestimado");

			estimado_webcontrol1.registrarSesionParaimagen_estimados(idActual);
		});
		jQuery("#imgdivrelacionestimado_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualestimado");

			estimado_webcontrol1.registrarSesionParaestimado_detalles(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimadoConstante,strParametros);
		
		//estimado_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_empresa",estimado_control.empresasFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_3",estimado_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_sucursal",estimado_control.sucursalsFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_4",estimado_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_ejercicio",estimado_control.ejerciciosFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_5",estimado_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_periodo",estimado_control.periodosFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_6",estimado_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_usuario",estimado_control.usuariosFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_7",estimado_control.usuariosFK);
		}
	};

	cargarCombosclientesFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_cliente",estimado_control.clientesFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_9",estimado_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",estimado_control.clientesFK);

	};

	cargarCombosproveedorsFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_proveedor",estimado_control.proveedorsFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_10",estimado_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",estimado_control.proveedorsFK);

	};

	cargarCombosvendedorsFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_vendedor",estimado_control.vendedorsFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_14",estimado_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",estimado_control.vendedorsFK);

	};

	cargarCombostermino_pago_clientesFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_termino_pago_cliente",estimado_control.termino_pago_clientesFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_15",estimado_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",estimado_control.termino_pago_clientesFK);

	};

	cargarCombosmonedasFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_moneda",estimado_control.monedasFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_17",estimado_control.monedasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda",estimado_control.monedasFK);

	};

	cargarCombosestadosFK(estimado_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+estimado_constante1.STR_SUFIJO+"-id_estado",estimado_control.estadosFK);

		if(estimado_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+estimado_control.idFilaTablaActual+"_19",estimado_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+estimado_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",estimado_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(estimado_control) {

	};

	registrarComboActionChangeCombossucursalsFK(estimado_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(estimado_control) {

	};

	registrarComboActionChangeCombosperiodosFK(estimado_control) {

	};

	registrarComboActionChangeCombosusuariosFK(estimado_control) {

	};

	registrarComboActionChangeCombosclientesFK(estimado_control) {
		this.registrarComboActionChangeid_cliente("form"+estimado_constante1.STR_SUFIJO+"-id_cliente",false,0);


		this.registrarComboActionChangeid_cliente(""+estimado_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",false,0);


	};

	registrarComboActionChangeCombosproveedorsFK(estimado_control) {
		this.registrarComboActionChangeid_proveedor("form"+estimado_constante1.STR_SUFIJO+"-id_proveedor",false,0);


		this.registrarComboActionChangeid_proveedor(""+estimado_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(estimado_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(estimado_control) {

	};

	registrarComboActionChangeCombosmonedasFK(estimado_control) {

	};

	registrarComboActionChangeCombosestadosFK(estimado_control) {

	};

	
	
	setDefectoValorCombosempresasFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idempresaDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_empresa").val() != estimado_control.idempresaDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_empresa").val(estimado_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idsucursalDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_sucursal").val() != estimado_control.idsucursalDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_sucursal").val(estimado_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idejercicioDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_ejercicio").val() != estimado_control.idejercicioDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_ejercicio").val(estimado_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idperiodoDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_periodo").val() != estimado_control.idperiodoDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_periodo").val(estimado_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idusuarioDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_usuario").val() != estimado_control.idusuarioDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_usuario").val(estimado_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idclienteDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_cliente").val() != estimado_control.idclienteDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_cliente").val(estimado_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(estimado_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idproveedorDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_proveedor").val() != estimado_control.idproveedorDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_proveedor").val(estimado_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(estimado_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idvendedorDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_vendedor").val() != estimado_control.idvendedorDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_vendedor").val(estimado_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(estimado_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != estimado_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(estimado_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(estimado_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmonedasFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idmonedaDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_moneda").val() != estimado_control.idmonedaDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_moneda").val(estimado_control.idmonedaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(estimado_control.idmonedaDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(estimado_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(estimado_control.idestadoDefaultFK>-1 && jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_estado").val() != estimado_control.idestadoDefaultFK) {
				jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_estado").val(estimado_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(estimado_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+estimado_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_cliente(id_cliente,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("estimado","estimados","","id_cliente",id_cliente,"NINGUNO","",paraEventoTabla,idFilaTabla,estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}

	registrarComboActionChangeid_proveedor(id_proveedor,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("estimado","estimados","","id_proveedor",id_proveedor,"NINGUNO","",paraEventoTabla,idFilaTabla,estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	








		jQuery("#form-id_moneda").prop("disabled", habilitarDeshabilitar);
		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(estimado_constante1.BIT_ES_PAGINA_FORM==true) {
			
							imagen_estimado_webcontrol1.onLoadWindow();
							estimado_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(estimado_constante1.BIT_ES_PAGINA_FORM==true) {
			
		imagen_estimado_webcontrol1.onLoadRecargarRelacionado();
		estimado_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//estimado_control
		
	
	}
	
	onLoadCombosDefectoFK(estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosempresasFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombossucursalsFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosejerciciosFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosperiodosFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosusuariosFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosclientesFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosproveedorsFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosvendedorsFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosmonedasFK(estimado_control);
			}

			if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",estimado_control.strRecargarFkTipos,",")) { 
				estimado_webcontrol1.setDefectoValorCombosestadosFK(estimado_control);
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
	onLoadCombosEventosFK(estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosempresasFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombossucursalsFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosejerciciosFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosperiodosFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosusuariosFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosclientesFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosproveedorsFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosvendedorsFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosmonedasFK(estimado_control);
			//}

			//if(estimado_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",estimado_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				estimado_webcontrol1.registrarComboActionChangeCombosestadosFK(estimado_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(estimado_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estimado_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(estimado_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(estimado_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idcliente","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idejercicio","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idempresa","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idestado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idmoneda","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idperiodo","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idproveedor","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idsucursal","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idtermino_pago","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idusuario","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("estimado","FK_Idvendedor","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
		
			
			if(estimado_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("estimado");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("estimado");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(estimado_funcion1,estimado_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(estimado_funcion1,estimado_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(estimado_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,"estimado");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("moneda","id_moneda","contabilidad","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_moneda_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParamoneda("id_moneda");
				//alert(jQuery('#form-id_moneda_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+estimado_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				estimado_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("estimado");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(estimado_control) {
		
		jQuery("#divBusquedaestimadoAjaxWebPart").css("display",estimado_control.strPermisoBusqueda);
		jQuery("#trestimadoCabeceraBusquedas").css("display",estimado_control.strPermisoBusqueda);
		jQuery("#trBusquedaestimado").css("display",estimado_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteestimado").css("display",estimado_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosestimado").attr("style",estimado_control.strPermisoMostrarTodos);		
		
		if(estimado_control.strPermisoNuevo!=null) {
			jQuery("#tdestimadoNuevo").css("display",estimado_control.strPermisoNuevo);
			jQuery("#tdestimadoNuevoToolBar").css("display",estimado_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdestimadoDuplicar").css("display",estimado_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdestimadoDuplicarToolBar").css("display",estimado_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdestimadoNuevoGuardarCambios").css("display",estimado_control.strPermisoNuevo);
			jQuery("#tdestimadoNuevoGuardarCambiosToolBar").css("display",estimado_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(estimado_control.strPermisoActualizar!=null) {
			jQuery("#tdestimadoCopiar").css("display",estimado_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdestimadoCopiarToolBar").css("display",estimado_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdestimadoConEditar").css("display",estimado_control.strPermisoActualizar);
		}
		
		jQuery("#tdestimadoGuardarCambios").css("display",estimado_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdestimadoGuardarCambiosToolBar").css("display",estimado_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdestimadoCerrarPagina").css("display",estimado_control.strPermisoPopup);		
		jQuery("#tdestimadoCerrarPaginaToolBar").css("display",estimado_control.strPermisoPopup);
		//jQuery("#trestimadoAccionesRelaciones").css("display",estimado_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=estimado_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + estimado_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + estimado_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Estimados";
		sTituloBanner+=" - " + estimado_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + estimado_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdestimadoRelacionesToolBar").css("display",estimado_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosestimado").css("display",estimado_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("estimado","estimados","",estimado_funcion1,estimado_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		estimado_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		estimado_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		estimado_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		estimado_webcontrol1.registrarEventosControles();
		
		if(estimado_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(estimado_constante1.STR_ES_RELACIONADO=="false") {
			estimado_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(estimado_constante1.STR_ES_RELACIONES=="true") {
			if(estimado_constante1.BIT_ES_PAGINA_FORM==true) {
				estimado_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(estimado_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(estimado_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				estimado_webcontrol1.onLoad();
			
			//} else {
				//if(estimado_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			estimado_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("estimado","estimados","",estimado_funcion1,estimado_webcontrol1,estimado_constante1);	
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

var estimado_webcontrol1 = new estimado_webcontrol();

//Para ser llamado desde otro archivo (import)
export {estimado_webcontrol,estimado_webcontrol1};

//Para ser llamado desde window.opener
window.estimado_webcontrol1 = estimado_webcontrol1;


if(estimado_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = estimado_webcontrol1.onLoadWindow; 
}

//</script>