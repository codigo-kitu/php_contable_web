//<script type="text/javascript" language="javascript">



//var imagen_facturaJQueryPaginaWebInteraccion= function (imagen_factura_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_factura_constante,imagen_factura_constante1} from '../util/imagen_factura_constante.js';

import {imagen_factura_funcion,imagen_factura_funcion1} from '../util/imagen_factura_funcion.js';


class imagen_factura_webcontrol extends GeneralEntityWebControl {
	
	imagen_factura_control=null;
	imagen_factura_controlInicial=null;
	imagen_factura_controlAuxiliar=null;
		
	//if(imagen_factura_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_factura_control) {
		super();
		
		this.imagen_factura_control=imagen_factura_control;
	}
		
	actualizarVariablesPagina(imagen_factura_control) {
		
		if(imagen_factura_control.action=="index" || imagen_factura_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_factura_control);
			
		} 
		
		
		else if(imagen_factura_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_factura_control);
			
		} else if(imagen_factura_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_factura_control);
			
		} else if(imagen_factura_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_factura_control);		
		
		} else if(imagen_factura_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_factura_control);
		
		}  else if(imagen_factura_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_factura_control);
		
		} else if(imagen_factura_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_factura_control);		
		
		} else if(imagen_factura_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_factura_control);		
		
		} else if(imagen_factura_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_factura_control);		
		
		} else if(imagen_factura_control.action.includes("Busqueda") ||
				  imagen_factura_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(imagen_factura_control);
			
		} else if(imagen_factura_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_factura_control)
		}
		
		
		
	
		else if(imagen_factura_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_factura_control);	
		
		} else if(imagen_factura_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_factura_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_factura_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_factura_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_factura_control) {
		this.actualizarPaginaAccionesGenerales(imagen_factura_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_factura_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_factura_control);
		this.actualizarPaginaOrderBy(imagen_factura_control);
		this.actualizarPaginaTablaDatos(imagen_factura_control);
		this.actualizarPaginaCargaGeneralControles(imagen_factura_control);
		//this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_factura_control);
		this.actualizarPaginaAreaBusquedas(imagen_factura_control);
		this.actualizarPaginaCargaCombosFK(imagen_factura_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_factura_control) {
		//this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_factura_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_factura_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_factura_control);
		this.actualizarPaginaTablaDatos(imagen_factura_control);
		this.actualizarPaginaCargaGeneralControles(imagen_factura_control);
		//this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_factura_control);
		this.actualizarPaginaAreaBusquedas(imagen_factura_control);
		this.actualizarPaginaCargaCombosFK(imagen_factura_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		//this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		//this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		//this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_factura_control) {
		//this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_factura_control) {
		this.actualizarPaginaAbrirLink(imagen_factura_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);				
		//this.actualizarPaginaFormulario(imagen_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);
		//this.actualizarPaginaFormulario(imagen_factura_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);
		//this.actualizarPaginaFormulario(imagen_factura_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_factura_control) {
		//this.actualizarPaginaFormulario(imagen_factura_control);
		this.onLoadCombosDefectoFK(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);
		//this.actualizarPaginaFormulario(imagen_factura_control);
		this.onLoadCombosDefectoFK(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_factura_control) {
		this.actualizarPaginaAbrirLink(imagen_factura_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_factura_control) {
		this.actualizarPaginaTablaDatos(imagen_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_factura_control) {
					//super.actualizarPaginaImprimir(imagen_factura_control,"imagen_factura");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_factura_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("imagen_factura_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_factura_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_factura_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_factura_control) {
		//super.actualizarPaginaImprimir(imagen_factura_control,"imagen_factura");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("imagen_factura_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(imagen_factura_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_factura_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_factura_control) {
		//super.actualizarPaginaImprimir(imagen_factura_control,"imagen_factura");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("imagen_factura_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_factura_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_factura_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_factura_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_factura_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_factura_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(imagen_factura_control);
			
		this.actualizarPaginaAbrirLink(imagen_factura_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_factura_control) {
		
		if(imagen_factura_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_factura_control);
		}
		
		if(imagen_factura_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_factura_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_factura_control) {
		if(imagen_factura_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_facturaReturnGeneral",JSON.stringify(imagen_factura_control.imagen_facturaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_factura_control) {
		if(imagen_factura_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_factura_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_factura_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_factura_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_factura_control, mostrar) {
		
		if(mostrar==true) {
			imagen_factura_funcion1.resaltarRestaurarDivsPagina(false,"imagen_factura");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_factura_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_factura");
			}			
			
			imagen_factura_funcion1.mostrarDivMensaje(true,imagen_factura_control.strAuxiliarMensaje,imagen_factura_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_factura_funcion1.mostrarDivMensaje(false,imagen_factura_control.strAuxiliarMensaje,imagen_factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_factura_control) {
		if(imagen_factura_funcion1.esPaginaForm(imagen_factura_constante1)==true) {
			window.opener.imagen_factura_webcontrol1.actualizarPaginaTablaDatos(imagen_factura_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_factura_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_factura_control) {
		imagen_factura_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_factura_control.strAuxiliarUrlPagina);
				
		imagen_factura_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_factura_control.strAuxiliarTipo,imagen_factura_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_factura_control) {
		imagen_factura_funcion1.resaltarRestaurarDivMensaje(true,imagen_factura_control.strAuxiliarMensajeAlert,imagen_factura_control.strAuxiliarCssMensaje);
			
		if(imagen_factura_funcion1.esPaginaForm(imagen_factura_constante1)==true) {
			window.opener.imagen_factura_funcion1.resaltarRestaurarDivMensaje(true,imagen_factura_control.strAuxiliarMensajeAlert,imagen_factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_factura_control) {
		this.imagen_factura_controlInicial=imagen_factura_control;
			
		if(imagen_factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_factura_control.strStyleDivArbol,imagen_factura_control.strStyleDivContent
																,imagen_factura_control.strStyleDivOpcionesBanner,imagen_factura_control.strStyleDivExpandirColapsar
																,imagen_factura_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_factura_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_factura_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_factura_control) {
		this.actualizarCssBotonesPagina(imagen_factura_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_factura_control.tiposReportes,imagen_factura_control.tiposReporte
															 	,imagen_factura_control.tiposPaginacion,imagen_factura_control.tiposAcciones
																,imagen_factura_control.tiposColumnasSelect,imagen_factura_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_factura_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_factura_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_factura_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_factura_control) {
	
		var indexPosition=imagen_factura_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_factura_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_factura_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",imagen_factura_control.strRecargarFkTipos,",")) { 
				imagen_factura_webcontrol1.cargarCombosfacturasFK(imagen_factura_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_factura_control.strRecargarFkTiposNinguno!=null && imagen_factura_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_factura_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_factura",imagen_factura_control.strRecargarFkTiposNinguno,",")) { 
					imagen_factura_webcontrol1.cargarCombosfacturasFK(imagen_factura_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablafacturaFK(imagen_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_factura_funcion1,imagen_factura_control.facturasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(imagen_factura_control) {
		jQuery("#divBusquedaimagen_facturaAjaxWebPart").css("display",imagen_factura_control.strPermisoBusqueda);
		jQuery("#trimagen_facturaCabeceraBusquedas").css("display",imagen_factura_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_factura").css("display",imagen_factura_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_factura_control.htmlTablaOrderBy!=null
			&& imagen_factura_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_facturaAjaxWebPart").html(imagen_factura_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_factura_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_factura_control.htmlTablaOrderByRel!=null
			&& imagen_factura_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_facturaAjaxWebPart").html(imagen_factura_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_factura_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_facturaAjaxWebPart").css("display","none");
			jQuery("#trimagen_facturaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_factura").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(imagen_factura_control) {
		
		if(!imagen_factura_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(imagen_factura_control);
		} else {
			jQuery("#divTablaDatosimagen_facturasAjaxWebPart").html(imagen_factura_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_facturas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_factura_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_facturas=jQuery("#tblTablaDatosimagen_facturas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_factura",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_factura_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_factura_webcontrol1.registrarControlesTableEdition(imagen_factura_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_factura_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(imagen_factura_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("imagen_factura_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_factura_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosimagen_facturasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(imagen_factura_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(imagen_factura_control);
		
		const divOrderBy = document.getElementById("divOrderByimagen_facturaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(imagen_factura_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelimagen_facturaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(imagen_factura_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_factura_control.imagen_facturaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_factura_control);			
		}
	}
	
	actualizarCamposFilaTabla(imagen_factura_control) {
		var i=0;
		
		i=imagen_factura_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_factura_control.imagen_facturaActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_factura_control.imagen_facturaActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(imagen_factura_control.imagen_facturaActual.versionRow);
		
		if(imagen_factura_control.imagen_facturaActual.id_factura!=null && imagen_factura_control.imagen_facturaActual.id_factura>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != imagen_factura_control.imagen_facturaActual.id_factura) {
				jQuery("#t-cel_"+i+"_3").val(imagen_factura_control.imagen_facturaActual.id_factura).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(imagen_factura_control.imagen_facturaActual.id_imagen);
		jQuery("#t-cel_"+i+"_5").val(imagen_factura_control.imagen_facturaActual.imagen);
		jQuery("#t-cel_"+i+"_6").val(imagen_factura_control.imagen_facturaActual.nro_factura);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_factura_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_factura_control) {
		imagen_factura_funcion1.registrarControlesTableValidacionEdition(imagen_factura_control,imagen_factura_webcontrol1,imagen_factura_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_factura_control) {
		jQuery("#divResumenimagen_facturaActualAjaxWebPart").html(imagen_factura_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_factura_control) {
		//jQuery("#divAccionesRelacionesimagen_facturaAjaxWebPart").html(imagen_factura_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("imagen_factura_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_factura_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesimagen_facturaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		imagen_factura_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_factura_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_factura_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_factura_control) {
		
		if(imagen_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura").attr("style",imagen_factura_control.strVisibleFK_Idfactura);
			jQuery("#tblstrVisible"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura").attr("style",imagen_factura_control.strVisibleFK_Idfactura);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_factura();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_factura",id,"facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);		
	}
	
	

	abrirBusquedaParafactura(strNombreCampoBusqueda){//idActual
		imagen_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_factura","factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_facturaConstante,strParametros);
		
		//imagen_factura_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosfacturasFK(imagen_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura",imagen_factura_control.facturasFK);

		if(imagen_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_factura_control.idFilaTablaActual+"_3",imagen_factura_control.facturasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura",imagen_factura_control.facturasFK);

	};

	
	
	registrarComboActionChangeCombosfacturasFK(imagen_factura_control) {

	};

	
	
	setDefectoValorCombosfacturasFK(imagen_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_factura_control.idfacturaDefaultFK>-1 && jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").val() != imagen_factura_control.idfacturaDefaultFK) {
				jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura").val(imagen_factura_control.idfacturaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val(imagen_factura_control.idfacturaDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_factura_constante1.STR_SUFIJO+"FK_Idfactura-cmbid_factura").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_factura_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",imagen_factura_control.strRecargarFkTipos,",")) { 
				imagen_factura_webcontrol1.setDefectoValorCombosfacturasFK(imagen_factura_control);
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
	onLoadCombosEventosFK(imagen_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_factura",imagen_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_factura_webcontrol1.registrarComboActionChangeCombosfacturasFK(imagen_factura_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_factura_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_factura_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_factura","FK_Idfactura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
		
			
			if(imagen_factura_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_factura");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_factura");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_factura_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,"imagen_factura");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("factura","id_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_factura_constante1.STR_SUFIJO+"-id_factura_img_busqueda").click(function(){
				imagen_factura_webcontrol1.abrirBusquedaParafactura("id_factura");
				//alert(jQuery('#form-id_factura_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_factura_control) {
		
		jQuery("#divBusquedaimagen_facturaAjaxWebPart").css("display",imagen_factura_control.strPermisoBusqueda);
		jQuery("#trimagen_facturaCabeceraBusquedas").css("display",imagen_factura_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_factura").css("display",imagen_factura_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_factura").css("display",imagen_factura_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_factura").attr("style",imagen_factura_control.strPermisoMostrarTodos);		
		
		if(imagen_factura_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_facturaNuevo").css("display",imagen_factura_control.strPermisoNuevo);
			jQuery("#tdimagen_facturaNuevoToolBar").css("display",imagen_factura_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_facturaDuplicar").css("display",imagen_factura_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_facturaDuplicarToolBar").css("display",imagen_factura_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_facturaNuevoGuardarCambios").css("display",imagen_factura_control.strPermisoNuevo);
			jQuery("#tdimagen_facturaNuevoGuardarCambiosToolBar").css("display",imagen_factura_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_factura_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_facturaCopiar").css("display",imagen_factura_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_facturaCopiarToolBar").css("display",imagen_factura_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_facturaConEditar").css("display",imagen_factura_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_facturaGuardarCambios").css("display",imagen_factura_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_facturaGuardarCambiosToolBar").css("display",imagen_factura_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdimagen_facturaCerrarPagina").css("display",imagen_factura_control.strPermisoPopup);		
		jQuery("#tdimagen_facturaCerrarPaginaToolBar").css("display",imagen_factura_control.strPermisoPopup);
		//jQuery("#trimagen_facturaAccionesRelaciones").css("display",imagen_factura_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_factura_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_factura_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_factura_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Facturases";
		sTituloBanner+=" - " + imagen_factura_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_factura_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_facturaRelacionesToolBar").css("display",imagen_factura_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_factura").css("display",imagen_factura_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_factura_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_factura_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_factura_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_factura_webcontrol1.registrarEventosControles();
		
		if(imagen_factura_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_factura_constante1.STR_ES_RELACIONADO=="false") {
			imagen_factura_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_factura_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_factura_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_factura_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_factura_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_factura_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_factura_webcontrol1.onLoad();
			
			//} else {
				//if(imagen_factura_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			imagen_factura_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_factura","facturacion","",imagen_factura_funcion1,imagen_factura_webcontrol1,imagen_factura_constante1);	
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

var imagen_factura_webcontrol1 = new imagen_factura_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_factura_webcontrol,imagen_factura_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_factura_webcontrol1 = imagen_factura_webcontrol1;


if(imagen_factura_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_factura_webcontrol1.onLoadWindow; 
}

//</script>