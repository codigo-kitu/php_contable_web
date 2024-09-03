//<script type="text/javascript" language="javascript">



//var facturaJQueryPaginaWebInteraccion= function (factura_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {factura_constante,factura_constante1} from '../util/factura_constante.js';

import {factura_funcion,factura_funcion1} from '../util/factura_funcion.js';


class factura_webcontrol extends GeneralEntityWebControl {
	
	factura_control=null;
	factura_controlInicial=null;
	factura_controlAuxiliar=null;
		
	//if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(factura_control) {
		super();
		
		this.factura_control=factura_control;
	}
		
	actualizarVariablesPagina(factura_control) {
		
		if(factura_control.action=="index" || factura_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(factura_control);
			
		} 
		
		
		else if(factura_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_control);
		
		} else if(factura_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(factura_control);
		
		} else if(factura_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_control);
		
		} else if(factura_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(factura_control);
			
		} else if(factura_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(factura_control);
			
		} else if(factura_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_control);
		
		} else if(factura_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_control);		
		
		} else if(factura_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(factura_control);
		
		} else if(factura_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(factura_control);
		
		} else if(factura_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(factura_control);
		
		} else if(factura_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(factura_control);
		
		}  else if(factura_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_control);
		
		} else if(factura_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(factura_control);
		
		} else if(factura_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(factura_control);
		
		} else if(factura_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(factura_control);
		
		} else if(factura_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(factura_control);
		
		} else if(factura_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_control);
		
		} else if(factura_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_control);
		
		} else if(factura_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(factura_control);
		
		} else if(factura_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_control);
		
		} else if(factura_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_control);		
		
		} else if(factura_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(factura_control);		
		
		} else if(factura_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(factura_control);		
		
		} else if(factura_control.action.includes("Busqueda") ||
				  factura_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(factura_control);
			
		} else if(factura_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(factura_control)
		}
		
		
		
	
		else if(factura_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(factura_control);	
		
		} else if(factura_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(factura_control);		
		}
	
		else if(factura_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(factura_control);		
		}
	
		else if(factura_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(factura_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + factura_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(factura_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(factura_control) {
		this.actualizarPaginaAccionesGenerales(factura_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(factura_control) {
		
		this.actualizarPaginaCargaGeneral(factura_control);
		this.actualizarPaginaOrderBy(factura_control);
		this.actualizarPaginaTablaDatos(factura_control);
		this.actualizarPaginaCargaGeneralControles(factura_control);
		//this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_control);
		this.actualizarPaginaAreaBusquedas(factura_control);
		this.actualizarPaginaCargaCombosFK(factura_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(factura_control) {
		//this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(factura_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(factura_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_control) {
		
		this.actualizarPaginaCargaGeneral(factura_control);
		this.actualizarPaginaTablaDatos(factura_control);
		this.actualizarPaginaCargaGeneralControles(factura_control);
		//this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_control);
		this.actualizarPaginaAreaBusquedas(factura_control);
		this.actualizarPaginaCargaCombosFK(factura_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		//this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		//this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		//this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(factura_control) {
		//this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_control) {
		this.actualizarPaginaAbrirLink(factura_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);				
		//this.actualizarPaginaFormulario(factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);
		//this.actualizarPaginaFormulario(factura_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);
		//this.actualizarPaginaFormulario(factura_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(factura_control) {
		//this.actualizarPaginaFormulario(factura_control);
		this.onLoadCombosDefectoFK(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);
		//this.actualizarPaginaFormulario(factura_control);
		this.onLoadCombosDefectoFK(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_control) {
		this.actualizarPaginaAbrirLink(factura_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_control) {
					//super.actualizarPaginaImprimir(factura_control,"factura");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",factura_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("factura_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(factura_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(factura_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_control) {
		//super.actualizarPaginaImprimir(factura_control,"factura");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("factura_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(factura_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",factura_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(factura_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(factura_control) {
		//super.actualizarPaginaImprimir(factura_control,"factura");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("factura_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(factura_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",factura_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(factura_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(factura_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(factura_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(factura_control);
			
		this.actualizarPaginaAbrirLink(factura_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(factura_control) {
		this.actualizarPaginaTablaDatos(factura_control);
		this.actualizarPaginaFormulario(factura_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_control);		
		this.actualizarPaginaAreaMantenimiento(factura_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(factura_control) {
		
		if(factura_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(factura_control);
		}
		
		if(factura_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(factura_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(factura_control) {
		if(factura_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("facturaReturnGeneral",JSON.stringify(factura_control.facturaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(factura_control) {
		if(factura_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(factura_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(factura_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(factura_control, mostrar) {
		
		if(mostrar==true) {
			factura_funcion1.resaltarRestaurarDivsPagina(false,"factura");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				factura_funcion1.resaltarRestaurarDivMantenimiento(false,"factura");
			}			
			
			factura_funcion1.mostrarDivMensaje(true,factura_control.strAuxiliarMensaje,factura_control.strAuxiliarCssMensaje);
		
		} else {
			factura_funcion1.mostrarDivMensaje(false,factura_control.strAuxiliarMensaje,factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(factura_control) {
		if(factura_funcion1.esPaginaForm(factura_constante1)==true) {
			window.opener.factura_webcontrol1.actualizarPaginaTablaDatos(factura_control);
		} else {
			this.actualizarPaginaTablaDatos(factura_control);
		}
	}
	
	actualizarPaginaAbrirLink(factura_control) {
		factura_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(factura_control.strAuxiliarUrlPagina);
				
		factura_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(factura_control.strAuxiliarTipo,factura_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(factura_control) {
		factura_funcion1.resaltarRestaurarDivMensaje(true,factura_control.strAuxiliarMensajeAlert,factura_control.strAuxiliarCssMensaje);
			
		if(factura_funcion1.esPaginaForm(factura_constante1)==true) {
			window.opener.factura_funcion1.resaltarRestaurarDivMensaje(true,factura_control.strAuxiliarMensajeAlert,factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(factura_control) {
		this.factura_controlInicial=factura_control;
			
		if(factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(factura_control.strStyleDivArbol,factura_control.strStyleDivContent
																,factura_control.strStyleDivOpcionesBanner,factura_control.strStyleDivExpandirColapsar
																,factura_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=factura_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",factura_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(factura_control) {
		this.actualizarCssBotonesPagina(factura_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(factura_control.tiposReportes,factura_control.tiposReporte
															 	,factura_control.tiposPaginacion,factura_control.tiposAcciones
																,factura_control.tiposColumnasSelect,factura_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(factura_control.tiposRelaciones,factura_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(factura_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(factura_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(factura_control);			
	}
	
	actualizarPaginaUsuarioInvitado(factura_control) {
	
		var indexPosition=factura_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=factura_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(factura_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosempresasFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombossucursalsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosejerciciosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosperiodosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosusuariosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosclientesFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosmonedasFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosvendedorsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombostermino_pago_clientesFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosestadosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosasientosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.cargarComboskardexsFK(factura_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(factura_control.strRecargarFkTiposNinguno!=null && factura_control.strRecargarFkTiposNinguno!='NINGUNO' && factura_control.strRecargarFkTiposNinguno!='') {
			
				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosempresasFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombossucursalsFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosejerciciosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosperiodosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosusuariosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosclientesFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_moneda",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosmonedasFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosvendedorsFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombostermino_pago_clientesFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosestadosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosasientosFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(factura_control);
				}

				if(factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",factura_control.strRecargarFkTiposNinguno,",")) { 
					factura_webcontrol1.cargarComboskardexsFK(factura_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_cliente") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+factura_constante1.STR_SUFIJO+"-id_cliente" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.facturaActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.facturaActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.facturaActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.usuariosFK);
	}

	cargarComboEditarTablaclienteFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.clientesFK);
	}

	cargarComboEditarTablamonedaFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.monedasFK);
	}

	cargarComboEditarTablavendedorFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablaestadoFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.estadosFK);
	}

	cargarComboEditarTablaasientoFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.asientosFK);
	}

	cargarComboEditarTabladocumento_cuenta_cobrarFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.documento_cuenta_cobrarsFK);
	}

	cargarComboEditarTablakardexFK(factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_funcion1,factura_control.kardexsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(factura_control) {
		jQuery("#divBusquedafacturaAjaxWebPart").css("display",factura_control.strPermisoBusqueda);
		jQuery("#trfacturaCabeceraBusquedas").css("display",factura_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura").css("display",factura_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(factura_control.htmlTablaOrderBy!=null
			&& factura_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByfacturaAjaxWebPart").html(factura_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//factura_webcontrol1.registrarOrderByActions();
			
		}
			
		if(factura_control.htmlTablaOrderByRel!=null
			&& factura_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelfacturaAjaxWebPart").html(factura_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(factura_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedafacturaAjaxWebPart").css("display","none");
			jQuery("#trfacturaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedafactura").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(factura_control) {
		
		if(!factura_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(factura_control);
		} else {
			jQuery("#divTablaDatosfacturasAjaxWebPart").html(factura_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosfacturas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(factura_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosfacturas=jQuery("#tblTablaDatosfacturas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("factura",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',factura_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			factura_webcontrol1.registrarControlesTableEdition(factura_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		factura_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(factura_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("factura_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(factura_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosfacturasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(factura_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(factura_control);
		
		const divOrderBy = document.getElementById("divOrderByfacturaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(factura_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelfacturaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(factura_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(factura_control.facturaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(factura_control);			
		}
	}
	
	actualizarCamposFilaTabla(factura_control) {
		var i=0;
		
		i=factura_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(factura_control.facturaActual.id);
		jQuery("#t-version_row_"+i+"").val(factura_control.facturaActual.versionRow);
		
		if(factura_control.facturaActual.id_empresa!=null && factura_control.facturaActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != factura_control.facturaActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(factura_control.facturaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_sucursal!=null && factura_control.facturaActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != factura_control.facturaActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(factura_control.facturaActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_ejercicio!=null && factura_control.facturaActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != factura_control.facturaActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(factura_control.facturaActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_periodo!=null && factura_control.facturaActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != factura_control.facturaActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(factura_control.facturaActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_usuario!=null && factura_control.facturaActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != factura_control.facturaActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(factura_control.facturaActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(factura_control.facturaActual.numero);
		
		if(factura_control.facturaActual.id_cliente!=null && factura_control.facturaActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != factura_control.facturaActual.id_cliente) {
				jQuery("#t-cel_"+i+"_8").val(factura_control.facturaActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(factura_control.facturaActual.ruc);
		jQuery("#t-cel_"+i+"_10").val(factura_control.facturaActual.referencia_cliente);
		jQuery("#t-cel_"+i+"_11").val(factura_control.facturaActual.fecha_emision);
		
		if(factura_control.facturaActual.id_moneda!=null && factura_control.facturaActual.id_moneda>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != factura_control.facturaActual.id_moneda) {
				jQuery("#t-cel_"+i+"_12").val(factura_control.facturaActual.id_moneda).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_vendedor!=null && factura_control.facturaActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != factura_control.facturaActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_13").val(factura_control.facturaActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_termino_pago_cliente!=null && factura_control.facturaActual.id_termino_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_14").val() != factura_control.facturaActual.id_termino_pago_cliente) {
				jQuery("#t-cel_"+i+"_14").val(factura_control.facturaActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_14").select2("val", null);
			if(jQuery("#t-cel_"+i+"_14").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_14").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_15").val(factura_control.facturaActual.fecha_vence);
		
		if(factura_control.facturaActual.id_estado!=null && factura_control.facturaActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_16").val() != factura_control.facturaActual.id_estado) {
				jQuery("#t-cel_"+i+"_16").val(factura_control.facturaActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_16").select2("val", null);
			if(jQuery("#t-cel_"+i+"_16").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_16").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_17").val(factura_control.facturaActual.direccion);
		jQuery("#t-cel_"+i+"_18").val(factura_control.facturaActual.enviar_a);
		jQuery("#t-cel_"+i+"_19").val(factura_control.facturaActual.observacion);
		jQuery("#t-cel_"+i+"_20").prop('checked',factura_control.facturaActual.impuesto_en_precio);
		jQuery("#t-cel_"+i+"_21").val(factura_control.facturaActual.sub_total);
		jQuery("#t-cel_"+i+"_22").val(factura_control.facturaActual.descuento_monto);
		jQuery("#t-cel_"+i+"_23").val(factura_control.facturaActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_24").val(factura_control.facturaActual.iva_monto);
		jQuery("#t-cel_"+i+"_25").val(factura_control.facturaActual.iva_porciento);
		jQuery("#t-cel_"+i+"_26").val(factura_control.facturaActual.retencion_fuente_monto);
		jQuery("#t-cel_"+i+"_27").val(factura_control.facturaActual.retencion_fuente_porciento);
		jQuery("#t-cel_"+i+"_28").val(factura_control.facturaActual.retencion_iva_monto);
		jQuery("#t-cel_"+i+"_29").val(factura_control.facturaActual.retencion_iva_porciento);
		jQuery("#t-cel_"+i+"_30").val(factura_control.facturaActual.total);
		jQuery("#t-cel_"+i+"_31").val(factura_control.facturaActual.hora);
		jQuery("#t-cel_"+i+"_32").val(factura_control.facturaActual.cotizacion);
		jQuery("#t-cel_"+i+"_33").val(factura_control.facturaActual.otro_monto);
		jQuery("#t-cel_"+i+"_34").val(factura_control.facturaActual.otro_porciento);
		jQuery("#t-cel_"+i+"_35").val(factura_control.facturaActual.retencion_ica_porciento);
		jQuery("#t-cel_"+i+"_36").val(factura_control.facturaActual.retencion_ica_monto);
		
		if(factura_control.facturaActual.id_asiento!=null && factura_control.facturaActual.id_asiento>-1){
			if(jQuery("#t-cel_"+i+"_37").val() != factura_control.facturaActual.id_asiento) {
				jQuery("#t-cel_"+i+"_37").val(factura_control.facturaActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_37").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_37").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_documento_cuenta_cobrar!=null && factura_control.facturaActual.id_documento_cuenta_cobrar>-1){
			if(jQuery("#t-cel_"+i+"_38").val() != factura_control.facturaActual.id_documento_cuenta_cobrar) {
				jQuery("#t-cel_"+i+"_38").val(factura_control.facturaActual.id_documento_cuenta_cobrar).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_38").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_38").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_control.facturaActual.id_kardex!=null && factura_control.facturaActual.id_kardex>-1){
			if(jQuery("#t-cel_"+i+"_39").val() != factura_control.facturaActual.id_kardex) {
				jQuery("#t-cel_"+i+"_39").val(factura_control.facturaActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_39").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_39").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(factura_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura_detalle").click(function(){
		jQuery("#tblTablaDatosfacturas").on("click",".imgrelacionfactura_detalle", function () {

			var idActual=jQuery(this).attr("idactualfactura");

			factura_webcontrol1.registrarSesionParafactura_detalles(idActual);
		});				
	}
		
	

	registrarSesionParafactura_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"factura","factura_detalle","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1,"s","");
	}
	
	registrarControlesTableEdition(factura_control) {
		factura_funcion1.registrarControlesTableValidacionEdition(factura_control,factura_webcontrol1,factura_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(factura_control) {
		jQuery("#divResumenfacturaActualAjaxWebPart").html(factura_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_control) {
		//jQuery("#divAccionesRelacionesfacturaAjaxWebPart").html(factura_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("factura_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(factura_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesfacturaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		factura_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(factura_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(factura_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(factura_control) {
		
		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",factura_control.strVisibleFK_Idasiento);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",factura_control.strVisibleFK_Idasiento);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",factura_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",factura_control.strVisibleFK_Idcliente);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",factura_control.strVisibleFK_Iddocumento_cuenta_cobrar);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",factura_control.strVisibleFK_Iddocumento_cuenta_cobrar);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",factura_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",factura_control.strVisibleFK_Idejercicio);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",factura_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",factura_control.strVisibleFK_Idempresa);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idestado").attr("style",factura_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idestado").attr("style",factura_control.strVisibleFK_Idestado);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",factura_control.strVisibleFK_Idkardex);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",factura_control.strVisibleFK_Idkardex);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",factura_control.strVisibleFK_Idmoneda);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",factura_control.strVisibleFK_Idmoneda);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",factura_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",factura_control.strVisibleFK_Idperiodo);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",factura_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",factura_control.strVisibleFK_Idsucursal);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",factura_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",factura_control.strVisibleFK_Idtermino_pago);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",factura_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",factura_control.strVisibleFK_Idusuario);
		}

		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",factura_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+factura_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",factura_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionfactura();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("factura","facturacion","",factura_funcion1,factura_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("factura",id,"facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","empresa","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","sucursal","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","ejercicio","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","periodo","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","usuario","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","cliente","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParamoneda(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","moneda","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","vendedor","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","termino_pago_cliente","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","estado","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParaasiento(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","asiento","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParadocumento_cuenta_cobrar(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","documento_cuenta_cobrar","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}

	abrirBusquedaParakardex(strNombreCampoBusqueda){//idActual
		factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura","kardex","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionfactura_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualfactura");

			factura_webcontrol1.registrarSesionParafactura_detalles(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,facturaConstante,strParametros);
		
		//factura_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_empresa",factura_control.empresasFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_2",factura_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal",factura_control.sucursalsFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_3",factura_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio",factura_control.ejerciciosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_4",factura_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_periodo",factura_control.periodosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_5",factura_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_usuario",factura_control.usuariosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_6",factura_control.usuariosFK);
		}
	};

	cargarCombosclientesFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_cliente",factura_control.clientesFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_8",factura_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",factura_control.clientesFK);

	};

	cargarCombosmonedasFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_moneda",factura_control.monedasFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_12",factura_control.monedasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda",factura_control.monedasFK);

	};

	cargarCombosvendedorsFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor",factura_control.vendedorsFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_13",factura_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",factura_control.vendedorsFK);

	};

	cargarCombostermino_pago_clientesFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente",factura_control.termino_pago_clientesFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_14",factura_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",factura_control.termino_pago_clientesFK);

	};

	cargarCombosestadosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_estado",factura_control.estadosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_16",factura_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",factura_control.estadosFK);

	};

	cargarCombosasientosFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_asiento",factura_control.asientosFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_37",factura_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",factura_control.asientosFK);

	};

	cargarCombosdocumento_cuenta_cobrarsFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar",factura_control.documento_cuenta_cobrarsFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_38",factura_control.documento_cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar",factura_control.documento_cuenta_cobrarsFK);

	};

	cargarComboskardexsFK(factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_constante1.STR_SUFIJO+"-id_kardex",factura_control.kardexsFK);

		if(factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_control.idFilaTablaActual+"_39",factura_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",factura_control.kardexsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(factura_control) {

	};

	registrarComboActionChangeCombossucursalsFK(factura_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(factura_control) {

	};

	registrarComboActionChangeCombosperiodosFK(factura_control) {

	};

	registrarComboActionChangeCombosusuariosFK(factura_control) {

	};

	registrarComboActionChangeCombosclientesFK(factura_control) {
		this.registrarComboActionChangeid_cliente("form"+factura_constante1.STR_SUFIJO+"-id_cliente",false,0);


		this.registrarComboActionChangeid_cliente(""+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",false,0);


	};

	registrarComboActionChangeCombosmonedasFK(factura_control) {

	};

	registrarComboActionChangeCombosvendedorsFK(factura_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(factura_control) {

	};

	registrarComboActionChangeCombosestadosFK(factura_control) {

	};

	registrarComboActionChangeCombosasientosFK(factura_control) {

	};

	registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(factura_control) {

	};

	registrarComboActionChangeComboskardexsFK(factura_control) {

	};

	
	
	setDefectoValorCombosempresasFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idempresaDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").val() != factura_control.idempresaDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa").val(factura_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idsucursalDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").val() != factura_control.idsucursalDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal").val(factura_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idejercicioDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").val() != factura_control.idejercicioDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio").val(factura_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idperiodoDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").val() != factura_control.idperiodoDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo").val(factura_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idusuarioDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").val() != factura_control.idusuarioDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario").val(factura_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idclienteDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").val() != factura_control.idclienteDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente").val(factura_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(factura_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmonedasFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idmonedaDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_moneda").val() != factura_control.idmonedaDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_moneda").val(factura_control.idmonedaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(factura_control.idmonedaDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idvendedorDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").val() != factura_control.idvendedorDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor").val(factura_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(factura_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != factura_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(factura_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(factura_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idestadoDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").val() != factura_control.idestadoDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado").val(factura_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(factura_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idasientoDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento").val() != factura_control.idasientoDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento").val(factura_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(factura_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_cuenta_cobrarsFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.iddocumento_cuenta_cobrarDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != factura_control.iddocumento_cuenta_cobrarDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(factura_control.iddocumento_cuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(factura_control.iddocumento_cuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardexsFK(factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_control.idkardexDefaultFK>-1 && jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex").val() != factura_control.idkardexDefaultFK) {
				jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex").val(factura_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(factura_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_cliente(id_cliente,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("factura","facturacion","","id_cliente",id_cliente,"NINGUNO","",paraEventoTabla,idFilaTabla,factura_funcion1,factura_webcontrol1,factura_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	





		jQuery("#form-id_moneda").prop("disabled", habilitarDeshabilitar);


		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(factura_constante1.BIT_ES_PAGINA_FORM==true) {
			
							factura_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(factura_constante1.BIT_ES_PAGINA_FORM==true) {
			
		factura_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//factura_control
		
	
	}
	
	onLoadCombosDefectoFK(factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosempresasFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombossucursalsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosejerciciosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosperiodosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosusuariosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosclientesFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosmonedasFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosvendedorsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosestadosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosasientosFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorCombosdocumento_cuenta_cobrarsFK(factura_control);
			}

			if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_control.strRecargarFkTipos,",")) { 
				factura_webcontrol1.setDefectoValorComboskardexsFK(factura_control);
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
	onLoadCombosEventosFK(factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosempresasFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombossucursalsFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosejerciciosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosperiodosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosusuariosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosclientesFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosmonedasFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosvendedorsFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosestadosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosasientosFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(factura_control);
			//}

			//if(factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_webcontrol1.registrarComboActionChangeComboskardexsFK(factura_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(factura_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(factura_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("factura","facturacion","",factura_funcion1,factura_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("factura","facturacion","",factura_funcion1,factura_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idasiento","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idcliente","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Iddocumento_cuenta_cobrar","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idejercicio","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idempresa","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idestado","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idkardex","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idmoneda","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idperiodo","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idsucursal","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idtermino_pago","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idusuario","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura","FK_Idvendedor","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
		
			
			if(factura_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("factura","facturacion","",factura_funcion1,factura_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("factura");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("factura");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(factura_funcion1,factura_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(factura_funcion1,factura_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(factura_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("factura","facturacion","",factura_funcion1,factura_webcontrol1,"factura");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("moneda","id_moneda","contabilidad","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_moneda_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParamoneda("id_moneda");
				//alert(jQuery('#form-id_moneda_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_cobrar","id_documento_cuenta_cobrar","cuentascobrar","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParadocumento_cuenta_cobrar("id_documento_cuenta_cobrar");
				//alert(jQuery('#form-id_documento_cuenta_cobrar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",factura_funcion1,factura_webcontrol1,factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				factura_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("factura","facturacion","",factura_funcion1,factura_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("factura");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(factura_control) {
		
		jQuery("#divBusquedafacturaAjaxWebPart").css("display",factura_control.strPermisoBusqueda);
		jQuery("#trfacturaCabeceraBusquedas").css("display",factura_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura").css("display",factura_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportefactura").css("display",factura_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosfactura").attr("style",factura_control.strPermisoMostrarTodos);		
		
		if(factura_control.strPermisoNuevo!=null) {
			jQuery("#tdfacturaNuevo").css("display",factura_control.strPermisoNuevo);
			jQuery("#tdfacturaNuevoToolBar").css("display",factura_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdfacturaDuplicar").css("display",factura_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfacturaDuplicarToolBar").css("display",factura_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfacturaNuevoGuardarCambios").css("display",factura_control.strPermisoNuevo);
			jQuery("#tdfacturaNuevoGuardarCambiosToolBar").css("display",factura_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(factura_control.strPermisoActualizar!=null) {
			jQuery("#tdfacturaCopiar").css("display",factura_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfacturaCopiarToolBar").css("display",factura_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfacturaConEditar").css("display",factura_control.strPermisoActualizar);
		}
		
		jQuery("#tdfacturaGuardarCambios").css("display",factura_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdfacturaGuardarCambiosToolBar").css("display",factura_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdfacturaCerrarPagina").css("display",factura_control.strPermisoPopup);		
		jQuery("#tdfacturaCerrarPaginaToolBar").css("display",factura_control.strPermisoPopup);
		//jQuery("#trfacturaAccionesRelaciones").css("display",factura_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=factura_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + factura_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + factura_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Facturas";
		sTituloBanner+=" - " + factura_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + factura_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdfacturaRelacionesToolBar").css("display",factura_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosfactura").css("display",factura_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("factura","facturacion","",factura_funcion1,factura_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		factura_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		factura_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		factura_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		factura_webcontrol1.registrarEventosControles();
		
		if(factura_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(factura_constante1.STR_ES_RELACIONADO=="false") {
			factura_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(factura_constante1.STR_ES_RELACIONES=="true") {
			if(factura_constante1.BIT_ES_PAGINA_FORM==true) {
				factura_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(factura_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(factura_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				factura_webcontrol1.onLoad();
			
			//} else {
				//if(factura_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			factura_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("factura","facturacion","",factura_funcion1,factura_webcontrol1,factura_constante1);	
	}
}

var factura_webcontrol1 = new factura_webcontrol();

//Para ser llamado desde otro archivo (import)
export {factura_webcontrol,factura_webcontrol1};

//Para ser llamado desde window.opener
window.factura_webcontrol1 = factura_webcontrol1;


if(factura_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = factura_webcontrol1.onLoadWindow; 
}

//</script>