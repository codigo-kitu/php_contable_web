//<script type="text/javascript" language="javascript">



//var perfil_accionJQueryPaginaWebInteraccion= function (perfil_accion_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {perfil_accion_constante,perfil_accion_constante1} from '../util/perfil_accion_constante.js';

import {perfil_accion_funcion,perfil_accion_funcion1} from '../util/perfil_accion_funcion.js';


class perfil_accion_webcontrol extends GeneralEntityWebControl {
	
	perfil_accion_control=null;
	perfil_accion_controlInicial=null;
	perfil_accion_controlAuxiliar=null;
		
	//if(perfil_accion_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(perfil_accion_control) {
		super();
		
		this.perfil_accion_control=perfil_accion_control;
	}
		
	actualizarVariablesPagina(perfil_accion_control) {
		
		if(perfil_accion_control.action=="index" || perfil_accion_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(perfil_accion_control);
			
		} 
		
		
		else if(perfil_accion_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(perfil_accion_control);
			
		} else if(perfil_accion_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(perfil_accion_control);
			
		} else if(perfil_accion_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_accion_control);		
		
		} else if(perfil_accion_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(perfil_accion_control);
		
		}  else if(perfil_accion_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_accion_control);
		
		} else if(perfil_accion_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_accion_control);		
		
		} else if(perfil_accion_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(perfil_accion_control);		
		
		} else if(perfil_accion_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(perfil_accion_control);		
		
		} else if(perfil_accion_control.action.includes("Busqueda") ||
				  perfil_accion_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(perfil_accion_control);
			
		} else if(perfil_accion_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(perfil_accion_control)
		}
		
		
		
	
		else if(perfil_accion_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(perfil_accion_control);	
		
		} else if(perfil_accion_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_accion_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + perfil_accion_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(perfil_accion_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(perfil_accion_control) {
		this.actualizarPaginaAccionesGenerales(perfil_accion_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(perfil_accion_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_accion_control);
		this.actualizarPaginaOrderBy(perfil_accion_control);
		this.actualizarPaginaTablaDatos(perfil_accion_control);
		this.actualizarPaginaCargaGeneralControles(perfil_accion_control);
		//this.actualizarPaginaFormulario(perfil_accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_accion_control);
		this.actualizarPaginaAreaBusquedas(perfil_accion_control);
		this.actualizarPaginaCargaCombosFK(perfil_accion_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(perfil_accion_control) {
		//this.actualizarPaginaFormulario(perfil_accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(perfil_accion_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(perfil_accion_control) {
		
		this.actualizarPaginaCargaGeneral(perfil_accion_control);
		this.actualizarPaginaTablaDatos(perfil_accion_control);
		this.actualizarPaginaCargaGeneralControles(perfil_accion_control);
		//this.actualizarPaginaFormulario(perfil_accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(perfil_accion_control);
		this.actualizarPaginaAreaBusquedas(perfil_accion_control);
		this.actualizarPaginaCargaCombosFK(perfil_accion_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);		
		//this.actualizarPaginaFormulario(perfil_accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);		
		//this.actualizarPaginaFormulario(perfil_accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);		
		//this.actualizarPaginaFormulario(perfil_accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(perfil_accion_control) {
		//this.actualizarPaginaFormulario(perfil_accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(perfil_accion_control) {
		this.actualizarPaginaAbrirLink(perfil_accion_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);				
		//this.actualizarPaginaFormulario(perfil_accion_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_accion_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);
		//this.actualizarPaginaFormulario(perfil_accion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);
		//this.actualizarPaginaFormulario(perfil_accion_control);
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(perfil_accion_control) {
		//this.actualizarPaginaFormulario(perfil_accion_control);
		this.onLoadCombosDefectoFK(perfil_accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		this.actualizarPaginaAreaMantenimiento(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);
		//this.actualizarPaginaFormulario(perfil_accion_control);
		this.onLoadCombosDefectoFK(perfil_accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);		
		//this.actualizarPaginaAreaMantenimiento(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(perfil_accion_control) {
		this.actualizarPaginaAbrirLink(perfil_accion_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(perfil_accion_control) {
		this.actualizarPaginaTablaDatos(perfil_accion_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(perfil_accion_control) {
					//super.actualizarPaginaImprimir(perfil_accion_control,"perfil_accion");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_accion_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("perfil_accion_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(perfil_accion_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_accion_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(perfil_accion_control) {
		//super.actualizarPaginaImprimir(perfil_accion_control,"perfil_accion");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("perfil_accion_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(perfil_accion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_accion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(perfil_accion_control) {
		//super.actualizarPaginaImprimir(perfil_accion_control,"perfil_accion");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("perfil_accion_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(perfil_accion_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",perfil_accion_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(perfil_accion_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(perfil_accion_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(perfil_accion_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(perfil_accion_control);
			
		this.actualizarPaginaAbrirLink(perfil_accion_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(perfil_accion_control) {
		
		if(perfil_accion_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(perfil_accion_control);
		}
		
		if(perfil_accion_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(perfil_accion_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(perfil_accion_control) {
		if(perfil_accion_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("perfil_accionReturnGeneral",JSON.stringify(perfil_accion_control.perfil_accionReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(perfil_accion_control) {
		if(perfil_accion_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && perfil_accion_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(perfil_accion_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(perfil_accion_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(perfil_accion_control, mostrar) {
		
		if(mostrar==true) {
			perfil_accion_funcion1.resaltarRestaurarDivsPagina(false,"perfil_accion");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				perfil_accion_funcion1.resaltarRestaurarDivMantenimiento(false,"perfil_accion");
			}			
			
			perfil_accion_funcion1.mostrarDivMensaje(true,perfil_accion_control.strAuxiliarMensaje,perfil_accion_control.strAuxiliarCssMensaje);
		
		} else {
			perfil_accion_funcion1.mostrarDivMensaje(false,perfil_accion_control.strAuxiliarMensaje,perfil_accion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(perfil_accion_control) {
		if(perfil_accion_funcion1.esPaginaForm(perfil_accion_constante1)==true) {
			window.opener.perfil_accion_webcontrol1.actualizarPaginaTablaDatos(perfil_accion_control);
		} else {
			this.actualizarPaginaTablaDatos(perfil_accion_control);
		}
	}
	
	actualizarPaginaAbrirLink(perfil_accion_control) {
		perfil_accion_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(perfil_accion_control.strAuxiliarUrlPagina);
				
		perfil_accion_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(perfil_accion_control.strAuxiliarTipo,perfil_accion_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(perfil_accion_control) {
		perfil_accion_funcion1.resaltarRestaurarDivMensaje(true,perfil_accion_control.strAuxiliarMensajeAlert,perfil_accion_control.strAuxiliarCssMensaje);
			
		if(perfil_accion_funcion1.esPaginaForm(perfil_accion_constante1)==true) {
			window.opener.perfil_accion_funcion1.resaltarRestaurarDivMensaje(true,perfil_accion_control.strAuxiliarMensajeAlert,perfil_accion_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(perfil_accion_control) {
		this.perfil_accion_controlInicial=perfil_accion_control;
			
		if(perfil_accion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(perfil_accion_control.strStyleDivArbol,perfil_accion_control.strStyleDivContent
																,perfil_accion_control.strStyleDivOpcionesBanner,perfil_accion_control.strStyleDivExpandirColapsar
																,perfil_accion_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=perfil_accion_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",perfil_accion_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(perfil_accion_control) {
		this.actualizarCssBotonesPagina(perfil_accion_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(perfil_accion_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(perfil_accion_control.tiposReportes,perfil_accion_control.tiposReporte
															 	,perfil_accion_control.tiposPaginacion,perfil_accion_control.tiposAcciones
																,perfil_accion_control.tiposColumnasSelect,perfil_accion_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(perfil_accion_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(perfil_accion_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(perfil_accion_control);			
	}
	
	actualizarPaginaUsuarioInvitado(perfil_accion_control) {
	
		var indexPosition=perfil_accion_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=perfil_accion_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(perfil_accion_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(perfil_accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_accion_control.strRecargarFkTipos,",")) { 
				perfil_accion_webcontrol1.cargarCombosperfilsFK(perfil_accion_control);
			}

			if(perfil_accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_accion",perfil_accion_control.strRecargarFkTipos,",")) { 
				perfil_accion_webcontrol1.cargarCombosaccionsFK(perfil_accion_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(perfil_accion_control.strRecargarFkTiposNinguno!=null && perfil_accion_control.strRecargarFkTiposNinguno!='NINGUNO' && perfil_accion_control.strRecargarFkTiposNinguno!='') {
			
				if(perfil_accion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_perfil",perfil_accion_control.strRecargarFkTiposNinguno,",")) { 
					perfil_accion_webcontrol1.cargarCombosperfilsFK(perfil_accion_control);
				}

				if(perfil_accion_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_accion",perfil_accion_control.strRecargarFkTiposNinguno,",")) { 
					perfil_accion_webcontrol1.cargarCombosaccionsFK(perfil_accion_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaperfilFK(perfil_accion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_accion_funcion1,perfil_accion_control.perfilsFK);
	}

	cargarComboEditarTablaaccionFK(perfil_accion_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,perfil_accion_funcion1,perfil_accion_control.accionsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(perfil_accion_control) {
		jQuery("#divBusquedaperfil_accionAjaxWebPart").css("display",perfil_accion_control.strPermisoBusqueda);
		jQuery("#trperfil_accionCabeceraBusquedas").css("display",perfil_accion_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil_accion").css("display",perfil_accion_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(perfil_accion_control.htmlTablaOrderBy!=null
			&& perfil_accion_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByperfil_accionAjaxWebPart").html(perfil_accion_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//perfil_accion_webcontrol1.registrarOrderByActions();
			
		}
			
		if(perfil_accion_control.htmlTablaOrderByRel!=null
			&& perfil_accion_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelperfil_accionAjaxWebPart").html(perfil_accion_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(perfil_accion_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaperfil_accionAjaxWebPart").css("display","none");
			jQuery("#trperfil_accionCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaperfil_accion").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(perfil_accion_control) {
		
		if(!perfil_accion_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(perfil_accion_control);
		} else {
			jQuery("#divTablaDatosperfil_accionsAjaxWebPart").html(perfil_accion_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosperfil_accions=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(perfil_accion_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosperfil_accions=jQuery("#tblTablaDatosperfil_accions").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("perfil_accion",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',perfil_accion_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			perfil_accion_webcontrol1.registrarControlesTableEdition(perfil_accion_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		perfil_accion_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(perfil_accion_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("perfil_accion_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(perfil_accion_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosperfil_accionsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(perfil_accion_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(perfil_accion_control);
		
		const divOrderBy = document.getElementById("divOrderByperfil_accionAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(perfil_accion_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelperfil_accionAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(perfil_accion_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(perfil_accion_control.perfil_accionActual!=null) {//form
			
			this.actualizarCamposFilaTabla(perfil_accion_control);			
		}
	}
	
	actualizarCamposFilaTabla(perfil_accion_control) {
		var i=0;
		
		i=perfil_accion_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(perfil_accion_control.perfil_accionActual.id);
		jQuery("#t-version_row_"+i+"").val(perfil_accion_control.perfil_accionActual.versionRow);
		
		if(perfil_accion_control.perfil_accionActual.id_perfil!=null && perfil_accion_control.perfil_accionActual.id_perfil>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != perfil_accion_control.perfil_accionActual.id_perfil) {
				jQuery("#t-cel_"+i+"_2").val(perfil_accion_control.perfil_accionActual.id_perfil).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(perfil_accion_control.perfil_accionActual.id_accion!=null && perfil_accion_control.perfil_accionActual.id_accion>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != perfil_accion_control.perfil_accionActual.id_accion) {
				jQuery("#t-cel_"+i+"_3").val(perfil_accion_control.perfil_accionActual.id_accion).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").prop('checked',perfil_accion_control.perfil_accionActual.ejecusion);
		jQuery("#t-cel_"+i+"_5").prop('checked',perfil_accion_control.perfil_accionActual.estado);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(perfil_accion_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(perfil_accion_control) {
		perfil_accion_funcion1.registrarControlesTableValidacionEdition(perfil_accion_control,perfil_accion_webcontrol1,perfil_accion_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(perfil_accion_control) {
		jQuery("#divResumenperfil_accionActualAjaxWebPart").html(perfil_accion_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(perfil_accion_control) {
		//jQuery("#divAccionesRelacionesperfil_accionAjaxWebPart").html(perfil_accion_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("perfil_accion_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(perfil_accion_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesperfil_accionAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		perfil_accion_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(perfil_accion_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(perfil_accion_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(perfil_accion_control) {
		
		if(perfil_accion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_accion_constante1.STR_SUFIJO+"FK_Idaccion").attr("style",perfil_accion_control.strVisibleFK_Idaccion);
			jQuery("#tblstrVisible"+perfil_accion_constante1.STR_SUFIJO+"FK_Idaccion").attr("style",perfil_accion_control.strVisibleFK_Idaccion);
		}

		if(perfil_accion_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+perfil_accion_constante1.STR_SUFIJO+"FK_Idperfil").attr("style",perfil_accion_control.strVisibleFK_Idperfil);
			jQuery("#tblstrVisible"+perfil_accion_constante1.STR_SUFIJO+"FK_Idperfil").attr("style",perfil_accion_control.strVisibleFK_Idperfil);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionperfil_accion();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("perfil_accion",id,"seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);		
	}
	
	

	abrirBusquedaParaperfil(strNombreCampoBusqueda){//idActual
		perfil_accion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil_accion","perfil","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
	}

	abrirBusquedaParaaccion(strNombreCampoBusqueda){//idActual
		perfil_accion_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("perfil_accion","accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
	}
	
	

	setCombosCodigoDesdeBusquedaid_perfil(id_perfil) {
		if(jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil").val() != id_perfil) {
			jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil").val(id_perfil).trigger("change");

		}
		if(jQuery("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val() != id_perfil) {
			jQuery("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(id_perfil).trigger("change");
		}

	}
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accionConstante,strParametros);
		
		//perfil_accion_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosperfilsFK(perfil_accion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil",perfil_accion_control.perfilsFK);

		if(perfil_accion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_accion_control.idFilaTablaActual+"_2",perfil_accion_control.perfilsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil",perfil_accion_control.perfilsFK);

	};

	cargarCombosaccionsFK(perfil_accion_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_accion",perfil_accion_control.accionsFK);

		if(perfil_accion_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+perfil_accion_control.idFilaTablaActual+"_3",perfil_accion_control.accionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idaccion-cmbid_accion",perfil_accion_control.accionsFK);

	};

	
	
	registrarComboActionChangeCombosperfilsFK(perfil_accion_control) {

	};

	registrarComboActionChangeCombosaccionsFK(perfil_accion_control) {

	};

	
	
	setDefectoValorCombosperfilsFK(perfil_accion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_accion_control.idperfilDefaultFK>-1 && jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil").val() != perfil_accion_control.idperfilDefaultFK) {
				jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil").val(perfil_accion_control.idperfilDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(perfil_accion_control.idperfilDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idperfil-cmbid_perfil").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosaccionsFK(perfil_accion_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(perfil_accion_control.idaccionDefaultFK>-1 && jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_accion").val() != perfil_accion_control.idaccionDefaultFK) {
				jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_accion").val(perfil_accion_control.idaccionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idaccion-cmbid_accion").val(perfil_accion_control.idaccionDefaultForeignKey).trigger("change");
			if(jQuery("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idaccion-cmbid_accion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+perfil_accion_constante1.STR_SUFIJO+"FK_Idaccion-cmbid_accion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//perfil_accion_control
		
	
	}
	
	onLoadCombosDefectoFK(perfil_accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(perfil_accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_accion_control.strRecargarFkTipos,",")) { 
				perfil_accion_webcontrol1.setDefectoValorCombosperfilsFK(perfil_accion_control);
			}

			if(perfil_accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_accion",perfil_accion_control.strRecargarFkTipos,",")) { 
				perfil_accion_webcontrol1.setDefectoValorCombosaccionsFK(perfil_accion_control);
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
	onLoadCombosEventosFK(perfil_accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(perfil_accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_perfil",perfil_accion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_accion_webcontrol1.registrarComboActionChangeCombosperfilsFK(perfil_accion_control);
			//}

			//if(perfil_accion_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_accion",perfil_accion_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				perfil_accion_webcontrol1.registrarComboActionChangeCombosaccionsFK(perfil_accion_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(perfil_accion_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(perfil_accion_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(perfil_accion_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(perfil_accion_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_accion","FK_Idaccion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("perfil_accion","FK_Idperfil","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
		
			
			if(perfil_accion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("perfil_accion");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("perfil_accion");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(perfil_accion_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,"perfil_accion");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("perfil","id_perfil","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_perfil_img_busqueda").click(function(){
				perfil_accion_webcontrol1.abrirBusquedaParaperfil("id_perfil");
				//alert(jQuery('#form-id_perfil_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("accion","id_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+perfil_accion_constante1.STR_SUFIJO+"-id_accion_img_busqueda").click(function(){
				perfil_accion_webcontrol1.abrirBusquedaParaaccion("id_accion");
				//alert(jQuery('#form-id_accion_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(perfil_accion_control) {
		
		jQuery("#divBusquedaperfil_accionAjaxWebPart").css("display",perfil_accion_control.strPermisoBusqueda);
		jQuery("#trperfil_accionCabeceraBusquedas").css("display",perfil_accion_control.strPermisoBusqueda);
		jQuery("#trBusquedaperfil_accion").css("display",perfil_accion_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteperfil_accion").css("display",perfil_accion_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosperfil_accion").attr("style",perfil_accion_control.strPermisoMostrarTodos);		
		
		if(perfil_accion_control.strPermisoNuevo!=null) {
			jQuery("#tdperfil_accionNuevo").css("display",perfil_accion_control.strPermisoNuevo);
			jQuery("#tdperfil_accionNuevoToolBar").css("display",perfil_accion_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdperfil_accionDuplicar").css("display",perfil_accion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfil_accionDuplicarToolBar").css("display",perfil_accion_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdperfil_accionNuevoGuardarCambios").css("display",perfil_accion_control.strPermisoNuevo);
			jQuery("#tdperfil_accionNuevoGuardarCambiosToolBar").css("display",perfil_accion_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(perfil_accion_control.strPermisoActualizar!=null) {
			jQuery("#tdperfil_accionCopiar").css("display",perfil_accion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_accionCopiarToolBar").css("display",perfil_accion_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdperfil_accionConEditar").css("display",perfil_accion_control.strPermisoActualizar);
		}
		
		jQuery("#tdperfil_accionGuardarCambios").css("display",perfil_accion_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdperfil_accionGuardarCambiosToolBar").css("display",perfil_accion_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdperfil_accionCerrarPagina").css("display",perfil_accion_control.strPermisoPopup);		
		jQuery("#tdperfil_accionCerrarPaginaToolBar").css("display",perfil_accion_control.strPermisoPopup);
		//jQuery("#trperfil_accionAccionesRelaciones").css("display",perfil_accion_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=perfil_accion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_accion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + perfil_accion_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Perfil Acciones";
		sTituloBanner+=" - " + perfil_accion_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + perfil_accion_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdperfil_accionRelacionesToolBar").css("display",perfil_accion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosperfil_accion").css("display",perfil_accion_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		perfil_accion_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		perfil_accion_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		perfil_accion_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		perfil_accion_webcontrol1.registrarEventosControles();
		
		if(perfil_accion_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(perfil_accion_constante1.STR_ES_RELACIONADO=="false") {
			perfil_accion_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(perfil_accion_constante1.STR_ES_RELACIONES=="true") {
			if(perfil_accion_constante1.BIT_ES_PAGINA_FORM==true) {
				perfil_accion_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(perfil_accion_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(perfil_accion_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				perfil_accion_webcontrol1.onLoad();
			
			//} else {
				//if(perfil_accion_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			perfil_accion_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("perfil_accion","seguridad","",perfil_accion_funcion1,perfil_accion_webcontrol1,perfil_accion_constante1);	
	}
}

var perfil_accion_webcontrol1 = new perfil_accion_webcontrol();

//Para ser llamado desde otro archivo (import)
export {perfil_accion_webcontrol,perfil_accion_webcontrol1};

//Para ser llamado desde window.opener
window.perfil_accion_webcontrol1 = perfil_accion_webcontrol1;


if(perfil_accion_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = perfil_accion_webcontrol1.onLoadWindow; 
}

//</script>