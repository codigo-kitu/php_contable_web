//<script type="text/javascript" language="javascript">



//var parametro_generalJQueryPaginaWebInteraccion= function (parametro_general_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_general_constante,parametro_general_constante1} from '../util/parametro_general_constante.js';

import {parametro_general_funcion,parametro_general_funcion1} from '../util/parametro_general_funcion.js';


class parametro_general_webcontrol extends GeneralEntityWebControl {
	
	parametro_general_control=null;
	parametro_general_controlInicial=null;
	parametro_general_controlAuxiliar=null;
		
	//if(parametro_general_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_general_control) {
		super();
		
		this.parametro_general_control=parametro_general_control;
	}
		
	actualizarVariablesPagina(parametro_general_control) {
		
		if(parametro_general_control.action=="index" || parametro_general_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_general_control);
			
		} 
		
		
		else if(parametro_general_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_general_control);
		
		} else if(parametro_general_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_general_control);
		
		} else if(parametro_general_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_general_control);
		
		} else if(parametro_general_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_general_control);
			
		} else if(parametro_general_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_general_control);
			
		} else if(parametro_general_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_general_control);
		
		} else if(parametro_general_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_general_control);		
		
		} else if(parametro_general_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_general_control);
		
		} else if(parametro_general_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_general_control);
		
		} else if(parametro_general_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_general_control);
		
		} else if(parametro_general_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_general_control);
		
		}  else if(parametro_general_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_general_control);
		
		} else if(parametro_general_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_general_control);
		
		} else if(parametro_general_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_general_control);
		
		} else if(parametro_general_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_general_control);
		
		} else if(parametro_general_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_general_control);
		
		} else if(parametro_general_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_general_control);
		
		} else if(parametro_general_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_general_control);
		
		} else if(parametro_general_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_general_control);
		
		} else if(parametro_general_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_general_control);
		
		} else if(parametro_general_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_general_control);		
		
		} else if(parametro_general_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(parametro_general_control);		
		
		} else if(parametro_general_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(parametro_general_control);		
		
		} else if(parametro_general_control.action.includes("Busqueda") ||
				  parametro_general_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(parametro_general_control);
			
		} else if(parametro_general_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(parametro_general_control)
		}
		
		
		
	
		else if(parametro_general_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_general_control);	
		
		} else if(parametro_general_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_general_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_general_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_general_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_general_control) {
		this.actualizarPaginaAccionesGenerales(parametro_general_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_general_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_general_control);
		this.actualizarPaginaOrderBy(parametro_general_control);
		this.actualizarPaginaTablaDatos(parametro_general_control);
		this.actualizarPaginaCargaGeneralControles(parametro_general_control);
		//this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_general_control);
		this.actualizarPaginaAreaBusquedas(parametro_general_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_general_control) {
		//this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_general_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_general_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_general_control);
		this.actualizarPaginaTablaDatos(parametro_general_control);
		this.actualizarPaginaCargaGeneralControles(parametro_general_control);
		//this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_general_control);
		this.actualizarPaginaAreaBusquedas(parametro_general_control);
		this.actualizarPaginaCargaCombosFK(parametro_general_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		//this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		//this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		//this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_general_control) {
		//this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_general_control) {
		this.actualizarPaginaAbrirLink(parametro_general_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);				
		//this.actualizarPaginaFormulario(parametro_general_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);
		//this.actualizarPaginaFormulario(parametro_general_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);
		//this.actualizarPaginaFormulario(parametro_general_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_general_control) {
		//this.actualizarPaginaFormulario(parametro_general_control);
		this.onLoadCombosDefectoFK(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);
		//this.actualizarPaginaFormulario(parametro_general_control);
		this.onLoadCombosDefectoFK(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_general_control) {
		this.actualizarPaginaAbrirLink(parametro_general_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_general_control) {
		this.actualizarPaginaTablaDatos(parametro_general_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_general_control) {
					//super.actualizarPaginaImprimir(parametro_general_control,"parametro_general");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_general_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("parametro_general_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(parametro_general_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_general_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_general_control) {
		//super.actualizarPaginaImprimir(parametro_general_control,"parametro_general");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("parametro_general_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(parametro_general_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_general_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(parametro_general_control) {
		//super.actualizarPaginaImprimir(parametro_general_control,"parametro_general");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("parametro_general_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(parametro_general_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_general_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_general_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(parametro_general_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_general_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(parametro_general_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(parametro_general_control);
			
		this.actualizarPaginaAbrirLink(parametro_general_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_general_control) {
		
		if(parametro_general_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_general_control);
		}
		
		if(parametro_general_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_general_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_general_control) {
		if(parametro_general_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_generalReturnGeneral",JSON.stringify(parametro_general_control.parametro_generalReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_general_control) {
		if(parametro_general_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_general_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_general_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_general_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_general_control, mostrar) {
		
		if(mostrar==true) {
			parametro_general_funcion1.resaltarRestaurarDivsPagina(false,"parametro_general");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_general_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_general");
			}			
			
			parametro_general_funcion1.mostrarDivMensaje(true,parametro_general_control.strAuxiliarMensaje,parametro_general_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_general_funcion1.mostrarDivMensaje(false,parametro_general_control.strAuxiliarMensaje,parametro_general_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_general_control) {
		if(parametro_general_funcion1.esPaginaForm(parametro_general_constante1)==true) {
			window.opener.parametro_general_webcontrol1.actualizarPaginaTablaDatos(parametro_general_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_general_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_general_control) {
		parametro_general_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_general_control.strAuxiliarUrlPagina);
				
		parametro_general_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_general_control.strAuxiliarTipo,parametro_general_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_general_control) {
		parametro_general_funcion1.resaltarRestaurarDivMensaje(true,parametro_general_control.strAuxiliarMensajeAlert,parametro_general_control.strAuxiliarCssMensaje);
			
		if(parametro_general_funcion1.esPaginaForm(parametro_general_constante1)==true) {
			window.opener.parametro_general_funcion1.resaltarRestaurarDivMensaje(true,parametro_general_control.strAuxiliarMensajeAlert,parametro_general_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_general_control) {
		this.parametro_general_controlInicial=parametro_general_control;
			
		if(parametro_general_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_general_control.strStyleDivArbol,parametro_general_control.strStyleDivContent
																,parametro_general_control.strStyleDivOpcionesBanner,parametro_general_control.strStyleDivExpandirColapsar
																,parametro_general_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_general_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_general_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_general_control) {
		this.actualizarCssBotonesPagina(parametro_general_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_general_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_general_control.tiposReportes,parametro_general_control.tiposReporte
															 	,parametro_general_control.tiposPaginacion,parametro_general_control.tiposAcciones
																,parametro_general_control.tiposColumnasSelect,parametro_general_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_general_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_general_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_general_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_general_control) {
	
		var indexPosition=parametro_general_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_general_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_general_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.cargarCombosempresasFK(parametro_general_control);
			}

			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.cargarCombospaissFK(parametro_general_control);
			}

			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modena",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.cargarCombosmonedasFK(parametro_general_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_general_control.strRecargarFkTiposNinguno!=null && parametro_general_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_general_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_general_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_control.strRecargarFkTiposNinguno,",")) { 
					parametro_general_webcontrol1.cargarCombosempresasFK(parametro_general_control);
				}

				if(parametro_general_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_pais",parametro_general_control.strRecargarFkTiposNinguno,",")) { 
					parametro_general_webcontrol1.cargarCombospaissFK(parametro_general_control);
				}

				if(parametro_general_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modena",parametro_general_control.strRecargarFkTiposNinguno,",")) { 
					parametro_general_webcontrol1.cargarCombosmonedasFK(parametro_general_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(parametro_general_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_general_funcion1,parametro_general_control.empresasFK);
	}

	cargarComboEditarTablapaisFK(parametro_general_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_general_funcion1,parametro_general_control.paissFK);
	}

	cargarComboEditarTablamonedaFK(parametro_general_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_general_funcion1,parametro_general_control.monedasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(parametro_general_control) {
		jQuery("#divBusquedaparametro_generalAjaxWebPart").css("display",parametro_general_control.strPermisoBusqueda);
		jQuery("#trparametro_generalCabeceraBusquedas").css("display",parametro_general_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_general").css("display",parametro_general_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_general_control.htmlTablaOrderBy!=null
			&& parametro_general_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_generalAjaxWebPart").html(parametro_general_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_general_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_general_control.htmlTablaOrderByRel!=null
			&& parametro_general_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_generalAjaxWebPart").html(parametro_general_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_general_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_generalAjaxWebPart").css("display","none");
			jQuery("#trparametro_generalCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_general").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(parametro_general_control) {
		
		if(!parametro_general_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(parametro_general_control);
		} else {
			jQuery("#divTablaDatosparametro_generalsAjaxWebPart").html(parametro_general_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_generals=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_general_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_generals=jQuery("#tblTablaDatosparametro_generals").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_general",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_general_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_general_webcontrol1.registrarControlesTableEdition(parametro_general_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_general_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(parametro_general_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("parametro_general_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(parametro_general_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosparametro_generalsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(parametro_general_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(parametro_general_control);
		
		const divOrderBy = document.getElementById("divOrderByparametro_generalAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(parametro_general_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelparametro_generalAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(parametro_general_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_general_control.parametro_generalActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_general_control);			
		}
	}
	
	actualizarCamposFilaTabla(parametro_general_control) {
		var i=0;
		
		i=parametro_general_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_general_control.parametro_generalActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_general_control.parametro_generalActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(parametro_general_control.parametro_generalActual.versionRow);
		
		if(parametro_general_control.parametro_generalActual.id_empresa!=null && parametro_general_control.parametro_generalActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != parametro_general_control.parametro_generalActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(parametro_general_control.parametro_generalActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_general_control.parametro_generalActual.id_pais!=null && parametro_general_control.parametro_generalActual.id_pais>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != parametro_general_control.parametro_generalActual.id_pais) {
				jQuery("#t-cel_"+i+"_4").val(parametro_general_control.parametro_generalActual.id_pais).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(parametro_general_control.parametro_generalActual.id_modena!=null && parametro_general_control.parametro_generalActual.id_modena>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != parametro_general_control.parametro_generalActual.id_modena) {
				jQuery("#t-cel_"+i+"_5").val(parametro_general_control.parametro_generalActual.id_modena).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(parametro_general_control.parametro_generalActual.simbolo_moneda);
		jQuery("#t-cel_"+i+"_7").val(parametro_general_control.parametro_generalActual.numero_decimales);
		jQuery("#t-cel_"+i+"_8").prop('checked',parametro_general_control.parametro_generalActual.con_formato_fecha_mda);
		jQuery("#t-cel_"+i+"_9").prop('checked',parametro_general_control.parametro_generalActual.con_formato_cantidad_coma);
		jQuery("#t-cel_"+i+"_10").val(parametro_general_control.parametro_generalActual.iva_porciento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(parametro_general_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_general_control) {
		parametro_general_funcion1.registrarControlesTableValidacionEdition(parametro_general_control,parametro_general_webcontrol1,parametro_general_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_general_control) {
		jQuery("#divResumenparametro_generalActualAjaxWebPart").html(parametro_general_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_general_control) {
		//jQuery("#divAccionesRelacionesparametro_generalAjaxWebPart").html(parametro_general_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("parametro_general_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(parametro_general_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesparametro_generalAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		parametro_general_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_general_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_general_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_general_control) {
		
		if(parametro_general_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_general_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",parametro_general_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+parametro_general_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",parametro_general_control.strVisibleFK_Idempresa);
		}

		if(parametro_general_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_general_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",parametro_general_control.strVisibleFK_Idmoneda);
			jQuery("#tblstrVisible"+parametro_general_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",parametro_general_control.strVisibleFK_Idmoneda);
		}

		if(parametro_general_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais").attr("style",parametro_general_control.strVisibleFK_Idpais);
			jQuery("#tblstrVisible"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais").attr("style",parametro_general_control.strVisibleFK_Idpais);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_general();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_general",id,"general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		parametro_general_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_general","empresa","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
	}

	abrirBusquedaParapais(strNombreCampoBusqueda){//idActual
		parametro_general_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_general","pais","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
	}

	abrirBusquedaParamoneda(strNombreCampoBusqueda){//idActual
		parametro_general_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_general","moneda","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_generalConstante,strParametros);
		
		//parametro_general_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(parametro_general_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa",parametro_general_control.empresasFK);

		if(parametro_general_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_general_control.idFilaTablaActual+"_3",parametro_general_control.empresasFK);
		}
	};

	cargarCombospaissFK(parametro_general_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais",parametro_general_control.paissFK);

		if(parametro_general_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_general_control.idFilaTablaActual+"_4",parametro_general_control.paissFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais",parametro_general_control.paissFK);

	};

	cargarCombosmonedasFK(parametro_general_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_general_constante1.STR_SUFIJO+"-id_modena",parametro_general_control.monedasFK);

		if(parametro_general_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_general_control.idFilaTablaActual+"_5",parametro_general_control.monedasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_modena",parametro_general_control.monedasFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(parametro_general_control) {

	};

	registrarComboActionChangeCombospaissFK(parametro_general_control) {

	};

	registrarComboActionChangeCombosmonedasFK(parametro_general_control) {

	};

	
	
	setDefectoValorCombosempresasFK(parametro_general_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_general_control.idempresaDefaultFK>-1 && jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_general_control.idempresaDefaultFK) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa").val(parametro_general_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombospaissFK(parametro_general_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_general_control.idpaisDefaultFK>-1 && jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").val() != parametro_general_control.idpaisDefaultFK) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais").val(parametro_general_control.idpaisDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(parametro_general_control.idpaisDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idpais-cmbid_pais").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmonedasFK(parametro_general_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_general_control.idmonedaDefaultFK>-1 && jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_modena").val() != parametro_general_control.idmonedaDefaultFK) {
				jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_modena").val(parametro_general_control.idmonedaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_modena").val(parametro_general_control.idmonedaDefaultForeignKey).trigger("change");
			if(jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_modena").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+parametro_general_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_modena").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_general_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_general_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.setDefectoValorCombosempresasFK(parametro_general_control);
			}

			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.setDefectoValorCombospaissFK(parametro_general_control);
			}

			if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modena",parametro_general_control.strRecargarFkTipos,",")) { 
				parametro_general_webcontrol1.setDefectoValorCombosmonedasFK(parametro_general_control);
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
	onLoadCombosEventosFK(parametro_general_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_general_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_general_webcontrol1.registrarComboActionChangeCombosempresasFK(parametro_general_control);
			//}

			//if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_pais",parametro_general_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_general_webcontrol1.registrarComboActionChangeCombospaissFK(parametro_general_control);
			//}

			//if(parametro_general_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modena",parametro_general_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_general_webcontrol1.registrarComboActionChangeCombosmonedasFK(parametro_general_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_general_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_general_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_general_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_general_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_general","FK_Idempresa","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_general","FK_Idmoneda","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_general","FK_Idpais","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
		
			
			if(parametro_general_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_general");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_general");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_general_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,"parametro_general");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				parametro_general_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("pais","id_pais","seguridad","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_pais_img_busqueda").click(function(){
				parametro_general_webcontrol1.abrirBusquedaParapais("id_pais");
				//alert(jQuery('#form-id_pais_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("moneda","id_modena","contabilidad","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_general_constante1.STR_SUFIJO+"-id_modena_img_busqueda").click(function(){
				parametro_general_webcontrol1.abrirBusquedaParamoneda("id_modena");
				//alert(jQuery('#form-id_modena_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_general_control) {
		
		jQuery("#divBusquedaparametro_generalAjaxWebPart").css("display",parametro_general_control.strPermisoBusqueda);
		jQuery("#trparametro_generalCabeceraBusquedas").css("display",parametro_general_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_general").css("display",parametro_general_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_general").css("display",parametro_general_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_general").attr("style",parametro_general_control.strPermisoMostrarTodos);		
		
		if(parametro_general_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_generalNuevo").css("display",parametro_general_control.strPermisoNuevo);
			jQuery("#tdparametro_generalNuevoToolBar").css("display",parametro_general_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_generalDuplicar").css("display",parametro_general_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_generalDuplicarToolBar").css("display",parametro_general_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_generalNuevoGuardarCambios").css("display",parametro_general_control.strPermisoNuevo);
			jQuery("#tdparametro_generalNuevoGuardarCambiosToolBar").css("display",parametro_general_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_general_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_generalCopiar").css("display",parametro_general_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_generalCopiarToolBar").css("display",parametro_general_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_generalConEditar").css("display",parametro_general_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_generalGuardarCambios").css("display",parametro_general_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_generalGuardarCambiosToolBar").css("display",parametro_general_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdparametro_generalCerrarPagina").css("display",parametro_general_control.strPermisoPopup);		
		jQuery("#tdparametro_generalCerrarPaginaToolBar").css("display",parametro_general_control.strPermisoPopup);
		//jQuery("#trparametro_generalAccionesRelaciones").css("display",parametro_general_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_general_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_general_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_general_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametro Generales";
		sTituloBanner+=" - " + parametro_general_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_general_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_generalRelacionesToolBar").css("display",parametro_general_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_general").css("display",parametro_general_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_general_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_general_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_general_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_general_webcontrol1.registrarEventosControles();
		
		if(parametro_general_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_general_constante1.STR_ES_RELACIONADO=="false") {
			parametro_general_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_general_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_general_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_general_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_general_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_general_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_general_webcontrol1.onLoad();
			
			//} else {
				//if(parametro_general_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			parametro_general_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_general","general","",parametro_general_funcion1,parametro_general_webcontrol1,parametro_general_constante1);	
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

var parametro_general_webcontrol1 = new parametro_general_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_general_webcontrol,parametro_general_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_general_webcontrol1 = parametro_general_webcontrol1;


if(parametro_general_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_general_webcontrol1.onLoadWindow; 
}

//</script>