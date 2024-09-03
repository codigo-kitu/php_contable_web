//<script type="text/javascript" language="javascript">



//var instrumento_pagoJQueryPaginaWebInteraccion= function (instrumento_pago_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {instrumento_pago_constante,instrumento_pago_constante1} from '../util/instrumento_pago_constante.js';

import {instrumento_pago_funcion,instrumento_pago_funcion1} from '../util/instrumento_pago_funcion.js';


class instrumento_pago_webcontrol extends GeneralEntityWebControl {
	
	instrumento_pago_control=null;
	instrumento_pago_controlInicial=null;
	instrumento_pago_controlAuxiliar=null;
		
	//if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(instrumento_pago_control) {
		super();
		
		this.instrumento_pago_control=instrumento_pago_control;
	}
		
	actualizarVariablesPagina(instrumento_pago_control) {
		
		if(instrumento_pago_control.action=="index" || instrumento_pago_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(instrumento_pago_control);
			
		} 
		
		
		else if(instrumento_pago_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(instrumento_pago_control);
			
		} else if(instrumento_pago_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(instrumento_pago_control);
			
		} else if(instrumento_pago_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(instrumento_pago_control);		
		
		} else if(instrumento_pago_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(instrumento_pago_control);
		
		}  else if(instrumento_pago_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(instrumento_pago_control);
		
		} else if(instrumento_pago_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(instrumento_pago_control);		
		
		} else if(instrumento_pago_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(instrumento_pago_control);		
		
		} else if(instrumento_pago_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(instrumento_pago_control);		
		
		} else if(instrumento_pago_control.action.includes("Busqueda") ||
				  instrumento_pago_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(instrumento_pago_control);
			
		} else if(instrumento_pago_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(instrumento_pago_control)
		}
		
		
		
	
		else if(instrumento_pago_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(instrumento_pago_control);	
		
		} else if(instrumento_pago_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(instrumento_pago_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + instrumento_pago_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(instrumento_pago_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(instrumento_pago_control) {
		this.actualizarPaginaAccionesGenerales(instrumento_pago_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(instrumento_pago_control) {
		
		this.actualizarPaginaCargaGeneral(instrumento_pago_control);
		this.actualizarPaginaOrderBy(instrumento_pago_control);
		this.actualizarPaginaTablaDatos(instrumento_pago_control);
		this.actualizarPaginaCargaGeneralControles(instrumento_pago_control);
		//this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(instrumento_pago_control);
		this.actualizarPaginaAreaBusquedas(instrumento_pago_control);
		this.actualizarPaginaCargaCombosFK(instrumento_pago_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(instrumento_pago_control) {
		//this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(instrumento_pago_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(instrumento_pago_control) {
		
		this.actualizarPaginaCargaGeneral(instrumento_pago_control);
		this.actualizarPaginaTablaDatos(instrumento_pago_control);
		this.actualizarPaginaCargaGeneralControles(instrumento_pago_control);
		//this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(instrumento_pago_control);
		this.actualizarPaginaAreaBusquedas(instrumento_pago_control);
		this.actualizarPaginaCargaCombosFK(instrumento_pago_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		//this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		//this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		//this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		//this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		//this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		//this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(instrumento_pago_control) {
		//this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(instrumento_pago_control) {
		this.actualizarPaginaAbrirLink(instrumento_pago_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);				
		//this.actualizarPaginaFormulario(instrumento_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);
		//this.actualizarPaginaFormulario(instrumento_pago_control);
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		//this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);
		//this.actualizarPaginaFormulario(instrumento_pago_control);
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(instrumento_pago_control) {
		//this.actualizarPaginaFormulario(instrumento_pago_control);
		this.onLoadCombosDefectoFK(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);
		//this.actualizarPaginaFormulario(instrumento_pago_control);
		this.onLoadCombosDefectoFK(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);		
		//this.actualizarPaginaAreaMantenimiento(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(instrumento_pago_control) {
		this.actualizarPaginaAbrirLink(instrumento_pago_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(instrumento_pago_control) {
		this.actualizarPaginaTablaDatos(instrumento_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(instrumento_pago_control) {
					//super.actualizarPaginaImprimir(instrumento_pago_control,"instrumento_pago");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",instrumento_pago_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("instrumento_pago_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(instrumento_pago_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(instrumento_pago_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(instrumento_pago_control) {
		//super.actualizarPaginaImprimir(instrumento_pago_control,"instrumento_pago");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("instrumento_pago_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(instrumento_pago_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",instrumento_pago_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(instrumento_pago_control) {
		//super.actualizarPaginaImprimir(instrumento_pago_control,"instrumento_pago");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("instrumento_pago_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(instrumento_pago_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",instrumento_pago_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(instrumento_pago_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(instrumento_pago_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(instrumento_pago_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(instrumento_pago_control);
			
		this.actualizarPaginaAbrirLink(instrumento_pago_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(instrumento_pago_control) {
		
		if(instrumento_pago_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(instrumento_pago_control);
		}
		
		if(instrumento_pago_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(instrumento_pago_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(instrumento_pago_control) {
		if(instrumento_pago_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("instrumento_pagoReturnGeneral",JSON.stringify(instrumento_pago_control.instrumento_pagoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(instrumento_pago_control) {
		if(instrumento_pago_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && instrumento_pago_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(instrumento_pago_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(instrumento_pago_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(instrumento_pago_control, mostrar) {
		
		if(mostrar==true) {
			instrumento_pago_funcion1.resaltarRestaurarDivsPagina(false,"instrumento_pago");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				instrumento_pago_funcion1.resaltarRestaurarDivMantenimiento(false,"instrumento_pago");
			}			
			
			instrumento_pago_funcion1.mostrarDivMensaje(true,instrumento_pago_control.strAuxiliarMensaje,instrumento_pago_control.strAuxiliarCssMensaje);
		
		} else {
			instrumento_pago_funcion1.mostrarDivMensaje(false,instrumento_pago_control.strAuxiliarMensaje,instrumento_pago_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(instrumento_pago_control) {
		if(instrumento_pago_funcion1.esPaginaForm(instrumento_pago_constante1)==true) {
			window.opener.instrumento_pago_webcontrol1.actualizarPaginaTablaDatos(instrumento_pago_control);
		} else {
			this.actualizarPaginaTablaDatos(instrumento_pago_control);
		}
	}
	
	actualizarPaginaAbrirLink(instrumento_pago_control) {
		instrumento_pago_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(instrumento_pago_control.strAuxiliarUrlPagina);
				
		instrumento_pago_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(instrumento_pago_control.strAuxiliarTipo,instrumento_pago_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(instrumento_pago_control) {
		instrumento_pago_funcion1.resaltarRestaurarDivMensaje(true,instrumento_pago_control.strAuxiliarMensajeAlert,instrumento_pago_control.strAuxiliarCssMensaje);
			
		if(instrumento_pago_funcion1.esPaginaForm(instrumento_pago_constante1)==true) {
			window.opener.instrumento_pago_funcion1.resaltarRestaurarDivMensaje(true,instrumento_pago_control.strAuxiliarMensajeAlert,instrumento_pago_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(instrumento_pago_control) {
		this.instrumento_pago_controlInicial=instrumento_pago_control;
			
		if(instrumento_pago_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(instrumento_pago_control.strStyleDivArbol,instrumento_pago_control.strStyleDivContent
																,instrumento_pago_control.strStyleDivOpcionesBanner,instrumento_pago_control.strStyleDivExpandirColapsar
																,instrumento_pago_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=instrumento_pago_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",instrumento_pago_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(instrumento_pago_control) {
		this.actualizarCssBotonesPagina(instrumento_pago_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(instrumento_pago_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(instrumento_pago_control.tiposReportes,instrumento_pago_control.tiposReporte
															 	,instrumento_pago_control.tiposPaginacion,instrumento_pago_control.tiposAcciones
																,instrumento_pago_control.tiposColumnasSelect,instrumento_pago_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(instrumento_pago_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(instrumento_pago_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(instrumento_pago_control);			
	}
	
	actualizarPaginaUsuarioInvitado(instrumento_pago_control) {
	
		var indexPosition=instrumento_pago_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=instrumento_pago_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(instrumento_pago_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.cargarComboscuenta_comprassFK(instrumento_pago_control);
			}

			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.cargarComboscuenta_ventassFK(instrumento_pago_control);
			}

			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.cargarComboscuenta_corrientesFK(instrumento_pago_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(instrumento_pago_control.strRecargarFkTiposNinguno!=null && instrumento_pago_control.strRecargarFkTiposNinguno!='NINGUNO' && instrumento_pago_control.strRecargarFkTiposNinguno!='') {
			
				if(instrumento_pago_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",instrumento_pago_control.strRecargarFkTiposNinguno,",")) { 
					instrumento_pago_webcontrol1.cargarComboscuenta_comprassFK(instrumento_pago_control);
				}

				if(instrumento_pago_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",instrumento_pago_control.strRecargarFkTiposNinguno,",")) { 
					instrumento_pago_webcontrol1.cargarComboscuenta_ventassFK(instrumento_pago_control);
				}

				if(instrumento_pago_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",instrumento_pago_control.strRecargarFkTiposNinguno,",")) { 
					instrumento_pago_webcontrol1.cargarComboscuenta_corrientesFK(instrumento_pago_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablacuenta_comprasFK(instrumento_pago_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,instrumento_pago_funcion1,instrumento_pago_control.cuenta_comprassFK);
	}

	cargarComboEditarTablacuenta_ventasFK(instrumento_pago_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,instrumento_pago_funcion1,instrumento_pago_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(instrumento_pago_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,instrumento_pago_funcion1,instrumento_pago_control.cuenta_corrientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(instrumento_pago_control) {
		jQuery("#divBusquedainstrumento_pagoAjaxWebPart").css("display",instrumento_pago_control.strPermisoBusqueda);
		jQuery("#trinstrumento_pagoCabeceraBusquedas").css("display",instrumento_pago_control.strPermisoBusqueda);
		jQuery("#trBusquedainstrumento_pago").css("display",instrumento_pago_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(instrumento_pago_control.htmlTablaOrderBy!=null
			&& instrumento_pago_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByinstrumento_pagoAjaxWebPart").html(instrumento_pago_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//instrumento_pago_webcontrol1.registrarOrderByActions();
			
		}
			
		if(instrumento_pago_control.htmlTablaOrderByRel!=null
			&& instrumento_pago_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelinstrumento_pagoAjaxWebPart").html(instrumento_pago_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(instrumento_pago_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedainstrumento_pagoAjaxWebPart").css("display","none");
			jQuery("#trinstrumento_pagoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedainstrumento_pago").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(instrumento_pago_control) {
		
		if(!instrumento_pago_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(instrumento_pago_control);
		} else {
			jQuery("#divTablaDatosinstrumento_pagosAjaxWebPart").html(instrumento_pago_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosinstrumento_pagos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(instrumento_pago_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosinstrumento_pagos=jQuery("#tblTablaDatosinstrumento_pagos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("instrumento_pago",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',instrumento_pago_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			instrumento_pago_webcontrol1.registrarControlesTableEdition(instrumento_pago_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		instrumento_pago_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(instrumento_pago_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("instrumento_pago_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(instrumento_pago_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosinstrumento_pagosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(instrumento_pago_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(instrumento_pago_control);
		
		const divOrderBy = document.getElementById("divOrderByinstrumento_pagoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(instrumento_pago_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelinstrumento_pagoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(instrumento_pago_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(instrumento_pago_control.instrumento_pagoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(instrumento_pago_control);			
		}
	}
	
	actualizarCamposFilaTabla(instrumento_pago_control) {
		var i=0;
		
		i=instrumento_pago_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(instrumento_pago_control.instrumento_pagoActual.id);
		jQuery("#t-version_row_"+i+"").val(instrumento_pago_control.instrumento_pagoActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(instrumento_pago_control.instrumento_pagoActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(instrumento_pago_control.instrumento_pagoActual.descripcion);
		jQuery("#t-cel_"+i+"_4").val(instrumento_pago_control.instrumento_pagoActual.predeterminado);
		
		if(instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras!=null && instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras) {
				jQuery("#t-cel_"+i+"_5").val(instrumento_pago_control.instrumento_pagoActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas!=null && instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas) {
				jQuery("#t-cel_"+i+"_6").val(instrumento_pago_control.instrumento_pagoActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(instrumento_pago_control.instrumento_pagoActual.cuenta_contable_compra);
		jQuery("#t-cel_"+i+"_8").val(instrumento_pago_control.instrumento_pagoActual.cuenta_contable_ventas);
		
		if(instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente!=null && instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente) {
				jQuery("#t-cel_"+i+"_9").val(instrumento_pago_control.instrumento_pagoActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_9").select2("val", null);
			if(jQuery("#t-cel_"+i+"_9").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(instrumento_pago_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(instrumento_pago_control) {
		instrumento_pago_funcion1.registrarControlesTableValidacionEdition(instrumento_pago_control,instrumento_pago_webcontrol1,instrumento_pago_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(instrumento_pago_control) {
		jQuery("#divResumeninstrumento_pagoActualAjaxWebPart").html(instrumento_pago_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(instrumento_pago_control) {
		//jQuery("#divAccionesRelacionesinstrumento_pagoAjaxWebPart").html(instrumento_pago_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("instrumento_pago_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(instrumento_pago_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesinstrumento_pagoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		instrumento_pago_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(instrumento_pago_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(instrumento_pago_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(instrumento_pago_control) {
		
		if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",instrumento_pago_control.strVisibleFK_Idcuenta_compras);
			jQuery("#tblstrVisible"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",instrumento_pago_control.strVisibleFK_Idcuenta_compras);
		}

		if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",instrumento_pago_control.strVisibleFK_Idcuenta_corriente);
			jQuery("#tblstrVisible"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",instrumento_pago_control.strVisibleFK_Idcuenta_corriente);
		}

		if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",instrumento_pago_control.strVisibleFK_Idcuenta_ventas);
			jQuery("#tblstrVisible"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",instrumento_pago_control.strVisibleFK_Idcuenta_ventas);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioninstrumento_pago();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("instrumento_pago",id,"cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);		
	}
	
	

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		instrumento_pago_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("instrumento_pago","cuenta","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		instrumento_pago_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("instrumento_pago","cuenta","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
	}

	abrirBusquedaParacuenta_corriente(strNombreCampoBusqueda){//idActual
		instrumento_pago_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("instrumento_pago","cuenta_corriente","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pagoConstante,strParametros);
		
		//instrumento_pago_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarComboscuenta_comprassFK(instrumento_pago_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras",instrumento_pago_control.cuenta_comprassFK);

		if(instrumento_pago_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+instrumento_pago_control.idFilaTablaActual+"_5",instrumento_pago_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",instrumento_pago_control.cuenta_comprassFK);

	};

	cargarComboscuenta_ventassFK(instrumento_pago_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas",instrumento_pago_control.cuenta_ventassFK);

		if(instrumento_pago_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+instrumento_pago_control.idFilaTablaActual+"_6",instrumento_pago_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",instrumento_pago_control.cuenta_ventassFK);

	};

	cargarComboscuenta_corrientesFK(instrumento_pago_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente",instrumento_pago_control.cuenta_corrientesFK);

		if(instrumento_pago_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+instrumento_pago_control.idFilaTablaActual+"_9",instrumento_pago_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",instrumento_pago_control.cuenta_corrientesFK);

	};

	
	
	registrarComboActionChangeComboscuenta_comprassFK(instrumento_pago_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(instrumento_pago_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(instrumento_pago_control) {

	};

	
	
	setDefectoValorComboscuenta_comprassFK(instrumento_pago_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(instrumento_pago_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != instrumento_pago_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras").val(instrumento_pago_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(instrumento_pago_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(instrumento_pago_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(instrumento_pago_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != instrumento_pago_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(instrumento_pago_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(instrumento_pago_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(instrumento_pago_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(instrumento_pago_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != instrumento_pago_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(instrumento_pago_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(instrumento_pago_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+instrumento_pago_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//instrumento_pago_control
		
	
	}
	
	onLoadCombosDefectoFK(instrumento_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(instrumento_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.setDefectoValorComboscuenta_comprassFK(instrumento_pago_control);
			}

			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.setDefectoValorComboscuenta_ventassFK(instrumento_pago_control);
			}

			if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",instrumento_pago_control.strRecargarFkTipos,",")) { 
				instrumento_pago_webcontrol1.setDefectoValorComboscuenta_corrientesFK(instrumento_pago_control);
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
	onLoadCombosEventosFK(instrumento_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(instrumento_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",instrumento_pago_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				instrumento_pago_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(instrumento_pago_control);
			//}

			//if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",instrumento_pago_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				instrumento_pago_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(instrumento_pago_control);
			//}

			//if(instrumento_pago_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",instrumento_pago_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				instrumento_pago_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(instrumento_pago_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(instrumento_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(instrumento_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(instrumento_pago_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("instrumento_pago","FK_Idcuenta_compras","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("instrumento_pago","FK_Idcuenta_corriente","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("instrumento_pago","FK_Idcuenta_ventas","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
		
			
			if(instrumento_pago_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("instrumento_pago");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("instrumento_pago");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(instrumento_pago_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,"instrumento_pago");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				instrumento_pago_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				instrumento_pago_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+instrumento_pago_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				instrumento_pago_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(instrumento_pago_control) {
		
		jQuery("#divBusquedainstrumento_pagoAjaxWebPart").css("display",instrumento_pago_control.strPermisoBusqueda);
		jQuery("#trinstrumento_pagoCabeceraBusquedas").css("display",instrumento_pago_control.strPermisoBusqueda);
		jQuery("#trBusquedainstrumento_pago").css("display",instrumento_pago_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteinstrumento_pago").css("display",instrumento_pago_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosinstrumento_pago").attr("style",instrumento_pago_control.strPermisoMostrarTodos);		
		
		if(instrumento_pago_control.strPermisoNuevo!=null) {
			jQuery("#tdinstrumento_pagoNuevo").css("display",instrumento_pago_control.strPermisoNuevo);
			jQuery("#tdinstrumento_pagoNuevoToolBar").css("display",instrumento_pago_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdinstrumento_pagoDuplicar").css("display",instrumento_pago_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdinstrumento_pagoDuplicarToolBar").css("display",instrumento_pago_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdinstrumento_pagoNuevoGuardarCambios").css("display",instrumento_pago_control.strPermisoNuevo);
			jQuery("#tdinstrumento_pagoNuevoGuardarCambiosToolBar").css("display",instrumento_pago_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(instrumento_pago_control.strPermisoActualizar!=null) {
			jQuery("#tdinstrumento_pagoCopiar").css("display",instrumento_pago_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdinstrumento_pagoCopiarToolBar").css("display",instrumento_pago_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdinstrumento_pagoConEditar").css("display",instrumento_pago_control.strPermisoActualizar);
		}
		
		jQuery("#tdinstrumento_pagoGuardarCambios").css("display",instrumento_pago_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdinstrumento_pagoGuardarCambiosToolBar").css("display",instrumento_pago_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdinstrumento_pagoCerrarPagina").css("display",instrumento_pago_control.strPermisoPopup);		
		jQuery("#tdinstrumento_pagoCerrarPaginaToolBar").css("display",instrumento_pago_control.strPermisoPopup);
		//jQuery("#trinstrumento_pagoAccionesRelaciones").css("display",instrumento_pago_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=instrumento_pago_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + instrumento_pago_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + instrumento_pago_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Instrumento Pagos";
		sTituloBanner+=" - " + instrumento_pago_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + instrumento_pago_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdinstrumento_pagoRelacionesToolBar").css("display",instrumento_pago_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosinstrumento_pago").css("display",instrumento_pago_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		instrumento_pago_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		instrumento_pago_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		instrumento_pago_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		instrumento_pago_webcontrol1.registrarEventosControles();
		
		if(instrumento_pago_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(instrumento_pago_constante1.STR_ES_RELACIONADO=="false") {
			instrumento_pago_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(instrumento_pago_constante1.STR_ES_RELACIONES=="true") {
			if(instrumento_pago_constante1.BIT_ES_PAGINA_FORM==true) {
				instrumento_pago_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(instrumento_pago_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(instrumento_pago_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				instrumento_pago_webcontrol1.onLoad();
			
			//} else {
				//if(instrumento_pago_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			instrumento_pago_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("instrumento_pago","cuentascorrientes","",instrumento_pago_funcion1,instrumento_pago_webcontrol1,instrumento_pago_constante1);	
	}
}

var instrumento_pago_webcontrol1 = new instrumento_pago_webcontrol();

//Para ser llamado desde otro archivo (import)
export {instrumento_pago_webcontrol,instrumento_pago_webcontrol1};

//Para ser llamado desde window.opener
window.instrumento_pago_webcontrol1 = instrumento_pago_webcontrol1;


if(instrumento_pago_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = instrumento_pago_webcontrol1.onLoadWindow; 
}

//</script>