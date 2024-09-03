//<script type="text/javascript" language="javascript">



//var producto_equivalenteJQueryPaginaWebInteraccion= function (producto_equivalente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {producto_equivalente_constante,producto_equivalente_constante1} from '../util/producto_equivalente_constante.js';

import {producto_equivalente_funcion,producto_equivalente_funcion1} from '../util/producto_equivalente_funcion.js';


class producto_equivalente_webcontrol extends GeneralEntityWebControl {
	
	producto_equivalente_control=null;
	producto_equivalente_controlInicial=null;
	producto_equivalente_controlAuxiliar=null;
		
	//if(producto_equivalente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(producto_equivalente_control) {
		super();
		
		this.producto_equivalente_control=producto_equivalente_control;
	}
		
	actualizarVariablesPagina(producto_equivalente_control) {
		
		if(producto_equivalente_control.action=="index" || producto_equivalente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(producto_equivalente_control);
			
		} 
		
		
		else if(producto_equivalente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(producto_equivalente_control);
			
		} else if(producto_equivalente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(producto_equivalente_control);
			
		} else if(producto_equivalente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(producto_equivalente_control);		
		
		} else if(producto_equivalente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(producto_equivalente_control);
		
		}  else if(producto_equivalente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(producto_equivalente_control);
		
		} else if(producto_equivalente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(producto_equivalente_control);		
		
		} else if(producto_equivalente_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(producto_equivalente_control);		
		
		} else if(producto_equivalente_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(producto_equivalente_control);		
		
		} else if(producto_equivalente_control.action.includes("Busqueda") ||
				  producto_equivalente_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(producto_equivalente_control);
			
		} else if(producto_equivalente_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(producto_equivalente_control)
		}
		
		
		
	
		else if(producto_equivalente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(producto_equivalente_control);	
		
		} else if(producto_equivalente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(producto_equivalente_control);		
		}
	
		else if(producto_equivalente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(producto_equivalente_control);		
		}
	
		else if(producto_equivalente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(producto_equivalente_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + producto_equivalente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(producto_equivalente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(producto_equivalente_control) {
		this.actualizarPaginaAccionesGenerales(producto_equivalente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(producto_equivalente_control) {
		
		this.actualizarPaginaCargaGeneral(producto_equivalente_control);
		this.actualizarPaginaOrderBy(producto_equivalente_control);
		this.actualizarPaginaTablaDatos(producto_equivalente_control);
		this.actualizarPaginaCargaGeneralControles(producto_equivalente_control);
		//this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(producto_equivalente_control);
		this.actualizarPaginaAreaBusquedas(producto_equivalente_control);
		this.actualizarPaginaCargaCombosFK(producto_equivalente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(producto_equivalente_control) {
		//this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(producto_equivalente_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(producto_equivalente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(producto_equivalente_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(producto_equivalente_control) {
		
		this.actualizarPaginaCargaGeneral(producto_equivalente_control);
		this.actualizarPaginaTablaDatos(producto_equivalente_control);
		this.actualizarPaginaCargaGeneralControles(producto_equivalente_control);
		//this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(producto_equivalente_control);
		this.actualizarPaginaAreaBusquedas(producto_equivalente_control);
		this.actualizarPaginaCargaCombosFK(producto_equivalente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		//this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		//this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		//this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		//this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		//this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		//this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(producto_equivalente_control) {
		//this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(producto_equivalente_control) {
		this.actualizarPaginaAbrirLink(producto_equivalente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);				
		//this.actualizarPaginaFormulario(producto_equivalente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);
		//this.actualizarPaginaFormulario(producto_equivalente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		//this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);
		//this.actualizarPaginaFormulario(producto_equivalente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(producto_equivalente_control) {
		//this.actualizarPaginaFormulario(producto_equivalente_control);
		this.onLoadCombosDefectoFK(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);
		//this.actualizarPaginaFormulario(producto_equivalente_control);
		this.onLoadCombosDefectoFK(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		//this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(producto_equivalente_control) {
		this.actualizarPaginaAbrirLink(producto_equivalente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(producto_equivalente_control) {
					//super.actualizarPaginaImprimir(producto_equivalente_control,"producto_equivalente");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",producto_equivalente_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("producto_equivalente_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(producto_equivalente_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(producto_equivalente_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(producto_equivalente_control) {
		//super.actualizarPaginaImprimir(producto_equivalente_control,"producto_equivalente");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("producto_equivalente_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(producto_equivalente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",producto_equivalente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(producto_equivalente_control) {
		//super.actualizarPaginaImprimir(producto_equivalente_control,"producto_equivalente");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("producto_equivalente_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(producto_equivalente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",producto_equivalente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(producto_equivalente_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(producto_equivalente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(producto_equivalente_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(producto_equivalente_control);
			
		this.actualizarPaginaAbrirLink(producto_equivalente_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(producto_equivalente_control) {
		this.actualizarPaginaTablaDatos(producto_equivalente_control);
		this.actualizarPaginaFormulario(producto_equivalente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control);		
		this.actualizarPaginaAreaMantenimiento(producto_equivalente_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(producto_equivalente_control) {
		
		if(producto_equivalente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(producto_equivalente_control);
		}
		
		if(producto_equivalente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(producto_equivalente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(producto_equivalente_control) {
		if(producto_equivalente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("producto_equivalenteReturnGeneral",JSON.stringify(producto_equivalente_control.producto_equivalenteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(producto_equivalente_control) {
		if(producto_equivalente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && producto_equivalente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(producto_equivalente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(producto_equivalente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(producto_equivalente_control, mostrar) {
		
		if(mostrar==true) {
			producto_equivalente_funcion1.resaltarRestaurarDivsPagina(false,"producto_equivalente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				producto_equivalente_funcion1.resaltarRestaurarDivMantenimiento(false,"producto_equivalente");
			}			
			
			producto_equivalente_funcion1.mostrarDivMensaje(true,producto_equivalente_control.strAuxiliarMensaje,producto_equivalente_control.strAuxiliarCssMensaje);
		
		} else {
			producto_equivalente_funcion1.mostrarDivMensaje(false,producto_equivalente_control.strAuxiliarMensaje,producto_equivalente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(producto_equivalente_control) {
		if(producto_equivalente_funcion1.esPaginaForm(producto_equivalente_constante1)==true) {
			window.opener.producto_equivalente_webcontrol1.actualizarPaginaTablaDatos(producto_equivalente_control);
		} else {
			this.actualizarPaginaTablaDatos(producto_equivalente_control);
		}
	}
	
	actualizarPaginaAbrirLink(producto_equivalente_control) {
		producto_equivalente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(producto_equivalente_control.strAuxiliarUrlPagina);
				
		producto_equivalente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(producto_equivalente_control.strAuxiliarTipo,producto_equivalente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(producto_equivalente_control) {
		producto_equivalente_funcion1.resaltarRestaurarDivMensaje(true,producto_equivalente_control.strAuxiliarMensajeAlert,producto_equivalente_control.strAuxiliarCssMensaje);
			
		if(producto_equivalente_funcion1.esPaginaForm(producto_equivalente_constante1)==true) {
			window.opener.producto_equivalente_funcion1.resaltarRestaurarDivMensaje(true,producto_equivalente_control.strAuxiliarMensajeAlert,producto_equivalente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(producto_equivalente_control) {
		this.producto_equivalente_controlInicial=producto_equivalente_control;
			
		if(producto_equivalente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(producto_equivalente_control.strStyleDivArbol,producto_equivalente_control.strStyleDivContent
																,producto_equivalente_control.strStyleDivOpcionesBanner,producto_equivalente_control.strStyleDivExpandirColapsar
																,producto_equivalente_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=producto_equivalente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",producto_equivalente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(producto_equivalente_control) {
		this.actualizarCssBotonesPagina(producto_equivalente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(producto_equivalente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(producto_equivalente_control.tiposReportes,producto_equivalente_control.tiposReporte
															 	,producto_equivalente_control.tiposPaginacion,producto_equivalente_control.tiposAcciones
																,producto_equivalente_control.tiposColumnasSelect,producto_equivalente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(producto_equivalente_control.tiposRelaciones,producto_equivalente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(producto_equivalente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(producto_equivalente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(producto_equivalente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(producto_equivalente_control) {
	
		var indexPosition=producto_equivalente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=producto_equivalente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(producto_equivalente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_principal",producto_equivalente_control.strRecargarFkTipos,",")) { 
				producto_equivalente_webcontrol1.cargarCombosproducto_principalsFK(producto_equivalente_control);
			}

			if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_equivalente",producto_equivalente_control.strRecargarFkTipos,",")) { 
				producto_equivalente_webcontrol1.cargarCombosproducto_equivalentesFK(producto_equivalente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(producto_equivalente_control.strRecargarFkTiposNinguno!=null && producto_equivalente_control.strRecargarFkTiposNinguno!='NINGUNO' && producto_equivalente_control.strRecargarFkTiposNinguno!='') {
			
				if(producto_equivalente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto_principal",producto_equivalente_control.strRecargarFkTiposNinguno,",")) { 
					producto_equivalente_webcontrol1.cargarCombosproducto_principalsFK(producto_equivalente_control);
				}

				if(producto_equivalente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto_equivalente",producto_equivalente_control.strRecargarFkTiposNinguno,",")) { 
					producto_equivalente_webcontrol1.cargarCombosproducto_equivalentesFK(producto_equivalente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproducto_principalFK(producto_equivalente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_equivalente_funcion1,producto_equivalente_control.producto_principalsFK);
	}

	cargarComboEditarTablaproducto_equivalenteFK(producto_equivalente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,producto_equivalente_funcion1,producto_equivalente_control.producto_equivalentesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(producto_equivalente_control) {
		jQuery("#divBusquedaproducto_equivalenteAjaxWebPart").css("display",producto_equivalente_control.strPermisoBusqueda);
		jQuery("#trproducto_equivalenteCabeceraBusquedas").css("display",producto_equivalente_control.strPermisoBusqueda);
		jQuery("#trBusquedaproducto_equivalente").css("display",producto_equivalente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(producto_equivalente_control.htmlTablaOrderBy!=null
			&& producto_equivalente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByproducto_equivalenteAjaxWebPart").html(producto_equivalente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//producto_equivalente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(producto_equivalente_control.htmlTablaOrderByRel!=null
			&& producto_equivalente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelproducto_equivalenteAjaxWebPart").html(producto_equivalente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(producto_equivalente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaproducto_equivalenteAjaxWebPart").css("display","none");
			jQuery("#trproducto_equivalenteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaproducto_equivalente").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(producto_equivalente_control) {
		
		if(!producto_equivalente_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(producto_equivalente_control);
		} else {
			jQuery("#divTablaDatosproducto_equivalentesAjaxWebPart").html(producto_equivalente_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosproducto_equivalentes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(producto_equivalente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosproducto_equivalentes=jQuery("#tblTablaDatosproducto_equivalentes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("producto_equivalente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',producto_equivalente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			producto_equivalente_webcontrol1.registrarControlesTableEdition(producto_equivalente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		producto_equivalente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(producto_equivalente_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("producto_equivalente_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(producto_equivalente_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosproducto_equivalentesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(producto_equivalente_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(producto_equivalente_control);
		
		const divOrderBy = document.getElementById("divOrderByproducto_equivalenteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(producto_equivalente_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelproducto_equivalenteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(producto_equivalente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(producto_equivalente_control.producto_equivalenteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(producto_equivalente_control);			
		}
	}
	
	actualizarCamposFilaTabla(producto_equivalente_control) {
		var i=0;
		
		i=producto_equivalente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(producto_equivalente_control.producto_equivalenteActual.id);
		jQuery("#t-version_row_"+i+"").val(producto_equivalente_control.producto_equivalenteActual.versionRow);
		
		if(producto_equivalente_control.producto_equivalenteActual.id_producto_principal!=null && producto_equivalente_control.producto_equivalenteActual.id_producto_principal>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != producto_equivalente_control.producto_equivalenteActual.id_producto_principal) {
				jQuery("#t-cel_"+i+"_2").val(producto_equivalente_control.producto_equivalenteActual.id_producto_principal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente!=null && producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente) {
				jQuery("#t-cel_"+i+"_3").val(producto_equivalente_control.producto_equivalenteActual.id_producto_equivalente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(producto_equivalente_control.producto_equivalenteActual.producto_id_principal);
		jQuery("#t-cel_"+i+"_5").val(producto_equivalente_control.producto_equivalenteActual.producto_id_equivalente);
		jQuery("#t-cel_"+i+"_6").val(producto_equivalente_control.producto_equivalenteActual.comentario);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(producto_equivalente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproducto_equivalente").click(function(){
		jQuery("#tblTablaDatosproducto_equivalentes").on("click",".imgrelacionproducto_equivalente", function () {

			var idActual=jQuery(this).attr("idactualproducto_equivalente");

			producto_equivalente_webcontrol1.registrarSesionParaproducto_equivalentes(idActual);
		});				
	}
		
	

	registrarSesionParaproducto_equivalentes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"producto_equivalente","producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1,"s","");
	}
	
	registrarControlesTableEdition(producto_equivalente_control) {
		producto_equivalente_funcion1.registrarControlesTableValidacionEdition(producto_equivalente_control,producto_equivalente_webcontrol1,producto_equivalente_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(producto_equivalente_control) {
		jQuery("#divResumenproducto_equivalenteActualAjaxWebPart").html(producto_equivalente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(producto_equivalente_control) {
		//jQuery("#divAccionesRelacionesproducto_equivalenteAjaxWebPart").html(producto_equivalente_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("producto_equivalente_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(producto_equivalente_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesproducto_equivalenteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		producto_equivalente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(producto_equivalente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(producto_equivalente_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(producto_equivalente_control) {
		
		if(producto_equivalente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente").attr("style",producto_equivalente_control.strVisibleFK_Idproducto_equivalente);
			jQuery("#tblstrVisible"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente").attr("style",producto_equivalente_control.strVisibleFK_Idproducto_equivalente);
		}

		if(producto_equivalente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal").attr("style",producto_equivalente_control.strVisibleFK_Idproducto_principal);
			jQuery("#tblstrVisible"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal").attr("style",producto_equivalente_control.strVisibleFK_Idproducto_principal);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionproducto_equivalente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("producto_equivalente",id,"inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);		
	}
	
	

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		producto_equivalente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto_equivalente","producto","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
	}

	abrirBusquedaParaproducto_equivalente(strNombreCampoBusqueda){//idActual
		producto_equivalente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("producto_equivalente","producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionproducto_equivalente").click(function(){

			var idActual=jQuery(this).attr("idactualproducto_equivalente");

			producto_equivalente_webcontrol1.registrarSesionParaproducto_equivalentes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalenteConstante,strParametros);
		
		//producto_equivalente_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosproducto_principalsFK(producto_equivalente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal",producto_equivalente_control.producto_principalsFK);

		if(producto_equivalente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_equivalente_control.idFilaTablaActual+"_2",producto_equivalente_control.producto_principalsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal-cmbid_producto_principal",producto_equivalente_control.producto_principalsFK);

	};

	cargarCombosproducto_equivalentesFK(producto_equivalente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente",producto_equivalente_control.producto_equivalentesFK);

		if(producto_equivalente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+producto_equivalente_control.idFilaTablaActual+"_3",producto_equivalente_control.producto_equivalentesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente-cmbid_producto_equivalente",producto_equivalente_control.producto_equivalentesFK);

	};

	
	
	registrarComboActionChangeCombosproducto_principalsFK(producto_equivalente_control) {

	};

	registrarComboActionChangeCombosproducto_equivalentesFK(producto_equivalente_control) {

	};

	
	
	setDefectoValorCombosproducto_principalsFK(producto_equivalente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_equivalente_control.idproducto_principalDefaultFK>-1 && jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").val() != producto_equivalente_control.idproducto_principalDefaultFK) {
				jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal").val(producto_equivalente_control.idproducto_principalDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal-cmbid_producto_principal").val(producto_equivalente_control.idproducto_principalDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal-cmbid_producto_principal").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_principal-cmbid_producto_principal").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproducto_equivalentesFK(producto_equivalente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(producto_equivalente_control.idproducto_equivalenteDefaultFK>-1 && jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").val() != producto_equivalente_control.idproducto_equivalenteDefaultFK) {
				jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente").val(producto_equivalente_control.idproducto_equivalenteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente-cmbid_producto_equivalente").val(producto_equivalente_control.idproducto_equivalenteDefaultForeignKey).trigger("change");
			if(jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente-cmbid_producto_equivalente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+producto_equivalente_constante1.STR_SUFIJO+"FK_Idproducto_equivalente-cmbid_producto_equivalente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//producto_equivalente_control
		
	
	}
	
	onLoadCombosDefectoFK(producto_equivalente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_equivalente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_principal",producto_equivalente_control.strRecargarFkTipos,",")) { 
				producto_equivalente_webcontrol1.setDefectoValorCombosproducto_principalsFK(producto_equivalente_control);
			}

			if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_equivalente",producto_equivalente_control.strRecargarFkTipos,",")) { 
				producto_equivalente_webcontrol1.setDefectoValorCombosproducto_equivalentesFK(producto_equivalente_control);
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
	onLoadCombosEventosFK(producto_equivalente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_equivalente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_principal",producto_equivalente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_equivalente_webcontrol1.registrarComboActionChangeCombosproducto_principalsFK(producto_equivalente_control);
			//}

			//if(producto_equivalente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto_equivalente",producto_equivalente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				producto_equivalente_webcontrol1.registrarComboActionChangeCombosproducto_equivalentesFK(producto_equivalente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(producto_equivalente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(producto_equivalente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(producto_equivalente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(producto_equivalente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto_equivalente","FK_Idproducto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("producto_equivalente","FK_Idproducto_principal","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
		
			
			if(producto_equivalente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("producto_equivalente");		
			
			funcionGeneralEventoJQuery.setBotonArbolAbrirClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("producto_equivalente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(producto_equivalente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,"producto_equivalente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto_principal","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_principal_img_busqueda").click(function(){
				producto_equivalente_webcontrol1.abrirBusquedaParaproducto("id_producto_principal");
				//alert(jQuery('#form-id_producto_principal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto_equivalente","id_producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+producto_equivalente_constante1.STR_SUFIJO+"-id_producto_equivalente_img_busqueda").click(function(){
				producto_equivalente_webcontrol1.abrirBusquedaParaproducto_equivalente("id_producto_equivalente");
				//alert(jQuery('#form-id_producto_equivalente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("producto_equivalente");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(producto_equivalente_control) {
		
		jQuery("#divBusquedaproducto_equivalenteAjaxWebPart").css("display",producto_equivalente_control.strPermisoBusqueda);
		jQuery("#trproducto_equivalenteCabeceraBusquedas").css("display",producto_equivalente_control.strPermisoBusqueda);
		jQuery("#trBusquedaproducto_equivalente").css("display",producto_equivalente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteproducto_equivalente").css("display",producto_equivalente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosproducto_equivalente").attr("style",producto_equivalente_control.strPermisoMostrarTodos);		
		
		if(producto_equivalente_control.strPermisoNuevo!=null) {
			jQuery("#tdproducto_equivalenteNuevo").css("display",producto_equivalente_control.strPermisoNuevo);
			jQuery("#tdproducto_equivalenteNuevoToolBar").css("display",producto_equivalente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdproducto_equivalenteDuplicar").css("display",producto_equivalente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdproducto_equivalenteDuplicarToolBar").css("display",producto_equivalente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdproducto_equivalenteNuevoGuardarCambios").css("display",producto_equivalente_control.strPermisoNuevo);
			jQuery("#tdproducto_equivalenteNuevoGuardarCambiosToolBar").css("display",producto_equivalente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(producto_equivalente_control.strPermisoActualizar!=null) {
			jQuery("#tdproducto_equivalenteCopiar").css("display",producto_equivalente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproducto_equivalenteCopiarToolBar").css("display",producto_equivalente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdproducto_equivalenteConEditar").css("display",producto_equivalente_control.strPermisoActualizar);
		}
		
		jQuery("#tdproducto_equivalenteGuardarCambios").css("display",producto_equivalente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdproducto_equivalenteGuardarCambiosToolBar").css("display",producto_equivalente_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdproducto_equivalenteCerrarPagina").css("display",producto_equivalente_control.strPermisoPopup);		
		jQuery("#tdproducto_equivalenteCerrarPaginaToolBar").css("display",producto_equivalente_control.strPermisoPopup);
		//jQuery("#trproducto_equivalenteAccionesRelaciones").css("display",producto_equivalente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=producto_equivalente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + producto_equivalente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + producto_equivalente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Producto Equivalentess";
		sTituloBanner+=" - " + producto_equivalente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + producto_equivalente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdproducto_equivalenteRelacionesToolBar").css("display",producto_equivalente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosproducto_equivalente").css("display",producto_equivalente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		producto_equivalente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		producto_equivalente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		producto_equivalente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		producto_equivalente_webcontrol1.registrarEventosControles();
		
		if(producto_equivalente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(producto_equivalente_constante1.STR_ES_RELACIONADO=="false") {
			producto_equivalente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(producto_equivalente_constante1.STR_ES_RELACIONES=="true") {
			if(producto_equivalente_constante1.BIT_ES_PAGINA_FORM==true) {
				producto_equivalente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(producto_equivalente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(producto_equivalente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				producto_equivalente_webcontrol1.onLoad();
			
			//} else {
				//if(producto_equivalente_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			producto_equivalente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("producto_equivalente","inventario","",producto_equivalente_funcion1,producto_equivalente_webcontrol1,producto_equivalente_constante1);	
	}
}

var producto_equivalente_webcontrol1 = new producto_equivalente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {producto_equivalente_webcontrol,producto_equivalente_webcontrol1};

//Para ser llamado desde window.opener
window.producto_equivalente_webcontrol1 = producto_equivalente_webcontrol1;


if(producto_equivalente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = producto_equivalente_webcontrol1.onLoadWindow; 
}

//</script>