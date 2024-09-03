//<script type="text/javascript" language="javascript">



//var fuenteJQueryPaginaWebInteraccion= function (fuente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {fuente_constante,fuente_constante1} from '../util/fuente_constante.js';

import {fuente_funcion,fuente_funcion1} from '../util/fuente_funcion.js';


class fuente_webcontrol extends GeneralEntityWebControl {
	
	fuente_control=null;
	fuente_controlInicial=null;
	fuente_controlAuxiliar=null;
		
	//if(fuente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(fuente_control) {
		super();
		
		this.fuente_control=fuente_control;
	}
		
	actualizarVariablesPagina(fuente_control) {
		
		if(fuente_control.action=="index" || fuente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(fuente_control);
			
		} 
		
		
		else if(fuente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(fuente_control);
		
		} else if(fuente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(fuente_control);
		
		} else if(fuente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(fuente_control);
		
		} else if(fuente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(fuente_control);
			
		} else if(fuente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(fuente_control);
			
		} else if(fuente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(fuente_control);
		
		} else if(fuente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(fuente_control);		
		
		} else if(fuente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(fuente_control);
		
		} else if(fuente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(fuente_control);
		
		} else if(fuente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(fuente_control);
		
		} else if(fuente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(fuente_control);
		
		}  else if(fuente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(fuente_control);
		
		} else if(fuente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(fuente_control);
		
		} else if(fuente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(fuente_control);
		
		} else if(fuente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(fuente_control);
		
		} else if(fuente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(fuente_control);
		
		} else if(fuente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(fuente_control);
		
		} else if(fuente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(fuente_control);
		
		} else if(fuente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(fuente_control);
		
		} else if(fuente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(fuente_control);
		
		} else if(fuente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(fuente_control);		
		
		} else if(fuente_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(fuente_control);		
		
		} else if(fuente_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(fuente_control);		
		
		} else if(fuente_control.action.includes("Busqueda") ||
				  fuente_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(fuente_control);
			
		} else if(fuente_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(fuente_control)
		}
		
		
		
	
		else if(fuente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(fuente_control);	
		
		} else if(fuente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(fuente_control);		
		}
	
		else if(fuente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(fuente_control);		
		}
	
		else if(fuente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(fuente_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + fuente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(fuente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(fuente_control) {
		this.actualizarPaginaAccionesGenerales(fuente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(fuente_control) {
		
		this.actualizarPaginaCargaGeneral(fuente_control);
		this.actualizarPaginaOrderBy(fuente_control);
		this.actualizarPaginaTablaDatos(fuente_control);
		this.actualizarPaginaCargaGeneralControles(fuente_control);
		//this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(fuente_control);
		this.actualizarPaginaAreaBusquedas(fuente_control);
		this.actualizarPaginaCargaCombosFK(fuente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(fuente_control) {
		//this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(fuente_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(fuente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(fuente_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(fuente_control) {
		
		this.actualizarPaginaCargaGeneral(fuente_control);
		this.actualizarPaginaTablaDatos(fuente_control);
		this.actualizarPaginaCargaGeneralControles(fuente_control);
		//this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(fuente_control);
		this.actualizarPaginaAreaBusquedas(fuente_control);
		this.actualizarPaginaCargaCombosFK(fuente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		//this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		//this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		//this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		//this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		//this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		//this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(fuente_control) {
		//this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(fuente_control) {
		this.actualizarPaginaAbrirLink(fuente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);				
		//this.actualizarPaginaFormulario(fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);
		//this.actualizarPaginaFormulario(fuente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		//this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);
		//this.actualizarPaginaFormulario(fuente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(fuente_control) {
		//this.actualizarPaginaFormulario(fuente_control);
		this.onLoadCombosDefectoFK(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);
		//this.actualizarPaginaFormulario(fuente_control);
		this.onLoadCombosDefectoFK(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		//this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(fuente_control) {
		this.actualizarPaginaAbrirLink(fuente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(fuente_control) {
					//super.actualizarPaginaImprimir(fuente_control,"fuente");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",fuente_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("fuente_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(fuente_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(fuente_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(fuente_control) {
		//super.actualizarPaginaImprimir(fuente_control,"fuente");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("fuente_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(fuente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",fuente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(fuente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(fuente_control) {
		//super.actualizarPaginaImprimir(fuente_control,"fuente");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("fuente_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(fuente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",fuente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(fuente_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(fuente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(fuente_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(fuente_control);
			
		this.actualizarPaginaAbrirLink(fuente_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(fuente_control) {
		this.actualizarPaginaTablaDatos(fuente_control);
		this.actualizarPaginaFormulario(fuente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(fuente_control);		
		this.actualizarPaginaAreaMantenimiento(fuente_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(fuente_control) {
		
		if(fuente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(fuente_control);
		}
		
		if(fuente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(fuente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(fuente_control) {
		if(fuente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("fuenteReturnGeneral",JSON.stringify(fuente_control.fuenteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(fuente_control) {
		if(fuente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && fuente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(fuente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(fuente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(fuente_control, mostrar) {
		
		if(mostrar==true) {
			fuente_funcion1.resaltarRestaurarDivsPagina(false,"fuente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				fuente_funcion1.resaltarRestaurarDivMantenimiento(false,"fuente");
			}			
			
			fuente_funcion1.mostrarDivMensaje(true,fuente_control.strAuxiliarMensaje,fuente_control.strAuxiliarCssMensaje);
		
		} else {
			fuente_funcion1.mostrarDivMensaje(false,fuente_control.strAuxiliarMensaje,fuente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(fuente_control) {
		if(fuente_funcion1.esPaginaForm(fuente_constante1)==true) {
			window.opener.fuente_webcontrol1.actualizarPaginaTablaDatos(fuente_control);
		} else {
			this.actualizarPaginaTablaDatos(fuente_control);
		}
	}
	
	actualizarPaginaAbrirLink(fuente_control) {
		fuente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(fuente_control.strAuxiliarUrlPagina);
				
		fuente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(fuente_control.strAuxiliarTipo,fuente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(fuente_control) {
		fuente_funcion1.resaltarRestaurarDivMensaje(true,fuente_control.strAuxiliarMensajeAlert,fuente_control.strAuxiliarCssMensaje);
			
		if(fuente_funcion1.esPaginaForm(fuente_constante1)==true) {
			window.opener.fuente_funcion1.resaltarRestaurarDivMensaje(true,fuente_control.strAuxiliarMensajeAlert,fuente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(fuente_control) {
		this.fuente_controlInicial=fuente_control;
			
		if(fuente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(fuente_control.strStyleDivArbol,fuente_control.strStyleDivContent
																,fuente_control.strStyleDivOpcionesBanner,fuente_control.strStyleDivExpandirColapsar
																,fuente_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=fuente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",fuente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(fuente_control) {
		this.actualizarCssBotonesPagina(fuente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(fuente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(fuente_control.tiposReportes,fuente_control.tiposReporte
															 	,fuente_control.tiposPaginacion,fuente_control.tiposAcciones
																,fuente_control.tiposColumnasSelect,fuente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(fuente_control.tiposRelaciones,fuente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(fuente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(fuente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(fuente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(fuente_control) {
	
		var indexPosition=fuente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=fuente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(fuente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(fuente_control.strRecargarFkTiposNinguno!=null && fuente_control.strRecargarFkTiposNinguno!='NINGUNO' && fuente_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(fuente_control) {
		jQuery("#divBusquedafuenteAjaxWebPart").css("display",fuente_control.strPermisoBusqueda);
		jQuery("#trfuenteCabeceraBusquedas").css("display",fuente_control.strPermisoBusqueda);
		jQuery("#trBusquedafuente").css("display",fuente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(fuente_control.htmlTablaOrderBy!=null
			&& fuente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByfuenteAjaxWebPart").html(fuente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//fuente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(fuente_control.htmlTablaOrderByRel!=null
			&& fuente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelfuenteAjaxWebPart").html(fuente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(fuente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedafuenteAjaxWebPart").css("display","none");
			jQuery("#trfuenteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedafuente").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(fuente_control) {
		
		if(!fuente_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(fuente_control);
		} else {
			jQuery("#divTablaDatosfuentesAjaxWebPart").html(fuente_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosfuentes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(fuente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosfuentes=jQuery("#tblTablaDatosfuentes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("fuente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',fuente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			fuente_webcontrol1.registrarControlesTableEdition(fuente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		fuente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(fuente_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("fuente_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(fuente_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosfuentesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(fuente_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(fuente_control);
		
		const divOrderBy = document.getElementById("divOrderByfuenteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(fuente_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelfuenteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(fuente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(fuente_control.fuenteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(fuente_control);			
		}
	}
	
	actualizarCamposFilaTabla(fuente_control) {
		var i=0;
		
		i=fuente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(fuente_control.fuenteActual.id);
		jQuery("#t-version_row_"+i+"").val(fuente_control.fuenteActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(fuente_control.fuenteActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(fuente_control.fuenteActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(fuente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_automatico").click(function(){
		jQuery("#tblTablaDatosfuentes").on("click",".imgrelacionasiento_automatico", function () {

			var idActual=jQuery(this).attr("idactualfuente");

			fuente_webcontrol1.registrarSesionParaasiento_automaticos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento").click(function(){
		jQuery("#tblTablaDatosfuentes").on("click",".imgrelacionasiento", function () {

			var idActual=jQuery(this).attr("idactualfuente");

			fuente_webcontrol1.registrarSesionParaasientos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_predefinido").click(function(){
		jQuery("#tblTablaDatosfuentes").on("click",".imgrelacionasiento_predefinido", function () {

			var idActual=jQuery(this).attr("idactualfuente");

			fuente_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});				
	}
		
	

	registrarSesionParaasiento_automaticos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"fuente","asiento_automatico","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1,"s","");
	}

	registrarSesionParaasientos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"fuente","asiento","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1,"s","");
	}

	registrarSesionParaasiento_predefinidos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"fuente","asiento_predefinido","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1,"s","");
	}
	
	registrarControlesTableEdition(fuente_control) {
		fuente_funcion1.registrarControlesTableValidacionEdition(fuente_control,fuente_webcontrol1,fuente_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(fuente_control) {
		jQuery("#divResumenfuenteActualAjaxWebPart").html(fuente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(fuente_control) {
		//jQuery("#divAccionesRelacionesfuenteAjaxWebPart").html(fuente_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("fuente_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(fuente_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesfuenteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		fuente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(fuente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(fuente_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(fuente_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionfuente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("fuente",id,"contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionasiento_automatico").click(function(){

			var idActual=jQuery(this).attr("idactualfuente");

			fuente_webcontrol1.registrarSesionParaasiento_automaticos(idActual);
		});
		jQuery("#imgdivrelacionasiento").click(function(){

			var idActual=jQuery(this).attr("idactualfuente");

			fuente_webcontrol1.registrarSesionParaasientos(idActual);
		});
		jQuery("#imgdivrelacionasiento_predefinido").click(function(){

			var idActual=jQuery(this).attr("idactualfuente");

			fuente_webcontrol1.registrarSesionParaasiento_predefinidos(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuenteConstante,strParametros);
		
		//fuente_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//fuente_control
		
	
	}
	
	onLoadCombosDefectoFK(fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(fuente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(fuente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);			
			
			
		
			
			if(fuente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("fuente");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("fuente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(fuente_funcion1,fuente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(fuente_funcion1,fuente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(fuente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,"fuente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("fuente");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(fuente_control) {
		
		jQuery("#divBusquedafuenteAjaxWebPart").css("display",fuente_control.strPermisoBusqueda);
		jQuery("#trfuenteCabeceraBusquedas").css("display",fuente_control.strPermisoBusqueda);
		jQuery("#trBusquedafuente").css("display",fuente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportefuente").css("display",fuente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosfuente").attr("style",fuente_control.strPermisoMostrarTodos);		
		
		if(fuente_control.strPermisoNuevo!=null) {
			jQuery("#tdfuenteNuevo").css("display",fuente_control.strPermisoNuevo);
			jQuery("#tdfuenteNuevoToolBar").css("display",fuente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdfuenteDuplicar").css("display",fuente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfuenteDuplicarToolBar").css("display",fuente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfuenteNuevoGuardarCambios").css("display",fuente_control.strPermisoNuevo);
			jQuery("#tdfuenteNuevoGuardarCambiosToolBar").css("display",fuente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(fuente_control.strPermisoActualizar!=null) {
			jQuery("#tdfuenteCopiar").css("display",fuente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfuenteCopiarToolBar").css("display",fuente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfuenteConEditar").css("display",fuente_control.strPermisoActualizar);
		}
		
		jQuery("#tdfuenteGuardarCambios").css("display",fuente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdfuenteGuardarCambiosToolBar").css("display",fuente_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdfuenteCerrarPagina").css("display",fuente_control.strPermisoPopup);		
		jQuery("#tdfuenteCerrarPaginaToolBar").css("display",fuente_control.strPermisoPopup);
		//jQuery("#trfuenteAccionesRelaciones").css("display",fuente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=fuente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + fuente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + fuente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Fuentes";
		sTituloBanner+=" - " + fuente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + fuente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdfuenteRelacionesToolBar").css("display",fuente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosfuente").css("display",fuente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		fuente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		fuente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		fuente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		fuente_webcontrol1.registrarEventosControles();
		
		if(fuente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(fuente_constante1.STR_ES_RELACIONADO=="false") {
			fuente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(fuente_constante1.STR_ES_RELACIONES=="true") {
			if(fuente_constante1.BIT_ES_PAGINA_FORM==true) {
				fuente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(fuente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(fuente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				fuente_webcontrol1.onLoad();
			
			//} else {
				//if(fuente_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			fuente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("fuente","contabilidad","",fuente_funcion1,fuente_webcontrol1,fuente_constante1);	
	}
}

var fuente_webcontrol1 = new fuente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {fuente_webcontrol,fuente_webcontrol1};

//Para ser llamado desde window.opener
window.fuente_webcontrol1 = fuente_webcontrol1;


if(fuente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = fuente_webcontrol1.onLoadWindow; 
}

//</script>