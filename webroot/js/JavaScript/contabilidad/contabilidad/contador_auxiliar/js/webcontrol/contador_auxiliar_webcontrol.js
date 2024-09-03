//<script type="text/javascript" language="javascript">



//var contador_auxiliarJQueryPaginaWebInteraccion= function (contador_auxiliar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {contador_auxiliar_constante,contador_auxiliar_constante1} from '../util/contador_auxiliar_constante.js';

import {contador_auxiliar_funcion,contador_auxiliar_funcion1} from '../util/contador_auxiliar_funcion.js';


class contador_auxiliar_webcontrol extends GeneralEntityWebControl {
	
	contador_auxiliar_control=null;
	contador_auxiliar_controlInicial=null;
	contador_auxiliar_controlAuxiliar=null;
		
	//if(contador_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(contador_auxiliar_control) {
		super();
		
		this.contador_auxiliar_control=contador_auxiliar_control;
	}
		
	actualizarVariablesPagina(contador_auxiliar_control) {
		
		if(contador_auxiliar_control.action=="index" || contador_auxiliar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(contador_auxiliar_control);
			
		} 
		
		
		else if(contador_auxiliar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(contador_auxiliar_control);
			
		} else if(contador_auxiliar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(contador_auxiliar_control);
			
		} else if(contador_auxiliar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(contador_auxiliar_control);		
		
		} else if(contador_auxiliar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(contador_auxiliar_control);
		
		}  else if(contador_auxiliar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(contador_auxiliar_control);
		
		} else if(contador_auxiliar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(contador_auxiliar_control);		
		
		} else if(contador_auxiliar_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(contador_auxiliar_control);		
		
		} else if(contador_auxiliar_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(contador_auxiliar_control);		
		
		} else if(contador_auxiliar_control.action.includes("Busqueda") ||
				  contador_auxiliar_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(contador_auxiliar_control);
			
		} else if(contador_auxiliar_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(contador_auxiliar_control)
		}
		
		
		
	
		else if(contador_auxiliar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(contador_auxiliar_control);	
		
		} else if(contador_auxiliar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(contador_auxiliar_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + contador_auxiliar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(contador_auxiliar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(contador_auxiliar_control) {
		this.actualizarPaginaAccionesGenerales(contador_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(contador_auxiliar_control) {
		
		this.actualizarPaginaCargaGeneral(contador_auxiliar_control);
		this.actualizarPaginaOrderBy(contador_auxiliar_control);
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);
		this.actualizarPaginaCargaGeneralControles(contador_auxiliar_control);
		//this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(contador_auxiliar_control);
		this.actualizarPaginaAreaBusquedas(contador_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(contador_auxiliar_control) {
		//this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(contador_auxiliar_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(contador_auxiliar_control) {
		
		this.actualizarPaginaCargaGeneral(contador_auxiliar_control);
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);
		this.actualizarPaginaCargaGeneralControles(contador_auxiliar_control);
		//this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(contador_auxiliar_control);
		this.actualizarPaginaAreaBusquedas(contador_auxiliar_control);
		this.actualizarPaginaCargaCombosFK(contador_auxiliar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		//this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		//this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		//this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		//this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		//this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		//this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(contador_auxiliar_control) {
		//this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(contador_auxiliar_control) {
		this.actualizarPaginaAbrirLink(contador_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);				
		//this.actualizarPaginaFormulario(contador_auxiliar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);
		//this.actualizarPaginaFormulario(contador_auxiliar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		//this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);
		//this.actualizarPaginaFormulario(contador_auxiliar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(contador_auxiliar_control) {
		//this.actualizarPaginaFormulario(contador_auxiliar_control);
		this.onLoadCombosDefectoFK(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);
		//this.actualizarPaginaFormulario(contador_auxiliar_control);
		this.onLoadCombosDefectoFK(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);		
		//this.actualizarPaginaAreaMantenimiento(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(contador_auxiliar_control) {
		this.actualizarPaginaAbrirLink(contador_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(contador_auxiliar_control) {
		this.actualizarPaginaTablaDatos(contador_auxiliar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(contador_auxiliar_control) {
					//super.actualizarPaginaImprimir(contador_auxiliar_control,"contador_auxiliar");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",contador_auxiliar_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("contador_auxiliar_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(contador_auxiliar_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(contador_auxiliar_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(contador_auxiliar_control) {
		//super.actualizarPaginaImprimir(contador_auxiliar_control,"contador_auxiliar");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("contador_auxiliar_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(contador_auxiliar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",contador_auxiliar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(contador_auxiliar_control) {
		//super.actualizarPaginaImprimir(contador_auxiliar_control,"contador_auxiliar");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("contador_auxiliar_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(contador_auxiliar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",contador_auxiliar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(contador_auxiliar_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(contador_auxiliar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(contador_auxiliar_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(contador_auxiliar_control);
			
		this.actualizarPaginaAbrirLink(contador_auxiliar_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(contador_auxiliar_control) {
		
		if(contador_auxiliar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(contador_auxiliar_control);
		}
		
		if(contador_auxiliar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(contador_auxiliar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(contador_auxiliar_control) {
		if(contador_auxiliar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("contador_auxiliarReturnGeneral",JSON.stringify(contador_auxiliar_control.contador_auxiliarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(contador_auxiliar_control) {
		if(contador_auxiliar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && contador_auxiliar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(contador_auxiliar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(contador_auxiliar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(contador_auxiliar_control, mostrar) {
		
		if(mostrar==true) {
			contador_auxiliar_funcion1.resaltarRestaurarDivsPagina(false,"contador_auxiliar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				contador_auxiliar_funcion1.resaltarRestaurarDivMantenimiento(false,"contador_auxiliar");
			}			
			
			contador_auxiliar_funcion1.mostrarDivMensaje(true,contador_auxiliar_control.strAuxiliarMensaje,contador_auxiliar_control.strAuxiliarCssMensaje);
		
		} else {
			contador_auxiliar_funcion1.mostrarDivMensaje(false,contador_auxiliar_control.strAuxiliarMensaje,contador_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(contador_auxiliar_control) {
		if(contador_auxiliar_funcion1.esPaginaForm(contador_auxiliar_constante1)==true) {
			window.opener.contador_auxiliar_webcontrol1.actualizarPaginaTablaDatos(contador_auxiliar_control);
		} else {
			this.actualizarPaginaTablaDatos(contador_auxiliar_control);
		}
	}
	
	actualizarPaginaAbrirLink(contador_auxiliar_control) {
		contador_auxiliar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(contador_auxiliar_control.strAuxiliarUrlPagina);
				
		contador_auxiliar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(contador_auxiliar_control.strAuxiliarTipo,contador_auxiliar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(contador_auxiliar_control) {
		contador_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,contador_auxiliar_control.strAuxiliarMensajeAlert,contador_auxiliar_control.strAuxiliarCssMensaje);
			
		if(contador_auxiliar_funcion1.esPaginaForm(contador_auxiliar_constante1)==true) {
			window.opener.contador_auxiliar_funcion1.resaltarRestaurarDivMensaje(true,contador_auxiliar_control.strAuxiliarMensajeAlert,contador_auxiliar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(contador_auxiliar_control) {
		this.contador_auxiliar_controlInicial=contador_auxiliar_control;
			
		if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(contador_auxiliar_control.strStyleDivArbol,contador_auxiliar_control.strStyleDivContent
																,contador_auxiliar_control.strStyleDivOpcionesBanner,contador_auxiliar_control.strStyleDivExpandirColapsar
																,contador_auxiliar_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=contador_auxiliar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",contador_auxiliar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(contador_auxiliar_control) {
		this.actualizarCssBotonesPagina(contador_auxiliar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(contador_auxiliar_control.tiposReportes,contador_auxiliar_control.tiposReporte
															 	,contador_auxiliar_control.tiposPaginacion,contador_auxiliar_control.tiposAcciones
																,contador_auxiliar_control.tiposColumnasSelect,contador_auxiliar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(contador_auxiliar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(contador_auxiliar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(contador_auxiliar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(contador_auxiliar_control) {
	
		var indexPosition=contador_auxiliar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=contador_auxiliar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(contador_auxiliar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(contador_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",contador_auxiliar_control.strRecargarFkTipos,",")) { 
				contador_auxiliar_webcontrol1.cargarComboslibro_auxiliarsFK(contador_auxiliar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(contador_auxiliar_control.strRecargarFkTiposNinguno!=null && contador_auxiliar_control.strRecargarFkTiposNinguno!='NINGUNO' && contador_auxiliar_control.strRecargarFkTiposNinguno!='') {
			
				if(contador_auxiliar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_libro_auxiliar",contador_auxiliar_control.strRecargarFkTiposNinguno,",")) { 
					contador_auxiliar_webcontrol1.cargarComboslibro_auxiliarsFK(contador_auxiliar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablalibro_auxiliarFK(contador_auxiliar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,contador_auxiliar_funcion1,contador_auxiliar_control.libro_auxiliarsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(contador_auxiliar_control) {
		jQuery("#divBusquedacontador_auxiliarAjaxWebPart").css("display",contador_auxiliar_control.strPermisoBusqueda);
		jQuery("#trcontador_auxiliarCabeceraBusquedas").css("display",contador_auxiliar_control.strPermisoBusqueda);
		jQuery("#trBusquedacontador_auxiliar").css("display",contador_auxiliar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(contador_auxiliar_control.htmlTablaOrderBy!=null
			&& contador_auxiliar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycontador_auxiliarAjaxWebPart").html(contador_auxiliar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//contador_auxiliar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(contador_auxiliar_control.htmlTablaOrderByRel!=null
			&& contador_auxiliar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcontador_auxiliarAjaxWebPart").html(contador_auxiliar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacontador_auxiliarAjaxWebPart").css("display","none");
			jQuery("#trcontador_auxiliarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacontador_auxiliar").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(contador_auxiliar_control) {
		
		if(!contador_auxiliar_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(contador_auxiliar_control);
		} else {
			jQuery("#divTablaDatoscontador_auxiliarsAjaxWebPart").html(contador_auxiliar_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscontador_auxiliars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscontador_auxiliars=jQuery("#tblTablaDatoscontador_auxiliars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("contador_auxiliar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',contador_auxiliar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			contador_auxiliar_webcontrol1.registrarControlesTableEdition(contador_auxiliar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		contador_auxiliar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(contador_auxiliar_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("contador_auxiliar_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(contador_auxiliar_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscontador_auxiliarsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(contador_auxiliar_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(contador_auxiliar_control);
		
		const divOrderBy = document.getElementById("divOrderBycontador_auxiliarAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(contador_auxiliar_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcontador_auxiliarAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(contador_auxiliar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(contador_auxiliar_control.contador_auxiliarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(contador_auxiliar_control);			
		}
	}
	
	actualizarCamposFilaTabla(contador_auxiliar_control) {
		var i=0;
		
		i=contador_auxiliar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(contador_auxiliar_control.contador_auxiliarActual.id);
		jQuery("#t-version_row_"+i+"").val(contador_auxiliar_control.contador_auxiliarActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(contador_auxiliar_control.contador_auxiliarActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(contador_auxiliar_control.contador_auxiliarActual.id_contador);
		
		if(contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar!=null && contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar) {
				jQuery("#t-cel_"+i+"_4").val(contador_auxiliar_control.contador_auxiliarActual.id_libro_auxiliar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(contador_auxiliar_control.contador_auxiliarActual.periodo_anual);
		jQuery("#t-cel_"+i+"_6").val(contador_auxiliar_control.contador_auxiliarActual.mes);
		jQuery("#t-cel_"+i+"_7").val(contador_auxiliar_control.contador_auxiliarActual.contador);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(contador_auxiliar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(contador_auxiliar_control) {
		contador_auxiliar_funcion1.registrarControlesTableValidacionEdition(contador_auxiliar_control,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(contador_auxiliar_control) {
		jQuery("#divResumencontador_auxiliarActualAjaxWebPart").html(contador_auxiliar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(contador_auxiliar_control) {
		//jQuery("#divAccionesRelacionescontador_auxiliarAjaxWebPart").html(contador_auxiliar_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("contador_auxiliar_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(contador_auxiliar_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescontador_auxiliarAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		contador_auxiliar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(contador_auxiliar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(contador_auxiliar_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(contador_auxiliar_control) {
		
		if(contador_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar").attr("style",contador_auxiliar_control.strVisibleFK_Idlibro_auxiliar);
			jQuery("#tblstrVisible"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar").attr("style",contador_auxiliar_control.strVisibleFK_Idlibro_auxiliar);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncontador_auxiliar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("contador_auxiliar",id,"contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);		
	}
	
	

	abrirBusquedaParalibro_auxiliar(strNombreCampoBusqueda){//idActual
		contador_auxiliar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("contador_auxiliar","libro_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliarConstante,strParametros);
		
		//contador_auxiliar_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarComboslibro_auxiliarsFK(contador_auxiliar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar",contador_auxiliar_control.libro_auxiliarsFK);

		if(contador_auxiliar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+contador_auxiliar_control.idFilaTablaActual+"_4",contador_auxiliar_control.libro_auxiliarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar",contador_auxiliar_control.libro_auxiliarsFK);

	};

	
	
	registrarComboActionChangeComboslibro_auxiliarsFK(contador_auxiliar_control) {

	};

	
	
	setDefectoValorComboslibro_auxiliarsFK(contador_auxiliar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(contador_auxiliar_control.idlibro_auxiliarDefaultFK>-1 && jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != contador_auxiliar_control.idlibro_auxiliarDefaultFK) {
				jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(contador_auxiliar_control.idlibro_auxiliarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(contador_auxiliar_control.idlibro_auxiliarDefaultForeignKey).trigger("change");
			if(jQuery("#"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+contador_auxiliar_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//contador_auxiliar_control
		
	
	}
	
	onLoadCombosDefectoFK(contador_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(contador_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(contador_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",contador_auxiliar_control.strRecargarFkTipos,",")) { 
				contador_auxiliar_webcontrol1.setDefectoValorComboslibro_auxiliarsFK(contador_auxiliar_control);
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
	onLoadCombosEventosFK(contador_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(contador_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(contador_auxiliar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",contador_auxiliar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				contador_auxiliar_webcontrol1.registrarComboActionChangeComboslibro_auxiliarsFK(contador_auxiliar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(contador_auxiliar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(contador_auxiliar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(contador_auxiliar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(contador_auxiliar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("contador_auxiliar","FK_Idlibro_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
		
			
			if(contador_auxiliar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("contador_auxiliar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("contador_auxiliar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,"contador_auxiliar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("libro_auxiliar","id_libro_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+contador_auxiliar_constante1.STR_SUFIJO+"-id_libro_auxiliar_img_busqueda").click(function(){
				contador_auxiliar_webcontrol1.abrirBusquedaParalibro_auxiliar("id_libro_auxiliar");
				//alert(jQuery('#form-id_libro_auxiliar_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(contador_auxiliar_control) {
		
		jQuery("#divBusquedacontador_auxiliarAjaxWebPart").css("display",contador_auxiliar_control.strPermisoBusqueda);
		jQuery("#trcontador_auxiliarCabeceraBusquedas").css("display",contador_auxiliar_control.strPermisoBusqueda);
		jQuery("#trBusquedacontador_auxiliar").css("display",contador_auxiliar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecontador_auxiliar").css("display",contador_auxiliar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscontador_auxiliar").attr("style",contador_auxiliar_control.strPermisoMostrarTodos);		
		
		if(contador_auxiliar_control.strPermisoNuevo!=null) {
			jQuery("#tdcontador_auxiliarNuevo").css("display",contador_auxiliar_control.strPermisoNuevo);
			jQuery("#tdcontador_auxiliarNuevoToolBar").css("display",contador_auxiliar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcontador_auxiliarDuplicar").css("display",contador_auxiliar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcontador_auxiliarDuplicarToolBar").css("display",contador_auxiliar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcontador_auxiliarNuevoGuardarCambios").css("display",contador_auxiliar_control.strPermisoNuevo);
			jQuery("#tdcontador_auxiliarNuevoGuardarCambiosToolBar").css("display",contador_auxiliar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(contador_auxiliar_control.strPermisoActualizar!=null) {
			jQuery("#tdcontador_auxiliarCopiar").css("display",contador_auxiliar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcontador_auxiliarCopiarToolBar").css("display",contador_auxiliar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcontador_auxiliarConEditar").css("display",contador_auxiliar_control.strPermisoActualizar);
		}
		
		jQuery("#tdcontador_auxiliarGuardarCambios").css("display",contador_auxiliar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcontador_auxiliarGuardarCambiosToolBar").css("display",contador_auxiliar_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcontador_auxiliarCerrarPagina").css("display",contador_auxiliar_control.strPermisoPopup);		
		jQuery("#tdcontador_auxiliarCerrarPaginaToolBar").css("display",contador_auxiliar_control.strPermisoPopup);
		//jQuery("#trcontador_auxiliarAccionesRelaciones").css("display",contador_auxiliar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=contador_auxiliar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + contador_auxiliar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + contador_auxiliar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Contadores Auxiliareses";
		sTituloBanner+=" - " + contador_auxiliar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + contador_auxiliar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcontador_auxiliarRelacionesToolBar").css("display",contador_auxiliar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscontador_auxiliar").css("display",contador_auxiliar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		contador_auxiliar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		contador_auxiliar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		contador_auxiliar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		contador_auxiliar_webcontrol1.registrarEventosControles();
		
		if(contador_auxiliar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
			contador_auxiliar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(contador_auxiliar_constante1.STR_ES_RELACIONES=="true") {
			if(contador_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				contador_auxiliar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(contador_auxiliar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(contador_auxiliar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				contador_auxiliar_webcontrol1.onLoad();
			
			//} else {
				//if(contador_auxiliar_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			contador_auxiliar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("contador_auxiliar","contabilidad","",contador_auxiliar_funcion1,contador_auxiliar_webcontrol1,contador_auxiliar_constante1);	
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

var contador_auxiliar_webcontrol1 = new contador_auxiliar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {contador_auxiliar_webcontrol,contador_auxiliar_webcontrol1};

//Para ser llamado desde window.opener
window.contador_auxiliar_webcontrol1 = contador_auxiliar_webcontrol1;


if(contador_auxiliar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = contador_auxiliar_webcontrol1.onLoadWindow; 
}

//</script>