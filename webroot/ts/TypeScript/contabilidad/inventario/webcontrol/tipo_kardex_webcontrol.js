//<script type="text/javascript" language="javascript">



//var tipo_kardexJQueryPaginaWebInteraccion= function (tipo_kardex_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_kardex_constante,tipo_kardex_constante1} from '../util/tipo_kardex_constante.js';

import {tipo_kardex_funcion,tipo_kardex_funcion1} from '../util/tipo_kardex_funcion.js';


class tipo_kardex_webcontrol extends GeneralEntityWebControl {
	
	tipo_kardex_control=null;
	tipo_kardex_controlInicial=null;
	tipo_kardex_controlAuxiliar=null;
		
	//if(tipo_kardex_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_kardex_control) {
		super();
		
		this.tipo_kardex_control=tipo_kardex_control;
	}
		
	actualizarVariablesPagina(tipo_kardex_control) {
		
		if(tipo_kardex_control.action=="index" || tipo_kardex_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_kardex_control);
			
		} 
		
		
		else if(tipo_kardex_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(tipo_kardex_control);
			
		} else if(tipo_kardex_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(tipo_kardex_control);
			
		} else if(tipo_kardex_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_kardex_control);		
		
		} else if(tipo_kardex_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(tipo_kardex_control);
		
		}  else if(tipo_kardex_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_kardex_control);
		
		} else if(tipo_kardex_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_kardex_control);		
		
		} else if(tipo_kardex_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(tipo_kardex_control);		
		
		} else if(tipo_kardex_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(tipo_kardex_control);		
		
		} else if(tipo_kardex_control.action.includes("Busqueda") ||
				  tipo_kardex_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(tipo_kardex_control);
			
		} else if(tipo_kardex_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(tipo_kardex_control)
		}
		
		
		
	
		else if(tipo_kardex_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_kardex_control);	
		
		} else if(tipo_kardex_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_kardex_control);		
		}
	
		else if(tipo_kardex_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_kardex_control);		
		}
	
		else if(tipo_kardex_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_kardex_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tipo_kardex_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(tipo_kardex_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tipo_kardex_control) {
		this.actualizarPaginaAccionesGenerales(tipo_kardex_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tipo_kardex_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_kardex_control);
		this.actualizarPaginaOrderBy(tipo_kardex_control);
		this.actualizarPaginaTablaDatos(tipo_kardex_control);
		this.actualizarPaginaCargaGeneralControles(tipo_kardex_control);
		//this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_kardex_control);
		this.actualizarPaginaAreaBusquedas(tipo_kardex_control);
		this.actualizarPaginaCargaCombosFK(tipo_kardex_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_kardex_control) {
		//this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_kardex_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_kardex_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_kardex_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_kardex_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_kardex_control);
		this.actualizarPaginaTablaDatos(tipo_kardex_control);
		this.actualizarPaginaCargaGeneralControles(tipo_kardex_control);
		//this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_kardex_control);
		this.actualizarPaginaAreaBusquedas(tipo_kardex_control);
		this.actualizarPaginaCargaCombosFK(tipo_kardex_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		//this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		//this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		//this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(tipo_kardex_control) {
		//this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_kardex_control) {
		this.actualizarPaginaAbrirLink(tipo_kardex_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);				
		//this.actualizarPaginaFormulario(tipo_kardex_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);
		//this.actualizarPaginaFormulario(tipo_kardex_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);
		//this.actualizarPaginaFormulario(tipo_kardex_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(tipo_kardex_control) {
		//this.actualizarPaginaFormulario(tipo_kardex_control);
		this.onLoadCombosDefectoFK(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);
		//this.actualizarPaginaFormulario(tipo_kardex_control);
		this.onLoadCombosDefectoFK(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_kardex_control) {
		this.actualizarPaginaAbrirLink(tipo_kardex_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_kardex_control) {
					//super.actualizarPaginaImprimir(tipo_kardex_control,"tipo_kardex");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_kardex_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("tipo_kardex_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(tipo_kardex_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_kardex_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_kardex_control) {
		//super.actualizarPaginaImprimir(tipo_kardex_control,"tipo_kardex");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("tipo_kardex_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(tipo_kardex_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_kardex_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(tipo_kardex_control) {
		//super.actualizarPaginaImprimir(tipo_kardex_control,"tipo_kardex");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("tipo_kardex_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(tipo_kardex_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_kardex_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_kardex_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(tipo_kardex_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(tipo_kardex_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(tipo_kardex_control);
			
		this.actualizarPaginaAbrirLink(tipo_kardex_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(tipo_kardex_control) {
		this.actualizarPaginaTablaDatos(tipo_kardex_control);
		this.actualizarPaginaFormulario(tipo_kardex_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_kardex_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tipo_kardex_control) {
		
		if(tipo_kardex_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_kardex_control);
		}
		
		if(tipo_kardex_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(tipo_kardex_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tipo_kardex_control) {
		if(tipo_kardex_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tipo_kardexReturnGeneral",JSON.stringify(tipo_kardex_control.tipo_kardexReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tipo_kardex_control) {
		if(tipo_kardex_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_kardex_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_kardex_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_kardex_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tipo_kardex_control, mostrar) {
		
		if(mostrar==true) {
			tipo_kardex_funcion1.resaltarRestaurarDivsPagina(false,"tipo_kardex");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_kardex_funcion1.resaltarRestaurarDivMantenimiento(false,"tipo_kardex");
			}			
			
			tipo_kardex_funcion1.mostrarDivMensaje(true,tipo_kardex_control.strAuxiliarMensaje,tipo_kardex_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_kardex_funcion1.mostrarDivMensaje(false,tipo_kardex_control.strAuxiliarMensaje,tipo_kardex_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_kardex_control) {
		if(tipo_kardex_funcion1.esPaginaForm(tipo_kardex_constante1)==true) {
			window.opener.tipo_kardex_webcontrol1.actualizarPaginaTablaDatos(tipo_kardex_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_kardex_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_kardex_control) {
		tipo_kardex_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_kardex_control.strAuxiliarUrlPagina);
				
		tipo_kardex_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_kardex_control.strAuxiliarTipo,tipo_kardex_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_kardex_control) {
		tipo_kardex_funcion1.resaltarRestaurarDivMensaje(true,tipo_kardex_control.strAuxiliarMensajeAlert,tipo_kardex_control.strAuxiliarCssMensaje);
			
		if(tipo_kardex_funcion1.esPaginaForm(tipo_kardex_constante1)==true) {
			window.opener.tipo_kardex_funcion1.resaltarRestaurarDivMensaje(true,tipo_kardex_control.strAuxiliarMensajeAlert,tipo_kardex_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(tipo_kardex_control) {
		this.tipo_kardex_controlInicial=tipo_kardex_control;
			
		if(tipo_kardex_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_kardex_control.strStyleDivArbol,tipo_kardex_control.strStyleDivContent
																,tipo_kardex_control.strStyleDivOpcionesBanner,tipo_kardex_control.strStyleDivExpandirColapsar
																,tipo_kardex_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=tipo_kardex_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",tipo_kardex_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(tipo_kardex_control) {
		this.actualizarCssBotonesPagina(tipo_kardex_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_kardex_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_kardex_control.tiposReportes,tipo_kardex_control.tiposReporte
															 	,tipo_kardex_control.tiposPaginacion,tipo_kardex_control.tiposAcciones
																,tipo_kardex_control.tiposColumnasSelect,tipo_kardex_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tipo_kardex_control.tiposRelaciones,tipo_kardex_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_kardex_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_kardex_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_kardex_control);			
	}
	
	actualizarPaginaUsuarioInvitado(tipo_kardex_control) {
	
		var indexPosition=tipo_kardex_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_kardex_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(tipo_kardex_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_kardex_control.strRecargarFkTiposNinguno!=null && tipo_kardex_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_kardex_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(tipo_kardex_control) {
		jQuery("#divBusquedatipo_kardexAjaxWebPart").css("display",tipo_kardex_control.strPermisoBusqueda);
		jQuery("#trtipo_kardexCabeceraBusquedas").css("display",tipo_kardex_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_kardex").css("display",tipo_kardex_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(tipo_kardex_control.htmlTablaOrderBy!=null
			&& tipo_kardex_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytipo_kardexAjaxWebPart").html(tipo_kardex_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//tipo_kardex_webcontrol1.registrarOrderByActions();
			
		}
			
		if(tipo_kardex_control.htmlTablaOrderByRel!=null
			&& tipo_kardex_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltipo_kardexAjaxWebPart").html(tipo_kardex_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(tipo_kardex_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatipo_kardexAjaxWebPart").css("display","none");
			jQuery("#trtipo_kardexCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatipo_kardex").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(tipo_kardex_control) {
		
		if(!tipo_kardex_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(tipo_kardex_control);
		} else {
			jQuery("#divTablaDatostipo_kardexsAjaxWebPart").html(tipo_kardex_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostipo_kardexs=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(tipo_kardex_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostipo_kardexs=jQuery("#tblTablaDatostipo_kardexs").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("tipo_kardex",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',tipo_kardex_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			tipo_kardex_webcontrol1.registrarControlesTableEdition(tipo_kardex_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		tipo_kardex_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(tipo_kardex_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("tipo_kardex_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(tipo_kardex_control);
		
		const divTablaDatos = document.getElementById("divTablaDatostipo_kardexsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(tipo_kardex_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(tipo_kardex_control);
		
		const divOrderBy = document.getElementById("divOrderBytipo_kardexAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(tipo_kardex_control);
		
		const divOrderByRel = document.getElementById("divOrderByReltipo_kardexAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(tipo_kardex_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(tipo_kardex_control.tipo_kardexActual!=null) {//form
			
			this.actualizarCamposFilaTabla(tipo_kardex_control);			
		}
	}
	
	actualizarCamposFilaTabla(tipo_kardex_control) {
		var i=0;
		
		i=tipo_kardex_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(tipo_kardex_control.tipo_kardexActual.id);
		jQuery("#t-version_row_"+i+"").val(tipo_kardex_control.tipo_kardexActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(tipo_kardex_control.tipo_kardexActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(tipo_kardex_control.tipo_kardexActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(tipo_kardex_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionparametro_inventario").click(function(){
		jQuery("#tblTablaDatostipo_kardexs").on("click",".imgrelacionparametro_inventario", function () {

			var idActual=jQuery(this).attr("idactualtipo_kardex");

			tipo_kardex_webcontrol1.registrarSesionParaparametro_inventarios(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionkardex").click(function(){
		jQuery("#tblTablaDatostipo_kardexs").on("click",".imgrelacionkardex", function () {

			var idActual=jQuery(this).attr("idactualtipo_kardex");

			tipo_kardex_webcontrol1.registrarSesionParakardexes(idActual);
		});				
	}
		
	

	registrarSesionParaparametro_inventarios(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tipo_kardex","parametro_inventario","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1,"s","");
	}

	registrarSesionParakardexes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tipo_kardex","kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1,"es","");
	}
	
	registrarControlesTableEdition(tipo_kardex_control) {
		tipo_kardex_funcion1.registrarControlesTableValidacionEdition(tipo_kardex_control,tipo_kardex_webcontrol1,tipo_kardex_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(tipo_kardex_control) {
		jQuery("#divResumentipo_kardexActualAjaxWebPart").html(tipo_kardex_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_kardex_control) {
		//jQuery("#divAccionesRelacionestipo_kardexAjaxWebPart").html(tipo_kardex_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("tipo_kardex_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(tipo_kardex_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionestipo_kardexAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		tipo_kardex_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(tipo_kardex_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(tipo_kardex_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(tipo_kardex_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontipo_kardex();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("tipo_kardex",id,"inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionparametro_inventario").click(function(){

			var idActual=jQuery(this).attr("idactualtipo_kardex");

			tipo_kardex_webcontrol1.registrarSesionParaparametro_inventarios(idActual);
		});
		jQuery("#imgdivrelacionkardex").click(function(){

			var idActual=jQuery(this).attr("idactualtipo_kardex");

			tipo_kardex_webcontrol1.registrarSesionParakardexes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardexConstante,strParametros);
		
		//tipo_kardex_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	
	
	
	
	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	
	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_kardex_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			
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
	onLoadCombosEventosFK(tipo_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_kardex_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_kardex_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_kardex_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(tipo_kardex_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);			
			
			
		
			
			if(tipo_kardex_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_kardex");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_kardex");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(tipo_kardex_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,"tipo_kardex");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tipo_kardex");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_kardex_control) {
		
		jQuery("#divBusquedatipo_kardexAjaxWebPart").css("display",tipo_kardex_control.strPermisoBusqueda);
		jQuery("#trtipo_kardexCabeceraBusquedas").css("display",tipo_kardex_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_kardex").css("display",tipo_kardex_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetipo_kardex").css("display",tipo_kardex_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostipo_kardex").attr("style",tipo_kardex_control.strPermisoMostrarTodos);		
		
		if(tipo_kardex_control.strPermisoNuevo!=null) {
			jQuery("#tdtipo_kardexNuevo").css("display",tipo_kardex_control.strPermisoNuevo);
			jQuery("#tdtipo_kardexNuevoToolBar").css("display",tipo_kardex_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtipo_kardexDuplicar").css("display",tipo_kardex_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_kardexDuplicarToolBar").css("display",tipo_kardex_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_kardexNuevoGuardarCambios").css("display",tipo_kardex_control.strPermisoNuevo);
			jQuery("#tdtipo_kardexNuevoGuardarCambiosToolBar").css("display",tipo_kardex_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(tipo_kardex_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_kardexCopiar").css("display",tipo_kardex_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_kardexCopiarToolBar").css("display",tipo_kardex_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_kardexConEditar").css("display",tipo_kardex_control.strPermisoActualizar);
		}
		
		jQuery("#tdtipo_kardexGuardarCambios").css("display",tipo_kardex_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtipo_kardexGuardarCambiosToolBar").css("display",tipo_kardex_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdtipo_kardexCerrarPagina").css("display",tipo_kardex_control.strPermisoPopup);		
		jQuery("#tdtipo_kardexCerrarPaginaToolBar").css("display",tipo_kardex_control.strPermisoPopup);
		//jQuery("#trtipo_kardexAccionesRelaciones").css("display",tipo_kardex_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tipo_kardex_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_kardex_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tipo_kardex_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tipo Kadexs";
		sTituloBanner+=" - " + tipo_kardex_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_kardex_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtipo_kardexRelacionesToolBar").css("display",tipo_kardex_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostipo_kardex").css("display",tipo_kardex_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tipo_kardex_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tipo_kardex_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_kardex_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_kardex_webcontrol1.registrarEventosControles();
		
		if(tipo_kardex_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_kardex_constante1.STR_ES_RELACIONADO=="false") {
			tipo_kardex_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_kardex_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_kardex_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_kardex_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_kardex_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tipo_kardex_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				tipo_kardex_webcontrol1.onLoad();
			
			//} else {
				//if(tipo_kardex_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			tipo_kardex_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_kardex","inventario","",tipo_kardex_funcion1,tipo_kardex_webcontrol1,tipo_kardex_constante1);	
	}
}

var tipo_kardex_webcontrol1 = new tipo_kardex_webcontrol();

//Para ser llamado desde otro archivo (import)
export {tipo_kardex_webcontrol,tipo_kardex_webcontrol1};

//Para ser llamado desde window.opener
window.tipo_kardex_webcontrol1 = tipo_kardex_webcontrol1;


if(tipo_kardex_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_kardex_webcontrol1.onLoadWindow; 
}

//</script>